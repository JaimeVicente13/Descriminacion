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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    // URL a la que se enviará la solicitud PUT
    $url = 'http://localhost/servicioweb/DiscriminacionAPI/descriminacionservice.php';
    // Datos que se enviarán en la solicitud PUT
    $putData = http_build_query(array(
        'id' => $id,
        'nombre' => $nombre,
        'descripcion' => $descripcion
    ));
    // Inicializar sesión cURL
    $ch = curl_init();
    // Establecer la URL de destino
    curl_setopt($ch, CURLOPT_URL, $url);
    // Especificar que se realizará una solicitud PUT
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    // Adjuntar los datos a la solicitud PUT
    curl_setopt($ch, CURLOPT_POSTFIELDS, $putData);
    // Capturar la respuesta en lugar de imprimirla directamente
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Ejecutar la solicitud y capturar la respuesta
    $response = curl_exec($ch);
    // Verificar si hubo algún error durante la ejecución de la solicitud cURL
    if ($response === false) {
        echo 'Error cURL: ' . curl_error($ch);
    } else {
        // Manejar la respuesta recibida (por ejemplo, mostrarla o procesarla)
        echo $response;
    }
    // Cerrar la sesión cURL
    curl_close($ch);
}
?>
</body>
<a href="index.php"><button><b>VOLVER AL INICIO</b></button></a>
</html>