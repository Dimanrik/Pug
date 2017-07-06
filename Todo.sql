-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 06 2017 г., 14:40
-- Версия сервера: 5.7.16
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Todo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `List_table`
--

CREATE TABLE `List_table` (
  `id` int(11) NOT NULL,
  `Title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `List_table`
--

INSERT INTO `List_table` (`id`, `Title`) VALUES
(95, 'вфыв');

-- --------------------------------------------------------

--
-- Структура таблицы `Record_table`
--

CREATE TABLE `Record_table` (
  `id` int(11) NOT NULL,
  `id_of_list` int(11) NOT NULL,
  `Record` text NOT NULL,
  `Checked` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Record_table`
--

INSERT INTO `Record_table` (`id`, `id_of_list`, `Record`, `Checked`) VALUES
(92, 95, 'dasdsa', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `List_table`
--
ALTER TABLE `List_table`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Record_table`
--
ALTER TABLE `Record_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `List_table`
--
ALTER TABLE `List_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT для таблицы `Record_table`
--
ALTER TABLE `Record_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
