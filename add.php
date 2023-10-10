<?php 
// PHP Y SUS FUNCIONES PREDEFINIDAS ESTÁN TODAS ATRAS DE ESTO
require_once 'app/config.php';

// Validar la sesión de usuario
if(!valid_session()) {
  redirect('register');
}

//esta es nuestro array   para que agregemos o subamos mas juegos
$data =
[
  'title' => 'Agregar nuevo inmueble',
  'active' => 'add'
];

// id
// id_usuario xxx
// portada
// titulo
// id_genero
// id_consola
// calificacion
// opinion
// creado
// actualizado

// Renderizado de la vista en = wiews
if (cur_user()['rol'] == 1) {
  render_view('add' , $data);
}else {
  echo "Error 404, no tienes accseso a esta ventana ya que solo los usuaruios administradores pueden visualizarla";
}

