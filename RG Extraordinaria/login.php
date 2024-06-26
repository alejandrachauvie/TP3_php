<?php
session_start();

require_once 'Funciones/conectar.php';
$MiConeccion= ConeccionBD();

if(!empty($_POST['acceder'])){
  
  require_once 'Funciones/logueo.php';
  $Usuario=Login($_POST['email'],($_POST ['clave']), $MiConeccion);

  if(!empty($Usuario)){

    $_SESSION['Id_usuario']=$Usuario['ID_USUARIO'];
    $_SESSION['Nombre']=$Usuario['NOMBRE'];
    $_SESSION['Apellido']=$Usuario['APELLIDO'];
    $_SESSION['Imagen']=$Usuario['IMAGEN'];
    $_SESSION['Email']=$Usuario['EMAIL'];
    $_SESSION['Clave']=$Usuario['CLAVE'];
    $_SESSION['Id_Rol']=$Usuario['ROL'];
    $_SESSION['Nombre_Rol']=$Usuario['TIPO_ROL'];
    $_SESSION['Fecha_Acceso']=$Usuario['FECHA_ACCESO'];
    $_SESSION['Estado']=$Usuario['ESTADO'];

    require_once 'Funciones/actualizarFecha.php';
    $FechaActual=actualizarFechas($MiConeccion);
    header('Location:index.php');
    exit;

  }
  else{
    $Mensaje2='Los datos son incorrectos';
  }
 }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->   
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Vali Admin</title>  
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Panel de administración</h1>
      </div>
      <div class="login-box ">
         <form class="login-form" method="POST">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>INGRESA AL PANEL</h3>

         <!-- *******************************************
           esto se debe mostrar solo si hay errores en el logueo, y no mostrar la otra de Ingresa tus datos
          <div class="bs-component">
            <div class="alert alert-dismissible alert-danger">
              <strong>Datos incorrectos.</strong>
            </div>
          </div>
           *******************************************
          -------->
          <!-- si hay errores se muestra la seccion anterior, y esta no -->
          <div class="bs-component">
            <div class="alert alert-dismissible alert-info">
              <strong>Ingresa tus datos</strong>
            </div>
          </div>
          <!-------->

          <div class="form-group">
            <label class="control-label">USUARIO</label>
            <input class="form-control" name="email" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" name= "clave" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="utility">
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Olvidaste la clave ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="acceder" value="acceder"><i class="fa fa-sign-in fa-lg fa-fw"></i>INGRESAR</button>
          </div>
        </form>
        <form class="forget-form" method="post" >
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Olvidaste la clave ?</h3>
          <div class="bs-component">
            <div class="alert alert-dismissible alert-info">
              <strong>Tu clave será reseteada</strong>
            </div>
          </div>
          <!-- este es el mensaje de error-
          <div class="bs-component">
            <div class="alert alert-dismissible alert-danger">
              <strong>El mail ingresado no existe</strong>
            </div>
          </div>
         --->

          <!-- este es el mensaje de ok!
          <div class="bs-component">
            <div class="alert alert-dismissible alert-success">
              <strong>Listo! Ya puedes loguearte</strong>
            </div>
          </div>
           --------------->
          
          <div class="form-group">
            <label class="control-label">Ingresa tu correo</label>
            <input class="form-control" placeholder="Email">
          </div>
          <div class="form-group btn-container ">
            <button class="btn btn-primary btn-block" type='submit' name='btnResetearClave' value='dadfa'><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Ir al Login</a></p>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>