<!-- incluimos las redirecciones -->
<!-- la redirecion nos ayuda si no esta identificado que no pueda entrar y lo redirija -->
<?php require_once 'includes/redireccion.php'; ?>
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
  <h1>Editar Entrada</h1>
  <p>Edita tu entrada <?=$entrada_actual['titulo']?></p>
  <br />
  <!-- le pasamos un un valor por get para hacer una condicional en la al momento de hacer la actualizacion -->
  <form action="guardar-entrada.php?editar=<?=$entrada_actual['id']?>" method="post">
    <label for="titulo">Titulo:</label>
    <input type="text" name="titulo" id="" value="<?=$entrada_actual['titulo']?>"/>
    <!-- comprovamos si esxiste algun sesion con errores, mostramos los error, pero si no existe error, mostrar nada  -->
    <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>

    <label for="descripcion">Descripción:</label>
    <!-- el text area el contenido no se puede poner con value, sino dentro del text area -->
    <textarea name="descripcion" ><?=$entrada_actual['descripcion']?></textarea>
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
                <!--esto es para el ternario si categoria id es == a entradaactual_id en ese caso selecioname ese elemento, y si eso no pasa no selecionamos nada -->

          <option value="<?= $categoria['id'] ?>" 
     
          <?=($categoria['id']==$entrada_actual['categoria_id']) ? 'selected="selected"':''?>
          >

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


<?php require_once 'includes/pie.php'; ?>