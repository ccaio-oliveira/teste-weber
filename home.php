<?php require_once './config/protect.php' ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

<?php require_once './head.php'; ?>
<link rel="stylesheet" href="./assets/css/home.css">

</head>


<body>

    <div class="container">
        <h1><?php echo $_SESSION['usuario'] ?></h1>
    </div>
    
</body>
</html>