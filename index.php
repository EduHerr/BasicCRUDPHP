<?php
require_once 'vendor/autoload.php';
use App\Controller\VentaController;

// Obtener la URL solicitada
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Instanciar el controlador
$controller = new VentaController();

// Definir las rutas
switch ($requestUri) {
    case '/venta/get':
        if ($requestMethod === 'GET') {
            header('Content-Type: application/json');
            $controller->get();
        }
    break;

    case '/venta/delete':
        if ($requestMethod === 'DELETE') {
            parse_str(file_get_contents("php://input"), $data); // Obtener datos para la eliminación
            header('Content-Type: application/json');
            $controller->drop($data['id']); // Eliminar una venta por ID
        }
    break;

    case '/venta/save':
        if ($requestMethod === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true); // Leer datos JSON del cuerpo de la solicitud
            header('Content-Type: application/json');
            $controller->save($data);
        }
    break;

    default:
        header("HTTP/1.0 404 Not Found");
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Ruta no encontrada']);
        break;
}
