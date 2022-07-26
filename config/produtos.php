<?php 

require_once './config/conectar_db.php';
$sql_code = "SELECT * FROM tb_produtos";
$sql_query_prod = mysqli_query($con, $sql_code);

$quantidade_prod = $sql_query_prod->num_rows;

?>