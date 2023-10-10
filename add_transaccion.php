<?php 
// PHP Y SUS FUNCIONES PREDEFINIDAS ESTÁN TODAS ATRAS DE ESTO
require_once 'app/config.php';

// Validar la sesión de usuario
if(!valid_session()) {
  redirect('register');
}

//esta es nuestro array   para que agregemos o subamos mas clientes
$data =
[
  'title' => 'Nuevo Tipo de Movimiento Contable',
  'active' => 'add_transaccion'
];


// Renderizado de la vista en = wiews
render_view('add_transaccion' , $data);