<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

// Funktion mit Parameter
function vermerk(string $name): string {
    return "<td style='border:2px double black; padding:10px;'>$name</td>";
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
        <h1>Vermerk</h1>
    </header>
<main class="container">
        <h3>Ergebnisse:</h3>
        <?php
            // HTML-Ausgabe
            echo "<h2>Übung 6 – Funktion mit Parameter</h2>";
            echo "<table style='border-collapse:collapse; border:3px double black;'>";

            // Mehrere Entwickler-Namen testen
            echo "<tr>" . vermerk("Dieser Programmteil wurde geschrieben von Anna") . "</tr>";
            echo "<tr>" . vermerk("Dieser Programmteil wurde geschrieben von Bernd") . "</tr>";
            echo "<tr>" . vermerk("Dieser Programmteil wurde geschrieben von Claudia") . "</tr>";
            echo "<tr>" . vermerk("Dieser Programmteil wurde geschrieben von David") . "</tr>";
            echo "</table>";
        ?>
        
    </main>
</body>
</html>