<?php
require_once __DIR__ . "/parsear_datos.php";

$datos = parsearDatos();

$tipos = [];
foreach ($datos as $dato) {
  if(!in_array($dato->Tipo, $tipos)) {
      $tipos[] = $dato->Tipo;
  }
}

header("Content-Type: application/json");
echo json_encode(array_unique($tipos));

?>
