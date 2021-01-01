<?php
    header('Access-Control-Allow-Origin: *');
    $connection = mysqli_connect('localhost:3306', 'root', '', 'hangman online');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    /*if(isset($_POST["start"])){
        $_SESSION['username'] = $_POST["username"];
        //header("Location: store.php?username=".$username);
    }*/
    
?>