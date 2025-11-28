-- Mini-Blog DB – Final Schema
CREATE DATABASE IF NOT EXISTS miniblog
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_general_ci;
USE miniblog;

--------------------------------------------------
-- USERS TABLE
--------------------------------------------------
DROP TABLE IF EXISTS users;
CREATE TABLE users (
  users_id INT AUTO_INCREMENT PRIMARY KEY,
  users_forename VARCHAR(50) NULL,
  users_lastname VARCHAR(50) NOT NULL,
  users_email VARCHAR(100) UNIQUE,
  users_password VARCHAR(255),
  users_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  users_updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

--------------------------------------------------
-- CATEGORIES TABLE
--------------------------------------------------
DROP TABLE IF EXISTS categories;
CREATE TABLE categories (
  categ_id INT AUTO_INCREMENT PRIMARY KEY,
  categ_name VARCHAR(50) NOT NULL,
  categ_desc VARCHAR(255) NULL
) ENGINE=InnoDB;

--------------------------------------------------
-- POSTS TABLE
--------------------------------------------------
DROP TABLE IF EXISTS posts;
CREATE TABLE posts (
  posts_id INT AUTO_INCREMENT PRIMARY KEY,
  posts_users_id_ref INT NOT NULL,
  posts_categ_id_ref INT NULL,
  posts_header VARCHAR(255) NOT NULL,
  posts_content TEXT NOT NULL,
  posts_image VARCHAR(255) NULL,
  posts_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  posts_updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

  CONSTRAINT fk_posts_users
    FOREIGN KEY (posts_users_id_ref)
    REFERENCES users(users_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,

  CONSTRAINT fk_posts_categories
    FOREIGN KEY (posts_categ_id_ref)
    REFERENCES categories(categ_id)
    ON DELETE SET NULL
    ON UPDATE CASCADE
) ENGINE=InnoDB;