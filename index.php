<?php
session_start();

include __DIR__."/src/libs/database/connect.php";

$sqlcode = "SELECT * FROM tb_posts ORDER BY post_date ASC";
$query = mysqlI_query($connection, $sqlcode);

?>

<!DOCTYPE html>
<html lang="en">
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
                    while($row = mysqli_fetch_assoc($query)) {
                        echo "<div class='post'>
                            <div class='post-header'>
                                <h2>".$row['post_title']."<h2>
                                <h4>".$row['post_author']."<h4>
                            </div>      
                            <div class='post-body'>
                                ".$row['post_content']."
                            </div>  
                            <div class='post-footer'>
                                <p>Publicado em ".$row['post_date']."</p>
                            </div>
                        </div><br>";
                    }
                ?>
            </div>
        </div>
    </main>
</body>
</html>