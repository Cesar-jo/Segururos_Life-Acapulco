<?php
require_once 'app/config.php';
// Función para sacar un json en pantalla
//echo json_encode($response);

// Qué tipo de petición está solicitando ajax
if(!isset($_POST['action'])) {
  //la peticion 403, es de error
  json_output(403);
}

//llamamos nuestro metodo post
$action = $_POST['action'];

// GET
switch ($action) {
  case 'register_user' :
    //le desimos que si no esta setiada  data
    if(!isset($_POST['data'])) {
      //que nos lance un error 400
      json_output(400);
    }

    // Pero si si está seteada
    //va a destruir el strig setiado en data
    parse_str($_POST['data'] , $data);

    //hacemos otra validacion que sera lo mismo que con la que hicimos en javascrip, peor ahora en php y con peticiones ajax
    //solo que en esta nos lanzara peticiones ajax por si hay errores  o si esta bien

    // Validar el correo electrónico con el metodo que viene por defecto en php  FILTER_VALIDATE_EMAIL
    if(!filter_var($data['user_email'] , FILTER_VALIDATE_EMAIL)) {
      json_output(400,'La dirección de correo electrónico no es válida');
    }

    // Validar que el correo no exista ya, para ello traemos de la base de datos los user_email para validad que ningun correo se repita
    if (get_user_by_email($data['user_email'])) {
      json_output(400,'La dirección de correo electrónico ya está registrada');
    }

    // Una segunda validación que sera para la contraseña
    //le decimos que si password es menor a 5 caracteres, que nos lance un mensaje de :
    if(strlen($data['user_password']) < 5) {
      //que nos lance un mensaje de que la contraseña es demaciada corta
      json_output(400,'Tu contraseña es demasiado corta, ingresa mínimo 5 caracteres');
    }

    //vamos ahora a validar que la contraseña coincida bien
    //entonces le decimos que si user_password es diferente !== a user_password_conf
    if($data['user_password'] !== $data['user_password_conf']) {
      //que nos lance una peticion de que la contraseña no coincide (400 de error)
      json_output(400,'Las contraseñas no coinciden');
    }


    // Guardar el usuario en la base de datos 
    //para eso inicializamos un array que se llamara usuario donde tendra la tabla (los datos) de nuestra base de datos
    $usuario =
    [
      'nombre'   => clean_string($data['user_name']),
      'email'    => $data['user_email'],
                   // con password_hash,PASSWORD_DEFAULT,SALT siframos nuestro pasword
      'password' => password_hash($data['user_password'].SALT,PASSWORD_DEFAULT),
    
      'creado'   => get_date()
    ];

      


    // Insertar el registro de usuario
    //le decimos que si no se inserta nada en nuestra tabla usuarios en nuestra bd, y que datos no se insertan? = ($usuario)
    if(!insert_new('usuarios' , $usuario)) {
      //entonces que nos lance una peticion de error de que hubo un problema
      json_output(400,'Hubo un problema, intenta de nuevo por favor');
    }
//pero si si se insertaron los datos ($usuario) que nos lanze una peticion 201 de que si se ha registrado
    json_output(201,'Te has registrado con éxito');
    break;






///---------------------------------
//Apartado agregar una cuenta por pagar
//---------------------------------------
case 'add_porpagar' :
  //le desimos que si no esta setiada  data
  if(!isset($_POST['nombre'],$_POST['concepto'],$_POST['pago'],$_POST['estatus'],$_POST['inmueble'],$_POST['fecha'],$_POST['tipo_transaccion'],$_POST['cuenta_contable'],$_POST['gasto'])) {
    // y aventamos ese mensaje con una peticion 400
      json_output(400,'Completa el formulario por favor e intenta de nuevo');
    }


  // Guardar el usuario en la base de datos 
  //para eso inicializamos un array que se llamara usuario donde tendra la tabla (los datos) de nuestra base de datos
  $cuentas =
  [
    'id_usuario'   => cur_user()['id'],
    'nombre'   => clean_string($_POST['nombre']),
    'concepto'    => clean_string($_POST['concepto']),
    'pago' => $_POST['pago'],
    'estatus' => clean_string($_POST['estatus']),
    'inmueble' => clean_string($_POST['inmueble']),
    'fecha'    => clean_string($_POST['fecha']),
    'tipo_transaccion'     => $_POST['tipo_transaccion'],
    'cuenta_contable'     => $_POST['cuenta_contable'],
    'gasto'       => $_POST['gasto']
  ];

    


  // Insertar el registro de usuario
  //le decimos que si no se inserta nada en nuestra tabla usuarios en nuestra bd, y que datos no se insertan? = ($usuario)
  if(!insert_new('clientes' , $cuentas)) {
    //entonces que nos lance una peticion de error de que hubo un problema
    json_output(400,'Hubo un problema, intenta de nuevo por favor');
  }
//pero si si se insertaron los datos ($usuario) que nos lanze una peticion 201 de que si se ha registrado
  json_output(201,'Has registrado con éxito');
  break;

///
///--------------------------------------------
///


///---------------------------------
//Apartado agregar contrato
//---------------------------------------
case 'add_contrato' :
  //le desimos que si no esta setiada  data
  if(!isset($_POST['nombre'],$_POST['arrendador'],$_POST['empresa'],$_POST['direccion'],$_POST['fecha'],$_POST['fechafin'],$_POST['inmueble'],$_POST['descripcion'])) {
    // y aventamos ese mensaje con una peticion 400
      json_output(400,'Completa el formulario por favor e intenta de nuevo');
    }


  // Guardar el usuario en la base de datos 
  //para eso inicializamos un array que se llamara usuario donde tendra la tabla (los datos) de nuestra base de datos
  $contrato =
  [
    'id_usuario'  => cur_user()['id'],
    'nombre'      => clean_string($_POST['nombre']),
    'arrendador'  => clean_string($_POST['arrendador']),
    'empresa'     => clean_string($_POST['empresa']),
    'direccion'   => clean_string($_POST['direccion']),
    'fecha'       => clean_string($_POST['fecha']),
    'fechafin'    => clean_string($_POST['fechafin']),
    'inmueble'    => clean_string($_POST['inmueble']),
    'descripcion' => clean_string($_POST['descripcion'])
  ];

    


  // Insertar el registro de usuario
  //le decimos que si no se inserta nada en nuestra tabla usuarios en nuestra bd, y que datos no se insertan? = ($usuario)
  if(!insert_new('contratos' , $contrato)) {
    //entonces que nos lance una peticion de error de que hubo un problema
    json_output(400,'Hubo un problema, intenta de nuevo por favor');
  }

  json_output(201,'Has registrado con éxito');
  break;

///
///--------------------------------------------
///



//---------------------------------
//Apartado agregar una transaccion/movimiento contable
//---------------------------------------
case 'add_transaccion' :
  //le desimos que si no esta setiada  data
  if(!isset($_POST['nombre'],$_POST['flujo_contable'])) {
    // y aventamos ese mensaje con una peticion 400
      json_output(400,'Completa el formulario por favor e intenta de nuevo');
    }


  // Guardar el usuario en la base de datos 
  //para eso inicializamos un array que se llamara usuario donde tendra la tabla (los datos) de nuestra base de datos
  $tipo_transaccion =
  [
    'id_usuario'  => cur_user()['id'],
    'nombre'   => clean_string($_POST['nombre']),
    'flujo_contable'   => clean_string($_POST['flujo_contable'])
  
  ];

    


  // Insertar el registro de contratos
  if(!insert_new('tipo_transaccion' , $tipo_transaccion)) {
    //entonces que nos lance una peticion de error de que hubo un problema
    json_output(400,'Hubo un problema, intenta de nuevo por favor');
  }
//pero si si se insertaron los datos que nos lanze una peticion 201 de que si se ha registrado
  json_output(201,'Has registrado tu contrato con éxito');
  break;

///
///--------------------------------------------
///


///---------------------------------
//Apartado agregar un nuevo cliente
//---------------------------------------
case 'add_client' :
  //le desimos que si no esta setiada  data
  if(!isset($_POST['data'])) {
    //que nos lance un error 400
    json_output(400);
  }

  // Pero si si está seteada
  //va a destruir el strig setiado en data
  parse_str($_POST['data'] , $data);




  // Guardar el usuario en la base de datos 
  //para eso inicializamos un array que se llamara usuario donde tendra la tabla (los datos) de nuestra base de datos
  $client =
  [
    'id_usuario'   => cur_user()['id'],
    'nombre'   => clean_string($data['nombre']),
    'correo'    => clean_string($data['correo']),
    'telefono' => $data['telefono'],
    'fecha'    => $data['fecha'],
    'sexo' => clean_string($data['sexo']),
    'estatus' => clean_string($data['estatus']),
    'inmueble' => clean_string($data['inmueble']),
    'direccion' => clean_string($data['direccion']),
    'descripcion'    => clean_string($data['descripcion']),

    'creado'   => get_date()
  ];

    


  // Insertar el registro de usuario
  //le decimos que si no se inserta nada en nuestra tabla usuarios en nuestra bd, y que datos no se insertan? = ($usuario)
  if(!insert_new('clientes' , $client)) {
    //entonces que nos lance una peticion de error de que hubo un problema
    json_output(400,'Hubo un problema, intenta de nuevo por favor');
  }
//pero si si se insertaron los datos ($usuario) que nos lanze una peticion 201 de que si se ha registrado
  json_output(201,'Has registrado con éxito');
  break;

///
///--------------------------------------------
///




  //apartado logeo usuario


  case 'login_user' :
    //le decimos que con un if !isset le decimos que si no existe datos en el logeo, 
    if(!isset($_POST['data'])) {
      //que nos arroge un error una peticion 400
      json_output(400);
    }

    // Pero si si está seteada, si, si hay datos en el logeo que valide el correo y la contraseña 
    parse_str($_POST['data'] , $data);

    // Validar el correo electrónico , con esta funcion de php que viene por defecto valida el email FILTER_VALIDATE_EMAIL
    //si existe el correo que lo valide
    if(!filter_var($data['user_email'] , FILTER_VALIDATE_EMAIL)) {
      json_output(400,'La dirección de correo electrónico no es válida');
    }

    // Una segunda validación
    //le decimos que si user_pasword, que si la contraseña que ingresamos es menos a 5 caracteres
    if(strlen($data['user_password']) < 5) {
      //que nos lance una peticion de error 400 y un mensaje diciendo contraseña desmaciada corta
      json_output(400,'Tu contraseña es demasiado corta, ingresa mínimo 5 caracteres');
    }

    // Información de usuario
    // Buscar en la db si existe el correo electrónico
    // si no existe pues no hay usuario, y no es válido
    // para ello traemos la funcion que creamos (get_user_by_email) que va a traer el email de la base de datos y va hacer igual esa funcion a $usuario
    $usuario = get_user_by_email($data['user_email']);
    //le decimos que si usuario no existe, recuerden que $usuario es nuestro get_user_by_email que va a trael nuestro email
    //entonces seria si no existe email en nuestra base de datos 
    if(!$usuario) {
      //que nos arroge una peticion 400 de que la direccion de correo no existe
      json_output(400,'La dirección de correo electrónico no existe');
    }

    // Si si existe, cargamos la información para validar su contraseña
    //el SALT es una contraseña que se le agregara para hacerla mas segura, ese salt esta en config con lo que se le agregara
    //entonces lo que dice es que si pasword_verfy coincide con la contraseña que tenemos en la base de datos (user_password)
    if (!password_verify($data['user_password'].SALT , $usuario['password'])) {
      json_output(400,'Las credenciales de ingreso no coinciden');
    }

    // Inicializar la sesión del usuario
    init_user_session($usuario);
    
    //y si si encontro el correo y la contraseña del usuario al logearse que nos arroge una peticion 200 y que nos de la bienvenida
    // esa bienvenida va a traer la informacion del nombre del usuario al logiarce para que ponga su nombre en el mensage de bienvenida
    json_output(200,'Bienvenido de nuevo '.$usuario['nombre']);
    break;

  
    //--------------
    //
    // Registrar Juego
    //--------------

  case 'add_game':
    //le decimos que si no han setiadop o no eta titulo, genero, plataforms,s rtc que por favor completen bien el formulario
    if(!isset($_POST['Nombre'],$_POST['id_genero'],$_POST['estatus'],$_POST['precio'],$_POST['descripcion'])) {
    // y aventamos ese mensaje con una peticion 400
      json_output(400,'Completa el formulario por favor e intenta de nuevo');
    }

    // Crear nuestro array de información del nuevo juego
    $new_game =
    [
      //le pasamos el id y le decimos que sera igual a la funcion cur_user para indicar que vamos a sacar el id del usuario que ya esta en la sesion ose que ya inicio sesion
      //y le pasamos el id de nuestra tabla de la bd para que busque que usuario es
      'id_usuario'    => cur_user()['id'],
      //limpiamols el titulo para que pueda agregar el titulo del nuevo juego yt con post mandar la informacion a la bd
      'Nombre'        => clean_string($_POST['Nombre']),
      //igual a id_genero mandamos por el metodo post  el id guenero que seleccionamos en el formulario
      'id_genero'     => $_POST['id_genero'],
     
      'estatus'    => clean_string($_POST['estatus']),
      'precio'    => clean_string($_POST['precio']),
      //con la funcion clean_string limpiamos los espacion o cositas extras que tenga el apatrtado del texarea de opinion
      //y mandamos a nuestra bd mediante post la opinion
      'descripcion'       => clean_string($_POST['descripcion']),
      //y con le pasamos la funcion de la fecha de creacion para que se mande tambien
      'creado'        => get_date()
    ];

    // Si el usuario subió una imagen, procesarla
    // el error == 4 significa que no se subio ningun archo
    // osea le decimos que si setio o si existe una porada y no es diferente a !== 4 al error 4, entonces se subio correctamente la imagen
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] !== 4) {
      // Primero vamos almacenarla en una variable
      $img = $_FILES['foto'];
      //aqui se va a almacenar la extencion de nuestro archivo original
      $ext = pathinfo($img['name'] , PATHINFO_EXTENSION);
      
      // Después vamos a renombrarla
      $new_name = generate_filename().'.'.$ext;

      // Después vamos a guardarla en nuestro SERVIDOR dentro de UPLOADS
      if(!move_uploaded_file($img['tmp_name'] , UPLOADS.$new_name)) {
        json_output(400,'Hubo un error al guardar la imagen, intenta de nuevo');
      }

      $new_game['foto'] = $new_name;
    }

