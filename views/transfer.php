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
        Transfer
    </title>
</head>

<body>
<h1>Banco Jones</h1>
<h3>Transfer page</h3>
<nav>
    <a href=""></a>
    <a href="welcome.php">welcome</a>
    <a href="query.php">query</a>
    <a href="profile.php">profile</a>
    <a href="logout.php">logout</a>
    <a href="init.php">init</a>
</nav>
<h2>Transacciones</h2>
<form action="controller.php" method="post">
    <select name="cuentas">

        <?php
        require_once('model/CuentaModel.php');
        $accounts=getAccounts('dni');
        for ($i=0; $i<sizeof($accounts) ;$i++){?>
            <option ><?php echo $accounts[$i]["cuenta"] ?></option>
        <?php }?>
    </select>
    Cuenta destino: <input name="cuenta_destino" type="text" />
    Cantidad: <input name="cantidad" type="text" />
    <input name="submit" type="submit" value="Seleccionar"/>
    <input name="control" type="hidden" value="transfer"/>
</form>
<?php //session_start();
//    if ( isset($_GET['a']) )
//        echo $_GET['a'];
//?>
</body>
</html>