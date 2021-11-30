<?php
include("../controller/db.php");

if (empty($_REQUEST['id'])) {
    header("location: ../views/inv.php");
    mysqli_close($conexion);
}
$iduser = $_GET['id'];

$query = mysqli_query($conexion, "SELECT * FROM productos WHERE id = $iduser");

$result = mysqli_num_rows($query);

if ($result == 0) {
    header("location: ../views/users.php");
?>

    <script>
        Swal.fire({
            icon: "error",
            title: "El producto no existe no existe",
            allowEnterKey: true,
        });
    </script>

<?php
} else { /* Acá mostramos los datos en pantalla*/
    while ($data = mysqli_fetch_array($query)) {
        $iduser = $data['id'];
        $producto = $data['producto'];
        $cantidad = $data['cantidad'];
        $precio_compra = $data['precio_compra'];
        $precio_venta = $data['precio_venta'];
        $precio_pormayor = $data['precio_pormayor'];
    }
}

if (isset($_POST['update'])) {
    $iduser = $_GET['id'];
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $precio_compra = $_POST['precio_compra'];
    $precio_venta = $_POST['precio_venta'];
    $precio_pormayor = $_POST['precio_pormayor'];
    $query = "UPDATE productos 
        SET producto = '$producto', cantidad = $cantidad, precio_compra = $precio_compra, precio_venta = $precio_venta, precio_pormayor = $precio_pormayor
        WHERE id = $iduser";
    mysqli_query($conexion, $query);
?>
    <script>
        Swal.fire({
            icon: "success",
            title: "El producto fue editado correctamente",
            allowEnterKey: true,
        });
    </script>
<?php
    header("Refresh:1; url=../views/inv.php");
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php include "../views/nav.php"; ?>
    <div class="content">
        <h1 class="form-title">Editar producto</h1>
        <div class="box">
            <div class="ejercicio1">
                <form action="../views/edit-inv.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <input type="text" placeholder="Producto" name="producto" id="producto" required value="<?php echo $producto ?>">
                    <input type="text" placeholder="Cantidad" name="cantidad" id="cantidad" required value="<?php echo $cantidad ?>">
                    <input type="text" placeholder="Precio compra" name="precio_compra" id="precio_compra" required value="<?php echo $precio_compra ?>">
                    <input type="text" placeholder="Precio venta" name="precio_venta" id="precio_venta" required value="<?php echo $precio_venta ?>">
                    <input type="text" placeholder="Precio por mayor" name="precio_pormayor" id="precio_pormayor" required value="<?php echo $precio_pormayor ?>">
                    <button type="submit" value="send" name="update">Editar</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>