<?php

class Accounts {
    public function thisUserHasRegistred(string $name): bool {
        include $_SERVER['DOCUMENT_ROOT']."/src/libs/database/connect.php";

        $sqlcode = "SELECT * FROM tb_users WHERE user_name = '". $name."'";
        $query = mysqli_query($connection, $sqlcode);

        if($query) {
            if(mysqli_num_rows($query) > 0) return true;
        }

        return false;
    }

    public function thisEmailHasRegistred(string $email): bool {
        include $_SERVER['DOCUMENT_ROOT']."/src/libs/database/connect.php";

        $sqlcode = "SELECT * FROM tb_users WHERE user_email = '". $email ."'";
        $query = mysqli_query($connection, $sqlcode);

        if($query) {
            if(mysqli_num_rows($query) > 0) return true;
        }

        return false;
    }
}
