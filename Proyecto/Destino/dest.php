<?php
    require_once("../proteger.php");
    require_once("../Conect.php");
    $con=conectar();

    $sql="SELECT * from destino";
    $query=mysqli_query($con,$sql);

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
            <form action="../Dashboard/busqueda.php" method="post">
            <input type="text" name="busqueda" placeholder="Search...">
            </form>
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
            <a href="../Articulo/Articulo.php">
              <i class='bx bx-baguette icon'></i>
              <span class="text nav-text">Articulo</span>
            </a>
          </li>
          
          <li class="nav-link">
            <a href="../Insert/Insert.php">
              <i class='bx bx-group icon'></i>
              <span class="text nav-text">Insercion</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="dest.php">
              <i class='bx bx-package icon'></i>
              <span class="text nav-text">Destino</span>
            </a>
          </li>
          
          <li class="nav-link">
            <a href="../Empleado-usu/Empleadousu.php">
              <i class='bx bx-user icon'></i>
              <span class="text nav-text">Empleado</span>
            </a>
          </li>
      </div>
      <div class="bottom-content">
        <li class="">
          <a href="#" onclick="cerrarSesion()">
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
          <h2>Insercion Destino</h2>
          <form action="insertd.php" method="POST">
            <div class="form-group">
              <label for="apellido2">Fecha de entrega</label>
              <input type="date" id="Cor" name="Cor" required>
            </div>
            <div class="form-group">
              <label for="email2">Articulo Entregado</label>
              <input type="text" id="Est1" name="Est1" required>
            </div>
            <div class="form-group">
              <button type="submit">Enviar</button>
            </div>
          </form>
        </div>
      </div>
      <div class="table-container">
          <table class="table">
            <thead>
              <tr>
                <th>ID DE LA ENTREGA</th>
                <th>FECHA ENTREGA</th>
                <th>ARTICULO ENTREGADO</th>
              </tr>
            </thead>
        
            <tbody>
              <?php
                while ($row = mysqli_fetch_array($query)) {
              ?>
                <tr>
                  <td><?php echo $row['ID_ENTREGA'] ?></td>
                  <td><?php echo $row['FECHA_ENTREGA'] ?></td>
                  <td><?php echo $row['ARTICULO_ENTREGADO'] ?></td>
                  
                  
                </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
        </div>
    </div>
  </section>
  <script>function cerrarSesion() {
    // Envía una petición AJAX al archivo de cierre de sesión
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../cerrar.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Redirecciona al usuario a la página de inicio de sesión después de cerrar sesión
        window.location.href = "../Index.php";
      }
    };
    xhr.send();
  }</script>
<script src="../Dashboard/Dashboard.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
