<?php
include("../conexion.php");

$categoria = $_POST["cate"];
$catPadre = $_POST["categoriaSup"];
// $img = "img/categorias/" . $_POST["imagen"];
$img = $_FILES['img']['name'] ? "img/categorias/".$_FILES['img']['name'] : "img/categorias/default.png";
$desc = $_POST["descripcion"];

$stm = $conn->prepare("INSERT INTO `categorias`
    (`categoria`, `img`,`categoriaPadre`,`descripcion`)
VALUES (?,?,?,?)");
$stm->bindParam(1, $categoria);
$stm->bindParam(2, $img);
$stm->bindParam(3, $catPadre);
$stm->bindParam(4, $desc);

if ($stm->execute()) {
    include("subirImg.php");
    header("Location:categorias.php");
}

$conn = null;


?>