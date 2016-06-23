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

    <title>Panel de Administración</title>

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
        <h1>Bienvenido, <?= $_SESSION['nombres'] ?></h1>
        <p>Bienvenido a su panel de administración. Desde esta sección, usted como administrador podrá administrar roles y perfiles, registrar nuevos auditores y asignar roles a los auditores según los planes.</p>
      </div>

      <div class="page-header">
        <h3>Sus datos personales</h3>
      </div>
      <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h2 class="panel-title">Datos de auditor</h2>
            </div>
            <div class="panel-body">
              <p><strong>Nombre de usuario: </strong><?= $_SESSION['usuario'] ?></p>
              <p><strong>DNI: </strong><?= $_SESSION['DNI'] ?></p>
              <p><strong>Nombres: </strong><?= $_SESSION['nombres'] ?></p>
              <p><strong>Apellidos: </strong><?= $_SESSION['apellidos'] ?></p>
              <p><strong>Dirección: </strong><?= $_SESSION['direccion'] ?></p>
              <p><strong>Teléfono: </strong><?= $_SESSION['telefono'] ?></p>
              <p><strong>E-mail: </strong><?= $_SESSION['email'] ?></p>
              <p><strong>Sexo: </strong><?= ($_SESSION['sexo']=='H')?'Hombre':'Mujer' ?></p>
            </div>
          </div>
          <p>
            <a href="roles.php" class="btn btn-lg btn-primary">Administrar roles</a>
            <a href="asignar-rol.php" class="btn btn-lg btn-default">Asignar roles</a>
            <a href="nuevo-auditor.php" class="btn btn-lg btn-success pull-right">Registrar auditor</a>
          </p>          
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
