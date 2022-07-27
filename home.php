<?php

require_once './config/protect.php';
require_once './config/categorias.php';
require_once './config/produtos.php';
require_once './config/conectar_db.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <?php require_once './head.php'; ?>
    <link rel="stylesheet" href="./assets/css/home.css">

</head>


<body>

    <header>

        <div class="container">

            <h1>Cardápio</h1>
            <nav>

                <ul>

                    <li>

                        <a href="./addCategoria.php" class="btn btn-warning">Adicionar categoria</a>

                    </li>
                    <li>

                        <a href="./add_produto.php" class="btn btn-warning">Adicionar produto</a>

                    </li>

                </ul>

            </nav>

        </div>

    </header>
    <main>

        <div class="container">

            <section id="filter">

                <form action="config/filter.php" method="POST">

                    <label for="filterProd">Filtrar produtos por categoria:</label>
                    <select name="filterProd" id="filterProd" onchange="">

                        <option value="selected" selected>--Selecione uma opção--</option>

                        <?php

                        if ($quantidade_categ > 0) {

                            $categoria = $sql_query_categ->fetch_assoc();

                            do { ?>

                                <option value="<?= $categoria['nome_categoria'] ?>"><?= $categoria['nome_categoria'] ?></option>

                            <?php } while ($categoria = $sql_query_categ->fetch_assoc());
                        } else {

                            header('Location: ./home.php?erro=invalido');
                        } ?>

                    </select>
                    <button>Buscar</button>

                </form>

            </section>
            <section id="produtos">

                <h1>Produtos disponíveis</h1>
                <div id="prod-list">

                    <?php if (isset($_GET['produto']) == 'vazio') { ?>

                        <div class="prod-vazio">
                            <h2>Nenhum produto disponível</h2>
                        </div>

                    <?php } else if(isset($_GET['categ']) == 'selected' or isset($_GET[''])) {

                        if ($quantidade_prod > 0) {

                            $produtos = $sql_query_prod->fetch_assoc();

                            do { ?>

                                <div class="prod-item">

                                    <div><?php $imagem = base64_encode($produtos['foto']); echo "<img src='data:image/png;base64,$imagem'/>";?></div>
                                    <div class="prod-text">
                                        <h2><?= $produtos['nome_produto'] ?></h2>
                                    </div>
                                    <div class="prod-info">
                                        <p class="preco">R$<?= $produtos['preco'] ?></p>
                                        <p class="categ">Categoria: <?= $produtos['categoria'] ?></p>
                                        <button class="remove-prod"><i class="fa-solid fa-trash-can"></i> Remover</button>
                                    </div>

                                </div>

                            <?php } while ($produtos = $sql_query_prod->fetch_assoc());
                        } else {
                            header('Location: ./home.php?produto=vazio');
                        }
                    } else {

                        if($quantidade_prod > 0 and $quantidade_categ > 0){

                            $categoria = $sql_query_categ->fetch_assoc();

                            do { ?>

                                <div class="prod-item">

                                    <div><?php $imagem = base64_encode($_SESSION['foto']); echo "<img src='data:image/png;base64,$imagem'/>";?></div>
                                    <div class="prod-text">
                                        <h2><?= $_SESSION['nome_produto'] ?></h2>
                                    </div>
                                    <div class="prod-info">
                                        <p class="preco">R$<?= $_SESSION['preco'] ?></p>
                                        <p class="categ">Categoria: <?= $_SESSION['categoria'] ?></p>
                                        <button class="remove-prod"><i class="fa-solid fa-trash-can"></i> Remover</button>
                                    </div>

                                </div>

                            <?php } while($categoria = $sql_query_categ->fetch_assoc());
                        } else {
                            header('Location: ./home.php?produto=vazio');
                        }

                    } ?>

                </div>

            </section>
        </div>
    </main>


    <script src="./assets/js/app.js"></script>
</body>

</html>