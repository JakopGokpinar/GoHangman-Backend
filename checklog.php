<?php
    if(!isset($_SESSION["registered"])){
        echo "not registered";
        exit();
    }  
    $username = $_SESSION["username"];    
?>