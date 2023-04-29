<?php
$error = $_GET['error'] ? $_GET['error'] : "";
echo '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrador de Contenidos</title>
    <!--Establece la concexion entre css y html en donde href se pone la ubicacion de la carpeta-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <meta keywords="compras" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script
      src="https://kit.fontawesome.com/b72784143d.js"
      crossorigin="anonymous"
    ></script>

    <link rel="stylesheet" type="text/css" href="../css/estilos.css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
  </head>

  <body>
    <header class="d-flex justify-content-between">
        <!--el atributo alt es para describe la imagen-->
        <img id="logotipo" src="../img/logo.jpeg" alt="logotipo de empresa" />
    </header>
    <main>';

echo '
<div class="d-flex justify-content-center" class="d-flex flex-wrap">
  <h1 style="width:100%">Iniciar Sesion en Administrador de Contenidos</h1>
  <p id= "error" style="font-size:50px; color:red; font-weight:500;">'.$error.'</p>
</div>

  <form action="login.php" method="POST" class="modal-content">
    <div class="container">
      <div class=""> 
        <label for="user"><b>USUARIO</b></label>
        <input type="text" name="user">
      </div>
      <div class=""> 
        <label for="pss"><b>Contraseña</b></label>
        <input type="password" name="pss">
      </div>
      <div class=""> 
        <input type="reset" name="cancelar" value="cancelar">

        <input type="submit" name="cancelar" value="Iniciar Sesion">
      </div>
    </div>
</form>

<a href="categorias.php" target="_self">Entrar</a>';

include("footer.php");
?>