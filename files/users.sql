-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 24 2022 г., 16:21
-- Версия сервера: 10.7.3-MariaDB
-- Версия PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `contact_us`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `email` varchar(256) DEFAULT NULL,
  `subject` varchar(256) NOT NULL,
  `message` text DEFAULT NULL,
  `gender` char(1) NOT NULL,
  `device` varchar(15) NOT NULL,
  `pathTOfile` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `subject`, `message`, `gender`, `device`, `pathTOfile`) VALUES
(1, 'Иван', 'ivanchyk@mail.ru', 'P H P', 'Моё сообщение вам.', 'm', 'mobile', 'files\\1648138452doma.jpg'),
(2, 'Nikolay', 'dychkov@gmail.com', 'Hello', 'Значимость этих проблем настолько очевидна, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения форм развития. Таким образом постоянный количественный рост и сфера нашей активности требуют от нас анализа существенных финансовых и административных условий. Таким образом реализация намеченных плановых заданий играет важную роль в формировании соответствующий условий активизации. Товарищи! дальнейшее развитие различных форм деятельности обеспечивает широкому кругу (специалистов) участие в формировании существенных финансовых и административных условий. Равным образом новая модель организационной деятельности требуют определения и уточнения дальнейших направлений развития.', 'm', 'mobile', 'files\\1648138579game_kalmar.jpeg'),
(3, 'Maria', 'maria@gmail.com', 'Темная', 'Равным образом постоянный количественный рост и сфера нашей активности требуют определения и уточнения соответствующий условий активизации. С другой стороны новая модель организационной деятельности требуют от нас анализа системы обучения кадров, соответствует насущным потребностям. Товарищи! укрепление и развитие структуры требуют от нас анализа направлений прогрессивного развития. Повседневная практика показывает, что рамки и место обучения кадров влечет за собой процесс внедрения и модернизации направлений прогрессивного развития.', 'w', 'desktop', 'files\\1648138737romashki.jpg'),
(4, 'alexey', 'kalimunin@yahoo.com', 'Белая', 'Не следует, однако забывать, что начало повседневной работы по формированию позиции в значительной степени обуславливает создание дальнейших направлений развития. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности способствует подготовки и реализации модели развития.', 'm', 'other', ''),
(5, 'Каспер', 'prizrak73@gmail.com', 'Privedenie', 'Здесь приведение!', 'm', 'mobile', 'files\\1648138846privedenie.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
