<?php 

require_once 'conectar_db.php';
$sql_code = "SELECT nome_categoria FROM tb_categoria";
$sql_query = mysqli_query($con, $sql_code);

$quantidade_categ = $sql_query->num_rows;

?>