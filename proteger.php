<?php
session_start();
if (!isset($_SESSION['usu'])) {
    header("Location: ../Index.php");
    exit();
}
?>