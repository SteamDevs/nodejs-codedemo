<?php
/*
    $data = array(
        'nombre' => $nombre,
        'apellido' => $apellido
    );
    
    $API_URL = "http://localhost:3000/api/v1/users/";   
    $data_str = http_build_query($data);
    
 	$ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $API_URL);
    curl_setopt($ch,CURLOPT_POST, 1);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $data_str);
    $result = curl_exec($ch);
    curl_close($ch);
*/
function sendJSON($array_data, 
    $url_api, $is_edit = null, $is_delete = null ){
    $data_str = http_build_query($array_data);
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,  $url_api);
    curl_setopt($ch,CURLOPT_POST, 1);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $data_str);
    $result = curl_exec($ch);
    curl_close($ch);
    if(!empty($is_delete)){
        echo 'quieres eliminar algo';
    }
    if(!empty($is_edit)){
        echo 'quieres editar algo';
    }
}
function deleteJSON($url, $id){
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE"); 
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($id));
    $response = curl_exec($curl);
    $data = json_decode($response);
    
    curl_close($curl);;
}
function dataJSON($url, $array_data = null, $id = null, $action ){
    switch($action){
        case 'listar':
            
            $data = file_get_contents($url);
            $jsonData = json_decode($data, true);
            return $jsonData;
        
        break;
        case 'agregar':
            
            $data_str = http_build_query($array_data);
            $curl = curl_init();
            curl_setopt($curl,CURLOPT_URL, $url);
            curl_setopt($curl,CURLOPT_POST, 1);
            curl_setopt($curl,CURLOPT_POSTFIELDS, $data_str);
            $result = curl_exec($curl);
            curl_close($curl);
        break;
        case 'eliminar';
            
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE"); 
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($id));
            $result = curl_exec($curl);
            $data = json_decode($result);
            curl_close($curl);
        break;
        case 'editar';
            //https://stackoverflow.com/questions/5043525/php-curl-http-put
            $data = array("a" => $a);
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
            
            $response = curl_exec($ch);
            
            if (!$response) 
            {
                return false;
            }
        break;
            default: 
                echo 'parametro no valido';
    }
}
?>