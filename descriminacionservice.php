<?php
    include 'conexion.php';
    $conecta=new conexion();
    //GET
    if($_SERVER['REQUEST_METHOD']=='GET'){
        $consulta=$conecta->prepare("Select Id,Nombre,Descripcion from tiposdiscriminacion");
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode($consulta->fetchAll());
        exit;
      }
    //POST
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $consulta=$conecta->prepare("INSERT INTO tiposdiscriminacion(Nombre,Descripcion) 
        Values(:nombre,:descripcion)");
        $consulta->bindValue(':nombre', $_POST['nombre']);
        $consulta->bindValue(':descripcion', $_POST['descripcion']);
        $consulta->execute();
        $ultimoId=$conecta->lastInsertId();
        if($ultimoId){
            header("HTTP/1.1 200 OK");
            echo json_encode($ultimoId);
            exit;
        }
    }
    //PUT
    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        // Obtener los datos del cuerpo de la solicitud PUT
        parse_str(file_get_contents("php://input"), $put_vars);
    
        // Extraer los valores de los datos analizados
        $id = $put_vars['id'];
        $nombre = $put_vars['nombre'];
        $descripcion = $put_vars['descripcion'];
    
        // Verificar que se han recibido los datos necesarios
        if (isset($id, $nombre, $descripcion)) {
            // Preparar y ejecutar la consulta de actualización
            $consulta = $conecta->prepare("UPDATE tiposdiscriminacion SET Nombre=:nombre, Descripcion=:descripcion WHERE Id=:id");
            $consulta->bindValue(':id', $id);
            $consulta->bindValue(':nombre', $nombre);
            $consulta->bindValue(':descripcion', $descripcion);
            $consulta->execute();
    
            header("HTTP/1.1 200 OK");
            echo json_encode(true);
        } else {
            // Manejar el caso en que falten datos
            header("HTTP/1.1 400 Bad Request");
            echo json_encode(["error" => "Faltan datos requeridos"]);
        }
        exit;
    }
    
    //DELETE
    if($_SERVER['REQUEST_METHOD']=='DELETE'){
        $consulta=$conecta->prepare("DELETE FROM tiposdiscriminacion where Id=:id");
        $consulta->bindValue(':id',$_GET['id']);
        $consulta->execute();
        header("HTTP/1.1 200 OK");
        echo json_encode(true);
        exit;
    }

?>