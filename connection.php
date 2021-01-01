<?php
    header('Access-Control-Allow-Origin: *');
    #$connection = mysqli_connect('localhost:3306', 'root', '', 'hangman online');
    $connection = mysqli_connect('us-cdbr-east-02.cleardb.com:3306', 'b51aa4cd451676', 'a92e712d', 'heroku_f388b2ef57bb67d');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    /*if(isset($_POST["start"])){
        $_SESSION['username'] = $_POST["username"];
        //header("Location: store.php?username=".$username);
    }*/
    
?>