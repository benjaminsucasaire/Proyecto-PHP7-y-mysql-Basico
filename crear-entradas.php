<!-- incluimos las redirecciones -->
<?php require_once 'includes/redireccion.php'; ?>
<!-- cabecera -->
<?php require_once 'includes/cabecera.php'; ?>
<!-- Barra lateral -->
<?php require_once 'includes/lateral.php'; ?>
<!-- caja principal -->
<div id="principal">
  <h1>Crear Entradas</h1>
  <p>Añade nuevas entradas al blog, para que los usuarios puedan leerlas y disfrutarlas de nuestro contenido</p>
  <br />
  <form action="guardar-entrada.php" method="post">
    <label for="titulo">Titulo:</label>
    <input type="text" name="titulo" id="" />
    <!-- comprovamos si esxiste algun sesion con errores, mostramos los error, pero si no existe error, mostrar nada  -->
    <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion"></textarea>
    <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>


    <label for="categoria">Categoria:</label>
    <select name="categoria">

      <?php
      // utlizamos la funcion que tenemos en el archivo helpers, la cual nos muestra las categorias disponible
      $categorias = conseguirCategorias($db);
      //si no esta vacio categorias hago el bucle
      if (!empty($categorias)) :
        // ahora vamos a utilizar un bocle para que pueda imprimir los datos dentro de la variable $categorias
        // para conseguir los array asociativo utilizamos  la funcion mysqli_fetch_assoc
        //creamos el campo option
        //como  value es el id 
        //y como valor a mostrar es el nombre
        while ($categoria = mysqli_fetch_assoc($categorias)) :
      ?>
          <option value="<?= $categoria['id'] ?>">
            <?= $categoria['nombre'] ?>
          </option>

      <?php
        endwhile;
      endif;

      ?>


    </select>
    <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>
    <input type="submit" value="Guardar" />
  </form>

  <?php borrarErrores(); ?>

</div><!--  fin del primcipal -->
<!--  fin principal -->
<?php require_once 'includes/pie.php'; ?>