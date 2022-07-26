<?php

require_once './config/protect.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <?php require_once './head.php'; ?>
    <link rel="stylesheet" href="./assets/css/add_prod.css">

</head>

<body>

    <div class="container">

        <main>

            <section id="adicionar_prod">

                <h1>Adicionar produto</h1>
                <form action="./config/adiciona_produto.php" method="POST" enctype="multipart/form-data">

                    <input type="text" id="nome_produto" name="nome_produto" placeholder="Nome do produto">
                    <input type="text" id="categoria" name="nome_categoria" placeholder="Nome da categoria">
                    <input type="number" id="preco" name="preco" placeholder="Preço do produto">
                    <label for="image">Adicionar imagem do produto: </label>
                    <input type="file" name="image" id="image">
                    <button type="submit">Adicionar produto</button>
                    <?php if (isset($_GET['error']) == 'vazio') { ?>

                        <div class="error">
                            <p>Inserir todos os dados</p>
                        </div>

                    <?php } else if (isset($_GET['add']) == 'sucesso') { ?>

                        <div class="success">
                            <p>Adicionado com sucesso</p>
                        </div>

                    <?php } else if (isset($_GET['add']) == 'error') { ?>

                        <div class="error">
                            <p>Erro ao adicionar produto</p>
                        </div>

                    <?php } ?>

                </form>

            </section>

        </main>

    </div>

</body>

</html>