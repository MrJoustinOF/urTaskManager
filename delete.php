<?php


if ($_POST) {
    require_once 'includes/db.php';

    $id = intval($_POST['id']);
    $sql = "DELETE FROM tareas WHERE id = '$id';";
    $eliminar = mysqli_query($db, $sql);
    if ($eliminar) {
        header('Location: dashboard.php');
    }
} else {
    header('Location: index.php');
}
