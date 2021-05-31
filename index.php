<?php include("db.php")?>
<?php include("includes/header.php")?>

<div class = "container p-4">
    <div class = "row">
        <div class="col-md-4">

        <?php if (isset($_SESSION['message'])){?>
            <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php session_unset(); } ?>
            <div class="card card-body">
                <form action = "save_task.php" method = "POST">
                    <div class = "form-group">
                        <input type="text" name = "Nombre" class = "Form-control" placeholder = "Nombre" autofocus>
                    </div>

                    <div class="form-group">
                        <textarea name = "Apellido" rows = "1" class = "form-control" placeholder = "Apellido"></textarea>
                    </div>
                    
                    <input type = "submit" class = "btn btn-success btn-block" name="save_task" value = "Guardar">
                </form>
            </div>
        </div>
        
        <div class="col-md-8">
            <table class = "table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha</th>
                        <th>Accion</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $query = "SELECT * FROM task";
                    $result_tasks = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result_tasks)){ ?>
                        <tr>
                            <td><?php echo $row['Nombre'] ?></td>
                            <td><?php echo $row['Apellido'] ?></td>
                            <td><?php echo $row['Created_at'] ?></td>

                            <td>
                                <a href = "edit.php?Id=<?php echo $row['Id']?>" class = "btn btn-secondary">
                                    <i class = "fas fa-pencil-alt"></i>
                                </a>

                                <a href = "delete_task.php?Id=<?php echo $row['Id']?>" class = "btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php")?>