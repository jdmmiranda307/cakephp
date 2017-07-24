create database cake_blog;
use cake_blog;
CREATE TABLE posts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    body TEXT,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255),
    role VARCHAR(20),
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

ALTER TABLE posts ADD COLUMN user_id INT(11);

CREATE TABLE themes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    theme_name VARCHAR(150)
);

ALTER TABLE posts ADD COLUMN theme_id int,
ADD FOREIGN KEY (theme_id) REFERENCES themes(id);

CREATE TABLE comments (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_id INT UNSIGNED,
    user_id INT UNSIGNED,
    text VARCHAR(255),
    created DATETIME DEFAULT NULL,
    FOREIGN KEY (post_id) REFERENCES posts(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);