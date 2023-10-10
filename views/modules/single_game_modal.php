<!-- Modal -->
<div class="modal fade" id="single_game_modal" tabindex="-1" role="dialog" aria-labelledby="ModalVideojuego" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content rounded">
      <div class="modal-header">
        <h5 class="modal-title"><?php echo $g['Nombre']; ?></h5>
      <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>-->
      </div>
      <div class="modal-body">
       <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-12">





        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo get_image(UPLOADS.$g['foto']); ?>" alt="<?php echo $g['Nombre']; ?>" class="card-img-top" style="height: 350px; object-fit: cover;" alt="...">
    </div>
    <div class="carousel-item">
    <img src="<?php echo get_image(UPLOADS.$g['foto1']); ?>" alt="<?php echo $g['Nombre']; ?>" class="card-img-top" style="height: 350px; object-fit: cover;" alt="...">
    </div>
    <div class="carousel-item">
    <img src="<?php echo get_image(UPLOADS.$g['foto2']); ?>" alt="<?php echo $g['Nombre']; ?>" class="card-img-top" style="height: 350px; object-fit: cover;" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev btn btn-link" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden"></span>
  </button>
  <button class="carousel-control-next btn btn-link" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden"></span>
  </button>
</div>


        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-12">
          <p class="text-warning"><strong><?php echo $g['genero'] ?></strong></p>
          <p class="mt-3"><?php echo $g['descripcion'] ?></p>
          <p class="mt-3"><strong>Estatus: </strong>   <strong class="text-primary"><?php echo $g['estatus'] ?></strong></p>
          <p class="mt-3"><strong>Precio: </strong>  <strong class="text-success">$<?php echo $g['precio'] ?></strong></p>
          <div class="btn-group" role="group">
            <!-- Le decimos que si el id del usuario que registro este producto producto que seleccionamos es igual al id del usuario
          de estqa sesion que pueda editar, borrar el producto y si es diferente el id que no les aparesca los botones de eliminar o editar-->
          <?php if ($g['id_usuario'] == cur_user()['id']): ?> 
            <a class="btn btn-sm btn-success" href="<?php echo 'update.php?id='.$g['id']; ?>" data-toggle="tooltip" title="Editar producto"><i class="fas fa-edit"></i></a>
            <button class="btn btn-sm btn-primary do_share_game" data-toggle="tooltip" title="Compartir producto" data-id="<?php echo $g['id']; ?>"><i class="fas fa-share"></i></button>
          </div>
          <button class="btn btn-sm btn-danger float-right do_delete_game" data-id="<?php echo $g['id']; ?>"><i class="fas fa-trash"></i> Borrar producto</button>
          <?php endif ?> 
          <?php if (cur_user()['rol'] == 0 || cur_user()['rol'] == 2): ?>
          <!--<button class="btn btn-sm btn-danger float-right do_delete_game" data-id="id"><i class="fas fa-trash"></i> Borrar producto</button> -->
          <form id="do_update_game">
            <div class="form-group">
              <a href="https://wa.me/7441055925?text=%20Me%20interesa%20este%20inmueble%20me%20puede%20brindar%20mas%20información" id="submit" type="submit" class="btn btn-outline-success rounded shadow"><i class="fab fa-whatsapp"></i> Me interesa</a>
            </div>
          </form>
          <?php endif ?> 
        </div>
       </div>

      </div>
      <div class="modal-footer">
        <a href="index.php" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</a>
      </div>
    </div>
  </div>
</div>