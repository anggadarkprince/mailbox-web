-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2015 at 09:22 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mailbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE IF NOT EXISTS `division` (
  `id` int(11) NOT NULL,
  `division` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `division`, `created_at`, `updated_at`) VALUES
(1, 'Drjen PPMD', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(2, 'Dirjen PKP', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(3, 'Dirjen PDTU', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(4, 'Dirjen PDT', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(5, 'Dirjen PKP2Trans', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(6, 'DirjenPKTrans', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(7, 'Inspektur Jenderal', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(8, 'Balilatfo', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(9, 'Sahli Pembangunan & Kemasyarakatan', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(10, 'Shali Pengembangan Ekonomi Lokal', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(11, 'Sahli Pengembangan Wilayah', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(12, 'Sahli Hubungan Antar Lembaga', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(14, 'Sahli Hukum', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(15, 'Karo Perencanaan', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(16, 'Karo SDM & Umum', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(17, 'Karo Hukum dan Ortala', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(18, 'Karo Keuangan', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(19, 'Karo Humas & Kerjasama', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(20, 'TU Sekjen', '2015-11-05 22:49:13', '2015-11-05 22:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `id` int(11) NOT NULL,
  `label_id` int(11) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `agenda_number` varchar(100) NOT NULL,
  `mail_number` varchar(100) NOT NULL,
  `mail_date` date NOT NULL,
  `received_date` date DEFAULT NULL,
  `from` varchar(300) DEFAULT NULL,
  `to` varchar(300) DEFAULT NULL,
  `authorizing_signature` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `label_id`, `subject`, `agenda_number`, `mail_number`, `mail_date`, `received_date`, `from`, `to`, `authorizing_signature`, `created_at`, `updated_at`) VALUES
(24, 3, 'perihal', '17', '2', '2015-11-06', '2015-11-06', 'Sekjen', 'jvjh', '', '2015-11-05 23:57:54', '2015-11-06 01:52:59'),
(29, 1, 'Peringatan Hari Pahlawan', '25', '7646', '2015-11-06', '2015-11-06', 'Kind of mail which handled as soon as posible', '', '', '2015-11-06 02:01:57', '2015-11-06 08:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `inbox_attachment`
--

CREATE TABLE IF NOT EXISTS `inbox_attachment` (
  `id` int(11) NOT NULL,
  `inbox_id` int(11) NOT NULL,
  `resource` varchar(300) NOT NULL,
  `type` enum('ORIGINAL','SIGNATURE') NOT NULL DEFAULT 'ORIGINAL',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inbox_attachment`
--

INSERT INTO `inbox_attachment` (`id`, `inbox_id`, `resource`, `type`, `created_at`, `updated_at`) VALUES
(26, 29, '2015-11-06_ORIGINAL_v_produk4.php', 'ORIGINAL', '2015-11-06 02:01:57', '2015-11-06 02:01:57'),
(27, 29, '2015-11-06_SIGNATURE_m_master_lunas_piutang4.php', 'SIGNATURE', '2015-11-06 02:01:57', '2015-11-06 02:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `inbox_division`
--

CREATE TABLE IF NOT EXISTS `inbox_division` (
  `id` int(11) NOT NULL,
  `inbox_id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inbox_division`
--

INSERT INTO `inbox_division` (`id`, `inbox_id`, `division_id`, `created_at`, `updated_at`) VALUES
(21, 24, 10, '2015-11-05 23:57:54', '2015-11-05 23:57:54'),
(22, 24, 11, '2015-11-05 23:57:54', '2015-11-05 23:57:54'),
(23, 24, 15, '2015-11-05 23:57:54', '2015-11-05 23:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `inbox_signature`
--

CREATE TABLE IF NOT EXISTS `inbox_signature` (
  `id` int(11) NOT NULL,
  `inbox_id` int(11) NOT NULL,
  `signature_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inbox_signature`
--

INSERT INTO `inbox_signature` (`id`, `inbox_id`, `signature_id`, `created_at`, `updated_at`) VALUES
(7, 24, 4, '2015-11-05 23:57:55', '2015-11-05 23:57:55'),
(8, 24, 7, '2015-11-05 23:57:55', '2015-11-05 23:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE IF NOT EXISTS `labels` (
  `id` int(11) NOT NULL,
  `label` varchar(45) NOT NULL,
  `description` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `label`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Umum', 'General mail data to archive', '2015-10-25 03:01:52', '2015-11-06 07:40:33'),
(2, 'Rahasia', 'Clasified mail response', '2015-10-25 03:01:52', '2015-11-06 07:40:56'),
(3, 'Sangat Segera', 'High priority mail response', '2015-10-25 03:01:52', '2015-11-06 07:41:02'),
(4, 'Segera', 'Kind of mail which handled as soon as posible', '2015-10-25 03:01:52', '2015-11-05 22:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `outbox`
--

CREATE TABLE IF NOT EXISTS `outbox` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `label_id` int(11) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `agenda_number` varchar(100) NOT NULL,
  `mail_number` varchar(100) NOT NULL,
  `mail_date` date NOT NULL,
  `from` varchar(300) NOT NULL,
  `to` varchar(300) NOT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `outbox`
--

INSERT INTO `outbox` (`id`, `user_id`, `label_id`, `subject`, `agenda_number`, `mail_number`, `mail_date`, `from`, `to`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'Penggalian Jalan Desa Suka Maju', '1', 'SRT-39867239', '2015-04-02', 'Sekjen', 'Pelaksana Program Desa', 'Vitae incididunt est, a debitis duis necessitatibus voluptas assumenda earum laudantium, consequatur.', '2015-10-28 01:54:33', '2015-10-31 22:54:43'),
(2, 2, 1, 'Pengambangan Generator Listrik Desa', '2', 'SRT-34634743', '2015-10-06', 'Ketua Lapangan', 'Filler Mouth', 'Quos ut commodo velit ut veniam, voluptatem, molestiae ut quod nobis magna eiusmod qui.', '2015-10-28 01:54:51', '2015-10-31 22:54:48'),
(3, 2, 2, 'Penerimaan Dana Desa', '3', 'OUT-56376', '2015-11-01', 'Sekjen Kemendesa', 'President', 'lorem ipsum dolor amet lorem ipsum dolor amet', '2015-11-01 12:13:23', '2015-11-01 12:13:23'),
(4, 2, 2, 'Penerimaan Dana Desa', '3', 'OUT-56376', '2015-11-01', 'Sekjen Kemendesa', 'President', 'lorem ipsum dolor amet lorem ipsum dolor amet', '2015-11-01 12:19:01', '2015-11-01 12:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `outbox_attachment`
--

CREATE TABLE IF NOT EXISTS `outbox_attachment` (
  `id` int(11) NOT NULL,
  `outbox_id` int(11) NOT NULL,
  `resource` varchar(300) NOT NULL,
  `type` enum('ORIGINAL','SIGNATURE') NOT NULL DEFAULT 'ORIGINAL',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `outbox_attachment`
--

INSERT INTO `outbox_attachment` (`id`, `outbox_id`, `resource`, `type`, `created_at`, `updated_at`) VALUES
(1, 4, '2015-11-01_ORIGINAL_banana1.png', 'ORIGINAL', '2015-11-01 12:19:01', '2015-11-01 12:19:01'),
(2, 4, '2015-11-01_ORIGINAL_Casing_1.png', 'ORIGINAL', '2015-11-01 12:19:01', '2015-11-01 12:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(45) NOT NULL,
  `value` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'website', 'Kemendesa MailBox', 2, '2015-10-25 03:01:52', '2015-10-28 04:45:59'),
(2, 'keyword', 'kemendesa, mail, inbox, outbox,surat', 2, '2015-10-25 03:01:52', '2015-10-28 04:46:56'),
(3, 'description', 'MailBox is a web app which provide mail serving', 2, '2015-10-25 03:01:52', '2015-10-28 04:45:59'),
(4, 'email', 'mailbox@kemendesa.go.id', 2, '2015-10-25 03:01:52', '2015-10-28 04:45:59'),
(5, 'address', 'Jl. Pahlawan - Kalibata, South Jakarta - Indonesia', 2, '2015-10-25 03:01:52', '2015-10-28 04:46:56'),
(6, 'contact', '+6285655479868', 2, '2015-10-25 03:01:52', '2015-10-28 04:46:56'),
(7, 'facebook', 'https://www.facebook.com/pages/kemendesa', 2, '2015-10-25 03:01:52', '2015-10-28 04:45:59'),
(8, 'twitter', 'https://www.twitter.com/kemendesa', 2, '2015-10-25 03:01:52', '2015-10-28 04:45:59'),
(9, 'google', 'https://plus.google.com/+Kemendesa', 2, '2015-10-25 03:01:52', '2015-10-28 04:45:59'),
(10, 'favicon', 'favicon.png', 2, '2015-10-25 03:01:52', '2015-10-28 05:39:39');

-- --------------------------------------------------------

--
-- Table structure for table `signature`
--

CREATE TABLE IF NOT EXISTS `signature` (
  `id` int(11) NOT NULL,
  `signature` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `signature`
--

INSERT INTO `signature` (`id`, `signature`, `created_at`, `updated_at`) VALUES
(1, 'Buat Tanggapan dan Saran', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(2, 'Tangani / Proses lebih lanjut', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(3, 'Lapor / Menghadap', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(4, 'Acc / Laksanakan', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(5, 'Koordinasikan dan Konfirmasikan', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(6, 'Koreksi / Sempurnakan', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(7, 'Monitor / Cari Masukan', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(8, 'Untuk Mohon Perhatian', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(9, 'Mewakili', '2015-11-05 22:49:13', '2015-11-05 22:49:13'),
(10, 'Siapkan Bahan', '2015-11-05 22:49:13', '2015-11-05 22:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(120) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `about` varchar(500) DEFAULT NULL,
  `gender` enum('MALE','FEMALE') DEFAULT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'noimage.jpg',
  `authority` enum('DEV','ADMIN') NOT NULL DEFAULT 'ADMIN',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `about`, `gender`, `avatar`, `authority`, `created_at`, `updated_at`) VALUES
(1, 'superuser', '5e8edd851d2fdfbd7415232c67367cc3', 'dev@sketchproject.com', 'Angga Ari Wijaya', 'Default developer user', 'MALE', 'dev.jpg', 'DEV', '2015-10-25 03:01:52', '2015-10-25 03:01:52'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@kemendesa.go.id', 'Mailbox Admin', 'Default admin user', 'MALE', 'user1.png', 'ADMIN', '2015-10-25 03:01:52', '2015-10-28 07:34:16'),
(3, 'anggadarkprince', '21232f297a57a5a743894a0e4a801fc3', 'anggadarkprince@gmail.com', 'Angga Ari Wijaya', NULL, NULL, 'noimage.jpg', 'ADMIN', '2015-10-26 10:39:11', '2015-10-26 10:39:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`,`label_id`),
  ADD KEY `fk_inbox_labels1_idx` (`label_id`);

--
-- Indexes for table `inbox_attachment`
--
ALTER TABLE `inbox_attachment`
  ADD PRIMARY KEY (`id`,`inbox_id`),
  ADD KEY `fk_attachment_inbox1_idx` (`inbox_id`);

--
-- Indexes for table `inbox_division`
--
ALTER TABLE `inbox_division`
  ADD PRIMARY KEY (`id`,`inbox_id`,`division_id`),
  ADD KEY `fk_inbox_division_inbox1_idx` (`inbox_id`),
  ADD KEY `fk_inbox_division_division1_idx` (`division_id`);

--
-- Indexes for table `inbox_signature`
--
ALTER TABLE `inbox_signature`
  ADD PRIMARY KEY (`id`,`inbox_id`,`signature_id`),
  ADD KEY `fk_inbox_signature_signature1_idx` (`signature_id`),
  ADD KEY `fk_inbox_signature_inbox1_idx` (`inbox_id`);

--
-- Indexes for table `labels`
--
ALTER TABLE `labels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outbox`
--
ALTER TABLE `outbox`
  ADD PRIMARY KEY (`id`,`user_id`,`label_id`),
  ADD KEY `fk_outbox_labels_idx` (`label_id`),
  ADD KEY `fk_outbox_users1_idx` (`user_id`);

--
-- Indexes for table `outbox_attachment`
--
ALTER TABLE `outbox_attachment`
  ADD PRIMARY KEY (`id`,`outbox_id`),
  ADD KEY `fk_outbox_attachment_outbox1_idx` (`outbox_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD KEY `fk_settings_users1_idx` (`user_id`);

--
-- Indexes for table `signature`
--
ALTER TABLE `signature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `inbox_attachment`
--
ALTER TABLE `inbox_attachment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `inbox_division`
--
ALTER TABLE `inbox_division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `inbox_signature`
--
ALTER TABLE `inbox_signature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `labels`
--
ALTER TABLE `labels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `outbox`
--
ALTER TABLE `outbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `outbox_attachment`
--
ALTER TABLE `outbox_attachment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `signature`
--
ALTER TABLE `signature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `inbox`
--
ALTER TABLE `inbox`
  ADD CONSTRAINT `fk_inbox_labels1` FOREIGN KEY (`label_id`) REFERENCES `labels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inbox_attachment`
--
ALTER TABLE `inbox_attachment`
  ADD CONSTRAINT `fk_attachment_inbox1` FOREIGN KEY (`inbox_id`) REFERENCES `inbox` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inbox_division`
--
ALTER TABLE `inbox_division`
  ADD CONSTRAINT `fk_inbox_division_division1` FOREIGN KEY (`division_id`) REFERENCES `division` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inbox_division_inbox1` FOREIGN KEY (`inbox_id`) REFERENCES `inbox` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inbox_signature`
--
ALTER TABLE `inbox_signature`
  ADD CONSTRAINT `fk_inbox_signature_inbox1` FOREIGN KEY (`inbox_id`) REFERENCES `inbox` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inbox_signature_signature1` FOREIGN KEY (`signature_id`) REFERENCES `signature` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `outbox`
--
ALTER TABLE `outbox`
  ADD CONSTRAINT `fk_outbox_labels` FOREIGN KEY (`label_id`) REFERENCES `labels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_outbox_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `outbox_attachment`
--
ALTER TABLE `outbox_attachment`
  ADD CONSTRAINT `fk_outbox_attachment_outbox1` FOREIGN KEY (`outbox_id`) REFERENCES `outbox` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `fk_settings_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
