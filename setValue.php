<?php
    header('Access-Control-Allow-Origin: *');
    require 'connection.php';
    require 'checklog.php';

    $column = $_GET["column"];
    $column = mysqli_real_escape_string($connection,$column);
    if($column == "bodyindex"){
        $res = mysqli_query($connection,"UPDATE matches SET bodyindex = bodyindex+1 WHERE player1='$username' OR player2='$username'");
    }
    else{
        $value = $_GET["value"];
        $value = mysqli_real_escape_string($connection,$value);
        $res = mysqli_query($connection,"UPDATE matches SET $column = '$value' WHERE player1='$username' OR player2='$username'"); 
    }
    
    if($res == true){
        echo "updated";
    }
    else{
        echo "not updated";
    }
?>