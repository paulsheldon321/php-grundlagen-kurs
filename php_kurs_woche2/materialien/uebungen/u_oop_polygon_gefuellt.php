<!DOCTYPE html><body>
<?php
include_once "u_oop_polygon_gefuellt.inc.php";
$polygonGefuellt1 = new PolygonGefuellt(
array(new Punkt(3.5,1), 
new Punkt(-2, 6.5), 
new Punkt(1.5, -3.5)), 
"Rot"
);
echo "$polygonGefuellt1<br>"; 
$polygonGefuellt1->verschieben(0.5, 3.5);
echo "$polygonGefuellt1<br>"; 
$polygonGefuellt1->faerben("Blau"); 
echo "$polygonGefuellt1<br>";
?>
</body></html>