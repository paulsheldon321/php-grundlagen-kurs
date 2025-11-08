<?php
declare(strict_types=1);

?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Includes & Funktionen</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
<header><h1>Includes & Funktionen</h1></header>
<main class="container">
  <p>Beispielrechnung: Netto 100 € – Rabatt 10 € + 19% MwSt. = <strong><?= number_format($result, 2, ",", ".") ?> €</strong></p>
  <p><small class="muted">Quelle: inc/tools.php</small></p>
</main>
</body>
</html>
