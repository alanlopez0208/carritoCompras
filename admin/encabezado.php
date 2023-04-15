<?php
echo '<!DOCTYPE html>
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
      <div class="d-flex">
        <!--el atributo alt es para describe la imagen-->
        <img id="logotipo" src="../img/logo.jpeg" alt="logotipo de empresa" />
        <!--La navegacion donde se pone el menu hamburgesa-->
        <!--Nav es un elemento de bloque lo que significa que ocupa un espacio-->
        <!--Para que sea un elemento en linea se realiza en csss-->
        <div class="topnav" id="myTopnav">
          <a href="#" class="active">Home</a>
          <a href="user.php">Usuarios</a>
          <a href="categorias.php">Categorias</a>
          <a href="productos.php">productos</a>
          <a href="ventas.php">Ventas</a>
          <!--Esta es el boton hamburgesa-->
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
          </a>
        </div>
      </div>

      <div id="botones">
        <form action="">
          <input type="text" name="busquedad" id="busquedad" />
          <i class="fa-solid fa-magnifying-glass btos"></i>
        </form>
        <i class="fa-regular fa-user btos"></i>
      </div>
    </header>';
?>