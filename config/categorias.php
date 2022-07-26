<?php 

require_once './config/conectar_db.php';
$sql_code = "SELECT nome_categoria FROM tb_categoria";
$sql_query = mysqli_query($con, $sql_code);

$quantidade = $sql_query->num_rows;

?>