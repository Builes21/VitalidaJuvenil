<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Moderno</title>
    <link rel="icon" type="image/png" href="IMG/Logo.png?v=2">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* --- ESTILOS BASE Y PRE-CARGADOR (EXISTENTES) --- */
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* El pre-cargador no se modifica, solo se asegura que funcione con el nuevo fondo */
        #loader{
            position: fixed;
            inset: 0;
            background: rgba(10, 20, 30, 0.8); /* Fondo oscuro para el loader */
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            backdrop-filter: blur(5px);
        }

        @property --square-1 { syntax: "<transform-function>"; inherits: true; initial-value: translate(0,0); }
        @property --square-2 { syntax: "<transform-function>"; inherits: true; initial-value: translate(0,0); }
        @property --square-3 { syntax: "<transform-function>"; inherits: true; initial-value: translate(0,0); }
        @property --square-4 { syntax: "<transform-function>"; inherits: true; initial-value: translate(0,0); }

        .loader-square{
            display: grid;
            grid-template-columns: max-content max-content; 
            animation: loader 2.5s infinite linear;
            gap: 10px;
        }

        .square{
            width: 60px;
            height: 60px;
            background-color: #00e1ff; /* Color cian para un toque moderno */
            box-shadow: 0 0 25px rgba(0, 225, 255, 0.7);
        }

        .square-1{ transform: var(--square-1); }
        .square-2{ transform: var(--square-2); }
        .square-3{ transform: var(--square-3); }
        .square-4{ transform: var(--square-4); }

        @keyframes loader{
            0%{ --square-1:translate(0%,0%); --square-2:translate(0%,0%); --square-3:translate(0%,0%); --square-4:translate(0%,0%); }
            25%{ --square-1:translate(-100%,-100%); --square-2:translate(100%,-100%); --square-3:translate(-100%,100%); --square-4:translate(100%,100%); }
            50%{ --square-1:translate(100%,-100%); --square-2:translate(100%,100%); --square-3:translate(-100%,-100%); --square-4:translate(-100%,100%); }
            75%{ --square-1:translate(100%,100%); --square-2:translate(-100%,100%); --square-3:translate(100%,-100%); --square-4:translate(-100%,-100%); }
            100%{ --square-1:translate(0%,0%); --square-2:translate(0%,0%); --square-3:translate(0%,0%); --square-4:translate(0%,0%); }
        }

        /* --- NUEVOS ESTILOS MODERNOS --- */
        body{
            font-family: 'Poppins', sans-serif;
            /* Fondo de imagen que cubre toda la pantalla */
            background-image: url('https://static.vecteezy.com/system/resources/previews/006/789/422/large_2x/abstract-black-friday-wallpaper-luxury-background-template-color-art-template-business-dark-vector.jpg');
            background-size: cover; /* Asegura que la imagen cubra todo */
            background-position: center; /* Centra la imagen */
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            overflow: hidden; /* Oculta las partículas que se salen */
        }

        /* Partículas (ligeramente modificadas para el nuevo fondo) */
        .particle{
            position: absolute;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            opacity: 0.7;
            animation: float 8s infinite ease-in-out;
            z-index: -1; /* Detrás del contenedor de login */
        }

        @keyframes float {
            0% { transform: translateY(100vh) scale(0.5); opacity: 0; }
            50% { opacity: 0.8; }
            100% { transform: translateY(-10vh) scale(1.2); opacity: 0; }
        }

        /* Contenedor principal del Login, ahora invisible por defecto */
        .login-container {
            display: none; /* Se mostrará con JS */
            width: 850px;
            height: 550px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-radius: 20px;
            overflow: hidden; /* Clave para que el borde redondeado afecte a los hijos */
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
            animation: fadeIn 1s forwards;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95) translateY(10px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }

        /* Lado derecho para la animación/GIF (ahora está en el lado derecho) */
        .login-art {
            background-color: rgba(0, 0, 0, 0.4); /* Fondo oscuro semitransparente */
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0; /* Quitamos el padding para que la imagen ocupe todo */
            overflow: hidden; /* Nos aseguramos que la imagen no se salga */
        }

        .login-art img {
            width: 100%;
            height: 100%; /* La imagen ocupa toda la altura */
            object-fit: cover; /* La imagen cubre el contenedor sin deformarse */
        }
        
        /* Lado izquierdo para el formulario con efecto vidrio (ahora está en el lado izquierdo) */
        .login-form-wrapper {
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1); /* Efecto vidrio más pronunciado */
            border-right: 1px solid rgba(255, 255, 255, 0.2); /* Borde más visible */
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            color: #fff;
        }

        .login-form-wrapper h1 {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 10px;
            text-align: center;
        }
        
        .login-form-wrapper h1 ins {
            text-decoration: none;
            border-bottom: 3px solid #00e1ff;
            padding-bottom: 5px;
        }

        .login-form {
            display: flex;
            flex-direction: column;
            gap: 20px; /* Espacio entre elementos del form */
            margin-top: 30px;
        }

        .input-group {
            position: relative;
        }

        .input-group img {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            opacity: 0.6;
        }
        
        /* Contenedor para el link de olvidar contraseña */
        .form-options {
            text-align: right;
            margin-top: -10px; /* Lo acerca al campo de contraseña */
        }

        .forgot-password-link {
            color: #00e1ff;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .forgot-password-link:hover {
            color: #fff;
            text-decoration: underline;
        }


        .login-form input {
            width: 100%;
            padding: 15px 15px 15px 50px; /* Espacio para el icono */
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.2);
            color: #fff;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        .login-form input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .login-form input:focus {
            outline: none;
            border-color: #00e1ff;
            background: rgba(0, 0, 0, 0.3);
            box-shadow: 0 0 15px rgba(0, 225, 255, 0.3);
        }

        .button, .link-button {
            padding: 15px;
            border-radius: 10px;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            text-align: center;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
            display: block;
        }

        .button {
            background: linear-gradient(45deg, #00e1ff, #1d6dff);
            color: #fff;
        }

        .button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(29, 109, 255, 0.4);
        }
        
        .link-button {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
        }
        
        .link-button:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        /* Estilo para mensajes de PHP (error, éxito, etc.) */
        .message {
            color: #fff;
            padding: 12px;
            border-radius: 5px;
            text-align: center;
            border: 1px solid;
            margin-bottom: 15px;
        }
        .error-message {
            background-color: rgba(255, 82, 82, 0.2);
            border-color: rgba(255, 82, 82, 0.4);
        }
        .success-message {
            background-color: rgba(46, 204, 113, 0.2);
            border-color: rgba(46, 204, 113, 0.4);
        }


    </style>
