<?php
declare(strict_types=1);

class Kfz {
    function __construct(private $marke, private $typ, private $motor, private $ps, private $speed = 0) {

    }

    public function setSpeed($speed) {
        $this->speed += $speed;
    }

    public function getSpeed() {
        return $this->speed;
    }

    public function setMotor($motor) {
        $this->motor = $motor;
    }

    public function getMotor() {
        return $this->motor;
    }

    public function setPs($motor) {
        $this->motor = $ps;
    }

    public function getPs() {
        return $this->ps;
    }

    public function setMarke($speed) {
        $this->speed += $marke;
    }

    public function getMarke() {
        return $this->marke;
    }

    public function setTyp($speed) {
        $this->speed += $typ;
    }

    public function getTyp() {
        return $this->typ;
    }

    public function __toString() {
        return "$this->marke $this->typ mit $this->motor Motor und $this->ps PS fährt aktuell $this->speed km/h.";
    }
}