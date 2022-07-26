<?php

require_once './config/protect.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <?php require_once './head.php'; ?>

</head>

<body>

    <div class="container">

        <main>

            <section id="adicionar_cat">

                <h1>Adicionar produto</h1>
                <form action="./config/adiciona_categoria.php" method="POST">

                    <input type="text" id="nome_produto" name="nome_produto" placeholder="Nome do produto">
                    <input type="text" id="categoria" name="nome_categoria" placeholder="Nome da categoria">
                    <input type="number" id="preco" name="preco" placeholder="Preço do produto">
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