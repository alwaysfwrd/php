<?php
    session_start();
    require('connect.php');
    if (@$_SESSION["username"]){
        echo "welcome ".$_SESSION["username"];
    } else{
        echo 'you must be logged in....<br><a href="login.php">login here</a> or <a href="register.php">register</a>';
    }


?>

<html>
    <script>console.log("hello mom!");</script>
    <head>
        <title>Home page</title>
        
    </head>
    <?php include("header.php"); ?>
    <body>
    Username:
    Email:
    Date registered:
    
    </body>
</html>

<?php
if (@$_GET['action'] == 'logout'){
    session_destroy();
    header("location: login.php");
}
?>