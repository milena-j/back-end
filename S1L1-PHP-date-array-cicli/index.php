<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP intro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <!-- 1. stampare la data di oggi in italiano in modo dinamico -->
    <!-- vedi documentazione per tutti i formati di date -->

    <div class="container my-5">
        <div class="card">
            <h2 class="card-header">Esercizio 1</h2>
            <div class="card-body">
                <p class="card-text">
                    Today is:
                    <?php
                    echo $data = (date("l" . ", " . "d F Y"));
                    ?>
                </p>
                <p class="card-text">
                    Oggi è il giorno:
                    <?php
                    $giorno = date('l');
                    $numero = date('j');
                    $mese = date('F');
                    $anno = date('Y');

                    switch ($mese) {
                        case 'January':
                            $mese = 'gennaio';
                            break;
                        case 'February':
                            $mese = 'febbraio';
                            break;
                        case 'March':
                            $mese = 'marzo';
                            break;
                        case 'April':
                            $mese = 'aprile';
                            break;
                        case 'May':
                            $mese = 'maggio';
                            break;
                        case 'June':
                            $mese = 'giugno';
                            break;
                        case 'July':
                            $mese = 'luglio';
                            break;
                        case 'August':
                            $mese = 'agosto';
                            break;
                        case 'September':
                            $mese = 'settembre';
                            break;
                        case 'October':
                            $mese = 'ottobre';
                            break;
                        case 'November':
                            $mese = 'novembre';
                            break;
                        case 'December':
                            $mese = 'dicembre';
                            break;
                    }

                    switch ($giorno) {
                        case 'Monday':
                            $giorno = 'luned&igrave;';
                            break;
                        case 'Tuesday':
                            $giorno = 'marted&igrave;';
                            break;
                        case 'Wednesday':
                            $giorno = 'mercoled&igrave;';
                            break;
                        case 'Thursday':
                            $giorno = 'gioved&igrave;';
                            break;
                        case 'Friday':
                            $giorno = 'venerd&igrave;';
                            break;
                        case 'Saturday':
                            $giorno = 'sabato';
                            break;
                        case 'Sunday':
                            $giorno = 'domenica';
                            break;
                    }

                    echo $giorno . ', ' . $numero . ' ' . $mese . ' ' . $anno;
                    ?>
                </p>
            </div>
        </div>
    </div>

    <!-- 2. crea l'array delle squadre di serie A 
    e della relativa formazione. usa i cicli per stampare i dati -->

    <div class="container my-5">
        <div class="card">
            <h2 class="card-header">Esercizio 2</h2>
            <div class="card-body">
                <p class="card-text">
                    <?php

                    $serieA = [
                        "Milan" => ["Marco Pellegrino", "Malick Thiaw", "Mattia Caldara", "Fikayo Tomori",],
                        "Juventus" => ["Manuel Locatelli", "Adrien Rabiot ", "Weston McKennie ", "Fabio Miretti "],
                        "Napoli" => ["Alex Meret", "Nikita Contini", "Hubert Dawid Idasiak", "Pierluigi Gollini",],
                        "Roma" => ["Gianluca Mancini", "Angeliño", "Rasmus Kristensen", "Leandro Paredes"]
                    ];

                    foreach ($serieA as $key => $value) {
                        echo '<h4>' . $key . '</h4>';
                        echo '<ul>';
                        foreach ($value as $player) {
                            echo '<li>' . $player . '</li>';
                        }
                        echo '</ul>';
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>

    <!-- <div class="container">
        <?php
        $squadra1 = ["Portiere 1", "Difensore 1", "Difensore 2", "Difensore 3", "Centrocampista 1", "Centrocampista 2", "Centrocampista 3", "Attaccante 1", "Attaccante 2", "Attaccante 3"];
        $squadra2 = ["Portiere 2", "Difensore 4", "Difensore 5", "Difensore 6", "Centrocampista 4", "Centrocampista 5", "Centrocampista 6", "Attaccante 4", "Attaccante 5", "Attaccante 6"];
        $squadra3 = ["Portiere 3", "Difensore 7", "Difensore 8", "Difensore 9", "Centrocampista 7", "Centrocampista 8", "Centrocampista 9", "Attaccante 7", "Attaccante 8", "Attaccante 9"];

        $squadre = [$squadra1, $squadra2, $squadra3];

        /* stampa di una matrice con un ciclo for */
        for ($i = 0; $i < count($squadre); $i++) {
            echo "<ul>";
            for ($j = 0; $j < count($squadre[$i]); $j++) {
                echo $squadre[$i][$j] . "<br>";
            }
            echo "</ul>";
        }

        /* stampa di una matrice con un ciclo foreach */
        foreach ($squadre as $squadra) {
            echo "<ul>";
            foreach ($squadra as $squadra) {
                echo "<li>$squadra</li>";
            }
            echo "</ul>";
        }
        ?>

    </div> -->

    <!-- 3. crea l'array delle partite e delle squadre di serie A 
    e della relativa formazione. usa i cicli per stampare i dati -->

    <div class="container my-5">
        <div class="card">
            <h2 class="card-header">Esercizio 3</h2>
            <div class="card-body">
                <?php
                $serieA = [
                    "Milan" => ["Marco Pellegrino", "Malick Thiaw", "Mattia Caldara", "Fikayo Tomori",],
                    "Napoli" => ["Alex Meret", "Nikita Contini", "Hubert Dawid Idasiak", "Pierluigi Gollini",],
                    "Roma" => ["Gianluca Mancini", "Angeliño", "Rasmus Kristensen", "Leandro Paredes"]
                ];

                $calendario = [
                    ["Milan", "Napoli"],
                    ["Milan", "Roma"],
                    ["Napoli", "Roma"]
                ];
                ?>

                <p class="card-text">
                    <?php foreach ($calendario as $team) { ?>

                    <div class="row align-items-start">
                        <div class="col">
                            <span class="fw-semibold fs-4">
                                <?= $team[0] ?>
                            </span>
                            <ul>
                                <?php foreach ($serieA[$team[0]] as $player) {
                                    echo "<li> $player </li>";
                                } ?>
                            </ul>
                        </div>
                        <div class="col">
                            <span class="fw-semibold fs-4">
                                <?= $team[1] ?>
                            </span>
                            <ul>
                                <?php foreach ($serieA[$team[1]] as $player) {
                                    echo "<li> $player </li>";
                                } ?>
                            </ul>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>

    <!-- <div class="container">
        <table class="table text-center">
            <tr>
                <?php
                $partita1 = [$squadra1, $squadra2];
                $partita2 = [$squadra1, $squadra3];
                $partita3 = [$squadra2, $squadra3];

                $partite = [$partita1, $partita2, $partita3];

                for ($i = 1; $i <= count($partite); $i++) {
                    echo "<th colspan='2'>Partita $i</th>";
                }
                ?>
            </tr>

            <?php
            for ($i = 0; $i < count($squadre[0]); $i++) {
                echo "<tr>";
                for ($j = 0; $j < count($partite); $j++) {
                    foreach ($partite[$j] as $squadra) {
                        echo "<td>" . $squadra[$i] . "</td>";
                    }
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div> -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>