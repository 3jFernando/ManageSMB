<?php

$pathFile = $_POST['downloadFileTarget'];

// Use basename() function to return the base name of file
$file_name = basename($pathFile);

// Use file_get_contents() function to get the file
// from url and use file_put_contents() function to
// save the file by using base name

$status = file_get_contents($pathFile);
var_dump($status);

if(file_put_contents( '../assets/files/'.$file_name, file_get_contents($pathFile))) {
    echo "File downloaded successfully";
}
else {
    echo "File downloading failed.";
}