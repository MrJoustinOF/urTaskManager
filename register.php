<?php
include 'includes/header.php';
if (isset($_POST)) {
    require_once 'includes/db.php';

    // Recoger datos de post
    $nombre = isset($_POST['registerNombre']) ? mysqli_real_escape_string($db, $_POST['registerNombre'])  : false;
    $mail = isset($_POST['registerMail']) ? mysqli_real_escape_string($db, trim($_POST['registerMail'])) : false;
    $password = isset($_POST['registerPassword']) ? mysqli_real_escape_string($db, $_POST['registerPassword']) : false;

    // Lista de errores
    $errores = array();

    //Validar nombre
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre) && $nombre != false) {
        $nombreValidado = true;
    } else {
        $nombreValidado = false;
        $errores['nombre'] = "El nombre no es valido";
    }

    // Validar mail
    if(!empty($mail) && filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $mailValidado = true;
    } else {
        $mailValidado = false;
        $errores['mail'] = "El mail no es valido"; 
    }

    //Validar contraseña
    if(!empty($password)) {
        $passwordValidada = true;
    } else {
        $passwordValidada = false;
        $errores['password'] = "Password vacia";
    }
    
    if(count($errores) == 0) {
        //Insertar en la base de datos
        $passwordSegura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
        $sql = "INSERT INTO usuarios VALUES (null, '$nombre', '$mail', '$passwordSegura')";
        $guardar = mysqli_query($db, $sql);

        if($guardar) {
            echo '<h2 class="mensajeRegister">Registro completado con exito, vuelve a la pagina principal e inicia sesion!, <a href="index.php">Haz click aqui</a></h2>';
        } else {
            echo '<h2 class="mensajeRegister">Fallo al guardar en la base de datos</h2>';
        }
        
    } else {
        //Mostrar error
        echo '<h2 class="mensajeRegister">';
        echo "Error al llenar el formulario, puede ser que tengas alguno de estos errores: "."<br>";
        echo "1.- El nombre no tiene que tener ningun numero" . "<br>";
        echo "2.- Introducir un email valido" . "<br>";
        echo "3.- La contraseña no puede estar vacia" . "<br>"; 
        echo "Volver a inicio, haz <a href='index.php'>click aqui</a>";
        echo "</h2>";
    }
}
    