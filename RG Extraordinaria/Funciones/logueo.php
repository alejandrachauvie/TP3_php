<?php
 function Login($vUsuario,$vClave,$vConeccion){

    $Usuario=array();

    $SQL="SELECT Id_usuario,Nombre,Apellido,Imagen,Email,Clave,Id_Rol,Nombre_Rol,Fecha_Acceso,Estado FROM usuario
    JOIN rol ON Rol_Id=Id_Rol
    WHERE Email='$vUsuario' AND Clave=MD5('$vClave') AND Estado=1";

    $rs=mysqli_query($vConeccion,$SQL);

    $data=mysqli_fetch_array($rs);

    if(!empty($data)){

        $Usuario['ID_USUARIO']=$data['Id_usuario'];
        $Usuario['NOMBRE']=$data['Nombre'];
        $Usuario['APELLIDO']=$data['Apellido'];
        $Usuario['IMAGEN']=$data['Imagen'];
        $Usuario['EMAIL']=$data['Email'];
        $Usuario['CLAVE']=$data['Clave'];
        $Usuario['ROL']=$data['Id_Rol'];
        $Usuario['TIPO_ROL']=$data['Nombre_Rol'];
        $Usuario['FECHA_ACCESO']=$data['Fecha_Accesso'];
        $Usuario['ESTADO']=$data['Estado'];   
    }
    return $Usuario;
 }

?>