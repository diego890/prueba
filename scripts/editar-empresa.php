<?php
	require 'funciones.php';

	// Variables recibidas por POST
	$id          = $_POST['id'];
	$razonSocial = $_POST['razonSocial'];
	$giroNegocio = $_POST['giroNegocio'];
	$ubicacion   = $_POST['ubicacion']; 
	$realidadProblematica   = $_POST['realidadProblematica']; 
	$mision      = $_POST['mision']; 
	$vision      = $_POST['vision']; 
	$estrategias = $_POST['estrategias'];

	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 100;

	if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024)
	{ 
		$archivo = $_FILES['imagen']['name'];
		$ruta = "../imagenes/organigramas/" . $archivo;
		move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
	}
	
	$rpta = ejecutarQuery("UPDATE Empresa SET razonSocial='".$razonSocial."', giroNegocio='".$giroNegocio."', ubicacion='".$ubicacion."',
							realidadProblematica='".$realidadProblematica."', mision='".$mision."', vision='".$vision."', estrategias='".$estrategias."', ruta_imagen='".$archivo."' WHERE ID_Empresa=".$id);
?>
<script>
	alert("Datos modificados exitosamente.");
	window.location = '../sites/empresas.php';
</script>