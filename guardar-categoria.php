<?php
//comprobar si existe un post
if (isset($_POST)) {
    //conexion a la base de datos
    require_once 'includes/conexion.php';

    // $_POST["nombre"]='hola';

    //vamos a utilizar un ternario para disminuir codigo
    //mysqli_real_escape_string permite tener mas seguridad ya que no se podra insertar string, ya  que pasaria  como texto string puro
    $nombre = isset($_POST["nombre"]) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;

        // var_dump($nombre);
        // die();
    //array de errores
    $errores = array();
    //validamos los d   atos antes de guardarlos
    //validar campo nombre
    //ya que es el nombre de la categoria puede entrar numeros si desean
    if (!empty($nombre) ) {

        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombre'] = 'El nombre no es válido';
        
    }

    //comprobar que no me llegan errores
    //para ejecutar nuestro query
    if(count($errores)==0){
        //decla
        $sql="insert into categorias values(NULL,'$nombre');";
        $guardar=mysqli_query($db,$sql);
        header("Location:index.php");
    }else{
        $_SESSION['errores_categoria']=$errores;
        header("Location:crear-categoria.php");
    }


}

