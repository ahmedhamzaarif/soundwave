-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 10, 2022 at 07:28 PM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sound`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE IF NOT EXISTS `albums` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `album_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `album_name`, `created_at`, `updated_at`) VALUES
(2, 'Coke Studio', NULL, NULL),
(3, 'National Songs', NULL, NULL),
(4, 'Unknown Album', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

DROP TABLE IF EXISTS `artists`;
CREATE TABLE IF NOT EXISTS `artists` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `artist_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `artist_name`, `created_at`, `updated_at`) VALUES
(2, 'Unknown Artist', NULL, NULL),
(4, 'Ali Zafar', NULL, NULL),
(5, 'Abida Parween', NULL, NULL),
(6, 'Talha Younus', NULL, NULL),
(7, 'Rahat Fateh Ali Khan', NULL, NULL),
(8, 'Nusret Fateh Ali Khan', NULL, NULL),
(9, 'Shae Gill', NULL, NULL),
(10, 'Ali Sethi', NULL, NULL),
(11, 'Naseebo Lal', NULL, NULL),
(12, 'Asim Azhar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre_name`, `created_at`, `updated_at`) VALUES
(3, 'Unknown Genre', NULL, NULL),
(4, 'Rock', NULL, NULL),
(5, 'Jazz', NULL, NULL),
(6, 'Classical', NULL, NULL),
(7, 'Folk Music', NULL, NULL),
(8, 'Soul Music', NULL, NULL),
(9, 'Heavy Metal', NULL, NULL),
(10, 'Hip Hop', NULL, NULL),
(11, 'Pop Rock', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `language_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language_name`, `created_at`, `updated_at`) VALUES
(2, 'Unknown Language', NULL, NULL),
(3, 'Sindhi', NULL, NULL),
(4, 'Urdu', NULL, NULL),
(5, 'Punjabi', NULL, NULL),
(6, 'Balochi', NULL, NULL),
(7, 'Pashto', NULL, NULL),
(8, 'Saraiki', NULL, NULL),
(9, 'English', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_07_23_154701_create_sessions_table', 1),
(7, '2022_07_24_094351_create_genres_table', 1),
(8, '2022_07_24_112439_create_artists_table', 1),
(9, '2022_07_24_142206_create_albums_table', 1),
(10, '2022_07_24_162101_create_languages_table', 1),
(11, '2022_07_25_131607_create_songs_table', 1),
(12, '2022_07_25_192251_create_videos_table', 1),
(13, '2022_07_26_153819_create_song_reviews_table', 1),
(14, '2022_07_26_191548_create_video_reviews_table', 1),
(15, '2022_08_03_065235_create_s_ratings_table', 2),
(16, '2022_08_03_065315_create_v_ratings_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('aOCUH5KhnnWTEBzaFvOcZbo8Vo03HzfPZQSxUQCs', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOGxyZ3JYU0tiZEk2SzV3TWJ5cE5tdEpiZmh6NVByM3RlZURzVTdUWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5hZ2VWaWRlb3MiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1660159531);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

DROP TABLE IF EXISTS `songs`;
CREATE TABLE IF NOT EXISTS `songs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `artist_id` bigint(20) UNSIGNED NOT NULL,
  `album_id` bigint(20) UNSIGNED NOT NULL,
  `lang_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `songs_genre_id_foreign` (`genre_id`),
  KEY `songs_artist_id_foreign` (`artist_id`),
  KEY `songs_album_id_foreign` (`album_id`),
  KEY `songs_lang_id_foreign` (`lang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `description`, `image`, `file`, `year`, `genre_id`, `artist_id`, `album_id`, `lang_id`, `created_at`, `updated_at`) VALUES
(3, 'Pasoori', 'Pasoori By Shae Gill & Ali Sethi', '1659590316.jpg', '1659549752.mp3', 2022, 3, 9, 2, 4, NULL, NULL),
(4, 'Pakistan Zindabad', 'Pakistan Zindabad Song', '1659856688.jpg', '1659550217.mp3', 2018, 3, 2, 3, 4, NULL, NULL),
(5, 'Habibi', 'Habibi by Asim Azhar', '1659589950.jpg', '1659550416.mp3', 2022, 3, 12, 4, 4, NULL, NULL),
(6, 'Tu Jhoom', 'Tu Jhoom by Abida Parveen & Naseebo Lal', '1659589807.jpg', '1659550609.mp3', 2021, 3, 5, 2, 4, NULL, NULL),
(7, 'GulPanra', 'Allay Munja Mar Wara Song', '1659589695.jpg', '1659550890.mp3', 2021, 3, 4, 4, 3, NULL, NULL),
(9, 'Larsha Pekhawar', 'Larsha Pekhawar by Ali Zafar', '1659856866.jpg', '1659856866.mp3', 2021, 3, 4, 2, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `song_reviews`
--

DROP TABLE IF EXISTS `song_reviews`;
CREATE TABLE IF NOT EXISTS `song_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `song_id` bigint(20) UNSIGNED NOT NULL,
  `review` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `song_reviews_user_id_foreign` (`user_id`),
  KEY `song_reviews_song_id_foreign` (`song_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `song_reviews`
--

INSERT INTO `song_reviews` (`id`, `user_id`, `song_id`, `review`, `created_at`, `updated_at`) VALUES
(3, 7, 3, 'My fav singer Abida Parveen', NULL, NULL),
(4, 5, 5, 'F@v !!!', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `s_ratings`
--

DROP TABLE IF EXISTS `s_ratings`;
CREATE TABLE IF NOT EXISTS `s_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `song_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `s_ratings_user_id_foreign` (`user_id`),
  KEY `s_ratings_song_id_foreign` (`song_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `s_ratings`
--

INSERT INTO `s_ratings` (`id`, `user_id`, `song_id`, `rating`, `created_at`, `updated_at`) VALUES
(2, 5, 4, 5, NULL, NULL),
(9, 6, 3, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `role`, `address`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '032123456789', 'admin', 'khi', 'admin@soundwave.com', NULL, '$2y$10$i2MNYhS9jA2/Z94CughWvewrGJsRrl0MExslHE/kGZuEzescXeVQm', NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-31 07:11:09', '2022-08-03 13:05:39'),
(5, 'Saqib', '3123456789', 'user', 'Khi', 'saqib@gmail.com', NULL, 'user1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Talha Sharif', '3123456789', 'user', 'Lhr', 'talha.sharif@gmail.com', NULL, 'user1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Hassan Elahi', '3123456789', 'user', 'Khi', 'hassan.elahi@gmail.com', NULL, '$2y$10$AV92olqZfmORli.ZdSX81ehuJTcHcoIklYPAMKmsk4V94o/bs0jmS', NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-03 23:32:17', '2022-08-03 23:32:17'),
(8, 'Ahmed Rashid', '3123456789', 'user', 'Khi', 'ahmed.rashid@gmail.com', NULL, 'user123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Ahmed Hamza', '3123456789', 'user', 'Khi', 'ahmed.hamza@gmail.com', NULL, 'user1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'M.Talha', '3123456789', 'user', 'Khi', 'm.talha@gmail.com', NULL, 'user1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `artist_id` bigint(20) UNSIGNED NOT NULL,
  `album_id` bigint(20) UNSIGNED NOT NULL,
  `lang_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `videos_genre_id_foreign` (`genre_id`),
  KEY `videos_artist_id_foreign` (`artist_id`),
  KEY `videos_album_id_foreign` (`album_id`),
  KEY `videos_lang_id_foreign` (`lang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `description`, `image`, `file`, `year`, `genre_id`, `artist_id`, `album_id`, `lang_id`, `created_at`, `updated_at`) VALUES
(2, 'Larsha Pekhawar', 'Larsha Pekhawar by Ali Zafar', '1659551217.jpg', 'https://www.youtube.com/embed/lh6Ltp5Ew9k', 2022, 3, 4, 4, 7, NULL, NULL),
(3, 'Pasoori', 'Pasoori by Ali Sethi & Shane Gill', '1659551326.jpg', 'https://www.youtube.com/embed/5Eqb_-j3FDA', 2022, 3, 9, 2, 4, NULL, NULL),
(4, 'Tu Jhoom', 'Tu Jhoom by Abida Parveen & Naseebo Lal', '1659551450.jpg', 'https://www.youtube.com/embed/7D4vNcK6D38', 2022, 3, 2, 2, 4, NULL, NULL),
(5, 'Habibi', 'Habibi by Asim Azhar', '1659551822.jpg', 'https://www.youtube.com/embed/GQl2mpICqRE', 2022, 3, 2, 4, 4, NULL, NULL),
(6, 'Allay', 'Allay by Ali Zafar', '1659551951.jpg', 'https://www.youtube.com/embed/OmgziQczKfk\n', 2021, 3, 4, 4, 3, NULL, NULL),
(7, 'Pakistan Zindabad', 'Pakistan Zindabad by ISPR', '1659552637.jpg', 'https://www.youtube.com/embed/MjxGwfa5lxw', 2017, 3, 2, 3, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video_reviews`
--

DROP TABLE IF EXISTS `video_reviews`;
CREATE TABLE IF NOT EXISTS `video_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `video_id` bigint(20) UNSIGNED NOT NULL,
  `review` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `video_reviews_user_id_foreign` (`user_id`),
  KEY `video_reviews_video_id_foreign` (`video_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_reviews`
--

INSERT INTO `video_reviews` (`id`, `user_id`, `video_id`, `review`, `created_at`, `updated_at`) VALUES
(2, 5, 7, 'پاکستان زندہ باد', NULL, NULL),
(3, 9, 7, 'پاکستان زندہ باد💚', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `v_ratings`
--

DROP TABLE IF EXISTS `v_ratings`;
CREATE TABLE IF NOT EXISTS `v_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `video_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `v_ratings_user_id_foreign` (`user_id`),
  KEY `v_ratings_video_id_foreign` (`video_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `v_ratings`
--

INSERT INTO `v_ratings` (`id`, `user_id`, `video_id`, `rating`, `created_at`, `updated_at`) VALUES
(2, 5, 5, 2, NULL, NULL),
(4, 6, 2, 5, NULL, NULL),
(5, 8, 3, 5, NULL, NULL),
(6, 9, 5, 2, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `songs_artist_id_foreign` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `songs_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `songs_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `song_reviews`
--
ALTER TABLE `song_reviews`
  ADD CONSTRAINT `song_reviews_song_id_foreign` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `song_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `s_ratings`
--
ALTER TABLE `s_ratings`
  ADD CONSTRAINT `s_ratings_song_id_foreign` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `s_ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `videos_artist_id_foreign` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `videos_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `videos_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `video_reviews`
--
ALTER TABLE `video_reviews`
  ADD CONSTRAINT `video_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `video_reviews_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `v_ratings`
--
ALTER TABLE `v_ratings`
  ADD CONSTRAINT `v_ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `v_ratings_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
