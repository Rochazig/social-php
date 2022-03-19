<?php

include __DIR__."/src/libs/database/connect.php";

if(isset($_GET['pid']) && is_numeric($_GET['pid'])) {
    $sqlcode = "SELECT * FROM tb_posts WHERE post_id = '".$_GET['pid']."'";
    $query = mysqli_query($connection, $sqlcode);
    $row = null;

    if($query) {
        if(mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
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
    <?php echo "<title>".$row['post_title']." | ".$row['post_author']."</title>"; ?>
</head>
<body>
    
</body>
</html>