<?php 
// PHP Y SUS FUNCIONES PREDEFINIDAS ESTÁN TODAS ATRAS DE ESTO
require_once 'app/config.php';


// Validar la sesión de usuario
//entonses le decimos que si no existe una validacion de sesion
if(!valid_session()) {

  //que nos redireccione al registro para crear una session, con esto no podemos acceder a todas las opciones si no estamos logedos
  //para redireccionarnos le agregamos nuestra funcion redirect que creamos en funciones
  redirect('register');
}  


$data =
[
  'title'      => 'Acapulco Venta y Renta Febrero 2022',
  'active'     => 'analisis'
];

// Renderizado de la vista
//esto hace que carge todos los juegos que tenga un usuario
render_view('analisis' , $data);