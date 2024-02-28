<?php

$config = [
    'mysql_host' => 'localhost',
    'mysql_user' => 'root',
    'mysql_password' => ''
];

$mysqli = new mysqli(
    $config['mysql_host'],
    $config['mysql_user'],
    $config['mysql_password']
);

if ($mysqli->connect_error) {
    die($mysqli->connect_error);
}

$mysqli->query("USE S5L1;");

$sql = 'CREATE TABLE IF NOT EXISTS S5L1_TAB ( 
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL, 
    cognome VARCHAR(100) NOT NULL, 
    email VARCHAR(100) NOT NULL UNIQUE,
    psw VARCHAR(100) NOT NULL
)';

if (!$mysqli->query($sql)) {
    die($mysqli->connect_error);
}

?>