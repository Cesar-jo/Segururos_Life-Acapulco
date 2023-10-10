
  <?php require_once 'includes/inc_header.php' ?>
 <?php require_once 'includes/inc_navbar.php' ?>

 <!-- Content -->
<div class="container mt-5 p-5" style="padding: 150px 20px;">
  <div class="row">
    <!-- Game list -->
    <div class="col-xl-12">
      <h1 class="text-center mb-5"><?php echo $data['title']; ?></h1>
      
         <!-- Content Row -->

                    <div class="row">

                     
<!-- Content Column -->
<div class="col-xl-4 col-lg-7">

                    
<!-- Illustrations -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Wizard</h6>
    </div>
    <div class="card-body" style="">
       
      <!-- Formulario del wizard para el contrato -->
      
                <form id="do_add_contrato">
          
            <div class="form-group">
              <label for="nombre">Nombre del cliente</label>
              <input type="text" class="form-control rounded shadow" id="nombre" name="nombre">
            </div>
            
            <div class="form-group">
              <label for="arrendador">Nombre del arrendador</label>
              <input type="text" class="form-control rounded shadow" id="arrendador" name="arrendador">
            </div>
            
            <div class="form-group">
              <label for="empresa">Nombre de la empresa</label>
              <input type="text" class="form-control rounded shadow" id="empresa" name="empresa">
            </div>
           
          
            <div class="form-group">
              <label for="direccion">Direccion</label>
              <input type="text" class="form-control" id="direccion" name="direccion">
            </div>
            
            <div class="form-group">
              <label for="fecha">Fecha inicio</label>
              <input type="date" class="form-control rounded shadow" id="fecha" name="fecha">
            </div>


            <div class="form-group">
              <label for="fechafin">Fecha del cierre de contrato</label>
              <input type="date" class="form-control rounded shadow" id="fechafin" name="fechafin">
            </div>

            

            <div class="form-group">
              <label for="inmueble">Imueble</label>
              <select class="form-control rounded shadow" id="inmueble" name="inmueble">
                <option value="">Seleciona una opcion...</option>
                <?php foreach (get_inmuebles($id_user) as $r): ?>
                  <option value="<?php echo $r['Nombre'] ?>"><?php echo $r['Nombre'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

          
            
            <div class="form-group">
              <label for="descripcion">Descripcion</label>
              <textarea type="text" class="form-control" id="descripcion" name="descripcion"></textarea>
            </div>

            <div class="form-group">
              <button type="submit" class="btn rounded shadow btn-outline-success">Agregar</button>
              <button type="reset" class="btn rounded shadow rounded shadow btn-default">Cancelar</button>
            </div>
          </form>
      
       <!-- Formulario del wizard para el contrato -->
       
    </div>
</div>
</div>


<!-- Content Column -->
<div class="col-xl-8 col-lg-7">
    
    
<!-- Illustrations -->
<div class="card shadow mb-4  scrollbar-ripe-malinka">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Contrato de renta</h6>
    </div>
    <div class="card-body" style="">
       
         <?php include "contrato-oxxo.php" ?>
       
    </div>
</div>
</div>


</div>
            
                   
     
     
     
     

     
     
   </div>
     </div>
       </div>

  <?php require_once 'includes/inc_footer.php' ?>

  