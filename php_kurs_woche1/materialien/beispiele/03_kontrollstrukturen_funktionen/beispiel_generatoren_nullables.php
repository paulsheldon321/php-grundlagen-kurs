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
    <title>Generatoren und nullbare Typen</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <header>
        <h1>Generatoren und nullbare Typen</h1>
    </header>
<main class="container">
        <h2>Generatoren</h2>
        <?php
        function wuerfelGenerator() {
            for( $i = 1; $i <= 10; $i++ ) {
                $erg = random_int(1, 6);

                // yield anstelle von return liefert einen Rückgabewert, beendet die Funktion aber nicht
                yield "$erg";
              
            }
        }
        ?>

        <!-- Generatoren liefern als Rückgabe immer ein Objekt, über welches iteriert werden kann -->
         <?php echo '<pre>', var_dump( wuerfelGenerator() ), '</pre>'; ?>

         <p>
        <?php foreach( wuerfelGenerator() as $wert ): ?> 
        <?= $wert ?>
        <?php endforeach; ?>
        </p>

        <h2>nullbare Typen</h2>

        <?php 
        
            function ausgabe( ? array $a ):string {
                if( is_null($a) ) {
                   return 'Keine Werte gefunden';
                }
            $ausg ='';
            foreach( $a as $v ) $ausg .= "$v, ";
            return $ausg;   
        }

    ?>

    <p><?= ausgabe(['Äpfel', 'Mandarinen', 'Orangen']); ?></p>

    <p><?= ausgabe(null) ?></p>
    </main>
</body>
</html>