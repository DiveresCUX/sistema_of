<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/registro.css"">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Servicios Héctor Redlich</title>
</head>
<body>

    <section class="banner">


        <div class="banner_fondo">
        </div>
    

        <div class="registro">

            <div class="registro_container">

                <h1>Registro</h1>

                <form class="form_register" action="../controller/registro.php" method="post">

                <input type="text" name="nombre" placeholder="Nombre">
                <?php
                    session_start();
                    if (count($_SESSION["err_nombre"]) != 0) {
                        foreach(  $_SESSION["err_nombre"] as $errore){
                            echo "<p class='errores'>*$errore</p>";
                        }
                    }
                ?>

                <input type="number" name="telefono" placeholder="Teléfono">

                <?php
                    
                    if (count($_SESSION["err_telefono"]) != 0) {
                        foreach(  $_SESSION["err_telefono"] as $errore){
                            echo "<p class='errores'>*$errore</p>";
                        }
                    }
                ?>

                <input type="email" name="email" placeholder="Correo">

                <?php
    
                    if (count($_SESSION["err_email"]) != 0) {
                        foreach(  $_SESSION["err_email"] as $errore){
                            echo "<p class='errores'>*$errore</p>";
                        }
                    }
                ?>

                <input type="password" name="password" placeholder="Contraseña">

                <?php
                    
                    if (count($_SESSION["err_password"]) != 0) {
                        foreach(  $_SESSION["err_password"] as $errore){
                            echo "<p class='errores'>*$errore</p>";
                        }
                    }
                ?>

                <p>¿Ya tienes cuenta? Ingresa <a href="#">acá</a></p>

                <button type="submit" class="btn btn-light">Registrar</button>

                
           
                </form>

            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</section>

</body>
</html>