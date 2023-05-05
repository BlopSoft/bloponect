-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 05 2023 г., 19:44
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `onect`
--

-- --------------------------------------------------------

--
-- Структура таблицы `banlist`
--

CREATE TABLE `banlist` (
  `id` int(16) NOT NULL COMMENT 'Id Забаненного',
  `ipad` varchar(64) NOT NULL COMMENT 'IP Забанненого',
  `bantype` int(11) NOT NULL DEFAULT 1 COMMENT 'Тип Бана',
  `banwhat` text NOT NULL DEFAULT 'Подозрения' COMMENT 'Причина бана'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `chat`
--

CREATE TABLE `chat` (
  `id` int(10) NOT NULL,
  `title` varchar(32) NOT NULL,
  `descr` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `messeg`
--

CREATE TABLE `messeg` (
  `name` varchar(32) NOT NULL,
  `idchat` int(11) NOT NULL DEFAULT 1,
  `msgtxt` varchar(1024) NOT NULL,
  `msgdata` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'ID пользователя',
  `username` varchar(32) NOT NULL COMMENT 'Ник пользователя',
  `gifstat` varchar(128) NOT NULL DEFAULT '',
  `descr` varchar(192) DEFAULT NULL,
  `devices` longtext NOT NULL DEFAULT '{"firstdev":"","twodev":"","threedev":"","fourdev":"","fivedev":""}' COMMENT 'Устройства Пользователя',
  `email` varchar(319) NOT NULL COMMENT 'Email пользователя',
  `pass` varchar(128) NOT NULL COMMENT 'Пароль пользователя',
  `ipad` varchar(64) NOT NULL COMMENT 'IP-адресс пользователя',
  `isverifed` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Галочка у пользователя',
  `idban` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Бан пользователя'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID пользователя';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
