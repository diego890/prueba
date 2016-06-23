<?php
include ('../scripts/funciones.php');

if( ! haIniciadoSesion() )
  header('Location: ../index.php');

if(isset($_GET['plan']))
{
  $plan = getPlan($_GET['plan']);
  if(!isset($plan))
    header('Location: 404.php');   
  $prueba = getPrueba($_GET['prueba']);
  if(!isset($prueba))
    header('Location: 404.php');   
  $empresa_id = $_GET['empresa'];
  $preguntas = getPreguntas($_GET['prueba']);
}
else header('Location: empresas.php');
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cuestionario</title>

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
        <h3>Prueba: <?= $prueba[2] ?></h3>
      </div>
      <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h2 class="panel-title">Cuestionario - Resolución de preguntas</h2>
            </div>
            <div class="panel-body">
              <form method="POST" action="../scripts/responder-prueba.php">
                <div class="form-group">
                  <input type="hidden" class="form-control" name="id" value="<?= $plan[0] ?>" readonly>
                  <input type="hidden" class="form-control" name="empresa" value="<?= $empresa_id ?>" readonly>
                </div>      

                <?php foreach($preguntas as $pregunta): ?>
                <div class="form-group">
                  <label>Pregunta:</label>
                  <p>
                    <strong>ABC</strong>
                    <input type="hidden" name="id_pruebas[]" value="<?= $pregunta[0] ?>">
                    <input type="radio" name="respuesta[]" value="S" <?php if($pregunta[4]=='S') echo "checked"; ?>>Sí
                    <input type="radio" name="respuesta[]" value="N" <?php if($pregunta[4]=='N') echo "checked"; ?>>No
                    <input type="text" class="form-control" name="observaciones[]" placeholder="Observación (opcional)" value="<?= $pregunta[5] ?>">
                  </p>
                </div>  
                <?php endforeach; ?>

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
