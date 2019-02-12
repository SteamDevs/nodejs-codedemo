<?php
   require_once 'functions.php';
   $API_URL = "http://localhost:3000/api/v1/users/";
   
   $data = file_get_contents($API_URL); //Agrega un contenedor del archivo JSON
   $json = json_decode($data, true );  //Codifica el JSON a un  Objeto DB
   
   
   if(!empty($_GET)){
        $idx = isset($_GET['id']) 
            ? $_GET['id'] : false;

    $API_URL_DELETE = "localhost:3000/api/v1/users/". $idx;

    $exec_statement = deleteJSON($API_URL_DELETE, $idx);

     
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
            foreach($json as $val => $keys):
        ?>
            <tr>
            <td><?=$keys['id_users'] ?></td> 
            <td><?=$keys['nombre'] ?></td> 
            <td><?=$keys['apellido'] ?></td>
            <td>
                <a href="">Editar</a>
                <a href="index.php?id=<?=$keys['id_users']?> ">Eliminar</a>
            </td> 
            </tr>
        <?php
            endforeach;
        ?>
    </table>

</body>
</html>