<?php
include("db.php");

if(isset($_GET['Id'])){
    $Id = $_GET['Id'];
    $query = "SELECT * FROM task WHERE Id = $Id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $Nombre = $row['Nombre'];
        $Apellido = $row['Apellido'];
    }
}

if(isset($_POST['update'])){
    $Id = $_GET['Id'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];

    $query = "UPDATE task set Nombre = '$Nombre', Apellido = '$Apellido' WHERE Id = $Id";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Tarea Actualizada Sactifactoriamente';
    $_SESSION['message_type'] =' Dark';
    header("Location: index.php");
}
?>

<?php include("includes/header.php")?>

<div class = "container p-4">
    <div class = "row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action = "edit.php?Id=<?php echo $_GET['Id']; ?>" method = "POST">
                    <div class = "form-group">
                        <input type = "text" name = "Nombre" value = "<?php echo $Nombre; ?>" class = "form-control" placeholder = "Nombre">
                    </div>

                    <div class = "form-group">
                        <textarea name = "Apellido" rows = "2" class = "form-control" placeholder = "Apellido"><?php echo $Apellido; ?></textarea>
                    </div>

                    <button class = "btn btn-success" name = "update">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php")?>