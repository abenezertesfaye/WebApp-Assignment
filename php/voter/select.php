<?php

session_start();

if(!isset($_SESSION['user'])){
    header('Location: ../index.php');
}

include('../Include/db.php');

if(isset($_GET['candid_name'])){
    
$user = $_SESSION['user'];
$candid_name = $_GET['candid_name']; 

$_SESSION['vote'] = 0;

$sq = "SELECT * FROM `vote` WHERE `voter` = '$user'";
$re = $conn->query($sq);

if($rows = $re->num_rows == 0){
    $sql = "INSERT INTO `vote` (`voter`, `candidate`) VALUES ('$user','$candid_name')";
    $result = $conn->query($sql);

    if($result === true){

        header('Location: dashboard.php');

        $_SESSION['voted'] = 'you have successfully voted for a candidate!';
        $_SESSION['vote'] +=  1;
           
    }
 }
 else {

    header('Location: dashboard.php');

    $_SESSION['voted'] = 'you have already voted! you can\'t vote twice!';
    $_SESSION['vote'] +=  1;
      
 }

}


?>