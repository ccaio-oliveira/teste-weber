<?php

require_once './config.php';
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){

    $sql_code = "DELETE FROM tb_produtos WHERE id_produto = '$id'";
    $sql_query = mysqli_query($con, $sql_code);
    header('Location: ../home.php');

} else {

    header('Location: ../home.php?produto=vazio');

}

?>