<?php 

include('Includes/db.php');

$sql = "SELECT * FROM cadidates";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>

 <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <h2>candidates</h2>

<table class="table">

    <thead>

        <tr>

        <th>ID</th>

        <th>candidate_name</th>

        <th>Description</th>

        <th>Action</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['candidate_id']; ?></td>

                    <td><?php echo $row['candidate_name']; ?></td>

                    <td><?php echo $row['description']; ?></td>

                    <td><a class="btn btn-info" href="edit.php?candidate_id=<?php echo $row['candidate_id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?candidate_id=<?php echo $row['candidate_id']; ?>">Delete</a></td>

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>