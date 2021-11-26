<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
include('../controller/db.php');
include('../views/users.php');


if (isset($_POST['submit-btn'])) {
    $name = $_POST['name'];
    $user = $_POST['user'];
    $contraseña = $_POST['contraseña'];
    $rol = $_POST['rol'];

    $query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre = '$name' OR usuario = '$user'");
    $result = mysqli_fetch_array($query);

    if ($result > 0) {
        ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "El usuario y/o nombre ya existen",
                allowEnterKey: true,
            });
            
        </script>
        
        <?php
    } else {

        $query_insert = mysqli_query($conexion, "INSERT INTO usuarios(nombre, usuario, contraseña, id_cargo) VALUES ('$name', '$user', '$contraseña', '$rol')");
        if ($query_insert) {
            ?>
            <script>Swal.fire({
                icon: 'success', 
                title: 'Registrado con éxito', 
                allowEnterKey: true})</script>
            <?php
            header("Refresh:1; url=../views/users.php", true, 303);
        } else {
            ?>
            <script>Swal.fire({
                icon: 'error', 
                title: 'Error en el registro', 
                allowEnterKey: true})</script>
            <?php
        }
    }
}

?>

    
</body>

</html>

<?php
