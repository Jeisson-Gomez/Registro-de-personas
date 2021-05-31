<?php

include ("db.php");

if(isset($_POST['save_task'])){
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];

    $query = "INSERT INTO task(Nombre, Apellido) VALUE('$Nombre', '$Apellido')";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query failled");
    }

    $_SESSION['message'] = 'Guardado Exitosamente';
    $_SESSION['message_type'] = 'success';
    header("location: index.php");
}

?>