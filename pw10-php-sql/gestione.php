<?php

require_once "config.php";
require_once "functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'update') {
        $titolo = strlen(trim(htmlspecialchars($_REQUEST['titoloUp'])) > 0) ? trim(htmlspecialchars($_REQUEST['titoloUp'])) : exit();
        $autore = strlen(trim(htmlspecialchars($_REQUEST['autoreUp'])) > 1) ? trim(htmlspecialchars($_REQUEST['autoreUp'])) : exit();
        $anno_pubblicazione = intval($_REQUEST['annoUp']) < intval(date('Y')) ? intval($_REQUEST['annoUp']) : exit();
        $genere = strlen(trim(htmlspecialchars($_REQUEST['genereUp'])) > 2) ? trim(htmlspecialchars($_REQUEST['genereUp'])) : exit();

        updateBook($mysqli, $_REQUEST['id'], $titolo, $autore, $anno_pubblicazione, $genere);
        exit(header('Location: index.php'));
    } else {
        $titolo = strlen(trim(htmlspecialchars($_REQUEST['titolo'])) > 0) ? trim(htmlspecialchars($_REQUEST['titolo'])) : exit();
        $autore = strlen(trim(htmlspecialchars($_REQUEST['autore'])) > 1) ? trim(htmlspecialchars($_REQUEST['autore'])) : exit();
        $anno_pubblicazione = intval($_REQUEST['anno_pubblicazione']) < intval(date('Y')) ? intval($_REQUEST['anno_pubblicazione']) : exit();
        $genere = strlen(trim(htmlspecialchars($_REQUEST['genere'])) > 2) ? trim(htmlspecialchars($_REQUEST['genere'])) : exit();

        $book = [
            "titolo" => $titolo,
            "autore" => $autore,
            "anno_pubblicazione" => $anno_pubblicazione,
            "genere" => $genere
        ];

        addBook($mysqli, $book);
    }

} else if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'remove') {
    removeBook($mysqli, $_REQUEST['id']);
    exit(header('Location: index.php'));
}