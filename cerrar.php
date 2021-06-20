<?php
session_start();

//si edxiste la session
if(isset($_SESSION['usuario'])){
    //borramos todas las session que hay
    session_destroy();
}
header("Location:index.php");