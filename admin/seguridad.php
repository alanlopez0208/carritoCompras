<?php
session_start();
if($_SESSION['sessionOn'] != true){
    header("Location: index.php?error= Debes de Iniciar sesion para ver esta pagina");
    exit();
}
?>