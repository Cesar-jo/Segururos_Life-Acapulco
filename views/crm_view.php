<?php include "includes/inc_navbar.php" ?>
<?php include "includes/inc_header.php" ?>
                <!-- Begin Page Content -->
                <div class="container">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">   </h1>
                       <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Fichas informativas</div>
                                                <?php 
                                     require 'conexion.php';
                                    $id_actual = cur_user()['id'];

                                     $query = "SELECT count(*) as total FROM clientes WHERE estatus = 'Envio de ficha informativa' and id_usuario = $id_actual ";
                                     $duracion = $mysql ->query($query);
                                     $recorrido =$duracion->fetch_array(); 
                                     $total = $recorrido['total'];
                                     $total == + 1;
                                    echo " <div class='h5 mb-0 font-weight-bold text-gray-800'>$total</div>";
                                    ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-file-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                               Cierre de contratos</div>  <?php 
                                     require 'conexion.php';
                                     $id_actual = cur_user()['id'];

                                     $query = "SELECT count(*) as total FROM clientes WHERE estatus = 'Cierre de contrato' and id_usuario = $id_actual  ";
                                     $duracion = $mysql ->query($query);
                                     $recorrido =$duracion->fetch_array(); 
                                     $total = $recorrido['total'];
                                     $total == + 1;
                                    echo " <div class='h5 mb-0 font-weight-bold text-gray-800'>$total</div>";
                                    ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-handshake fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

               
                        
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                               envio de contratos</div>
                                               <?php 
                                     require 'conexion.php';
                                     $id_actual = cur_user()['id'];

                                     $query = "SELECT count(*) as total FROM clientes WHERE estatus = 'Envio de contrato' and id_usuario = $id_actual";
                                     $duracion = $mysql ->query($query);
                                     $recorrido =$duracion->fetch_array(); 
                                     $total = $recorrido['total'];
                                     $total == + 1;
                                    echo " <div class='h5 mb-0 font-weight-bold text-gray-800'>$total</div>";
                                    ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-envelope fa-2x text-gray-300"></i>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Prospectos registrados</div>
                                            <?php 
                                     require 'conexion.php';

                                     $query = "SELECT count(*) as total FROM clientes WHERE estatus = 'negociacion con prospecto' and id_usuario = $id_actual";
                                     $duracion = $mysql ->query($query);
                                     $recorrido =$duracion->fetch_array(); 
                                     $total = $recorrido['total'];
                                     $total == + 1;
                                    echo " <div class='h5 mb-0 font-weight-bold text-gray-800'>$total</div>";
                                    ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <!-- Content Row -->

                    <div class="row">

                     
<!-- Content Column -->
<div class="col-xl-8 col-lg-7">

                    
<!-- Illustrations -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Seguros_Life Acapulco</h6>
    </div>
    <div class="card-body">
        <div class="text-center">
            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="assets/images/Seguros_Life_FONDO.png" alt="...">
        </div>
        <p>!El mejor software de administración, gestión y control de seguros del estado de Guerrero!</p>
       
    </div>
</div>



</div>

            
                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Información</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                    <ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
  Envio de ficha informativa
  <?php 
                                     require 'conexion.php';
                                    $id_actual = cur_user()['id'];

                                     $query = "SELECT count(*) as total FROM clientes WHERE estatus = 'Envio de ficha informativa' and id_usuario = $id_actual ";
                                     $duracion = $mysql ->query($query);
                                     $recorrido =$duracion->fetch_array(); 
                                     $total = $recorrido['total'];
                                     $total == + 1;
                                    echo " <span class='badge badge-primary badge-pill'>$total</span>";
                                    ?>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
  Envio de contratos
  <?php 
                                     require 'conexion.php';
                                    $id_actual = cur_user()['id'];

                                     $query = "SELECT count(*) as total FROM clientes WHERE estatus = 'Envio de contrato' and id_usuario = $id_actual ";
                                     $duracion = $mysql ->query($query);
                                     $recorrido =$duracion->fetch_array(); 
                                     $total = $recorrido['total'];
                                     $total == + 1;
                                    echo " <span class='badge badge-info badge-pill'>$total</span>";
                                    ?>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
  Negociación con prospecto
  <?php 
                                     require 'conexion.php';
                                    $id_actual = cur_user()['id'];

                                     $query = "SELECT count(*) as total FROM clientes WHERE estatus = 'Negociacion con prospecto' and id_usuario = $id_actual ";
                                     $duracion = $mysql ->query($query);
                                     $recorrido =$duracion->fetch_array(); 
                                     $total = $recorrido['total'];
                                     $total == + 1;
                                    echo " <span class='badge badge-warning badge-pill'>$total</span>";
                                    ?>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
  Cierre de contrato de renta con prospecto
  <?php 
                                     require 'conexion.php';
                                    $id_actual = cur_user()['id'];

                                     $query = "SELECT count(*) as total FROM clientes WHERE estatus = 'Cierre de contrato' and id_usuario = $id_actual ";
                                     $duracion = $mysql ->query($query);
                                     $recorrido =$duracion->fetch_array(); 
                                     $total = $recorrido['total'];
                                     $total == + 1;
                                    echo " <span class='badge badge-success badge-pill'>$total</span>";
                                    ?>
 
  </li>
