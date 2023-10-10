
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
    <div class="col-md-6 mb-3">
      <label for="">Desde</label>
      <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" placeholder="Fecha de inicio" >
      </div>

    <div class="col-md-6 mb-3">
      <label for="">Hasta</label>
      <input type="date" class="form-control" id="fecha_final" name="fecha_final" placeholder="Fecha final" >
      </div>

    <button class="btn rounded shadow btn-outline-primary btn-sm" type="submit">
            <i class="fas fa-search"></i> Buscar</button>

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

//APARTADO DE SUMATORIA GENERAL DE INGRESOS 

$query1 = "SELECT SUM(monto) AS count FROM clientes WHERE id_usuario = '$id_usuario' and estatus IN ('Cierre de contrato') 
AND factura = 'pagada' AND contrato = 'pagada' ";
$duracion1 = $mysql ->query($query1);
$recorrido1 =$duracion1->fetch_array(); 
$total2 = $recorrido1['count'];

$query2 = "SELECT SUM(gasto) AS count FROM clientes WHERE id_usuario = '$id_usuario' and estatus = 'pagada' ";
$duracion2 = $mysql ->query($query2);
$recorrido2 =$duracion2->fetch_array(); 
$gasto = $recorrido2['count'];

//-------------------------------------

// APARTADO FILTRADO DE BUSQUEDA POR FECHAS 

$query = "SELECT SUM(monto) AS count FROM clientes WHERE fecha BETWEEN '{$fecha_inicio}' AND '{$fecha_final}'
AND id_usuario = '$id_usuario' and estatus IN ('Cierre de contrato') 
AND factura = 'pagada' AND contrato = 'pagada' ";
$duracion = $mysql ->query($query);
$recorrido =$duracion->fetch_array(); 
$total = $recorrido['count'];

$query3 = "SELECT SUM(gasto) AS count FROM clientes WHERE fecha BETWEEN '{$fecha_inicio}' AND '{$fecha_final}'
AND id_usuario = '$id_usuario' and estatus ='pagada' ";
$duracion3 = $mysql ->query($query3);
$recorrido3 =$duracion3->fetch_array(); 
$gasto2 = $recorrido3['count'];

//------------------------------------------
$n1 = $gasto;
$n2 = $total2;
$balance_general = $n2 - $n1 ;

$n3 = $gasto2;
$n4 = $total;
$balance_x_fecha = $n3 - $n4;

echo " <div class='col-md-offset-5 col-md-7 '>
<div class='text-primary col-md-4 float-right'>Ingresos por mes: $$total</div>
<div class='text-danger col-md-4 float-right'>Gasto por mes: $$gasto2</div>
<div class='text-muted col-md-4 float-right'>Balance por mes: $$balance_x_fecha</div>  
<div class='text-primary col-md-4 float-right'>Ingreso general: $$total2</div>
<div class='text-danger col-md-4 float-right'>Gasto general: $$gasto</div>   
<div class='text-muted col-md-4 float-right'>Balance general: $$balance_general</div> 
</div> ";


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
   <th scope="col" style="font-size: 12px;">Nombre</th>
   <th scope="col" style="font-size: 12px;">Inmueble</th>
   <th scope="col" style="font-size: 12px;">cuenta</th>
   <th scope="col" style="font-size: 12px;">Tipo de movimiento</th>
   <th scope="col" style="font-size: 12px;">Pago</th>
   <th scope="col" style="font-size: 12px;">Ingreso</th>
   <th scope="col" style="font-size: 12px;">Gasto</th>
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


$datos = $mysql->query("SELECT * FROM clientes 
WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_final'
AND id_usuario = '$id_usuario' AND estatus IN ('Cierre de contrato', 'pagada')
AND factura IN ('pagada', '') AND contrato IN ('pagada', '') ")or die($mysql -> error); 
  
     ?> 

     <?php  while  ($lista= mysqli_fetch_array($datos)){ ?>
          
      <tr>
            
  <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $lista['id'];?></span></p></th>
  <th><p class="mb-0" style="font-size: 11px;"><span><?php echo$lista['fecha'];?></span></p></th>
  <th><p class="mb-0" style="font-size: 11px;"><span><?php echo$lista['nombre'];?></span></p></th>
  <th><p class="mb-0" style="font-size: 11px;"><span><?php echo$lista['inmueble'];?></span></p></th>
  <th><p class="mb-0" style="font-size: 11px;"><span><?php echo$lista['cuenta_contable'];?></span></p></th>
  <th><p class="mb-0" style="font-size: 11px;"><span><?php echo$lista['tipo_transaccion'];?></span></p></th>
  <th><p class="mb-0" style="font-size: 11px;"><span><?php echo$lista['pago'];?></span></p></th>
  <th><p class="mb-0" style="font-size: 11px;"><span><?php echo$lista['monto'];?></span></p></th>
  <th><p class="mb-0" style="font-size: 11px;"><span><?php echo$lista['gasto'];?></span></p></th> 
 <!-- <th><p class="mb-0" style="font-size: 11px;"><span><?php echo$lista['monto'];?></span></p></th>  -->
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

  
  