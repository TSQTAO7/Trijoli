<?php

require_once("../Conect.php");
$con=conectar();

$Id_art=$_GET['id'];

$sql="DELETE FROM articulo WHERE ID_ARTICULO='$Id_art'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: Articulo.php");
    }
?>