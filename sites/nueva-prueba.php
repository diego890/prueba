<?php
include ('../scripts/funciones.php');

if( ! haIniciadoSesion() )
  header('Location: ../index.php');

if(isset($_GET['id']))
{
  $plan = getPlan($_GET['id']);
  if(!isset($plan))
    header('Location: 404.php');   

  $entrevistados = getEntrevistadosFull($_GET['id']);
  /* $preguntas = getPreguntas($_GET['id']); NO, PORQUE ESTÁ REGISTRANDO RECIÉN */
}
else header('Location: empresas.php');
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nueva prueba de cumplimiento y sustantiva</title>

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
        <h3>Plan de auditoría: <?= $plan[2] ?></h3>
      </div>
      <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h2 class="panel-title">Nueva prueba de cumplimiento y sustantiva</h2>
            </div>
            <div class="panel-body">
              <form method="POST" action="../scripts/nueva-prueba.php">
                <div class="form-group">
                  <input type="hidden" class="form-control" name="id" value="<?= $plan[0] ?>" readonly>
                  <input type="hidden" class="form-control" name="empresa" value="<?= $plan[1] ?>" readonly>
                </div>      
                <div class="form-group">
                  <label for="nombrePrueba">Nombre:</label>
                  <input type="text" class="form-control" name="nombrePrueba" placeholder="Nombre de la prueba" required>
                </div>
                <div class="form-group">
                  <label for="institucion">Institución:</label>
                  <input type="text" class="form-control" name="institucion" placeholder="Nombre de la institución" required>
                </div>
                <div class="form-group">
                  <label for="fInicio">Fecha de inicio:</label>
                  <input type="date" class="form-control" name="fInicio" required>
                </div>                
                <div class="form-group">
                  <label for="fFin">Fecha final:</label>
                  <input type="date" class="form-control" name="fFin" required>
                </div>                                
                <div class="form-group">
                  <label for="entrevistado">Entrevistado:</label>
                  <select name="entrevistado" class="form-control" required>
                    <option value=""></option>
                    <?php foreach($entrevistados as $entrevistado): ?>
                    <option value="<?= $entrevistado[0] ?>"><?= $entrevistado[2] ?> (<?= $entrevistado[3] ?>)</option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">

                  <label for="tablaPreguntas">
                    Preguntas incluidas en la prueba
                    <div class='btn btn-success' id="btnNuevaPregunta">Agregar</div>
                  </label>                  
                  <table class='table table-bordered table-hover' id="tablaPreguntas">
                    <tr>
                      <th>Pregunta</th>
                      <th>Pasos</th>
                      <th>Opciones</th>
                    </tr>
                    <tr>
                      <td><input type="text" class="form-control" name="preguntas[]"></td>
                      <td><input type="text" class="form-control" name="pasos[]"></td>
                      <td class="text-center">
                        <div class='btn btn-primary'>Guardar</div>
                        <div class='btn btn-danger'>Eliminar</div>
                      </td>
                    </tr>
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
