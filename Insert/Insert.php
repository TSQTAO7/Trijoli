<?php
    require_once("../proteger.php");
    require_once("../Conect.php");
    $con=conectar();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../CSS/Donante.css">
    <!----======== Sidebar ======== -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Trijoli</title>
</head>
<body>
  
  <nav class="sidebar close">
    <header>
        <div class="image-text">
          <span class="image">
            <img src="../Img/Logo.png" alt="logo">
          </span>
          <div class="text header-text">
            <span class="name">Trijoli</span>
            <span class="profession">Esencia y Mensaje <br> del cielo <br> para el mundo</span>
          </div>
        </div>
        <i class='bx bx-chevron-right toggle'></i>
    </header>

    <div class="menu-bar">
      <div class="menu">
        <li class="search-box">
            <i class='bx bx-search icon'></i>
            <input type="text" placeholder="Search...">
        </li>
          <li class="nav-link">
            <a href="../Dashboard/Dashboard.php">
              <i class='bx bx-home-alt icon' ></i>
              <span class="text nav-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="../Donante/Donante.php">
              <i class='bx bx-user-pin icon' ></i>
              <span class="text nav-text">Donante</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="Articulo.php">
              <i class='bx bx-baguette icon'></i>
              <span class="text nav-text">Articulo</span>
            </a>
          </li>
          
          <li class="nav-link">
            <a href="#">
              <i class='bx bx-group icon'></i>
              <span class="text nav-text">Crud</span>
            </a>
          </li>
      </div>
      <div class="bottom-content">
        <li class="">
          <a href="#">
            <i class='bx bx-log-out icon'></i>
            <span class="text nav-text">Logout</span>
          </a>
        </li>

        <li class="mode">
          <div class="moon-sun">
            <i class='bx bx-moon icon moon'></i>
            <i class='bx bx-sun icon sun'></i>
          </div>
          <span class="mode-text text">Dark Mode </span>

          <div class="toggle-switch">
            <span class="switch">
              
            </span>
          </div>
        </li>

      </div>
    </div>
  </nav>
  <section class="home">
    <div class="text">
      <div class="form-container">
        <div class="form">
          <h2>Insercion Articulo</h2>
          <form action="insercion.php" method="POST">
            <div class="form-group">
              <label for="nombre">Nombre:</label>
              <input type="text" id="Nom" name="Nom" required>
            </div>
            <div class="form-group">
              <label for="apellido">Estado de Actividad:</label>
              <input type="text" id="EstA" name="EstA" required>
            </div>
            <div class="form-group">
              <label for="email">Tipo De Articulo:</label>
              <input type="text" id="TipA" name="TipA" required>
            </div>
            <div class="form-group">
              <label for="telefono">Calidad:</label>
              <input type="text" id="EstCal" name="EstCal" required>
            </div>
            <div class="form-group">
              <label for="mensaje">Id del Empleado:</label>
              <input type="text" id="Emp" name="Emp" required>
            </div>
            <div class="form-group">
              <button type="submit">Enviar</button>
            </div>
          </form>
        </div>
        <div class="form">
          <h2>Insercion Donante</h2>
          <form action="insercion.php" method="POST">
            <div class="form-group">
              <label for="nombre2">Nombre:</label>
              <input type="text" id="Nom1" name="Nom1" required>
            </div>
            <div class="form-group">
              <label for="apellido2">Correo:</label>
              <input type="email" id="Cor" name="Cor" required>
            </div>
            <div class="form-group">
              <label for="email2">Estado</label>
              <input type="text" id="Est1" name="Est1" required>
            </div>
            <div class="form-group">
              <button type="submit">Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
<script src="../Dashboard.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
