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
    <title>Reports</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/home.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/Chart.js"></script>


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
                        2 days ago
            </div>
            </div>
        </div>
        <div class="col-6">
        <?php 
                print "<h3 class='title'> Tareas Realizadas por " .  $_SESSION["username"] . "</h3>";
                $obj_todos = new Todos();
                $items = $obj_todos->getTodoItems( $_SESSION["user_id"]);
                $nfilas=count($items);


           
              
                if ( $nfilas > 0 ) {
              
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
                               <a href="#" onclick="deleteItem(event)"><img src="../img/close.png" alt="" width="30px"></a>
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
    <script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['to do', 'done'],
        datasets: [{
            label: '# of Votes',
            data: [30, 70],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
     
    }
});
</script>

</body>
</html>