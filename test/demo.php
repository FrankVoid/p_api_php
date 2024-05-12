<?php
const API_URL = 'https://www.whenisthenextmcufilm.com/api';
//inicio de sesion de curl; ch= curl handle
$ch = curl_init(API_URL);
//indicar que queremos recibir el resultado sin imprimirlo
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//ejecutar la peticion y guardar la respuesta
$result = curl_exec($ch);
$data = json_decode($result, true); 
//convertir el JSON a un array asociativo
curl_close($ch);
//var_dump($data);
//un alternativa para obtener la api es usar file_get_contents
// $resul = json_decode(file_get_contents(API_URL)); solo si se va a usar get

?>
<head>
    <meta charset="UTF-8" />
    <title>Proxima pelicula de Marvel</title>
    <meta name="description" content="Proxima pelicula de Marvel" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
    
</head>
<main>
    <section>
        <h2>Proxima pelicula de Marvel</h2>
        <img src="<?php echo $data['poster_url']; ?>" 
        width='300'alt="Poster de la pelicula <?= $data["title"]; ?>"
         style="border-radius: 16px;"/>
    </section>
    <hgroup>
        <h3>Titulo: <?php echo $data['title']; ?></h3>
        <p>Se estrena en : <?php echo $data['days_until']; ?> dias</p>
        <p>Fecha de estreno: <?php echo $data['release_date']; ?></p>
        <p>La siguiente pelicula de Marvel es: <?php echo $data['following_production']["title"]; ?></p>
    </hgroup>

    
</main>
