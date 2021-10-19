<?php

include('./helpers.php');
include('./controllers/connection.php');
include('./controllers/newFolder.php');
include('./controllers/uploadFile.php');
include('./controllers/downloadFile.php');
include('./controllers/downloadMultipleFiles.php');

try {

    // Control de cambio en las carpetas
    // || isset($backFolder
    if (isset($changeFolder)) {
        $filesTemps = $share->dir($changeFolder);
    } else {
        $filesTemps = $share->dir('/');
    }

    $tempsFolders = [];
    $tempsFiles = [];
    foreach ($filesTemps as $key => $file) {

        $_file = [
            "id" => $key,
            "title" => $file->getName(),
            "type" => $file->isDirectory() ? "CARPETA" : "ARCHIVO", // mime_content_type($file['path']), // $type ? "CARPETA" : "ARCHIVO" true: folder, false: file            
            "weight" => $file->getSize().'Bytes',
            "address" => '',
            "path" => $file->getPath(),
            "content" =>'',   
        ];

        // reorganizar carpetas primero y luego archivos
        if($file->isDirectory()) {
            $tempsFolders[] = $_file;
            $cantFolders += 1;
        } else {
            $tempsFiles[] = $_file;
            $cantFiles += 1;
        }
    }

    // organizar archivos por tipo, primero las carpetas
    $files = array_merge($tempsFolders, $tempsFiles);
    $statusServer = true;

} catch (\Throwable $th){
    $statusServer = false;
}
