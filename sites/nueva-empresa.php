<?php
include ('../scripts/funciones.php');

if( ! haIniciadoSesion() )
  header('Location: ../index.php');
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registrar nueva empresa</title>

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
        <h3>Formulario de registro para una nueva empresa</h3>
      </div>
      <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h2 class="panel-title">Datos de la empresa a auditar</h2>
            </div>
            <div class="panel-body">
              <form method="POST" action="../scripts/nueva-empresa.php">
    
                <div class="form-group">
                  <label for="razonSocial">Razón social</label>
                  <input type="text" class="form-control" name="razonSocial" placeholder="Razón social" required>
                </div>
                <div class="form-group">
                  <label for="giroNegocio">Giro de negocio</label>
                  <input type="text" class="form-control" name="giroNegocio" placeholder="Giro de negocio" required>
                </div>
                <div class="form-group">
                  <label for="ubicacion">Ubicación</label>
                  <input type="text" class="form-control" name="ubicacion" placeholder="Ubicación" required>
                </div>
                <div class="form-group">
                  <label for="realidadProblematica">Realidad problemática</label>
                  <textarea class="form-control" rows="3" name="realidadProblematica" required></textarea>
                </div>                
                <div class="form-group">
                  <label for="mision">Misión</label>
                  <textarea class="form-control" rows="3" name="mision" placeholder="Misión" required></textarea>
                </div>  
                <div class="form-group">
                  <label for="vision">Visión</label>
                  <textarea class="form-control" rows="3" name="vision" placeholder="Visión" required></textarea>
                </div>  
                <div class="form-group">
                  <label for="estrategias">Estrategias</label>
                  <textarea class="form-control" rows="3" name="estrategias" placeholder="Estrategias" required></textarea>
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
