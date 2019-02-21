<?php
   require_once 'functions.php';
   $API_URL = "http://localhost:3000/api/v1/users/";
   
   if(!empty($_GET)){
        $idx = isset($_GET['id']) 
            ? $_GET['id'] : false;
    
    $verbo = "eliminar";
    $API_URL_DELETE = "localhost:3000/api/v1/users/". $idx;
    $exec_statement = dataJSON($API_URL_DELETE, $array_data = null, $idx, $verbo );
 
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
    
    <h1>hola</h1>

    <a href="add.php">Agregar</a>

    <table>
        <tr>
            <th>id</th>
            <th>nombre </th>
            <th>apellido</th>
            <th>opciones</th> 
            
        </tr>
        <?php
            $verbo = 'listar';
            $exec_fn = dataJSON($API_URL, null, null, $verbo);
            foreach($exec_fn as $val => $keys):
        ?>
            <tr>
            <td><?=$keys['id_users'] ?></td> 
            <td><?=$keys['nombre'] ?></td> 
            <td><?=$keys['apellido'] ?></td>
            <td>
                <a href="update.php?id=<?= $keys['id_users'] ?>">Editar</a>
                <a href="index.php?id=<?=$keys['id_users']?> ">Eliminar</a>
            </td> 
            </tr>
        <?php
            endforeach;
        ?>
    </table>

</body>
</html>