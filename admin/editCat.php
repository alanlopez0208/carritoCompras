<?php
include("../conexion.php");

$id = $_POST["idEdit"];
$categoria = $_POST["catEdit"];
$catPadre = $_POST["catPadreEdit"];
$img = "";

if (empty($_FILES['img']['name'])) {
    $img = $_POST["imgNoChange"];
} else {
    $img = "img/categorias/" . $_FILES['img']['name'];
}

$desc = $_POST["descEdit"];
try {
    $stm = $conn->prepare("UPDATE `categorias` SET `categoria`=?, `img`=?, `categoriaPadre`=?, `descripcion`=? WHERE `id`=?");
    $stm->bindParam(1, $categoria);
    $stm->bindParam(2, $img);
    $stm->bindParam(3, $catPadre);
    $stm->bindParam(4, $desc);
    $stm->bindParam(5, $id);

    if ($stm->execute()) {
        include("subirImg.php");
        header("Location:categorias.php");
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>