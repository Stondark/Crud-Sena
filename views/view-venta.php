<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta</title>
</head>
<body>
    <?php include("../views/nav.php");
    include("../controller/db.php");
    $iduser = $_GET['id'];
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

    while($data = mysqli_fetch_array($query) ){
        $user = $data['cliente'];
        $num = $data['numero'];
        $direccion = $data['direccion'];
        $producto = $data['producto']; 
        $cantidad = $data['cantidad'] ;
        $envio = $data['envio'];
        $vendedor = $data['usuario']; 
    }

        
    
    ?>
    <div class="box">
        <div class="box-inter">
        <h1>Venta de <span class="bold-php"><?php echo "$user";?></span></h1>
        <p>Nombre cliente: <span class="bold-php"><?php echo "$user";?></span></p>
        <p>Número: <span class="bold-php"><?php echo "$num";?></span></p>
        <p>Dirección: <span class="bold-php"><?php echo "$direccion";?></span></p>
        <p>Producto: <span class="bold-php"><?php echo "$producto";?></span></p>
        <p>Cantidad: <span class="bold-php"><?php echo "$cantidad";?></span></p>
        <p>Envío: <span class="bold-php"><?php echo "$envio";?></span></p>
        <p>Vendedor:<span class="bold-php"> <?php echo "$vendedor";?></span></p>
        <a href="../views/index.php" class="button-back">VOLVER</a>
        </div>
        
    </div>
    
</body>
</html>