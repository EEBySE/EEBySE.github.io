<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="media/png" href="../media/icon.ico"></link>
    <link rel="stylesheet" href="../style/global.css"></link>
    <title>Resultados</title>
    <style>
        .partidos {
            display: grid;
            justify-content: center;
            align-items: left;
            margin: 20px;
        }
        .partidos-in {
            margin: 20px;
            padding: 20px 80px;
            border: 1px solid white;
        }
        .partido {
            margin: 20px;
            outline-color: white;
            border: 1px solid white;
            padding: 20px 100px;
        }
        .partido-title {
            display: inline;
            font-size: 20px;
            font-weight: bold;
            margin: 1px;
            border-bottom: 10px solid white;
        }

        .vote-line {
            display: inline-block;
            height: 10px;
            text-align: center;
        }
        a.real-votes {
            color: yellowgreen;
        }
        a.missing-votes {
            color: gray;
        }
    </style>
</head>
<body>
    <?php 
        $fname = "votos.txt";
        
        $votos = file($fname);

        $conteoVotos = array(
            "PRI" => 0,
            "PAN" => 0,
            "MC" => 0,
            "Morena" => 0,
            "PV" => 0,
            "NULO" => 0
        );

        foreach ($votos as $voto) {
            $partido = explode(" ", $voto)[1];
            if (array_key_exists($partido, $conteoVotos)) {
                $conteoVotos[$partido]++;
            }
        }
        echo '<div class="partidos">';
        echo '<div class="partidos-in">';
        $total = 0;
        
        foreach ($conteoVotos as $partido => $votos) $total += $votos;
        foreach ($conteoVotos as $partido => $votos) {
            echo '<div class="partido">' .
                '<div class="partido-title"><h1>' .$partido. '</h1></div>' .
                '<div class="vote-line"><a class="real-votes">' .str_repeat('█ ', $votos). '</a>'.
                '<a class="missing-votes">' .str_repeat('█ ', $total-$votos). '</a> (' .$votos. ')</div>' .
                '</div>';
        }
        echo '</div>';
        echo '</div>';
    ?>
</body>
</html>
