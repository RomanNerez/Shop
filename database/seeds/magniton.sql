-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: lp387640.mysql.ukraine.com.ua
-- Время создания: Янв 18 2021 г., 01:43
-- Версия сервера: 5.7.16-10-log
-- Версия PHP: 7.4.14

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lp387640_magniton`
--

-- --------------------------------------------------------

--
-- Дамп данных таблицы `attributes`
--

INSERT INTO `attributes` (`id`, `slug`, `price`, `count`, `data`, `type`, `order`, `status`, `created_at`, `updated_at`) VALUES
(6, 'tsvet', 1, 1, 1, 'radio', 4, 1, '2020-11-28 15:12:12', '2020-12-14 17:42:18'),
(8, 'polyarnost', 0, 1, 0, 'radio', NULL, 1, '2020-12-14 07:49:19', '2020-12-15 20:13:52'),
(9, 'pokrytie', 1, 1, 1, 'radio', NULL, 1, '2020-12-14 07:49:32', '2020-12-15 20:12:21'),
(11, 'namagnichennost', 1, 0, 1, 'select', NULL, 1, '2020-12-25 07:37:59', '2020-12-25 07:37:59');

-- --------------------------------------------------------


--
-- Дамп данных таблицы `attribute_lists`
--

INSERT INTO `attribute_lists` (`id`, `attribute_id`, `slug`, `status`, `order`, `created_at`, `updated_at`) VALUES
(4, 6, 'zheltyj', 1, 12, '2020-11-28 16:50:34', '2020-12-05 10:57:24'),
(5, 6, 'krasnyj', 1, 13, '2020-11-28 16:50:51', '2020-12-05 10:57:24'),
(6, 6, 'zelenyj', 1, 14, '2020-11-28 16:51:11', '2020-12-05 10:57:24'),
(7, 6, 'oranzhevyj', 1, 15, '2020-11-28 16:51:42', '2020-12-05 10:57:24'),
(8, 6, 'sinij', 1, 16, '2020-11-28 16:51:59', '2020-12-05 10:57:24'),
(9, 6, 'chornyj', 1, 17, '2020-11-28 16:52:28', '2020-12-28 17:55:55'),
(10, 6, 'belyj', 1, 18, '2020-11-28 16:52:44', '2020-12-05 10:57:24'),
(11, 6, 'fioletovyj', 1, 19, '2020-11-28 16:53:14', '2020-12-05 10:57:24'),
(32, 6, 'zoloto', 1, 11, '2020-12-04 20:25:36', '2020-12-05 10:57:24'),
(33, 6, 'nikel', 1, 10, '2020-12-04 20:25:54', '2020-12-05 10:57:24'),
(34, 6, 'raduga', 1, 9, '2020-12-04 20:26:13', '2020-12-05 10:57:24'),
(36, 9, 'hrom', 1, NULL, '2020-12-14 07:50:06', '2020-12-15 20:14:48'),
(37, 9, 'nikel', 1, NULL, '2020-12-14 07:50:15', '2020-12-15 20:14:35'),
(39, 8, 's', 1, NULL, '2020-12-14 07:50:41', '2020-12-15 20:13:10'),
(41, 8, 'n', 1, NULL, '2020-12-15 20:13:24', '2020-12-15 20:13:24'),
(42, 9, 'serebro', 1, NULL, '2020-12-25 05:46:00', '2020-12-25 05:46:00'),
(43, 9, 'zoloto', 1, NULL, '2020-12-25 05:46:22', '2020-12-25 05:46:28'),
(44, 11, 'n38', 1, NULL, '2020-12-25 07:45:03', '2020-12-25 07:45:03'),
(45, 11, 'n45', 1, NULL, '2020-12-25 07:45:56', '2020-12-25 07:45:56');

-- --------------------------------------------------------


--
-- Дамп данных таблицы `attr_collections`
--

INSERT INTO `attr_collections` (`id`, `attribute_list_id`, `attr_in_product_id`, `created_at`, `updated_at`) VALUES
(1207, 37, 504, '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(1208, 36, 505, '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(1209, 37, 506, '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(1210, 39, 506, '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(1211, 37, 507, '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(1212, 41, 507, '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(1213, 36, 508, '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(1214, 39, 508, '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(1215, 36, 509, '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(1216, 41, 509, '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(1217, 37, 510, '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(1238, 43, 531, '2020-12-25 11:22:10', '2020-12-25 11:22:10'),
(1239, 42, 532, '2020-12-25 11:22:10', '2020-12-25 11:22:10'),
(1240, 37, 533, '2020-12-25 11:22:10', '2020-12-25 11:22:10'),
(1241, 41, 534, '2020-12-25 11:23:28', '2020-12-25 11:23:28'),
(1242, 39, 535, '2020-12-25 11:23:28', '2020-12-25 11:23:28');

-- --------------------------------------------------------

--
-- Дамп данных таблицы `attr_in_products`
--

INSERT INTO `attr_in_products` (`id`, `product_id`, `price`, `count`, `images`, `created_at`, `updated_at`) VALUES
(504, 25, 400.000000, NULL, NULL, '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(505, 25, 420.000000, NULL, '[{\"id\": 1608074519498, \"source\": \"photos/2/product/neodim/2/64bb360ec4ce2a6bffc8ddd0a6d1842b.jpg\"}, {\"id\": 1608074575495, \"source\": \"photos/2/product/neodim/2/0e636387c851892e616135f6022c5078.jpg\"}]', '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(506, 25, NULL, 200, NULL, '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(507, 25, NULL, 0, NULL, '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(508, 25, NULL, 100, NULL, '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(509, 25, NULL, 50, NULL, '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(510, 25, NULL, NULL, NULL, '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(531, 54, 0.092857, 3000, '[{\"id\": 1608906097068, \"source\": \"photos/2/product/15 Shary/Шар 5 мм Au/magnit-shar-zoloto.jpg\"}]', '2020-12-25 11:22:10', '2020-12-25 11:22:10'),
(532, 54, 0.092857, 3000, '[{\"id\": 1608906105564, \"source\": \"photos/2/product/15 Shary/Шар 5 мм Ag/magnit-sfera-serebro.jpg\"}]', '2020-12-25 11:22:10', '2020-12-25 11:22:10'),
(533, 54, 0.085714, 3000, '[{\"id\": 1608906126940, \"source\": \"photos/2/product/15 Shary/Шар 5 мм Ni/a2fb584b39e77658e4f8b2207dff0035.jpg\"}, {\"id\": 1608906126941, \"source\": \"photos/2/product/15 Shary/Шар 5 мм Ni/IMG_1129.JPG\"}, {\"id\": 1608906126942, \"source\": \"photos/2/product/15 Shary/Шар 5 мм Ni/IMG_1127.JPG\"}, {\"id\": 1608906126943, \"source\": \"photos/2/product/15 Shary/Шар 5 мм Ni/IMG_1126.JPG\"}, {\"id\": 1608906126944, \"source\": \"photos/2/product/15 Shary/Шар 5 мм Ni/IMG_1125.JPG\"}, {\"id\": 1608906126945, \"source\": \"photos/2/product/15 Shary/Шар 5 мм Ni/IMG_1124.JPG\"}]', '2020-12-25 11:22:10', '2020-12-25 11:22:10'),
(534, 55, NULL, 2000, NULL, '2020-12-25 11:23:28', '2020-12-25 11:23:28'),
(535, 55, NULL, 2000, NULL, '2020-12-25 11:23:28', '2020-12-25 11:23:28');

-- --------------------------------------------------------


--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `slug`, `file`, `status`, `is_root`, `created_at`, `updated_at`) VALUES
(1, 'neodimovye-magnity', 'photos/2/category/3.jpg', 1, 0, '2020-11-27 21:32:12', '2020-12-07 19:45:58'),
(20, 'vse-tovary', 'photos/2/category/3.jpg', 1, 1, '2020-12-07 19:47:17', '2020-12-16 13:20:39'),
(21, 'feritovye-magnity', 'photos/2/category/DSC_7971-1.jpg', 1, 0, '2020-12-08 07:49:54', '2020-12-08 07:51:14'),
(22, 'poiskovye-magnity', 'photos/2/category/двустор мп с защитой.jpg', 1, 0, '2020-12-17 10:43:43', '2020-12-17 10:43:43'),
(23, 'magnit-dlya-sumki', 'photos/2/category/magnetic-button-250x250.jpg', 1, 0, '2020-12-24 06:04:35', '2020-12-24 06:04:35'),
(24, 'magnit-zamok', 'photos/2/category/bfc91371493cc27157e73a6cf7fb0dbe.jpg', 1, 0, '2020-12-24 07:48:04', '2020-12-24 07:48:04'),
(25, 'magnity-derzhateli', 'photos/2/category/7b6c1d02f14e187001fb308415580923.png', 1, 0, '2020-12-28 06:55:10', '2020-12-28 06:55:10'),
(26, 'magnity-dlya-svarki', 'photos/2/category/IMG_20190128_101455.jpg', 1, 0, '2020-12-28 07:02:00', '2020-12-28 07:02:00'),
(27, 'magnity-igrushki-suveniry', 'photos/2/category/201221185_images_20202117041.jpg', 1, 0, '2020-12-28 07:09:19', '2020-12-28 07:09:19'),
(28, 'magnity-gibkie', 'photos/2/category/cc70c483c26fc14910647a5d39415005.jpg', 1, 0, '2020-12-28 07:15:10', '2020-12-28 07:15:10'),
(29, 'razmagnichivatel-teslametr', 'photos/2/category/razmagnichivatel-dlya-chasov-kupit-z.jpg', 1, 0, '2020-12-28 07:17:46', '2020-12-28 07:17:46'),
(30, 'magnit-segment-magnit-sektor', 'photos/2/category/magnit-feritovij-nabor-segment-sd-55-31-0-7-na-lichilnik-vodi-kupiti-ukraina-z.jpg', 1, 0, '2020-12-28 07:28:10', '2020-12-28 07:28:10'),
(31, 'magnitnye-aktivatory', 'photos/2/category/изображение_viber_2020-03-11_15-45-33.jpg', 1, 0, '2020-12-28 07:57:26', '2020-12-28 07:57:26'),
(32, 'izgotovlenie-vinilovyh-magnitov-pod-zakaz', 'photos/2/category/1a45a9fa14d9c0278cbf011fab827018.jpg', 1, 0, '2020-12-28 08:13:49', '2020-12-28 08:13:49'),
(33, 'magnity-dlya-eksperimentov-i-ucheby', 'photos/2/category/екран-візуалізатор-магнітного-поля-150-мм-z.jpg', 1, 0, '2020-12-28 08:29:21', '2020-12-28 08:29:21'),
(34, 'magnit-semnik', 'photos/2/category/магнит для снятия антикражек, магніт для биперів, магнит для вещей, магніт для речей, магніт для одягу.jpg', 1, 0, '2020-12-28 08:32:16', '2020-12-28 09:25:53'),
(35, 'magnitnye-braslety', 'photos/2/category/b44-bio-magnitnyj-braslet-kupit-z.jpg', 1, 0, '2020-12-28 09:31:16', '2020-12-28 09:31:16'),
(36, 'prodazha-magnitov-s-defektami', 'photos/2/category/c746bb0873d620ca5eb5e08810fe00bd.jpg', 1, 0, '2020-12-28 09:38:35', '2020-12-28 09:38:35'),
(37, 'magnity-dlya-doski', 'photos/2/category/magnity-peshka-dlya-magnito-markernykh-dosok-z.jpg', 1, 0, '2020-12-28 09:48:41', '2020-12-28 09:48:41'),
(38, 'aksessuary-dlya-mobilnyh-telefonov', 'photos/2/category/109.png', 1, 0, '2020-12-28 09:50:47', '2020-12-28 09:50:47'),
(39, 'dlya-magnitov', 'photos/2/collection/kleiy-dlya-magnitov.jpg', 1, 0, '2020-12-30 10:14:06', '2020-12-30 10:14:06');

-- --------------------------------------------------------

--
-- Дамп данных таблицы `collections`
--

INSERT INTO `collections` (`id`, `categories_id`, `slug`, `file`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'magnity-diski', 'photos/2/collection/yWkAgiV-680x449.jpg', 1, '2020-11-28 12:18:14', '2020-11-28 12:18:14'),
(2, 1, 'magnity-sterzhni-prutki', 'photos/2/collection/5fc9706d89e9f048030ec10a70afc3e3a7139738_400_400.jpeg', 1, '2020-11-28 14:23:35', '2020-12-08 09:04:21'),
(5, 21, 'magnity-diski', 'photos/2/collection/iman-circular-ceramico-12mm-x-20-main.jpg', 1, '2020-12-08 09:00:43', '2020-12-08 09:00:43'),
(6, 21, 'magnity-sterzhni-prutki', 'photos/2/collection/5fc9706d89e9f048030ec10a70afc3e3a7139738_400_400.jpeg', 1, '2020-12-08 09:05:56', '2020-12-08 09:05:56'),
(7, 20, 'sila-stsepleniya-do-02-kg', 'photos/2/category/DSC_7971-1.jpg', 1, '2020-12-16 13:33:35', '2020-12-16 13:33:35'),
(8, 22, 'odnostoronnie-poiskovye-magnita', 'photos/2/collection/magnit-poiskoviy-odnostoronniy-200-kg.jpg', 1, '2020-12-18 06:57:50', '2020-12-18 06:57:50'),
(10, 22, 'dvuhstornnie-poiskovye-magnity', 'photos/2/product/poiscovie/МП 120х2/magnit-poiskovii-dvostoroniiy-120-kg.jpg', 1, '2020-12-24 12:59:53', '2020-12-24 12:59:53'),
(11, 20, 'magnity-dlya-doma', 'photos/2/collection/yWkAgiV-680x449.jpg', 0, '2020-12-24 13:27:22', '2020-12-24 13:27:22'),
(12, 1, 'magnit-shar', 'photos/2/collection/shar-magnit-ferrit.jpg', 1, '2020-12-25 05:43:47', '2020-12-25 05:43:55'),
(16, 1, 'magnit-samoklejka', 'photos/2/collection/neodimoviy-magnit-s-kleyevim-sloyem-kupit-3-m-ukraina.png', 1, '2020-12-25 07:04:43', '2020-12-25 07:04:43'),
(17, 1, 'magnit-pryamougolnik', 'photos/2/collection/magnit-50-20-10-mm-z.jpg', 1, '2020-12-28 10:09:43', '2020-12-28 10:09:43'),
(18, 1, 'magnit-kvadrat', 'photos/2/collection/20-20-3-mm-neodimovaya-plastina-kupit-zaporozhe-z.jpg', 1, '2020-12-28 10:13:11', '2020-12-28 10:13:11'),
(19, 1, 'magnit-kub', 'photos/2/collection/20-20-20-mm-neodimovij-magnіt-kub-kupiti-ukraіna-z.jpg', 1, '2020-12-28 10:19:51', '2020-12-28 10:19:51'),
(20, 1, 'magnit-koltso', 'photos/2/collection/12-9-1-5-mm-neodimovyj-magnit-kolechko-dlya-bizhuterii-kupit-z.jpg', 1, '2020-12-28 10:22:18', '2020-12-28 10:22:18'),
(21, 21, 'magnit-pryamougolnik', 'photos/2/collection/45x15x12-mm-ferritovyj-magnit-pryamougolnik-kupit-z.jpg', 1, '2020-12-28 10:28:15', '2020-12-28 10:28:15'),
(22, 21, 'magnit-koltso', 'photos/2/collection/45-24x9-mm-ferritovyj-magnit-v-forme-kolca-po-optovym-cenam-kupit-z.jpg', 1, '2020-12-28 10:30:24', '2020-12-28 10:30:24'),
(23, 22, 'aksessuary-dlya-poiskovyh-magnitov', 'photos/2/collection/magniton.org.ua-aksesuari-k-poiskovim.png', 1, '2020-12-28 10:54:26', '2020-12-28 10:54:26'),
(24, 38, 'shnur-dlya-telefona', 'photos/2/collection/magnitnaya-zaryadka.jpg', 1, '2020-12-28 11:08:21', '2020-12-28 11:08:21'),
(25, 38, 'derzhatel-dlya-telefona', 'photos/2/category/109.png', 1, '2020-12-28 11:09:20', '2020-12-28 11:09:28'),
(26, 1, 'krepezhnyj-magnit', 'photos/2/collection/25032017l9h5f2rfcopy.jpg', 1, '2020-12-29 09:57:41', '2020-12-29 09:58:22'),
(27, 21, 'krepezhnye-magnity', 'photos/2/collection/Коллаж ферритовых держателей со слоями без теней.jpg', 1, '2020-12-30 09:37:09', '2020-12-30 09:37:09'),
(28, 21, 'magnit-shar', 'photos/2/collection/shar-magnit-ferrit.jpg', 1, '2020-12-30 09:56:28', '2020-12-30 09:56:28');

-- --------------------------------------------------------

--
-- Дамп данных таблицы `currency_lists`
--

INSERT INTO `currency_lists` (`id`, `symbol`, `code`, `created_at`, `updated_at`) VALUES
(4, '₴', 'UAH', '2020-12-14 11:58:30', '2020-12-14 11:58:30'),
(5, '$', 'USD', '2020-12-14 12:00:36', '2020-12-16 13:07:06'),
(6, '€', 'EUR', '2020-12-14 12:01:35', '2020-12-14 12:01:35'),
(7, '₽', 'RUB', '2020-12-16 12:58:44', '2020-12-16 12:58:44');

-- --------------------------------------------------------

--
-- Дамп данных таблицы `currency_values`
--

INSERT INTO `currency_values` (`id`, `first`, `last`, `value`, `created_at`, `updated_at`) VALUES
(4, 5, 4, 28.000000, '2020-12-14 12:00:36', '2020-12-16 12:55:44'),
(5, 6, 4, 34.100000, '2020-12-14 12:01:35', '2020-12-14 12:01:52'),
(6, 6, 5, 1.200000, '2020-12-14 12:01:35', '2020-12-14 12:01:57'),
(7, 4, 7, 2.640000, '2020-12-16 12:58:44', '2020-12-16 12:59:35'),
(8, 5, 7, 73.560000, '2020-12-16 12:58:44', '2020-12-16 12:59:49'),
(9, 6, 7, 89.630000, '2020-12-16 12:58:44', '2020-12-16 13:00:02');


--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `categories_id`, `slug`, `status`, `order`, `created_at`, `updated_at`) VALUES
(28, 20, 'sila-stsepleniya', 1, 3, '2020-12-08 07:12:36', '2020-12-08 08:49:31'),
(29, 20, 'diametr', 1, 4, '2020-12-08 07:25:21', '2020-12-08 08:49:31'),
(33, 1, 'gabarity', 1, 2, '2020-12-08 07:35:23', '2021-01-04 08:33:11'),
(34, 1, 'vnutrnnij-diametr', 1, 3, '2020-12-08 07:36:39', '2021-01-04 08:33:11'),
(36, 20, 'osobennosti', 1, 8, '2020-12-08 07:39:31', '2020-12-08 08:49:31'),
(37, 1, 'vneshnij-radius', 1, 4, '2020-12-08 07:45:11', '2021-01-04 08:33:11'),
(38, 1, 'vnutrennij-radius', 1, 5, '2020-12-08 07:46:05', '2021-01-04 08:33:11'),
(39, 1, 'ugol-obrazuyuschij-segment', 1, 6, '2020-12-08 07:47:26', '2021-01-04 08:33:11'),
(41, 20, 'shirina', 1, 7, '2020-12-08 07:53:19', '2020-12-08 08:49:31'),
(44, 20, 'material', 1, 1, '2020-12-08 08:40:24', '2020-12-08 08:41:04'),
(45, 20, 'forma', 1, 2, '2020-12-08 08:44:47', '2020-12-08 08:49:31'),
(46, 20, 'vysota', 1, 5, '2020-12-08 08:50:33', '2020-12-08 08:51:31'),
(47, 20, 'dlina', 1, 6, '2020-12-08 08:52:25', '2020-12-08 08:53:58'),
(49, 22, 'tip', 1, 7, '2020-12-17 11:12:28', '2021-01-04 08:57:47'),
(50, 22, 'ustrojstvo-otryva', 1, 6, '2020-12-17 11:26:16', '2021-01-04 08:57:46'),
(51, 22, 'rezba', 1, 5, '2020-12-17 11:55:00', '2021-01-04 08:57:46'),
(52, 22, 'proizvoditel', 1, 4, '2020-12-17 12:17:37', '2021-01-04 08:57:46'),
(55, 22, 'material-pokrytiya', 1, 3, '2020-12-17 12:27:12', '2021-01-04 08:57:45'),
(56, 22, 'aksessuary-dlya-poiskovyh-magnitov', 1, 2, '2020-12-28 10:35:00', '2021-01-04 08:57:45'),
(57, 38, 'tip-aksessuara', 1, NULL, '2020-12-28 10:59:01', '2020-12-28 10:59:01'),
(58, 1, 'krepezhnyj', 1, 1, '2020-12-29 07:03:57', '2021-01-04 08:33:11'),
(61, 39, 'dlya-magnitov', 1, NULL, '2020-12-30 10:14:49', '2020-12-30 10:14:59'),
(62, 27, 'tip-igrushek', 1, 1, '2020-12-30 11:33:16', '2020-12-30 11:38:47'),
(63, 28, 'format', 1, 1, '2020-12-30 11:45:59', '2020-12-30 11:51:09'),
(64, 22, 'usilie-na-otryv', 0, 1, '2020-12-31 06:51:14', '2021-01-04 08:57:44'),
(65, 20, 'namagnichennost', 1, NULL, '2020-12-31 08:23:07', '2020-12-31 08:23:07');

-- --------------------------------------------------------

--
-- Дамп данных таблицы `groups_in_collects`
--

INSERT INTO `groups_in_collects` (`id`, `subs_id`, `collections_id`, `created_at`, `updated_at`) VALUES
(65, 94, 2, '2020-12-13 15:13:55', '2020-12-13 15:13:55'),
(66, 97, 2, '2020-12-13 15:13:55', '2020-12-13 15:13:55'),
(67, 94, 1, '2020-12-13 15:14:00', '2020-12-13 15:14:00'),
(68, 96, 1, '2020-12-13 15:14:00', '2020-12-13 15:14:00'),
(69, 95, 6, '2020-12-13 15:14:13', '2020-12-13 15:14:13'),
(70, 97, 6, '2020-12-13 15:14:13', '2020-12-13 15:14:13'),
(71, 95, 5, '2020-12-13 15:14:17', '2020-12-13 15:14:17'),
(72, 96, 5, '2020-12-13 15:14:17', '2020-12-13 15:14:17'),
(90, 126, 8, '2020-12-18 06:59:08', '2020-12-18 06:59:08'),
(91, 128, 8, '2020-12-18 06:59:08', '2020-12-18 06:59:08'),
(92, 121, 8, '2020-12-18 06:59:08', '2020-12-18 06:59:08'),
(93, 122, 8, '2020-12-18 06:59:08', '2020-12-18 06:59:08'),
(94, 123, 8, '2020-12-18 06:59:08', '2020-12-18 06:59:08'),
(95, 124, 8, '2020-12-18 06:59:08', '2020-12-18 06:59:08'),
(96, 125, 8, '2020-12-18 06:59:08', '2020-12-18 06:59:08'),
(97, 117, 8, '2020-12-18 06:59:09', '2020-12-18 06:59:09'),
(98, 118, 8, '2020-12-18 06:59:09', '2020-12-18 06:59:09'),
(99, 113, 8, '2020-12-18 06:59:09', '2020-12-18 06:59:09'),
(100, 114, 8, '2020-12-18 06:59:09', '2020-12-18 06:59:09'),
(101, 94, 8, '2020-12-18 06:59:09', '2020-12-18 06:59:09'),
(102, 116, 8, '2020-12-18 06:59:09', '2020-12-18 06:59:09'),
(103, 80, 8, '2020-12-18 06:59:09', '2020-12-18 06:59:09'),
(104, 81, 8, '2020-12-18 06:59:09', '2020-12-18 06:59:09'),
(105, 82, 8, '2020-12-18 06:59:09', '2020-12-18 06:59:09'),
(109, 115, 10, '2020-12-24 13:01:55', '2020-12-24 13:01:55'),
(112, 83, 11, '2020-12-24 13:27:22', '2020-12-24 13:27:22'),
(124, 130, 12, '2020-12-25 05:43:55', '2020-12-25 05:43:55'),
(128, 83, 16, '2020-12-25 07:04:43', '2020-12-25 07:04:43'),
(138, 94, 17, '2020-12-28 10:10:41', '2020-12-28 10:10:41'),
(139, 131, 17, '2020-12-28 10:10:41', '2020-12-28 10:10:41'),
(140, 129, 7, '2020-12-28 10:11:18', '2020-12-28 10:11:18'),
(141, 88, 7, '2020-12-28 10:11:18', '2020-12-28 10:11:18'),
(142, 103, 7, '2020-12-28 10:11:18', '2020-12-28 10:11:18'),
(143, 98, 7, '2020-12-28 10:11:18', '2020-12-28 10:11:18'),
(144, 108, 7, '2020-12-28 10:11:18', '2020-12-28 10:11:18'),
(145, 134, 18, '2020-12-28 10:13:11', '2020-12-28 10:13:11'),
(146, 94, 18, '2020-12-28 10:13:11', '2020-12-28 10:13:11'),
(147, 132, 19, '2020-12-28 10:19:51', '2020-12-28 10:19:51'),
(148, 94, 19, '2020-12-28 10:19:51', '2020-12-28 10:19:51'),
(149, 133, 20, '2020-12-28 10:22:18', '2020-12-28 10:22:18'),
(150, 94, 20, '2020-12-28 10:22:18', '2020-12-28 10:22:18'),
(151, 131, 21, '2020-12-28 10:28:15', '2020-12-28 10:28:15'),
(152, 95, 21, '2020-12-28 10:28:16', '2020-12-28 10:28:16'),
(153, 95, 22, '2020-12-28 10:30:24', '2020-12-28 10:30:24'),
(154, 133, 22, '2020-12-28 10:30:24', '2020-12-28 10:30:24'),
(161, 142, 24, '2020-12-28 11:08:21', '2020-12-28 11:08:21'),
(163, 143, 25, '2020-12-28 11:09:28', '2020-12-28 11:09:28'),
(209, 94, 26, '2020-12-29 10:25:58', '2020-12-29 10:25:58'),
(210, 135, 26, '2020-12-29 10:25:58', '2020-12-29 10:25:58'),
(211, 95, 27, '2020-12-30 09:37:09', '2020-12-30 09:37:09'),
(212, 135, 27, '2020-12-30 09:37:09', '2020-12-30 09:37:09'),
(214, 95, 28, '2020-12-30 09:56:28', '2020-12-30 09:56:28'),
(215, 130, 28, '2020-12-30 09:56:28', '2020-12-30 09:56:28'),
(229, 151, 23, '2021-01-04 09:01:59', '2021-01-04 09:01:59');
--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `categories_id`, `slug`, `status`, `hit`, `new`, `currency`, `price`, `count`, `images`, `bulk_price`, `created_at`, `updated_at`) VALUES
(24, 1, 'magnit-neodimovyj-disk-1h1-mm', 1, 0, 0, 4, 0.600000, 1000, '[{\"id\": 1607429360844, \"source\": \"photos/2/product/neodim/1/a8b25edb236bd9254ec2166b11ca0f2b.jpg\"}]', '[{\"id\": 1607429299799, \"name\": \"от 10 шт.\", \"sale\": 12, \"count\": 10}, {\"id\": 1607429298742, \"name\": \"от 100 шт.\", \"sale\": 30, \"count\": 100}]', '2020-12-08 09:18:04', '2020-12-08 09:18:04'),
(25, 1, 'magnit-neodimovyj-disk-10h6-mm', 1, 0, 0, 4, 400.000000, NULL, '[{\"id\": 1607429360844, \"source\": \"photos/2/product/neodim/1/a8b25edb236bd9254ec2166b11ca0f2b.jpg\"}, {\"id\": 1607970388972, \"source\": \"photos/2/product/neodim/1/76a5dd50cd6bb8a0ee9bff2c0aca729a.jpg\"}, {\"id\": 1607970388974, \"source\": \"photos/2/product/neodim/1/e7a4f56c91896be16a71c7c07478f56d.jpg\"}]', '[{\"id\": 1608033858891, \"name\": \"10\", \"sale\": 10, \"count\": 10}, {\"id\": 1608033867655, \"name\": \"50\", \"sale\": 15, \"count\": 50}]', '2020-12-08 09:19:48', '2020-12-15 22:39:28'),
(27, 1, 'magnit-neodimovyj-sterzhen-4h20-mm', 1, 0, 0, 4, 9.100000, 1000, '[{\"id\": 1607431347942, \"source\": \"photos/2/product/neodim/3/5ed8f57b8a398da276706d63a215401d.jpg\"}]', '[{\"id\": 1607429299799, \"name\": \"от 10 шт.\", \"sale\": 12, \"count\": 10}, {\"id\": 1607429298742, \"name\": \"от 100 шт.\", \"sale\": 30, \"count\": 100}]', '2020-12-08 09:40:08', '2020-12-08 09:46:45'),
(28, 1, 'magnit-neodimovyj-sterzhen-9h32-mm', 1, 0, 0, 4, 9.100000, 1000, '[{\"id\": 1607431347942, \"source\": \"photos/2/product/neodim/3/5ed8f57b8a398da276706d63a215401d.jpg\"}]', '[{\"id\": 1607429299799, \"name\": \"от 10 шт.\", \"sale\": 12, \"count\": 10}, {\"id\": 1607429298742, \"name\": \"от 100 шт.\", \"sale\": 30, \"count\": 100}]', '2020-12-08 09:46:50', '2020-12-08 09:53:59'),
(29, 1, 'magnit-neodimovyj-sterzhen-3h6-mm', 1, 0, 0, 4, 9.100000, 1000, '[{\"id\": 1607431347942, \"source\": \"photos/2/product/neodim/3/5ed8f57b8a398da276706d63a215401d.jpg\"}]', '[{\"id\": 1607429299799, \"name\": \"от 10 шт.\", \"sale\": 12, \"count\": 10}, {\"id\": 1607429298742, \"name\": \"от 100 шт.\", \"sale\": 30, \"count\": 100}]', '2020-12-08 09:49:30', '2020-12-08 09:53:44'),
(30, 1, 'magnit-neodimovyj-disk-10h6-mm-30', 1, 0, 0, 4, 40.000000, 1000, '[{\"id\": 1607429360844, \"source\": \"photos/2/product/neodim/1/a8b25edb236bd9254ec2166b11ca0f2b.jpg\"}]', '[{\"id\": 1607429299799, \"name\": \"от 10 шт.\", \"sale\": 12, \"count\": 10}, {\"id\": 1607429298742, \"name\": \"от 100 шт.\", \"sale\": 30, \"count\": 100}]', '2020-12-08 09:55:53', '2020-12-08 09:58:27'),
(31, 1, 'magnit-neodimovyj-disk-samoklejka-1h1-mm', 1, 0, 0, 4, 0.600000, 1000, '[{\"id\": 1607429360844, \"source\": \"photos/2/product/neodim/1/a8b25edb236bd9254ec2166b11ca0f2b.jpg\"}]', '[]', '2020-12-08 09:55:58', '2020-12-09 14:49:14'),
(32, 21, 'magnit-feritovyj-disk-samoklejka-1h1-mm', 1, 0, 0, 4, 0.600000, 1000, '[{\"id\": 1607432967165, \"source\": \"photos/2/product/ferit/602ecb17431607441e692bf3aa7008d0.jpg\"}]', '[{\"id\": 1607429299799, \"name\": \"от 10 шт.\", \"sale\": 12, \"count\": 10}, {\"id\": 1607429298742, \"name\": \"от 100 шт.\", \"sale\": 30, \"count\": 100}]', '2020-12-08 10:04:56', '2020-12-08 10:10:14'),
(33, 21, 'magnit-feritovyj-disk-samoklejka-10h6-mm', 1, 0, 0, 4, 50.000000, 1000, '[{\"id\": 1607433048590, \"source\": \"photos/2/product/ferit/602ecb17431607441e692bf3aa7008d0.jpg\"}]', '[{\"id\": 1607429299799, \"name\": \"от 10 шт.\", \"sale\": 12, \"count\": 10}, {\"id\": 1607429298742, \"name\": \"от 100 шт.\", \"sale\": 30, \"count\": 100}]', '2020-12-08 10:05:04', '2020-12-15 22:36:19'),
(34, 21, 'magnit-feritovyj-sterzhen-3h6-mm', 1, 0, 0, 4, 9.100000, 1000, '[{\"id\": 1607433131251, \"source\": \"photos/2/product/ferit/5fc9706d89e9f048030ec10a70afc3e3a7139738_400_400.jpeg\"}]', '[{\"id\": 1607429299799, \"name\": \"от 10 шт.\", \"sale\": 12, \"count\": 10}, {\"id\": 1607429298742, \"name\": \"от 100 шт.\", \"sale\": 30, \"count\": 100}]', '2020-12-08 10:05:10', '2020-12-08 10:12:47'),
(35, 21, 'magnit-feritovyj-sterzhen-9h32-mm', 1, 0, 0, 4, 9.100000, 1000, '[{\"id\": 1607433210707, \"source\": \"photos/2/product/ferit/5fc9706d89e9f048030ec10a70afc3e3a7139738_400_400.jpeg\"}]', '[{\"id\": 1607429299799, \"name\": \"от 10 шт.\", \"sale\": 12, \"count\": 10}, {\"id\": 1607429298742, \"name\": \"от 100 шт.\", \"sale\": 30, \"count\": 100}]', '2020-12-08 10:05:14', '2020-12-08 10:13:33'),
(36, 21, 'magnit-feritovyj-sterzhen-4h20-mm', 1, 0, 0, 4, 9.100000, 1000, '[{\"id\": 1607433226406, \"source\": \"photos/2/product/ferit/5fc9706d89e9f048030ec10a70afc3e3a7139738_400_400.jpeg\"}]', '[{\"id\": 1607429299799, \"name\": \"от 10 шт.\", \"sale\": 12, \"count\": 10}, {\"id\": 1607429298742, \"name\": \"от 100 шт.\", \"sale\": 30, \"count\": 100}]', '2020-12-08 10:05:21', '2020-12-08 10:14:18'),
(37, 21, 'magnit-feritovyj-disk-10h6-mm', 1, 0, 0, 4, 40.000000, 1000, '[{\"id\": 1607433278482, \"source\": \"photos/2/product/ferit/602ecb17431607441e692bf3aa7008d0.jpg\"}]', '[{\"id\": 1607429299799, \"name\": \"от 10 шт.\", \"sale\": 12, \"count\": 10}, {\"id\": 1607429298742, \"name\": \"от 100 шт.\", \"sale\": 30, \"count\": 100}]', '2020-12-08 10:05:31', '2020-12-08 10:15:03'),
(38, 21, 'magnit-feritovyj-disk-1h1-mm', 1, 0, 0, 4, 0.600000, 1000, '[{\"id\": 1607900818565, \"source\": \"photos/2/product/ferit/602ecb17431607441e692bf3aa7008d0.jpg\"}, {\"id\": 1607901444248, \"source\": \"photos/2/product/ferit/5fc9706d89e9f048030ec10a70afc3e3a7139738_400_400.jpeg\"}, {\"id\": 1607900818566, \"source\": \"photos/2/product/ferit/5fc9706d89e9f048030ec10a70afc3e3a7139738_400_400.jpeg\"}, {\"id\": 1607900809008, \"source\": \"photos/2/product/ferit/602ecb17431607441e692bf3aa7008d0.jpg\"}, {\"id\": 1607900809009, \"source\": \"photos/2/product/ferit/5fc9706d89e9f048030ec10a70afc3e3a7139738_400_400.jpeg\"}, {\"id\": 1607626838852, \"source\": \"photos/2/product/ferit/602ecb17431607441e692bf3aa7008d0.jpg\"}]', '[{\"id\": 1607429299799, \"name\": \"от 10 шт.\", \"sale\": 10, \"count\": 10}, {\"id\": 1607903440315, \"name\": \"от 50 шт.\", \"sale\": 14, \"count\": 50}, {\"id\": 1607429298742, \"name\": \"от 100 шт.\", \"sale\": 18, \"count\": 100}, {\"id\": 1607903454222, \"name\": \"от 200 шт.\", \"sale\": 22, \"count\": 200}]', '2020-12-08 10:05:34', '2020-12-15 22:16:29'),
(39, 22, 'poiskovyj-magnit-odnostoronnij-mp-100-kg', 1, 0, 0, 5, 15.000000, 20, '[{\"id\": 1608295441730, \"source\": \"photos/2/product/poiscovie/mp100/f100-magniton-deshvyj-neodimovyj-poiskovyj-magnit-kupit-ukraina-z.jpg\"}, {\"id\": 1608287098521, \"source\": \"photos/2/product/poiscovie/mp100/poiskovyj-odnostoronnij-magnit-f100-dlya-poiska-metalla-v-reke-kupit-ukraina-z.jpg\"}, {\"id\": 1608295455376, \"source\": \"photos/2/product/poiscovie/mp100/poiskovyj-magnit-f100-firmy-magniton-kupit-ukraina-z_cropped_1608294779.jpg\"}, {\"id\": 1608287098518, \"source\": \"photos/2/product/poiscovie/mp100/malenkij-poiskovyj-magnit-dlya-ozera-z.jpg\"}, {\"id\": 1608287098519, \"source\": \"photos/2/product/poiscovie/mp100/korobka-dlya-khraneniya-magnita-mp100-kupit-ukraina-z.jpg\"}]', '[{\"id\": 1608285824931, \"name\": \"от 5\", \"sale\": 20, \"count\": 5}]', '2020-12-18 08:16:32', '2020-12-24 08:15:36'),
(40, 22, 'ekspeditsionnyj-poiskovyj-magnit-f-80-kg', 1, 0, 0, 5, 10.500000, 20, '[{\"id\": 1608293062895, \"source\": \"photos/2/product/poiscovie/f80/f80-ehkspedicionnyj-magnit-firmy-magniton-z.jpg\"}, {\"id\": 1608293062896, \"source\": \"photos/2/product/poiscovie/f80/f80-ehkspedicionnyj-poiskovyj-magnit-firmy-magniton-kupit-z.jpg\"}, {\"id\": 1608293062897, \"source\": \"photos/2/product/poiscovie/f80/f80-odnostoronnij-neodimovyj-poiskovyj-magnit-dlya-pokhodov-kupit-ukraina-z.jpg\"}]', '[{\"id\": 1608290986882, \"name\": \"от 5\", \"sale\": 15, \"count\": 5}]', '2020-12-18 09:19:23', '2020-12-24 08:09:44'),
(41, 22, 'poiskovyj-magnit-odnostoronnij-120-kg', 1, 0, 0, 5, 17.670000, 20, '[{\"id\": 1608296163364, \"source\": \"photos/2/product/poiscovie/mp120/poiskovyj-magnit-odnostoronnij-na-120-kg-magniton-dlya-rek-kupit.jpg\"}, {\"id\": 1608296163365, \"source\": \"photos/2/product/poiscovie/mp120/poiskovyj-magnit-odnostoronnij-na-120-kg-magniton-kupit.jpg\"}, {\"id\": 1608296163363, \"source\": \"photos/2/product/poiscovie/mp120/poiskovyj-magnit-odnostoronnij-na-120-kg-magniton-dlya-kolodcev-kupit.jpg\"}, {\"id\": 1608296163362, \"source\": \"photos/2/product/poiscovie/mp120/poiskovyj-magnit-odnostoronnij-na-120-kg-magniton-dlya-kolodcev-kupit (1).jpg\"}, {\"id\": 1608296163366, \"source\": \"photos/2/product/poiscovie/mp120/мп 120 2.png\"}]', '[{\"id\": 1608295570553, \"name\": \"от 5 шт.\", \"sale\": 16, \"count\": 5}]', '2020-12-18 10:17:53', '2020-12-24 12:49:04'),
(42, 22, 'odnostoronnij-poiskovyj-magnit-mp200', 1, 0, 0, 5, 23.214290, 20, '[{\"id\": 1608299269370, \"source\": \"photos/2/product/poiscovie/mp200/magnit-poiskoviy-odnostoronniy-200-kg.jpg\"}, {\"id\": 1608299269371, \"source\": \"photos/2/product/poiscovie/mp200/magnit-poiskoviy-odnostoronniy-200-kg-ukraine.jpg\"}, {\"id\": 1608299269372, \"source\": \"photos/2/product/poiscovie/mp200/magnit-poiskoviy-odnostoronniy-200-kg-ukraine-magniton.jpg\"}, {\"id\": 1608299269373, \"source\": \"photos/2/product/poiscovie/mp200/magnit-poiskoviy-odnostoronniy-200-kg-magniton.jpg\"}, {\"id\": 1608299269374, \"source\": \"photos/2/product/poiscovie/mp200/kupit-magnit-poiskoviy-odnostotoniy-na-200-kg11 (3).png\"}]', '[{\"id\": 1608299014509, \"name\": \"от 5 шт.\", \"sale\": 19, \"count\": 5}]', '2020-12-18 11:09:03', '2020-12-24 08:21:02'),
(43, 22, 'odnostoronnij-poiskovyj-magnit-mp300', 1, 0, 0, 5, 37.500000, 20, '[{\"id\": 1608301634372, \"source\": \"photos/2/product/poiscovie/mp300/poiskoviiy-magnit-onostoroniiy-300-kg.jpg\"}, {\"id\": 1608301634374, \"source\": \"photos/2/product/poiscovie/mp300/poiskoviiy-magnit-onostoroniiy-300-kg-magniton-ukraine.jpg\"}, {\"id\": 1608301634375, \"source\": \"photos/2/product/poiscovie/mp300/poiskoviiy-magnit-onostoroniiy-300-kg-buy-ukraine.jpg\"}, {\"id\": 1608301634373, \"source\": \"photos/2/product/poiscovie/mp300/poiskoviiy-magnit-onostoroniiy-300-kg-magniton.jpg\"}, {\"id\": 1608301634376, \"source\": \"photos/2/product/poiscovie/mp300/magnit-poiskoviy-mp-300-kg-kupit.jpg\"}]', '[{\"id\": 1608301226751, \"name\": \"от 5 шт.\", \"sale\": 7.619, \"count\": 5}]', '2020-12-18 11:51:50', '2020-12-24 06:11:25'),
(44, 22, 'odnostoronnij-poiskovyj-magnit-mp400', 1, 0, 0, 5, 46.428500, 20, '[{\"id\": 1608303842380, \"source\": \"photos/2/product/poiscovie/mp400/poiskoviiy-magnit-onostoroniiy-400-kg.jpg\"}, {\"id\": 1608303842381, \"source\": \"photos/2/product/poiscovie/mp400/poiskoviiy-magnit-onostoroniiy-400-kg-mp.jpg\"}, {\"id\": 1608303842382, \"source\": \"photos/2/product/poiscovie/mp400/poiskoviiy-magnit-onostoroniiy-400-kg-mp-magniton.jpg\"}, {\"id\": 1608303842383, \"source\": \"photos/2/product/poiscovie/mp400/poiskoviiy-magnit-onostoroniiy-400-kg-magniton.jpg\"}, {\"id\": 1608303842384, \"source\": \"photos/2/product/poiscovie/mp400/magnit-poiskoviy-400-kg-kupit.jpg\"}]', '[{\"id\": 1608303646411, \"name\": \"от 5 шт.\", \"sale\": 12, \"count\": 5}]', '2020-12-18 12:22:46', '2020-12-24 08:11:38'),
(45, 23, 'magnit-knopka-dlya-sumok-145mm', 1, 0, 0, 5, 0.164300, 1400, '[{\"id\": 1608906009810, \"source\": \"photos/2/product/18 magnit knopka/Кнопка 14,5/14-5-magnity-knopki-dlya-sumki-kupit-ukraina-z.jpg\"}, {\"id\": 1608906009811, \"source\": \"photos/2/product/18 magnit knopka/Кнопка 14,5/14-5-remontnyj-komplekt-dlya-sumki-kupit-ukraina-z.jpg\"}, {\"id\": 1608906009812, \"source\": \"photos/2/product/18 magnit knopka/Кнопка 14,5/14-5-magnity-dlya-sumki-kupit-ukraina-z.jpg\"}, {\"id\": 1608906009813, \"source\": \"photos/2/product/18 magnit knopka/Кнопка 14,5/14-5-magnitiki-knopki-dlya-sumki-kupit-ukraina-z.jpg\"}]', '[{\"id\": 1608801336611, \"name\": \"от 2 шт.\", \"sale\": 8.696, \"count\": 2}, {\"id\": 1608801882033, \"name\": \"от 3 шт.\", \"sale\": 13.043, \"count\": 3}, {\"id\": 1608801879451, \"name\": \"от 5 шт.\", \"sale\": 19.565, \"count\": 5}, {\"id\": 1608801879168, \"name\": \"от 10 шт.\", \"sale\": 23.913, \"count\": 10}, {\"id\": 1608801867922, \"name\": \"от 30 шт.\", \"sale\": 28.26, \"count\": 30}, {\"id\": 1608801867547, \"name\": \"от 50 шт.\", \"sale\": 32.609, \"count\": 50}, {\"id\": 1608801867258, \"name\": \"от 100 шт.\", \"sale\": 36.957, \"count\": 100}, {\"id\": 1608801864922, \"name\": \"от 1000 шт\", \"sale\": 43.478, \"count\": 1000}]', '2020-12-24 06:28:14', '2020-12-25 11:20:13'),
(46, 23, 'magnit-knopka-dlya-sumok-185mm', 1, 0, 0, 5, 0.210700, 1400, '[{\"id\": 1608906049156, \"source\": \"photos/2/product/18 magnit knopka/Кнопка 18,5/Rem_komplekt_magnit_dlya_sumki-z.jpg\"}, {\"id\": 1608906049153, \"source\": \"photos/2/product/18 magnit knopka/Кнопка 18,5/magnity-v-knopok-dlya-sumki-kupit-ukraina-z.jpg\"}, {\"id\": 1608906049154, \"source\": \"photos/2/product/18 magnit knopka/Кнопка 18,5/magnitnye-knopki-dlya-sumki-kupit-v-ukraine-z.jpg\"}, {\"id\": 1608906049155, \"source\": \"photos/2/product/18 magnit knopka/Кнопка 18,5/knopki-dlya-sumki-na-magnite-kupit-v-ukraine-z.jpg\"}]', '[{\"id\": 1608804411515, \"name\": \"от 2 шт.\", \"sale\": 8.475, \"count\": 2}, {\"id\": 1608805031692, \"name\": \"от 3 шт.\", \"sale\": 13.559, \"count\": 3}, {\"id\": 1608805031507, \"name\": \"от 5 шт.\", \"sale\": 18.644, \"count\": 5}, {\"id\": 1608805029188, \"name\": \"от 10 шт.\", \"sale\": 23.729, \"count\": 10}, {\"id\": 1608805029011, \"name\": \"от 30 шт.\", \"sale\": 28.814, \"count\": 30}, {\"id\": 1608805028856, \"name\": \"от 50 шт.\", \"sale\": 32.203, \"count\": 50}, {\"id\": 1608805028645, \"name\": \"от 100 шт.\", \"sale\": 37.288, \"count\": 100}, {\"id\": 1608805028445, \"name\": \"от 1000 шт.\", \"sale\": 42.373, \"count\": 1000}]', '2020-12-24 07:11:30', '2020-12-25 11:20:51'),
(47, 24, 'magnit-zamok-kub-6h6h6mm-komplekt-2-magnita', 1, 0, 0, 5, 0.453600, 1400, '[{\"id\": 1608905953416, \"source\": \"photos/2/product/19 Magnit zamok/Замок 6х6х6/магнитики купить, магнитики кубики, магнит куб с отверстием, магнит замок для сумки.jpg\"}, {\"id\": 1608905953414, \"source\": \"photos/2/product/19 Magnit zamok/Замок 6х6х6/магнит папа мама, магнитики, 2 магнитика.jpg\"}, {\"id\": 1608905953415, \"source\": \"photos/2/product/19 Magnit zamok/Замок 6х6х6/магнит бижутерия 6х6х6 мм.jpg\"}, {\"id\": 1608905953417, \"source\": \"photos/2/product/19 Magnit zamok/Замок 6х6х6/магниты на одежду, бижутерию, магниты с отверстиями.jpg\"}]', '[{\"id\": 1608811507587, \"name\": \"от 2 шт.\", \"sale\": 3.937, \"count\": 2}, {\"id\": 1608811548054, \"name\": \"от 3 шт.\", \"sale\": 8.661, \"count\": 3}, {\"id\": 1608811544798, \"name\": \"от 5 шт.\", \"sale\": 12.598, \"count\": 5}, {\"id\": 1608811540888, \"name\": \"от 10 шт.\", \"sale\": 16.535, \"count\": 10}, {\"id\": 1608811538331, \"name\": \"от 30 шт.\", \"sale\": 20.472, \"count\": 30}, {\"id\": 1608811537686, \"name\": \"от 50 шт.\", \"sale\": 25.197, \"count\": 50}, {\"id\": 1608811537101, \"name\": \"от 100 шт.\", \"sale\": 29.134, \"count\": 100}, {\"id\": 1608811536119, \"name\": \"от 1000 шт.\", \"sale\": 37.795, \"count\": 1000}]', '2020-12-24 08:07:04', '2020-12-25 11:19:16'),
(50, 24, 'magnit-zamok-diametrom-6-mm-komplekt-2-magnita', 1, 0, 0, 5, 0.303571, 1400, '[{\"id\": 1608905915824, \"source\": \"photos/2/product/19 Magnit zamok/Замок 6 мм/b810ec8486ce5d039eed4b2d90f1e95a.jpg\"}, {\"id\": 1608905915822, \"source\": \"photos/2/product/19 Magnit zamok/Замок 6 мм/edbb8c290595e0dffe147a5bee91fa96.jpg\"}, {\"id\": 1608905915823, \"source\": \"photos/2/product/19 Magnit zamok/Замок 6 мм/e79dc965f1e01819a4d64b48b18028d2.jpg\"}, {\"id\": 1608905915825, \"source\": \"photos/2/product/19 Magnit zamok/Замок 6 мм/8658a18bc55b7f5970959d71c1b4e7d1.jpg\"}]', '[{\"id\": 1608811507587, \"name\": \"от 2 шт.\", \"sale\": 4.705882353, \"count\": 2}, {\"id\": 1608811548054, \"name\": \"от 3 шт.\", \"sale\": 8.235294118, \"count\": 3}, {\"id\": 1608811544798, \"name\": \"от 5 шт.\", \"sale\": 12.94117647, \"count\": 5}, {\"id\": 1608811540888, \"name\": \"от 10 шт.\", \"sale\": 16.47058824, \"count\": 10}, {\"id\": 1608811538331, \"name\": \"от 30 шт.\", \"sale\": 21.17647059, \"count\": 30}, {\"id\": 1608811537686, \"name\": \"от 50 шт.\", \"sale\": 24.70588235, \"count\": 50}, {\"id\": 1608811537101, \"name\": \"от 100 шт.\", \"sale\": 29.41176471, \"count\": 100}, {\"id\": 1608811536119, \"name\": \"от 1000 шт.\", \"sale\": 37.64705882, \"count\": 1000}]', '2020-12-24 09:24:57', '2020-12-25 11:18:38'),
(51, 24, 'magnit-zamok-diametr-8-mm-komplekt-2-magnita', 1, 0, 0, 5, 0.460714, 1400, '[{\"id\": 1608905885247, \"source\": \"photos/2/product/19 Magnit zamok/Замок 6 мм/e79dc965f1e01819a4d64b48b18028d2.jpg\"}, {\"id\": 1608905885246, \"source\": \"photos/2/product/19 Magnit zamok/Замок 6 мм/edbb8c290595e0dffe147a5bee91fa96.jpg\"}, {\"id\": 1608905885248, \"source\": \"photos/2/product/19 Magnit zamok/Замок 6 мм/b810ec8486ce5d039eed4b2d90f1e95a.jpg\"}, {\"id\": 1608905885249, \"source\": \"photos/2/product/19 Magnit zamok/Замок 6 мм/8658a18bc55b7f5970959d71c1b4e7d1.jpg\"}]', '[{\"id\": 1608811507587, \"name\": \"от 2 шт.\", \"sale\": 3.875968992, \"count\": 2}, {\"id\": 1608811548054, \"name\": \"от 3 шт.\", \"sale\": 8.527131783, \"count\": 3}, {\"id\": 1608811544798, \"name\": \"от 5 шт.\", \"sale\": 12.40310078, \"count\": 5}, {\"id\": 1608811540888, \"name\": \"от 10 шт.\", \"sale\": 16.27906977, \"count\": 10}, {\"id\": 1608811538331, \"name\": \"от 30 шт.\", \"sale\": 20.93023256, \"count\": 30}, {\"id\": 1608811537686, \"name\": \"от 50 шт.\", \"sale\": 24.80620155, \"count\": 50}, {\"id\": 1608811537101, \"name\": \"от 100 шт.\", \"sale\": 29.45736434, \"count\": 100}, {\"id\": 1608811536119, \"name\": \"от 1000 шт.\", \"sale\": 37.20930233, \"count\": 1000}]', '2020-12-24 11:26:09', '2020-12-25 11:18:08'),
(52, 24, 'magnit-zamok-diametrom-10-mm-komplekt-2-magnita', 1, 0, 0, 5, 0.707143, 1400, '[{\"id\": 1608905826647, \"source\": \"photos/2/product/19 Magnit zamok/Замок 6 мм/8658a18bc55b7f5970959d71c1b4e7d1.jpg\"}, {\"id\": 1608905826644, \"source\": \"photos/2/product/19 Magnit zamok/Замок 6 мм/edbb8c290595e0dffe147a5bee91fa96.jpg\"}, {\"id\": 1608905826646, \"source\": \"photos/2/product/19 Magnit zamok/Замок 6 мм/b810ec8486ce5d039eed4b2d90f1e95a.jpg\"}, {\"id\": 1608905826645, \"source\": \"photos/2/product/19 Magnit zamok/Замок 6 мм/e79dc965f1e01819a4d64b48b18028d2.jpg\"}]', '[{\"id\": 1608811507587, \"name\": \"от 2 шт.\", \"sale\": 4.545454545, \"count\": 2}, {\"id\": 1608811548054, \"name\": \"от 3 шт.\", \"sale\": 8.585858586, \"count\": 3}, {\"id\": 1608811544798, \"name\": \"от 5 шт.\", \"sale\": 12.62626263, \"count\": 5}, {\"id\": 1608811540888, \"name\": \"от 10 шт.\", \"sale\": 16.66666667, \"count\": 10}, {\"id\": 1608811538331, \"name\": \"от 30 шт.\", \"sale\": 21.21212121, \"count\": 30}, {\"id\": 1608811537686, \"name\": \"от 50 шт.\", \"sale\": 25.25252525, \"count\": 50}, {\"id\": 1608811537101, \"name\": \"от 100 шт.\", \"sale\": 29.29292929, \"count\": 100}, {\"id\": 1608811536119, \"name\": \"от 1000 шт.\", \"sale\": 37.87878788, \"count\": 1000}]', '2020-12-24 11:35:22', '2020-12-25 11:17:25'),
(53, 22, 'poiskovyj-magnit-dvuhstoronnij-mp-2h120-kg', 1, 0, 0, 5, 30.357143, 20, '[{\"id\": 1608824275727, \"source\": \"photos/2/product/poiscovie/МП 120х2/magnit-poiskovii-dvostoroniiy-120-kg.jpg\"}, {\"id\": 1608824275725, \"source\": \"photos/2/product/poiscovie/МП 120х2/mp2x120 4.jpg\"}, {\"id\": 1608824275728, \"source\": \"photos/2/product/poiscovie/МП 120х2/magnit-poiskovii-dvostoroniiy-120-kg-magniton-ukraine.jpg\"}, {\"id\": 1608824275726, \"source\": \"photos/2/product/poiscovie/МП 120х2/mp120-2-kupit-ukraine-magnit.jpg\"}]', '[{\"id\": 1608295570553, \"name\": \"от 5 шт.\", \"sale\": 10, \"count\": 5}]', '2020-12-24 12:29:42', '2020-12-24 12:48:36'),
(54, 1, 'magnit-neodimovyj-shar-5-mm', 1, 0, 0, 5, 0.085714, NULL, '[{\"id\": 1608906084064, \"source\": \"photos/2/product/15 Shary/Шар 5 мм Ni/a2fb584b39e77658e4f8b2207dff0035.jpg\"}]', '[{\"id\": 1608886595863, \"name\": \"от 2 шт.\", \"sale\": 4.166666667, \"count\": 2}, {\"id\": 1608886592919, \"name\": \"от 3 шт.\", \"sale\": 8.333333333, \"count\": 3}, {\"id\": 1608886592701, \"name\": \"от 5 шт.\", \"sale\": 16.66666667, \"count\": 5}, {\"id\": 1608886586919, \"name\": \"от 10 шт.\", \"sale\": 20.83333333, \"count\": 10}, {\"id\": 1608886586359, \"name\": \"от 30 шт.\", \"sale\": 25, \"count\": 30}, {\"id\": 1608886585916, \"name\": \"от 50 шт.\", \"sale\": 29.16666667, \"count\": 50}, {\"id\": 1608886585385, \"name\": \"от 100 шт.\", \"sale\": 33.33333333, \"count\": 100}, {\"id\": 1608886584658, \"name\": \"от 1000 шт.\", \"sale\": 41.66666667, \"count\": 1000}]', '2020-12-25 06:20:55', '2020-12-25 11:22:09'),
(55, 1, 'magnit-d8-mm-h-h1-mm-samoklejka', 0, 0, 0, 5, 0.096429, NULL, '[{\"id\": 1608906202237, \"source\": \"photos/2/product/5 Magnit samokleika/8x1(3M)/20x1-samokleyushchijsya-neodimovyj-magnit-kupit-ukraina-z.jpg\"}, {\"id\": 1608906202238, \"source\": \"photos/2/product/5 Magnit samokleika/8x1(3M)/20x1-s-klevym-sloem-neodimovyj-magnit-kupit-ukraina-z.jpg\"}, {\"id\": 1608906202239, \"source\": \"photos/2/product/5 Magnit samokleika/8x1(3M)/20x1-s-klevym-sloem-neodimovyj-magnit-dlya-tablichek-kupit-ukraina-z.jpg\"}, {\"id\": 1608906202240, \"source\": \"photos/2/product/5 Magnit samokleika/8x1(3M)/20x1-s-klevym-sloem-neodimovyj-magnit-dlya-reklamy-kupit-ukraina-z.jpg\"}, {\"id\": 1608906202236, \"source\": \"photos/2/product/5 Magnit samokleika/8x1(3M)/20x1-udobnyj-neodimovyj-magnit-disk-s-klevym-sloem-kupit-ukraina-z.jpg\"}]', '[{\"id\": 1608891073112, \"name\": \"от 2 шт.\", \"sale\": 3.703703704, \"count\": 2}, {\"id\": 1608891072461, \"name\": \"от 3 шт.\", \"sale\": 7.407407407, \"count\": 3}, {\"id\": 1608891071825, \"name\": \"от 5 шт.\", \"sale\": 11.11111111, \"count\": 5}, {\"id\": 1608891071241, \"name\": \"от 10 шт.\", \"sale\": 18.51851852, \"count\": 10}, {\"id\": 1608891069842, \"name\": \"от 30 шт.\", \"sale\": 22.22222222, \"count\": 30}, {\"id\": 1608891069323, \"name\": \"от 50 шт.\", \"sale\": 25.92592593, \"count\": 50}, {\"id\": 1608891068914, \"name\": \"от 100 шт.\", \"sale\": 29.62962963, \"count\": 100}, {\"id\": 1608891068576, \"name\": \"от 1000 шт.\", \"sale\": 40.74074074, \"count\": 1000}]', '2020-12-25 07:21:06', '2020-12-25 11:23:28'),
(56, 1, 'magnit-neodimovyj-s-kryuchkom-e10', 1, 0, 0, 5, 0.717860, 3000, '[{\"id\": 1609247195238, \"source\": \"photos/2/product/13. MAGNITY NEODIMOVYE KREPEZhNYE V KORPUSE/Е/Е10/e10-neodimovyj-magnit-derzhatel-v-korpuse-s-kryuchkom-kupit-v-ukraine-z.jpg\"}, {\"id\": 1609247195236, \"source\": \"photos/2/product/13. MAGNITY NEODIMOVYE KREPEZhNYE V KORPUSE/Е/Е10/e10-neodimovyj-magnit-v-korpuse-s-kryuchkom-dlya-kukhonnoj-prenadlezhnostej-kupit-v-ukraine-z.jpg\"}, {\"id\": 1609247195237, \"source\": \"photos/2/product/13. MAGNITY NEODIMOVYE KREPEZhNYE V KORPUSE/Е/Е10/e10-neodimovyj-magnit-v-korpuse-dlya-lampochek-kupit-v-ukraine-z.jpg\"}, {\"id\": 1609247195235, \"source\": \"photos/2/product/13. MAGNITY NEODIMOVYE KREPEZhNYE V KORPUSE/Е/Е10/e10-neodimovyj-magnit-v-korpuse-s-kryuchkom-dlya-plakatov-kupit-v-ukraine-z.jpg\"}]', '[]', '2020-12-29 10:10:00', '2020-12-29 10:26:16'),
(57, 22, 'sumka-dlya-poiskovogo-magnita-tsvet-kamuflyazh', 1, 0, 0, 5, 8.928570, 20, '[{\"id\": 1609332132057, \"source\": \"photos/2/product/10 aksessuary  dlya poiskovykh magnitov/Sumka kamuflyazh/IMG_20190613_140512.jpg\"}, {\"id\": 1609332132058, \"source\": \"photos/2/product/10 aksessuary  dlya poiskovykh magnitov/Sumka kamuflyazh/IMG_20190613_140518.jpg\"}, {\"id\": 1609332132059, \"source\": \"photos/2/product/10 aksessuary  dlya poiskovykh magnitov/Sumka kamuflyazh/IMG_20190613_140529.jpg\"}, {\"id\": 1609332132060, \"source\": \"photos/2/product/10 aksessuary  dlya poiskovykh magnitov/Sumka kamuflyazh/IMG_20190613_140613.jpg\"}, {\"id\": 1609332132061, \"source\": \"photos/2/product/10 aksessuary  dlya poiskovykh magnitov/Sumka kamuflyazh/IMG_20190613_140624.jpg\"}, {\"id\": 1609332132062, \"source\": \"photos/2/product/10 aksessuary  dlya poiskovykh magnitov/Sumka kamuflyazh/IMG_20190613_140926.jpg\"}]', '[]', '2020-12-30 09:44:49', '2020-12-30 09:49:07');

-- --------------------------------------------------------

INSERT INTO `reviews` (`id`, `product_id`, `name`, `email`, `message`, `rating`, `created_at`, `updated_at`) VALUES
(81, 30, 'Первый Пользователь', 'first.user@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 4, '2020-12-15 18:50:04', '2020-12-15 18:50:04'),
(82, 30, 'Второй пользователь', 'second.user@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 5, '2020-12-15 19:01:02', '2020-12-15 19:01:02'),
(83, 30, 'Третий Пользователь', 'third.user@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 5, '2020-12-15 19:03:36', '2020-12-15 19:03:36'),
(87, 30, 'Четвертый пользователь', 'fourth.user@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 4, '2020-12-15 19:13:12', '2020-12-15 19:13:12'),
(88, 30, 'Пятый пользователь', 'fifth.user@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 5, '2020-12-15 19:15:47', '2020-12-15 19:15:47'),
(89, 31, 'Удовиченко', 'jae1981@i.ua', 'офигенно клевые попались магниты!', 3, '2020-12-22 07:27:45', '2020-12-22 07:27:45');

--
-- Дамп данных таблицы `subs`
--

INSERT INTO `subs` (`id`, `groups_id`, `slug`, `status`, `order`, `created_at`, `updated_at`) VALUES
(78, 28, '11-20-kg', 1, 15, '2020-12-08 07:12:36', '2020-12-31 06:48:30'),
(79, 28, '21-50-kg', 1, 16, '2020-12-08 07:12:36', '2020-12-31 06:48:30'),
(80, 28, '51-100-kg', 1, 17, '2020-12-08 07:12:36', '2020-12-31 06:48:30'),
(81, 28, '101-200-kg', 1, 18, '2020-12-08 07:12:36', '2020-12-31 06:48:30'),
(82, 28, '201-1000-kg', 1, 19, '2020-12-08 07:12:36', '2020-12-31 06:48:30'),
(83, 36, 'samoklejki', 1, 49, '2020-12-08 07:41:15', '2020-12-31 06:48:33'),
(84, 36, 'vysokotemperaturnye', 1, 50, '2020-12-08 07:41:43', '2020-12-31 06:48:33'),
(85, 36, 's-diametralnoj-namagnichennostyu', 1, 51, '2020-12-08 07:42:31', '2020-12-31 06:48:33'),
(86, 28, '6-10-kg', 1, 14, '2020-12-08 08:13:04', '2020-12-31 06:48:30'),
(87, 28, '1-5-kg', 1, 13, '2020-12-08 08:13:39', '2020-12-31 06:48:30'),
(88, 29, '1-3-mm', 1, 20, '2020-12-08 08:14:33', '2020-12-31 06:48:31'),
(89, 29, '4-8-mm', 1, 21, '2020-12-08 08:17:22', '2020-12-31 06:48:31'),
(90, 29, '9-15-mm', 1, 22, '2020-12-08 08:18:54', '2020-12-31 06:48:31'),
(91, 29, '16-30-mm', 1, 23, '2020-12-08 08:20:30', '2020-12-31 06:48:31'),
(92, 29, '31-50-mm', 1, 24, '2020-12-08 08:21:07', '2020-12-31 06:48:31'),
(93, 28, 'do-1-kg', 1, 12, '2020-12-08 08:22:38', '2020-12-31 06:48:30'),
(94, 44, 'neodim', 1, 1, '2020-12-08 08:41:00', '2020-12-31 06:48:29'),
(95, 44, 'ferit', 1, 2, '2020-12-08 08:42:07', '2020-12-31 06:48:29'),
(96, 45, 'disk', 1, 3, '2020-12-08 08:44:47', '2020-12-31 06:48:29'),
(97, 45, 'sterzhen', 1, 4, '2020-12-08 08:44:47', '2020-12-31 06:48:29'),
(98, 46, '1-3-mm', 1, 27, '2020-12-08 08:50:33', '2020-12-31 06:48:31'),
(99, 46, '4-8-mm', 1, 28, '2020-12-08 08:50:33', '2020-12-31 06:48:31'),
(100, 46, '9-15-mm', 1, 29, '2020-12-08 08:50:33', '2020-12-31 06:48:31'),
(101, 46, '16-30-mm', 1, 30, '2020-12-08 08:50:33', '2020-12-31 06:48:31'),
(102, 46, '31-50-mm', 1, 31, '2020-12-08 08:50:33', '2020-12-31 06:48:31'),
(103, 47, '1-3-mm', 1, 34, '2020-12-08 08:52:25', '2020-12-31 06:48:32'),
(104, 47, '4-8-mm', 1, 35, '2020-12-08 08:52:25', '2020-12-31 06:48:32'),
(105, 47, '9-15-mm', 1, 36, '2020-12-08 08:52:25', '2020-12-31 06:48:32'),
(106, 47, '16-30-mm', 1, 37, '2020-12-08 08:52:25', '2020-12-31 06:48:32'),
(107, 47, '31-50-mm', 1, 38, '2020-12-08 08:52:25', '2020-12-31 06:48:32'),
(108, 41, '1-3-mm', 1, 41, '2020-12-08 08:53:24', '2020-12-31 06:48:32'),
(109, 41, '4-8-mm', 1, 42, '2020-12-08 08:53:29', '2020-12-31 06:48:32'),
(110, 41, '9-15-mm', 1, 43, '2020-12-08 08:53:34', '2020-12-31 06:48:33'),
(111, 41, '16-30-mm', 1, 44, '2020-12-08 08:53:37', '2020-12-31 06:48:33'),
(112, 41, '31-50-mm', 1, 45, '2020-12-08 08:53:40', '2020-12-31 06:48:33'),
(113, 50, 'da', 1, 22, '2020-12-17 11:29:29', '2021-01-04 08:57:57'),
(114, 49, 'odnostornnij', 1, 25, '2020-12-17 11:37:32', '2021-01-04 08:57:58'),
(115, 49, 'dvuhstoronnij', 1, 24, '2020-12-17 11:39:38', '2021-01-04 08:57:58'),
(116, 50, 'net', 1, 21, '2020-12-17 11:51:35', '2021-01-04 08:57:57'),
(117, 51, 'm8', 1, 17, '2020-12-17 11:57:45', '2021-01-04 08:57:57'),
(118, 51, 'm10', 1, 18, '2020-12-17 11:58:11', '2021-01-04 08:57:57'),
(119, 51, 'm12', 1, 19, '2020-12-17 11:59:05', '2021-01-04 08:57:57'),
(120, 51, 'm14', 1, 20, '2020-12-17 11:59:36', '2021-01-04 08:57:57'),
(121, 52, 'magniton', 1, 16, '2020-12-17 12:19:44', '2021-01-04 08:57:57'),
(122, 52, 'redmag', 1, 15, '2020-12-17 12:21:00', '2021-01-04 08:57:57'),
(123, 52, 'triton', 1, 14, '2020-12-17 12:22:35', '2021-01-04 08:57:57'),
(124, 52, 'nepra', 1, 13, '2020-12-17 12:23:23', '2021-01-04 08:57:57'),
(125, 52, 'kitaj', 1, 12, '2020-12-17 12:24:55', '2021-01-04 08:57:57'),
(126, 55, 'tsink', 1, 11, '2020-12-17 12:28:56', '2021-01-04 08:57:56'),
(127, 55, 'tsinktsvet', 0, 10, '2020-12-17 12:30:15', '2021-01-04 08:57:56'),
(128, 55, 'nikel-med-nikel', 1, 9, '2020-12-17 12:31:40', '2021-01-04 08:57:56'),
(129, 28, 'do-05-kg', 1, 11, '2020-12-24 13:20:46', '2020-12-31 06:48:30'),
(130, 45, 'shar', 1, 9, '2020-12-25 05:41:08', '2020-12-31 06:48:30'),
(131, 45, 'pryamougolnik', 1, 5, '2020-12-28 09:56:08', '2020-12-31 06:48:29'),
(132, 45, 'kub', 1, 7, '2020-12-28 09:56:47', '2020-12-31 06:48:29'),
(133, 45, 'koltso', 1, 8, '2020-12-28 09:58:03', '2020-12-31 06:48:29'),
(134, 45, 'kvadrat', 1, 6, '2020-12-28 10:01:55', '2020-12-31 06:48:29'),
(135, 36, 'krepezhnyj', 1, 48, '2020-12-28 10:03:07', '2020-12-31 06:48:33'),
(136, 56, 'sumka', 1, 5, '2020-12-28 10:35:33', '2021-01-04 08:57:56'),
(137, 56, 'shnur', 1, 3, '2020-12-28 10:43:56', '2021-01-04 08:57:56'),
(138, 56, 'rym-bolt', 1, 7, '2020-12-28 10:47:23', '2021-01-04 08:57:56'),
(139, 56, 'karabin', 1, 6, '2020-12-28 10:50:12', '2021-01-04 08:57:56'),
(140, 56, 'kryuk', 1, 8, '2020-12-28 10:51:19', '2021-01-04 08:57:56'),
(141, 56, 'perchatki', 1, 4, '2020-12-28 10:51:55', '2021-01-04 08:57:56'),
(142, 57, 'shnur-dlya-telefona', 1, NULL, '2020-12-28 11:01:15', '2020-12-28 11:01:15'),
(143, 57, 'derzhatel-dlya-telefona', 1, NULL, '2020-12-28 11:05:36', '2020-12-28 11:05:36'),
(144, 58, 'bez-korpusa', 1, 1, '2020-12-29 07:05:00', '2021-01-04 08:33:10'),
(145, 58, 'tip-apod-samorez', 1, 2, '2020-12-29 07:12:54', '2021-01-04 08:33:10'),
(146, 58, 'tip-v-pod-vint', 1, 3, '2020-12-29 07:15:43', '2021-01-04 08:33:10'),
(147, 58, 'tip-s-s-naruzhnoj-rezboj', 1, 4, '2020-12-29 07:28:24', '2021-01-04 08:33:10'),
(148, 58, 'tip-d-s-rezboj-v-bobyshke', 1, 5, '2020-12-29 09:49:45', '2021-01-04 08:33:11'),
(149, 58, 'tip-e-s-kryuchkom', 1, 6, '2020-12-29 09:52:52', '2021-01-04 08:33:11'),
(150, 58, 'tip-f-s-rym-boltom', 1, 7, '2020-12-29 09:56:00', '2021-01-04 08:33:11'),
(151, 49, 'aksessuary', 1, 23, '2020-12-30 09:47:55', '2021-01-04 08:57:58'),
(152, 61, 'klej', 1, NULL, '2020-12-30 10:15:24', '2020-12-30 10:15:24'),
(153, 61, 'zaschitnaya-prokladka', 1, NULL, '2020-12-30 10:16:13', '2020-12-30 10:16:13'),
(154, 45, 'segment', 1, 10, '2020-12-30 11:20:16', '2020-12-31 06:48:30'),
(155, 62, 'neokub', 1, 1, '2020-12-30 11:34:06', '2020-12-30 11:40:20'),
(156, 62, 'tetrakub', 1, 2, '2020-12-30 11:34:49', '2020-12-30 11:40:20'),
(157, 62, 'schebetuny', 1, 3, '2020-12-30 11:37:32', '2020-12-30 11:40:20'),
(158, 62, 'konstruktor', 1, 4, '2020-12-30 11:38:07', '2020-12-30 11:40:20'),
(159, 62, 'kubiki', 1, 5, '2020-12-30 11:38:41', '2020-12-30 11:40:20'),
(160, 62, 'drugie', 1, 6, '2020-12-30 11:40:14', '2020-12-30 11:40:20'),
(161, 63, 'magnitnaya-lenta', 1, 1, '2020-12-30 11:47:04', '2021-01-04 08:54:18'),
(162, 63, 'rulon', 1, 3, '2020-12-30 11:47:47', '2021-01-04 08:53:34'),
(163, 63, 'list-a1', 1, 4, '2020-12-30 11:48:33', '2021-01-04 08:53:34'),
(164, 63, 'list-a2', 1, 5, '2020-12-30 11:48:53', '2021-01-04 08:53:34'),
(165, 63, 'list-a3', 1, 6, '2020-12-30 11:49:13', '2021-01-04 08:53:34'),
(166, 63, 'list-a4', 1, 7, '2020-12-30 11:49:32', '2021-01-04 08:53:34'),
(167, 63, 'list-a5', 1, 8, '2020-12-30 11:49:48', '2021-01-04 08:53:34'),
(168, 63, 'list-a6', 1, 9, '2020-12-30 11:50:50', '2021-01-04 08:53:35'),
(169, 29, '51-100-mm', 1, 25, '2020-12-31 06:40:11', '2020-12-31 06:48:31'),
(170, 46, '51-100-mm', 1, 32, '2020-12-31 06:40:40', '2020-12-31 06:48:32'),
(171, 47, '51-100-mm', 1, 39, '2020-12-31 06:41:30', '2020-12-31 06:48:32'),
(172, 41, '51-100-mm', 1, 46, '2020-12-31 06:42:03', '2020-12-31 06:48:33'),
(173, 29, '101-mm', 1, 26, '2020-12-31 06:45:51', '2020-12-31 06:48:31'),
(174, 46, '101-mm', 1, 33, '2020-12-31 06:46:29', '2020-12-31 06:48:32'),
(175, 47, '101-mm', 1, 40, '2020-12-31 06:47:11', '2020-12-31 06:48:32'),
(176, 41, '101-mm', 1, 47, '2020-12-31 06:47:49', '2020-12-31 06:48:33'),
(177, 64, '60-140-kg', 1, 2, '2020-12-31 06:51:40', '2021-01-04 08:57:56'),
(178, 64, '141-290-kg', 1, 1, '2020-12-31 06:52:19', '2021-01-04 08:57:55'),
(179, 65, 'n52', 1, NULL, '2020-12-31 08:24:28', '2020-12-31 08:24:40'),
(180, 65, 'n50', 1, NULL, '2020-12-31 08:25:02', '2020-12-31 08:25:02'),
(181, 65, 'n48', 1, NULL, '2020-12-31 08:25:22', '2020-12-31 08:25:29'),
(182, 65, 'n45', 1, NULL, '2020-12-31 08:25:52', '2020-12-31 08:25:52'),
(183, 65, 'n42', 1, NULL, '2020-12-31 08:27:36', '2020-12-31 08:27:36'),
(184, 65, 'n40', 1, NULL, '2020-12-31 08:28:00', '2020-12-31 08:28:00'),
(185, 65, 'n38', 1, NULL, '2020-12-31 08:28:14', '2020-12-31 08:28:14'),
(186, 65, 'n35', 1, NULL, '2020-12-31 08:28:30', '2020-12-31 08:28:30'),
(187, 63, 'magnitnyj-vinil', 1, 2, '2021-01-04 08:53:25', '2021-01-04 08:53:34');

--
-- Дамп данных таблицы `subs_in_products`
--

INSERT INTO `subs_in_products` (`id`, `subs_id`, `product_id`, `created_at`, `updated_at`) VALUES
(158, 94, 24, '2020-12-08 09:18:04', '2020-12-08 09:18:04'),
(159, 96, 24, '2020-12-08 09:18:04', '2020-12-08 09:18:04'),
(160, 93, 24, '2020-12-08 09:18:04', '2020-12-08 09:18:04'),
(161, 88, 24, '2020-12-08 09:18:04', '2020-12-08 09:18:04'),
(162, 98, 24, '2020-12-08 09:18:04', '2020-12-08 09:18:04'),
(195, 94, 27, '2020-12-08 09:46:45', '2020-12-08 09:46:45'),
(196, 97, 27, '2020-12-08 09:46:45', '2020-12-08 09:46:45'),
(197, 93, 27, '2020-12-08 09:46:45', '2020-12-08 09:46:45'),
(198, 89, 27, '2020-12-08 09:46:45', '2020-12-08 09:46:45'),
(199, 106, 27, '2020-12-08 09:46:45', '2020-12-08 09:46:45'),
(215, 94, 29, '2020-12-08 09:53:44', '2020-12-08 09:53:44'),
(216, 97, 29, '2020-12-08 09:53:44', '2020-12-08 09:53:44'),
(217, 87, 29, '2020-12-08 09:53:44', '2020-12-08 09:53:44'),
(218, 88, 29, '2020-12-08 09:53:44', '2020-12-08 09:53:44'),
(219, 104, 29, '2020-12-08 09:53:44', '2020-12-08 09:53:44'),
(220, 94, 28, '2020-12-08 09:53:59', '2020-12-08 09:53:59'),
(221, 97, 28, '2020-12-08 09:53:59', '2020-12-08 09:53:59'),
(222, 86, 28, '2020-12-08 09:53:59', '2020-12-08 09:53:59'),
(223, 90, 28, '2020-12-08 09:53:59', '2020-12-08 09:53:59'),
(224, 107, 28, '2020-12-08 09:53:59', '2020-12-08 09:53:59'),
(241, 94, 30, '2020-12-08 09:58:27', '2020-12-08 09:58:27'),
(242, 96, 30, '2020-12-08 09:58:27', '2020-12-08 09:58:27'),
(243, 87, 30, '2020-12-08 09:58:27', '2020-12-08 09:58:27'),
(244, 90, 30, '2020-12-08 09:58:27', '2020-12-08 09:58:27'),
(245, 99, 30, '2020-12-08 09:58:27', '2020-12-08 09:58:27'),
(246, 83, 30, '2020-12-08 09:58:27', '2020-12-08 09:58:27'),
(284, 96, 32, '2020-12-08 10:10:14', '2020-12-08 10:10:14'),
(285, 93, 32, '2020-12-08 10:10:14', '2020-12-08 10:10:14'),
(286, 88, 32, '2020-12-08 10:10:14', '2020-12-08 10:10:14'),
(287, 98, 32, '2020-12-08 10:10:14', '2020-12-08 10:10:14'),
(288, 83, 32, '2020-12-08 10:10:14', '2020-12-08 10:10:14'),
(289, 95, 32, '2020-12-08 10:10:14', '2020-12-08 10:10:14'),
(296, 97, 34, '2020-12-08 10:12:47', '2020-12-08 10:12:47'),
(297, 87, 34, '2020-12-08 10:12:47', '2020-12-08 10:12:47'),
(298, 88, 34, '2020-12-08 10:12:47', '2020-12-08 10:12:47'),
(299, 104, 34, '2020-12-08 10:12:47', '2020-12-08 10:12:47'),
(300, 95, 34, '2020-12-08 10:12:47', '2020-12-08 10:12:47'),
(306, 97, 35, '2020-12-08 10:13:33', '2020-12-08 10:13:33'),
(307, 86, 35, '2020-12-08 10:13:33', '2020-12-08 10:13:33'),
(308, 90, 35, '2020-12-08 10:13:33', '2020-12-08 10:13:33'),
(309, 107, 35, '2020-12-08 10:13:33', '2020-12-08 10:13:33'),
(310, 95, 35, '2020-12-08 10:13:33', '2020-12-08 10:13:33'),
(316, 97, 36, '2020-12-08 10:14:18', '2020-12-08 10:14:18'),
(317, 93, 36, '2020-12-08 10:14:18', '2020-12-08 10:14:18'),
(318, 89, 36, '2020-12-08 10:14:18', '2020-12-08 10:14:18'),
(319, 106, 36, '2020-12-08 10:14:18', '2020-12-08 10:14:18'),
(320, 95, 36, '2020-12-08 10:14:18', '2020-12-08 10:14:18'),
(321, 96, 37, '2020-12-08 10:15:03', '2020-12-08 10:15:03'),
(322, 87, 37, '2020-12-08 10:15:03', '2020-12-08 10:15:03'),
(323, 90, 37, '2020-12-08 10:15:03', '2020-12-08 10:15:03'),
(324, 99, 37, '2020-12-08 10:15:03', '2020-12-08 10:15:03'),
(325, 95, 37, '2020-12-08 10:15:03', '2020-12-08 10:15:03'),
(344, 94, 31, '2020-12-09 14:49:14', '2020-12-09 14:49:14'),
(345, 96, 31, '2020-12-09 14:49:14', '2020-12-09 14:49:14'),
(346, 93, 31, '2020-12-09 14:49:14', '2020-12-09 14:49:14'),
(347, 88, 31, '2020-12-09 14:49:14', '2020-12-09 14:49:14'),
(348, 98, 31, '2020-12-09 14:49:14', '2020-12-09 14:49:14'),
(349, 83, 31, '2020-12-09 14:49:14', '2020-12-09 14:49:14'),
(683, 93, 38, '2020-12-15 22:16:29', '2020-12-15 22:16:29'),
(684, 88, 38, '2020-12-15 22:16:29', '2020-12-15 22:16:29'),
(685, 98, 38, '2020-12-15 22:16:29', '2020-12-15 22:16:29'),
(686, 95, 38, '2020-12-15 22:16:29', '2020-12-15 22:16:29'),
(687, 96, 38, '2020-12-15 22:16:29', '2020-12-15 22:16:29'),
(688, 87, 33, '2020-12-15 22:36:19', '2020-12-15 22:36:19'),
(689, 90, 33, '2020-12-15 22:36:19', '2020-12-15 22:36:19'),
(690, 99, 33, '2020-12-15 22:36:19', '2020-12-15 22:36:19'),
(691, 83, 33, '2020-12-15 22:36:19', '2020-12-15 22:36:19'),
(692, 96, 33, '2020-12-15 22:36:19', '2020-12-15 22:36:19'),
(693, 95, 33, '2020-12-15 22:36:19', '2020-12-15 22:36:19'),
(694, 94, 25, '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(695, 96, 25, '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(696, 87, 25, '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(697, 90, 25, '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(698, 99, 25, '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(857, 121, 43, '2020-12-24 06:11:25', '2020-12-24 06:11:25'),
(858, 118, 43, '2020-12-24 06:11:25', '2020-12-24 06:11:25'),
(859, 113, 43, '2020-12-24 06:11:25', '2020-12-24 06:11:25'),
(860, 114, 43, '2020-12-24 06:11:25', '2020-12-24 06:11:25'),
(861, 94, 43, '2020-12-24 06:11:25', '2020-12-24 06:11:25'),
(862, 128, 43, '2020-12-24 06:11:25', '2020-12-24 06:11:25'),
(901, 128, 40, '2020-12-24 08:09:45', '2020-12-24 08:09:45'),
(902, 125, 40, '2020-12-24 08:09:45', '2020-12-24 08:09:45'),
(903, 117, 40, '2020-12-24 08:09:45', '2020-12-24 08:09:45'),
(904, 116, 40, '2020-12-24 08:09:45', '2020-12-24 08:09:45'),
(905, 114, 40, '2020-12-24 08:09:45', '2020-12-24 08:09:45'),
(906, 94, 40, '2020-12-24 08:09:45', '2020-12-24 08:09:45'),
(907, 80, 40, '2020-12-24 08:09:45', '2020-12-24 08:09:45'),
(928, 128, 44, '2020-12-24 08:11:38', '2020-12-24 08:11:38'),
(929, 121, 44, '2020-12-24 08:11:38', '2020-12-24 08:11:38'),
(930, 118, 44, '2020-12-24 08:11:38', '2020-12-24 08:11:38'),
(931, 113, 44, '2020-12-24 08:11:38', '2020-12-24 08:11:38'),
(932, 114, 44, '2020-12-24 08:11:38', '2020-12-24 08:11:38'),
(933, 94, 44, '2020-12-24 08:11:38', '2020-12-24 08:11:38'),
(940, 128, 39, '2020-12-24 08:15:36', '2020-12-24 08:15:36'),
(941, 121, 39, '2020-12-24 08:15:36', '2020-12-24 08:15:36'),
(942, 117, 39, '2020-12-24 08:15:36', '2020-12-24 08:15:36'),
(943, 113, 39, '2020-12-24 08:15:36', '2020-12-24 08:15:36'),
(944, 114, 39, '2020-12-24 08:15:36', '2020-12-24 08:15:36'),
(945, 94, 39, '2020-12-24 08:15:36', '2020-12-24 08:15:36'),
(952, 126, 42, '2020-12-24 08:21:02', '2020-12-24 08:21:02'),
(953, 121, 42, '2020-12-24 08:21:02', '2020-12-24 08:21:02'),
(954, 118, 42, '2020-12-24 08:21:02', '2020-12-24 08:21:02'),
(955, 113, 42, '2020-12-24 08:21:02', '2020-12-24 08:21:02'),
(956, 114, 42, '2020-12-24 08:21:02', '2020-12-24 08:21:02'),
(957, 94, 42, '2020-12-24 08:21:02', '2020-12-24 08:21:02'),
(978, 121, 53, '2020-12-24 12:48:36', '2020-12-24 12:48:36'),
(979, 118, 53, '2020-12-24 12:48:37', '2020-12-24 12:48:37'),
(980, 94, 53, '2020-12-24 12:48:37', '2020-12-24 12:48:37'),
(981, 81, 53, '2020-12-24 12:48:37', '2020-12-24 12:48:37'),
(982, 113, 53, '2020-12-24 12:48:37', '2020-12-24 12:48:37'),
(983, 128, 53, '2020-12-24 12:48:37', '2020-12-24 12:48:37'),
(984, 115, 53, '2020-12-24 12:48:37', '2020-12-24 12:48:37'),
(985, 126, 41, '2020-12-24 12:49:04', '2020-12-24 12:49:04'),
(986, 121, 41, '2020-12-24 12:49:04', '2020-12-24 12:49:04'),
(987, 118, 41, '2020-12-24 12:49:04', '2020-12-24 12:49:04'),
(988, 114, 41, '2020-12-24 12:49:04', '2020-12-24 12:49:04'),
(989, 94, 41, '2020-12-24 12:49:04', '2020-12-24 12:49:04'),
(990, 81, 41, '2020-12-24 12:49:04', '2020-12-24 12:49:04'),
(991, 113, 41, '2020-12-24 12:49:04', '2020-12-24 12:49:04'),
(1007, 94, 52, '2020-12-25 11:17:26', '2020-12-25 11:17:26'),
(1008, 94, 51, '2020-12-25 11:18:08', '2020-12-25 11:18:08'),
(1009, 94, 50, '2020-12-25 11:18:38', '2020-12-25 11:18:38'),
(1010, 94, 47, '2020-12-25 11:19:16', '2020-12-25 11:19:16'),
(1012, 94, 45, '2020-12-25 11:20:13', '2020-12-25 11:20:13'),
(1013, 94, 46, '2020-12-25 11:20:51', '2020-12-25 11:20:51'),
(1014, 94, 54, '2020-12-25 11:22:09', '2020-12-25 11:22:09'),
(1015, 130, 54, '2020-12-25 11:22:09', '2020-12-25 11:22:09'),
(1016, 94, 55, '2020-12-25 11:23:28', '2020-12-25 11:23:28'),
(1017, 96, 55, '2020-12-25 11:23:28', '2020-12-25 11:23:28'),
(1018, 85, 55, '2020-12-25 11:23:28', '2020-12-25 11:23:28'),
(1025, 149, 56, '2020-12-29 10:26:16', '2020-12-29 10:26:16'),
(1026, 94, 56, '2020-12-29 10:26:16', '2020-12-29 10:26:16'),
(1027, 135, 56, '2020-12-29 10:26:16', '2020-12-29 10:26:16'),
(1029, 136, 57, '2020-12-30 09:49:07', '2020-12-30 09:49:07'),
(1030, 151, 57, '2020-12-30 09:49:07', '2020-12-30 09:49:07');

--
-- Дамп данных таблицы `trans_attrs`
--

INSERT INTO `trans_attrs` (`id`, `attribute_id`, `title`, `local`, `created_at`, `updated_at`) VALUES
(11, 6, 'Цвет', 'ru', '2020-11-28 15:12:12', '2020-12-14 17:42:18'),
(12, 6, 'Колір', 'ua', '2020-11-28 15:12:12', '2020-12-14 17:42:18'),
(15, 8, 'Полярность', 'ru', '2020-12-14 07:49:19', '2020-12-15 20:13:52'),
(16, 8, 'Полярність', 'ua', '2020-12-14 07:49:19', '2020-12-15 20:13:52'),
(17, 9, 'Покрытие', 'ru', '2020-12-14 07:49:32', '2020-12-15 20:12:21'),
(18, 9, 'Особливість', 'ua', '2020-12-14 07:49:32', '2020-12-15 20:12:21'),
(21, 11, 'Намагниченность', 'ru', '2020-12-25 07:37:59', '2020-12-25 07:37:59'),
(22, 11, 'Намагніченість', 'ua', '2020-12-25 07:37:59', '2020-12-25 07:37:59');


--
-- Дамп данных таблицы `trans_attr_lists`
--

INSERT INTO `trans_attr_lists` (`id`, `attribute_list_id`, `title`, `local`, `created_at`, `updated_at`) VALUES
(7, 4, 'Желтый', 'ru', '2020-11-28 16:50:34', '2020-11-28 16:50:34'),
(8, 4, 'Жовтий', 'ua', '2020-11-28 16:50:34', '2020-11-28 16:50:34'),
(9, 5, 'Красный', 'ru', '2020-11-28 16:50:51', '2020-11-28 16:50:51'),
(10, 5, 'Червоный', 'ua', '2020-11-28 16:50:51', '2020-11-28 16:50:51'),
(11, 6, 'Зеленый', 'ru', '2020-11-28 16:51:11', '2020-11-28 16:51:11'),
(12, 6, 'Зелений', 'ua', '2020-11-28 16:51:11', '2020-11-28 16:51:11'),
(13, 7, 'Оранжевый', 'ru', '2020-11-28 16:51:42', '2020-11-28 16:51:42'),
(14, 7, 'Помаранчевий', 'ua', '2020-11-28 16:51:42', '2020-11-28 16:51:42'),
(15, 8, 'Синий', 'ru', '2020-11-28 16:51:59', '2020-11-28 16:51:59'),
(16, 8, 'Синій', 'ua', '2020-11-28 16:51:59', '2020-11-28 16:51:59'),
(17, 9, 'Чёрный', 'ru', '2020-11-28 16:52:28', '2020-12-28 17:55:55'),
(18, 9, 'Чорний', 'ua', '2020-11-28 16:52:28', '2020-12-28 17:55:55'),
(19, 10, 'Белый', 'ru', '2020-11-28 16:52:44', '2020-11-28 16:52:44'),
(20, 10, 'Білий', 'ua', '2020-11-28 16:52:44', '2020-11-28 16:52:44'),
(21, 11, 'Фиолетовый', 'ru', '2020-11-28 16:53:14', '2020-11-28 16:53:14'),
(22, 11, 'Фіолетовий', 'ua', '2020-11-28 16:53:14', '2020-11-28 16:53:14'),
(61, 32, 'Золото', 'ru', '2020-12-04 20:25:36', '2020-12-04 20:25:36'),
(62, 32, 'Золото', 'ua', '2020-12-04 20:25:36', '2020-12-04 20:25:36'),
(63, 33, 'Никель', 'ru', '2020-12-04 20:25:54', '2020-12-04 20:25:54'),
(64, 33, 'Нікель', 'ua', '2020-12-04 20:25:54', '2020-12-04 20:25:54'),
(65, 34, 'Радуга', 'ru', '2020-12-04 20:26:13', '2020-12-04 20:26:13'),
(66, 34, 'Веселка', 'ua', '2020-12-04 20:26:13', '2020-12-04 20:26:13'),
(69, 36, 'хром', 'ru', '2020-12-14 07:50:06', '2020-12-15 20:14:48'),
(70, 36, 'хром', 'ua', '2020-12-14 07:50:06', '2020-12-15 20:14:48'),
(71, 37, 'никель', 'ru', '2020-12-14 07:50:15', '2020-12-15 20:14:35'),
(72, 37, 'нікель', 'ua', '2020-12-14 07:50:15', '2020-12-15 20:14:35'),
(75, 39, 'S', 'ru', '2020-12-14 07:50:41', '2020-12-15 20:13:10'),
(76, 39, 'південь', 'ua', '2020-12-14 07:50:41', '2020-12-15 20:13:10'),
(79, 41, 'N', 'ru', '2020-12-15 20:13:24', '2020-12-15 20:13:24'),
(80, 41, 'N', 'ua', '2020-12-15 20:13:24', '2020-12-15 20:13:24'),
(81, 42, 'Серебро', 'ru', '2020-12-25 05:46:00', '2020-12-25 05:46:00'),
(82, 42, 'Срібло', 'ua', '2020-12-25 05:46:00', '2020-12-25 05:46:00'),
(83, 43, 'Золото', 'ru', '2020-12-25 05:46:22', '2020-12-25 05:46:28'),
(84, 43, 'Золото', 'ua', '2020-12-25 05:46:22', '2020-12-25 05:46:28'),
(85, 44, 'N38', 'ru', '2020-12-25 07:45:03', '2020-12-25 07:45:03'),
(86, 44, 'N38', 'ua', '2020-12-25 07:45:03', '2020-12-25 07:45:03'),
(87, 45, 'N45', 'ru', '2020-12-25 07:45:56', '2020-12-25 07:45:56'),
(88, 45, 'N45', 'ua', '2020-12-25 07:45:56', '2020-12-25 07:45:56');


--
-- Дамп данных таблицы `trans_attr_products`
--

INSERT INTO `trans_attr_products` (`id`, `trans_product_id`, `attr_in_product_id`, `desc`, `meta_title`, `meta_desc`, `created_at`, `updated_at`, `params`) VALUES
(99, 307, 510, '<p>Магнит неодимовый диск 10х6 мм. Никель. Описание&nbsp;(рус.)</p>', 'Магнит неодимовый, диск 10х6 мм. Никель (рус.)', 'Магнит неодимовый диск 10х6 мм. Никель. Мета-описание (рус.)', '2020-12-15 22:39:28', '2020-12-15 22:39:28', NULL),
(100, 307, 505, NULL, 'Магнит неодимовый, диск 10х6 мм. Хром (рус.)', 'Магнит неодимовый диск 10х6 мм. Хром. Описание (рус.)', '2020-12-15 22:39:28', '2020-12-15 22:39:28', NULL),
(137, 465, 531, '<p>Магнитный неодимовый шарик 5 мм, покрытие цвета золото, сила 400 г. Сплав: неодим-железо-бор. Сильный неодимовый магнит с двумя полюсами. Магазин магнитиков Магнитон.</p>', 'Магнит неодимовый шар 5 мм, золото', 'Магнитный неодимовый шарик 5 мм, покрытие цвета золото, сила 400 г. Сплав: неодим-железо-бор. Сильный неодимовый магнит с двумя полюсами. Магазин магнитиков Магнитон.', '2020-12-25 11:22:10', '2020-12-25 11:22:10', NULL),
(138, 465, 532, '<p>Магнит сфера, шарообразный магнит , диаметром 5 мм, цвет серебро, 400 г на отрыв</p>', 'Магнит неодимовый шар 5 мм, серебро', 'Магнит сфера, шарообразный магнит , диаметром 5 мм, цвет серебро, 400 г на отрыв', '2020-12-25 11:22:10', '2020-12-25 11:22:10', NULL),
(139, 465, 533, '<p>Магнит неодимовый шар диаметром 5 мм. Вес: 0,5 г. Сплав: неодим-железо-бор. N38. Покрытие: никель-медь-никель.</p>', 'Магнит неодимовый шар 5 мм, никель', 'Магнит неодимовый шар диаметром 5 мм. Вес: 0,5 г. Сплав: неодим-железо-бор. N38. Покрытие: никель-медь-никель.', '2020-12-25 11:22:10', '2020-12-25 11:22:10', NULL),
(140, 466, 531, '<p>Магнітний неодимовий кулька 5 мм, покриття кольору золото, сила 400 г. Сплав: неодим-залізо-бор. Сильний неодимовий магніт з двома полюсами. Магазин магнітиків Магнітон.</p>', 'Магніт неодимовий куля 5 мм, золото', 'Магнітний неодимовий кулька 5 мм, покриття кольору золото, сила 400 г. Сплав: неодим-залізо-бор. Сильний неодимовий магніт з двома полюсами. Магазин магнітиків Магнітон.', '2020-12-25 11:22:10', '2020-12-25 11:22:10', NULL),
(141, 466, 532, '<p>Магніт сфера, кулястий магніт, діаметром 5 мм, колір срібло, 400 г на відрив</p>', 'Магніт неодимовий куля 5 мм, срібло', 'Магніт сфера, кулястий магніт, діаметром 5 мм, колір срібло, 400 г на відрив', '2020-12-25 11:22:10', '2020-12-25 11:22:10', NULL),
(142, 466, 533, '<p>Магніт неодимовий куля діаметром 5 мм. Вага: 0,5 м Сплав: неодим-залізо-бор. N38. Покриття: нікель-мідь-нікель.</p>', 'Магніт неодимовий куля 5 мм, нікель', 'Магніт неодимовий куля діаметром 5 мм. Вага: 0,5 м Сплав: неодим-залізо-бор. N38. Покриття: нікель-мідь-нікель.', '2020-12-25 11:22:10', '2020-12-25 11:22:10', NULL);

-- --------------------------------------------------------

--
-- Дамп данных таблицы `trans_categories`
--

INSERT INTO `trans_categories` (`id`, `categories_id`, `title`, `desc`, `local`, `metaTitle`, `metaDesc`, `created_at`, `updated_at`) VALUES
(1, 1, 'Неодимовые магниты', '<p>Неодимовые магниты. Основное описание</p>', 'ru', 'Неодимовые магниты. Мета-заголовок', 'Неодимовые магниты. Мета-описание', '2020-11-27 21:32:12', '2020-12-13 14:26:00'),
(2, 1, 'Неодимові магніти', 'Неодимові магніти. Основне описання', 'ua', 'Неодимові магніти. Мета-заголовок', 'Неодимові магніти. Мета-описання', '2020-11-27 21:32:12', '2020-12-13 14:26:00'),
(35, 20, 'Все товары', '<p>Все товары</p>', 'ru', 'Все товары', 'Все товары', '2020-12-07 19:47:17', '2020-12-16 13:20:39'),
(36, 20, 'Усі товари', 'Усі товари', 'ua', 'Усі товари', 'Усі товари', '2020-12-07 19:47:17', '2020-12-16 13:20:39'),
(37, 21, 'Ферритовые магниты', '<p>Ферритовые магниты. Основное описание</p>', 'ru', 'Ферритовые магниты. Мета-заголовок', 'Ферритовые магниты. Мета-описание', '2020-12-08 07:49:54', '2020-12-13 14:29:49'),
(38, 21, 'Ферритові магніти', 'Ферритові магніти. Основне описання', 'ua', 'Ферритові магніти. Мета-заголовок', 'Ферритові магніти. Мета-описання', '2020-12-08 07:49:54', '2020-12-13 14:29:49'),
(39, 22, 'Поисковые магниты', '<p>Поисковые магниты применяются для поиска, подъема, удержания, подвешивания металлических предметов</p>', 'ru', 'Поисковые магниты', 'Поисковые магниты применяются для поиска, подъема, удержания, подвешивания металлических предметов', '2020-12-17 10:43:43', '2020-12-28 07:58:37'),
(40, 22, 'Пошукові магніти', '<p>Пошукові магніти застосовуються для пошуку, підйому, утримання та підвішування металевих предметів</p>', 'ua', 'Пошукові магніти', 'Пошукові магніти застосовуються для пошуку, підйому, утримання та підвішування металевих предметів', '2020-12-17 10:43:43', '2020-12-28 07:58:37'),
(41, 23, 'Магнит для сумки', '<p>Магниты для сумок или магнит кнопка. Металлическая фурнитура магнит застежка для рюкзаков, кошельков, чехлов, аксессуаров.</p>', 'ru', 'Магнит для сумки', 'Магниты для сумок или магнит кнопка. Металлическая фурнитура магнит застежка для рюкзаков, кошельков, чехлов, аксессуаров.', '2020-12-24 06:04:35', '2020-12-24 06:04:35'),
(42, 23, 'Магніт для сумки', '<p>Магніти для сумок або магніт кнопка. Металева фурнітура магніт застібка для рюкзаків, гаманців, чохлів, аксесуарів.</p>', 'ua', 'Магнит для сумки', 'Магніти для сумок або магніт кнопка. Металева фурнітура магніт застібка для рюкзаків, гаманців, чохлів, аксесуарів.', '2020-12-24 06:04:35', '2020-12-24 06:04:35'),
(43, 24, 'Магнит замок', '<p>Набор из двух кольцевых магнитов с зеркальной полярностью и переменным диаметром отверстия для крепления шнура, цепочки.</p>', 'ru', 'Магнит замок', 'Набор из двух кольцевых магнитов с зеркальной полярностью и переменным диаметром отверстия для крепления шнура, цепочки.', '2020-12-24 07:48:04', '2020-12-24 07:48:04'),
(44, 24, 'Магніт замок', '<p>Набір з двох кільцевих магнітів із дзеркальною полярністю і змінним діаметром отвору для кріплення шнура, ланцюжка.</p>', 'ua', 'Магніт замок', 'Набір з двох кільцевих магнітів із дзеркальною полярністю і змінним діаметром отвору для кріплення шнура, ланцюжка.', '2020-12-24 07:48:04', '2020-12-24 07:48:04'),
(45, 25, 'Магниты держатели', '<p>Здесь представлены товары с применением постоянных магнитов, способные удерживать различные предметы</p>', 'ru', 'Магниты держатели', 'Здесь представлены товары с применением постоянных магнитов, способные удерживать различные предметы', '2020-12-28 06:55:10', '2020-12-28 06:55:10'),
(46, 25, 'Магніти тримачі', '<p>Тут представлені товари з застосуванням постійних магнітів, здатні утримувати різні предмети</p>', 'ua', 'Магніти тримачі', 'Тут представлені товари з застосуванням постійних магнітів, здатні утримувати різні предмети', '2020-12-28 06:55:10', '2020-12-28 06:55:10'),
(47, 26, 'Магниты для сварки', '<p>Магнитные уголки для сварки.</p>', 'ru', 'Магниты для сварки', 'Магнитные уголки для сварки.', '2020-12-28 07:02:00', '2020-12-28 07:02:00'),
(48, 26, 'Магніти для зварювання', '<p>Магнітні куточки для зварювання.</p>', 'ua', 'Магніти для зварювання', 'Магнітні куточки для зварювання.', '2020-12-28 07:02:00', '2020-12-28 07:02:00'),
(49, 27, 'Магниты игрушки, сувениры', '<p>Здесь размещены различные магнитные игрушки, сувениры.</p>', 'ru', 'Магниты игрушки, сувениры', 'Здесь размещены различные магнитные игрушки, сувениры.', '2020-12-28 07:09:19', '2020-12-28 07:09:19'),
(50, 27, 'Магніти іграшки, сувеніри', '<p>Тут розміщені різні магнітні іграшки, сувеніри.</p>', 'ua', 'Магніти іграшки, сувеніри', 'Тут розміщені різні магнітні іграшки, сувеніри.', '2020-12-28 07:09:19', '2020-12-28 07:09:19'),
(51, 28, 'Магниты гибкие', '<p>Магнитный листы (магнитный винил, магнитная резина) - гибкие магнитные полимерные материалы</p>', 'ru', 'Магниты гибкие', 'Магнитный листы (магнитный винил, магнитная резина) - гибкие магнитные полимерные материалы', '2020-12-28 07:15:10', '2020-12-28 07:15:10'),
(52, 28, 'Магніти гнучкі', '<p>Магнітний листи (магнітний вініл, магнітна гума) - гнучкі магнітні полімерні матеріали</p>', 'ua', 'Магніти гнучкі', 'Магнітний листи (магнітний вініл, магнітна гума) - гнучкі магнітні полімерні матеріали', '2020-12-28 07:15:10', '2020-12-28 07:15:10'),
(53, 29, 'Размагничиватель, тесламетр', '<p>Приборы для измерения, изменения параметров магнитных полей.</p>', 'ru', 'Размагничиватель, тесламетр', 'Приборы  для измерения, изменения параметров магнитных полей.', '2020-12-28 07:17:46', '2020-12-28 07:18:15'),
(54, 29, 'Размагнічіватель, тесламетр', '<p>Прилади для вимірювання, зміни параметрів магнітних полів.</p>', 'ua', 'Размагнічіватель, тесламетр', 'Прилади для вимірювання, зміни параметрів магнітних полів.', '2020-12-28 07:17:46', '2020-12-28 07:18:15'),
(55, 30, 'Магнит сегмент, магнит сектор', '<p>Неодимовые и ферритовые магниты в форме сегмента (сектора)</p>', 'ru', 'Магнит сегмент, магнит сектор', 'Неодимовые и ферритовые магниты в форме сегмента (сектора)', '2020-12-28 07:28:10', '2020-12-28 07:58:24'),
(56, 30, 'Магніт сегмент, магніт сектор', '<p>Неодимові і ферритові магніти у формі сегмента (сектора)</p>', 'ua', 'Магніт сегмент, магніт сектор', 'Неодимові і ферритові магніти у формі сегмента (сектора)', '2020-12-28 07:28:10', '2020-12-28 07:58:24'),
(57, 31, 'Магнитные активаторы', '<p>Магнитные активаторы различных сред - улучшение сгорания, магнитная вода, экономия бензина, дизтоплива</p>', 'ru', 'Магнитные активаторы', 'Магнитные активаторы различных сред - улучшение сгорания, магнитная вода, экономия бензина, дизтоплива', '2020-12-28 07:57:26', '2020-12-28 07:57:26'),
(58, 31, 'Магнітні активатори', '<p>Магнітні активатори різних середовищ - поліпшення згоряння, магнітна вода, економія бензину, дизпалива</p>', 'ua', 'Магнітні активатори', 'Магнітні активатори різних середовищ - поліпшення згоряння, магнітна вода, економія бензину, дизпалива', '2020-12-28 07:57:26', '2020-12-28 07:57:26'),
(59, 32, 'Изготовление виниловых магнитов под заказ', '<p>Здесь можно заказать изготовление мягких виниловых магнитиков с Вашей картинкой</p>', 'ru', 'Изготовление виниловых магнитов под заказ', 'Здесь можно заказать изготовление мягких виниловых магнитиков с Вашей картинкой', '2020-12-28 08:13:49', '2020-12-28 08:13:49'),
(60, 32, 'Виготовлення вінілових магнітів під замовлення', '<p>Тут можна замовити виготовлення м&#39;яких вінілових магнітів з Вашої картинкою</p>', 'ua', 'Виготовлення вінілових магнітів під замовлення', 'Тут можна замовити виготовлення м`яких вінілових магнітів з Вашої картинкою', '2020-12-28 08:13:49', '2020-12-28 08:13:49'),
(61, 33, 'Магниты для экспериментов и учебы', '<p>Магниты для экспериментов и учебы</p>', 'ru', 'Магниты для экспериментов и учебы', 'Магниты для экспериментов и учебы', '2020-12-28 08:29:21', '2020-12-28 08:29:21'),
(62, 33, 'Магніти для експериментів і навчання', '<p>Магніти для експериментів і навчання</p>', 'ua', 'Магніти для експериментів і навчання', 'Магніти для експериментів і навчання', '2020-12-28 08:29:21', '2020-12-28 08:29:21'),
(63, 34, 'Магнит съемник', '<p>Для снятия антикражных датчиков</p>', 'ru', 'Магнит съемник', 'Для снятия антикражных датчиков', '2020-12-28 08:32:16', '2020-12-28 09:25:53'),
(64, 34, 'Магніт знімач', '<p>Для зняття антікражних датчиків</p>', 'ua', 'Магніт знімач', 'Для зняття антікражних датчиків', '2020-12-28 08:32:17', '2020-12-28 09:25:53'),
(65, 35, 'Магнитные браслеты', '<p>Оригинальное украшение, обладающее лечебным эффектом! Магнитные браслеты удерживают форму без всяких креплений</p>', 'ru', 'Магнитные браслеты', 'Оригинальное украшение, обладающее лечебным эффектом! Магнитные браслеты удерживают форму без всяких креплений', '2020-12-28 09:31:16', '2020-12-28 09:31:16'),
(66, 35, 'Магнітні браслети', '<p>Оригінальна прикраса, що володіє лікувальним ефектом! Магнітні браслети утримують форму без всяких кріплень</p>', 'ua', 'Магнітні браслети', 'Оригінальна прикраса, що володіє лікувальним ефектом! Магнітні браслети утримують форму без всяких кріплень', '2020-12-28 09:31:16', '2020-12-28 09:31:16'),
(67, 36, 'Продажа магнитов с дефектами', '<p>В данной категории можно купить магниты не соответствующие товарному виду со значительной скидкой</p>', 'ru', 'Продажа магнитов с дефектами', 'В данной категории можно купить магниты не соответствующие товарному виду со значительной скидкой', '2020-12-28 09:38:35', '2020-12-28 09:38:35'),
(68, 36, 'Продаж магнітів з дефектами', '<p>У даній категорії можна купити магніти не відповідають товарного вигляду зі значною знижкою</p>', 'ua', 'Продаж магнітів з дефектами', 'У даній категорії можна купити магніти не відповідають товарного вигляду зі значною знижкою', '2020-12-28 09:38:35', '2020-12-28 09:38:35'),
(69, 37, 'Магниты для доски', '<p>Магниты для подвешивания важных заметок на магнитной (маркерной, стеклянной) доске</p>', 'ru', 'Магниты для доски', 'Магниты для подвешивания важных заметок на магнитной (маркерной, стеклянной) доске', '2020-12-28 09:48:41', '2020-12-28 09:48:41'),
(70, 37, 'Магніти для дошки', '<p>Магніти для підвішування важливих заміток на магнітній (маркерной, скляної) дошці</p>', 'ua', 'Магніти для дошки', 'Магніти для підвішування важливих заміток на магнітній (маркерной, скляної) дошці', '2020-12-28 09:48:41', '2020-12-28 09:48:41'),
(71, 38, 'Аксессуары для мобильных телефонов', '<p>Только магнитные: кабель для мобильного телефона, держатель для мобильного телефона, чехол на магните</p>', 'ru', 'Аксессуары для мобильных телефонов', 'Только магнитные: кабель для мобильного телефона, держатель для мобильного телефона, чехол на магните', '2020-12-28 09:50:47', '2020-12-28 09:50:47'),
(72, 38, 'Аксесуари для мобільних телефонів', '<p>Тільки магнітні: кабель для мобільного телефону, тримач для мобільного телефону, чохол на магніті</p>', 'ua', 'Аксесуари для мобільних телефонів', 'Тільки магнітні: кабель для мобільного телефону, тримач для мобільного телефону, чохол на магніті', '2020-12-28 09:50:47', '2020-12-28 09:50:47'),
(73, 39, 'Для магнитов', '<p>Для магнитов</p>', 'ru', 'Для магнитов', 'Для магнитов', '2020-12-30 10:14:06', '2020-12-30 10:14:06'),
(74, 39, 'Для магнітів', '<p>Для магнітів</p>', 'ua', 'Для магнітів', 'Для магнітів', '2020-12-30 10:14:06', '2020-12-30 10:14:06');

