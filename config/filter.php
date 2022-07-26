<?php 

session_start();
require_once './conectar_db.php';

$select = $_POST['filterProd'];

if($select == 'selected'){

    $sql_code = "SELECT nome_produto, categoria, preco, foto, situacao FROM tb_produtos ORDER BY nome_produto";
    $sql_query = mysqli_query($con, $sql_code);

    $cont = $sql_query->num_rows;

    if($cont > 0){

        $produto = $sql_query->fetch_assoc();

    } else {

        header('Location: ../home.php?produto=vazio');

    }

}

?>