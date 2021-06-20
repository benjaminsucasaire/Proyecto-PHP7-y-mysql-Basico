<?php
//comprobar si existe un post
if (isset($_POST)) {
    //conexion a la base de datos
    require_once 'includes/conexion.php';

    //vamos a utilizar un ternario para disminuir codigo
    //mysqli_real_escape_string permite tener mas seguridad ya que no se podra insertar string, ya  que pasaria  como texto string puro
    $titulo = isset($_POST["titulo"]) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;

    $descripcion = isset($_POST["descripcion"]) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
    //como categoria es numerico tenemos que castear para que lo que ingrese a la variable categoria sea una variable int
    $categoria = isset($_POST["categoria"]) ? (int)$_POST['categoria'] : false;

    //como ultimo parametro tenemos que recojer el id del usuario
    //MUY IMPORTANTE
    $usuario = $_SESSION['usuario']['id'];


    // var_dump($titulo);
    // var_dump($descripcion);

    // var_dump($categoria);
    // var_dump($usuario);
    // die();


    //array de errores
    $errores = array();

    //validamos los d   atos antes de guardarlos
    //validar campo nombre
    //ya que es el nombre de la categoria puede entrar numeros si desean
    if (!empty($titulo)) {

        $titulo_validado = true;
    } else {
        $titulo_validado = false;
        $errores['titulo'] = 'El titulo no es válido';
    }

    if (!empty($descripcion)) {

        $descripcion_validado = true;
    } else {
        $descripcion_validado = false;
        $errores['descripcion'] = 'La descripcion no es válida';
    }

    //si no esta vacio y es numerico
    if (!empty($categoria) && is_numeric($categoria)) {

        $categoria_validado = true;
    } else {
        $categoria_validado = false;
        $errores['categoria'] = 'La categoria no es válida';
    }




    //comprobar que no me llegan errores
    //para ejecutar nuestro query
    if (count($errores) == 0) {
        //si existe la variable editar en get
        if (isset($_GET['editar'])) {
                //esta variable le pasamos en get
            $entrada_id=$_GET['editar'];
            //tambien creamos una variable que tendra el id de usuario para comparar en el where
            $usuario_id=$_SESSION['usuario']['id'];
            //actualizamos la entrada
            $sql = "UPDATE  entradas set titulo ='$titulo',descripcion='$descripcion',categoria_id='$categoria' "." where id=$entrada_id and usuario_id=$usuario_id";
        } else {
            //decla
            $sql = "insert into entradas values(NULL,$usuario,$categoria,'$titulo','$descripcion',curdate());";
        }



        $guardar = mysqli_query($db, $sql);

        // var_dump(mysqli_error());
        // die();
        header("Location:index.php");
    } else {
        $_SESSION['errores_entrada'] = $errores;
        
                //si es desde la pagina editar
            if(isset($_GET['editar'])){
                header("Location:editar-entradas.php?id=".$_GET['editar']);
            }else{
            //cuando haya errores me redirigira a la pagina crear_entradas.php
            header("Location:crear-entradas.php");
            }


               
    }
}
