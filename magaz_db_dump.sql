-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 26 2018 г., 22:32
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
  `sort_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`) VALUES
(10, 'Блоки питания', 2),
(11, 'Материнские платы', 1),
(12, 'Процессоры', 3),
(13, 'Оперативная память', 4),
(14, 'ПЗУ', 5),
(15, 'Видеокарты', 15),
(16, 'Корпуса', 16),
(17, 'Мониторы', 17),
(18, 'Клавиатуры', 17),
(19, 'Мыши', 18);

-- --------------------------------------------------------

--
-- Структура таблицы `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_number` varchar(15) NOT NULL,
  `comment` text,
  `products` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_products`
--

INSERT INTO `order_products` (`id`, `user_id`, `user_name`, `user_number`, `comment`, `products`, `date`, `status`) VALUES
(4, 2, 'Lesha Erzikov', '+375 29 708 75 ', '', '{\"33\":6,\"32\":3,\"31\":2}', '2018-04-24 20:30:06', 0),
(5, 2, 'Lesha Erzikov', '+375 29 708 75 ', '', '{\"29\":1,\"28\":1,\"30\":1,\"32\":4,\"33\":2}', '2018-04-24 20:30:54', 0),
(6, 2, 'Lesha Erzikov', '+375 29 708 75 ', '', '{\"32\":2,\"31\":2,\"29\":2,\"28\":2}', '2018-04-24 20:31:04', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `avability` tinyint(1) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '0',
  `is_recommended` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `price`, `avability`, `brand`, `description`, `is_new`, `is_recommended`) VALUES
(13, 'AeroCool Kcas 500W', 10, 123.00, 1, 'AeroCool', 'активная PFC, КПД 85%, бронзовый сертификат, вентилятор 1x120 мм, 12V 37 А', 1, 1),
(14, 'AeroCool Kcas 700W', 10, 321.00, 1, 'AeroCool', 'активная PFC, КПД 85%, бронзовый сертификат, вентилятор 1x120 мм, 12V 53 А', 0, 0),
(15, 'Corsair RM650x', 10, 333.00, 1, 'Corsair', 'активная PFC, КПД 90%, золотой сертификат, вентилятор 1x135 мм, модульные кабели, 12V 54 А', 1, 1),
(16, 'AeroCool VX-550W', 1, 654.00, 1, 'AeroCool', 'вентилятор 1x120 мм, 12V 42 А', 0, 0),
(17, 'Xilence Redwing R7 500W', 10, 321.00, 1, 'Xilence', 'вентилятор 1x120 мм', 0, 0),
(18, 'Материнская плата Gigabyte Z370P D3 (rev. 1.0)', 11, 761.00, 1, 'Gigabyte', 'ATX, сокет Intel LGA1151 v2, чипсет Intel Z370, память 4xDDR4, слоты: 3xPCIe x16, 3xPCIe x1', 0, 0),
(19, 'ASUS Prime B350-Plus', 11, 432.00, 1, 'ASUS ', 'ATX, сокет AMD AM4, чипсет AMD B350, память 4xDDR4, слоты: 2xPCIe x16, 2xPCIe x1, 2xPCI', 0, 0),
(20, 'ASUS M5A97 R2.0', 11, 432.00, 1, 'ASUS ', 'ATX, сокет AMD AM3/AM3+, чипсет AMD 970 + SB950, память 4xDDR3, слоты: 2xPCIe x16, 2xPCIe x1, 2xPCI', 0, 0),
(21, 'MSI Z370 Gaming Plus', 11, 932.00, 1, 'MSI ', 'ATX, сокет Intel LGA1151 v2, чипсет Intel Z370, память 4xDDR4, слоты: 2xPCIe x16, 4xPCIe x1', 0, 1),
(22, 'ASRock Z370 Pro4', 11, 321.00, 1, 'ASRock ', 'ATX, сокет Intel LGA1151 v2, чипсет Intel Z370, память 4xDDR4, слоты: 2xPCIe x16, 3xPCIe x1, 1xPCI', 0, 0),
(23, 'Intel Core i5-8400', 12, 432.00, 1, 'Intel ', 'Coffee Lake, LGA1151 v2, 6 ядер, частота 4/2.8 ГГц, кэш 9 Мб, техпроцесс 14 нм, TDP 65W', 0, 0),
(24, 'Intel Core i7-8700K', 12, 765.00, 1, 'Intel ', 'Coffee Lake, LGA1151 v2, 6 ядер, частота 4.7/3.7 ГГц, кэш 12 Мб, техпроцесс 14 нм, TDP 95W', 0, 0),
(25, 'AMD Ryzen 3 2200G (BOX)', 12, 654.00, 1, 'AMD ', 'Raven Ridge, AM4, 4 ядра, частота 3.7/3.5 ГГц, кэш 2 Мб + 4 Мб, техпроцесс 14 нм, TDP 65W', 0, 0),
(26, 'Intel Core i3-8100', 12, 312.00, 1, 'Intel ', 'Coffee Lake, LGA1151 v2, 4 ядра, частота 3.6 ГГц, кэш 6 Мб, техпроцесс 14 нм, TDP 65W', 0, 0),
(27, 'AMD Ryzen 5 1600 (BOX)', 12, 751.00, 1, 'AMD ', 'Summit Ridge, AM4, 6 ядер, частота 3.6/3.2 ГГц, кэш 3 Мб + 16 Мб, техпроцесс 14 нм, TDP 65W', 0, 0),
(28, 'Intel Core i9-7980XE Extreme Edition (BOX)', 12, 999.00, 1, 'Intel ', 'Skylake-X, LGA2066, 18 ядер, частота 4.2/2.6 ГГц, кэш 25 Мб, TDP 165W', 0, 0),
(29, 'Samsung 8GB DDR4 PC4-19200', 13, 32.00, 1, 'Samsung ', '1 модуль, частота 2400 МГц, CL 17T, тайминги 17-17-17, напряжение 1.2 В', 0, 0),
(30, 'Kingston 8GB DDR3 PC3-10600', 13, 43.00, 1, 'Kingston ', '1 модуль, частота 1333 МГц, напряжение 1.35 В', 0, 1),
(31, 'HyperX Fury 8GB DDR4 PC4-19200 HX424C15FB2/8', 13, 54.00, 1, 'HyperX', '1 модуль, частота 2400 МГц, CL 15T, тайминги 15-15-15, напряжение 1.2 В', 0, 1),
(32, 'Corsair Vengeance LPX 2x8GB DDR4', 13, 67.00, 1, 'Corsair ', '2 модуля, частота 3000 МГц, CL 15T, тайминги 15-17-17-35, напряжение 1.35 В', 1, 0),
(33, 'G.Skill Aegis 2x8GB DDR4', 13, 55.00, 1, 'G.Skill', '2 модуля, частота 3000 МГц, CL 16T, тайминги 16-18-18-38, напряжение 1.35 В', 1, 1),
(34, 'SSD Samsung 850 Evo 250GB', 14, 432.00, 1, 'Samsung ', '2.5\", SATA 3.0, контроллер Samsung MGX, микросхемы 3D TLC NAND, последовательный доступ: 540/520 MBps, случайный доступ: 97000/88000 IOps', 1, 1),
(35, 'SSD Kingston A400 120GB', 14, 543.00, 1, 'Kingston ', '2.5\", SATA 3.0, контроллер Phison PS3111-S11, микросхемы TLC, последовательный доступ: 500/320 MBps', 1, 0),
(36, 'SSD Silicon-Power Slim S55 120GB', 14, 321.00, 1, 'Silicon-Power', '2.5\", SATA 3.0, контроллер Phison PS3111-S11, микросхемы 3D TLC NAND, последовательный доступ: 550/420 MBps', 0, 1),
(37, 'WD Caviar Blue 1TB', 14, 213.00, 1, 'Western Digital', '3.5\", SATA 3.0 (6Gbps), 7200 об/мин, буфер 64 МБ, линейная скорость 150/150 МБ/с', 1, 1),
(38, 'Seagate BarraCuda 1TB', 14, 431.00, 1, 'Seagate ', '3.5\", SATA 3.0 (6Gbps), 7200 об/мин, буфер 64 М', 0, 0),
(39, 'Toshiba P300 1TB', 14, 633.00, 1, 'Toshiba ', '3.5\", SATA 3.0 (6Gbps), 7200 об/мин, буфер 64 МБ', 0, 1),
(40, 'MSI Geforce GTX 1050 Ti Gaming X', 15, 876.00, 1, 'MSI', 'Видеокарта MSI Geforce GTX 1050 TI Gaming X 4GB GDDR5 способна работать в трех разных режимах:\r\n Gaming Mode, OC Mode и Silent Mode. Gaming Mode активирован по умолчанию. OC Mode предполагает \r\nследующие частоты графического процессора: 1379 МГц (базовая) и 1493 МГц (\"turbo\").\r\n Silent Mode - 1290 МГц (базовая) и 1392 МГц (\"turbo\").', 1, 0),
(41, 'Palit GeForce GTX 1060 JetStream', 15, 765.00, 1, 'Palit', 'частота ядра 1506 МГц/1708 МГц, 1280sp, частота памяти 2000 МГц, 192 бит, 6 pin, 2.5 слота, DVI, HDMI, DisplayPort', 1, 1),
(42, 'ASUS GeForce GTX 1060', 15, 657.00, 1, 'ASUS', 'частота ядра 1569 МГц/1785 МГц, 1280sp, частота памяти 2002 МГц, 192 бит, 6 pin, 2 слота, DVI, HDMI, DisplayPort', 0, 0),
(43, 'Gigabyte GeForce GTX 1080 Xtreme', 15, 654.00, 1, 'Gigabyte', 'Компания GIGABYTE представила свою топовую игровую видеокарту – GIGABYTE GeForce GTX 1080 Xtreme Gaming Premium Pack,\r\nкоторая обязательно понравится желающим создать систему под VR. Дело в том, что в комплект ее поставки входит\r\n5,25-дюймовая фронтальная панель Xtreme VR Link на которой расположились два порта HDMI и два USB 3.0. Подключив ее\r\nк внутреннему интерфейсу HDMI самой видеокарты, пользователь получает возможность удобно подсоединять шлем VR к фронтальной\r\nпанели корпуса. Также в комплект поставки входит мостик Xtreme SLI с подсвечиваемым логотипом.', 0, 1),
(44, 'Zalman N2', 16, 43.00, 1, 'Zalman ', 'без блока питания, Tower, для плат ATX/micro-ATX/mini-ITX, блок питания снизу, 3 вентилятора, 2xUSB 2.0, 1xUSB 3.0, цвет черный', 0, 0),
(45, 'Zalman Z9 Neo Plus (белый)', 16, 32.00, 1, 'Zalman ', 'без блока питания, геймерский, Tower, для плат ATX/micro-ATX/mini-ITX, блок питания снизу, 5 вентиляторов, 2xUSB 2.0, 2xUSB 3.0, цвет белый', 1, 1),
(46, 'AeroCool Cylon', 16, 65.00, 1, 'AeroCool ', 'без блока питания, геймерский, Tower, для плат ATX/micro-ATX/mini-ITX, блок питания снизу, 1 вентилятор, 2xUSB 2.0, 1xUSB 3.0, цвет черный', 0, 0),
(47, 'Zalman N3', 16, 65.00, 1, 'Zalman ', 'без блока питания, геймерский, Tower, для плат ATX/micro-ATX/mini-ITX, блок питания снизу, 3 вентилятора, реобас, 2xUSB 2.0, 1xUSB 3.0, цвет черный', 0, 1),
(48, 'Zalman ZM-T3', 16, 87.00, 1, 'Zalman ', 'без блока питания, Tower, для плат micro-ATX/mini-ITX, блок питания снизу, 1 вентилятор, 1xUSB 2.0, 1xUSB 3.0, цвет черный', 1, 0),
(49, 'LG 24MP88HV-S', 17, 156.00, 1, 'LG', '23.8\'\', 16:9, 1920x1080, IPS, 60 Гц, динамики, интерфейсы HDMI+D-Sub (VGA)', 1, 0),
(50, 'BenQ EW2775ZH', 17, 204.00, 1, 'BenQ', '27\", 16:9, 1920x1080, VA, 75 Гц, динамики, интерфейсы HDMI+D-Sub (VGA)', 1, 1),
(51, 'LG 24MK430H-B', 17, 300.00, 1, 'LG', '23.8\'\', 16:9, 1920x1080, IPS, 75 Гц, FreeSync, интерфейсы HDMI+D-Sub (VGA)', 1, 0),
(52, 'Dell U2518D', 17, 165.00, 1, 'Dell', '25\", 16:9, 2560x1440, IPS, 60 Гц, интерфейсы HDMI+DisplayPort+Mini DisplayPort', 0, 1),
(53, 'SteelSeries Apex 100', 18, 42.00, 1, 'SteelSeries ', 'игровая для ПК, USB, подсветка, цвет черный', 1, 1),
(54, 'Logitech Wireless Touch Keyboard K400 Plus Black', 18, 77.00, 1, 'Logitech ', 'компактная для ПК/для устройств Android/для планшетов Windows/для телевизоров Smart TV, радио, цвет черный', 0, 0),
(55, 'HyperX Alloy FPS Pro Cherry MX Red', 18, 55.00, 1, 'HyperX ', 'игровая механическая для ПК, Cherry MX Red, USB, подсветка, цвет черный', 1, 0),
(56, 'Logitech Corded Keyboard K280e', 18, 87.00, 1, 'Logitech ', 'стандартная для ПК, USB, влагозащита, цвет черный', 0, 0),
(57, 'Logitech G102 Prodigy', 19, 15.00, 1, 'Logitech ', 'полноразмерная игровая мышь для ПК, проводная, USB, сенсор оптический 8000 dpi, 6 кнопок, колесо с нажатием, цвет черный', 1, 1),
(58, 'HyperX Pulsefire FPS', 19, 27.00, 1, 'HyperX ', 'полноразмерная игровая мышь для ПК, проводная, USB, сенсор оптический 3200 dpi, 6 кнопок, колесо с нажатием, цвет черный', 1, 1),
(59, 'A4Tech Bloody V7', 19, 11.00, 1, 'A4Tech ', 'полноразмерная игровая мышь для ПК, проводная, USB, сенсор оптический 3200 dpi, 8 кнопок, колесо с нажатием, цвет черный', 0, 0),
(60, 'Logitech M170 Wireless Mouse Gray/Black', 19, 5.00, 1, 'Logitech ', 'ноутбучная мышь для ПК, радио, сенсор оптический, 3 кнопки, колесо с нажатием, цвет черный/серый', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(20) DEFAULT NULL,
  `cart` text,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `number`, `cart`, `admin`) VALUES
(2, 'Lesha Erzikov', '$2y$10$zjKIxVxbQ8B1zgxGhmwlJuiFWecJJ0M.rsnJ4zje806MZUG5zN4Ya', 'lesha-pes@lol.com', '+375 29 708 75 23', NULL, 1),
(10, 'TestUser1', '$2y$10$5PuqTpA.w359/tcgX4ZK6.8rfqUBGlbj8mApPzLoAOmVk1zq2qK0S', 'test1@exepm.com', NULL, NULL, 0),
(15, 'TestUser6', '$2y$10$ZShi1h/CaKJ/l.Nh.svCnuM/p.rm3M3NuADx1/si2tK5ih16UbiPq', 'testuser6@test.com', '123123', NULL, 0);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
