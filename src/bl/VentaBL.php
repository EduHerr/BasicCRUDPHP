<?php
namespace App\BL;

use App\Model\Venta;
use Exception;

class VentaBL{
    public function saveBL(Venta $sale){
        /* $nombre */
        if(empty($sale->nombre)){
            throw new Exception('Nombre no puede ir vacio');
        }
        
        if(!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\u00f1\u00d1\s.,\-#]+$/', $sale->nombre)){
            throw new Exception('Nombre solo admite caracteres alfabeticos');
        }

        /* $apellidoPaterno */
        if(empty($sale->apellidoPaterno)){
            throw new Exception('Nombre no puede ir vacio');
        }
        
        if(!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\u00f1\u00d1\s.,\-#]+$/', $sale->apellidoPaterno)){
            throw new Exception('Apellido paterno solo admite caracteres alfabeticos');
        }

        /* $apellidoMaterno */
        if(empty($sale->apellidoMaterno)){
            throw new Exception('Apellido materno no puede ir vacio');
        }
        
        if(!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\u00f1\u00d1\s.,\-#]+$/', $sale->apellidoMaterno)){
            throw new Exception('Apellido materno solo admite caracteres alfabeticos');
        }

        /* $fechaNacimiento */
        if(empty($sale->fechaNacimiento)){
            throw new Exception('Fecha de nacimiento materno no puede ir vacio');
        }

        /* $rfc */
        if(empty($sale->rfc)){
            throw new Exception('RFC no puede ir vacio');
        }

        if(!preg_match('/^([A-ZÑ&]{3,4}) ?(\d{2}(0[1-9]|1[0-2])(0[1-9]|[12]\d|3[01])) ?([A-Z\d]{2})([A\d])?$/', $sale->rfc)){
            throw new Exception('Formato de RFC invalido');
        }

        /* $mail */
        if(empty($sale->mail)){
            throw new Exception('Mail no puede ir vacio');
        }

        if(!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $sale->mail)){
            throw new Exception('Formato de correo electronico invalido');
        }

        /* $celular */
        if(empty($sale->celular)){
            throw new Exception('Celular no puede ir vacio');
        }

        if(!preg_match('/^\d{10}$/', $sale->celular)){
            throw new Exception('Celular solo acepta numeros y debe de estar compuesto por 10 digitos');
        }

        /* $codigoPostal */
        if(empty($sale->codigoPostal)){
            throw new Exception('Codigo postal no puede ir vacio');
        }

        if(!preg_match('/^\d{5}$/', $sale->celular)){
            throw new Exception('Codigo postal solo acepta numeros y debe de estar compuesto por 5 digitos');
        }

        /* $calle */
        if(empty($sale->calle)){
            throw new Exception('Calle no puede ir vacio');
        }

        if(!preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.,#-]{3,50}+$/', $sale->calle)){
            throw new Exception('Calle solo acepta datos alfanumericos y los siguientes caracteres especiales [, . # -]');
        }

        /* $colonia */
        if(empty($sale->colonia)){
            throw new Exception('Colonia de nacimiento materno no puede ir vacio');
        }

        if(!preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.,#-]{3,50}+$/', $sale->colonia)){
            throw new Exception('Colonia solo acepta datos alfanumericos y los siguientes caracteres especiales [, . # -]');
        }

        /* $ciudad */
        if(empty($sale->ciudad)){
            throw new Exception('Ciudad no puede ir vacio');
        }

        if(!preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.,#-]{3,50}+$/', $sale->ciudad)){
            throw new Exception('Ciudad solo acepta datos alfanumericos y los siguientes caracteres especiales [, . # -]');
        }

        /* $estado */
        if(empty($sale->estado)){
            throw new Exception('Estado no puede ir vacio');
        }

        if(!preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.,#-]{3,50}+$/', $sale->estado)){
            throw new Exception('Estado solo acepta datos alfanumericos y los siguientes caracteres especiales [, . # -]');
        }

        /* $pais */
        if(empty($sale->pais)){
            throw new Exception('Pais no puede ir vacio');
        }

        if(!preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.,#-]{3,50}+$/', $sale->pais)){
            throw new Exception('Pais solo acepta datos alfanumericos y los siguientes caracteres especiales [, . # -]');
        }

        /* $noExterior */
        if(empty($sale->noExterior)){
            throw new Exception('No. exterior no puede ir vacio');
        }

        if(!preg_match('/^[a-zA-Z0-9]{1,5}$/', $sale->noExterior)){
            throw new Exception('No. exterior solo permite datos alfanumericos y contener entre 1 a 5 caracteres');
        }

        /* $productosFavoritos */
        if(empty($sale->productosFavoritos)){
            throw new Exception('Productos no puede ir vacio');
        }

        if(!is_array($sale->productosFavoritos)){
            throw new Exception('Productos favoritos debe de ser un arreglo de objetos');
        }

        foreach($sale->productosFavoritos as $product){
            //Verificar que cumpla con el formato
            if (!isset($product['nombre']) || !isset($product['precio'])) {
                throw new Exception('Cada producto favorito debe tener un nombre y un precio.');
            }

            //Validar Producto.nombre
            if(!preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\u00f1\u00d1\s.,\-#]+$/', $product['nombre'])){
                throw new Exception('Producto.nombre debe de contener datos alfanumericos');
            }

            //Validar Producto.precio
            if (!preg_match('/^\d+(\.\d{1,2})?$/', $product['precio'])) {
                throw new Exception('Producto.precio solo permite datos numericos con dos decimales');
            }
        }

        /* $beneficioElegido */
        if(empty($sale->beneficioElegido)){
            throw new Exception('Beneficio elegido no puede ir vacio');
        }

        $beneficios = ['Descuento', 'ProductoGratis'];
        if(!in_array($sale->beneficioElegido, $beneficios)){
            throw new Exception('Valor no permitido. Los valores permitidos son: ' . implode(', ', $beneficios));
        }
    }
}
