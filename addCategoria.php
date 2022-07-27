<?php

require_once './config/protect.php';
require_once './config/categorias.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php require_once './head.php'; ?>
    <link rel="stylesheet" href="./assets/css/add_categ.css">
</head>

<body>
    <div class="container">
        <header>
            <a href="./home.php" class="btn btn-warning">Voltar para a pagina inicial</a>
        </header>
        <main>
            <section id="adicionar_cat">
                <h1>Adicionar categoria</h1>
                <form action="./config/adiciona_categoria.php" method="POST">
                    <input type="text" id="categoria" name="nome_categoria" placeholder="Nome da categoria">
                    <textarea name="descricao" id="desc_categ" cols="200" rows="5" placeholder="Descrição"></textarea>
                    <button type="submit">Adicionar categoria</button>
                    <?php if (isset($_GET['error']) == 'vazio') { ?>
                        <div class="error">
                            <p>Inserir todos os dados</p>
                        </div>
                    <?php } ?>
                    <?php if (isset($_GET['add']) == 'sucesso') { ?>
                        <div class="success">
                            <p>Adicionado com sucesso</p>
                        </div>
                    <?php } ?>
                </form>
            </section>
        </main>
    </div>

</body>

</html>