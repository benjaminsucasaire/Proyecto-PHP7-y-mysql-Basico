<?php

//cuando aparaste el error session ya inciada
// en el caso que no exista la session
if(!isset($_SESSION)){
//iniciamos la sesion
session_start();
}


//comprobamos si no exite una session mandamos a la pagina de incio
if(!isset($_SESSION['usuario'])){
        header('Location: index.php');
}