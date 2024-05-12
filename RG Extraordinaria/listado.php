<?php
session_start();

 if(empty( $_SESSION['Nombre'])){ header('Location: CerrarSesion.php');
  exit;
 }

 require_once 'Funciones/conectar.php';
 $MiConeccion= ConeccionBD();

 require_once 'Funciones/actualizarListado.php';
 $ListarActualizaciones=Actualizar_Lista($MiConeccion);
 $TotalListado=count($ListarActualizaciones);

//require_once 'Funciones/eliminarRegistro.php';

 if (empty($ListarActualizaciones)){
 $_SESSION['Mensaje']=" No tiene registros "; 
 $_SESSION['Estilo']="info";
 }
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->   
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Listado - Vali Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.php">Mi Panel</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have 4 new notifications.</li>
            <div class="app-notification__content">
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Lisa sent you a mail</p>
                    <p class="app-notification__meta">2 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Mail server not working</p>
                    <p class="app-notification__meta">5 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Transaction complete</p>
                    <p class="app-notification__meta">2 days ago</p>
                  </div></a></li>
              <div class="app-notification__content">
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Lisa sent you a mail</p>
                      <p class="app-notification__meta">2 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Mail server not working</p>
                      <p class="app-notification__meta">5 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Transaction complete</p>
                      <p class="app-notification__meta">2 days ago</p>
                    </div></a></li>
              </div>
            </div>
            <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
          </ul>
        </li>
        <!-- User Menu-->
        <?php require_once 'Funciones/menuUsuario.php' ?>
    </header>
    <!-- Sidebar menu-->
    <?php require_once 'Funciones/lateral.php'; ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Listados</h1>
          <?php if( $_SESSION['Nombre_Rol']=='Administrador')  { ?>
          <!-- si es administrador vera este titulo-->
          <p>Listado total de solicitudes</p>
          <?php } elseif( $_SESSION['Nombre_Rol']=='Usuario Normal'){ ?>
          
          <!-- si es usuario normal vera este titulo--->
          <p>Listado de mis solicitudes cargadas</p> 
          <?php } else{ ?>
          <!-- si es analista o tecnico vera este titulo -->
          <p>Listado de solicitudes cargadas</p>
          <?php } ?>

        </div>
       
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active"><a href="#">Listado de Solicitudes</a></li>
        </ul>
      </div>
      <div class="row">
      
        
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title"> Solicitudes  <?php echo $TotalListado ; ?></h3>
            <div class="table-responsive">
            <div class="panel-body">
          
              </div>
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Tipo</th>
                    <th>Registro</th>
                    <th>Fecha estimada</th>
                    <th>Solicitante</th>
                    <th>Opciones</th>

                  </tr>
                </thead>
                <tbody>
                <?php for($i=0; $i<$TotalListado; $i++){ ?>
                  <tr class="table-<?php echo $ListarActualizaciones[$i]['TIPOD'];  ?>">
                    <td><?php echo $ListarActualizaciones[$i]['IDENTIFICADOR'];  ?></td>
                    <td><?php echo $ListarActualizaciones[$i]['TITULO'];  ?></td>
                    <td><?php echo $ListarActualizaciones[$i]['DESCRIPCION'];  ?></td>
                    <td><?php echo $ListarActualizaciones[$i]['TIPODESCRIPCION'];  ?></td>
                    <td><?php echo $ListarActualizaciones[$i]['ENTREGA'];  ?></td>
                    <td><?php echo $ListarActualizaciones[$i]['RESOLUCION'];  ?></td>
                    <td><?php echo $ListarActualizaciones[$i]['NOMBRE'].''.$ListarActualizaciones[$i]['APELLIDO'];  ?></td>
                    <td>
                      <a href="#">Ver detalles...</a>
                      <?php if( $_SESSION['Nombre_Rol']=='Soporte Tecnico'  OR $_SESSION['Nombre_Rol']=='Analista' )    { ?>
                      <a href="#"><i class="app-menu__icon fa fa-cog"></i>Modificar...</a>
                      <?php } else{ ?>
                      <a href="eliminarRegistro.php?Id_solicitud=<?php echo $ListarActualizaciones[$i]['IDENTIFICADOR'];  ?>" 
                      class="app-menu__icon fa fa-cog" title="Eliminar"
                      onclick="if (confirm('Confirma eliminar esta consulta?'))
                       {return true;} 
                       else {return false;}">
                    </i>Eliminar...</a>
                                                              <?php } ?>
                    </td>
                  </tr>
                  <?php } ?>
               </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    
  </body>
</html>