<?php include 'includes/header.php' ?>

      <div class="hero">
        <h2>Administra tus tareas y aumenta tu productividad</h2>
      </div>
    </div>

    <section class="info">
      <h2>¿urTaskManager?</h2>
      <p>
        Hola!, bienvenido a urTaskManager, te preguntaras como funciona, muy
        simple!, solo registrate/inicia sesion, agrega tus tareas, y podras
        administrarlas / marcarlas como completadas / por hacer / para una fecha
        en especifico y organizar tu tiempo para ser mucho mas productivo!
      </p>
    </section>

    <div class="tipsi">
      <h2>Tips</h2>
      <p>
        Si bien urTaskManager te ayuda a administrar tu tiempo y tareas, sera
        muy estresante!, por lo tanto te sugerimos que visites nuestra pagina de
        Tips para mayor eficiencia
      </p>
      <p>Puedes acceder a ella haciendo <a href="tips.php"> click aqui!</a></p>
    </div>

    <section class="registerForm">

      <h2>Registro: </h2>
      <form action="register.php" method="post">

        <label for="registerNombre">Tu nombre: </label><br>
        <input type="text" name="registerNombre" placeholder="Registrate con tu nombre"><br>

        <label for="registerMail">Tu mail: </label><br>
        <input type="email" name="registerMail" id="" placeholder="Registrate con tu mail"><br>

        <label for="registerPassword">Escribe una contraseña: </label><br>
        <input type="password" name="registerPassword" id="" placeholder="Registrate con una contraseña "><br>
        
        <input type="submit" value="Registrarse!" name="submit"><br>

      </form>
    </section>

    <section class="loginForm">
    <h2>Login: </h2>
      <form action="dashboard.php" method="post">

        <label for="loginMail">Mail: </label><br>
        <input type="mail" name="loginMail" placeholder="Escribe tu mail"><br>

        <label for="loginPassword">Password: </label><br>
        <input type="password" name="loginPassword" placeholder="Escribe tu contraseña"><br>

        <input type="submit" value="Iniciar sesion" name="submit"><br>
      </form>
    </section>

    <?php include 'includes/footer.php' ?>
    <script src="./scripts/index.js"></script>
  </body>
</html>
