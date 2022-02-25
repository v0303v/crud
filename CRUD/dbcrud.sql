-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 25 2022 г., 10:00
-- Версия сервера: 10.3.29-MariaDB-log
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dbcrud`
--

-- --------------------------------------------------------

--
-- Структура таблицы `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `extensions` varchar(100) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `data`
--

INSERT INTO `data` (`id`, `fname`, `lname`, `extensions`, `file_name`, `created_at`) VALUES
(1, 'sdfsdf', 'sdfsdfsdf', 'sdfsdf', 'sdfsdf', '2022-02-16 05:15:31'),
(19, 'fgjgh', 'hgj', 'gif', '', '2022-02-16 07:04:02'),
(37, 'bvsdfbn', 'xcv', '', '', '2022-02-16 12:55:55'),
(39, 'ssdfsd', 'sdfsdf', '', 'square.png', '2022-02-16 13:23:01'),
(41, 'pepega', 'pepega', 'png', 'ffffuilenama', '2022-02-23 11:58:10'),
(42, '234234', '234234', NULL, NULL, '2022-02-24 09:35:36'),
(54, 'ptptpret', 'DFHLSfrh', NULL, NULL, '2022-02-24 11:10:03'),
(59, 'nweknv', 'klsdfgklwsejhg', NULL, NULL, '2022-02-24 12:02:37'),
(68, '879786', '313sdg sdg', NULL, NULL, '2022-02-25 06:52:36'),
(69, '879786', '313sdg sdg', NULL, NULL, '2022-02-25 06:57:35');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
