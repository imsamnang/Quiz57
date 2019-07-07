-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.23 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for quiz_laravel_57
DROP DATABASE IF EXISTS `quiz_laravel_57`;
CREATE DATABASE IF NOT EXISTS `quiz_laravel_57` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `quiz_laravel_57`;

-- Dumping structure for table quiz_laravel_57.answers
DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(10) unsigned NOT NULL,
  `option_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `answers_question_id_foreign` (`question_id`),
  KEY `answers_option_id_foreign` (`option_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quiz_laravel_57.answers: 0 rows
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;

-- Dumping structure for table quiz_laravel_57.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quiz_laravel_57.migrations: 8 rows
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_07_04_085631_create_subject_quizzes_table', 1),
	(4, '2019_07_04_085759_create_questions_table', 1),
	(5, '2019_07_04_085848_create_quiz_results_table', 1),
	(6, '2019_07_04_085938_create_question_subject_quiz_table', 1),
	(7, '2019_07_04_090231_create_options_table', 1),
	(8, '2019_07_04_090232_create_answers_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table quiz_laravel_57.options
DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(10) unsigned NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `options_question_id_foreign` (`question_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quiz_laravel_57.options: 0 rows
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
/*!40000 ALTER TABLE `options` ENABLE KEYS */;

-- Dumping structure for table quiz_laravel_57.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quiz_laravel_57.password_resets: 0 rows
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table quiz_laravel_57.provinces
DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_kh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_kh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quiz_laravel_57.provinces: ~25 rows (approximately)
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
INSERT INTO `provinces` (`id`, `name_en`, `slug_en`, `name_kh`, `slug_kh`, `created_at`, `updated_at`) VALUES
	(1, 'Phnom Penh', 'phnom-penh', 'ភ្នំពេញ', '', NULL, NULL),
	(2, 'Preah Sihanouk', 'preah-sihanouk', 'ព្រះសីហនុ', '', NULL, NULL),
	(3, 'Kampong Cham', 'kampong-cham', 'កំពង់ចាម', '', NULL, NULL),
	(4, 'Siem Reap', 'siem-reap', 'សៀមរាប', '', NULL, NULL),
	(5, 'Battambang', 'Battambang', 'បាត់ដំបង', '', NULL, NULL),
	(6, 'Kandal', 'Kandal', 'កណ្តាល', '', NULL, NULL),
	(7, 'Banteay Meanchey', 'Banteay-Meanchey', 'បន្ទាយមានជ័យ', '', NULL, NULL),
	(8, 'Kampong Chhnang', 'Kampong-Chhnang', 'កំពង់ឆ្នាំង', '', NULL, NULL),
	(9, 'Kampong Speu', 'Kampong-Speu', 'កំពង់ស្ពឺ', '', NULL, NULL),
	(10, 'Kampong Thom', 'Kampong-Thom', 'កំពង់ធំ', '', NULL, NULL),
	(11, 'Kampot', 'Kampot', 'កំពត', '', NULL, NULL),
	(12, 'Kep', 'Kep', 'កែប', '', NULL, NULL),
	(13, 'Koh Kong', 'Koh-Kong', 'កោះកុង', '', NULL, NULL),
	(14, 'Kratie', 'Kratie', 'ក្រចេះ', '', NULL, NULL),
	(15, 'Mondulkiri', 'Mondulkiri', 'មណ្ឌលគិរី', '', NULL, NULL),
	(16, 'Oddar Meanchey', 'Oddar-Meanchey', 'ឧត្តរមានជ័យ', '', NULL, NULL),
	(17, 'Pailin', 'Pailin', 'ប៉ៃលិន', '', NULL, NULL),
	(18, 'Preah Vihear', 'Preah-Vihear', 'ព្រះវិហារ', '', NULL, NULL),
	(19, 'Prey Veng', 'Prey-Veng', 'ព្រៃវែង', '', NULL, NULL),
	(20, 'Pursat', 'Pursat', 'ពោធ៌សាត់', '', NULL, NULL),
	(21, 'Ratanakiri', 'Ratanakiri', 'រតនគីរី', '', NULL, NULL),
	(22, 'Stung Treng', 'Stung-Treng', 'ស្ទឹងត្រែង', '', NULL, NULL),
	(23, 'Svay Rieng', 'Svay-Rieng', 'ស្វាយរៀង', '', NULL, NULL),
	(24, 'Takeo', 'Takeo', 'តាកែវ', '', NULL, NULL),
	(25, 'Tboung Khmum', 'Tboung-Khmum', 'ត្បូងឃ្មុំ', '', NULL, NULL);
/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;

-- Dumping structure for table quiz_laravel_57.questions
DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quiz_laravel_57.questions: 0 rows
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;

-- Dumping structure for table quiz_laravel_57.question_subject_quiz
DROP TABLE IF EXISTS `question_subject_quiz`;
CREATE TABLE IF NOT EXISTS `question_subject_quiz` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(10) unsigned NOT NULL,
  `subject_quiz_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_subject_quiz_question_id_foreign` (`question_id`),
  KEY `question_subject_quiz_subject_quiz_id_foreign` (`subject_quiz_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quiz_laravel_57.question_subject_quiz: 0 rows
/*!40000 ALTER TABLE `question_subject_quiz` DISABLE KEYS */;
/*!40000 ALTER TABLE `question_subject_quiz` ENABLE KEYS */;

-- Dumping structure for table quiz_laravel_57.quiz_results
DROP TABLE IF EXISTS `quiz_results`;
CREATE TABLE IF NOT EXISTS `quiz_results` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `subject_quiz_id` int(10) unsigned NOT NULL,
  `total_attempt` int(11) NOT NULL,
  `correct_answers` int(11) NOT NULL,
  `percentage` double(8,2) NOT NULL,
  `passed` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quiz_results_user_id_foreign` (`user_id`),
  KEY `quiz_results_subject_quiz_id_foreign` (`subject_quiz_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quiz_laravel_57.quiz_results: 0 rows
/*!40000 ALTER TABLE `quiz_results` DISABLE KEYS */;
/*!40000 ALTER TABLE `quiz_results` ENABLE KEYS */;

-- Dumping structure for table quiz_laravel_57.subject_quizzes
DROP TABLE IF EXISTS `subject_quizzes`;
CREATE TABLE IF NOT EXISTS `subject_quizzes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_attempts` int(11) NOT NULL,
  `pass_percentage` double(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quiz_laravel_57.subject_quizzes: 0 rows
/*!40000 ALTER TABLE `subject_quizzes` DISABLE KEYS */;
/*!40000 ALTER TABLE `subject_quizzes` ENABLE KEYS */;

-- Dumping structure for table quiz_laravel_57.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table quiz_laravel_57.users: 0 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'admin@gmail.com', NULL, '$2y$10$inijR9.sWSvAcQZEWNAvxONqhP8YWjDH6TKhBowAy16OcAla4sWrq', NULL, '2019-07-06 04:19:42', '2019-07-06 04:19:42');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
