<?php
    require('../model/Cliente.php');
    require('../model/ClienteModel.php');
    require('../model/CuentaModel.php');
    require_once ('../helpers/validations.php');
    require_once ('../db/config.php');

if (isset($_POST['submit'])) {
    if ($_POST['control'] == 'register') {
        $nombre = $_POST['name'];
        $apellido = $_POST['surname'];
        $numeroTelefono = $_POST['phonenumber'];
        $DNI = $_POST['dni'];
        $email = $_POST['email'];
        $fechaNacimiento = $_POST['birthdate'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];

        if (validateRegister($nombre, $apellido, $DNI, $numeroTelefono, $fechaNacimiento, $email, $password)!='') {
            $cliente = new Cliente($nombre, $apellido, $fechaNacimiento, $gender, $numeroTelefono, $DNI, $email, password_hash ( $password,PASSWORD_DEFAULT),0);
            insertCliente($cliente);
            header('Location: ../views/login.php');
        } else {
            $_POST['message']=validate();
            require_once('../views/register.php');
            header("Location: ../views/register.php");
        }
    }

    if ($_POST['control'] == 'login') {
        require_once('../views/login.php');
        $obj = selectCliente($_POST['dni']);
        $hash = $obj->getPassword();
        if (password_verify($_POST['password'], $hash)) {
            session_start();
            $_SESSION['user'] = serialize($obj);
            header('Location: ../views/profile.php');
        } else {
            header('Location: ../views/login.php');
        }
    }

    if ($_POST['control'] == 'profile') {
        require_once('../views/profile.php');
        $check = "";

        if($_FILES['upload']['tmp_name']){
            $check = getimagesize($_FILES['upload']['tmp_name']);
            $fileName = $_FILES['upload']['name'];
            $fileSize = $_FILES['upload']['size'];
            $fileType = $_FILES['upload']['type'];
        }



//        echo $fileName . '<br/>';
//        echo $fileSize . '<br/>';
//        echo $fileType . '<br/>';
        $image='';
        $user = unserialize($_SESSION['user']);
        if ($_FILES['upload']['tmp_name']) {
            $image = file_get_contents($_FILES['upload']['tmp_name']);
            updateCliente($image,$user->getDni());
            header('../views/login.php');
        } else {
            header('../views/login.php');
        }
    }

    if ($_POST['control'] == 'create ') {
        session_start();
        createAccount($_SESSION['user']);
    }

    if ($_POST['control'] == 'select_account') {
        $saldo = getSaldo($_POST['cuentas']);
        session_start();
        $_SESSION['saldo'] = $saldo;
        header("Location: query.php");
    }

    if ($_POST['control'] == 'transfer') {
        if (existeCuenta($_POST['cuentas']) && existeCuenta($_POST['cuenta_destino'])) {
            transfer($_POST['cuentas'], $_POST['cuenta_destino'], $_POST['cantidad']);
        }
    }

    if($_POST['control']=='create'){
        session_start();
        $user = "";
        if(isset($_SESSION['user'])){
            $user = unserialize($_SESSION['user']);
        }
        createAccount($user->getNombre());
    }
}

function showImage($dni){
    $obj = selectCliente($dni);
    ob_start();
    fpassthru($obj->getImagen());
    $data = ob_get_contents();
    ob_end_clean();
    $img = "data:image/*;base64," . base64_encode($data);
    echo "<p>Foto de perfil</p>";
    echo "<img height=100 src='" . $img . "'/>";
}
