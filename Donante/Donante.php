<?php
    require_once("../proteger.php");
    require_once("../Conect.php");
    $con=conectar();

    $sql="SELECT * from donante";
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
            <input type="text" placeholder="Search...">
        </li>
          <li class="nav-link">
            <a href="../Dashboard/Dashboard.php">
              <i class='bx bx-home-alt icon' ></i>
              <span class="text nav-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="Donante.php">
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
        <div class="table-container">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>CORREO</th>
                <th>ESTADO</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
        
            <tbody>
              <?php
                while ($row = mysqli_fetch_array($query)) {
              ?>
                <tr>
                  <td><?php echo $row['ID_DONANTE'] ?></td>
                  <td><?php echo $row['NOMBRE'] ?></td>
                  <td><?php echo $row['CORREO'] ?></td>
                  <td><?php echo $row['ESTADO_D'] ?></td>
                  <td><a href="editar.php?id=<?php echo $row['ID_DONANTE'] ?>" <i  class='bx bxs-paint button-delete'></i></a></td>
                  <td><a href="eliminar.php?id=<?php echo $row['ID_DONANTE'] ?>"<i class='bx bxs-user-x button-delete'></i></a></td>
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
<script src="../Dashboard.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>

