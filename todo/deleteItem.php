<?php  
require_once("../class/todos.php");

session_start();

$id_item = intval($_POST["iditem"]);
$user_id = intval($_SESSION["user_id"]);


$obj_Item = new Todos();
  $obj_Item->deleteItem( $user_id , $id_item);




?>