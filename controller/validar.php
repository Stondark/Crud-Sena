<?php

$usuario = $_POST['user'];
$contraseña = $_POST['password'];


session_start();
$_SESSION['user'] = $usuario;

include('../controller/db.php');

//$conexion = mysqli_connect("localhost", "root", "12345", "rol");

$consulta = "SELECT*FROM usuarios where nombre = '$usuario' and contraseña = '$contraseña'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if ($filas) {
    header("location:../views/index.php");
} else {
?>
    <?php
    $filas = true;
    include("../views/login.php");
    ?>
    <div class="box">
            <h2>Las credenciales están incorrectas</h2>
    </div>
<?php

}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>