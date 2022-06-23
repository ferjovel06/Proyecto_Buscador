<?php
require_once __DIR__ . "/parsear_datos.php"

$datos = parsearDatos();
$ciudad = array_key_exists("ciudad", $_POST)? $_POST['ciudad'] : "";
$tipo = array_key_exists("tipo", $_POST)? $_POST['tipo'] : "";
$precio = array_key_exists("precio", $_POST)? $_POST['precio']: "0;99999999";
list($preciomin, $preciomax) = explode(";", $precio);
$preciomin = floatval($preciomin);
$preciomax = floatval($preciomax);
$registros = [];

foreach ($datos as $dato) {
  $precioCasa = $dato->Precio;
  $precioCasa = str_replace("$", "", $precioCasa);
  $precioCasa = str_replace(",","", $precioCasa);

  if ("" !== $ciudad && "" !== $tipo) {
    if ($ciudad == $dato->Ciudad && $tipo == $dato->Tipo) {
      if ($precioCasa >= $preciomin && $precioCasa <= $preciomax) {
        $registros[] = $dato;
      }
    }
  } elseif ("" !== $ciudad) {
    if ($ciudad == $dato->Ciudad) {
      if ($precioCasa >= $preciomin && $precioCasa <= $preciomax) {
        $registros[] = $dato;
      }
    }
  } elseif ("" !== $tipo) {
    if ($tipo == $dato->Tipo) {
      if ($precioCasa >= $preciomin && $precioCasa <= $preciomax) {
        $registros[] = $dato;
      }
    }
  }
  else {
    if ($precioCasa >= $preciomin && $precioCasa <= $preciomax) {
      $registros[] = $dato;
    }
  }
}

function mostrarRegistro($registro) {

  ?>
  <div class="row">
    <div class="col s6">
      <img src="./img/home.jpg" style="max-width: 200px;" />
    </div>
    <div class="col s6">
      <p> <strong>Direccion:</strong><?php echo $registro->Direccion ?></p>
      <p> <strong>Ciudad:</strong><?php echo $registro->Ciudad ?></p>
      <p> <strong>Telefono:</strong><?php echo $registro->Telefono ?></p>
      <p> <strong>Codigo Postal:</strong><?php echo $registro->Codigo_Postal ?></p>
      <p> <strong>Tipo:</strong><?php echo $registro->Tipo ?></p>
      <p> <strong>Precio:</strong><?php echo $registro->Precio ?></p>
    </div>
  </div>
<?php
}?>

<?php
foreach ($registros as $registro) {
  mostrarRegistro($registro);
}
?>
