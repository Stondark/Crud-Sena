<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../logo.png">
    <link rel="stylesheet" href="../css/style-inv.css">
    <title>Inicio</title>
</head>

<body>
<?php include "../views/nav.php"; ?>
<div class="user-div">

        <h1 class="title">Producto</h1>
        <a href="../views/register-user.php" class="btn-user"><i class="fas fa-cart-plus"></i> Nuevo Producto</a>
        <table>
            <tr>
                <th>ID</th>
                <th>PRODUCTO</th>
                <th>CANTIDAD</th>
                <th>PRECIO COMPRA</th>
                <th>PRECIO VENTA</th>
                <th>PRECIO POR MAYOR</th>
                <th>ACCIONES</th>

            </tr>

            <?php
            include('../controller/db.php');


            $query = mysqli_query($conexion, "SELECT * FROM productos");

            $result = mysqli_num_rows($query);

            if ($result > 0) {
                while ($data  = mysqli_fetch_array($query)) {

            ?>
                    <tr>
                        <td><?php echo $data['id'] ?></td>
                        <td><?php echo $data['producto'] ?></td>
                        <td><?php echo $data['cantidad'] ?></td>
                        <td><?php echo $data['precio_compra'] ?></td>
                        <td><?php echo $data['precio_venta'] ?></td>
                        <td><?php echo $data['precio_pormayor'] ?></td>
                        <td>
                            <a href="../views/editer-users.php?id=<?php echo $data['id'];?>"><i class="fas fa-edit fa-lg"></i></a>
                            <a href="../controller/delete.php?id=<?php echo $data['id'];?>"><i class="fas fa-trash-alt fa-lg"></i></a>
                        </td>
                    </tr>

            <?php
                }
            }
            ?>
        </table>
    </div>

</body>

</html>