<?php

$result = false;
$q = isset($q) ? $q : 'no mnaste nada';

//para mientras id estatico
    $id = 26;
    
    $url = "http://localhost:3000/api/v1/users/" . $id;
    $data = file_get_contents($url);
    $q = array();
    $q = json_decode($data, true);


    if(isset($_POST['edit'])){
        require_once 'functions.php';
        
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $idx = $_POST['id'];
        
        $data = array(
            'nombre' => $nombre,
            'apellido' => $apellido,
            'id'=> $idx
        );

        var_dump($data);

        $url = "http://localhost:3000/api/v1/users/" .$idx;

        //teminar de probar el editar

        /*$verbo = 'editar';
        $exc_update = dataJSON($url, $data, $verbo);*/
       
    }

    //var_dump($q);


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

  
    <?php  if(isset( $id )): ?>
     
     <form action="update.php" method="POST">
        <label for="">nombre</label>
        <input type="text" name="nombre"  value="<?= $q[0]['nombre'] ?>"  placeholder="Ingresa tu nombre">
        <label for="">apellido</label>
        <input type="text" name="apellido" value="<?= $q[0]['apellido'] ?>" placeholder="Ingresa tu apellido">
        <input type="hidden" value="<?= $q[0]['id_users']?>" name="id" >
        <input type="hidden" value="edit" name="edit">
        <input type="submit" value="Guardar" > 
    </form>    

    <?php endif; ?>

</body>
</html>