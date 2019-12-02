<?php  
require_once("../class/todos.php");

session_start();
if ($_SESSION['islogged'] == false){
    header("location:../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/home.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
 
       
</head>
<body>
<div style="background: rgb(250,249,247);">
    <div class="container ">
        <div class="row tasks">
            <div class="col-6  d-flex align-items-center">
                
             <div class="row">
             
                 <input class="col-9" type="text" name="" id="txt_item" placeholder="Enter a Task"> 
             
              
                   <button class="add col-3" onclick="addItem()" >
                <img src="../img/add.png" alt=""></button>
              
             
               
            </div>
            
            </div>
            <div class="col-6 list-item">
             <?php 
                echo "welcome " .  $_SESSION["username"];
                $obj_todos = new Todos();
                $items = $obj_todos->getTodoItems( $_SESSION["user_id"]);
                $nfilas=count($items);

                if ( $nfilas > 0 ) {
                    echo "<div class='js-items'>";
                    echo "<ul class='list-items' >";
                    foreach($items as $resultado) {
                        ?>
                        <li class="row todo-list"  idItem=" <?php echo $resultado['id']; ?>"  >
                           <div class='col-2'>
                               <p></p>
                           </div>
                           <div class='col-8 d-flex align-items-center'>
                               <p class="description"> <?php echo $resultado['todo_item']; ?> </p>
                           </div>
                           <div class="col-2  d-flex align-items-center detele-item" userid=" <?php echo $_SESSION['user_id'];  ?>"  idItem=" <?php echo $resultado['id']; ?>"  >
                               <a href="#" onclick="deleteItem(event)"><img src="../img/check2.png" alt=""></a>
                           </div>
                           
                        </li>
                  
                   <?php }
                     echo "</ul>";
                    echo "</div>";
                } else {
                    echo "no hay tareas aún";
                }

           ?>

            </div>
        </div>

    </div>
   

</div>

<script src="../js/index.js"></script>
</body>
</html>
