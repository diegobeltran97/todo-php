
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

<div class="wrapper">
    <form method="post" class="container login-form">
        
          <input type="text" name="reg_uname" placeholder="Username" />
         <input type="password" name="reg_password" placeholder="Password" />
            
                <input type="submit" name="my_form_submit_button" value="Just Register"/>
       <a href="index.php">Try to Login</a>     
    </form>
   
    </div>
    <?php
        include 'class/users.php';
        $obj_user = new User();
        if (isset($_POST['reg_uname'])) {
            $username = $_POST['reg_uname'];
            $password = $_POST['reg_password'];
            $obj_user->createUser($username, $password);
            
        }   
   
    ?>


</body>
</html>