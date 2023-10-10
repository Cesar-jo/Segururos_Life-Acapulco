
  <?php require_once 'includes/inc_header.php' ?>
 <?php require_once 'includes/inc_navbar.php' ?>

 <!-- Content -->
<div class="container" style="padding: 150px 20px;">
  <div class="row">
    <!-- Game list -->
    <div class="col-xl-12">
      <h1 class="text-center mb-5"><?php echo $data['title']; ?></h1>
     

      <form method="POST" class="col-md-12 table-responsive">
      <?php if (cur_user()['rol'] == 1): ?>
        <?php if ($data['tipo_transaccion']): ?>
      
      <a href="add_transaccion.php" style="font-size: 12px;" class="btn rounded shadow btn-outline-success">Agregar cuenta</a><br><br>
         
     <table class="table shadow rounded">
<thead class="table-primary">
<tr>
 <th scope="col" style="font-size: 12px;">ID</th>
   <th scope="col" style="font-size: 12px;">Nombre</th>
   <th scope="col" style="font-size: 12px;">Flujo contable</th>
   <th scope="col" style="font-size: 12px;">Editar</th>
   <th scope="col" style="font-size: 12px;">Eliminar</th>
 </tr>
</thead>
<tbody>


<?php foreach ($data['tipo_transaccion'] as $c): ?>
    
     <tr>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['id']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['nombre']; ?></span></p></th>
         <th><p class="mb-0" style="font-size: 11px;"><span><?php echo $c['flujo_contable']; ?></span></p></th>
         <th><a class="btn btn-sm btn-success rounded shadow" style="font-size: 12px;" href="<?php echo 'update_transaccion.php?id='.$c['id']; ?>" title="Editar cuenta"><i class="fas fa-edit"></i></a></th>
         <th><button class="btn btn-sm btn-danger do_delete_transaccion" style="font-size: 12px;" data-id="<?php echo $c['id']; ?>"><i class="fas fa-trash"></i></button></th>

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
        <img class="img-fluid" src="<?php echo IMAGES.'transaccion.png' ?>" alt="No hay productos" style="width: 100px;">
        <p class="mt-3 text-muted">No tienes ningun movimiento contable, intenta agregando el primero</p>
        <a href="add_transaccion.php" class="mt-5 btn btn-primary btn-lg rounded">Agregar nueva cuenta contable</a>
      </div>
      <?php endif; ?>


      <?php endif; ?>
      </div>
  </div>
</div>
 

  <?php require_once 'includes/inc_footer.php' ?>

  