<?php

function ConeccionBD( $Host= 'localhost', $User= 'root', $Password= '' , $BaseDeDatos= 'admin'){

    //procedo a la conexion con estos parametros
    $linkConexion=mysqli_connect($Host,$User,$Password,$BaseDeDatos);
    if($linkConexion != false)
       return $linkConexion;
       else
           die ('No se pudo realizar la conexion');
}

?>