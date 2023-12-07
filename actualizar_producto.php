<?php?>
<?php
$cargaUtil = json_decode(file_get_contents("php://input"));
if (!$cargaUtil) {
    http_response_code(500);
    exit;
}
$id = $cargaUtil->id;
$nombre = $cargaUtil->nombre;
$precio = $cargaUtil->precio;
$descripcion = $cargaUtil->descripcion;
include_once "funciones.php";
$respuesta = actualizarProducto($nombre, $precio, $descripcion, $id);
echo json_encode($respuesta);
