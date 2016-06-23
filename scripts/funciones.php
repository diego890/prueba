<?php

$conexion = null;

function abrirConex()
{
	global $conexion;
	// Conexión con el servidor de base de datos MySQL
	$conexion = mysqli_connect('localhost', 'root', '', 'auditoria');
	mysqli_set_charset($conexion, 'utf8');
}

function cerrarConex($result='')
{
	if($result!='')
		mysqli_free_result($result); 

	// Cerrar conexión a la BD
	mysqli_close($GLOBALS['conexion']);
}

function sonDatosCorrectos($usuario, $clave) 
{	
	abrirConex();
	// Sentencia SQL para consultar el nombre del usuario
	$sql = "SELECT * FROM Auditor WHERE usuario='".$usuario."' AND password='".$clave."'";
	$resultado = mysqli_query($GLOBALS['conexion'], $sql);

	// Si existe, inicia sesión y guarda info del usuario
	if( $fila = mysqli_fetch_row($resultado) )
	{	
		session_start();
		// Comenzamos a usar variables de sesión
		$_SESSION['usuario'] = $usuario;
		$_SESSION['DNI'] = $fila[2];
		$_SESSION['nombres'] = $fila[3];
		$_SESSION['apellidos'] = $fila[4];
		$_SESSION['direccion'] = $fila[5];
		$_SESSION['telefono'] = $fila[6];
		$_SESSION['email'] = $fila[7];
		$_SESSION['sexo'] = $fila[8];
		$_SESSION['tipo'] = $fila[9];
		cerrarConex($resultado);

		return true; // Indicamos que sí existe
	} 
	return false;  
}

// Para verificar que ya se ha iniciado sesión previamente
function haIniciadoSesion()
{
	// Continuar una sesión iniciada
	session_start();
	// Verificamos la existencia de la variable de sesión
	if( isset($_SESSION['usuario']) ) return true;
	return false;
}

function getNombreRol($idPlan)
{
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT * FROM EquipoAuditoria WHERE ID_Plan=".$idPlan." AND usuario='".$_SESSION['usuario']."'");
	if($resultSet->num_rows==0) return "No asignado aún";
	return $resultSet->fetch_all()[0][2];	
}

function getEmpresas()
{
	abrirConex();
	// Obtener todos los títulos (últimas modificaciones)
	global $conexion;
	// $resultSet = mysqli_query($conexion, "SELECT E.* FROM Auditor A 
	// 									INNER JOIN EquipoAuditoria EA
	// 									ON A.usuario = EA.usuario
	// 									INNER JOIN PlanAuditoria PA
	// 									ON EA.ID_Plan=PA.ID_Plan
	// 									INNER JOIN Empresa E
	// 									ON PA.ID_Empresa = E.ID_Empresa
	// 									WHERE A.usuario='".$_SESSION['usuario']."'");
	$resultSet = mysqli_query($conexion, "SELECT * FROM Empresa");
	return $resultSet->fetch_all();
}

function getRoles()
{
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT * FROM Rol");
	return $resultSet->fetch_all();	
}

function getRol($rol)
{
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT * FROM Rol WHERE rol='".$rol."'");
	return $resultSet->fetch_all();	
}

function getEmpresa($id)
{
	abrirConex();
	// Obtener todos los títulos (últimas modificaciones)
	global $conexion;
	// $resultSet = mysqli_query($conexion, "SELECT E.* FROM Auditor A 
	// 									INNER JOIN EquipoAuditoria EA
	// 									ON A.usuario = EA.usuario
	// 									INNER JOIN PlanAuditoria PA
	// 									ON EA.ID_Plan=PA.ID_Plan
	// 									INNER JOIN Empresa E
	// 									ON PA.ID_Empresa = E.ID_Empresa
	// 									WHERE A.usuario='".$_SESSION['usuario']."'
	// 									AND E.ID_Empresa=".$id);
	$resultSet = mysqli_query($conexion, "SELECT * FROM Empresa WHERE ID_Empresa=".$id);
	return $resultSet->fetch_all()[0];
}

function getAuditores()
{
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT * FROM Auditor");
	return $resultSet->fetch_all();
}

