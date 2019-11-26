<?php  
require_once("../class/todos.php");
$txt_item = $_POST["txt_item"];
$user_id = $_COOKIE['my_id'];

$obj_addItem = new Todos();
$items = $obj_addItem->addItem( $user_id , $txt_item);
?>