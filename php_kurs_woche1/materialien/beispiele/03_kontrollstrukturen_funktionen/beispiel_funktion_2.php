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
    <title>Funktionen 2</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <header>
        <h1>Funktionen - Teil 2</h1>
    </header>
    <main class="container">
        <h2>Parameter-Übergabe per Referenz</h2>
        <?php
            
            // normale Parameter-Übergabe
            function quadrat(int $value): string {
            $return = "Das Quadrat von $value ist ";
            $value *= $value;
            $return .= "$value<br>";
            return $return;
        }

            // Parameter-Übergabe per Referenz
            function quadrat_ref(int &$value): string {
            $return = "Das Quadrat von $value ist ";
            $value *= $value;
            $return .= "$value<br>";
            return $return;
        }

        $zahl = 2;

        ?>

        <p>Der Ausgangswert von $zahl ist <b><?= $zahl ?></b>.</p>
        <h3><i>call-by-value</i></h3>

        <p>
        <?php for($i = 1; $i <= 3; $i++): ?>
            <?= quadrat($zahl) ?>
        <?php endfor; ?>
        </p>
            
        <h3><i>call-by-reference</i></h3>
        
        <p>
        <?php for($i = 1; $i <= 3; $i++): ?>
            <?= quadrat_ref($zahl); ?>
        <?php endfor; ?>
        </p>

        <p>Endwert von $zahl ist jetzt: <b><?= $zahl ?></b>.</p>

        <h2>Rekursive Funktionen</h2>

        <?php

        function halbieren(&$z) {
            $z = $z / 2;

            if( $z <= 0.1 ) {
                return;
            }
            echo "\$z = $z<br>";
            halbieren($z);
        }
            
        $x = 1.5;    
            
        ?>

        <p>x =<?= $x ?></p>
        <?php halbieren($x); ?>
        <p>x = <?= $x ?></p>

</body>
</html>