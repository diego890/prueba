<?php
	require 'funciones.php';

	// Variables recibidas por POST
	$id          			= $_POST['id'];	
	$emp          			= $_POST['empresa'];	
 	$criterios	 			= $_POST['criterios'];

 	ejecutarQuery("DELETE FROM Criterio WHERE ID_Plan = ".$id);
 	for($i = 0; $i<sizeof($criterios); ++$i)
 		ejecutarQuery("INSERT Criterio VALUES(".($i+1).", ".$id.", '".$criterios[$i]."')");
?>
<script>
	alert("Datos modificados exitosamente.");
	window.location = '../sites/empresa.php?id=<?= $emp ?>';
</script>