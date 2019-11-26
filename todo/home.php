<?php 

require_once("../class/todos.php");


if (!$_COOKIE['islogged']){
    header("location:login.php");
}


echo "welcome " . $_COOKIE['username'];
echo "Below you may find your TODO list :)";
echo "<br/><br/>To Do list:<br/><br/>";

$obj_todos = new Todos();
$items = $obj_todos->getTodoItems($_COOKIE['my_id']);
$nfilas=count($items);

if ( $nfilas > 0 ) {
    foreach($items as $resultado) {
        echo "<input type='checkbox' name='check_list[]' value='". $_COOKIE['my_id'] ." '> ".  $resultado['todo_item'] ." ' </td>";
    }
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
 

<form method="post">
    <table>
        <tr><td>Description:</td><td><input type="text" name="description" /></td></tr>
            <input type="submit" name="submit_description" value="Add"/>
        </td></tr>
    </table>
</form>
<hr />
<script src="../scripts/index.js"></script>
</body>
</html>