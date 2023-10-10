<?php 
// PHP Y SUS FUNCIONES PREDEFINIDAS ESTÁN TODAS ATRAS DE ESTO
require_once 'app/config.php';


//Validar que exista la variable $_GET['id']
if(!isset($_GET['id'])) {
 redirect('index');
}



// Validar la sesi贸n de usuario
//entonses le decimos que si no existe una validacion de sesion
if(!valid_session()) {
  //que nos redireccione al registro para crear una session, con esto no podemos acceder a todas las opciones si no estamos logedos
  //para redireccionarnos le agregamos nuestra funcion redirect que creamos en funciones
  redirect('register');
}

$data =
[
  'title'  => 'Informes de pago',
  'active' => 'informes_clientes'
];



// Renderizado de la vista
//esto hace que carge todos los juegos que tenga un usuario

if (cur_user()['rol'] == 1) {
  render_view('informes_clientes', $data);
}else {
  echo "Error 404, no tienes accseso a esta ventana ya que solo los usuaruios administradores pueden visualizarla";
}
