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
  <div  id="menu">
    <ul>
      <li><a href="index.php">inicio</a></li>
      <li id="current"><a href="consultaCliente.php">Consulta</a></li>
      <li><a href="renta.php">Rentar</a></li>
      <li><a href="salir.php">Salir</a></li>
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
      <h1>Consulta</h1>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <br />
    </div>
  </div>
  <div id="footer">
    <p>Página CSS descargada de https://www.free-css.com/</p>
  </div>
</div>
  <?php include_once("../includes/footer.php"); ?>