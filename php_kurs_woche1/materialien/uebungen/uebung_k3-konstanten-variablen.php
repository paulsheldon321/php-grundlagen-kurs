<?php

$bezeichnung_tisch   = "Schreibtisch";
$bezeichnung_stuhl   = "Bürostuhl";
$bezeichnung_lampe   = "Lampe";
$bezeichnung_pctisch = "Computertisch";

$preis_tisch         = 1999.00;
$preis_stuhl         = 589.00;
$preis_lampe         = 29.00;
$preis_pctisch       = 999.00;

const MWST = 0.19;
const EURO = " €";

$netto_gesamt  = $preis_tisch + $preis_stuhl + $preis_lampe + $preis_pctisch;
$brutto_gesamt = $netto_gesamt * (1 + MWST);

$brutto_tisch   = $preis_tisch * (1 + MWST);
$brutto_stuhl   = $preis_stuhl * (1 + MWST);
$brutto_lampe   = $preis_lampe * (1 + MWST);
$brutto_pctisch = $preis_pctisch * (1 + MWST);

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Preisübersicht Büro</title>
    <!-- Подключение стилей -->
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <h2>Mit Variablen, Operatoren und Konstanten arbeiten</h2>
    <p><strong>Netto-Gesamtpreis:</strong> <?= $netto_gesamt . EURO ?></p>
    <p><strong>Brutto-Gesamtpreis (inkl. <?= MWST*100 ?>% MwSt):</strong> <?= $brutto_gesamt . EURO ?></p>

    <p><?= $bezeichnung_stuhl ?>: <?= $brutto_stuhl . EURO ?> brutto</p>
    <p><?= $bezeichnung_tisch ?>: <?= $brutto_tisch . EURO ?> brutto</p>
    <p><?= $bezeichnung_lampe ?>: <?= $brutto_lampe . EURO ?> brutto</p>
    <p><?= $bezeichnung_pctisch ?>: <?= $brutto_pctisch . EURO ?> brutto</p>
</body>
</html>
