<?php

function Solicitud($vConexion){
   
    $Titulo=$_POST['titulo'];
    $Detalle=$_POST['detalle'];
    $Tipo=$_POST['tipo'];
    $Usuario=$_SESSION['Id_usuario'];
    $Fecha="";
    $Fecha=date('Y-m-d');
    $Fecha1=date('Y-m-d H:i:s' , strtotime($Fecha.'+ 7 days'));
    $Fecha2=date('Y-m-d H:i:s' , strtotime($Fecha.'+ 3 days'));
    $Fecha3=date('Y-m-d H:i:s' , strtotime($Fecha.'+ 1 days'));
    
    $Identificador_Sol='';
     switch ($Tipo){
      case 1:
    $Identificador_Sol='1';
    $SQL_INSERT="INSERT INTO solicitud (Titulo,Descripcion,IdUsuario,Fecha_Entrega,IdTipo_Solicitud,Fecha_Resolucion) 
    values ('$Titulo', '$Detalle', $Usuario ,'$Fecha', '$Identificador_Sol','$Fecha1')";
     break; 
     case 2:
    $Identificador_Sol='2';
   $SQL_INSERT="INSERT INTO solicitud (Titulo,Descripcion,IdUsuario,Fecha_Entrega,IdTipo_Solicitud,Fecha_Resolucion) 
 values ('$Titulo', '$Detalle', $Usuario ,'$Fecha', '$Identificador_Sol','$Fecha2')";
    break;  
    case 3:
    $Identificador_Sol='3';
      $SQL_INSERT="INSERT INTO solicitud (Titulo,Descripcion,IdUsuario,Fecha_Entrega,IdTipo_Solicitud,Fecha_Resolucion) 
       values ('$Titulo', '$Detalle', $Usuario ,'$Fecha', '$Identificador_Sol','$Fecha3')";        
      break;    
}
  if(!mysqli_query($vConexion,$SQL_INSERT)){
       die('<h4> Error </h4>');
    }
    return true;
}
?>
