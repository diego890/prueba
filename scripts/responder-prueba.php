<?php
	require 'funciones.php';

	// Variables recibidas por POST
	$id_pruebas			  = $_POST['id_pruebas'];
	
	$respuestas		  	  = $_POST['respuesta']; 
	$obs 			  	  = $_POST['observaciones']; 

	$emp 				  = $_POST['empresa'];
	
	for($i=0; $i<sizeof($respuestas); ++$i)
		ejecutarQuery("UPDATE Pregunta SET respuesta = '".$respuestas[$i]."', obs='".$obs[$i]."' WHERE ID_Pregunta=".$id_pruebas[$i]);	
?>
<script>
	alert("Cuestionario registrado satisfactoriamente.");
	window.location = '../sites/empresa.php?id=<?= $emp ?>';
</script>