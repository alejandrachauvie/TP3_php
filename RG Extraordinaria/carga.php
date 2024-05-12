
<?php
session_start();

 if(empty( $_SESSION['Nombre'])){
  header('Location: CerrarSesion.php');
  exit;
 }

 require_once 'Funciones/conectar.php';
 $MiConeccion= ConeccionBD();

 require_once 'Funciones/Validaciones.php';
 require_once 'Funciones/solicitudes.php';
 

 $Msj='';
 $Msj2='';
 if(!empty($_POST['Guardar'])){
  $Msj=ValidacionesInfo();
  if(empty($Msj)){
    if(Solicitud($MiConeccion) != false){
      $Msj2='Registro Guardado';
    }

  }

 }

?>
<?php require_once 'Funciones/head.php' ?>
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
          <h1><i class="fa fa-edit"></i> Registra aqui tu solicitud</h1>
          <p>Detalla lo mas que puedas para que un encargado pueda asesorarte.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item"><a href="#">Registro</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Ingresa los datos solicitados</h3>
            <div class="bs-component">
            <?php if(!empty($Msj)) { ?>
                <div class="alert alert-dismissible alert-danger">
                  <strong><?php echo $Msj ?></strong>
                </div>
                <?php } ?>
              </div>
              <div class="bs-component">
              <?php if(!empty($Msj2)) { ?>
                <div class="alert alert-dismissible alert-success">
                  <strong><?php echo $Msj2 ?></strong>
                </div>
                <?php } ?>
              </div>
              <div class="bs-component">
              <?php if(empty($Msj2)) { ?>
                <div class="alert alert-dismissible alert-info">
                  <strong>Los campos con <i class="fa fa-asterisk" aria-hidden="true"></i> son obligatorios</strong>
                </div>
                <?php } ?>
              </div>
            <div class="tile-body">
               <form role="form" method="post">
              <div class="form-group">
                <label class="control-label">Título</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                  <input class="form-control" type="text" name="titulo" id="Titulo" value="<?php echo !empty($_POST['titulo'])? $_POST['titulo']:'';  ?>">
                </div>
                
                <div class="form-group">
                  <label class="control-label">Descripción de solicitud <i class="fa fa-asterisk" aria-hidden="true"></i></label>
                  <textarea class="form-control" rows="4" name="detalle" id="Detalle"  value="<?php echo !empty($_POST['detalle'])? $_POST['detalle']:'';  ?>" placeholder="Ingresa los detalles..."></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label">Tipo de solicitud</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                  
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="tipo" value= 1 >Desarrollo Nuevas funcionalidades
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio"name="tipo" value= 2 >Soporte Tecnico
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="tipo" value= 3  >Reporte de error
                    </label>
                  </div>
                </div>
               <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="Guardar" value="guardar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="index.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>
            </div>
            </form>
          </div>
        </div>
        
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