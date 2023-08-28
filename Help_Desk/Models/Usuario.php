<?php 

    class Usuario extends Conectar {
        public function login(){
            $conectar=parent::conexion();
            parent::set_names();
            if(isset($_POST["enviar"])){
                $correo=$_POST["usu_correo"];
                $pass=$_POST["usu_pass"];
                $rol=$_POST["rol_id"];
                if(empty($correo)and empty($pass)){
                    header("location:".conectar::ruta()."index.php?m=2");
                    exit();

                }else{
                    $sql="SELECT * FROM tm_usuario WHERE usu_correo = ? AND usu_pass =? AND rol_id=? AND est=1";
                    $stmt=$conectar->prepare($sql);
                    $stmt->bindValue(1,$correo);
                    $stmt->bindValue(2,$pass);
                    $stmt->bindValue(3,$rol);
                    $stmt->execute();
                    $resultado=$stmt->fetch();
                    if(is_array($resultado) and count($resultado)>0){
                        $_SESSION["usu_id"]=$resultado["usu_id"];
                        $_SESSION["usu_nom"]=$resultado["usu_nom"];
                        $_SESSION["usu_ape"]=$resultado["usu_ape"];
                        $_SESSION["rol_id"]=$resultado["rol_id"];
                        header("Location:".Conectar::ruta()."view/Home/");
                        exit();

                    }else{
                        header("location:".conectar::ruta()."index.php?m=1");
                        exit();
                    }
                }
            }
        }

        //CRUD ADMINISTRADOR DE USUARIOS 
        //INSERTAR USUARIO
        public function insert_usuario($usu_nom,$usu_ape,$usu_correo,$usu_pass,$rol_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_usuario (usu_id, usu_nom, usu_ape, usu_correo, usu_pass, rol_id, fecha_crea, fecha_mod, fecha_elim, est) VALUES (NULL, ?, ?, ?, ?, ?, now(), NULL, NULL, '1');";   
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$usu_nom);
            $sql->bindValue(2,$usu_ape);
            $sql->bindValue(3,$usu_correo);
            $sql->bindValue(4,$usu_pass);
            $sql->bindValue(5,$rol_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();

        }
         //ACTUALIZAR USUARIO
        public function update_usuario($usu_id,$usu_nom,$usu_ape,$usu_correo,$usu_pass,$rol_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_usuario SET usu_nom = ?, usu_ape = ?, usu_correo = ?, usu_pass = ?, rol_id = ?, fecha_crea = NULL, fecha_mod = now(), fecha_elim = NULL WHERE tm_usuario.usu_id = ?;";   
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->bindValue(2,$usu_nom);
            $sql->bindValue(3,$usu_ape);
            $sql->bindValue(4,$usu_correo);
            $sql->bindValue(5,$usu_pass);
            $sql->bindValue(6,$rol_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
            
        }
         //ELIMINAR USUARIO
        public function Delete_usuario($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_usuario SET est='0',fecha_elim=now() where usu_id=? ";   
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
         //TARER USUARIO
        public function get_usuario(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_usuario where est='1'";   
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
         //TRAER USUARIO X ID
        public function get_usuario_x_id($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_usuario where usu_id=?";   
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_total_ticket_x_usu($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) as Total FROM tm_ticket WHERE usu_id=?";   
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_total_ticketC_x_usu($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) as Total FROM tm_ticket WHERE usu_id = ? AND tick_estado='Cerrado'";   
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function get_total_ticketA_x_usu($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) as Total FROM tm_ticket WHERE usu_id = ? AND tick_estado='Abierto'";   
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_usuario_grafico($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT tm_categoria.cat_nom as nom,COUNT(*) AS total FROM tm_ticket JOIN tm_categoria on tm_ticket.cat_id = tm_categoria.cat_id WHERE tm_ticket.es = 1 and tm_ticket.usu_id=? GROUP BY tm_categoria.cat_nom ORDER BY total DESC";   
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_usuario_x_rol(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_usuario where est='1' and rol_id ='2'";   
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

       
 }

?>