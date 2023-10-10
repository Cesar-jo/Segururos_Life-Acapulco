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
$clientes = get_clientes_by_conf(cur_user()['id']);

$data =
[
  'title'      => 'Establecer fechas de pago y datos faltantes de los clientes',
  'active'     => 'conf_clientes',
  'clientes'      => (isset($clientes[0]) ? $clientes[0] : NULL),
  'pagination' => (isset($clientes[1]) ? $clientes[1] : NULL)
];

// Renderizado de la vista
//esto hace que carge todos los juegos que tenga un usuario
render_view('conf_clientes' , $data);