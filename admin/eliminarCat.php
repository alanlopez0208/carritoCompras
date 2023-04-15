<?php
include("../conexion.php");

$id = $_POST["idDel"];

$stm = $conn->prepare("DELETE FROM categorias WHERE id = $id");

if ($stm->execute()) {
    header("Location:categorias.php");
}

$conn = null;

echo 'SE HA ELIMINADO DE MANERA CORRECTA';


?>