-- --------------------------------------------------------


--
-- Дамп данных таблицы `trans_collections`
--

INSERT INTO `trans_collections` (`id`, `collections_id`, `title`, `desc`, `local`, `metaTitle`, `metaDesc`, `created_at`, `updated_at`) VALUES
(1, 1, 'Магниты диски', '<p>Магниты диски. Основное описание</p>', 'ru', 'Магниты диски. Мета-заголовок', 'Магниты диски. Мета-описание', '2020-11-28 12:18:14', '2020-12-13 15:14:00'),
(2, 1, 'Магніти диски', 'Магніти диски. Основний опис', 'ua', 'Магніти диски. Мета-заголовок', 'Магніти диски. Мета-опис', '2020-11-28 12:18:14', '2020-12-13 15:14:00'),
(3, 2, 'Магниты стержни, прутки', '<p>Магниты стержни, прутки. Основное описание</p>', 'ru', 'Магниты стержни, прутки. Мета-заголовок', 'Магниты стержни, прутки. Мета-описание', '2020-11-28 14:23:35', '2020-12-13 15:13:55'),
(4, 2, 'Магніти стрижні, прутки', 'Магніти стрижні, прутки. Основний опис', 'ua', 'Магніти стрижні, прутки. Мета-заголовок', 'Магніти стрижні, прутки. Мета-опис', '2020-11-28 14:23:35', '2020-12-13 15:13:55'),
(7, 5, 'Магниты диски', '<p>Магниты диски. Основное описание</p>', 'ru', 'Магниты диски. Мета-заголовок', 'Магниты диски. Мета-описание', '2020-12-08 09:00:43', '2020-12-13 15:14:17'),
(8, 5, 'Магніти диски', 'Магніти диски. Основний опис', 'ua', 'Магніти диски. Мета-заголовок', 'Магніти диски. Мета-опис', '2020-12-08 09:00:43', '2020-12-13 15:14:17'),
(9, 6, 'Магниты стержни, прутки', '<p>Магниты стержни, прутки. Основное описание</p>', 'ru', 'Магниты стержни, прутки. Мета-заголовок', 'Магниты стержни, прутки. Мета-описание', '2020-12-08 09:05:56', '2020-12-13 15:14:13'),
(10, 6, 'Магніти стрижні, прутки', 'Магніти стрижні, прутки. Основний опис', 'ua', 'Магніти стрижні, прутки. Мета-заголовок', 'Магніти стрижні, прутки. Мета-опис', '2020-12-08 09:05:56', '2020-12-13 15:14:13'),
(11, 7, 'Сила сцепления до 0,2 кг', '<p>Магниты з силой на отрыв от 0 до 200 грамм</p>', 'ru', 'Сила сцепления  до 0,2 кг', 'Сила сцепления до  0,2 кг', '2020-12-16 13:33:35', '2020-12-28 10:11:18'),
(12, 7, 'Сила зчеплення до 0,2 кг', '<p>Магніти з силою зчеплення від 0 до 200 грам</p>', 'ua', 'Сила зчеплення до 0,2 кг', 'Сила зчеплення до 0,2 кг', '2020-12-16 13:33:35', '2020-12-28 10:11:18'),
(13, 8, 'Односторонние поисковые магнита', '<p>Данный тип магнитов применяется для поиска, подъема, удержания, подвешивания ферромагнитных предметов</p>', 'ru', 'Односторонние поисковые магнита', 'Данный тип магнитов применяется для поиска, подъема, удержания, подвешивания ферромагнитных предметов', '2020-12-18 06:57:51', '2020-12-18 06:59:09'),
(14, 8, 'Односторонні пошукові магніту', '<p>Даний тип магнітів застосовується для пошуку, підйому, утримання, підвішування феромагнітних предметів</p>', 'ua', 'Односторонні пошукові магніту', 'Даний тип магнітів застосовується для пошуку, підйому, утримання, підвішування феромагнітних предметів', '2020-12-18 06:57:51', '2020-12-18 06:59:09'),
(17, 10, 'Двухсторонние поисковые магниты', '<p>Двухсторонние поисковые магниты</p>', 'ru', 'Двухсторонние поисковые магниты', 'Двухсторонние поисковые магниты', '2020-12-24 12:59:53', '2020-12-24 13:01:55'),
(18, 10, 'Двосторонні пошукові магніти', '<p>Двосторонні пошукові магніти</p>', 'ua', 'Двосторонні пошукові магніти', 'Двосторонні пошукові магніти', '2020-12-24 12:59:53', '2020-12-24 13:01:55'),
(19, 11, 'Магниты для дома', '<p>Магниты для бытовых целей</p>', 'ru', 'Магниты для дома', 'Магниты для дома', '2020-12-24 13:27:22', '2020-12-24 13:27:22'),
(20, 11, 'Магніти для дому', '<p>Магниты для побутових потреб</p>', 'ua', 'Магніти для дому', 'Магніти для дому', '2020-12-24 13:27:22', '2020-12-24 13:27:22'),
(21, 12, 'Магнит шар', '<p>Магниты сферической формы, магниты шары, шариковые магниты</p>', 'ru', 'Магнит шар', 'Магниты сферической формы, магниты шары, шариковые магниты', '2020-12-25 05:43:47', '2020-12-25 05:43:55'),
(22, 12, 'Магніт куля', '<p>Магніти сферичної форми, магніти кулі, кулькові магніти</p>', 'ua', 'Магніт куля', 'Магніти сферичної форми, магніти кулі, кулькові магніти', '2020-12-25 05:43:48', '2020-12-25 05:43:56'),
(23, 16, 'Магнит самоклейка', '<p>Магнит с клеевой основой, магнит 3м, самоклеющиейся неодимовые магниты, магнит с клеем, клейкий магнит, магнит на липучке</p>', 'ru', 'Магнит самоклейка', 'Магнит с клеевой основой, магнит 3м, самоклеющиейся неодимовые магниты, магнит с клеем, клейкий магнит, магнит на липучке', '2020-12-25 07:04:43', '2020-12-25 07:04:43'),
(24, 16, 'Магніт самоклейка', '<p>Магніт з клейовою основою, магніт 3м, самоклеючі неодимові магніти, магніт з клеєм, клейкий магніт, магніт на липучці</p>', 'ua', 'Магніт самоклейка', 'Магніт з клейовою основою, магніт 3м, самоклеючі неодимові магніти, магніт з клеєм, клейкий магніт, магніт на липучці', '2020-12-25 07:04:43', '2020-12-25 07:04:43'),
(25, 17, 'Магнит прямоугольник', '<p>Магнит прямоугольник</p>', 'ru', 'Магнит прямоугольник', 'Магнит прямоугольник', '2020-12-28 10:09:43', '2020-12-28 10:10:41'),
(26, 17, 'Магніт прямокутник', '<p>Магніт прямокутник</p>', 'ua', 'Магніт прямокутник', 'Магніт прямокутник', '2020-12-28 10:09:43', '2020-12-28 10:10:41'),
(27, 18, 'Магнит квадрат', '<p>Магнит квадрат</p>', 'ru', 'Магнит квадрат', 'Магнит квадрат', '2020-12-28 10:13:11', '2020-12-28 10:13:11'),
(28, 18, 'Магніт квадрат', '<p>Магніт квадрат</p>', 'ua', 'Магніт квадрат', 'Магніт квадрат', '2020-12-28 10:13:11', '2020-12-28 10:13:11'),
(29, 19, 'Магнит куб', '<p>Магнит куб</p>', 'ru', 'Магнит куб', 'Магнит куб', '2020-12-28 10:19:51', '2020-12-28 10:19:51'),
(30, 19, 'Магніт куб', '<p>Магніт куб</p>', 'ua', 'Магніт куб', 'Магніт куб', '2020-12-28 10:19:51', '2020-12-28 10:19:51'),
(31, 20, 'Магнит кольцо', '<p>Магнит кольцо</p>', 'ru', 'Магнит кольцо', 'Магнит кольцо', '2020-12-28 10:22:18', '2020-12-28 10:22:18'),
(32, 20, 'Магніт кільце', '<p>Магніт кільце</p>', 'ua', 'Магніт кільце', 'Магніт кільце', '2020-12-28 10:22:18', '2020-12-28 10:22:18'),
(33, 21, 'Магнит прямоугольник', '<p>Магнит прямоугольник</p>', 'ru', 'Магнит прямоугольник', 'Магнит прямоугольник', '2020-12-28 10:28:16', '2020-12-28 10:28:16'),
(34, 21, 'Магніт прямокутник', '<p>Магніт прямокутник</p>', 'ua', 'Магніт прямокутник', 'Магніт прямокутник', '2020-12-28 10:28:16', '2020-12-28 10:28:16'),
(35, 22, 'Магнит кольцо', '<p>Магнит кольцо</p>', 'ru', 'Магнит кольцо', 'Магнит кольцо', '2020-12-28 10:30:24', '2020-12-28 10:30:24'),
(36, 22, 'Магніт кільце', '<p>Магніт кільце&nbsp;</p>', 'ua', 'Магніт кільце', 'Магніт кільце', '2020-12-28 10:30:24', '2020-12-28 10:30:24'),
(37, 23, 'Аксессуары для поисковых магнитов', '<p>Аксессуары для поисковых магнитов</p>', 'ru', 'Аксессуары для поисковых магнитов', 'Аксессуары для поисковых магнитов', '2020-12-28 10:54:27', '2021-01-04 09:01:59'),
(38, 23, 'Аксесуари для пошукових магнітів', '<p>Аксесуари для пошукових магнітів</p>', 'ua', 'Аксесуари для пошукових магнітів', 'Аксесуари для пошукових магнітів', '2020-12-28 10:54:27', '2021-01-04 09:01:59'),
(39, 24, 'Шнур для телефона', '<p>Шнур для телефона</p>', 'ru', 'Шнур для телефона', 'Шнур для телефона', '2020-12-28 11:08:21', '2020-12-28 11:08:21'),
(40, 24, 'Шнур для телефона', '<p>Шнур для телефона</p>', 'ua', 'Шнур для телефона', 'Шнур для телефона', '2020-12-28 11:08:21', '2020-12-28 11:08:21'),
(41, 25, 'Держатель для телефона', '<p>Держатель для телефона</p>', 'ru', 'Держатель для телефона', 'Держатель для телефона', '2020-12-28 11:09:20', '2020-12-28 11:09:28'),
(42, 25, 'Тримач для телефону', '<p>Тримач для телефону</p>', 'ua', 'Тримач для телефону', 'Тримач для телефону', '2020-12-28 11:09:20', '2020-12-28 11:09:28'),
(43, 26, 'Крепежный магнит', '<p>Крепежный магнит</p>', 'ru', 'Крепежный магнит', 'Крепежный магнит', '2020-12-29 09:57:42', '2020-12-29 10:25:58'),
(44, 26, 'Магніт кріплення', '<p>Магніт кріплення</p>', 'ua', 'Магніт кріплення', 'Магніт кріплення', '2020-12-29 09:57:42', '2020-12-29 10:25:58'),
(45, 27, 'Крепежные магниты', '<p>Крепежные магниты</p>', 'ru', 'Крепежные магниты', 'Крепежные магниты', '2020-12-30 09:37:09', '2020-12-30 09:37:09'),
(46, 27, 'Магніт кріплення', '<p>Магніт кріплення</p>', 'ua', 'Магніт кріплення', 'Магніт кріплення', '2020-12-30 09:37:09', '2020-12-30 09:37:09'),
(47, 28, 'Магнит шар', '<p>Магнит шар</p>', 'ru', 'Магнит шар', 'Магнит шар', '2020-12-30 09:56:28', '2020-12-30 09:56:28'),
(48, 28, 'Магніт куля', '<p>Магніт куля</p>', 'ua', 'Магніт куля', 'Магніт куля', '2020-12-30 09:56:28', '2020-12-30 09:56:28');

