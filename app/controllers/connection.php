<?php

require('../vendor/autoload.php');

// variables de logueo para SMB
$user = $_POST['user'];
$password = $_POST['password'];
$host = $_POST['host'];
$workgroup = $_POST['workgroup'];
$share = $_POST['share'];

// set the cookies
setcookie("User", $user);
setcookie("Pass", $password);
setcookie("Host", $host);
setcookie("Work", $workgroup);
setcookie("Folder", $folderRoot);

try {
    $auth = new \Icewind\SMB\BasicAuth($user, $workgroup, $password);
    $serverFactory = new \Icewind\SMB\ServerFactory();
    $server = $serverFactory->createServer($host, $auth);
    $share = $server->getShare($share);

} catch (\Throwable $th) {
    $statusServer = false;
}

