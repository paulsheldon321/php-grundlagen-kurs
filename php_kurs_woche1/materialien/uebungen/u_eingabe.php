<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors',true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $vorname = $_POST['vorname'] ?? '';
        $nachname = $_POST['nachname'] ?? '';
        $strasse = $_POST['strasse'] ?? '';
        $plz = $_POST['plz'] ?? '';
        $ort = $_POST['ort'] ?? '';      
        
    ?>

    <?php if( $_SERVER['REQUEST_METHOD'] === 'POST'): ?>
      <p>Ihr Adresse lautet: <br></p>
      <?= $vorname . ' ' . $nachname;   ?> <br>
      <?= $strasse; ?> <br>
      <?= $plz . ' ' . $ort; ?> <br>      
    <?php endif; ?>
</body>
</html>