CREATE DATABASE test;

CREATE TABLE test.tb_users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_pass VARCHAR(255) NOT NULL,
    user_image VARCHAR(255) NOT NULL,
    user_followers JSON NOT NULL,
    user_following JSON NOT NULL,
    user_email VARCHAR(255) NOT NULL,
    user_registredAt DATE NOT NULL,
    user_verified BOOLEAN NOT NULL,
    user_bio VARCHAR(255) NOT NULL,
    number_posts INT NOT NULL DEFAULT 0,
    authorization INT NOT NULL,
    token_auth VARCHAR(255) NOT NULL,
    token_auth_expire INT NOT NULL
);

CREATE TABLE test.tb_posts (
    post_id INT PRIMARY KEY AUTO_INCREMENT,
    post_author VARCHAR(255) NOT NULL,
    liked_by JSON NOT NULL,
    comments JSON NOT NULL
);

