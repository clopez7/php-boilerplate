<?php 
require_once('../model/Cliente.php');
require_once('../model/ClienteModel.php');
session_start();
    
if (isset($_SESSION['user'])){ 
    $user = unserialize($_SESSION['user']); ?>
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
</head>
<body>
<h1>BANCO JONES</h1>
<h3>Cuentas</h3>
<a href="profile.php">Profile</a>
<a href="logout.php">Logout</a><br>
<div>
    <p>Cuentas del usuario</p>
    <form action="../controller/controller.php" method="post">
        <select name="cuentas">
            <option>
                <?php
                    require_once('../model/CuentaModel.php');
                    $accounts=getAccounts($user->getDni());
                    for ($i=0; $i<sizeof($accounts) ;$i++){
                        echo $accounts[$i]["cuenta"];
                    } 
                ?>
            </option>
        </select>
        <input name="control" type="hidden" value="select_account"/>
        <input name="submit" type="submit" value="Seleccionar"/>
    </form>
</div>
<div>
    <form action="..\controller\controller.php" method="post">
        <input name="submit" type="submit" value="Crear cuenta"/>
        <input name="control" type="hidden" value="create"/>
    </form>
</div>
</body>
</html>
<?php
} else{ 
    header('Location: /views/login.php');
}?>