//-----------
//Segunda imagen
//----------

if(isset($_FILES['foto1']) && $_FILES['foto1']['error'] !== 4) {
  // Primero vamos almacenarla en una variable
  $img = $_FILES['foto1'];
  //aqui se va a almacenar la extencion de nuestro archivo original
  $ext = pathinfo($img['name'] , PATHINFO_EXTENSION);
  
  // Después vamos a renombrarla
  $new_name = generate_filename().'.'.$ext;

  // Después vamos a guardarla en nuestro SERVIDOR dentro de UPLOADS
  if(!move_uploaded_file($img['tmp_name'] , UPLOADS.$new_name)) {
    json_output(400,'Hubo un error al guardar la imagen, intenta de nuevo');
  }

  $new_game['foto1'] = $new_name;
}

//-----------
//Segunda imagen
//----------


//-----------
//tercera imagen
//----------

if(isset($_FILES['foto2']) && $_FILES['foto2']['error'] !== 4) {
  // Primero vamos almacenarla en una variable
  $img = $_FILES['foto2'];
  //aqui se va a almacenar la extencion de nuestro archivo original
  $ext = pathinfo($img['name'] , PATHINFO_EXTENSION);
  
  // Después vamos a renombrarla
  $new_name = generate_filename().'.'.$ext;

  // Después vamos a guardarla en nuestro SERVIDOR dentro de UPLOADS
  if(!move_uploaded_file($img['tmp_name'] , UPLOADS.$new_name)) {
    json_output(400,'Hubo un error al guardar la imagen, intenta de nuevo');
  }

  $new_game['foto2'] = $new_name;
}