-- --------------------------------------------------------

--
-- Дамп данных таблицы `trans_currencies`
--

INSERT INTO `trans_currencies` (`id`, `currency_list_id`, `name`, `abbrev`, `local`, `created_at`, `updated_at`) VALUES
(7, 4, 'Украинская гривна', 'грн.', 'ru', '2020-12-14 11:58:30', '2020-12-14 11:58:30'),
(8, 4, 'Українська гривня', 'грн.', 'ua', '2020-12-14 11:58:30', '2020-12-14 11:58:30'),
(9, 5, 'Американский доллар', 'дол.', 'ru', '2020-12-14 12:00:36', '2020-12-16 13:07:06'),
(10, 5, 'Американський долар', 'дол.', 'ua', '2020-12-14 12:00:36', '2020-12-16 13:07:06'),
(11, 6, 'Евро', 'евро', 'ru', '2020-12-14 12:01:35', '2020-12-14 12:01:35'),
(12, 6, 'Євро', 'євро', 'ua', '2020-12-14 12:01:35', '2020-12-14 12:01:35'),
(13, 7, 'Российский рубль', 'руб.', 'ru', '2020-12-16 12:58:44', '2020-12-16 12:58:44'),
(14, 7, 'Російський рубль', 'руб.', 'ua', '2020-12-16 12:58:44', '2020-12-16 12:58:44');

