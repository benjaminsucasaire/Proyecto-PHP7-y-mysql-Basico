<?php
function mostrarError($errores, $campo)
{

    $alerta = '';
    if (isset($errores[$campo]) && !empty($campo)) {
        $alerta = "<div class='alerta alerta-error'>" . $errores[$campo] . "</div>";
    }
    return $alerta;
}

//ahora borramos los errores
function borrarErrores()
{
    $borrado = false;
    if (isset($_SESSION['errores'])) {
        $_SESSION['errores'] = null;
        // session_unset(); no deben de retornar nada
        //La función session_unset() libera todas las variables de sesión actualmente registradas.
        // $borrado = session_unset();
        $borrado=true;
    }

    //agrefamos boorar errorres para las entradas
    if (isset($_SESSION['errores_entrada'])) {
        $_SESSION['errores_entrada'] = null;
        // session_unset(); no deben de retornar nada
        $borrado=true;
    
    }
//categoria
    //agrefamos boorar errorres para las categorias
    if (isset($_SESSION['errores_categoria'])) {
        $_SESSION['errores_categoria'] = null;
        // session_unset(); no deben de retornar nada
        $borrado=true;
    
    }


    if (isset($_SESSION['completado'])) {
        $_SESSION['completado'] = null;
        // session_unset(); no deben de retornar nada 
        //La función session_unset() libera todas las variables de sesión actualmente registradas. 
        // $borrado = session_unset();
        $borrado=true;
    
    }

    return $borrado;
}


//funcion para conseguir todas las categorias
function conseguirCategorias($conexion)
{
    //primero realizamo la consulta
    $sql = "SELECT * FROM categorias order by id asc;";
    //ahora creamos el queri
    $categorias = mysqli_query($conexion, $sql);

    //por defecto tendra un array vacio.
    $resultado = array();
    //el numero de filas es mayor o igual a 1
    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $resultado = $categorias;
    }
    return $resultado;
}

//funcion para conseguir categoria en espesifico
//ingresamos como parametro el id de la categoria
function conseguirCategoria($conexion,$id)
{
    //primero realizamo la consulta
    $sql = "SELECT * FROM categorias where id=$id;";
    //ahora creamos el queri
    $categorias = mysqli_query($conexion, $sql);

    //por defecto tendra un array vacio.
    $resultado = array();
    //el numero de filas es mayor o igual a 1
    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        //como solo devuelve uns sola categoria, denfrente le colocamos un mysqli_fetch_assoc  que lo convierte en una aaray asociativo
        $resultado = mysqli_fetch_assoc($categorias);
    }
    return $resultado;
}


//ingresamos como parametro el id de la entrada
function conseguirEntrada($conexion,$id)
{
    //primero realizamo la consulta
    $sql = "SELECT e.*,c.nombre AS 'categoria',concat(u.nombre,' ',u.apellidos) as 'usuario'  FROM entradas e ".
    " inner JOIN categorias c ON e.categoria_id=c.id ".
    " inner JOIN usuarios u ON e.usuario_id=u.id ".
    " WHERE e.id=$id";
    //ahora creamos el query

    $entrada = mysqli_query($conexion, $sql);

    //por defecto tendra un array vacio.
    $resultado = array();
    //el numero de filas es mayor o igual a 1
    if ($entrada && mysqli_num_rows($entrada) >= 1) {
        //como solo devuelve uns sola entrada, denfrente le colocamos un mysqli_fetch_assoc  que lo convierte en una aaray asociativo
        $resultado = mysqli_fetch_assoc($entrada);
    }
    return $resultado;
}






function conseguirEntradas($conexion,$limit=null,$categoria=null,$busqueda=null)
{
    
    //consulta sql con un INNER JOIN
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e " .
        " INNER JOIN categorias c ON e.categoria_id=c.id ";
        
    //si no esta vacio (ojo si quieres lo puedes convertir en un numero el $categoria)
if(!empty($categoria)){
    $sql.=" where e.categoria_id=$categoria";
}
//aca introducimos la caonsulta para buscar entradas
//si no esta vacio la variable busqueda
if(!empty($busqueda)){
    $sql.=" Where e.titulo like '%$busqueda%' ";
    
    // var_dump($sql);
    // die();
    }


        //concatenamos el order by
        $sql.=" order by e.id desc ";




    //si limit es true
    if($limit ){
        //$sql = $sql."limit 4";
        $sql.="limit 4";
    }

    // var_dump(mysqli_error($conexion,$sql));
    // die();
    //ejecutamos la consulta
    //como parametro ingresamos la conexion a la base de datos y la consulta $sql
    $entradas = mysqli_query($conexion, $sql);


    //por defecto tendra un array vacio.
    $resultado = array();
    //el numero de filas es mayor o igual a 1
    if ($entradas && mysqli_num_rows($entradas) >= 1) {
        $resultado = $entradas;
    }
    return $resultado;
}


