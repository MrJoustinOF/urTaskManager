<?php

if (isset($_POST)) {
    include 'includes/db.php';

    //Guardar sesiones en variables
    $mail = $_SESSION['mail'];
    $password = $_SESSION['password'];

    //Traer tareas
    $sql = "SELECT * FROM usuarios WHERE mail = '$mail'";
    $respuesta = mysqli_query($db, $sql);
    $respuesta = mysqli_fetch_assoc($respuesta);

    if ($mail == $respuesta['mail'] && password_verify($password, $respuesta['password'])) {
        include 'includes/header.php';
        $tareasQuery = "SELECT id, titulo, descripcion, entrega FROM tareas WHERE user_id = '$respuesta[id]';";
        $respuestaTareas = mysqli_query($db, $tareasQuery);
        $respuestaTareas = mysqli_fetch_all($respuestaTareas);

        echo '<div class="resultados">';
        echo '<h2 class="bienvenida">' . 'Bienvenid@ ' . $respuesta['nombre'] . "</h2>" . '<br>';
        echo '<a class="tituloAgregar" href="agregarTarea.php">Agregar Tarea</a>' . '<br>';
        echo '<p class="bienvenidaSecond">' . 'Estas son tus tareas: ' . '</p>' . '<br>';


        if ($respuestaTareas[0]) {

            foreach ($respuestaTareas as $tarea) {
?>
                <div class="seccionesResults">
                    <h2 class="resultTitulo"> <?= $tarea[1] ?> </h2><br>
                    <p class="parrafosResults"> <?= $tarea[2] ?>
                    <p><br>
                    <p class="parrafosResults"> <?= $tarea[3] ?>
                    <p><br>

                    <form action="delete.php" method="post">

                        <input type="hidden" name="id" id="id" value="<?php echo $tarea[0]; ?>">
                        <input type="submit" name="submit" value="Eliminar">

                    </form>
                    <br>

                    <form action="formedit.php" method="post">
                        <input type="hidden" name="title" id="title" value="<?php echo $tarea[1]; ?>">
                        <input type="hidden" name="description" id="description" value="<?php echo $tarea[2]; ?>">
                        <input type="hidden" name="entrega" id="entrega" value="<?php echo $tarea[3]; ?>">
                        <input type="submit" name="submit" value="Editar">
                    </form>

                </div>;
<?php
            }
        } else {
            echo "<h2 class='bienvenidaSecond'>No tienes tareas agregadas aun</h2>";
        }

        echo "</div>";
        include 'includes/footer.php';
    } else {
        echo "<h2>Login incorrecto, vuelve a inicio y verifica tus credenciales<h2>";
    }
}
