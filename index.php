<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php require_once './head.php'; ?>
</head>

<body>

    <div id="container">
        <h1>Login</h1>
        <form action="./config/valida_login.php" method="POST">
            <input type="text" id="email" name="email" placeholder="E-mail">
            <?php if(isset($_GET['email']) == 'invalido'){ ?>
                <div class="error">
                    <p>E-mail inválido</p>
                </div>
            <?php } ?>
            <input type="senha" id="senha" name="senha" placeholder="Senha">
            <?php if(isset($_GET['senha']) == 'vazio'){ ?>
                <div class="error">
                    <p>Senha inválida</p>
                </div>
            <?php } ?>
            <button type="submit">Login</button>
            <?php if(isset($_GET['login']) == 'erro'){ ?>
                <div class="error">
                    <p>Não foi possível realizar o login, por favor, tente mais tarde!</p>
                </div>
            <?php } ?>
        </form>
    </div>
    
</body>
</html>