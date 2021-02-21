-- BEGIN TABLE categories
-- Inserting 25 rows into categories
-- Insert batch #1
INSERT INTO categories (id, slug, file, status, is_root, created_at, updated_at, related, template) VALUES
(1, 'neodimovye-magnity', 'photos/2/category/3.jpg', 1, 0, '2020-11-27 21:32:12', '2020-12-07 19:45:58', 'store', 'catalog'),
(20, 'vse-tovary', 'photos/2/category/3.jpg', 1, 1, '2020-12-07 19:47:17', '2020-12-16 13:20:39', 'store', 'catalog'),
(21, 'feritovye-magnity', 'photos/2/category/DSC_7971-1.jpg', 1, 0, '2020-12-08 07:49:54', '2020-12-08 07:51:14', 'store', 'catalog'),
(22, 'poiskovye-magnity', 'photos/2/category/двустор мп с защитой.jpg', 1, 0, '2020-12-17 10:43:43', '2020-12-17 10:43:43', 'store', 'catalog'),
(23, 'magnit-dlya-sumki', 'photos/2/category/magnetic-button-250x250.jpg', 1, 0, '2020-12-24 06:04:35', '2020-12-24 06:04:35', 'store', 'catalog'),
(24, 'magnit-zamok', 'photos/2/category/bfc91371493cc27157e73a6cf7fb0dbe.jpg', 1, 0, '2020-12-24 07:48:04', '2020-12-24 07:48:04', 'store', 'catalog'),
(25, 'magnity-derzhateli', 'photos/2/category/7b6c1d02f14e187001fb308415580923.png', 1, 0, '2020-12-28 06:55:10', '2020-12-28 06:55:10', 'store', 'catalog'),
(26, 'magnity-dlya-svarki', 'photos/2/category/IMG_20190128_101455.jpg', 1, 0, '2020-12-28 07:02:00', '2020-12-28 07:02:00', 'store', 'catalog'),
(27, 'magnity-igrushki-suveniry', 'photos/2/category/201221185_images_20202117041.jpg', 1, 0, '2020-12-28 07:09:19', '2020-12-28 07:09:19', 'store', 'catalog'),
(28, 'magnity-gibkie', 'photos/2/category/cc70c483c26fc14910647a5d39415005.jpg', 1, 0, '2020-12-28 07:15:10', '2020-12-28 07:15:10', 'store', 'catalog'),
(29, 'razmagnichivatel-teslametr', 'photos/2/category/razmagnichivatel-dlya-chasov-kupit-z.jpg', 1, 0, '2020-12-28 07:17:46', '2020-12-28 07:17:46', 'store', 'catalog'),
(30, 'magnit-segment-magnit-sektor', 'photos/2/category/magnit-feritovij-nabor-segment-sd-55-31-0-7-na-lichilnik-vodi-kupiti-ukraina-z.jpg', 1, 0, '2020-12-28 07:28:10', '2020-12-28 07:28:10', 'store', 'catalog'),
(31, 'magnitnye-aktivatory', 'photos/2/category/изображение_viber_2020-03-11_15-45-33.jpg', 1, 0, '2020-12-28 07:57:26', '2020-12-28 07:57:26', 'store', 'catalog'),
(32, 'izgotovlenie-vinilovyh-magnitov-pod-zakaz', 'photos/2/category/1a45a9fa14d9c0278cbf011fab827018.jpg', 1, 0, '2020-12-28 08:13:49', '2020-12-28 08:13:49', 'store', 'catalog'),
(33, 'magnity-dlya-eksperimentov-i-ucheby', 'photos/2/category/екран-візуалізатор-магнітного-поля-150-мм-z.jpg', 1, 0, '2020-12-28 08:29:21', '2020-12-28 08:29:21', 'store', 'catalog'),
(34, 'magnit-semnik', 'photos/2/category/магнит для снятия антикражек, магніт для биперів, магнит для вещей, магніт для речей, магніт для одягу.jpg', 1, 0, '2020-12-28 08:32:16', '2020-12-28 09:25:53', 'store', 'catalog'),
(35, 'magnitnye-braslety', 'photos/2/category/b44-bio-magnitnyj-braslet-kupit-z.jpg', 1, 0, '2020-12-28 09:31:16', '2020-12-28 09:31:16', 'store', 'catalog'),
(36, 'prodazha-magnitov-s-defektami', 'photos/2/category/c746bb0873d620ca5eb5e08810fe00bd.jpg', 1, 0, '2020-12-28 09:38:35', '2020-12-28 09:38:35', 'store', 'catalog'),
(37, 'magnity-dlya-doski', 'photos/2/category/magnity-peshka-dlya-magnito-markernykh-dosok-z.jpg', 1, 0, '2020-12-28 09:48:41', '2020-12-28 09:48:41', 'store', 'catalog'),
(38, 'aksessuary-dlya-mobilnyh-telefonov', 'photos/2/category/109.png', 1, 0, '2020-12-28 09:50:47', '2020-12-28 09:50:47', 'store', 'catalog'),
(39, 'dlya-magnitov', 'photos/2/collection/kleiy-dlya-magnitov.jpg', 1, 0, '2020-12-30 10:14:06', '2020-12-30 10:14:06', 'store', 'catalog'),
(40, 'o-magnitah', 'photos/2/articles/фото-4.jpg', 1, 0, '2021-01-21 00:29:36', '2021-01-27 15:33:40', 'content', 'catalog'),
(41, 'izgotovlenie-magnitnyh-bejdzhej', 'photos/2/collection/25032017l9h5f2rfcopy.jpg', 1, 0, '2021-01-26 15:27:06', '2021-01-26 15:27:06', 'services', 'catalog'),
(42, 'test', 'photos/2/category/1a45a9fa14d9c0278cbf011fab827018.jpg', 1, 0, '2021-02-03 18:10:43', '2021-02-03 18:10:43', 'store', 'catalog'),
(43, 'aktsii', 'photos/2/collection/yWkAgiV-680x449.jpg', 1, 0, '2021-02-14 22:50:36', '2021-02-14 22:50:36', 'content', 'tape');

-- END TABLE categories
