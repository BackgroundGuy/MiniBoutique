<?php
// Connexion à MySQL
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "root";
$bdd = "ecommerce";

$connexion = new mysqli($serveur, $utilisateur, $motdepasse);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("Erreur de connexion : " . $connexion->connect_error);
}

// Création de la base de données avec UTF-8
if ($connexion->query("CREATE DATABASE IF NOT EXISTS $bdd CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci") === TRUE) {
    echo "Base de données `$bdd` créée avec succès.<br>";
} else {
    die("Erreur lors de la création de la base de données : " . $connexion->error);
}

// Sélection de la base de données
$connexion->select_db($bdd);

// Création des tables
$tables = [
    "users" => "
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            email VARCHAR(100) NOT NULL UNIQUE,
            wordofpass VARCHAR(255) NOT NULL,
            role ENUM('user', 'admin') DEFAULT 'user'
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",
    "categories" => "
        CREATE TABLE IF NOT EXISTS categories (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",
    "products" => "
        CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            description TEXT,
            price FLOAT NOT NULL,
            stock INT NOT NULL,
            image VARCHAR(255),
            category_id INT,
            FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",
    "orders" => "
        CREATE TABLE IF NOT EXISTS orders (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            date DATETIME DEFAULT CURRENT_TIMESTAMP,
            total FLOAT NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",
    "order_items" => "
        CREATE TABLE IF NOT EXISTS order_items (
            id INT AUTO_INCREMENT PRIMARY KEY,
            order_id INT NOT NULL,
            product_id INT NOT NULL,
            quantity INT NOT NULL,
            price FLOAT NOT NULL,
            FOREIGN KEY (order_id) REFERENCES orders(id),
            FOREIGN KEY (product_id) REFERENCES products(id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"
];

// Exécution des requêtes de création de tables
foreach ($tables as $name => $sql) {
    if ($connexion->query($sql) === TRUE) {
        echo "Table `$name` créée avec succès.<br>";
    } else {
        echo "Erreur lors de la création de la table `$name` : " . $connexion->error . "<br>";
    }
}

echo "Base de données initialisée avec succès.";
$connexion->close();
?>
