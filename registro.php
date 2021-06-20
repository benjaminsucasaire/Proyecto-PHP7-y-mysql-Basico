<?php
// si exite un meotdo pos enviado
if (isset($_POST)) {
//conexion a la base de datos
require_once'includes/conexion.php';


if(!isset($_SESSION)){
    //llamar a la sesion
    session_start();
}


    //recojer los valores del formulario de registro.
        // la funcion mysqli_real_escape_string convierte todo lo que entra a la caja en string PARA ASI NO SUFRIR DE ATAQUES DE HAKEO
    //importante la funcion trim permite que se guarde sin espacios
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']): false;

    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']) : false;

    $email = isset($_POST['email']) ?mysqli_real_escape_string($db,trim($_POST['email'])): false;

    $password = isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;

    //array de errores
    $errores = array();
    //validamos los d   atos antes de guardarlos
    //validar campo nombre
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match('/[0-9]/', $nombre)) {
        
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombre'] = 'El nombre no es válido';
    }
//validar campo apellidos
    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match('/[0-9]/', $apellidos)) {
        
        $apellidos_validado = true;
    } else {
        $apellidos_validado = false;
        $errores['apellidos'] = 'Los apellidos no son válidos';
    }
        //validar campo email
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        $email_validado = true;
    } else {
        $email_validado = false;
        $errores['email'] = 'El correo no es válido';
    }
            //validar campo comtraseña
            if (!empty($password) ) {
                
                $password_validado = true;
            } else {
                $password_validado = false;
                $errores['password'] = 'la contraseña no es válida';
            }


            //comprobamos los errores;
            $guardar_usuario=false;
            if(count($errores) == 0){
                    $guardar_usuario=true;
                    //cifrar la contraseña;
                    $password_segura=password_hash($password,PASSWORD_BCRYPT,['const'=>4]);
                    //insertamos usuario en la tabla usuarios de la BD;
                    $sql="INSERT INTO usuarios VALUES(NULL,'$nombre','$apellidos','$email','$password_segura',CURDATE());";

                        $guardar=mysqli_query($db,$sql);
                        

                        //  var_dump($guardar);
                        // die();
                        // var_dump(mysqli_error($db));
                        // die();
                        //si todo va bien y $guardar=true
                        if($guardar){
                           $_SESSION['completado']="el registro se a completado con éxito";     
                        }else{
                            //agregamos un indice general
                            $_SESSION['errores']['general']="Fallo al guardar el usuario!!";
                        }




            }else{
                    $_SESSION['errores']=$errores;
                    //redirigimos al index si hay algun erro
                    
            }

}
header('Location:index.php');