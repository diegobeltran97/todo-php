<?php 

require_once("../class/todos.php");

session_start();
if ($_SESSION['islogged'] == false){
    header("location:../index.php");
}


echo "welcome " .  $_SESSION["username"];
echo "Below you may find your TODO list :)";
echo "<br/><br/>To Do list:<br/><br/>";

$obj_todos = new Todos();
$items = $obj_todos->getTodoItems( $_SESSION["user_id"]);
$nfilas=count($items);

if ( $nfilas > 0 ) {
    echo "<div class='js-items'>";
    foreach($items as $resultado) {
        echo "<input type='checkbox' iditem= '  " . $resultado['id'] . "  ' value=' ". $_SESSION["user_id"] ." '> "  . $resultado['todo_item'] ."</td>";
    }
    echo "</div>";
} else {
    echo "no hay tareas aún";
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="../scripts/jquery-3.3.1.min.js"></script>
    
</head>
<body>
<hr/>

<div>
    <p>Add Item</p>
    <input type="text" name="" id="txt_item" value="">
    <button  onclick="addItem()" >Add</button>

</div>
 
<script src="../scripts/index.js"></script>
</body>
</html>