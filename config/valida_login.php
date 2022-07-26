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

if(strlen($senha) == 0) {

    header('Location: ../index.php?senha=vazio');

} else if(!validaEmail($email)){

    header('Location: ../index.php?email=invalido');

} else {

    $sql_code = "SELECT email, senha, usuario FROM tb_usuario WHERE email = '$email' AND senha = '$senha'";
    $sql_query = mysqli_query($con, $sql_code);

    $quantidade = $sql_query->num_rows;

    if($quantidade == 1){

        $detalhes = $sql_query->fetch_assoc();
        header('Location: ../home.php');

        if(!isset($_SESSION)){
            session_start();
        }

        $_SESSION['usuario'] = $detalhes['usuario'];

    } else {
        header('Location: ../index.php?login=erro');
    }

}
?>