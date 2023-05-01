<?php
include("../conexion.php");
include("encabezado.php");

$idCat = $_GET['id']; //Aqui es donde recibimos el parametro que enviamos por URL(GET)

echo '
<div id="editForm" class="modal-contenedor">
        <form class="modal-content" action="editCat.php" method="POST" enctype="multipart/form-data">
';

try{

    $stm= $conn->prepare("SELECT * FROM categorias WHERE id = $idCat");
    $stm->execute();
    if($row = $stm->fetch(PDO::FETCH_OBJ)){
        echo'
        
            <input type="hidden" name="idEdit" id="idEdit" value="'. $row->id .'">
    
            <div class="container">
                <h1>Modificar Categoria '.$row->categoria.'</h1>
                <hr>
                <div class="mb-3">
                    <label for="catEdit" class="form-label"><b>Categoria</b></label>
                    <input type="text" class="form-control" placeholder="Escribe el nombre de la categoria" name="catEdit" id="catEdit" value="'.$row->categoria.'">
                </div>
                <div class="mb-3">
                    <label for="catPadreEdit" class="form-label"><b>Categoria Superior</b></label>
                  
                    <select name="catPadreEdit" id="catPadreEdit" required>
                        <option value="0">Ninguna</option>';
                        $stmt = $conn->prepare("SELECT  * FROM categorias");
                        $stmt->execute();
                        while ($row2 = $stmt->fetch(PDO::FETCH_OBJ)) {
                            echo '<option value="' . $row2->id . '"';
                            if($row2->id == $row->categoriaPadre){
                                echo 'selected';
                            }
                            echo'>' . $row2->categoria . '</option>';
                        }
        echo'   </select>
                        </div>
                        <div class="mb-3">
                            <label for="imgEdit"><b>Imagen</b></label>
                            <img src="../'.$row->img.'" id="imgCatEdit" style="width:200px">
                            <input type="hidden" name="imgNoChange" id="imgNoChange" value="'. $row->img .'">
                            <input type="file" name="img" id ="imgCatEditSRC" style="min-width: 100%;">
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label"><b>Descripcion</b></label>
                            <textarea  type="text" class="form-control" placeholder="Escribe el nombre de la categoria" name="descEdit" id="descEdit"
                            style="min-width: 100%;resize: none;">'.$row->descripcion.'</textarea>
                        </div>
                        <div class="clearfix">
                            <button class="cancelbtn" href="categorias.php">Cancelar</button>
                            <button type="submit" class="signupbtn">Actualizar Categoria</button>
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