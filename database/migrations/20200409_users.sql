CREATE TABLE `users` (
 `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
 `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 `age` tinyint(3) unsigned NOT NULL,
 `male` tinyint(3) NOT NULL,
 `city` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
 `interests` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
