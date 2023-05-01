<?php
include("../conexion.php");
include("encabezado.php");

$idProd = $_GET['id']; //Aqui es donde recibimos el parametro que enviamos por URL(GET)

echo '
<div id="editFormProd" class="modal-contenedor">
        <form class="modal-content" action="editProd.php" method="POST" enctype="multipart/form-data">
';

try{

    $stm= $conn->prepare("SELECT * FROM productos WHERE id = $idProd");
    $stm->execute();
    if($row = $stm->fetch(PDO::FETCH_OBJ)){
        echo'
            <input type="hidden" name="idEditProd" id="idEditProd" value="'. $row->id .'">
    
            <div class="container">
                <h1>Modificar Producto '.$row->producto.'</h1>
                <hr>
                
                <div class="mb-3">
                    <label for="producto"><b>Producto</b></label>
                    <input type="text" placeholder="Escirbe el nombre del Producto" name="producto" required value="'.$row->producto.'">
                </div>

                <div class="mb-3">
                <label for="cantidad"><b>Cantidad</b></label>
                <input type="number" placeholder="Ingresa la cantidad" name="cantidad" required min="0" pattern="[0-9]*"  value="'.$row->catId.'">
                </div>

                <div class="mb-3">
                    <label for="precio"><b>Preico</b></label>
                    <input type="number" placeholder="Ingresa el Precio" name="precio" required min="0" pattern="[0-9]*" value="'.$row->precio.'">
                </div>

                <div class="mb-3">
                    <label for="descripcion"><b>Descripcion</b></label>
                    <textarea name="descripcion" id="descripcion" placeholder="Escriba la descripcion"
                        style=" min-width: 100%;   resize: none;">'.$row->descripcion.'</textarea>
                </div>

                <div class="mb-3">
                    <label for="fecha_registro">Fecha de registro:</label>
                    <input type="date" id="fecha_registro" name="fecha_registro" value="'.$row->fechaReg.'">
                </div>
                <div class="clearfix">
                    <button class="cancelbtn" href="productos.php" >Cancelar</button>
                    <button type="submit" class="signupbtn">Actualizar Producto</button>
                </div>
            </div>
        </form>
    </div>';
    }                    
}catch(PDOException $e){
    echo $e->getMessage();
}
include("footer.php");
?>