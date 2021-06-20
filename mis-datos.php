<!-- incluimos las redirecciones -->
<?php require_once 'includes/redireccion.php'; ?>
<!-- cabecera -->
<?php require_once 'includes/cabecera.php'; ?>
<!-- Barra lateral -->
<?php require_once 'includes/lateral.php'; ?>
<!-- caja principal -->
<div id="principal">
<h1>Mis datos</h1>
            <!-- mostrar errores -->
            <?php if (isset($_SESSION['completado'])) : ?>
                <div class="alerta alerta-exito">
                    <?= $_SESSION['completado']; ?>
                </div>
            <?php elseif (isset($_SESSION['errores']['general'])) : ?>
                <div class="alerta alerta-error">
                    <?= $_SESSION['errores']['general']; ?>
                </div>
            <?php endif; ?>
            <form action="actualizar-usuario.php" method="post">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="" value="<?=$_SESSION['usuario']['nombre']?>" />
                <!-- comprovamos si esxiste algun sesion con errores, mostramos los error, pero si no existe error, mostrar nada  -->
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
                <label for="apellidos">Apellidos</label>
                <!-- muy importante enviar los datos de la session a las cajas -->
                <input type="text" name="apellidos" id="" value="<?=$_SESSION['usuario']['apellidos']?>"/>
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>


                <label for="email">Correo</label>
                <input type="email" name="email" id="" value="<?=$_SESSION['usuario']['email']?>"/>

                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

                <input type="submit" value="Actualizar" name="submit" />
            </form>
            <!-- borramos los errores con la funcion realizada para liberar las session -->
            <?php borrarErrores(); ?>



</div><!--  fin del primcipal -->
<!--  fin principal -->
<?php require_once 'includes/pie.php'; ?>