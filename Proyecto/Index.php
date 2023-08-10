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
    <link rel="stylesheet" href="Index1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
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
            <form action="./Login/Validar.php" method="post"  onsubmit="return validarContrasena()">
                <div class="input-box">
                    <input type="text" name="usu" required>
                    <label>Nombre</label>
                </div>
                <div class="input-box">
                    <input type="password" name="contra" required oninput="checkPasswordInput(this)">
                    <label>Contraseña</label>
                    <button type="button" class="show-password-btn" onclick="togglePasswordVisibility()"><i class="fas fa-eye"></i></button>
                </div>

                <div class="remember-forgot">
                    <a href="#">Olvide mi Contraseña</a>    
                </div>
                <button type="submit" class="btn" value="Ingresar">Login</button>
                <div class="login-register" id="miElemento" >
                    <p><a class="register-link"></a></p>
                </div>
            </form>
        </div>

        <div class="form-box register"> 
            <form action="#">
                <div class="login-register">
                    <p>¿Ya tienes Una cuenta?<a href="#" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
    </div>
    </header>
    <script>
        var elemento = document.getElementById("miElemento");
        elemento.style.display = "none";
        

        function checkPasswordInput(input) {
        var showPasswordBtn = input.parentNode.querySelector('.show-password-btn');
        
        if (input.value.length > 0) {
            showPasswordBtn.style.display = 'block';
            input.parentNode.classList.add('input-has-value');
        } else {
            showPasswordBtn.style.display = 'none';
            input.parentNode.classList.remove('input-has-value');
        }
    }

    function togglePasswordVisibility() {
        var passwordInput = document.querySelector('input[name="contra"]');
        var showPasswordBtn = document.querySelector('.show-password-btn');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            showPasswordBtn.innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            passwordInput.type = 'password';
            showPasswordBtn.innerHTML = '<i class="fas fa-eye"></i>';
        }
    }
    </script>
    <script src="login.js"></script>
</body>
</html>