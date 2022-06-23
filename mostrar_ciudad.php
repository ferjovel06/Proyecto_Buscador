<?php
require_once __DIR__ . "/parsear_datos.php";


$datos = parsearDatos();

$ciudades = [];
foreach($datos as $dato) {
  if(!in_array($dato->Ciudad, $ciudades)) {
      $ciudades[] = $dato->Ciudad;
  }
}

header("Content-Type: application/json");
echo json_encode(array_unique($ciudades));

?>
