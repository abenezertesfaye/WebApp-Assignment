<?php 

include('Includes/db.php');
if (isset($_GET['candidate_id'])) {

    $candidate_id = $_GET['candidate_id'];

    $sql = "DELETE FROM `cadidates` WHERE `candidate_id`='$candidate_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

       echo "<script>
                        window.location.href = 'view.php';
                        alert('Successfully DONE!');
                      </script>";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>


  