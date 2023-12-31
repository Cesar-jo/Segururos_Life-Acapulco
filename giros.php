<?php 
// PHP Y SUS FUNCIONES PREDEFINIDAS ESTÁN TODAS ATRAS DE ESTO
require_once 'app/config.php';


// -------------------------ejemplo de consultas con php a mysql---------------------------------

//asi es como hacemos consultas y acciones a nuestra base de datos con las variables que creamos
//con la variable stmt que es statemnet ahi iran nuestras peticiones, osea nuestras consultas como insert, update, select, delete, etc
//$stmt = 'INSERT INTO generos (genero) VALUES (:genero)';
// con la variable params, ahi ira los parametros que queramos hacer como actualizar en un campo o insertar en una columna, etc
//$params = [':genero' => 'Simulacion'];
//$id_insertado = query_db($stmt , $params);

//print_r($id_insertado);

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
$clientes = get_clientes_by_contrato(cur_user()['id']);

$data =
[
  'title'      => 'Bienvenidos a mantenimiento a cadenas de distribución',
  'active'     => 'Mantenimiento a catalogo de giros',
  'clientes'      => (isset($clientes[0]) ? $clientes[0] : NULL),
  'pagination' => (isset($clientes[1]) ? $clientes[1] : NULL)
];

// Renderizado de la vista
//esto hace que carge todos los juegos que tenga un usuario
if (cur_user()['rol'] == 1) {
  render_view('cadenas' , $data);
}else {
  echo "Error 404, no tienes accseso a esta ventana ya que solo los usuaruios administradores pueden visualizarla";
}

