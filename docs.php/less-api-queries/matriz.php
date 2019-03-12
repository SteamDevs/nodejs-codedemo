<?php

//Process Matriz-Objects

if(!empty($_POST)){
  
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];

  //SQL statament
  $sql = "INSERT INTO users(nombre, apellido) VALUES (?, ?)";

  $data = array(
    'query' => $sql,
    'nombre' => $nombre,
    'apellido' => $apellido
  );

  $url = "http://localhost:3000/api/v1/users/sql_matriz";  


          $data_str = http_build_query($data);
                    
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_str );
            $response = curl_exec($ch);
            die();
            //opcional
            if($response){
                header("Location: index.php");
            }


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
  
  <h1> Enviando un dato si lo deseas  </h1>

  <form action="matriz.php" method="POST">
        <label for="">nombre</label>
        <input type="text" name="nombre" placeholder="Ingresa tu nombre">
        <label for="">apellido</label>
        <input type="text" name="apellido" placeholder="Ingresa tu apellido">
        <input type="submit" value="Guardar" > 
    </form>    


</body>
</html>
