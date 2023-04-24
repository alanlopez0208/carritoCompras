<?php
include("../conexion.php");
include("encabezado.php");

$stmt = $conn->prepare("SELECT * FROM categorias");
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();

echo '
<main>
    <div class ="contenedor">
    <h1>ADMINISRADOR DE CATEGORIAS DE PRODUCTOS</h1>
    <!-- Button to open the modal -->
    <button onclick="document.getElementById(\'id01\').style.display=\'block\'">Registrar Producto</button>
    </div>

    <hr>
    <!-- The Modal (contains the Sign Up form) -->
    <div id="id01" class="modal">
        <span onclick="document.getElementById(\'id01\').style.display=\'none\'" class="close" title="Close Modal"><i
                class="fa-solid fa-xmark"></i></span>
        <form class="modal-content" action="altaCat.php" method="POST">
            <div class="container">
                <h1>Crear Categoria Nueva</h1>
                <hr>

                <label for="cate"><b>Categoria</b></label>
                <input type="text" placeholder="Escirbe el nombre de la categoria" name="cate" required>

                <label for="categoriaSup"><b>Categoria Superior</b></label>
                <select name="categoriaSup" id="" style=" min-width: 100%">
                    <option value ="0">Ninguna</option>
                ';
while ($row = $stmt->fetch()) {
    echo '<option value="' . $row->id . '">' . $row->categoria . '</option>';
}
echo '
                </select>
                <label for="descripcion"><b>Descripcion</b></label>
                <textarea name="descripcion" id="descripcion" placeholder="Escriba la descripcion"
                    style=" min-width: 100%;   resize: none;"></textarea>

                <label for="imgen"><b>Imagen</b></label>
                <input type="file" name="imagen" required style="min-width: 100%;">


                <div class="clearfix">
                    <button type="button" class="cancelbtn"
                    onclick="document.getElementById(\'id01\').style.display=\'none\'"
                    >Cancel</button>
                    <button type="submit" class="signupbtn">Registrar Producto</button>
                </div>
            </div>
        </form>
    </div>
    
    
    <table class="table">
        <thead class="thead-dark">
            <tr class="bg-primary">
                <th scope="col">CATEGORIA</th>
                <th scope="col">CATEGORIA SUPERIOR</th>
                <th scope="col">DESCRIPCION</th>
                <th scope="col">IMAGEN</th>
                <th scope="col">MODIFICAR</th>
                <th scope="col">ELIMINAR</th>
            </tr>
        </thead>
    <tbody>
    ';
$stmt = $conn->prepare("SELECT * FROM categorias");
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
    echo '<tr>
        <td scope="row">' . $row->categoria . '</td>';

    $stmt2 = $conn->prepare("SELECT  categoria, categoriaPadre FROM categorias WHERE id = $row->categoriaPadre");
    $stmt2->execute();
    $row2 = $stmt2->fetch(PDO::FETCH_OBJ);
    if ($row2 && ($row2->categoriaPadre != 0)) {
        echo '<td>' . $row2->categoria . '</td>';
    } else {
        echo '<td>Sin Categoria Padre</td>';
    }
    echo '
        <td scope="row">' . $row->descripcion . '</td>
        <td><img src="../' . $row->img . '" alt="" srcset="" style="width: 50px" ></td>
        
        <td><i class="fa-solid fa-pen-to-square"  style="font-size: 40px"
        onclick="document.getElementById(\'id03\').style.display=\'block\';
        editarCategoria(this,
            \''.$row->categoria.'\',
            \''.$row->categoriaPadre.'\',
            \''.$row->img.'\',
            \''.$row->descripcion.'\',
            \''.$row->id.'\',)"></i></td>
        <td><i class="fa-solid fa-delete-left" style="font-size: 40px"
        onclick="document.getElementById(\'id02\').style.display=\'block\';
        idCategoria(this,\'' . strval($row->categoria) . '\',\'' . $row->id . '\')" ></i></td>
    </tr>';
}


echo '</tbody>
    </table>
';
?>


<!-- Form Eliminar Categoria 1-->
<div id="id02" class="modal">
    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal"><i
            class="fa-solid fa-xmark"></i></span>
    <form class="modal-content" action="eliminarCat.php" method="POST">
        <input type="hidden" name="idDel" id="idCatDel">
        <div class="container">
            <h1>Eliminando la Categoria "<span class="delCat"></span>"</h1>
            <hr>
            <p style="font-weight: bold;">¿Estas seguro que deseas eliminar la categoria </b><span
                    class="delCat"></span>?
            </p>
            <div class="clearfix">
                <button type="button" class="cancelbtn"
                    onclick="document.getElementById('id02').style.display='none'">Cancel</button>
                <button type="submit" class="signupbtn">Eliminar Producto</button>
            </div>
        </div>
    </form>
</div>

<!-- Form Editar Categoria -->
<div id="id03" class="modal">
    <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal"><i
            class="fa-solid fa-xmark"></i></span>
    <form class="modal-content" action="editCat.php" method="POST">
        <input type="hidden" name="idEdit" id="idEdit">
        <div class="container">
            <h1>Modoficar Categoria <span  id="editCat"></span></h1>
            <hr>
            <div class="mb-3">
                <label for="catEdit" class="form-label"><b>Categoria</b></label>
                <input type="text" class="form-control" placeholder = "Escribe el nombre de la categoria" name="catEdit" id="catEdit">
            </div>
            <div class="mb-3">
                <label for="catPadreEdit" class="form-label"><b>Categoria Superior</b></label>
              
                <select name="catPadreEdit" id="catPadreEdit" required>
                    <option value="0" selected>Ninguna</option>
                    <?php
                    $stmt = $conn->prepare("SELECT  categoria, categoriaPadre FROM categorias");
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                        echo '<option value="' . $row->id . '">' . $row->categoria . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
            <label for="imgEdit"><b>Imagen</b></label>
                <input type="file" name="imgEdit" id ="imgCatEditSRC" required style="min-width: 100%;">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label"><b>Descripcion</b></label>
                <textarea  type="text" class="form-control" placeholder = "Escribe el nombre de la categoria" name="descEdit" id="descEdit"
                style=" min-width: 100%;   resize: none;"></textarea>
            </div>
            <div class="clearfix">
                <button type="button" class="cancelbtn"
                    onclick="document.getElementById('id02').style.display='none'">Cancel</button>
                <button type="submit" class="signupbtn">Actualizar Producto Producto</button>
            </div>
        </div>
    </form>
</div>

<?php
$conn = null;
include("footer.php");
?>