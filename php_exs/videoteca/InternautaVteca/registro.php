<?php include_once("../includes/header.php");
session_start(); ?>

<body>
  <div id="wrap">
    <div id="header">
      <h1 id="logo-text">videoteca</h1>
      <h2 id="slogan">Facultad de Ciencias de la Computacion </h2>
      <p>&nbsp;</p>
      <form class="search" method="post" action="#">
        <p>
          <input class="textbox" type="text" name="search_query" value="" />
          <input class="button" type="submit" name="Submit" value="Search" />
        </p>
      </form>
    </div>
    <div id="menu">
      <ul>
        <li><a href="index.php">inicio</a></li>
        <li><a href="consultaInter.php">Consultas</a></li>
        <li id="current"><a href="registro.php">Registro</a></li>
        <li><a href="acceso.php">Acceso</a></li>
        <li><a href="acerca.php">Acerca de</a></li>
      </ul>
    </div>
    <div id="content-wrap">
      <div id="sidebar">
        <h1>Top de Peliculas </h1>
        <div class="left-box">
          <ul class="sidemenu">
            <li><a href="#"></a>Star war </li>
            <li>Tron</li>
            <li>Doce monos </li>
            <li>Alien</li>
            <li>Super man </li>
          </ul>
        </div>
      </div>
      <div id="main">
        <h1>Registro de usuario </h1>
        <div class="action-info"><?php
                                  if (isset($_SESSION["message"])) {
                                  ?>

            <div class="alert alert-<?= $_SESSION["message_type"]; ?> alert-dismissible fade show" role="alert">
              <?= $_SESSION["message"] ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

          <?php
                                    unset($_SESSION["message"]);
                                    unset($_SESSION["message_type"]);
                                  }
          ?>
        </div>
        <form action="../registrar_usuario.php" method="post">
          Nombre: <input type="text" name="nombre"><br>
          Año de Nacimiento: <input type="text" name="year"><br>
          Nombre de Usuario: <input type="text" name="usuario"><br>
          Contraseña: <input type="password" name="contraseña"><br>
          <input type="submit" value="Registrarse">
        </form>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <form action="#">
        </form>
        <br />
      </div>
    </div>
    <div id="footer">
      <p>Página CSS descargada de https://www.free-css.com/</p>
    </div>
  </div>
  <?php include_once("../includes/footer.php"); ?>