<?php require_once 'config.php';

/* error_reporting(E_ALL);
ini_set('display_errors', 1);  */

$nome = strlen(trim(htmlspecialchars($_REQUEST['nome'])) > 0) ? trim(htmlspecialchars($_REQUEST['nome'])) : exit();
$cognome = strlen(trim(htmlspecialchars($_REQUEST['cognome'])) > 0) ? trim(htmlspecialchars($_REQUEST['cognome'])) : exit();
$email = $_REQUEST['email'];
$psw = $_REQUEST['psw'];

$sql = "INSERT INTO S5L1_TAB (nome, cognome, email, psw) 
VALUES ('$nome', '$cognome', '$email', '$psw')";
if (!$mysqli->query($sql)) {
    echo ($mysqli->error);
} else {
    echo 'Record aggiunto con successo';
}
;


$dir = 'file/';
$file = 'utenti.csv';
$utenti = $mysqli->query("SELECT * FROM S5L1_TAB;");

if (!file_exists($dir)) {
    mkdir($dir, 0777);
}

/* 'w': write */
$resource = fopen($dir . $file, 'w');
if ($resource) {
    foreach ($utenti as $utente) {
        fputcsv($resource, $utente, ';');
    }
    fclose($resource);
}

header('location: index.php');


?>