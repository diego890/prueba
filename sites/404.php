<?php
include ('../scripts/funciones.php');

if( ! haIniciadoSesion() )
  header('Location: ../index.php');

$empresas = getEmpresas();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Listado de empresas</title>

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

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>404 NOT FOUND</h1>
        <p>Lamentablemente el apartado al que usted ha intentado acceder no existe. Si llegó aquí por un enlace del mismo sitio, por favor contacte con el administrador.</p>
      </div>

      <div class="page-header">
        <h3>Sitio no encontrado</h3>        
      </div>
      <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
          <div class="alert alert-danger" role="alert">
            <strong>A tener en cuenta!</strong> Si intentas hacer daño al sitio web podrías resultar luego gravemente afectado.
          </div>
        </div><!-- /.col-sm-4 -->
      </div>      


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
</html>
