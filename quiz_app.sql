-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 11 Agu 2021 pada 11.44
-- Versi server: 10.6.3-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Administrator', 'superadmin', NULL, '$2y$10$PdVLHoqi0tAgX08zcRndoeTiwPFp684WJq4PeBOPXqP97gDnIN2pO', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `option` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `answers`
--

INSERT INTO `answers` (`id`, `quiz_id`, `question_id`, `user_id`, `option`, `created_at`, `updated_at`) VALUES
(28, 6, 6, 10, 'D', '2021-08-11 04:42:03', '2021-08-11 04:42:03'),
(29, 6, 7, 10, NULL, '2021-08-11 04:42:03', '2021-08-11 04:42:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_18_101236_create_admins_table', 1),
(7, '2021_07_18_162221_create_quizzes_table', 2),
(8, '2021_07_18_163024_create_questions_table', 2),
(10, '2021_07_18_163522_create_quiz_attempts_table', 3),
(11, '2021_07_18_163853_create_quiz_results_table', 4),
(12, '2022_05_19_203070_create_answers_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL,
  `question_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_a` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_b` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_c` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_d` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `number`, `question_title`, `option_a`, `option_b`, `option_c`, `option_d`, `key`, `score`, `created_at`, `updated_at`) VALUES
(2, 3, 1, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis sed laboriosam itaque, voluptates fugiat consequuntur doloremque dignissimos incidunt saepe vitae.<br></p>', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br></p>', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br></p>', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br></p>', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br></p>', 'C', 10, '2021-07-19 03:34:51', '2021-07-19 03:54:00'),
(3, 3, 2, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis sed laboriosam itaque, voluptates fugiat consequuntur doloremque dignissimos incidunt saepe vitae.<br></p>', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.&nbsp;<br></p>', '<p><span style=\"font-size: 14.4px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit.&nbsp;</span><br></p>', '<p><span style=\"font-size: 14.4px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit.&nbsp;</span><br></p>', '<p><span style=\"font-size: 14.4px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit.&nbsp;</span><br></p>', 'C', 10, '2021-07-19 03:38:40', '2021-07-19 03:38:40'),
(4, 3, 2, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis sed laboriosam itaque, voluptates fugiat consequuntur doloremque dignissimos incidunt saepe vitae.<br></p>', '<p>Pilihan A</p>', '<p><span style=\"font-size: 14.4px;\">Pilihan B</span><br></p>', '<p><span style=\"font-size: 14.4px;\">Pilihan C</span><br></p>', '<p><span style=\"font-size: 14.4px;\">Pilihan D</span><br></p>', 'A', 10, '2021-07-19 04:04:03', '2021-07-19 04:04:03'),
(6, 6, 0, '<p>Haidsaofs?</p>', '<p>dhsaofsa</p>', '<p>odsauir</p>', '<p>ureoau</p>', '<p>jdiasofa</p>', 'D', 20, '2021-08-11 04:00:44', '2021-08-11 04:00:44'),
(7, 6, 1, '<p>fiysarea?</p>', '<p>dpwirpwq</p>', '<p>oreopur</p>', '<p>osjfa</p>', '<p>jfihfa</p>', 'B', 20, '2021-08-11 04:01:14', '2021-08-11 04:01:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_question` int(11) NOT NULL,
  `access_type` tinyint(1) NOT NULL DEFAULT 0,
  `due_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `instructions`, `number_of_question`, `access_type`, `due_date`, `created_at`, `updated_at`) VALUES
(3, 'Judul Quiz Kedua', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit maiores tempora assumenda sit omnis maxime voluptas quo incidunt quibusdam, officia dicta! Sequi officiis veritatis inventore hic animi eligendi harum minima!<br></p>', 3, 1, '2021-08-10 19:56:58', '2021-07-19 03:04:00', '2021-07-19 04:12:44'),
(6, 'Test Quiz', '<p>Kerjakan aja mah, ribed amat</p>', 2, 1, '2021-08-11 11:40:00', '2021-08-11 03:59:35', '2021-08-11 04:08:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_attempts`
--

CREATE TABLE `quiz_attempts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `attempt_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `quiz_attempts`
--

INSERT INTO `quiz_attempts` (`id`, `quiz_id`, `user_id`, `attempt_at`, `created_at`, `updated_at`) VALUES
(130, 6, 10, '2021-08-11 11:39:37', '2021-08-11 04:39:37', '2021-08-11 04:39:37'),
(131, 6, 10, '2021-08-11 11:40:08', '2021-08-11 04:40:08', '2021-08-11 04:40:08'),
(132, 6, 10, '2021-08-11 11:40:19', '2021-08-11 04:40:19', '2021-08-11 04:40:19'),
(133, 6, 10, '2021-08-11 11:40:31', '2021-08-11 04:40:31', '2021-08-11 04:40:31'),
(134, 6, 10, '2021-08-11 11:40:43', '2021-08-11 04:40:43', '2021-08-11 04:40:43'),
(135, 6, 10, '2021-08-11 11:41:01', '2021-08-11 04:41:01', '2021-08-11 04:41:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `point` double NOT NULL,
  `correct_answer` int(11) NOT NULL,
  `max_points` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `quiz_results`
--

INSERT INTO `quiz_results` (`id`, `quiz_id`, `user_id`, `point`, `correct_answer`, `max_points`, `created_at`, `updated_at`) VALUES
(8, 6, 10, 0, 0, 40, '2021-08-11 04:38:44', '2021-08-11 04:38:44'),
(9, 6, 10, 20, 1, 40, '2021-08-11 04:42:03', '2021-08-11 04:42:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Muhammad Renaldy Ramadhan', 'mrenaldyr', NULL, '$2y$10$/hJoyJeDpupAH/oEur9/8uw8Tc2SY9.jAyeZlaHSxEQu6af0yxGya', NULL, '2021-07-18 08:02:03', '2021-07-18 08:02:03'),
(3, 'Users01', 'user01', NULL, '$2y$10$.XSz8GGikY8LAxXzLw85W.Fu94RTGWRYcQf4dmuQja/qkHgDwaESq', NULL, '2021-07-19 12:03:26', '2021-07-19 12:03:26'),
(10, 'test', 'tes', NULL, '$2y$10$.wTqqgno1/SNrvnSEBcazu0VpUlMf8/LdTB34yjKb0x7sLaICllBW', NULL, '2021-08-09 14:19:16', '2021-08-11 03:43:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_quiz_id_foreign` (`quiz_id`),
  ADD KEY `answers_question_id_foreign` (`question_id`),
  ADD KEY `answers_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_quiz_id_foreign` (`quiz_id`);

--
-- Indeks untuk tabel `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_attempts_quiz_id_foreign` (`quiz_id`),
  ADD KEY `quiz_attempts_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_results_quiz_id_foreign` (`quiz_id`),
  ADD KEY `quiz_results_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT untuk tabel `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  ADD CONSTRAINT `quiz_attempts_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_attempts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD CONSTRAINT `quiz_results_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
