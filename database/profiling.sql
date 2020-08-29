-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Aug 29, 2020 at 08:12 AM
-- Server version: 10.3.23-MariaDB-1:10.3.23+maria~focal
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apps_docker`
--

-- --------------------------------------------------------

--
-- Table structure for table `profiling`
--

CREATE TABLE `profiling` (
  `id` int(11) NOT NULL,
  `method` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiling`
--

INSERT INTO `profiling` (`id`, `method`, `description`) VALUES
(1, 'Kolb', 'Teknik Profiling'),
(2, 'Memletic', 'Teknik Memletic');

-- --------------------------------------------------------

--
-- Table structure for table `profiling_category`
--

CREATE TABLE `profiling_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profiling_category`
--

INSERT INTO `profiling_category` (`id`, `name`, `status`) VALUES
(1, 'Visual', 1),
(2, 'Verbal', 1),
(8, 'Aural', 1),
(9, 'Fisik', 1),
(10, 'Logis', 1),
(11, 'Social', 1),
(12, 'Solitary', 1),
(13, 'Diverger', 1),
(14, 'Assimilator', 1),
(15, 'Converger', 1),
(16, 'Accomodator', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profiling_question`
--

CREATE TABLE `profiling_question` (
  `id` int(11) NOT NULL,
  `profiling_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `question` varchar(255) DEFAULT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profiling_question`
--

INSERT INTO `profiling_question` (`id`, `profiling_id`, `category_id`, `question`, `type`) VALUES
(181, 1, 13, 'Saya memiliki keyakinan yang kuat tentang materi yang diberikan akan bermanfaat untuk saya dikemudian hari', 'yn'),
(182, 1, 13, 'Saya dapat memecahkan masalah yang diberikan oleh pengajar secara runtut', 'yn'),
(183, 1, 13, 'Saya tertarik memperlajari pelajaran tertentu dengan mengerjakan tugas pelajaran tersebut', 'yn'),
(184, 1, 13, 'Ketika belajar, Saya lebih suka melibatkan perasaan Saya', 'yn'),
(185, 1, 13, 'Saya cenderung menghindari materi yang kurang bermanfaat bagi saya', 'yn'),
(186, 1, 13, 'Saya bertanya kepada pengajar tentang materi yang sulit', 'yn'),
(187, 1, 13, 'Saya kurang dapat bersosialisasi dengan teman', 'yn'),
(188, 1, 13, 'Saya mengetahui kesalahan teman saya saat berdiskusi', 'yn'),
(189, 1, 13, 'Saya tertarik mengeksplorasi materi yang mendukung kejadian yang terjadi di lingkungan saya', 'yn'),
(190, 1, 14, 'Dalam diskusi, saya tidak pernah berpihak pada salah satu pendapat teman', 'yn'),
(191, 1, 14, 'Saya memperhatikan secara cermat dan detail dari semua hasil pelajaran yang saya peroleh', 'yn'),
(192, 1, 14, 'Saya tidak mudah dalam mengambil keputusan', 'yn'),
(193, 1, 14, 'Saya mencatat pelajaran yang diberikan secara lengkap', 'yn'),
(194, 1, 14, 'Saya membaca buku pedoman sebelum memulai pelajaran', 'yn'),
(195, 1, 14, 'Saat diskusi, saya lebih senang mendengarkan pendapat orang lain daripada mengutarakan pendapat saya', 'yn'),
(196, 1, 14, 'Saya menyelesaikan soal pelajaran yang diberikan dengan berbagai subut pandang', 'yn'),
(197, 1, 14, 'Saya lebih suka memiliki banyak sumber informasi yang mendukung pembelajaran saya', 'yn'),
(198, 1, 14, 'Saya lebih suka mempertimbangkan sesuatu sebelum mengerjakannya', 'yn'),
(199, 1, 14, 'Saya lebih suka mendengar dari pada berbicara', 'yn'),
(200, 1, 14, 'Saya merasa ingin tahu tentang sesuatu yang dipikirkan oleh teman saya', 'yn'),
(201, 1, 15, 'Saat diskusi, saya lebih senang to the pointpada permasalahan', 'yn'),
(202, 1, 15, 'Saat mendengarkan ide teman, saya langsung menerapkan ide tersebut', 'yn'),
(203, 1, 15, 'Saya suka menilai ide dari teman saya', 'yn'),
(204, 1, 15, 'Saat saya bejalar, saya seorang yang lebih rasional', 'yn'),
(205, 1, 15, 'Saya suka membuat flowchart dari apa yang saya pelajari', 'yn'),
(206, 1, 15, 'Saya suka hal realistik dan tidak bertele-tele', 'yn'),
(207, 1, 15, 'Saya memiliki ide praktis saat menyelesaikan masalah', 'yn'),
(208, 1, 15, 'Saya suka mencatat pelajaran dengan singkat dan jelas', 'yn'),
(209, 1, 15, 'Saya tidak suka saat ada teman yang mengajukan pertanyaan yang tidak sesuai topik diskusi', 'yn'),
(210, 1, 15, 'Sebelum pejalaran saya lebih dahulu mempersiapkan keperluan yang dibutuhkan', 'yn'),
(211, 1, 16, 'Saya suka mengerjakan tugas yang diberikan oleh pengajar', 'yn'),
(212, 1, 16, 'Saya suka menjawab pertanyaan dari pengajar', 'yn'),
(213, 1, 16, 'Saya lebih suka bertindak langsung tanpa memikirkan akibatnya', 'yn'),
(214, 1, 16, 'Saya suka tantangan yang diberikan oleh pengajar', 'yn'),
(215, 1, 16, 'Saya lebih suka merespon secara spontan', 'yn'),
(216, 1, 16, 'Ketika belajar, Saya suka mencoba hal baru', 'yn'),
(217, 1, 16, 'Saat ada teman yang kesusahan saya langsung membantu teman tersebut', 'yn'),
(218, 1, 16, 'Saya cenderung banyak bicara', 'yn'),
(219, 1, 16, 'Saya suka mengajak teman belajar bersama', 'yn'),
(220, 1, 16, 'Saat diskusi, saya aktif berbicara', 'yn'),
(221, 2, 1, 'Anda memiliki hobi atau minat yang tidak dapat dilakukan bersama dengan orang lain', 'scale'),
(222, 2, 1, 'Anda selalu menyusun rencana secara rinci tentang kegiatan yang akan anda lakukan', 'scale'),
(223, 2, 1, 'Musik tema atau single sering tiba-tiba muncul dipikiran anda', 'scale'),
(224, 2, 1, 'Matematika dan sains merupakan subjek kegemaran anda di sekolah', 'scale'),
(225, 2, 1, 'Anda menginginkan beberapa hal yang lebih seru dilakukan sendiri dan jauh dari orang lain', 'scale'),
(226, 2, 1, 'Anda sangat menikmati belajar di lingkungan kelas dan berinteraksi dengan orang lain untuk membantu proses belajar', 'scale'),
(227, 2, 1, 'Anda senang membaca segala jenis bacaan seperti buku, majalah, koran, dan novel.', 'scale'),
(228, 2, 1, 'Anda dapat dengan mudah memggambarkan sebuah benda atau bangunan hanya dengan sebuah deskripsi', 'scale'),
(229, 2, 1, 'Anda lebih senang menetapkan tujuan anda sendiri dan kemana tujuan yang anda tuju', 'scale'),
(230, 2, 1, 'Anda lebih senang olahraga yang berhubungan dengan tim daripada olahraga individual', 'scale'),
(231, 2, 2, 'Anda dapat dengan mudah memahami peta dan melakukan sebuah perjalanan', 'scale'),
(232, 2, 2, 'Anda lebih senang untuk belajar sendiri', 'scale'),
(233, 2, 2, 'Anda lebih nyaman bila menjadi pembimbing bagi orang lain', 'scale'),
(234, 2, 2, 'Anda sering menyisihkan waktu luang untuk merenungkan hal penting dalam hidup anda', 'scale'),
(235, 2, 2, 'Anda sering menyisipkan pepatah atau perumpamaan pada percakapan anda', 'scale'),
(236, 2, 2, 'Anda perlu menganalisa, mengelompokkan atau memperhitungkan segala sesuatu untuk mengambil kesimpulan tentang hubungan diantara mereka.', 'scale'),
(237, 2, 2, 'Anda memiliki buku diary yang berisi catatan harian anda', 'scale'),
(238, 2, 2, 'Anda dapat berkomunikasi secara lancar dengan orang lain dan membantu menyelesaikan masalah', 'scale'),
(239, 2, 2, 'Anda lebih memilih kegiatan outdoor sebagai kegiatan favorit', 'scale'),
(240, 2, 2, 'Anda cenderung menjadi orang yang dimintai saran oleh orang lain, dan Anda dapat menampilkan sifat simpatik Anda', 'scale'),
(241, 2, 8, 'Anda lebih suka mendengarkan musik entah dirumah atau ditempat umum', 'scale'),
(242, 2, 8, 'Anda dapat mengatur keuangan anda secara baik', 'scale'),
(243, 2, 8, 'Anda memiliki beberapa teman yang sangat dekat dengan Anda', 'scale'),
(244, 2, 8, 'Anda sering menggunakan bahasa fisik untuk membantu anda berkomunikasi kepada orang lain.', 'scale'),
(245, 2, 8, 'Anda lebih memilih ilmu sastra sebagai hobi/kegiatan favorit anda', 'scale'),
(246, 2, 8, 'Anda gemar membuat suatu model', 'scale'),
(247, 2, 8, 'Anda lebih senang mendiskusikan masalah dengan orang lain dibanding mencoba memecahkan masalah tersebut sendirian', 'scale'),
(248, 2, 8, 'Anda sangat menyukai musik', 'scale'),
(249, 2, 8, 'Anda lebih menyukai hal yang berunsur seni dan geometri dibandingkan dengan aljabar atau perhitungan matematis', 'scale'),
(250, 2, 8, 'Anda senang membagikan cerita ke orang lain', 'scale'),
(251, 2, 9, 'Anda lebih cenderung mudah mengidentifikasi kekeliruan  logika pada suatu percakapan/kegiatan dengan orang lain', 'scale'),
(252, 2, 9, 'Anda lebih menyukai mendokumentasikan hal-hal dengan menggunakan perangkat visual digital', 'scale'),
(253, 2, 9, 'Anda lebih cenderung mudah mengingat hal dengan memberi ritme pada hal yang anda ingin ingat', 'scale'),
(254, 2, 9, 'Anda lebih menyukai hal yang berunsur olah fisik, seni dan kreativitas', 'scale'),
(255, 2, 9, 'Anda cenderung menggunakan kosa kata yang jarang digunakan oleh orang lain dalam menjelaskan suatu hal sehingga orang lain harus bertanya arti dari kata yang anda gunakan', 'scale'),
(256, 2, 9, 'Anda cenderung tertarik pada pola atau tekstur benda disekitar anda', 'scale'),
(257, 2, 9, 'Anda lebih memilih untuk berlibur pada tempat yang sepi dibanding dengan tempat yang ramai', 'scale'),
(258, 2, 9, 'Anda lebih senang membaca buku yang memberikan banyak contoh didalamnya', 'scale'),
(259, 2, 9, 'Anda cenderung mudah mengekspresikan diri kepada orang lain, lisan maupun tertulis', 'scale'),
(260, 2, 9, 'Anda lebih senang melakukan kegiatan seru bersama orang lain, seperti bermain kartu, atau board game', 'scale'),
(261, 2, 10, 'Anda sering menggunakan contoh kasus untuk menjelaskan maksud anda kepada orang lain', 'scale'),
(262, 2, 10, 'Anda dapat dengan mudah membedakan jenis suara alat musik', 'scale'),
(263, 2, 10, 'Anda dapat membedakan warna secara akurat dan tepat', 'scale'),
(264, 2, 10, 'Anda senang membuat permainan kata-kata untuk mengekspresikan diri anda', 'scale'),
(265, 2, 10, 'Anda lebih mudah memecahkan masalah sembari melalukan olah fisik', 'scale'),
(266, 2, 10, 'Anda perlu mengunjungi lembaga pengembangan diri untuk memahami jati diri anda', 'scale'),
(267, 2, 10, 'Anda dapat memainkan alat musik dan bernyanyi dengan baik', 'scale'),
(268, 2, 10, 'Anda lebih cenderung menyukai permainan teka-teki', 'scale'),
(269, 2, 10, 'Anda lebih senang permainan yang membutuhkan perhitungan dan logika yang kuat', 'scale'),
(270, 2, 10, 'Anda lebih senang berkumpul bersama dengan orang lain di lingkungan anda', 'scale'),
(271, 2, 11, 'Anda dapat dengan mudah mengidentifikasi sebuah lagu dengan hanya mendengar dua atau tiga lirik lagu tersebut', 'scale'),
(272, 2, 11, 'Anda lebih senang memutar otak untuk menyelesaikan masalah, menguraikan solusi dan mengajukan pertanyaa', 'scale'),
(273, 2, 11, 'Anda lebih menyukai hal yang berhubungan dengan tarian', 'scale'),
(274, 2, 11, 'Anda lebih senang untuk mengerjakan suatu pekerjaan secara individual', 'scale'),
(275, 2, 11, 'Anda tidak nyaman dengan suasana hening', 'scale'),
(276, 2, 11, 'Anda lebih menyukai sebuah kegiatan fisik yang ekstrem', 'scale'),
(277, 2, 11, 'Anda lebih senang membuat corat coret catatan untuk mengingat sesuatu', 'scale'),
(278, 2, 11, 'Anda dapat dengan mudah menghitung tanpa alat bantu hitung', 'scale'),
(279, 2, 11, 'Anda lebih senang mengutarakan ide dengan coretan atau ilustrasi', 'scale'),
(280, 2, 11, 'Anda memiliki pendengaran yang sensitif', 'scale'),
(281, 2, 12, 'Anda lebih cenderung memilih untuk melakukan kontak fisik terhadap suatu permasalahan sehingga anda lebih paham masalah tersebut', 'scale'),
(282, 2, 12, 'Anda tidak ragu untuk dipilih sebagai pemimpin dan menunjukan bagaimana menyelesaikan suatu masalah', 'scale'),
(283, 2, 12, 'Anda lebih mudah menangkap informasi dengan mendengarkan suatu penjelasan secara lisan', 'scale'),
(284, 2, 12, 'Anda selalu mengetahui kabar terbaru dari ilmu pengetahuan dan juga teknologi', 'scale'),
(285, 2, 12, 'Anda lebih mudah mengekstrak informasi dari gambaran diagram', 'scale'),
(286, 2, 12, 'Musik dapat membangkitkan emosi dalam diri anda saat anda mendengarkannya', 'scale'),
(287, 2, 12, 'Anda paham tentang kelebihan dan kelemahan diri anda', 'scale'),
(288, 2, 12, 'Anda cenderung menyukai kegiatan alam', 'scale'),
(289, 2, 12, 'Anda cenderung menyukai kesenian, pahatan dan sculpture', 'scale'),
(290, 2, 12, 'Anda selalu menyelesaikan masalah dengan langkah-langkah atau urutan tertentu', 'scale');

-- --------------------------------------------------------

--
-- Table structure for table `profiling_user`
--

CREATE TABLE `profiling_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiling_user`
--

INSERT INTO `profiling_user` (`id`, `user_id`, `answer`, `question_id`) VALUES
(204, 1, 1, 181),
(205, 1, 1, 182),
(206, 1, 1, 183),
(207, 1, 1, 184),
(208, 1, 1, 185),
(209, 1, 1, 186),
(210, 1, 1, 187),
(211, 1, 1, 188),
(212, 1, 1, 189),
(213, 1, 1, 190),
(214, 1, 1, 191),
(215, 1, 1, 192),
(216, 1, 1, 193),
(217, 1, 1, 194),
(218, 1, 1, 195),
(219, 1, 1, 196),
(220, 1, 1, 197),
(221, 1, 1, 198),
(222, 1, 1, 199),
(223, 1, 1, 200),
(224, 1, 1, 201),
(225, 1, 1, 202),
(226, 1, 1, 203),
(227, 1, 1, 204),
(228, 1, 1, 205),
(229, 1, 1, 206),
(230, 1, 1, 207),
(231, 1, 1, 208),
(232, 1, 1, 209),
(233, 1, 1, 210),
(234, 1, 0, 211),
(235, 1, 0, 212),
(236, 1, 0, 213),
(237, 1, 0, 214),
(238, 1, 0, 215),
(239, 1, 0, 216),
(240, 1, 0, 217),
(241, 1, 0, 218),
(242, 1, 1, 219),
(243, 1, 0, 220),
(244, 1, 0, 221),
(245, 1, 1, 222),
(246, 1, 0, 223),
(247, 1, 0, 224),
(248, 1, 1, 225),
(249, 1, 2, 226),
(250, 1, 1, 227),
(251, 1, 1, 228),
(252, 1, 1, 229),
(253, 1, 1, 230),
(254, 1, 2, 231),
(255, 1, 1, 232),
(256, 1, 2, 233),
(257, 1, 1, 234),
(258, 1, 2, 235),
(259, 1, 1, 236),
(260, 1, 1, 237),
(261, 1, 1, 238),
(262, 1, 1, 239),
(263, 1, 1, 240),
(264, 1, 2, 241),
(265, 1, 1, 242),
(266, 1, 1, 243),
(267, 1, 1, 244),
(268, 1, 1, 245),
(269, 1, 2, 246),
(270, 1, 1, 247),
(271, 1, 2, 248),
(272, 1, 1, 249),
(273, 1, 2, 250),
(274, 1, 1, 251),
(275, 1, 2, 252),
(276, 1, 1, 253),
(277, 1, 1, 254),
(278, 1, 1, 255),
(279, 1, 1, 256),
(280, 1, 1, 257),
(281, 1, 1, 258),
(282, 1, 2, 259),
(283, 1, 1, 260),
(284, 1, 1, 261),
(285, 1, 2, 262),
(286, 1, 1, 263),
(287, 1, 1, 264),
(288, 1, 1, 265),
(289, 1, 1, 266),
(290, 1, 2, 267),
(291, 1, 1, 268),
(292, 1, 1, 269),
(293, 1, 1, 270),
(294, 1, 1, 271),
(295, 1, 1, 272),
(296, 1, 1, 273),
(297, 1, 2, 274),
(298, 1, 1, 275),
(299, 1, 1, 276),
(300, 1, 2, 277),
(301, 1, 1, 278),
(302, 1, 2, 279),
(303, 1, 1, 280),
(304, 1, 1, 281),
(305, 1, 1, 282),
(306, 1, 2, 283),
(307, 1, 1, 284),
(308, 1, 1, 285),
(309, 1, 1, 286),
(310, 1, 2, 287),
(311, 1, 1, 288),
(312, 1, 0, 289),
(313, 1, 2, 290);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profiling`
--
ALTER TABLE `profiling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiling_category`
--
ALTER TABLE `profiling_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiling_question`
--
ALTER TABLE `profiling_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiling_user`
--
ALTER TABLE `profiling_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profiling`
--
ALTER TABLE `profiling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profiling_category`
--
ALTER TABLE `profiling_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `profiling_question`
--
ALTER TABLE `profiling_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT for table `profiling_user`
--
ALTER TABLE `profiling_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
