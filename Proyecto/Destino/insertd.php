<?php
require_once("../Conect.php");
$con = conectar();
$COR = $_POST['Cor'] ?? '';
$EST1 = $_POST['Est1'] ?? '';

// Verificar que se hayan recibido los valores esperados
if ($NOM !== '' && $COR !== '' && $EST1 !== '') {
    // Escapar los valores para evitar inyección de SQL (recomendado)
    $NOM = mysqli_real_escape_string($con, $NOM);
    $COR = mysqli_real_escape_string($con, $COR);
    $EST1 = mysqli_real_escape_string($con, $EST1);

    // Preparar la consulta SQL para el segundo formulario
    $sql2 = "INSERT INTO destino (FECHA_ENTREGA, ARTICULO_ENTREGADO) VALUES ('$COR','$EST1')";
    $query2 = mysqli_query($con, $sql2);

    if ($query2) {
        header("Location: dest.php");
        exit();
    } else {
        echo "Error en la consulta SQL 2: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
