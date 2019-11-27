<?php  
require_once("../class/todos.php");

session_start();

$txt_item = $_POST["txt_item"];
$user_id = $_SESSION["user_id"];
var_dump($txt_item, $user_id);
$obj_Item = new Todos();
  $obj_Item->addItem( $user_id , $txt_item);




?>