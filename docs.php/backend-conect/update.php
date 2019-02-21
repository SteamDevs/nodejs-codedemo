<?php

$result = false;
$q = isset($q) ? $q : 'no mnaste nada';

//para mientras
    if(!empty($_GET)){

        $url = "http://localhost:3000/api/v1/users/2";
        $data = file_get_contents($url);
        $q = array();
        $q = json_decode($data, true);
    }

   

var_dump($q);


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
    
    <h1>estas ediatnado a:</h1>

  

     <form action="add.php" method="POST">
        <label for="">nombre</label>
        <input type="text" name="nombre"  value="<?= $q[0]['nombre'] ?>"  placeholder="Ingresa tu nombre">
        <label for="">apellido</label>
        <input type="text" name="apellido" value="<?= $q[0]['apellido'] ?>" placeholder="Ingresa tu apellido">
        <input type="submit" value="Guardar" > 
    </form>    

</body>
</html>