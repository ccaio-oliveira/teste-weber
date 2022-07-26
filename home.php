<?php

require_once './config/protect.php';
require_once './config/categorias.php';

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

                <form action="./config/filter.php" method="POST">

                    <label for="filterProd">Filtrar produtos por categoria:</label>
                    <select name="filterProd" id="filterProd" onchange="">

                        <option value="selected">--Selecione uma opção--</option>

                        <?php

                        if ($quantidade > 0) {

                            $categoria = $sql_query->fetch_assoc();

                            do { ?>

                                <option value="<?= $categoria['nome_categoria'] ?>"><?= $categoria['nome_categoria'] ?></option>

                        <?php } while ($categoria = $sql_query->fetch_assoc());

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

                    <?php if(isset($_GET['produto']) == 'vazio'){ ?>

                        <div class="prod-vazio">
                            <h2>Nenhum produto disponível</h2>
                        </div>
                    
                    <?php } else { 

                        do { ?>

                            <div class="prod-item">

                                <img src="<?php $produto['foto'] ?>">
                                <div class="prod-text">
                                    <h2><?php $produto['nome_produto'] ?></h2>
                                    <p><?php $produto['situacao'] ?></p>
                                </div>
                                <div class="prod-info">
                                    <p class="preco"><?php $produto['preco'] ?></p>
                                    <p class="categ"><?php $produto['categoria'] ?></p>
                                    <button class="remove-prod"><i class="fa-solid fa-trash-can"></i> Remover</button>
                                </div>

                            </div>

                        <?php } while($produto = $sql_query->fetch_assoc()); 
                        
                    } ?>

                </div>

            </section>
        </div>
    </main>

</body>

</html>