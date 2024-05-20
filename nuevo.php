<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nuevo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: skyblue;
        }
    </style>
</head>
<body>
    <form action="insertar.php" method="post">
        <b>NOMBRE:</b>
        <input type="text" name="nombre" class="form-control">
        <b>DESCRIPCION:</b>
        <input type="text" name="descripcion" class="form-control">
        <br>
        <div class="d-grid gap-2 col-1 mx-auto">
            <input type="submit" value="Insertar" class="btn btn-success">
        </div>

    </form>
</body>
</html>