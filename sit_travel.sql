-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2015 at 06:33 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sit_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(2) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'bayu anggoro sakti');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
`id_booking` int(2) NOT NULL,
  `id_pw` int(2) DEFAULT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `nomer_hp` varchar(200) NOT NULL,
  `banyak` int(11) NOT NULL,
  `tanggal_book` date NOT NULL,
  `tanggal_berangkat` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_pw`, `nama_lengkap`, `alamat`, `nomer_hp`, `banyak`, `tanggal_book`, `tanggal_berangkat`) VALUES
(1, 15, 'Bayu Anggoro Sakti', 'Desa Dengkek RT/RW 002/001\r\npati\r\nJawa Tengah', '085712645956', 2, '2015-12-10', '2015-12-23'),
(2, 14, 'Lutvi Havifazrin', 'Jalan Jiwonolo', '085712645999', 2, '2015-12-10', '0000-00-00'),
(3, 16, 'Hesti Kukuh Windarko', 'Desa pecinan, Kalibata, Yogyakarta', '0997981112', 3, '2015-12-10', '2015-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `paket_wisata`
--

CREATE TABLE IF NOT EXISTS `paket_wisata` (
`id_pw` int(2) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `durasi` int(2) NOT NULL,
  `harga` int(2) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_wisata`
--

