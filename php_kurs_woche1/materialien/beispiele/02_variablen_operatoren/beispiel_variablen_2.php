<?php
    
    error_reporting(E_ALL);
    ini_set('display_errors', true);
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variablen Fortsetzung</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <?php
        
        $ein_String = 'Ich bin eine Variable'; // Datentyp: String
        
        echo '<p>Der Inhalt der Variable ist: . $einString.</p>';

        echo '<p>Der Inhalt der Variable ist: ' . $einString . '</p>';

        echo "<p>Der Inhalt aus den Double-Quotes ist: $einString.</p>\r\n";

        echo '<p>Eine mit Komma getrennte Ausagabe mit mehreren
        Zeichenketten: ', $einString, ' ist aus einer Variable.', '</p>';

        $preisZiege = '0.5 Kamele';
        $menge = 5;

        $prod = $preisZiege * $menge;

        echo "<p> Eine Ziege kostet $preisZiege</p>";
        echo "<p>Für $menge Ziegen bekommt man $prod Kamele. </p>";

        /* ? === Konstanten
        ===================================================== */ 

        // klassische Variante
        define('SEK_TAG', 24 * 60 * 60); // Sekunden pro Tag

        // neuere Variante (ab PHP 5.5)
        const MIN_TAG = 24 * 60; 

        echo '<p>Ein TAG hat ', MIN_TAG, ' Minuten bzw. ', SEK_TAG, ' Sekunden.</p>';

        // Verketten und Rechnen

        $zahl = 5;
        $nochEineZahl = 37;

        echo "<p>Die Summe der Zahlen $zahl und $nochEineZahl ergibt: " . $zahl + $nochEineZahl . "</p>";

        

    ?>
</body>
</html>