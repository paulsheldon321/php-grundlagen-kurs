<?php
require_once 'u_oop_punkt.inc.php'; // Zugriff auf der Klasse Punkt
 
class Linie
{
    private Punkt $start; // Objekt start von der Klasse Punkt
    private Punkt $ende; // Objekt ende von der Klasse Punkt
 
    public function __construct(?Punkt $start = null, ?Punkt $ende = null)
    {
        $this->start = $start ?? new Punkt();
        $this->ende  = $ende  ?? new Punkt();
    }
 
    public function verschieben(float $dx, float $dy)
    {
        $this->start->verschieben($dx, $dy);
        $this->ende->verschieben($dx, $dy);
    }
 
    public function __toString(): string
    {
        return "$this->start | $this->ende";
    }
}