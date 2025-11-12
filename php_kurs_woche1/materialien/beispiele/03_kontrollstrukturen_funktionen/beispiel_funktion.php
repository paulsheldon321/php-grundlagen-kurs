<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

// Funktionsdefinition
function hallo($name) {
  // echo-Ausgaben in Funktionen möglichst vermeiden
  echo "<p>Hallo $name aus der Funktion!</p>";
}

// Funktion mit Rückgabe
function summe($a, $b) {
  $erg = $a + $b;
  return $erg;
}

// fixe Datentypen
function brutto(float $netto, float $mwst = 0.19):float {
  return $netto * (1 + $mwst);
}

// variante Parameter
function ausgabe( string $name, int $alter ) :string {
  // Werte der übergebenen Parameter
  $params = func_get_args();

  echo '<pre>', var_dump($params), '</pre>';

  // Anzahl der übergebenen Parameter
  $num_params = func_num_args();

  echo "<p>Dieser Funktion wurden $num_params Parameter übergeben.</p>";

  $sex = func_get_arg(2);

  return "$name ist $alter Jahre alt und ist $sex.";
}

// variadische Parameter
// nutzen ein Array als Parameter-Definition
function zeigeZutaten(...$args) {
  $ret = '<ul>';

  foreach($args as $arg){
    $ret .= "<li>$arg</li>";
  }

  $ret .= '</ul>';

  return $ret;
}
 

function personInfo( string $name, string $vorname, int $alter) {
  return "$vorname $name ist $alter Jahre alt.";
}

$person = ['Müller', 'Anna', 48];

?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Funktionen Beispiel</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header><h1>Funktionen</h1></header>
  <main class="container">
    <?php hallo('Paul'); ?>
    <?php hallo('Kate'); ?>
    <?php $sum = summe(37, 5); ?>

    <p><?= ausgabe('Martin', 23, 'männlich', 'Motorrad', 4, false); ?></p>
    <p><?= zeigeZutaten('Butter', 'Mehl', 'Eier', 'Safran', 'Schmalz', 'Salz'); ?></p>

    <p><?= personInfo( ...$person); ?></p>

    <p>Das ultimative Ergebnis ist: <?= $sum ?>.</p>
    <p>Netto: 100.00 € → Brutto: <?= brutto(55.7); ?> €</p>
  </main>
</body>
</html>
