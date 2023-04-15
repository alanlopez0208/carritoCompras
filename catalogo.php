<?php
include("conexion.php");
echo '
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
    <script
    src="https://kit.fontawesome.com/b72784143d.js"
    crossorigin="anonymous"
    ></script>
  
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
</head>

<body>
    <header class="d-flex justify-content-between">
        <div class="d-flex">
            <!--el atributo alt es para describe la imagen-->
            <img id="logotipo" src="img/logo.jpeg" alt="logotipo de empresa" />
            <!--La navegacion donde se pone el menu hamburgesa-->
            <!--Nav es un elemento de bloque lo que significa que ocupa un espacio-->
            <!--Para que sea un elemento en linea se realiza en csss-->
            <div class="topnav" id="myTopnav">
                <a href="index.html" >Home</a>
                <a href="#" class="active">Catalogo</a>
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

        <section class="d-flex justify-center" id="cardsPropios">';
?>
<?php
try {
    $stmt = $conn->prepare("SELECT * FROM categorias");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        echo '<div class="card cardPropio">
                            <img src="' . $row->img . '" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">' . strtoupper($row->categoria) . '</h5>
                                <p class="card-text">' . $row->descripcion . '</p>
                                <a href="productos.php" class="btn btn-primary">Ver Catalogo</a>
                                <a href="#">Mas Info</a>
                            </div>
                        </div>';
    }
} catch (PDOException $e) {
    // Manejo de errores
    echo "Error de conexión: " . $e->getMessage();
}
$conn = null;
?>
<?php
echo '</section>
    <a class="" href="catalogo.php" target="_self">Ver mas...</a>

    <footer>Este es el footer
    </footer>
    </main>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/469d4cc9f4.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    </html>';
?>