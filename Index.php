<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header class="contenido">
        <h1>Bienvenido a la pagina de manejo <br> de la fundacion de Trijoli</h1>
        <button class="btnlogin-popup">Acceder</button>
        <?php
            if (isset($_SESSION['error'])) {
                echo "<h1>" . $_SESSION['error'] . "</h1>";
                unset($_SESSION['error']);
            }
        ?>

      <div class="contenedor">
        <span class="icon-close">
            <i class='bx bx-x'></i>
        </span>

        <div class="form-box login">
            <h2>Login</h2>
            <form action="./Login/Validar.php" method="post">
                <div class="input-box">
                    <span class="icono"><i class='bx bx-user'></i></span>
                    <input type="text" name="usu" required>
                    <label>Nombre</label>
                </div>
                <div class="input-box">
                    <span class="icono"><i class='bx bx-lock-alt'></i></span>
                    <input type="password" name="contra" required>
                    <label>Contraseña</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Recuerdame</label>
                    <a href="#">Olvide mi Contraseña</a>    
                </div>
                <button type="submit" class="btn" value="Ingresar">Login</button>
                <div class="login-register">
                    <p>¿No tienes Una cuenta?<a href="#" class="register-link">Register</a></p>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <h2>Registro</h2>
            <form action="#">
                <div class="input-box">
                    <span class="icono"><i class='bx bxs-user' ></i></span>
                    <input type="text" required>
                    <label>Nombre</label>
                </div>
                <div class="input-box">
                    <span class="icono"><i class='bx bx-envelope'></i></span>
                    <input type="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icono"><i class='bx bx-lock-alt'></i></span>
                    <input type="password" required>
                    <label>Contraseña</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Acepto Terminos y Condiciones</label>    
                </div>
                <button type="submit" class="btn">Registrarse</button>
                <div class="login-register">
                    <p>¿Ya tienes Una cuenta?<a href="#" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
    </div>
    </header>

    <script src="login.js"></script>
</body>
</html>