<?php
$error = '';
function validateNombreApellido($nombre){
    return preg_match('^[a-zA-Z ]^', $nombre);
}
function validateNumeroDeTelefono($numero){
    if(preg_match('/^6/',$numero)&&strlen($numero)==9){
        $correct = true;
    }else if(preg_match('/^7/',$numero)&&strlen($numero)==9){
        $correct = true;
    } else {
        $correct = false;
    }
    return $correct;
}
function validateDNI($DNI){
    $letter = substr($DNI, -1);
    $number = str_replace($letter,"",$DNI);
    $checkNumber =  (int)$number%23;
    if($letter=="T" && $checkNumber==0){
        $correctLetter = true;
    }else if($letter=="R" && $checkNumber==1){
        $correctLetter = true;
    }else if($letter=="W" && $checkNumber==2){
        $correctLetter = true;
    }else if($letter=="A" && $checkNumber==3){
        $correctLetter = true;
    }else if($letter=="G" && $checkNumber==4){
        $correctLetter = true;
    }else if($letter=="M" && $checkNumber==5){
        $correctLetter = true;
    }else if($letter=="Y" && $checkNumber==6){
        $correctLetter = true;
    }else if($letter=="F" && $checkNumber==7){
        $correctLetter = true;
    }else if($letter=="P" && $checkNumber==8){
        $correctLetter = true;
    }else if($letter=="D" && $checkNumber==9){
        $correctLetter = true;
    }else if($letter=="X" && $checkNumber==10){
        $correctLetter = true;
    }else if($letter=="B" && $checkNumber==11){
        $correctLetter = true;
    }else if($letter=="N" && $checkNumber==12){
        $correctLetter = true;
    }else if($letter=="J" && $checkNumber==13){
        $correctLetter = true;
    }else if($letter=="Z" && $checkNumber==14){
        $correctLetter = true;
    }else if($letter=="S" && $checkNumber==15){
        $correctLetter = true;
    }else if($letter=="Q" && $checkNumber==16){
        $correctLetter = true;
    }else if($letter=="V" && $checkNumber==17){
        $correctLetter = true;
    }else if($letter=="H" && $checkNumber==18){
        $correctLetter = true;
    }else if($letter=="L" && $checkNumber==19){
        $correctLetter = true;
    }else if($letter=="C" && $checkNumber==20){
        $correctLetter = true;
    }else if($letter=="K" && $checkNumber==21){
        $correctLetter = true;
    }else if($letter=="E" && $checkNumber==22){
        $correctLetter = true;
    }else{
       $correctLetter = false;
    }

    return $correctLetter;
}
function validateEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function validateBirthdate($lbirthdate){
    $birthdate = strtotime($lbirthdate);
    $birthyear = date('Y', $birthdate);
    $currentYear= date("Y");

    if($currentYear-$birthyear<18){
        $majority = false;
    } else{
        $majority = true;
    }
    return $majority;
}
function validatePassword($password){
    if(strlen($password)<8){
        $pass = false;
    }else{
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialCharacter = preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/",$password);
            if(!$uppercase||!$lowercase||!$number||!$specialCharacter||!$number){
                $pass = false;
            }else{
                $pass = true;
           }
    }
    return $pass;
}
function validateRegister($lnombre, $lapellido, $lDNI, $lnumero,$lbirthdate,$lemail,$lpassword){
    $pass = true;
    if (!validateNombreApellido($lnombre)){
        $GLOBALS['error']='El nombre debe contener solo letras y/o espacios<br/> ';
        $pass = false;
    }
    if(!validateNombreApellido($lapellido)){
        $GLOBALS['error']='El apellido debe contener solo letras y/o espacios<br/> ';
        $pass = false;
    }
    if(!validateDNI($lDNI)){
        $GLOBALS['error']='La letra del DNI no es correcta<br/> ';
        $pass = false;
    }
    if(!validateNumeroDeTelefono($lnumero)){
        $GLOBALS['error']='El numero de telefono debe tener 9 caracteres y empezar por 6 o 7<br/>';
        $pass = false;
    }
    if(!validateBirthdate($lbirthdate)){
        $GLOBALS['error']='La edad minima son 18 años<br/> ';
        $pass = false;
    }
    if(!validateEmail($lemail)){
        $GLOBALS['error']='El formato del email es incorrecto<br/> ';
        $pass = false;
    }
    if(!validatePassword($lpassword)){
        $GLOBALS['error']='El password debe tener mayusculas, minusculas, un caracter especial y mas de 8 caracteres<br/> ';
        $pass = false;
    }
        return $GLOBALS['error'];
}