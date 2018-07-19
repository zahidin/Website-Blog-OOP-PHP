-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 19, 2018 at 02:41 
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukutamu`
--

CREATE TABLE `bukutamu` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `jenis_kelamin` enum('P','W') NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `tgl_bukutamu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukutamu`
--

INSERT INTO `bukutamu` (`id`, `nama`, `email`, `kota`, `jenis_kelamin`, `pesan`, `tgl_bukutamu`) VALUES
(2, 'karim', 'kaki@gmail.com', 'Papua', 'P', 'Mantep udh hampir beres webnya \r\nSemangat terus gannn !!!!', '01-07-2018 16:00:36'),
(3, 'hacker', 'test@gmail.com', 'Gorontalo', 'W', 'Web lu siap siap gua pentest gann :))', '01-07-2018 16:01:29'),
(4, 'hamba allah', 'husni@gmail.com', 'Jakarta', 'P', 'Kalo udh selesai web lu gua kasih mod bis yang lu minta hahaha\r\n', '01-07-2018 16:02:38'),
(5, 'ika wahyuni', 'ikawahyuni13@gmail.com', 'Jakarta', 'W', 'Semangat zahidin buat webnya !!! nanti kalo udh selesai aku beliin martabak deh hahaha', '01-07-2018 16:03:53'),
(6, 'jc tamara', 'jctamarajb98@gmail.com', 'Jawa Tengah', 'W', 'Wehhh gila gua udh ga sabar nungguin jadi webnya hahaha nanti kalo udah selesai makan makan kita hahahhaha', '01-07-2018 16:05:34'),
(7, 'Annisa Dita', 'annisadita98@gmail.com', 'Jawa Barat', 'W', 'Ajari ya din \nNanti aku kasih makanan biar kamu gemuk uncchðŸ˜™', '02-07-2018 17:36:04'),
(8, 'reza zulfikar ramdhan', 'reza.zulfikar50@gamil.com', 'Jawa Barat', 'P', 'tolong di kembangkan lagi sebagaimana fungsi aplikasi ini.', '08-07-2018 11:45:30');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `alt` varchar(100) NOT NULL,
  `tanggal_upload` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `nama_file`, `alt`, `tanggal_upload`) VALUES
(14, 'logo unsada.jpg', 'unsada\r\n', '30-06-2018 07:00:15'),
(15, 'IMG_20180309_185243_882.jpg', 'logo surabaya hacker link ', '30-06-2018 07:00:38'),
(16, 'nopic.png', 'anon', '30-06-2018 07:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id` int(11) NOT NULL,
  `kode_katalog` varchar(100) NOT NULL,
  `judul_katalog` varchar(100) NOT NULL,
  `jumlah` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id`, `kode_katalog`, `judul_katalog`, `jumlah`) VALUES
(1, '32832435345', 'Tutorial Mysql', '12'),
(2, '43545454625', 'Perfomance Jquery pada aplikasi web', '371'),
(3, '43436353435', 'Kontan : Koruptor Masa Kini', '45');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Olahraga'),
(2, 'Otomotif'),
(3, 'Teknologi'),
(4, 'Politik');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `tgl_komentar` varchar(20) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `nama`, `email`, `komentar`, `tgl_komentar`, `id_post`) VALUES
(1, 'karim', 'kaki@gmail.com', 'Bagus gannn', '29-06-2018', 4),
(2, 'anon', 'test2@gmail.com', 'saya hacker gan jadi gausah liat ginian \r\ntinggal ganti warna tulisan cmd jadi ijo terus upload ke facebook jadi hacker gua', '29-06-2018', 4),
(4, 'ujang', 'ucok@gmail.com', 'test', '29-06-2018', 4),
(8, 'karim', 'kaki@gmail.com', 'kalo mau jadi hacker harus belajar darimana dulu si min ??', '01-07-2018', 6),
(9, 'ika wahyuni', 'kaki@gmail.com', 'aduh kamu tuh kalo jadi hacker aku makin sayang aja sama kamu :3', '01-07-2018', 6),
(10, 'Roykiyosi dan Robi', 'riskididin@ymail.com', 'Saya mencium bau aroma rumus kalkulus', '05-07-2018', 7),
(11, 'CEO RSA', 'coba@gmail.com', 'Tetep masih ribet kripto gua ', '05-07-2018', 7),
(12, 'ika wahyuni', 'ikawahyuni13@gmail.com', 'Makasih sayang', '07-07-2018', 7);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi_konten` text NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `tgl_post` varchar(50) NOT NULL,
  `kategori` int(11) NOT NULL,
  `tag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `judul`, `isi_konten`, `penulis`, `tgl_post`, `kategori`, `tag`) VALUES
(4, 'Website Untuk Merapikan Kode Program Anda', '<p style="text-align: justify;">Programming atau yang biasa disebut Coding yaitu suatu pekerjaan yang membutuhkan banyak penulisan kode untuk berinteraksi dengan mesin atau komputer dan sejenisnya. Coding kadang-kadang memerlukan ratusan bahkan puluhan ribu baris kode yang ada di dalamnya, belum sempat dipusingkan dengan ribuan kode tersebut disisi lain di tuntut kerapihan dalam menulis kode tersebut, maka dari itu untuk mempermudah diperlukan alat bantu untuk merapikan penulisan kode.</p>\r\n<p style="text-align: justify;">Tools Online Untuk Merapikan Kode Program pada kebanyakan kasus, para programmer memerlukan alat bantu dari internet atau yang biasa kita sebut online tools. Alat bantu yang mereka perlukan saat melakukan coding atau pada saat membuat program tentunya adalah alat bantu yang mudah digunakan, karena kebanyakan programmer tidak mau dipusingkan oleh hal lain selain masalah program yang mereka pikirkan. berikut merupakan Tools Online/alat bantu Untuk Merapikan Kode Program.</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 25px; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 16px; vertical-align: baseline; background-position: 0px 0px; background-color: rgb(255, 255, 255); word-wrap: break-word; line-height: 1.8em; color: rgb(65, 65, 65); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; text-align: justify;">CSS<br style="box-sizing: border-box;" /><a href="www.cssportal.com">www.cssportal.com</a><br style="box-sizing: border-box;" /><a href="www.styleneat.com">www.styleneat.com</a><br style="box-sizing: border-box;" />Www.tools.arantius.com/tabifier<br style="box-sizing: border-box;" /><a href="www.dirtymarkup.com">www.dirtymarkup.com</a></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 25px; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 16px; vertical-align: baseline; background-position: 0px 0px; background-color: rgb(255, 255, 255); word-wrap: break-word; line-height: 1.8em; color: rgb(65, 65, 65); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; text-align: justify;">HTML<br style="box-sizing: border-box;" /><a href="www.fisip.net">www.fisip.net</a><br style="box-sizing: border-box;" />tools.arantius.com/tabifier<br style="box-sizing: border-box;" /><a href="www.dirtymarkup.com">www.dirtymarkup.com</a></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 25px; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 16px; vertical-align: baseline; background-position: 0px 0px; background-color: rgb(255, 255, 255); word-wrap: break-word; line-height: 1.8em; color: rgb(65, 65, 65); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; text-align: justify;">PHP<br style="box-sizing: border-box;" />phpcodecleaner.com</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 25px; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 16px; vertical-align: baseline; background-position: 0px 0px; background-color: rgb(255, 255, 255); word-wrap: break-word; line-height: 1.8em; color: rgb(65, 65, 65); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; text-align: justify;">JS<br style="box-sizing: border-box;" /><a href="www.dirtymarkup.com">www.dirtymarkup.com</a><br style="box-sizing: border-box;" />jsbeautifier.org</p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 25px; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 16px; vertical-align: baseline; background-position: 0px 0px; background-color: rgb(255, 255, 255); word-wrap: break-word; line-height: 1.8em; color: rgb(65, 65, 65); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; text-align: justify;">CSS, HTML, Javascript, JSON, Perl, PHP, Phyton, Ruby, Sql, dan XML<br style="box-sizing: border-box;" /><a href="www.cleancss.com">www.cleancss.com</a></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 25px; padding: 0px; border-width: 0px; outline-width: 0px; font-size: 16px; vertical-align: baseline; background-position: 0px 0px; background-color: rgb(255, 255, 255); word-wrap: break-word; line-height: 1.8em; color: rgb(65, 65, 65); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; text-align: justify;">Silahkan eksplore sesuai bahasa yang kalian gunakan.</p>\r\n<p><br /></p>', 'admin', '28-06-2018', 3, '#web'),
(6, 'Hacker vs Cracker, Apa Bedanya?', '<p style="text-align: justify;">Mungkin kata hacker dan cracker ditelinga kita tidak terasa asing. Orang yang melakukan hacking dan terkenal dengan sebutan hacker adalah sesuatu yang merusak. Lalu bagaimana dengan cracker? Apakah artinya sama saja merusak sesuatu? Dipandangan orang awam, hacker dan cracker dikategorikan sama, sebagai sesuatu yang negatif, jahat dan bersifat merusak. Sebelum menghakimi bahwa keduanya dikategorikan sebagai sesuatu yang merusak, mari kita lihat apa definisi dari kedua belah pihak. Peretas (hacker) adalah orang yang mempelajari, menganalisa, memodifikasi, menerobos masuk ke dalam komputer dan jaringan komputer, baik untuk keuntungan atau dimotivasi oleh tantangan. Cracker adalah hacker yang melanggar batas hukum dalam aksinya, seperti misalnya: mencuri data, mengubah account perbankan, mendistribusikan worm, virus dan sebagainya. Sehingga sebenarnya hacker dan cracker dibedakan melalui bagaimana mereka menggunakan keahliannya dengan bertanggung jawab. Seseorang yang dikategorikan hacker pada dasarnya adalah cracker, namun tidak semua hacker adalah cracker. Mengapa demikian? Kembali lagi ke definisi awal, dimana hacker adalah sebutan untuk orang atau sekelompok orang yang memberikan sumbangan bermanfaat untuk dunia jaringan dan sistem operasi, membuat program bantuan untuk dunia jaringan dan komputer. Hacker juga bisa di kategorikan perkerjaan yang dilakukan untuk mencari kelemahan suatu system dan memberikan ide atau pendapat yang bisa memperbaiki kelemahan system yang di temukannya. Sedangkan cracker adalah sebutan untuk mereka yang masuk ke sistem orang lain dan cracker lebih bersifat destruktif, biasanya di jaringan komputer, mem-bypass password atau lisensi program komputer, secara sengaja melawan keamanan komputer, men-deface (merubah halaman muka web) milik orang lain bahkan hingga men-delete data orang lain, dan mencuri data. Hacker sendiri terbagi menjadi lima kelompok, dan cracker dikategorikan ke dalam black hat hacker. Perhatikan pembagiannya berikut ini: White hat : white hat hacker adalah hacker yang menjunjung tinggi standar etika, akses ke sitem dilakukan bukan dengan maksud yang merugikan, misalnya menguji sitem ketahanan mereka sendiri. Hacker dalam kategori ini sendiri senang mempelajari sitem, bahkan mereka disewa sebagai konsultan keamanan. Dunia hacker yang sebenarnya adalh para white hat hacker ini. Grey hat : grey hat hacker yang memiliki ambiguitas standar etika, yang mungkin diantaranya malah melanggar batas-batas hukum. Black hat/cracker : adalah hacker yang menerobos keamanan komputer tanpa kewenangan dan menggunakan sebagai aksi vandalise (kerusakan yang berbahaya), seperti: penipuan credit card, indentiry theft (pencurian identitas), penyelewengan hak kekayaan intelektual dan berbagai tindak criminal lainnya. Script kiddie : adalah seseorang yang bukan ahli komputer, yang mampu menembus sistem komputer menggunakan pre-packaged automated tools yang dibuat orang lain. Mereka ini diasingkan dari komunitas para hacker dan dikenal pula dengan skiddiot. Hacktivist: adalah hacker yang menggunakan teknologi untuk menyebarkan pesan politik, ideology, pesan-pesan keagamaan, dan sebagainya. Pada umumnya, hactivism melibatkan website deface atau serangan DOS (denial of service). Pada kasus ekstrim, hactivism dimanfaatkan sebagai tool untuk cyberterrorism. Dan pada akhirnya hacker dan cracker sering dipertukarkan, dan berkesan negative. Sehingga pada umumnya orang-orang akan mengecap negatif pada seluruh hacker yang ada di dunia ini. Hacker dan cracker prinsip kerjanya sama, namun yang membedakannya adalah tujuan. Pada intinya hacker adalah seseorang yang baik dan dapat mempertanggung jawabkan atas apa yang dilakukannya, sedangkan cracker merupakan seseorang yang tidak mempertanggung jawabkan apa yang telah dilakukannya demi kepentingan pribadinya sendiri. Dengan demikian, akhirnya kita mengetahui arti dari hacker dan cracker, kita harus memberitahukan kepada orang awam mengenai apa arti yang sebenarnya agar tidak terjadi kesalahpahaman. Jadi Kalian Craker atau Hacker? ? Sumber: https://www.kompasiana.com/ajengketty/hacker-vs-cracker_55188efa813311aa689de99b</p>', 'admin', '28-06-2018', 3, '#hacker'),
(7, 'Serangan Pada Kriptosistem RSA ', '<p style="text-align: center;"><strong>PENDAHULUAN</strong><br /></p>\r\n<p style="text-align: justify;">Pendahuluan Algoritme RSA didesain oleh Ron Rivest, Adi Shamir dan Adleman (Rivest-Shamir-Adleman) di tahun 1977, yang merupakan skema kriptografi kunci asimetris. Kekuatan algoritme RSA terletak pada faktorisasi 2 buah bilangan prima yang dibangkitkan. Berikut algoritme pembentukan kunci: - Bangkitkan 2 bilangan prima acak p â€‹dan q yang â€œsangat besarâ€, dengan selisih kedua bilangan yang juga besar. - Ditentukan nilai n = p Ã— q â€‹yang disebut â€œmodulusâ€ yang akan digunakan pada kunci privat dan kunci publik. Untuk tujuan keamanan n haruslah mempunyai nilai yang besar (misalnya 2048 bit). - Hitung Ï†(n) yâ€‹ang merupakan fungsi phi-euler, Ï†(n) = Ï†(p)Ï†(q) = (p âˆ’ 1)(q âˆ’ 1) . - Bangkitkan nilai e yang merupakan kunci publik, digunakan untuk mengenkripsi pesan dengan persyaratan 1 &lt; e &lt; Ï†(n) dan gcd(e, Ï†(n)) = 1 . Nilai e yang biasa digunakan adalah 65537. - Bangkitkan nilai d yang merupakan kunci privat, digunakan untuk mendekripsi pesan dengan persyaratan d â‰¡ e mod Ï†(n) . Dengan kata lain merupakan modular âˆ’1 d multiplicative inverse dari e mâ€‹odulo Ï†(n) . Pasangan ( n , e ) merupakan kunci publik yang dapat disebarluaskan dan digunakan untuk proses enkripsi. Sementara pasangan ( n , d ) merupakan kunci privat yang harus dijaga kerahasiaannya dan digunakan untuk proses dekripsi.</p>\r\n<p style="text-align: justify;"><strong>PROSES ENKRIPSI :</strong></p>\r\n<p style="text-align: justify;">Setelah didapatkan kunci publik ( e ) dan modulus ( n ) pada proses pembangkitan kunci maka akan dibangkitan â€‹ciphertext dari plaintext . â€‹ C = M e mod n , dengan M adalah plaintext â€‹dan C adalah hasil enkripsi, yakni c â€‹ iphertext .<strong> â€‹</strong></p>\r\n<p style="text-align: justify;"><strong>PROSES DEKRIPSI :</strong></p>\r\n<p style="text-align: justify;">Setelah didapatkan kunci privat ( d ) dan modulus ( n ) pada proses pembangkitan kunci maka akan dibangkitan â€‹plaintext dari â€‹ ciphertext . â€‹ M = C d mod n , dengan C adalah ciphertext dan M adalah hasil dekripsi, yakni plaintext . â€‹</p>\r\n<p style="text-align: justify;"><strong>Kriptanalisis RSA :</strong></p>\r\n<p style="text-align: justify;">&nbsp; Seperti yang terlihat pada algoritme RSA, satu-satunya cara untuk dekripsi pesan yang terenkripsi adalah dengan mendapatkan nilai d , dengan asumsi penyerang hanya mempunyai e dan n yang didapatkan dari kunci publik dan penyerang tidak mempunyai kunci privat. Cara untuk menemukan nilai d adalah memulihkan 2 buah bilangan prima p dan q yang jika kedua bilangan tersebut dikalikan hasilnya adalah modulus ( n ).<br />&nbsp; Dengan kata lain, untuk mendapatkan p dan q diperlukan faktorisasi n . Belum ada algoritme yang efisien untuk memfaktorkan suatu integer yang sangat besar (misalnya ukuran n = 2048 bit) menjadi faktor-faktor primanya. Keamanan dari RSA bergantung pada hal tersebut. Jika penyerang berhasil memfaktorkan n , maka kriptosistem RSA tersebut telah berhasil diretas.<br />Namun demikian, jika implementasi RSA dilakukan dengan tidak tepat (misalnya pemilihan bilangan prima tidak sesuai ketentuan), akan mempermudah penyerang untuk memfaktorkan n . Pada tulisan ini akan dibahas beberapa serangan yang dapat dilakukan karena kesalahan implementasi tersebut dan studi kasusnya pada beberapa challenge kompetisi Capture the Flag (CTF). Challenge kompetisi CTF yang dibahas berasal dari CTF internasional dengan level kesulitan mudah atau sedang. Untuk teknis implementasinya, digunakan bahasa pemrograman Python dengan library PyCrypto dan program OpenSSL . â€‹<br /></p>', 'admin', '02-07-2018', 3, '#ctf');

-- --------------------------------------------------------

--
-- Table structure for table `statik_pengunjung`
--

CREATE TABLE `statik_pengunjung` (
  `id` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `os` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `page` varchar(50) NOT NULL,
  `tgl_pengunjung` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statik_pengunjung`
