<?php
$cargaUtil = json_decode(file_get_contents("php://input"));
if (!$cargaUtil) {
    http_response_code(500);
    exit;
}
$nombre = $cargaUtil->nombre;
$precio = $cargaUtil->precio;
$descripcion = $cargaUtil->descripcion;
include_once "funciones.php";
$respuesta = guardarProducto($nombre, $precio, $descripcion);
echo json_encode($respuesta);
