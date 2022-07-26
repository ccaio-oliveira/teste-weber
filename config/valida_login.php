<?php

session_start();
require_once './conectar_db.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

function validaEmail($email){

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    } else {
        return false;
    }
}

if(strlen($senha) === 0) {

    header('Location: ../index.php?senha=vazio');

} else if(!validaEmail($email)){

    header('Location: ../index.php?email=invalido');

} //else {

//     $sql_code = 'SELECT '

// }
?>