<?php require_once 'includes/inc_header.php' ?>
<?php require_once 'includes/inc_navbar.php' ?>

<!-- Content -->
<div class="container" style="padding: 150px 0px;">
  <div class="row">
    <div class="offset-xl-3 col-xl-6">
      <div class="card shadow rounded">
        <div class="card-body">
          <h2 class="text-center mb-5"><?php echo $data['title']; ?></h2>
          <form id="do_update_cliente">
        <!--  <input type="hidden" name="id" value="<?php echo $data['e']['id']; ?>"> -->  
          <div class="form-group">
              <label for="contrato">Nombre</label>
              <select type="text" class="form-control" id="contrato" name="contrato">
              <option value="">Seleciona una empresa...</option>
                <option value="">0</option>
                <option value="pagada">1</option>
                <option value="no pagada">2</option>
              </select>
            </div>
           
            <div class="form-group">
              <label for="monto">Reg.Fed. de Cont.</label>
              <input type="text" class="form-control" id="monto" name="monto" value="">
            </div>

            <div class="form-group">
              <label for="direccion">Dirección</label>
              <input type="text" class="form-control" id="direccion" name="direccion" value="">
            </div>

        
            <div class="form-group">
              <button id="submit" type="submit" class="btn btn-success">Aceptar</button>
              <button type="reset" class="btn btn-default">Salir</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Content -->

<?php require_once 'includes/inc_footer.php' ?>
