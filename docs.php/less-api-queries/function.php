<?php

//Master CRUD-FUNCTION
function dataJSON($url, $array_data = null, $action ){
    switch($action){
        case 'listar':
            
            /*$data = file_get_contents($url);
            $jsonData = json_decode($data, true);
            return $jsonData;*/

            $data_str = http_build_query($array_data);
                        
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_str );
            $response = curl_exec($ch);

            //Opcional
            if($response){
                echo $response; //Imprimiendo el callback del API
            }
        
        break;
        case 'agregar':
            
            //estandarizada sin mensajes desde el backend
            $data_str = http_build_query($array_data);
                    
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


            /*
                antigua version que imprimia mensajes desde el backend

                $data_str = http_build_query($array_data);
                
                $curl = curl_init();
                curl_setopt($curl,CURLOPT_URL, $url);
                curl_setopt($curl,CURLOPT_POST, 1);
                curl_setopt($curl,CURLOPT_POSTFIELDS, $data_str);
                $result = curl_exec($curl);
                curl_close($curl);
            
            */


        break;
        case 'eliminar';
            
            $curl = curl_init($url);
            
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE"); 
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($array_data));
            $result = curl_exec($curl);
            $data = json_decode($result);
            curl_close($curl);
        
            break;

        case 'editar';

            $data_str = http_build_query($array_data);
                
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_str );
            $response = curl_exec($ch);

            if($response){
                header("Location: index.php");
            }

        break;
            default: 
                echo 'parametro no valido';
    }
}



?>