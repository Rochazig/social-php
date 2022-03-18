<?php
session_start();

include __DIR__."/src/libs/database/connect.php";
include __DIR__."/src/controllers/accountscontroller.php";

// if(isset($_SESSION['userId'])) {
//     if(!empty($_SESSION['userId']) || $_SESSION['userId'] != null) {
//         header("location: index.php");
//     }
// }

$accounts = new Accounts();

if(isset($_POST['enviar'])) {
    if(isset($_POST['usuario']) && !empty($_POST['usuario'])
    && isset($_POST['email'])   && !empty($_POST['email'])
    && isset($_POST['senha'])   && !empty($_POST['senha'])) {

        $ruser = mysqli_escape_string($connection, $_POST['usuario']);
        $rpass = mysqli_escape_string($connection, $_POST['senha']);
        $remail = mysqli_escape_string($connection, $_POST['email']);
        $date = date("Y-m-d");

        if(!$accounts->thisUserHasRegistred($ruser) && !$accounts->thisEmailHasRegistred($remail)) {

            $sqlcode = "INSERT INTO tb_users (user_name, user_pass, user_email, user_registredAt, authorization) VALUES ('".$ruser."', '".md5($rpass)."', '".$remail."', '".$date."', 0)";
            $query = mysqli_query($connection, $sqlcode);
            
            var_dump($connection);
            var_dump($query);

            if($query) {
                $_SESSION['message'] = "<div class='alert alert-success'>Usuário registrado</div>";
            }
        } else {
            $_SESSION['message'] = "<div class='alert alert-danger'>Este usuario já existe.</div>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/public/style/register.css">
</head>
<body>
    <main>
        <div class="container">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <input type="text"      name="usuario" id="input-user" placeholder="Usuario">
                <input type="email"     name="email"   id="input-email" placeholder="Email">
                <input type="password"  name="senha"   id="input-pass" placeholder="Senha">
                <input type="submit"    name="enviar"  id="button-submit" value="Registrar">
            </form>
            <a href="./login.php">Já tens uma conta?</a>

            <?php
                if(isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                }
            ?>
        </div>
    </main>
</body>
</html>

<?php
unset($_SESSION['message']);
$_SESSION['message'] = null;
?>