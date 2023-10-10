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
          <form id="do_add_cliente">    
          
            <div class="form-group">
              <label for="nombre">Nombre completo</label>
              <input type="text" class="form-control rounded shadow" id="nombre" name="nombre">
            </div>
            <div class="form-group">
              <label for="correo">Correo</label>
              <input type="email" class="form-control rounded shadow" id="correo" name="correo">
            </div>
            <div class="form-group">
              <label for="telefono">Telefono</label>
              <input type="text" class="form-control rounded shadow" id="telefono" name="telefono">
            </div>
            <div class="form-group">
              <label for="sexo">Sexo</label>
              <select  id="sexo" class="form-control rounded shadow" name="sexo">
                <option value="">Seleciona una opción...</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
              </select>
            </div>

          

            <div class="form-group">
              <label for="direccion">Dirección</label>
              <input type="text" class="form-control" id="direccion" name="direccion">
            </div>


            <div class="form-group">
              <label for="fecha">Fecha del cierre de contrato / Opcional</label>
              <input type="date" class="form-control rounded shadow" id="fecha" name="fecha">
            </div>

            <div class="form-group">
              <label for="estatus">Estatus</label>
              <select  id="estatus" class="form-control rounded shadow" name="estatus">
                <option value="">Selecione una opción...</option>
                    <option value="Envio de ficha informativa">Envio de ficha informativa</option>
                    <option value="Envio de contrato">Envio de contrato</option>
                    <option value="Negociacion con prospecto">Negociacion con prospecto</option>
                    <option value="Cierre de contrato">Cierre de contrato</option>
              </select>
            </div>


            

            <div class="form-group">
              <label for="inmueble">Tipo de seguro</label>
              <select class="form-control rounded shadow" id="inmueble" name="inmueble">
                <option value="">Seleciona una opción...</option>
              <!--  <?php # foreach (get_inmuebles($id_user) as $r): ?>
                  <option value="<?php # echo $r['Nombre'] ?>"><?php echo $r['Nombre'] ?></option>
                <?php # endforeach; ?> -->

                  <option value="Seguro de vida">Seguro de vida</option>
                  <option value="Seguro de auto">Seguro de auto</option>
                  <option value="Seguro para empresas">Seguro para empresas</option>
               
              </select>
            </div>

          
            
            <div class="form-group">
              <label for="descripcion">Descripción</label>
              <textarea type="text" class="form-control" id="descripcion" name="descripcion"></textarea>
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