INSERT INTO `paket_wisata` (`id_pw`, `nama`, `tujuan`, `durasi`, `harga`, `isi`, `gambar`) VALUES
(14, 'Menyusuri Goa Pindul', 'Goa Pindul, Gunungkidul, Daerah Istimewa Yogyakarta 55891', 2, 200000, '<p>PAKET WISATA</p>\n\n<p>Biaya Retribusi masuk kawasan Pindul : Rp.10.000 / orang</p>\n\n<p>Paket&nbsp;&nbsp;&nbsp;<a href="http://goapindul.com/cave-tubing-goa-pindul/" title="cave tubing goa pindul">Cave Tubing Pindul</a><br />\n1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jasa pemandu<br />\n2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Perlengkapan ( ban pelampung, jaket pelampung, sepatu karet, Head Lamp )<br />\n3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Asuransi<br />\n4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Biaya Rp 35.000/ orang (Wisatawan Lokal)</p>\n\n<p>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Biaya Rp 50.000/ orang (Wisatawan Mancanegara)</p>\n\n<p>&nbsp;</p>\n\n<p>Paket&nbsp;&nbsp;<a href="http://goapindul.com/river-tubing-kali-oyo/" title="River Tubing Kali Oyo">River Tubing Sungai Oya</a><br />\n1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jasa pemandu<br />\n2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Perlengkapan ( ban pelampung, jaket pelampung,sepatu karet )<br />\n3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Transportasi<br />\n4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Asuransi<br />\n5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Biaya Rp 45.000/ orang</p>\n\n<p>Paket&nbsp;<a href="http://goapindul.com/caving-goa-gelatik/" title="Caving Goa Gelatik">Goa Gelatik</a><br />\n1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jasa pemandu<br />\n2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Perlengkapan ( sepatu, helm , oksigen)<br />\n3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Asuransi<br />\n4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; B iaya Rp 30.000/ orang</p>\n\n<p>0812 2944 9004<br />\n0857 2954 3819<br />\n0819 0407 1919<br />\npin bb: 2237e835</p>\n\n<p>email: CaveTubingPindul@gmail.com<br />\nGelaran bejiharjo Karangmojo Gunungkidul DIY</p>\n\n<p>Filed under:&nbsp;<a href="http://goapindul.com/category/desa-wisata-bejiharjo/" rel="tag">desa wisata bejiharjo</a>,&nbsp;<a href="http://goapindul.com/category/goa-gelatik/" rel="tag">Goa Gelatik</a>,&nbsp;<a href="http://goapindul.com/category/goa-pindul/" rel="tag">Goa Pindul</a>,&nbsp;<a href="http://goapindul.com/category/off-road/" rel="tag">off road</a>,&nbsp;<a href="http://goapindul.com/category/sungai-oyo/" rel="tag">Sungai Oyo</a></p>\n', 'goa pindul.jpg'),
(15, 'Mendaki Gunung Api Purba', 'Desa Ngalanggeran, Gunungkidul, Daerah Istimewa Yogyakarta', 1, 100000, '<p>Paket wisata Jogja kali ini akan membahas Gunung Api Purba, terletak di Kabupaten Gunung Kidul. Nama asli gunung ini adalah Gunung Nglanggeran, merupakan Gunung Api Purba yang kini makin rame dikunjungi oleh para wisatawan baik domestik maupun manca negara. Banyak dari pengunjung yang datang berkelompok bersama anggota organisasi maupun keluarganya, para peneliti baik dari instansi maupun dari kampus. Tempat wisata di Jogja satu ini memang sangat sesuai untuk bersantai, maupun melakukan petualangan alam.</p>\n\n<p>Gunung Api Purba terletak di sekitar 25 KM dari Kota Jogja, dari Kota Jogja bisa melalui Jalan Wonosari, ikuti terus hingga bertemu dengan Puskesmas Patuk II atau disebut Puskesmas Tawang dan belok ke kanan hingga bertemu desa Nglanggeran. Jika anda tertarik untuk melakukan perjalanan&nbsp;<a href="http://wijayarentcar.com/paket-wisata-jogja/wisata-jogja-10-tempat-wisata-andalan-di-jogja-dan-sekitarnya/" title="See also Wisata Jogja - 10 Tempat Wisata Andalan di Jogja dan Sekitarnya">Wisata Jogja</a>&nbsp;di Gunung Api Purba dengan biaya murah,&nbsp;<a href="http://wijayarentcar.com/kontak-kami/" target="_blank" title="Wijaya Rent car | Paket wisata Jogja dan Rental Mobil Murah"><strong>Wijaya Rent Car</strong></a>&nbsp;siap membantu anda baik untuk&nbsp;<strong>Sewa Mobil di wilayah Jogja</strong>, maupun menemani anda berwisata ke tempat-tempat wisata lain.</p>\n', 'gunung api purba.jpg'),
(16, 'Pantai Indrayanti', ' Jl. Pantai Sel. Jawa, Wonosari, Kabupaten Gunung Kidul, Yogyakarta', 1, 90000, '<p>Wisata Indrayanti</p>\n\n<p>Pantai Pulang Syawal atau disingkat Pantai Pulsa ini merupakan salah satu pantai yang sangat menarik diantara sekian banyak pantai di wilayah Gunungkidul. Awalnya pantai ini disebut Pantai Indrayanti. Penyebutan nama Pantai Indrayanti sebelumnya mendapat banyak kontroversi karena Indrayanti sebenarnya bukan nama pantai ini melainkan nama dari pemilik salah satu kafe dan restoran yang berada di pantai ini. Karena nama Indrayanti yang terpasang dipapan nama di cafe dan restoran pantai ini selanjutnya masyarakat menyebut pantai ini menjadi nama&nbsp;<strong>Pantai Indrayanti</strong>.</p>\n\n<p>Sedangkan dari pemerintah sendiri menamai pantai ini dengan nama Pantai Pulang Syawal atau Pantai Pulsa. Akan tetapi pantai ini selanjutnya menjadi lebih terkenal dengan menggunakan nama Pantai Indrayanti.</p>\n\n<p><strong>Fasilitas tour :</strong></p>\n\n<p>1. Transportasi Avanza/Xenia,<br />\n2. Tiket masuk obyek wisata,<br />\n3. Makan siang 1x,<br />\n4. Dokumentasi foto,<br />\n5. Biaya parkir kendaraan,<br />\n6. Air mineral,<br />\n7. Sewa perlengkapan Cave Tubing Goa Kalisuci</p>\n\n<p><strong>Keterangan :</strong></p>\n\n<p>1. Private tour (tidak digabung dengan rombongan lain)<br />\n2. Tour Paket Wisata Alam ini diadakan setiap hari<br />\n3.&nbsp;<strong>Paket ini ntuk jumlah peserta minimal 5 orang</strong>. Untuk jumlah peserta yang lain silakan hubungi kami</p>\n', 'indrayanti.jpg'),
(17, 'Museum De Mata', 'XT Square Gedung UmarKayam, Jalan Veteran, Umbulharjo, Yogyakarta ', 1, 50000, '<p><em>De Mata Trick Eye Museum merupakan museum dengan koleksi gambar&nbsp;<a href="http://id.wikipedia.org/wiki/3_dimensi" target="_blank" title="arti 3 dimensi ">3 dimensi</a>&nbsp;yang akan menipu mata Anda. Ingin merasakan sensasi berjalan di jembatan kayu tua dengan aliran lahar panas di bawahnya atau menerima bunga mawar dari&nbsp;<a href="http://www.njogja.co.id/wisata-arsitektur/taman-sari-istana-air-tempat-permaisuri-dan-putri-raja-mandi/" target="_blank" title="Taman Sari â€“ Istana Air Tempat Permaisuri dan Putri Raja Mandi">Sri Sultan HB X</a>? Semuanya itu bisa Anda dapatkan di&nbsp;<strong><a href="http://www.njogja.co.id/museum-dan-monumen/museum-de-mata-museum-3d-yang-menipu-mata/" title="Museum De Mata, Museum 3D Yang Menipu Mata">Museum De Mata</a>.</strong></em></p>\n\n<p>Selama ini tiap mendengar kata museum biasanya orang akan membayangkan hal-hal yang usang dan membosankan. Koleksi kuno yang penuh debu, penjaga museum yang tua, dan bau apak yang menguar dari tiap ruangannya. Hal itu tidak sepenuhnya salah, karena memang nyaris sebagian besar museum di Indonesia kondisinya memprihatinkan seperti itu. Padahal, di kota-kota besar dunia museum justru menjadi tempat yang sangat menyenangkan dan destinasi utama untuk dikunjungi para wisatawan.</p>\n\n<p>Namun tidak semua museum seperti itu. Di Yogyakarta ada sebuah museum baru yang sangat unik dan pasti tidak akan membosankan. Justru wisatawan ingin terus-terusan kembali ke museum ini.&nbsp;<strong>De Mata Trick Eye Museum</strong>, begitulah nama museum yang menarik ini. Museum ini bukan museum biasa. Tidak ada koleksi barang-barang kuno maupun ruangan yang pengap. Sesuai dengan namanya, museum ini adalah museum tiga dimensi.</p>\n', 'museum de mata.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE IF NOT EXISTS `promo` (
`id_promo` int(2) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id_promo`, `nama`, `isi`, `tanggal_awal`, `tanggal_akhir`, `gambar`) VALUES
(4, 'Promo Harbolnas 2015', '<p>Dalam rangka memeriahkan hari Belanja Online Nasional 2015, Bukalapak - Situs jual beli online aman dan tepercaya - memberikan promo dobel diskon untuk semua produknya.&nbsp;<strong><a href="https://www.bukalapak.com/promo-harbolnas1212">Harbolnas 2015 di Bukalapak</a></strong>&nbsp;diselenggarakan selama 3 hari pada tanggal 10, 11, dan 12 Desember 2015. Dalam&nbsp;<em>event</em>&nbsp;ini, Bukalapak siap memanjakan kamu dengan memberikan promo dobel diskon.</p>\n\n<p>Tak hanya itu saja, belanja saat Harbolnas di Bukalapak juga memberikan keuntungan, sebab kamu juga bisa mendapatkan&nbsp;<em>voucher</em>&nbsp;belanja secara cuma-cuma. Hari Belanja Online Nasional yang diselenggarakan di Bukalapak merupakan kesempatan baik buat kamu yang saat ini ingin membeli&nbsp;<em>gadget</em>&nbsp;idaman. Ada diskon<em>handphone</em>&nbsp;dan&nbsp;<em>smartphone</em>, kamera, tablet, komputer, laptop dan puluhan promo&nbsp;<em>gadget</em>&nbsp;lainnya. Bahkan berbagai kebutuhan lain juga bisa kamu dapatkan di ajang Bukalapak Harbolnas ini, mulai dari barang-barang&nbsp;<em>fashion</em>, perawatan kecantikan/<em>personal care</em>, barang elektronik, perlengkapan rumah tangga, makanan, hobi atau mobil sekalipun.</p>\n\n<p>Jangan lupa, selain promo Harbolnas, Bukalapak juga memberikan promo belanja online&nbsp;<strong>Top Spender 2015</strong>&nbsp;dengan hadiah total hingga puluhan juta rupiah. Dengan rangkaian promo tersebut, pastinya berbelanja online di Bukalapak bikin kamu jadi tambah untung. Karena selain mendapat dobel diskon dan&nbsp;<em>voucher</em>belanja, kamu juga berkesempatan untuk memenangkan hadiah motor, kamera keren, bahkan iPhone 6S!</p>\n\n<p>Jadi jangan lewatkan kesempatan ini. Bagi kamu yang baru pertama kali belanja di Bukalapak, jangan ragu karena hanya di Bukalapak kamu bisa belanja online secara aman, nyaman, dan mudah dengan jaminan 100% uang kembali! Ayo, belanja sekarang di Bukalapak!</p>\n\n<p>Nikmati dobel diskon Bukalapak Harbolnas dengan membeli produk-produk favoritmu pada Hari Belanja Online Nasional 2015 spesial akhir tahun!</p>\n', '2015-12-10', '2015-12-12', 'HARBOLNAS_11.jpg'),
(5, 'Promo Akhir Tahun 2015', '<p><strong>Hari 01.&nbsp;</strong><br />\nJemput bandara<br />\nPantai Pandawa<br />\nMakan malam Jimbaran seafood<br />\nCheck in hotel.</p>\n\n<p>Durasi 6 jam</p>\n\n<p><strong>Hari 02.&nbsp;</strong><br />\nSarapan pagi di Hotel<br />\nDanau Beratan<br />\nPura Ulun danu<br />\nWisata Petik strawberry<br />\nMakan siang<br />\nJogger Bedugul<br />\nPura Alas kedaton<br />\nMakan malam<br />\nKembali ke hotel<br />\nDurasi 10 jam ( breakfast, lunch &amp; dinner)</p>\n\n<p><strong>Hari 03.</strong><br />\nSarapan pagi di Hotel<br />\nKintamani / penelokan<br />\nAir panas Toya Bungkah<br />\nMakan siang<br />\nPura Tirta Empul<br />\nMakan malam<br />\nKembali ke hotel</p>\n\n<p>Durasi 10 jam (breakfast, lunch &amp; dinner)</p>\n\n<p><strong>Hari 04</strong><br />\nSarapan pagi di hotel<br />\nPusat oleh &ndash; oleh<br />\nMakan siang<br />\nDiantar ke bandara</p>\n\n<p>Durasi 6 jam ( breakfast &amp; lunch)</p>\n', '2015-12-31', '2016-01-01', 'bali.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE IF NOT EXISTS `testimonial` (
`id_testimonial` int(2) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id_testimonial`, `nama`, `email`, `isi`, `tanggal`) VALUES
(1, 'Bayu Anggoro Sakti', 'bayu.anggoro.s@mail.ugm.ac.id', 'Sangat menyenangkan dan ingin kembali menyewa jasa tour ini, pelayanannya memuaskan dan baik', '2015-12-02'),
(2, 'Lutvi Havifazrin', 'lutvi@lutvi.com', 'Menyenangkan sekali berwisata di jogja dengan emmakai jasa tour ini, jogja is the best lah ', '2015-12-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
 ADD PRIMARY KEY (`id_booking`), ADD KEY `id_pw` (`id_pw`);

--
-- Indexes for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
 ADD PRIMARY KEY (`id_pw`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
 ADD PRIMARY KEY (`id_promo`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
 ADD PRIMARY KEY (`id_testimonial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
MODIFY `id_booking` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
MODIFY `id_pw` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
MODIFY `id_promo` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
MODIFY `id_testimonial` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
