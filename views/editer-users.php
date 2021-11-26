<?php
include("../controller/db.php");

if (empty($_REQUEST['id'])) {
    header("location: ../views/users.php");
    mysqli_close($conexion);
}
$iduser = $_GET['id'];

$query = mysqli_query($conexion, "SELECT u.id, u.usuario, u.nombre ,u.contraseña, u.id_cargo ,r.descripcion FROM usuarios u INNER JOIN cargo r ON u.id_cargo = r.id WHERE u.id = $iduser ");

$result = mysqli_num_rows($query);

if ($result == 0) {
    header("location: ../views/users.php");
?>

    <script>
        Swal.fire({
            icon: "error",
            title: "El usuario no existe",
            allowEnterKey: true,
        });
    </script>

<?php
} else { /* Acá mostramos los datos en pantalla*/
    $option = '';
    while ($data = mysqli_fetch_array($query)) {
        $iduser = $data['id'];
        $usuario = $data['usuario'];
        $contraseña = $data['contraseña'];
        $nombre = $data['nombre'];
        $descripcion = $data['descripcion'];
        $id_cargo = $data['id_cargo'];

        if ($id_cargo == 1) {
            $option = '<option value="1" select>Administrador</option>';
        } elseif ($id_cargo == 2) {
            $option = '<option value="1" select>Vendedor</option> ';
        }
    }
}

if (isset($_POST['update'])) {
    $iduser = $_GET['id'];
    $usuario = $_POST['user'];
    $contraseña = $_POST['contraseña'];
    $nombre = $_POST['name'];
    $id_cargo = $_POST['rol'];
    $query = "UPDATE usuarios 
        SET nombre = '$nombre', usuario = '$usuario', contraseña = '$contraseña', id_cargo = $id_cargo
        WHERE id = $iduser";
    mysqli_query($conexion, $query);
?>
    <script>
        Swal.fire({
            icon: "success",
            title: "El usuario fue editado correctamente",
            allowEnterKey: true,
        });
    </script>
<?php
    header("Refresh:1; url=../views/users.php", true, 303);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-index.css">
    <link rel="icon" type="image/png" href="../logo.png">
    <title>Edit user</title>
</head>


<body>
    <?php include "../views/nav.php"; ?>
    <div class="content">
        <h1 class="form-title">Editar usuario</h1>
        <div class="box">
            <div class="ejercicio1">
                <form action="../views/editer-users.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <input type="text" placeholder="Nombre" name="name" id="name" required value="<?php echo $nombre ?>">
                    <input type="text" placeholder="Usuario" name="user" id="user" required value="<?php echo $usuario ?>">
                    <input type="text" placeholder="Contraseña" name="contraseña" id="contraseña" required value="<?php echo $contraseña ?>">
                    <div class="selected">
                        <select id="rol" name="rol" placeholder="Ingrese un rol" required class="edit-user-select">
                            <?php
                            echo $option;
                            ?>
                            <option id="Admin" value="0">Ingrese el cargo</option>
                            <option id="Admin" value="1">Administrador</option>
                            <option id="Vendedor" value="2">Vendedor</option>
                        </select>
                    </div>
                    <button type="submit" value="send" name="update">Editar</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>