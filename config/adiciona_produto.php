<?php 

session_start();
require_once './conectar_db.php';

$nome_produto = $_POST['nome_produto'];
$categoria = $_POST['categoria'];
$preco = $_POST['preco'];
$imagem = $_POST['image'];

$nome_produto = ucfirst($nome_produto);
$categoria = ucfirst($categoria);

if(strlen($nome_produto) == 0 or strlen($categoria) == 0 or strlen($preco) == 0 or strlen($imagem) == 0){

    header('Location: ../add_produto.php?error=vazio');

} else {

    $sql_code = "INSERT INTO tb_produtos(nome_produto, categoria, preco, foto) VALUES ('$nome_produto', '$categoria', $preco, '$imagem'";
    $sql_query = mysqli_query($con, $sql_code);

    $cont = $sql_query->num_rows;

    if($cont > 0){

        header('Location: ../add_produto.php?add=sucesso');

    } else {

        header('Location: ../add_produto.php?add=error');
    }

}

?>