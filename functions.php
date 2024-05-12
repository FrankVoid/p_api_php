<?php
declare (strict_types = 1); // Define el modo estricto para el tipado de datos
// solo a nivel de archivo
// Obtiene la URL de la API de la siguiente pelicula de Marvel
function get_data(string $url): array 
// Define la funcion get_data con un parametro de tipo string y un retorno de tipo array
{
    $result = file_get_contents($url); // Obtiene el contenido de la URL en formato JSON a traves de un GET
    $data = json_decode($result, true);// Decodifica el JSON en un array asociativo
    return $data;// Retorna el array asociativo
}
// Obtiene la URL de la API de la siguiente pelicula de Marvel
$data = get_data(API_URL);



function render_template(string $template, array $data = [])
{
    extract($data); // Extrae las variables de un array asociativo
    require "templates/$template.php"; 
    // Incluye el archivo de la plantilla pero no da acceso a las variables
}
?>