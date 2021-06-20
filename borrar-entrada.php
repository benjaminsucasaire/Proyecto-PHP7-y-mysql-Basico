<?php
require_once 'includes/conexion.php';

//hacemos un if si existe el usuario identificado
if(isset($_SESSION['usuario']) && isset($_GET['id'])){
    //mandamos el id del artitulo a una variable
    $entrada_id=$_GET['id'];
    //mandamos el id del usuario logeado a la variable para confirmar que es el autor del articulo
    $usuario_id=$_SESSION['usuario']['id'];
$sql="DELETE FROM entradas WHERE usuario_id=$usuario_id AND id=$entrada_id";
mysqli_query($db,$sql);
}

header("Location:index.php");