<?php 

require_once './config/config.php';
$sql_code_prod = "SELECT * FROM tb_produtos ORDER BY nome_produto";
$sql_query_prod = mysqli_query($con, $sql_code_prod);

$quantidade_prod = $sql_query_prod->num_rows;

?>