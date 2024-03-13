<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
$link = mysqli_connect("localhost","root","");
mysqli_select_db($link,"videoteca");

if(isset($_GET['id_pelicula'])) {
    $id_pelicula = $_GET['id_pelicula'];
    $result=mysqli_query($link,"SELECT * FROM pelicula WHERE id_pelicula=$id_pelicula");
    $row = mysqli_fetch_array($result);
    if($row) {
        $img=$row['imagen'];
        $name=$row['titulo'];
        $info=$row['descripcion'];
        echo "<h2>Descripción de la película</h2>";
        echo "<h3>$name</h3>";
        echo "<img src='media/videoteca/$img' width='200' height='200'><br>";
        echo "<p>$info</p>";
    } else {
        echo "No se encontró la película.";
    }
} else {
    echo "ID de película no especificado.";
}

mysqli_close($link);
?>