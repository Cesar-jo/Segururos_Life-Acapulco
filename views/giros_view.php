
  <?php require_once 'includes/inc_header.php' ?>
 <?php require_once 'includes/inc_navbar.php' ?>

 <!-- Content -->
<div class="container-fluid" style="padding: 150px 20px;">
  <div class="row">
    <!-- Game list -->
    <div class="col-xl-12">
      <h1 class="text-center mb-5"><?php echo $data['title']; ?></h1>
      
      <?php if (cur_user()['rol'] == 1): ?>
        <?php if ($data['clientes']): ?>
      
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
          <div class="col-md-6 mb-3 container">
      <div class="form-group">
      <input type="text" class="form-control" id="nommbre" name="nombre" placeholder="Nombre del cliente" >
      </div>
      
   <div class="col-md-6 mb-3 container">
      <div class="form-group">
    <button class="btn rounded shadow btn-outline-primary btn-sm form-control" type="submit">
            <i class="fas fa-search"></i> Buscar</button>
            </div>
            </div>

    </div>
    </form>
    
  
      
      
      

    </div>
    </div>
  </div>
  </div>
  
  <br><br>
      
     

      <form method="POST" class="col-md-12 table-responsive">
      
      
      <a href="add_clientes.php" style="font-size: 12px;" class="btn rounded shadow btn-outline-success">Agregar clientes</a><br><br>
         
     <table class="table shadow rounded">
<thead class="table-primarys">
<tr>
  <th scope="col" style="font-size: 12px;">#Cadena</th>
   <th scope="col" style="font-size: 12px;">Descripción</th>
   <th scope="col" style="font-size: 12px;">Estatus</th>
  <!-- <th scope="col" style="font-size: 12px;"><i class="fab fa-whatsapp"></i> Enviar</th> -->
   <th scope="col" style="font-size: 12px;">Informe</th>
   <th scope="col" style="font-size: 12px;">Editar</th>
   <th scope="col" style="font-size: 12px;">Eliminar</th>
 </tr>
</thead>
<tbody>
    
    
    
      <?php
include 'conexion.php';


 $nombre = $_POST['nombre'];  


$id_usuario = cur_user()['id'];


$datos = $mysql->query("SELECT * FROM clientes WHERE nombre LIKE '%$nombre%'
AND estatus IN ('Cierre de contrato')
AND factura IN ('pagada')    
AND contrato IN ('pagada') 
AND id_usuario = '$id_usuario' ") or die($mysql -> error); 


  
     ?> 
     


     <?php  while  ($lista= mysqli_fetch_array($datos)){ ?>
          
      <tr>

         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $lista['id']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $lista['nombre']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $lista['estatus']; ?></span></p></th>

        <!-- <th><a class="btn btn-outline-success rounded shadow" style="font-size: 13px;" href="<?php echo 'https://wa.me/'.$lista['telefono']; ?><?php echo '?text=%20Hola%20'.$lista['nombre']; ?><?php echo '%20Su%20contrato%20vence%20el%20'.$lista['venc_contrato']; ?>  <?php echo '%20y%20su%20factura%20el%20'.$lista['venc_factura']; ?>" title="Enviar"><i class="fab fa-whatsapp"></i> Enviar</a></th> -->
         
            <th><a class="btn btn-primary rounded shadow" style="font-size: 13px;" href="<?php echo 'informes_clientes.php?id='.$lista['id']; ?>" title="Informe"> <i class="fas fa-eye"></i></a></th>
         
         <th><a class="btn btn-success rounded shadow" style="font-size: 12px;" href="<?php echo 'update_clientes.php?id='.$lista['id']; ?>" title="editar cliente"><i class="fas fa-edit"></i></a></th>
         <th><button class="btn btn-danger do_delete_clientes" style="font-size: 12px;" data-id="<?php echo $lista['id']; ?>"><i class="fas fa-trash"></i></button></th>
  </tr>
 
 
      <?php }  ?>
      
     

      
      </tr>
</tbody>
</table>
</form>
    
    
    

<!--
<?php foreach ($data['clientes'] as $c): ?>
    
     <tr>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['id']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['nombre']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['telefono']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['fecha']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['venc_factura']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['venc_contrato']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['inmueble']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['pago']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span>$<?php echo $c['monto']; ?></span></p></th>


  <th><a class="btn btn-success rounded shadow" style="font-size: 13px;" href="<?php echo 'pagos.php?id='.$c['id']; ?>" title="Pagos"><i class="fas fa-handshake"></i> Pagos</a></th>


         <th><a class="btn btn-primary rounded shadow" style="font-size: 13px;" href="<?php echo 'factura.php?id='.$c['id']; ?>" title="Factura"> <i class="fas fa-file-contract"></i> Factura</a></th>


         <th><a class="btn btn-outline-success rounded shadow" style="font-size: 13px;" href="<?php echo 'https://wa.me/'.$c['telefono']; ?><?php echo '?text=%20Hola%20'.$c['nombre']; ?><?php echo '%20Su%20contrato%20vence%20el%20'.$c['venc_contrato']; ?><?php echo '%20y%20su%20factura%20el%20'.$c['venc_factura']; ?>" title="Enviar"><i class="fab fa-whatsapp"></i> Enviar</a></th>
         
            <th><a class="btn btn-primary rounded shadow" style="font-size: 13px;" href="<?php echo 'informes_clientes.php?id='.$c['id']; ?>" title="Informe"> <i class="fas fa-eye"></i></a></th>
         
         <th><a class="btn btn-success rounded shadow" style="font-size: 12px;" href="<?php echo 'update_clientes.php?id='.$c['id']; ?>" title="editar cliente"><i class="fas fa-edit"></i></a></th>
         <th><button class="btn btn-danger do_delete_clientes" style="font-size: 12px;" data-id="<?php echo $c['id']; ?>"><i class="fas fa-trash"></i></button></th>

         <?php endforeach; ?>

</tr>
</tbody>
</table>
</form>
-->


      <!-- <div class="row">
        <div class="col-xl-12 col-12">
          <?php if ($data['pagination']): ?>
            <?php echo $data['pagination']; ?>
          <?php endif; ?>
        </div>
      </div>
-->


      <?php else: ?>
      <div class="text-center py-5">
        <img class="img-fluid" src="<?php echo IMAGES.'add_cliente.jfif' ?>" alt="No hay productos" style="width: 100px;">
        <p class="mt-3 text-muted">No tienes clientes Agregados, intenta agregando el primero</p>
        <a href="add_clientes.php" class="mt-5 btn btn-primary btn-lg rounded">Agregar nuevo cliente</a>
      </div>
      <?php endif; ?>


      <?php endif; ?>
      </div>
  </div>
</div>
 

  <?php require_once 'includes/inc_footer.php' ?>

  