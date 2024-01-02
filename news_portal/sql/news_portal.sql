CREATE DATABASE IF NOT EXISTS news_portal;

USE news_portal;

CREATE TABLE IF NOT EXISTS news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    content TEXT,
    image VARCHAR(255),
    date_posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);