<?php

if(isset($_POST)) {
    include 'includes/db.php';
    
    $mail = trim($_POST['loginMail']);
    $password = $_POST['loginPassword'];

    $sql = "SELECT * FROM usuarios WHERE mail = '$mail'";
    $respuesta = mysqli_query($db, $sql);
    $respuesta = mysqli_fetch_assoc($respuesta);

    if($mail == $respuesta['mail'] && password_verify($password, $respuesta['password'])) {
        include 'includes/header.php';
        $tareasQuery = "SELECT id, titulo, descripcion, entrega FROM tareas WHERE user_id = '$respuesta[id]';";
        $respuestaTareas = mysqli_query($db, $tareasQuery);
        $respuestaTareas = mysqli_fetch_all($respuestaTareas);
        
        echo '<div class="resultados">';
        echo '<h2 class="bienvenida">' . 'Bienvenid@ ' . $respuesta['nombre'] . "<br>" ."Tu ID de usuario es: " . $respuesta['id'] ."</h2>";
        echo '<p class="bienvenidaSecond">' . 'Estas son tus tareas: ' . '</p>' .'<br>'; 
        
        ?>


        <div class="agregarTarea">
            <h2 class="tituloAgregar">Agregar Tarea: </h2>
            <form action="agregarTarea.php" method="POST">
                
                <label for="user_id">Tu ID de usuario</label>
                <input type="number" name="user_id" id=""><br>

                <label for="titulo">Titulo</label>
                <input type="text" name="titulo"><br>

                <label for="descripcion">Descripcion: </label>
                <input type="text" name="descripcion"><br>

                <label for="entrega">Entrega: </label>
                <input type="text" name="entrega"> 
                <p>
                    NOTA: Para incluir la fecha debes poner primero el año, 
                    luego el mes (Acompañado de un cero por delante si es unidad), 
                    y por ultimo el dia, Ej: 2021-01-05 (Cinco de Enero del 2021)<br>
                    Cuando agregues una nueva tarea tendras que volver a iniciar sesion 
                </p><br>

                <input type="submit" value="Agregar Tarea" name="submitTask">

            </form>
        </div>

        <?php
        
        if ($respuestaTareas[0]) {
            for ($i=0; $i <= $respuestaTareas[$i]; $i++) { 
                echo '<div class="seccionesResults">';
                echo '<h2 class="resultTitulo">' . $respuestaTareas[$i][1] . '</h2>'.'<br>'; 
                echo '<p class="parrafosResults">' . $respuestaTareas[$i][2] . '<p>'.'<br>'; 
                echo '<p class="parrafosResults">' . $respuestaTareas[$i][3] . '<p>' .'<br>'; 
                echo '<br>';  
                echo '</div>';
            }
        }
        
        echo "</div>";
        include 'includes/footer.php';
    } else {
        echo "<h2>Login incorrecto, vuelve a inicio y verifica tus credenciales<h2>";
    }
}