-- --------------------------------------------------------
--
-- Дамп данных таблицы `trans_groups`
--

INSERT INTO `trans_groups` (`id`, `groups_id`, `title`, `full_title`, `desc`, `local`, `metaTitle`, `metaDesc`, `created_at`, `updated_at`) VALUES
(53, 28, 'Сила сцепления', NULL, NULL, 'ru', NULL, 'Сила сцепления. Мета-описание', '2020-12-08 07:12:36', '2020-12-13 14:02:24'),
(54, 28, 'Сила зчеплення', NULL, NULL, 'ua', 'Сила зчеплення. Мета-заголовок', 'Сила зчеплення. Мета-описання', '2020-12-08 07:12:36', '2020-12-13 14:02:24'),
(55, 29, 'Внешний диаметр', NULL, NULL, 'ru', 'Внешний диаметр. Мета-заголовок', 'Внешний диаметр. Мета-описание', '2020-12-08 07:25:21', '2020-12-08 07:32:12'),
(56, 29, 'Зовнішній діаметр', NULL, NULL, 'ua', 'Зовнішній діаметр. Мета-заголовок', 'Зовнішній діаметр. Мета-описання', '2020-12-08 07:25:21', '2020-12-08 07:32:12'),
(63, 33, 'Габариты', NULL, NULL, 'ru', 'Габариты. Мета-заголовок', 'Габариты. Мета-описание', '2020-12-08 07:35:23', '2020-12-08 07:35:47'),
(64, 33, 'Габарити', NULL, NULL, 'ua', 'Габарити. Мета-заголовок', 'Габарити. Мета-описання', '2020-12-08 07:35:23', '2020-12-08 07:35:47'),
(65, 34, 'Внутренний диаметр', NULL, NULL, 'ru', 'Внутренний диаметр. Мета-заголовок', 'Внутренний диаметр. Мета-описание', '2020-12-08 07:36:39', '2020-12-08 07:37:39'),
(66, 34, 'Внутрішній діаметр', NULL, NULL, 'ua', 'Внутрішній діаметр. Мета-заголовок', 'Внутрішній діаметр. Мета-описання', '2020-12-08 07:36:39', '2020-12-08 07:37:39'),
(69, 36, 'Особенности', NULL, NULL, 'ru', 'Особенности. Мета-заголовок', 'Особенности. Мета-описание', '2020-12-08 07:39:31', '2020-12-08 07:40:00'),
(70, 36, 'Особенности', NULL, NULL, 'ua', 'Особенности. Мета-заголовок', 'Особенности. Мета-описання', '2020-12-08 07:39:31', '2020-12-08 07:40:00'),
(71, 37, 'Внешний радиус', NULL, NULL, 'ru', 'Внешний радиус. Мета-заголовок', 'Внешний радиус. Мета-описание', '2020-12-08 07:45:11', '2020-12-08 07:45:54'),
(72, 37, 'Зовнішній радіус', NULL, NULL, 'ua', 'Зовнішній радіус. Мета-заголовок', 'Зовнішній радіус. Мета-описанння', '2020-12-08 07:45:11', '2020-12-08 07:45:54'),
(73, 38, 'Внутренний радиус', NULL, NULL, 'ru', 'Внутренний радиус. Мета-заголовок', 'Внутренний радиус. Мета-описание', '2020-12-08 07:46:05', '2020-12-08 07:46:53'),
(74, 38, 'Внутрішній радіус', NULL, NULL, 'ua', 'Внутрішній радіус. Мета-заголовок', 'Внутрішній радіус. Мета-описанння', '2020-12-08 07:46:05', '2020-12-08 07:46:53'),
(75, 39, 'Угол образующий сегмент', NULL, NULL, 'ru', 'Угол образующий сегмент. Мета-заголовок', 'Угол образующий сегмент. Мета-описание', '2020-12-08 07:47:26', '2020-12-08 07:48:21'),
(76, 39, 'Кут що утворю сегмент', NULL, NULL, 'ua', 'Кут що утворю сегмент. Мета-заголовок', 'Кут що утворю сегмент. Мета-описанння', '2020-12-08 07:47:26', '2020-12-08 07:48:21'),
(79, 41, 'Ширина', NULL, NULL, 'ru', 'Ширина. Мета-заголовок', 'Ширина. Мета-описание', '2020-12-08 07:53:19', '2020-12-08 07:54:58'),
(80, 41, 'Ширина', NULL, NULL, 'ua', 'Ширина. Мета-заголовок', 'Ширина. Мета-описання', '2020-12-08 07:53:19', '2020-12-08 07:54:58'),
(85, 44, 'Материал', NULL, NULL, 'ru', 'Материал. Мета-заголовок', 'Материал. Мета-описание', '2020-12-08 08:40:24', '2020-12-08 08:40:54'),
(86, 44, 'Матеріал', NULL, NULL, 'ua', 'Матеріал. Мета-заголовок', 'Матеріал. Мета-описання', '2020-12-08 08:40:24', '2020-12-08 08:40:54'),
(87, 45, 'Форма', NULL, NULL, 'ru', 'Форма. Мета-заголовок', 'Форма. Мета-описание', '2020-12-08 08:44:47', '2020-12-13 15:26:56'),
(88, 45, 'Форма', NULL, NULL, 'ua', 'Форма. Мета-заголовок', 'Форма. Мета-описання', '2020-12-08 08:44:47', '2020-12-13 15:26:56'),
(89, 46, 'Высота', NULL, NULL, 'ru', 'Высота. Мета-заголовок', 'Высота. Мета-описание', '2020-12-08 08:50:33', '2020-12-08 08:51:31'),
(90, 46, 'Висота', NULL, NULL, 'ua', 'Висота. Мета-заголовок', 'Висота. Мета-описання', '2020-12-08 08:50:33', '2020-12-08 08:51:31'),
(91, 47, 'Длина', NULL, NULL, 'ru', 'Длина. Мета-заголовок', 'Длина. Мета-описание', '2020-12-08 08:52:25', '2020-12-08 08:53:00'),
(92, 47, 'Довжина', NULL, NULL, 'ua', 'Довжина. Мета-заголовок', 'Довжина. Мета-описання', '2020-12-08 08:52:25', '2020-12-08 08:53:00'),
(95, 49, 'тип', 'тип', '<p>тип</p>', 'ru', 'тип', 'тип', '2020-12-17 11:12:28', '2020-12-17 11:35:05'),
(96, 49, 'Тип', 'Тип', '<p>тип</p>', 'ua', 'тип', 'тип', '2020-12-17 11:12:28', '2020-12-17 11:35:05'),
(97, 50, 'Устройство отрыва', 'Устройство отрыва- сквозной рым болт', '<p>Устройство отрыва- рым болт прокручивается через корпус</p>', 'ru', 'Устройство отрыва', 'Устройство отрыва', '2020-12-17 11:26:16', '2020-12-17 11:26:16'),
(98, 50, 'Пристрій відриву', 'Пристрій відриву- наскрізний рим болт', '<p>Пристрій відриву- наскрізний рим болт</p>', 'ua', 'Пристрій для відриву пошукового магніта', 'Пристрій для відриву пошукового магніта - рим бовт прокручується скрізь магніт', '2020-12-17 11:26:16', '2020-12-17 11:26:16'),
(99, 51, 'Резьба', 'Резьба', '<p>Резьба</p>', 'ru', 'Резьба', 'Резьба', '2020-12-17 11:55:00', '2020-12-17 11:55:00'),
(100, 51, 'Різьблення', 'Різьблення', '<p>Різьблення</p>', 'ua', 'Різьблення', 'Різьблення', '2020-12-17 11:55:01', '2020-12-17 11:55:01'),
(101, 52, 'Бренд', 'Бренд', '<p>Бренд поискового магнита</p>', 'ru', 'Бренд', 'Бренд поискового магнита', '2020-12-17 12:17:37', '2020-12-17 12:17:37'),
(102, 52, 'Бренд', 'Бренд', '<p>Бренд пошукового&nbsp;магніту</p>', 'ua', 'Бренд', 'Бренд пошукового магніту', '2020-12-17 12:17:37', '2020-12-17 12:17:37'),
(107, 55, 'Материал покрытия', 'Материал покрытия', '<p>Материал покрытия корпуса</p>', 'ru', 'Материал покрытия', 'Материал покрытия корпуса', '2020-12-17 12:27:12', '2020-12-17 12:28:11'),
(108, 55, 'Матеріал покриття', 'Матеріал покриття', '<p>Матеріал покриття</p>', 'ua', 'Матеріал покриття', 'Матеріал покриття', '2020-12-17 12:27:12', '2020-12-17 12:28:11'),
(109, 56, 'Аксессуары для поисковых магнитов', 'Аксессуары для поисковых магнитов', '<p>Аксессуары для поисковых магнитов&nbsp;</p>', 'ru', 'Аксессуары для поисковых магнитов', 'Аксессуары для поисковых магнитов', '2020-12-28 10:35:00', '2020-12-28 10:35:00'),
(110, 56, 'Аксесуари для пошукових магнітів', 'Аксесуари для пошукових магнітів', '<p>Аксесуари для пошукових магнітів</p>', 'ua', 'Аксесуари для пошукових магнітів', 'Аксесуари для пошукових магнітів', '2020-12-28 10:35:00', '2020-12-28 10:35:00'),
(111, 57, 'Тип аксессуара', 'Тип аксессуара', '<p>Тип аксессуара</p>', 'ru', 'Тип аксессуара', 'Тип аксессуара', '2020-12-28 10:59:01', '2020-12-28 10:59:01'),
(112, 57, 'Тип аксесуара', 'Тип аксесуара', '<p>Тип аксесуара</p>', 'ua', 'Тип аксесуара', 'Тип аксесуара', '2020-12-28 10:59:01', '2020-12-28 10:59:01'),
(113, 58, 'Крепежный', 'Крепежный', '<p>Крепежный&nbsp;</p>', 'ru', 'Крепежный', 'Крепежный', '2020-12-29 07:03:57', '2020-12-29 07:04:10'),
(114, 58, 'Кріплення', 'Кріплення', '<p>Кріплення</p>', 'ua', 'Кріплення', 'Кріплення', '2020-12-29 07:03:57', '2020-12-29 07:04:10'),
(119, 61, 'Для магнитов', 'Для магнитов', '<p>Для магнитов</p>', 'ru', 'Для магнитов', 'Для магнитов', '2020-12-30 10:14:49', '2020-12-30 10:14:59'),
(120, 61, 'Для магнітів', 'Для магнітів', '<p>Для магнітів</p>', 'ua', 'Для магнітів', 'Для магнітів', '2020-12-30 10:14:49', '2020-12-30 10:14:59'),
(121, 62, 'Тип игрушек', 'Тип игрушек', '<p>Тип игрушек</p>', 'ru', 'Тип игрушек', 'Тип игрушек', '2020-12-30 11:33:16', '2020-12-30 11:33:16'),
(122, 62, 'Тип іграшок', 'Тип іграшок', '<p>Тип іграшок</p>', 'ua', 'Тип іграшок', 'Тип іграшок', '2020-12-30 11:33:16', '2020-12-30 11:33:16'),
(123, 63, 'Формат', 'Формат', '<p>Формат</p>', 'ru', NULL, NULL, '2020-12-30 11:45:59', '2020-12-30 11:45:59'),
(124, 63, 'Формат', 'Формат', '<p>Формат</p>', 'ua', NULL, NULL, '2020-12-30 11:45:59', '2020-12-30 11:45:59'),
(125, 64, 'Усилие на отрыв', 'Усилие на отрыв', '<p>Усилие на отрыв</p>', 'ru', 'Усилие на отрыв', 'Усилие на отрыв', '2020-12-31 06:51:14', '2020-12-31 06:52:45'),
(126, 64, 'Зусилля на відрив', 'Зусилля на відрив', '<p>Зусилля на відрив</p>', 'ua', 'Зусилля на відрив', 'Зусилля на відрив', '2020-12-31 06:51:14', '2020-12-31 06:52:45'),
(127, 65, 'Намагниченность', 'м', '<p>Намагниченность</p>', 'ru', 'Намагниченность', 'Намагниченность', '2020-12-31 08:23:07', '2020-12-31 08:23:07'),
(128, 65, 'Намагніченість', 'Намагніченість', '<p>Намагніченість</p>', 'ua', 'Намагніченість', 'Намагніченість', '2020-12-31 08:23:07', '2020-12-31 08:23:07');

--
-- Дамп данных таблицы `trans_products`
--

