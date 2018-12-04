<?php

define("HOST", "localhost");
define("DB", "petshopdb");
define("UID", "root");
define("PWD", "");

function load($sql) {
	$cn = new mysqli(HOST, UID, PWD, DB);
	if ($cn->connect_errno) {
	    die("FAILED");
	}

	// echo $cn->host_info . "\n";
	$cn->query("set names 'utf8'");
    $rs = $cn->query($sql);
    //$cn->close();
	return $rs;
}







function write($sql) {
	$cn = new mysqli(HOST, UID, PWD, DB);
	if ($cn->connect_errno) {
	    die("FAILED");
	}

	$cn->query("set names 'utf8'");
	$cn->query($sql);
	
}