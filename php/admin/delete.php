<?php 

session_start();

if(!isset($_SESSION['user'])){
    header('Location: ../index.php');
}

include('../Include/db.php');

if (isset($_GET['id'])) {

    $candidate_id = $_GET['id'];

    $sql = "DELETE FROM `candidates` WHERE `id`='$candidate_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

       echo "<script>
                alert('Candidate Successfully Deleted!');
                window.location.href = 'view.php';
            </script>";

    }else{

        echo $error = "Invalid input!";

    }

} 

?>


  