
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
         Información del cliente
        </button>
      </h5>
    </div>


    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
          
          
 <?php
include 'conexion.php';

$id = $_GET['id'];

$datos1 = $mysql->query("SELECT * FROM clientes 
WHERE id = '$id' ")or die($mysql -> error); 

  ?> 
  
  <div class="table-responsive">
 <table class="table table-sm">
  <thead>
    <tr>
      <th scope="col" style="font-size: 12px;">#</th>
      <th scope="col" style="font-size: 12px;">Nombre</th>
            <th scope="col" style="font-size: 12px;">Inmueble</th>
      <th scope="col" style="font-size: 12px;">Fecha de inicio</th>
      <th scope="col" style="font-size: 12px;">Fecha fin</th>
       <th scope="col" style="font-size: 12px;">Monto mensual</th>
    </tr>
  </thead>
  <tbody>
      
       <?php  while  ($c= mysqli_fetch_array($datos1)){ ?>
       
       
    <tr>
      <th scope="row" style="font-size: 12px;"><?php echo $c['id']; ?></th>
      <td style="font-size: 12px;"><?php echo $c['nombre']; ?></td>
        <td style="font-size: 12px;"><?php echo $c['inmueble']; ?></td>
      <td style="font-size: 12px;"><?php echo $c['fecha']; ?></td>
      <td style="font-size: 12px;"><?php echo $c['venc_factura']; ?></td>
       <td style="font-size: 12px;">$<?php echo number_format($c['monto'], 2, '.', ''); ?> MX</td>
    </tr>
    
    <?php } ?>
  
  </tbody>
</table>   
</div>
 
 
 
    </div>
    </div>
  </div>
  </div>

  <br><br>


      <form method="POST" class="col-md-12 table-responsive">
      <?php if (cur_user()['rol'] == 1): ?>
       
      
      <a href="clientes.php" style="font-size: 12px;" class="btn rounded shadow btn-outline-success">Agregar informe</a><br><br>
         
     <table class="table shadow rounded">
<thead class="table-primarys">
<tr>
<!-- <th scope="col" style="font-size: 12px;">ID</th>
   <th scope="col" style="font-size: 12px;">ID_USUARIO</th> -->
   <th scope="col" style="font-size: 12px;">Nombre</th>
   <th scope="col" style="font-size: 12px;">Pagos</th>
   <th scope="col" style="font-size: 12px;">Estatus</th>
   <th scope="col" style="font-size: 12px;">Monto</th>
   <th scope="col" style="font-size: 12px;">Inmueble</th>
  <th scope="col" style="font-size: 12px;">Pagado</th>
   <th scope="col" style="font-size: 12px;">Editar</th>
   <th scope="col" style="font-size: 12px;">Eliminar</th>
 </tr>
</thead>
<tbody>


 <?php
include 'conexion.php';

$id_usuario = $_GET['id'];

// apartado sumar el monto
/*
$query = "SELECT SUM(monto) FROM informes_clientes WHERE id_usuario = '$id_usuario' AND estatus = 'pagado' ";
	$resultado = $mysql->query($query);

    $row = $resultado->fetch_assoc();
    
    $total = $row['monto'];
    
    $iva = .16;
    $r = $total * $iva;
    $subtotal = $total - $r;

*/

// fin


$datos = $mysql->query("SELECT * FROM informes_clientes 
WHERE id_usuario = '$id_usuario' ")or die($mysql -> error); 

  ?> 
     

     <?php  while  ($c= mysqli_fetch_array($datos)){ ?>
    
     <tr>
        <!-- <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['id']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['id_usuario']; ?></span></p></th> -->
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['nombre']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['fecha']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['estatus']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span>$<?php echo number_format($c['monto'], 2, '.', ''); ?> MX</span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['inmueble']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['pagado']; ?></span></p></th>

         <th><a class="btn btn-success rounded shadow" style="font-size: 12px;" href="<?php echo 'update_pagos.php?id='.$c['id']; ?>" title="editar cliente"><i class="fas fa-edit"></i></a></th>
         <th><button class="btn btn-danger do_delete_pagos" style="font-size: 12px;" data-id="<?php echo $c['id']; ?>"><i class="fas fa-trash"></i></button></th>

         <?php } ?>

</tr>
</tbody>
</table>
</form>


    
      
      
       <!----------------------- Total ------------------------->
       

        <!--
    $iva = .16;
    $r = $total * $iva;
    $subtotal = $total - $r;
   -->
   
     <?php
   
   include 'conexion.php';

$id_usuario = $_GET['id'];
   
   $query = "SELECT SUM(monto) as count FROM informes_clientes WHERE id_usuario = '$id_usuario' AND estatus = 'pagado' ";
	$resultado = $mysql->query($query);

    $row = $resultado->fetch_assoc();
    
    $total = $row['count'];
    
    $iva = .16;
    $r = $total * $iva;
    $subtotal = $total - $r;
    
   
   
   ?>
   
       
            <div class="row justify-content-center container-fluid">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12 text-center border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Informe de pago</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <span class="text-primary">$<?php echo number_format($total, 2, '.', ''); ?> MX</span>
                  </div>
                </div>
                
                  <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">IVA 16%</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <span class="text-danger">$<?php echo number_format($r, 2, '.', ''); ?> MX</span>
                  </div>
                </div>

<hr/>

                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                   <span class="text-success">$<?php echo number_format($subtotal, 2, '.', ''); ?> MX</span>
                 
                  </div>
                </div>
                
              <?php endif; ?>

    
  </div>
</div>
 
 <!------------------------------------------------>
 
   

      </div>
  </div>
</div>
 

  <?php require_once 'includes/inc_footer.php' ?>

  