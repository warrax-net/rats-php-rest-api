-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 06, 2020 at 09:53 PM
-- Server version: 8.0.22
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warrax_rats_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint NOT NULL COMMENT 'Уникальный идентификатор фотографии.',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'Заголовок / название фотографии.',
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'Описание к фотографии. Текст.',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'URI фотографии, полный путь к ресурсу.',
  `date_d` tinyint DEFAULT NULL COMMENT 'Дата фотографии. День, может быть NULL / неопределенно.',
  `date_m` tinyint DEFAULT NULL COMMENT 'Дата фотографии. Месяц, может быть NULL / неопределенно.',
  `date_y` smallint DEFAULT NULL COMMENT 'Дата фотографии. Год, может быть NULL / неопределенно.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `description`, `url`, `date_d`, `date_m`, `date_y`) VALUES
(1, 'Крысак фото', 'На фото белый крысак с красными глазами :)', 'http://warrax.net/rats/2019/09/IMG_4554.jpg', 7, 9, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `rats`
--

CREATE TABLE `rats` (
  `id` bigint NOT NULL COMMENT 'Уникальный идентификатор крысы.',
  `name` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Имя крысака.',
  `color` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Окрас крысака (текст).',
  `birth_date_d` tinyint DEFAULT NULL COMMENT 'Дата рождения крысака. День, может быть NULL / неопределенно.',
  `birth_date_m` tinyint DEFAULT NULL COMMENT 'Дата рождения крысака. Месяц, может быть NULL / неопределенно.',
  `birth_date_y` smallint DEFAULT NULL COMMENT 'Дата рождения крысака. Год, может быть NULL / неопределенно.',
  `death_date_d` tinyint DEFAULT NULL COMMENT 'Дата смерти крысака. День, может быть NULL (неопределенно).',
  `death_date_m` tinyint DEFAULT NULL COMMENT 'Дата смерти крысака. Месяц, может быть NULL (неопределенно).',
  `death_date_y` smallint DEFAULT NULL COMMENT 'Дата смерти крысака. Год, может быть NULL (неопределенно).',
  `is_alive` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Жив/Мертв. По умолчанию жив, 1 (true).',
  `death_reason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'Причины смерти крысака, NULL если жив.',
  `arrival_date_d` tinyint DEFAULT NULL COMMENT 'Дата смерти крысака. День, может быть NULL (неопределенно).',
  `arrival_date_m` tinyint DEFAULT NULL COMMENT 'Дата смерти крысака. Месяц, может быть NULL (неопределенно).',
  `arrival_date_y` smallint DEFAULT NULL COMMENT 'Дата смерти крысака. Год, может быть NULL (неопределенно).',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'Описание крысака.',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата создания записи.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rats`
--

INSERT INTO `rats` (`id`, `name`, `color`, `birth_date_d`, `birth_date_m`, `birth_date_y`, `death_date_d`, `death_date_m`, `death_date_y`, `is_alive`, `death_reason`, `arrival_date_d`, `arrival_date_m`, `arrival_date_y`, `description`, `created`) VALUES
(1, 'Один', 'Blue Berkshire Standard', NULL, 11, 2002, 23, 2, 2005, 0, 'Старость', NULL, 6, 2003, 'Один описание', '2020-11-06 21:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `rat_photo_ids`
--

CREATE TABLE `rat_photo_ids` (
  `id` bigint NOT NULL COMMENT 'Уникальный идентификатор записи отношения крыса - фото.',
  `photo_id` bigint NOT NULL COMMENT 'Ссылка на уникальный идентификатор фотографии.',
  `rat_id` int NOT NULL COMMENT 'Ссылка на уникальный идентификатор крысака.',
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Комментарий к связке крыса - фото.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rat_photo_ids`
--

INSERT INTO `rat_photo_ids` (`id`, `photo_id`, `rat_id`, `comment`) VALUES
(1, 1, 1, 'Не знаю совпадает ли фото с крысаком :)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `photo_url_idx` (`url`),
  ADD KEY `id` (`id`),
  ADD KEY `photo_date_idx` (`date_d`,`date_m`,`date_y`);
ALTER TABLE `photos` ADD FULLTEXT KEY `photo_title_fulltext_idx` (`title`);
ALTER TABLE `photos` ADD FULLTEXT KEY `photo_description_fulltext_idx` (`description`);

--
-- Indexes for table `rats`
--
ALTER TABLE `rats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rat_name_idx` (`name`) USING BTREE,
  ADD KEY `rat_color_idx` (`color`),
  ADD KEY `birth_date_idx` (`birth_date_d`,`birth_date_m`,`birth_date_y`),
  ADD KEY `death_death_idx` (`death_date_d`,`death_date_m`,`death_date_y`),
  ADD KEY `rat_arrival_date_idx` (`arrival_date_d`,`arrival_date_m`,`arrival_date_y`);
ALTER TABLE `rats` ADD FULLTEXT KEY `rat_description_idx` (`description`);

--
-- Indexes for table `rat_photo_ids`
--
ALTER TABLE `rat_photo_ids`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rat_photo_idx` (`photo_id`,`rat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT COMMENT 'Уникальный идентификатор фотографии.', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rats`
--
ALTER TABLE `rats`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT COMMENT 'Уникальный идентификатор крысы.', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rat_photo_ids`
--
ALTER TABLE `rat_photo_ids`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT COMMENT 'Уникальный идентификатор записи отношения крыса - фото.', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
