<?php
    header('Access-Control-Allow-Origin: *');
    require 'connection.php';
    require 'checklog.php';

    $res = mysqli_query($connection,"SELECT player1 as player  FROM matches WHERE player1='$username'
                                    UNION
                                    SELECT player2 as player FROM matches WHERE player2='$username'");
    while($row = mysqli_fetch_assoc($res)){
        if($row["player"] == $username){
            $pl1 = mysqli_query($connection,"SELECT player1 FROM matches");
            $pl1array = array();
            while($satir = mysqli_fetch_assoc($pl1)){
                array_push($pl1array,$satir["player1"]);
            }
            if(in_array($username,$pl1array)){
                echo "match find,asker";
            }
            else{
                echo "match find,noasker";
            }
            exit();
        }
    }
    $result = mysqli_query($connection,"SELECT user FROM waitingqueue");
    $wusers = array();
    while($row = mysqli_fetch_assoc($result)){
        array_push($wusers, $row["user"]);
    }
    if(count($wusers) < 2){
        echo "no users";
        exit();
    }
    $player1 = $wusers[mt_rand(0,count($wusers)-1)];
    $wusers = array_values(array_diff($wusers,[$player1]));
    $player2 = $wusers[mt_rand(0,count($wusers)-1)];
    $wusers = array_values(array_diff($wusers,[$player2]));
    $res2 =  mysqli_query($connection,"INSERT INTO matches (player1,player2) VALUES('$player1','$player2')");
            

    if($res2 === true){
        if($username == $player1 || $username == $player2){
            mysqli_query($connection,"DELETE FROM waitingqueue WHERE user=('$player1') OR user=('$player2')");
            if($player1 == $username){
                echo "match find,asker";
            }
            else{
                echo "match find,noasker";
            }
            return;
        }
    }
    echo "not find";
?>