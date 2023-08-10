<?php

require_once("../Conect.php");
$con=conectar();

$Id_donante=$_GET['id'];

$sql="DELETE FROM donante WHERE ID_DONANTE='$Id_donante'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: Donante.php");
    }
?>