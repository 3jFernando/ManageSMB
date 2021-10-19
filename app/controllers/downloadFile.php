<?php

// Descargar archivos
$downloadFile = isset($_POST['downloadFIle']) ? $_POST['downloadFIle'] : 'NO';
$downloadFileTarget = isset($_POST['downloadFileTarget']) ? $_POST['downloadFileTarget'] : $downloadFile = 'NO';
$downloadFileTargetTitle = isset($_POST['downloadFileTargetTitle']) ? $_POST['downloadFileTargetTitle'] : $downloadFile = 'NO';
$uploads_dir = dirname(dirname(__FILE__)).'/assets/files/';

// descargar archivos
if($downloadFile == 'SI') {     
    
    $pathFile = $_POST['downloadFileTarget'];

    // Use basename() function to return the base name of file
    $file_name = basename($pathFile);
    
    // obtener y guardar archivo
    // file_put_contents( 'assets/files/'.$file_name, file_get_contents($pathFile));
    exec("cd $uploads_dir && smbclient '//$host/$folderRoot/' -U '$user%$password' -D '$changeFolder' -c 'get \"$file_name\"'");

    if(file_exists('assets/files/'.$file_name)) {
        $fileDownloaded = true;
        $fileDownloadedMessage = "Archivo ".$file_name." descargado con exito.";
    }
    else {
        $fileDownloaded = false;
        $fileDownloadedMessage = "No fue posible descargar el archivo.";
    }
}