$(document).on('ready', funcPrincipal);

function funcPrincipal() 
{
	$("#cboPlanes").on('change', funcCargarPruebas);
    
	$("body").on('click', ".btn-danger", funcEliminarFila);
    
}

function funcCargarPruebas()
{
    var indice = $("#cboPlanes").val();
    $.get('../scripts/get-cbo-pruebas.php?id='+indice, function(data) {
        $("#cboPruebas").html(data);
    });
}