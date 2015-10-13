<?php

include("combos.php");
include("mysql.php");
$estados = new combos();
$estados->code = $_GET["code"];
$estados = $estados->cargarEstados();
foreach($estados as $key=>$value)
{
		echo "<option value=\"$key\">$value</option>";
}

?>