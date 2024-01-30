<?php 
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

    $nombre = $_POST['nombre'];
    $partido = $_POST['partido'];
    $fname = "votos.txt";
    $fp = fopen($fname, "a");
    fwrite($fp, "$nombre $partido \n");
    fclose($fp);
    
    header("Location: ../votaciones.php");

    
    $votos = file($fname);

    $conteoVotos = array(
        "PRI" => 0,
        "PAN" => 0,
        "MC" => 0,
        "Morena" => 0,
        "PV" => 0,
        "OTRO" => 0
    );

    foreach ($votos as $voto) {
        $partido = explode(" ", $voto)[1];
        if (array_key_exists($partido, $conteoVotos)) {
            $conteoVotos[$partido]++;
        }
    }

    $contenidoHistograma = "";
    foreach ($conteoVotos as $partido => $votos) {
        $contenidoHistograma .= "$partido: ". str_repeat(" ", (strlen("Morena")-strlen($partido)>=0 ? strlen("Morena")-strlen($partido) : 0)) . str_repeat("*", $votos) . " | ($votos votos)\n";
    }

    file_put_contents("resultados.txt", $contenidoHistograma);

?>