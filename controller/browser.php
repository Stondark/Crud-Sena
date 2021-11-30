<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../logo.png">
    <link rel="stylesheet" href="../css/style-inv.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Inicio</title>
</head>

<body>
    <?php include "../views/nav.php";

    ?>

    <div class="user-div">

        <h1 class="title">Productos</h1>
        <a href="../views/register-inv.php" class="btn-user"><i class="fas fa-cart-plus"></i> Nuevo Producto</a>
        <div class="browser">
            <form action="../views/inv.php" method="post" class="form_browser">
                <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" class="input-browser">
                <input type="submit" value="Buscar" class="btn-buscar">
        </div>
        </form>
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

            $busqueda = $_POST['busqueda'];

            $query  = mysqli_query($conexion, "SELECT * FROM productos WHERE producto LIKE '%" . $busqueda . "%'");

            $result = mysqli_num_rows($query);

            if ($result > 0) {
                while ($data  = mysqli_fetch_array($query)) {

            ?>
                    <tr>
                        <td><?php echo $data['id'] ?></td>
                        <td><?php echo $data['producto'] ?></td>
                        <?php
                        if ($data['producto' != 0]) {
                        ?>
                            <td><?php echo $data['cantidad']; ?></td>
                        <?php
                        } else {
                            echo "<td class ='agotado'>Agotado</td>";
                        }
                        ?>
                        <td><?php echo $data['precio_compra'] ?></td>
                        <td><?php echo $data['precio_venta'] ?></td>
                        <td><?php echo $data['precio_pormayor'] ?></td>
                        <td>
                            <a href="../views/edit-inv.php?id=<?php echo $data['id']; ?>"><i class="fas fa-edit fa-lg"></i></a>
                            <a href="../controller/delete-inv.php?id=<?php echo $data['id']; ?>"><i class="fas fa-trash-alt fa-lg"></i></a>
                        </td>
                    </tr>

                <?php
                }
            } else {
                ?>
                <script>
                    Swal.fire({
                        icon: "error",
                        title: "El producto no existe",
                        allowEnterKey: true,
                    });
                </script>
            <?php
                header("Refresh:1; url=../views/inv.php", true, 303);
            }

            ?>
        </table>
    </div>

</body>

</html>