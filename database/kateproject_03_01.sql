-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.23 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных kateproject
DROP DATABASE IF EXISTS `kateproject`;
CREATE DATABASE IF NOT EXISTS `kateproject` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `kateproject`;


-- Дамп структуры для таблица kateproject.forms
DROP TABLE IF EXISTS `forms`;
CREATE TABLE IF NOT EXISTS `forms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` tinytext NOT NULL,
  `login` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `datereg` date NOT NULL,
  `lastvisit` datetime NOT NULL,
  `blockunblock` enum('unblock','block') NOT NULL DEFAULT 'unblock',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы kateproject.forms: ~13 rows (приблизительно)
DELETE FROM `forms`;
/*!40000 ALTER TABLE `forms` DISABLE KEYS */;
INSERT INTO `forms` (`id`, `email`, `login`, `password`, `datereg`, `lastvisit`, `blockunblock`) VALUES
	(1, 'petr@gmail.com', 'kate', 'DE890klm', '2015-12-09', '2015-12-09 09:54:23', 'unblock'),
	(2, 'kate@mail.ru', 'kate', '123', '2015-12-09', '2015-12-09 09:58:42', 'unblock'),
	(3, 'kate@mail.ru', 'kate', '123', '2015-12-09', '2015-12-09 10:03:29', 'unblock'),
	(4, 'kate@mail.ru', 'kate', '', '2015-12-09', '2015-12-09 10:06:51', 'unblock'),
	(5, 'kate@mail.ri', 'mmm', '123', '2015-12-09', '2015-12-09 10:22:18', 'unblock'),
	(6, 'new@tut.by', 'bbb', '123', '2015-12-09', '2015-12-09 10:23:44', 'unblock'),
	(7, 'pjkhjkhjketr@gmail.com', 'yuhjkhjkfiya@yandex.ru', '12', '2015-12-09', '2015-12-09 10:31:25', 'unblock'),
	(11, 'any@mail.ru', 'kotik0114@gmail.com', '11', '2015-12-09', '2015-12-09 11:20:51', 'unblock'),
	(12, 'qw@mail.ru', 'rrrr', '11', '2015-12-09', '2015-12-09 11:24:01', 'unblock'),
	(13, 'ty@mail.ru', 'yy', '22', '2015-12-09', '2015-12-09 11:27:47', 'unblock'),
	(14, 'erer@mail.ru', 'bbb', '33', '2015-12-09', '2015-12-09 11:30:48', 'unblock'),
	(15, 'pp@ya.ru', 'bon', '22', '2015-12-09', '2015-12-09 11:51:12', 'unblock'),
	(24, 'cahek_x@tut.by', 'hunter', '111', '2015-12-13', '2015-12-13 22:04:34', 'unblock');
/*!40000 ALTER TABLE `forms` ENABLE KEYS */;


