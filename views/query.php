<html>
<head>
    <title>Query</title>
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
<nav>
<a href=""></a><br>
<a href="welcome.php"></a><br>
<a href="query.php"></a><br>
<a href="profile.php"></a><br>
<a href="logout.php"></a><br>
<a href="init.php"></a>
</nav>

<h3>Query</h3>
<h2>Transacciones</h2>
<p>Lista de transacciones</p>
<select id="transsacciones" name="transactionlist" form="transactionform">
    <option value="todas">Todas</option>
    <option value="recibidas">Recibidas</option>
    <option value="enviadas">Enviadas</option>
</select>
<?php
session_start();
if (isset($_SESSION['saldo']))
    echo $_SESSION['saldo'];
?>
<form action="../controller/controller.php" method="post" >
    <input name="accountnumber" type="number" placeholder="numero de cuenta" /><br>
    <input name="amount" type="number" placeholder="acantidad"/><br>
    <input name="comentario" type="text" placeholder="comentario"/><br>
    <p></p>
    <input name="submit" value="Submit" type="submit" />
</form>

<form action="controller.php" method="post">
    <select name="cuentas">

        <?php
        require_once('model/CuentaModel.php');
        $accounts=getAccounts('dni');
        for ($i=0; $i<sizeof($accounts) ;$i++){?>
            <option ><?php echo $accounts[$i]["cuenta"] ?></option>
        <?php }?>
    </select>
    <input name="submit" type="submit" value="Seleccionar"/>
    <input name="control" type="hidden" value="query"/>
</form>

<?php
session_start();
if (isset($_SESSION['saldo'])) {
    echo "Saldo " . $_SESSION['saldo'] . '<br/>';
}
if (isset($_SESSION['lista'])) {
    $movimientos=$_SESSION['lista'];
    echo '<table class="default" rules="all" frame="border">';
    echo '<tr>';
    echo '<th>origen</th>';
    echo '<th>destino</th>';
    echo '<th>hora</th>';
    echo '<th>cantidad</th>';
    echo '</tr>';
    for ($i=0;$i<count($movimientos);$i++){
        echo '<tr>';
        echo '<td>'.$movimientos[$i]['origen'].'</td>';
        echo '<td>'.$movimientos[$i]['destino'].'</td>';
        echo '<td>'.$movimientos[$i]['hora'].'</td>';
        echo '<td>'.$movimientos[$i]['cantidad'].'</td>';
        echo '</tr>';
    }
    echo '</table>';

}

?>
</body>
</html>