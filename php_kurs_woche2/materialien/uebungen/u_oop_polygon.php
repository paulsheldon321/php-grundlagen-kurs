<!DOCTYPE html><body>
<?php
include_once "u_oop_polygon.inc.php";
$polygon1 = new Polygon(); 
echo "$polygon1<br>";
$punkt1 = new Punkt(3.5, 2.5); 
$punkt2 = new Punkt(-2, 8.5);
$polygon2 = new Polygon(array($punkt1, new Punkt(3), $punkt2)); 
echo "$polygon2<br>";
$polygon2->verschieben(1, 2.5); 
echo "$polygon2<br>";
?>
</body></html>