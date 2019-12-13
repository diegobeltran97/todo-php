<?php  
require_once("../class/todos.php");

session_start();
if ($_SESSION['islogged'] == false){
    header("location:../index.php");
}

$user_id = $_SESSION["user_id"];
$obj_Item = new Todos();
$result = $obj_Item->getAvgCompleted( $user_id );
$totalDone =  (float) $result[0]["AVG(completed)"] * 100;
$totalTodo = 100 - $totalDone;




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reports</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/home.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/Chart.js"></script>
    <script src="../js/repors.js"></script>

</head>
<body>

    <header>
         <?php include 'nav.php';?>
    </header>
 
    <div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card text-center">
                <div class="card-header">
                    Grafico
                </div>
                <div class="card-body">
                <canvas id="myChart" width="400" height="400"></canvas>
                </div>
                
                <div class="card-footer text-muted">
                     <p class="completed" completed="<?php echo $totalDone ?>">Completed <?php echo $totalDone ?>%</p>
                     <p class="todo" todo="<?php echo $totalTodo ?>">Not Completed <?php echo $totalTodo?>%</p>
            </div>
            </div>
        </div>
        <div class="col-6">
        <?php 
                print "<h3 class='title'> Tareas Realizadas por " .  $_SESSION["username"] . "</h3>";
                $obj_todos = new Todos();
                $items = $obj_todos->getTodoItemsCompleted( $_SESSION["user_id"]);
                $nfilas=count($items);


           
              
                if ( $nfilas > 0 ) {
              
                    echo "<div class='js-items'>";
                    
                    echo "<ul class='list-items'>";
                    
                   
                    foreach($items as $resultado) {
                        ?>
                        <del> <li class="row todo-list"  idItem=" <?php echo $resultado['id']; ?>"  >
                           <div class='col-2'>
                               <p></p>
                           </div>
                           <div class='col-8 d-flex align-items-center'>
                              <p class="description"> <?php echo $resultado['todo_item']; ?> </p>
                           </div>
                           <div class="col-2  d-flex align-items-center detele-item" userid=" <?php echo $_SESSION['user_id'];  ?>"  idItem=" <?php echo $resultado['id']; ?>"  >
                               <a href="#" onclick="deleteItem(event)"><img src="../img/close.png" alt="" width="30px"></a>
                           </div>
                           
                        </li></del>
                  
                   <?php  }
                     echo "</ul>";
                    
                     echo "</div>"; 
                } else {
                    if ( $totalTodo >= 100) {
                        echo "<div class='message'> <h6> Aùn hay tareas en Espera</h6> </div>";
                    } else {
                       echo "<div class='message'> <h6> Felicitaciones, terminaste tus tareas </h6> </div>"; 
                    }
                    
                }

           ?>
        </div>
    
    </div>
    
    </div>
 
</body>
</html>