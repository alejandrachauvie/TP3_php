<?php
 session_start();


 if (empty($_SESSION['Nombre']) ) {
     header('Location: CerrarSesion.php');
     exit;
 }
 
 require_once 'Funciones/conectar.php';
 $MiConeccion= ConeccionBD();

require_once 'Funciones/eliminar.php';

 if ( Eliminar($MiConeccion , $_GET['Id_solicitud']) != false ) {
    
      $_SESSION['Mensaje']='Se ha eliminado la consulta seleccionada'; 
      $_SESSION['Estilo']='susses';
      
     }else {

      $_SESSION['Mensaje']='No se pudo borrar la consulta'; 
      $_SESSION['Estilo']='warning';
     
 }
 

 header('Location: listado.php');
 exit;
 ?>
 
