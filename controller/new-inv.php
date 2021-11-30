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
include('../views/inv.php');


if (isset($_POST['submit-btn'])) {
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $precio_compra = $_POST['precio_compra'];
    $precio_venta = $_POST['precio_venta'];
    $precio_pormayor = $_POST['precio_pormayor'];


    $query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre = '$producto'");
    $result = mysqli_fetch_array($query);

    if ($result > 0) {
        ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "El producto ya existe",
                allowEnterKey: true,
            });
            
        </script>
        
        <?php
    } else {

        $query_insert = mysqli_query($conexion, "INSERT INTO productos(cantidad, precio_compra, precio_venta, precio_pormayor, producto) 
                                                VALUES ($cantidad, $precio_compra,$precio_venta, $precio_pormayor, '$producto')");
        if ($query_insert) {
            ?>
            
            <script>Swal.fire({
                icon: 'success', 
                title: 'Producto registrado con éxito', 
                allowEnterKey: true})</script>
            <?php
            header("Refresh:1; url=../views/inv.php");
        } else {
            ?>
            <script>Swal.fire({
                icon: 'error', 
                title: 'Error en el registro del producto', 
                allowEnterKey: true})</script>
            <?php
        }
    }
}

?>

    
</body>

</html>

<?php
