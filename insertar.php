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
    $nombre= $_POST['nombre'];
    $descripcion= $_POST['descripcion'];

// URL a la que se enviará la solicitud POST
$url = 'http://localhost/servicioweb/DiscriminacionAPI/descriminacionservice.php';

// Datos que se enviarán en la solicitud POST
$postData = array(
    'nombre' => $nombre,
    'descripcion' => $descripcion
);
// Inicializar sesión cURL
$ch = curl_init();
// Establecer la URL de destino
curl_setopt($ch, CURLOPT_URL, $url);
// Especificar que se realizará una solicitud POST
curl_setopt($ch, CURLOPT_POST, true);
// Codificar los datos como formulario URL-encoded
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
// Opcionalmente, establecer otros parámetros de cURL, como tiempos de espera, encabezados, etc.
// Capturar la respuesta en lugar de imprimirla directamente
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Ejecutar la solicitud y capturar la respuesta
$response = curl_exec($ch);
// Verificar si hubo algún error durante la ejecución de la solicitud cURL
if ($response === false) {
    echo 'Error cURL: ' . curl_error($ch);
}
// Cerrar la sesión cURL
curl_close($ch);
// Manejar la respuesta recibida (por ejemplo, mostrarla o procesarla)
echo $response;
?>
</body>
<a href="index.php"><button><b>VOLVER AL INICIO</b></button></a>
</html>