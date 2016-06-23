<?php
	require 'funciones.php';

	// Variables recibidas por POST
	$id_plan  = $_POST['id_plan'];
	$username = $_POST['username'];
	$rol 	  = $_POST['rol'];
	
	session_start();
	$msje = "Rol asignado correctamente !";
	$rpta = ejecutarQuery("INSERT EquipoAuditoria VALUES(".$id_plan.", '".$username."', '".$rol."')");
	if(!$rpta)
	{
		$msje = "Rol modificado correctamente !";
		ejecutarQuery("UPDATE EquipoAuditoria SET rol='".$rol."' WHERE ID_Plan=".$id_plan." AND username='".$username."')");
	}
?>
<script>
	alert("<?= $msje ?>");
	window.location = '../sites/roles.php';
</script>