<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-index.css">
    <link rel="icon" type="image/png" href="../logo.png">
    <title>Register user</title>
</head>

<body>
    <?php include "../views/nav.php"; 
    include "../controller/db.php";?>
    <div class="content">
        <h1 class="form-title">Añadir nuevo usuario</h1>
        <div class="box">
            <div class="ejercicio1">
                <form action="../controller/new-user.php" method="post">
                <input type="text" placeholder="Nombre" name="name" id="name" required>
                <input type="text" placeholder="Usuario" name="user" id="user" required>
                <input type="text" placeholder="Contraseña" name="contraseña" id="contraseña" required>
                <div class="selected">
                <select id="rol" name="rol" placeholder="Ingrese un rol" required>
                    <option id="Admin" value="0r">Ingrese el cargo</option>
                    <option id="Admin" value="1">Administrador</option>
                    <option id="Vendedor" value="2">Vendedor</option>
                </select>
                </div>
                <button type="submit" value="send" name="submit-btn">Añadir</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>