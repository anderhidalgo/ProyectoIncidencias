<?php

require_once __DIR__ . "/../Modelo/HistoricoBD.php";
require_once __DIR__ . "/../Modelo/Incidencia.php";
require_once __DIR__ . "/../Modelo/Historico.php";
require_once __DIR__ . "/../Controlador/router.php";

class formSeguimiento {

    public static function historico ($id_incidencia){
        
        $tecnicoLogeado = unserialize($_SESSION["tecnico"]);
        $idtecnico = $tecnicoLogeado->getId_tecnico();

        $historicos = Controlador::getHistoricoByIdIncidencia($id_incidencia, $idtecnico);
        //var_dump($historicos[0]->getTecnico()); die();


        ?>

        <!DOCTYPE html>
<html>
<head>
    
    <meta charset="UTF-8">
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
  
    <title>Seguimiento</title>
    
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
        <li class="breadcrumb-item active">Seguimiento</li>
      </ol>

      <h1 align="center">EVOLUCIÓN / HISTÓRICO de la INCIDENCIA <?= $id_incidencia?></h1>
    <?php if (count($historicos) > 0){   ?>
    <h4 align="center">Descripción breve de la incidencia: </h4>
        <p align="center"><?= $historicos[0]->getIncidencia()->getDesc_breve() ?></p>
      
      <div class="card mb-3">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  
                <thead>
                    <tr> 
                    
                    <th>ID Histórico</th>
                    <th>Anotación</th>
                    <th>Fecha | Hora</th>
                    <th>Técnico</th>
        
                    </tr>
                </thead>
                <tbody>
                    <?php 

    foreach($historicos as $h){
           $id = $h->getId_historico();
        ?>
            <tr>
                <td><?php echo $id?></td>
                <td><?php echo $h->getAnotacion()?></td>
                <td><?php echo $h->getFecha_hora()?></td>
                <td><?php echo $h->getTecnico()->getNombre()?></td>
            </tr>
            
            <?php   
        }

     ?>
    
       <?php } else {
            echo "<p align='center'>No hay historicos.</p>";
    }  ?>
           
                   
                </tbody>
                
                
            </table>
              <br>
              <b>Nueva anotación: </b><br>
        <form action="../Controlador/router.php" method="post">
        <textarea name="anotacion" style="width: 400px; height: 100px;"></textarea><br>
            <input class="btn btn-success" type="submit" name="insertAnotacion" value="Insertar anotación">
            <input type="hidden" name="id_incidencia" value="<?= $id_incidencia?>">
            <input type="hidden" name="id_tecnico" value="<?= $idtecnico?>">
        </form>

    <br>

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
