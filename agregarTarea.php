<?php
require_once 'includes/header.php';
?>

<div class="agregarTarea" id="agregartarea">
    <h2 class="formTitle">Agregar Tarea: </h2>
    <form action="add.php" method="POST">

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

        <input type="submit" value="Agregar Tarea" name="submit">

    </form>
</div>

<?php
require_once 'includes/footer.php';
?>