<?php

if ($_POST) {
    require_once 'includes/db.php';

    $title = $_POST['title'];
    $description = $_POST['description'];
    $entrega = $_POST['entrega'];
    $oldTitle = $_POST['oldTitle'];

    $getId = "SELECT id FROM tareas WHERE titulo = '$oldTitle'";
    $respuesta = mysqli_query($db, $getId);
    $respuesta = mysqli_fetch_assoc($respuesta);
    $id = intval($respuesta['id']);


    $sql = "UPDATE tareas SET titulo = '$title', descripcion = '$description', entrega = '$entrega' WHERE id = '$id';";
    $update = mysqli_query($db, $sql);

    if ($update) {
        header('Location: dashboard.php');
    }
} else {
    header('Location: index.php');
}
