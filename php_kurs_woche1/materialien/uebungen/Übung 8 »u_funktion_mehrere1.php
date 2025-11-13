<?php 
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

function mittel(float $zahl1, float $zahl2, float $zahl3): float {
   return ($zahl1 + $zahl2 + $zahl3) / 3;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generatoren und nullbare Typen</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <header>
        <h1>Mittelwert</h1>
    </header>
<main class="container">
        <h3>Ergebnisse:</h3>
        <?php
            
            echo "Der Mittelwert von 4, 7 und 6  ist: " . mittel(4,7,6) . "<br>";
            echo "Der Mittelwert von 44, 67.5 und 1 ist: " . mittel(44,67.5,1) . "<br>";
            echo "Der Mittelwert von -5, 0 und -13 ist: " . mittel(-5,0,-13) . "<br>";
            echo "Der Mittelwert von 0.001, 0.0081 und 0.0032 ist: " . number_format(mittel(0.001,0.0082,0.0032), 4) . "<br>";
            echo "Der Mittelwert von 5, 8 und 2 ist: " . mittel(5,8,2) . "<br>";
            
        ?>
        
    </main>
</body>
</html>