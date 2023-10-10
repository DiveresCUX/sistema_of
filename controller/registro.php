<?php 

    include("../conexion/conexion.php");

    
    
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $password = $_POST["password"];



    $err_nombre = [];
    $err_email = [];
    $err_telefono = [];
    $err_password = [];

    //Validación nombre

    if(!isset($nombre) || empty($nombre)){
        $err_nombre []= "El campo nombre está vacio o no existe";
        
    }elseif(preg_match("/[0-9]/", $nombre)){
        $err_nombre [] = "El campo nombre solo permite letras";
    }elseif(!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombre)) {
        $err_nombre [] = "El campo nombre no es válido";
    }

    //Validación email

    
    if(empty($email)) {
        $err_email []= "El campo Correo Electrónico es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err_email []= "El formato del correo electrónico no es válido.";
    }

       //Validación teléfono

    if(empty($telefono)) {
        $err_telefono []= "El campo Teléfono es obligatorio.";
    } elseif (!preg_match("/^\d{9}$/", $telefono)) {
        $err_telefono []= "El formato del teléfono no es válido. Debe tener 9 dígitos numéricos.";
    }

    //Validación Contraseña

    if (empty($password)) {
        $err_password []= "El campo Contraseña es obligatorio.";
    } elseif (strlen($password) < 8) {
        $err_password []= "La contraseña debe tener al menos 8 caracteres.";
    } 


    /*
    elseif (!preg_match("/[A-Z]+/", $password)) {
        $errores[] = "La contraseña debe contener al menos una letra mayúscula.";
    } elseif (!preg_match("/[a-z]+/", $password)) {
        $errores[] = "La contraseña debe contener al menos una letra minúscula.";
    } elseif (!preg_match("/[0-9]+/", $password)) {
        $errores[] = "La contraseña debe contener al menos un número.";
    }
    */
   
    

  



    if (count($err_nombre) == 0 && count($err_email) == 0 && count($err_telefono) == 0 && count($err_password) == 0) {
        echo "nombre ingresado correctamente";
    } else {
        // Aquí debes manejar los errores, por ejemplo, redireccionar a la página de registro con los mensajes de error.
        // Puedes almacenar los errores en una variable de sesión y mostrarlos en la página de registro.
        // Ejemplo:
        session_start();
        $_SESSION["err_nombre"] = $err_nombre;
        $_SESSION["err_email"] = $err_email;
        $_SESSION["err_telefono"] = $err_telefono;
        $_SESSION["err_password"] = $err_password;
        include('../views/registro.php');
        header("Location: ../views/registro.php");
        exit;
    }


?>