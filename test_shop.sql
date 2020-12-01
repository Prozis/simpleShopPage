-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 01 2020 г., 18:42
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `category_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'DVD'),
(2, 'Book'),
(3, 'Furniture');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `sku` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` float NOT NULL,
  `category_id` int NOT NULL,
  `options` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `sku`, `name`, `price`, `category_id`, `options`) VALUES
(6, 'SLWE', 'Bar', 100, 2, '{\"weight\":\"3\"}'),
(8, 'JVC30234', 'AcmeDISC', 20, 1, '{\"size\":\"700\"}'),
(9, 'JVC30235', 'AcmeDISC', 14, 1, '{\"size\":\"700\"}'),
(10, 'SKU34923', 'AcmeDISC', 20.2, 1, '{\"size\":\"700\"}'),
(11, 'SJY32344', 'AcmeDISC', 15.55, 1, '{\"size\":\"700\"}'),
(12, 'JD3234', 'AcmeDISC', 10.5, 1, '{\"size\":\"750\"}'),
(17, 'Price123', 'TTTT', 12.2, 1, '{\"size\":\"2\"}'),
(19, 'GGWP00007', 'Chair', 40, 3, '{\"height\":\"24\",\"width\":\"45\",\"lenght\":\"15\"}'),
(20, 'GGWP00008', 'Chair', 42.99, 3, '{\"height\":\"25\",\"width\":\"46\",\"lenght\":\"17\"}'),
(21, 'TR120555', 'War and Peace', 20, 2, '{\"weight\":\"2\"}'),
(22, 'TP120556', 'War and Peace', 45, 2, '{\"weight\":\"1\"}'),
(24, 'GGWP00009', 'Chair', 21, 3, '{\"height\":\"33\",\"width\":\"22\",\"lenght\":\"20\"}');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
