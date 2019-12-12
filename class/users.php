<?php
require_once('modelo.php');

class User extends modeloCredencialesBD
{
    //Attributes
    
    //Constructor
    public function __construct(){
        parent::__construct();
    }

    //Methods
    
    public function  isUserValid($username , $password) {

         $SQL = "SELECT * FROM users WHERE username = '". $username . "' AND passwordHash = '" . $password . "'"  ;
         $consulta=$this->_db->query($SQL);
         $resultado=$consulta->fetch_all(MYSQLI_ASSOC);
         
        
         if($consulta){
            return $resultado;
            $this->_db->close();
        } else {
            echo $this->_db->error; 
        }

        
     
    }

    public function createUser($username, $password) {
        $SQL = "INSERT INTO users (username, passwordHash) VALUES ('" . $username . "','" . $password . "')";
        $actualiza= $this->_db->query($SQL);
        if($actualiza) {
              $this->_db->close();
        } else {
           echo $this->_db->error; 
        }
             
    }

   

    
}
