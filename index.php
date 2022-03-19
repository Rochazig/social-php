<?php
session_start();

include __DIR__."/src/libs/database/connect.php";
require __DIR__."/src/public/scripts/php/functionsin.php";

$sqlcode = "SELECT * FROM tb_posts ORDER BY post_date ASC";
$query = mysqlI_query($connection, $sqlcode);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/public/style/home.css">
</head>
<body>
    <main>
        <div class="container">
            <div class="posts">
                <?php
                    if($query) {
                        if(mysqli_num_rows($query) > 0) {
                            while($row = mysqli_fetch_assoc($query)) {
                                echo "<div class='post'>
                                    <div class='post-header'>
                                        <h2>".$row['post_title']."<h2>
                                    </div>      
                                    <div class='post-body'>
                                        ".AdaptString($row['post_content'])."
                                    </div>  
                                    <div class='post-footer'>
                                        <p>Publicado por ".$row['post_author']."</p>
                                        <p>Publicado em ".$row['post_date']."</p>
                                        <a href='http://localhost/post.php?pid=".$row['post_id']."' class='btn btn-primary'>Ver este post</a>
                                    </div>
                                </div>";
                            }   
                        }
                    }
                    
                ?>
            </div>
        </div>
    </main>
</body>
</html>