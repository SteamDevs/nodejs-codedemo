<?php

if(!empty($_POST)){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];

    $API_URL = "http://localhost:3000/api/v1/users/";

    $data = array(
        'nombre' => $nombre,
        'apellido' => $apellido    
    );

    
    $data_str = http_build_query($data);
    
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $API_URL);
    curl_setopt($ch,CURLOPT_POST, 1);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $data_str);
    $result = curl_exec($ch);
    curl_close($ch);

    echo $result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POST PRUEBA</title>
</head>
<body>

    <form action="post.php" method="POST">
        <label for="">nombre</label>
        <input type="text" name="nombre" placeholder="Ingrese su nombre">
        <label for="">apellido</label>
        <input type="text" name="apellido" placeholder="Ingrese su apellido">
        <input type="submit">
    </form>
    
</body>
</html>