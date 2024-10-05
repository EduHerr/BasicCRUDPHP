<?php
namespace App\Controller;
use App\Model\Venta;
use App\Repository\VentaRepository;
use App\BL\VentaBL;
use Exception;

class VentaController {
    private $ventaRepository;
    private $ventaBL;

    public function __construct(){
        $this->ventaRepository = new VentaRepository();
        $this->ventaBL = new VentaBL();
    }

    public function save($data){
        $venta = new Venta(
            $data['nombre'],
            $data['apellidoPaterno'],
            $data['apellidoMaterno'],
            $data['fechaNacimiento'],
            $data['rfc'],
            $data['mail'],
            $data['celular'],
            $data['codigoPostal'],
            $data['calle'],
            $data['colonia'],
            $data['ciudad'],
            $data['estado'],
            $data['noExterior'],
            $data['productosFavoritos'],
            $data['beneficioElegido']
        );

        try{
            $this->ventaBL->saveBL($venta);
            $this->ventaRepository->create($venta);

            echo json_encode(["status" => "201", "message" => "Venta agregada con exito", "data" => $venta]);
        }
        catch(Exception $e){
            echo json_encode(["status" => "500", "message" => $e->getMessage()]);
        }
    }

    public function get(){
        try{
            $ventas = $this->ventaRepository->get();
            echo json_encode(["status" => "200", "data" => $ventas]);
        }
        catch(Exception $e){
            echo json_encode(["status" => "500", "message" => $e->getMessage()]);
        }
    }

    public function drop($id){
        if(!$this->ventaRepository->delete($id)){
            echo json_encode(["status" => "500", "message" => "Hubo un error al intentar eliminar una venta"]);
        }

        echo json_encode(["status" => "200", "message" => "Venta eliminada con exito"]);
    }
}
