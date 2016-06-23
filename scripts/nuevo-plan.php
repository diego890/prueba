<?php
	require 'funciones.php';

	// Variables recibidas por POST
	$id 				  = $_POST['empresa'];
	$objetivoGeneral 	  = $_POST['objetivoGeneral'];
	$objetivosEspecificos = $_POST['objetivosEspecificos']; 
	$alcance      		  = $_POST['alcance']; 
	$limitaciones 		  = $_POST['limitaciones']; 
	$entregables 		  = $_POST['entregables']; 
	
	session_start();
	ejecutarQuery("INSERT PlanAuditoria VALUES (NULL, ".$id.", '".$objetivoGeneral."', '".$objetivosEspecificos."',
							'".$alcance."', '".$limitaciones."', '".$entregables."')");

	$last = getLastPlanID();
	ejecutarQuery("INSERT NormativaAuditoria VALUES (".$last.", '', '', '')");	
?>
<script>
	alert("Nuevo plan registrado satisfactoriamente.");
	window.location = '../sites/empresa.php?id=<?= $id ?>';
</script>