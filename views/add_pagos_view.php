<?php require_once 'includes/inc_header.php' ?>
<?php require_once 'includes/inc_navbar.php' ?>

<?php
 require 'conexion.php';
//id del cliente para obtener informaci贸n de el
    $id = $_GET['id'];
    

  
 
  $dia= 2592000;  // esto es igual a un mes
  //$dia =86400;
$nombre = clean_string($_POST['nombre']);
$monto = clean_string($_POST['monto']);
$inmueble = clean_string($_POST['inmueble']);
$fecha = strtotime($_REQUEST['fecha']);
$fechafin = strtotime($_REQUEST['fechafin']);
$registrado_Por = cur_user()['id'];
$id_usuario = $_POST['id_usuario'];



for($i = $fecha; $i<= $fechafin; $i+=$dia){
    $fecha_r = date("d-m-y", $i);
    $QueryInsert = ("INSERT INTO informes_clientes
    (
    id_usuario,
    nombre,
    fecha,
    fechafin,
    registrado_por,
    inmueble,
    monto

    )
    VALUES (
    '".$id_usuario."',
    '".$nombre."',
    '".$fecha_r."',
    '".$fecha_r."',
    '".$registrado_Por."',
    '".$inmueble."',
     '".$monto."'
         
    )");
    

    $Insert = mysqli_query($mysql, $QueryInsert);
    
}
  
   if(isset($Insert)){
       
        echo'Fechas de pagos registrados con exito';
        
      
    }else{
        
        echo'Ubo un problemaa, intente de nuevo';
    }
    

    //----------------
    



    
    ?>

<!-- Content -->
<div class="container" style="padding: 150px 0px;">
  <div class="row">
    <div class="offset-xl-3 col-xl-6">
      <div class="card rounded shadow">
        <div class="card-body">
          <h2 class="text-center mb-5"><?php echo $data['title']; ?></h2>
         
          <form method="POST">
          <input type="hidden" name="id_usuario" value="<?php echo $data['p']['id']; ?>">
          
                    <input type="hidden" name="inmueble" value="<?php echo $data['p']['inmueble']; ?>">
                    
                              <input type="hidden" name="monto" value="<?php echo $data['p']['monto']; ?>">
            <div class="form-group">
              <label for="nombre">Nombre del cliente</label>
              <input type="text" class="form-control rounded shadow" id="nombre" name="nombre" value="<?php echo $data['p']['nombre']; ?>">
            </div>
          
            <div class="form-group">
              <label for="fecha">Fecha de inicio</label>
                <input type="date" class="form-control rounded shadow" id="fecha" name="fecha" required>
            </div>

             <div class="form-group">
              <label for="fechafin">Fecha final del contrato</label>
                <input type="date" class="form-control rounded shadow" id="fechafin" name="fechafin" required>
            </div>
            

           

            <div class="form-group">
            <!--  <button type="submit" class="btn rounded shadow btn-outline-success">Agregar</button> -->
            <button class="btn rounded shadow btn-outline-success">Agregar</button>
              <button type="reset" class="btn rounded shadow rounded shadow btn-default">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Content -->

<?php require_once 'includes/inc_footer.php' ?>