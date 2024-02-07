<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Conjuntos</title>
</head>
<body>
    <h1>Operaciones con conjuntos</h1>
    <hr>
    <form action="posts/conjuntos.php" method="post">
    <div>
        <label for="conA">Cantidad de elementos en el conjunto A: </label>
        <input type="number" min="1" max="10" value="5" name="conA" id="conA" required>
    <br>
    <br>
    </div>
    <div>
        <label for="conB">Cantidad de elementos en el conjunto B: </label>
        <input type="number" min="1" max="10" value="5" name="conB" id="conB" required>
        <br>
        <br>
    </div>  
        <div>
            <input type="submit" name="enviar" value="Calcular">
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>