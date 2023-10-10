<?php require_once 'includes/inc_header.php' ?>
<?php require_once 'includes/inc_navbar.php' ?>

<!-- Content -->
<div class="container" style="padding: 150px 0px;">
  <div class="row">
    <div class="offset-xl-3 col-xl-6">
      <div class="card rounded shadow">
        <div class="card-body">
          <h2 class="text-center mb-5"><?php echo $data['title']; ?></h2>
         
          <form id="do_update_transaccion">
          <input type="hidden" name="id" value="<?php echo $data['tipo_transaccion']['id']; ?>">
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control rounded shadow" id="nombre" name="nombre" value="<?php echo $data['tipo_transaccion']['nombre'] ?>">
            </div>
        
            <div class="form-group">
              <label for="Flujo contable">Flujo contable</label>
              <select  id="flujo_contable" class="form-control rounded shadow" name="flujo_contable">
                <option value="<?php echo $data['tipo_transaccion']['flujo_contable'] ?>"><?php echo $data['tipo_transaccion']['flujo_contable'] ?></option>
                <option value="">Seleciona una opción...</option>
                    <option value="Gasto">Gasto</option>
                    <option value="Ingreso">Ingreso</option>
              </select>
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