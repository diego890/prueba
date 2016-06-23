<?php
include ('../scripts/funciones.php');

if( ! haIniciadoSesion() )
  header('Location: ../index.php');

if(isset($_GET['id']))
{
  $empresa = getEmpresa($_GET['id']);
  if(!isset($empresa))
    header('Location: 404.php');   
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

  </head>

  <body role="document">

    <?php require 'menu.php'; ?>

    <div class="container theme-showcase" role="main">

      <div class="page-header">
        <h3>Registro de un nuevo plan de auditoría</h3>
      </div>
      <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h2 class="panel-title">Nuevo plan de auditoría - Empresa <?= $empresa[1] ?></h2>
            </div>
            <div class="panel-body">
              <form method="POST" action="../scripts/nuevo-plan.php">
                <div class="form-group">
                  <input type="hidden" class="form-control" name="empresa" value="<?= $_GET['id'] ?>" readonly>
                </div>              
                <div class="form-group">
                  <label for="objetivoGeneral">Objetivo general</label>
                  <input type="text" class="form-control" name="objetivoGeneral" placeholder="Objetivo general" required>
                </div>
                <div class="form-group">
                  <label for="objetivosEspecificos">Objetivos especificos</label>
                  <textarea class="form-control" rows="3" name="objetivosEspecificos" required></textarea>
                </div>
                
                <div class="form-group">
                  <label for="alcance">Alcance</label>
                  <input type="text" class="form-control" name="alcance" placeholder="Alcance" required>
                </div>                  
                 
                <div class="form-group">
                  <label for="limitaciones">Limitaciones</label>
                  <textarea class="form-control" rows="3" name="limitaciones"></textarea>
                </div>  

                <div class="form-group">
                  <label for="entregables">Entregables</label>
                  <textarea class="form-control" rows="3" name="entregables"></textarea>
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
