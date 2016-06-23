<?php
include ('funciones.php');

// Pasados por formulario:
$usuario = $_POST['txtUser'];
$clave = $_POST['txtPass'];

// Usamos las funciones de funciones.php
if( sonDatosCorrectos($usuario, $clave) )
{
	// Accedemos a panel.php si es usuario
	if($_SESSION['tipo']=='U')
		header('Location: ../sites/panel.php');
	else header('Location: ../sites/admin.php');
} else {
	// Si no, volvemos al formulario inicial
?>
	<script>
	alert('Los datos ingresados son incorrectos.')
	location.href = "../index.php";
	</script>
<?php
}
?>