<?php
include ('../scripts/funciones.php');

if( ! haIniciadoSesion() )
  header('Location: ../index.php');

if(isset($_GET['id']))
{ 
  $empresa = getEmpresa($_GET['id']);
  if(!isset($empresa))
    header('Location: 404.php'); 
  $planes = getPlanes($_GET['id']);
}
else header('Location: ../index.php');

// var_dump($empresa[0]); exit;
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Empresa <?= $empresa[1] ?></title>

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
        <h2>Empresa: <?= $empresa[1] ?></h2>
      </div>

      <div class="page-header">
        <h3>Datos de la empresa</h3>
      </div>
      <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h2 class="panel-title">Datos de la empresa</h2>
            </div>
            <div class="panel-body">
              <p><strong>Razón social:</strong> <?= $empresa[1] ?>.</p>
              <p><strong>Giro de negocio:</strong> <?= $empresa[2] ?>.</p>
              <p><strong>Ubicación:</strong> <?= $empresa[3] ?>.</p>
              <p><strong>Realidad problemática:</strong> <?= $empresa[4] ?>.</p>
              <p><strong>Misión:</strong> <?= $empresa[5] ?>.</p>
              <p><strong>Visión:</strong> <?= $empresa[6] ?>.</p>
              <p><strong>Estrategias:</strong> <?= $empresa[7] ?>.</p>
              <p><strong>Organigrama:</strong> <a href="../imagenes/organigramas/<?= $empresa[8] ?>" target="_blank">Clic para ver</a></p>
            </div>
          </div>
          <p>
            <a href="editar-empresa.php?id=<?= $_GET['id'] ?>" class="btn btn-lg btn-primary pull-right">Editar datos</a>
          </p>          
        </div>
      </div>
      
      <div class="page-header">
        <h3>Planes de auditoría</h3>
      </div>
      <div class="row">
        <div class="col-sm-offset-1 col-sm-10">

          <?php foreach($planes as $plan): ?>
          <div class="panel panel-success">
            <div class="panel-heading">
              <h2 class="panel-title">Datos del plan #<?= $plan[0] ?> - Rol: <?= getNombreRol($plan[0]) ?></h2>
            </div>
            <div class="panel-body">
              <p><strong>Objetivo general:</strong> <?= $plan[2] ?></p>
              <p><strong>Objetivos específicos:</strong> <?= $plan[3] ?></p>
              <p><strong>Alcance:</strong> <?= $plan[4] ?></p>
              <p><strong>Limitaciones:</strong> <?= $plan[5] ?></p>
              <p><strong>Entregables:</strong> <?= $plan[6] ?></p>
              <div class="btn-group pull-right" role="group">
                <a href="editar-plan.php?id=<?= $plan[0] ?>" class="btn btn-md btn-primary">Click para editar plan</a>
              </div>              
            </div>
            <div class="panel-body">
              <p><strong>Normativa internacional:</strong> <?= $plan[7] ?></p>
              <p><strong>Normativa nacional:</strong> <?= $plan[8] ?></p>
              <p><strong>Normativa institucional:</strong> <?= $plan[9] ?></p>
              <div class="btn-group pull-right" role="group">
                <a href="editar-normativa.php?id=<?= $plan[0] ?>" class="btn btn-md btn-primary">Editar normativa</a>
              </div>
            </div>
            <div class="panel-body">
              <p><strong>Pruebas de cumplimiento y pruebas sustantivas.</strong></p>
              <?php 
                $pruebas = getPruebas($plan[0]); 
                foreach ($pruebas as $prueba):
              ?>
              <p>- <?= $prueba[2] ?> (Institución: <?= $prueba[3] ?> | Inicio: <?= $prueba[5] ?> | Fin: <?= $prueba[6] ?>)</p>
              <?php endforeach; ?>
              <div class="btn-group pull-right" role="group">
                <a href="nueva-prueba.php?id=<?= $plan[0] ?>" class="btn btn-md btn-primary">Registrar prueba</a>
              </div>
            </div> 
            <div class="panel-body">
              <p><strong>Criterios de evaluación.</strong></p>
              <?php 
                $criterios = getCriterios($plan[0]); 
                foreach ($criterios as $criterio):
              ?>
              <p>- <?= $criterio[2] ?></p>
              <?php endforeach; ?>              
              <div class="btn-group pull-right" role="group">
                <a href="editar-criterios.php?id=<?= $plan[0] ?>" class="btn btn-md btn-primary">Gestionar criterios</a>
              </div>
            </div>                            
          </div>
          <?php endforeach; ?>    
        </div>           
      </div>

      <p>
        <a href="nuevo-plan.php?id=<?= $empresa[0] ?>" class="btn btn-lg btn-success pull-right">Nuevo plan de auditoría</a>
      </p>         
           

      <div class="page-header">
        <h3>Ejecución de la auditoría</h3>
      </div>
      <div class="row">
        <div class="col-sm-offset-1 col-sm-10">

          <div class="panel panel-success">
            <div class="panel-heading">
              <h2 class="panel-title">Cuestionario</h2>
            </div>
            <div class="panel-body">
              <form action="../sites/responder-prueba.php" method="GET">
              <input type="hidden" name="empresa" value="<?= $empresa[0] ?>">
                <p><strong>Seleccione plan de auditoría:</strong></p>
                <select id="cboPlanes" class="form-control" name="plan">
                  <option value=""></option>
                  <?php foreach($planes as $plan): ?>
                      <option value="<?= $plan[0] ?>"><?= $plan[2] ?></option>
                  <?php endforeach; ?>
                </select>
                 <p><strong>Seleccione prueba de cumplimiento:</strong></p>
                <select id="cboPruebas" class="form-control" name="prueba">
                  
                </select>
                <br>
                <div class="btn-group pull-right" role="group">
                  <button type="submit" class="btn btn-md btn-primary">Responder cuestionario</a>
                </div>      

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
    <script src="../js/cargar-cbo-pruebas.js"></script>
  </body>
</html>
