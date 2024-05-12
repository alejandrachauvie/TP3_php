<?php
session_start();
function actualizarFechas($vConexion){

   
    if(!empty($_SESSION['Id_usuario'])){
        $SQL="UPDATE usuario SET Fecha_Acceso=NOW() WHERE Id_usuario=".$_SESSION['Id_usuario'];
        $rs=mysqli_query($vConexion, $SQL);
       $Msj="Actualización exitosa";
    }else{
        $Msj="No se pudo realizar la actualización";
    }
   return $Msj;
    }
?>