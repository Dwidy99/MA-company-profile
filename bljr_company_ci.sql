-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 12:53 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bljr_company_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori_berita` int(11) NOT NULL,
  `updater` varchar(255) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `hits` int(11) NOT NULL,
  `status_berita` enum('publish','draft','','') NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `keywords` varchar(500) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_user`, `id_kategori_berita`, `updater`, `slug_berita`, `judul_berita`, `isi`, `gambar`, `hits`, `status_berita`, `jenis_berita`, `keywords`, `tanggal_mulai`, `tanggal_selesai`, `tanggal_post`, `tanggal`) VALUES
(6, 1, 4, '', 'makanan-bau-bawang-dari-negeri-friend-fun', 'Makanan bau bawang dari negeri Friend & Fun', '<p>Makanan bau bawang dari negeri Friend &amp; Fun</p>', 'react-ui-component-libraries-frameworks.jpg', 2, 'publish', 'berita', 'Makanan bau bawang dari negeri Friend & Fun', NULL, NULL, '2021-12-11 21:58:09', '2021-12-18 06:23:52'),
(8, 1, 2, '', 'kacau-timnas-malaysia-ancam-mundur-dari-piala-aff-2020-gara-gara-ini-timnas-indonesia-diuntungkan', 'Kacau! Timnas Malaysia Ancam Mundur dari Piala AFF 2020 Gara-Gara Ini, Timnas Indonesia Diuntungkan? ', '<div class=\"el__leafmedia el__leafmedia--sourced-paragraph\">\r\n<p class=\"zn-body__paragraph speakable\" data-paragraph-id=\"paragraph_371A12D8-6BC0-C97B-5F6B-9E5761FAD3F4\"><span style=\"color: #333333; font-family: Overpass, Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">TIM Nasional (Timnas) Malaysia dikabarkan mengancam mundur dari Piala AFF 2020. Menurut laporan media Malaysia Stadium Astro, mengutip dari Zing News, Timnas Malaysia akan mundur jika permintaan mereka mendaftarkan pemain baru ditolak penyelenggara Piala AFF 2020. Sekadar informasi, Timnas Malaysia asuhan Tan Cheng Hoe hanya turun dengan 24 pemain di Piala AFF 2020. Mereka tidak membawa 30 pemain layaknya mayoritas tim-tim lain.</span></p>\r\n</div>', 'malay.jpg', 1, 'publish', 'berita', 'Kacau! Timnas Malaysia Ancam Mundur dari Piala AFF 2020 Gara-Gara Ini, Timnas Indonesia Diuntungkan? ', NULL, NULL, '2021-12-11 08:59:12', '2021-12-16 12:09:58'),
(9, 1, 2, '', 'ribut-dengan-ralf-rangnick-cristiano-ronaldo-tinggalkan-manchester-united-dan-gabung-real-madrid', 'Ribut dengan Ralf Rangnick, Cristiano Ronaldo Tinggalkan Manchester United dan Gabung Real Madrid?', '<p><span xss=removed>CRISTIANO Ronaldo dikabarkan tak cocok dengan pelatih Manchester United, Ralf Rangnick. Mengutip dari Football Insider, kondisi di atas coba dimanfaatkan Real Madrid untuk membawa pulang Cristiano Ronaldo ke Santiago Bernabeu pada Januari 2022. Tanda-tanda ketidakcocokan Cristiano Ronaldo dan Ralf Rangnick sudah terlihat di laga Manchester United vs Crystal Palace, Minggu 5 Desember 2021 malam WIB. Benar, Cristiano Ronaldo menjalankan strategi gegenpressing yang diinstruksikan Ralf Rangnick.</span></p>\r\n<p><span xss=removed>Ia ikut membantu rekan-rekannya menekan lawan dalam laga tersebut. Hanya saja, Cristiano Ronaldo jadi melupakan tugas utamanya, yakni mengkreasikan peluang yang berujung gol. Terbukti, di laga tersebut Cristiano Ronaldo hanya melepaskan satu shot on target! Kemudian, di laga kedua Ralf Rangnick saat Manchester United menjamu Young Boys di Liga Champions 2021-2022, Cristiano Ronaldo sama sekali tidak diturunkan. Padahal, Cristiano Ronaldo dalam ambisi menjadi top skor Liga Champions 2021-2022. Sebelum laga Manchester United vs Young Boys digelar, Cristiano Ronaldo yang mengoleksi enam gol terpaut empat bola dari top skor sementara, Sebastien Haller (Ajax Amsterdam). Mantan kiper Timnas Inggris, Paul Robinson, menilai Cristiano Ronaldo bakal jenuh dengan strategi gegenpressing Ralf Rangnick. Karena itu, jangan heran jika di laga-laga ke depan Cristiano Ronaldo membangkang alias tidak mengikuti instruksi Ralf Rangnick. BACA JUGA: Ralf Rangnick Haram Cadangkan Cristiano Ronaldo di Manchester United, Timbul Konflik Internal? “Saya tahu Ronaldo merawat betul dirinya, namun kita tahu berapa usianya (36 tahun). Ia tidak bisa bermain 50 pertandingan dalam satu musim, tentu dengan peran tersebut (pressing),” kata Paul Robinson mengutip dari Football Insider 247.</span></p>', 'f3yi2f5fczjmadrd1zk4_14606.jpg', 1, 'publish', 'berita', 'Ribut dengan Ralf Rangnick, Cristiano Ronaldo Tinggalkan Manchester United dan Gabung Real Madrid?', NULL, NULL, '2021-12-11 08:55:56', '2021-12-26 04:40:45'),
(10, 1, 9, '', 'harus-bantu-rakyat-erick-thohir-bumn-bukan-eranya-menara-gading', 'Harus Bantu Rakyat, Erick Thohir: BUMN Bukan Eranya Menara Gading', '<p>JAKARTA &ndash; Menteri BUMN Erick Thohir mendukung rencana Pertamina membuka Pertashop sebagai peluang usaha masyarakat, khususnya daerah. Erick Thohir mengatakan Pertashop menjadi langkah perusahaan BUMN untuk terlibat dalam membantu rakyat. Bahkan, dirinya menyebut jika memungkinkan Pertashop ini dikelola 100 persen oleh pengusaha daerah.</p>\r\n<p>&ldquo;Pertashop kalau bisa 100% untuk pengusaha daerah. BUMN itu bukan eranya menara gading. Tapi secara korporasi kita di hulu harus kuat bisa bersaing secara global, tetapi di hilir bermanfaat untuk rakyat sebanyak-banyaknya,&rdquo; katanya, dikutip dari tayangan video di akun Instagram resminya @erickthohir, Jakarta, Sabtu (11/12/2021). Sebab, katanya, di masa pandemi seperti ini ada dua hal yang harus ditekankan yakni pemerataan ekonomi. Bukan yang kaya semakin kaya, lalu yang miskin semakin miskin. Baca Juga: Dirut AP I Keluhkan Bunga Utang Rp1,5 Triliun &ldquo;Saya terus mengingatkan semua BUMN untuk tidak menjadi menara gading, dan harus berpartisipasi dalam pemerataan ekonomi dan penciptaan lapangan kerja,&rdquo; ujarnya. Pentingnya tercipta lapangan kerja dimulai dari sektor terkecil ini akan berdampak besar untuk masyarakat dan meningkatkan perekonomian daerah.</p>', 'erik.jpg', 0, 'publish', 'berita', 'Harus Bantu Rakyat, Erick Thohir: BUMN Bukan Eranya Menara Gading', NULL, NULL, '2021-12-11 09:04:13', '2021-12-11 08:04:13'),
(11, 1, 9, '', 'cara-dapat-bansos-hingga-blt-akhir-tahun-cek-disini', 'Cara Dapat Bansos hingga BLT Akhir Tahun Cek disini!', '<p><span xss=removed>JAKARTA – Sejumlah bantuan sosial (Bansos) cair di bulan Desember 2021. Adapun penerima bansos tersebut sesuai dengan kriteria yang telah ditetapkan. Seperti stimulus listrik yang dibagikan kepada pelanggan kelompok rumah tangga 450-900 VA, bisnis, dan industri kecil. Ada juga BLT Desa yang akan mendapatkan Rp900 ribu bila mengajukan diri kepada dinas terkait untuk direkomendasikan ke BLT Desa.</span></p>\r\n<p><span xss=removed>BLT Subsidi Gaji juga akan disalurkan kepada pekerja yang telah memenuhi syarat dan terdaftar. Untuk BLT PKL ini disalurkan kepada satu juta PKL dan pemilik warung terverifikasi yang bisa mengambil bantuannya di Kantor Polres atau Kodim setempat. Selanjutnya pencairan insentif Kartu Prakerja dapat diterima kepada peserta yang telah membeli pelatihan pertama sebelum tenggat waktu. Dan untuk Kartu Sembako disalurkan di awal atau akhir Desember 2021. \"Jumlahnya nanti menurut ibu mensos sekitar 1,4 juta dan ini akan dilaksanakan di akhir atau di awal Desember. Dan kemudian akan ada survei khusus Susenas kemiskinan di bulan Desember,” ujar Menteri Koordinator bidang Perekonomian Airlangga Hartarto pada Kamis (18/11/2021).</span></p>\r\n<p> </p>', 'Finansial.jpg', 0, 'publish', 'berita', 'Cara Dapat Bansos hingga BLT Akhir Tahun Cek disini!', NULL, NULL, '2021-12-11 09:09:54', '2021-12-11 08:09:54'),
(12, 1, 10, 'Eden Hazard', 'about-us', 'About Us', '<p>Bring innovation, new technology skills and industry knowledge together to help clients innovate at scale, transform and grow their businesses.</p>\r\n<p>The place to be for technology professionals<br />Work in a culture that encourages innovative ideas to flourish and make a meaningful impact on our clients&rsquo; businesses and in our communities.</p>\r\n<p>Combine the best of technology and human ingenuity<br />Work on large-scale business and IT transformation <span style=\"background-color: #ffffff;\">programs for global clients using the latest technologies in<span style=\"color: #000000;\">&nbsp;<a style=\"background-color: #ffffff; color: #000000;\" href=\"https://www.accenture.com/id-en/careers/explore-careers/area-of-interest/cloud-careers\" data-linkcomponentname=\"inline link\" data-linktype=\"engagement\" data-analytics-link-name=\"cloud\" data-analytics-content-type=\"engagement\">cloud</a>,&nbsp;<a style=\"background-color: #ffffff; color: #000000;\" href=\"https://www.accenture.com/id-en/careers/explore-careers/area-of-interest/cybersecurity-careers\" data-linkcomponentname=\"inline link\" data-linktype=\"engagement\" data-analytics-link-name=\"security\" data-analytics-content-type=\"engagement\">security</a>, data,&nbsp;<a style=\"background-color: #ffffff; color: #000000;\" href=\"https://www.accenture.com/id-en/careers/explore-careers/area-of-interest/ai-and-analytics-careers\" data-linkcomponentname=\"inline link\" data-linktype=\"engagement\" data-analytics-link-name=\"ai\" data-analytics-content-type=\"engagement\">AI</a>, digital,&nbsp;<a style=\"background-color: #ffffff; color: #000000;\" href=\"https://www.accenture.com/id-en/careers/explore-careers/area-of-interest/industryx-careers\" data-linkcomponentname=\"inline link\" data-linktype=\"engagement\" data-analytics-link-name=\"industry x\" data-analytics-content-type=\"engagement\">Industry X</a>,&nbsp;<a style=\"background-color: #ffffff; color: #000000;\" href=\"https://www.accenture.com/id-en/services/intelligent-platforms-index\" data-linkcomponentname=\"inline link\" data-linktype=\"engagement\" data-analytics-link-name=\"enterprise platforms\" data-analytics-content-type=\"engagement\">enterprise platforms</a>&nbsp;and&nbsp;<a style=\"background-color: #ffffff; color: #000000;\" href=\"https://www.accenture.com/id-en/services/intelligent-automation-index\" data-linkcomponentname=\"inline link\" data-linktype=\"engagement\" data-analytics-link-name=\"intelligent automation\" data-analytics-content-type=\"engagement\">intelligent automation</a>.</span></span></p>', 'federico-di-dio-photography-Q4g0Q-eVVEg-unsplash.jpg', 9, 'publish', 'profil', 'About The Best Company', NULL, NULL, '2021-12-16 13:02:29', '2021-12-26 05:21:07'),
(13, 1, 10, '', 'our-vision', 'Our vision', '<h2 xss=removed>What is Lorem Ipsum?</h2>\r\n<p xss=removed><strong xss=removed>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p xss=removed>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p xss=removed>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'ian-schneider-TamMbr4okv4-unsplash.jpg', 11, 'publish', 'profil', 'Our vision', NULL, NULL, '2021-12-11 10:22:20', '2021-12-26 05:06:02'),
(14, 1, 11, 'Eden Hazard', 'ganjar-pranowo-makan-mi-di-warkop-sebungkus-kurang-dua-kebanyakan', 'Ganjar Pranowo Makan Mi di Warkop, Sebungkus Kurang Dua Kebanyakan', '<p>JAKARTA - Gubernur Jawa Tengah Ganjar Pranowo mengunggah video Instagram Reels yang menarik perhatian warganet pada Jumat 10 Desember 2021. Video Reels sederhana ini berisikan pengalaman Ganjar makan mi instan di sebuah warung kopi (warkop) di malam hari.&nbsp;</p>\r\n<p>\"Kamu pasukan Ind**ie double atau pasukan Ind**ie satu kurang dua kebanyakan? Selamat makan malam,\" ucap Ganjar dalam captionnya dengan emotikon senyum. Di video tersebut, Ganjar terlihat memakai celana jins dan sweater merah, datang ke warkop tanpa menggunakan alas kaki. Dirinya lantas memesan mi instan ke pemilik warkop ini.&nbsp; Baca juga: Ganjar Pranowo Kenalkan Pesona Nepal van Java Sambil Sepedaan Tidak hanya satu porsi, Ganjar memutuskan untuk memesan dua porsi mi instan, lengkap dengan telur. \"Dua lho mbak,\" kata Ganjar memastikan pesanannya. Sambil menunggu, dirinya duduk di lantai berselonjoran. \"Menunggu kamu,\" tulis Ganjar dalam videonya. Akhirnya, mi pesanannya datang. Namun, Ganjar sendiri menilai pesanannya terlalu banyak untuk dia habiskan. \"Sehat selalu,berkah selalu pak @ganjar_pranowo ...maem mie lawuh krupuk,team karbo,\" ucap akun @ndalemlurikbydkartika.</p>', 'ganjar.png', 0, 'publish', 'berita', 'Ganjar Pranowo Makan Mi di Warkop, Sebungkus Kurang Dua Kebanyakan', NULL, NULL, '2021-12-16 12:54:33', '2021-12-16 11:54:33'),
(15, 1, 12, '', 'mantan-panglima-tni-hadi-tjahjanto-beserta-istri-terjun-langsung-bagikan-bantuan-untuk-pengungsi-semeru', 'Mantan Panglima TNI Hadi Tjahjanto Beserta Istri Terjun Langsung Bagikan Bantuan untuk Pengungsi Semeru ', '<p><span xss=removed>JAKARTA - Mantan Panglima TNI Marsekal Purn Hadi Tjahjanto dan istrinya Ny. Nanny Hadi Tjahjanto terjun langsung memberi bantuan untuk pengungsi Gunung Semeru di Desa Supiturang, Dusun Sumbersari, Kabupaten Lumajang, Jawa Timur. Dalam kegiatan itu, setidaknya 1.000 paket yang berisi, sembako beserta selimut, beras, minyak, pampers dan obat-obatan disebar di daerah tersebut.</span></p>\r\n<p><span xss=removed>Diketahui, setidaknya ada 525 warga Desa Supiturang yang mengungsi akibat bencana itu. Ratusan rumah rusak ringan hingga berat. Bahkan beberapa rumah hancur dan roboh akibat tertimpa material erupsi dan guguran awan panas.</span></p>\r\n<p><span xss=removed>Hadi Tjahjanto, dalam kegiatan itu turut serta mendampingi sang istri terjun langsung ke lapangan. Mereka membagikan paket bantuan kepada warga di pengungsian, atau yang masih bertahan di rumah rumah mereka.</span></p>\r\n<p><span xss=removed>Beberapa warga tampak berterima kasih atas bantuan tersebut. Mereka tak menyangka yang datang merupakan mantan Panglima TNI Hadi Tjahjanto.</span></p>', 'pansos.jpg', 1, 'publish', 'berita', 'Mantan Panglima TNI Hadi Tjahjanto Beserta Istri Terjun Langsung Bagikan Bantuan untuk Pengungsi Semeru', NULL, NULL, '2021-12-11 21:17:41', '2021-12-26 05:21:03'),
(16, 1, 2, '', 'liverpool-vs-aston-villa-penalti-mohamed-salah-bawa-the-red-menang-1-0', 'Liverpool vs Aston Villa, Penalti Mohamed Salah Bawa The Red Menang 1-0', '<p><span xss=removed>Liverpool melawan Aston Villa dalam lanjutan Liga Inggris 2021-2022. Tanding di kandang sendiri, Anfield, Sabtu 11 Desember 2021, malam WIB, The Reds hanya bisa menang tipis 1-0. (REUTERS/Russell Cheyne) (ddk)</span></p>\r\n<p> </p>', 'liverpool.jpeg', 2, 'publish', 'berita', 'Liverpool vs Aston Villa, Penalti Mohamed Salah Bawa The Red Menang 1-0', NULL, NULL, '2021-12-11 21:21:54', '2021-12-18 06:23:47'),
(17, 1, 2, 'Eden Hazard', 'paris-saint-germains-sergio-ramos-wishes-club-had-avoided-ucl-draw-with-real-madrid', 'Paris Saint-Germain\'s Sergio Ramos wishes club had avoided UCL draw with Real Madrid', '<p>PARIS &ndash; Sergio Ramos seakan berkhianat dari Real Madrid. Bek tengah asal Spanyol itu rela mati demi Paris Saint-Germain (PSG) saat melawan eks klubnya pada babak 16 besar Liga Champions 2021-2022.</p>\r\n<p>Ramos pernah membela Los Blancos&mdash;julukan Real Madrid-- 16 tahun sejak 2005 lalu. Namun, pada musim panas 2021, dia dilepas oleh klubnya itu dan bergabung dengan PSG.</p>\r\n<p>Bersama Madrid, pemain asal Spanyol itu telah tampil sebanyak 671 kali dan mengangkat 22 trofi. Bahkan, dia menjuarai Liga Champions empat kali yang mana tiga di antaranya diraih secara berturut-turut pada 2016 hingga 2018.</p>\r\n<p>Akan tetapi, semua kenangan manis itu sepertinya akan disingkirkannya untuk sementara pada babak 16 besar kompetisi tertinggi antar klub Eropa itu. Pasalnya, Ramos kini rela mati untuk PSG karena dia akan memberikan segalanya untuk membawa timnya melaju ke babak selanjutnya. Baca juga: Hasil Drawing 16 Besar Liga Champions 2021-2022 Setelah Diulang: PSG vs Real Madrid, Liverpool Jumpa Inter Milan &ldquo;Anda tahu kasih sayang dan cinta yang saya miliki untuk Real Madrid. Sekarang giliran saya untuk membela PSG dan saya akan melakukan segala kemungkinan untuk lolos,&rdquo; kata Ramos dilansir dari Mirror, Selasa (14/12/2021). \"Mereka (PSG) adalah tim yang bertaruh pada saya. Saya akan mati demi PSG,&rdquo; katanya.</p>', 'sergio.jpg', 5, 'publish', 'berita', 'Paris Saint-Germain\'s Sergio Ramos wishes club had avoided UCL draw with Real Madrid', NULL, NULL, '2021-12-14 04:20:11', '2021-12-29 09:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul_galeri` varchar(255) NOT NULL,
  `isi_galeri` text NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `posisi_galeri` enum('galeri','homepage','','') NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `id_user`, `judul_galeri`, `isi_galeri`, `website`, `hits`, `gambar`, `posisi_galeri`, `tanggal_post`, `tanggal`) VALUES
(3, 1, 'Laptop Ringan', '<p>Laptop teringan dengan harga termurah</p>', 'https://www.youtube.com', 0, '11.jpg', 'homepage', '2021-12-15 03:46:00', '2021-12-15 02:46:00'),
(4, 1, 'Sport Car', '<p>Jakarta - Ada hal berbeda saat Presiden Joko Widodo (Jokowi) memberikan sambutan dalam acara pembukaan Kongres Ekonomi Umat Islam II MUI. Jokowi sengaja tak membaca bahan sambutan yang sudah disiapkan untuk menjawab secara langsung kritikan dari Wakil Ketua Umum Majelis Ulama Indonesia (MUI), Anwar Abbas.<br />Dalam acara diketahui Anwar Abbas memberikan kata sambutan terlebih dulu dibandingkan Jokowi. Pada kesempatan itu, Anwar Abbas menyinggung soal kesenjangan ekonomi dan sosial yang dinilai semakin terjal.</p>', 'https://www.youtube.com', 0, '3.jpg', 'galeri', '2021-12-17 11:03:52', '2021-12-17 04:03:52'),
(5, 1, 'Laptop Keren', '<p>Laptop terbaik dan termurah</p>', 'https://www.google.com', 0, '2.jpg', 'homepage', '2021-12-15 03:30:02', '2021-12-15 02:30:02'),
(6, 1, 'Laptop tipis tercanggih', '<p>Laptop tiada tanding dengan teknologi tertipis</p>', 'https://www.google.com', 0, '31.jpg', 'homepage', '2021-12-15 03:44:28', '2021-12-15 02:44:28'),
(7, 1, 'Launching Windows Laptop', '<p>Launching pertama di markas Real madrid Santiago Bernabeu</p>', '', 0, 'windows-ACWCQs6KXcw-unsplash.jpg', 'galeri', '2021-12-17 11:10:01', '2021-12-17 04:10:01'),
(8, 1, 'Rilis Film Spongeboob Series', '<p>Spongeboob Film Terlaris sepanjang masa kini telah merilis Film terbarunya di Sinema XXIV</p>', '', 0, 'spongebob-11.jpg', 'galeri', '2021-12-17 11:11:00', '2021-12-29 10:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id_kategori_berita` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `urutan` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_berita`
--

INSERT INTO `kategori_berita` (`id_kategori_berita`, `nama_kategori`, `slug_kategori`, `urutan`, `tanggal`) VALUES
(2, 'Olahraga', 'olahraga', 2, '2021-12-08 12:35:46'),
(3, 'Politik', 'politik', 3, '2021-12-08 12:36:05'),
(4, 'Tauran warga', 'tauran-warga', 4, '2021-12-08 12:47:16'),
(9, 'Finansial', 'finansial', 1, '2021-12-11 08:03:47'),
(10, 'Tentang Perusahaan', 'tentang-perusahaan', 5, '2021-12-11 09:22:45'),
(11, 'Nusantara', 'nusantara', 6, '2021-12-11 20:11:28'),
(12, 'Nasional', 'nasional', 7, '2021-12-11 20:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `namaweb` varchar(50) NOT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `telepon` varchar(25) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `deskripsi` varchar(300) DEFAULT NULL,
  `keywords` varchar(300) DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `map` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `id_user`, `namaweb`, `tagline`, `email`, `website`, `telepon`, `alamat`, `deskripsi`, `keywords`, `metatext`, `map`, `logo`, `icon`, `facebook`, `instagram`, `tanggal`) VALUES
(1, 1, 'The Best Company', 'The Best Company', 'jakatingkir@gmail.com', 'https://www.google.com', '081313267345', 'Jl. Suka nyasar linglung 7x', 'The Best Company in The World', 'The Best Company in The World', 'The Best Company in The World', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31735.983036860845!2d106.49703160000003!3d-6.1309857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sid!4v1639131310498!5m2!1sen!2sid\" width=\"1170\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'android-chrome-512x512.png', 'android-chrome-512x512.png', 'https://www.facebook.com', 'https://www.instagram.com', '2021-12-15 20:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama`, `email`, `subject`, `pesan`, `tanggal`) VALUES
(4, 'Dwi', 'diemaja@gmail.com', 'ngtienotejijwijeq', 'qwoiehjioqjiowejiqjegnrw', '2021-12-18 11:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id_kunjungan` int(11) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `hits` int(11) NOT NULL,
  `hari` date NOT NULL,
  `waktu` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`id_kunjungan`, `alamat`, `ip_address`, `hits`, `hari`, `waktu`, `tanggal`) VALUES
(39, 'http://192.168.100.139/jwmCompany/berita', '192.168.100.138', 5, '2021-12-17', '2021-12-17 16:46:38', '2021-12-17 09:46:38'),
(40, 'http://localhost/jwmCompany/berita/read/assets/img', '::1', 8, '2021-12-17', '2021-12-17 20:59:10', '2021-12-18 05:53:00'),
(41, 'http://localhost/company-profile/berita/read/asset', '::1', 31, '2021-12-18', '2021-12-18 10:53:37', '2021-12-18 06:31:53'),
(42, 'http://localhost/MA-company-profile/kontak', '::1', 155, '2021-12-26', '2021-12-26 10:37:32', '2021-12-26 05:21:09'),
(43, 'http://localhost/MA-company-profile/', '::1', 5, '2021-12-29', '2021-12-29 16:33:32', '2021-12-29 09:56:44'),
(44, 'http://localhost:8080/MA-company-profile/', '::1', 4, '2022-01-10', '2022-01-10 17:44:05', '2022-01-10 10:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `hits` int(11) NOT NULL,
  `judul_layanan` varchar(255) NOT NULL,
  `slug_layanan` varchar(255) NOT NULL,
  `isi_layanan` text NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status_layanan` varchar(25) NOT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `id_user`, `hits`, `judul_layanan`, `slug_layanan`, `isi_layanan`, `harga`, `gambar`, `status_layanan`, `keywords`, `tanggal_post`, `tanggal`) VALUES
(3, 1, 2, 'Product Design', 'product-design', '<div data-id=\"726c098\" data-element_type=\"widget\" data-widget_type=\"ohio_heading.default\">\r\n<div>\r\n<div>\r\n<h3>When it comes to user experience, looking pretty just won&rsquo;t cut it.</h3>\r\n</div>\r\n</div>\r\n</div>\r\n<div data-id=\"5cd3ec1\" data-element_type=\"widget\" data-widget_type=\"wp-widget-text.default\">\r\n<div>\r\n<div>\r\n<p>At Dihardja Software, we are obsessed about user experience. That&rsquo;s why during design process, we will also conduct user testing to map out user journey, identify pain points, and receive feedback from the users. We strive to deliver the best experience for users, which in turn will increase sales and reduce the chance of project failure.</p>\r\n</div>\r\n</div>\r\n</div>', 12000000, 'ux-indonesia-2NDWFiD0UMM-unsplash.jpg', 'publish', 'Product Design', '2021-12-11 06:05:12', '2021-12-17 09:10:21'),
(4, 1, 4, 'Mobile Application Development', 'mobile-application-development', '<div data-id=\"748b5146\" data-element_type=\"widget\" data-widget_type=\"ohio_heading.default\">\r\n<div>\r\n<div>Beautifully made yet powerful mobile apps</div>\r\n</div>\r\n</div>\r\n<div data-id=\"e8c89cb\" data-element_type=\"widget\" data-widget_type=\"wp-widget-text.default\">\r\n<div>\r\n<div>\r\n<p>What sets us apart from the rest is our thoughtful design, outstanding build quality, and the powerful functionalities of your mobile apps, all tailored to your specific requirements. With experience in launching hundreds of top quality iOS and Android apps, we deliver the best digital products that delights users and seamlessly integrates with your business goals.</p>\r\n</div>\r\n</div>\r\n</div>', 15000000, 'william-hook-9e9PD9blAto-unsplash.jpg', 'publish', 'Mobile Application Development', '2021-12-11 08:40:42', '2021-12-26 04:37:59'),
(5, 1, 1, 'Web Development', 'web-development', '<div data-id=\"782bc3c1\" data-element_type=\"widget\" data-widget_type=\"ohio_heading.default\">\r\n<div>\r\n<div>Online presence has never been so important. Name one great company that doesn&rsquo;t have a website today, we doubt you can find any. Especially in the post-COVID era where all things move digital, you&rsquo;ll be missing out a lot if you don&rsquo;t have any online presence. Crafting a great website becomes more important as 57% of internet users say they won&rsquo;t recommend a business with a poorly designed website. But don&rsquo;t fret &ndash; whether you want to have a beautifully-designed company website or build an entirely new digital experience for your customers, Dihardja Software is here to help.</div>\r\n</div>\r\n</div>', 14400000, 'alejandra-cifre-gonzalez-kdcOJb-TUvc-unsplash.jpg', 'publish', 'Web Development', '2021-12-12 10:45:14', '2021-12-16 12:48:35'),
(6, 1, 9, 'Bisniss Development', 'bisniss-development', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sodales neque sodales ut etiam sit amet. Purus in mollis nunc sed. Neque vitae tempus quam pellentesque nec. Vitae et leo duis ut diam. Turpis in eu mi bibendum. Vulputate eu scelerisque felis imperdiet proin fermentum leo vel. Odio facilisis mauris sit amet massa vitae. Amet venenatis urna cursus eget. Eu feugiat pretium nibh ipsum consequat nisl. Hendrerit dolor magna eget est lorem.</p>\r\n<p>Nibh nisl condimentum id venenatis a condimentum. Phasellus egestas tellus rutrum tellus. Non diam phasellus vestibulum lorem sed risus ultricies tristique. Elementum eu facilisis sed odio morbi quis. Odio ut sem nulla pharetra diam sit amet. Sit amet cursus sit amet dictum sit amet. Nunc sed blandit libero volutpat sed. Eu volutpat odio facilisis mauris sit amet. Id eu nisl nunc mi ipsum faucibus vitae. Eu consequat ac felis donec et odio pellentesque diam. Commodo viverra maecenas accumsan lacus vel facilisis volutpat est. Nulla pellentesque dignissim enim sit. At ultrices mi tempus imperdiet nulla. Vel orci porta non pulvinar neque laoreet suspendisse interdum consectetur. Tortor at risus viverra adipiscing at in tellus integer. Lacus luctus accumsan tortor posuere ac ut consequat. Risus nec feugiat in fermentum posuere urna nec tincidunt praesent.</p>\r\n<p>Id eu nisl nunc mi ipsum faucibus vitae aliquet nec. Id interdum velit laoreet id donec. Posuere morbi leo urna molestie at elementum eu facilisis. Volutpat odio facilisis mauris sit amet massa vitae tortor. Laoreet id donec ultrices tincidunt arcu non sodales neque sodales. Sed risus pretium quam vulputate dignissim. Nibh ipsum consequat nisl vel pretium. Tristique sollicitudin nibh sit amet commodo nulla facilisi nullam. Ac tortor dignissim convallis aenean et tortor. Tempor orci eu lobortis elementum nibh tellus molestie nunc non. Nisl condimentum id venenatis a condimentum vitae sapien pellentesque habitant.</p>\r\n<p>Ac auctor augue mauris augue neque. Nam libero justo laoreet sit amet cursus sit amet dictum. Nulla facilisi etiam dignissim diam quis enim. Magna fermentum iaculis eu non diam phasellus. Ornare suspendisse sed nisi lacus sed viverra. Orci a scelerisque purus semper eget duis. Vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae. Tortor consequat id porta nibh. Amet porttitor eget dolor morbi non arcu risus. Nunc id cursus metus aliquam eleifend mi. Aliquam etiam erat velit scelerisque in dictum non. Est ullamcorper eget nulla facilisi etiam dignissim diam quis. Nunc pulvinar sapien et ligula. Diam donec adipiscing tristique risus.</p>\r\n<p>Non diam phasellus vestibulum lorem sed. Tempor orci eu lobortis elementum nibh tellus molestie nunc non. Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla facilisi. Bibendum est ultricies integer quis auctor elit sed. Lacus suspendisse faucibus interdum posuere lorem ipsum dolor sit amet. Auctor augue mauris augue neque gravida. Turpis cursus in hac habitasse platea dictumst quisque sagittis. Dignissim diam quis enim lobortis scelerisque fermentum. In hac habitasse platea dictumst vestibulum rhoncus est pellentesque elit. Pretium quam vulputate dignissim suspendisse in est ante in.</p>', 10000000, 'justin-lim-tloFnD-7EpI-unsplash.jpg', 'publish', 'Bisniss Development', '2021-12-12 07:07:32', '2021-12-26 04:02:24'),
(7, 1, 6, 'IT Consultant', 'it-consultant', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sodales neque sodales ut etiam sit amet. Purus in mollis nunc sed. Neque vitae tempus quam pellentesque nec. Vitae et leo duis ut diam. Turpis in eu mi bibendum. Vulputate eu scelerisque felis imperdiet proin fermentum leo vel. Odio facilisis mauris sit amet massa vitae. Amet venenatis urna cursus eget. Eu feugiat pretium nibh ipsum consequat nisl. Hendrerit dolor magna eget est lorem.</p>\r\n<p>Nibh nisl condimentum id venenatis a condimentum. Phasellus egestas tellus rutrum tellus. Non diam phasellus vestibulum lorem sed risus ultricies tristique. Elementum eu facilisis sed odio morbi quis. Odio ut sem nulla pharetra diam sit amet. Sit amet cursus sit amet dictum sit amet. Nunc sed blandit libero volutpat sed. Eu volutpat odio facilisis mauris sit amet. Id eu nisl nunc mi ipsum faucibus vitae. Eu consequat ac felis donec et odio pellentesque diam. Commodo viverra maecenas accumsan lacus vel facilisis volutpat est. Nulla pellentesque dignissim enim sit. At ultrices mi tempus imperdiet nulla. Vel orci porta non pulvinar neque laoreet suspendisse interdum consectetur. Tortor at risus viverra adipiscing at in tellus integer. Lacus luctus accumsan tortor posuere ac ut consequat. Risus nec feugiat in fermentum posuere urna nec tincidunt praesent.</p>\r\n<p>Id eu nisl nunc mi ipsum faucibus vitae aliquet nec. Id interdum velit laoreet id donec. Posuere morbi leo urna molestie at elementum eu facilisis. Volutpat odio facilisis mauris sit amet massa vitae tortor. Laoreet id donec ultrices tincidunt arcu non sodales neque sodales. Sed risus pretium quam vulputate dignissim. Nibh ipsum consequat nisl vel pretium. Tristique sollicitudin nibh sit amet commodo nulla facilisi nullam. Ac tortor dignissim convallis aenean et tortor. Tempor orci eu lobortis elementum nibh tellus molestie nunc non. Nisl condimentum id venenatis a condimentum vitae sapien pellentesque habitant.</p>\r\n<p>Ac auctor augue mauris augue neque. Nam libero justo laoreet sit amet cursus sit amet dictum. Nulla facilisi etiam dignissim diam quis enim. Magna fermentum iaculis eu non diam phasellus. Ornare suspendisse sed nisi lacus sed viverra. Orci a scelerisque purus semper eget duis. Vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae. Tortor consequat id porta nibh. Amet porttitor eget dolor morbi non arcu risus. Nunc id cursus metus aliquam eleifend mi. Aliquam etiam erat velit scelerisque in dictum non. Est ullamcorper eget nulla facilisi etiam dignissim diam quis. Nunc pulvinar sapien et ligula. Diam donec adipiscing tristique risus.</p>\r\n<p>Non diam phasellus vestibulum lorem sed. Tempor orci eu lobortis elementum nibh tellus molestie nunc non. Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla facilisi. Bibendum est ultricies integer quis auctor elit sed. Lacus suspendisse faucibus interdum posuere lorem ipsum dolor sit amet. Auctor augue mauris augue neque gravida. Turpis cursus in hac habitasse platea dictumst quisque sagittis. Dignissim diam quis enim lobortis scelerisque fermentum. In hac habitasse platea dictumst vestibulum rhoncus est pellentesque elit. Pretium quam vulputate dignissim suspendisse in est ante in.</p>', 5500000, 'alejandra-cifre-gonzalez-kdcOJb-TUvc-unsplash1.jpg', 'publish', 'IT Consultant', '2021-12-12 07:08:35', '2021-12-26 05:04:13'),
(8, 1, 1, 'Andriod Development', 'andriod-development', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sodales neque sodales ut etiam sit amet. Purus in mollis nunc sed. Neque vitae tempus quam pellentesque nec. Vitae et leo duis ut diam. Turpis in eu mi bibendum. Vulputate eu scelerisque felis imperdiet proin fermentum leo vel. Odio facilisis mauris sit amet massa vitae. Amet venenatis urna cursus eget. Eu feugiat pretium nibh ipsum consequat nisl. Hendrerit dolor magna eget est lorem.</p>\r\n<p>Nibh nisl condimentum id venenatis a condimentum. Phasellus egestas tellus rutrum tellus. Non diam phasellus vestibulum lorem sed risus ultricies tristique. Elementum eu facilisis sed odio morbi quis. Odio ut sem nulla pharetra diam sit amet. Sit amet cursus sit amet dictum sit amet. Nunc sed blandit libero volutpat sed. Eu volutpat odio facilisis mauris sit amet. Id eu nisl nunc mi ipsum faucibus vitae. Eu consequat ac felis donec et odio pellentesque diam. Commodo viverra maecenas accumsan lacus vel facilisis volutpat est. Nulla pellentesque dignissim enim sit. At ultrices mi tempus imperdiet nulla. Vel orci porta non pulvinar neque laoreet suspendisse interdum consectetur. Tortor at risus viverra adipiscing at in tellus integer. Lacus luctus accumsan tortor posuere ac ut consequat. Risus nec feugiat in fermentum posuere urna nec tincidunt praesent.</p>\r\n<p>Id eu nisl nunc mi ipsum faucibus vitae aliquet nec. Id interdum velit laoreet id donec. Posuere morbi leo urna molestie at elementum eu facilisis. Volutpat odio facilisis mauris sit amet massa vitae tortor. Laoreet id donec ultrices tincidunt arcu non sodales neque sodales. Sed risus pretium quam vulputate dignissim. Nibh ipsum consequat nisl vel pretium. Tristique sollicitudin nibh sit amet commodo nulla facilisi nullam. Ac tortor dignissim convallis aenean et tortor. Tempor orci eu lobortis elementum nibh tellus molestie nunc non. Nisl condimentum id venenatis a condimentum vitae sapien pellentesque habitant.</p>\r\n<p>Ac auctor augue mauris augue neque. Nam libero justo laoreet sit amet cursus sit amet dictum. Nulla facilisi etiam dignissim diam quis enim. Magna fermentum iaculis eu non diam phasellus. Ornare suspendisse sed nisi lacus sed viverra. Orci a scelerisque purus semper eget duis. Vulputate sapien nec sagittis aliquam malesuada bibendum arcu vitae. Tortor consequat id porta nibh. Amet porttitor eget dolor morbi non arcu risus. Nunc id cursus metus aliquam eleifend mi. Aliquam etiam erat velit scelerisque in dictum non. Est ullamcorper eget nulla facilisi etiam dignissim diam quis. Nunc pulvinar sapien et ligula. Diam donec adipiscing tristique risus.</p>\r\n<p>Non diam phasellus vestibulum lorem sed. Tempor orci eu lobortis elementum nibh tellus molestie nunc non. Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla facilisi. Bibendum est ultricies integer quis auctor elit sed. Lacus suspendisse faucibus interdum posuere lorem ipsum dolor sit amet. Auctor augue mauris augue neque gravida. Turpis cursus in hac habitasse platea dictumst quisque sagittis. Dignissim diam quis enim lobortis scelerisque fermentum. In hac habitasse platea dictumst vestibulum rhoncus est pellentesque elit. Pretium quam vulputate dignissim suspendisse in est ante in.</p>', 15000000, 'william-hook-9e9PD9blAto-unsplash1.jpg', 'publish', 'Andriod Development', '2021-12-12 07:09:49', '2021-12-26 03:52:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `akses_level` varchar(255) NOT NULL,
  `tanggal` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal`) VALUES
(1, 'Eden Hazard', 'unyil@gmail.com', 'Lizard', '$2y$10$0Tiioj4qMn0tYCmgSYiePugKWAbfnCZ62YxMd7OLKAzKWhq9dAmD.', 'Admin', '2022-01-10 10:51:46'),
(6, 'Kopit\'a Manzukic', 'patrickstart@gmail.com', 'MieInstant', '$2y$10$GIu0/DhIxG9fpIsk4QzfF.OpkhjnJt9QfD3WKeKcNrEru.dFfhNkG', 'User', '2022-01-10 10:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `users_token`
--

CREATE TABLE `users_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `tanggal_buat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kategori` (`id_kategori_berita`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id_kategori_berita`),
  ADD UNIQUE KEY `urutan` (`urutan`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_token`
--
ALTER TABLE `users_token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id_kategori_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `id_kunjungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_token`
--
ALTER TABLE `users_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`id_kategori_berita`) REFERENCES `kategori_berita` (`id_kategori_berita`);

--
-- Constraints for table `galeri`
--
ALTER TABLE `galeri`
  ADD CONSTRAINT `galeri_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD CONSTRAINT `konfigurasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `layanan`
--
ALTER TABLE `layanan`
  ADD CONSTRAINT `layanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
