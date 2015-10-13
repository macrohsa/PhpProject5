<?php
include("combos.php");
include("mysql.php");
$ciudades = new combos();
$ciudades->code = $_GET["code"];
$ciudades = $ciudades->cargarCiudades();
foreach($ciudades as $key=>$value)
{
		echo "<option value=\"$key\">$value</option>";
}
?>