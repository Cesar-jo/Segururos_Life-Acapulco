<?php 
// PHP Y SUS FUNCIONES PREDEFINIDAS ESTÁN TODAS ATRAS DE ESTO
require_once 'app/config.php';

// Validar la sesión de usuario
if(!valid_session()) {
  redirect('register');
}

// Validar que exista la variable $_GET['id']
if(!isset($_GET['id'])) {
  redirect('index');
}


// Validar que exista el usuario pasado en URL en nuestra
// base de datos
if(!$pagos = get_cliente_by_id($_GET['id'] )) {
  redirect('index');
}

$DateAndTime = date('m-d-Y', time());  

//esta es nuestro array   para que agregemos o subamos mas clientes
$data =
[
  'title' => 'Establecer fechas de pago del cliente',
  'active' => 'add_pagos',
  'p'      => $pagos
];


// Renderizado de la vista en = wiews
render_view('add_pagos' , $data);