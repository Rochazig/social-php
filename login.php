<?php
session_start();

include __DIR__."/src/libs/database/connect.php";

// if(isset($_SESSION['userId'])) {
//     if(!empty($_SESSION['userId']) || $_SESSION['userId'] != null) {
//         header("location: index.php");
//     }
// }

if(isset($_POST['enviar'])) {
    if(isset($_POST['usuario']) && !empty($_POST['usuario'])
    && isset($_POST['senha'])   && !empty($_POST['senha'])) {

        $ruser = mysqli_escape_string($connection, $_POST['usuario']);
        $rpass = mysqli_escape_string($connection, md5($_POST['senha']));

        $sqlcode = "SELECT user_id, user_pass FROM tb_users WHERE user_name = '".$ruser."'";
        $query = mysqli_query($connection, $sqlcode);

        if($query) {
            if(mysqli_num_rows($query) > 0) {
                $rows = mysqli_fetch_assoc($query);

                if($rows['user_pass'] == $rpass) {
                    $_SESSION['userId'] = $rows['user_id'];
                    $_SESSION['message'] = null;

                    if(isset($_GET['lmcp']) ) header("location: cpost.php");
                    else header("location: index.php"); 
                }
            }
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
    <title>Login</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/public/style/register.css">
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
