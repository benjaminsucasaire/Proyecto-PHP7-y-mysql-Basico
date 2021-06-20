<!-- realizamos un require con la conexion   -->
<?php require_once 'conexion.php';?>
<?php require_once 'includes/helpers.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Blog de Video juegos</title>
</head>

<body>

    <!-- cabecera -->
    <header id="cabecera">
        <!-- LOGO -->
        <div id="logo">
            <a href="index.php">
                Blog de Video juegos
            </a>
        </div>
        <!-- Menu : semanticamente la nav debe de estar dentro del header-->
       
        <nav id="menu">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                
                 <!-- almacenamos lo que nos devuelve la funcion a una  variable -->
                 <!-- enviamos como parametro $db ya que hay esta almacenado nuestra conexion a mysql -->
        <?php $categorias=conseguirCategorias($db);
        // <!-- crear un if  para comprobar si no esta vacio-->
            
            if(!empty($categorias)):

        // <!-- aca estamos sacando el array asociativo de categorias y lo pase a otro array grupo por grupo de datos. -->    
                 while($categoria=mysqli_fetch_assoc($categorias)): ?>
                    <li><a href="categoria.php?id=<?=$categoria['id']?>"><?=$categoria['nombre']?></a></li>
                <?php endwhile;
                        endif;
                
                ?>
                <li><a href="index.php">Sobre mi</a></li>
                <li><a href="index.php">Contacto</a></li>
            </ul>
        </nav>
    </header>

    
<div id="contenedor">