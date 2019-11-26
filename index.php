<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="scripts/jquery-3.3.1.min.js"></script>
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
<form method="post" action="index.php" >
        <table>
            <tr><td>Username:</td><td><input type="text" name="reg_uname" value="" /></td></tr>
            <tr><td>Password:</td><td><input type="password" name="reg_password" value="" /></td></tr>
        </table>
        <input type="submit" name="enviar" />
    </form>
    
    <form method ="link" action="register.php">
        <input type="submit" value="Register"/>
    </form>

    <?php  } ?>
</body>
</html>