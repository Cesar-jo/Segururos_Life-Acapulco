<?php
    include_once('tbs_class.php'); 
    include_once('lib_word/tbs_plugin_opentbs.php'); 

    require 'conexion.php';

    //id del cliente para obtener información de el
    $id = $_GET['id'];
    
  
    

  $query = "SELECT id, nombre, fecha, venc_factura, monto, inmueble, rfc, telefono, correo, factura FROM clientes WHERE id = '$id' ";
	$resultado = $mysql->query($query);

    $row = $resultado->fetch_assoc();
    
    
    

   

    $nombre = $row['nombre'];
    $fecha = $row['fecha'];
    $venc_factura = $row['venc_factura'];
    $id = $row['id'];
    $monto = $row['monto'];
    $inmueble = $row['inmueble'];
     $rfc = $row['rfc'];
    $telefono = $row['telefono'];
    $correo = $row['correo'];
     $factura = $row['factura'];
    
    
    
  $iva = .16;
    $r = $monto * $iva;
    $subtotal = $monto - $r;



    $TBS = new clsTinyButStrong; 
    $TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); 
    //Parametros
    /*
    $nomprofesor = 'César Code';
    $fechaprofesor = '04/06/2020';
    $firmadecano = 'firma.png';
     */

    //Cargando template
    $template = 'factura.docx';
    $TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8);
    //Escribir Nuevos campos
    $TBS->MergeField('nombre', $nombre);
    $TBS->MergeField('venc_factura', $venc_factura);
    $TBS->MergeField('id', $id);
    $TBS->MergeField('inmueble', $inmueble);
    $TBS->MergeField('monto', $monto);
    $TBS->MergeField('rfc', $rfc);
    $TBS->MergeField('telefono', $telefono);
    $TBS->MergeField('correo', $correo);
    

     $TBS->MergeField('estatus', $factura);
    $TBS->MergeField('fecha', $row1['fecha']);
    
    $TBS->MergeField('total', $total);
    $TBS->MergeField('iva', $r);
    $TBS->MergeField('subtotal', $subtotal);
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