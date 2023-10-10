
  <?php require_once 'includes/inc_header.php' ?>
 <?php require_once 'includes/inc_navbar.php' ?>

 <!-- Content -->
<div class="container-fluid" style="padding: 150px 20px;">
  <div class="row">
    <!-- Game list -->
    <div class="col-xl-12">
      <h1 class="text-center mb-5"><?php echo $data['title']; ?></h1>
     

      <form method="POST" class="col-md-12 table-responsive">
      <?php if (cur_user()['rol'] == 1): ?>
        <?php if ($data['clientes']): ?>
      
      <a href="add_clientes.php" style="font-size: 12px;" class="btn rounded shadow btn-outline-success">Agregar clientes</a><br><br>
         
     <table class="table shadow rounded">
<thead class="table-primarys">
<tr>
 <th scope="col" style="font-size: 12px;">ID</th>
   <th scope="col" style="font-size: 12px;">Nombre</th>
   <th scope="col" style="font-size: 12px;">Fecha_inicio</th>
   <th scope="col" style="font-size: 12px;">Ven_factura</th>
   <th scope="col" style="font-size: 12px;">Ven_contrato</th>
   <th scope="col" style="font-size: 12px;">Facturacion</th>
   <th scope="col" style="font-size: 12px;">Contratacion</th>
   <th scope="col" style="font-size: 12px;">Inmueble</th>
   <th scope="col" style="font-size: 12px;">Contrato</th>
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
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['fecha']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['venc_factura']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['venc_contrato']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['factura']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['contrato']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['inmueble']; ?></span></p></th>


<th><a class="btn btn-sm btn-primary rounded shadow" style="font-size: 12px;" href="<?php echo 'contrato.php?id='.$c['id']; ?>" title="Contrato"><i class="fas fa-file-contract"></i> Contrato</a></th>

         <th><a class="btn btn-sm btn-success rounded shadow" style="font-size: 12px;" href="<?php echo 'https://wa.me/'.$c['telefono']; ?><?php echo '?text=%20Hola%20'.$c['nombre']; ?><?php echo '%20Su%20contrato%20vence%20el%20'.$c['venc_contrato']; ?><?php echo '%20y%20su%20factura%20el%20'.$c['venc_factura']; ?>" title="Enviar"><i class="fab fa-whatsapp"></i> Enviar</a></th>
         <th><a class="btn btn-sm btn-success rounded shadow" style="font-size: 12px;" href="<?php echo 'update_clientes.php?id='.$c['id']; ?>" title="editar cliente"><i class="fas fa-edit"></i></a></th>
         <th><button class="btn btn-sm btn-danger do_delete_clientes" style="font-size: 12px;" data-id="<?php echo $c['id']; ?>"><i class="fas fa-trash"></i></button></th>

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
        <img class="img-fluid" src="<?php echo IMAGES.'agregar_cliente.png' ?>" alt="No hay productos" style="width: 100px;">
        <p class="mt-3 text-muted">No tienes clientes Agregados, intenta agregando el primero</p>
        <a href="add_clientes.php" class="mt-5 btn btn-primary btn-lg rounded">Agregar nuevo cliente</a>
      </div>
      <?php endif; ?>


      <?php endif; ?>
      </div>
  </div>
</div>
 

  <?php require_once 'includes/inc_footer.php' ?>

  