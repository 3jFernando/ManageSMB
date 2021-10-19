<?php

// Obtener el nombre del directorio
$newFolder = $_POST['newFolder'];

if(isset($newFolder)){
    // Crea un nuevo directorio en el servidor.
    exec("smbclient '//$host/$folderRoot' -U '$user%$password' -c 'mkdir \"$changeFolder/$newFolder\"'", $output, $return);
    
    if(!$return) {
        $newAlertSuccess = true;
        $newAlertMessage = 'Se ha creado la nueva carpeta "'.$newFolder.'"';
    } else {
        $newAlertDanger = true;
        $newAlertMessage = 'Se ha producido un error al crear la carpeta, intenta de nuevo';
    }
}
