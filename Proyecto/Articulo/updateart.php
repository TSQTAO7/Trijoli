<?php

require_once("../Conect.php");
$con=conectar();


$Id=$_POST['ID'];
$nom=$_POST['NOM'];
$esta=$_POST['ESTA'];
$tip=$_POST['TIP'];
$cal=$_POST['CAL'];

$sql="UPDATE articulo SET  NOMBRE='$nom',ESTADO_ACTIVIDAD='$esta',TIPO_ARTICULO='$tip',ESTADO_CALIDAD='$cal' WHERE ID_ARTICULO='$Id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: Articulo.php");
    }
?>