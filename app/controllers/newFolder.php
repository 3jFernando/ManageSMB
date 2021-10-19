<?php

// Crear Carpeta
$newFolder = $_POST['newFolder'];

if(isset($newFolder)){
    exec("smbclient '//$host/$folderRoot' -U '$user%$password' -c 'mkdir \"$changeFolder/$newFolder\"'");
    $newAlert = true;
    $newAlertMessage = 'Se ha creado la nueva carpeta "'.$newFolder.'"';
}
