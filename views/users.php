<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-index.css">
    <link rel="icon" type="image/png" href="../logo.png">
    <title>Users</title>
</head>

<?php

?>

<body>
    <?php include "../views/nav.php"; 
    ?>


    <div class="user-div">

        <h1 class="title">Usuarios</h1>
        <a href="../views/register-user.php" class="btn-user"><i class="fas fa-user-plus"></i> Nuevo Usuario</a>
        <table>
            <tr>
                <th>ID</th>
                <th>USUARIO</th>
                <th>ROL</th>
                <th>ACCIONES</th>
            </tr>

            <?php
            include('../controller/db.php');


            $query = mysqli_query($conexion, "SELECT u.id, u.usuario, r.descripcion FROM usuarios u INNER JOIN cargo r ON u.id_cargo = r.id");

            $result = mysqli_num_rows($query);

            if ($result > 0) {
                while ($data  = mysqli_fetch_array($query)) {

            ?>
                    <tr>
                        <td><?php echo $data['id'] ?></td>
                        <td><?php echo $data['usuario'] ?></td>
                        <td><?php echo $data['descripcion'] ?></td>
                        <td>
                            <a href="../views/editer-users.php?id=<?php echo $data['id'];?>"><i class="fas fa-user-edit fa-lg"></i></a>
                            <a href="../controller/delete.php?id=<?php echo $data['id'];?>"><i class="fas fa-user-alt-slash fa-lg"></i></a>
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