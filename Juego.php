<?php
declare(strict_types=1);
include_once("Soporte.php");
class Juego extends Soporte{

    public function __construct(
        string $titulo,
        int $numero,
        float $precio,
        public string $consola,
        private int $minNumJugadores,
        private int $maxNumJugadores
    ){
        parent::__construct($titulo,$numero,$precio);
    }

    public function getMinNumJugadores():int{
        return $this->minNumJugadores;
    }

    public function getMaxNumJugadores():int{
        return $this->maxNumJugadores;
    }

    public function muestraJugadoresPosibles():void{
        if ($this->getMinNumJugadores()===1 && $this->getMaxNumJugadores()===1){
            echo "Para un jugador <br>";
        }elseif($this->getMinNumJugadores()===$this->getMaxNumJugadores()){
            echo "Para ".$this->getMinNumJugadores()." jugadores <br>";
        }else{
            echo "De ".$this->getMinNumJugadores()." a ".$this->getMaxNumJugadores()." jugadores <br>";
        }
    }


    public function muestraResumen():void{
        parent::muestraResumen();
        echo "Consola: ".$this->consola."<br>";
        echo "Jugadores Posibles:  ".$this->muestraJugadoresPosibles()."<br>";
    }
}
?>