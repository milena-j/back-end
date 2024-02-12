<?php
require_once 'config.php';
require_once 'gestione.php';
include_once 'navbar.php';

$autori = getAllAuthors($mysqli);

?>

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="fs-3 fw-normal">Elenco autori</h1>
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modaleAggiunta">
            Aggiungi un autore
        </button>

        <!-- Modale per l'aggiunta di un autore -->
        <div class="modal fade" id="modaleAggiunta" tabindex="-1" aria-labelledby="modaleAggiunta" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Dati dell'autore</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="gestione.php?action=createAuthor">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome">
                            </div>
                            <div class="mb-3">
                                <label for="cognome" class="form-label">Cognome</label>
                                <input type="text" step="1" class="form-control" id="cognome" name="cognome">
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
    </div>

    <table class="table table-striped my-5">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>

            <?php if ($autori) {
                foreach ($autori as $autore) { ?>
                    <tr>
                        <td scope="row">
                            <?= $autore['nome'] ?>
                        </td>
                        <td>
                            <?= $autore['cognome'] ?>
                        </td>
                        <td>
                            <div class="d-flex d-flex justify-content-center gap-2">
                                <button type="button" class="btn btn-warning btn-sm w-50" data-bs-toggle="modal"
                                    data-bs-target="<?= "#updateModal_" . $autore['id'] ?>">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button class="btn btn-danger btn-sm w-50" data-bs-toggle="modal"
                                    data-bs-target="<?= '#removeModal_' . $autore['id'] ?>">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Modale per l'aggiornamento di un autore -->
                    <div class="modal fade" id="<?= "updateModal_" . $autore['id'] ?>" tabindex="-1"
                        aria-labelledby="updateModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">Modifica i dati dell'autore</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="gestione.php">
                                        <input type="hidden" name="id" value="<?= $autore['id'] ?>">
                                        <div class="mb-3">
                                            <label for="nome" class="form-label">Nome</label>
                                            <input type="text" class="form-control" id="nome" aria-describedby="nome"
                                                name="nome" value="<?= $autore['nome'] ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cognome" class="form-label">Cognome</label>
                                            <input type="text" class="form-control" id="cognome" name="cognome"
                                                value="<?= $autore['cognome'] ?>" required>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Annulla
                                            </button>
                                            <button type="submit" class="btn btn-warning" name="action" value="updateAuthor">
                                                Modifica il libro
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modale per la cancellazione di un autore -->

                    <div class="modal fade" id="<?= "removeModal_" . $autore['id'] ?>" tabindex="-1"
                        aria-labelledby="removeModal_Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="removeModal_Label">Vuoi confermare la cancellazione
                                        dell'autore?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    La cancellazione è irreversibile.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                    <a role="button" class="btn btn-danger"
                                        href="<?= 'gestione.php?action=removeAuthor&id=' . $autore['id'] ?>">
                                        Conferma
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php }
            } ?>

        </tbody>
    </table>
</div>

<?php include_once 'footer.php'; ?>