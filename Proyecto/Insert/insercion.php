<?php
session_start();

require_once("../Conect.php");
$con = conectar();

if (isset($_SESSION['usu'])) {
  $nombreUsuario = $_SESSION['usu'];

  // Verificar la existencia del usuario y obtener el campo ID_EMPLEADO_FK_USUARIO
  $sql = "SELECT ID_EMPLEADO_FK_USUARIO FROM usuario WHERE NOMBRE_USUARIO = '$nombreUsuario'";
  $query = mysqli_query($con, $sql);

  if ($query && mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $idEmpleado = $row['ID_EMPLEADO_FK_USUARIO'];
    
    // Inserción del donante
    if (isset($_POST['submit_donante'])) {
      $NOM = $_POST['Nom1'] ?? '';
      $COR = $_POST['Cor'] ?? '';

      // Verificar que se hayan recibido los valores esperados
      if ($NOM !== '' && $COR !== '') {
        // Escapar los valores para evitar inyección de SQL (recomendado)
        $NOM = mysqli_real_escape_string($con, $NOM);
        $COR = mysqli_real_escape_string($con, $COR);

        // Preparar la consulta SQL para el segundo formulario
        $sql2 = "INSERT INTO donante (NOMBRE, CORREO) VALUES ('$NOM','$COR')";
        $query2 = mysqli_query($con, $sql2);

        if ($query2) {
          // Mostrar el segundo formulario
          echo '
          <!DOCTYPE html>
            <html lang="es">
            <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
            <!-- CSS -->
            <link rel="stylesheet" href="../CSS/Donante1.css">
            <!-- Sidebar -->
            
            <title>Trijoli</title>
            </head>
            <body>
            <section class="home">
                <div class="text">
                <div class="form-container">
                    <div class="form">
                    <h2>Insercion Articulo</h2>
                    <form id="form1" action="insercion.php" method="POST">
                        <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="Nom" name="Nom" required>
                        </div>
                        <div class="form-group">
                        <label for="apellido">Estado de Actividad:</label>
                        <select id="EstA" name="EstA" class="select-style" required>
                            <option value=""></option>
                            <option value="disponible">Disponible</option>
                            <option value="agotado">Agotado</option>
                        </select>
                        </div>
                        <div class="form-group">
                        <label for="email">Tipo de Articulo:</label>
                        <select id="TipA" name="TipA" class="select-style" required>
                            <option value=""></option>
                            <option value="dinero">Dinero</option>
                            <option value="ropa">Ropa</option>
                            <option value="comida">Comida</option>
                        </select>
                      
                        </div>
                        <div class="form-group">
                        <label for="telefono">Calidad:</label>
                        <select id="EstCal" name="EstCal" class="select-style" required>
                            <option value=""></option>
                            <option value="mal_estado">Mal estado</option>
                            <option value="estado_promedio">Estado promedio</option>
                            <option value="buen_estado">Buen estado</option>
                        </select>
                        </div>
                        <div class="form-group">
                        <div class="form-group">
                        <label for="mensaje">Id del Empleado:</label>
                        <input type="text" id="Emp" name="Emp" value="'.$idEmpleado.'" readonly>
                        </div>
                        <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea name="descripcion" id="descripcion" rows="4" cols="50"></textarea>
                        </div>
                        <div class="form-group">
                        <button type="submit" name="submit_articulo">Enviar</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </section>
            </body>
            </html>

          ';
        } else {
          echo "Error en la consulta SQL 2: " . mysqli_error($con);
        }
      }
    }

    // Inserción del artículo
    if (isset($_POST['submit_articulo'])) {
      $Nom = $_POST['Nom'] ?? '';
      $EstA = $_POST['EstA'] ?? '';
      $TipA = $_POST['TipA'] ?? '';
      $EstC = $_POST['EstCal'] ?? '';
      $IdEmp = $_POST['Emp'] ?? '';

      // Verificar que se hayan recibido los valores esperados
      if ($Nom !== '' && $EstA !== '' && $TipA !== '' && $EstC !== '' && $IdEmp !== '') {
        // Escapar los valores para evitar inyección de SQL (recomendado)
        $Nom = mysqli_real_escape_string($con, $Nom);
        $EstA = mysqli_real_escape_string($con, $EstA);
        $TipA = mysqli_real_escape_string($con, $TipA);
        $EstC = mysqli_real_escape_string($con, $EstC);
        $IdEmp = mysqli_real_escape_string($con, $IdEmp);

        // Preparar la consulta SQL para el segundo formulario
        $sql1 = "INSERT INTO articulo (NOMBRE, ESTADO_ACTIVIDAD, TIPO_ARTICULO, ESTADO_CALIDAD, ID_EMPLEADO_FK_ARTICULO) VALUES ('$Nom','$EstA','$TipA','$EstC','$IdEmp')";
        $query1 = mysqli_query($con, $sql1);

        if ($query1) {
          // Obtener el ID del artículo recién insertado
          $articuloId = mysqli_insert_id($con);
      
          // Obtener el valor de la descripción desde el formulario
          $descripcion = $_POST['descripcion'] ?? '';
      
          // Escapar el valor para evitar inyección de SQL (recomendado)
          $descripcion = mysqli_real_escape_string($con, $descripcion);
      
          // Preparar la consulta SQL para la inserción en la tabla "detalle_donacion"
          $sql = "INSERT INTO detalle_donacion (ID_ARTICULO_FK, ID_DONANTE_FK, DESCRIPCION) VALUES ('$articuloId', (SELECT MAX(ID_DONANTE) FROM donante), '$descripcion')";
          $query = mysqli_query($con, $sql);
      
          if ($query) {
              // Redirigir al usuario a la página deseada
              header("Location: ../Articulo/Articulo.php");
              exit();
          } else {
              echo "Error en la consulta SQL: " . mysqli_error($con);
          }
        } else {
          echo "Error en la consulta SQL : " . mysqli_error($con);
        }
      }
    }
  } else {
    echo "No se encontró el usuario en la tabla usuario.";
  }
} else {
  echo "No se ha iniciado sesión.";
}

mysqli_close($con);
