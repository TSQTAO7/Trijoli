<?php

require_once("../Conect.php");
$con=conectar();


$Id=$_POST['ID'];
$nom=$_POST['NOM'];
$cor=$_POST['COR'];
$est=$_POST['EST'];

$sql="UPDATE donante SET  NOMBRE='$nom',CORREO='$cor',ESTADO_D='$est' WHERE ID_DONANTE='$Id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: Donante.php");
    }
?>