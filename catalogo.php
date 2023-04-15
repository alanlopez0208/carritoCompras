<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito Compras</title>
    <!--Establece la concexion entre css y html en donde href se pone la ubicacion de la carpeta-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta keywords="compras">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://kit.fontawesome.com/469d4cc9f4.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
</head>

<body>
    <header class="d-flex justify-content-between">
        <div class="d-flex">
            <!--el atributo alt es para describe la imagen-->
            <img id="logotipo" src="img/logotipo.jpeg" alt="logotipo de empresa">
            <!--La navegacion donde se pone el menu hamburgesa-->
            <!--Nav es un elemento de bloque lo que significa que ocupa un espacio-->
            <!--Para que sea un elemento en linea se realiza en csss-->
            <div class="topnav" id="myTopnav">
                <a href="#" class="active">Home</a>
                <a href="Catalogo.php">Catalogo</a>
                <a href="Contacto.php">Contacto</a>
                <a href="Surcusales.php">Surcusales</a>
                <!--Esta es el boton hamburgesa-->
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>

        <div id="botones">
            <form action="">
                <input type="text" name="busquedad" id="busquedad">
                <i class="fa-solid fa-magnifying-glass btos"></i>
            </form>
            <i class="fa-regular fa-user btos"></i>
            <i class="fa-solid fa-cart-shopping btos"></i>
        </div>
    </header>
    <main>
        <h3 class="m-4">Catalogo</h3>

        <section class="d-flex justify-content-between" id="cardsPropios">
            <?php
            for ($i = 0; $i < 10; $i++) {
                echo '<div class="card cardPropio">
               <img src="..." class="card-img-top" alt="...">
               <div class="card-body">
                   <h5 class="card-title">Card title</h5>
                   <p class="card-text">Some quick example text to build on the card title.</p>
                   <a href="#" class="btn btn-primary">Go somewhere</a>
               </div>
           </div>
           </div>';
            }
            ?>

        </section>
        <a class="" href="catalogo.php" target="_self">Ver mas...</a>

        <footer>Este es el footer
        </footer>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
<script src="https://kit.fontawesome.com/469d4cc9f4.js" crossorigin="anonymous"></script>

</html>