<?php

session_start();
require './conectar_db.php';
require './categorias.php';

$select = $_POST['filterProd'];

$categorias = $sql_query_categ->fetch_assoc();


do {

    $categoria = $categorias['nome_categoria'];

    switch ($select) {

        case 'selected':

            header('Location: ../home.php?categ=selected');
            break;

        case $categoria:

            $sql_filter = "SELECT * FROM tb_produtos WHERE categoria like '$categoria' ORDER BY nome_produto";
            $sql_query_filter = mysqli_query($con, $sql_filter);

            $filter = $sql_query_filter->fetch_assoc();

            $_SESSION['nome_produto'] = $filter['nome_produto'];
            $_SESSION['foto'] = $filter['foto'];
            $_SESSION['categoria'] = $filter['categoria'];
            $_SESSION['preco'] = $filter['preco'];
            header('Location: ../home.php?categ' . $categoria);
            break;

    }
} while ($categorias = $sql_query_categ->fetch_assoc());