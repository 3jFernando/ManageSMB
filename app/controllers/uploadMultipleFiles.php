<?php

$multipleFiles = $_FILES["multipleFiles"];
$uploads_temp = dirname(dirname(__FILE__)).'/assets/temp/';

if(isset($multipleFiles)) {
    foreach($multipleFiles['tmp_name'] as $key => $tmp_name) {
        $fileName = $multipleFiles['name'][$key];
        $source = $multipleFiles["tmp_name"][$key];

        if ($fileName) {
            /* if(!file_exists($uploads_temp)){
				mkdir($uploads_temp, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
			} */
            //Abrimos el directorio de destino
            $dir=opendir($uploads_temp); 
            //Indicamos la ruta de destino, así como el nombre del archivo
			$target_path = $uploads_temp.$fileName; 

            if(move_uploaded_file($source, $target_path)) {	
                exec("cd $uploads_temp && smbclient '//$host/$folderRoot/' -U '$user%$password' -D '$changeFolder' -c 'put \"$fileName\"'");
            }
             //Cerramos el directorio de destino
            closedir($dir); 
       }
    }
    exec('rm -f -r '. $uploads_temp .'*');
    $newAlertSuccess = true;
    $newAlertMessage = 'Se han subido todos los archivos de forma exitosa';
}