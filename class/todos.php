<?php
require_once('modelo.php');

class Todos extends modeloCredencialesBD
{
    //Attributes
    
    //Constructor
    public function __construct(){
        parent::__construct();
    }

    //Methods
    public function getTodoItems( $userid) {
        $id = (int) $userid;
        $SQL = "SELECT * FROM todos WHERE user_id = $id ";
        $consulta=$this->_db->query($SQL);
        $resultado=$consulta->fetch_all(MYSQLI_ASSOC);
       
        if($consulta){
            return $resultado;
            $this->_db->close();
        } else {
            echo $this->_db->error; 
        }


      
    }

    public function addItem($user_id, $todo_text) {
        $id = (int) $user_id;
        $SQL = "INSERT INTO todos (user_id, todo_item) VALUES ('" . $id . "','" . $todo_text . "')";
        $actualiza= $this->_db->query($SQL);
        if($actualiza) {
              $this->_db->close();
        } else {
           echo $this->_db->error; 
        }
    }
    
    
}
