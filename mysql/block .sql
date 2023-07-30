-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 11 2021 г., 10:35
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `block`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `aid` int NOT NULL,
  `adate` date NOT NULL,
  `atitle` varchar(255) NOT NULL,
  `atxt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`aid`, `adate`, `atitle`, `atxt`) VALUES
(1, '2021-11-08', 'Название статьи', 'Текст статьи. Lorem, ipsum dolor sit amet consectetur \r\n                        adipisicing elit. Optio maxime minus \r\n                        inventore, repudiandae harum quae \r\n                        fugit excepturi ipsum id nihil \r\n                        ipsa culpa dolorum molestiae rerum, \r\n                        repellendus sapiente eum non aliquid?\r\n                        Lorem, ipsum dolor sit amet consectetur \r\n                        adipisicing elit. Optio maxime minus \r\n                        inventore, repudiandae harum quae \r\n                        fugit excepturi ipsum id nihil \r\n                        ipsa culpa dolorum molestiae rerum, \r\n                        repellendus sapiente eum non aliquid?\r\n                        Lorem, ipsum dolor sit amet consectetur \r\n                        adipisicing elit. Optio maxime minus \r\n                        inventore, repudiandae harum quae \r\n                        fugit excepturi ipsum id nihil \r\n                        ipsa culpa dolorum molestiae rerum, \r\n                        repellendus sapiente eum non aliquid?\r\n                        Lorem, ipsum dolor sit amet consectetur \r\n                        adipisicing elit. Optio maxime minus \r\n                        inventore, repudiandae harum quae \r\n                        fugit excepturi ipsum id nihil \r\n                        ipsa culpa dolorum molestiae rerum, \r\n                        repellendus sapiente eum non aliquid?\r\n                        Lorem, ipsum dolor sit amet consectetur \r\n                        adipisicing elit. Optio maxime minus \r\n                        inventore, repudiandae harum quae \r\n                        fugit excepturi ipsum id nihil \r\n                        ipsa culpa dolorum molestiae rerum, \r\n                        repellendus sapiente eum non aliquid? '),
(2, '2021-11-09', 'Новая статья', 'VK открыла и развивает программы дополнительного IT-образования в пяти ведущих технических вузах России: Технопарк Mail.ru в МГТУ им. Н. Э. Баумана, Техносфера Mail.ru (ВМК МГУ), Технотрек Mail.ru (МФТИ), Технополис Mail.ru (СПбПУ) и Техноатом Mail.ru (МИФИ)[245][246].\r\n\r\nРазработано 67 дисциплин, которые ведут более 200 преподавателей — сотрудников компании. В год образовательные проекты VK охватывают около 2800 студентов. 442 выпускника успешно завершили курсы и работают в сфере IT. В среднем конкурс на поступление составляет девять человек на место.\r\n\r\nКомпания также развивает направление онлайн-обучения: на канале Технострим доступны бесплатные курсы по актуальным темам. Ежегодная аудитория составляет 50 000 человек. Уже 500 получили сертификат, выполнив итоговый проект. Также на канале доступно более 1100 часов образовательного видеоуроков, посвящённых Java, С/С++, базам данных, мобильной разработке, веб-технологиям, Linux, проектированию интерфейсов, безопасности и тестированию, управлению продуктом.\r\n\r\nVK принадлежит контрольная доля GeekBrains — образовательной онлайн-платформы для программистов[247].');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fam` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type_user` tinyint(1) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fam`, `name`, `type_user`, `login`, `pass`) VALUES
(1, 'Вушняков', 'Сергей', 1, 'sergey', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`aid`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `aid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
