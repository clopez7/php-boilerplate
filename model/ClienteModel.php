<?php
require_once('../db/DBManager.php');
function insertCliente($cliente){
    $manager = new DBManager();

    try{
        $sql="INSERT INTO cliente (nombre, apellidos, fecha_nacimiento, sexo, telefono, dni, email, password) VALUES (:nombre,:apellidos,:fecha_nacimiento,:sexo,:telefono,:dni,:email,:password)";

        $password=password_hash($cliente->getPassword(),PASSWORD_DEFAULT,['cost'=>10]);

        $stmt = $manager->getConexion()->prepare($sql);

        $nombre = $cliente->getNombre();
        $apellidos = $cliente->getApellidos();
        $fechaNacimiento = $cliente->getFechaNacimiento();
        $sexo = $cliente->getSexo();
        $telefono = $cliente->getTelefono();
        $dni = $cliente->getDNI();
        $email = $cliente->getEmail();
        $password = $cliente->getPassword();

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos',$apellidos);
        $stmt->bindParam(':fecha_nacimiento',$fechaNacimiento);
        $stmt->bindParam(':sexo',$sexo);
        $stmt->bindParam(':telefono',$telefono);
        $stmt->bindParam(':dni',$dni);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$password);
                                                                              
        if ($stmt->execute()){
            echo "todo OK";
        }else{
            echo "MAL";
            print_r($stmt->errorInfo());
        }

    }catch (PDOException $e){
        echo $e->getMessage();
    }
}
function selectCliente($dni){
    $manager = new DBManager();
    try{
        $sql="SELECT * FROM cliente WHERE dni=:dni";
        $stmt = $manager->getConexion()->prepare($sql);
        $stmt->bindValue(':dni',$dni);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $obj = new Cliente($result[0]['nombre'],$result[0]['apellidos'],$result[0]['fecha_nacimiento'],$result[0]['sexo'],$result[0]['telefono'],$result[0]['dni'],$result[0]['email'],$result[0]['password'],$result[0]['imagen']);
        return $obj;
    }catch ( PDOException $e){
        echo $e->getMessage();
    }
}
function updateCliente($image,$dni){
    $manager = new DBManager();
    try{
        $sql="UPDATE cliente SET imagen=:img WHERE dni=:dni";
        $stmt = $manager->getConexion()->prepare($sql);
        $stmt->bindParam(':img',$image,PDO::PARAM_LOB);
        $stmt->bindParam(':dni',$dni);
        $stmt->execute();
    }catch ( PDOException $e){
        echo $e->getMessage();
    }
}