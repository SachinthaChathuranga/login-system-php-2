<?php
    $username = "admin";
    $password = "admin123";

    
    if(isset($_POST["login"])){
        if($_POST["userName"] == $username && $_POST["password"] == $password ){
            session_start();
            $_SESSION["userName"] = $_POST["userName"];
            // $_SESSION["password"] = $_POST["password"];
            header('location:index.php');
            exit();
            
        }
        else{
            echo "<p class='errormsg'>Please check your password or user name again!</p>";
        }
        
        
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Loging Page</title>
</head>
<body>
    <div class="log cont">
        <h1>Login</h1>

        <form action="" method="post">
            <label for="userName">User Name </label><br>
            <input type="text" name="userName" id="userName" class="">
            <br><br>

            <label for="password">Password </label><br>
            <input type="password" name="password" id="psw" class="">
            <br><br>

            <input class="btn" type="submit" name="login" value="Login" id="submit">
            </form>
            
        <?php

        
        ?>
    </div>

    
    
</body>
</html>