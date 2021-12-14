-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 14 2021 г., 02:07
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `microfinance`
--

-- --------------------------------------------------------

--
-- Структура таблицы `borrowers`
--

CREATE TABLE `borrowers` (
  `id` int(11) UNSIGNED NOT NULL,
  `name_customer` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `borrowers`
--

INSERT INTO `borrowers` (`id`, `name_customer`) VALUES
(1, 'Воронков Роман Кириллович'),
(2, 'Горбунов Глеб Дмитриевич'),
(3, 'Алексеев Вячеслав Кириллович'),
(4, 'Семенов Вадим Глебович'),
(5, 'Волков Тимофей Леонидович');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) UNSIGNED NOT NULL,
  `img_path` varchar(45) NOT NULL DEFAULT 'img1.jpg',
  `goal` varchar(90) NOT NULL,
  `id_customer` int(10) UNSIGNED NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `img_path`, `goal`, `id_customer`, `comment`, `cost`) VALUES
(1, 'img1.jpg', 'Уплата налогов', 1, 'Одобрено', 9000),
(2, 'img2.jpg', 'Выплата заработной платы', 2, 'Одобрено', 27000),
(3, 'img3.jpg', 'Выплата процентов', 4, 'Одобрено', 12000),
(4, 'img4.jpg', 'Уплата налогов', 5, 'Одобрено', 33000),
(5, 'img5.jpg', 'Выплата ЗП', 3, 'Одобрено', 22850),
(6, 'img6.jpg', 'Ремонт квартиры', 3, 'Отклонено', 55990),
(7, 'img7.jpg', 'Покупка автомобиля', 1, 'Одобрено', 149000),
(8, 'img8.jpg', 'Покупка мебели и бытовой техники', 2, 'Одобрено', 42599),
(9, 'img9.jpg', 'Приобретение жилья под залог недвижимости', 5, 'Одобрено', 450000),
(10, 'img10.jpg', 'Ремонт автомобиля', 3, 'Отклонено', 67990),
(11, 'img11.jpg', 'Уплата налогов', 4, 'Одобрено', 22000),
(12, 'img12.jpg', 'Выплата процентов по кредиту', 3, 'Одобрено', 77800),
(13, 'img13.jpg', 'Покупка недвижимости', 5, 'Отклонено', 13000000),
(14, 'img14.jpg', 'Покупка подарка для жены', 1, 'Одобрено', 5000),
(15, 'img15.jpg', 'Откуп от коллекторов', 2, 'Отклонено', 16200),
(16, 'img16.jpg', '(Клиент не огласил цель займа)', 4, 'Отклонено', 1000000),
(17, 'img17.jpg', 'Покупка транспортного средства', 4, 'Одобрено', 220000),
(18, 'img18.jpg', 'Покупка бытовой техники', 2, 'Одобрено', 27000),
(19, 'img19.jpg', 'Выплата ЗП', 5, 'Одобрено', 100000),
(20, 'img20.jpg', 'Уплата налогов ', 3, 'Отклонено', 66300);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `borrowers`
--
ALTER TABLE `borrowers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_2` (`id_customer`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `borrowers`
--
ALTER TABLE `borrowers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `foreign_key_1` FOREIGN KEY (`id_customer`) REFERENCES `borrowers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
