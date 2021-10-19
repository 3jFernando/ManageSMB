<?php

$paths = $_POST['downloadFiles'];
// Requiere dar permisos en la carpeta (Crear y eliminar archivos)
$uploads_dir = dirname(dirname(__FILE__)).'/assets/temp/';

if(isset($paths)){
    foreach ($paths as $keyPath){
        $fileName = basename($keyPath);
        exec("cd $uploads_dir && smbclient '//$host/$folderRoot/' -U '$user%$password' -D '$changeFolder' -c 'get \"$fileName\"'");
        // echo "Completed";
    }

    // Creamos un instancia de la clase ZipArchive
    $zip = new ZipArchive();
    $zipName = date('Y-m-d', time())."-archivos.zip";

    // Comprobar archivo zip temporal
    if ($zip->open($zipName, ZIPARCHIVE::CREATE | ZipArchive::OVERWRITE)==TRUE){
        foreach(glob($uploads_dir . '/*') as $file) {
            $zip->addFile($file, basename($file));
        }
        $zip->close();

        // Luego descarga el archivo comprimido.
        header('Content-Description: File Transfer');
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename='.$zipName);
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($zipName));
        ob_clean();
        readfile($zipName);

        //$newAlert = true;
        //$newAlertMessage = 'Se descargaron los archivos seleccionados con exito "'.$zipName.'"';
        } else {
        echo 'Failed to create to zip. Error';
    }
    // Elimina todos los archivos temporales
    exec('rm -f -r '. $uploads_dir .'*');
    (is_file($zipName)) ? unlink($zipName) : null;
}