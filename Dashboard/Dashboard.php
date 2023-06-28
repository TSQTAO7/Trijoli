<?php require_once("../proteger.php"); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../CSS/Dashboard.css">
    <!----======== Sidebar ======== -->
    </script><link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
     <div>
       <div>
         <div class="logocorp">
            <div>
              <p><b> Fundacion <br> Trigo y Ajonjoli</b></p>
            </div>
            <div>
              <img src="../Img/Logo.png" alt="">
            </div>
         </div>
         <div >
             <div>
                <h3>Misión y Visión</h3>
                <h5 >Mision:
                  Más que una organización de beneficencia es un grupo de personas que apartan de su vida
                  un instante para ser dedicada a cambiar nuestra sociedad mediante numerosas iniciativas
                  diseñadas para ayudar a los necesitados. Juntos podemos marcar una diferencia en el
                  mundo para las futuras generaciones. Ya sea que contribuya con donativos o como
                  voluntario.
                  </h5>
                  <br>
                <h5 >Vision:
                  En el 2025 ser la fundación más grande con personas rehabilitadas y alcanzadas para Cristo
                  y así reincorporarlos a la sociedad nuevamente y llevar una vida digna con familia y hogar
                  estable.
                  </h5>
             </div>
         </div>
         <div class="Mapa">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8593.652305809486!2d28.221915329994903!3d43.401078713414606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9efbc589069d%3A0x5e185619e3f6eff4!2zRXN0YWNpw7NuIFBlcmRvbW8sIEJvc2EsIEJvZ290w6E!5e1!3m2!1ses!2sco!4v1678972295740!5m2!1ses!2sco" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
       </div>
     </div>
  </div>

  
<footer class="footer" >
  <div class="text">
      <div >
        <h5 ><b>Trijoli</b> Esencia y mensaje del cielo para el mundo</h5>

            <div>
                <div>
                  <b> somos una empresa encargada de la distribución de productos de primera necesidad de la canasta familiar, ubicada en el barrio el Perdomo, en la localidad de Ciudad Bolívar. Esta empresa busca mejorar los servicios de venta al público, de manera digital, y asi satisfacer las necesidades del cliente</b>
                </div>
            </div>
        </div>
      </div>
     </div>
 </div>
</footer>
</section>
 


  <script src="Dashboard.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
</body>
</html>