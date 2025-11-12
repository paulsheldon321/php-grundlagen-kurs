<?php
// while_do-while.php

// Beispiel mit Startwert 1
$zahl = 1;
echo "While-Schleife mit Startwert 1:<br>";
while ($zahl <= 5) {
    echo $zahl . "<br>";
    $zahl++;
}

$zahl = 1;
echo "Do-While-Schleife mit Startwert 1:<br>";
do {
    echo $zahl . "<br>";
    $zahl++;
} while ($zahl <= 5);

// Beispiel mit Startwert 20
$zahl = 20;
echo "While-Schleife mit Startwert 20:<br>";
while ($zahl <= 5) {
    echo $zahl . "<br>";
    $zahl++;
}

$zahl = 20;
echo "Do-While-Schleife mit Startwert 20:<br>";
do {
    echo $zahl . "<br>";
    $zahl++;
} while ($zahl <= 5);
?>