--

INSERT INTO `statik_pengunjung` (`id`, `ip`, `os`, `browser`, `page`, `tgl_pengunjung`) VALUES
(1, '::1', 'Linux', 'Google Chrome v.65.0.3325.181', 'profil.php', '2018-06-30 09:44:37'),
(2, '::1', 'Linux', 'Google Chrome v.65.0.3325.181', 'gallery.php', '2018-06-30 09:44:48'),
(3, '::1', 'Linux', 'Google Chrome v.65.0.3325.181', 'index.php', '2018-06-30 09:45:00'),
(4, '::1', 'Linux', 'Google Chrome v.65.0.3325.181', 'web', '2018-07-01 14:24:36'),
(5, '::1', 'Linux', 'Google Chrome v.65.0.3325.181', 'web', '2018-07-02 16:06:49'),
(6, '192.168.43.1', 'Linux', 'Google Chrome v.61.0.3163.98', 'web', '2018-07-02/Friday 17:30:17'),
(7, '::1', 'Linux', 'Google Chrome v.65.0.3325.181', 'web', '2018-07-05/Friday 08:49:32'),
(8, '::1', 'Linux', 'Google Chrome v.65.0.3325.181', 'web', '2018-07-07/Friday 11:23:17'),
(9, '::1', 'Linux', 'Google Chrome v.65.0.3325.181', 'index.php', '2018-07-08/Friday 11:25:07'),
(11, '::1', 'Linux', 'Google Chrome v.65.0.3325.181', 'web', '2018-07-Thursday 09:09:05'),
(12, '::1', 'Linux', 'Google Chrome v.65.0.3325.181', 'web', '2018-07-19/Thursday 09:09:51'),
(13, '::1', 'Linux', 'Google Chrome v.65.0.3325.181', 'web', '2018-07-19/Thursday 10:31:25'),
(14, '::1', 'Linux', 'Google Chrome v.65.0.3325.181', 'web', '2018-07-19/Thursday 13:44:54'),
(15, '::1', 'Linux', 'Google Chrome v.65.0.3325.181', 'gallery.php', '2018-07-19/Thursday 13:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$DhaIoT47AmJScXHGzow4Qe.c/ALJXuLN48xcVGnFC2NvPgpV2hmNa', 1),
(2, 'coba', 'coba@gmail.com', '$2y$10$0/MEP7xt3kuhO5xkCBtw5ejn0UIbUgKrsm4nGhXdyaE8w7YCxttc2', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukutamu`
--
ALTER TABLE `bukutamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statik_pengunjung`
--
ALTER TABLE `statik_pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bukutamu`
--
ALTER TABLE `bukutamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `statik_pengunjung`
--
ALTER TABLE `statik_pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
