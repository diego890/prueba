<?php
include ('../scripts/funciones.php');

if( ! haIniciadoSesion() )
  header('Location: ../index.php');

$roles = getRoles();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Listado de roles</title>

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
        <h1>Listado de roles</h1>
        <p>En este apartado usted podrá consultar todos los roles existentes. Así, será posible editar los roles y sus correspondientes perfiles.</p>
      </div>

      <div class="page-header">
        <h3>Roles de auditores</h3>        
      </div>
      <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
          <div class="alert alert-info" role="alert">
            <strong>Para editar!</strong> Para editar un rol haz click en uno de los cuadros de información, debajo.
          </div>
          <div class="list-group">
            <?php foreach($roles as $rol): ?>
            <a href="rol.php?id=<?= $rol[0] ?>" class="list-group-item active">
              <h4 class="list-group-item-heading">Rol: <?= $rol[0] ?></h4>
              <p class="list-group-item-text">Perfil: <?= $rol[1] ?></p>
            </a>        
            <?php endforeach; ?>
            <a href="#" class="list-group-item">
              <h4 class="list-group-item-heading">Comodín</h4>
              <p class="list-group-item-text">Una de las culturas peruanas odiaba el vacío. Hemos heredado ello de nuestros ancestros !</p>
            </a>
          </div>
          <p>
            <a href="nuevo-rol.php" class="btn btn-lg btn-success pull-right">Registrar nuevo rol</a>
          </p>     
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
