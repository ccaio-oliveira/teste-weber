<?php

require './conectar_db.php';
require './produtos.php';
require './categorias.php';

$select = $_POST['filterProd'];

if ($quantidade_prod > 0 and $quantidade_categ > 0) {

    $categoria = $sql_query_categ->fetch_assoc();    

    do {

        $categorias = $categoria['nome_categoria'];
        switch($select){

            case $categorias:

                $sql_filter = "SELECT * FROM tb_produtos WHERE categoria = '$categorias'";
                $query_filter = mysqli_query($con, $sql_filter);

                $cont = $query_filter->num_rows;

                if($cont > 0){

                    header('Location: ../home.php?categ=' . $categorias);

                }
                
        }

    } while ($categoria = $sql_query_categ->fetch_assoc() and $produtos = $sql_query_prod->fetch_assoc());
}
