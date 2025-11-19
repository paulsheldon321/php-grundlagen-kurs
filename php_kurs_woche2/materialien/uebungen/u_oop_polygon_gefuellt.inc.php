<?php
include_once 'u_oop_punkt.inc.php';
 
class PolygonGefuellt
{
 
    private ?Punkt $start;
    private ?Punkt $mitte;
    private ?Punkt $ende;
 
    public function __construct(array $punkte = [], private string $farbe = '')
    {
        $this->start = $punkte[0] ?? null;
        $this->mitte = $punkte[1] ?? null;
        $this->ende  = $punkte[2] ?? null;
        $this->farbe = $farbe;
    }
 
    public function verschieben(float $dx, float $dy)
    {
        $this->start->verschieben($dx, $dy);
        $this->mitte->verschieben($dx, $dy);
        $this->ende->verschieben($dx, $dy);
    }
 
    public function faerben(string $farbe)
    {
        /* Setterfunktion */
        $this->farbe = $farbe;
    }
 
    public function __toString(): string
    {
        if ($this->start === null && $this->mitte === null && $this->ende === null) {
            return "(Keine Punkte)";
        }
 
        return "($this->start) | ($this->mitte) | ($this->ende) - $this->farbe";
    }
}