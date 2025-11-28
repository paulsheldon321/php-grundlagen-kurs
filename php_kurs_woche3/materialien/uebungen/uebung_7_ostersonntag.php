<!DOCTYPE html>
<html lang="de">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ostersonntag, Auswertung</title>
   <style>
      table, td, th {
         border: 1px solid black;
         border-collapse: collapse;
         padding: 5px;
      }
   </style>
</head>

<body>
   <h2>Ostersonntag</h2>
   <?php
   include "uebung_7_ostersonntag.inc.php";

   $anfang = intval($_POST["anfang"]);
   $ende   = intval($_POST["ende"]);

   // Falls Reihenfolge falsch: tauschen
   if ($anfang > $ende) {
       $temp = $anfang;
       $anfang = $ende;
       $ende = $temp;
   }

   // Tabelle beginnen
   echo "<table>";
   echo "<tr><th>Jahr</th><th>Datum Ostersonntag</th></tr>";

   // Schleife über alle Jahre
   for ($jahr = $anfang; $jahr <= $ende; $jahr++) {
       $tag = "";
       $monat = "";
       ostersonntag($jahr, $tag, $monat);
       echo "<tr><td>$jahr</td><td>$tag.$monat.$jahr</td></tr>";
   }

   echo "</table>";
   ?>
</body>
</html>
