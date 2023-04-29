<?php
include("../conexion.php");
include("encabezado.php");
?>
<h1>ADMINISRADOR DE USUARIOS</h1>
<hr>
<table class="table">
    <thead class="thead-dark">
        <tr class="bg-primary">
            <th scope="col">USUARIO/EMAIL</th>
            <th scope="col">CONTRASEÑA</th>
            <th scope="col">IMAGEN</th>
       
            <th scope="col">FECHA REGISTRO</th>
            <th scope="col">MODIFICAR</th>
            <th scope="col">ELIMINAR</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $stmt = $conn->prepare("SELECT * FROM usuarios");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
            echo '<tr>
        <td scope="row">' . $row->usuario . '</td>
        <td>' . $row->pasword . '</td>
        <td><img src="../' . $row->avatar . '" alt="" srcset="" style="width: 50px" ></td>
        <td>' . $row->fecha . '</td>
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