<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Hallo Welt</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header><h1>Sportfest: Startzeiten und Veranstaltungen</h1></header>
  <main class="container">
    <?php
    // Mehrdimensionales Array erstellen
    $veranstaltungen = [
      ["09:30 Uhr", "Diskuswurf", "Nebenplatz", "Jugendmeisterschaften"],
      ["10:00 Uhr", "5-km-Lauf", "Stadion - Laufbahn", "Offener Lauf"],
      ["11:00 Uhr", "Halbmarathon", "Waldgebiet", "Teilnahme ab 18 Jahren"],
      ["12:00 Uhr", "Stabhochsprung", "Stadion - Stabhochsprunganlage", "Nur Frauen"]
    ];

    // HTML-Tabelle ausgeben
    
    echo "<table border='1'>";
    echo "<tr><th>Beginn</th><th>Disziplin</th><th>Ort</th><th>Bemerkung</th></tr>";

    foreach ($veranstaltungen as $eintrag) {
      echo "<tr>";
      foreach ($eintrag as $wert) {
        echo "<td>$wert</td>";
      }
      echo "</tr>";
    }

    echo "</table>";
    ?>
  </main>
</body>
</html>