INSERT INTO `trans_products` (`id`, `product_id`, `local`, `title`, `desc`, `params`, `meta_title`, `meta_desc`, `created_at`, `updated_at`) VALUES
(93, 24, 'ru', 'Магнит неодимовый, диск 1х1 мм (рус.)', '<p>Магнит неодимовый диск 1х1 мм. Основное описание&nbsp;(рус.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (рус.)\", \"value\": \"1.1. Значение (рус.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (рус.)\", \"value\": \"1.2. Значение (рус.)\"}], \"title\": \"1. Группа характеристик (рус.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (рус.)\", \"value\": \"2.1. Значение (рус.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (рус.)\", \"value\": \"2.2. Значение (рус.)\"}], \"title\": \"2. Группа характеристик (рус.)\"}]', 'Магнит неодимовый, диск 1х1 мм (рус.)', 'Магнит неодимовый диск 1х1 мм. Основное описание (рус.)', '2020-12-08 09:18:04', '2020-12-08 09:18:04'),
(94, 24, 'ua', 'Магнит неодимовый, диск 1х1 мм (укр.)', '<p>Магнит неодимовый диск 1х1 мм. Основное описание&nbsp;(укр.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (укр.)\", \"value\": \"1.1. Значение (укр.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (укр.)\", \"value\": \"1.2. Значение (укр.)\"}], \"title\": \"1. Группа характеристик (укр.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (укр.)\", \"value\": \"2.1. Значение (укр.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (укр.)\", \"value\": \"2.2. Значение (укр.)\"}], \"title\": \"2. Группа характеристик (укр.)\"}]', 'Магнит неодимовый, диск 1х1 мм (укр.)', 'Магнит неодимовый диск 1х1 мм. Основное описание (укр.)', '2020-12-08 09:18:04', '2020-12-08 09:18:04'),
(107, 27, 'ru', 'Магнит неодимовый, стержень 4х20 мм (рус.)', '<p>Магнит неодимовый стержень 4х20 мм. Основное описание&nbsp;(рус.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (рус.)\", \"value\": \"1.1. Значение (рус.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (рус.)\", \"value\": \"1.2. Значение (рус.)\"}], \"title\": \"1. Группа характеристик (рус.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (рус.)\", \"value\": \"2.1. Значение (рус.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (рус.)\", \"value\": \"2.2. Значение (рус.)\"}], \"title\": \"2. Группа характеристик (рус.)\"}]', 'Магнит неодимовый, стержень 4х20 мм (рус.)', 'Магнит неодимовый стержень 4х20 мм. Основное описание (рус.)', '2020-12-08 09:46:45', '2020-12-08 09:46:45'),
(108, 27, 'ua', 'Магнит неодимовый, стержень 4х20 мм (укр.)', '<p>Магнит неодимовый стержень 4х20 мм. Основное описание&nbsp;(укр.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (укр.)\", \"value\": \"1.1. Значение (укр.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (укр.)\", \"value\": \"1.2. Значение (укр.)\"}], \"title\": \"1. Группа характеристик (укр.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (укр.)\", \"value\": \"2.1. Значение (укр.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (укр.)\", \"value\": \"2.2. Значение (укр.)\"}], \"title\": \"2. Группа характеристик (укр.)\"}]', 'Магнит неодимовый, стержень 4х20 мм (укр.)', 'Магнит неодимовый стержень 4х20 мм. Основное описание (укр.)', '2020-12-08 09:46:45', '2020-12-08 09:46:45'),
(115, 29, 'ru', 'Магнит неодимовый, стержень 3х6 мм (рус.)', '<p>Магнит неодимовый стержень 3х6 мм. Основное описание&nbsp;(рус.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (рус.)\", \"value\": \"1.1. Значение (рус.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (рус.)\", \"value\": \"1.2. Значение (рус.)\"}], \"title\": \"1. Группа характеристик (рус.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (рус.)\", \"value\": \"2.1. Значение (рус.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (рус.)\", \"value\": \"2.2. Значение (рус.)\"}], \"title\": \"2. Группа характеристик (рус.)\"}]', 'Магнит неодимовый, стержень 3х6 мм (рус.)', 'Магнит неодимовый стержень 3х6 мм. Основное описание (рус.)', '2020-12-08 09:53:44', '2020-12-08 09:53:44'),
(116, 29, 'ua', 'Магнит неодимовый, стержень 9х32 мм (укр.)', '<p>Магнит неодимовый стержень 9х32 мм. Основное описание&nbsp;(укр.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (укр.)\", \"value\": \"1.1. Значение (укр.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (укр.)\", \"value\": \"1.2. Значение (укр.)\"}], \"title\": \"1. Группа характеристик (укр.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (укр.)\", \"value\": \"2.1. Значение (укр.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (укр.)\", \"value\": \"2.2. Значение (укр.)\"}], \"title\": \"2. Группа характеристик (укр.)\"}]', 'Магнит неодимовый, стержень 9х32 мм (укр.)', 'Магнит неодимовый стержень 9х32 мм. Основное описание (укр.)', '2020-12-08 09:53:44', '2020-12-08 09:53:44'),
(117, 28, 'ru', 'Магнит неодимовый, стержень 9х32 мм (рус.)', '<p>Магнит неодимовый стержень 9х32 мм. Основное описание&nbsp;(рус.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (рус.)\", \"value\": \"1.1. Значение (рус.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (рус.)\", \"value\": \"1.2. Значение (рус.)\"}], \"title\": \"1. Группа характеристик (рус.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (рус.)\", \"value\": \"2.1. Значение (рус.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (рус.)\", \"value\": \"2.2. Значение (рус.)\"}], \"title\": \"2. Группа характеристик (рус.)\"}]', 'Магнит неодимовый, стержень 9х32 мм (рус.)', 'Магнит неодимовый стержень 9х32 мм. Основное описание (рус.)', '2020-12-08 09:53:59', '2020-12-08 09:53:59'),
(118, 28, 'ua', 'Магнит неодимовый, стержень 9х32 мм (укр.)', '<p>Магнит неодимовый стержень 9х32 мм. Основное описание&nbsp;(укр.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (укр.)\", \"value\": \"1.1. Значение (укр.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (укр.)\", \"value\": \"1.2. Значение (укр.)\"}], \"title\": \"1. Группа характеристик (укр.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (укр.)\", \"value\": \"2.1. Значение (укр.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (укр.)\", \"value\": \"2.2. Значение (укр.)\"}], \"title\": \"2. Группа характеристик (укр.)\"}]', 'Магнит неодимовый, стержень 9х32 мм (укр.)', 'Магнит неодимовый стержень 9х32 мм. Основное описание (укр.)', '2020-12-08 09:53:59', '2020-12-08 09:53:59'),
(125, 30, 'ru', 'Магнит неодимовый, диск, самоклейка 10х6 мм (рус.)', '<p>Магнит неодимовый диск, самоклейка 10х6 мм. Основное описание&nbsp;(рус.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (рус.)\", \"value\": \"1.1. Значение (рус.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (рус.)\", \"value\": \"1.2. Значение (рус.)\"}], \"title\": \"1. Группа характеристик (рус.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (рус.)\", \"value\": \"2.1. Значение (рус.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (рус.)\", \"value\": \"2.2. Значение (рус.)\"}], \"title\": \"2. Группа характеристик (рус.)\"}]', 'Магнит неодимовый, диск, самоклейка 10х6 мм (рус.)', 'Магнит неодимовый диск, самоклейка 10х6 мм. Основное описание (рус.)', '2020-12-08 09:58:27', '2020-12-08 09:58:27'),
(126, 30, 'ua', 'Магнит неодимовый, диск, самоклійка 10х6 мм (укр.)', '<p>Магнит неодимовый диск, самоклійка 10х6 мм. Основное описание&nbsp;(укр.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (укр.)\", \"value\": \"1.1. Значение (укр.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (укр.)\", \"value\": \"1.2. Значение (укр.)\"}], \"title\": \"1. Группа характеристик (укр.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (укр.)\", \"value\": \"2.1. Значение (укр.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (укр.)\", \"value\": \"2.2. Значение (укр.)\"}], \"title\": \"2. Группа характеристик (укр.)\"}]', 'Магнит неодимовый, диск, самоклійка 10х6 мм (укр.)', 'Магнит неодимовый диск, самоклійка 10х6 мм. Основное описание (укр.)', '2020-12-08 09:58:27', '2020-12-08 09:58:27'),
(141, 32, 'ru', 'Магнит феритовый, диск, самоклейка 1х1 мм (рус.)', '<p>Магнит феритовый диск, самоклейка 1х1 мм. Основное описание&nbsp;(рус.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (рус.)\", \"value\": \"1.1. Значение (рус.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (рус.)\", \"value\": \"1.2. Значение (рус.)\"}], \"title\": \"1. Группа характеристик (рус.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (рус.)\", \"value\": \"2.1. Значение (рус.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (рус.)\", \"value\": \"2.2. Значение (рус.)\"}], \"title\": \"2. Группа характеристик (рус.)\"}]', 'Магнит феритовый, диск, самоклейка 1х1 мм (рус.)', 'Магнит феритовый диск, самоклейка 1х1 мм. Основное описание (рус.)', '2020-12-08 10:10:14', '2020-12-08 10:10:14'),
(142, 32, 'ua', 'Магнит феритовий, диск, самоклійка 1х1 мм (укр.)', '<p>Магнит феритовий диск, самоклійка 1х1 мм. Основное описание&nbsp;(укр.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (укр.)\", \"value\": \"1.1. Значение (укр.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (укр.)\", \"value\": \"1.2. Значение (укр.)\"}], \"title\": \"1. Группа характеристик (укр.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (укр.)\", \"value\": \"2.1. Значение (укр.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (укр.)\", \"value\": \"2.2. Значение (укр.)\"}], \"title\": \"2. Группа характеристик (укр.)\"}]', 'Магнит феритовий, диск, самоклійка 1х1 мм (укр.)', 'Магнит феритовий диск, самоклійка 1х1 мм. Основное описание (укр.)', '2020-12-08 10:10:14', '2020-12-08 10:10:14'),
(145, 34, 'ru', 'Магнит феритовый, стержень 3х6 мм (рус.)', '<p>Магнит феритовый стержень 3х6 мм. Основное описание&nbsp;(рус.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (рус.)\", \"value\": \"1.1. Значение (рус.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (рус.)\", \"value\": \"1.2. Значение (рус.)\"}], \"title\": \"1. Группа характеристик (рус.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (рус.)\", \"value\": \"2.1. Значение (рус.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (рус.)\", \"value\": \"2.2. Значение (рус.)\"}], \"title\": \"2. Группа характеристик (рус.)\"}]', 'Магнит феритовый, стержень 3х6 мм (рус.)', 'Магнит феритовый стержень 3х6 мм. Основное описание (рус.)', '2020-12-08 10:12:47', '2020-12-08 10:12:47'),
(146, 34, 'ua', 'Магнит феритовый, стержень 9х32 мм (укр.)', '<p>Магнит феритовый стержень 9х32 мм. Основное описание&nbsp;(укр.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (укр.)\", \"value\": \"1.1. Значение (укр.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (укр.)\", \"value\": \"1.2. Значение (укр.)\"}], \"title\": \"1. Группа характеристик (укр.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (укр.)\", \"value\": \"2.1. Значение (укр.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (укр.)\", \"value\": \"2.2. Значение (укр.)\"}], \"title\": \"2. Группа характеристик (укр.)\"}]', 'Магнит феритовый, стержень 9х32 мм (укр.)', 'Магнит феритовый стержень 9х32 мм. Основное описание (укр.)', '2020-12-08 10:12:47', '2020-12-08 10:12:47'),
(149, 35, 'ru', 'Магнит феритовый, стержень 9х32 мм (рус.)', '<p>Магнит феритовый стержень 9х32 мм. Основное описание&nbsp;(рус.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (рус.)\", \"value\": \"1.1. Значение (рус.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (рус.)\", \"value\": \"1.2. Значение (рус.)\"}], \"title\": \"1. Группа характеристик (рус.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (рус.)\", \"value\": \"2.1. Значение (рус.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (рус.)\", \"value\": \"2.2. Значение (рус.)\"}], \"title\": \"2. Группа характеристик (рус.)\"}]', 'Магнит феритовый, стержень 9х32 мм (рус.)', 'Магнит феритовый стержень 9х32 мм. Основное описание (рус.)', '2020-12-08 10:13:33', '2020-12-08 10:13:33'),
(150, 35, 'ua', 'Магнит феритовый, стержень 9х32 мм (укр.)', '<p>Магнит феритовый стержень 9х32 мм. Основное описание&nbsp;(укр.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (укр.)\", \"value\": \"1.1. Значение (укр.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (укр.)\", \"value\": \"1.2. Значение (укр.)\"}], \"title\": \"1. Группа характеристик (укр.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (укр.)\", \"value\": \"2.1. Значение (укр.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (укр.)\", \"value\": \"2.2. Значение (укр.)\"}], \"title\": \"2. Группа характеристик (укр.)\"}]', 'Магнит феритовый, стержень 9х32 мм (укр.)', 'Магнит феритовый стержень 9х32 мм. Основное описание (укр.)', '2020-12-08 10:13:33', '2020-12-08 10:13:33'),
(153, 36, 'ru', 'Магнит феритовый, стержень 4х20 мм (рус.)', '<p>Магнит феритовый стержень 4х20 мм. Основное описание&nbsp;(рус.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (рус.)\", \"value\": \"1.1. Значение (рус.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (рус.)\", \"value\": \"1.2. Значение (рус.)\"}], \"title\": \"1. Группа характеристик (рус.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (рус.)\", \"value\": \"2.1. Значение (рус.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (рус.)\", \"value\": \"2.2. Значение (рус.)\"}], \"title\": \"2. Группа характеристик (рус.)\"}]', 'Магнит феритовый, стержень 4х20 мм (рус.)', 'Магнит феритовый стержень 4х20 мм. Основное описание (рус.)', '2020-12-08 10:14:18', '2020-12-08 10:14:18'),
(154, 36, 'ua', 'Магнит феритовый, стержень 4х20 мм (укр.)', '<p>Магнит феритовый стержень 4х20 мм. Основное описание&nbsp;(укр.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (укр.)\", \"value\": \"1.1. Значение (укр.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (укр.)\", \"value\": \"1.2. Значение (укр.)\"}], \"title\": \"1. Группа характеристик (укр.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (укр.)\", \"value\": \"2.1. Значение (укр.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (укр.)\", \"value\": \"2.2. Значение (укр.)\"}], \"title\": \"2. Группа характеристик (укр.)\"}]', 'Магнит феритовый, стержень 4х20 мм (укр.)', 'Магнит феритовый стержень 4х20 мм. Основное описание (укр.)', '2020-12-08 10:14:18', '2020-12-08 10:14:18'),
(155, 37, 'ru', 'Магнит феритовый, диск 10х6 мм (рус.)', '<p>Магнит феритовый диск 10х6 мм. Основное описание&nbsp;(рус.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (рус.)\", \"value\": \"1.1. Значение (рус.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (рус.)\", \"value\": \"1.2. Значение (рус.)\"}], \"title\": \"1. Группа характеристик (рус.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (рус.)\", \"value\": \"2.1. Значение (рус.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (рус.)\", \"value\": \"2.2. Значение (рус.)\"}], \"title\": \"2. Группа характеристик (рус.)\"}]', 'Магнит феритовый, диск 10х6 мм (рус.)', 'Магнит феритовый диск 10х6 мм. Основное описание (рус.)', '2020-12-08 10:15:03', '2020-12-08 10:15:03'),
(156, 37, 'ua', 'Магнит феритовый, диск 10х6 мм (укр.)', '<p>Магнит феритовый диск 10х6 мм. Основное описание&nbsp;(укр.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (укр.)\", \"value\": \"1.1. Значение (укр.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (укр.)\", \"value\": \"1.2. Значение (укр.)\"}], \"title\": \"1. Группа характеристик (укр.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (укр.)\", \"value\": \"2.1. Значение (укр.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (укр.)\", \"value\": \"2.2. Значение (укр.)\"}], \"title\": \"2. Группа характеристик (укр.)\"}]', 'Магнит феритовый, диск 10х6 мм (укр.)', 'Магнит феритовый диск 10х6 мм. Основное описание (укр.)', '2020-12-08 10:15:03', '2020-12-08 10:15:03'),
(163, 31, 'ru', 'Магнит неодимовый, диск, самоклейка 1х1 мм (рус.)', '<p>Магнит неодимовый диск, самоклейка 1х1 мм. Основное описание&nbsp;(рус.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (рус.)\", \"value\": \"1.1. Значение (рус.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (рус.)\", \"value\": \"1.2. Значение (рус.)\"}], \"title\": \"1. Группа характеристик (рус.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (рус.)\", \"value\": \"2.1. Значение (рус.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (рус.)\", \"value\": \"2.2. Значение (рус.)\"}], \"title\": \"2. Группа характеристик (рус.)\"}]', 'Магнит неодимовый, диск, самоклейка 1х1 мм (рус.)', 'Магнит неодимовый диск, самоклейка 1х1 мм. Основное описание (рус.)', '2020-12-09 14:49:14', '2020-12-09 14:49:14'),
(164, 31, 'ua', 'Магнит неодимовый, диск, самоклійка 1х1 мм (укр.)', '<p>Магнит неодимовый диск, самоклійка 1х1 мм. Основное описание&nbsp;(укр.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (укр.)\", \"value\": \"1.1. Значение (укр.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (укр.)\", \"value\": \"1.2. Значение (укр.)\"}], \"title\": \"1. Группа характеристик (укр.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (укр.)\", \"value\": \"2.1. Значение (укр.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (укр.)\", \"value\": \"2.2. Значение (укр.)\"}], \"title\": \"2. Группа характеристик (укр.)\"}]', 'Магнит неодимовый, диск, самоклійка 1х1 мм (укр.)', 'Магнит неодимовый диск, самоклійка 1х1 мм. Основное описание (укр.)', '2020-12-09 14:49:14', '2020-12-09 14:49:14'),
(303, 38, 'ru', 'Магнит феритовый, диск 1х1 мм (рус.)', '<p>Магнит феритовый диск 1х1 мм. Основное описание&nbsp;(рус.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (рус.)\", \"value\": \"1.1. Значение (рус.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (рус.)\", \"value\": \"1.2. Значение (рус.)\"}], \"title\": \"1. Группа характеристик (рус.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (рус.)\", \"value\": \"2.1. Значение (рус.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (рус.)\", \"value\": \"2.2. Значение (рус.)\"}], \"title\": \"2. Группа характеристик (рус.)\"}]', 'Магнит феритовый, диск 1х1 мм (рус.)', 'Магнит феритовый диск 1х1 мм. Основное описание (рус.)', '2020-12-15 22:16:29', '2020-12-15 22:16:29'),
(304, 38, 'ua', 'Магнит феритовый, диск 1х1 мм (укр.)', '<p>Магнит феритовый диск 1х1 мм. Основное описание&nbsp;(укр.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (укр.)\", \"value\": \"1.1. Значение (укр.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (укр.)\", \"value\": \"1.2. Значение (укр.)\"}], \"title\": \"1. Группа характеристик (укр.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (укр.)\", \"value\": \"2.1. Значение (укр.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (укр.)\", \"value\": \"2.2. Значение (укр.)\"}], \"title\": \"2. Группа характеристик (укр.)\"}]', 'Магнит феритовый, диск 1х1 мм (укр.)', 'Магнит феритовый диск 1х1 мм. Основное описание (укр.)', '2020-12-15 22:16:29', '2020-12-15 22:16:29'),
(305, 33, 'ru', 'Магнит феритовый, диск, самоклейка 10х6 мм (рус.)', '<p>Магнит феритовый диск, самоклейка 10х6 мм. Основное описание&nbsp;(рус.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (рус.)\", \"value\": \"1.1. Значение (рус.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (рус.)\", \"value\": \"1.2. Значение (рус.)\"}], \"title\": \"1. Группа характеристик (рус.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (рус.)\", \"value\": \"2.1. Значение (рус.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (рус.)\", \"value\": \"2.2. Значение (рус.)\"}], \"title\": \"2. Группа характеристик (рус.)\"}]', 'Магнит феритовый, диск, самоклейка 10х6 мм (рус.)', 'Магнит феритовый диск, самоклейка 10х6 мм. Основное описание (рус.)', '2020-12-15 22:36:19', '2020-12-15 22:36:19'),
(306, 33, 'ua', 'Магнит феритовий, диск, самоклійка 10х6 мм (укр.)', '<p>Магнит феритовий диск, самоклійка 10х6 мм. Основное описание&nbsp;(укр.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (укр.)\", \"value\": \"1.1. Значение (укр.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (укр.)\", \"value\": \"1.2. Значение (укр.)\"}], \"title\": \"1. Группа характеристик (укр.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (укр.)\", \"value\": \"2.1. Значение (укр.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (укр.)\", \"value\": \"2.2. Значение (укр.)\"}], \"title\": \"2. Группа характеристик (укр.)\"}]', 'Магнит феритовий, диск, самоклійка 10х6 мм (укр.)', 'Магнит феритовий диск, самоклійка 10х6 мм. Основное описание (укр.)', '2020-12-15 22:36:19', '2020-12-15 22:36:19'),
(307, 25, 'ru', 'Магнит неодимовый, диск 10х6 мм (рус.)', '<p>Магнит неодимовый диск 10х6 мм. Основное описание&nbsp;(рус.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (рус.)\", \"value\": \"1.1. Значение (рус.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (рус.)\", \"value\": \"1.2. Значение (рус.)\"}], \"title\": \"1. Группа характеристик (рус.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (рус.)\", \"value\": \"2.1. Значение (рус.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (рус.)\", \"value\": \"2.2. Значение (рус.)\"}], \"title\": \"2. Группа характеристик (рус.)\"}]', 'Магнит неодимовый, диск 10х6 мм (рус.)', 'Магнит неодимовый диск 10х6 мм. Мета-описание (рус.)', '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(308, 25, 'ua', 'Магнит неодимовый, диск 10х6 мм (укр.)', '<p>Магнит неодимовый диск 10х6 мм. Основное описание&nbsp;(укр.)</p>', '[{\"id\": 1607429229978, \"items\": [{\"id\": 1607429229978, \"name\": \"1.1. Название (укр.)\", \"value\": \"1.1. Значение (укр.)\"}, {\"id\": 1607429725612, \"name\": \"1.2. Название (укр.)\", \"value\": \"1.2. Значение (укр.)\"}], \"title\": \"1. Группа характеристик (укр.)\"}, {\"id\": 1607429745392, \"items\": [{\"id\": 1607429752024, \"name\": \"2.1. Название (укр.)\", \"value\": \"2.1. Значение (укр.)\"}, {\"id\": 1607429751706, \"name\": \"2.2. Название (укр.)\", \"value\": \"2.2. Значение (укр.)\"}], \"title\": \"2. Группа характеристик (укр.)\"}]', 'Магнит неодимовый, диск 10х6 мм (укр.)', 'Магнит неодимовый диск 10х6 мм. Основное описание (укр.)', '2020-12-15 22:39:28', '2020-12-15 22:39:28'),
(359, 43, 'ru', 'Односторонний поисковый магнит МП 300', '<p>Поисковый магнит&nbsp;(магнитный держатель) серии МП для разведки и подъёма находок до 300кг со дна водоёмов, колодцев, провалов в земле и т.д. Также используется как магнитный держатель в зданиях с металлическим перекрытием для подвешивания различных предметов, оборудования, временного подвешивания грузов до 300 кг.&nbsp;</p>\n\n<p>Необходимо помнить, что максимальный вес удержания такого магнита будет соблюдатся при оптимальных условиях - чистая и ровная стальная поверхность, толщиной не менее 10 мм. При иных условиях, например поверхность металла окрашена, ржавая и т.п. магнитная сила уменьшается.</p>\n\n<p>На нашем&nbsp;Youtube канале есть <a href=\\\"https://youtu.be/5SFJpmrLICM\\\">видео обзор</a> и испытание этого магнита.</p>\n\n<p><strong>Комплектация магнита МП 300 кг:</strong></p>\n\n<p>- магнит поисковый односторонний МП 300 -1шт;</p>\n\n<p>- рым болт М10 - 1шт;</p>\n\n<p>- винт барашек- 1шт,</p>\n\n<p>- гровер (от самораскручивания) -1шт;</p>\n\n<p>- инструкция (сертификат, протокол испытаний);</p>\n\n<p>- упаковка ( коробка с пенополистерольными прокладками).<br />\n<br />\n<strong>Особенности:</strong></p>\n\n<p>Каждый поисковый магнит МП торговой марки &quot;Магнитон&quot; имеет порядковый номер и&nbsp;<a href=\\\"https://www.youtube.com/playlist?list=PLsXPHcMdocijjrfcg5hWGQc9pLeN64lry\\\">проходит испытания на нашем испытательном стенде</a>, где под вертикальной нагрузкой 90&ordm; магнит отрывается от металлической плиты толщиной 25 мм. Результаты каждого испытания вноситься в инструкцию в графе протокол испытаний с указанием номера поискового магнита, даты и результата испытаний. Магниты, показавшие негативный результат отбраковываются и не идут в продажу.&nbsp;</p>\n\n<p><strong>Бесплатная доставка при 100% предоплате!!!</strong></p>', '[{\"id\": 1608301094090, \"items\": [{\"id\": 1608301839345, \"name\": \"Сила сцепления, кг\", \"value\": \"300\"}, {\"id\": 1608301838831, \"name\": \"Сила сцепления (тест Магнитон),кг\", \"value\": \"448\"}, {\"id\": 1608301838059, \"name\": \"Полезная площадь магнита,см2\", \"value\": \"70,1\"}, {\"id\": 1608301837569, \"name\": \"Внешний диаметр, мм\", \"value\": \"98\"}, {\"id\": 1608301835124, \"name\": \"Внешний диаметр вклеенного магнит, мм\", \"value\": \"85\"}, {\"id\": 1608301834797, \"name\": \"Внутренний диаметр вклеенного магнит, мм\", \"value\": \"26\"}, {\"id\": 1608301834533, \"name\": \"Высота, мм\", \"value\": \"20\"}, {\"id\": 1608301834229, \"name\": \"Вес, кг\", \"value\": \"1,2\"}, {\"id\": 1608301094090, \"name\": \"Устройство отрыва\", \"value\": \"Да\"}], \"title\": \"Технические характеристики\"}, {\"id\": 1608301894098, \"items\": [{\"id\": 1608301899007, \"name\": \"Материал корпуса\", \"value\": \"Ст.20\"}, {\"id\": 1608301898824, \"name\": \"Материал магнита\", \"value\": \"NdFeB\"}, {\"id\": 1608301894098, \"name\": \"Покрытие магнита\", \"value\": \"Ni-Cu-Ni\"}], \"title\": \"Материал и покрытие\"}, {\"id\": 1608301893773, \"items\": [{\"id\": 1608301900154, \"name\": \"Резьба,М\", \"value\": \"10\"}, {\"id\": 1608301899970, \"name\": \"Длина рым болта, мм\", \"value\": \"86,4\"}, {\"id\": 1608301893773, \"name\": \"Внутренний диаметр ушка, мм\", \"value\": \"19\"}], \"title\": \"Характеристики рым болта\"}]', 'Односторонний поисковый магнит МП 300', 'Поисковый магнит (магнитный держатель) серии МП для разведки и подъёма находок до 300кг со дна водоёмов, колодцев, провалов в земле и т.д. Также используется как магнитный держатель в зданиях с металлическим перекрытием для подвешивания различных предметов, оборудования, временного подвешивания грузов до 300 кг.', '2020-12-24 06:11:26', '2020-12-24 06:11:26'),
(360, 43, 'ua', 'Односторонній пошуковий магніт МП 300', '<p>Пошуковий магніт (магнітний тримач) серії МП для розвідки і підйому знахідок до 300кг з дна водойм, колодязів, провалів в землі і т.д. Також використовується як магнітний тримач в будівлях з металевим перекриттям для підвішування різних предметів, обладнання, тимчасового підвішування вантажів до 300 кг.</p>\n\n<p>Необхідно пам&#39;ятати, що максимальна вага утримання такого магніту буде соблюдатся при оптимальних умовах - чиста і рівна сталева поверхня, товщиною не менше 10 мм. За інших умов, наприклад поверхню металу забарвлена, іржава і т.п. магнітна сила зменшується.</p>\n\n<p>На нашому Youtube каналі є <a href=\\\"https://youtu.be/5SFJpmrLICM\\\">відео огляд і випробування цього магніту.</a></p>\n\n<p><strong>Комплектація магніту МП 300 кг:</strong></p>\n\n<p>- магніт пошуковий односторонній МП 300-1шт;</p>\n\n<p>- рим болт М10 - 1шт;</p>\n\n<p>- гвинт барашек- 1шт,</p>\n\n<p>- гровер (від самораскручіванія) 1шт;</p>\n\n<p>- інструкція (сертифікат, протокол випробувань);</p>\n\n<p>- упаковка (коробка з пенополістерольних прокладками).</p>\n\n<p><strong>Особливості:</strong></p>\n\n<p>Кожен пошуковий магніт МП торгової марки &quot;Магнітон&quot; має порядковий номер і <a href=\\\"https://www.youtube.com/playlist?list=PLsXPHcMdocijjrfcg5hWGQc9pLeN64lry\\\">проходить випробування на нашому випробувальному стенді</a>, де під вертикальним навантаженням 90&ordm; магніт відривається від металевої плити товщиною 25 мм. Результати кожного випробування вноситися в інструкцію в графі протокол випробувань із зазначенням номера пошукового магніту, дати і результату випробувань. Магніти, які показали негативний результат відбраковуються і не йдуть в продаж.</p>\n\n<p>Безкоштовна доставка при 100% передоплаті !!!</p>', '[{\"id\": 1608301094090, \"items\": [{\"id\": 1608301839345, \"name\": \"Сила зчеплення, кг\", \"value\": \"300\"}, {\"id\": 1608301838831, \"name\": \"Сила зчеплення (тест Магнітон),кг\", \"value\": \"448\"}, {\"id\": 1608301838059, \"name\": \"Корисна площа магніта,см2\", \"value\": \"70,1\"}, {\"id\": 1608301837569, \"name\": \"Зовнішній діаметр, мм\", \"value\": \"98\"}, {\"id\": 1608301835124, \"name\": \"Зовнішній діаметр вклеєного магніт, мм\", \"value\": \"85\"}, {\"id\": 1608301834797, \"name\": \"Внутрішній діаметр вклеєного магніт, мм\", \"value\": \"26\"}, {\"id\": 1608301834533, \"name\": \"Висота, мм\", \"value\": \"20\"}, {\"id\": 1608301834229, \"name\": \"Вага, кг\", \"value\": \"1,2\"}, {\"id\": 1608301094090, \"name\": \"Пристрій відриву\", \"value\": \"Так\"}], \"title\": \"Технічні характеристики\"}, {\"id\": 1608301894098, \"items\": [{\"id\": 1608301899007, \"name\": \"Матеріал корпусу\", \"value\": \"Ст.20\"}, {\"id\": 1608301898824, \"name\": \"Матеріал магніта\", \"value\": \"NdFeB\"}, {\"id\": 1608301894098, \"name\": \"Покриття магніту\", \"value\": \"Ni-Cu-Ni\"}], \"title\": \"Матеріал і покриття\"}, {\"id\": 1608301893773, \"items\": [{\"id\": 1608301900154, \"name\": \"Різьба,М\", \"value\": \"10\"}, {\"id\": 1608301899970, \"name\": \"Довжина рим болта, мм\", \"value\": \"86,4\"}, {\"id\": 1608301893773, \"name\": \"Внутрішній діаметр вушка, мм\", \"value\": \"19\"}], \"title\": \"Характеристики рим болта\"}]', 'Односторонній пошуковий магніт МП300', 'Пошуковий магніт (магнітний тримач) серії МП для розвідки і підйому знахідок до 300кг з дна водойм, колодязів, провалів в землі і т.д. Також використовується як магнітний тримач в будівлях з металевим перекриттям для підвішування різних предметів, обладнання, тимчасового підвішування вантажів до 300 кг.', '2020-12-24 06:11:26', '2020-12-24 06:11:26'),
(385, 40, 'ru', 'Экспедиционный поисковый магнит F= 80 кг', '<p>Наименьший из линейки поисковых магнитов.</p>\n\n<p>Компактный&nbsp;поисковый магнит&nbsp; для разведки и подъёма находок небольшой величины со дна водоёмов, колодцев, провалов в земле и т.д. Также используется как магнитный держатель в зданиях с металлическим перекрытием для подвешивания различных предметов, оборудования, временного подвешивания грузов до 80 кг.&nbsp;</p>\n\n<p>Необходимо помнить, что максимальный вес удержания такого магнита будет соблюдатся при оптимальных условиях - чистая и ровная стальная поверхность, толщиной не менее 10 мм. При иных условиях, например поверхность металла окрашена, магнитная сила уменьшается.</p>\n\n<p>Комплектация:</p>\n\n<p>1. Магнит в корпусе.</p>\n\n<p>2. Рым болт.</p>\n\n<p><br />\nТакие поисковые магниты, как F=80 кг &nbsp;применяются не только для поиска металлических предметов поисковиками или как экспедиционные магниты.&nbsp;</p>\n\n<p><br />\nБлагодаря тому, что эти магниты имеют миниатюрные размеры и очень мощные, а также имеют кольцо для удержания в руке или крепления за крючок, веревку, поисковые магниты нашли еще несколько применений в промышленности и быту:&nbsp;</p>\n\n<p>1. Отделение, сортировка, &nbsp;определение сталей и металлических сплавов, которые содержат железо, никель или кобальт от других металлов и неметаллов. Например из груды металлолома можно выделить металлические предметы из цветных металлов (не магнитятся) или наоборот.<br />\n2. Определение состава хромированных предметов из полированного алюминия, серебра и нержавеющей стали (немагнитные сорта нержавеющей стали).&nbsp;<br />\n3. Определение материала, находящегося под латунным, бронзовым покрытием при покупке предметов старины и т.п. Например проверка медной проволоки и отделение от обедненной.&nbsp;<br />\n4. Определение некоторых типов фальшивой бижутерии, которая часто содержат сталь или никель в своем составе и этого не видно из-за покрытия.&nbsp;<br />\n5.&nbsp;Использование для научных, обучающих экспериментов с ферромагнетиками.</p>', '[{\"id\": 1608290923038, \"items\": [{\"id\": 1608291521231, \"name\": \"Сила сцепления, кг\", \"value\": \"80\"}, {\"id\": 1608291520828, \"name\": \"Сила сцепления(тест Магнитон), кг\", \"value\": \"79\"}, {\"id\": 1608291520469, \"name\": \"Полезная площадь магнита, см2\", \"value\": \"10,75\"}, {\"id\": 1608291513252, \"name\": \"Внешний диаметр, мм\", \"value\": \"48\"}, {\"id\": 1608291511420, \"name\": \"Диаметр вклеенного магнит, мм:\", \"value\": \"37\"}, {\"id\": 1608290923038, \"name\": \"Вес, кг\", \"value\": \"0,21\"}, {\"id\": 1608292132675, \"name\": \"Устройство отрыва\", \"value\": \"Да\"}], \"title\": \"Технические характеристики\"}, {\"id\": 1608292248039, \"items\": [{\"id\": 1608292248039, \"name\": \"Материал корпуса\", \"value\": \"Ст.20\"}, {\"id\": 1608292322847, \"name\": \"Материал магнита\", \"value\": \"NdFeB\"}, {\"id\": 1608292322379, \"name\": \"Покрытие магнита\", \"value\": \"Ni-Cu-Ni\"}], \"title\": \"Материал и покрытие\"}, {\"id\": 1608292286381, \"items\": [{\"id\": 1608292286381, \"name\": \"Резьба,М\", \"value\": \"8\"}, {\"id\": 1608292455855, \"name\": \"Длина рым болта, мм\", \"value\": \"50\"}, {\"id\": 1608292455475, \"name\": \"Внутренний диаметр ушка, мм\", \"value\": \"19\"}], \"title\": \"Характеристики рым болта\"}]', 'Экспедиционный поисковый магнит F= 80 кг', 'Компактный поисковый магнит  для разведки и подъёма находок небольшой величины со дна водоёмов, колодцев, провалов в земле и т.д. Также используется как магнитный держатель в зданиях с металлическим перекрытием для подвешивания различных предметов, оборудования, временного подвешивания грузов до 80 кг.', '2020-12-24 08:09:45', '2020-12-24 08:09:45'),
(386, 40, 'ua', 'Експедиційні пошуковий магніт F= 80 кг', '<p>Найменший з лінійки пошукових магнітів.</p>\n\n<p>Компактний пошуковий магніт для розвідки і підйому знахідок невеликої величини з дна водойм, колодязів, провалів в землі і т.д. Також використовується як магнітний тримач в будівлях з металевим перекриттям для підвішування різних предметів, обладнання, тимчасового підвішування вантажів до 80 кг.</p>\n\n<p>Необхідно пам&#39;ятати, що максимальна вага утримання такого магніту буде соблюдатся при оптимальних умовах - чиста і рівна сталева поверхня, товщиною не менше 10 мм. За інших умов, наприклад поверхню металу забарвлена, магнітна сила зменшується.</p>\n\n<p>Комплектація:</p>\n\n<p>1. Магніт в корпусі.</p>\n\n<p>2. Рим болт.</p>\n\n<p>Такі пошукові магніти, як F = 80 кг застосовуються не тільки для пошуку металевих предметів пошуковими системами або як експедиційні магніти.</p>\n\n<p>Завдяки тому, що ці магніти мають мініатюрні розміри і дуже потужні, а також мають кільце для утримання в руці або кріплення за гачок, мотузку, пошукові магніти знайшли ще кілька застосувань в промисловості та побуті:</p>\n\n<p>1. Відділення, сортування, визначення сталей і металевих сплавів, які містять залізо, нікель або кобальт від інших металів і неметалів. Наприклад з купи металобрухту можна виділити металеві предмети з кольорових металів (НЕ магнитятся) або навпаки.<br />\n2. Визначення складу хромованих предметів з полірованого алюмінію, срібла і нержавіючої сталі (немагнітні сорти нержавіючої сталі).<br />\n3. Визначення матеріалу, що знаходиться під латунним, бронзовим покриттям при купівлі предметів старовини і т.п. Наприклад перевірка мідного дроту і відділення від збідненого.<br />\n4. Визначення деяких типів фальшивої біжутерії, яка часто містять сталь або нікель в своєму складі і цього не видно з-за покриття.<br />\n5. Використання для наукових, навчальних експериментів з феромагнетиками.</p>', '[{\"id\": 1608290923038, \"items\": [{\"id\": 1608291521231, \"name\": \"Cила зчеплення, кг\", \"value\": \"80\"}, {\"id\": 1608291520828, \"name\": \"Cила зчеплення(тест Магнітон), кг\", \"value\": \"79\"}, {\"id\": 1608291520469, \"name\": \"Корисна площа магніту, см2\", \"value\": \"10,75\"}, {\"id\": 1608291513252, \"name\": \"Зовнішній діаметр, мм\", \"value\": \"48\"}, {\"id\": 1608291511420, \"name\": \"Діаметр вклеєного магніт, мм:\", \"value\": \"37\"}, {\"id\": 1608290923038, \"name\": \"Вага, кг\", \"value\": \"0,21\"}, {\"id\": 1608292132675, \"name\": \"Пристрій відриву\", \"value\": \"Так\"}], \"title\": \"Технічні характеристики\"}, {\"id\": 1608292248039, \"items\": [{\"id\": 1608292248039, \"name\": \"Матеріал корпусу\", \"value\": \"Ст.20\"}, {\"id\": 1608292322847, \"name\": \"Матеріал магніту\", \"value\": \"NdFeB\"}, {\"id\": 1608292322379, \"name\": \"Покриття магніту\", \"value\": \"Ni-Cu-Ni\"}], \"title\": \"Матеріал і покриття\"}, {\"id\": 1608292286381, \"items\": [{\"id\": 1608292286381, \"name\": \"Різьба,М\", \"value\": \"8\"}, {\"id\": 1608292455855, \"name\": \"Довжина рим болта, мм\", \"value\": \"50\"}, {\"id\": 1608292455475, \"name\": \"Внутрішній діаметр вушка, мм\", \"value\": \"19\"}], \"title\": \"Характеристики рим болта\"}]', 'Експедиційні пошуковий магніт F= 80 кг', 'Компактний пошуковий магніт для розвідки і підйому знахідок невеликої величини з дна водойм, колодязів, провалів в землі і т.д. Також використовується як магнітний тримач в будівлях з металевим перекриттям для підвішування різних предметів, обладнання, тимчасового підвішування вантажів до 80 кг.', '2020-12-24 08:09:45', '2020-12-24 08:09:45'),
(393, 44, 'ru', 'Односторонний поисковый магнит МП400', '<p><strong>Поисковые магниты предназначены для подъема ферромагнитных предметов из колодцев, провалов, водоемов и т. д.</strong></p>\n\n<p>&bull; Корпус поискового магнита представляет собой точеную деталь, выполненную из материала Ст20.<br />\n&bull; Магнит и корпус покрыты антикоррозионным покрытием, зазор между корпусом и магнитом заполнен эпоксидным клеем, соответственно магнит может использоваться в морской и пресной воде.<br />\n&bull; Все поисковые магниты комплектуются рым-болтами<br />\n&bull; Магниты имеют сквозные отверстия для снятия&nbsp;с помощью рым болта (устройство механического отрыва).<br />\n<br />\n<strong>Варианты использования поисковых магнитов:</strong><br />\n<br />\n- Поиск и подъём металлических (железо или цветмет с железными деталями) предметов из колодцев, воронок, рек, озер и других водоемов.<br />\n- Траление водоемов в поисках крупных железных предметов (танки, машины, корабли).<br />\n- Очистка вынутого грунта от мелкого железа на замусоренных местах при поиске мелких монет (чешуек например).<br />\n- Подготовка места к поиску с МД (очистка от железного мусора) в сухом рыхлом грунте, например на чердаке или под полом.<br />\n- Удаление железа на сильно замусоренных участках, например при раскапывании фундаментов старых домов.<br />\n- Определение магнитности камней (возможных железных метеоритов).<br />\n- Подъем различного железного лома.</p>\n\n<p><strong>Комплектация:</strong></p>\n\n<p>1. Магнит поисковый односторонний МП400кг.</p>\n\n<p>2. Рым-болт М10 + Контргайка-барашек +гровер (от раскручивания).</p>\n\n<p>3. Инструкция (сертификат, протокол испытаний);</p>\n\n<p>4. Защитная упаковка&nbsp;( коробка с пенополистерольными прокладками).<br />\n<br />\n<strong>Особенности:</strong></p>\n\n<p>Каждый поисковый магнит МП торговой марки &quot;Магнитон&quot; имеет порядковый номер и&nbsp;<a href=\\\"https://www.youtube.com/playlist?list=PLsXPHcMdocijjrfcg5hWGQc9pLeN64lry\\\">проходит испытания на нашем испытательном стенде</a>, где под вертикальной нагрузкой 90&ordm; магнит отрывается от металлической плиты толщиной 25 мм. Результаты каждого испытания вноситься в инструкцию в графе протокол испытаний с указанием номера поискового магнита, даты и результата испытаний. Магниты, показавшие негативный результат отбраковываются и не идут в продажу.&nbsp;<br />\n<br />\n<strong>Бесплатная доставка при 100% предоплате!!!</strong></p>', '[{\"id\": 1608303939284, \"items\": [{\"id\": 1608303955689, \"name\": \"Сила сцепления, кг\", \"value\": \"400\"}, {\"id\": 1608303955005, \"name\": \"Сила сцепления (тест Магнитон),кг\", \"value\": \"525\"}, {\"id\": 1608303954305, \"name\": \"Полезная площадь магнита,см2\", \"value\": \"56,53\"}, {\"id\": 1608303951813, \"name\": \"Внешний диаметр, мм\", \"value\": \"105\"}, {\"id\": 1608303951253, \"name\": \"Внешний диаметр вклеенного магнит, мм\", \"value\": \"90\"}, {\"id\": 1608303950701, \"name\": \"Внутренний диаметр вклеенного магнит, мм\", \"value\": \"30\"}, {\"id\": 1608303950126, \"name\": \"Высота, мм\", \"value\": \"22\"}, {\"id\": 1608303949572, \"name\": \"Вес, кг\", \"value\": \"1,5\"}, {\"id\": 1608303939284, \"name\": \"Устройство отрыва\", \"value\": \"Да\"}], \"title\": \"Технические характеристики\"}, {\"id\": 1608303938996, \"items\": [{\"id\": 1608303966598, \"name\": \"Материал корпуса\", \"value\": \"Ст.20\"}, {\"id\": 1608303966253, \"name\": \"Материал магнита\", \"value\": \"NdFeB\"}, {\"id\": 1608303938996, \"name\": \"Покрытие магнита\", \"value\": \"Ni-Cu-Ni\"}], \"title\": \"Материал и покрытие\"}, {\"id\": 1608303422290, \"items\": [{\"id\": 1608303977180, \"name\": \"Резьба,М\", \"value\": \"10\"}, {\"id\": 1608303976762, \"name\": \"Длина рым болта, мм\", \"value\": \"94,5\"}, {\"id\": 1608303422290, \"name\": \"Внутренний диаметр ушка, мм\", \"value\": \"22,7\"}], \"title\": \"Характеристики рым болта\"}]', 'Односторонний поисковый магнит МП400', 'Односторонний поисковый магнит МП400 Магнитон. Вес: 1,49 кг. Рым болт М10, контргайка, диаметр 105 мм, неодимовый магнит.', '2020-12-24 08:11:39', '2020-12-24 08:11:39'),
(394, 44, 'ua', 'Односторонній пошуковий магніт МП 400', '<p><strong>Пошукові магніти призначені для підйому феромагнітних предметів з колодязів, провалів, водойм і т. Д.</strong></p>\n\n<p>&bull; Корпус пошукового магніту є витонченою деталь, виконану з матеріалу Ст20.<br />\n&bull; Магніт і корпус покриті антикорозійним покриттям, зазор між корпусом і магнітом заповнений епоксидним клеєм, відповідно магніт може використовуватися в морській і прісній воді.<br />\n&bull; Всі пошукові магніти комплектуються рим-болтами<br />\n&bull; Магніти мають наскрізні отвори для зняття з допомогою рим болта (пристрій механічного відриву).</p>\n\n<p><strong>Варіанти використання пошукових магнітів:</strong></p>\n\n<p>- Пошук і підйом металевих (залізо або цветмет з залізними деталями) предметів з колодязів, воронок, річок, озер та інших водойм.<br />\n- Тралення водойм в пошуках великих залізних предметів (танки, машини, кораблі).<br />\n- Очищення вийнятого ґрунту від дрібного заліза на засмічених місцях при пошуку дрібних монет (лусочок наприклад).<br />\n- Підготовка місця для пошуку з МД (очищення від залізного сміття) в сухому пухкому грунті, наприклад на горищі або під підлогою.<br />\n- Видалення заліза на сильно засмічених ділянках, наприклад при розкопуванні фундаментів старих будинків.<br />\n- Визначення магнітності каменів (можливих залізних метеоритів).<br />\n- Підйом різного залізного брухту.</p>\n\n<p><strong>Комплектація:</strong></p>\n\n<p>1. Магніт пошуковий односторонній МП400кг.</p>\n\n<p>2. Рим-болт М10 + Контргайка-баранчик + гровер (від розкручування).</p>\n\n<p>3. Інструкція (сертифікат, протокол випробувань);</p>\n\n<p>4. Захисна упаковка (коробка з пенополістерольних прокладками).</p>\n\n<p><strong>Особливості:</strong></p>\n\n<p>Кожен пошуковий магніт МП торгової марки &quot;Магнітон&quot; має порядковий номер і <a href=\\\"https://www.youtube.com/playlist?list=PLsXPHcMdocijjrfcg5hWGQc9pLeN64lry\\\">проходить випробування на нашому випробувальному стенді</a>, де під вертикальним навантаженням 90&ordm; магніт відривається від металевої плити товщиною 25 мм. Результати кожного випробування вноситися в інструкцію в графі протокол випробувань із зазначенням номера пошукового магніту, дати і результату випробувань. Магніти, які показали негативний результат відбраковуються і не йдуть в продаж.</p>\n\n<p><strong>Безкоштовна доставка при 100% передоплаті !!!</strong></p>', '[{\"id\": 1608303939284, \"items\": [{\"id\": 1608303955689, \"name\": \"Сила зчеплення, кг\", \"value\": \"400\"}, {\"id\": 1608303955005, \"name\": \"Сила зчеплення (тест Магнітон),кг\", \"value\": \"525\"}, {\"id\": 1608303954305, \"name\": \"Корисна площа магніта,см2\", \"value\": \"56,53\"}, {\"id\": 1608303951813, \"name\": \"Зовнішній діаметр, мм\", \"value\": \"105\"}, {\"id\": 1608303951253, \"name\": \"Зовнішній діаметр вклеєного магніт, мм\", \"value\": \"90\"}, {\"id\": 1608303950701, \"name\": \"Внутрішній діаметр вклеєного магніт, мм\", \"value\": \"30\"}, {\"id\": 1608303950126, \"name\": \"Висота, мм\", \"value\": \"22\"}, {\"id\": 1608303949572, \"name\": \"Вага, кг\", \"value\": \"1,5\"}, {\"id\": 1608303939284, \"name\": \"Пристрій відриву\", \"value\": \"Так\"}], \"title\": \"Технічні характеристики\"}, {\"id\": 1608303938996, \"items\": [{\"id\": 1608303966598, \"name\": \"Матеріал корпусу\", \"value\": \"Ст.20\"}, {\"id\": 1608303966253, \"name\": \"Матеріал магніта\", \"value\": \"NdFeB\"}, {\"id\": 1608303938996, \"name\": \"Покриття магніту\", \"value\": \"Ni-Cu-Ni\"}], \"title\": \"Матеріал і покриття\"}, {\"id\": 1608303422290, \"items\": [{\"id\": 1608303977180, \"name\": \"Різьба,М\", \"value\": \"10\"}, {\"id\": 1608303976762, \"name\": \"Довжина рим болта, мм\", \"value\": \"94,5\"}, {\"id\": 1608303422290, \"name\": \"Внутрішній діаметр вушка, мм\", \"value\": \"22,7\"}], \"title\": \"Характеристики рим болта\"}]', 'Односторонній пошуковий магніт МП 400', 'Односторонній пошуковий магніт МП400 Магнітон. Вага: 1,49 кг. Рим болт М10, контргайка, діаметр 105 мм, неодимовий магніт.', '2020-12-24 08:11:39', '2020-12-24 08:11:39');
INSERT INTO `trans_products` (`id`, `product_id`, `local`, `title`, `desc`, `params`, `meta_title`, `meta_desc`, `created_at`, `updated_at`) VALUES
(397, 39, 'ru', 'Поисковый магнит односторонний МП 100 кг', '<p>Данный поисковый магнит оборудован устройством механического отрыва. Устройством механического отрыва поискового магнита МП 100 кг служит рым-болт, который прокручивается сквозь магнит.&nbsp;</p>\n\n<p>Как это работает: прокручивая рым-болт сквозь корпус поискового магнита, он отделяется от поверхности металла и потом его можно оторвать без особых усилий.&nbsp;</p>\n\n<p>Про это, а также более подробное описание, замер размеров и намагниченности, а также тест на отрв от металлической плиты поискового магнита МП 100 кг смотрите в нашем <a href=\\\"https://youtu.be/4RlUTtXaB-A\\\">видео</a>.</p>\n\n<p><strong>Комплектация:</strong></p>\n\n<p>1. Магнит в корпусе МП 100 кг.</p>\n\n<p>2. Рым болт.</p>\n\n<p>3. Контр-гайка.</p>\n\n<p>4. Гровер (пружинная шайба).</p>\n\n<p>5. Упаковка- деревянная коробка с полисирольными прокладками под магнит и крепеж.</p>\n\n<p>6. Инструкция по эксплуатации поискового магнита, гарантия, сертификат испытаний.<br />\n&nbsp;</p>\n\n<p><strong>Особенности:</strong></p>\n\n<p>Каждый поисковый магнит МП торговой марки &quot;Магнитон&quot; имеет порядковый номер и&nbsp;<a href=\\\"https://www.youtube.com/playlist?list=PLsXPHcMdocijjrfcg5hWGQc9pLeN64lry\\\">проходит испытания на нашем испытательном стенде</a>, где под вертикальной нагрузкой 90&ordm; магнит отрывается от металлической плиты толщиной 25 мм. Результаты каждого испытания вноситься в инструкцию в графе протокол испытаний с указанием номера поискового магнита, даты и результата испытаний. Магниты, показавшие негативный результат отбраковываются и не идут в продажу.&nbsp;</p>\n\n<p><strong>Бесплатная доставка при 100 %&nbsp;предоплате!!!</strong></p>', '[{\"id\": 1608285648571, \"items\": [{\"id\": 1608808048881, \"name\": \"Сила сцепления, кг\", \"value\": \"100\"}, {\"id\": 1608288694203, \"name\": \"Сила сцепления (тест Магнитон),кг\", \"value\": \"120,5\"}, {\"id\": 1608288693767, \"name\": \"Полезная площадь магнита,см2\", \"value\": \"15,57\"}, {\"id\": 1608288693321, \"name\": \"Внешний диаметр, мм\", \"value\": \"58\"}, {\"id\": 1608288692853, \"name\": \"Внешний диаметр вклеенного магнит, мм\", \"value\": \"47\"}, {\"id\": 1608288691928, \"name\": \"Внутренний диаметр вклеенного магнит, мм\", \"value\": \"15\"}, {\"id\": 1608297666413, \"name\": \"Высота, мм\", \"value\": \"12\"}, {\"id\": 1608289063436, \"name\": \"Вес, кг\", \"value\": \"0,29\"}, {\"id\": 1608289427515, \"name\": \"Устройство отрыва\", \"value\": \"Да\"}], \"title\": \"Технические характеристики\"}, {\"id\": 1608289080817, \"items\": [{\"id\": 1608289099062, \"name\": \"Материал корпуса\", \"value\": \"Ст.20\"}, {\"id\": 1608289098641, \"name\": \"Материал магнита\", \"value\": \"NdFeB\"}, {\"id\": 1608289080817, \"name\": \"Покрытие магнита\", \"value\": \"Ni-Cu-Ni\"}], \"title\": \"Материал и покрытие\"}, {\"id\": 1608289450012, \"items\": [{\"id\": 1608289450012, \"name\": \"Резьба,М\", \"value\": \"8\"}, {\"id\": 1608289570643, \"name\": \"Длина рым болта, мм\", \"value\": \"70,5\"}, {\"id\": 1608289958810, \"name\": \"Внутренний диаметр ушка, мм\", \"value\": \"15\"}], \"title\": \"Характеристики рым болта\"}]', 'Поисковый магнит односторонний МП 100 кг', 'Данный поисковый магнит оборудован устройством механического отрыва. Устройством механического отрыва поискового магнита МП 100 кг служит рым-болт, который прокручивается сквозь магнит.', '2020-12-24 08:15:37', '2020-12-24 08:15:37'),
(398, 39, 'ua', 'Пошуковий магніт односторонній МП 100 кг', '<p>МП100 - це односторонній пошуковий магніт на 100 кг з облаштуванням відриву від магазину магнітів &quot;Магнитон&quot;.<br />\nЦей пошуковий магніт обладнаний облаштуванням механічного відриву.<br />\n<br />\nОблаштуванням механічного відриву пошукового магніта МП 100 кг служить рим-болт, який прокручується крізь магніт.<br />\nЯк це працює: прокручувавши рим-болт крізь корпус пошукового магніта, він відділяється від поверхні металу і потім його можна отровать без зайвих зусиль.</p>\n\n<p>Про це, а також більш докладний опис, завмер розмірів і намагніченості, а також тест на ГТРМ від металевої плити пошукового магніту МП 100 кг дивіться в нашому <a href=\\\"https://youtu.be/4RlUTtXaB-A\\\">відео</a>.</p>\n\n<p><strong>Комплектація:</strong></p>\n\n<p>1. Магніт в корпусі МП 100 кг.</p>\n\n<p>2. Рим болт.</p>\n\n<p>3. Контр-гайка.</p>\n\n<p>4. Гровер (пружинна шайба).</p>\n\n<p>5. Упаковка- дерев&#39;яна коробка з полісірольнимі прокладками під магніт і кріплення.</p>\n\n<p>6. Інструкція по експлуатації пошукового магніту, гарантія, сертифікат випробувань.</p>\n\n<p><strong>Особливості:</strong></p>\n\n<p>Кожен пошуковий магніт МП торгової марки &quot;Магнітон&quot; має порядковий номер і <a href=\\\"http://www.youtube.com/playlist?list=PLsXPHcMdocijjrfcg5hWGQc9pLeN64lry\\\">проходить випробування на нашому випробувальному стенді</a>, де під вертикальним навантаженням 90&ordm; магніт відривається від металевої плити товщиною 25 мм. Результати кожного випробування вноситися в інструкцію в графі протокол випробувань із зазначенням номера пошукового магніту, дати і результату випробувань. Магніти, які показали негативний результат відбраковуються і не йдуть в продаж.</p>\n\n<p><strong>Безкоштовна доставка при 100% передоплаті !!!</strong></p>', '[{\"id\": 1608285648571, \"items\": [{\"id\": 1608808048881, \"name\": \"Сила зчеплення, кг\", \"value\": \"100\"}, {\"id\": 1608288694203, \"name\": \"Сила зчеплення (тест Магнітон),кг\", \"value\": \"120,5\"}, {\"id\": 1608288693767, \"name\": \"Корисна площа магніта,см2\", \"value\": \"15,57\"}, {\"id\": 1608288693321, \"name\": \"Зовнішній діаметр, мм\", \"value\": \"58\"}, {\"id\": 1608288692853, \"name\": \"Зовнішній діаметр вклеєного магніт, мм\", \"value\": \"47\"}, {\"id\": 1608288691928, \"name\": \"Внутрішній діаметр вклеєного магніт, мм\", \"value\": \"15\"}, {\"id\": 1608297711815, \"name\": \"Висота, мм\", \"value\": \"12\"}, {\"id\": 1608289063436, \"name\": \"Вага, кг\", \"value\": \"0,29\"}, {\"id\": 1608289427515, \"name\": \"Пристрій відриву\", \"value\": \"Так\"}], \"title\": \"Технічні характеристики\"}, {\"id\": 1608289080817, \"items\": [{\"id\": 1608289099062, \"name\": \"Матеріал корпусу\", \"value\": \"Ст.20\"}, {\"id\": 1608289098641, \"name\": \"Матеріал магніта\", \"value\": \"NdFeB\"}, {\"id\": 1608289080817, \"name\": \"Покриття магніту\", \"value\": \"Ni-Cu-Ni\"}], \"title\": \"Матеріал і покриття\"}, {\"id\": 1608289450012, \"items\": [{\"id\": 1608289450012, \"name\": \"Різьба,М\", \"value\": \"8\"}, {\"id\": 1608289570643, \"name\": \"Довжина рим болта, мм\", \"value\": \"70,5\"}, {\"id\": 1608289958810, \"name\": \"Внутрішній діаметр вушка, мм\", \"value\": \"15\"}], \"title\": \"Характеристики рим болта\"}]', 'Пошуковий магніт односторонній МП 100 кг', 'МП100 - це односторонній пошуковий магніт на 100 кг з облаштуванням відриву від магазину магнітів \"Магнитон\".\nЦей пошуковий магніт обладнаний облаштуванням механічного відриву.', '2020-12-24 08:15:37', '2020-12-24 08:15:37'),
(401, 42, 'ru', 'Односторонний поисковый магнит МП200', '<p><strong>Комплектация:</strong></p>\n\n<p>- магнит поисковый односторонний 200 кг -1шт;</p>\n\n<p>- рым болт М10 - 1шт;</p>\n\n<p>- винт барашек- 1шт,</p>\n\n<p>- гровер (от самораскручивания) -1шт;</p>\n\n<p>- инструкция (сертификат, протокол испытаний);</p>\n\n<p>- упаковка.<br />\n<br />\n<strong>Особенности:</strong></p>\n\n<p>Каждый поисковый магнит МП торговой марки &quot;Магнитон&quot; имеет порядковый номер и&nbsp;<a href=\\\"https://www.youtube.com/playlist?list=PLsXPHcMdocijjrfcg5hWGQc9pLeN64lry\\\">проходит испытания на нашем испытательном стенде</a>, где под вертикальной нагрузкой 90&ordm; магнит отрывается от металлической плиты толщиной 25 мм. Результаты каждого испытания вноситься в инструкцию в графе протокол испытаний с указанием номера поискового магнита, даты и результата испытаний. Магниты, показавшие негативный результат отбраковываются и не идут в продажу.&nbsp;</p>\n\n<p><strong>Бесплатная доставка при 100 %&nbsp;предоплате!!!</strong></p>', '[{\"id\": 1608299319059, \"items\": [{\"id\": 1608299326176, \"name\": \"Сила сцепления, кг\", \"value\": \"200\"}, {\"id\": 1608808821437, \"name\": \"Сила сцепления (тест Магнитон),кг\", \"value\": \"250\"}, {\"id\": 1608299325445, \"name\": \"Полезная площадь магнита,см2\", \"value\": \"41,04\"}, {\"id\": 1608299324914, \"name\": \"Внешний диаметр, мм\", \"value\": \"75\"}, {\"id\": 1608299323527, \"name\": \"Внешний диаметр вклеенного магнит, мм\", \"value\": \"60\"}, {\"id\": 1608299321745, \"name\": \"Внутренний диаметр вклеенного магнит, мм\", \"value\": \"20\"}, {\"id\": 1608299321325, \"name\": \"Высота, мм\", \"value\": \"16\"}, {\"id\": 1608299320951, \"name\": \"Вес, кг\", \"value\": \"0,6\"}, {\"id\": 1608299319059, \"name\": \"Устройство отрыва\", \"value\": \"Да\"}], \"title\": \"Технические характеристики\"}, {\"id\": 1608299318663, \"items\": [{\"id\": 1608299329186, \"name\": \"Материал корпуса\", \"value\": \"Ст.20\"}, {\"id\": 1608299328742, \"name\": \"Материал магнита\", \"value\": \"NdFeB\"}, {\"id\": 1608299318663, \"name\": \"Покрытие магнита\", \"value\": \"Zn\"}], \"title\": \"Материал и покрытие\"}, {\"id\": 1608298897290, \"items\": [{\"id\": 1608299331342, \"name\": \"Резьба,М\", \"value\": \"10\"}, {\"id\": 1608299331065, \"name\": \"Длина рым болта, мм\", \"value\": \"86,4\"}, {\"id\": 1608298897290, \"name\": \"Внутренний диаметр ушка, мм\", \"value\": \"18\"}], \"title\": \"Характеристики рым болта\"}]', 'Односторонний поисковый магнит МП200', 'Магнит поисковый серии МП 200 - это односторонний поисковый магнит от магазина Магнитон силой в 200 кг, комплектуется рым-болтом с контргайкой-барашком для фиксации.', '2020-12-24 08:21:02', '2020-12-24 08:21:02'),
(402, 42, 'ua', 'Односторонній пошуковий магніт МП 200', '<p><strong>Комплектація:</strong></p>\n\n<p>- магніт пошуковий односторонній 200 кг 1шт;</p>\n\n<p>- рим болт М10 - 1шт;</p>\n\n<p>- гвинт барашек- 1шт,</p>\n\n<p>- гровер (від самораскручіванія) 1шт;</p>\n\n<p>- інструкція (сертифікат, протокол випробувань);</p>\n\n<p>- упаковка.</p>\n\n<p><strong>Особливості:</strong></p>\n\n<p>Кожен пошуковий магніт МП торгової марки &quot;Магнітон&quot; має порядковий номер і проходить випробування на нашому випробувальному стенді, де під вертикальним навантаженням 90&ordm; магніт відривається від металевої плити товщиною 25 мм. Результати кожного випробування вноситися в інструкцію в графі протокол випробувань із зазначенням номера пошукового магніту, дати і результату випробувань. Магніти, які показали негативний результат відбраковуються і не йдуть в продаж.</p>\n\n<p><strong>Безкоштовна доставка при 100% передоплаті !!!</strong></p>', '[{\"id\": 1608299319059, \"items\": [{\"id\": 1608299326176, \"name\": \"Сила зчеплення, кг\", \"value\": \"200\"}, {\"id\": 1608808821437, \"name\": \"Сила зчеплення (тест Магнітон),кг\", \"value\": \"250\"}, {\"id\": 1608299325445, \"name\": \"Корисна площа магніта,см2\", \"value\": \"41,04\"}, {\"id\": 1608299324914, \"name\": \"Зовнішній діаметр, мм\", \"value\": \"75\"}, {\"id\": 1608299323527, \"name\": \"Зовнішній діаметр вклеєного магніт, мм\", \"value\": \"60\"}, {\"id\": 1608299321745, \"name\": \"Внутрішній діаметр вклеєного магніт, мм\", \"value\": \"20\"}, {\"id\": 1608299321325, \"name\": \"Висота, мм\", \"value\": \"16\"}, {\"id\": 1608299320951, \"name\": \"Вага, кг\", \"value\": \"0,6\"}, {\"id\": 1608299319059, \"name\": \"Пристрій відриву\", \"value\": \"Так\"}], \"title\": \"Технічні характеристики\"}, {\"id\": 1608299318663, \"items\": [{\"id\": 1608299329186, \"name\": \"Матеріал корпусу\", \"value\": \"Ст.20\"}, {\"id\": 1608299328742, \"name\": \"Матеріал магніта\", \"value\": \"NdFeB\"}, {\"id\": 1608299318663, \"name\": \"Покриття магніту\", \"value\": \"Zn\"}], \"title\": \"Матеріал і покриття\"}, {\"id\": 1608298897290, \"items\": [{\"id\": 1608299331342, \"name\": \"Різьба,М\", \"value\": \"10\"}, {\"id\": 1608299331065, \"name\": \"Довжина рим болта, мм\", \"value\": \"86,4\"}, {\"id\": 1608298897290, \"name\": \"Внутрішній діаметр вушка, мм\", \"value\": \"18\"}], \"title\": \"Характеристики рим болта\"}]', 'Односторонній пошуковий магніт МП 200', 'Магніт пошуковий серії МП 200 - це односторонній пошуковий магніт від магазину Магнітон силою в 200 кг, комплектується рим-болтом з контргайкою-баранчиком для фіксації.', '2020-12-24 08:21:02', '2020-12-24 08:21:02'),
(433, 53, 'ru', 'Поисковый магнит двухсторонний МП 2х120 кг', '<p>Магнит поисковый двухсторонний MP2*120 на 120 кг.</p>\n\n<p>Такой&nbsp;поисковый магнит&nbsp;используется при поднятии металлических предметов из скважин, воронок, из водоемов. Как магнитный держатель, для фиксации крупных предметов на металлическом потолке (балке), поднятии и переносе металлических деталей. Внутри каждого поискового магнита стоит&nbsp;неодимовый магнит&nbsp;в форме кольца. Корпус из металла надежно защищает неодимовый магнит ударов о железные предметы.</p>\n\n<p><strong>Комплектация:</strong></p>\n\n<p>1. Магнит поисковый МП2х120 кг.</p>\n\n<p>2. Два рым болта М8/М10 или оба М10.</p>\n\n<p>3. Винт кольцо М10 -1шт.</p>\n\n<p>4.&nbsp;Шпилька&nbsp;М10 под отвертку для центрального отверстия (предотвращает засорение центральной резьбы от окалины при использовании бокового рым болта).</p>\n\n<p>5. Инструкция по эксплуатации, протокол испытаний*.</p>\n\n<p>6. Защитная упаковка с защитой от примагничивания.</p>\n\n<p><strong>* Особенности:</strong></p>\n\n<p>Каждый поисковый магнит МП торговой марки &quot;Магнитон&quot; имеет порядковый номер и&nbsp;<a href=\\\"https://www.youtube.com/playlist?list=PLsXPHcMdocijjrfcg5hWGQc9pLeN64lry\\\">проходит испытания на нашем испытательном стенде</a>, где под вертикальной нагрузкой 90&ordm; магнит отрывается от металлической плиты толщиной 25 мм. Результаты каждого испытания вноситься в инструкцию в графе протокол испытаний с указанием номера поискового магнита, даты и результата испытаний. Магниты, показавшие негативный результат отбраковываются и не идут в продажу.&nbsp;<br />\n<br />\n<strong>Бесплатная доставка при 100% предоплаты!!!</strong></p>', '[{\"id\": 1608295466745, \"items\": [{\"id\": 1608296299003, \"name\": \"Сила сцепления, кг\", \"value\": \"120\"}, {\"id\": 1608296297564, \"name\": \"Полезная площадь магнита,см2\", \"value\": \"16,5\"}, {\"id\": 1608296297041, \"name\": \"Внешний диаметр, мм\", \"value\": \"67\"}, {\"id\": 1608296296448, \"name\": \"Внешний диаметр вклеенного магнит, мм\", \"value\": \"50\"}, {\"id\": 1608296295202, \"name\": \"Внутренний диаметр вклеенного магнит, мм\", \"value\": \"20\"}, {\"id\": 1608296448385, \"name\": \"Высота, мм\", \"value\": \"28\"}, {\"id\": 1608296294895, \"name\": \"Вес, кг\", \"value\": \"0,9\"}, {\"id\": 1608295466745, \"name\": \"Устройство отрыва\", \"value\": \"Да\"}], \"title\": \"Технические характеристики\"}, {\"id\": 1608296303371, \"items\": [{\"id\": 1608296348344, \"name\": \"Материал корпуса\", \"value\": \"Ст.20\"}, {\"id\": 1608296348029, \"name\": \"Материал магнита\", \"value\": \"NdFeB\"}, {\"id\": 1608296303371, \"name\": \"Покрытие магнита\", \"value\": \"Ni-Cu-Ni\"}], \"title\": \"Материал и покрытие\"}, {\"id\": 1608296303006, \"items\": [{\"id\": 1608296367735, \"name\": \"Резьба,М\", \"value\": \"10,10\"}, {\"id\": 1608296367391, \"name\": \"Длина рым болта, мм\", \"value\": \"86/57\"}, {\"id\": 1608296303006, \"name\": \"Внутренний диаметр ушка, мм\", \"value\": \"19,2/19,2\"}], \"title\": \"Характеристики рым болта\"}]', 'Поисковый магнит двухсторонний МП 2х120 кг', 'Поисковый магнит двухсторонний МП 2х120 кг', '2020-12-24 12:48:37', '2020-12-24 12:48:37'),
(434, 53, 'ua', 'Пошуковий магніт двосторонній МП 2х120 кг', '<p>Магніт пошуковий двосторонній MP2 * 120 на 120 кг.</p>\n\n<p>Такий пошуковий магніт використовується при піднятті металевих предметів з свердловин, воронок, з водойм. Як магнітний тримач, для фіксації великих предметів на металевому стелі (балці), піднятті і перенесенні металевих деталей. Усередині кожного пошукового магніту варто неодимовий магніт у формі кільця. Корпус з металу надійно захищає неодимовий магніт ударів об залізні предмети.</p>\n\n<p><strong>Комплектація:</strong></p>\n\n<p>1. Магніт пошуковий МП2х120 кг.</p>\n\n<p>2. Два рим болта М8 / М10 або обидва М10.</p>\n\n<p>3. Гвинт кільце М10-1шт.</p>\n\n<p>4. Шпилька М10 під викрутку для центрального отвору (запобігає засмічення центральної різьблення від окалини при використанні бокового рим болта).</p>\n\n<p>5. Інструкція по експлуатації, протокол випробувань *.</p>\n\n<p>6. Захисна упаковка з захистом від прімагнічіванія.</p>\n\n<p><strong>* Особливості:</strong></p>\n\n<p>Кожен пошуковий магніт МП торгової марки &quot;Магнітон&quot; має порядковий номер і проходить випробування на нашому випробувальному стенді, де під вертикальним навантаженням 90&ordm; магніт відривається від металевої плити товщиною 25 мм. Результати кожного випробування вноситися в інструкцію в графі протокол випробувань із зазначенням номера пошукового магніту, дати і результату випробувань. Магніти, які показали негативний результат відбраковуються і не йдуть в продаж.</p>\n\n<p><strong>Безкоштовна доставка при 100% передоплати !!!</strong></p>', '[{\"id\": 1608295466745, \"items\": [{\"id\": 1608296299003, \"name\": \"Сила зчеплення, кг\", \"value\": \"120\"}, {\"id\": 1608296297564, \"name\": \"Корисна площа магніта,см2\", \"value\": \"16,5\"}, {\"id\": 1608296297041, \"name\": \"Зовнішній діаметр, мм\", \"value\": \"67\"}, {\"id\": 1608296296448, \"name\": \"Зовнішній діаметр вклеєного магніт, мм\", \"value\": \"50\"}, {\"id\": 1608296295202, \"name\": \"Внутрішній діаметр вклеєного магніт, мм\", \"value\": \"20\"}, {\"id\": 1608296448385, \"name\": \"Висота, мм\", \"value\": \"28\"}, {\"id\": 1608296294895, \"name\": \"Вага, кг\", \"value\": \"0,9\"}, {\"id\": 1608295466745, \"name\": \"Пристрій відриву\", \"value\": \"Так\"}], \"title\": \"Технічні характеристики\"}, {\"id\": 1608296303371, \"items\": [{\"id\": 1608296348344, \"name\": \"Матеріал корпусу\", \"value\": \"Ст.20\"}, {\"id\": 1608296348029, \"name\": \"Матеріал магніта\", \"value\": \"NdFeB\"}, {\"id\": 1608296303371, \"name\": \"Покриття магніту\", \"value\": \"Ni-Cu-Ni\"}], \"title\": \"Матеріал і покриття\"}, {\"id\": 1608296303006, \"items\": [{\"id\": 1608296367735, \"name\": \"Різьба,М\", \"value\": \"10,10\"}, {\"id\": 1608296367391, \"name\": \"Довжина рим болта, мм\", \"value\": \"86/57\"}, {\"id\": 1608296303006, \"name\": \"Внутрішній діаметр вушка, мм\", \"value\": \"19,2/19,2\"}], \"title\": \"Характеристики рим болта\"}]', 'Пошуковий магніт двосторонній МП 2х120 кг', 'Пошуковий магніт двосторонній МП 2х120 кг', '2020-12-24 12:48:37', '2020-12-24 12:48:37'),
(435, 41, 'ru', 'Поисковый магнит односторонний 120 кг', '<p><strong>Комплектация магнита МП120 кг:</strong></p>\n\n<p>- магнит поисковый односторонний МП120 -1шт;</p>\n\n<p>- рым болт М10 - 1шт;</p>\n\n<p>- винт барашек- 1шт,</p>\n\n<p>- гровер (от самораскручивания) -1шт;</p>\n\n<p>- инструкция (сертификат, протокол испытаний);</p>\n\n<p>- упаковка ( коробка с пенополистерольными прокладками).</p>\n\n<p>Рекомендуемые&nbsp;плетеные шнуры из высокопрочного полиамидного (нейлонового) материала (альпинистская веревка, статика - не тянется) диаметром 6мм.</p>\n\n<p><strong>Применение поискового магнита МП120 кг:</strong></p>\n\n<p>1. Отделение, сортировка, &nbsp;определение сталей и металлических сплавов, которые содержат железо, никель или кобальт от других металлов и неметаллов. Например из груды металлолома можно выделить металлические предметы из цветных металлов (не магнитятся) или наоборот.Такие поисковые магниты на 120 кг применяются не только для поиска металлических предметов поисковиками или как экспедиционные магниты.&nbsp;<br />\n<br />\nБлагодаря тому, что магниты имеют миниатюрные размеры и очень мощные, а также имеют кольцо для удержания в руке или крепления за крючок, веревку, поисковые магниты нашли еще несколько применений в промышленности и быту:&nbsp;</p>\n\n<p>2. Определение состава хромированных предметов из полированного алюминия, серебра и нержавеющей стали (немагнитные сорта нержавеющей стали).&nbsp;</p>\n\n<p>3. Определение материала, находящегося под латунным, бронзовым покрытием при покупке предметов старины и т.п. Например проверка медной проволоки и отделение от обедненной.</p>\n\n<p>&nbsp;4. Определение некоторых типов фальшивой бижутерии, которая часто содержат сталь или никель в своем составе и этого не видно из-за покрытия.&nbsp;</p>\n\n<p>5.&nbsp;Использование для научных, обучающих экспериментов с ферромагнетиками.&nbsp;<br />\n<br />\n<strong>Особенности:</strong></p>\n\n<p>Каждый поисковый магнит МП торговой марки &quot;Магнитон&quot; имеет порядковый номер и&nbsp;<a href=\\\"https://www.youtube.com/playlist?list=PLsXPHcMdocijjrfcg5hWGQc9pLeN64lry\\\">проходит испытания на нашем испытательном стенде</a>, где под вертикальной нагрузкой 90&ordm; магнит отрывается от металлической плиты толщиной 25 мм. Результаты каждого испытания вноситься в инструкцию в графе протокол испытаний с указанием номера поискового магнита, даты и результата испытаний. Магниты, показавшие негативный результат отбраковываются и не идут в продажу.&nbsp;</p>\n\n<p><strong>Бесплатная доставка при 100 %&nbsp;предоплате!!!</strong></p>', '[{\"id\": 1608295466745, \"items\": [{\"id\": 1608296299003, \"name\": \"Сила сцепления, кг\", \"value\": \"120\"}, {\"id\": 1608296298192, \"name\": \"Сила сцепления (тест Магнитон),кг\", \"value\": \"123\"}, {\"id\": 1608296297564, \"name\": \"Полезная площадь магнита,см2\", \"value\": \"19,6\"}, {\"id\": 1608296297041, \"name\": \"Внешний диаметр, мм\", \"value\": \"67\"}, {\"id\": 1608296296448, \"name\": \"Внешний диаметр вклеенного магнит, мм\", \"value\": \"50\"}, {\"id\": 1608296295202, \"name\": \"Внутренний диаметр вклеенного магнит, мм\", \"value\": \"20\"}, {\"id\": 1608296448385, \"name\": \"Высота, мм\", \"value\": \"12\"}, {\"id\": 1608296294895, \"name\": \"Вес, кг\", \"value\": \"0,4\"}, {\"id\": 1608295466745, \"name\": \"Устройство отрыва\", \"value\": \"Да\"}], \"title\": \"Технические характеристики\"}, {\"id\": 1608296303371, \"items\": [{\"id\": 1608296348344, \"name\": \"Материал корпуса\", \"value\": \"Ст.20\"}, {\"id\": 1608296348029, \"name\": \"Материал магнита\", \"value\": \"NdFeB\"}, {\"id\": 1608296303371, \"name\": \"Покрытие магнита\", \"value\": \"Zn\"}], \"title\": \"Материал и покрытие\"}, {\"id\": 1608296303006, \"items\": [{\"id\": 1608296367735, \"name\": \"Резьба,М\", \"value\": \"10\"}, {\"id\": 1608296367391, \"name\": \"Длина рым болта, мм\", \"value\": \"87\"}, {\"id\": 1608296303006, \"name\": \"Внутренний диаметр ушка, мм\", \"value\": \"19\"}], \"title\": \"Характеристики рым болта\"}]', 'Поисковый магнит односторонний 120 кг', 'Поисковый магнит односторонний 120 кг', '2020-12-24 12:49:04', '2020-12-24 12:49:04'),
(436, 41, 'ua', 'Пошуковий магніт односторонній 120 кг', '<p><strong>Комплектація магніту МП120 кг:</strong></p>\n\n<p>- магніт пошуковий односторонній МП120-1шт;</p>\n\n<p>- рим болт М10 - 1шт;</p>\n\n<p>- гвинт барашек- 1шт,</p>\n\n<p>- гровер (від самораскручіванія) 1шт;</p>\n\n<p>- інструкція (сертифікат, протокол випробувань);</p>\n\n<p>- упаковка (коробка з пенополістерольних прокладками).</p>\n\n<p>Рекомендовані плетені шнури з високоміцного поліамідного (нейлонового) матеріалу (альпіністська мотузка, статика - не тягнеться) діаметром 6 мм.</p>\n\n<p><strong>Застосування пошукового магніту МП120 кг:</strong></p>\n\n<p>1. Відділення, сортування, визначення сталей і металевих сплавів, які містять залізо, нікель або кобальт від інших металів і неметалів. Наприклад з купи металобрухту можна виділити металеві предмети з кольорових металів (НЕ магнитятся) або наоборот.Такіе пошукові магніти на 120 кг застосовуються не тільки для пошуку металевих предметів пошуковими системами або як експедиційні магніти.</p>\n\n<p>Завдяки тому, що магніти мають мініатюрні розміри і дуже потужні, а також мають кільце для утримання в руці або кріплення за гачок, мотузку, пошукові магніти знайшли ще кілька застосувань в промисловості та побуті:</p>\n\n<p>2. Визначення складу хромованих предметів з полірованого алюмінію, срібла і нержавіючої сталі (немагнітні сорти нержавіючої сталі).</p>\n\n<p>3. Визначення матеріалу, що знаходиться під латунним, бронзовим покриттям при купівлі предметів старовини і т.п. Наприклад перевірка мідного дроту і відділення від збідненого.</p>\n\n<p>4. Визначення деяких типів фальшивої біжутерії, яка часто містять сталь або нікель в своєму складі і цього не видно з-за покриття.</p>\n\n<p>5. Використання для наукових, навчальних експериментів з феромагнетиками.</p>\n\n<p><strong>Особливості:</strong></p>\n\n<p>Кожен пошуковий магніт МП торгової марки &quot;Магнітон&quot; має порядковий номер і проходить випробування на нашому випробувальному стенді, де під вертикальним навантаженням 90&ordm; магніт відривається від металевої плити товщиною 25 мм. Результати кожного випробування вноситися в інструкцію в графі протокол випробувань із зазначенням номера пошукового магніту, дати і результату випробувань. Магніти, які показали негативний результат відбраковуються і не йдуть в продаж.</p>\n\n<p><strong>Безкоштовна доставка при 100% передоплаті !!!</strong></p>', '[{\"id\": 1608295466745, \"items\": [{\"id\": 1608296299003, \"name\": \"Сила зчеплення, кг\", \"value\": \"120\"}, {\"id\": 1608296298192, \"name\": \"Сила зчеплення (тест Магнітон),кг\", \"value\": \"123\"}, {\"id\": 1608296297564, \"name\": \"Корисна площа магніта,см2\", \"value\": \"19,6\"}, {\"id\": 1608296297041, \"name\": \"Зовнішній діаметр, мм\", \"value\": \"67\"}, {\"id\": 1608296296448, \"name\": \"Зовнішній діаметр вклеєного магніт, мм\", \"value\": \"50\"}, {\"id\": 1608296295202, \"name\": \"Внутрішній діаметр вклеєного магніт, мм\", \"value\": \"20\"}, {\"id\": 1608296448385, \"name\": \"Висота, мм\", \"value\": \"12\"}, {\"id\": 1608296294895, \"name\": \"Вага, кг\", \"value\": \"0,4\"}, {\"id\": 1608295466745, \"name\": \"Пристрій відриву\", \"value\": \"Так\"}], \"title\": \"Технічні характеристики\"}, {\"id\": 1608296303371, \"items\": [{\"id\": 1608296348344, \"name\": \"Матеріал корпусу\", \"value\": \"Ст.20\"}, {\"id\": 1608296348029, \"name\": \"Матеріал магніта\", \"value\": \"NdFeB\"}, {\"id\": 1608296303371, \"name\": \"Покриття магніту\", \"value\": \"Zn\"}], \"title\": \"Матеріал і покриття\"}, {\"id\": 1608296303006, \"items\": [{\"id\": 1608296367735, \"name\": \"Різьба,М\", \"value\": \"10\"}, {\"id\": 1608296367391, \"name\": \"Довжина рим болта, мм\", \"value\": \"87\"}, {\"id\": 1608296303006, \"name\": \"Внутрішній діаметр вушка, мм\", \"value\": \"19\"}], \"title\": \"Характеристики рим болта\"}]', 'Пошуковий магніт односторонній 120 кг', 'Пошуковий магніт односторонній 120 кг', '2020-12-24 12:49:05', '2020-12-24 12:49:05'),
(451, 52, 'ru', 'Магнит замок диаметром 10 мм, комплект 2 магнита', '<p>Набор&nbsp;из двух&nbsp;кольцевых неодимовых магнитов с зеркальной полярностью и переменным диаметром отверстия для &nbsp;крепления лески.</p>\n\n<p>Внутренний диаметр переменный 4/2 мм. Никелированное покрытие.</p>\n\n<p>Может использоваться как магниты для изготовления бус, колье и т.п.</p>', '[{\"id\": 1608806911870, \"items\": [{\"id\": 1608807046017, \"name\": \"Тип\", \"value\": \"Кольцо (диск с отверстием)\"}, {\"id\": 1608807045316, \"name\": \"Намагниченность\", \"value\": \"N38, по оси отверстия\"}, {\"id\": 1608807044849, \"name\": \"Сила сцепления, кг\", \"value\": \"3,5\"}, {\"id\": 1608807043176, \"name\": \"Диаметр внешний, мм\", \"value\": \"10\"}, {\"id\": 1608807041658, \"name\": \"Высота, мм\", \"value\": \"10\"}, {\"id\": 1608807041236, \"name\": \"Диаметр внутренний, переменный, мм\", \"value\": \"4/2\"}, {\"id\": 1608807040727, \"name\": \"Вес одного магнита, г\", \"value\": \"5,2\"}, {\"id\": 1608806911870, \"name\": \"Покрытие\", \"value\": \"Ni-Cu-Ni\"}], \"title\": \"Основные характеристики\"}]', 'Магнит замок диаметром 10 мм, комплект 2 магнита', 'Комплект из 2 шт неодимовых магнитов. Магниты имеют проходное отверстие под шнурок в 2 мм и под узелок 4 мм', '2020-12-25 11:17:26', '2020-12-25 11:17:26'),
(452, 52, 'ua', 'Магніт замок діаметр 8 мм, комплект 2 магніту', '<p>Набір з двох неодімових магнітів кубиків із дзеркальною полярністю S + N і змінним внутрішнім діаметром внутрішнього отвору 1 / 3 мм для кріплення волосіні (шнура).</p>\n\n<p>Внутрішній діаметр змінний 4 / 2 мм. Нікельоване покриття.</p>\n\n<p>Може використовуватися як магніти для виготовлення бус, кольє і т.п.</p>', '[{\"id\": 1608806911870, \"items\": [{\"id\": 1608807046017, \"name\": \"Тип\", \"value\": \"Кільце (диск з отвором)\"}, {\"id\": 1608807045316, \"name\": \"Намагніченість\", \"value\": \"N38,по осі отвору\"}, {\"id\": 1608807044849, \"name\": \"Сила зчеплення, кг\", \"value\": \"3,5\"}, {\"id\": 1608807043176, \"name\": \"Діаметр зовнішній, мм\", \"value\": \"10\"}, {\"id\": 1608807041658, \"name\": \"Висота, мм\", \"value\": \"10\"}, {\"id\": 1608807041236, \"name\": \"Діаметр внутрішній, змінний, мм\", \"value\": \"4/2\"}, {\"id\": 1608807040727, \"name\": \"Вага одного магніту, г\", \"value\": \"5,2\"}, {\"id\": 1608806911870, \"name\": \"Покриття\", \"value\": \"Ni-Cu-Ni\"}], \"title\": \"Основні характеристики\"}]', 'Магніт замок діаметр 10 мм, комплект 2 магніту', 'Комплект магнітів 2 шт. Магніти мають прохідний отвір під шнурок в 2 мм і під вузлик 4 мм.', '2020-12-25 11:17:26', '2020-12-25 11:17:26'),
(453, 51, 'ru', 'Магнит замок диаметр 8 мм, комплект 2 магнита', '<p>Набор&nbsp;из двух&nbsp;кольцевых неодимовых магнитов с зеркальной полярностью и переменным диаметром отверстия для &nbsp;крепления лески.</p>\n\n<p>Внутренний диаметр переменный 3/1,5 мм. Никелированное покрытие.</p>\n\n<p>Может использоваться как магниты для изготовления бус, колье и т.п.</p>', '[{\"id\": 1608806911870, \"items\": [{\"id\": 1608807046017, \"name\": \"Тип\", \"value\": \"Кольцо (диск с отверстием)\"}, {\"id\": 1608807045316, \"name\": \"Намагниченность\", \"value\": \"N38, по оси отверстия\"}, {\"id\": 1608807044849, \"name\": \"Сила сцепления, кг\", \"value\": \"2\"}, {\"id\": 1608807043176, \"name\": \"Диаметр внешний, мм\", \"value\": \"8\"}, {\"id\": 1608807041658, \"name\": \"Высота, мм\", \"value\": \"8\"}, {\"id\": 1608807041236, \"name\": \"Диаметр внутренний, переменный, мм\", \"value\": \"3,5/1\"}, {\"id\": 1608807040727, \"name\": \"Вес одного магнита, г\", \"value\": \"2,72\"}, {\"id\": 1608806911870, \"name\": \"Покрытие\", \"value\": \"Ni-Cu-Ni\"}], \"title\": \"Основные характеристики\"}]', 'Магнит замок диаметр 8 мм, комплект 2 магнита', 'Комплект из 2 шт неодимовых магнитов. Магниты имеют проходное отверстие под шнурок в 1,5мм и под узелок 3мм', '2020-12-25 11:18:08', '2020-12-25 11:18:08'),
(454, 51, 'ua', 'Магніт замок діаметр 8 мм, комплект 2 магніту', '<p>Набір з двох неодімових магнітів кубиків із дзеркальною полярністю S + N і змінним внутрішнім діаметром внутрішнього отвору 1,5 / 3 мм для кріплення волосіні (шнура).</p>\n\n<p>Внутрішній діаметр змінний 3 / 1,5 мм. Нікельоване покриття.</p>\n\n<p>Може використовуватися як магніти для виготовлення бус, кольє і т.п.</p>', '[{\"id\": 1608806911870, \"items\": [{\"id\": 1608807046017, \"name\": \"Тип\", \"value\": \"Кільце (диск з отвором)\"}, {\"id\": 1608807045316, \"name\": \"Намагніченість\", \"value\": \"N38,по осі отвору\"}, {\"id\": 1608807044849, \"name\": \"Сила зчеплення, кг\", \"value\": \"2\"}, {\"id\": 1608807043176, \"name\": \"Діаметр зовнішній, мм\", \"value\": \"8\"}, {\"id\": 1608807041658, \"name\": \"Висота, мм\", \"value\": \"8\"}, {\"id\": 1608807041236, \"name\": \"Діаметр внутрішній, змінний, мм\", \"value\": \"3,5/1\"}, {\"id\": 1608807040727, \"name\": \"Вага одного магніту, г\", \"value\": \"2,72\"}, {\"id\": 1608806911870, \"name\": \"Покриття\", \"value\": \"Ni-Cu-Ni\"}], \"title\": \"Основні характеристики\"}]', 'Магніт замок діаметр 8 мм, комплект 2 магніту', 'Комплект магнітів 2 шт. Магніти мають прохідний отвір під шнурок в 1,5 мм і під вузлик 3 мм.', '2020-12-25 11:18:08', '2020-12-25 11:18:08'),
(455, 50, 'ru', 'Магнит замок диаметром 6 мм, комплект 2 магнита', '<p>Набор&nbsp;из двух&nbsp;неодимовых&nbsp;магнитов кубиков с зеркальной полярностью S+N и переменным внутренним диаметром внутреннего отверстия 1/2,5мм для &nbsp;крепления лески (шнура).</p>\n\n<p>Внутренний диаметр переменный 2,5/1 мм.&nbsp;Никелированное покрытие.</p>\n\n<p>Может использоваться как магниты для изготовления бус, колье и т.п.</p>', '[{\"id\": 1608806911870, \"items\": [{\"id\": 1608807046017, \"name\": \"Тип\", \"value\": \"Кольцо (диск с отверстием)\"}, {\"id\": 1608807045316, \"name\": \"Намагниченность\", \"value\": \"N38, по оси отверстия\"}, {\"id\": 1608807044849, \"name\": \"Сила сцепления, кг\", \"value\": \"1,5\"}, {\"id\": 1608807043176, \"name\": \"Диаметр внешний, мм\", \"value\": \"6\"}, {\"id\": 1608807041658, \"name\": \"Высота, мм\", \"value\": \"6\"}, {\"id\": 1608807041236, \"name\": \"Диаметр внутренний, переменный, мм\", \"value\": \"3/1\"}, {\"id\": 1608807040727, \"name\": \"Вес одного магнита, г\", \"value\": \"1,1\"}, {\"id\": 1608806911870, \"name\": \"Покрытие\", \"value\": \"Ni-Cu-Ni\"}], \"title\": \"Основные характеристики\"}]', 'Магнит замок диаметром 6 мм, комплект 2 магнита', 'Комплект магнитов 2 шт. Магниты имеют проходное отверстие под шнурок в 1 мм и под узелок 2,5 мм.', '2020-12-25 11:18:38', '2020-12-25 11:18:38'),
(456, 50, 'ua', 'Магніт замок діаметром 6 мм, комплект 2 магніту', '<p>Набір з двох неодімових магнітів кубиків із дзеркальною полярністю S + N і змінним внутрішнім діаметром внутрішнього отвору 1 / 2,5 мм для кріплення волосіні (шнура).</p>\n\n<p>Внутрішній діаметр змінний 2,5 / 1 мм. Нікельоване покриття.</p>\n\n<p>Може використовуватися як магніти для виготовлення бус, кольє і т.п.</p>', '[{\"id\": 1608806911870, \"items\": [{\"id\": 1608807046017, \"name\": \"Тип\", \"value\": \"Кільце (диск з отвором)\"}, {\"id\": 1608807045316, \"name\": \"Намагніченість\", \"value\": \"N38,по осі отвору\"}, {\"id\": 1608807044849, \"name\": \"Сила зчеплення, кг\", \"value\": \"1,8\"}, {\"id\": 1608807043176, \"name\": \"Діаметр зовнішній, мм\", \"value\": \"6\"}, {\"id\": 1608807041658, \"name\": \"Висота, мм\", \"value\": \"6\"}, {\"id\": 1608807041236, \"name\": \"Діаметр внутрішній, змінний, мм\", \"value\": \"3/1\"}, {\"id\": 1608807040727, \"name\": \"Вага одного магніту, г\", \"value\": \"1,1\"}, {\"id\": 1608806911870, \"name\": \"Покриття\", \"value\": \"Ni-Cu-Ni\"}], \"title\": \"Основні характеристики\"}]', 'Магніт замок діаметром 6 мм, комплект 2 магніту', 'Комплект магнітів 2 шт. Магніти мають прохідний отвір під шнурок в 1 мм і під вузлик 2,5 мм.', '2020-12-25 11:18:38', '2020-12-25 11:18:38'),
(457, 47, 'ru', 'Магнит замок куб 6х6х6мм, комплект 2 магнита', '<p>Набор&nbsp;из двух&nbsp;неодимовых&nbsp;магнитов кубиков с зеркальной полярностью S+N и переменным внутренним диаметром внутреннего отверстия 1/2,5мм для &nbsp;крепления лески (шнура).</p>\n\n<p>Внутренний диаметр переменный 2,5/1 мм.&nbsp;Никелированное покрытие.</p>\n\n<p>Может использоваться как магниты для изготовления бус, колье и т.п.</p>', '[{\"id\": 1608806911870, \"items\": [{\"id\": 1608807046017, \"name\": \"Тип\", \"value\": \"Квадрат с отверстием\"}, {\"id\": 1608807045316, \"name\": \"Намагниченность\", \"value\": \"N38, по оси отверстия\"}, {\"id\": 1608807044849, \"name\": \"Сила сцепления, кг\", \"value\": \"1,8\"}, {\"id\": 1608807043176, \"name\": \"Длина, мм\", \"value\": \"6\"}, {\"id\": 1608807042201, \"name\": \"Ширина, мм\", \"value\": \"6\"}, {\"id\": 1608807041658, \"name\": \"Высота, мм\", \"value\": \"6\"}, {\"id\": 1608807041236, \"name\": \"Диаметр внутренний, переменный, мм\", \"value\": \"2,5/1\"}, {\"id\": 1608807040727, \"name\": \"Вес одного магнита, г\", \"value\": \"1,3\"}, {\"id\": 1608806911870, \"name\": \"Покрытие\", \"value\": \"Ni-Cu-Ni\"}], \"title\": \"Основные характеристики\"}]', 'Магнит замок куб 6х6х6мм, комплект 2 магнита', 'Комплект магнитов 2 шт. Магниты имеют проходное отверстие под шнурок в 1 мм и под узелок 2,5 мм.', '2020-12-25 11:19:16', '2020-12-25 11:19:16'),
(458, 47, 'ua', 'Магніт замок куб 6х6х6мм, комплект 2 магніта', '<p>Набір з двох неодімових магнітів кубиків із дзеркальною полярністю S + N і змінним внутрішнім діаметром внутрішнього отвору 1 / 2,5 мм для кріплення волосіні (шнура).</p>\n\n<p>Внутрішній діаметр змінний 2,5 / 1 мм. Нікельоване покриття.</p>\n\n<p>Може використовуватися як магніти для виготовлення бус, кольє і т.п.</p>', '[{\"id\": 1608806911870, \"items\": [{\"id\": 1608807046017, \"name\": \"Тип\", \"value\": \"Квадрат з отвором\"}, {\"id\": 1608807045316, \"name\": \"Намагніченість\", \"value\": \"N38,по осі отвору\"}, {\"id\": 1608807044849, \"name\": \"Сила зчеплення, кг\", \"value\": \"1,8\"}, {\"id\": 1608807043176, \"name\": \"Довжина, мм\", \"value\": \"6\"}, {\"id\": 1608807042201, \"name\": \"Ширина, мм\", \"value\": \"6\"}, {\"id\": 1608807041658, \"name\": \"Висота, мм\", \"value\": \"6\"}, {\"id\": 1608807041236, \"name\": \"Діаметр внутрішній, змінний, мм\", \"value\": \"2,5/1\"}, {\"id\": 1608807040727, \"name\": \"Вага одного магніту, г\", \"value\": \"1,3\"}, {\"id\": 1608806911870, \"name\": \"Покриття\", \"value\": \"Ni-Cu-Ni\"}], \"title\": \"Основні характеристики\"}]', 'Магніт замок куб 6х6х6мм, комплект 2 магніта', 'Комплект магнітів 2 шт. Магніти мають прохідний отвір під шнурок в 1 мм і під вузлик 2,5 мм.', '2020-12-25 11:19:16', '2020-12-25 11:19:16'),
(461, 45, 'ru', 'Магнит кнопка для сумок 14,5мм', '<p>Магнит кнопка для сумок, чехлов, рюкзаков, магнит для кожгалантереи, карманов и т.д., наружным диаметром 14,5мм.</p>\n\n<p>Покрытие -Ni-Cu-Ni.</p>\n\n<p>Представляет собой две металлические шайбы-концентратора магнитного поля, одна из которых имеет магнит, вторая выемку для магнита. Оба диска с обратной стороны имеют &quot;усики&quot; для крепления в слое ткани и ответные диски с отверстиями под эти &quot;усики&quot;. Всего четыре детали.&nbsp;Благодаря такой конструкции магнит довольно надежно фиксирует изделие кармана в одном положении без смещений.&nbsp;</p>\n\n<p>Для установки изделия не требуется использование специальных приборов и приспособлений.</p>', '[{\"id\": 1608801210163, \"items\": [{\"id\": 1608801210163, \"name\": \"Вес, г\", \"value\": \"4,8\"}], \"title\": \"Технические характеристики\"}]', 'Магнит кнопка для сумок 14,5мм', 'Магнит кнопка для сумок, чехлов, рюкзаков, магнит для кожгалантереи, карманов и т.д., наружным диаметром 14,5мм.', '2020-12-25 11:20:13', '2020-12-25 11:20:13'),
(462, 45, 'ua', 'Магніт кнопка для сумок 14,5 мм', '<p>Магніт кнопка для сумок, чохлів, рюкзаків, магніт для шкіргалантереї, кишень і т.д., зовнішнім діаметром 14,5 мм.</p>\n\n<p>Покриття -Ni-Cu-Ni.</p>\n\n<p>Являє собою дві металеві шайби-концентратора магнітного поля, одна з яких має магніт, друга виїмку для магніту. Обидва диска зі зворотної сторони мають &quot;вусики&quot; для кріплення в шарі тканини і відповідні диски з отворами під ці &quot;вусики&quot;. Всього чотири деталі. Завдяки такій конструкції магніт досить надійно фіксує виріб кишені в одному положенні без зсувів.</p>\n\n<p>Для установки виробу не потрібне використання спеціальних приладів і пристосувань.</p>', '[{\"id\": 1608801210163, \"items\": [{\"id\": 1608801210163, \"name\": \"Вага, г\", \"value\": \"4,8\"}], \"title\": \"Технічні характеристики\"}]', 'Магніт кнопка для сумок 14,5 мм', 'Магніт кнопка для сумок, чохлів, рюкзаків, магніт для шкіргалантереї, кишень і т.д., зовнішнім діаметром 14,5 мм.', '2020-12-25 11:20:13', '2020-12-25 11:20:13'),
(463, 46, 'ru', 'Магнит кнопка для сумок 18,5мм', '<p>Магнит кнопка для сумок, чехлов, рюкзаков, магнит для кожгалантереи, карманов, одежды и т.д.<br />\nНаружный диаметр магнита 18,5 мм.<br />\nПокрытие -Ni-Cu-Ni.<br />\nПредставляет собой две металлические шайбы-концентратора магнитного поля, одна из которых имеет магнит, вторая выемку для магнита. Оба диска с обратной стороны имеют &quot;усики&quot; для крепления в слое ткани и ответные диски с отверстиями под эти &quot;усики&quot;. Всего 4 детали.&nbsp;Благодаря такой конструкции магнит довольно надежно фиксирует изделие кармана в одном положении без смещений.&nbsp;<br />\nДля установки изделия не требуется использование специальных приборов и приспособлений</p>', '[{\"id\": 1608803643957, \"items\": [{\"id\": 1608803643957, \"name\": \"Вес, г\", \"value\": \"9,2\"}], \"title\": \"Технические характеристики\"}]', 'Магнит кнопка для сумок 18,5мм', 'Магнит кнопка для сумок диаметром 18,5 мм. Состоит из 4-х частей: папа + мама с усиками и 2 ответные части, за которые крепятся усики. Цвет никель. Металлическая фурнитура для сумок купить Украина.', '2020-12-25 11:20:52', '2020-12-25 11:20:52'),
(464, 46, 'ua', 'Магніт кнопка для сумок 18,5мм', '<p>Магніт кнопка для сумок, чохлів, рюкзаків, магніт для шкіргалантереї, кишень, одягу і т.д.<br />\nЗовнішній діаметр магніту 18,5 мм.<br />\nПокриття -Ni-Cu-Ni.<br />\nЯвляє собою дві металеві шайби-концентратора магнітного поля, одна з яких має магніт, друга виїмку для магніту. Обидва диска зі зворотної сторони мають &quot;вусики&quot; для кріплення в шарі тканини і відповідні диски з отворами під ці &quot;вусики&quot;. Всього 4 деталі. Завдяки такій конструкції магніт досить надійно фіксує виріб кишені в одному положенні без зсувів.<br />\nДля установки виробу не потрібне використання спеціальних приладів і пристосувань</p>', '[{\"id\": 1608803643957, \"items\": [{\"id\": 1608803643957, \"name\": \"Вага, г\", \"value\": \"9,2\"}], \"title\": \"Технічні характеристики\"}]', 'Магніт кнопка для сумок 18,5мм', 'Магніт кнопка для сумок діаметром 18,5 мм. Складається з 4-х частин: тато + мама з вусиками і 2 відповідні частини, за які кріпляться вусики. Колір нікель. Металева фурнітура для сумок купити Україна.', '2020-12-25 11:20:52', '2020-12-25 11:20:52'),
(465, 54, 'ru', 'Магнит неодимовый шар 5 мм', '<p>Магнит неодимовый шар диаметром 5 мм. Вес: 0,5 г. Сплав: неодим-железо-бор. N38.</p>', '[{\"id\": 1608886000879, \"items\": [{\"id\": 1608887636228, \"name\": \"Тип\", \"value\": \"Шар\"}, {\"id\": 1608887633768, \"name\": \"Намагниченность\", \"value\": \"N38\"}, {\"id\": 1608887633339, \"name\": \"Усилие на отрыв, г\", \"value\": \"400\"}, {\"id\": 1608887632956, \"name\": \"Диаметр, мм\", \"value\": \"5\"}, {\"id\": 1608887625173, \"name\": \"Вес, г\", \"value\": \"0,5\"}, {\"id\": 1608887624817, \"name\": \"Материал магнита (состав, формула)\", \"value\": \"неодимовый магнит (NdFeB)\"}], \"title\": \"Основные характеристики\"}]', 'Магнит неодимовый шар 5 мм', 'Магнит неодимовый шар 5 мм', '2020-12-25 11:22:10', '2020-12-25 11:22:10'),
(466, 54, 'ua', 'Магніт неодимовий куля 5 мм', '<p>Магніт неодимовий куля діаметром 5 мм. Вага: 0,5 г. Сплав: неодим-залізо-бор. N38.</p>', '[{\"id\": 1608886000879, \"items\": [{\"id\": 1608887636228, \"name\": \"Тип\", \"value\": \"Сфера\"}, {\"id\": 1608887633768, \"name\": \"Намагніченість\", \"value\": \"N38\"}, {\"id\": 1608887633339, \"name\": \"Зусилля на відрив, г\", \"value\": \"400\"}, {\"id\": 1608887632956, \"name\": \"Діаметр, мм\", \"value\": \"5\"}, {\"id\": 1608887625173, \"name\": \"Вага, г\", \"value\": \"0,5\"}, {\"id\": 1608887624817, \"name\": \"Матеріал магніту (склад, формула)\", \"value\": \"Неодимовий магніт (NdFeB)\"}], \"title\": \"Основные характеристики\"}]', 'Магніт неодимовий куля 5 мм', 'Магніт неодимовий куля 5 мм', '2020-12-25 11:22:10', '2020-12-25 11:22:10'),
(467, 55, 'ru', 'Магнит D8 mm х H1 mm (самоклейка)', '<p>Неодимовый магнит с клеевой основой, диаметром 8 мм, высотой 1 мм. Клей &quot;3М&quot;. Полярность N.</p>\n\n<p>&nbsp;</p>', '[{\"id\": 1608890833930, \"items\": [{\"id\": 1608891518211, \"name\": null, \"value\": null}, {\"id\": 1608891517620, \"name\": null, \"value\": null}, {\"id\": 1608891517020, \"name\": null, \"value\": null}, {\"id\": 1608891516235, \"name\": null, \"value\": null}, {\"id\": 1608891515519, \"name\": null, \"value\": null}, {\"id\": 1608891515035, \"name\": null, \"value\": null}, {\"id\": 1608891513911, \"name\": null, \"value\": null}, {\"id\": 1608891513492, \"name\": null, \"value\": null}, {\"id\": 1608890833930, \"name\": null, \"value\": null}], \"title\": \"Основные характеристики\"}]', NULL, NULL, '2020-12-25 11:23:29', '2020-12-25 11:23:29'),
(468, 55, 'ua', NULL, NULL, '[{\"id\": 1608890833930, \"items\": [{\"id\": 1608891518211, \"name\": null, \"value\": null}, {\"id\": 1608891517620, \"name\": null, \"value\": null}, {\"id\": 1608891517020, \"name\": null, \"value\": null}, {\"id\": 1608891516235, \"name\": null, \"value\": null}, {\"id\": 1608891515519, \"name\": null, \"value\": null}, {\"id\": 1608891515035, \"name\": null, \"value\": null}, {\"id\": 1608891513911, \"name\": null, \"value\": null}, {\"id\": 1608891513492, \"name\": null, \"value\": null}, {\"id\": 1608890833930, \"name\": null, \"value\": null}], \"title\": null}]', NULL, NULL, '2020-12-25 11:23:29', '2020-12-25 11:23:29'),
(475, 56, 'ru', 'Магнит неодимовый с крючком. Е10.', '<p>В этом магнитном держателе используется&nbsp;неодимовый магнит&nbsp;.&nbsp;Максимальная рабочая температура для магнитных держателей с неодимовыми магнитами&nbsp;<strong>80 &deg; [C]</strong>&nbsp;.</p>\n\n<p>Заданную максимальную грузоподъемность держателя измеряют в оптимальных условиях, то есть с помощью магнитной пластины из низкоуглеродистой стали (St3S), имеющей толщину не менее 10 [мм], с гладкой поверхностью при нулевой шерховатости, при отрыве от поверхности строго перпендикулярно, а также при комнатной температуре.</p>\n\n<p>Примечание: приведенная&nbsp;сила сцепления магнита&nbsp;имеет относительное значение. Фактическое сцепление магнитного держателя будет &nbsp;зависеть от следующих факторов:</p>\n\n<ul>\n	<li>зазора между магнитным держателем и поверхностью примагничивания (при определенных обстоятельствах, даже очень малый зазор, например, 0,5 [мм] может вызвать снижение мощности на половину);</li>\n	<li>материала поверхности к которой крепится магнитный держатель ( чем выше содержание углерода в стали, тем меньше мощность магнита, например чугун магнитится хуже, чем сталь);</li>\n	<li>шерховатости поверхности ( чем более гладкая поверхность, тем лучше сцепление);</li>\n	<li>направления прилагаемой силы (самая высокая мощность достигается при перпендикулярной силе отрыва);</li>\n	<li>толщины магнитной поверхности (металлическая поверхность не может быть слишком тонкой, потому что часть магнитного поля не будет использоватся для примагничивания магнита);</li>\n	<li>рабочей температуры (чем выше температура, тем меньше мощность сцепления).</li>\n</ul>\n\n<p>Понимая все это, по Вашему запросу, мы можем провести проверку намагничивания в определенных условиях если создать такие будет возможно.</p>', '[{\"id\": 1609246765212, \"items\": [{\"id\": 1609246765212, \"name\": \"Вес, г\", \"value\": \"4,5\"}], \"title\": \"Основные характеристики\"}]', 'Магнит неодимовый с крючком. Е10.', 'Держатель магнитный состоит из магнита, запрессованного в стальной корпус. В  данных магнитных держателях используются неодимовые магнитные диски, имеющие два полюса расположенных по плоскостям (аксиальное намагничивание). Второй полюс, полностью утопленный в корпусе,  также оказывает воздействие на видимый наружный полюс, усиливая его и увеличивая силу сцепления. Таким образом магнитные держатели в стальном корпусе характеризуются относительно высокой грузоподъемностью. Рабочий диапазон магнитного поля при этом снижается.', '2020-12-29 10:26:17', '2020-12-29 10:26:17');
INSERT INTO `trans_products` (`id`, `product_id`, `local`, `title`, `desc`, `params`, `meta_title`, `meta_desc`, `created_at`, `updated_at`) VALUES
(476, 56, 'ua', 'Магніт неодимовий з гачком. Е10.', '<p>У цьому магнітному тримачі використовується неодимовий магніт. Максимальна робоча температура для магнітних власників з неодимовими магнітами 80 &deg; [C].</p>\n\n<p>Задану максимальну вантажопідйомність власника вимірюють в оптимальних умовах, тобто за допомогою магнітної пластини з низьковуглецевої сталі (St3S), що має товщину не менше 10 [мм], з гладкою поверхнею при нульовій шерховатая, при відриві від поверхні строго перпендикулярно, а також при кімнатній температурі .</p>\n\n<p>Примітка: наведена сила зчеплення магніту має відносне значення. Фактичне зчеплення магнітного утримувача буде залежати від наступних факторів:</p>\n\n<p>зазору між магнітним утримувачем і поверхнею прімагнічіванія (при певних обставинах, навіть дуже малий зазор, наприклад, 0,5 [мм] може викликати зниження потужності на половину);<br />\nматеріалу поверхні до якої кріпиться магнітний тримач (чим вищий вміст вуглецю в стали, тим менше потужність магніту, наприклад чавун магнітиться гірше, ніж сталь);<br />\nшерховатая поверхні (чим більше гладка поверхня, тим краще зчеплення);<br />\nнапрямку додається сили (найвища потужність досягається при перпендикулярній силі відриву);<br />\nтовщини магнітної поверхні (металева поверхня не може бути дуже тонкою, тому що частина магнітного, не працюють використовуватися для прімагнічіванія магніту);<br />\nробочої температури (чим вище температура, тим менше потужність зчеплення).<br />\nРозуміючи все це, по Вашому запиту, ми можемо провести перевірку намагнічування в певних умовах якщо створити такі буде можливо.</p>', '[{\"id\": 1609246765212, \"items\": [{\"id\": 1609246765212, \"name\": \"Вага, г\", \"value\": \"4,5\"}], \"title\": \"Основні характеристики\"}]', 'Магніт неодимовий з гачком. Е10.', 'Тримач магнітний складається з магніту, запресованого в сталевий корпус. В даних магнітних тримачів використовуються неодимові магнітні диски, що мають два полюси розташованих по площинах (аксіальне намагнічування). Другий полюс, повністю втоплений в корпусі, також впливає на видимий зовнішній полюс, посилюючи його і збільшуючи силу зчеплення. Таким чином магнітні тримачі в сталевому корпусі характеризуються відносно високою вантажопідйомністю. Робочий діапазон магнітного поля при цьому знижується.', '2020-12-29 10:26:17', '2020-12-29 10:26:17'),
(479, 57, 'ru', 'Сумка для поискового магнита цвет \"Камуфляж\"', '<p>Сумка для поискового магнита с &quot;экранированием&quot; магнитного поля</p>\n\n<p>Сумка специально разработана и изготовлена для переноски и хранения поисковых магнитов, как односторонних, так и двухсторонних, с силой на отрыв от 80 до 600 кг.</p>\n\n<p>Сумка пошита из износостойкой плотной ткани, углы и ручки укреплены и прошиты, внутри со всех сторон вставлены плотные износостойкие прокладки толщиной 10 мм, значительно снижающие силу магнитного поля.&nbsp; Молния имеет две собачки для надежности и удобства открывания. Пояс через плечо обеспечивает удобство переноски. Пластиковые карабины пояса выдерживают суммарную нагрузку в 60кг.</p>\n\n<p>Основные характеристики:</p>\n\n<p>Размеры: 170х170х85 мм</p>\n\n<p>Материал - oxford 600 защитного цвета &quot;камуфляж&quot; (отталкивающая воду пропитка, грязе-, термоустойчивость, износостойкость, прочность, простота ухода, стойкость к ультрафиолету);</p>\n\n<p>Толщина уплотнителя - 10мм;</p>\n\n<p>Тип застежки - молния на 2 бегунка;</p>\n\n<p>Ручка дополнительно прошита с подкладкой;</p>\n\n<p>Съемный регулируемый ремень для переноски с надежными карабинами;</p>\n\n<p>Плавучесть;</p>\n\n<p>Небольшой вес изделия - 200 г;</p>\n\n<p>Цвет - защитный: &quot;Камуфляж&quot;.</p>', '[{\"id\": 1609331944382, \"items\": [{\"id\": 1609331944382, \"name\": \"Вес, г\", \"value\": \"200\"}], \"title\": \"Основные характеристики\"}]', 'Сумка для поискового магнита цвет \"Камуфляж\"', 'Специальная сумка для хранения и переноски поискового магнита. Универсальная, подходит для всех типов поисковых магнитов. Цвет \"Камуфляж\".', '2020-12-30 09:49:07', '2020-12-30 09:49:07'),
(480, 57, 'ua', 'Сумка для пошукового магніту колір \"Камуфляж\"', '<p>Сумка для пошукового магніту з &quot;екрануванням&quot; магнітного поля</p>\n\n<p>Сумка спеціально розроблена і виготовлена ​​для перенесення і зберігання пошукових магнітів, як односторонніх, так і двосторонніх, з силою на відрив від 80 до 600 кг.</p>\n\n<p>Сумка пошита з зносостійкого щільної тканини, кути і ручки укріплені і прошиті, всередині з усіх боків вставлені щільні зносостійкі прокладки товщиною 10 мм, що значно знижують силу магнітного поля. Блискавка має дві собачки для надійності та зручності відкривання. Пояс через плече забезпечує зручність перенесення. Пластикові карабіни пояса витримують сумарне навантаження в 60 кг.</p>\n\n<p>Основні характеристики:</p>\n\n<p>Розміри: 170х170х85 мм</p>\n\n<p>Матеріал - oxford 600 захисного кольору &quot;камуфляж&quot; (відразлива воду просочення, грязе-, термостійкість, зносостійкість, міцність, простота догляду, стійкість до ультрафіолету);</p>\n\n<p>Товщина ущільнювача - 10мм;</p>\n\n<p>Тип застібки - блискавка на 2 бігунка;</p>\n\n<p>Ручка додатково прошита з підкладкою;</p>\n\n<p>Знімний регульований ремінь для перенесення з надійними карабінами;</p>\n\n<p>плавучість;</p>\n\n<p>Невелика вага виробу - 200 г;</p>\n\n<p>Колір - захисний: &quot;Камуфляж&quot;.</p>', '[{\"id\": 1609331944382, \"items\": [{\"id\": 1609331944382, \"name\": \"Вага, г\", \"value\": \"200\"}], \"title\": \"Основні характеристики\"}]', 'Сумка для пошукового магніту колір \"Камуфляж\"', 'Спеціальна сумка для зберігання і перенесення пошукового магніту. Універсальна, підходить для всіх типів пошукових магнітів. Колір \"Камуфляж\".', '2020-12-30 09:49:07', '2020-12-30 09:49:07');


--
-- Дамп данных таблицы `trans_subs`
--

INSERT INTO `trans_subs` (`id`, `subs_id`, `title`, `full_title`, `desc`, `local`, `metaTitle`, `metaDesc`, `created_at`, `updated_at`) VALUES
(155, 78, '11 - 20 кг', NULL, NULL, 'ru', 'Неодимовые магниты с силой сцепления 11 - 20 килограмм', 'Мета-описание неодимовых магнитов с силой сцепления 11 - 20 килограмм', '2020-12-08 07:12:36', '2020-12-08 08:28:45'),
(156, 78, '11 - 20 кг', NULL, NULL, 'ua', 'Неодимові магніти з силою зчеплення 11 - 20 кілограмів', 'Мета-описание неодимовых магнітів з силою зчеплення 11 - 20 кілограмів', '2020-12-08 07:12:36', '2020-12-08 08:28:45'),
(157, 79, '21 - 50 кг', NULL, NULL, 'ru', 'Неодимовые магниты с силой сцепления 21 - 50 килограмм', 'Мета-описание неодимовых магнитов с силой сцепления 21 - 50 килограмм', '2020-12-08 07:12:36', '2020-12-08 08:29:33'),
(158, 79, '21 - 50 кг', NULL, NULL, 'ua', 'Неодимові магніти з силою зчеплення 21 - 50 кілограмів', 'Мета-описание неодимовых магнітів з силою зчеплення 21 - 50 кілограмів', '2020-12-08 07:12:36', '2020-12-08 08:29:33'),
(159, 80, '51 - 100 кг', NULL, NULL, 'ru', 'Неодимовые магниты с силой сцепления 51 - 100 килограмм', 'Мета-описание неодимовых магнитов с силой сцепления 51 - 100 килограмм', '2020-12-08 07:12:36', '2020-12-08 08:30:27'),
(160, 80, '51 - 100 кг', NULL, NULL, 'ua', 'Неодимові магніти з силою зчеплення 51 - 100 кілограмів', 'Мета-описание неодимовых магнітів з силою зчеплення 51 - 100 кілограмів', '2020-12-08 07:12:36', '2020-12-08 08:30:27'),
(161, 81, '101 - 200 кг', NULL, NULL, 'ru', 'Неодимовые магниты с силой сцепления 101 - 200 килограмм', 'Мета-описание неодимовых магнитов с силой сцепления 101 - 200 килограмм', '2020-12-08 07:12:36', '2020-12-08 08:31:08'),
(162, 81, '101 - 200 кг', NULL, NULL, 'ua', 'Неодимові магніти з силою зчеплення 101 - 200 кілограмів', 'Мета-описание неодимовых магнітів з силою зчеплення 101 - 200 кілограмів', '2020-12-08 07:12:36', '2020-12-08 08:31:08'),
(163, 82, '201 - 1000 кг', NULL, NULL, 'ru', 'Неодимовые магниты с силой сцепления 201 - 1000 килограмм', 'Мета-описание неодимовых магнитов с силой сцепления 201 - 1000 килограмм', '2020-12-08 07:12:36', '2020-12-08 08:31:55'),
(164, 82, '201 - 1000 кг', NULL, NULL, 'ua', 'Неодимові магніти з силою зчеплення 201 - 1000 кілограмів', 'Мета-описание неодимовых магнітів з силою зчеплення 201 - 1000 кілограмів', '2020-12-08 07:12:36', '2020-12-08 08:31:55'),
(165, 83, 'Самоклейки', NULL, NULL, 'ru', 'Самоклейки. Мета-заголовок', 'Самоклейки. Мета-описание', '2020-12-08 07:41:15', '2020-12-08 07:41:15'),
(166, 83, 'Самоклійки', NULL, NULL, 'ua', 'Самоклійки. Мета-заголовок', 'Самоклійки. Мета-описання', '2020-12-08 07:41:15', '2020-12-08 07:41:15'),
(167, 84, 'Высокотемпературные', NULL, NULL, 'ru', 'Высокотемпературные. Мета-заголовок', 'Высокотемпературные. Мета-описание', '2020-12-08 07:41:43', '2020-12-08 07:42:24'),
(168, 84, 'Високотемпературні', NULL, NULL, 'ua', 'Високотемпературні. Мета-заголовок', 'Високотемпературні. Мета-описання', '2020-12-08 07:41:43', '2020-12-08 07:42:24'),
(169, 85, 'С диаметральной намагниченностью', NULL, NULL, 'ru', 'С диаметральной намагниченностью. Мета-заголовок', 'С диаметральной намагниченностью. Мета-описание', '2020-12-08 07:42:31', '2020-12-08 07:44:01'),
(170, 85, 'З діаметральним намагніченням', NULL, NULL, 'ua', 'З діаметральним намагніченням. Мета-заголовок', 'З діаметральним намагніченням. Мета-описання', '2020-12-08 07:42:31', '2020-12-08 07:44:01'),
(171, 86, '6 - 10 кг', NULL, NULL, 'ru', 'Неодимовые магниты с силой сцепления 6 - 10 килограмм', 'Мета-описание неодимовых магнитов с силой сцепления 6 - 10 килограмм', '2020-12-08 08:13:04', '2020-12-08 08:27:55'),
(172, 86, '6 - 10 кг', NULL, NULL, 'ua', 'Неодимові магніти з силою зчеплення 6 - 10 кілограмів', 'Мета-описание неодимовых магнітів з силою зчеплення 6 - 10 кілограмів', '2020-12-08 08:13:04', '2020-12-08 08:27:55'),
(173, 87, '1 - 5 кг', NULL, NULL, 'ru', 'Неодимовые магниты с силой сцепления 1 - 5 килограмм', 'Мета-описание неодимовых магнитов с силой сцепления 1 - 5 килограмм', '2020-12-08 08:13:39', '2020-12-08 08:27:09'),
(174, 87, '1 - 5 кг', NULL, NULL, 'ua', 'Неодимові магніти з силою зчеплення 1 - 5 кілограмів', 'Мета-описание неодимовых магнітів з силою зчеплення 1 - 5 кілограмів', '2020-12-08 08:13:39', '2020-12-08 08:27:09'),
(175, 88, '1 - 3 мм', NULL, NULL, 'ru', 'Неодимовые магниты с диаметром 1 - 3 мм', 'Мета-описание неодимовых магнитов, с диаметром 1 - 3 мм', '2020-12-08 08:14:33', '2020-12-13 12:09:57'),
(176, 88, '1 - 3 мм', NULL, NULL, 'ua', 'Неодимові магніти з діаметром 1 - 3 мм', 'Мета-описание неодимовых магнітів з діаметром 1 - 3 мм', '2020-12-08 08:14:33', '2020-12-13 12:09:57'),
(177, 89, '4 - 8 мм', NULL, NULL, 'ru', 'Неодимовые магниты с диаметром 4 - 8 мм', 'Мета-описание неодимовых магнитов, с диаметром 4 - 8 мм', '2020-12-08 08:17:22', '2020-12-08 08:18:51'),
(178, 89, '4 - 8 мм', NULL, NULL, 'ua', 'Неодимові магніти з діаметром 4 - 8 мм', 'Мета-описание неодимовых магнітів з діаметром 4 - 8 мм', '2020-12-08 08:17:22', '2020-12-08 08:18:51'),
(179, 90, '9 - 15 мм', NULL, NULL, 'ru', 'Неодимовые магниты с диаметром 9 - 15 мм', 'Мета-описание неодимовых магнитов, с диаметром 9 - 15 мм', '2020-12-08 08:18:54', '2020-12-08 08:20:00'),
(180, 90, '9 - 15 мм', NULL, NULL, 'ua', 'Неодимові магніти з діаметром 4 - 8 мм', 'Мета-описание неодимовых магнітів з діаметром 4 - 8 мм', '2020-12-08 08:18:54', '2020-12-08 08:20:00'),
(181, 91, '16 - 30 мм', NULL, NULL, 'ru', 'Неодимовые магниты с диаметром 16 - 30 мм', 'Мета-описание неодимовых магнитов, с диаметром 16 - 30 мм', '2020-12-08 08:20:30', '2020-12-08 08:21:02'),
(182, 91, '16 - 30 мм', NULL, NULL, 'ua', 'Неодимові магніти з діаметром 16 - 30 мм', 'Мета-описание неодимовых магнітів з діаметром 16 - 30 мм', '2020-12-08 08:20:30', '2020-12-08 08:21:02'),
(183, 92, '31 - 50 мм', NULL, NULL, 'ru', 'Неодимовые магниты с диаметром 31 - 50 мм', 'Мета-описание неодимовых магнитов, с диаметром 31 - 50 мм', '2020-12-08 08:21:07', '2020-12-08 08:21:44'),
(184, 92, '31 - 50 мм', NULL, NULL, 'ua', 'Неодимові магніти з діаметром 31 - 50 мм', 'Мета-описание неодимовых магнітів з діаметром 31 - 50 мм', '2020-12-08 08:21:07', '2020-12-08 08:21:44'),
(185, 93, 'От 0,5 до 1 кг', 'От 0,5 до 1 кг', '<p>От 0,5 до 1 кг</p>', 'ru', 'Неодимове магниті с силой сцепления от 0,5 до 1-го килограмма', 'Мета-описание неодимовых магнитов с силой сцепления до 1-го килограмма', '2020-12-08 08:22:38', '2020-12-24 13:23:23'),
(186, 93, 'Від 0,5 до 1 кг', 'Від 0,5 до 1 кг', '<p>Від 0,5 до 1 кг</p>', 'ua', 'Неодимові магніти з силою зчеплення від 0,5 до 1-го кілограма', 'Мета-описание Неодимові магніти з силою зчеплення від 0,5 до 1-го кілограма', '2020-12-08 08:22:38', '2020-12-24 13:23:24'),
(187, 94, 'Неодим', NULL, NULL, 'ru', 'Неодим. Мета-заголовок', 'Неодим. Мета-описание', '2020-12-08 08:41:00', '2020-12-08 08:42:03'),
(188, 94, 'Неодім', NULL, NULL, 'ua', 'Неодім. Мета-заголовок', 'Неодім. Мета-описание', '2020-12-08 08:41:00', '2020-12-08 08:42:03'),
(189, 95, 'Феррит', 'ферритовые магниты', '<p>Обычные ферритовые магниты</p>', 'ru', 'Ферит. Мета-заголовок', 'Ферит. Мета-описание', '2020-12-08 08:42:07', '2020-12-28 18:00:34'),
(190, 95, 'Ферит', 'феритові магніти', '<p>Звичайні феритові магніти</p>', 'ua', 'Феріт. Мета-заголовок', 'Феріт. Мета-описание', '2020-12-08 08:42:07', '2020-12-28 18:00:34'),
(191, 96, 'Диск', NULL, NULL, 'ru', 'Диск. Мета-заголовок', 'Диск. Мета-описание', '2020-12-08 08:44:47', '2020-12-13 15:26:50'),
(192, 96, 'Диск', NULL, NULL, 'ua', 'Диск. Мета-заголовок', 'Диск. Мета-описание', '2020-12-08 08:44:47', '2020-12-13 15:26:50'),
(193, 97, 'Стержень', NULL, NULL, 'ru', 'Стержень. Мета-заголовок', 'Стержень. Мета-описание', '2020-12-08 08:44:47', '2020-12-08 08:47:06'),
(194, 97, 'Стрижень', NULL, NULL, 'ua', 'Стрижень. Мета-заголовок', 'Стрижень. Мета-описание', '2020-12-08 08:44:47', '2020-12-08 08:47:06'),
(195, 98, '1 - 3 мм', NULL, NULL, 'ru', 'Неодимовые магниты с диаметром 1 - 3 мм', 'Мета-описание неодимовых магнитов, с диаметром 1 - 3 мм', '2020-12-08 08:50:33', '2020-12-08 08:50:33'),
(196, 98, '1 - 3 мм', NULL, NULL, 'ua', 'Неодимові магніти з діаметром 1 - 3 мм', 'Мета-описание неодимовых магнітів з діаметром 1 - 3 мм', '2020-12-08 08:50:33', '2020-12-08 08:50:33'),
(197, 99, '4 - 8 мм', NULL, NULL, 'ru', 'Неодимовые магниты с диаметром 4 - 8 мм', 'Мета-описание неодимовых магнитов, с диаметром 4 - 8 мм', '2020-12-08 08:50:33', '2020-12-08 08:50:33'),
(198, 99, '4 - 8 мм', NULL, NULL, 'ua', 'Неодимові магніти з діаметром 4 - 8 мм', 'Мета-описание неодимовых магнітів з діаметром 4 - 8 мм', '2020-12-08 08:50:33', '2020-12-08 08:50:33'),
(199, 100, '9 - 15 мм', NULL, NULL, 'ru', 'Неодимовые магниты с диаметром 9 - 15 мм', 'Мета-описание неодимовых магнитов, с диаметром 9 - 15 мм', '2020-12-08 08:50:33', '2020-12-08 08:50:33'),
(200, 100, '9 - 15 мм', NULL, NULL, 'ua', 'Неодимові магніти з діаметром 4 - 8 мм', 'Мета-описание неодимовых магнітів з діаметром 4 - 8 мм', '2020-12-08 08:50:33', '2020-12-08 08:50:33'),
(201, 101, '16 - 30 мм', NULL, NULL, 'ru', 'Неодимовые магниты с диаметром 16 - 30 мм', 'Мета-описание неодимовых магнитов, с диаметром 16 - 30 мм', '2020-12-08 08:50:33', '2020-12-08 08:50:33'),
(202, 101, '16 - 30 мм', NULL, NULL, 'ua', 'Неодимові магніти з діаметром 16 - 30 мм', 'Мета-описание неодимовых магнітів з діаметром 16 - 30 мм', '2020-12-08 08:50:33', '2020-12-08 08:50:33'),
(203, 102, '31 - 50 мм', NULL, NULL, 'ru', 'Неодимовые магниты с диаметром 31 - 50 мм', 'Мета-описание неодимовых магнитов, с диаметром 31 - 50 мм', '2020-12-08 08:50:33', '2020-12-08 08:50:33'),
(204, 102, '31 - 50 мм', NULL, NULL, 'ua', 'Неодимові магніти з діаметром 31 - 50 мм', 'Мета-описание неодимовых магнітів з діаметром 31 - 50 мм', '2020-12-08 08:50:33', '2020-12-08 08:50:33'),
(205, 103, '1 - 3 мм', NULL, NULL, 'ru', 'Неодимовые магниты с диаметром 1 - 3 мм', 'Мета-описание неодимовых магнитов, с диаметром 1 - 3 мм', '2020-12-08 08:52:25', '2020-12-08 08:52:25'),
(206, 103, '1 - 3 мм', NULL, NULL, 'ua', 'Неодимові магніти з діаметром 1 - 3 мм', 'Мета-описание неодимовых магнітів з діаметром 1 - 3 мм', '2020-12-08 08:52:25', '2020-12-08 08:52:25'),
(207, 104, '4 - 8 мм', NULL, NULL, 'ru', 'Неодимовые магниты с диаметром 4 - 8 мм', 'Мета-описание неодимовых магнитов, с диаметром 4 - 8 мм', '2020-12-08 08:52:25', '2020-12-08 08:52:25'),
(208, 104, '4 - 8 мм', NULL, NULL, 'ua', 'Неодимові магніти з діаметром 4 - 8 мм', 'Мета-описание неодимовых магнітів з діаметром 4 - 8 мм', '2020-12-08 08:52:25', '2020-12-08 08:52:25'),
(209, 105, '9 - 15 мм', NULL, NULL, 'ru', 'Неодимовые магниты с диаметром 9 - 15 мм', 'Мета-описание неодимовых магнитов, с диаметром 9 - 15 мм', '2020-12-08 08:52:25', '2020-12-08 08:52:25'),
(210, 105, '9 - 15 мм', NULL, NULL, 'ua', 'Неодимові магніти з діаметром 4 - 8 мм', 'Мета-описание неодимовых магнітів з діаметром 4 - 8 мм', '2020-12-08 08:52:25', '2020-12-08 08:52:25'),
(211, 106, '16 - 30 мм', NULL, NULL, 'ru', 'Неодимовые магниты с диаметром 16 - 30 мм', 'Мета-описание неодимовых магнитов, с диаметром 16 - 30 мм', '2020-12-08 08:52:25', '2020-12-08 08:52:25'),
(212, 106, '16 - 30 мм', NULL, NULL, 'ua', 'Неодимові магніти з діаметром 16 - 30 мм', 'Мета-описание неодимовых магнітів з діаметром 16 - 30 мм', '2020-12-08 08:52:25', '2020-12-08 08:52:25'),
(213, 107, '31 - 50 мм', NULL, NULL, 'ru', 'Неодимовые магниты с диаметром 31 - 50 мм', 'Мета-описание неодимовых магнитов, с диаметром 31 - 50 мм', '2020-12-08 08:52:25', '2020-12-08 08:52:25'),
(214, 107, '31 - 50 мм', NULL, NULL, 'ua', 'Неодимові магніти з діаметром 31 - 50 мм', 'Мета-описание неодимовых магнітів з діаметром 31 - 50 мм', '2020-12-08 08:52:25', '2020-12-08 08:52:25'),
(215, 108, '1 - 3 мм', NULL, NULL, 'ru', 'Неодимовые магниты с диаметром 1 - 3 мм', 'Мета-описание неодимовых магнитов, с диаметром 1 - 3 мм', '2020-12-08 08:53:24', '2020-12-08 08:54:16'),
(216, 108, '1 - 3 мм', NULL, NULL, 'ua', 'Неодимові магніти з діаметром 1 - 3 мм', 'Мета-описание неодимовых магнітів з діаметром 1 - 3 мм', '2020-12-08 08:53:24', '2020-12-08 08:54:16'),
(217, 109, '4 - 8 мм', NULL, NULL, 'ru', 'Неодимовые магниты с диаметром 4 - 8 мм', 'Мета-описание неодимовых магнитов, с диаметром 4 - 8 мм', '2020-12-08 08:53:29', '2020-12-08 08:54:31'),
(218, 109, '4 - 8 мм', NULL, NULL, 'ua', 'Неодимові магніти з діаметром 4 - 8 мм', 'Мета-описание неодимовых магнітів з діаметром 4 - 8 мм', '2020-12-08 08:53:29', '2020-12-08 08:54:31'),
(219, 110, '9 - 15 мм', NULL, NULL, 'ru', 'Неодимовые магниты с диаметром 9 - 15 мм', 'Мета-описание неодимовых магнитов, с диаметром 9 - 15 мм', '2020-12-08 08:53:34', '2020-12-08 08:54:42'),
(220, 110, '9 - 15 мм', NULL, NULL, 'ua', 'Неодимові магніти з діаметром 4 - 8 мм', 'Мета-описание неодимовых магнітів з діаметром 4 - 8 мм', '2020-12-08 08:53:34', '2020-12-08 08:54:42'),
(221, 111, '16 - 30 мм', NULL, NULL, 'ru', 'Неодимовые магниты с диаметром 16 - 30 мм', 'Мета-описание неодимовых магнитов, с диаметром 16 - 30 мм', '2020-12-08 08:53:37', '2020-12-08 08:54:50'),
(222, 111, '16 - 30 мм', NULL, NULL, 'ua', 'Неодимові магніти з діаметром 16 - 30 мм', 'Мета-описание неодимовых магнітів з діаметром 16 - 30 мм', '2020-12-08 08:53:37', '2020-12-08 08:54:50'),
(223, 112, '31 - 50 мм', NULL, NULL, 'ru', 'Неодимовые магниты с диаметром 31 - 50 мм', 'Мета-описание неодимовых магнитов, с диаметром 31 - 50 мм', '2020-12-08 08:53:40', '2020-12-08 20:35:21'),
(224, 112, '31 - 50 мм', NULL, NULL, 'ua', 'Неодимові магніти з діаметром 31 - 50 мм', 'Мета-описание неодимовых магнітів з діаметром 31 - 50 мм', '2020-12-08 08:53:40', '2020-12-08 20:35:21'),
(225, 113, 'да', 'да', '<p>да</p>', 'ru', 'да', 'да', '2020-12-17 11:29:29', '2020-12-17 11:29:29'),
(226, 113, 'так', 'так', '<p>так</p>', 'ua', 'так', 'так', '2020-12-17 11:29:29', '2020-12-17 11:29:29'),
(227, 114, 'Односторонний', 'Односторонний', '<p>Односторонний поисковый магнит&nbsp;&nbsp;</p>', 'ru', 'Односторонний', 'Односторонний поисковый магнит', '2020-12-17 11:37:32', '2020-12-17 11:40:50'),
(228, 114, 'Односторонній', 'Одностороній', '<p>Односторонній попошуковий&nbsp;магніт</p>', 'ua', 'Односторонній', 'Односторонній попошуковий магніт', '2020-12-17 11:37:32', '2020-12-17 11:40:50'),
(229, 115, 'Двухсторонний', 'Двухсторонний', '<p>Двухсторонний поисковый магнит</p>', 'ru', 'Двухсторонний', 'Двухсторонний поисковый магнит', '2020-12-17 11:39:38', '2020-12-17 11:39:38'),
(230, 115, 'Двохсторонній', 'Двосторонній', '<p>Двосторонній пошуковий магніт</p>', 'ua', 'Двохсторонній', 'Двосторонній пошуковий магніт', '2020-12-17 11:39:38', '2020-12-17 11:39:38'),
(231, 116, 'Нет', 'Нет', '<p>Нет</p>', 'ru', 'Нет', 'Нет', '2020-12-17 11:51:35', '2020-12-17 11:51:47'),
(232, 116, 'Ні', 'Ні', '<p>Ні</p>', 'ua', 'Ні', 'Ні', '2020-12-17 11:51:35', '2020-12-17 11:51:47'),
(233, 117, 'М8', 'М8', '<p>М8</p>', 'ru', 'М8', 'М8', '2020-12-17 11:57:45', '2020-12-17 11:57:45'),
(234, 117, 'М8', 'М8', '<p>М8</p>', 'ua', 'М8', 'М8', '2020-12-17 11:57:45', '2020-12-17 11:57:45'),
(235, 118, 'М10', 'М10', '<p>М10</p>', 'ru', 'М10', 'М10', '2020-12-17 11:58:11', '2020-12-17 11:58:11'),
(236, 118, 'М10', 'М10', '<p>М10</p>', 'ua', 'М10', 'М10', '2020-12-17 11:58:11', '2020-12-17 11:58:11'),
(237, 119, 'М12', 'М12', '<p>М12</p>', 'ru', 'М12', 'М12', '2020-12-17 11:59:05', '2020-12-17 11:59:05'),
(238, 119, 'М12', 'М12', '<p>М12</p>', 'ua', 'М12', 'М12', '2020-12-17 11:59:05', '2020-12-17 11:59:05'),
(239, 120, 'М14', 'М14', '<p>М14</p>', 'ru', 'М14', 'М14', '2020-12-17 11:59:36', '2020-12-17 11:59:36'),
(240, 120, 'М14', 'М14', '<p>М14</p>', 'ua', 'М14', 'М14', '2020-12-17 11:59:36', '2020-12-17 11:59:36'),
(241, 121, 'Магнитон', 'Магнитон', '<p>Поисковый магниты фирмы Магнитон</p>', 'ru', 'Магнитон', 'Поисковый магниты фирмы Магнитон', '2020-12-17 12:19:44', '2020-12-17 12:19:53'),
(242, 121, 'Магнітон', 'Магнітон', '<p>Пошуковий магніти фірми Магнітон</p>', 'ua', 'Магнітон', 'Пошуковий магніти фірми Магнітон', '2020-12-17 12:19:44', '2020-12-17 12:19:53'),
(243, 122, 'Редмаг', 'Редмаг', '<p>Поисковый магниты фирмы Редмаг</p>', 'ru', 'Редмаг', 'Поисковый магниты фирмы Редмаг', '2020-12-17 12:21:00', '2020-12-17 12:21:00'),
(244, 122, 'Редмаг', 'Редмаг', '<p>Пошуковий магніти фірми Редмаг</p>', 'ua', 'Редмаг', 'Пошуковий магніти фірми Редмаг', '2020-12-17 12:21:00', '2020-12-17 12:21:00'),
(245, 123, 'Тритон', 'Тритон', '<p>Поисковый магниты фирмы Тритон</p>', 'ru', 'Тритон', 'Поисковый магниты фирмы Тритон', '2020-12-17 12:22:35', '2020-12-17 12:22:35'),
(246, 123, 'Тритон', 'Тритон', '<p>Пошуковий магніти фірми Тритон</p>', 'ua', 'Тритон', 'Пошуковий магніти фірми Тритон', '2020-12-17 12:22:35', '2020-12-17 12:22:35'),
(247, 124, 'Непра', 'Непра', '<p>Поисковый магниты фирмы Непра</p>', 'ru', 'Непра', 'Поисковый магниты фирмы Непра', '2020-12-17 12:23:23', '2020-12-17 12:23:23'),
(248, 124, 'Непра', 'Непра', '<p>Пошуковий магніти фірми Непра</p>', 'ua', 'Непра', 'Пошуковий магніти фірми Непра', '2020-12-17 12:23:23', '2020-12-17 12:23:23'),
(249, 125, 'Китай', 'Китай', '<p>Китай</p>', 'ru', 'Китай', 'Китай', '2020-12-17 12:24:55', '2020-12-17 12:24:55'),
(250, 125, 'Китай', 'Китай', '<p>Китай</p>', 'ua', 'Китай', 'Китай', '2020-12-17 12:24:56', '2020-12-17 12:24:56'),
(251, 126, 'Цинк', 'Цинк', '<p>Цинк(Zn)</p>', 'ru', 'Цинк', 'Цинк(Zn)', '2020-12-17 12:28:56', '2020-12-17 12:28:56'),
(252, 126, 'Цинк', 'Цинк', '<p>Цинк(Zn)</p>', 'ua', 'Цинк', 'Цинк(Zn)', '2020-12-17 12:28:56', '2020-12-17 12:28:56'),
(253, 127, 'Цинк+цвет', 'Цинк+цвет', '<p>Цинк(Zn)+цвет</p>', 'ru', 'Цинк+цвет', 'Цинк(Zn)+цвет', '2020-12-17 12:30:15', '2020-12-17 12:33:25'),
(254, 127, 'Цинк+колір', 'Цинк+колір', '<p>Цинк(Zn)+колір</p>', 'ua', 'Цинк+колір', 'Цинк(Zn)+колір', '2020-12-17 12:30:15', '2020-12-17 12:33:25'),
(255, 128, 'Никель Медь Никель', 'Никель Медь Никель', '<p>Никель Медь Никель (Ni-Cu-Ni)</p>', 'ru', 'Никель Медь Никель', 'Никель Медь Никель (Ni-Cu-Ni)', '2020-12-17 12:31:40', '2020-12-17 12:31:40'),
(256, 128, 'Нікель Мідь Нікель', 'Нікель Мідь Нікель', '<p>Нікель Мідь Нікель (Ni-Cu-Ni)</p>', 'ua', 'Нікель Мідь Нікель', 'Нікель Мідь Нікель (Ni-Cu-Ni)', '2020-12-17 12:31:40', '2020-12-17 12:31:40'),
(257, 129, 'до 0,5 кг', 'до 0,5 кг', '<p>до 0,5 кг</p>', 'ru', NULL, NULL, '2020-12-24 13:20:46', '2020-12-24 13:20:46'),
(258, 129, 'до 0,5 кг', 'до 0,5 кг', '<p>до 0,5 кг</p>', 'ua', 'до 0,5 кг', 'до 0,5 кг', '2020-12-24 13:20:46', '2020-12-24 13:20:46'),
(259, 130, 'Шар', 'Шар', '<p>Шар</p>', 'ru', 'Шар', 'Шар', '2020-12-25 05:41:08', '2020-12-25 05:41:08'),
(260, 130, 'Куля', 'Куля', '<p>Куля</p>', 'ua', 'Куля', 'Куля', '2020-12-25 05:41:08', '2020-12-25 05:41:08'),
(261, 131, 'Прямоугольник', 'Прямоугольник', '<p>Прямоугольник</p>', 'ru', 'Прямоугольник', 'Прямоугольник', '2020-12-28 09:56:08', '2020-12-28 09:56:08'),
(262, 131, 'Прямокутник', 'Прямокутник', '<p>Прямокутник</p>', 'ua', 'Прямокутник', 'Прямокутник', '2020-12-28 09:56:08', '2020-12-28 09:56:08'),
(263, 132, 'Куб', 'Куб', '<p>Куб</p>', 'ru', 'Куб', 'Куб', '2020-12-28 09:56:47', '2020-12-28 09:56:47'),
(264, 132, 'Куб', 'Куб', '<p>Куб</p>', 'ua', 'Куб', 'Куб', '2020-12-28 09:56:47', '2020-12-28 09:56:47'),
(265, 133, 'Кольцо', 'Кольцо', '<p>Кольцо</p>', 'ru', 'Кольцо', 'Кольцо', '2020-12-28 09:58:03', '2020-12-28 09:58:03'),
(266, 133, 'Кільце', 'Кільце', '<p>Кільце</p>', 'ua', 'Кільце', 'Кільце', '2020-12-28 09:58:03', '2020-12-28 09:58:03'),
(267, 134, 'Квадрат', 'Квадрат', '<p>Квадрат&nbsp;</p>', 'ru', 'Квадрат', 'Квадрат', '2020-12-28 10:01:55', '2020-12-28 10:01:55'),
(268, 134, 'Квадрат', 'Квадрат', '<p>Квадрат&nbsp;</p>', 'ua', 'Квадрат', 'Квадрат', '2020-12-28 10:01:55', '2020-12-28 10:01:55'),
(269, 135, 'Крепежный', 'Крепежный', '<p>Крепежный</p>', 'ru', 'Крепежный', 'Крепежный', '2020-12-28 10:03:07', '2020-12-29 10:25:42'),
(270, 135, 'Кріплення', 'Кріплення', '<p>Кріплення</p>', 'ua', 'Кріплення', 'Кріплення', '2020-12-28 10:03:07', '2020-12-29 10:25:42'),
(271, 136, 'Сумка', 'Сумка', '<p>Сумка</p>', 'ru', 'Сумка', 'Сумка', '2020-12-28 10:35:33', '2020-12-28 10:35:33'),
(272, 136, 'Сумка', 'Сумка', '<p>Сумка</p>', 'ua', 'Сумка', 'Сумка', '2020-12-28 10:35:33', '2020-12-28 10:35:33'),
(273, 137, 'Шнур', 'Шнур', '<p>Шнур</p>', 'ru', 'Шнур', 'Шнур', '2020-12-28 10:43:56', '2020-12-28 10:43:56'),
(274, 137, 'Шнур', 'Шнур', '<p>Шнур</p>', 'ua', 'Шнур', 'Шнур', '2020-12-28 10:43:56', '2020-12-28 10:43:56'),
(275, 138, 'Рым болт', 'Рым болт', '<p>Рым болт</p>', 'ru', 'Рым болт', 'Рым болт', '2020-12-28 10:47:23', '2020-12-28 10:47:23'),
(276, 138, 'Рим болт', 'Рим болт', '<p>Рим болт</p>', 'ua', 'Рим болт', 'Рим болт', '2020-12-28 10:47:23', '2020-12-28 10:47:23'),
(277, 139, 'Карабин', 'Карабин', '<p>Карабин</p>', 'ru', 'Карабин', 'Карабин', '2020-12-28 10:50:12', '2020-12-28 10:50:12'),
(278, 139, 'Карабін', 'Карабін', '<p>Карабін</p>', 'ua', 'Карабін', 'Карабін', '2020-12-28 10:50:12', '2020-12-28 10:50:12'),
(279, 140, 'Крюк', 'Крюк', '<p>Крюк</p>', 'ru', 'Крюк', 'Крюк', '2020-12-28 10:51:19', '2020-12-28 10:51:19'),
(280, 140, 'Крюк', 'Крюк', '<p>Крюк</p>', 'ua', 'Крюк', 'Крюк', '2020-12-28 10:51:19', '2020-12-28 10:51:19'),
(281, 141, 'Перчатки', 'Перчатки', '<p>Перчатки</p>', 'ru', 'Перчатки', 'Перчатки', '2020-12-28 10:51:55', '2020-12-28 10:51:55'),
(282, 141, 'Рукавички', 'Рукавички', '<p>Рукавички</p>', 'ua', 'Рукавички', 'Рукавички', '2020-12-28 10:51:55', '2020-12-28 10:51:55'),
(283, 142, 'Шнур для телефона', 'Шнур для телефона', '<p>Шнур для телефона</p>', 'ru', 'Шнур для телефона', 'Шнур для телефона', '2020-12-28 11:01:15', '2020-12-28 11:01:15'),
(284, 142, 'Шнур для телефона', 'Шнур для телефона', '<p>Шнур для телефона</p>', 'ua', 'Шнур для телефона', 'Шнур для телефона', '2020-12-28 11:01:15', '2020-12-28 11:01:15'),
(285, 143, 'Держатель для телефона', 'Держатель для телефона', '<p>Держатель для телефона</p>', 'ru', 'Держатель для телефона', 'Держатель для телефона', '2020-12-28 11:05:36', '2020-12-28 11:05:36'),
(286, 143, 'Тримач для телефону', 'Тримач для телефону', '<p>Тримач для телефону</p>', 'ua', 'Тримач для телефону', 'Тримач для телефону', '2020-12-28 11:05:37', '2020-12-28 11:05:37'),
(287, 144, 'Без корпуса', 'Без корпуса', '<p>Без корпуса</p>', 'ru', 'Без корпуса', 'Без корпуса', '2020-12-29 07:05:00', '2020-12-29 07:05:00'),
(288, 144, 'Без корпусу', 'Без корпусу', '<p>Без корпусу</p>', 'ua', 'Без корпусу', 'Без корпусу', '2020-12-29 07:05:00', '2020-12-29 07:05:00'),
(289, 145, 'Тип А (под саморез)', 'Тип А (под потай)', '<p>Тип А (под болт)</p>', 'ru', 'Тип А (под саморез)', 'Тип А (под саморез)', '2020-12-29 07:12:54', '2020-12-29 07:16:16'),
(290, 145, 'Тип А (під саморіз)', 'Тип А (під саморіз)', '<p>Тип А (під саморіз)</p>', 'ua', 'Тип А (під саморіз)', 'Тип А (під саморіз)', '2020-12-29 07:12:54', '2020-12-29 07:16:16'),
(291, 146, 'Тип В (под винт)', 'Тип В (под винт)', '<p>Тип В (под винт)</p>', 'ru', 'Тип В (под винт)', 'Тип В (под винт)', '2020-12-29 07:15:43', '2020-12-29 07:15:43'),
(292, 146, 'Тип В (під гвинт)', 'Тип В (під гвинт)', '<p>Тип В&nbsp;(під гвинт)</p>', 'ua', 'Тип В (під гвинт)', 'Тип В (під гвинт)', '2020-12-29 07:15:43', '2020-12-29 07:15:43'),
(293, 147, 'Тип С (с наружной резьбой)', 'Тип С (с наружной резьбой)', '<p>Тип С (с наружной резьбой)</p>', 'ru', 'Тип С (с наружной резьбой)', 'Тип С (с наружной резьбой)', '2020-12-29 07:28:24', '2020-12-29 07:28:24'),
(294, 147, 'Тип С (із зовнішнім різьбленням)', 'Тип С (із зовнішнім різьбленням)', '<p>Тип С (із зовнішнім різьбленням)</p>', 'ua', 'Тип С (із зовнішнім різьбленням)', 'Тип С (із зовнішнім різьбленням)', '2020-12-29 07:28:24', '2020-12-29 07:28:24'),
(295, 148, 'Тип D (с резьбой в бобышке)', 'Тип D (с резьбой в бобышке)', '<p>Тип D (с резьбой в бобышке)</p>', 'ru', 'Тип D (с резьбой в бобышке)', 'Тип D (с резьбой в бобышке)', '2020-12-29 09:49:45', '2020-12-29 09:49:45'),
(296, 148, 'Тип D (з різьбленням в бобишці)', 'Тип D (з різьбленням в бобишці)', '<p>Тип D (з різьбленням в бобишці)</p>', 'ua', 'Тип D (з різьбленням в бобишці)', 'Тип D (з різьбленням в бобишці)', '2020-12-29 09:49:45', '2020-12-29 09:49:45'),
(297, 149, 'Тип Е (с крючком)', 'Тип Е (с крючком)', '<p>Тип Е (с крючком)</p>', 'ru', 'Тип Е (с крючком)', 'Тип Е (с крючком)', '2020-12-29 09:52:52', '2020-12-29 09:52:52'),
(298, 149, 'Тип Е (з гачком)', 'Тип Е (з гачком)', '<p>Тип Е (з гачком)</p>', 'ua', 'Тип Е (з гачком)', 'Тип Е (з гачком)', '2020-12-29 09:52:52', '2020-12-29 09:52:52'),
(299, 150, 'Тип F (с рым-болтом)', 'Тип F (с рым-болтом)', '<p>Тип F (с рым-болтом)</p>', 'ru', 'Тип F (с рым-болтом)', 'Тип F (с рым-болтом)', '2020-12-29 09:56:00', '2020-12-29 09:56:00'),
(300, 150, 'Тип F (з рим-болтом)', 'Тип F (з рим-болтом)', '<p>Тип F (з рим-болтом)</p>', 'ua', 'Тип F (з рим-болтом)', 'Тип F (з рим-болтом)', '2020-12-29 09:56:00', '2020-12-29 09:56:00'),
(301, 151, 'Аксессуары', 'Аксессуары', '<p>Аксессуары</p>', 'ru', 'Аксессуары', 'Аксессуары', '2020-12-30 09:47:55', '2020-12-30 09:47:55'),
(302, 151, 'Аксесуари', 'Аксесуари', '<p>Аксесуари</p>', 'ua', 'Аксесуари', 'Аксесуари', '2020-12-30 09:47:55', '2020-12-30 09:47:55'),
(303, 152, 'Клей', 'Клей', '<p>Клей</p>', 'ru', 'Клей', 'Клей', '2020-12-30 10:15:24', '2020-12-30 10:15:24'),
(304, 152, 'Клей', 'Клей', '<p>Клей</p>', 'ua', 'Клей', 'Клей', '2020-12-30 10:15:24', '2020-12-30 10:15:24'),
(305, 153, 'Защитная прокладка', 'Защитная прокладка', '<p>Защитная прокладка</p>', 'ru', 'Защитная прокладка', 'Защитная прокладка', '2020-12-30 10:16:13', '2020-12-30 10:16:13'),
(306, 153, 'Захисна прокладка', 'Захисна прокладка', '<p>Захисна прокладка</p>', 'ua', 'Захисна прокладка', 'Захисна прокладка', '2020-12-30 10:16:13', '2020-12-30 10:16:13'),
(307, 154, 'Сегмент', 'Сегмент', '<p>Сегмент</p>', 'ru', 'Сегмент', 'Сегмент', '2020-12-30 11:20:16', '2020-12-30 11:20:16'),
(308, 154, 'Сегмент', 'Сегмент', '<p>Сегмент</p>', 'ua', 'Сегмент', 'Сегмент', '2020-12-30 11:20:16', '2020-12-30 11:20:16'),
(309, 155, 'Неокуб', 'Неокуб', '<p>Неокуб</p>', 'ru', 'Неокуб', 'Неокуб', '2020-12-30 11:34:06', '2020-12-30 11:34:14'),
(310, 155, 'Неокуб', 'Неокуб', '<p>Неокуб</p>', 'ua', 'Неокуб', 'Неокуб', '2020-12-30 11:34:06', '2020-12-30 11:34:14'),
(311, 156, 'Тетракуб', 'Тетракуб', '<p>Тетракуб</p>', 'ru', 'Тетракуб', 'Тетракуб', '2020-12-30 11:34:49', '2020-12-30 11:34:49'),
(312, 156, 'Тетракуб', 'Тетракуб', '<p>Тетракуб</p>', 'ua', 'Тетракуб', 'Тетракуб', '2020-12-30 11:34:49', '2020-12-30 11:34:49'),
(313, 157, 'Щебетуны', 'Щебетуны', '<p>Щебетуны</p>', 'ru', 'Щебетуны', 'Щебетуны', '2020-12-30 11:37:32', '2020-12-30 11:37:32'),
(314, 157, 'Цвіркун', 'Цвіркун', '<p>Цвіркун</p>', 'ua', 'Цвіркун', 'Цвіркун', '2020-12-30 11:37:32', '2020-12-30 11:37:32'),
(315, 158, 'Конструктор', 'Конструктор', '<p>Конструктор</p>', 'ru', 'Конструктор', 'Конструктор', '2020-12-30 11:38:07', '2020-12-30 11:38:07'),
(316, 158, 'Конструктор', 'Конструктор', '<p>Конструктор</p>', 'ua', 'Конструктор', 'Конструктор', '2020-12-30 11:38:07', '2020-12-30 11:38:07'),
(317, 159, 'Кубики', 'Кубики', '<p>Кубики</p>', 'ru', 'Кубики', 'Кубики', '2020-12-30 11:38:41', '2020-12-30 11:38:41'),
(318, 159, 'Кубики', 'Кубики', '<p>Кубики</p>', 'ua', 'Кубики', 'Кубики', '2020-12-30 11:38:41', '2020-12-30 11:38:41'),
(319, 160, 'Другие', 'Другие', '<p>Другие</p>', 'ru', 'Другие', 'Другие', '2020-12-30 11:40:14', '2020-12-30 11:40:14'),
(320, 160, 'Інші', 'Інші', '<p>Інші</p>', 'ua', 'Інші', 'Інші', '2020-12-30 11:40:14', '2020-12-30 11:40:14'),
(321, 161, 'Магнитная лента', 'Магнитная лента', '<p>Магнитная лента</p>', 'ru', 'Магнитная лента', 'Магнитная лента', '2020-12-30 11:47:04', '2021-01-04 08:54:18'),
(322, 161, 'Магнітна стрічка', 'Магнітна стрічка', '<p>Магнітна стрічка</p>', 'ua', 'Магнітна стрічка', 'Магнітна стрічка', '2020-12-30 11:47:04', '2021-01-04 08:54:18'),
(323, 162, 'Рулон', 'Рулон', '<p>Рулон</p>', 'ru', 'Рулон', 'Рулон', '2020-12-30 11:47:47', '2020-12-30 11:47:47'),
(324, 162, 'Рулон', 'Рулон', '<p>Рулон</p>', 'ua', 'Рулон', 'Рулон', '2020-12-30 11:47:47', '2020-12-30 11:47:47'),
(325, 163, 'Лист А1', 'Лист А1', '<p>Лист А1</p>', 'ru', 'Лист А1', 'Лист А1', '2020-12-30 11:48:33', '2020-12-30 11:48:33'),
(326, 163, 'Лист А1', 'Лист А1', '<p>Лист А1</p>', 'ua', 'Лист А1', 'Лист А1', '2020-12-30 11:48:33', '2020-12-30 11:48:33'),
(327, 164, 'Лист А2', 'Лист А2', '<p>Лист А2</p>', 'ru', 'Лист А2', 'Лист А2', '2020-12-30 11:48:53', '2020-12-30 11:48:53'),
(328, 164, 'Лист А2', 'Лист А2', '<p>Лист А2</p>', 'ua', 'Лист А2', 'Лист А2', '2020-12-30 11:48:53', '2020-12-30 11:48:53'),
(329, 165, 'Лист А3', 'Лист А3', '<p>Лист А3</p>', 'ru', 'Лист А3', 'Лист А3', '2020-12-30 11:49:13', '2020-12-30 11:49:13'),
(330, 165, 'Лист А3', 'Лист А3', '<p>Лист А3</p>', 'ua', 'Лист А3', 'Лист А3', '2020-12-30 11:49:13', '2020-12-30 11:49:13'),
(331, 166, 'Лист А4', 'Лист А4', '<p>Лист А4</p>', 'ru', 'Лист А4', 'Лист А4', '2020-12-30 11:49:32', '2020-12-30 11:49:32'),
(332, 166, 'Лист А4', 'Лист А4', '<p>Лист А4</p>', 'ua', 'Лист А4', 'Лист А4', '2020-12-30 11:49:32', '2020-12-30 11:49:32'),
(333, 167, 'Лист А5', 'Лист А5', '<p>Лист А5</p>', 'ru', 'Лист А5', 'Лист А5', '2020-12-30 11:49:48', '2020-12-30 11:49:48'),
(334, 167, 'Лист А5', 'Лист А5', '<p>Лист А5</p>', 'ua', 'Лист А5', 'Лист А5', '2020-12-30 11:49:48', '2020-12-30 11:49:48'),
(335, 168, 'Лист А6', 'Лист А6', '<p>Лист А6</p>', 'ru', 'Лист А6', 'Лист А6', '2020-12-30 11:50:50', '2020-12-30 11:50:50'),
(336, 168, 'Лист А6', 'Лист А6', '<p>Лист А6</p>', 'ua', 'Лист А6', 'Лист А6', '2020-12-30 11:50:50', '2020-12-30 11:50:50'),
(337, 169, '51-100 мм', '51-100 мм', '<p>51-100 мм</p>', 'ru', '51-100 мм', '51-100 мм', '2020-12-31 06:40:11', '2020-12-31 06:40:11'),
(338, 169, '51-100 мм', '51-100 мм', '<p>51-100 мм</p>', 'ua', '51-100 мм', '51-100 мм', '2020-12-31 06:40:11', '2020-12-31 06:40:11'),
(339, 170, '51-100 мм', '51-100 мм', '<p>51-100 мм</p>', 'ru', '51-100 мм', '51-100 мм', '2020-12-31 06:40:40', '2020-12-31 06:40:40'),
(340, 170, '51-100 мм', '51-100 мм', '<p>51-100 мм</p>', 'ua', '51-100 мм', '51-100 мм', '2020-12-31 06:40:40', '2020-12-31 06:40:40'),
(341, 171, '51-100 мм', '51-100 мм', '<p>51-100 мм</p>', 'ru', '51-100 мм', '51-100 мм', '2020-12-31 06:41:30', '2020-12-31 06:41:30'),
(342, 171, '51-100 мм', '51-100 мм', '<p>51-100 мм</p>', 'ua', '51-100 мм', '51-100 мм', '2020-12-31 06:41:30', '2020-12-31 06:41:30'),
(343, 172, '51-100 мм', '51-100 мм', '<p>51-100 мм</p>', 'ru', NULL, NULL, '2020-12-31 06:42:03', '2020-12-31 06:42:03'),
(344, 172, '51-100 мм', '51-100 мм', '<p>51-100 мм</p>', 'ua', NULL, NULL, '2020-12-31 06:42:03', '2020-12-31 06:42:03'),
(345, 173, '101+ мм', '101+ мм', '<p>101+ мм</p>', 'ru', '101+ мм', '101+ мм', '2020-12-31 06:45:51', '2020-12-31 06:45:51'),
(346, 173, '101+ мм', '101+ мм', '<p>101+ мм</p>', 'ua', '101+ мм', '101+ мм', '2020-12-31 06:45:51', '2020-12-31 06:45:51'),
(347, 174, '101+ мм', '101+ мм', '<p>101+ мм</p>', 'ru', '101+ мм', '101+ мм', '2020-12-31 06:46:29', '2020-12-31 06:46:29'),
(348, 174, '101+ мм', '101+ мм', '<p>101+ мм</p>', 'ua', '101+ мм', '101+ мм', '2020-12-31 06:46:30', '2020-12-31 06:46:30'),
(349, 175, '101+ мм', '101+ мм', '<p>101+ мм</p>', 'ru', '101+ мм', '101+ мм', '2020-12-31 06:47:11', '2020-12-31 06:47:23'),
(350, 175, '101+ мм', '101+ мм', '<p>101+ мм</p>', 'ua', '101+ мм', '101+ мм', '2020-12-31 06:47:11', '2020-12-31 06:47:23'),
(351, 176, '101+ мм', '101+ мм', '<p>101+ мм</p>', 'ru', '101+ мм', '101+ мм', '2020-12-31 06:47:49', '2020-12-31 06:48:07'),
(352, 176, '101+ мм', '101+ мм', '<p>101+ мм</p>', 'ua', '101+ мм', '101+ мм', '2020-12-31 06:47:49', '2020-12-31 06:48:07'),
(353, 177, '60-140 кг', '60-140 кг', '<p>60-140 кг</p>', 'ru', '60-140 кг', '60-140 кг', '2020-12-31 06:51:40', '2020-12-31 06:51:40'),
(354, 177, '60-140 кг', '60-140 кг', '<p>60-140 кг</p>', 'ua', '60-140 кг', '60-140 кг', '2020-12-31 06:51:40', '2020-12-31 06:51:40'),
(355, 178, '141-290 кг', '141-290 кг', '<p>141-290 кг</p>', 'ru', '141-290 кг', '141-290 кг', '2020-12-31 06:52:19', '2020-12-31 06:52:19'),
(356, 178, '141-290 кг', '141-290 кг', '<p>141-290 кг</p>', 'ua', '141-290 кг', '141-290 кг', '2020-12-31 06:52:19', '2020-12-31 06:52:19'),
(357, 179, 'N52', 'N52', '<p>N52</p>', 'ru', 'N52', 'N52', '2020-12-31 08:24:28', '2020-12-31 08:24:40'),
(358, 179, 'N52', 'N52', '<p>N52</p>', 'ua', 'N52', 'N52', '2020-12-31 08:24:28', '2020-12-31 08:24:40'),
(359, 180, 'N50', 'N50', NULL, 'ru', 'N50', 'N50', '2020-12-31 08:25:02', '2020-12-31 08:25:02'),
(360, 180, 'N50', 'N50', NULL, 'ua', 'N50', 'N50', '2020-12-31 08:25:02', '2020-12-31 08:25:02'),
(361, 181, 'N48', 'N48', '<p>N48</p>', 'ru', 'N48', 'N48', '2020-12-31 08:25:22', '2020-12-31 08:25:29'),
(362, 181, 'N48', 'N48', '<p>N48</p>', 'ua', 'N48', 'N48', '2020-12-31 08:25:22', '2020-12-31 08:25:29'),
(363, 182, 'N45', 'N45', '<p>N45</p>', 'ru', 'N45', 'N45', '2020-12-31 08:25:52', '2020-12-31 08:25:52'),
(364, 182, 'N45', 'N45', '<p>N45</p>', 'ua', 'N45', 'N45', '2020-12-31 08:25:52', '2020-12-31 08:25:52'),
(365, 183, 'N42', 'N42', NULL, 'ru', 'N42', 'N42', '2020-12-31 08:27:36', '2020-12-31 08:27:36'),
(366, 183, 'N42', 'N42', NULL, 'ua', 'N42', 'N42', '2020-12-31 08:27:36', '2020-12-31 08:27:36'),
(367, 184, 'N40', 'N40', '<p>N40</p>', 'ru', 'N40', 'N40', '2020-12-31 08:28:00', '2020-12-31 08:28:00'),
(368, 184, 'N40', 'N40', '<p>N40</p>', 'ua', 'N40', 'N40', '2020-12-31 08:28:00', '2020-12-31 08:28:00'),
(369, 185, 'N38', 'N38', '<p>N38</p>', 'ru', 'N38', 'N38', '2020-12-31 08:28:14', '2020-12-31 08:28:14'),
(370, 185, 'N38', 'N38', '<p>N38</p>', 'ua', 'N38', 'N38', '2020-12-31 08:28:14', '2020-12-31 08:28:14'),
(371, 186, 'N35', 'N35', NULL, 'ru', 'N35', 'N35', '2020-12-31 08:28:30', '2020-12-31 08:28:30'),
(372, 186, 'N35', 'N35', NULL, 'ua', 'N35', 'N35', '2020-12-31 08:28:30', '2020-12-31 08:28:30'),
(373, 187, 'Магнитный винил', 'Магнитный винил', '<p>Магнитный винил</p>', 'ru', 'Магнитный винил', 'Магнитный винил', '2021-01-04 08:53:25', '2021-01-04 08:53:25'),
(374, 187, 'Магнітний вініл', 'Магнітний вініл', '<p>Магнітний вініл</p>', 'ua', 'Магнітний вініл', 'Магнітний вініл', '2021-01-04 08:53:25', '2021-01-04 08:53:25');
--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `attribute_lists`
--
ALTER TABLE `attribute_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_lists_attribute_id_foreign` (`attribute_id`);

--
-- Индексы таблицы `attr_collections`
--
ALTER TABLE `attr_collections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attr_collections_attribute_list_id_foreign` (`attribute_list_id`),
  ADD KEY `attr_collections_attr_in_product_id_foreign` (`attr_in_product_id`);

--
-- Индексы таблицы `attr_in_products`
--
ALTER TABLE `attr_in_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attr_in_products_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Индексы таблицы `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collections_categories_id_foreign` (`categories_id`);

--
-- Индексы таблицы `currency_lists`
--
ALTER TABLE `currency_lists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `currency_lists_code_unique` (`code`);

--
-- Индексы таблицы `currency_values`
--
ALTER TABLE `currency_values`
  ADD PRIMARY KEY (`id`);


-- Индексы таблицы `filters_categories`
--
ALTER TABLE `filters_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filters_categories_trans_categories_id_foreign` (`trans_categories_id`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_categories_id_foreign` (`categories_id`);

--
-- Индексы таблицы `groups_in_collects`
--
ALTER TABLE `groups_in_collects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_in_collects_subs_id_foreign` (`subs_id`),
  ADD KEY `groups_in_collects_collections_id_foreign` (`collections_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_categories_id_foreign` (`categories_id`);

--
-- Индексы таблицы `related_products`
--
ALTER TABLE `related_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `related_products_product_id_foreign` (`product_id`),
  ADD KEY `related_products_related_foreign` (`related`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `subs`
--
ALTER TABLE `subs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subs_groups_id_foreign` (`groups_id`);

--
-- Индексы таблицы `subs_in_products`
--
ALTER TABLE `subs_in_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subs_in_products_subs_id_foreign` (`subs_id`),
  ADD KEY `subs_in_products_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `trans_attrs`
--
ALTER TABLE `trans_attrs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trans_attrs_attribute_id_foreign` (`attribute_id`);

--
-- Индексы таблицы `trans_attr_lists`
--
ALTER TABLE `trans_attr_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trans_attr_lists_attribute_list_id_foreign` (`attribute_list_id`);

--
-- Индексы таблицы `trans_attr_products`
--
ALTER TABLE `trans_attr_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trans_attr_products_trans_product_id_foreign` (`trans_product_id`),
  ADD KEY `trans_attr_products_attr_in_product_id_foreign` (`attr_in_product_id`);

--
-- Индексы таблицы `trans_categories`
--
ALTER TABLE `trans_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trans_categories_categories_id_foreign` (`categories_id`);

--
-- Индексы таблицы `trans_collections`
--
ALTER TABLE `trans_collections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trans_collections_collections_id_foreign` (`collections_id`);

--
-- Индексы таблицы `trans_currencies`
--
ALTER TABLE `trans_currencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trans_currencies_currency_list_id_foreign` (`currency_list_id`);

--
-- Индексы таблицы `trans_groups`
--
ALTER TABLE `trans_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trans_groups_groups_id_foreign` (`groups_id`);

--
-- Индексы таблицы `trans_products`
--
ALTER TABLE `trans_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trans_products_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `trans_subs`
--
ALTER TABLE `trans_subs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trans_subs_subs_id_foreign` (`subs_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `attribute_lists`
--
ALTER TABLE `attribute_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `attr_collections`
--
ALTER TABLE `attr_collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1243;

--
-- AUTO_INCREMENT для таблицы `attr_in_products`
--
ALTER TABLE `attr_in_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=536;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `currency_lists`
--
ALTER TABLE `currency_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `currency_values`
--
ALTER TABLE `currency_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `filters_categories`
--
ALTER TABLE `filters_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT для таблицы `groups_in_collects`
--
ALTER TABLE `groups_in_collects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT для таблицы `related_products`
--
ALTER TABLE `related_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT для таблицы `subs`
--
ALTER TABLE `subs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT для таблицы `subs_in_products`
--
ALTER TABLE `subs_in_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1031;

--
-- AUTO_INCREMENT для таблицы `trans_attrs`
--
ALTER TABLE `trans_attrs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `trans_attr_lists`
--
ALTER TABLE `trans_attr_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT для таблицы `trans_attr_products`
--
ALTER TABLE `trans_attr_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT для таблицы `trans_categories`
--
ALTER TABLE `trans_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT для таблицы `trans_collections`
--
ALTER TABLE `trans_collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `trans_currencies`
--
ALTER TABLE `trans_currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `trans_groups`
--
ALTER TABLE `trans_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT для таблицы `trans_products`
--
ALTER TABLE `trans_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=481;

--
-- AUTO_INCREMENT для таблицы `trans_subs`
--
ALTER TABLE `trans_subs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=375;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