</ul>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i>
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i>
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-warning"></i>
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                    <!-- Content Column -->
                    <div class="col-xl-12 col-lg-8">

                    
<!-- Illustrations -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Prospectos</h6>
    </div>
    <div class="card-body">
        <form method="POST" class=" col-md-12 table-responsive">
      <?php if (cur_user()['rol'] == 1): ?>
        <?php if ($data['clientes']): ?>
      
      <a href="add_clientes.php" style="font-size: 12px;" class="btn rounded shadow btn-outline-success">Agregar clientes</a><br><br>
         
     <table class="table shadow rounded">
<thead class="table-primarys">
<tr>
 <th scope="col" style="font-size: 12px;">ID</th>
   <th scope="col" style="font-size: 12px;">Nombre</th>
   <th scope="col" style="font-size: 12px;">Correo</th>
   <th scope="col" style="font-size: 12px;">Telefono</th>
   <th scope="col" style="font-size: 12px;">Estatus</th>
   <th scope="col" style="font-size: 12px;">Seguro</th>
   <th scope="col" style="font-size: 12px;">Descripción</th>
   <th scope="col" style="font-size: 12px;"><i class="fab fa-whatsapp"></i> enviar</th>
   <th scope="col" style="font-size: 12px;">Editar</th>
   <th scope="col" style="font-size: 12px;">Eliminar</th>
 </tr>
</thead>
<tbody>


<?php foreach ($data['clientes'] as $c): ?>
    
     <tr>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['id']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['nombre']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['correo']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['telefono']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['estatus']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['inmueble']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['descripcion']; ?></span></p></th>
         <th><a class="btn btn-sm btn-outline-success float-right rounded shadow" style="font-size: 12px;" href="<?php echo 'https://wa.me/'.$c['telefono']; echo '?text=%20Hola%20'.$c['nombre'];echo '%20Su%20contrato%20vence%20el%20'.$c['venc_contrato'];echo '%20y%20su%20factura%20el%20'.$c['venc_factura']; ?>" title="Enviar"><i class="fab fa-whatsapp"></i> Enviar</a></th>
         <th><a class="btn btn-sm btn-success float-right rounded shadow" style="font-size: 12px;" href="<?php echo 'update_prospectos.php?id='.$c['id']; ?>" title="editar cliente"><i class="fas fa-edit"></i></a></th>
         <th><button class="btn btn-sm btn-danger float-right do_delete_clientes" style="font-size: 12px;" data-id="<?php echo $c['id']; ?>"><i class="fas fa-trash"></i></button></th>

         <?php endforeach; ?>

</tr>
</tbody>
</table>
</form>



      <div class="row">
        <div class="col-xl-12 col-12">
          <?php if ($data['pagination']): ?>
            <?php echo $data['pagination']; ?>
          <?php endif; ?>
        </div>
      </div>



      <?php else: ?>
      <div class="text-center py-5">
        <img class="img-fluid" src="<?php echo IMAGES.'add_cliente.jfif' ?>" alt="No hay productos" style="width: 100px;">
        <p class="mt-3 text-muted">No tienes prospectos agregados, intenta agregando el primero</p>
        <a href="add_clientes.php" class="mt-5 btn btn-primary btn-lg rounded">Agregar nuevo prospecto</a>
      </div>
      <?php endif; ?>

      <?php endif; ?>
    </div>
</div>



</div>

                        
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include "includes/inc_footer.php" ?>
