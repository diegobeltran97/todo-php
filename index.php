<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    
   
</head>
<body>

<?php 
require_once("class/users.php");
if(array_key_exists('enviar',$_POST)){
   
    $user = $_POST["reg_uname"];
    $password = $_POST["reg_password"];

    $obj_user = new User();
    $result_user = $obj_user->isUserValid( $user , $password );
    
    $numRows = count($result_user);
 var_dump($result_user[0]["id"]);
    if ( $numRows > 0) {
        // Start the session
        session_start();
        $_SESSION["user_id"] = $result_user[0]["id"];
        $_SESSION["username"] = $user;
        $_SESSION['islogged'] = true;
    
     
   
         echo '<script>window.location.href = "./todo/home.php";</script>';
    }
    else {
        echo "no passed";
    }
    
   
    
}
else {


?>

<div class="wrapper">


    <form method="post" action="index.php" class="container login-form" >
      <div class="form-group">
      
        <input  class="form-control form-control-sm" type="text" name="reg_uname" value=""  placeholder="User" />
    
        
      </div>
      <div class="form-group">
        <input  class="form-control form-control-sm" type="password" name="reg_password" value="" placeholder="Password" />  
      </div>
      <button type="submit" name="enviar" class="btn btn-primary mb-2" > Enter</button>
    </form>
    
    <form method ="link" action="register.php">
        <input type="submit" value="Register"/>
    </form>

    <?php  } ?>
    </div>
</body>
</html>