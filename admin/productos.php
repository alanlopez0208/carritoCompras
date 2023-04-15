<?php
include("../conexion.php");
include("encabezado.php");
?>

<!-- Button to open the modal -->
<button onclick="document.getElementById('id01').style.display='block'">Sign Up</button>

<!-- Inicio Alta Productos-->
<form action="altaCat.php" style="border:1px solid #ccc">
    <div class="container">
        <h1>Añadir Productos Nuevos</h1>
        <hr>

        <label for="categoria"><b>Categoria</b></label>
        <input type="text" placeholder="Escirbe el nombre de la categoria" name="categoria" required>

        <label for="categoriaSup"><b>Categoria Superior</b></label>
        <select name="categoriaSup" id="" style=" min-width: 100%">
            <option value="0">Ninguna</option>
            <option value="1">Salas</option>
            <option value="2">Muebles</option>
            <option value="2">Recamaras</option>
        </select>
        <label for="descripcion"><b>Descripcion</b></label>
        <textarea name="descripcion" id="descripcion" placeholder="Escriba la descripcion"
            style=" min-width: 100%;   resize: none;"></textarea>

        <label for="imgen"><b>Imagen</b></label>
        <input type="file" name="imagen" required style="min-width: 100%;">


        <div class="clearfix">
            <button type="button" class="cancelbtn">Cancel</button>
            <button type="submit" class="signupbtn">Registrar Producto</button>
        </div>
    </div>
</form>
<br>
<!-- Fin Alta Productos  -->
<h1>ADMINISRADOR DE PRODUCTOS</h1>
<hr>
<table class="table">
    <thead class="thead-dark">
        <tr class="bg-primary">
            <th scope="col">PRODUCTO</th>
            <th scope="col">IMAGEN</th>
            <th scope="col">CANTIDAD</th>
            <th scope="col">PRECIO</th>
            <th scope="col">DESCRIPCION</th>
            <th scope="col">FECHA REGISTRO</th>
            <th scope="col">MODIFICAR</th>
            <th scope="col">ELIMINAR</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $stmt = $conn->prepare("SELECT * FROM productos");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
            echo '<tr>
        <td scope="row">' . $row->producto . '</td>
        <td><img src="../' . $row->img . '" alt="" srcset="" style="width: 50px" ></td>
        <td>' . $row->catId . '</td>
        <td>' . $row->precio . '</td>
        <td>' . $row->descripcion . '</td>
        <td>' . $row->fechaReg . '</td>
        <td><i class="fa-solid fa-pen-to-square"  style="font-size: 40px"></i></td>
        <td><i class="fa-solid fa-delete-left" style="font-size: 40px"></i></td>
    </tr>';
        }
        $conn = null;
        ?>
    </tbody>
</table>
<?php
include("footer.php");
?>