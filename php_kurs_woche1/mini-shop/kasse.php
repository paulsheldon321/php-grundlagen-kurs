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
  <title>Kasse</title>
  <link rel="stylesheet" href="../materialien/style/style.css">
</head>
<body>
  <header>
    <h1>Bestellung abschließen</h1>
  </header>
  <main class="container">

    <?php
      
    // Prüfe, ob das Formular bereits abgesendet wurde
    if( isset($_POST['abschliessen']) ):
      // Wenn ja, Daten speichern ...
      $vorname = $_POST['vorname'];
      $nachname = $_POST['nachname'];
      $ort = $_POST['ort'];
      
      // ... und die tabellarische Übersicht inkl. Adressdaten ausgeben
    ?>

    <p>Sie haben folgende Bestellung übermittelt:</p>

    <!-- Adressdaten ausgeben -->
    <p><?= $vorname ?> <?= $nachname ?> aus <?= $ort ?></p>

    <!-- bestellte Artikel -->
    <table>
      <tr>
        <th>Art.-Nr.</th>
        <th>Artikel</th>
        <th>Menge</th>

        <?php
          
        // Bestellung speichern in eine CSV-Datei
        // Spaltenüberschrift der CSV-Datei
        $bestellung = "Art-Nr.;Artikel;Menge\r\n";

        // Artikel eintragen
        foreach($_SESSION as $artnr => $menge) :
          if( str_starts_with($artnr, 's') ) : ?>
            <tr>
              <td><?= $artnr ?></td>
              <td><?= $array_schoko[$artnr] ?></td>
              <td><?= $menge ?></td>
            </tr>
            <?php $bestellung .= "$artnr;" . $array_schoko[$artnr] . ";$menge\r\n"; ?>
          <?php endif;
          if( str_starts_with($artnr, 'p') ) : ?>
            <tr>
              <td><?= $artnr ?></td>
              <td><?= $array_pralinen[$artnr] ?></td>
              <td><?= $menge ?></td>
            </tr>
            <?php $bestellung .= "$artnr;" . $array_pralinen[$artnr] . ";$menge\r\n"; ?>
          <?php endif; ?>
        
        <?php endforeach;
          $bestellung .= "\r\nbestellt von\r\n$vorname;$nachname;$ort\r\n\r\n";
        ?>

      </tr>
    </table>

    <p>Vielen Dank für Ihren Einkauf!</p>

    <?php
      
    // Bestellung speichern
    file_put_contents('bestellung.csv', $bestellung, FILE_APPEND);

    // Session (Warenkorb) löschen
    $_SESSION = array();
    session_destroy();
      
    else:
    ?>

    <p>Bitte füllen Sie die nachfolgenden Eingabefelder aus:</p>
    <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="post">
      <p>Vorname: <input type="text" name="vorname"></p>
      <p>Nachname: <input type="text" name="nachname"></p>
      <p>Wohnort: <input type="text" name="ort"></p>
      <p><button name="abschliessen" type="submit">Absenden und Bestellung abschließen</button></p>
    </form>

    <?php endif; ?>

    <ul>
      <li><a href="form-schoko.php">Schokolade bestellen</a></li>
      <li><a href="form-pralinen.php">Pralinen bestellen</a></li>
      <li><a href="warenkorb.php">Warenkorb</a></li>
    </ul>

  </main>
</body>
</html>