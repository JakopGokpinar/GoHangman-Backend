<?php
    header('Access-Control-Allow-Origin: *');
    require 'connection.php';
    require 'checklog.php';

    $condition = $_GET["condition"];
    $condition = mysqli_real_escape_string($connection,$condition);
    $result = mysqli_query($connection,"SELECT player1 FROM matches");
    $result2 = mysqli_query($connection,"SELECT player2 FROM matches");

    while($row = mysqli_fetch_assoc($result)){
        if($row["player1"] == $username){
            if($condition == "win"){
               $res1= mysqli_query($connection,"UPDATE matches SET score1=score1+1 WHERE player1='$username'");
               //if($res1 == true) echo "win res1:score1 increased";
            }
            else if($condition == "lose"){
               $res2= mysqli_query($connection,"UPDATE matches SET score2=score2+1 WHERE player1='$username'");
               //if($res2 == true) echo "lose res2:score2 increased";
            }
        }
    }
    while($row = mysqli_fetch_assoc($result2)){
        if($row["player2"] == $username){
            if($condition == "win"){
               $res3=  mysqli_query($connection,"UPDATE matches SET score2=score2+1 WHERE player2='$username'");
               //if($res3 == true) echo "win res3:score2 increased";
            }
            else if($condition == "lose"){
               $res4=  mysqli_query($connection,"UPDATE matches SET score1=score1+1 WHERE player2='$username'");
               //if($res4 == true) echo "lose res4:score1 increased";
            }
        }
    }
    $space = "";
    $result3 = mysqli_query($connection,"UPDATE matches 
                              SET 
                                title='$space',
                                selectedword='$space', 
                                bodyindex=0,
                                usedword='$space',
                                typedword='$space',
                                guessedword='$space',
                                guessedindex=0,
                                linestatus='false'
                              WHERE 
                                player1='$username' OR player2='$username'
                            ");

    if($result3 == true) echo "bosluklandi";
    else echo mysqli_error($connection);

?>