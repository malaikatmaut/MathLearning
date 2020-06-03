-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2020 at 05:19 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `math_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `guest_message`
--

CREATE TABLE `guest_message` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `subject` varchar(128) NOT NULL,
  `message` varchar(512) NOT NULL,
  `date_created` int(11) NOT NULL,
  `is_read` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_message`
--

INSERT INTO `guest_message` (`id`, `name`, `email`, `subject`, `message`, `date_created`, `is_read`) VALUES
(3, 'Jon Burito', 'jonfadli66@gmail.com', 'GATAU', 'gatau mau nulis apa!', 1591120162, 1),
(4, 'Jon', 'jonjon@gmail.com', 'Test', 'Test aja!', 1591196610, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Rian Rivaldo', 'ryanrumapea@gmail.com', 'df314548e55bce6939b53f1cced3fa6a.jpg', '$2y$10$2sV7QopjSK5wVaS5SRNSLu0WHX0cnLH93mD1stwOgU0aiePRFGHjq', 1, 1, 1590576405),
(2, 'Jon Burito', 'burito66@gmail.com', '1535479289112.jpg', '$2y$10$gNmLejKgWhfPY2yHEEQNOO8u11qFpquDcVZPaOS5.BpRfaxczeWaq', 2, 1, 1590576892),
(9, 'Rian R', 'ryanrvldo17@gmail.com', '1542393434440.jpg', '$2y$10$r8SWdAcA7Y0sqMbB8pzoj.j8Q53mr7qWnDX6LX4n/KkfadRJEWk6y', 2, 1, 1591196023);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(11, 1, 2),
(12, 1, 3),
(13, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `id` int(11) NOT NULL,
  `discussion_id` int(11) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `answer` varchar(512) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_answers`
--

INSERT INTO `user_answers` (`id`, `discussion_id`, `user_email`, `answer`, `date_created`) VALUES
(1, 2, 'ryanrumapea@gmail.com', 'Gatau, cari aja sendiri!', 1591107204),
(2, 2, 'ryanrumapea@gmail.com', 'Dih males', 1591107800),
(3, 2, 'burito66@gmail.com', 'Y karena bulet aja', 1591107862),
(4, 1, 'burito66@gmail.com', 'Kurang tau juga sih, tp dikampung aku biasanya kotak', 1591107901),
(5, 1, 'ryanrvldo17@gmail.com', 'Gatau tanya google aja!', 1591196192),
(6, 5, 'ryanrvldo17@gmail.com', 'gatau', 1591196341);

-- --------------------------------------------------------

--
-- Table structure for table `user_article`
--

CREATE TABLE `user_article` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `image_header` varchar(128) NOT NULL,
  `content` mediumtext NOT NULL,
  `author` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_article`
--

INSERT INTO `user_article` (`id`, `title`, `image_header`, `content`, `author`, `date_created`, `views`) VALUES
(6, 'Bilangan Kompleks dalam Bentuk Polar', 'default.jpg', 'Bilangan kompleks [img]https://quicklatex.com/cache3/e4/ql_fd76aeafde5b9923cd960b2cd06930e4_l3.png[/img] dapat dinyatakan dalam bentuk polar\r\n\r\n[center][img]https://quicklatex.com/cache3/1d/ql_a4e7471135879473ccd4729b0313a01d_l3.png[/img][/center]\r\n\r\ndengan [img]https://quicklatex.com/cache3/d1/ql_483b1d017a859b708126c11153940ed1_l3.png[/img] dan [img]https://quicklatex.com/cache3/2d/ql_a24f81016b1ecbec92a49b64d950e92d_l3.png[/img]. Bentuk ini dikenal sebagai [b]rumus Euler[/b] untuk bilangan kompleks.\r\n\r\n\r\n\r\nNah, bila Anda ingat deret Maclaurin untuk fungsi trigonometri, khususnya\r\n\r\n[center][img]https://quicklatex.com/cache3/d4/ql_3baee2b9d6e3622656e501589a4caad4_l3.png[/img]\r\n[/center]\r\n[center][img]https://quicklatex.com/cache3/4b/ql_a17c313b30ef262794fcd307608a934b_l3.png[/img][/center]\r\ndan deret Maclaurin untuk e^{i\\theta}, yaitu\r\n\r\n\r\n\r\ne^{i\\theta}=1+i\\theta+\\frac{1}{2!}(i\\theta)^2+\\frac{1}{3!}(i\\theta)^3+\\cdots+\\frac{1}{k!}(i\\theta)^k+\\cdots,\r\n\r\n\r\n\r\nmaka rumus Euler di atas jelas berlaku, mengingat\r\n\r\n\r\n\r\ni^k=\\left\\{\\begin{array}{ll} 1,&\\quad k=4n,\\\\i,&\\quad k=4n+1,\\\\-1,&\\quad k=4n+2,\\\\-i,&\\quad k=4n+3 \\end{array}\\right.\r\n\r\n\r\n\r\nBilangan kompleks dan, lebih seru lagi, fungsi kompleks, merupakan subjek matematika yang menarik sekaligus menantang. Nanti saya akan cerita lebih banyak tentang fungsi kompleks ya.\r\n\r\n\r\n\r\n[center][youtube]X6s5QeNU2SU[/youtube][/center]\r\n\r\n\r\n*\r\n\r\n\r\n\r\nSource: [url=https://bermatematika.net/2020/05/26/bilangan-kompleks-dalam-bentuk-polar/]https://bermatematika.net/2020/05/26/bilangan-kompleks-dalam-bentuk-polar/ [/url]                                                                                                                                                                           \r\n                                       ', 'ryanrumapea@gmail.com', 1590774832, 0),
(7, 'Bilangan Kompleks sebagai Matriks', 'person_4.jpg', 'Bila Anda merasa penyajian bilangan kompleks sebagai pasangan bilangan, dengan rumus penjumlahan dan perkalian yang saya perkenalkan dalam artikel sebelumnya, agak aneh, ada penyajian lainnya untuk bilangan kompleks, yaitu sebagai matriks\r\n\r\n[center][img]https://s0.wp.com/latex.php?latex=%5Cleft%28%5Cbegin%7Barray%7D%7Bcc%7Da+%26-b%5C%5C+b+%26a%5Cend%7Barray%7D%5Cright%29%2C&bg=%23ffffff&fg=%23000000&s=0[/img][/center]\r\n\r\ndengan [img]https://s0.wp.com/latex.php?latex=a%2Cb%5Cin%5Cmathbb%7BR%7D.&bg=%23ffffff&fg=%23000000&s=0[/img] Penjumlahan dan perkalian dua bilangan kompleks dalam hal ini sama dengan penjumlahan dan perkalian dua matriks.\r\n\r\nPerhatikan, khususnya, untuk perkalian, kita mempunyai\r\n\r\n[center][img]https://s0.wp.com/latex.php?latex=%5Cleft%28%5Cbegin%7Barray%7D%7Bcc%7Da+%26-b%5C%5C+b+%26a%5Cend%7Barray%7D%5Cright%29%5Cleft%28%5Cbegin%7Barray%7D%7Bcc%7Dc+%26-d%5C%5C+d+%26c%5Cend%7Barray%7D%5Cright%29%3D%5Cleft%28%5Cbegin%7Barray%7D%7Bcc%7Dac-bd+%26-%28ad%2Bbc%29%5C%5C+ad%2Bbc+%26ac-bd%5Cend%7Barray%7D%5Cright%29.&bg=%23ffffff&fg=%23000000&s=0[/img][/center]\r\n\r\nO ya, padanan untuk bilangan imajiner i dalam hal ini adalah matriks\r\n\r\n[center][img]https://s0.wp.com/latex.php?latex=%5Cleft%28%5Cbegin%7Barray%7D%7Bcc%7D0+%26-1%5C%5C+1+%260%5Cend%7Barray%7D%5Cright%29.&bg=%23ffffff&fg=%23000000&s=0[/img][/center]\r\n\r\nSila cek bahwa kuadrat dari matriks ini sama dengan [img]https://s0.wp.com/latex.php?latex=-I_2%2C&bg=%23ffffff&fg=%23000000&s=0[/img] dengan [img]https://s0.wp.com/latex.php?latex=I_2&bg=%23ffffff&fg=%23000000&s=0[/img] menyatakan matriks identitas ordo 2 x 2.\r\n*\r\n\r\nSource: https://bermatematika.net/2020/05/23/bilangan-kompleks-sebagai-matriks/                                                                                                ', 'burito66@gmail.com', 1590782384, 0),
(8, 'Bilangan Kompleks sebagai Pasangan Bilangan', 'default.jpg', 'Persamaan kuadrat [img]https://s0.wp.com/latex.php?latex=ax%5E2%2Bbx%2Bc%3D0&bg=%23ffffff&fg=%23000000&s=0[/img] mempunyai sepasang [b][b]akar kompleks[/b][/b] [img]https://s0.wp.com/latex.php?latex=x_%7B1%2C2%7D%3D%5Cfrac%7B-b%5Cpm%5Csqrt%7Bb%5E2-4ac%7D%7D%7B2a%7D&bg=%23ffffff&fg=%23000000&s=0[/img] bila [img]https://s0.wp.com/latex.php?latex=b%5E2-4ac%3C0.&bg=%23ffffff&fg=%23000000&s=0[/img] Kedua akar kompleks tersebut biasanya dituliskan sebagai \r\n[center][img]https://s0.wp.com/latex.php?latex=x_%7B1%2C2%7D%3D-%5Cfrac%7Bb%7D%7B2a%7D%5Cpm%5Cfrac%7B%5Csqrt%7B4ac-b%5E2%7D%7D%7B2a%7Di%2C&bg=%23ffffff&fg=%23000000&s=0[/img][/center]\r\ndengan [img]https://s0.wp.com/latex.php?latex=i&bg=%23ffffff&fg=%23000000&s=0[/img] menyatakan [b][b]bilangan imajiner[/b][/b] yang memenuhi [img]https://s0.wp.com/latex.php?latex=i%5E2%3D-1.&bg=%23ffffff&fg=%23000000&s=0[/img] Disebut bilangan imajiner karena tidak ada bilangan real [img]https://s0.wp.com/latex.php?latex=x&bg=%23ffffff&fg=%23000000&s=0[/img] yang memenuhi persamaan [img]https://s0.wp.com/latex.php?latex=x%5E2%3D-1.&bg=%23ffffff&fg=%23000000&s=0[/img] \r\n\r\n[b][b]Sistem bilangan kompleks[/b][/b] merupakan sistem bilangan yang ‘lebih luas’ daripada sistem bilangan real. Di perguruan tinggi, ada satu mata kuliah yang khusus membahas fungsi  kompleks, yaitu fungsi yang terdefinisi untuk bilangan kompleks dan nilainya juga bilangan kompleks. Bagi Anda yang sulit menerima bilangan imajiner [img]https://s0.wp.com/latex.php?latex=i&bg=%23ffffff&fg=%23000000&s=0[/img] dan bilangan kompleks yang berbentuk [img]https://s0.wp.com/latex.php?latex=a%2Bbi&bg=%23ffffff&fg=%23000000&s=0[/img] dengan [img]https://s0.wp.com/latex.php?latex=a%2Cb%5Cin%5Cmathbb%7BR%7D%2C&bg=%23ffffff&fg=%23000000&s=0[/img] ada alternatif lain untuk memahaminya, yaitu dengan mempelajarinya sebagai pasangan bilangan [img]https://s0.wp.com/latex.php?latex=%28a%2Cb%29%2C&bg=%23ffffff&fg=%23000000&s=0[/img] dengan [img]https://s0.wp.com/latex.php?latex=a%2Cb%5Cin%5Cmathbb%7BR%7D.&bg=%23ffffff&fg=%23000000&s=0[/img] Penjumlahan dan perkalian dua bilangan kompleks [img]https://s0.wp.com/latex.php?latex=%28a%2Cb%29&bg=%23ffffff&fg=%23000000&s=0[/img] dan [img]https://s0.wp.com/latex.php?latex=%28c%2Cd%29&bg=%23ffffff&fg=%23000000&s=0[/img] dalam hal ini didefinisikan sebagai\r\n\r\n[center][img]https://s0.wp.com/latex.php?latex=%28a%2Cb%29%2B%28c%2Cd%29%3A%3D%28a%2Bc%2Cb%2Bd%29%3B&bg=%23ffffff&fg=%23000000&s=0[/img][/center]\r\n\r\n[center][img]https://s0.wp.com/latex.php?latex=%28a%2Cb%29%2A%28c%2Cd%29%3A%3D%28ac-bd%2Cad%2Bbc%29.&bg=%23ffffff&fg=%23000000&s=0[/img][/center]\r\nPerhatikan bahwa \r\n[center][img]https://s0.wp.com/latex.php?latex=%28a%2C0%29%2B%28b%2C0%29%3D%28a%2Bb%2C0%29%5C+%7B%5Crm+dan%7D%5C+%28a%2C0%29%2A%28b%2C0%29%3D%28ab%2C0%29&bg=%23ffffff&fg=%23000000&s=0[/img][/center]\r\ndan \r\n[center][img]https://s0.wp.com/latex.php?latex=%28a%2Cb%29%2A%281%2C0%29%3D%28a%2Cb%29.&bg=%23ffffff&fg=%23000000&s=0[/img][/center]\r\nFakta pertama mengisaratkan bahwa pasangan [img]https://s0.wp.com/latex.php?latex=%28a%2C0%29&bg=%23ffffff&fg=%23000000&s=0[/img] bersifat seperti bilangan real [img]https://s0.wp.com/latex.php?latex=a%2C&bg=%23ffffff&fg=%23000000&s=0[/img] dan fakta kedua memberi tahu kita bahwa pasangan [img]https://s0.wp.com/latex.php?latex=%281%2C0%29&bg=%23ffffff&fg=%23000000&s=0[/img] merupakan [b][b]unsur identitas perkalian[/b][/b], seperti halnya bilangan 1 di [img]https://s0.wp.com/latex.php?latex=%5Cmathbb%7BR%7D.&bg=%23ffffff&fg=%23000000&s=0[/img] Nah, selanjutnya kita mempunyai \r\n[center][img]https://s0.wp.com/latex.php?latex=%280%2C1%29%5E2%3D%280%2C1%29%2A%280%2C1%29%3D%28-1%2C0%29.&bg=%23ffffff&fg=%23000000&s=0[/img][/center]\r\nJadi ada pasangan bilangan [img]https://s0.wp.com/latex.php?latex=%280%2C1%29&bg=%23ffffff&fg=%23000000&s=0[/img] yang kuadratnya sama dengan [img]https://s0.wp.com/latex.php?latex=%28-1%2C0%29.&bg=%23ffffff&fg=%23000000&s=0[/img] Bila kita padankan pasangan [img]https://s0.wp.com/latex.php?latex=%28-1%2C0%29&bg=%23ffffff&fg=%23000000&s=0[/img] dengan bilangan real -1, maka pasangan bilangan [img]https://s0.wp.com/latex.php?latex=%280%2C1%29&bg=%23ffffff&fg=%23000000&s=0[/img] inilah yang kita anggap bilangan imajiner [img]https://s0.wp.com/latex.php?latex=i.&bg=%23ffffff&fg=%23000000&s=0[/img] ‘Bilangan’ [img]https://s0.wp.com/latex.php?latex=i&bg=%23ffffff&fg=%23000000&s=0[/img] tersebut berada di luar [img]https://s0.wp.com/latex.php?latex=%5Cmathbb%7BR%7D.&bg=%23ffffff&fg=%23000000&s=0[/img] Selanjutnya, setiap bilangan kompleks [img]https://s0.wp.com/latex.php?latex=%28a%2Cb%29&bg=%23ffffff&fg=%23000000&s=0[/img] dapat dinyatakan sebagai \r\n[center][img]https://s0.wp.com/latex.php?latex=%28a%2Cb%29%3Da%281%2C0%29%2Bb%280%2C1%29%2C&bg=%23ffffff&fg=%23000000&s=0[/img][/center]\r\nyang kemudian dapat kita tuliskan sebagai [img]https://s0.wp.com/latex.php?latex=a.1%2Bb.i&bg=%23ffffff&fg=%23000000&s=0[/img] atau [img]https://s0.wp.com/latex.php?latex=a%2Bbi.&bg=%23ffffff&fg=%23000000&s=0[/img]\r\n\r\n*\r\n\r\nSource : [url=https://bermatematika.net/2020/05/19/bilangan-kompleks-sebagai-pasangan-bilangan/]https://bermatematika.net/2020/05/19/bilangan-kompleks-sebagai-pasangan-bilangan/[/url]                                                           ', 'ryanrumapea@gmail.com', 1590776762, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_article_comments`
--

CREATE TABLE `user_article_comments` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `message` varchar(512) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_article_comments`
--

INSERT INTO `user_article_comments` (`id`, `article_id`, `name`, `user_email`, `message`, `date_created`) VALUES
(1, 6, 'Rian Rivaldo', 'ryanrumapea@gmail.com', 'this is a bad article!', 1590832965),
(2, 7, 'Si Nama', 'sijembut@gmail.com', 'do you know about the me?', 1590833156),
(3, 6, 'Rian Rivaldo', 'ryanrumapea@gmail.com', 'cuy', 1590835901),
(4, 7, 'Jon Burito', 'burito66@gmail.com', 'test', 1590835999),
(5, 8, 'Rian R', 'ryanrvldo17@gmail.com', 'Mantap!', 1591196158),
(6, 9, 'Rian R', 'ryanrvldo17@gmail.com', 'Leave a comment please!', 1591196296);

-- --------------------------------------------------------

--
-- Table structure for table `user_discussion`
--

CREATE TABLE `user_discussion` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `description` mediumtext NOT NULL,
  `category` varchar(128) NOT NULL,
  `author` varchar(128) NOT NULL,
  `is_solved` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_discussion`
--

INSERT INTO `user_discussion` (`id`, `title`, `description`, `category`, `author`, `is_solved`, `date_created`) VALUES
(1, 'Kenapa lingkaran bisa bulet ya?', 'Saya penasaran aja gitu kenapa lingkaran bisa bulet gitu. Kenapa bentuknya ga kaya mouse atau jendela gitu, kenapa harus bulet? Coba ada yang bisa ngejelasin ke saya gak?', 'Lingkaran', 'ryanrumapea@gmail.com', 0, 1591100377),
(2, 'Kenapa rumus luas lingkaran harus gitu?', 'Kenapa rumus luas lingkaran itu harus [img]https://quicklatex.com/cache3/4a/ql_779e1067f5a3df9652a2cb80e521374a_l3.png[/img]?', 'Lingkaran', 'ryanrumapea@gmail.com', 0, 1591100756);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 1, 'Message', 'admin/message', 'fas fa-fw fa-envelope', 1),
(10, 2, 'My Articles', 'user/articles', 'fas fa-fw fa-newspaper', 1),
(11, 2, 'My Discussions', 'user/discussions', 'fab fa-fw fa-discourse', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guest_message`
--
ALTER TABLE `guest_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_article`
--
ALTER TABLE `user_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_article_comments`
--
ALTER TABLE `user_article_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_discussion`
--
ALTER TABLE `user_discussion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guest_message`
--
ALTER TABLE `guest_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_article`
--
ALTER TABLE `user_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_article_comments`
--
ALTER TABLE `user_article_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_discussion`
--
ALTER TABLE `user_discussion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
