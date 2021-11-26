<?php
include("../controller/db.php");

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-login.css">
    <link rel="icon" type="image/png" href="../logo.png">
    <title>Login</title>
</head>

<body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <nav>
        <?php
        if (isset($conexion)) {
            echo "<p class=\"db-connect\">⬤<strong> DB</strong> is connect</p> ";
        } else {

            echo "<p class=\"db-error\">⬤ <strong> DB</strong> error</p> ";
        }
        ?>
    </nav>
    <div class="box">
        <form class="form-box" action="../controller/validar.php" method="post">
            <h1 class="form-title">Inicio de sesión</h1>
            <input type="text" placeholder="Usuario" name="user" id="user" required>
            <input type="password" placeholder="Contraseña" name="password" id="password" required>
            <button type="submit" value="send" name="submit">Entrar</button>
        </form>
    </div>
    </div>
    <?php
    if (isset($filas) === true) {
        ?>
        <script>
        Swal.fire({
            icon: "error",
            title: "Error en las credenciales",
            allowEnterKey: true,
          });
        </script>
    <?php
    } 
    ?>

</body>

</html>