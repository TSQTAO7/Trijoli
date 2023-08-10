<?php
    require_once('../Conect.php');
    $con=conectar();
    $busqueda = $_POST['busqueda'];

    // Consulta para buscar en la tabla "donante"
    $sqlDonante = "SELECT ID_DONANTE, NOMBRE, CORREO, ESTADO_D FROM donante WHERE NOMBRE LIKE '%$busqueda%'";
    $resultadoDonante = mysqli_query($con, $sqlDonante);
    
    // Consulta para buscar en la tabla "articulo"
    $sqlArticulo = "SELECT ID_ARTICULO, NOMBRE, ESTADO_ACTIVIDAD, TIPO_ARTICULO, ESTADO_CALIDAD FROM articulo WHERE NOMBRE LIKE '%$busqueda%'";
    $resultadoArticulo = mysqli_query($con, $sqlArticulo);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultados de búsqueda</title>
  <link rel="stylesheet" href="busqueda.css">
</head>
<body>
  <div class="container">
    <h2>Resultados de búsqueda</h2>

    <!-- Resultados de Donantes -->
    <?php if (mysqli_num_rows($resultadoDonante) > 0): ?>
      <h3>Resultados de Donantes:</h3>
      <table>
        <tr>
          <th>ID</th>
          <th>NOMBRE</th>
          <th>CORREO</th>
          <th>ESTADO</th>
        </tr>
        <?php while ($fila = mysqli_fetch_assoc($resultadoDonante)): ?>
          <tr>
            <td><?php echo $fila['ID_DONANTE']; ?></td>
            <td><?php echo $fila['NOMBRE']; ?></td>
            <td><?php echo $fila['CORREO']; ?></td>
            <td><?php echo $fila['ESTADO_D']; ?></td>
          </tr>
        <?php endwhile; ?>
      </table>
    <?php else: ?>
      <p>No se encontraron resultados de Donantes.</p>
    <?php endif; ?>

    <!-- Resultados de Artículos -->
    <?php if (mysqli_num_rows($resultadoArticulo) > 0): ?>
      <h3>Resultados de Artículos:</h3>
      <table>
        <tr>
          <th>ID</th>
          <th>NOMBRE</th>
          <th>ESTADO ACTIVIDAD</th>
          <th>TIPO ARTÍCULO</th>
          <th>ESTADO CALIDAD</th>
        </tr>
        <?php while ($fila = mysqli_fetch_assoc($resultadoArticulo)): ?>
          <tr>
            <td><?php echo $fila['ID_ARTICULO']; ?></td>
            <td><?php echo $fila['NOMBRE']; ?></td>
            <td><?php echo $fila['ESTADO_ACTIVIDAD']; ?></td>
            <td><?php echo $fila['TIPO_ARTICULO']; ?></td>
            <td><?php echo $fila['ESTADO_CALIDAD']; ?></td>
          </tr>
        <?php endwhile; ?>
      </table>
    <?php else: ?>
      <p>No se encontraron resultados de Artículos.</p>
    <?php endif; ?>

    <!-- Botón para regresar al Dashboard -->
    <a class="btn-dashboard" href="Dashboard.php">Volver</a>
  </div>
</body>
</html>
