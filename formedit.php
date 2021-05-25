<?php

include 'includes/header.php';
require_once 'includes/db.php';

$title = $_POST['title'];
$description = $_POST['description'];
$entrega = $_POST['entrega'];

if ($_POST) {
?>
    <form action="edit.php" method="post">
        <div class="editForm">
            <strong><label for="title">Titulo</label></strong><br>
            <input type="text" value="<?php if (isset($title)) echo $title ?>" name="title">
            <br>

            <strong><label for="description">Descripcion</label></strong><br>
            <input type="text" value="<?php if (isset($description)) echo $description ?>" name="description">
            <br>

            <strong><label for="entrega">Entrega</label></strong><br>
            <input type="text" value="<?php if (isset($entrega)) echo $entrega ?>" name="entrega">
            <br>

            <input type="hidden" value="<?= $title ?>" name="oldTitle">

            <input type="submit" value="Editar">
        </div>
    </form>
<?php
} else {
    header('Location: index.php');
}

include 'includes/footer.php';
