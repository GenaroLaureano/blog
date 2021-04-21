<?php
$dbhost = 'by7feaiesrrwukipqk0z-mysql.services.clever-cloud.com';#host
$dbuser = 'ukz4yun758jk0bcq';#usuario
$dbpass = '70QCT50ruWwURZXOimNP';#contraseña
$dbdata = 'by7feaiesrrwukipqk0z'; #Nombre bd
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbdata);
$conn->set_charset("utf8");
if ($conn->connect_error){
    die('Error de conexion: proceso cancelado');
} else{
    
}