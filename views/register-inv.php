<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-index.css">
    <link rel="icon" type="image/png" href="../logo.png">
    <title>Register inv</title>
</head>

<body>
    <?php include "../views/nav.php"; 
    include "../controller/db.php";?>
    <div class="content">
        <h1 class="form-title">Añadir nuevo producto</h1>
        <div class="box">
            <div class="ejercicio1">
                <form action="../controller/new-inv.php" method="post">
                <input type="text" placeholder="Producto" name="producto" id="producto" required>
                <input type="text" placeholder="Cantidad" name="cantidad" id="cantidad" required>
                <input type="text" placeholder="Precio compra" name="precio_compra" id="precio_compra" required>
                <input type="text" placeholder="Precio venta" name="precio_venta" id="precio_venta" required>
                <input type="text" placeholder="Precio por mayor" name="precio_pormayor" id="precio_pormayor" required>
                <button type="submit" value="send" name="submit-btn">Añadir</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>