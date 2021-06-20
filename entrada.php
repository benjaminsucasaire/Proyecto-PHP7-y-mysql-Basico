<!-- conexion -->
<?php require_once 'includes/conexion.php'; ?>
<!-- helpers -->
<?php require_once 'includes/helpers.php'; ?>
<?php
//como parametro le enviamos la conexion a la base de datos y como id es el id de el link que tiene como nombre id
$entrada_actual = conseguirEntrada($db, $_GET['id']);

if (!isset($entrada_actual['id'])) {
    header("Location:index.php");
}
?>
<!-- cabecera -->
<?php require_once 'includes/cabecera.php'; ?>
<!-- Barra lateral -->
<?php require_once 'includes/lateral.php'; ?>
<!-- caja principal -->
<div id="principal">

    <h1><?= $entrada_actual['titulo'] ?></h1>
    <a href="categoria.php?id=<?= $entrada_actual['categoria_id'] ?>">
        <h2><?= $entrada_actual['categoria'] ?></h2>
    </a>
    <h4><?= $entrada_actual['fecha'] ?> |<?= $entrada_actual['usuario'] ?> </h4>
    <p><?= $entrada_actual['descripcion'] ?></p>

    la logica es que si existe una session de usuario y el id de ese usuario con el id del usuario que esta en nuestra base de datos
    <?php if (isset($_SESSION['usuario'])  && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id']) : ?>
        <!-- añadiremos algunos botones -->
        <div class="boton-editar-entrada" style="display: flex; width: 60%; margin:0 auto; justify-content:space-between; margin-top:30px;column-gap:5px;">
        <a href="editar-entrada.php?id=<?=$entrada_actual['id']?>" class="boton boton-verde" style="max-width: 160px !important;">Editar entrada</a>
        <a href="borrar-entrada.php?id=<?=$entrada_actual['id']?>" class="boton " style="max-width:160px !important;">Eliminar categoria</a>
        </div>
        
    <?php endif; ?>

</div><!--  fin del primcipal -->
<!--  fin principal -->
<?php require_once 'includes/pie.php'; ?>