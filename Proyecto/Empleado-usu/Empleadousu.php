<?php
    require_once("../proteger.php");
    require_once("../Conect.php");
    $con=conectar();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      if (isset($_POST['formulario1'])) {
          $nombre = $_POST['nombre'];
          $cargo = $_POST['cargo'];
          $estado = $_POST['estado'];
  
          $query = "INSERT INTO EMPLEADO (NOMBRE, CARGO, ESTADO_E) VALUES ('$nombre', '$cargo', '$estado')";
          $resultado = mysqli_query($con, $query);
  
          if (!$resultado) {
              echo "Error al guardar el empleado: " . mysqli_error($con);
          }
      } 
      }

      
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../CSS/Donante1.css">
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
            <a href="../Destino/dest.php">
              <i class='bx bx-package icon'></i>
              <span class="text nav-text">Destino</span>
            </a>
          </li>
          
          <li class="nav-link">
            <a href="Empleadousu.php">
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
        <form id="form1" action="" method="POST" style="display: none;">
            <h2>Empleado</h2>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="cargo">Cargo:</label>
                <input type="text" id="cargo" name="cargo" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <select id="estado" name="estado" required>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>
            <input type="submit" name="formulario1" value="Guardar">
        </form>

        <form id="form2" action="" method="POST" style="display: none;">
            <h2>Usuario</h2>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <select id="estado" name="estado" required>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>
            <div class="form-group">
              <label for="id_empleado">ID del Empleado:</label>
              <select id="id_empleado" name="id_empleado" required>
                  <?php
                  // Consulta para obtener los empleados disponibles
                  $queryEmpleados = "SELECT ID_EMPLEADO, NOMBRE FROM EMPLEADO";
                  $resultEmpleados = mysqli_query($con, $queryEmpleados);

                  while ($rowEmpleado = mysqli_fetch_array($resultEmpleados)) {
                      echo '<option value="' . $rowEmpleado['ID_EMPLEADO'] . '">' . $rowEmpleado['NOMBRE'] . '</option>';
                  }
                  ?>
              </select>
            </div>

            <input type="submit" name="formulario2" value="Guardar">
        </form>


        <button id="btnFormulario1" class="open-form-button">Añadir Empleado</button>
        <button id="btnFormulario2" class="open-form-button">Añadir Usuario</button>
    </div>
    <div class="table-container">
      <table class="table">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>NOMBRE</th>
                  <th>CARGO</th>
                  <th>ESTADO</th>
              </tr>
          </thead>
          
          <tbody>
              <?php
              $query = "SELECT * FROM EMPLEADO ORDER BY ID_EMPLEADO DESC LIMIT 10"; // Obtener los últimos 10 empleados
              $result = mysqli_query($con, $query);
              while ($row = mysqli_fetch_array($result)) {
              ?>
                  <tr>
                      <td><?php echo $row['ID_EMPLEADO'] ?></td>
                      <td><?php echo $row['NOMBRE'] ?></td>
                      <td><?php echo $row['CARGO'] ?></td>
                      <td><?php echo $row['ESTADO_E'] ?></td>
                  </tr>
              <?php
              }
              ?>
          </tbody>
      </table>
    </div>
  </section>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const btnFormulario1 = document.getElementById("btnFormulario1");
        const btnFormulario2 = document.getElementById("btnFormulario2");
        const form1 = document.getElementById("form1");
        const form2 = document.getElementById("form2");

        btnFormulario1.addEventListener("click", function () {
            form1.style.display = "block";
            form2.style.display = "none";
        });

        btnFormulario2.addEventListener("click", function () {
            form1.style.display = "none";
            form2.style.display = "block";
        });
    });
    
    function cerrarSesion() {
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
    }
  </script>
  <script src="../Dashboard/Dashboard.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
