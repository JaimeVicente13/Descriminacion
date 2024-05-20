<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discriminación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: skyblue;
        }
    </style>
</head>
<body>
<?php
    $id=$_GET['id'];
    // URL del recurso que deseas eliminar
    $url = 'http://localhost/servicioweb/DiscriminacionAPI/descriminacionservice.php';
    $data= array('id' => $id);
    $url .= '?' . http_build_query($data);
    $curl= curl_init();
    // Establecer opciones de la sesión cURL
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    if ($response == false) {
        $error = curl_error($curl);
        echo "Error al eliminar el recurso." . $error;
    } else {
        echo "Respuesta:  se elimino el registro " . $response;
    }
    // Cerrar sesión cURL
    curl_close($curl);
    ?>
</body>
<a href="index.php"><button><b>VOLVER AL INICIO</b></button></a>
</html>