<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="media/png" href="./media/icon.ico"></link>
    <link rel="stylesheet" href="./style/global.css"></link>
    <title>Votaciones</title>
</head>
<script>
    function beforeSubmit(event) {
        const form = window.event.target;
        const formData = new FormData(form);
        // Log the form data
        let data = "";
        for (let [key, value] of formData.entries()) {data += `${key}: ${value}\n`;}

        const toggleSwitch = document.getElementById('toggleSwitch');
        if(toggleSwitch.checked){
            if (formData.get("partido") != "PAN") {
                alert("Esa no es una familia cool y tradicional");
                window.event.preventDefault(); // Prevents the default form submission behavior
                return false;
            }
            alert("Buena decisión.");
        }
        return true;
    }
    function redirectToVotacionesGet() {
        window.location.href = './posts/votaciones_get.php';
    }
</script>
<body>
    <h1 class="centered">Votaciones</h1>
    <!-- Switch container for positioning -->
    <div class="switch-container">
        <!-- Rounded switch -->
        <label class="switch">
            <input type="checkbox" id="toggleSwitch">
            <span class="slider round"></span>
        </label>
    </div>
    <hr>
    <br>
    <form action="./posts/votaciones_set.php" method="post" enctype="multipart/form-data" onsubmit="return beforeSubmit(this)">
        <div class="centered-div">
            <label for="nombre">Nombre
            <input type="text" name="nombre" required>
            </label>
            <br>
            <br>
        </div>
        <div>
            <table>
            <tr class="centered">
                <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/Logo_Partido_Movimiento_Ciudadano_%28M%C3%A9xico%29.svg/2048px-Logo_Partido_Movimiento_Ciudadano_%28M%C3%A9xico%29.svg.png"></td>
                <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/PAN_logo_%28Mexico%29.svg/1200px-PAN_logo_%28Mexico%29.svg.png"></td>
                <td><img src="https://cede.izt.uam.mx/wp-content/uploads/2023/01/PRI.png"></td>
                <td><img src="https://upload.wikimedia.org/wikipedia/commons/f/f4/Logo_Partido_Verde_%28M%C3%A9xico%29.svg"></td>
                <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Morena_logo_%28Mexico%29.svg/2048px-Morena_logo_%28Mexico%29.svg.png"></td>
                <td><img src="https://cdn-icons-png.flaticon.com/512/2576/2576762.png"></td>
            </tr>
            <tr>
                <td><input type="radio" name="partido" id="partido" value="MC"> Movimiento <br>Ciudadano</td>
                <td><input type="radio" name="partido" id="partido" value="PAN"> PAN</td>
                <td><input type="radio" name="partido" id="partido" value="PRI" required> PRI</td>
                <td><input type="radio" name="partido" id="partido" value="PV"> Partido <br> Verde</td>
                <td><input type="radio" name="partido" id="partido" value="Morena"> Morena</td>
                <td><input type="radio" name="partido" id="partido" value="NULO"> Anular voto</td>
            </tr>
            </table>
            <br>
            <br>
            <input type="button" value="Ver votos" class="centered" onclick="redirectToVotacionesGet()" >
            <input type="submit" name="enviar" value="Votar" class="centered">
        </div>
    </form>
</body>
</html>