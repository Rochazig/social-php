-- CREATE DATABASE test;

DROP TABLE test.tb_users;
DROP TABLE test.tb_posts;

CREATE TABLE test.tb_users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(255) NOT NULL,
    user_pass VARCHAR(255) NOT NULL,
    user_image VARCHAR(255) DEFAULT "noavatar.png",
    user_email VARCHAR(255) NOT NULL,
    user_registredAt DATE NOT NULL,
    user_verified BOOLEAN DEFAULT false,
    user_bio VARCHAR(255) NULL,
    number_posts INT NOT NULL DEFAULT 0,
    authorization INT NOT NULL,
    token_auth VARCHAR(255) NULL,
    token_auth_expire INT NULL
);

CREATE TABLE test.tb_posts (
    post_id INT PRIMARY KEY AUTO_INCREMENT,
    post_author VARCHAR(255) NOT NULL,
    post_title VARCHAR(100) NOT NULL,
    post_content VARCHAR(255) NOT NULL,
    post_date DATE NOT NULL,
    category INT NULL
);

