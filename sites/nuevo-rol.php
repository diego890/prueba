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

    <title>Registrar nuevo rol</title>

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
        <h3>Formulario de registro para un nuevo rol</h3>
      </div>
      <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h2 class="panel-title">Datos del rol para auditores</h2>
            </div>
            <div class="panel-body">
              <form method="POST" action="../scripts/nuevo-rol.php">
    
                <div class="form-group">
                  <label for="rol">Nombre del rol</label>
                  <input type="text" class="form-control" name="rol" placeholder="Nombre del rol" required>
                </div>
                <div class="form-group">
                  <label for="perfil">Perfil</label>
                  <textarea class="form-control" rows="3" name="perfil" required></textarea>
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
