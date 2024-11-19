<?php
declare(strict_types=1);
class Soporte {
    private const IVA=0.21;
public function __construct(
    public string $titulo,
    protected int $numero,
    private float $precio)
{}

public function getPrecio():float{
    return $this->precio;
}

public function getPrecioConIva():float{
    return $this->getPrecio()+$this->getPrecio()*self::IVA;
}

public function getNumero():int{
    return $this->numero;
}

public function muestraResumen(){
    echo "Nombre: ".$this->titulo."<br>";
    echo "Numero: ".$this->getNumero()."<br>";
    echo "Precio: ".$this->getPrecio()."<br>";
    echo "Precio con IVA: ".$this->getPrecioConIva()."<br>";
}
}
?>