<?php
    require 'connection.php';
    $username = mysqli_real_escape_string($connection, $_GET["username"]); 
    $result2 = mysqli_query($connection,"SELECT player1 as player FROM matches UNION SELECT player2 as player FROM matches");
    while($row = mysqli_fetch_assoc($result2)){
        if($row["player"] == $username){
            $_SESSION["registered"] = false;
            echo "register unsuccessful";
            exit();
        }
    }
    $result = mysqli_query($connection, "INSERT INTO waitingqueue (user) VALUES('$username')");
    if($result !== false){      
        $_SESSION["registered"] = true;
        $_SESSION["username"] = $username;
        echo "register successful";
    } else {
        $_SESSION["registered"] = false;
        echo "register unsuccessful";
    }
    return $_SESSION["registered"];
?>