//----------
//tercera imagen
//----------




    // Guardar en la base de datos
    if(!insert_new('stock' , $new_game)) {
      json_output(400,'Hubo un problema, intenta de nuevo');
    }

    json_output(201,'Nuevo producto agregado con éxito');
    break;

    //---------------------------------------------
    //
    //------------------  APARTADO INSERTAR DATOS PARA ASIGNAR CUANTOS PRODUCTOS TENDRA UN USUARIO ---------------------------------------
    //
    //-----------------------------------------------
  // Crear nuestro array de información del registro para asignar productos
  $new_asignar =
  [
    //le pasamos el id y le decimos que sera igual a la funcion cur_user para indicar que vamos a sacar el id del usuario que ya esta en la sesion ose que ya inicio sesion
    //y le pasamos el id de nuestra tabla de la bd para que busque que usuario es
    'id_user'    => clean_string($_POST['id']),
    //limpiamols el titulo para que pueda agregar el titulo del nuevo juego yt con post mandar la informacion a la bd
    'Nombre'        => clean_string($_POST['Nombre']),
    //igual a id_genero mandamos por el metodo post  el id guenero que seleccionamos en el formulario
    'id_genero'     => $_POST['id_genero'],
   //
    'estatus'    => clean_string($_POST['estatus']),
    'precio'    => clean_string($_POST['precio']),
    //con la funcion clean_string limpiamos los espacion o cositas extras que tenga el apatrtado del texarea de opinion
    //y mandamos a nuestra bd mediante post la opinion
    'descripcion'       => clean_string($_POST['descripcion']),
    //y con le pasamos la funcion de la fecha de creacion para que se mande tambien
    'creado'        => get_date()
  ];

  // Si el usuario subió una imagen, procesarla
  // el error == 4 significa que no se subio ningun archo
  // osea le decimos que si setio o si existe una porada y no es diferente a !== 4 al error 4, entonces se subio correctamente la imagen
  if(isset($_FILES['foto']) && $_FILES['foto']['error'] !== 4) {
    // Primero vamos almacenarla en una variable
    $img = $_FILES['foto'];
    //aqui se va a almacenar la extencion de nuestro archivo original
    $ext = pathinfo($img['name'] , PATHINFO_EXTENSION);
    
    // Después vamos a renombrarla
    $new_name = generate_filename().'.'.$ext;

    // Después vamos a guardarla en nuestro SERVIDOR dentro de UPLOADS
    if(!move_uploaded_file($img['tmp_name'] , UPLOADS.$new_name)) {
      json_output(400,'Hubo un error al guardar la imagen, intenta de nuevo');
    }

    $new_game['foto'] = $new_name;
  }

  // Guardar en la base de datos
  if(!insert_new('stock' , $new_game)) {
    json_output(400,'Hubo un problema, intenta de nuevo');
  }

  json_output(201,'Nuevo inmueble agregado con éxito');
  break;


    //---------------------------------------------
    //
    //------------------
    //
    //-----------------------------------------------


  case 'get_game':
    if(!isset($_POST['id'])) {
      json_output(403,'Hubo un problema, intenta de nuevo');
    }

    // ID del juego que queremos ver
    $id = (int) $_POST['id'];

    // Cargar la información del juego
    $g = get_game_by_id($id);

    // Validar si existe o no el juego
    if(!$g) {
      json_output(400,'Producto no encontrado, intenta de nuevo');
    }

    // Cargar el html y formatearlo
    ob_start();
    //y traemos el modal con la informacion ya cargada
    require_once MODULES.'single_game_modal.php';
    $output = ob_get_clean();

    // Regresar el json con la información html
    json_output(200,'OK',$output);
    break;


    //----------
    //Traer juego
    //-----------

    case 'get_agregar':
      if(!isset($_POST['id'])) {
        json_output(403,'Hubo un problema, intenta de nuevo');
      }
  
      // ID del juego que queremos ver
      $id = (int) $_POST['id'];
  
      // Cargar la información del juego
      $g = get_game_by_id($id);
  
      // Validar si existe o no el juego
      if(!$g) {
        json_output(400,'Producto no encontrado, intenta de nuevo');
      }
  
      // Cargar el html y formatearlo
      ob_start();
      //y traemos el modal con la informacion ya cargada
      require_once MODULES.'agregar_producto_modal.php';
      $output = ob_get_clean();
  
      // Regresar el json con la información html
      json_output(200,'OK',$output);
      break;


    //----------
    //
    //---------

  case 'update_game':
    if(!isset($_POST['id'],$_POST['Nombre'],$_POST['id_genero'],$_POST['estatus'],$_POST['precio'],$_POST['descripcion'])) {
      json_output(403,'Completa el formulario por favor e intenta de nuevo');
    }

    // Crear nuestro array de información del nuevo juego
    $id = (int) $_POST['id'];
    $game =
    [
      'Nombre'        => clean_string($_POST['Nombre']),
      'id_genero'     => $_POST['id_genero'],
      'estatus'        => clean_string($_POST['estatus']),
      'precio'        => clean_string($_POST['precio']),
      'descripcion'       => clean_string($_POST['descripcion'])
    ];

    // Si el usuario subió una imagen, procesarla
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] !== 4) {
      // Obtener la imagen anterior si existe
      $portada_anterior = $_POST['portada_anterior'];

      // Primero vamos almacenarla en una variable
      $img = $_FILES['foto'];
      $ext = pathinfo($img['name'] , PATHINFO_EXTENSION);
      
      // Después vamos a renombrarla y le pasamos la funcion de generate file que lo que hace es generar un nombre a cada imagen- archivo que subamos
      // y ese nombre de archivo es el que se guardara en la base de datos y en nuesto servidor
      $new_name = generate_filename().'.'.$ext;

      // Después vamos a guardarla en nuestro SERVIDOR dentro de UPLOADS
     // ahora vamos a mover el archivo que sera = al nombre temporal que tiene y le pasamos la actualizacion del nombre generado del new_name con su funcion
      if(!move_uploaded_file($img['tmp_name'] , UPLOADS.$new_name)) {
       // si no se movio !move_upload que nos imprima una peticion 400 con un mensaje de error al guardar imagen
        json_output(400,'Hubo un error al guardar la imagen, intenta de nuevo');
      }
// y ahora a la portada se guardara con el nuevo nombre generado en la tabla de portada o camp0o de las portadas
      $game['foto'] = $new_name;
    }




