<?php
session_start();
ob_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Registro</title>
    <link rel="canonical" href="https://getbootstrap.comhttps://getbootstrap.com/docs/4.5/examples/sign-in/">
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="https://getbootstrap.com/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="https://getbootstrap.com/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="https://getbootstrap.com/docs/4.5/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="https://getbootstrap.com/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="https://getbootstrap.com/docs/4.5/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="https://getbootstrap.com/docs/4.5/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        *{
            background-color: antiquewhite;
            color: black;
        }
        .colorBancoJones{
            background-color: antiquewhite;
        }
        .fontBancoJones{
            font-family: 'Bebas Neue', cursive;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.5/examples/sign-in/signin.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<?php if (isset($_SESSION['user'])){
    header('Location: profile.php');
}else{ ?>
    <body class="text-center colorBancoJones">
    <form class="form-signin" method="post" action="../controller/controller.php">
        <h1 class="h3 mb-3 fontBancoJones">Inicia sesión en Banco Jones</h1>
        <label for="inputName" class="sr-only">DNI</label>
        <input name="dni" placeholder="DNI" type="text"  id="inputName" class="form-control" required>
        <label for="inputSurname" class="sr-only">Contraseña</label>
        <input name="password" placeholder="Contraseña" type="password" id="inputSurname" class="form-control" />
        <input name="control" value="login" type="hidden"/>
        <button class="btn btn-lg btn-primary btn-block" name="submit" value="Submit" type="submit"">Enviar</button>
        <?php
        if(isset($_POST['message'])){
            echo $_POST['message'];
        }
        ?>
        <p>Todavía no estas registrado? <a href="./register.php">Regístrate</a></p>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
    </form>
    </body>
<?php } ?>
</html>