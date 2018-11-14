<?php

$result = false;

if(!empty($_POST)){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];

    $data = array(
        'nombre' => $nombre,
        'apellido' => $apellido
    );
    
    $API_URL = "http://localhost:3000/api/v1/users/";   

    $data_str = http_build_query($data);
    
 	$ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $API_URL);
    curl_setopt($ch,CURLOPT_POST, 1);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $data_str);
    $result = curl_exec($ch);
    curl_close($ch);
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