//Actualizaremos la tercera imagen

// Si el usuario subió una imagen, procesarla
if(isset($_FILES['foto1']) && $_FILES['foto1']['error'] !== 4) {
  // Obtener la imagen anterior si existe
  $portada_anterior1 = $_POST['portada_anterior'];

  // Primero vamos almacenarla en una variable
  $img1 = $_FILES['foto1'];
  $ext1 = pathinfo($img1['name'] , PATHINFO_EXTENSION);
  
  // Después vamos a renombrarla y le pasamos la funcion de generate file que lo que hace es generar un nombre a cada imagen- archivo que subamos
  // y ese nombre de archivo es el que se guardara en la base de datos y en nuesto servidor
  $new_name1 = generate_filename().'.'.$ext1;

  // Después vamos a guardarla en nuestro SERVIDOR dentro de UPLOADS
 
 // ahora vamos a mover el archivo que sera = al nombre temporal que tiene y le pasamos la actualizacion del nombre generado del new_name con su funcion
  if(!move_uploaded_file($img1['tmp_name'] , UPLOADS.$new_name1)) {
   // si no se movio !move_upload que nos imprima una peticion 400 con un mensaje de error al guardar imagen
    json_output(400,'Hubo un error al guardar la imagen, intenta de nuevo');
  }
// y ahora a la portada se guardara con el nuevo nombre generado en la tabla de portada o camp0o de las portadas
  $game['foto1'] = $new_name1;
}




