<?php 

const API_URL = "https://whenisthenextmcufilm.com/api";
#primero inicializamos una nueva sesión de cURL; ch = cURL handle
$ch = curl_init(API_URL);
// Aqui indicamos que queremos recibir el resultado de la petición y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/* Ejecutar la peticion
y guardamos el resultado
*/
$result = curl_exec($ch);
$data = json_decode($result, true);

curl_close($ch);

?>


<head>
    <meta charset="UTF-8"/>
    <title>La próxima película de Marvel</title>
    <meta name="description" content="la próxima película de Marvel"/> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>


<main>
    <h3><?= $data["title"];?> se estrena en <?= $data["days_until"];?></h3>
    <section>
        <img src="<?= $data["poster_url"];?> " width="300" alt="poster de <?= $data["title"];?>"
        style="border-radius: 16px;"/>
    </section>
    
    <hgroup>
        <p>Fecha de estreno: <?= $data["release_date"]; ?></p>
        <p>La siguiente es: <?= $data["following_production"]["title"];?></p>
    </hgroup>
</main>





<style>
    body {
        display: grid;
        place-content: center;
        background-color: #2d4765;
    }
    h3{
        text-align: center;
        color: white;
    }
    section{
        display: flex;
        place-content: center;
        text-align: center;
    }
    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
        color: white;
    }
    hgroup p{
        margin-bottom: 10px;
        font-size: 22px; 
        color: whitesmoke;   
    }
    img{
        margin: auto 0;
    }
</style>