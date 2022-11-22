<?php

session_start();

if(!isset($_SESSION['user'])){
    header('Location: ../index.php');
}

include('../Include/db.php');

if(isset($_GET['candidate_id'])){
    
$user = $_SESSION['user'];
$candidate_id = $_GET['candidate_id']; 
$voter = $user;

$sq = "SELECT * FROM `checklist` WHERE `voter` = '$user'";
$re = $conn->query($sq);

if($rows = $re->num_rows == 0){
    $sql = "INSERT INTO `checklist` (`voter_choice`, `voter`) VALUES ('$candidate_id','$voter')";
    $result = $conn->query($sql);

    if($result === true){
        echo "<script>
            window.location.href = 'dashboard.php';
            alert('Successfully Voted!');
            </script>"; 
    }
 }
 else{
    echo "<script>
    window.location.href = 'dashboard.php';
    alert('you have already Voted!');
    </script>"; 
 }
}


?>