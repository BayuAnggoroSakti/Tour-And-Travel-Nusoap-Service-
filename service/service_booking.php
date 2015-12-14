<?php
require_once('nusoap.php');
$URL       = "http://localhost/prak_sit_travel/service/service_login.php";
$namespace = $URL . '?wsdl';
$server = new soap_server;
$server->configureWSDL('travel', $namespace);


$server->register('booking', 
	array('input' => 'xsd:String'),
	array('output' => 'xsd:Array'),
	'urn:servicebooking',
	'urn:servicebooking#booking',
	'rpc',
	'encoded',
	'menampilkan booking wisata'
	);

$server->register('tambah_booking', 
	array('input' => 'xsd:Array'),
	array('output' => 'xsd:Array'),
	'urn:servicebooking',
	'urn:servicebooking#tambah_booking',
	'rpc',
	'encoded',
	'booking paket wisata'
	);


$server->register('detailbooking', 
	array('input' => 'xsd:String'),
	array('output' => 'xsd:Array'),
	'urn:servicebooking',
	'urn:servicebooking#detailbooking',
	'rpc',
	'encoded',
	'menampilkan detail booking'
	);



// koneksi ke database
include "koneksi.php";


function booking()
{

	$query = "SELECT id_booking, pw.nama as nama, nama_lengkap, alamat, nomer_hp, banyak, tanggal_book, tanggal_berangkat FROM booking b, paket_wisata pw where b.id_pw = pw.id_pw";
	$hasil = mysql_query($query);
	while ($data = mysql_fetch_array($hasil))
	{
		// menyimpan data hasil pencarian dalam array
		$result[] = array('id_booking' => $data['id_booking'], 'nama' => $data['nama'], 'nama_lengkap' => $data['nama_lengkap'], 'alamat' => $data['alamat'], 'nomer_hp' => $data['nomer_hp'], 'banyak' => $data['banyak'], 'tanggal_book' => $data['tanggal_book'], 'tanggal_berangkat' => $data['tanggal_berangkat'] );
	}
	// mereturn array hasil pencarian
	return $result;
}

function tambah_booking($id_pw, $nama_lengkap, $alamat, $nomer_hp, $banyak, $tanggal_book, $tanggal_berangkat)
{
	$query = "INSERT INTO booking (id_pw, nama_lengkap, alamat, nomer_hp,banyak, tanggal_book, tanggal_berangkat) VALUES ('$id_pw', '$nama_lengkap', '$alamat', '$nomer_hp' , '$banyak', '$tanggal_book', '$tanggal_berangkat')";
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
