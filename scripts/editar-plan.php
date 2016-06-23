<?php
	require 'funciones.php';

	// Variables recibidas por POST
	$id          			= $_POST['id'];
	echo $id;
	$objetivoGeneral 		= $_POST['objetivoGeneral'];
	$objetivosEspecificos   = $_POST['objetivosEspecificos']; 
 
 	$estrategias 			= $_POST['estrategias'];
 	$alineamientos 			= $_POST['alineamientos'];
 	ejecutarQuery("DELETE FROM Alineamiento WHERE ID_Plan = ".$id);
 	for($i = 0; $i<sizeof($estrategias); ++$i)
 		ejecutarQuery("INSERT Alineamiento VALUES(".($i+1).", ".$id.", '".$estrategias[$i]."', '".$alineamientos[$i]."')");

	$alcance      			= $_POST['alcance']; 
	
	$aclaraciones_si 		= $_POST['aclaraciones_si']; 
	$aclaraciones_no 		= $_POST['aclaraciones_no']; 
 	ejecutarQuery("DELETE FROM Aclaracion WHERE ID_Plan = ".$id);
 	for($i = 0; $i<sizeof($aclaraciones_si); ++$i)
 		ejecutarQuery("INSERT Aclaracion VALUES(".($i+1).", ".$id.", '".$aclaraciones_si[$i]."', '".$aclaraciones_no[$i]."')");

	$limitaciones 			= $_POST['limitaciones']; 

	$tareas					= $_POST['tareas'];
	$inicios				= $_POST['inicios'];
	$fines 					= $_POST['fines'];
	$responsables			= $_POST['responsables'];
	ejecutarQuery("DELETE FROM Proyecto WHERE ID_Plan = ".$id);
	for($i = 0; $i<sizeof($tareas); ++$i)
 		ejecutarQuery("INSERT Proyecto VALUES(".($i+1).", ".$id.", '".$tareas[$i]."', '".$inicios[$i]."', '".$fines[$i]."', '".$responsables[$i]."')");

	$entregables 			= $_POST['entregables']; 
	
	$entrevistados 			= $_POST['entrevistados'];
	$cargos 				= $_POST['cargos'];
	ejecutarQuery("DELETE FROM Entrevistado WHERE ID_Plan = ".$id);
	for($i = 0; $i<sizeof($entrevistados); ++$i)
 		ejecutarQuery("INSERT Entrevistado VALUES(".($i+1).", ".$id.", '".$entrevistados[$i]."', '".$cargos[$i]."')");

	session_start();
	$rpta = ejecutarQuery("UPDATE PlanAuditoria SET objetivoGeneral='".$objetivoGeneral."', objetivosEspecificos='".$objetivosEspecificos."',
							alcance='".$alcance."', limitaciones='".$limitaciones."', entregables='".$entregables."' 
							WHERE ID_Plan=".$id);
?>
<script>
	alert("Datos modificados exitosamente.");
	//window.history.back();
</script>