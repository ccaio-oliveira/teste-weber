<?php

require_once './conectar_db.php';

$select = $_POST['filterProd'];

switch ($select) {

    case 'selected':

        $sql_code = "SELECT * FROM tb_produtos";
        $sql_query = mysqli_query($con, $sql_code);

        $cont = $sql_query->num_rows;

        if ($cont > 0) {

            header('Location: ../home.php?tipo=selected');

        } else {

            header('Location: ../home.php?produto=vazio');

        }

        break;
    
    // case ''

}
?>