<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL en PHP</title>
</head>
<body>
    <h2>Datos peliculas</h2>
    <hr>
    <br>
</body>
</html>

<?php
$link = mysqli_connect("localhost","root","");
mysqli_select_db($link,"videoteca");

$result=mysqli_query($link,"SELECT * FROM pelicula");
echo "<table border=1>";
echo "<tr><td>Id_pelicula</td><td>titulo</td><td>director</td><td>actor</td><td>imagen</td></tr>";
while($row = mysqli_fetch_array($result))
{
    $id_pelicula = $row['id_pelicula'];
    $img=$row['imagen'];
    echo "<tr>";
    echo "<td>" . $row['id_pelicula'] . "</td>";
    echo "<td>" . $row['titulo'] . "</td>";
    echo "<td>" . $row['director'] . "</td>";
    echo "<td>" . $row['actor'] . "</td>";
    echo "<td><a href='pelicula.php?id_pelicula=$id_pelicula'><img src='media/videoteca/$img' width='80' height='80'></a></td>";
    echo "</tr>";
}
echo "</table>";
echo "<button><a href='grafica.php'>Mostrar ranking</a></button>";
echo "<button><a href='make_pdf.php'>Mostrar PDF</a></button>";
mysqli_close($link);
?>
            