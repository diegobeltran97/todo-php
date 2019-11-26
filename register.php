<html>
<body>
    <form method="post">
        <table>
            <tr><td>Username:</td><td><input type="text" name="reg_uname"  /></td></tr>
            <tr><td>Password:</td><td><input type="password" name="reg_password"  /></td></tr>
            <tr><td>
                <input type="submit" name="my_form_submit_button" value="Just Register"/>
            </td><td>

            </td></tr>
        </table>
    </form>
    
    <form method ="get" action="login.php">
        <input type="submit" value="Try to login" />
    </form>    
    
    <?php
        include 'class/users.php';
        $obj_user = new User();
        if (isset($_POST['reg_uname'])) {
            $username = $_POST['reg_uname'];
            $password = $_POST['reg_password'];
            $obj_user->createUser($username, $password);
            
        }   
        // $query = "select * from users";
        // $res = mysql_query($query);
        // while($dsatz = mysql_fetch_assoc($res))
        // {
        //     echo "<table>";
        //     echo "<tr>";
        //     echo "<td>" . $dsatz["id"] . "</td>" .
        //     "<td>" . $dsatz["username"] . "</td>" .
        //     "<td>" . $dsatz["passwordHash"] . "</td>";
        //     echo "</tr>";
        //     echo "</table>";
        // }
    ?>


</body>
</html>