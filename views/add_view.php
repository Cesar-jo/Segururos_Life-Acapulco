<?php require_once 'includes/inc_header.php' ?>
<?php require_once 'includes/inc_navbar.php' ?>

<!-- Content -->
<div class="container" style="padding: 150px 0px;">
  <div class="row">
    <div class="offset-xl-3 col-xl-6">
      <div class="card rounded shadow">
        <div class="card-body">
          <h2 class="text-center mb-5"><?php echo $data['title']; ?></h2>
          <!-- 
            // id
            // id_usuario x
            // portada
            // titulo
            // id_genero
            // id_producto
            // calificacion
            // opinion
            // creado x
            // actualizado x
           -->
          <form id="do_add_game">
            <div class="form-group">
              <label for="portada">Imagen del Seguro</label>
              <!--lo que hace el tipo file es crearnos una opcion para cargar un archivo, en este caso una imagen del juego que queramos subir -->
              <!--Con el tipo de atributo accept lo que le decimos es que solo acepte tipos de archivos que sean imagenes -->
              <input type="file" class="form-control-file " id="portada" name="foto" accept="image/*">
            </div>

            <div class="form-group">
              <label for="portada">SImagen del Seguro</label>
              <!--lo que hace el tipo file es crearnos una opcion para cargar un archivo, en este caso una imagen del juego que queramos subir -->
              <!--Con el tipo de atributo accept lo que le decimos es que solo acepte tipos de archivos que sean imagenes -->
              <input type="file" class="form-control-file " id="portada" name="foto1" accept="image/*">
            </div>

            <div class="form-group">
              <label for="portada">Imagen del Seguro</label>
              <!--lo que hace el tipo file es crearnos una opcion para cargar un archivo, en este caso una imagen del juego que queramos subir -->
              <!--Con el tipo de atributo accept lo que le decimos es que solo acepte tipos de archivos que sean imagenes -->
              <input type="file" class="form-control-file " id="portada" name="foto2" accept="image/*">
            </div>

            <div class="form-group">
              <label for="titulo">Titulo</label>
              <input type="text" class="form-control rounded shadow" id="titulo" name="Nombre">
            </div>
            <div class="form-group">
              <label for="id_genero">Tipo</label>
              <select class="form-control rounded shadow" id="id_genero" name="id_genero">
                <option value="">Seleciona una opción...</option>
                <?php foreach (get_genders() as $p): ?>
                  <option value="<?php echo $p['id'] ?>"><?php echo $p['genero'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="estatus">Estatus</label>
              <select  id="estatus" class="form-control rounded shadow" name="estatus">
                <option value="text">Seleciona una opción...</option>
                    <option value="ocupado">Ocupado</option>
                    <option value="desocupado">Desocupado</option>
              </select>
            </div>
            <div class="form-group">
              <label for="precio">Precio</label>
              <input type="number" class="form-control rounded shadow" id="precio" name="precio">
            </div>
            <div class="form-group">
              <label for="opinion">Descripción/Opinión</label>
              <textarea name="descripcion" id="opinion" cols="30" rows="10" class="form-control rounded shadow">Hola mundo de nuevo!</textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn rounded shadow btn-outline-success">Agregar</button>
              <button type="reset" class="btn rounded shadow rounded shadow btn-default">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Content -->

<?php require_once 'includes/inc_footer.php' ?>