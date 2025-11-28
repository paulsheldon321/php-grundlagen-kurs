<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Hallo Welt</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header><h1></h1></header>
  <main class="container">
    <?php
    // Schritt 1: Ursprüngliches Array
    $kennzeichen = [
      "HH" => "Hamburg",
      "B"  => "Berlin",
      "F"  => "Frankfurt am Main",
      "HB" => "Bremen"
    ];

    // Schritt 2: Neue Einträge hinzufügen
    $kennzeichen["M"]  = "München";
    $kennzeichen["BN"] = "Bonn";

    // Schritt 3: Nur Frankfurt behalten
    $neuesArray = [];
    foreach ($kennzeichen as $code => $stadt) {
      if ($stadt === "Frankfurt am Main") {
        $neuesArray[$code] = $stadt;
      }
    }

    // Schritt 4: Tabelle ausgeben
    echo "<h2>Autokennzeichen und dazugehörige Städte</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Kennzeichen</th><th>Stadt</th></tr>";
    foreach ($neuesArray as $code => $stadt) {
      echo "<tr><td>$code</td><td>$stadt</td></tr>";
    }
    echo "</table>";
    ?>
  </main>
</body>
</html>
