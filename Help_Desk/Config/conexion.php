<?php 
    session_start();
  class Conectar {
        protected $dbh;
        protected function Conexion(){
            try {
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=helpdesk_fp","ljarcana","4dm1n-pf123%");
            return $conectar;

            }catch(Exception $e){
                print   "¡Error BD!: " . $e->getMessage()."<br/>";
                die();
            }

        }
        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");

        }
        public static function ruta(){

            return "http://localhost/Help_Desk/";
        }
    }
?>