-- Дамп структуры для таблица kateproject.maintexts
DROP TABLE IF EXISTS `maintexts`;
CREATE TABLE IF NOT EXISTS `maintexts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `body` text NOT NULL,
  `url` tinytext NOT NULL,
  `showhide` enum('show','hide') NOT NULL DEFAULT 'show',
  `lang` enum('ru','en') NOT NULL DEFAULT 'ru',
  `putdate` datetime NOT NULL,
  `active` enum('yes','no') NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы kateproject.maintexts: ~10 rows (приблизительно)
DELETE FROM `maintexts`;
/*!40000 ALTER TABLE `maintexts` DISABLE KEYS */;
INSERT INTO `maintexts` (`id`, `name`, `body`, `url`, `showhide`, `lang`, `putdate`, `active`) VALUES
	(1, 'Добро пожаловать на сайт!', 'Дорогие читатели, как давно знающие нашу газету, так и виртуальные, разрешите от имени редакции интернет-газеты "Сегодня и завтра" поприветствовать Вас на страницах нашего официального интернет-издания!\r\n<br>\r\nМы живем в век информационных технологий, когда оперативность и своевременность инфоции ценится так же высоко, как и ее достоверность, а аналитическая работа десятков журналистов облегчает труд многих людей: от студентов до политиков.\r\n<br>\r\nВ современном мире, где глобальные информационные потоки размывают национальные и государственные границы, а глобальные информационные сети, такие как интернет давно уже вышли из под контроля узкого круга лиц, – в таких условиях особо остро чувствуется необходимость чувства причастности ко всему происходящему.\r\n<br>\r\nСоциологи рассматривают это явление как проявления эмпатии, то есть сочувствия и сопереживания и относят к новым тенденциям информационного общества.\r\n<br>\r\nКаждый день с экранов телевизоров, со страниц газет и журналов, новостных лент интернета до нас доносятся новости со всех уголков света – обо всем понемногу, то есть, практически – не о чем. Чем более взаимосвязанным становится мир, чем важнее для жителя Минска или Новогрудка становятся события во Флориде или Брюсселе, - тем меньше времени остается для новостей местного масштаба.\r\n<br>\r\nИменно новости местного масштаба – в центре внимания газеты "Сегодня и завтра", и рассчитана она в первую очередь на жителей Беларуси, ведь иногда о том, что происходит в соседней стране мы знаем больше, чем о том, что происходит на соседней улице.\r\n<br>\r\n<br>\r\nС уважением,\r\n<br>\r\nредакция газеты "Сегодня и завтра".', 'index', 'show', 'ru', '2015-12-04 00:00:00', 'yes'),
	(2, 'Контакты', 'Главный редактор - Иванов Иван Иванович, тел. +37529 111 22 33<br/>\r\nЗаместитель главного редактора - Семенова Ирина Васильевна, тел. +37529 222 44 88, e-mail: irina_gaz@mail.ru<br/>\r\n Секретарь - Алексеенко Варвара Сергеевна, тел. +37529 666 77 22, e-mail: segodnya_zavtra@mail.ru\r\n', 'contacts', 'show', 'ru', '2015-12-04 00:00:00', 'yes'),
	(3, 'О газете', 'Газета "Сегодня и завтра" была создана в 2012 году.<br/>\r\nИнтернет-газета "Сегодня и завтра" — некоммерческая организация, юридическое лицо, созданное собственником для осуществления социально-культурных функций через электронную газету, которая финансируются за счет собственных средств.<br/>\r\nЦелью создания интернет-газеты является распространение правдивой, объективной информации о событиях в мире, республике, областях, районах, о деятельности государственных органов, общественных объединений, о политической, экономической, культурной жизни, социальной сфере, состоянии окружающей среды; пропаганда идеалов  добра, справедливости, свободы, духовного и культурного возрождения белорусского народа.<br/>\r\n', 'about', 'show', 'ru', '2015-12-04 00:00:00', 'yes'),
	(4, 'Наши журналисты', 'Андрей Петрович ГЛАЗУНОВ, редактор отдела политической и социальной информации<br/>\r\nТатьяна Сергеевна ДОЦЕНКО, редактор отдела научной и экономической информации<br/>\r\nРуслана Геннадьевна БАБЫНИНА, редактор отдела региональной информации<br/>\r\nВиктория Николаевна ВАРАВИНА, ответственный секретарь<br/>', 'zhurnalisty', 'show', 'ru', '2015-12-04 00:00:00', 'yes'),
	(5, 'Наши партнеры', 'Газета "Аргументы и факты"<br/>\r\n<a href="tut.by">Интернет-портал TUT.by</a><br/>\r\nИнформационное агентство <a href="belta.by">"БелТА"</a>', 'partners', 'show', 'ru', '2015-12-04 00:00:00', 'yes'),
	(6, 'Наши достижения', 'Участник конкурса "Золотая литера" (2014 год)', 'dostizheniya', 'show', 'ru', '2015-12-04 00:00:00', 'yes'),
	(7, 'Справочная информация', 'Если Вы хотите рассказать интересную новость или у Вас есть идеи, как улучшить нашу интернет-газету, отправляйте свои идеи на электронную почту <a href="mailto:purum_p91@mail.ru">purum_p91@mail.ru</a>', 'spravka', 'show', 'ru', '2015-12-04 00:00:00', 'yes'),
	(8, 'Спасибо', 'Регистрация прошла успешно', 'thankyoupage', 'show', 'ru', '0000-00-00 00:00:00', 'no'),
	(9, 'Спасибо!', 'Авторизация прошла успешно! Теперь Вы можете войти в <a href="cabinet.php">личный кабинет</a>', 'authgood', 'show', 'ru', '2015-12-14 00:00:00', 'no'),
	(11, 'Статьи наших читателей', 'Дорогие читатели! Вы можете отправить свою новость в нашу газету, мы ее обязательно разместим', 'news-users', 'show', 'ru', '2015-12-14 00:00:00', 'no');
/*!40000 ALTER TABLE `maintexts` ENABLE KEYS */;


-- Дамп структуры для таблица kateproject.news
DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` tinytext NOT NULL,
  `editor1` longtext NOT NULL,
  `add_date` datetime NOT NULL,
  `block_unblock` enum('block','unblock') NOT NULL DEFAULT 'unblock',
  `update1` datetime DEFAULT NULL,
  `files1` tinytext,
  `show_hide` enum('show','hide') NOT NULL DEFAULT 'show',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы kateproject.news: ~11 rows (приблизительно)
