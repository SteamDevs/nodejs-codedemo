<?php
    require_once 'conexion.php';

    $query = $pdo->query("SELECT * FROM users");
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio PHP</title>
</head>
<body>
    <h1>hola</h1>

    <table>
        <tr>
            <th>id_users</th>
            <th>nombre</th>
            <th>apellido</th>
        </tr>
        <?php
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
        echo '<tr>';
        echo '<th>'. $row['id_users'] .'</th>';
        echo '<th>'. $row['nombre']   .'</th>';
        echo '<th>'. $row['apellido'] .'</th>';
        echo '</tr>';
        }
        ?>
    </table>
</body>
</html>