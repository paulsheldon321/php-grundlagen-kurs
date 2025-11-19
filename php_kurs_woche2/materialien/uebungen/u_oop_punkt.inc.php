<?php
class Punkt {
    
    // Konstruktor mit Standardwerten
    public function __construct(float $x = 0.0, float $y = 0.0) {
        $this->x = $x;
        $this->y = $y;
    }
    
    // Methode zum Verschieben des Punktes
    public function verschieben(float $dx, float $dy) {
        $this->x += $dx;
        $this->y += $dy;
    }

    // String-Darstellung des Punktes
    public function __toString(): string {
        return "($this->x / $this->y)";
    }
}
?>
