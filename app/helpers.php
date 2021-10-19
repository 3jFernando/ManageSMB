<?php

// directorios
$changeFolder = $_POST['changeFolder'];
$folderRoot = $_POST['share'];
$backFolder= preg_replace('/\W\w+\s*(\W*)$/', '$1', $changeFolder);

// cantidad de directorios y archivos
$cantFolders = 0;
$cantFiles = 0;

// Mensajes de notificaciòn
$newAlertSuccess = false;
$newAlertDanger = false;
$newAlertMessage = '';

$fileDownloaded = false;
$fileDownloadedMessage = '';