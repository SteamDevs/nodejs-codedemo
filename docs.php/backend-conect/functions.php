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

}


?>