<?php

/* 
1-. VARIABLE GLOBALES $_GET, $_POST, $_DELETE 
2-. COMO FUNCIONA AJAX EN PHP
3-. Dar estili a la tabla

*/

//Paso 1
require_once 'conexion.php';

//Paso 2
$sql = "SELECT * FROM users";
$preparando_consulta = $pdo->query($sql);

//Paso 3
$result = $preparando_consulta->fetchAll();
//var_dump($result)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>
    
    <a href="add.php">AGREGAR</a>
    
    <h1>Listando los usuarios</h1>

    <table>
        <tr>
            <th>nombre </th>
            <th>apellido</th> 
            
        </tr>
        <?php
            foreach($result as $row){
                echo '<tr>';
                echo '<td>' . $row["nombre"] .'</td>';
                echo '<td>'. $row['apellido'] .'</td>';
                echo '</tr>';    

            }
        ?>
    </table>


</body>
</html>