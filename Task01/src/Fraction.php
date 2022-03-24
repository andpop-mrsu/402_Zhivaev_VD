<?php

namespace App;

class Fraction
{
    private int $numer;
    private int $denom;
    public function __construct(int $numer, int $denom)
    {
        if ($denom <= 0) {
            echo "Denominator must be a natural number\n";
        } else {
            $this -> reduceFraction($numer, $denom);
        }
    }

    private function reduceFraction($numer, $denom)
    {
        $nod = $this -> nod($numer, $denom);
        if ($nod == 1) {
            $this -> numer = $numer;
            $this -> denom = $denom;
        } else {
            $this -> numer = $numer / $nod;
            $this -> denom = $denom / $nod;
        }
    }

    private function nod($numer, $denom)
    {
        return $denom ? $this -> nod($denom, $numer % $denom) :  abs($numer);
    }

    public function getNumer(): int
    {
        return $this -> numer;
    }

    public function getDenom(): int
    {
        return $this -> denom;
    }

    public function add(Fraction $frac): Fraction
    {
        $numer = $frac -> denom * $this -> numer + $this -> denom * $frac -> numer;
        $denom = $this -> denom * $frac -> denom;
        return new Fraction($numer, $denom);
    }

    public function sub(Fraction $frac): Fraction
    {
        $numer = $frac -> denom * $this -> numer - $this -> denom * $frac -> numer;
        $denom = $this -> denom * $frac -> denom;
        return new Fraction($numer, $denom);
    }

    private function correctFraction(): string
    {
        $whole = intval($this -> numer / $this -> denom);
        $numer = $this -> numer % $this -> denom;
        return $whole . "'" . $numer . "/" . $this -> denom;
    }

    public function __toString()
    {
        if (abs($this -> numer) > $this -> denom) {
            return $this -> correctFraction();
        } else {
            return $this -> numer . "/" . $this -> denom;
        }
    }
}