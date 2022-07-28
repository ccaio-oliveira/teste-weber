<!DOCTYPE html>
<html lang="pt-br">

<?php include_once('head.php'); ?>

<body id="login">

    <div class="container" id="cadastro">
        <h2>Realizar Cadastro</h2>
        <form action="config/cadastrar.php" method="POST">

            <input class="form-control inputC" type="text" name="username" placeholder="Adicionar usuário">
            <input class="form-control inputC" type="password" name="password" placeholder="Adicionar senha">
            <?php if(isset($_GET['senha']) == 'grande'){ ?>
                <div class="text-warning">
                    <p>A senha não pode ter mais de 10 caracteres</p>
                </div>
            <?php } ?>
            <input class="form-control inputC" type="email" name="email" placeholder="Adicionar email">
            <?php if(isset($_GET['usuario']) == 'cadastrado' || isset($_GET['email']) == 'cadastrado'){ ?>
                <div class="text-warning">
                    <p>Usuário já cadastrado</p>
                </div>
            <?php } ?>
            <?php if(isset($_GET['cadastro']) == 'erro'){ ?>
                <div class="text-warning p-1">
                    <p>Não foi possível realizar seu cadastro. Favor, tentar novamente</p>
                </div>
            <?php } ?>

            <button class="btn btn-warning" id="btnC">Login</button>

        </form>
    </div>
    
</body>

</html>