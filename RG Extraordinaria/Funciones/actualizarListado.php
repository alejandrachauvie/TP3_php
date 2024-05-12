<?php 

function Actualizar_Lista($vConexion){

    $SolicitudesNuevas=array();
    $vRol=$_SESSION['Id_Rol'];
    
   
    if($vRol== 1){
    $sql="SELECT Id_solicitud, Titulo, Descripcion, Id_TSolicitud, Descripcion_Tipo, Fecha_Entrega, Fecha_Resolucion, Nombre, Apellido
    FROM solicitud
    JOIN tipo_solicitud ON Id_TSolicitud = IdTipo_Solicitud
    JOIN usuario ON Id_usuario = IdUsuario
    ORDER BY Fecha_Entrega";
    }
    elseif($vRol== 2){
       $sql="SELECT Id_solicitud, Titulo, Descripcion, Id_TSolicitud, Descripcion_Tipo, Fecha_Entrega, Fecha_Resolucion, Nombre, Apellido
        FROM solicitud
        JOIN tipo_solicitud ON Id_TSolicitud = IdTipo_Solicitud
        JOIN usuario ON Id_usuario = IdUsuario
        JOIN rol ON Rol_Id=Id_Rol
        WHERE Rol_Id=2 AND Id_Rol=2 
        ORDER BY Fecha_Entrega";
    }
    elseif($vRol== 3){
        $sql="SELECT Id_solicitud, Titulo, Descripcion, Id_TSolicitud, Descripcion_Tipo, Fecha_Entrega, Fecha_Resolucion, Nombre, Apellido
        FROM solicitud
        JOIN tipo_solicitud ON Id_TSolicitud = IdTipo_Solicitud
        JOIN usuario ON Id_usuario = IdUsuario
        JOIN rol ON Rol_Id=Id_Rol
        WHERE Id_TSolicitud=2 
        ORDER BY Fecha_Entrega";

    }else{
        $sql="SELECT Id_solicitud, Titulo, Descripcion, Id_TSolicitud, Descripcion_Tipo, Fecha_Entrega, Fecha_Resolucion, Nombre, Apellido
        FROM solicitud
        JOIN tipo_solicitud ON Id_TSolicitud = IdTipo_Solicitud
        JOIN usuario ON Id_usuario = IdUsuario
        JOIN rol ON Rol_Id=Id_Rol
        WHERE Id_TSolicitud=1 OR Id_TSolicitud=3
        ORDER BY Fecha_Entrega";

    }
   $rs=mysqli_query($vConexion,$sql);
   $i=0;
    
    while($data = mysqli_fetch_array($rs)){
        $SolicitudesNuevas[$i]['IDENTIFICADOR']=$data['Id_solicitud'];
        $SolicitudesNuevas[$i]['TITULO']=$data['Titulo'];
        $SolicitudesNuevas[$i]['DESCRIPCION']=$data['Descripcion'];
        if($data['Id_TSolicitud']==1){
        $SolicitudesNuevas[$i]['TIPOD']='success';
        }elseif($data['Id_TSolicitud']==2){
        $SolicitudesNuevas[$i]['TIPOD']='danger';
        }elseif($data['Id_TSolicitud']==3){
        $SolicitudesNuevas[$i]['TIPOD']='warning';
        }else{
        $SolicitudesNuevas[$i]['TIPOD']='info';
        }      
        $SolicitudesNuevas[$i]['TIPODESCRIPCION']=$data['Descripcion_Tipo'];
        $SolicitudesNuevas[$i]['ENTREGA']=$data['Fecha_Entrega'];
        $SolicitudesNuevas[$i]['RESOLUCION']=$data['Fecha_Resolucion'];
        $SolicitudesNuevas[$i]['NOMBRE']=$data['Nombre'];
        $SolicitudesNuevas[$i]['APELLIDO']=$data['Apellido'];
        $i++;
    }

    return $SolicitudesNuevas;
}
?>