<?php
include ('../scripts/funciones.php');

if( ! haIniciadoSesion() )
  header('Location: ../index.php');

if(isset($_GET['id']))
{ 
  $rol = getRol($_GET['id'])[0];
  if(!isset($rol))
    header('Location: 404.php'); 
}
else header('Location: roles.php');

// var_dump($rol[0]); exit;
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rol <?= $rol[0] ?></title>

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

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h2>Nombre del rol: <?= $rol[0] ?></h2>
      </div>

      <div class="page-header">
        <h3>Datos del rol</h3>
      </div>
      <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h2 class="panel-title">Perfil del rol</h2>
            </div>
            <div class="panel-body">
              <p><strong>Perfil:</strong> <?= $rol[1] ?>.</p>
            </div>
          </div>
          <p>
            <a href="editar-rol.php?id=<?= $_GET['id'] ?>" class="btn btn-lg btn-primary pull-right">Editar datos</a>
          </p>          
        </div>
      </div>
      
        </div><!-- /.col -->
      </div>      

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
</html>
