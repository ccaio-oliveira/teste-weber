<?php

require_once './config/protect.php';
require_once './config/categorias.php';
require_once './config/produtos.php';
require_once './config/config.php';

$categorias = $sql_query_categ->fetch_assoc();
$produtos = $sql_query_prod->fetch_assoc();

$filtro = filter_input(INPUT_GET, 'filterProd', FILTER_SANITIZE_STRING);

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

                <form action="" method="GET">

                    <label for="filterProd">Filtrar produtos por categoria:</label>
                    <select name="filterProd" id="filterProd">

                        <option value="selected" selected>--Selecione uma opção--</option>

                        <?php

                        if ($quantidade_categ > 0) {

                            do { ?>

                                <option value="<?= $categorias['nome_categoria'] ?>"><?= $categorias['nome_categoria'] ?></option>

                            <?php } while ($categorias = $sql_query_categ->fetch_assoc());
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

                    <?php } if($_GET['filterProd'] == 'selected') {

                        do { ?>

                            <div class="prod-item">

                                <div><?php $imagem = base64_encode($produtos['foto']); echo "<img src='data:image/png;base64,$imagem'/>";?></div>
                                <div class="prod-text">
                                    <h2><?= $produtos['nome_produto'] ?></h2>
                                </div>
                                <div class="prod-info">
                                    <p class="preco">R$<?= $produtos['preco'] ?></p>
                                    <p class="categ">Categoria: <?= $produtos['categoria'] ?></p>
                                    <button class="remove-prod" onclick="apagarProduto(<?= $produtos['id_produto']; ?>)"><i class="fa-solid fa-trash-can"></i> Remover</button>
                                </div>

                            </div>

                        <?php } while ($produtos = $sql_query_prod->fetch_assoc());

                    } else if(isset($_GET['filterProd']) == $filtro){

                        $sql_filter = "SELECT * FROM tb_produtos WHERE categoria = '$filtro' ORDER BY nome_produto";
                        $sql_query_filter = mysqli_query($con, $sql_filter);

                        $filter = $sql_query_filter->fetch_assoc();

                        do { ?>

                            <div class="prod-item">

                                <div><?php $imagem = base64_encode($filter['foto']); echo "<img src='data:image/png;base64,$imagem'/>";?></div>
                                <div class="prod-text">
                                    <h2><?= $filter['nome_produto'] ?></h2>
                                </div>
                                <div class="prod-info">
                                    <p class="preco">R$<?= $filter['preco'] ?></p>
                                    <p class="categ">Categoria: <?= $filter['categoria'] ?></p>
                                    <button class="remove-prod" onclick="apagarProduto(<?= $filter['id_produto']; ?>)"><i class="fa-solid fa-trash-can"></i> Remover</button>
                                </div>

                            </div>

                        <?php } while($filter = $sql_query_filter->fetch_assoc());

                    } ?>

                </div>

            </section>
        </div>
    </main>

    <script src="./assets/js/app.js"></script>

</body>

</html>