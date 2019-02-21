<?php
$result = false;
if(!empty($_POST)){
    require_once 'functions.php';
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $data = array(
        'nombre' => $nombre,
        'apellido' => $apellido
    );
    $verbo = 'agregar';
    $API_URL = "http://localhost:3000/api/v1/users/";   
    $exec_statement = dataJSON($API_URL, $data, null, $verbo);
               
    
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
    
    <h1>estas agregando</h1>

    <?php
    
        if($result == true){
            echo 'Consulta exitosa';
        }
    ?>

     <form action="add.php" method="POST">
        <label for="">nombre</label>
        <input type="text" name="nombre" placeholder="Ingresa tu nombre">
        <label for="">apellido</label>
        <input type="text" name="apellido" placeholder="Ingresa tu apellido">
        <input type="submit" value="Guardar" > 
    </form>    

</body>
</html>