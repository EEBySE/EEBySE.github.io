<!DOCTYPE html>
<html lang="en">
<head>
    <title>Input</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Input de vectores</h1>
    <hr>
    <br>
    <form action="./posts/vectores.php" method="post">
        <h2>Tamaño del vector A:</h2> 
        <input type="number" name="a" id="a" required>
        <br>
        <h2>Tamaño del vector B:</h2> 
        <input type="number" name="b" id="b" required>
        <br>
        <br>
        <h4>¿Qué operacion hacemos?</h1>
        <input type="radio" name="action" id="action" value="1" checked> Suma
        <br>
        <input type="radio" name="action" id="action" value="2"> Resta
        <br>
        <br>
        <br>
        <input type="submit" name="enviar" value="Calcular">
    </form>
</body>
</html>