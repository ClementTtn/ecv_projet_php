# Création de la BDD si elle n'existe pas
CREATE DATABASE IF NOT EXISTS projet_ecv;

# Utilisation de la nouvelle BDD
USE projet_ecv;

# Suppression des tables si elles existent déjà
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS product;
DROP TABLE IF EXISTS user;

# Création de la table user
CREATE TABLE user (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

# Création de la table product
CREATE TABLE product (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price FLOAT,
    img VARCHAR(255) NOT NULL
);

# Création de la table orders
CREATE TABLE orders (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    order_date TIMESTAMP NOT NULL,
    # Liaison de la table avec les tables user et product -> clés étrangères
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (product_id) REFERENCES product(id)
);