<?php 

session_start();

if(!isset($_SESSION['user'])){
    header('Location: ../index.php');
}

include('../Include/db.php');

if (isset($_GET['candidate_id'])) {

    $candidate_id = $_GET['candidate_id'];

    $sql = "DELETE FROM `cadidates` WHERE `candidate_id`='$candidate_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

       echo "<script>
                window.location.href = 'view.php';
                alert('Candidate Successfully Deleted!');
            </script>";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>


  