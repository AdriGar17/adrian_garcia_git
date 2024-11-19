<?php
declare(strict_types=1);
include_once("CintaVideo.php");
include_once("Dvd.php");
include_once("Juego.php");
include_once("Soporte.php");
include_once("Cliente.php");
class VideoClub{
    private $productos=[];
    private int $numProductos=0;
    private $socios=[];
    private int $numSocios=0;

    public function __construct(private string $nombre){}


private function incluirProducto(Soporte $producto): void {
    $this->productos[] = $producto; // Agrega el producto al array
    $this->numProductos++; // Incrementa el contador de productos
    echo "Producto '{$producto->titulo}' incluido correctamente. Total de productos: {$this->numProductos}.<br>";
}

public function incluirCintaVideo(string $titulo, float $precio, int $duracion): void {
    $cinta = new CintaVideo($titulo, $this->numProductos + 1, $precio, $duracion); // Crear la cinta
    $this->incluirProducto($cinta); // Incluirla en el array de productos
    echo "Cinta de video '{$titulo}' incluida correctamente.<br>";
}

public function incluirDvd(string $titulo,float $precio,string $idiomas,string $pantalla){
    $dvd=new Dvd($titulo,$this->numProductos+1,$precio,$idiomas,$pantalla);
    $this->incluirProducto($dvd);
    echo "DVD '{$titulo}' incluido correctamente.<br>";
}

public function incluirJuego(string $titulo,float $precio,string $consola,int $minJ,int $maxJ){
    $juego=new Juego($titulo,$this->numProductos+1,$precio,$consola,$minJ,$maxJ);
    $this->incluirProducto($juego);
    echo "Juego ".$titulo." incluido correctamente.<br>";
}

public function incluirSocio(string $nombre,int $maxAlquileresConcurrentes=3){
    $socio= new Cliente($nombre,$this->numSocios+1,$maxAlquileresConcurrentes);
    $this->socios[]=$socio;
    $this->numSocios++;
    echo "Socio ".$nombre." incluido correctamente";
}

public function listarProductos(): void {
    echo "Lista de productos en el VideoClub '{$this->nombre}':<br>";
    if (count($this->productos) === 0) {
        echo "No hay productos disponibles.<br>";
    } else {
        foreach ($this->productos as $producto) {
            $producto->muestraResumen(); // Llama al método muestraResumen() de cada producto
            echo "<br>";
        }
    }
}
    public function listarSocios(): void {
        echo "Lista de socios en el VideoClub '{$this->nombre}':<br>";
        if (count($this->socios) === 0) {
            echo "No hay socios registrados.<br>";
        } else {
            foreach ($this->socios as $socio) {
                $socio->muestraResumen(); // Llama al método muestraResumen() de cada socio
                echo "<br>";
            }
        }
    }
    
    public function alquilaSocioProducto(int $numeroCliente, int $numeroSoporte): void {
        // Buscar el socio por su número
        $socio = null;
        foreach ($this->socios as $cliente) {
            if ($cliente->getNumero() === $numeroCliente) {
                $socio = $cliente;
                break;
            }
        }
    
        if ($socio === null) {
            echo "Error: No se encontró un socio con el número {$numeroCliente}.<br>";
            return;
        }
    
        // Buscar el producto por su número
        $producto = null;
        foreach ($this->productos as $soporte) {
            if ($soporte->getNumero() === $numeroSoporte) {
                $producto = $soporte;
                break;
            }
        }
    
        if ($producto === null) {
            echo "Error: No se encontró un producto con el número {$numeroSoporte}.<br>";
            return;
        }
    
        // Intentar alquilar el producto al socio
        if ($socio->alquilar($producto)) {
            echo "El socio '{$socio->nombre}' alquiló el producto '{$producto->titulo}' correctamente.<br>";
        } else {
            echo "Error: No se pudo alquilar el producto '{$producto->titulo}' al socio '{$socio->nombre}'.<br>";
        }
    }
    
}


?>