<?php

$url = "http://localhost:3000/api/v1/users/";

$jsondata = file_get_contents($url);
$json = json_decode($jsondata, true);

echo $json['results'][0]['nombre'];

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

    <table>
        <tr>
            <th>nombre</th>
            <th>apellido</th>
        </tr>
        <?php
        foreach($json['results'] as $row ){
            echo '<tr>';
            echo '<td>' . $row['nombre'] .'</td>';
            echo '<td>' . $row['apellido'] .'</td>';
            echo '</tr>';
        }
        ?>
    </table>
    
</body>
</html>