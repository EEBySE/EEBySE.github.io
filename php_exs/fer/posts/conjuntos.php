<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conjuntos resultantes</title>
    <link href="../css/venndiagram.css" rel="stylesheet">
</head>
<body style="background-color: #3d3d3d71;">

<?php

function js_log(string $content){
    echo '<script>console.log(' . json_encode($content) . ');</script>';
}


/*crear un programa en PHP para realizar las operciones sobre conjuntos usando POO conjuntos
-tamño del conjunto A
-Asignar valores aleatorios en  el rango (1,20)
-Calcular la union
-Calcular la interseccion
-Calcular la diferencia A - B y B - A
*/

$tamA = isset($_POST["conA"]) ? $_POST["conA"] : 0;
$tamB = isset($_POST["conB"]) ? $_POST["conB"] : 0;
class Conjunto {
    private $tamaño;
    private $elementos;

    public function __construct($tam) {
        $this->tamaño = $tam;
        $this->elementos = array(); 
    }

    public function llenarConjunto() {
        for ($i = 0; $i < $this->tamaño; $i++) {
            $this->elementos[] = rand(1, 20);
        }
        $this->elementos = array_unique($this->elementos);
    }

    public function mostrarConjunto() {
        $result = "";
        foreach ($this->elementos as $elemento) {
            $result .= $elemento . "  ";
        }
        return $result;
    }

    public function union($conjuntoB) {
        $nuevoConjunto = new Conjunto(0);
        $nuevoConjunto->elementos = array_merge($this->elementos, $conjuntoB->elementos);
        $nuevoConjunto->elementos = array_unique($nuevoConjunto->elementos);
        return $nuevoConjunto;
    }

    public function interseccion($conjuntoB) {
        $nuevoConjunto = new Conjunto(0);
        foreach ($this->elementos as $elementoA) {
            if (in_array($elementoA, $conjuntoB->elementos)) {
                $nuevoConjunto->elementos[] = $elementoA;
            }
        }
        return $nuevoConjunto;
    }

    public function diferencia($conjuntoB) {
        $nuevoConjunto = new Conjunto(0);
        foreach ($this->elementos as $elementoA) {
            if (!in_array($elementoA, $conjuntoB->elementos)) {
                $nuevoConjunto->elementos[] = $elementoA;
            }
        }
        return $nuevoConjunto;
    }
}
$A = new Conjunto($tamA);
$B = new Conjunto($tamB);

$A->llenarConjunto();
$B->llenarConjunto();
$union = $A->union($B);
$interseccion = $A->interseccion($B);
$diferenciaAB = $A->diferencia($B);
$diferenciaBA = $B->diferencia($A);
?>

<article class="Venn2">
		<div class="circle one">
			<span></span>
			<span></span>
			<h3>Conjunto A</h3>
			<p>
                <?=$A->mostrarConjunto();?>
			</p>
		</div>
</article>
<article class="Venn2">
		<div class="circle two">
			<span></span>
			<span></span>
			<h3>Conjunto B</h3>
			<p>
                <?=$B->mostrarConjunto();?>
			</p>
		</div>
</article>
<article class="Venn2">
		<div class="circle one" style="background-color: hsla(116, 100%, 50%, 1);">
			<span></span>
			<span></span>
			<h3>Conjunto A+B</h3>
			<p>
                <?=$union->mostrarConjunto();?>
			</p>
		</div>
</article>
<article class="Venn2">
		<div class="circle one">
			<span></span>
			<span></span>
			<h3>Conjunto A</h3>
			<p>
                <?=$diferenciaAB->mostrarConjunto()?>
			</p>
		</div>
		<div class="circle two">
			<span></span>
			<span></span>
			<h3>Conjunto B</h3>
			<p>
                <?=$diferenciaBA->mostrarConjunto()?>
			</p>
		</div>
		<div class="shape onetwo">
			<span></span>
			<span></span>
			<span></span>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
			<h3>A+B</h3>
			<p>
                <?=$interseccion->mostrarConjunto();?>
			</p>
		</div>
	</article>
<br>

<?php

js_log("Conjunto A: \n" . $A->mostrarConjunto());
js_log("Conjunto B: \n" . $B->mostrarConjunto());
js_log("Unión: \n" . $union->mostrarConjunto());
js_log("Diferencia A - B: \n" . $diferenciaAB->mostrarConjunto());
js_log("Intersección: \n" . $interseccion->mostrarConjunto());
js_log("Diferencia B - A: \n" . $diferenciaBA->mostrarConjunto());

?>

    
</body>
</html>