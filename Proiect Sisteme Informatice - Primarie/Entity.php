<?php

class Entity
{
    public $nume;
    public $pret;
    public $poza;
    public $descriere;
    
    
    function __construct($nume,$pret,$poza, $descriere) {
        $this->nume = $nume;
        $this->pret = $pret;
        $this->poza = $poza;
        $this->descriere = $descriere;
    }

}

?>
