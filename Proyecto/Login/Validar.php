<?php
require_once("../Conect.php");
$con = conectar();

$usu = $_POST['usu'];
$contra = $_POST['contra'];
session_start();
$_SESSION['usu'] = $usu;

$sql = "SELECT * FROM usuario where NOMBRE_USUARIO='$usu' and CONTRA='$contra'";
$resultado = mysqli_query($con, $sql);

$filas = mysqli_num_rows($resultado);

if ($filas) {
    header("Location:../Dashboard/Dashboard.php");
} else {
    mysqli_free_result($resultado);
    mysqli_close($con);
    $_SESSION['error'] = "ERROR EN LA AUTENTICACION";
    header("Location:../Index.php");
    exit();
}
?>
