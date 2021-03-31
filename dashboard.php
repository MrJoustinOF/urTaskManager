<?php
include 'includes/header.php';
if(isset($_POST)) {
    include 'includes/db.php';
    
    $mail = trim($_POST['loginMail']);
    $password = $_POST['loginPassword'];

    $sql = "SELECT * FROM usuarios WHERE mail = '$mail'";
    $respuesta = mysqli_query($db, $sql);
    $respuesta = mysqli_fetch_assoc($respuesta);

    if($mail == $respuesta['mail'] && password_verify($password, $respuesta['password'])) {

        $tareasQuery = "SELECT id, titulo, descripcion, entrega FROM tareas WHERE user_id = '$respuesta[id]';";
        $respuestaTareas = mysqli_query($db, $tareasQuery);
        $respuestaTareas = mysqli_fetch_all($respuestaTareas);
        
        echo '<div class="resultados">';
        echo '<h2 class="bienvenida">' . 'Bienvenido ' . $respuesta['nombre'] . "</h2>";
        echo '<p class="bienvenidaSecond">' . 'Estas son tus tareas: ';
        for ($i=0; $i < $respuestaTareas[$i][0]; $i++) { 
            
            echo '<h2 class="resultTitulo">' . $respuestaTareas[$i][1] . '</h2>'.'<br>'; 
            echo '<p class="parrafosResults">' . $respuestaTareas[$i][2] . '<p>'.'<br>'; 
            echo '<p class="parrafosResults">' . $respuestaTareas[$i][3] . '<p>' .'<br>'; 
            echo '<br>';  
        }
        echo "</div>";
    } else {
        echo "Login incorrecto, vuelve a inicio y verifica tus credenciales";
    }
}