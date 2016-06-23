<?php
include ('../scripts/funciones.php');

if( ! haIniciadoSesion() )
  header('Location: ../index.php');

if(isset($_GET['id']))
{
  $plan = getPlan($_GET['id']);
  if(!isset($plan))
    header('Location: 404.php');   

  $criterios = getCriterios($_GET['id']);
}
else header('Location: empresas.php');
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Criterios de evaluación del plan seleccionado</title>

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
        <h3>Criterios de evaluación del plan #<?= $_GET['id'] ?></h3>
      </div>
      <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h2 class="panel-title">Datos del plan</h2>
            </div>
            <div class="panel-body">
              <form method="POST" action="../scripts/editar-criterios.php">
                <div class="form-group">
                  <label for="id">ID del Plan</label>
                  <input type="text" class="form-control" name="id" value="<?= $plan[0] ?>" readonly>
                   <input type="text" class="form-control" name="empresa" value="<?= $plan[1] ?>" readonly>
                </div>      
                
                <div class="form-group">

                  <label for="tablaAlineamientos">
                    Lista de criterios de evaluación
                    <div class='btn btn-success' id="btnNuevoCriterio">Agregar</div>
                  </label>                  
                  <table class='table table-bordered table-hover' id="tablaCriterios">
                    <tr>
                      <th>Criterio</th>
                      <th>Opciones</th>
                    </tr>
                    <?php for($i=0; $i<sizeof($criterios); ++$i) { ?>
                    <tr>
                      <td><input type="text" class="form-control" name="criterios[]"  value="<?= $criterios[$i][2] ?>"></td>
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
