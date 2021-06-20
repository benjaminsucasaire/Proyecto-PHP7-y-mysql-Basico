<?php
// si exite un meotdo pos enviado
if (isset($_POST)) {
    //conexion a la base de datos
    require_once 'includes/conexion.php';


    //recojer los valores del formulario de registro.
    // la funcion mysqli_real_escape_string convierte todo lo que entra a la caja en string PARA ASI NO SUFRIR DE ATAQUES DE HAKEO
    //importante la funcion trim permite que se guarde sin espacios
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;

    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;

    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;


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



    //comprobamos los errores;
    $guardar_usuario = false;
    if (count($errores) == 0) {
        //vamos a recojer al usuario que esta en la session
        $usuario=$_SESSION['usuario'];
        $guardar_usuario = true;

        //comprobar que el email no existe.
        $sql ="Select id,email from usuarios where email='$email';";
           $isset_email =mysqli_query($db,$sql);
           //ahora pasamos ese dato a un array asociativo
           //ingresamos como parametro la cansulta
           $isset_user =mysqli_fetch_assoc($isset_email);

                //si el usuario de la tabla con ese correo es el mismo que el usuario de la sesion
                // o si $isset_user no existe, en otras palabras que si no existe algun usuario con ese email
            if($isset_user['id']==$usuario['id'] || empty($isset_user)){
        //actualizar el usuario usuario en la tabla usuarios de la BD;
        
            $sql = "UPDATE usuarios set ".
            " nombre='$nombre', ".
            "apellidos='$apellidos',".
            "email='$email' ".
            " where  id=".$usuario['id'];

        $guardar = mysqli_query($db, $sql);

        if ($guardar) {
            //algo muy importante es que tambien tenemos que actualizar la sesion 
            $_SESSION['usuario']['nombre']=$nombre;
            $_SESSION['usuario']['apellidos']=$apellidos;
            $_SESSION['usuario']['email']=$email;    


            $_SESSION['completado'] = "Tus datos se han actualizado con exito";
        } else {
            //agregamos un indice general
            $_SESSION['errores']['general'] = "Fallo al actualizar tus datos!!";
        }
            }else{
                $_SESSION['errores']['general'] = "El Correro ya existe!!";
            }






    } else {
        $_SESSION['errores'] = $errores;
        //redirigimos al index si hay algun erro

    }
}
header('Location:mis-datos.php');
