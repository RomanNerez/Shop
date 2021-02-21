-- BEGIN TABLE users
-- Inserting 3 rows into users
-- Insert batch #1
INSERT INTO users (id, name, email, fullname, email_verified_at, role, password, remember_token, created_at, updated_at) VALUES
(1, 'admin', 'admin@admin.com', 'Admin', '2021-01-09 00:35:37', 'admin', '$2y$10$74u6TJHCBt7paJe8JJVhHO.WuE1yhuT1V847dZk0lSyT8oA/M4RPa', 'NaUnQu6FJx', '2021-01-09 00:35:37', '2021-01-09 00:35:37'),
(2, 'beta.test', 'beta@magniton.app', 'Первый Пользователь', '2021-01-09 00:35:37', 'admin', '$2y$10$rnujxUXqnv5HiZdoA0MRJOCLv1EJJD5Y55KEBTeg9X8h.CZO.1LYK', 'hBmV1vObjAb93Hm7MMUU6iw1n9RKYXciuSTTXPNBnJK7FdX5f89d5471OhoP', NULL, NULL),
(10, NULL, 'bogdan.pirozhok@gmail.com', 'Богдан Пирожок', NULL, 'user', '$2y$10$79Hr55MWpQMIjklUDQ.IG.KPGqJUB1NAb8Y1L1GCeCJZELbU3ih4u', NULL, '2021-01-09 01:38:46', '2021-01-09 01:38:46');
COMMIT;

-- END TABLE users
