<!DOCTYPE html>
<html lang="en">
<head>
    <title>Output</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h2>Resultado de operación de vectores</h2>
    <hr>
    <br>

    <?php
        $sumar = function($x,$y) { return $x+$y;};
        $restar = function($x,$y) { return $x-$y;};
       
        $a=$_REQUEST['a'];
        $b=$_REQUEST['b'];


        if($a==$b){
            echo "Las longitudes de los vectores son iguales...<br>";
            srand(time());

            // Rellenar arreglos
            for ($i=0; $i < $a; $i++) $x[$i]=rand(1,50);
            for ($i=0; $i < $a; $i++) $y[$i]=rand(1,50);

            echo "Vector A: ";
            for ($i=0; $i < $a; $i++) echo "[" . $x[$i] . "]" . ($i+1<$a? ' ': '');
            
            echo "<br>Vector B: ";
            for ($i=0; $i < $b; $i++) echo "[" . $y[$i] . "]" . ($i+1<$a? ' ': '');

            if ($_REQUEST['action']=='1'){
                echo "<br> La suma de los vectores es: ";
                for ($i=0; $i < $a; $i++) {
                    $sum = $sumar($x[$i], $y[$i]);
                    echo "$sum" . ($i+1<$a ? ', ' : '');
                }
            }
            else {
                echo "<br> La resta de los vectores es: ";
                for ($i=0; $i < $a; $i++) {
                    $res = $restar($x[$i], $y[$i]);
                    echo "$res" . ($i+1<$a ? ', ' : '');
                }
            }
        }
        else echo "Los vectores no tienen la misma longitud.";

    ?>
</body>
</html>