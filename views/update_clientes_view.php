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
              <label for="curp">CURP</label>
              <input type="text" class="form-control" id="curp" name="curp" value="<?php echo $data['c']['curp'] ?>">
            </div>
            <div class="form-group">
              <label for="rfc">RFC</label>
              <input type="text" class="form-control" id="rfc" name="rfc" value="<?php echo $data['c']['rfc'] ?>">
            </div>

            <div class="form-group">
              <label for="direccion">Dirección</label>
              <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $data['c']['direccion'] ?>">
            </div>
            


            <div class="form-group">
              <label for="fecha">Fecha de inicio</label>
              <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $data['c']['fecha'] ?>">
            </div>


            <div class="form-group">
              <label for="venc_contrato">Vencimiento de contrato</label>
              <input type="date" class="form-control" id="venc_contrato" name="venc_contrato" value="<?php echo $data['c']['venc_contrato'] ?>">
            </div>

            <div class="form-group">
              <label for="venc_factura">Vencimiento de factura</label>
              <input type="date" class="form-control" id="venc_factura" name="venc_factura" value="<?php echo $data['c']['venc_factura'] ?>">
            </div>

            <div class="form-group">
              <label for="factura">Factura</label>
              <select type="text" class="form-control" id="factura" name="factura">
              <option value="<?php echo $data['c']['factura'] ?>"><?php echo $data['c']['factura'] ?></option>
                <option value="">Seleciona una opción...</option>
                <option value="pagada">Pagada</option>
                <option value="no pagada">No pagada</option>
              </select>
            </div>

            <div class="form-group">
              <label for="contrato">Contrato</label>
              <select type="text" class="form-control" id="contrato" name="contrato">
              <option value="<?php echo $data['c']['contrato'] ?>"><?php echo $data['c']['contrato'] ?></option>
                <option value="">Seleciona una opción...</option>
                <option value="pagada">Pagada</option>
                <option value="no pagada">No pagada</option>
              </select>
            </div>

            <div class="form-group">
              <label for="inmueble">Inmueble</label>
              <select class="form-control rounded shadow" id="inmueble" name="inmueble">
                <option value="<?php echo $data['c']['inmueble'] ?>"><?php echo $data['c']['inmueble'] ?></option>
                <option value="">Seleciona una opción...</option>
                <?php foreach (get_inmuebles($id_user) as $r): ?>
                  <option value="<?php echo $r['Nombre'] ?>"><?php echo $r['Nombre'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

          

            <div class="form-group">
              <label for="Pago">Pago</label>
              <select  id="pago" class="form-control rounded shadow" name="pago">
              <option value="<?php echo $data['c']['pago'] ?>"><?php echo $data['c']['pago'] ?></option>
                <option value="">Selecione una opción...</option>
                <option value="Efectivo">Efectivo</option>
<option value="Tarjeta">Tarjeta</option>
<option value="Tarjeta de débito">Tarjeta de débito</option>
<option value="Transferencia bancaria">Transferencia bancaria</option>
<option value="MercadoPago">MercadoPago</option>
<option value="NA">NA</option>
<option value="PayPal">PayPal</option>
<option value="Descuento nómina">Descuento nómina</option>
<option value="Cheque Bancario">Cheque Bancario</option>
<option value="Cuentas por cobrar">Cuentas por cobrar</option>
<option value="Banregio">Banregio</option>
<option value="Amexco (American Express)">Amexco (American Express)</option>
<option value="PlacetoPay">PlacetoPay</option>
<option value="PayU">PayU</option>
<option value="OpenPay">OpenPay</option>
              </select>
            </div>

            <div class="form-group">
              <label for="monto">Monto</label>
              <input type="text" class="form-control" id="monto" name="monto" value="<?php echo $data['c']['monto'] ?>">
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
