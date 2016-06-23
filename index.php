<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Iniciar sesión</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="scripts/iniciar-sesion.php" method="POST">
        <h2 class="form-signin-heading">Inicie sesión</h2>
        <label for="txtUser" class="sr-only">Usuario</label>
        <input type="text" name="txtUser" class="form-control" placeholder="Usuario" required autofocus>
        <label for="txtPass" class="sr-only">Contraseña</label>
        <input type="password" name="txtPass" class="form-control" placeholder="Contraseña" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Recordar
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">¡ Acceder !</button>
        <a href="#" class="btn btn-lg btn-success btn-block">Contactar administrador</a>
      </form>
	  

    </div> <!-- /container -->

  </body>
</html>

