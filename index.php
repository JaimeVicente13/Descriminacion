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
    <div class="content">
        <h1>Lista de Discriminación</h1> 
         <a href="nuevo.php" class="btn btn-primary"><b>Crear nuevo</b></a>
         <br><br>
        <?php
        $url="http://localhost/servicioweb/DiscriminacionAPI/descriminacionservice.php";
        $curl=curl_init();
        //configurar en curl
        curl_setopt($curl,CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //Solicitud
        $response=curl_exec($curl);
        if(curl_errno($curl)){
            $error=curl_errno($curl); //obtiene error
            echo "ERROR:" . $error;
            exit;
        } else {
            //cerrar
            curl_close($curl);
            $datos=json_decode($response, true);
            echo '<table class="table table-bordereds">';
            echo "<thead><tr>
                    <th>ID</th>  <th>NOMBRE</th> <th>DESCRIPCIÓN</th> <th>ACCIONES</th> <th>ACCIONES</th> </tr></thead>";
                foreach($datos as $item){
                    echo '<tr>';
                    echo '<td>'.$item['Id']. '</td>';
                    echo '<td>'.$item['Nombre'].'</td>';
                    echo '<td>'.$item['Descripcion']. '</td>';
                    echo "<td><a href='modificar.php?id=".$item['Id']."' class='btn btn-warning'><b>ACTUALIZAR</b></a></td>";
                    echo "<td><a href='eliminar.php?id=".$item['Id']."' class='btn btn-warning'><b>ELIMINAR</b></a></td>";
                    echo '</tr>';
                }
            echo '</table>';
        }
        ?>
    </div>
</body>
</html>
