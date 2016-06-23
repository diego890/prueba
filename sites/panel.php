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

    <title>Panel de Auditor</title>

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
        <h1>Bienvenido, <?= $_SESSION['nombres'] ?></h1>
        <p>Bienvenido a su panel de administración. Desde esta sección, usted como auditor podrá acceder a toda la información que necesite. Usted observará a continuación un listado de todas las empresas a las que está auditando. Luego de hacer click en alguna de ellas usted podrá visualizar todos sus planes de auditoría vigentes. Al acceder en algún plan de auditoría podrá registrar entrevistados y nuevos proyectos.</p>
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
            <a href="editar-datos.php" class="btn btn-lg btn-primary">Editar datos</a>
            <a href="empresas.php" class="btn btn-lg btn-success pull-right">Ver listado empresas</a>
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
