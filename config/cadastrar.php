<?php 

session_start();
require_once('config.php');

$usuario = $_POST['username'];
$senha = $_POST['password'];
$email = $_POST['email'];

if(strlen($usuario) == 0){
    header('Location: ../cadastro.php?cadastro=erro');
} else if(strlen($senha) == 0){
    header('Location: ../cadastro.php?cadastro=erro');
} else if(strlen($email) == 0){
    header('Location: ../cadastro.php?cadastro=erro');
} else if(strlen($senha) > 10){
    header('Location: ../cadastro.php?senha=grande');
} else {

    $sql_verifica_user = "SELECT usuario FROM tb_usuario WHERE usuario = '$usuario'";
    $query_verifica_user = mysqli_query($con, $sql_verifica_user);
    $quantidade_user = $query_verifica_user->num_rows;

    $sql_verifica_email = "SELECT email FROM tb_usuario WHERE email = '$email'";
    $query_verifica_email = mysqli_query($con, $sql_verifica_email);
    $quantidade_email = $query_verifica_email->num_rows;

    if($quantidade_user == 1){
        
        $verificacao_user = $query_verifica_user->fetch_assoc();

        if($usuario == $verificacao_user['usuario']){
            header('Location: ../cadastro.php?usuario=cadastrado');
        }

    } else if($quantidade_email == 1){
        
        $verificacao_email = $query_verifica_email->fetch_assoc();

        if($email == $verificacao_email['email']){
            header('Location: ../cadastro.php?email=cadastrado');
        }

    } else {

        $sql = "INSERT INTO tb_usuario(usuario, senha, email) VALUES ('$usuario', '$senha', '$email')";
        $res = mysqli_query($con, $sql);
        $linhas = mysqli_affected_rows($con);

        if($linhas == 1){
            header('Location: ../index.php?cadastro=sucesso');
        } else {
            header('Location: ../cadastro.php?cadastro=erro');
        }

    }

}

mysqli_close($con);

?>