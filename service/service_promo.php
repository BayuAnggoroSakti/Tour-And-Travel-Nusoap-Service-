<?php
require_once('nusoap.php');
$URL       = "http://localhost/prak_sit_travel/service/service_promo.php";
$namespace = $URL . '?wsdl';
$server = new soap_server;
$server->configureWSDL('travel', $namespace);


$server->register('promo', 
	array('input' => 'xsd:String'),
	array('output' => 'xsd:Array'),
	'urn:servicepromo',
	'urn:servicepromo#promo',
	'rpc',
	'encoded',
	'menampilkan promo wisata'
	);

$server->register('tambah_promo', 
	array('input' => 'xsd:Array'),
	array('output' => 'xsd:Array'),
	'urn:servicepromo',
	'urn:servicepromo#tambah_promo',
	'rpc',
	'encoded',
	'menambah data Promo'
	);



$server->register('detail_promo', 
	array('input' => 'xsd:String'),
	array('output' => 'xsd:Array'),
	'urn:servicepaket',
	'urn:servicepaket#detail_promo',
	'rpc',
	'encoded',
	'menampilkan detail promo'
	);

$server->register('edit_promo', 
	array('input' => 'xsd:Array'),
	array('output' => 'xsd:Array'),
	'urn:servicepaket',
	'urn:servicepaket#edit_promo',
	'rpc',
	'encoded',
	'menyimpan data promo setelah di edit'
	);

$server->register('hapus_promo', 
	array('input' => 'xsd:String'),
	array('output' => 'xsd:Array'),
	'urn:servicepaket',
	'urn:servicepaket#hapus_promo',
	'rpc',
	'encoded',
	'menghapus data promo'
	);


// koneksi ke database
include "koneksi.php";


function promo()
{

	$query = "SELECT * FROM promo";
	$hasil = mysql_query($query);
	while ($data = mysql_fetch_array($hasil))
	{
		// menyimpan data hasil pencarian dalam array
		$result[] = array('id_promo' => $data['id_promo'], 'nama' => $data['nama'], 'isi' => $data['isi'], 'tanggal_awal' => $data['tanggal_awal'], 'tanggal_akhir' => $data['tanggal_akhir'], 'gambar' => $data['gambar'], 'gambar' => $data['gambar'] );
	}
	// mereturn array hasil pencarian
	return $result;
}

function tambah_promo($nama, $isi, $tanggal_awal, $tanggal_akhir, $gambar)
{
	$query = "INSERT INTO promo (nama, isi, tanggal_awal, tanggal_akhir,gambar) VALUES ('$nama', '$isi', '$tanggal_awal', '$tanggal_akhir' , '$gambar')";
	$hasil = mysql_query($query);
	
	if ($hasil){

		return true;

	} else {

		return false;

	}
	
}

function detail_promo($id_promo)
{

	$query = "SELECT * FROM promo where id_promo = '$id_promo'";
	$hasil = mysql_query($query);
	while ($data = mysql_fetch_array($hasil))
	{
		// menyimpan data hasil pencarian dalam array
		$result[] = array('id_promo' => $data['id_promo'], 'nama' => $data['nama'], 'isi' => $data['isi'], 'tanggal_awal' => $data['tanggal_awal'], 'tanggal_akhir' => $data['tanggal_akhir'], 'gambar' => $data['gambar']);
	}
	return $result;
}

function edit_promo($id_promo, $nama, $isi, $tanggal_awal, $tanggal_akhir,$gambar)
{
	$query = "UPDATE promo SET nama='$nama',  isi = '$isi', tanggal_awal = '$tanggal_awal', tanggal_akhir = '$tanggal_akhir',gambar = '$gambar' WHERE id_promo = '$id_promo'";
	$hasil = mysql_query($query);
	if ($hasil ){

		return true;

	} else{

		return false;

	}
		
}

function hapus_promo($id_promo)
{

	$query = "DELETE FROM promo where id_promo='$id_promo'";
	$hasil = mysql_query($query);

	if ($hasil == true ){

		return true;

	} else {

		return false;

	}
}






$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);

?>
