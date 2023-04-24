<?php
include("../conexion.php");

$id = $_POST["idEdit"];
$categoria = $_POST["catEdit"];
$catPadre = $_POST["catPadreEdit"];
$img = "img/categorias/" . $_POST["imgEdit"];
$desc = $_POST["descEdit"];

$stm = $conn->prepare("UPDATE `categorias` SET `categoria`=?, `img`=?, `categoriaPadre`=?, `descripcion`=? WHERE `id`=?");
$stm->bindParam(1, $categoria);
$stm->bindParam(2, $img);
$stm->bindParam(3, $catPadre);
$stm->bindParam(4, $desc);
$stm->bindParam(5, $id);

if ($stm->execute()) {
    header("Location:categorias.php");
}
$conn = null;
?>
