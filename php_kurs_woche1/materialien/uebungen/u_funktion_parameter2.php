<?php 
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

function quadrat(float $zahl): float {
   return $zahl * $zahl;
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
        <h1>Quadrat</h1>
    </header>
<main class="container">
        <h3>Ergebnisse:</h3>
        <?php
            
            echo "Das Quadrat von 3 ist: " . quadrat(3) . "<br>";
            echo "Das Quadrat von 3.2 ist: " . quadrat(3.2) . "<br>";
            echo "Das Quadrat von -5 ist: " . quadrat(-5) . "<br>";
            echo "Das Quadrat von 83373 ist: " . quadrat(83373) . "<br>";
            
        ?>
        
    </main>
</body>
</html>