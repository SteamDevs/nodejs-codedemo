<?php

$result = false;

//paso 1
require_once 'conexion.php';

//paso 2
if(!empty($_POST)){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];

    $sql = "INSERT INTO users(nombre, apellido) VALUES(:nombre, :apellido)";
    $preparando_consulta_ins = $pdo->prepare($sql);

    //paso 3
    $result = $preparando_consulta_ins->execute([
        'nombre' => $nombre,
        'apellido' => $apellido 
    ]);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <a href="index.php">HOME</a>

    <div>
        <form action="add.php" method="POST">
            <label for="">nombre</label>
            <input type="text" name="nombre" placeholder="Ingresa tu nombre">
            <label for="">apellido</label>
            <input type="text" name="apellido" placeholder="Ingresa tu apellido">
            <input type="submit" value="Guardar" > 
        </form>
    </div>    

</body>
</html>