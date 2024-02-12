<?php

function getAllBooks($mysqli, $search = '')
{
    $libri = [];
    $sql = "SELECT * FROM libri;";

    if (!empty($search)) {
        $sql = "SELECT * FROM libri
                WHERE titolo LIKE '%" . $search . "%'
                OR autore LIKE '%" . $search . "%'
                OR anno_pubblicazione LIKE '%" . $search . "%'
                OR genere LIKE '%" . $search . "%';";
    }

    $res = $mysqli->query($sql);

    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $libri[] = $row;
        }
    }
    return $libri;
}

function addBook($mysqli, $book, $id_autore)
{
    $titolo = $book['titolo'];
    $autore = $book['autore'];
    $anno_pubblicazione = $book['anno_pubblicazione'];
    $genere = $book['genere'];

    $result = [];
    $sql = "SELECT * FROM autori WHERE id = '$id_autore';";
    $res = $mysqli->query($sql);
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $result[] = $row;
        }
    }

    $autore = $result[0]["nome"] . " " . $result[0]["cognome"];

    $sql = "INSERT INTO libri (titolo, autore, anno_pubblicazione, genere, id_autore) 
                VALUES ('$titolo', '$autore', '$anno_pubblicazione', '$genere', '$id_autore')";
    if (!$mysqli->query($sql)) {
        echo ($mysqli->error);
    } else {
        echo 'Record aggiunto con successo';
    }
    header('location: index.php');
}

function removeBook($mysqli, $id)
{
    if (!$mysqli->query('DELETE FROM libri WHERE id = ' . $id)) {
        echo ($mysqli->connect_error);
    } else {
        echo 'Libro rimosso con successo';
    }
}

function updateBook($mysqli, $id, $titolo, $autore, $anno_pubblicazione, $genere)
{
    $sql = "UPDATE libri SET 
                        titolo = '" . $titolo . "', 
                        autore = '" . $autore . "',
                        anno_pubblicazione = '" . $anno_pubblicazione . "',
                        genere = '" . $genere . "'
                        WHERE id = " . $id;
    if (!$mysqli->query($sql)) {
        echo ($mysqli->connect_error);
    } else {
        echo 'Libro modificato con successo';
    }
}

function createAuthor($mysqli, $nome, $cognome)
{
    $sql = "INSERT INTO autori (nome, cognome) 
                VALUES ('$nome', '$cognome');";
    if (!$mysqli->query($sql)) {
        echo ($mysqli->connect_error);
    } else {
        echo 'Record aggiunto con successo!';
    }
}

function getAllAuthors($mysqli)
{
    $result = [];
    $sql = "SELECT * FROM autori;";
    $res = $mysqli->query($sql);
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $result[] = $row;
        }
    }
    return $result;
}

function removeAuthor($mysqli, $id)
{
    if (!$mysqli->query('DELETE FROM autori WHERE id = ' . $id)) {
        echo ($mysqli->connect_error);
    } else {
        echo 'Record eliminato con successo!';
    }
}

function updateAuthor($mysqli, $id, $nome, $cognome)
{
    $sql = "UPDATE autori SET 
                        nome = '" . $nome . "', 
                        cognome = '" . $cognome . "'
                        WHERE id = " . $id;
    if (!$mysqli->query($sql)) {
        echo ($mysqli->connect_error);
    } else {
        echo 'Record aggiornato con successo!';
    }
}

function getAuthorByID($mysqli)
{
    $sql = "SELECT * FROM autori WHERE id = " . $_REQUEST['id'];
    $res = $mysqli->query($sql);
    if ($res) {
        $result = $res->fetch_assoc();
    }
    return $result;
}