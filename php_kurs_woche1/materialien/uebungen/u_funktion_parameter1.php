<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

// Funktion mit Parameter
function vermerk(string $name): string {
    return "<td style='border:2px double black; padding:10px;'>$name</td>";
}

// HTML-Ausgabe
echo "<h2>Übung 6 – Funktion mit Parameter</h2>";
echo "<table style='border-collapse:collapse; border:3px double black;'>";

// Mehrere Entwickler-Namen testen
echo "<tr>" . vermerk("Anna") . "</tr>";
echo "<tr>" . vermerk("Bernd") . "</tr>";
echo "<tr>" . vermerk("Claudia") . "</tr>";
echo "<tr>" . vermerk("David") . "</tr>";

echo "</table>";
?>
