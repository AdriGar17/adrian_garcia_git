<?php
declare(strict_types=1);

class Cliente{

    private $soportesAlquilados=[];
    private int $numSoportesAlquilados=0;

    public function __construct(
        public string $nombre,
        private int $numero,
        private int $maxAlquilerConcurrente=3
    ){}

    public function getNumero():int{
        return $this->numero;
    }

    public function setNumero(int $numero):int{
        return $this->numero=$numero;
    }

    public function getNumSoportesAlquilados():int{
        return $this->numSoportesAlquilados;
    }

    public function tieneAlquilado(Soporte $s): bool {
        foreach ($this->soportesAlquilados as $soporte) {
            if ($soporte === $s) {
                return true;
            }
        }
        return false;
    }

    public function alquilar(Soporte $s):bool{
        if($this->tieneAlquilado($s)){
            echo "El soporte ya esta alquilado.<br>";
            return false;
        }
        if($this->numSoportesAlquilados>=$this->maxAlquilerConcurrente){
            echo "No se pueden alquilar mas soportes.<br>";
            return false;
        }

        $this->soportesAlquilados[]=$s;
        $this->numSoportesAlquilados++;
        return true;
    }

    public function devolver(int $numSoporte): bool {
        foreach ($this->soportesAlquilados as $key => $soporte) {
            if ($soporte->getNumero() === $numSoporte) {
                unset($this->soportesAlquilados[$key]);
                $this->soportesAlquilados = array_values($this->soportesAlquilados); // Reindexar array
                $this->numSoportesAlquilados--;
                echo "Soporte devuelto correctamente.<br>";
                return true;
            }
        }
        echo "El soporte no estaba alquilado.<br>";
        return false;
    }

    public function listarAlquileres(): void {
        $cantidad = count($this->soportesAlquilados);
        echo "El cliente {$this->nombre} tiene {$cantidad} alquiler(es):<br>";
        if ($cantidad === 0) {
            echo "No hay soportes alquilados.<br>";
        } else {
            foreach ($this->soportesAlquilados as $soporte) {
                echo "- " . $soporte->titulo . " (Número: " . $soporte->getNumero() . ")<br>";
            }
        }
    }
    
    public function muestraResumen(): void {
        echo "Nombre del cliente: {$this->nombre}<br>";
        echo "Número de cliente: {$this->numero}<br>";
        echo "Máximo de alquileres permitidos: {$this->maxAlquilerConcurrente}<br>";
        echo "Soportes actualmente alquilados: {$this->numSoportesAlquilados}<br>";
        echo "Listado de soportes alquilados:<br>";
        echo $this->listarAlquileres();
}
}

?>