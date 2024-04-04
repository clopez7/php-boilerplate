<?php 
    require_once('../controller/controller.php');
    session_start();
    if (isset($_SESSION['user'])){ 
         $user = unserialize($_SESSION['user']);
        ?>
        <html>
        <head>
            <style>
                *{
                    background-color: antiquewhite;
                    color: black;
                    font-family: 'Bebas Neue', cursive;
                }
                div{
                    background-color: antiquewhite;
                    color: black;
                    font-family: 'Bebas Neue', cursive;
                }
            </style>
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>
            <title>
                Profile
            </title>
        </head>
        <body>
            <nav style="background-color: antiquewhite;">
                <h2>Perfil</h2>
                <a href="./init.php">Ver Cuentas</a>
                <a href="./logout.php">Logout</a>
            </nav>
        <body style="background-color: antiquewhite;">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h2>Datos del usuario</h2>
                    <?php showImage($user->getDni()); ?>
                    <p>Nombre: <?php echo $user->getNombre();  ?></p>
                    <p>Apellidos: <?php echo $user->getApellidos(); ?></p>
                    <p>Sexo: <?php echo $user->getSexo(); ?></p>
                    <p>Fecha de nacimiento:<?php echo $user->getFechaNacimiento(); ?></p>
                    <p>DNI: <?php echo $user->getDni(); ?></p>
                    <p>Numero de telefono: <?php echo $user->getTelefono(); ?></p>
                    <p>Email: <?php echo $user->getEmail(); ?></p>
                </div>
                <div class="col-sm">
                    <h2>Modifica perfil</h2>
                    <form action="../controller/controller.php" method="post" enctype="multipart/form-data">
                        <p>Cambia la imagen de perfil </p>
                        <input type="file" name="upload" value="upload"/>
                        <p>Introdueix nova contrasenya:</p>
                        <input name="password" type="password" placeholder="password" /><br>
                        <p>Introdueix nou email:</p>
                        <input name="emailuse" type="text" placeholder="email" /><br>
                        <p>Introdueix el nou numero de telefon:</p>
                        <input name="telephonenumber" type="number" placeholder="Telephone Number"/><br>
                        <input name="register" value="register" type="hidden"/><br>
                        <input name="control" value="profile" type="hidden"/>
                        <input name="submit" value="Enviar DADES" type="submit"/><br>
                    </form>
                </div>
            </div>
        </div>
        </body>


    <?php }else{
        header('Location: login.php');
    } ?>
    </body>
</html>