//Actualizaremos la segunda imagen

// Si el usuario subió una imagen, procesarla
if(isset($_FILES['foto2']) && $_FILES['foto2']['error'] !== 4) {
  // Obtener la imagen anterior si existe
  $portada_anterior2 = $_POST['portada_anterior'];

  // Primero vamos almacenarla en una variable
  $img2 = $_FILES['foto2'];
  $ext2 = pathinfo($img2['name'] , PATHINFO_EXTENSION);
  
  // Después vamos a renombrarla y le pasamos la funcion de generate file que lo que hace es generar un nombre a cada imagen- archivo que subamos
  // y ese nombre de archivo es el que se guardara en la base de datos y en nuesto servidor
  $new_name2 = generate_filename().'.'.$ext2;

  // Después vamos a guardarla en nuestro SERVIDOR dentro de UPLOADS
 // ahora vamos a mover el archivo que sera = al nombre temporal que tiene y le pasamos la actualizacion del nombre generado del new_name con su funcion
  if(!move_uploaded_file($img2['tmp_name'] , UPLOADS.$new_name2)) {
   // si no se movio !move_upload que nos imprima una peticion 400 con un mensaje de error al guardar imagen
    json_output(400,'Hubo un error al guardar la imagen, intenta de nuevo');
  }
// y ahora a la portada se guardara con el nuevo nombre generado en la tabla de portada o camp0o de las portadas
  $game['foto2'] = $new_name2;
}




    // Guardar en la base de datos
    //le decimos que si no se setio ningun video guego
    // para ello hacemos lo siguiente pasamos la funcion = update_record
    // y la tabla donde se hara el registro  y le decimos que si no se registro nungun juego
    if(!update_record('stock', ['id' => $id] , $game)) {
      // que nos imprima que hubo un error que intentemos de nuevo
      json_output(400,'Hubo un problema, intenta de nuevo');
    }

    // Antes de regresar la respuesta
    // Debemos borrar del servidor la imagen anterior
    if(isset($new_name) && is_file(UPLOADS.$new_name)) {
      if(is_file(UPLOADS.$portada_anterior)) unlink(UPLOADS.$portada_anterior);
    }

// Debemos borrar del servidor la imagen2 anterior
    if(isset($new_name1) && is_file(UPLOADS.$new_name1)) {
      if(is_file(UPLOADS.$portada_anterior1)) unlink(UPLOADS.$portada_anterior1);
    }
// Debemos borrar del servidor la imagen3 anterior
    if(isset($new_name2) && is_file(UPLOADS.$new_name2)) {
      if(is_file(UPLOADS.$portada_anterior2)) unlink(UPLOADS.$portada_anterior2);
    }

    json_output(200,'Cambios guardados con éxito');
    break;



    //-----------------------------------------------
    //----------
    //Actualizar usuario
    //---------

    case 'update_usu':
      if(!isset($_POST['id'],$_POST['nombre'],$_POST['email'],$_POST['rol'] )) {
        json_output(403,'Completa el formulario por favor e intenta de nuevo');
      }
  
      // Crear nuestro array de información del usuario
      $id = (int) $_POST['id'];
      $user =
      [
        'nombre'    => clean_string($_POST['nombre']),
        'email'     => clean_string($_POST['email']),
        'rol'       => $_POST['rol']
      ];
  
  
      // Guardar en la base de datos
      //le decimos que si no se setio ningun video guego
      // para ello hacemos lo siguiente pasamos la funcion = update_record
      // y la tabla donde se hara el registro  y le decimos que si no se registro nungun juego
      if(!update_record('usuarios', ['id' => $id] , $user)) {
        // que nos imprima que hubo un error que intentemos de nuevo
        json_output(400,'Hubo un problema, intenta de nuevo');
      }
  
      json_output(200,'Cambios guardados con éxito');
      break;



      
    //-----------------------------------------------
    //----------
    //Actualizar cliente
    //---------

    case 'update_clientes':
      if(!isset($_POST['id'],$_POST['nombre'],$_POST['correo'],$_POST['telefono'],$_POST['factura'],$_POST['contrato'],$_POST['fecha'],$_POST['venc_factura'],$_POST['venc_contrato'],$_POST['pago'],$_POST['monto'],$_POST['inmueble'],$_POST['curp'],$_POST['rfc'],$_POST['direccion'] )) {
        json_output(403,'Completa el formulario por favor e intenta de nuevo');
      }
  
      // Crear nuestro array de información del usuario
      $id_cliente = (int) $_POST['id'];
      $update_clientes =
      [
        'nombre'    => clean_string($_POST['nombre']),
        'correo'     => $_POST['correo'],
        'telefono'       => $_POST['telefono'],
        'factura'       => $_POST['factura'],
        'contrato'       => $_POST['contrato'],
        'fecha'       => $_POST['fecha'],
        'venc_factura'     => clean_string($_POST['venc_factura']),
        'venc_contrato'     => clean_string($_POST['venc_contrato']),
        'pago'       => $_POST['pago'],
        'monto'       => $_POST['monto'],
        'inmueble'       => $_POST['inmueble'],
        'direccion'       => $_POST['direccion'],
        'curp'       => $_POST['curp'],
        'rfc'       => $_POST['rfc']
      ];
  
  
      // Guardar en la base de datos
      //le decimos que si no se setio ningun cliente
      // para ello hacemos lo siguiente pasamos la funcion = update_clientes
      // y la tabla donde se hara el registro  y le decimos que si no se registro nungun cliente
      if(!update_record('clientes', ['id' => $id_cliente] , $update_clientes)) {        
        // que nos imprima que hubo un error que intentemos de nuevo
        json_output(400,'Hubo un problema, intenta de nuevo');
      }
  
      json_output(200,'Cambios guardados con éxito');
      break;


