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
          <form id="do_add_porpagar">
            <div class="form-group">
              <label for="titulo">Titulo</label>
              <input type="text" class="form-control rounded shadow" id="nombre" name="nombre">
            </div>
           
            <div class="form-group">
              <label for="fecha">fecha</label>
              <input type="date" class="form-control rounded shadow" id="fecha" name="fecha">
            </div>

            <div class="form-group">
              <label for="tipo_transaccion">Tipo de movimiento</label>
              <select  id="tipo_transaccion" class="form-control rounded shadow" name="tipo_transaccion">
              <option value="">Seleciona una opción...</option>
                <?php foreach (get_transacciones() as $t): ?>
                  <option value="<?php echo $t['nombre'] ?>"><?php echo $t['nombre'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group">
              <label for="Cuenta contable">Cuenta contable</label>
              <select  id="cuenta_contable" class="form-control rounded shadow" name="cuenta_contable">
                <option value="">Selecione una opción...</option>
<option value="Caja">Caja</option>
<option value="Bancos">Bancos</option>
<option value="Pago de impuestos provisionales">Pago de impuestos provisionales</option>
<option value="Maquinaria y equipo">Maquinaria y equipo</option>
<option value="Sueldos y Salarios">Sueldos y Salarios</option>
<option value="Teléfono e Internet">Teléfono e Internet</option>
<option value="Agua">Agua</option>
<option value="Luz">Luz</option>
<option value="Comisiones sobre ventas">Comisiones sobre ventas </option>
<option value="Mantenimiento y conservación">Mantenimiento y conservación</option>
              </select>
            </div>


            <div class="form-group">
              <label for="estatus">Estatus</label>
              <select  id="estatus" class="form-control rounded shadow" name="estatus">
                <option value="">Seleciona una opción...</option>
                    <option value="pagada">pagada</option>
                    <option value="no pagada">no pagada</option>
              </select>
            </div>

            <div class="form-group">
              <label for="pago">Pago</label>
              <select  id="pago" class="form-control rounded shadow" name="pago">
                <option value="">Seleciona una opción...</option>
                    <option value="Efectivo">Efectivo</option>
                    <option value="Tarjeta">Tarjeta</option>
              </select>
            </div>


            <div class="form-group">
              <label for="monto">Monto</label>
              <input type="number" class="form-control rounded shadow" id="gasto" name="gasto">
            </div>


            <div class="form-group">
              <label for="inmueble">Imueble</label>
              <select class="form-control rounded shadow" id="inmueble" name="inmueble">
                <option value="">Seleciona una opción...</option>
                <?php foreach (get_inmuebles($id_user) as $r): ?>
                  <option value="<?php echo $r['Nombre'] ?>"><?php echo $r['Nombre'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="concepto">Concepto</label>
              <textarea name="concepto" id="concepto" cols="20" rows="5" class="form-control rounded shadow">Escriba un concepto...</textarea>
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