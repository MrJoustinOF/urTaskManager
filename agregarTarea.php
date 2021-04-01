<?php

if(isset($_POST)) {
    include 'includes/db.php';
    $user_id = $_POST['user_id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $entrega = $_POST['entrega'];

    $insertarTask = "INSERT INTO tareas (user_id, titulo, descripcion, entrega) VALUES ($user_id, '$titulo', '$descripcion', '$entrega');";
    $guardarTask = mysqli_query($db, $insertarTask);
    var_dump(mysqli_error($db));
    if($guardarTask) {
        header('Location: index.php');
    } 
}