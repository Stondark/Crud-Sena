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


session_start();
$_SESSION['user'] = $usuario;
include('../views/login.php');
include('../controller/db.php');

//$conexion = mysqli_connect("localhost", "root", "12345", "rol");

$consulta = "SELECT*FROM usuarios where nombre = '$usuario' and contraseña = '$contraseña'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if ($filas) {

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
    header("Refresh:1; url=../views/index.php", true, 303);
} else {
?>
    <?php
    $filas = true;
    ?>
    <div class="box">
        <h2>Las credenciales están incorrectas</h2>
    </div>
<?php

}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>