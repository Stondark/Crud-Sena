<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
<?php
include("../controller/db.php");
include("../views/inv.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM productos WHERE id = $id";
    $result = mysqli_query($conexion, $query);

    if (!$result) {
?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error al eliminar',
                allowEnterKey: true
            })
        </script>
    <?php
        header("Location: ../views/index.php");
    } else {
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Eliminado con éxito',
                allowEnterKey: true
            })
        </script>
<?php
        header("Refresh:1; url=../views/inv.php");
    }
}


?>