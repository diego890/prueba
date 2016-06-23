<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nuevo auditor</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
  </head>

  <body role="document">
    <?php require 'menuAdmin.php'; ?>

    <div class="container theme-showcase" role="main">

      <div class="row">

        <div class="col-sm-offset-1 col-sm-10">
          <header>
            <h2>Ingrese datos del nuevo auditor</h2>
          </header>
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h2 class="panel-title">Datos de auditor</h2>
            </div>
            <div class="panel-body">
              <form method="POST" action="../scripts/nuevo-auditor.php">
                <div class="form-group">
                  <label for="usuario">Nombre de usuario</label>
                  <input type="text" class="form-control" name="usuario" placeholder="Usuario" required>
                </div>
                <div class="form-group">
                  <label for="clave">Contraseña</label>
                  <input type="password" class="form-control" name="clave" placeholder="Contraseña" required>
                </div>                
                <div class="form-group">
                  <label for="DNI">DNI</label>
                  <input type="text" class="form-control" name="DNI" placeholder="Documento nacional de identidad" required>
                </div>
                <div class="form-group">
                  <label for="nombres">Nombres</label>
                  <input type="text" class="form-control" name="nombres" placeholder="Nombres" required>
                </div>
                <div class="form-group">
                  <label for="apellidos">Apellidos</label>
                  <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" required>
                </div>  
                <div class="form-group">
                  <label for="direccion">Dirección</label>
                  <input type="text" class="form-control" name="direccion" placeholder="Dirección" required>
                </div>  
                <div class="form-group">
                  <label for="telefono">Teléfono</label>
                  <input type="text" class="form-control" name="telefono" placeholder="Teléfono" required>
                </div>  
                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="text" class="form-control" name="email" placeholder="E-mail" required>
                </div>      
                <div class="form-group">
                  <label for="email">Sexo</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="sexo" value="H" checked>
                      Hombre
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="sexo" value="M">
                      Mujer
                    </label>
                  </div>
                </div>  
                <button type="submit" class="btn btn-md btn-success pull-right">Registrar auditor</button>
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
