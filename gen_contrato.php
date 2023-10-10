<?php 
// PHP Y SUS FUNCIONES PREDEFINIDAS ESTÁN TODAS ATRAS DE ESTO
require_once 'app/config.php';


 //----------------------------termina ejemplo de consultas en php y mysql----------------------------------

// Validar la sesión de usuario
//entonses le decimos que si no existe una validacion de sesion
if(!valid_session()) {
  //que nos redireccione al registro para crear una session, con esto no podemos acceder a todas las opciones si no estamos logedos
  //para redireccionarnos le agregamos nuestra funcion redirect que creamos en funciones
  redirect('register');
}


// Cargar los juegos que tenga el usuario, para ello entramos anuestra funcion cur_user que son las sesiones que tenemos ya registradas
//el cual tiene nuestro array que creamos de usuario para que nos jale la informacion de dicho


$data =
[
  'title'      => 'Generar contrato',
  'active'     => 'gen_contratao'
];

// Renderizado de la vista
//esto hace que carge todos los juegos que tenga un usuario
if (cur_user()['rol'] == 1) {
  render_view('gen_contrato' , $data);
}else {
  echo "Error 404, no tienes accseso a esta ventana ya que solo los usuaruios administradores pueden visualizarla";
}
