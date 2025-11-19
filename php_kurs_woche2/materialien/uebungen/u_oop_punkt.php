<!DOCTYPE html><body>
<?php
include_once "u_oop_punkt.inc.php";
$punkt1 = new Punkt(); // Objekt punkt1 erstellt mit Defaultwerten
echo "$punkt1<br>";
$punkt2 = new Punkt(3.5, 2.5); //  Objekt punkt2 erstelt mit folgenden Werten
echo "$punkt2<br>";
$punkt3 = new Punkt(4);
echo "$punkt3<br>";
$punkt4 = new Punkt(y: 1.5); // x = Default , y = 1.5 -> punkt4=(0.0 / 1.5)
echo "$punkt4<br>";
$punkt4->verschieben(4.5, 2); // Anfangswert von punkt4 = (0.0, 1.5) -> verschieben auf ( 4.5 , 3.5)
echo "$punkt4";
?>
</body></html>
