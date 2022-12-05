<?php 

session_start();

if(!isset($_SESSION['user'])){
    header('Location: ../index.php');
}
else {
    $now = time();
  
    if($now > $_SESSION['expire']) {
        session_destroy();
        echo "<p align='center'>Session has been destroyed!!";
        header("Location: ../index.php");  
    } else { 

$_SESSION['deleted'] = 0;

include('../Include/db.php');

if (isset($_GET['id'])) {

    $candidate_id = $_GET['id'];

    $sql = "DELETE FROM `candidates` WHERE `id`='$candidate_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        $_SESSION['deletedMessage'] = 'You have successfully deleted candidate!';
        $_SESSION['deleted'] += 1;

        header('Location: view.php');

    }else{

        echo $error = "Invalid input!";

    }

} 

    }
}

?>


  