<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

// Funktion mit Parameter
function vermerk(string $vorname, string $nachname, string $abteilung): string {

    
    
    $header = "Programmteil von $vorname $nachname, Abteilung  $abteilung";
    $email = "$vorname.$nachname@$abteilung.phpdevel.de";
    // $a = $vorname . '.' . $nachname . '@' . $abteilung . '.phpdevel.de'
    return $header;
    return $email;
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
       <div style="display: inline-block; border: 1px solid black; ">
           <p style="border: 1px solid black"><?= vermerk('Bodo', 'Berg', 'FE2') ?></p>
       </div>
       <br>
       <div style="display: inline-block; border: 1px solid black">
           <p style="border: 1px solid black"><?= vermerk('Hans', 'Heim', 'SU3') ?></p>
       </div>
        
    </main>
</body>
</html>