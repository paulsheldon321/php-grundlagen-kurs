<?php 
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anonyme Funktionen</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <header>
        <h1>Anonyme Funktionen</h1>
    </header>
    <main class="container">
        <h2>Definition ohne Funktionsbezeichner</h2>

        <?php
        $hallo = function($n) {
            return "Hallo, $n!<br>";
        };
        ?>

        <p><?= $hallo('Torsten') ?></p>

        <?php $gruss = $hallo; ?>

        <p><?= $gruss('Sandra') ?></p>

        <h2>Pfeilfunktion</h2>

        <?php
        $summe = fn($a, $b) => $a + $b;    
        ?>

        <p><?= $summe(37,5) ?></p>

        <h2>Callback-Funkctionen</h2>

        <?php
            
            // normale Funktionsdefinition
            function haelfte($x) {
                return $x / 2;
            }

            // das letzte Parameter muss eine Funktion sein
            function ausgabe( $von, $bis, $schritt, $fkt ) {
                $ausg = '<p>';
                for( $i = $von; $i < $bis; $i += $schritt ) {
                    $ausg .= $fkt($i) . ', ';
                }
                $ausg .= '</p>';
                return $ausg;
            }
            
        ?>

        <!-- Übergabe als Funktionsreferenz -->
        <p><?= ausgabe( 5, 14, 2, 'haelfte') ?></p>

        <?php
        // Übergabe als anonyme Funktion
        echo ausgabe( 2, 20, 3, function($x) {
            return $x / 4;
        });
        
        // Übergabe als Pfeilfunktion
        echo ausgabe( 10, 100, 10, fn($x) => $x / 10 );
        ?>
    </main>
</body>
</html>