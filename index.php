<?php

const API_URL = "https://whenisthenextmcufilm.com/api";
//Se inicializa CH = curlHandler
$ch = curl_init(API_URL);

//indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

//EJECUTAR LA PETICION
$result = curl_exec($ch);
$data = json_decode($result, true);

$imgUrl=$data["poster_url"];
$title = $data["title"];
$days = $data["days_until"];
$fecha = $data["release_date"];
$next = $data["following_production"]["title"];

curl_close($ch);
//var_dump($data);

?>

<head>
    <meta charset="UTF-8" />
    <title>La proxima pelicula de marvel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<main>
    
    <section>
        <h1><?= $title;?> </h1>
        <img src="<?= $imgUrl ;?>" width="250px" height="350px"
            style="border-radius: 16px"  />
    </section>
    <hgroup>        
        <h6>Se estrena en <?= $days;?> días </h6>
        <p>Fecha de estreno: <?= $fecha; ?></p>
        <br>
        <br>
        <p>El siguiente estreno será: <p style="font-style: italic;"><?= $next; ?></p>  </p>
    </hgroup>
</main>


<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }
    main{
        display: flex;
        justify-content: center;
        flex-direction: column;
    }    
</style>