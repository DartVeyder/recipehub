-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: mySQL-8.0
-- Час створення: Вер 17 2024 р., 12:56
-- Версія сервера: 8.0.35
-- Версія PHP: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `recipe_hub`
--

-- --------------------------------------------------------

--
-- Структура таблиці `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Закуски', '2024-09-11 22:24:31', '2024-09-11 22:24:31'),
(2, 'Основні страви', '2024-09-11 22:24:31', '2024-09-11 22:24:31'),
(3, 'Десерти', '2024-09-11 22:24:31', '2024-09-11 22:24:31'),
(4, 'Супи', '2024-09-11 22:24:31', '2024-09-11 22:24:31'),
(5, 'Салати', '2024-09-11 22:24:31', '2024-09-11 22:24:31');

-- --------------------------------------------------------

--
-- Структура таблиці `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Помідор', 'path/to/tomato.jpg', '2024-09-11 22:39:13', '2024-09-11 22:39:13'),
(2, 'Огірок', 'path/to/cucumber.jpg', '2024-09-11 22:39:13', '2024-09-11 22:39:13'),
(3, 'Морква', 'path/to/carrot.jpg', '2024-09-11 22:39:13', '2024-09-11 22:39:13'),
(4, 'Картопля', 'path/to/potato.jpg', '2024-09-11 22:39:13', '2024-09-11 22:39:13'),
(5, 'М\'ясо курки', 'path/to/chicken.jpg', '2024-09-11 22:39:13', '2024-09-11 22:39:13'),
(6, 'Сир', 'path/to/cheese.jpg', '2024-09-11 22:39:13', '2024-09-11 22:39:13'),
(7, 'Яйце', 'path/to/egg.jpg', '2024-09-11 22:39:13', '2024-09-11 22:39:13'),
(8, 'Цибуля', 'path/to/onion.jpg', '2024-09-11 22:39:13', '2024-09-11 22:39:13'),
(9, 'Часник', 'path/to/garlic.jpg', '2024-09-11 22:39:13', '2024-09-11 22:39:13'),
(10, 'Олія', 'path/to/oil.jpg', '2024-09-11 22:39:13', '2024-09-11 22:39:13'),
(11, 'Буряк', 'path/to/beet.jpg', '2024-09-11 22:39:13', '2024-09-11 22:39:13'),
(12, 'Капуста', 'path/to/cabbage.jpg', '2024-09-11 22:39:13', '2024-09-11 22:39:13'),
(13, 'Оливки', 'path/to/olives.jpg', '2024-09-11 22:39:13', '2024-09-11 22:39:13'),
(14, 'Бекон', 'path/to/bacon.jpg', '2024-09-11 22:39:13', '2024-09-11 22:39:13'),
(15, 'Парезан', 'path/to/parmesan.jpg', '2024-09-11 22:39:13', '2024-09-11 22:39:13'),
(16, 'Шоколад', 'path/to/chocolate.jpg', '2024-09-11 22:39:13', '2024-09-11 22:39:13'),
(17, 'Майонез', 'path/to/mayonnaise.jpg', '2024-09-11 22:39:13', '2024-09-11 22:39:13');

-- --------------------------------------------------------

--
-- Структура таблиці `recipes`
--

CREATE TABLE `recipes` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `instructions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'assets/images/none_image.jpg',
  `category_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `views` int DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `description`, `instructions`, `image`, `category_id`, `user_id`, `views`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Олів\'є', 'Салат з картоплею, морквою і м\'ясом курки', '1. Відваріть картоплю і моркву. 2. Поріжте овочі і м\'ясо. 3. Змішайте всі інгредієнти з майонезом.', 'https://images.unian.net/photos/2018_12/thumb_files/1000_545_1544783934-3964.jpg', 5, 1, 4, 1, '2024-09-11 22:41:48', '2024-09-11 23:52:29'),
(2, 'Борщ', 'Традиційний український борщ з буряком', '1. Відваріть буряк, капусту і картоплю. 2. Змішайте з бульйоном. 3. Додайте помідори і спеції.', 'https://images.unian.net/photos/2020_04/thumb_files/800_0_1588081977-7108.jpg?0.533115173094685', 4, 1, 1, 1, '2024-09-11 22:41:48', '2024-09-11 23:52:31'),
(3, 'Котлети по-київськи', 'Смажені котлети з курячого м\'яса', '1. Приготуйте котлети, начинені вершковим маслом. 2. Обсмажте на сковороді.', 'https://rud.ua/uploads/under_recipe/02_600x300_5f686cb1bd6ca.jpg', 2, 2, 0, 1, '2024-09-11 22:41:48', '2024-09-11 23:00:24'),
(4, 'Шоколадний торт', 'Смачний десерт з шоколадом', '1. Спечіть коржі. 2. Приготуйте шоколадний крем. 3. Складіть торт і прикрасьте.', 'https://rud.ua/uploads/under_recipe/maxresdefault%20(4).jpg', 3, 2, 0, 1, '2024-09-11 22:41:48', '2024-09-11 23:00:50');

-- --------------------------------------------------------

--
-- Структура таблиці `recipe_ingredient`
--

