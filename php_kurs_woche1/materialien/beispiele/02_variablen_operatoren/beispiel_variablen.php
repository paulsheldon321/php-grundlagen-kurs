<?php
declare(strict_types=1);
$name ='Paul';
$age = 33;
$lucky = 7;
$sum = $age + $lucky; 

/*
Arithmetische Operatoren:
+  Addition
-  Subtraktion
*  Multiplikation
/  Division
%  Modulo(Rest einer Division)

Verkettung-Opertor (Konkatenator)
.

Vergleichsoperatoren:
< kleiner als
> größer als
<= kleiner gleich als
>= größer gleich als
== ist gleich
=== ist identisch  (Wert und Typ)
!= ist ungleich
!== ist nicht identisch 
*/ 
?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Variablen & Operatoren</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header><h1>Variablen & Operatoren</h1></header>
  <main class="container">
    <p>Hallo <?= htmlspecialchars($name); ?>, du bist <?= $age; ?> Jahr alt.</p>
    <p>Glückszahl: <?= $lucky ?> -> Summe: <?= $sum ?></p>
  </main>
</body>
</html>
