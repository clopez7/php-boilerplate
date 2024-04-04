<?php
function transfer($origen, $destino, $cantidad)
{

$manager = new DBManejador();
try {
$sql = "INSERT INTO movimientos (origen,destino,hora,cantidad) VALUES (:origen,:destino,now(),:cantidad)";
$stmt = $manager->getConexion()->prepare($sql);
$stmt->bindParam(':origen', $origen);
$stmt->bindParam(':destino', $destino);
$stmt->bindParam(':cantidad', $cantidad);
$stmt->execute();

$sql = "UPDATE cuenta SET saldo = saldo - $cantidad WHERE cuenta=:origen";
$stmt = $manager->getConexion()->prepare($sql);
$stmt->bindParam(':origen', $origen);
$stmt->execute();


$manager->cerrarConexion();

} catch (PDOException $e) {
echo $e->getMessage();
}
}