CREATE TABLE `recipe_ingredient` (
  `id` int NOT NULL,
  `recipe_id` int DEFAULT NULL,
  `ingredient_id` int DEFAULT NULL,
  `quantity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `recipe_ingredient`
--

INSERT INTO `recipe_ingredient` (`id`, `recipe_id`, `ingredient_id`, `quantity`, `created_at`, `updated_at`) VALUES
(107, 1, 4, '3 шт.', '2024-09-11 22:42:00', '2024-09-11 22:42:00'),
(108, 1, 3, '2 шт.', '2024-09-11 22:42:00', '2024-09-11 22:42:00'),
(109, 1, 5, '300 г', '2024-09-11 22:42:00', '2024-09-11 22:42:00'),
(110, 1, 6, '100 г', '2024-09-11 22:42:00', '2024-09-11 22:42:00'),
(111, 1, 7, '2 шт.', '2024-09-11 22:42:00', '2024-09-11 22:42:00'),
(112, 1, 8, '1 шт.', '2024-09-11 22:42:00', '2024-09-11 22:42:00'),
(113, 1, 9, '2 зуб.', '2024-09-11 22:42:00', '2024-09-11 22:42:00'),
(114, 1, 10, '100 мл', '2024-09-11 22:42:00', '2024-09-11 22:42:00'),
(115, 1, 17, '150 г', '2024-09-11 22:42:00', '2024-09-11 22:42:00'),
(116, 2, 11, '1 шт.', '2024-09-11 22:42:00', '2024-09-11 22:42:00'),
(117, 2, 12, '200 г', '2024-09-11 22:42:00', '2024-09-11 22:42:00'),
(118, 2, 4, '3 шт.', '2024-09-11 22:42:00', '2024-09-11 22:42:00'),
(119, 2, 5, '250 г', '2024-09-11 22:42:00', '2024-09-11 22:42:00'),
(120, 2, 9, '2 зуб.', '2024-09-11 22:42:00', '2024-09-11 22:42:00'),
(121, 2, 10, '50 мл', '2024-09-11 22:42:00', '2024-09-11 22:42:00'),
(122, 3, 5, '4 шт.', '2024-09-11 22:42:00', '2024-09-11 22:42:00'),
(123, 3, 6, '100 г', '2024-09-11 22:42:00', '2024-09-11 22:42:00'),
(124, 3, 7, '2 шт.', '2024-09-11 22:42:00', '2024-09-11 22:42:00'),
(125, 3, 10, '50 мл', '2024-09-11 22:42:00', '2024-09-11 22:42:00'),
(126, 4, 16, '200 г', '2024-09-11 22:42:00', '2024-09-11 22:42:00'),
(127, 4, 10, '100 мл', '2024-09-11 22:42:00', '2024-09-11 22:42:00');

-- --------------------------------------------------------

--
-- Структура таблиці `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `recipe_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `reviews`
--

INSERT INTO `reviews` (`id`, `recipe_id`, `user_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 'Смачно! Один з моїх улюблених салатів.', '2024-09-11 22:43:04', '2024-09-11 22:43:04'),
(3, 2, 1, 5, 'Справжній український борщ, смакота!', '2024-09-11 22:43:04', '2024-09-11 22:43:04'),
(4, 2, 2, 4, 'Великий плюс за густий бульйон, але можна трохи підсолити.', '2024-09-11 22:43:04', '2024-09-11 22:43:04'),
(5, 3, 1, 5, 'Котлети просто супер! Смачні та ніжні.', '2024-09-11 22:43:04', '2024-09-11 22:43:04'),
(6, 3, 2, 5, 'Чудовий рецепт, обов’язково спробую ще раз.', '2024-09-11 22:43:04', '2024-09-11 22:43:04'),
(7, 4, 1, 5, 'Торт неймовірно смачний, ідеально для свят.', '2024-09-11 22:43:04', '2024-09-11 22:43:04'),
(8, 4, 2, 4, 'Торт гарний, але можна покращити крем.', '2024-09-11 22:43:04', '2024-09-11 22:43:04');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Іван Петренко', 'ivan.petrenko@example.com', 'пароль123', '2024-09-11 22:32:11', '2024-09-11 22:32:11'),
(2, 'Марія Іванова', 'maria.ivanova@example.com', 'пароль456', '2024-09-11 22:32:11', '2024-09-11 22:32:11'),
(3, 'Іван Іванович', 'ivan.ivanov@example.com', '111111', '2024-09-11 22:32:11', '2024-09-11 22:32:11');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Індекси таблиці `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Індекси таблиці `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Індекси таблиці `recipe_ingredient`
--
ALTER TABLE `recipe_ingredient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_id` (`recipe_id`),
  ADD KEY `ingredient_id` (`ingredient_id`);

--
-- Індекси таблиці `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_id` (`recipe_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблиці `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблиці `recipe_ingredient`
--
ALTER TABLE `recipe_ingredient`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT для таблиці `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `recipes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `recipe_ingredient`
--
ALTER TABLE `recipe_ingredient`
  ADD CONSTRAINT `recipe_ingredient_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipe_ingredient_ibfk_2` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
