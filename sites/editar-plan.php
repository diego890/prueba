<?php
include ('../scripts/funciones.php');

if( ! haIniciadoSesion() )
  header('Location: ../index.php');

if(isset($_GET['id']))
{
  $plan = getPlan($_GET['id']);
  if(!isset($plan))
    header('Location: 404.php');   

  $estrategias = getEstrategias($_GET['id']);
  $alineamientos = getAlineamientos($_GET['id']);

  $aclaraciones_si = getAclaracionesSi($_GET['id']);
  $aclaraciones_no = getAclaracionesNo($_GET['id']);

  $auditores = getAuditores();
    $tareas = getTareas($_GET['id']);
    $inicios = getInicios($_GET['id']);
    $fines = getFines($_GET['id']);
    $responsables = getResponsables($_GET['id']);

  $entrevistados = getEntrevistados($_GET['id']);
  $cargos = getCargos($_GET['id']);
}
else header('Location: empresas.php');
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Datos del plan</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">

    <!-- Custom styles for this template -->
    <link href="../css/theme.css" rel="stylesheet">

    <style type="text/css">
    .btn { margin-right: 1em !important; }
    </style>    
  </head>

  <body role="document">

    <?php require 'menu.php'; ?>

    <div class="container theme-showcase" role="main">

      <div class="page-header">
        <h3>Edición de datos del plan #<?= $_GET['id'] ?></h3>
      </div>
      <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h2 class="panel-title">Datos del plan</h2>
            </div>
            <div class="panel-body">
              <form method="POST" action="../scripts/editar-plan.php">
                <div class="form-group">
                  <label for="id">ID del Plan</label>
                  <input type="text" class="form-control" name="id" value="<?= $plan[0] ?>" readonly>
                </div>      
                <div class="form-group">
                  <label for="objetivoGeneral">Objetivo general</label>
                  <input type="text" class="form-control" name="objetivoGeneral" value="<?= $plan[2] ?>" placeholder="Objetivo general" required>
                </div>
                <div class="form-group">
                  <label for="objetivosEspecificos">Objetivos especificos</label>
                  <textarea class="form-control" rows="3" name="objetivosEspecificos" required><?= $plan[3] ?></textarea>
                </div>
                <div class="form-group">

                  <label for="tablaAlineamientos">
                    Alineamiento de la auditoría a la estrategia del negocio
                    <div class='btn btn-success' id="btnNuevoAlineamiento">Nuevo</div>
                  </label>                  
                  <table class='table table-bordered table-hover' id="tablaAlineamientos">
                    <tr>
                      <th>Estrategia</th>
                      <th>Alineamiento</th>
                      <th>Opciones</th>
                    </tr>
                    <?php for($i=0; $i<sizeof($estrategias); ++$i) { ?>
                    <tr>
                      <td><input type="text" class="form-control" name="estrategias[]" value="<?= $estrategias[$i][0] ?>"></td>
                      <td><input type="text" class="form-control" name="alineamientos[]"  value="<?= $alineamientos[$i][0] ?>"></td>
                      <td class="text-center">
                        <div class='btn btn-primary'>Guardar</div>
                        <div class='btn btn-danger'>Eliminar</div>
                      </td>
                    </tr>
                    <?php } ?>
                  </table>

                </div>  
                <div class="form-group">
                  <label for="alcance">Alcance</label>
                  <input type="text" class="form-control" name="alcance" value="<?= $plan[4] ?>" required>
                </div>                  
                <div class="form-group">

                  <label for="tablaAclaraciones">
                    Aclaraciones
                    <div class='btn btn-success' id="btnNuevaAclaracion">Nueva</div>
                  </label>
                  <table class='table table-bordered table-hover' id="tablaAclaraciones">
                    <tr>
                      <th>Sí se realizará</th>
                      <th>No se realizará</th>
                      <th>Opciones</th>
                    </tr>
                    <?php for($i=0; $i<sizeof($aclaraciones_si); ++$i) { ?>
                    <tr>
                      <td><input type="text" class="form-control" name="aclaraciones_si[]" value="<?= $aclaraciones_si[$i][0] ?>"></td>
                      <td><input type="text" class="form-control" name="aclaraciones_no[]"  value="<?= $aclaraciones_no[$i][0] ?>"></td>
                      <td class="text-center">
                        <div class='btn btn-primary'>Guardar</div>
                        <div class='btn btn-danger'>Eliminar</div>
                      </td>
                    </tr>
                    <?php } ?>
                  </table>                 

                </div>  
                <div class="form-group">
                  <label for="limitaciones">Limitaciones</label>
                  <textarea class="form-control" rows="3" name="limitaciones"><?= $plan[5] ?></textarea>
                </div>  
                <div class="form-group">

                  <label for="tablaProyectos">
                    Plan de proyectos
                    <div class='btn btn-success' id="btnNuevoProyecto">Nueva</div>
                  </label>
                  <table class='table table-bordered table-hover' id="tablaProyectos">
                    <tr>
                      <th>Tarea</th>
                      <th>Inicio</th>
                      <th>Fin</th>
                      <th>Responsable</th>
                      <th>Opciones</th>
                    </tr>
                    <?php for($i=0; $i<sizeof($tareas); ++$i) { ?>
                    <tr>
                      <td><input type="text" class="form-control" name="tareas[]" value="<?= $tareas[$i][0] ?>"></td>
                      <td><input type="date" class="form-control" name="inicios[]"  value="<?= $inicios[$i][0] ?>"></td>
                      <td><input type="date" class="form-control" name="fines[]"  value="<?= $fines[$i][0] ?>"></td>
                      <td>
                        <select name="responsables[]" class="form-control">
                          <?php foreach ($auditores as $auditor): ?>
                          <option value="<?= $auditor[0] ?>" <?php if($auditor[0]==$responsables[$i][0]) echo "selected"; ?>><?= $auditor[4] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </td>
                      <td class="text-center">
                        <div class='btn btn-danger'>Eliminar</div>
                      </td>
                    </tr>
                    <?php } ?>
                  </table>                 

                </div>  
                <div class="form-group">
                  <label for="entregables">Entregables</label>
                  <textarea class="form-control" rows="3" name="entregables"><?= $plan[6] ?></textarea>
                </div>                  
                <div class="form-group">

                  <label for="tablaAclaraciones">
                    Entrevistados
                    <div class='btn btn-success' id="btnNuevoEntrevistado">Nuevo</div>
                  </label>
                  <table class='table table-bordered table-hover' id="tablaEntrevistados">
                    <tr>
                      <th>Nombre</th>
                      <th>Cargo</th>
                      <th>Opciones</th>
                    </tr>
                    <?php for($i=0; $i<sizeof($entrevistados); ++$i) { ?>
                    <tr>
                      <td><input type="text" class="form-control" name="entrevistados[]" value="<?= $entrevistados[$i][0] ?>"></td>
                      <td><input type="text" class="form-control" name="cargos[]"  value="<?= $cargos[$i][0] ?>"></td>
                      <td class="text-center">
                        <div class='btn btn-primary'>Guardar</div>
                        <div class='btn btn-danger'>Eliminar</div>
                      </td>
                    </tr>
                    <?php } ?>
                  </table>                 

                </div>                                                                       
                <button type="submit" class="btn btn-md btn-success pull-right">Guardar datos</button>
              </form>
            </div>
          </div>
        </div>
      </div>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <script src="../js/edicion-plan.js"></script>
  </body>
</html>