//-----------------------------------------------
    //----------
    //Actualizar pagos
    //---------

    case 'update_pagos':
      if(!isset($_POST['id'],
      $_POST['fecha'],
      $_POST['fechafin'],
      $_POST['estatus'],
      $_POST['pagado'])) {
        json_output(403,'Completa el formulario por favor e intenta de nuevo');
      }
  
      // Crear nuestro array de información del usuario
      $id_pago = (int) $_POST['id'];
      $update_pagos =
      [
        'fecha'       => clean_string($_POST['fecha']),
        'fechafin'     => clean_string($_POST['fechafin']),
        'estatus'     => clean_string($_POST['estatus']),
        'pagado'     => clean_string($_POST['pagado'])
        
      ];
  
  
      // Guardar en la base de datos
      //le decimos que si no se setio ningun cliente
      // para ello hacemos lo siguiente pasamos la funcion = update_clientes
      // y la tabla donde se hara el registro  y le decimos que si no se registro nungun cliente
      if(!update_record('informes_clientes', ['id' => $id_pago] , $update_pagos)) {        
        // que nos imprima que hubo un error que intentemos de nuevo
        json_output(400,'Hubo un problema, intenta de nuevo');
      }
  
      json_output(200,'Cambios guardados con éxito');
      break;




      //------------------------------------
      // Actualizar tipo de transaccion
      //----------------------------------

      case 'update_transaccion':
        if(!isset($_POST['id'],$_POST['nombre'],$_POST['flujo_contable'] )) {
          json_output(403,'Completa el formulario por favor e intenta de nuevo');
        }
    
        // Crear nuestro array de información del usuario
        $id = (int) $_POST['id'];
        $update_transaccion =
        [
          'nombre'    => clean_string($_POST['nombre']),
          'flujo_contable'     => $_POST['flujo_contable']
        ];
    
    
        // Guardar en la base de datos
        //le decimos que si no se setio ningun cliente
        // para ello hacemos lo siguiente pasamos la funcion = update_clientes
        // y la tabla donde se hara el registro  y le decimos que si no se registro nungun cliente
        if(!update_record('tipo_transaccion', ['id' => $id] , $update_transaccion)) {        
          // que nos imprima que hubo un error que intentemos de nuevo
          json_output(400,'Hubo un problema, intenta de nuevo');
        }
    
        json_output(200,'Cambios guardados con éxito');
        break;
  

      //-----------------------------------------------
    //----------
    //Actualizar prospectos
    //---------

    case 'update_prospectos':
      if(!isset($_POST['id'],$_POST['nombre'],$_POST['correo'],$_POST['telefono'],$_POST['fecha'],$_POST['estatus'],$_POST['descripcion'],$_POST['inmueble'],$_POST['curp'],$_POST['rfc'],$_POST['direccion'])) {
        json_output(403,'Completa el formulario por favor e intenta de nuevo');
      }
  
      // Crear nuestro array de información del usuario
      $id = (int) $_POST['id'];
      $prospectos =
      [
        'nombre'    => clean_string($_POST['nombre']),
        'correo'     => $_POST['correo'],
        'telefono'       => $_POST['telefono'],
        'fecha'       => $_POST['fecha'],
        'estatus'    => clean_string($_POST['estatus']),
        'descripcion'    => clean_string($_POST['descripcion']),
        'inmueble'    => clean_string($_POST['inmueble']),
        'curp'    => clean_string($_POST['curp']),
        'rfc'    => clean_string($_POST['rfc']),
        'direccion'    => clean_string($_POST['direccion'])
      ];
  
  
      // Guardar en la base de datos
      //le decimos que si no se setio ningun cliente
      // para ello hacemos lo siguiente pasamos la funcion = update_clientes
      // y la tabla donde se hara el registro  y le decimos que si no se registro nungun cliente
      if(!update_record('clientes', ['id' => $id] , $prospectos)) {        
        // que nos imprima que hubo un error que intentemos de nuevo
        json_output(400,'Hubo un problema, intenta de nuevo');
      }
  
      json_output(200,'Cambios guardados con éxito');
      break;



