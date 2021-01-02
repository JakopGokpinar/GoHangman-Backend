<?php
    require 'connection.php';
    require 'checklog.php';

    $res = mysqli_query($connection,"SELECT * FROM heroku_f388b2ef57bb67d.matches WHERE player1='$username' OR player2='$username'");
    $res = mysqli_fetch_assoc($res);
    echo json_encode($res);
    
?>