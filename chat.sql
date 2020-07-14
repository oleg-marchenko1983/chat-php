-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 14 2020 г., 22:44
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `chat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `friends`
--

CREATE TABLE `friends` (
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `friends`
--

INSERT INTO `friends` (`user_1`, `user_2`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_id_komu` int(100) NOT NULL,
  `user_id_ot_kogo` int(100) NOT NULL,
  `text` varchar(255) CHARACTER SET utf8 NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `name`, `user_id_komu`, `user_id_ot_kogo`, `text`, `time`) VALUES
(1, 'Олег', 1, 3, 'Привет Юра', '2020-05-06 15:03:09'),
(3, 'Юра', 3, 1, 'Привет Олег', '2020-05-06 15:05:28'),
(7, 'Юра', 3, 1, 'Как у тебя дела?', '2020-05-06 15:05:28'),
(8, 'Олег', 1, 3, 'Нормально', '2020-05-06 15:03:09'),
(90, 'Олег', 2, 1, 'Привет', '2020-05-14 15:05:26'),
(128, '', 1, 100, ' 5555 ', '2020-05-14 23:35:37'),
(130, '', 2, 101, ' Тест ', '2020-05-14 23:38:43');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `photo` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(250) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `photo`, `phone`, `email`, `password`) VALUES
(1, 'Олег', '/img/user2.png', '555555', 'oleg@m', 'oleg'),
(2, 'Оля', '/img/user.png', '66666', 'olya@g', 'olya'),
(3, 'Юра', '/img/user3.png', '777777', 'yura@m\r\n', ''),
(101, 'Misha', '/img/user4.png', '', 'Misha@', 'misha');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `friends`
--
ALTER TABLE `friends`
  ADD UNIQUE KEY `user_1` (`user_1`,`user_2`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
