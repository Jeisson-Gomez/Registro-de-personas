<?php
include ("db.php");

if(isset($_GET['Id'])){
    $Id = $_GET['Id'];
    $query = "DELETE FROM task WHERE Id = $Id";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Failed");
    }

    $_SESSION['message'] = ' Tarea removida sactifactoriamente';
    $_SESSION['message_type'] = 'danger';
    header("Location: index.php");
}
?>