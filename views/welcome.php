<!DOCTYPE html>
<html>
<head>
<style>
    *{
        background-color: antiquewhite;
        color: black;
        font-family: 'Bebas Neue', cursive;
    }
</style>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<title>
    Upload
</title>
</head>
</html>

<?php
session_start();
echo "Hola mundo<br/>" . $_SESSION['user'];
echo "Has iniciado sesion correctamente, bienvenido de nuevo";
header("Location: profile.php");
?>