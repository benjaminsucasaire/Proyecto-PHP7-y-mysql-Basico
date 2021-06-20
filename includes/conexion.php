<?php
//conexión
// conectar a la base de datos
//prmiero declaramos la ncion de conexion y lo guardamos en una variable
$servidor='localhost';
$usuario='root';
$password='';
$basededatos='blog_master';


$db = mysqli_connect($servidor, $usuario, $password, $basededatos);

//lo seteamos para que recononozca valores con tilde y otros
mysqli_query($db, "SET NAMES 'utf8' ");


//cuando aparaste el error session ya inciada
// en el caso que no exista la session
if (!isset($_SESSION)) {
    //iniciamos la sesion
    session_start();
}
