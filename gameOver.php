<?php
    require 'connection.php';
    require 'checklog.php';

    $res1 = mysqli_query($connection,"SELECT player1,score1 FROM matches");
    while($row = mysqli_fetch_assoc($res1)){
        if($username == $row["player1"]){
            if($row["score1"] >= 3){
                echo "1 won game";
            }
            else {
                echo "2 lost game";
            }
        }
    }


    $res2 = mysqli_query($connection,"SELECT player2,score2 FROM matches");
    while($row = mysqli_fetch_assoc($res2)){
        if($username == $row["player2"]){
            if($row["score2"] >= 3){
                echo "3 won game";
            }
            else {
                echo " 4 lost game";
            }
        }
    }

    //mysqli_query($connection,"DELETE FROM matches WHERE player1=('$username') OR player2=('$username')");
?>