<?php
//require 'functions.php'; 
// Incluye el archivo functions.php 
//pero si no se encuentra el archivo se detiene la ejecucion
//es como pegar el contenido del archivo functions.php en este archivo
require_once 'consts.php'; // Incluye el archivo consts.php
require_once 'functions.php';
require_once 'classes/NextMovie.php';
//Incluye el archivo functions.php
//pero solo lo incluye una vez
//es mas seguro que require porque evita la redeclaracion de funciones
//include 'functions.php'; solo para obcionales o pruebas
// Incluye el archivo functions.php
//inlclude_once 'functions.php'; es lo mismo que reuire_once
//pero si no se encuentra el archivo da una advertencia pero no detiene la ejecucion
//


$next_movie = NextMovie::file_and_create_movie(API_URL);
$data = $next_movie->get_data();
render_template ('head',["title" => $data["title"]] );
render_template ('main', array_merge($data,["until_message"=>$next_movie->get_until_message()]));

?>