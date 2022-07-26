<!DOCTYPE html>
<html lang="pt-BR">
<?php require_once './head.php'; ?>
<body>

    <div id="container">
        <h1>Login</h1>
        <form action="./config/valida_login.php">
            <input type="text" id="email" name="email" placeholder="E-mail">
            <input type="senha" id="senha" name="senha" placeholder="Senha">
            <button type="submit">Login</button>
        </form>
    </div>
    
</body>
</html>