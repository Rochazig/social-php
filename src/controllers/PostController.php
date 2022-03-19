<?php

class Posts {
    public function CreatePost(int $author_id, string $title, string $content, int $category = null): bool {
        include $_SERVER['DOCUMENT_ROOT']."/src/libs/database/connect.php";
        
        $rtitle = mysqli_escape_string($connection, $title);
        $rcontent = mysqli_escape_string($connection, $content);
        $date = date("Y-m-d");

        $sqlcode = "SELECT user_name FROM tb_users WHERE user_id = '".$author_id."'";
        $query = mysqli_query($connection, $sqlcode);

        if($query) {
            if(mysqli_num_rows($query) > 0) {
                $rows = mysqli_fetch_assoc($query);

                $insertcode = "INSERT INTO tb_posts (post_author, post_title, post_content, post_date, category) VALUES ('".$rows['user_name']."', '".$rtitle."', '".$rcontent."', '".$date."','".$category."')";
                $qinsert = mysqli_query($connection, $insertcode);     

                if($qinsert) 
                    return true;
            }
        }
        return false;
    }
}