<?php

require_once __DIR__ . "/../Modelo/ClienteBD.php";



/**
 * Description of formModificarCliente
 *
 * @author 2GDAW05
 */
class formModificarCliente {
    
    public static function modificacionCliente($id){
        
        
        ClienteBD::getClientes();
        $clientes = $_SESSION["clientes"];
        $c = Controlador::buscarClientePorID($id);
        
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
            
            <title>Modificacion Cliente</title>
        </head>
        
        
        <body class="fixed-nav sticky-footer bg-dark" id="page-top">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="#">PROYECTO: Gestión de incidencias</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Principal">
            <form action="../Controlador/router.php" method="post">
                <input type="hidden" name="volver" value="volver">
          <a class="nav-link" href="#" onclick="this.parentNode.submit()">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Pagina Principal</span>
          </a>
            </form>  
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Registro">
            
            <form action="../Controlador/router.php" method="post">

                <input type="hidden" name="botonregistro" value="Registro de incidencias">
          <a class="nav-link" href="#" onclick="this.parentNode.submit()">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Registro Incidencias</span>
          </a>
            </form>
            
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Listado">
            
            <form action="../Controlador/router.php" method="post">
                
                <input type="hidden" name="listado" value="Listado de incidencias">
          <a class="nav-link" href="#" onclick="this.parentNode.submit()">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Listado Incidencias</span>
          </a>
            </form>
        </li>
       
      </ul>
        
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Cerrar Sesión</a>
        </li>
      </ul>
    </div>
  </nav> 
    
    <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a>Principal</a>
        </li>
        <li class="breadcrumb-item">
          <a>Listado</a>
        </li>
        <li class="breadcrumb-item active">ModificarCliente</li>
      </ol>

        <h1>Modificacion del Cliente asignado</h1>
      <hr>
      
      <div class="container">
           <div class="card mx-auto mt-5">
                    
               <div class="card-body">
                   <form action="/ProyectoIncidencias/Controlador/router.php" method="post">
                       
                       <div class="form-group">
                            <label for="exampleInputEmail1">Nombre</label>
                            <input class="form-control" type="text" name="nombre" value="<?= $c->getNombre(); ?>" required>
                        </div>
                       
                       <div class="form-group">
                            <label for="exampleInputEmail1">Direccion</label>
                            <input class="form-control" type="text" name="direccion" value="<?= $c->getDireccion(); ?>" required>
                        </div>
                       
                       
                       <div class="form-group">
                            <label for="exampleInputEmail1">Correo</label>
                            <input class="form-control" type="text" name="correo" value="<?= $c->getCorreo(); ?>" required>
                        </div>
                       
                       <br>
                            <input type="hidden" name="id_cliente" value="<?= $c->getId_cliente();?>">
                            <input class="btn btn-success btn-block" type="submit" name="modificarCliente" value="Modificar">
                            <input class="btn btn-danger btn-block" type="submit" name="volverAlListado" value="Volver">
                       
                       
                       
                   </form>
                   
               </div>
               
           </div>   
          
      </div>
      
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Proyecto Incidencias 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Estas seguro que quieres cerrar sesion</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Selecciona "Salir" para cerrar la sesion actual.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <form action="../Controlador/router.php" method="post">
                <input type="hidden" name="sesioncerrar" value="Cerrar Sesión">
            <a class="btn btn-primary" href="#" onclick="this.parentNode.submit()">Salir</a>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <script src="/ProyectoIncidencias/Vista/estilos/vendor/jquery/jquery.min.js"></script>
    <script src="/ProyectoIncidencias/Vista/estilos/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="/ProyectoIncidencias/Vista/estilos/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="/ProyectoIncidencias/Vista/estilos/js/sb-admin.min.js"></script>    
            
            
            
            
            
            
            
            
            
        

       

            
            
        

        <br>
        
        </body>
        </html>

        <?php

    }
    
    
    
}

?>
        
        
 
