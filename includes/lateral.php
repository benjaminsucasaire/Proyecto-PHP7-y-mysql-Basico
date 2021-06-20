<?php require_once 'includes/helpers.php'; ?>
<aside id="sidebar">

    <div id="buscador" class="bloque">
        <h3>Buscar</h3>


        <form action="Buscar.php" method="post">

            <input type="text" name="busqueda" id="" />

            <input type="submit" value="Buscar" />
        </form>

    </div>







    <!-- vamos a mostrar aqui el resultado -->
    <!-- comprobamos si existe la session usuarios (la cual tiene los datos del usuario) -->

    <?php if (isset($_SESSION['usuario'])) : ?>
        <div id="usuario-logueado" class="bloque">
            <!-- imprimos el array asociativo con loss datos del usuario -->
            <h3> Bienvenido, <?= $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidos'] ?></h3>
            <!-- añadiremos algunos botones -->
            <a href="crear-entradas.php" class="boton boton-verde">Crear entradas</a>
            <a href="crear-categoria.php" class="boton ">Crear categoria</a>
            <a href="mis-datos.php" class="boton boton-naranja">Mis datos</a>
            <a href="cerrar.php" class="boton boton-rojo">Cerrar sesión</a>

        </div>
    <?php endif; ?>

    <!-- esta condicion es para que no aparesca el login -->
    <!-- si no existe la variable session(osea si no se han logeado correctamente) usuario mostrar el login y el registro -->
    <?php if (!isset($_SESSION['usuario'])) : ?>

        <div id="login" class="bloque">
            <h3>Identificate</h3>
            <!-- vamos hacer una alerta -->
            <!-- si existe la sesion error login -->
            <?php if (isset($_SESSION['error_login'])) : ?>
                <div class="alerta alerta-error">
                    <?= $_SESSION['error_login'] ?>
                </div>
            <?php endif; ?>

            <form action="login.php" method="post">
                <label for="email">Correo</label>
                <input type="email" name="email" id="" />

                <label for="password">Contraseña</label>
                <input type="password" name="password" id="" />

                <input type="submit" value="Entrar" />
            </form>

        </div>
        <div id="registro" class="bloque">

            <h3>Registrate</h3>


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
            <form action="registro.php" method="post">

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="" />
                <!-- comprovamos si esxiste algun sesion con errores, mostramos los error, pero si no existe error, mostrar nada  -->
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" id="" />
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>


                <label for="email">Correo</label>
                <input type="email" name="email" id="" />

                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

                <label for="password">Contraseña</label>
                <input type="password" name="password" id="" />
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>
                <input type="submit" value="Registrar" name="submit" />
            </form>
            <!-- borramos los errores con la funcion realizada para liberar las session -->
            <?php borrarErrores(); ?>
            </di>
        <?php endif; ?>
</aside>