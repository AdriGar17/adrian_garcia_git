<?php
declare(strict_types=1);
include_once("Soporte.php");
class CintaVideo extends Soporte{
public function __construct(
    string $titulo,
    int $numero,
    float $precio,
    private int $duracion
){
    parent::__construct($titulo,$numero,$precio);
}

public function getDuracion():int{
    return $this->duracion;
}
public function muestraResumen():void{
    parent::muestraResumen();
    echo "Duracion: ".$this->getDuracion()."<br>";
}
}
?>