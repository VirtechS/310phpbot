<?php

include "vk_api.php"; 


const VK_KEY = "6c7ff9992a971135f73b31e49ecfd65a87a6b561453ee6be87374761720c8798f3ac9fe77e458907f81b1";  // Токен сообщества
const ACCESS_KEY = "60a0f8c5";  // Тот самый ключ из сообщества 
const VERSION = "5.103"; // Версия API VK


$vk = new vk_api(VK_KEY, VERSION); 
$data = json_decode(file_get_contents('php://input')); 

if ($data->type == 'confirmation') { 
    exit(ACCESS_KEY); 
}
$vk->sendOK(); 


// ====== Наши переменные ============
$id = $data->object->from_id;
$peer_id = $data->object->peer_id;
$message = $data->object->text; // Само сообщение от пользователя
$date = date("d.m.Y  H:i");
// ====== *************** ============

if ($data->type == 'message_new') {



        if ($message == '!бот') {

            $vk->sendMessage($peer_id, "Привет :-)");
            
        }

        if ($message == '!дата') {

            $vk->sendMessage($id, $date);
            
        }



    }
	