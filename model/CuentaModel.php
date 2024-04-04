<?php
require_once('../db/DBManager.php');

function getSaldo($cuenta){
    $manager = new DBManager();
    try {
        $sql = "SELECT saldo FROM cuenta WHERE cuenta=:cuenta";
        $stmt = $manager->getConexion()->prepare($sql);
        $stmt->bindParam(':cuenta',$cuenta);
        $stmt->execute();
        $rt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $manager->cerrarConexion();
        return $rt[0]['saldo'];
    }catch(PDOException $e){
        echo $e->getMessage();
    }

}
function getLastId(){
    $manager = new DBManager();
    try {
        $sql = "SELECT cuenta FROM cuenta ORDER BY cuenta DESC limit 1";
        error_log($sql);
        $stmt = $manager->getConexion()->prepare($sql);
        $stmt->execute();
        $rt = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (sizeof($rt)>0){
            return $rt[0]['id'];
        }else{
            return 0;
        }
        //$manager->cerrarConexion();

    }catch(PDOException $e){
        echo $e->getMessage();
    }

}
function getUserId($dni)
{
    $manager = new DBManager();
    try {
        $sql = "SELECT id FROM cliente WHERE dni=:dni";
        $stmt = $manager->getConexion()->prepare($sql);
        $stmt->bindParam(':dni',$dni);
        $stmt->execute();
        $rt = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (sizeof($rt) > 0) {
            return $rt[0]['id'];
        } else {
            return 0;
        }
        $manager->cerrarConexion();
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
function createAccount($user){;
    $manager = new DBManager();

    $rt = null;
    try {
        $lastId=getLastId()+1;
        echo($lastId);
        $len=strlen($lastId);

        $iban='';
        for ($i=1;$i<24-$len;$i++){
            $iban.='0';
        }
        $iban.=$lastId;
        $sql = "INSERT INTO cuenta (cuenta,id_cliente,saldo,creacion) VALUES (:cuenta,1,0,now())";
        $stmt = $manager->getConexion()->prepare($sql);
        $stmt->bindParam(':cuenta',$iban);
        $stmt->execute();
        $manager->cerrarConexion();
        header("Location: ../views/init.php");
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
function getAccounts($dni){
    $manager = new DBManager();
    try {
        $id_cliente=getUserId($dni);
        $sql = "SELECT * FROM cuenta WHERE id_cliente=:id_cliente";
        $stmt = $manager->getConexion()->prepare($sql);
        $stmt->bindParam(':id_cliente',$id_cliente);
        $stmt->execute();
        $rt = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rt;
        $manager->cerrarConexion();

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}