DELETE FROM `news`;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `user_id`, `title`, `editor1`, `add_date`, `block_unblock`, `update1`, `files1`, `show_hide`) VALUES
	(9, 2, 'Новость 12', '<p>олололололо</p>\r\n', '2015-12-16 09:00:48', 'unblock', '2015-12-23 09:09:32', NULL, 'hide'),
	(10, 2, 'Тестовая новость на 18.12', '<p>Моя тестовая новость!</p>\r\n', '2015-12-18 10:05:47', 'unblock', '2015-12-27 21:37:33', '15_12_18_11_05_47.jpg', 'hide'),
	(11, 2, '1234', '<p>5678</p>\r\n', '2015-12-18 10:44:45', 'unblock', '2015-12-22 23:33:39', '15_12_18_11_44_45.jpg', 'hide'),
	(13, 2, 'катина новость 2', '<p>1111111111111111</p>\r\n', '2015-12-18 11:21:11', 'unblock', '2015-12-22 23:33:42', '15_12_18_12_21_11.jpg', 'hide'),
	(14, 2, 'новость 3', '<p>ммммм</p>\r\n', '2015-12-18 11:22:25', 'unblock', '2015-12-22 23:33:44', '15_12_18_12_22_25.jpg', 'show'),
	(16, 24, 'новость от кати', '<p>катина новость</p>\r\n', '2015-12-19 18:14:45', 'unblock', NULL, '15_12_19_07_14_45.txt', 'show'),
	(22, 24, 'саша огурец', '<p>катя мол</p>\r\n', '2015-12-19 20:03:46', 'unblock', NULL, '15.12.19.09.03.46.jpg', 'show'),
	(23, 5, 'Тестовая новость', '<p>asdf</p>\r\n', '2015-12-19 20:05:45', 'unblock', NULL, '15.12.19.09.05.45.jpg', 'show'),
	(25, 2, '333', '<p>44444444</p>\r\n', '2015-12-22 21:09:43', 'unblock', NULL, '', 'hide'),
	(26, 2, '4444', '<p>5555</p>\r\n', '2015-12-22 21:10:06', 'unblock', NULL, '', 'hide'),
	(38, 2, 'мультиселект3', '<p>ПИНГ! Дорогие читатели, как давно знающие нашу газету, так и виртуальные, разрешите от имени редакции интернет-газеты &quot;Сегодня и завтра&quot; поприветствовать Вас на страницах нашего официального интернет-издания! Мы живем в век информационных технологий, когда оперативность и своевременность инфоции ценится так же высоко, как и ее достоверность, а аналитическая работа десятков журналистов облегчает труд многих людей: от студентов до политиков.</p>\r\n', '2015-12-27 22:52:36', 'unblock', '2015-12-28 11:21:06', '15.12.27.11.52.36_0.jpg;15.12.27.11.52.36_1.jpg;15.12.27.11.52.36_2.jpg;15.12.27.11.52.36_3.jpg;15.12.27.11.52.36_4.jpg;15.12.27.11.52.36_5.jpg;', 'show');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;


-- Дамп структуры для таблица kateproject.notice
DROP TABLE IF EXISTS `notice`;
CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned zerofill DEFAULT NULL,
  `categoria` text,
  `small_desc` mediumtext,
  `medium_desc` mediumtext,
  `price` tinytext,
  `contacts` text,
  `show_hide` enum('show','hide') NOT NULL DEFAULT 'show',
  `add_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы kateproject.notice: ~0 rows (приблизительно)
DELETE FROM `notice`;
/*!40000 ALTER TABLE `notice` DISABLE KEYS */;
INSERT INTO `notice` (`id`, `user_id`, `categoria`, `small_desc`, `medium_desc`, `price`, `contacts`, `show_hide`, `add_time`) VALUES
	(4, 0000000002, 'Техника', 'Куплю моб.телефон Alcatel', 'Куплю мобильный телефон Alcatel на запчасти', 'договорная', 'Александр Иванович', 'show', '2016-01-03 21:37:08');
/*!40000 ALTER TABLE `notice` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
