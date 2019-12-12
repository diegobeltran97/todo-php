<?php  
require_once("../class/todos.php");

session_start();

$txt_item = $_POST["txt_item"];
$user_id = $_SESSION["user_id"];

$obj_Item = new Todos();
  $obj_Item->addItem( $user_id , $txt_item);


  $result = $obj_Item->getLastId($user_id);

echo "<li  class='row todo-list' style='display:none;' idItem='".$result[0]['id'] ."' >
  <div class='col-2'>
      <p></p>
  </div>
  <div class='col-8 d-flex align-items-center'>
      <p class='description'> ". $txt_item . "</p>
  </div>
  <div class='col-2  d-flex align-items-center detele-item' userid=" .$user_id ."  idItem='".$result[0]['id'] ."'  >
      <a href='#' onclick='deleteItem(event)'><img src='../img/close.png' alt=''></a>
  </div>
  </li>";

  

 




?>