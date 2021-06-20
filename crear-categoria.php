<!-- incluimos las redirecciones -->
<?php require_once 'includes/redireccion.php'; ?>
<!-- cabecera -->
<?php require_once 'includes/cabecera.php'; ?>
<!-- Barra lateral -->
<?php require_once 'includes/lateral.php'; ?>
<!-- caja principal -->
<div id="principal">
    <h1>Crear Categorias</h1>
<p>Añade nuevas categorias al blog para que los usuarios puedan usarlas al crear sus entradas </p>
<br/>
<form action="guardar-categoria.php" method="post">
<label for="nombre">Nombre de la categoria</label>
<input type="text" name="nombre" id=""/>
    <!-- comprovamos si esxiste algun sesion con errores, mostramos los error, pero si no existe error, mostrar nada  -->
    <?php echo isset($_SESSION['errores_categoria']) ? mostrarError($_SESSION['errores_categoria'], 'nombre') : ''; ?>
<input type="submit" value="Guardar"/>
</form>

<?php borrarErrores(); ?>

</div><!--  fin del primcipal -->
<!--  fin principal -->
<?php require_once 'includes/pie.php'; ?>

