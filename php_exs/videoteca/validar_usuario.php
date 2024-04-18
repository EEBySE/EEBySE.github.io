<?php session_start();

$usuario = $_REQUEST['usuario'];
$password = $_REQUEST['password'];

$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "videoteca");

$result = mysqli_query($link, "SELECT *, password FROM clientes WHERE usuario='$usuario'");
if ($row = mysqli_fetch_array($result)) {
   if ($row["password"] == $password) {
      $_SESSION["k_username"] = $row['usuario'];
      if ($row['tipo'] == 1) {
         $_SESSION["message"] = 'Bienvenid@ ' . $_SESSION['k_username'] . ', te has logueado correctamente!' .
            "<script>
               setTimeout(function() {
                  window.location.href = '../ClienteVteca/index.html';
               }, 3000);
            </script>";
      }
      if ($row['tipo'] == 0) {
         $_SESSION["message"] = 'Bienvenid@ ' . $_SESSION['k_username'] . ', te has logueado correctamente!' .
            "<script>
               setTimeout(function() {
                  window.location.href = '../AdmVteca/index.html';
               }, 3000);
            </script>";
      }
      $_SESSION["message_type"] = "success";
      header("Location: " . $_SERVER['HTTP_REFERER']);
   } else {
      $_SESSION["message"] = 'Contraseña incorrecta';
      $_SESSION["message_type"] = "danger";
      header("Location: " . $_SERVER['HTTP_REFERER']);
   }
} else {
   $_SESSION["message"] = 'Login incorrecto';
   $_SESSION["message_type"] = "danger";
   header("Location: " . $_SERVER['HTTP_REFERER']);
}
