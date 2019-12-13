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
<header>
        <nav class="navbar navbar-expand-lg navbar-light ">
                        
                        <div class="navbar-nav">
                            <a class="nav-item nav-link active font-weight-bold" href="home.php">Home </a>
                            <a class="nav-item nav-link active font-weight-bold" href="./reports.php">Reportes </a>
                        </div>
        </nav>
    </header>
    <div class="container">

   
        <div class="row tasks">

       
            <div class="col-sm-12 col-lg-6 col-xl-6 ">   
                <div class="row d-flex flex-row addbox" >  
                    
                    <input class="col-8" type="text" name="" id="txt_item" placeholder="Enter a Task">               
                    
                    <button class="add col-4" onclick="addItem()" >
                        <img src="../img/add.png" alt="">
                    </button>
                    
                </div>
            </div>

            <div class=" col-sm-12 col-lg-6  col-xl-6 list-item">
             <?php 
                print "<h3 class='title'> Bienvenido " .  $_SESSION["username"] . "</h3>";
                $obj_todos = new Todos();
                $items = $obj_todos->getTodoItems( $_SESSION["user_id"]);
                $nfilas=count($items);


           
              
                if ( $nfilas > 0 ) {
                    echo "<p class='font-weight-bold'> Estas son sus tareas</p>";
                    echo "<div class='js-items'>";
                    
                    echo "<ul class='list-items'>";
                    
                   
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
                               <a href="#" onclick="updateItem(event)"><img src="../img/close.png" alt="" width="30px"></a>
                           </div>
                           
                        </li>
                  
                   <?php  }
                     echo "</ul>";
                    
                     echo "</div>"; 
                } else {
                    
                    echo "<div class='message'> <h6> Aún no hay tareas Disponibles  </h6> </div>";
                }

           ?>

            </div>
        </div>

    </div>
   



<script src="../js/index.js"></script>
</body>
</html>
