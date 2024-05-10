<?php
const API_URL = 'https://www.whenisthenextmcufilm.com/api';
$result = file_get_contents(API_URL);
$data = json_decode($result, true);

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
