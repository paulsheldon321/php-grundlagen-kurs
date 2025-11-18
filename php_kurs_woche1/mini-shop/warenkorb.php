<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors',true);
session_start();
include 'artikel.inc.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ihr Warenkorb</title>
  <link rel="stylesheet" href="../materialien/style/style.css">
</head>
<body>
  <header>
    <h1>Ihr Warenkorb</h1>
  </header>
  <main class="container">
    <?php
      
    // Prüfen, ob der Warenkorb direkt oder über eines der beiden Formulare aufgerufen wurde.
    if( (isset($_POST['schoko'])) || (isset($_POST['pralinen'])) ) {
      // Schleife über das $_POST-Array
      foreach($_POST as $artnr => $menge) {
        // Prüfe auf nicht numerische Werte
        if( ! is_numeric($menge) ) {
          continue;
        }

        // Prüfe ob die Menge größer gleich 1
        if( $menge >= 1 )  {
          // neuer Eintrag in das Session-Array anlegen oder aktualisieren und in den Integer-Datentyp konvertieren
          $_SESSION[$artnr] = intval( $menge);
        } else {
          // Menge ist 0. Prüfen ob der Artikel bereits im Warenkorb lag ( = Artiklenummer wird im Sesssion-Array geführt)
          if( isset( $_SESSION[$artnr] ) ) {
            // wenn ja: Eintrag löschen
            unset( $_SESSION[$artnr] );
          }
        }
      }
    }
      
    ?>

    <table>
      <tr>
        <th>Art-Nr.</th>
        <th>Artikel</th>
        <th>Menge</th>
      </tr>

      <?php 
      
      // Schleife durch das aktualisierte Session-Array
      foreach ( $_SESSION as $artnr => $menge ) {
        // Extrahiere das erste Zeichen aus der Artikelnummer und vergleiche es mit "s".
        if( str_starts_with( $artnr, 's' ) ) {
          // dann Tabellenzelle mit den Werten aus der Schoko-Kategorie generieren. ?>
          <tr>
            <!-- Artikel-Nr. aus dem Session-Array -->
            <td><?= $artnr ?></td>
            <!-- Bezeichnung aus dem Kategorie-Array -->
            <td><?= $array_schoko[$artnr] ?></td>
            <!-- Menge aus dem Session-Array -->
            <td><?= $menge ?></td>
          </tr>
        <?php }
        if( str_starts_with( $artnr, 'p' ) ) {
          // dann Tabellenzelle mit den Werten aus der Praline-Kategorie generieren. ?>
          <tr>
            <!-- Artikel-Nr. aus dem Session-Array -->
            <td><?= $artnr ?></td>
            <!-- Bezeichnung aus dem Kategorie-Array -->
            <td><?= $array_pralinen[$artnr] ?></td>
            <!-- Menge aus dem Session-Array -->
            <td><?= $menge ?></td>
          </tr>
        <?php }
      }
      
      ?>
    </table>

    <ul>
      <li><a href="form-schoko.php">Schokolade bestellen</a></li>
      <li><a href="form-pralinen.php">Pralinen bestellen</a></li>
      <li><a href="kasse.php">Bestellung abschließen</a></li>
    </ul>
  </main>
</body>
</html>