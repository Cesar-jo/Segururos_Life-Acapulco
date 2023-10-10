
  <?php require_once 'includes/inc_header.php' ?>
 <?php require_once 'includes/inc_navbar.php' ?>

 <!-- Content -->
<div class="container-fluid" style="padding: 150px 20px;">
  <div class="row">
    <!-- Game list -->
    <div class="col-xl-12">
      <h1 class="text-center mb-5"><?php echo $data['title']; ?></h1>


      <!--Inicio del filtro de busca -- acordion  -->
      <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fa fa-filter" aria-hidden="true"></i>
         Filtro de busqueda
        </button>
      </h5>
    </div>


    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      <form class=""  method="POST" id="formfiltro" name="formfiltro">
      <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="">Desde</label>
      <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" placeholder="Fecha de inicio" >
      </div>
   

    <div class="col-md-4 mb-3">
      <label for="">Hasta</label>
      <input type="date" class="form-control" id="fecha_final" name="fecha_final" placeholder="Fecha final" >
      </div>
  
    
     <div class="col-md-4 mb-3">
              <label for="tipo_transaccion">Tipo de movimiento</label>
              <select  id="tipo_transaccion" class="form-control rounded shadow" name="tipo_transaccion">
              <option value="">Seleciona una opción...</option>
                <?php foreach (get_transacciones() as $t): ?>
                  <option value="<?php echo $t['nombre'] ?>"><?php echo $t['nombre'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="col-md-4 mb-3">
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


            <div class="col-md-4 mb-3">
              <label for="Cuenta contable">Metodo de pago</label>
              <select  id="pago" class="form-control rounded shadow" name="pago">
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

            <div class="col-md-4 mb-3">
              <label for="inmueble">Imueble</label>
              <select class="form-control rounded shadow" id="inmueble" name="inmueble">
                <option value="">Seleciona una opción...</option>
                <?php foreach (get_inmuebles($id_user) as $r): ?>
                  <option value="<?php echo $r['Nombre'] ?>"><?php echo $r['Nombre'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

             

            <button type="submit" style="font-size: 12px;"  class="btn rounded shadow btn-outline-primary">Aplicar Filtros</button>

    </div>
    </form>

    </div>
    </div>
  </div>
  </div>
  
  <br><br>

  <?php 
  require 'conexion.php';
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_final = $_POST['fecha_final'];
$id_usuario = cur_user()['id'];

$query1 = "SELECT SUM(monto) AS count FROM cuentas_porpagar WHERE id_usuario = '$id_usuario' and estatus IN ('pagada') ";
$duracion1 = $mysql ->query($query1);
$recorrido1 =$duracion1->fetch_array(); 
$total1 = $recorrido1['count'];

$query = "SELECT SUM(monto) AS count FROM cuentas_porpagar WHERE fecha BETWEEN '{$fecha_inicio}' AND '{$fecha_final}'
AND id_usuario = '$id_usuario' and estatus IN ('pagada') ";
$duracion = $mysql ->query($query);
$recorrido =$duracion->fetch_array(); 
$total = $recorrido['count'];

echo " <div class='col-md-offset-5 col-md-7 text-right'>
<div class='text-danger col-md-4 float-right'>Gastos mensuales: $$total</div>
<div class='text-muted col-md-4 float-right'>Balance mensual: $</div>   

<div class='text-danger col-md-4'>Gastos general: $$total1</div>
<div class='text-muted col-md-4'>Balance general: $</div>  
</div>";
 ?>

<!--
  <div class="col-md-offset-5 col-md-7 text-right">
    <div class="text-primary col-md-4">Ingresos: 3157515.75</div>
    <div class="text-danger col-md-4">Gastos: 1599987.83</div>
    <div class="text-muted col-md-4">Balance: 1557527.92</div>   
   </div>
                -->


<div class="table-responsive">
  <table class="table shadow rounded">
<thead class="table-ligh">
<tr>
 <th scope="col" style="font-size: 12px;">ID</th>
 <th scope="col" style="font-size: 12px;">Fecha</th>
   <th scope="col" style="font-size: 12px;">Titulo</th>
   <th scope="col" style="font-size: 12px;">Inmueble</th>
   <th scope="col" style="font-size: 12px;">Concepto</th>
   <th scope="col" style="font-size: 12px;">cuenta</th>
   <th scope="col" style="font-size: 12px;">Tipo de movimiento</th>
   <th scope="col" style="font-size: 12px;">Pago</th>
   <th scope="col" style="font-size: 12px;">Monto</th>
   <!-- <th scope="col" style="font-size: 12px;">Gasto</th>
   <th scope="col" style="font-size: 12px;">Ingreso</th> -->
 </tr>
</thead>
<tbody>

  <?php
include 'conexion.php';


$fecha_inicio = $_POST['fecha_inicio'];
$fecha_final = $_POST['fecha_final'];
//$tipo_transaccion = $_POST['tipo_transaccion'];
//$cuenta_contable = $_POST['cuenta_contable'];
//$pago = $_POST['pago'];
//$inmueble = $_POST['inmueble'];

$id_usuario = cur_user()['id'];


$datos = $mysql->query("SELECT * FROM cuentas_porpagar 
WHERE fecha BETWEEN '{$fecha_inicio}' AND '{$fecha_final}'
AND id_usuario = '$id_usuario' and estatus IN ('pagada') ")or die($mysql -> error); 
  
     ?> 

     <?php  while  ($lista= mysqli_fetch_array($datos)){ ?>
          
      <tr>
            
  <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $lista['id'];?></span></p></th>
  <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $lista['fecha'];?></span></p></th>
  <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $lista['titulo'];?></span></p></th>
  <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $lista['inmueble'];?></span></p></th>
  <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $lista['concepto'];?></span></p></th>
  <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $lista['cuenta_contable'];?></span></p></th>
  <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $lista['tipo_transaccion'];?></span></p></th>
  <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $lista['pago'];?></span></p></th>
  <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $lista['monto'];?></span></p></th>
 <!-- <th><p class="mb-0" style="font-size: 11px;"><span><?php echo$lista['monto'];?></span></p></th> 
  <th><p class="mb-0" style="font-size: 11px;"><span><?php echo$lista['monto'];?></span></p></th>  -->
  </tr>
 
 
      <?php }  ?>
 <!-- </section> -->
 </tbody>
</table>
</div>
  <!-- Fin del apartado filtro de busqueda-->

   



    
      </div>
  </div>
</div>
 
  <?php  require_once 'includes/inc_footer.php' ?>

  