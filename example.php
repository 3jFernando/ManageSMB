<?php

require('vendor/autoload.php');

$user= $_POST['user'];
$password= $_POST['password'];
$host= $_POST['host'];
$workgroup= $_POST['workgroup'];
$share= $_POST['share'];

try {
	$auth = new \Icewind\SMB\BasicAuth($user, $workgroup, $password);
	$serverFactory = new \Icewind\SMB\ServerFactory();

	echo "Conectando... \n\n";

	$server = $serverFactory->createServer($host, $auth);
	$share = $server->getShare($share);

	$files = $share->dir('/');
	foreach ($files as $file) {
		echo $file->getName() . "\n";
	}


	echo "Conectado";
	
} catch (\Throwable $th) {
	echo "No se puede conectar!";
}


