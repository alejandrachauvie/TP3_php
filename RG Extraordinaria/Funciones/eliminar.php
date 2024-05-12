<?php

 function Eliminar($vConeccion,$vId){
     if($_SESSION['Rol_Id']== 1){
         $sql="SELECT Id_solicitud from solicitud where Id_solicitud = $vId";
         } else {
             $sql="SELECT Id_solicitud from solicitud where Id_solicitud=$vId AND Id_usuario=".$_SESSION['Id_usuario'];
         }

     $rs=mysqli_query($vConeccion,$sql);
     $data=mysqli_fetch_array($rs);

     if(!empty($data['Id_solicitud'])){
         mysqli_query($vConeccion, "DELETE FROM solicitud WHERE Id_solicitud=$vId");
         return true;
     } else{ 
         return false;
     }
 }

?>