-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 31 2018 г., 20:56
-- Версия сервера: 10.1.26-MariaDB
-- Версия PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `magaz`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`, `status`) VALUES
(1, 'Рубашки', 1, 1),
(2, 'Платья', 5, 1),
(3, 'Футболки', 3, 1),
(4, 'Майки', 4, 1),
(5, 'Сумки', 2, 1),
(6, 'Чемоданы', 6, 1),
(7, 'Брюки', 7, 1),
(8, 'Штаны', 8, 1),
(9, 'Галстуки', 9, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_number` varchar(15) NOT NULL,
  `comment` text,
  `products` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_products`
--

INSERT INTO `order_products` (`id`, `user_name`, `user_number`, `comment`, `products`, `date`, `status`) VALUES
(1, 'test', 'test', 'test', 'test', '2018-01-27 16:12:03', 0),
(2, 'Василий', '+123321123', 'Комментарий к заказу', '{\"13\":6,\"12\":5,\"11\":7}', '2018-01-27 16:19:17', 0),
(3, 'Екатерина', '+123123123', 'Привет', '{\"13\":6,\"12\":5,\"11\":7}', '2018-01-27 16:20:00', 0),
(4, 'Сергей', '123123123', '', '{\"13\":3,\"11\":3,\"12\":2}', '2018-01-27 16:26:20', 0),
(5, 'Tester', '123123123', 'i\'m a tester', '{\"13\":3,\"12\":4,\"11\":4}', '2018-01-27 19:18:35', 0),
(6, 'Lesha Erzikov', '+375 29 708 75 ', 'после 9.00', '{\"13\":2,\"10\":2,\"9\":2,\"8\":2,\"11\":2,\"12\":2,\"5\":4}', '2018-01-27 19:19:34', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `avability` tinyint(1) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '0',
  `is_recommended` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `code`, `price`, `avability`, `brand`, `image`, `description`, `is_new`, `is_recommended`, `status`) VALUES
(1, 'Рубашка синяя', 1, 1, 99.99, 0, 'COOLBrand', '/', 'Описание синией рубашки', 0, 1, 0),
(2, 'Рубашка красня', 1, 2, 92.50, 0, 'COOLBrand', '/', 'Описание красной рубашки', 1, 0, 1),
(3, 'Рубашка зелёная', 1, 2, 92.50, 0, 'COOLBrand', '', 'ОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписание ', 0, 0, 1),
(4, 'Платье зелёное', 2, 11, 123.00, 0, 'SistersBrand', '/', 'ОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписание', 1, 1, 1),
(5, 'Футболка спортивная', 3, 1123, 32.60, 0, 'SistersBrand', '/', 'ОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписание ', 0, 0, 1),
(6, 'Майка летняя', 4, 23, 95.60, 0, 'SistersBrand', '/', 'ОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписание ', 0, 0, 1),
(7, 'Сумка спортивная', 5, 202, 43.60, 0, 'SistersBrand', '/', 'ОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписание ', 0, 0, 1),
(8, 'Чемодан походный', 6, 3202, 62.50, 0, 'BROBrand', '/', 'ОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписание ', 1, 1, 1),
(9, 'Брюки школьные', 7, 560, 35.00, 0, 'BROBrand', '/', 'ОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписание ', 1, 0, 1),
(10, 'Штаны домашние', 8, 7602, 145.50, 0, 'BROBrand', '/', 'ОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписание ', 0, 0, 1),
(11, 'Галстук чёрный', 9, 122, 942.00, 0, 'lolBrand', '/', 'ОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписание ', 1, 1, 1),
(12, 'Рубашка в клетку', 1, 6702, 324.50, 0, 'lolBrand', '/', 'ОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписаниеОписание ', 0, 0, 1),
(13, 'Рубашка школьная', 1, 650, 23.30, 0, 'lolBrand', '/', 'ОписаниеОписаниеОписаниеОписаниеОписание ОписаниеОписаниеОписаниеОписаниеОписание', 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `order_products` text,
  `number` varchar(20) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `order_products`, `number`, `admin`) VALUES
(2, 'Lesha Erzikov', 'lesha-pes@lol.com', '$2y$10$zjKIxVxbQ8B1zgxGhmwlJuiFWecJJ0M.rsnJ4zje806MZUG5zN4Ya', '{\"12\":4}', '+375 29 708 75 23', 1),
(3, 'TestUser', 'test@user.lol', '$2y$10$uqgoyvKQd6e1/bpIGy210.C7zFZUOWXstc9fwzkTQD5Od.EQlfAYa', NULL, NULL, 0),
(5, 'TestUser', 'testuser@test.com', '$2y$10$3nRyZm.AOhR384drGK3ngOT7asW0KCsgs.kkjB1RjNTvlgc0M0RUi', NULL, NULL, 0),
(6, 'TestUser2', 'testuser2@test.com', '$2y$10$1sjYGLMfvqtVoq1RLvZnKOTQQiYwn6I8bJlyXBzMT.uNgeGnkC11S', '[]', NULL, 0),
(7, 'TestUser3', 'testuser3@test.com', '$2y$10$nofeEu9uqDuzHkFkwJX1oeTa6UvnsaxAuFZN7Z3tKVi12Uyv6t.36', NULL, NULL, 0),
(8, 'TestUser4', 'testuser4@test.com', '$2y$10$9T054PCoTEL0ru4QniGy4.VpSKtjVLc38ClJtNwqHZBS9lgVm8kTq', NULL, NULL, 0),
(9, 'TestUser5', 'testuser5@test.com', '$2y$10$M3U62QGaeA02bO5D7ecis.IC6oLAQq3bSsCQDzSKxzImspq67YCPy', NULL, NULL, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
