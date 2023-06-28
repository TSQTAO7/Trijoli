<?php
require_once("../Conect.php");
$con = conectar();

$Nom = $_POST['Nom'] ?? '';
$EstA = $_POST['EstA'] ?? '';
$TipA = $_POST['TipA'] ?? '';
$EstC = $_POST['EstCal'] ?? '';
$IdEmp = $_POST['Emp'] ?? '';

// Verificar que se hayan recibido los valores esperados
if ($Nom !== '' && $EstA !== '' && $TipA !== '' && $EstC !== '' && $IdEmp !== '') {
    // Escapar los valores para evitar inyección de SQL (recomendado)
    $Nom = mysqli_real_escape_string($con, $Nom);
    $EstA = mysqli_real_escape_string($con, $EstA);
    $TipA = mysqli_real_escape_string($con, $TipA);
    $EstC = mysqli_real_escape_string($con, $EstC);
    $IdEmp = mysqli_real_escape_string($con, $IdEmp);

    // Preparar la consulta SQL para el primer formulario
    $sql1 = "INSERT INTO articulo (NOMBRE, ESTADO_ACTIVIDAD, TIPO_ARTICULO, ESTADO_CALIDAD, ID_EMPLEADO_FK_ARTICULO) VALUES ('$Nom','$EstA','$TipA','$EstC','$IdEmp')";
    $query1 = mysqli_query($con, $sql1);

    if ($query1) {
        header("Location: ../Articulo/Articulo.php");
        exit();
    } else {
        echo "Error en la consulta SQL 1: " . mysqli_error($con);
    }
}

$NOM = $_POST['Nom1'] ?? '';
$COR = $_POST['Cor'] ?? '';
$EST1 = $_POST['Est1'] ?? '';

// Verificar que se hayan recibido los valores esperados
if ($NOM !== '' && $COR !== '' && $EST1 !== '') {
    // Escapar los valores para evitar inyección de SQL (recomendado)
    $NOM = mysqli_real_escape_string($con, $NOM);
    $COR = mysqli_real_escape_string($con, $COR);
    $EST1 = mysqli_real_escape_string($con, $EST1);

    // Preparar la consulta SQL para el segundo formulario
    $sql2 = "INSERT INTO donante (NOMBRE, CORREO, ESTADO_D) VALUES ('$NOM','$COR','$EST1')";
    $query2 = mysqli_query($con, $sql2);

    if ($query2) {
        header("Location: ../Donante/Donante.php");
        exit();
    } else {
        echo "Error en la consulta SQL 2: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
