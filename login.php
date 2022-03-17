<?php
session_start();

include __DIR__."/src/libs/database/connect.php";

if(isset($_SESSION['userId'])) {
    if(!empty($_SESSION['userId']) || $_SESSION['userId'] != null) {
        header("location: index.php");
    }
}

if(isset($_POST['enviar'])) {
    if(isset($_POST['usuario']) && !empty($_POST['usuario'])
    && isset($_POST['senha'])   && !empty($_POST['senha'])) {

    }
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <main>
        <div class="container">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <input type="text" name="usuario" id="input-user">
                <input type="password" name="senha" id="input-pass">
                <input type="submit" name="enviar" id="button-login">
            </form>

            <a href="./register.php">Não tens uma conta?</a>
        </div>
    </main>
</body>
</html>
