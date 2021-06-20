<?php
//iniciar la session y la conexion  a bd
require_once 'includes/conexion.php';
//recojer los datos del formulario
if (isset($_POST)) {

               //borrar error antiguo
           //MUY INTERESANTE, TODO TIENE LOGICA
           if(isset($_SESSION['error_login'])){
            // $_SESSION['error_login']=null;
               //borramos la sesion
               //$_SESSION['error_login']=null;
              // session_unset($_SESSION['error_login']);
              //esto elimar una sesion en particular
              unset($_SESSION['error_login']);
           }

       //recoger datos del formulario    
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    //consulta para comprobar las credenciales del usuario

    $sql = "SELECT *FROM usuarios WHERE email='$email'";

    //AHORA HACES LA QUERY
    $login = mysqli_query($db, $sql);

    //si login da true y el numero de filas que me devuele la consulta es login
    if ($login && mysqli_num_rows($login) == 1) {
        //mysqli_fetch_assoc : esta funcion saca un array asociativo del usuario con toda su informacion, en este caso del o que se saco de la base de datos
        $usuario = mysqli_fetch_assoc($login);
        // var_dump($usuario);
        // la funcion die() permite parar la ejecucion
        // die();

        //comprobar la contraseña
        //la funcion password_verify permite comparar dos contraseñas ya sea cifrada o no
        $verify = password_verify($password, $usuario['password']);
        if ($verify) {
            //utilizar una session para guardar los datos del usuario logeado
           //creamos una sesion
           //ahora guardamos nuestro array asociativo(que tiene nombre apellido email contraseña fecha) dentro de la session creada
           $_SESSION['usuario']=$usuario; 



        }else{
            //si algo falla enviar una sesion con el fallo
            $_SESSION['error_login']="Login incorrecto!!";
        }



    } else {
        //mensaja de error
        //login incorecto si tiene mas de una fila, o si no existe el login
        $_SESSION['error_login']="Login incorrecto!!!";
    }
}


//redirigir al index.ph
header("Location: index.php");