<?php
include_once("../../connection.php");

$id = $_POST['id'];

$sql = "DELETE FROM register WHERE id=$id";
if (mysqli_query($mysqli, $sql)) {
    header('Location: viewregister.php');
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }

mysqli_close($mysqli);

?>