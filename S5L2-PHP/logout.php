<?php
// inizializzare una sessione o leggere la sessione esistente
session_start();
// distruggere i cookies impostati per permettere il login all'utente
session_destroy();
// distruggere i cookies impostati per permettere il login all'utente
setcookie("useremail", "", time() - 3600);
setcookie("userpassword", "", time() - 3600);
header('Location: http://localhost/Back-end/S5L2-PHP/');