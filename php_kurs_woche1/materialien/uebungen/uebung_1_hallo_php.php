<?php
declare(strict_types=1);
/**
 * Aufgabe:
 * 1) Gib "Hallo PHP 8.4!" im Browser aus.
 * 2) Zeige das heutige Datum an (Format: d.m.Y).
 * 3) Lade die style.css ein.
 */
?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Übung 1 – Hallo PHP</title>
  <link rel="stylesheet" href="../style/style.css"> 
</head>
<body>
  <header><h1>Übung 1 – Hallo PHP</h1></header>
  <main class="container">
    <?php
      echo "<p>Hallo PHP 8.3!</p>"; 
      echo "<p>Heute ist der " . date("d.m.Y") . "</p>";
    ?>
  </main>
</body>
</html>
