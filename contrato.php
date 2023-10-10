<?php
    include_once('tbs_class.php'); 
    include_once('lib_word/tbs_plugin_opentbs.php'); 

    require 'conexion.php';

    //id del cliente para obtener información de el
    $id = $_GET['id'];
    

    $query = "SELECT nombre, fecha
    FROM clientes WHERE id = '$id' ";
	$resultado = $mysql->query($query);

    $row = $resultado->fetch_assoc();

    $nombre = $row['nombre'];
    $fecha = $row['fecha'];

    $TBS = new clsTinyButStrong; 
    $TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); 
    //Parametros
    /*
    $nomprofesor = 'César Code';
    $fechaprofesor = '04/06/2020';
    $firmadecano = 'firma.png';
     */

    //Cargando template
    $template = 'contrato_oxxo.docx';
    $TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8);
    //Escribir Nuevos campos
    $TBS->MergeField('cliente', $nombre);
    $TBS->MergeField('fecha', $fecha);
   // $TBS->VarRef['x'] = $firmadecano;

    $TBS->PlugIn(OPENTBS_DELETE_COMMENTS);

    $save_as = (isset($_POST['save_as']) && (trim($_POST['save_as'])!=='') && ($_SERVER['SERVER_NAME']=='localhost')) ? trim($_POST['save_as']) : '';
    $output_file_name = str_replace('.', '_'.date('Y-m-d').$save_as.'.', $template);
    if ($save_as==='') {
        $TBS->Show(OPENTBS_DOWNLOAD, $output_file_name); 
        exit();
    } else {
        $TBS->Show(OPENTBS_FILE, $output_file_name);
        exit("File [$output_file_name] has been created.");
    }
?>