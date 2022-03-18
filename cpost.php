<?php
session_start();

if(!isset($_SESSION['userId']) && empty($_SESSION['userId']) || $_SESSION['userId'] == null) {
    header("location: login.php?lmcp=1");
}

include __DIR__."/src/controllers/PostController.php";

$postsc = new Posts();

if(isset($_POST['cpost'])) {
    if(isset($_POST['post-title']) && !empty($_POST['post-title'])
    && isset($_POST['post-content']) && !empty($_POST['post-content'])) {
        $success = $postsc->CreatePost($_SESSION['userId'], $_POST['post-title'], $_POST['post-content']);

        if($success) {
            echo "Post criado com sucesso.";
        } else {
            echo "Não foi possivel criar este post.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Post</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/public/style/cpost.css">
</head>
<body>
    <main>
        <div class="container">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="text" name="post-title" id="input-title" placeholder="Titulo">
                <textarea name="post-content" id="input-content" placeholder="Conteudo"></textarea><br>
                <input class="btn btn-primary" type="submit" name="cpost" value="Criar Post">
            </form>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./src/public/scripts/post.js"></script>
</body>
</html>
