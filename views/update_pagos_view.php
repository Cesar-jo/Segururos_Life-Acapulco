<?php require_once 'includes/inc_header.php' ?>
<?php require_once 'includes/inc_navbar.php' ?>

<!-- Content -->
<div class="container" style="padding: 150px 0px;">
  <div class="row">
    <div class="offset-xl-3 col-xl-6">
      <div class="card shadow rounded">
        <div class="card-body">
          <h2 class="text-center mb-5"><?php echo $data['title']; ?></h2>
          <form id="do_update_pagos">
            <input type="hidden" name="id" value="<?php echo $data['c']['id']; ?>">
            
            

            <div class="form-group">
              <label for="fecha">Fecha de inicio</label>
              <input type="text" class="form-control" id="fecha" name="fecha" value="<?php echo $data['c']['fecha'] ?>">
            </div>


            <div class="form-group">
              <label for="fechafin">Fecha de vencimiento</label>
              <input type="text" class="form-control" id="fechafin" name="fechafin" value="<?php echo $data['c']['fechafin'] ?>">
            </div>

          
            
             <div class="form-group">
              <label for="pagado">Estatus de pago</label>
              <select type="text" class="form-control" id="estatus" name="estatus">
              <option value="<?php echo $data['c']['estatus'] ?>"><?php echo $data['c']['estatus'] ?></option>
                <option value="">Seleciona una opción...</option>
                <option value="pagado">Pagado</option>
                <option value="no pagado">No pagada</option>
              </select>
            </div>
            
              <div class="form-group">
              <label for="pagado">Fecha en la que se hizo el pago</label>
              <input type="date" class="form-control" id="pagado" name="pagado" value="<?php echo $data['c']['pagado'] ?>">
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
