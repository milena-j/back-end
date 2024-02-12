<?php
require_once 'config.php';
require_once 'gestione.php';

$searchTerm = isset($_GET['search']) ? trim(htmlspecialchars($_GET['search'])) : '';
$searchTerm = empty($searchTerm) ? '' : $searchTerm;
$libri = getAllBooks($mysqli, $searchTerm);

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="bi bi-book"></i>
                <span class="mx-2">Libreria</span>
            </a>
            <form class="d-flex" role="search" method="GET" action="index.php">
                <input class="form-control me-2" type="search" placeholder="Cerca un libro" aria-label="Search"
                    name="search">
                <button class="btn btn-outline-primary btn-sm" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center my-5">
            <h1 class="fs-3 fw-normal">Libri disponibili</h1>
            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                data-bs-target="#modaleAggiunta">
                Aggiungi un libro
            </button>
        </div>

        <!-- Modale per l'aggiunta di un libro -->
        <div class="modal fade" id="modaleAggiunta" tabindex="-1" aria-labelledby="modaleAggiunta" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Dati del libro</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="gestione.php">
                            <div class="mb-3">
                                <label for="titoloLibro" class="form-label">Titolo</label>
                                <input type="text" class="form-control" id="titoloLibro" aria-describedby="titoloLibro"
                                    name="titolo">
                            </div>
                            <div class="mb-3">
                                <label for="autoreLibro" class="form-label">Autore</label>
                                <input type="text" class="form-control" id="autoreLibro" name="autore">
                            </div>
                            <div class="mb-3">
                                <label for="annoLibro" class="form-label">Anno di pubblicazione</label>
                                <input type="number" step="1" class="form-control" id="annoLibro" name="anno_pubblicazione">
                            </div>
                            <div class="mb-3">
                                <label for="genereLibro" class="form-label">Genere</label>
                                <input type="text" class="form-control" id="genereLibro" name="genere">
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Annulla
                                </button>
                                <button type="submit" class="btn btn-success" data-bs-dismiss="modal">
                                    Aggiungi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <?php foreach ($libri as $key => $libro) { ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-xl-4 col-xxl-3">
                    <div class="card mb-4">
                        <div class="card-header">
                            <?= $libro['autore'] ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $libro['titolo'] ?>
                            </h5>
                            <div class="d-flex justify-content-between">
                                <p class="card-text">
                                    <?= $libro['genere'] ?>
                                </p>
                                <p class="card-text">
                                    <?= $libro['anno_pubblicazione'] ?>
                                </p>
                            </div>
                            <div class="d-flex d-flex justify-content-center gap-2">
                                <a role="button" class="btn btn-warning btn-sm w-50" data-bs-toggle="modal"
                                    data-bs-target="<?= "#updateModal_" . $libro['id'] ?>">
                                    Modifica
                                </a>
                                <a role="button" class="btn btn-danger btn-sm w-50"
                                    href="<?= 'gestione.php?action=remove&id=' . $libro['id'] ?>">
                                    <!-- data-bs-toggle="modal" data-bs-target="<?= '#removeModal_' . $libro['id'] ?>" -->
                                    Cancella
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modale per l'aggiornamento di un libro -->
                <div class="modal fade" id="<?= "updateModal_" . $libro['id'] ?>" tabindex="-1"
                    aria-labelledby="updateModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Modifica i dati</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="gestione.php">
                                    <input type="hidden" name="id" value="<?= $libro['id'] ?>">
                                    <div class="mb-3">
                                        <label for="titoloLibro" class="form-label">Titolo</label>
                                        <input type="text" class="form-control" id="titoloLibro"
                                            aria-describedby="titoloLibro" name="titoloUp" value="<?= $libro['titolo'] ?>"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="autoreLibro" class="form-label">Autore</label>
                                        <input type="text" class="form-control" id="autoreLibro" name="autoreUp"
                                            value="<?= $libro['autore'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="annoLibro" class="form-label">Anno di pubblicazione</label>
                                        <input type="number" step="1" min="1" max="2024" class="form-control"
                                            id="annoLibroUp" name="annoUp" value="<?= $libro['anno_pubblicazione'] ?>"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="genereLibro" class="form-label">Genere</label>
                                        <input type="text" class="form-control" id="genereLibro" name="genereUp"
                                            value="<?= $libro['genere'] ?>" required>
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Annulla
                                        </button>
                                        <button type="submit" class="btn btn-warning" name="action" value="update">
                                            Modifica il libro
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modale per la cancellazione di un libro -->

                <!-- <div class="modal fade" id="removeModal_" tabindex="-1" aria-labelledby="removeModal_Label"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="removeModal_Label">Vuoi confermare la cancellazione del libro?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                La cancellazione è irreversibile.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                <button type="button" class="btn btn-danger">Conferma</button>
                            </div>
                        </div>
                    </div>
                </div> -->
            <?php } ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>