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
    <?php include "../views/nav.php";
    ?>

    <div class="user-div">

        <h1 class="title">Ventas</h1>
        <a href="../views/register-inv.php" class="btn-user"><i class="fas fa-plus"></i> Nueva venta</a>
        <div class="browser">
            <form action="../controller/browser.php" method="post" class="form_browser">
                <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" class="input-browser">
                <input type="submit" value="Buscar" class="btn-buscar">
        </div>
        </form>
        <table>
            <tr>
                <th>ID</th>
                <th>CLIENTE</th>
                <th>NÚMERO</th>
                <th>DIRECCIÓN</th>
                <th>PRODUCTOS</th>
                <th>CANTIDAD</th>
                <th>TIPO ENVÍO</th>
                <th>VENDEDOR</th>
                <th>ESTADO</th>
                <th>TOTAL</th>
                <th>ACCIONES</th>

            </tr>

            <?php
            include('../controller/db.php');


            $query = mysqli_query($conexion, "SELECT
            v.id,
            v.cliente,
            p.producto,
            v.numero,
            v.direccion,
            v.cantidad,
            t.envio,
            u.usuario,
            e.estado,
            v.total
        FROM
            venta v
        JOIN productos p ON
            v.productos = p.id
        JOIN tipo_envios t ON
            v.tipo_envio = t.id
        JOIN usuarios u ON
            v.vendedor = u.id
        JOIN estado_envio e ON
            v.estado = e.id");

            $result = mysqli_num_rows($query);

            if ($result > 0) {
                while ($data  = mysqli_fetch_array($query)) {

            ?>
                    <tr>
                        <td><?php echo $data['id'] ?></td>
                        <td><?php echo $data['cliente'] ?></td>
                        <td><?php echo $data['numero'] ?></td>
                        <td><?php echo $data['direccion'] ?></td>
                        <td><?php echo $data['producto'] ?></td>
                        <td><?php echo $data['cantidad'] ?></td>
                        <td><?php echo $data['envio'] ?></td>
                        <td><?php echo $data['usuario'] ?></td>
                        <?php 
                        if($data['estado'] === 'Entregado'){
                            ?>
                            <td class="entregado"><?php echo $data['estado'] ?></td>
                        <?php
                        } else{
                            ?>
                            <td class="agotado"><?php echo $data['estado'] ?></td>
                            <?php
                        }
                        ?>
                        <td><?php echo $data['total'] ?></td>
                        <td>
                            <a href="../views/view-venta.php?id=<?php echo $data['id']?>"><i class="fas fa-eye fa-lg"></i></a>
                            <a href="../views/edit-venta.php?id=<?php echo $data['id']; ?>"><i class="fas fa-edit fa-lg"></i></a>
                            <a href="../controller/delete-venta.php?id=<?php echo $data['id']; ?>"><i class="fas fa-trash-alt fa-lg"></i></a>
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