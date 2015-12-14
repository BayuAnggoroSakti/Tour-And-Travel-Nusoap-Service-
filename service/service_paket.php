<?php
require_once('nusoap.php');
$URL       = "http://localhost/prak_sit_travel/service/service_paket.php";
$namespace = $URL . '?wsdl';
$server = new soap_server;
$server->configureWSDL('travel', $namespace);



$server->register('paket', 
	array('input' => 'xsd:String'),
	array('output' => 'xsd:Array'),
	'urn:servicepaket',
	'urn:servicepaket#paket',
	'rpc',
	'encoded',
	'menampilkan data paket wisata'
	);


$server->register('detailpaket', 
	array('input' => 'xsd:String'),
	array('output' => 'xsd:Array'),
	'urn:servicepaket',
	'urn:servicepaket#detailpaket',
	'rpc',
	'encoded',
	'menampilkan detail paket'
	);

$server->register('tambah_paket', 
	array('input' => 'xsd:String'),
	array('output' => 'xsd:Array'),
	'urn:servicepaket',
	'urn:servicepaket#tambah_paket',
	'rpc',
	'encoded',
	'Menambahkan paket wisata'
	);

$server->register('detail_paket', 
	array('input' => 'xsd:Array'),
	array('output' => 'xsd:Array'),
	'urn:servicepaket',
	'urn:servicepaket#detail_paket',
	'rpc',
	'encoded',
	'menampilkan detail paket'
	);

$server->register('edit_paket', 
	array('input' => 'xsd:Array'),
	array('output' => 'xsd:Array'),
	'urn:servicepaket',
	'urn:servicepaket#edit_paket',
	'rpc',
	'encoded',
	'menyimpan data paket setelah di edit'
	);

$server->register('hapus_paket', 
	array('input' => 'xsd:String'),
	array('output' => 'xsd:Array'),
	'urn:servicepaket',
	'urn:servicepaket#hapus_paket',
	'rpc',
	'encoded',
	'menghapus data paket'
	);


// koneksi ke database
include "koneksi.php";


function paket()
{

	$query = "SELECT * FROM paket_wisata";
	$hasil = mysql_query($query);
	while ($data = mysql_fetch_array($hasil))
	{
		// menyimpan data hasil pencarian dalam array
		$result[] = array('id_pw' => $data['id_pw'], 'nama' => $data['nama'], 'tujuan' => $data['tujuan'], 'durasi' => $data['durasi'], 'harga' => $data['harga'], 'isi' => $data['isi'], 'gambar' => $data['gambar'] );
	}
	// mereturn array hasil pencarian
	return $result;
}

function tambah_paket($nama, $tujuan, $durasi, $harga, $isi,$gambar)
{
	$tambah = mysql_query("INSERT INTO paket_wisata (nama, tujuan, durasi, harga, isi, gambar) values ('$nama','$tujuan','$durasi','$harga','$isi','$gambar')");
	if ($tambah) 
	{
		return true;
	}
	else
	{
		return false;
	}

}

function detail_paket($id_pw)
{

	$query = "SELECT * FROM paket_wisata where id_pw = '$id_pw'";
	$hasil = mysql_query($query);
	while ($data = mysql_fetch_array($hasil))
	{
		// menyimpan data hasil pencarian dalam array
		$result[] = array('id_pw' => $data['id_pw'], 'nama' => $data['nama'], 'tujuan' => $data['tujuan'], 'durasi' => $data['durasi'], 'harga' => $data['harga'], 'isi' => $data['isi'], 'gambar' => $data['gambar']);
	}
	// mereturn array hasil pencarian
	return $result;
}

function edit_paket($id_pw, $nama, $tujuan, $durasi, $harga, $isi, $gambar)
{
	$query = "UPDATE paket_wisata SET nama='$nama',  tujuan = '$tujuan', durasi = '$durasi', harga = '$harga', isi = '$isi', gambar = '$gambar' WHERE id_pw = '$id_pw'";
	$hasil = mysql_query($query);
	if ($hasil ){

		return true;

	} else{

		return false;

	}
		
}

function hapus_paket($id_pw)
{

	$query = "DELETE FROM paket_wisata where id_pw='$id_pw'";
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
