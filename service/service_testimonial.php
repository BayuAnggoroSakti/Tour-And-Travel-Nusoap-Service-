<?php
require_once('nusoap.php');
$URL       = "http://localhost/prak_sit_travel/service/service_testimonial.php";
$namespace = $URL . '?wsdl';
$server = new soap_server;
$server->configureWSDL('travel', $namespace);



$server->register('testimonial', 
	array('input' => 'xsd:String'),
	array('output' => 'xsd:Array'),
	'urn:servicetestimonial',
	'urn:servicetestimonial#testimonial',
	'rpc',
	'encoded',
	'menampilkan testimonial wisata'
	);

$server->register('tambah_testimonial', 
	array('input' => 'xsd:Array'),
	array('output' => 'xsd:Array'),
	'urn:servicetestimonial',
	'urn:servicetestimonial#tambah_testimonial',
	'rpc',
	'encoded',
	'menambah Testimonial Pelanggan'
	);


// koneksi ke database
include "koneksi.php";


function testimonial()
{

	$query = "SELECT * from testimonial";
	$hasil = mysql_query($query);
	while ($data = mysql_fetch_array($hasil))
	{
		// menyimpan data hasil pencarian dalam array
		$result[] = array('id_testimonial' => $data['id_testimonial'], 'nama' => $data['nama'], 'email' => $data['email'], 'isi' => $data['isi'], 'tanggal' => $data['tanggal'] );
	}
	// mereturn array hasil pencarian
	return $result;
}

function tambah_testimonial($nama, $email, $isi)
{
	$date = date("Y-m-d H:i:s");
	$query = "INSERT INTO testimonial (nama, email, isi, tanggal) VALUES ('$nama', '$email', '$isi','$date')";
	$hasil = mysql_query($query);
	
	if ($hasil){

		return true;

	} else {

		return false;

	}
	
}



$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);

?>
