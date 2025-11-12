<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

// Startwerte
$spieler1 = 0;
$spieler2 = 0;
$runde = 1;

// HTML-Start
echo "<h2>while-Schleife</h2>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Spieler 1</th><th>Spieler 2</th></tr>";

while ($spieler1 < 25 && $spieler2 < 25) {
    // Würfe simulieren
    $wurf1 = rand(1, 6);
    $wurf2 = rand(1, 6);

    // Punkte addieren
    $spieler1 += $wurf1;
    $spieler2 += $wurf2;

    // Ausgabe in Tabellenform
    echo "<tr><td>$spieler1</td><td>$spieler2</td></tr>";

    $runde++;
}

echo "</table>";

// Gewinner ermitteln
if ($spieler1 > $spieler2) {
    echo "<p><b>Spieler 1 hat gewonnen!</b></p>";
} elseif ($spieler2 > $spieler1) {
    echo "<p><b>Spieler 2 hat gewonnen!</b></p>";
} else {
    echo "<p><b>Unentschieden!</b></p>";
}
?>
