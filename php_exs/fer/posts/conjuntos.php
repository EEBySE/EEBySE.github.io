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
function istg_this_is_not_a_php_default_function_i_made_it_myself_to_check_if_smth_is_in_array($array, $what) {
    foreach($array as $item) {
        if ($what == $item) return true;
    }
    return false;
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
    private $set_size;
    private $set_items;

    public function __construct($tam) {
        $this->set_items = array();
        $this->set_size = $tam;
    }

    public function fillSet() {
        for ($i = 0; $i < $this->set_size; $i++) {
            $this->set_items[] = rand(1, 10);
        }
        //$this->set_items = array_unique($this->set_items);
    }

    public function showSet() {
        $result = "";
        foreach ($this->set_items as $elemento) {
            $result .= $elemento . "  ";
        }
        return $result;
    }

    public function union($conjuntoB) {
        $nuevoConjunto = new Conjunto(0);
        foreach($this->set_items as $item) {
            if(!istg_this_is_not_a_php_default_function_i_made_it_myself_to_check_if_smth_is_in_array($nuevoConjunto->set_items, $item))
                array_push($nuevoConjunto->set_items, $item);
        }
        foreach($conjuntoB->set_items as $item) {
            if(!istg_this_is_not_a_php_default_function_i_made_it_myself_to_check_if_smth_is_in_array($nuevoConjunto->set_items, $item))
                array_push($nuevoConjunto->set_items, $item);
        }
        // $nuevoConjunto->set_items = array_merge($this->set_items, $conjuntoB->set_items);
        // $nuevoConjunto->set_items = array_unique($nuevoConjunto->set_items);
        return $nuevoConjunto;
    }

    public function inter($conjuntoB) {
        $nuevoConjunto = new Conjunto(0);
        foreach ($this->set_items as $elementoA) {
            if (istg_this_is_not_a_php_default_function_i_made_it_myself_to_check_if_smth_is_in_array($conjuntoB->set_items, $elementoA)
            && !istg_this_is_not_a_php_default_function_i_made_it_myself_to_check_if_smth_is_in_array($nuevoConjunto->set_items, $elementoA)) {
                $nuevoConjunto->set_items[] = $elementoA;
            }
        }
        return $nuevoConjunto;
    }

    public function team_diff($conjuntoB) {
        $nuevoConjunto = new Conjunto(0);
        foreach ($this->set_items as $elementoA) {
            if (!istg_this_is_not_a_php_default_function_i_made_it_myself_to_check_if_smth_is_in_array($conjuntoB->set_items, $elementoA)) {
                $nuevoConjunto->set_items[] = $elementoA;
            }
        }
        return $nuevoConjunto;
    }
}
$A = new Conjunto($tamA);
$B = new Conjunto($tamB);

$A->fillSet();
$B->fillSet();
$union = $A->union($B);
$interseccion = $A->inter($B);
$diferenciaAB = $A->team_diff($B);
$diferenciaBA = $B->team_diff($A);
?>

<article class="Venn2">
		<div class="circle one">
			<span></span>
			<span></span>
			<h3>Conjunto A</h3>
			<p>
                <?=$A->showSet();?>
			</p>
		</div>
</article>
<article class="Venn2">
		<div class="circle two">
			<span></span>
			<span></span>
			<h3>Conjunto B</h3>
			<p>
                <?=$B->showSet();?>
			</p>
		</div>
</article>
<article class="Venn2">
		<div class="circle one" style="background-color: hsla(116, 100%, 50%, 1);">
			<span></span>
			<span></span>
			<h3>Conjunto A+B</h3>
			<p>
                <?=$union->showSet();?>
			</p>
		</div>
</article>
<article class="Venn2">
		<div class="circle one">
			<span></span>
			<span></span>
			<h3>Conjunto A</h3>
			<p>
                <?=$diferenciaAB->showSet()?>
			</p>
		</div>
		<div class="circle two">
			<span></span>
			<span></span>
			<h3>Conjunto B</h3>
			<p>
                <?=$diferenciaBA->showSet()?>
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
                <?=$interseccion->showSet();?>
			</p>
		</div>
	</article>
<br>

<?php

js_log("Conjunto A: \n" . $A->showSet());
js_log("Conjunto B: \n" . $B->showSet());
js_log("Unión: \n" . $union->showSet());
js_log("Diferencia A - B: \n" . $diferenciaAB->showSet());
js_log("Intersección: \n" . $interseccion->showSet());
js_log("Diferencia B - A: \n" . $diferenciaBA->showSet());

?>

    
</body>
</html>