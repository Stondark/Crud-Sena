<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

</body>

</html>
<?php

$usuario = $_POST['user'];
$contraseña = $_POST['password'];

//$pass_encriptada = password_hash($contraseña, PASSWORD_DEFAULT);


session_start();
$_SESSION['user'] = $usuario;
include('../views/login.php');
include('../controller/db.php');

//$conexion = mysqli_connect("localhost", "root", "12345", "rol");

$consulta = "SELECT*FROM usuarios where nombre = '$usuario'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);
$desencriptar_contraseña = mysqli_fetch_array($resultado);

if (($filas == 1) && (password_verify($contraseña, $desencriptar_contraseña['contraseña']))) {

?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Inicio de sesión correcto',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php
    header("Refresh:1; url=../views/index.php");
} else {
?>
    <?php
    $filas = true;
    ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Inicio de sesión incorrecto',
            showConfirmButton: false,
            timer: 1500
        })
    </script>

<?php
    header("Refresh:1; url=../views/login.php");
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>