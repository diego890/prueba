<?php
include ('../scripts/funciones.php');

if( ! haIniciadoSesion() )
  header('Location: ../index.php');

$planes = getTodosPlanes();
$auditores = getAuditores();
$roles = getRoles();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Asignar rol</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">

    <!-- Custom styles for this template -->
    <link href="../css/theme.css" rel="stylesheet">

  </head>

  <body role="document">

    <?php require 'menuAdmin.php'; ?>

    <div class="container theme-showcase" role="main">

      <div class="page-header">
        <h3>Formulario de asignación</h3>
      </div>
      <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h2 class="panel-title">Datos de la asignación</h2>
            </div>
            <div class="panel-body">
              <form method="POST" action="../scripts/asignar-rol.php">
    
                <div class="form-group">
                  <label for="id_plan">Seleccione plan de auditoria</label>
                  <select name="id_plan" class="form-control" required>
                    <option value=""></option>
                    <?php foreach ($planes as $plan): ?>
                      <option value="<?= $plan[0] ?>"><?= $plan[2] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="username">Seleccione auditor</label>
                  <select name="username" class="form-control" required>
                    <option value=""></option>
                    <?php foreach ($auditores as $auditor): ?>
                      <option value="<?= $auditor[0] ?>"><?php echo $auditor[3]." ".$auditor[4] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                         
                <div class="form-group">
                  <label for="rol">Seleccione rol</label>
                  <select name="rol" class="form-control" required>
                    <option value=""></option>
                    <?php foreach ($roles as $rol): ?>
                      <option value="<?= $rol[0] ?>"><?= $rol[0] ?></option>
                    <?php endforeach ?>
                  </select>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
</html>
