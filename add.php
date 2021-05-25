<?php

if (isset($_POST['submit'])) {
    require_once 'includes/db.php';

    $mail = $_SESSION['mail'];

    $usuarioQuery = "SELECT id FROM usuarios WHERE mail = '$mail';";
    $respuesta = mysqli_query($db, $usuarioQuery);
    $respuesta = mysqli_fetch_assoc($respuesta);



    $user_id = $respuesta['id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $entrega = $_POST['entrega'];

    $insertarTask = "INSERT INTO tareas (user_id, titulo, descripcion, entrega) VALUES ($user_id, '$titulo', '$descripcion', '$entrega');";
    $guardarTask = mysqli_query($db, $insertarTask);
    var_dump(mysqli_error($db));
    if ($guardarTask) {
        header('Location: dashboard.php');
    }
} else {
    echo "Error al guardar";
}
