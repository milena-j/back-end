<?php

$config = [
    'host' => 'localhost',
    'user' => 'root',
    'password' => ''
];

$mysqli = new mysqli(
    $config['host'],
    $config['user'],
    $config['password']
);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS gestione_libreria;";
if (!$mysqli->query($sql)) {
    die($mysqli->connect_error);
}

$mysqli->query("USE gestione_libreria;");

$sql = "CREATE TABLE IF NOT EXISTS libri(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titolo VARCHAR(100) NOT NULL,
    autore VARCHAR(100) NOT NULL,
    anno_pubblicazione INT(4) NOT NULL,
    genere VARCHAR(30) NOT NULL
)";

$mysqli->query($sql);

/* $sql = "INSERT INTO libri (titolo, autore, anno_pubblicazione, genere) VALUES
('Il Signore degli Anelli', 'J.R.R. Tolkien', 1954, 'Fantasy'),
('1984', 'George Orwell', 1949, 'Dystopian'),
('Orgoglio e Pregiudizio', 'Jane Austen', 1813, 'Romanzo'),
('Cronache di Narnia', 'C.S. Lewis', 1950, 'Fantasy'),
('Harry Potter e la Pietra Filosofale', 'J.K. Rowling', 1997, 'Fantasy'),
('Guerra e Pace', 'Lev Tolstoj', 1869, 'Romanzo Storico'),
('Il Piccolo Principe', 'Antoine de Saint-Exupéry', 1943, 'Fantasy'),
('Il Grande Gatsby', 'F. Scott Fitzgerald', 1925, 'Romanzo'),
('Don Chisciotte', 'Miguel de Cervantes', 1605, 'Romanzo'),
('Cime tempestose', 'Emily Brontë', 1847, 'Romanzo Gotico');"; 

$mysqli->query($sql);
*/