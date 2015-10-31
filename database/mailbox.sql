-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2015 at 11:30 PM
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
-- Table structure for table `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `id` int(11) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `agenda_number` varchar(100) NOT NULL,
  `mail_number` varchar(100) NOT NULL,
  `mail_date` date NOT NULL,
  `receive_date` date NOT NULL,
  `receiver` varchar(300) NOT NULL,
  `authorizing_signature` text,
  `attachment` varchar(255) DEFAULT NULL,
  `label_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `subject`, `agenda_number`, `mail_number`, `mail_date`, `receive_date`, `receiver`, `authorizing_signature`, `attachment`, `label_id`, `created_at`, `updated_at`) VALUES
(1, 'Periha 3', '1', 'INR-5634723', '1978-08-05', '2004-07-11', 'Tujuan 3', 'Corporis nihil corrupti, suscipit perferendis molestiae ex explicabo. Eligendi nostrud cum lorem facilis quia incidunt, amet, aliquam.', NULL, 1, '2015-10-28 01:52:33', '2015-10-28 09:32:16'),
(2, 'Contoh perihal 1', '2', 'INR-35634723', '2015-10-28', '2015-10-28', 'Tujian Surat 1', 'Quod est facilis fugit, odio nostrum totam eiusmod non et consequat. Eligendi velit eos, quo velit.', '2015-10-15_292009_10150364143573608_66108244_n.jpg', 2, '2015-10-28 01:52:48', '2015-10-28 09:31:28'),
(3, 'Perihal 2', '3', 'INR-3652364', '2015-10-28', '2015-10-28', 'Tujuan 2', 'Tempore, voluptas quos sunt, vel laboriosam, nesciunt, nesciunt, temporibus distinctio. Error nostrum ex nihil iusto.', NULL, 1, '2015-10-28 01:53:18', '2015-10-28 09:31:53'),
(5, 'df', '4', 'srg', '2015-10-28', '2015-10-28', 'sdg', 'sets', '2015-10-15_banana.png', 1, '2015-10-28 09:50:59', '2015-10-28 10:01:30');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `label`, `description`, `created_at`, `updated_at`) VALUES
(1, 'IMPORTANT', 'Important mail to archive and make an index', '2015-10-25 03:01:52', '2015-10-25 03:01:52'),
(2, 'GENERAL', 'General mail data to archive', '2015-10-25 03:01:52', '2015-10-25 03:01:52'),
(3, 'SOON', 'Kind of mail which handled as soon as posible', '2015-10-25 03:01:52', '2015-10-25 03:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `outbox`
--

CREATE TABLE IF NOT EXISTS `outbox` (
  `id` int(11) NOT NULL,
  `mail_number` varchar(100) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `from` varchar(300) NOT NULL,
  `to` varchar(300) NOT NULL,
  `mail_date` date NOT NULL,
  `description` text NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `label_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `outbox`
--

INSERT INTO `outbox` (`id`, `mail_number`, `subject`, `from`, `to`, `mail_date`, `description`, `attachment`, `label_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'SRT-39867239', 'Penggalian Jalan Desa Suka Maju', 'Sekjen', 'Pelaksana Program Desa', '2015-04-02', 'Vitae incididunt est, a debitis duis necessitatibus voluptas assumenda earum laudantium, consequatur.', '2015-10-15_abstract_(7).jpg', 2, 2, '2015-10-28 01:54:33', '2015-10-28 02:23:50'),
(2, 'SRT-34634743', 'Pengambangan Generator Listrik Desa', 'Ketua Lapangan', 'Filler Mouth', '2015-10-06', 'Quos ut commodo velit ut veniam, voluptatem, molestiae ut quod nobis magna eiusmod qui.', '2015-10-15_abstract_(180).jpg', 1, 2, '2015-10-28 01:54:51', '2015-10-28 02:23:45');

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
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`,`label_id`),
  ADD KEY `fk_inbox_labels1_idx` (`label_id`);

--
-- Indexes for table `labels`
--
ALTER TABLE `labels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outbox`
--
ALTER TABLE `outbox`
  ADD PRIMARY KEY (`id`,`label_id`,`user_id`),
  ADD KEY `fk_outbox_labels_idx` (`label_id`),
  ADD KEY `fk_outbox_users1_idx` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD KEY `fk_settings_users1_idx` (`user_id`);

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
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `labels`
--
ALTER TABLE `labels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `outbox`
--
ALTER TABLE `outbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
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
-- Constraints for table `outbox`
--
ALTER TABLE `outbox`
  ADD CONSTRAINT `fk_outbox_labels` FOREIGN KEY (`label_id`) REFERENCES `labels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_outbox_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `fk_settings_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
