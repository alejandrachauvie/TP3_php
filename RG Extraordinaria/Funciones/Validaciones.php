<?php

function ValidacionesInfo(){
    $vMensaje='';

    if(strlen($_POST['titulo']) < 10){
        $vMensaje.='Debe ingresar minimo 10 caracteres.<br/>';
    }
    if(strlen($_POST['detalle']) < 10){
        $vMensaje.='Debe ingresar minimo 10 caracteres.<br/>';
    }
    if(empty($_POST['tipo'])){
        $vMensaje.='Debes seleccionar al menos un tipo de solicitud.<br/>';
    }
  foreach($_POST as $Id=> $Valor){
    $_POST[$Id] = trim($_POST[$Id]);
    $_POST[$Id] = strip_tags($_POST[$Id]);
   }
    return $vMensaje;
}


?>