<?php

session_start();

if(!isset($_SESSION['user'])){
    header('Location: ../index.php');
}

include('../Include/db.php');

if(isset($_GET['candid_name'])){
    
$user = $_SESSION['user'];
$candid_name = $_GET['candid_name']; 

$sq = "SELECT * FROM `vote` WHERE `voter` = '$user'";
$re = $conn->query($sq);

if($rows = $re->num_rows == 0){
    $sql = "INSERT INTO `vote` (`voter`, `candidate`) VALUES ('$user','$candid_name')";
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
// $sql = "INSERT INTO `vote` (`voter`, `candidate`) VALUES ('$voter','$candid_name')";
// $result = $conn->query($sql);

// if($result === true){
//     echo "<script>
//          window.location.href = 'dashboard.php';
//          alert('Successfully Voted!');
//         </script>"; 
// }

}


?>