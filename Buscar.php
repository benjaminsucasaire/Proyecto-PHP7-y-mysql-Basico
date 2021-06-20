
<?php

//si no existe niguna entrada por post, que lo redirecione a index
if (!isset($_POST['busqueda'])) {
    header("Location:index.php");
}

?>
<!-- cabecera -->
<?php require_once 'includes/cabecera.php'; ?>
<!-- Barra lateral -->
<?php require_once 'includes/lateral.php'; ?>
<!-- caja principal -->
<div id="principal">

    <h1>Busqueda de <?= $_POST['busqueda'] ?></h1>
    <?php
    //llamamos a la funcion e ingresamos la conexion a a bd
    //aca no le pasamos nada para que por defecto sea null, asi no tendra un lmite de 4 
    $entradas = conseguirEntradas($db,NULL,NULL, $_POST['busqueda']);

    //si no esta vacio
    if (!empty($entradas)) :
        //ahora que recoora para imprimir
        //por cada fila que recorra que me cree un variable entradas

        while ($entrada = mysqli_fetch_assoc($entradas)) :
    ?>
            <article class="entrada">
                <!--  -->

                <a href="entrada.php?id=<?= $entrada['id'] ?>">
                    <h2><?= $entrada['titulo'] ?></h2>
                    <span class="fecha"><?= $entrada['categoria'] . ' | ' . $entrada['fecha'] ?></span>
                    <p>
                        <!-- utlizamos la funcion substr para limitar el numero de letras a observar, en este caso entra como parametros el array y la cantidad de letras de el inicio a fin 0-190 -->
                        <!-- tambien podemos concatener 3 puntos, para referir que siguen texto despues de eso -->
                        <?= substr($entrada['descripcion'], 0, 190) . "..." ?>

                    </p>
                </a>
            </article>

        <?php
        endwhile;
    else :

        ?>
        <div class="alerta">No hay entradas en esta categoria</div>

    <?php
    //    cerramos el else 
    endif;
    ?>
</div><!--  fin del primcipal -->
<!--  fin principal -->
<?php require_once 'includes/pie.php'; ?>