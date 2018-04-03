<?php

require_once __DIR__ . "/../Modelo/IncidenciaBD.php";
require_once __DIR__ . "/../Modelo/Incidencia.php";
require_once __DIR__ . "/../Controlador/Controlador.php";

class formListado {

    public static function tablaincidencias (){
        
        $incidencias = Controlador::getIncidencias();
        //$incidencias = $_SESSION['incidencias'];
        $incidenciasC = Controlador::getIncidenciasCerradas();
        //$incidenciasC = $_SESSION['incidenciasC'];
        ?>

        <!DOCTYPE html>
<html>
<head>
    
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <link href="/ProyectoIncidencias/Vista/estilos/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="/ProyectoIncidencias/Vista/estilos/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="/ProyectoIncidencias/Vista/estilos/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="/ProyectoIncidencias/Vista/estilos/css/sb-admin.css" rel="stylesheet">
  
  
    <title>Listado Incidencias</title>
    
</head>


<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="#">PROYECTO: Gestión de incidencias</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Listado">
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
        <li class="breadcrumb-item active">Listado</li>
      </ol>
      
     <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> <b>Listado de incidencias abiertas</b> </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  
                <thead>
                    <tr> 
                    <th>ID Incidencia</th>
                    <th>Descripción breve</th>
                    <th>Descripción detallada</th>
                    <th>Fecha | Hora</th>
                    <th>Prioridad</th>
                    <th>Estado</th>
                    <th>Categoria</th>
                    <th>Técnico</th>
                    <th>Cliente</th>
                    <th>Seguimiento</th>
                    <th>Cerrar Incidencia</th>
                    </tr>
                </thead>
                <tbody>
                    
                       <?php 
       foreach($incidencias as $i){
           $id = $i->getId_incidencia();
        ?>
            <tr>
                <td><?php echo $id?></td>
                <td><?php echo $i->getDesc_breve()?></td>
                <td><?php echo $i->getDesc_detallada()?></td>
                <td><?php echo $i->getFecha_hora()?></td>
                <td><?php echo $i->getPrioridad()?></td>
                <td><?php echo $i->getEstado()?></td>
                <td><?php echo $i->getCategoria()?></td>
                
<!--                //No saca los datos de tecnico y cliente en la tabla-->
                <td><?php echo $i->getTecnico()->getNombre();?><br>
                    <a href="../Controlador/router.php?modificar_tecnico=<?php echo $id ?>">Modificar Tecnico</a></td>
                <td><?php echo $i->getCliente()->getNombre();?><br>
                    <a href="../Controlador/router.php?modificar_cliente=<?php echo $id ?>">Modificar Cliente</a></td>
                
                <td><br><a href="../Controlador/router.php?seguimiento=<?php echo $id ?>">Seguimiento</a></td>
                
                <td><br><a href="../Controlador/router.php?cerrar_incidencia=<?php echo $id ?>">Cerrar Incidencia</a></td>
                
            </tr>
            
            <?php   
        }

     ?> 
                   
                </tbody>
            </table>
          </div>   
            </div>
        </div>
      </div>
                
        <hr>
        
     <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> <b>Listado de incidencias cerradas</b> </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  
                <thead>
                    <tr> 
                    <th>ID Incidencia</th>
                    <th>Descripción breve</th>
                    <th>Descripción detallada</th>
                    <th>Fecha | Hora</th>
                    <th>Prioridad</th>
                    <th>Estado</th>
                    <th>Categoria</th>
                    <th>Técnico</th>
                    <th>Cliente</th>
                    </tr>
                </thead>
                <tbody>
                    
          <?php 
       foreach($incidenciasC as $ic){
           //var_dump($i); die();
           
        ?>
            <tr>
                <td><?php echo $ic->getId_incidencia()?></td>
                <td><?php echo $ic->getDesc_breve()?></td>
                <td><?php echo $ic->getDesc_detallada()?></td>
                <td><?php echo $ic->getFecha_hora()?></td>
                <td><?php echo $ic->getPrioridad()?></td>
                <td><?php echo $ic->getEstado()?></td>
                <td><?php echo $ic->getCategoria()?></td>
                <td><?php echo $ic->getTecnico()->getNombre();?></td>
                <td><?php echo $ic->getCliente()->getNombre();?></td>
                
                
            </tr>
            
            <?php   
        }

     ?>
                   
                </tbody>
            </table>
          </div>   
            </div>
        </div>
      </div>   
        
                
      
      <!-- Blank div to give the page height to preview the fixed vs. static navbar-->
      
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
    
     <!-- Bootstrap core JavaScript-->
    <script src="/ProyectoIncidencias/Vista/estilos/vendor/jquery/jquery.min.js"></script>
    <script src="/ProyectoIncidencias/Vista/estilos/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="/ProyectoIncidencias/Vista/estilos/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="/ProyectoIncidencias/Vista/estilos/vendor/datatables/jquery.dataTables.js"></script>
    <script src="/ProyectoIncidencias/Vista/estilos/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="/ProyectoIncidencias/Vista/estilos/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="/ProyectoIncidencias/Vista/estilos/js/sb-admin-datatables.min.js"></script>
    
    
</body>
</html>
               
  <?php      
        
    }

    
}
