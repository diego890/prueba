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

    <title>Datos de auditor</title>

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
        <h3>Edición de sus datos como auditor</h3>
      </div>
      <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h2 class="panel-title">Datos de auditor</h2>
            </div>
            <div class="panel-body">
              <form method="POST" action="../scripts/editar-datos.php">
                <div class="form-group">
                  <label for="usuario">Nombre de usuario</label>
                  <input type="text" class="form-control" id="usuario" value="<?= $_SESSION['usuario'] ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="DNI">DNI</label>
                  <input type="text" class="form-control" name="DNI" value="<?= $_SESSION['DNI'] ?>" placeholder="Documento nacional de identidad" required>
                </div>
                <div class="form-group">
                  <label for="nombres">Nombres</label>
                  <input type="text" class="form-control" name="nombres" value="<?= $_SESSION['nombres'] ?>" placeholder="Nombres" required>
                </div>
                <div class="form-group">
                  <label for="apellidos">Apellidos</label>
                  <input type="text" class="form-control" name="apellidos" value="<?= $_SESSION['apellidos'] ?>" placeholder="Apellidos" required>
                </div>  
                <div class="form-group">
                  <label for="direccion">Dirección</label>
                  <input type="text" class="form-control" name="direccion" value="<?= $_SESSION['direccion'] ?>" placeholder="Dirección" required>
                </div>  
                <div class="form-group">
                  <label for="telefono">Teléfono</label>
                  <input type="text" class="form-control" name="telefono" value="<?= $_SESSION['telefono'] ?>" placeholder="Teléfono" required>
                </div>  
                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="text" class="form-control" name="email" value="<?= $_SESSION['email'] ?>" placeholder="E-mail" required>
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
