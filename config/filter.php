<?php

session_start();
require './config.php';
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

            do {

                $_SESSION = $filter;

            } while ($filter = $sql_query_filter->fetch_assoc());
            
            
            header('Location: ../home.php?categ=' . $categoria);

    }
} while ($categorias = $sql_query_categ->fetch_assoc());