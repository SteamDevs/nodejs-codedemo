<?php

if(!empty($_POST)){

    //SQL statament
    //$sql = "SELECT * FROM users";
    $sql = $_POST['q'];

    //URL
    $url = "http://localhost:3000/api/v1/users/sql/select/";

    $data = array(
        'query' => $sql,
      );
    

    $data_str = http_build_query($data);
                        
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_str );
    $response = curl_exec($ch);
    
    //opcional
    /*if($response){
        header("Location: index.php");
    }*/

    $arr = array();

    if($response){
        $arr = $response;
    }

}

    
              
   

   /* $data = file_get_contents($url);
    $jsonData = json_decode($data, true);*/


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


 <form action="index.php" method="POST">
        <label for="">consulta</label>
        <input type="text" name="q" placeholder="Ingresa tu consulta">
        <input type="submit" value="Guardar" > 
    </form> 

    <?php
        if(!empty($response)):
    ?>
    
    <table>
    <tr>
        <th>nombre </th>
        <th>apellido</th> 
        
    </tr>
    <?php
       
    //var_dump($arr);
    if(is_array($arr) || is_object($arr)):
        $x = array();
        $x = $arr;
        var_dump($x);
        foreach($x as $val => $keys):
        
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
    endif;
    ?>
</table>


    <?php
        endif
    ?>
    
</body>
</html>