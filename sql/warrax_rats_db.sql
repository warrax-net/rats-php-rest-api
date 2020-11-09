-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 08, 2020 at 09:20 PM
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
-- Database: `d84116_warraxrat`
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
(1, 'Один', 'Blue Berkshire Standard', -1, 11, 2002, 23, 2, 2005, 0, 'Старость', -1, 6, 2003, 'Самый викинг из всех крысов', '2020-11-06 21:17:07'),
(6, 'Стасик Полоскин', 'Blue Agouti Hooded Standart', -1, 12, 2003, 15, 4, 2005, 0, 'Погиб в бою, сражался насмерть', -1, 1, 2004, 'The hood shall be unbroken, covering the head, throat, chest and shoulders, except in the case of light coloured hooded varieties where a pale coloured throat and chest is permissible. The hood shall be continuous with the saddle spinal stripe which should extend down the spine to the tail, with as much of the tail as possible being coloured. The saddle width shall be a quarter to half an inch in length (nearer one quarter) – it must be as even as possible and unbroken. The edges of the hood and saddle shall be clear cut and devoid of brindling. The white area shall be pure and devoid of any yellowish tinge or staining.', '2020-11-08 20:12:12'),
(7, 'Мулька Шилохвост', 'Silver Black Berkshire Standard', -1, 3, 2004, 30, 10, 2005, 0, 'Воспаление легких', 1, 4, 2004, 'To be symmetrically marked, with as much white on the chest and belly as possible. The white shall not extend up the sides of the body; the edges shall be clear cut and devoid of brindling. Back feet to be white to the ankle, forelegs to be white to half the leg. Tail to be white to half its length. The body colour shall conform to the recognised colour variety. The white area shall be pure and devoid of any colour or staining. A white spot on the forehead is desirable. Suspenders to be allowed providing they are symmetrical.', '2020-11-08 20:13:54'),
(8, 'Джет Сильвер', 'Silver Black Self Standard', 16, 2, 2004, 13, 1, 2007, 0, 'Наелся порошка', 16, 2, 2004, 'To be a deep solid black, devoid of dinginess and white hairs or patches. Base fur to be black. Foot colour to match top. Eyes black.', '2020-11-08 20:15:46'),
(9, 'Тимофей Коломенский', 'Blue Berkshire Standard', -1, 3, 2005, 29, 8, 2007, 0, 'Утонил', -1, 8, 2005, 'To be symmetrically marked, with as much white on the chest and belly as possible. The white shall not extend up the sides of the body; the edges shall be clear cut and devoid of brindling. Back feet to be white to the ankle, forelegs to be white to half the leg. Tail to be white to half its length. The body colour shall conform to the recognised colour variety. The white area shall be pure and devoid of any colour or staining. A white spot on the forehead is desirable. Suspenders to be allowed providing they are symmetrical.', '2020-11-08 20:17:04'),
(10, 'Джонни Сильвер', 'Silver Black Self Standard', 22, 5, 2006, 7, 1, 2008, 0, 'Естественная смерть', -1, -1, -1, 'Faded or rusty color; mottling, mealiness or shading of color; light underparts; stray white hairs in the coat; tan hairs around the vent or behind the ears; white toenails.', '2020-11-08 20:18:54'),
(11, 'Ерофей Капунович Кондратьев', 'Black Huskey Standard', 14, 10, 2005, 13, 1, 2008, 0, 'Умер во сне', -1, -1, -1, 'A strikingly marked bi-colour variety, with roan colouration, symmetry and contrast being important impressions. Clearly distinct from existing marked varieties. Roans are born solid coloured, but from the age of about 4-6 weeks they start to exhibit roaning. This is a steady increase in the number of white hairs intermingled with the solid colour, starting with the face, sides and tail root on the juvenile, then working its way up to the nape of the neck with the moult. With each moult the rat becomes progressively lighter, the final effect not really complete until the rat is well into adulthood. The roan effect is most pronounced on the face, around the rump and the sides. Pattern: The Roan shall have as symmetrical markings as possible. The underside should be completely white.', '2020-11-08 20:21:15'),
(12, 'Маркус Раттус Цезарь Паллиатус', 'Agouti Hooded Standard', 17, 3, 2006, 5, 4, 2008, 0, 'Загрызан сенаторами', 1, 2, 2007, 'The hood shall be unbroken, covering the head, throat, chest and shoulders, except in the case of light coloured hooded varieties where a pale coloured throat and chest is permissible. The hood shall be continuous with the saddle spinal stripe which should extend down the spine to the tail, with as much of the tail as possible being coloured. The saddle width shall be a quarter to half an inch in length (nearer one quarter) – it must be as even as possible and unbroken. The edges of the hood and saddle shall be clear cut and devoid of brindling. The white area shall be pure and devoid of any yellowish tinge or staining.', '2020-11-08 20:22:54'),
(13, 'Партизан', 'Champagne Hooded Standard', -1, 2, 2007, 2, 6, 2008, 0, 'Застрелен фашистами', -1, -1, -1, 'A champagne hooded rat is much like an orange, red, or fawn hooded rat. While it can fall under the same general category with the quick glimpse, it is a VERY light color. It is so light that a difference is barely seen between the champagne and the white. It’s a very pretty color; and can be accompanied with red or ruby eyes. Rarely, you will see them with black eyes.', '2020-11-08 20:24:54'),
(14, 'Енисей Капунович Кондратьев', 'Blue Huskey Standard', 14, 10, 2005, 2, 6, 2008, 0, 'Спился', -1, -1, -1, 'A strikingly marked bi-colour variety, with roan colouration, symmetry and contrast being important impressions. Clearly distinct from existing marked varieties. Roans are born solid coloured, but from the age of about 4-6 weeks they start to exhibit roaning. This is a steady increase in the number of white hairs intermingled with the solid colour, starting with the face, sides and tail root on the juvenile, then working its way up to the nape of the neck with the moult. With each moult the rat becomes progressively lighter, the final effect not really complete until the rat is well into adulthood. The roan effect is most pronounced on the face, around the rump and the sides. Pattern: The Roan shall have as symmetrical markings as possible. The underside should be completely white.', '2020-11-08 20:27:42'),
(15, 'Сатир Верещагин', 'Black Irish Rex', 1, 5, 2008, 13, 4, 2009, 0, 'Сьеден кошаком', -1, -1, -1, 'A solid coloured rat with a white triangle on the chest, and white front feet.', '2020-11-08 20:30:09'),
(16, 'Сэр Харитон Постал', 'Blue Berkshire Standard', 4, 4, 2008, 12, 6, 2009, 0, '', -1, -1, -1, 'Blue Berkshire Standard', '2020-11-08 20:30:58'),
(17, 'Гаврик Астартович Малышок', 'выцветший Huskey Standard', -1, 12, 2007, 25, 6, 2009, 0, '', -1, -1, -1, 'выцветший Huskey Standard', '2020-11-08 20:31:40'),
(18, 'Эрик Янссон Рыжая Шкура из Домика Голубой Крысы', 'Amber Irish Standard', 12, 4, 2007, 20, 7, 2009, 0, '', -1, -1, -1, 'Эрик Янссон Рыжая Шкура из Домика Голубой Крысы', '2020-11-08 20:32:23'),
(19, 'Нагваль Никодим из Домика Голубой Крысы', 'Black недоSelf Standard', 18, 1, 2008, 16, 4, 2010, 0, '', -1, -1, -1, 'Нагваль Никодим из Домика Голубой Крысы', '2020-11-08 20:33:04'),
(20, 'дон Румата из Крыскиного Теремка', 'Agouti Hooded Standard', 24, 1, 2008, 12, 7, 2010, 0, '', -1, -1, -1, 'дон Румата из Крыскиного Теремка', '2020-11-08 20:33:39'),
(21, 'Виконт Маггот-Сосискин', 'Champagne self  Standard', -1, 6, 2008, 24, 9, 2010, 0, '', -1, -1, -1, 'Виконт Маггот-Сосискин', '2020-11-08 20:34:24'),
(22, 'Жоффруа Тори из Домика Голубой Крысы', 'Champagne Self Dumbo', 17, 5, 2009, 14, 12, 2010, 0, '', -1, -1, -1, 'Champagne Self Dumbo', '2020-11-08 20:35:05'),
(23, 'дон Рэба из Крыскиного Теремка', 'Agouti Berkshire Standard', 24, 1, 2008, 8, 5, 2011, 0, '', -1, -1, -1, 'Agouti Berkshire Standard', '2020-11-08 20:35:44'),
(24, 'Иннокентий Пасюкович Тихвинский', 'Agouti Self Standard, пасюк', -1, 9, 2009, 12, 9, 2011, 0, '', -1, -1, -1, 'Agouti Self Standard, пасюк', '2020-11-08 20:36:33'),
(25, 'Циклон Б из Эдема', 'Mink Self Rex Standart', 1, 5, 2010, 12, 7, 2012, 0, '', -1, -1, -1, 'Циклон Б из Эдема', '2020-11-08 20:37:05'),
(26, 'Сентябрь Первый-Крылечкин', 'Black self rex', 26, 7, 2009, 13, 8, 2012, 0, '', -1, -1, -1, 'Сентябрь Первый-Крылечкин', '2020-11-08 20:37:43'),
(27, 'Снежок Фуркацин', 'Albino self  Standard', -1, 7, 2011, 27, 11, 2012, 0, '', -1, -1, -1, 'Снежок Фуркацин', '2020-11-08 20:38:30'),
(28, 'Терабайт из Крыскиного Теремка', 'Agouti Irish Standard', 8, 5, 2010, 9, 2, 2013, 0, '', -1, -1, -1, 'Терабайт из Крыскиного Теремка', '2020-11-08 20:39:07'),
(29, 'Джон Ди из Раттус Перфектус', 'Agouti Self Standard, на 3/4 пасюк', 11, 7, 2011, 29, 8, 2013, 0, '', -1, -1, -1, 'Джон Ди из Раттус Перфектус', '2020-11-08 20:39:48'),
(30, 'Дюк Нюкем из Раттус Перфектус', 'Agouti Self Standard, на 3/4 пасюк', 11, 7, 2011, 9, 10, 2013, 0, '', -1, -1, -1, 'Дюк Нюкем из Раттус Перфектус', '2020-11-08 20:40:22'),
(31, 'Октябрь Семнадцатого', 'Black Self Velveteen', -1, 7, 2011, 11, 2, 2014, 0, '', -1, -1, -1, 'Октябрь Семнадцатого', '2020-11-08 20:40:52'),
(32, 'Митрофан Копчёный', 'Himalayan Rex', -1, 1, 2012, 9, 3, 2014, 0, '', -1, -1, -1, 'Himalayan Rex', '2020-11-08 20:41:37'),
(33, 'Аник Зефайтер', 'Champagne Self Standard', 1, 12, 2012, 17, 10, 2014, 0, '', -1, -1, -1, 'Аник Зефайтер', '2020-11-08 20:42:18'),
(34, 'Fox Hole Ozzy', 'Amber Berkshire Standard Velveteen', 27, 9, 2013, 26, 8, 2015, 0, '', -1, -1, -1, 'Fox Hole Ozzy', '2020-11-08 20:43:11'),
(35, 'дон Хенаро Флорес Кастанедыч Сибирский', 'Agouti Self Standard', 13, 8, 2014, 26, 2, 2016, 0, '', -1, -1, -1, 'дон Хенаро Флорес Кастанедыч Сибирский', '2020-11-08 20:43:46'),
(36, 'Ченрези Белый Махакала Сибирский', 'English Cinnamon Pearl Self Dumbo Standard', 1, 9, 2014, 10, 3, 2017, 0, '', -1, -1, -1, 'Ченрези Белый Махакала Сибирский', '2020-11-08 20:44:23'),
(37, 'Ыблис Ыбн Дьабло из Раттус Перфектус', 'Devil Irish Standard', 3, 3, 2017, 16, 7, 2017, 0, '', -1, -1, -1, 'Ыблис Ыбн Дьабло из Раттус Перфектус', '2020-11-08 20:45:12'),
(38, 'Параллакс из Раттус Перфектус', 'Agouti Self Standard', 19, 2, 2016, 30, 7, 2017, 0, '', -1, -1, -1, 'Параллакс из Раттус Перфектус', '2020-11-08 20:45:50'),
(39, 'Парацельс из Раттус Перфектус', ' Cinnamon Self Standard', 19, 2, 2016, 26, 6, 2018, 0, '', -1, -1, -1, 'Парацельс из Раттус Перфектус', '2020-11-08 20:46:21'),
(40, 'Индрик Зверь Сиамский из Вороньего Гнезда', 'Black Eyed Siamese Standard Dumbo', 2, 9, 2017, 24, 8, 2019, 0, '', -1, -1, -1, 'Индрик Зверь Сиамский из Вороньего Гнезда', '2020-11-08 20:47:03'),
(41, 'Харвестер Глазастый', 'Black Hooded Standard', 10, 8, 2017, 18, 6, 2020, 0, '', -1, -1, -1, 'Харвестер Глазастый', '2020-11-08 20:48:14'),
(42, 'Александр Пушкин', 'Mink Hooded Dumbo Standard', -1, 6, 2019, 18, 6, -1, 1, '', -1, -1, -1, 'Александр Пушкин', '2020-11-08 20:49:34'),
(43, 'Сергеич Пушкин', 'Agouti Berkshire Dumbo Standard', -1, 6, 2019, 18, 6, -1, 1, '', -1, -1, -1, 'Сергеич Пушкин', '2020-11-08 20:49:51'),
(44, 'Ганнибал Пушкин', 'Mink Hooded Dumbo Standard', -1, 6, 2019, 18, 6, -1, 1, '', -1, -1, -1, 'Ганнибал Пушкин', '2020-11-08 20:50:08'),
(45, 'Кроули Пушкин', 'Siamese Dumbo Standard', -1, 6, 2019, 18, 6, -1, 1, '', -1, -1, -1, 'Кроули Пушкин', '2020-11-08 20:50:22');

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
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT COMMENT 'Уникальный идентификатор фотографии.', AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `rats`
--
ALTER TABLE `rats`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT COMMENT 'Уникальный идентификатор крысы.', AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `rat_photo_ids`
--
ALTER TABLE `rat_photo_ids`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT COMMENT 'Уникальный идентификатор записи отношения крыса - фото.', AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
