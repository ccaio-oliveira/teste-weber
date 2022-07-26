<?php

require_once './conectar_db.php';
$nome_categoria = $_POST['nome_categoria'];
$descricao = $_POST['descricao'];

$nome_categoria = ucfirst($nome_categoria);
$descricao = ucfirst($descricao);

if(strlen($nome_categoria) == 0 || strlen($descricao) == 0){

    header('Location: ../addCategoria.php?error=vazio');

} else {

    $sql_code = "INSERT INTO tb_categoria(nome_categoria, descricao) VALUES ('$nome_categoria', '$descricao')";
    $sql_query = mysqli_query($con, $sql_code);

    header('Location: ../addCategoria.php?add=sucesso');

}

?>