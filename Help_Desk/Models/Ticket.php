<?php
    class Ticket extends Conectar{

        public function insert_ticket($usu_id,$cat_id,$ticket_titulo,$ticket_descripcion){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_ticket (tick_id, usu_id, cat_id, tick_titulo, ticket_descripcion, tick_estado, fech_crea,usu_asig,fech_asig, es) VALUES (NULL,?,?,?,?,'Abierto',now(),NULL,NULL,'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->bindValue(2,$cat_id);
            $sql->bindValue(3,$ticket_titulo);
            $sql->bindValue(4,$ticket_descripcion);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function listar_ticket_x_usu($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
                tm_ticket.tick_id,
                tm_ticket.usu_id,
                tm_ticket.cat_id,
                tm_ticket.tick_titulo,
                tm_ticket.ticket_descripcion,
                tm_ticket.tick_estado,
                tm_ticket.fech_crea,
                tm_ticket.usu_asig,
                tm_ticket.fech_asig,
                tm_ticket.es,
                tm_usuario.usu_nom,
                tm_usuario.usu_ape,
                tm_categoria.cat_nom
                FROM 
                tm_ticket
                INNER join tm_categoria on tm_ticket.cat_id = tm_categoria.cat_id
                INNER join tm_usuario on tm_ticket.usu_id = tm_usuario.usu_id
                WHERE
                tm_ticket.es = 1
                AND tm_usuario.usu_id=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function listar_ticket_x_id($tick_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
                tm_ticket.tick_id,
                tm_ticket.usu_id,
                tm_ticket.cat_id,
                tm_ticket.tick_titulo,
                tm_ticket.ticket_descripcion,
                tm_ticket.tick_estado,
                tm_ticket.fech_crea,
                tm_usuario.usu_nom,
                tm_usuario.usu_ape,
                tm_usuario.usu_correo,
                tm_categoria.cat_nom
                FROM 
                tm_ticket
                INNER join tm_categoria on tm_ticket.cat_id = tm_categoria.cat_id
                INNER join tm_usuario on tm_ticket.usu_id = tm_usuario.usu_id
                WHERE
                tm_ticket.tick_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $tick_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function listar_ticket(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
                tm_ticket.tick_id,
                tm_ticket.usu_id,
                tm_ticket.cat_id,
                tm_ticket.tick_titulo,
                tm_ticket.ticket_descripcion,
                tm_ticket.tick_estado,
                tm_ticket.fech_crea,
                tm_ticket.usu_asig,
                tm_ticket.fech_asig,
                tm_ticket.es,
                tm_usuario.usu_nom,
                tm_usuario.usu_ape,
                tm_categoria.cat_nom
                FROM 
                tm_ticket
                INNER join tm_categoria on tm_ticket.cat_id = tm_categoria.cat_id
                INNER join tm_usuario on tm_ticket.usu_id = tm_usuario.usu_id
                WHERE
                tm_ticket.es = 1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function listar_ticketdetalle_x_ticket($tick_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT
                td_ticketdetalle.tickd_id,
                td_ticketdetalle.tickd_descripcion,
                td_ticketdetalle.fech_crea,
                tm_usuario.usu_nom,
                tm_usuario.usu_ape,
                tm_usuario.rol_id
                FROM 
                `td_ticketdetalle`
                INNER JOIN tm_usuario ON td_ticketdetalle.usu_id = tm_usuario.usu_id
                WHERE
                tick_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $tick_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_ticketdetalle($tick_id,$usu_id,$tickd_descripcion){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO td_ticketdetalle (tickd_id,tick_id,usu_id,tickd_descripcion,fech_crea,est) VALUES (NULL,?,?,?,now(),'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$tick_id);
            $sql->bindValue(2,$usu_id);
            $sql->bindValue(3,$tickd_descripcion);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_ticketdetalle_cerrado($tick_id,$usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO td_ticketdetalle (tickd_id,tick_id,usu_id,tickd_descripcion,fech_crea,est) VALUES (NULL,?,?,'Ticket cerrado con exito...',now(),'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$tick_id);
            $sql->bindValue(2,$usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function update_est_tick($tick_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="update tm_ticket
                SET 
                    tick_estado= 'Cerrado'
                WHERE 
                    tick_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $tick_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_asig_tick($tick_id,$usu_asig){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="update tm_ticket
                SET 
                    usu_asig= ?,
                    fech_asig=now()
                WHERE 
                    tick_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_asig);
            $sql->bindValue(2, $tick_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_total_ticket(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) as Total FROM tm_ticket ";   
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_total_ticketC(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) as Total FROM tm_ticket WHERE tick_estado='Cerrado'";   
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function get_total_ticketA(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) as Total FROM tm_ticket WHERE  tick_estado='Abierto'";   
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_ticket_grafico(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT tm_categoria.cat_nom as nom,COUNT(*) AS total FROM tm_ticket JOIN tm_categoria on tm_ticket.cat_id = tm_categoria.cat_id WHERE tm_ticket.es = 1 GROUP BY tm_categoria.cat_nom ORDER BY total DESC";   
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>