<?php
    require_once("../proteger.php");
    require_once("../Conect.php");
    $con=conectar();

$id=$_GET['id'];

$sql="SELECT * FROM donante WHERE ID_DONANTE='$id'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../CSS/editar.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <form action="update.php" method="POST">
            <input type="hidden" name="ID" value="<?php echo $row['ID_DONANTE'] ?>">
            <input type="text" class="form-control mb-3" name="NOM" placeholder="NOMBRE" value="<?php echo $row['NOMBRE'] ?>">
            <input type="text" class="form-control mb-3" name="COR" placeholder="CORREO" value="<?php echo $row['CORREO'] ?>">
            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
        </form>
    </div>
</body>
</html>