<?php

// Subir archivos

$fileToUpload = basename($_FILES["fileToUpload"]["name"]);

$uploads_dir = dirname(dirname(__FILE__)).'/assets/files/';
$fileTemp = $uploads_dir . $fileToUpload;

if(isset($_FILES["fileToUpload"])){
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fileTemp)) {
        exec("cd $uploads_dir && smbclient '//$host/$folderRoot/' -U '$user%$password' -D '$changeFolder' -c 'put \"$fileToUpload\"'", $output, $return);
        
        if(!$return) {
            $newAlertSuccess = true;
            $newAlertMessage = 'Se ha subido un nuevo archivo "'.$fileToUpload.'"';
        } else {
            $newAlertDanger = true;
            $newAlertMessage = 'Fallo la conexión al cargar el archivo "'.$fileToUpload.'"';
        }
    } else {
        $newAlertDanger = true;
        $newAlertMessage = 'No se ha podido cargar el archivo "'.$fileToUpload.'"';
    }
    unlink($fileTemp);
}