function getTodosPlanes()
{
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT * FROM PlanAuditoria");
	return $resultSet->fetch_all();
}

function getPlanes($id)
{
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT PA.*, NA.internacional, NA.nacional, NA.institucional
										FROM PlanAuditoria PA
										INNER JOIN NormativaAuditoria NA
										ON PA.ID_Plan = NA.ID_Plan
										WHERE ID_Empresa=".$id);
	return $resultSet->fetch_all();
}

function getPlan($id)
{
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT * FROM PlanAuditoria
										WHERE ID_Plan=".$id);
	return $resultSet->fetch_all()[0];
}

function getEstrategias($id)
{
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT estrategia FROM Alineamiento WHERE ID_Plan=".$id);
	return $resultSet->fetch_all();
}
function getAlineamientos($id)
{
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT alineamiento FROM Alineamiento WHERE ID_Plan=".$id);
	return $resultSet->fetch_all();
}

function getAclaracionesSi($id)
{
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT aclaraciones_si FROM Aclaracion WHERE ID_Plan=".$id);
	return $resultSet->fetch_all();	
}
function getAclaracionesNo($id)
{
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT aclaraciones_no FROM Aclaracion WHERE ID_Plan=".$id);
	return $resultSet->fetch_all();	
}

function getTareas($id)
{
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT tarea FROM Proyecto WHERE ID_Plan=".$id);
	return $resultSet->fetch_all();	
}
function getInicios($id)
{
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT fechaInicio FROM Proyecto WHERE ID_Plan=".$id);
	return $resultSet->fetch_all();	
}
function getFines($id)
{
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT fechaFin FROM Proyecto WHERE ID_Plan=".$id);
	return $resultSet->fetch_all();	
}
function getResponsables($id)
{
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT usuario FROM Proyecto WHERE ID_Plan=".$id);
	return $resultSet->fetch_all();	
}

function getEntrevistados($id)
{
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT nombre FROM Entrevistado WHERE ID_Plan=".$id);
	return $resultSet->fetch_all();	
}
function getCargos($id)
{
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT cargo FROM Entrevistado WHERE ID_Plan=".$id);
	return $resultSet->fetch_all();	
}

function getCriterios($id)
{
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT * FROM Criterio WHERE ID_Plan=".$id);
	return $resultSet->fetch_all();	
}

function getEntrevistadosFull($id)
{
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT * FROM Entrevistado WHERE ID_Plan=".$id);
	return $resultSet->fetch_all();	
}

function getPruebas($id) // id del plan
{
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT * FROM Prueba WHERE ID_Plan=".$id);
	return $resultSet->fetch_all();	
}
function getPrueba($id)
{
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT * FROM Prueba WHERE ID_Prueba=".$id);
	return $resultSet->fetch_all()[0];
}

function getPreguntas($id) // id de la prueba
{
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT * FROM Pregunta WHERE ID_Prueba=".$id);
	return $resultSet->fetch_all();	
}

function getNormativa($id)
{
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT * FROM NormativaAuditoria
										WHERE ID_Plan=".$id);
	return $resultSet->fetch_all()[0];
}

function getLastPlanID()
{
	// Devuelve el ID del último plan registrado
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT MAX(ID_Plan) FROM PlanAuditoria");
	return $resultSet->fetch_all()[0][0];
}

function getLastPruebaID()
{
	// Devuelve el ID de la última prueba registrado
	abrirConex();
	global $conexion;
	$resultSet = mysqli_query($conexion, "SELECT COUNT(ID_Prueba) FROM Prueba");
	return $resultSet->fetch_all()[0][0];
}

/* FUNCIONES UTILITARIAS */

function ejecutarQuery($query)
{
	global $conexion;
	abrirConex();
	return mysqli_query($conexion, $query);
}

function getResultSet($query)
{
	global $conexion;
	abrirConex();
	$resultSet = mysqli_query($conexion, $query);
	cerrarConex();
	return $resultSet;
}

function getFirstRow($query)
{
	$rpta = getResultSet($query);
	if($rpta)
		return mysqli_fetch_row( getResultSet($query) );
	return array();
}

function getFirstValue($query)
{
	$rpta = getFirstRow($query);
	if($rpta)
		return $rpta[0];		
	return '';
}

?>