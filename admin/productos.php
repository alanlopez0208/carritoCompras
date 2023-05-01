<?php
include("../conexion.php");
include("encabezado.php");
header('Cache-Control: max-age=360'); 

$stmt = $conn->prepare("SELECT * FROM productos");
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();

echo '
<main>
    <div class ="contenedor">
    <h1>ADMINISRADOR DE CATEGORIAS DE PRODUCTOS</h1>
    <!-- Button to open the modal -->
    <button onclick="document.getElementById(\'altaProd\').style.display=\'block\'">Registrar Producto</button>
    </div>

    <hr>
    <!-- The Modal (contains the Sign Up form) -->
    <div id="altaProd" class="modal">
        <span onclick="document.getElementById(\'altaProd\').style.display=\'none\'" class="close" title="Close Modal"><i
                class="fa-solid fa-xmark"></i></span>
        <form class="modal-content" action="altaProd.php" method="POST" enctype="multipart/form-data">
            <div class="container">
                <h1>Crear Producto Nuevo</h1>
                <hr>

                <label for="producto"><b>Producto</b></label>
                <input type="text" placeholder="Escirbe el nombre del Producto" name="producto" required>

                <select name="catPtoductos" style=" min-width: 100%">
                <option value ="0" >Ninguna</option>
                ';
                
                $stmt2 = $conn->prepare("SELECT * FROM categorias");
                $stmt2->setFetchMode(PDO::FETCH_OBJ);
                $stmt2->execute();
                while ($row = $stmt2->fetch()) {
                    echo '<option value="' . $row->id . '">' . $row->categoria . '</option>';
                }
                echo '
                </select>
                <label for="precio"><b>Preico</b></label>
                <input type="number" placeholder="Ingresa el Precio" name="precio" required min="0" pattern="[0-9]*">

                <label for="descripcion"><b>Descripcion</b></label>
                <textarea name="descripcion" id="descripcion" placeholder="Escriba la descripcion"
                    style=" min-width: 100%;   resize: none;"></textarea>


                <label for="fecha_registro">Fecha de registro:</label>
                <input type="date" id="fecha_registro" name="fecha_registro">
                    

                <div class="clearfix">
                    <button type="button" class="cancelbtn"
                    onclick="document.getElementById(\'altaProd\').style.display=\'none\'"
                    >Cancel</button>
                    <button type="submit" class="signupbtn">Registrar Producto</button>
                </div>
            </div>
        </form>
    </div>
    
    
    <table class="table">
        <thead class="thead-dark">
            <tr class="bg-primary">
                <th scope="col">PRODUCTO</th>
                <th scope="col">CATEGORIA</th>
                <th scope="col">PRECIO</th>
                <th scope="col">DESCRIPCION</th>
                <th scope="col">FECHA REGISTRO</th>
                <th scope="col">MODIFICAR</th>
                <th scope="col">ELIMINAR</th>
            </tr>
        </thead>
        <tbody>
    ';

while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
    echo '<tr>
        <td scope="row">' . $row->producto . '</td>';

        $stmt3 = $conn->prepare("SELECT categorias.categoria FROM productos JOIN categorias ON categorias.id = $row->cateId");
        $stmt3->execute();
        if(($row3 = $stmt3->fetch(PDO::FETCH_OBJ))){
            echo   '<td scope="row">' . $row3->categoria .'</td>';
        }
        echo'
        <td scope="row">' . $row->precio . '</td>
        <td scope="row">' . $row->descripcion . '</td>
        <td scope="row">' . $row->fechaReg . '</td>
        
        <td><a href="editProdForm.php?id='.$row->id.'"><i class="fa-solid fa-pen-to-square"  style="font-size: 40px"
        onclick=""></i></a></td>
        <td><i class="fa-solid fa-delete-left" style="font-size: 40px"
        onclick="document.getElementById(\'eliminarProd\').style.display=\'block\';
        idProducto(this,\'' . strval($row->producto) . '\',\'' . $row->id . '\')" ></i></td>
    </tr>';
}


echo '</tbody>
    </table>
';
?>


<!-- Form Eliminar Categoria 1-->
<div id="eliminarProd" class="modal">
    <span onclick="document.getElementById('eliminarProd').style.display='none'" class="close" title="Close Modal"><i
            class="fa-solid fa-xmark"></i></span>
    <form class="modal-content" action="eliminarProd.php" method="POST">
        <input type="hidden" name="idDel" id="iddelProd">
        <div class="container">
            <h1>Eliminando el Producto"<span class="delProd"></span>"</h1>
            <hr>
            <p style="font-weight: bold;">¿Estas seguro que deseas eliminar la categoria </b><span
                    class="delProd"></span>?
            </p>
            <div class="clearfix">
                <button type="button" class="cancelbtn"
                    onclick="document.getElementById('eliminarProd').style.display='none'">Cancelar</button>
                <button type="submit" class="signupbtn">Eliminar Producto</button>
            </div>
        </div>
    </form>
</div>

<?php
$conn = null;
include("footer.php");
?>