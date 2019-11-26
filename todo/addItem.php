<?php  
require_once("../class/todos.php");
$txt_item = $_POST["txt_item"];
$user_id = $_COOKIE['my_id'];

$obj_Item = new Todos();
  $obj_Item->addItem( $user_id , $txt_item);


  $items = $obj_Item->getTodoItems();
  echo $items;


?>