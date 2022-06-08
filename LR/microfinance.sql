-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 09 2022 г., 00:35
-- Версия сервера: 10.4.22-MariaDB
-- Версия PHP: 8.1.2

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
  `id_customer` int(11) UNSIGNED NOT NULL,
  `name_customer` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `borrowers`
--

INSERT INTO `borrowers` (`id_customer`, `name_customer`) VALUES
(1, 'Воронков Роман Кирилловиччич'),
(2, 'Горбунов Глеб Дм1триевич4'),
(4, 'Семенов Вадим Глебович'),
(6, 'Сидоров Иван Петрович');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) UNSIGNED NOT NULL,
  `img_path` varchar(200) NOT NULL DEFAULT 'img1.jpg',
  `name` varchar(90) NOT NULL,
  `id_customer` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `img_path`, `name`, `id_customer`, `description`, `cost`) VALUES
(1, '20220609120614chmonja-kot.jpg', 'Уплата налогоv', 2, 'Отклонено123', 9005),
(2, '202206060706163ffe7e58a97483728885de3fe7cb86a3.jpg', 'Выплата заработной платыыы', 2, 'Отклонено', 22222),
(3, 'img3.jpg', 'Выплата процентов', 4, 'Одобрено', 12000),
(4, 'img4.jpg', 'Уплата налогов', 1, 'Одобрено', 33000),
(5, 'img5.jpg', 'Выплата ЗП', 4, 'Одобрено', 22850),
(6, 'img6.jpg', 'Ремонт квартиры', 4, 'Отклонено', 55990),
(7, 'img7.jpg', 'Покупка автомобиля', 1, 'Одобрено', 149000),
(8, 'img8.jpg', 'Покупка мебели и бытовой техники', 2, 'Одобрено', 42599),
(9, 'img9.jpg', 'Приобретение жилья под залог недвижимости', 1, 'Одобрено', 450000),
(10, 'img10.jpg', 'Ремонт автомобиля', 4, 'Отклонено', 67990),
(11, 'img11.jpg', 'Уплата налогов', 4, 'Одобрено', 22000),
(12, 'img12.jpg', 'Выплата процентов по кредиту', 4, 'Одобрено', 778001),
(13, 'img13.jpg', 'Покупка недвижимости', 1, 'Отклонено', 13000000),
(14, 'img14.jpg', 'Покупка подарка для жены', 1, 'Одобрено', 5000),
(15, 'img15.jpg', 'Откуп от коллекторов', 2, 'Отклонено', 16200),
(16, 'img16.jpg', '(Клиент не огласил цель займа)', 6, 'Отклонено', 1000000),
(17, 'img17.jpg', 'Покупка транспортного средства', 4, 'Одобрено', 220000),
(23, '20220609120657PzCK10xGJ_U.jpg', 'Выплата заработной платыыы123', 4, 'тест', 123456);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `Login` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `FIO` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Date_birth` date NOT NULL,
  `ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`Login`, `Password`, `FIO`, `Address`, `Gender`, `Date_birth`, `ID`) VALUES
('forevermorr@gmail.ru', 'e66648c5072b57483a49c0e3a507cf73', 'amagama', 'address', '0', '2002-02-12', '62004bf9a5771'),
('joe@example.com', 'e66648c5072b57483a49c0e3a507cf73', 'amagamazzz', 'addddddress', '0', '1999-09-12', '62004d56b308e'),
('kekw@mail.ru', 'e66648c5072b57483a49c0e3a507cf73', 'meow', 'dsadsadsadsadsad', '1', '2002-02-12', '620068a957c2d'),
('meowenough@gmail.com', 'e66648c5072b57483a49c0e3a507cf73', 'Ilya', 'Volgograd', '0', '2002-02-12', '6200757f504ea'),
('foreverm0re@mail.ru', '77c725f0a16f4a40ecd0e09bcb3c0a86', 'Ilya', 'VLG', '0', '2002-02-12', '6201ceb51f4cb'),
('qwerty@gmail.com', '77c725f0a16f4a40ecd0e09bcb3c0a86', 'Ilya U.', 'vog', '0', '1999-12-13', '6201cfb1b573a'),
('meowenough@mail.ru', 'b8c3a00a9f4c05abb9892777cc1e8b06', 'Ilya Utin', 'volgogradd', '0', '2003-03-12', '6203149d97ed6');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `borrowers`
--
ALTER TABLE `borrowers`
  ADD PRIMARY KEY (`id_customer`);

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
  MODIFY `id_customer` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `foreign_key_1` FOREIGN KEY (`id_customer`) REFERENCES `borrowers` (`id_customer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
