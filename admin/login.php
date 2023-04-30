<?php
    session_start();
    include('../conexion.php');
    $user = $_POST['user'];
    $pass = $_POST['pss'];

    try{
    // Crear una sentencia preparada para evitar inyecciones SQL
    $stm = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ? AND pasword = ?");
    $stm->bindParam(1, $user);
    $stm->bindParam(2, $pass);
    $stm->execute();

    // Verificar que el usuario y la contraseña son correctos
    if($row = $stm->fetch(PDO::FETCH_OBJ)){
        $_SESSION['sessionOn'] = true;
        $_SESSION['user'] = $user;
        $_SESSION['pss'] = $pass;
        header('Location:dock.php');
        exit();
    }else{
        $_SESSION['sessionOn'] = false;
        session_destroy();
        header('Location:index.php?error=Datos incorrectos');   
        exit();
    }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;
?>