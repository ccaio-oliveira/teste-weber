<?php 

session_start();
require_once './config.php';

$nome_produto = $_POST['nome_produto'];
$categoria = $_POST['nome_categoria'];
$preco = $_POST['preco'];
$imagem = $_FILES['image']['tmp_name'];

$nome_produto = ucfirst($nome_produto);
$categoria = ucfirst($categoria);
$preco = floatval($preco);

if(strlen($nome_produto) == 0){

    header('Location: ../add_produto.php?error=vazio');

} else if($imagem != 'none') {

    $tamanho = $_FILES['image']['size'];

    $fp = fopen($imagem, "rb");
    $conteudo = fread($fp, $tamanho);
    $conteudo = addslashes($conteudo);
    fclose($fp);

    $sql_code = "INSERT INTO tb_produtos(nome_produto, categoria, preco, foto) VALUES ('$nome_produto', '$categoria', $preco, '$conteudo')";
    $sql_query = mysqli_query($con, $sql_code);

    $cont = $sql_query->num_rows;

    if($cont > 0){

        header('Location: ../add_produto.php?add=sucesso');

    } else {

        header('Location: ../add_produto.php?add=error');
    }

}

?>