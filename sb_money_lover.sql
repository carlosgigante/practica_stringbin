-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2022 a las 19:37:32
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sb_money_lover`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `id_banco` bigint(20) UNSIGNED NOT NULL,
  `nombre_banco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id_banco`, `nombre_banco`, `created_at`, `updated_at`) VALUES
(1, 'Banco de Venezuela', NULL, NULL),
(2, 'Banco Mercantil', NULL, NULL),
(3, 'BBVA Provincial', NULL, NULL),
(4, 'Banco Bicentenario', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` bigint(20) UNSIGNED NOT NULL,
  `nombre_categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`, `created_at`, `updated_at`) VALUES
(1, 'Electrodomésticos', NULL, NULL),
(2, 'Alimentos', NULL, NULL),
(3, 'Entretenimiento', NULL, NULL),
(4, 'Medicina/Consultas médicas', NULL, NULL),
(5, 'Vehículos/Transporte', NULL, NULL),
(6, 'Otros', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentabancos`
--

CREATE TABLE `cuentabancos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_banco` bigint(20) UNSIGNED NOT NULL,
  `tipo_cuenta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cuentabancos`
--

INSERT INTO `cuentabancos` (`id`, `id_user`, `id_banco`, `tipo_cuenta`, `saldo`, `created_at`, `updated_at`) VALUES
(9, 1, 4, '0', 456456.00, NULL, '2022-03-16 18:52:27'),
(10, 1, 1, 'Corriente', 456456.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_roles', 1),
(2, '2014_10_12_000001_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_03_11_224644_bancos', 1),
(7, '2022_03_11_224956_categoria', 1),
(8, '2022_03_11_225147_cuentabancos', 1),
(9, '2022_03_11_225206_transaccions', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_roles` bigint(20) UNSIGNED NOT NULL,
  `nombre_rol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_roles`, `nombre_rol`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Usuario', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccions`
--

CREATE TABLE `transaccions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_cuenta` bigint(20) UNSIGNED NOT NULL,
  `id_categoria` bigint(20) UNSIGNED NOT NULL,
  `monto` double(8,2) NOT NULL,
  `fecha` date NOT NULL,
  `tipo_transaccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_roles` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_nacimiento` date NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `id_roles`, `name`, `apellido`, `f_nacimiento`, `telefono`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 'Athina', 'Gómez', '1997-05-28', '04121889219', 'athygmez@gmail.com', NULL, '$2y$10$PQSpRXVfniDum6oAdtYZXui/Os/HqyI5/mrQpGcqgWaNA8Ah8rgzu', NULL, '2022-03-15 19:56:49', '2022-03-15 19:56:49'),
(2, 2, 'Carlos', 'Gigante', '1994-12-23', '04121889219', 'carlosgigante11@gmail.com', NULL, '$2y$10$uIRoFypv1UOWg7fAy0AOKu9plUtLDUe4fCNtS1RxYJDWCBQj9DU1e', NULL, '2022-03-15 20:03:48', '2022-03-15 20:03:48');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_bancos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_bancos` (
`nombreBancuent` text
,`id` bigint(20) unsigned
,`id_user` bigint(20) unsigned
,`id_banco` bigint(20) unsigned
,`saldo` double(8,2)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_transaccions`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_transaccions` (
`id_transaccion` bigint(20) unsigned
,`nombre_banco` varchar(255)
,`tipo_cuenta` varchar(255)
,`nombre_categoria` varchar(255)
,`monto` double(8,2)
,`fecha` date
,`tipo_transaccion` varchar(255)
,`nota` varchar(255)
,`id_user` bigint(20) unsigned
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_bancos`
--
DROP TABLE IF EXISTS `vista_bancos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_bancos`  AS SELECT concat(`bancos`.`nombre_banco`,' - ',`cuentabancos`.`tipo_cuenta`) AS `nombreBancuent`, `cuentabancos`.`id` AS `id`, `cuentabancos`.`id_user` AS `id_user`, `cuentabancos`.`id_banco` AS `id_banco`, `cuentabancos`.`saldo` AS `saldo` FROM (`cuentabancos` join `bancos`) WHERE `cuentabancos`.`id_banco` = `bancos`.`id_banco` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_transaccions`
--
DROP TABLE IF EXISTS `vista_transaccions`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_transaccions`  AS SELECT `transaccions`.`id` AS `id_transaccion`, `bancos`.`nombre_banco` AS `nombre_banco`, `cuentabancos`.`tipo_cuenta` AS `tipo_cuenta`, `categoria`.`nombre_categoria` AS `nombre_categoria`, `transaccions`.`monto` AS `monto`, `transaccions`.`fecha` AS `fecha`, `transaccions`.`tipo_transaccion` AS `tipo_transaccion`, `transaccions`.`nota` AS `nota`, `cuentabancos`.`id_user` AS `id_user` FROM (((`transaccions` join `bancos`) join `categoria`) join `cuentabancos`) WHERE `transaccions`.`id_cuenta` = `cuentabancos`.`id` AND `cuentabancos`.`id_banco` = `bancos`.`id_banco` AND `transaccions`.`id_categoria` = `categoria`.`id_categoria` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`id_banco`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cuentabancos`
--
ALTER TABLE `cuentabancos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cuentabancos_id_user_foreign` (`id_user`),
  ADD KEY `cuentabancos_id_banco_foreign` (`id_banco`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Indices de la tabla `transaccions`
--
ALTER TABLE `transaccions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaccions_id_cuenta_foreign` (`id_cuenta`),
  ADD KEY `transaccions_id_categoria_foreign` (`id_categoria`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_roles_foreign` (`id_roles`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id_banco` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cuentabancos`
--
ALTER TABLE `cuentabancos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `transaccions`
--
ALTER TABLE `transaccions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuentabancos`
--
ALTER TABLE `cuentabancos`
  ADD CONSTRAINT `cuentabancos_id_banco_foreign` FOREIGN KEY (`id_banco`) REFERENCES `bancos` (`id_banco`),
  ADD CONSTRAINT `cuentabancos_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `transaccions`
--
ALTER TABLE `transaccions`
  ADD CONSTRAINT `transaccions_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `transaccions_id_cuenta_foreign` FOREIGN KEY (`id_cuenta`) REFERENCES `cuentabancos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_roles_foreign` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id_roles`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
