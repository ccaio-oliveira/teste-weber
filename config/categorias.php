<?php 

require_once 'conectar_db.php';
$sql_code = "SELECT nome_categoria FROM tb_categoria";
$sql_query_categ = mysqli_query($con, $sql_code);

$quantidade_categ = $sql_query_categ->num_rows;

?>