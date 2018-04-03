<?php

/**
 * Description of formLogin
 *
 * @author 2GDAW05
 */

class formLogin {
    //put your code here
    
       public static function fInicio($error='') {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            
            <!-- Bootstrap core CSS-->
        <link href="/ProyectoIncidencias/Vista/estilos/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
        <link href="/ProyectoIncidencias/Vista/estilos/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
        <link href="/ProyectoIncidencias/Vista/estilos/css/sb-admin.css" rel="stylesheet">
            
            <title>Login</title>
        </head>

        <body class="bg-dark">
            <div class="container">
                <div class="card card-login mx-auto mt-5">
                    <div class="card-header">INICIAR SESIÓN</div>
                    <div class="card-body">
                    
                    <form action="/ProyectoIncidencias/Controlador/router.php" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre de usuario</label>
                            <input class="form-control" type="text" name="nombre" aria-describedby="emailHelp" placeholder="Introduce usuario">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input class="form-control" type="password" name="contrasena" placeholder="Contraseña">
                        </div>
                        
                        <input class="btn btn-primary btn-block" type="submit" name="entrar" value="ENTRAR">

                    </form>

                    <br>

                    <?php echo $error; ?>

                </div>
            </div>
          </div>     
        <!-- Bootstrap core JavaScript-->
  <script src="/ProyectoIncidencias/Vista/estilos/vendor/jquery/jquery.min.js"></script>
  <script src="/ProyectoIncidencias/Vista/estilos/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="/ProyectoIncidencias/Vista/estilos/vendor/jquery-easing/jquery.easing.min.js"></script>
        </body>
        </html>

        <?php

    }

}

?>