<?php
include("../conexion.php");

$id = $_POST["idDel"];

$stm = $conn->prepare("DELETE FROM productos WHERE id = $id");

if ($stm->execute()) {
    header("Location:productos.php");
}

$conn = null;

echo 'SE HA ELIMINADO DE MANERA CORRECTA';


?>