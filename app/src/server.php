<?php

require('../vendor/autoload.php');
include('../controllers/downloadFile.php');

// variables de logueo para SMB
$user = $_POST['user'];
$password = $_POST['password'];
$host = $_POST['host'];
$workgroup = $_POST['workgroup'];
$share = $_POST['share'];    

// directorios
$changeFolder = $_POST['changeFolder'];
$folderRoot = $_POST['share'];

// set the cookies
setcookie("User", $user);
setcookie("Pass", $password);
setcookie("Host", $host);
setcookie("Work", $workgroup);
setcookie("Folder", $folderRoot);

// Descargar archivos
$downloadFile = isset($_POST['downloadFIle']) ? $_POST['downloadFIle'] : 'NO';
$downloadFileTarget = isset($_POST['downloadFileTarget']) ? $_POST['downloadFileTarget'] : $downloadFile = 'NO';
$downloadFileTargetTitle = isset($_POST['downloadFileTargetTitle']) ? $_POST['downloadFileTargetTitle'] : $downloadFile = 'NO';
$fileDownloaded = false;
$fileDownloadedMessage = '';

// cantidad de directorios y archivos
$cantFolders = 0;
$cantFiles = 0;

try {

    $auth = new \Icewind\SMB\BasicAuth($user, $workgroup, $password);
    $serverFactory = new \Icewind\SMB\ServerFactory();
    $server = $serverFactory->createServer($host, $auth);

    $share = $server->getShare($share);

    // Control de cambio en las carpetas
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

    // descargar archivos
    if($downloadFile == 'SI') {     
        
        $pathFile = $_POST['downloadFileTarget'];

        // Use basename() function to return the base name of file
        $file_name = basename($pathFile);
        
        // obtener y guardar archivo
        file_put_contents( 'assets/files/'.$file_name, file_get_contents($pathFile));
          
        if(file_exists('assets/files/'.$file_name)) {
            $fileDownloaded = true;
            $fileDownloadedMessage = "Archivo ".$file_name." descargado con exito.";
        }
        else {
            $fileDownloaded = false;
            $fileDownloadedMessage = "No fue posible descargar el archivo.";
        }
    }

    // organizar archivos por tipo, primero las carpetas
    $files = array_merge($tempsFolders, $tempsFiles);
    $statusServer = true;

} catch (\Throwable $th){
    $statusServer = false;
}