</head>
<body>
    
    <!-- Loader (Sin cambios en su HTML) -->
    <div id="loader">
        <div class="loader-square">
            <div class="square square-1"></div>
            <div class="square square-2"></div>
            <div class="square square-3"></div>
            <div class="square square-4"></div>
        </div>
    </div>

    <!-- Script de Partículas (Sin cambios en su lógica) -->
    <script>
        // Este script no se ha modificado, solo se ejecuta como estaba.
        for(let i=0; i<40; i++){ // Aumenté un poco el número para más efecto
            const particle = document.createElement("div");
            particle.classList.add("particle");
            document.body.appendChild(particle);

            const colors = ["#00e1ff","#1d6dff", "#ffffff"];
            particle.style.background = colors[Math.floor(Math.random()*colors.length)];
            particle.style.left = Math.random()*100 + "vw";
            particle.style.animationDuration = (5 + Math.random()*7) + "s";
            particle.style.animationDelay = Math.random()*4 + "s";
        }
    </script>
    
    <!-- Nuevo Contenedor Principal del Login -->
    <div class="login-container">
        <!-- Lado Izquierdo: Formulario (Ahora está en el lado izquierdo) -->
        <div class="login-form-wrapper">
             
            <!-- Formulario de Iniciar Sesión (Visible por defecto) -->
            <div id="login-form-container">
                <h1><ins>INICIAR SESIÓN</ins></h1>
                <form class="login-form" action="Login/LoginAuth.php" method="post">
                    <?php if(isset($_GET['error'])) { ?>
                        <p class="message error-message"><?php echo htmlspecialchars($_GET['error']); ?></p>
                    <?php } ?>
                     <?php if(isset($_GET['success'])) { ?>
                        <p class="message success-message"><?php echo htmlspecialchars($_GET['success']); ?></p>
                    <?php } ?>
                    
                    <div class="input-group">
                        <img src="https://img.icons8.com/ios-glyphs/90/ffffff/user-male-circle.png" alt="user-icon"/>
                        <input type="text" placeholder="Usuario" name="usuario" autocomplete="off" required>
                    </div>
                    
                    <div class="input-group">
                         <img src="https://img.icons8.com/ios-glyphs/90/ffffff/lock--v1.png" alt="key-icon"/>
                        <input type="password" placeholder="Clave" name="clave" autocomplete="off" required>
                    </div>

                    <div class="form-options">
                        <a href="#" id="forgotPasswordLink" class="forgot-password-link">¿Olvidaste tu contraseña?</a>
                    </div>

                    <button type="submit" class="button">Ingresar</button>
                    <a href="Registrarse.php" class="link-button">Registrarse</a> 
                </form>
            </div>

            <!-- Formulario de Recuperar Contraseña (Oculto por defecto) -->
            <div id="forgot-form-container" style="display: none;">
                <h1><ins>RECUPERAR</ins></h1>
                <form class="login-form" action="reset/request-reset.php" method="post">
                    <p style="text-align: center; margin-bottom: 20px;">Ingresa tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.</p>
                    <div class="input-group">
                        <img src="https://img.icons8.com/ios-glyphs/90/ffffff/new-post.png" alt="email-icon"/>
                        <input type="email" placeholder="Correo electrónico" name="email" autocomplete="off" required>
                    </div>
                    <button type="submit" class="button">Enviar enlace</button>
                    <a href="index.php" id="backToLoginLink" class="link-button">Volver a Iniciar Sesión</a> 
                </form>
            </div>

        </div>
        
        <!-- Lado Derecho: Arte/Animación (Ahora está en el lado derecho) -->
        <div class="login-art">
             <!-- Puedes cambiar este GIF por el que prefieras -->
            <img src="https://i.pinimg.com/originals/0c/f4/a1/0cf4a1d2fe4015906db36015a32f8ef1.gif" alt="Animación decorativa" alt="Animación decorativa">
        </div>
    </div>

    <!-- Script del Loader (Sin cambios en su lógica) -->
    <script>
        window.addEventListener("load", () => {
            const loader = document.getElementById("loader");
            const content = document.querySelector(".login-container");

            setTimeout(() => {
                loader.style.display = "none";
                content.style.display = "grid";
            }, 2500);
        });

        // --- NUEVO SCRIPT PARA CAMBIAR ENTRE FORMULARIOS ---
        const loginContainer = document.getElementById('login-form-container');
        const forgotContainer = document.getElementById('forgot-form-container');
        const forgotLink = document.getElementById('forgotPasswordLink');
        const backLink = document.getElementById('backToLoginLink');

        forgotLink.addEventListener('click', (e) => {
            e.preventDefault();
            loginContainer.style.display = 'none';
            forgotContainer.style.display = 'block';
        });

        backLink.addEventListener('click', (e) => {
            e.preventDefault();
            forgotContainer.style.display = 'none';
            loginContainer.style.display = 'block';
        });
    </script>
</body>
</html>

