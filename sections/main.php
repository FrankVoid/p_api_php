<main>
    <section>
        <h2>Proxima pelicula de Marvel</h2>
        <img src="<?php echo $data['poster_url']; ?>" 
        width='300'alt="Poster de la pelicula <?= $data["title"]; ?>"
         style="border-radius: 16px;"/>
    </section>
    <hgroup>
        <h3>Titulo: <?php echo $data['title']; ?></h3>
        <p><?php echo $untilMessage ?></p>
        <p>Fecha de estreno: <?php echo $data['release_date']; ?></p>
        <p>La siguiente pelicula de Marvel es: <?php echo $data['following_production']["title"]; ?></p>
    </hgroup>

    
</main>
