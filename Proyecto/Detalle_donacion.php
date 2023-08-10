<?php 
require_once("./proteger.php");
require_once('./Conect.php');
    $con=conectar();
// Obtener los datos de detalles de donación
if (isset($_POST['filtrar'])) {
    $filtro_articulo = $_POST['filtro_articulo'];
    $filtro_donante = $_POST['filtro_donante'];


    $query = "SELECT * FROM DETALLE_DONACION WHERE 1=1";

    if (!empty($filtro_articulo)) {
        $query .= " AND ID_ARTICULO_FK = $filtro_articulo";
    }

    if (!empty($filtro_donante)) {
        $query .= " AND ID_DONANTE_FK = $filtro_donante";
    }

    $result = mysqli_query($con, $query);
} else {
    // Obtener todos los detalles de donación si no se aplican filtros
    $result = mysqli_query($con, "SELECT * FROM DETALLE_DONACION");
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
    <link rel="stylesheet" href="./CSS/Dashboard1.css">
    <!----======== Sidebar ======== -->
    </script><link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Trijoli</title>
</head>
<body>
  
  <nav class="sidebar close">
    <header>
        <div class="image-text">
          <span class="image">
            <img src="./Img/Logo.png" alt="logo">
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
            <form action="busqueda.php" method="post">
            <input type="text" name="busqueda" placeholder="Search...">
            </form>
        </li>
          <li class="nav-link">
            <a href="Dashboard.php">
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
            <a href="../Insert/insert.php">
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
     <!-- Barra lateral -->
        <h1>Detalles de Donación</h1>
            
            <!-- Formulario de filtros -->
            <form method="POST">
                <label>Filtrar por Artículo:</label>
                <select name="filtro_articulo">
                    <option value="">Seleccione un artículo</option>
                    <?php
                    $query_articulos = "SELECT ID_ARTICULO, NOMBRE FROM ARTICULO";
                    $result_articulos = mysqli_query($con, $query_articulos);

                    while ($row_articulo = mysqli_fetch_assoc($result_articulos)) {
                        echo '<option value="' . $row_articulo['ID_ARTICULO'] . '">' . $row_articulo['NOMBRE'] . '</option>';
                    }
                    ?>
                </select>

                <label>Filtrar por Donante:</label>
                <select name="filtro_donante">
                    <option value="">Seleccione un donante</option>
                    <?php
                    $query_donantes = "SELECT ID_DONANTE, NOMBRE FROM DONANTE";
                    $result_donantes = mysqli_query($con, $query_donantes);

                    while ($row_donante = mysqli_fetch_assoc($result_donantes)) {
                        echo '<option value="' . $row_donante['ID_DONANTE'] . '">' . $row_donante['NOMBRE'] . '</option>';
                    }
                    ?>
                </select>
                
                <button type="submit" name="filtrar">Filtrar</button>
            </form>

            
            <!-- Tabla de resultados -->
            <table>
                <thead>
                    <tr>
                        <th>ID Artículo</th>
                        <th>ID Donante</th>
                        <th>Cantidad</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?php echo $row['ID_ARTICULO_FK']; ?></td>
                            <td><?php echo $row['ID_DONANTE_FK']; ?></td>
                            <td><?php echo $row['CANTIDAD']; ?></td>
                            <td><?php echo $row['DESCRIPCION']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
  </div>
</section>
 


  <script src="./Dashboard/Dashboard.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>function cerrarSesion() {
    // Envía una petición AJAX al archivo de cierre de sesión
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../cerrar.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Redirecciona al usuario a la página de inicio de sesión después de cerrar sesión
        window.location.href = "./Index.php";
      }
    };
    xhr.send();
  }</script>
</body>
</html>