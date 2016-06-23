<?php
	require 'funciones.php';

	// Variables recibidas por POST
	$id 				  = $_POST['id'];
	$nombrePrueba 	  	  = $_POST['nombrePrueba'];
	$institucion  		  = $_POST['institucion']; 
	$entrevistado 		  = $_POST['entrevistado']; 
	$fInicio      	  	  = $_POST['fInicio']; 
	$fFin      	  		  = $_POST['fFin']; 
	
	$preguntas 		  	  = $_POST['preguntas']; 
	$pasos 			  	  = $_POST['pasos']; 
	
	session_start();
	ejecutarQuery("INSERT Prueba VALUES (NULL, ".$id.", '".$nombrePrueba."', '".$institucion."',
							".$entrevistado.", '".$fInicio."', '".$fFin."')");
	$last = getLastPruebaID();

	for($i=0; $i<sizeof($preguntas); ++$i)
	{
		ejecutarQuery("INSERT Pregunta VALUES (NULL, ".$last.", '".$preguntas[$i]."', '".$pasos[$i]."', NULL, '')");	
		// 2 últimos se llenan en ejecución
	}

	$emp 				  = $_POST['empresa'];
?>
<script>
	alert("Nueva prueba registrada satisfactoriamente.");
	window.location = '../sites/empresa.php?id=<?= $emp ?>';
</script>