<?php

$fileInfo = $_POST['fileInfo'];
$fileNameInfo = $_POST['fileNameInfo'];

if(isset($_POST['btnFileInfo'])) {   

    echo $changeFolder. '<br>';
    echo $fileInfo. '<br>';
    echo $fileNameInfo. '<br>';
    // $salida = shell_exec("smbclient '//$host/$folderRoot' -U '$user%$password' -c 'allinfo \"$changeFolder/$fileNameInfo\"'");
    // echo "<pre>$salida</pre>";
}