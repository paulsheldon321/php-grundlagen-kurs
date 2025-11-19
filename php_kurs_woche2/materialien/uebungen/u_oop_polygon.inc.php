<?php
require_once 'u_oop_punkt.inc.php';
 
class Polygon
{
    private ?Punkt $start; // Objekt start von der Klasse Punkt
    private ?Punkt $mitte; // Objekt mitte
    private ?Punkt $ende; // Objekt ende
 
    public function __construct(array $punkte = [])
    {
        /* Array */
        $this->start = $punkte[0] ?? null;
        $this->mitte = $punkte[1] ?? null;
        $this->ende  = $punkte[2] ?? null;
    }
 
    public function verschieben(float $dx, float $dy)
    {
        $this->start->verschieben($dx, $dy);
        $this->mitte->verschieben($dx, $dy);
        $this->ende->verschieben($dx, $dy);
    }
 
 
    public function __toString(): string
    {
        if ($this->start === null && $this->mitte === null && $this->ende === null) {
            return "(Keine Punkte)";
        }
 
        return "($this->start) | ($this->mitte) | ($this->ende)";
    }
}