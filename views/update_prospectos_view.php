<?php require_once 'includes/inc_header.php' ?>
<?php require_once 'includes/inc_navbar.php' ?>

<!-- Content -->
<div class="container" style="padding: 150px 0px;">
  <div class="row">
    <div class="offset-xl-3 col-xl-6">
      <div class="card shadow rounded">
        <div class="card-body">
          <h2 class="text-center mb-5"><?php echo $data['title']; ?></h2>
          <form id="do_update_prospectos">
            <input type="hidden" name="id" value="<?php echo $data['c']['id']; ?>">
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $data['c']['nombre'] ?>">
            </div>
            <div class="form-group">
              <label for="correo">Email</label>
              <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $data['c']['correo'] ?>">
            </div>
            <div class="form-group">
              <label for="telefono">Telefono</label>
              <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $data['c']['telefono'] ?>">
            </div>

            <div class="form-group">
              <label for="curp">RFC</label>
              <input type="text" class="form-control" id="rfc" name="rfc" value="<?php echo $data['c']['rfc'] ?>">
            </div>

            <div class="form-group">
              <label for="direccion">Dirección</label>
              <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $data['c']['direccion'] ?>"></div>

            <div class="form-group">
              <label for="fecha">Fecha de cierre de contrato</label>
              <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $data['c']['fecha'] ?>">
            </div>


            <div class="form-group">
              <label for="id_genero">Estatus</label>
              <select type="text" class="form-control" id="estatus" name="estatus">
              <option value="<?php echo $data['c']['estatus'] ?>"><?php echo $data['c']['estatus'] ?></option>
                <option value="">Seleciona una opción...</option>
                <option value="Envio de ficha informativa">Envio de ficha informativa</option>
                    <option value="Envio de contrato">Envio de contrato</option>
                    <option value="Negociacion con prospecto">Negociacion con prospecto</option>
                    <option value="Cierre de contrato">Cierre de contrato</option>
              </select>
            </div>


           <!-- <div class="form-group">
              <label for="inmueble">Tipo de seguro</label>
              <select class="form-control rounded shadow" id="inmueble" name="inmueble">
                <option value="<?php echo $data['c']['inmueble'] ?>"><?php echo $data['c']['inmueble'] ?></option>
                <option value="">Seleciona una opción...</option>
                <?php foreach (get_inmuebles($id_user) as $r): ?>
                  <option value="<?php echo $r['Nombre'] ?>"><?php echo $r['Nombre'] ?></option>
                <?php endforeach; ?>
              </select>
            </div> -->


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
              <textarea type="text" class="form-control" id="descripcion" name="descripcion"><?php echo $data['c']['descripcion'] ?></textarea>

            </div>

        
            <div class="form-group">
              <button id="submit" type="submit" class="btn btn-success">Guardar cambios</button>
              <button type="reset" class="btn btn-default">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Content -->

<?php require_once 'includes/inc_footer.php' ?>