//-----------------------------------------------
    //----------
    //Actualizar porpagar
    //---------

    case 'update_porpagar':
      if(!isset($_POST['id'],$_POST['nombre'],$_POST['pago'],$_POST['estatus'],$_POST['inmueble'],$_POST['concepto'],$_POST['fecha'],$_POST['tipo_transaccion'],$_POST['cuenta_contable'],$_POST['gasto'])) {
        json_output(403,'Completa el formulario por favor e intenta de nuevo');
      }
  
      // Crear nuestro array de información del usuario
      $id_porpagar = (int) $_POST['id'];
      $update_porpagar =
      [
        'nombre'    => clean_string($_POST['nombre']),
        'pago'     => $_POST['pago'],
        'estatus'     => $_POST['estatus'],
        'inmueble'       => $_POST['inmueble'],
        'concepto'    => clean_string($_POST['concepto']),
        'fecha'    => clean_string($_POST['fecha']),
        'tipo_transaccion'     => $_POST['tipo_transaccion'],
        'cuenta_contable'     => $_POST['cuenta_contable'],
        'gasto'       => $_POST['gasto']
      ];
  
  
      // Guardar en la base de datos
      //le decimos que si no se setio ningun cliente
      // para ello hacemos lo siguiente pasamos la funcion = update_clientes
      // y la tabla donde se hara el registro  y le decimos que si no se registro nunguna cuenta
      if(!update_record('clientes', ['id' => $id_porpagar] , $update_porpagar)) {        
        // que nos imprima que hubo un error que intentemos de nuevo
        json_output(400,'Hubo un problema, intenta de nuevo');
      }
  
      json_output(200,'Cambios guardados con éxito');
      break;






    //----------
    //Actualizar/Resgistrar Envio
    //---------



    case 'update_envio':
      if(!isset($_POST['id_venta'],$_POST['estatus'] )) {
        json_output(403,'Completa el formulario por favor e intenta de nuevo');
      }
  
      // Crear nuestro array de información del nuevo juego
      $id_venta = (int) $_POST['id_venta'];
      $envios =
      [
        'estatus'        => clean_string($_POST['estatus'])
      ];
  
  
      // Guardar en la base de datos
      //le decimos que si no se setio ningun estatus
      // para ello hacemos lo siguiente pasamos la funcion = update_record
      // y la tabla donde se hara el registro  y le decimos que si no se registro nungun estatus
      if(!update_record('envios', ['id_venta' => $id_venta] , $envios)) {
        // que nos imprima que hubo un error que intentemos de nuevo
        json_output(400,'Hubo un problema, intenta de nuevo');
      }

      json_output(200,'Cambios guardados con éxito');
      break;
  
      //-------------
      //eliminar usuario
      //-------------
      
    case 'delete_user':
      if(!isset($_POST['id'])) {
        json_output(403,'Acceso no autorizado');
      }
  
      $id = (int) $_POST['id'];
  
  
      // Borramos el registro
      if(!delete_record('usuarios' , ['id' => $id])) {
        json_output(400,'Hubo un problema, intenta de nuevo');
      }
  
  
      json_output(200,'usuario borrado con éxito u_u');
      break;

    
      //------------
      //fin eliminar usuario
      //------------


      //-------------
      //eliminar tipo de transaccion
      //-------------
      
    case 'delete_transaccion':
      if(!isset($_POST['id'])) {
        json_output(403,'Acceso no autorizado');
      }
  
      $id = (int) $_POST['id'];
  
  
      // Borramos el registro
      if(!delete_record('tipo_transaccion' , ['id' => $id])) {
        json_output(400,'Hubo un problema, intenta de nuevo');
      }
  
  
      json_output(200,'Flujo contable borrado con éxito u_u');
      break;

    
      //------------
      //fin eliminar tipo transaacion
      //------------
  

      //-------------
      //eliminar clientes
      //-------------
      
    case 'delete_cliente':
      if(!isset($_POST['id'])) {
        json_output(403,'Acceso no autorizado');
      }
  
      $id = (int) $_POST['id'];
  
  
      // Borramos el registro
      if(!delete_record('clientes' , ['id' => $id])) {
        json_output(400,'Hubo un problema, intenta de nuevo');
      }
  
  
      json_output(200,'Cliente borrado con éxito u_u');
      break;

    
      //------------
      //fin eliminar clientes
      //------------

      //-------------
      //eliminar cuenta por pagar
      //-------------
      
    case 'delete_porpagar':
      if(!isset($_POST['id'])) {
        json_output(403,'Acceso no autorizado');
      }
  
      $id = (int) $_POST['id'];
  
  
      // Borramos el registro
      if(!delete_record('clientes' , ['id' => $id])) {
        json_output(400,'Hubo un problema, intenta de nuevo');
      }
  
  
      json_output(200,'cuenta borrada con éxito u_u');
      break;

    
      //------------
      //fin eliminar cuenta por pagar
      //------------


 //-------------
      //eliminar pago de informes clientes
      //-------------
      
    case 'delete_pagos':
      if(!isset($_POST['id'])) {
        json_output(403,'Acceso no autorizado');
      }
  
      $id = (int) $_POST['id'];
  
  
      // Borramos el registro
      if(!delete_record('informes_clientes' , ['id' => $id])) {
        json_output(400,'Hubo un problema, intenta de nuevo');
      }
  
  
      json_output(200,'cuenta borrada con éxito u_u');
      break;

    
      //------------
      //fin eliminar pago de informes clientes
      //------------



    //funcion para eliminar productos de nuestro carrito

    case 'delete_cart':

    //session_start();
    $arreglo = $_SESSION['carrito'];
    for ($i=0; $i <count($arreglo) ; $i++) { 
    if ($arreglo[$i]['Id'] != $_POST['id']) {
    $arregloNuevo[]= array(
    'Id' =>$arreglo[$i]['Id'],
    'Nombre' =>$arreglo[$i]['Nombre'],
    'foto' =>$arreglo[$i]['foto'],
    'cantidad' =>$arreglo[$i]['cantidad'],
    'precio' =>$arreglo[$i]['precio'],
    );
    }
  }

  if (isset($arregloNuevo)) {
  $_SESSION['carrito']=$arregloNuevo;

  }else {
    //quiere decir que el registro a eliminar era el unico que habia
    unset($_SESSION['carrito']);
    //json_output(200,'Producto borrado con éxito u_u');
  }
  echo "Producto eliminado con exito U.U";
    break;

  //funcion para eliminar productos de nuestro carrito


  
    //funcion para actualizar productos de nuestro carrito

    case 'update_cart':

      //session_start();
      $arreglo = $_SESSION['carrito'];
      for ($i=0; $i <count($arreglo) ; $i++) { 
      if ($arreglo[$i]['Id'] == $_POST['id']) {
      $arreglo[$i]['Cuantos'] = $_POST['cuantos'];
      $_SESSION['carrito'] = $arreglo;
      break;
      
      }
    }
  
    
      break;
      
    //funcion para eliminar productos de nuestro carrito

  case 'delete_game':
    if(!isset($_POST['id'])) {
      json_output(403,'Acceso no autorizado');
    }

    $id = (int) $_POST['id'];

    // Validar que el juego es de hecho del usuario loggeado y que hace la petición
    if(!$game = get_game_by_id($id)) {
      json_output(400,'Producto no encontrado, intenta de nuevo');
    }

    // El usuario debe ser el mismo al id_usuario del registro
    if((int) $game['id_usuario'] !== (int) cur_user()['id']) {
      json_output(403);
    }

    // Borramos el registro
    if(!delete_record('stock' , ['id' => $id])) {
      json_output(400,'Hubo un problema, intenta de nuevo');
    }

    // Borrar la imagen que sobra del registro
    if(is_file(UPLOADS.$game['foto'])) {
      unlink(UPLOADS.$game['foto']);
    }

    json_output(200,'Producto borrado con éxito u_u');
    break;
  
  case 'share_modal':
    if(!isset($_POST['id'])) {
      json_output(403);
    }

    // Cargar la información de el videojuego que pasamos con id
    $id = (int) $_POST['id'];

    // Cargar el juego
    if(!$g = get_game_by_id($id)) {
      json_output(400,'Producto no encontrado, intenta de nuevo');
    }

    // Cargar nuestro modulo
    ob_start();
    require_once MODULES.'share_game_modal.php';
    $output = ob_get_clean();

    // Regresar el json con la información html
    json_output(200,'OK',$output);
    break;
  
  case 'submit_share_game':
    if(!isset($_POST['data'])) {
      json_output(403);
    }

    parse_str($_POST['data'] , $data);

    if(!isset($data['id_videojuego '],$data['email'],$data['mensaje'])) {
      json_output(403);
    }

    // Validar el correo electrónico
    if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)) {
      json_output(400, 'El correo electrónico no es válido');
    }

    // Validar el mensaje
    if(strlen($data['mensaje']) < 5) {
      json_output(400, 'Tu mensaje es demasiado corto, debe contener 5 caracteres mínimo');
    }

    // Validar que siga existiendo el juego
    // Cargar la información del juego
    if(!$g = get_game_by_id($data['id_videojuego'])) {
      json_output(400,'Juego no encontrado, intenta de nuevo');
    }

    // Crear mensaje
    $output = 
    '<h3>'.$g['Nombre'].'</h3>
    <p>'.clean_string($data['mensaje']).'</p>
    <img style="width: 200px;" src="'.get_image(UPLOADS.$g['foto']).'">
    <br><br>
    Este mensaje es generado de forma automática, favor de no responder.<br>
    <a href="'.URL.'register.php">Regístrate gratis</a> o <a href="'.URL.'login.php">Ingresa ahora</a>
    ';

    // Enviamos el mensaje al usuario
    if(!send_email($data['email'] , '['.COMPANY_NAME.'] Checa este producto - ¡Recomendado!' , $output)) {
      json_output(400,'El mensaje no pudo ser enviado, intenta de nuevo');
    }

    json_output(200,'Mensaje enviado con éxito');
    break;
  

    //creamos las peticiones y funciones del buscador

    case 'search_games':
      if(!isset($_POST['search_query'])) {
        json_output(403,'Hubo un problema, intenta de nuevo');
      }
  
      // query de la busqueda de la base de datos
      $query =  $_POST['search_query'];
  
//si esta vacio la busqueda
if(empty($query)) {
  json_output(400,'Escriba una busqueda valida por favor');
}

//Busqueda de los resultados
$results = search_games($query);
  
      // Cargar el html y formatearlo
      //esta es una funcion de php para cargar el bufer
      ob_start();
      //y traemos el modal con la informacion ya cargada
      require_once MODULES.'search_results_module.php';
      //ahora lo que haremos sera lo siguiente ya una vez entrado a nuestro archivo de los modales, vamos a guardar esa informacion obtenida del modal al darle click a ver el producto
      //que queramos ver y lo guardamos esa informacion de ese producto en la variable output
      $output = ob_get_clean();
  
      // Regresar el json con la información html
      json_output(200,'OK',$output);
    break;
  //fin de la creacion  las peticiones y funciones del buscadotr

  default:
    json_output(403);
    break;
}

