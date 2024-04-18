<?php session_start();


    $nombre = $_POST['nombre'];
    $año_nacimiento = $_POST['year'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $link = mysqli_connect("localhost", "root", ""); 
    mysqli_select_db($link, "videoteca");

    $verificar_usuario = "SELECT usuario FROM clientes WHERE usuario='$usuario'";
    $resultado = mysqli_query($link, $verificar_usuario);

    if (mysqli_num_rows($resultado) > 0) {
        $_SESSION["message"] = "El usuario ya existe. <br>Por favor, elige otro nombre de usuario.";
        header("Location: ".$_SERVER['HTTP_REFERER']);
        $_SESSION["message_type"] = "danger";
    } else {
        $insertar_usuario = "INSERT INTO clientes (cliente, year, usuario, password, tipo) 
        VALUES ('$nombre', '$año_nacimiento', '$usuario', '$contraseña', 1)";
        
        if (mysqli_query($link, $insertar_usuario)) {
            $_SESSION["message"] = "Usuario registrado exitosamente!<br>Redireccionando a inicio de sesión.".
                "<script>
                setTimeout(function() {
                    window.location.href = 'acceso.php';
                }, 3000);
                </script>";
            $_SESSION["message_type"] = "success";
            header("Location: ".$_SERVER['HTTP_REFERER']);
        } else {
            $_SESSION["message"] = "Error al registrar el usuario: " . mysqli_error($link);
            $_SESSION["message_type"] = "danger";
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }
    }

    mysqli_close($link);

