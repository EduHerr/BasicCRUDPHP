<?php
namespace App\Repository;
use App\Model\Venta;
use Exception;

class VentaRepository {
    private $ventas = [];

    public function create(Venta $sale){
        if(file_exists('ventas.json')){
            $this->ventas = json_decode(file_get_contents('ventas.json'));
        }
        $this->ventas[] = $sale;

        file_put_contents('ventas.json', json_encode($this->ventas));
    }

    public function delete($id){
        if(!file_exists('ventas.json')){
            throw new Exception('No hay registros para eliminar. Archivo *ventas.json* inexistente');
        }

        foreach ($this->ventas as $key => $venta) {
            if ($venta->id === $id) {
                unset($this->ventas[$key]); // Eliminar el objeto del array
                $this->ventas = array_values($this->ventas); // Reindexar el array para evitar huecos en los índices
                return true; // Retornar verdadero si se eliminó correctamente
            }
        }
    }

    public function get(){
        if(file_exists('ventas.json')){
            $this->ventas = json_decode(file_get_contents('ventas.json'));
        }
        return $this->ventas;
    }
}
