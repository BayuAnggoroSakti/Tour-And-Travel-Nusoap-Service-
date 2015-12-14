<?php
require_once('nusoap.php');
$URL       = "http://localhost/prak_sit_travel/service/service_login.php";
$namespace = $URL . '?wsdl';
$server = new soap_server;
$server->configureWSDL('travel', $namespace);


$server->register('login', 
	array('input' => 'xsd:Array'),
	array('output' => 'xsd:Array'),
	'urn:servicelogin',
	'urn:login#login',
	'rpc',
	'encoded',
	'login admin'
	);

// koneksi ke database
include "koneksi.php";


function login($username, $password)
{

	$hash= md5($password);
	$query = "SELECT * FROM admin WHERE username = '$username' AND password = '$hash'";
	$hasil = mysql_query($query);
	$num_rows = mysql_num_rows($hasil);
	
	// mereturn array hasil pencarian
	return $num_rows;
}


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);

?>
