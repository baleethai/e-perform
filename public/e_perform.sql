-- -------------------------------------------------------------
-- TablePlus 6.1.6(570)
--
-- https://tableplus.com/
--
-- Database: e_perform
-- Generation Time: 2568-03-14 08:43:07.5600
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `academic_types`;
CREATE TABLE `academic_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `academics`;
CREATE TABLE `academics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `academic_type_id` bigint unsigned NOT NULL,
  `cover` text COLLATE utf8mb4_unicode_ci,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `academics_academic_type_id_foreign` (`academic_type_id`),
  CONSTRAINT `academics_academic_type_id_foreign` FOREIGN KEY (`academic_type_id`) REFERENCES `academic_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `album_types`;
CREATE TABLE `album_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `albums`;
CREATE TABLE `albums` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `album_type_id` bigint unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `files` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `albums_album_type_id_foreign` (`album_type_id`),
  CONSTRAINT `albums_album_type_id_foreign` FOREIGN KEY (`album_type_id`) REFERENCES `album_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `summary` longtext COLLATE utf8mb4_unicode_ci,
  `images` longtext COLLATE utf8mb4_unicode_ci,
  `is_visible` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int NOT NULL DEFAULT '0',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `departments_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `document_types`;
CREATE TABLE `document_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `document_type_id` bigint unsigned NOT NULL,
  `personnel_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `files` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `documents_document_type_id_foreign` (`document_type_id`),
  CONSTRAINT `documents_document_type_id_foreign` FOREIGN KEY (`document_type_id`) REFERENCES `document_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `faculties`;
CREATE TABLE `faculties` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=371 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `personnel_academic_services`;
CREATE TABLE `personnel_academic_services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `personnel_id` bigint unsigned NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personnel_academic_services_personnel_id_foreign` (`personnel_id`),
  CONSTRAINT `personnel_academic_services_personnel_id_foreign` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `personnel_academic_works`;
CREATE TABLE `personnel_academic_works` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `personnel_id` bigint unsigned NOT NULL,
  `cover` text COLLATE utf8mb4_unicode_ci,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personnel_academic_works_personnel_id_foreign` (`personnel_id`),
  CONSTRAINT `personnel_academic_works_personnel_id_foreign` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `personnel_awards`;
CREATE TABLE `personnel_awards` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `personnel_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` text COLLATE utf8mb4_unicode_ci,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci,
  `sort` int DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personnel_awards_personnel_id_foreign` (`personnel_id`),
  CONSTRAINT `personnel_awards_personnel_id_foreign` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `personnel_education`;
CREATE TABLE `personnel_education` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `personnel_id` bigint unsigned NOT NULL,
  `personnel_education_level_id` bigint unsigned NOT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `educational_evidence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personnel_education_personnel_id_foreign` (`personnel_id`),
  KEY `personnel_education_personnel_education_level_id_foreign` (`personnel_education_level_id`),
  CONSTRAINT `personnel_education_personnel_education_level_id_foreign` FOREIGN KEY (`personnel_education_level_id`) REFERENCES `personnel_education_levels` (`id`),
  CONSTRAINT `personnel_education_personnel_id_foreign` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `personnel_education_levels`;
CREATE TABLE `personnel_education_levels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `personnel_expertises`;
CREATE TABLE `personnel_expertises` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `personnel_id` bigint unsigned NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personnel_expertises_personnel_id_foreign` (`personnel_id`),
  CONSTRAINT `personnel_expertises_personnel_id_foreign` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `personnel_preservings`;
CREATE TABLE `personnel_preservings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `personnel_id` bigint unsigned NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personnel_preservings_personnel_id_foreign` (`personnel_id`),
  CONSTRAINT `personnel_preservings_personnel_id_foreign` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `personnel_research`;
CREATE TABLE `personnel_research` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `personnel_id` bigint unsigned NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int DEFAULT NULL,
  `published` date DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personnel_research_personnel_id_foreign` (`personnel_id`),
  CONSTRAINT `personnel_research_personnel_id_foreign` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `personnel_teachings`;
CREATE TABLE `personnel_teachings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `personnel_id` bigint unsigned NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int NOT NULL DEFAULT '1',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personnel_teachings_personnel_id_foreign` (`personnel_id`),
  CONSTRAINT `personnel_teachings_personnel_id_foreign` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `personnel_works`;
CREATE TABLE `personnel_works` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `personnel_id` bigint unsigned NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workplace` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_evidence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personnel_works_personnel_id_foreign` (`personnel_id`),
  CONSTRAINT `personnel_works_personnel_id_foreign` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `personnels`;
CREATE TABLE `personnels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `prefix_id` bigint unsigned NOT NULL,
  `position_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pali_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci GENERATED ALWAYS AS (concat(`first_name`,_utf8mb4' ',`last_name`)) VIRTUAL,
  `id_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `work_start_date` date NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `sort` int NOT NULL DEFAULT '0',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personnels_code_unique` (`code`),
  UNIQUE KEY `personnels_email_unique` (`email`),
  UNIQUE KEY `personnels_phone_unique` (`phone`),
  KEY `personnels_prefix_id_foreign` (`prefix_id`),
  KEY `personnels_position_id_foreign` (`position_id`),
  CONSTRAINT `personnels_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  CONSTRAINT `personnels_prefix_id_foreign` FOREIGN KEY (`prefix_id`) REFERENCES `prefixes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `portfolio_academic_administrative_works`;
CREATE TABLE `portfolio_academic_administrative_works` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `portfolio_academic_id` int NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `portfolio_academic_other_awards`;
CREATE TABLE `portfolio_academic_other_awards` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `portfolio_academic_id` bigint unsigned NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `portfolio_academic_other_awards_portfolio_academic_id_foreign` (`portfolio_academic_id`),
  CONSTRAINT `portfolio_academic_other_awards_portfolio_academic_id_foreign` FOREIGN KEY (`portfolio_academic_id`) REFERENCES `portfolio_academics` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `portfolio_academic_other_impresseds`;
CREATE TABLE `portfolio_academic_other_impresseds` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `portfolio_academic_id` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `portfolio_academic_other_services`;
CREATE TABLE `portfolio_academic_other_services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `portfolio_academic_id` bigint unsigned NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `portfolio_academic_other_services_portfolio_academic_id_foreign` (`portfolio_academic_id`),
  CONSTRAINT `portfolio_academic_other_services_portfolio_academic_id_foreign` FOREIGN KEY (`portfolio_academic_id`) REFERENCES `portfolio_academics` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `portfolio_academic_other_works`;
CREATE TABLE `portfolio_academic_other_works` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `portfolio_academic_id` bigint unsigned NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_start` date NOT NULL,
  `number_of_participants` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `portfolio_academic_other_works_portfolio_academic_id_foreign` (`portfolio_academic_id`),
  CONSTRAINT `portfolio_academic_other_works_portfolio_academic_id_foreign` FOREIGN KEY (`portfolio_academic_id`) REFERENCES `portfolio_academics` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `portfolio_academic_research`;
CREATE TABLE `portfolio_academic_research` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `portfolio_academic_id` bigint unsigned NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `funding_source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsibility` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_researchers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `research_achievements_and_progress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `portfolio_academic_research_portfolio_academic_id_foreign` (`portfolio_academic_id`),
  CONSTRAINT `portfolio_academic_research_portfolio_academic_id_foreign` FOREIGN KEY (`portfolio_academic_id`) REFERENCES `portfolio_academics` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `portfolio_academic_services`;
CREATE TABLE `portfolio_academic_services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `portfolio_academic_id` bigint unsigned NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `portfolio_academic_services_portfolio_academic_id_foreign` (`portfolio_academic_id`),
  CONSTRAINT `portfolio_academic_services_portfolio_academic_id_foreign` FOREIGN KEY (`portfolio_academic_id`) REFERENCES `portfolio_academics` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `portfolio_academic_student_activity_advisories`;
CREATE TABLE `portfolio_academic_student_activity_advisories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `portfolio_academic_id` int NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `portfolio_academic_student_advisories`;
CREATE TABLE `portfolio_academic_student_advisories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `portfolio_academic_id` int NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci,
  `undergraduate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graduate_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `portfolio_academic_teachings`;
CREATE TABLE `portfolio_academic_teachings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `portfolio_academic_id` bigint unsigned NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_credits` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_students` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `describe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thesis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `portfolio_academic_teachings_portfolio_academic_id_foreign` (`portfolio_academic_id`),
  CONSTRAINT `portfolio_academic_teachings_portfolio_academic_id_foreign` FOREIGN KEY (`portfolio_academic_id`) REFERENCES `portfolio_academics` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `portfolio_academic_works`;
CREATE TABLE `portfolio_academic_works` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `portfolio_academic_id` bigint unsigned NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `portfolio_academic_works_portfolio_academic_id_foreign` (`portfolio_academic_id`),
  CONSTRAINT `portfolio_academic_works_portfolio_academic_id_foreign` FOREIGN KEY (`portfolio_academic_id`) REFERENCES `portfolio_academics` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `portfolio_academics`;
CREATE TABLE `portfolio_academics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `personnel_id` bigint unsigned NOT NULL,
  `no` int NOT NULL,
  `started_at` date NOT NULL,
  `ended_at` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `portfolio_academics_personnel_id_foreign` (`personnel_id`),
  CONSTRAINT `portfolio_academics_personnel_id_foreign` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `portfolio_items`;
CREATE TABLE `portfolio_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `portfolio_id` bigint unsigned NOT NULL,
  `portfolio_type_id` bigint unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` text COLLATE utf8mb4_unicode_ci,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `sort` int DEFAULT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `portfolio_items_code_unique` (`code`),
  KEY `portfolio_items_portfolio_id_foreign` (`portfolio_id`),
  KEY `portfolio_items_portfolio_type_id_foreign` (`portfolio_type_id`),
  CONSTRAINT `portfolio_items_portfolio_id_foreign` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolios` (`id`),
  CONSTRAINT `portfolio_items_portfolio_type_id_foreign` FOREIGN KEY (`portfolio_type_id`) REFERENCES `portfolio_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `portfolio_operatings`;
CREATE TABLE `portfolio_operatings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `personnel_id` int NOT NULL,
  `no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `main_responsibilities` text COLLATE utf8mb4_unicode_ci,
  `main_responsibility_result` text COLLATE utf8mb4_unicode_ci,
  `main_responsibility_other` text COLLATE utf8mb4_unicode_ci,
  `board_working_group_1` text COLLATE utf8mb4_unicode_ci,
  `board_working_position_1` text COLLATE utf8mb4_unicode_ci,
  `board_working_start_1` text COLLATE utf8mb4_unicode_ci,
  `board_number_of_meeting_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `board_working_group_2` text COLLATE utf8mb4_unicode_ci,
  `board_working_position_2` text COLLATE utf8mb4_unicode_ci,
  `board_working_start_2` text COLLATE utf8mb4_unicode_ci,
  `board_number_of_meeting_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `board_working_group_3` text COLLATE utf8mb4_unicode_ci,
  `board_working_position_3` text COLLATE utf8mb4_unicode_ci,
  `board_working_start_3` text COLLATE utf8mb4_unicode_ci,
  `board_number_of_meeting_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_tasks_and_assignments` text COLLATE utf8mb4_unicode_ci,
  `outstanding_achievements_and_awards` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `portfolio_types`;
CREATE TABLE `portfolio_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `sort` int NOT NULL DEFAULT '0',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `portfolio_types_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `portfolios`;
CREATE TABLE `portfolios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `personnel_id` bigint unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `started_at` date DEFAULT NULL,
  `ended_at` date DEFAULT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci,
  `sort` int DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `is_approve` tinyint(1) NOT NULL DEFAULT '0',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `portfolios_code_unique` (`code`),
  KEY `portfolios_personnel_id_foreign` (`personnel_id`),
  CONSTRAINT `portfolios_personnel_id_foreign` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `positions`;
CREATE TABLE `positions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `department_id` bigint unsigned DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `positions_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `prefixes`;
CREATE TABLE `prefixes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `prefixes_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `report_education_levels`;
CREATE TABLE `report_education_levels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `report_personnel_summaries`;
CREATE TABLE `report_personnel_summaries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` int NOT NULL DEFAULT '0',
  `work` int NOT NULL DEFAULT '0',
  `teaching` int NOT NULL DEFAULT '0',
  `academic_service` int NOT NULL DEFAULT '0',
  `academic_work` int NOT NULL DEFAULT '0',
  `award` int NOT NULL DEFAULT '0',
  `research` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `report_portfolio_items`;
CREATE TABLE `report_portfolio_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locked` tinyint(1) NOT NULL,
  `payload` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `settings_group_index` (`group`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `taggables`;
CREATE TABLE `taggables` (
  `tag_id` bigint unsigned NOT NULL,
  `taggable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taggable_id` bigint unsigned NOT NULL,
  UNIQUE KEY `taggables_tag_id_taggable_id_taggable_type_unique` (`tag_id`,`taggable_id`,`taggable_type`),
  KEY `taggables_taggable_type_taggable_id_index` (`taggable_type`,`taggable_id`),
  CONSTRAINT `taggables_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` json NOT NULL,
  `slug` json NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_column` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_staff` tinyint(1) NOT NULL DEFAULT '0',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `academic_types` (`id`, `name`, `sort`, `is_visible`, `created_at`, `updated_at`) VALUES
(1, 'งานวิจัย', NULL, 0, '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(2, 'วารสาร', NULL, 0, '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(3, 'ตำรา', NULL, 0, '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(4, 'บทความ', NULL, 0, '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(5, 'หนังสือ', NULL, 0, '2025-03-12 00:33:16', '2025-03-12 00:33:16');

INSERT INTO `banners` (`id`, `name`, `description`, `summary`, `images`, `is_visible`, `created_at`, `updated_at`) VALUES
(1, 'วิทยาลัยสงฆ์ราชบุรี', 'ระบบเทคโนโลยีสารสนเทศ (e-Office)', 'มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย', NULL, 0, '2025-03-12 00:33:16', '2025-03-12 00:33:16');

INSERT INTO `departments` (`id`, `code`, `name`, `sort`, `is_visible`, `created_at`, `updated_at`) VALUES
(1, 'DEP2503000000001', 'สำนักงานวิทยาลัย', 0, 1, '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(2, 'DEP2503000000002', 'สำนักงานวิชาการ', 0, 1, '2025-03-12 00:33:16', '2025-03-12 00:33:16');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_13_055514_create_media_table', 1),
(6, '2021_12_13_072541_create_tag_tables', 1),
(7, '2021_12_13_072624_create_settings_table', 1),
(8, '2022_09_10_131605_create_notifications_table', 1),
(10, '2022_10_09_075109_create_departments_table', 1),
(11, '2022_10_09_075109_create_positions_table', 1),
(12, '2022_10_09_075109_create_prefixes_table', 1),
(13, '2022_10_09_075110_create_personnels_table', 1),
(14, '2022_10_09_081624_create_personnel_education_levels_table', 1),
(15, '2022_10_09_081625_create_personnel_education_table', 1),
(16, '2022_10_09_082127_create_personnel_works_table', 1),
(17, '2022_10_09_082359_create_personnel_research_table', 1),
(18, '2022_10_09_082531_create_personnel_academic_works_table', 1),
(19, '2022_10_09_082622_create_personnel_academic_services_table', 1),
(20, '2022_10_09_083000_create_personnel_preservings_table', 1),
(21, '2022_10_09_083034_create_personnel_teachings_table', 1),
(22, '2022_10_09_083125_create_personnel_awards_table', 1),
(23, '2022_10_10_055337_create_personnel_expertises_table', 1),
(24, '2022_10_14_144444_create_general_settings', 1),
(25, '2022_10_16_094924_create_academic_types_table', 1),
(26, '2022_10_16_094933_create_academics_table', 1),
(27, '2022_10_16_100005_create_portfolio_types_table', 1),
(28, '2022_10_16_100029_create_portfolios_table', 1),
(29, '2022_10_16_100039_create_portfolio_items_table', 1),
(30, '2022_10_26_171054_create_document_types_table', 1),
(31, '2022_10_26_171111_create_documents_table', 1),
(32, '2022_10_26_171452_create_album_types_table', 1),
(33, '2022_10_26_171521_create_albums_table', 1),
(34, '2022_11_20_105443_create_banners_table', 1),
(35, '2023_08_06_061959_create_report_education_levels_table', 1),
(36, '2023_08_06_065357_create_report_personnel_summaries_table', 1),
(37, '2023_08_06_070833_create_report_portfolio_items_table', 1),
(38, '2023_08_18_142444_create_faculties_table', 1),
(39, '2023_08_18_142639_create_portfolio_operatings_table', 1),
(40, '2023_08_18_142709_create_portfolio_academics_table', 1),
(41, '2023_08_18_143846_create_portfolio_academic_teachings_table', 1),
(42, '2023_08_18_144250_create_portfolio_academic_research_table', 1),
(43, '2023_08_19_020854_create_portfolio_academic_student_advisories_table', 1),
(44, '2023_08_19_021406_create_portfolio_academic_student_activity_advisories_table', 1),
(45, '2023_08_19_021639_create_portfolio_academic_works_table', 1),
(46, '2023_08_19_021851_create_portfolio_academic_services_table', 1),
(47, '2023_08_19_022048_create_portfolio_academic_administrative_works_table', 1),
(48, '2023_08_19_022222_create_portfolio_academic_other_works_table', 1),
(49, '2023_08_19_031318_create_portfolio_academic_other_services_table', 1),
(50, '2023_08_19_031418_create_portfolio_academic_other_awards_table', 1),
(51, '2023_08_19_031549_create_portfolio_academic_other_impresseds_table', 1),
(52, '2023_08_19_135930_add_type_to_positions_table', 1),
(53, '2023_08_21_034238_add_documents_to_portfolio_academic_teachings_table', 1),
(54, '2023_08_23_152010_add_documents_to_portfolio_academic_research_table', 1),
(55, '2023_08_23_152128_add_documents_to_portfolio_academic_student_advisories_table', 1),
(56, '2023_08_23_152151_add_documents_to_portfolio_academic_student_activity_advisories_table', 1),
(57, '2023_08_23_152221_add_documents_to_portfolio_academic_works_table', 1),
(58, '2023_08_23_152239_add_documents_to_portfolio_academic_services_table', 1),
(59, '2023_08_23_152257_add_documents_to_portfolio_academic_administrative_works_table', 1),
(60, '2023_08_23_152320_add_documents_to_portfolio_academic_other_works_table', 1),
(61, '2023_08_23_152342_add_documents_to_portfolio_academic_other_services_table', 1),
(62, '2023_08_23_152405_add_documents_to_portfolio_academic_other_awards_table', 1),
(63, '2023_08_23_152424_add_documents_to_portfolio_academic_other_impresseds_table', 1),
(64, '2023_08_23_155234_add_pali_name_to_personnels_table', 1),
(65, '2023_08_24_013709_add_documents_to_portfolio_operatings_table', 1),
(66, '2022_10_09_074434_create_permission_tables', 2);

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1);

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_academic', 'web', '2025-03-12 00:37:32', '2025-03-12 00:37:32'),
(2, 'view_any_academic', 'web', '2025-03-12 00:37:32', '2025-03-12 00:37:32'),
(3, 'create_academic', 'web', '2025-03-12 00:37:32', '2025-03-12 00:37:32'),
(4, 'update_academic', 'web', '2025-03-12 00:37:32', '2025-03-12 00:37:32'),
(5, 'restore_academic', 'web', '2025-03-12 00:37:32', '2025-03-12 00:37:32'),
(6, 'restore_any_academic', 'web', '2025-03-12 00:37:32', '2025-03-12 00:37:32'),
(7, 'replicate_academic', 'web', '2025-03-12 00:37:32', '2025-03-12 00:37:32'),
(8, 'reorder_academic', 'web', '2025-03-12 00:37:32', '2025-03-12 00:37:32'),
(9, 'delete_academic', 'web', '2025-03-12 00:37:32', '2025-03-12 00:37:32'),
(10, 'delete_any_academic', 'web', '2025-03-12 00:37:32', '2025-03-12 00:37:32'),
(11, 'force_delete_academic', 'web', '2025-03-12 00:37:32', '2025-03-12 00:37:32'),
(12, 'force_delete_any_academic', 'web', '2025-03-12 00:37:32', '2025-03-12 00:37:32'),
(13, 'view_academic::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(14, 'view_any_academic::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(15, 'create_academic::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(16, 'update_academic::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(17, 'restore_academic::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(18, 'restore_any_academic::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(19, 'replicate_academic::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(20, 'reorder_academic::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(21, 'delete_academic::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(22, 'delete_any_academic::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(23, 'force_delete_academic::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(24, 'force_delete_any_academic::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(25, 'view_album', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(26, 'view_any_album', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(27, 'create_album', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(28, 'update_album', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(29, 'restore_album', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(30, 'restore_any_album', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(31, 'replicate_album', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(32, 'reorder_album', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(33, 'delete_album', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(34, 'delete_any_album', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(35, 'force_delete_album', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(36, 'force_delete_any_album', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(37, 'view_album::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(38, 'view_any_album::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(39, 'create_album::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(40, 'update_album::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(41, 'restore_album::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(42, 'restore_any_album::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(43, 'replicate_album::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(44, 'reorder_album::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(45, 'delete_album::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(46, 'delete_any_album::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(47, 'force_delete_album::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(48, 'force_delete_any_album::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(49, 'view_banner', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(50, 'view_any_banner', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(51, 'create_banner', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(52, 'update_banner', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(53, 'restore_banner', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(54, 'restore_any_banner', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(55, 'replicate_banner', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(56, 'reorder_banner', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(57, 'delete_banner', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(58, 'delete_any_banner', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(59, 'force_delete_banner', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(60, 'force_delete_any_banner', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(61, 'view_department', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(62, 'view_any_department', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(63, 'create_department', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(64, 'update_department', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(65, 'restore_department', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(66, 'restore_any_department', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(67, 'replicate_department', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(68, 'reorder_department', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(69, 'delete_department', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(70, 'delete_any_department', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(71, 'force_delete_department', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(72, 'force_delete_any_department', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(73, 'view_document', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(74, 'view_any_document', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(75, 'create_document', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(76, 'update_document', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(77, 'restore_document', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(78, 'restore_any_document', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(79, 'replicate_document', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(80, 'reorder_document', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(81, 'delete_document', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(82, 'delete_any_document', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(83, 'force_delete_document', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(84, 'force_delete_any_document', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(85, 'view_document::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(86, 'view_any_document::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(87, 'create_document::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(88, 'update_document::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(89, 'restore_document::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(90, 'restore_any_document::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(91, 'replicate_document::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(92, 'reorder_document::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(93, 'delete_document::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(94, 'delete_any_document::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(95, 'force_delete_document::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(96, 'force_delete_any_document::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(97, 'view_personnel', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(98, 'view_any_personnel', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(99, 'create_personnel', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(100, 'update_personnel', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(101, 'restore_personnel', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(102, 'restore_any_personnel', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(103, 'replicate_personnel', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(104, 'reorder_personnel', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(105, 'delete_personnel', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(106, 'delete_any_personnel', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(107, 'force_delete_personnel', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(108, 'force_delete_any_personnel', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(109, 'view_personnel::academic::service', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(110, 'view_any_personnel::academic::service', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(111, 'create_personnel::academic::service', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(112, 'update_personnel::academic::service', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(113, 'restore_personnel::academic::service', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(114, 'restore_any_personnel::academic::service', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(115, 'replicate_personnel::academic::service', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(116, 'reorder_personnel::academic::service', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(117, 'delete_personnel::academic::service', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(118, 'delete_any_personnel::academic::service', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(119, 'force_delete_personnel::academic::service', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(120, 'force_delete_any_personnel::academic::service', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(121, 'view_personnel::academic::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(122, 'view_any_personnel::academic::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(123, 'create_personnel::academic::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(124, 'update_personnel::academic::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(125, 'restore_personnel::academic::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(126, 'restore_any_personnel::academic::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(127, 'replicate_personnel::academic::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(128, 'reorder_personnel::academic::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(129, 'delete_personnel::academic::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(130, 'delete_any_personnel::academic::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(131, 'force_delete_personnel::academic::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(132, 'force_delete_any_personnel::academic::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(133, 'view_personnel::award', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(134, 'view_any_personnel::award', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(135, 'create_personnel::award', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(136, 'update_personnel::award', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(137, 'restore_personnel::award', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(138, 'restore_any_personnel::award', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(139, 'replicate_personnel::award', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(140, 'reorder_personnel::award', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(141, 'delete_personnel::award', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(142, 'delete_any_personnel::award', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(143, 'force_delete_personnel::award', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(144, 'force_delete_any_personnel::award', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(145, 'view_personnel::education', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(146, 'view_any_personnel::education', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(147, 'create_personnel::education', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(148, 'update_personnel::education', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(149, 'restore_personnel::education', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(150, 'restore_any_personnel::education', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(151, 'replicate_personnel::education', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(152, 'reorder_personnel::education', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(153, 'delete_personnel::education', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(154, 'delete_any_personnel::education', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(155, 'force_delete_personnel::education', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(156, 'force_delete_any_personnel::education', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(157, 'view_personnel::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(158, 'view_any_personnel::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(159, 'create_personnel::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(160, 'update_personnel::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(161, 'restore_personnel::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(162, 'restore_any_personnel::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(163, 'replicate_personnel::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(164, 'reorder_personnel::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(165, 'delete_personnel::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(166, 'delete_any_personnel::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(167, 'force_delete_personnel::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(168, 'force_delete_any_personnel::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(169, 'view_personnel::expertise', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(170, 'view_any_personnel::expertise', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(171, 'create_personnel::expertise', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(172, 'update_personnel::expertise', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(173, 'restore_personnel::expertise', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(174, 'restore_any_personnel::expertise', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(175, 'replicate_personnel::expertise', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(176, 'reorder_personnel::expertise', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(177, 'delete_personnel::expertise', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(178, 'delete_any_personnel::expertise', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(179, 'force_delete_personnel::expertise', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(180, 'force_delete_any_personnel::expertise', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(181, 'view_personnel::preserving', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(182, 'view_any_personnel::preserving', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(183, 'create_personnel::preserving', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(184, 'update_personnel::preserving', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(185, 'restore_personnel::preserving', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(186, 'restore_any_personnel::preserving', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(187, 'replicate_personnel::preserving', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(188, 'reorder_personnel::preserving', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(189, 'delete_personnel::preserving', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(190, 'delete_any_personnel::preserving', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(191, 'force_delete_personnel::preserving', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(192, 'force_delete_any_personnel::preserving', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(193, 'view_personnel::research', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(194, 'view_any_personnel::research', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(195, 'create_personnel::research', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(196, 'update_personnel::research', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(197, 'restore_personnel::research', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(198, 'restore_any_personnel::research', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(199, 'replicate_personnel::research', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(200, 'reorder_personnel::research', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(201, 'delete_personnel::research', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(202, 'delete_any_personnel::research', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(203, 'force_delete_personnel::research', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(204, 'force_delete_any_personnel::research', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(205, 'view_personnel::teaching', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(206, 'view_any_personnel::teaching', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(207, 'create_personnel::teaching', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(208, 'update_personnel::teaching', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(209, 'restore_personnel::teaching', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(210, 'restore_any_personnel::teaching', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(211, 'replicate_personnel::teaching', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(212, 'reorder_personnel::teaching', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(213, 'delete_personnel::teaching', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(214, 'delete_any_personnel::teaching', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(215, 'force_delete_personnel::teaching', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(216, 'force_delete_any_personnel::teaching', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(217, 'view_personnel::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(218, 'view_any_personnel::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(219, 'create_personnel::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(220, 'update_personnel::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(221, 'restore_personnel::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(222, 'restore_any_personnel::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(223, 'replicate_personnel::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(224, 'reorder_personnel::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(225, 'delete_personnel::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(226, 'delete_any_personnel::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(227, 'force_delete_personnel::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(228, 'force_delete_any_personnel::work', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(229, 'view_portfolio', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(230, 'view_any_portfolio', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(231, 'create_portfolio', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(232, 'update_portfolio', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(233, 'restore_portfolio', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(234, 'restore_any_portfolio', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(235, 'replicate_portfolio', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(236, 'reorder_portfolio', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(237, 'delete_portfolio', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(238, 'delete_any_portfolio', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(239, 'force_delete_portfolio', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(240, 'force_delete_any_portfolio', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(241, 'view_portfolio::academic', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(242, 'view_any_portfolio::academic', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(243, 'create_portfolio::academic', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(244, 'update_portfolio::academic', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(245, 'restore_portfolio::academic', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(246, 'restore_any_portfolio::academic', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(247, 'replicate_portfolio::academic', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(248, 'reorder_portfolio::academic', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(249, 'delete_portfolio::academic', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(250, 'delete_any_portfolio::academic', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(251, 'force_delete_portfolio::academic', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(252, 'force_delete_any_portfolio::academic', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(253, 'view_portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(254, 'view_any_portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(255, 'create_portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(256, 'update_portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(257, 'restore_portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(258, 'restore_any_portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(259, 'replicate_portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(260, 'reorder_portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(261, 'delete_portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(262, 'delete_any_portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(263, 'force_delete_portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(264, 'force_delete_any_portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(265, 'view_portfolio::operating', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(266, 'view_any_portfolio::operating', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(267, 'create_portfolio::operating', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(268, 'update_portfolio::operating', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(269, 'restore_portfolio::operating', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(270, 'restore_any_portfolio::operating', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(271, 'replicate_portfolio::operating', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(272, 'reorder_portfolio::operating', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(273, 'delete_portfolio::operating', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(274, 'delete_any_portfolio::operating', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(275, 'force_delete_portfolio::operating', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(276, 'force_delete_any_portfolio::operating', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(277, 'view_portfolio::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(278, 'view_any_portfolio::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(279, 'create_portfolio::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(280, 'update_portfolio::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(281, 'restore_portfolio::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(282, 'restore_any_portfolio::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(283, 'replicate_portfolio::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(284, 'reorder_portfolio::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(285, 'delete_portfolio::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(286, 'delete_any_portfolio::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(287, 'force_delete_portfolio::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(288, 'force_delete_any_portfolio::type', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(289, 'view_position', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(290, 'view_any_position', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(291, 'create_position', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(292, 'update_position', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(293, 'restore_position', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(294, 'restore_any_position', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(295, 'replicate_position', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(296, 'reorder_position', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(297, 'delete_position', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(298, 'delete_any_position', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(299, 'force_delete_position', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(300, 'force_delete_any_position', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(301, 'view_prefix', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(302, 'view_any_prefix', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(303, 'create_prefix', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(304, 'update_prefix', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(305, 'restore_prefix', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(306, 'restore_any_prefix', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(307, 'replicate_prefix', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(308, 'reorder_prefix', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(309, 'delete_prefix', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(310, 'delete_any_prefix', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(311, 'force_delete_prefix', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(312, 'force_delete_any_prefix', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(313, 'view_report::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(314, 'view_any_report::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(315, 'create_report::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(316, 'update_report::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(317, 'restore_report::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(318, 'restore_any_report::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(319, 'replicate_report::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(320, 'reorder_report::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(321, 'delete_report::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(322, 'delete_any_report::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(323, 'force_delete_report::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(324, 'force_delete_any_report::education::level', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(325, 'view_report::personnel::summary', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(326, 'view_any_report::personnel::summary', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(327, 'create_report::personnel::summary', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(328, 'update_report::personnel::summary', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(329, 'restore_report::personnel::summary', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(330, 'restore_any_report::personnel::summary', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(331, 'replicate_report::personnel::summary', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(332, 'reorder_report::personnel::summary', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(333, 'delete_report::personnel::summary', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(334, 'delete_any_report::personnel::summary', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(335, 'force_delete_report::personnel::summary', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(336, 'force_delete_any_report::personnel::summary', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(337, 'view_report::portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(338, 'view_any_report::portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(339, 'create_report::portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(340, 'update_report::portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(341, 'restore_report::portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(342, 'restore_any_report::portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(343, 'replicate_report::portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(344, 'reorder_report::portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(345, 'delete_report::portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(346, 'delete_any_report::portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(347, 'force_delete_report::portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(348, 'force_delete_any_report::portfolio::item', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(349, 'view_role', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(350, 'view_any_role', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(351, 'create_role', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(352, 'update_role', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(353, 'delete_role', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(354, 'delete_any_role', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(355, 'view_user', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(356, 'view_any_user', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(357, 'create_user', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(358, 'update_user', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(359, 'restore_user', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(360, 'restore_any_user', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(361, 'replicate_user', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(362, 'reorder_user', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(363, 'delete_user', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(364, 'delete_any_user', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(365, 'force_delete_user', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(366, 'force_delete_any_user', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(367, 'page_ManageGeneral', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(368, 'widget_StatsOverviewWidget', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(369, 'widget_PortfolioChart', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(370, 'widget_PortfolioOperatingChart', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33');

INSERT INTO `personnel_education_levels` (`id`, `name`, `sort`, `is_visible`, `created_at`, `updated_at`) VALUES
(1, 'ปริญญาตรี', NULL, 0, '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(2, 'ปริญญาโท', NULL, 0, '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(3, 'ปริญญาเอก', NULL, 0, '2025-03-12 00:33:16', '2025-03-12 00:33:16');

INSERT INTO `portfolio_types` (`id`, `code`, `name`, `description`, `sort`, `is_visible`, `created_at`, `updated_at`) VALUES
(1, 'PTY2503000000001', 'ภาระงานหลัก', NULL, 0, 1, '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(2, 'PTY2503000000002', 'ภาระงานรอง', NULL, 0, 1, '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(3, 'PTY2503000000003', 'ภาระงานมอบหมาย', NULL, 0, 1, '2025-03-12 00:33:16', '2025-03-12 00:33:16');

INSERT INTO `positions` (`id`, `department_id`, `code`, `name`, `sort`, `type`, `is_visible`, `created_at`, `updated_at`) VALUES
(1, 1, 'POS2503000000001', 'ผู้อำนวยการ', NULL, 'academic', 1, '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(2, 1, 'POS2503000000002', 'รองผู้อำนวยการ', NULL, 'academic', 1, '2025-03-12 00:33:16', '2025-03-12 00:33:16');

INSERT INTO `prefixes` (`id`, `code`, `name`, `sort`, `is_visible`, `created_at`, `updated_at`) VALUES
(1, 'PRE2503000000001', 'นาย', NULL, 1, '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(2, 'PRE2503000000002', 'นาง', NULL, 1, '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(3, 'PRE2503000000003', 'นางสาว', NULL, 1, '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(4, 'PRE2503000000004', 'พระ', NULL, 1, '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(5, 'PRE2503000000005', 'พระมหา', NULL, 1, '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(6, 'PRE2503000000006', 'สามเณร', NULL, 1, '2025-03-12 00:33:16', '2025-03-12 00:33:16');

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(128, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(133, 1),
(134, 1),
(135, 1),
(136, 1),
(137, 1),
(138, 1),
(139, 1),
(140, 1),
(141, 1),
(142, 1),
(143, 1),
(144, 1),
(145, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1),
(152, 1),
(153, 1),
(154, 1),
(155, 1),
(156, 1),
(157, 1),
(158, 1),
(159, 1),
(160, 1),
(161, 1),
(162, 1),
(163, 1),
(164, 1),
(165, 1),
(166, 1),
(167, 1),
(168, 1),
(169, 1),
(170, 1),
(171, 1),
(172, 1),
(173, 1),
(174, 1),
(175, 1),
(176, 1),
(177, 1),
(178, 1),
(179, 1),
(180, 1),
(181, 1),
(182, 1),
(183, 1),
(184, 1),
(185, 1),
(186, 1),
(187, 1),
(188, 1),
(189, 1),
(190, 1),
(191, 1),
(192, 1),
(193, 1),
(194, 1),
(195, 1),
(196, 1),
(197, 1),
(198, 1),
(199, 1),
(200, 1),
(201, 1),
(202, 1),
(203, 1),
(204, 1),
(205, 1),
(206, 1),
(207, 1),
(208, 1),
(209, 1),
(210, 1),
(211, 1),
(212, 1),
(213, 1),
(214, 1),
(215, 1),
(216, 1),
(217, 1),
(218, 1),
(219, 1),
(220, 1),
(221, 1),
(222, 1),
(223, 1),
(224, 1),
(225, 1),
(226, 1),
(227, 1),
(228, 1),
(229, 1),
(230, 1),
(231, 1),
(232, 1),
(233, 1),
(234, 1),
(235, 1),
(236, 1),
(237, 1),
(238, 1),
(239, 1),
(240, 1),
(241, 1),
(242, 1),
(243, 1),
(244, 1),
(245, 1),
(246, 1),
(247, 1),
(248, 1),
(249, 1),
(250, 1),
(251, 1),
(252, 1),
(253, 1),
(254, 1),
(255, 1),
(256, 1),
(257, 1),
(258, 1),
(259, 1),
(260, 1),
(261, 1),
(262, 1),
(263, 1),
(264, 1),
(265, 1),
(266, 1),
(267, 1),
(268, 1),
(269, 1),
(270, 1),
(271, 1),
(272, 1),
(273, 1),
(274, 1),
(275, 1),
(276, 1),
(277, 1),
(278, 1),
(279, 1),
(280, 1),
(281, 1),
(282, 1),
(283, 1),
(284, 1),
(285, 1),
(286, 1),
(287, 1),
(288, 1),
(289, 1),
(290, 1),
(291, 1),
(292, 1),
(293, 1),
(294, 1),
(295, 1),
(296, 1),
(297, 1),
(298, 1),
(299, 1),
(300, 1),
(301, 1),
(302, 1),
(303, 1),
(304, 1),
(305, 1),
(306, 1),
(307, 1),
(308, 1),
(309, 1),
(310, 1),
(311, 1),
(312, 1),
(313, 1),
(314, 1),
(315, 1),
(316, 1),
(317, 1),
(318, 1),
(319, 1),
(320, 1),
(321, 1),
(322, 1),
(323, 1),
(324, 1),
(325, 1),
(326, 1),
(327, 1),
(328, 1),
(329, 1),
(330, 1),
(331, 1),
(332, 1),
(333, 1),
(334, 1),
(335, 1),
(336, 1),
(337, 1),
(338, 1),
(339, 1),
(340, 1),
(341, 1),
(342, 1),
(343, 1),
(344, 1),
(345, 1),
(346, 1),
(347, 1),
(348, 1),
(349, 1),
(350, 1),
(351, 1),
(352, 1),
(353, 1),
(354, 1),
(355, 1),
(356, 1),
(357, 1),
(358, 1),
(359, 1),
(360, 1),
(361, 1),
(362, 1),
(363, 1),
(364, 1),
(365, 1),
(366, 1),
(367, 1),
(368, 1),
(369, 1),
(370, 1);

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33'),
(2, 'staff', 'web', '2025-03-12 00:37:33', '2025-03-12 00:37:33');

INSERT INTO `settings` (`id`, `group`, `name`, `locked`, `payload`, `created_at`, `updated_at`) VALUES
(1, 'general', 'site_name', 0, '\"มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย วิทยาลัยสงฆ์ราชบุรี\"', '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(2, 'general', 'site_logo', 0, '\"logo.png\"', '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(3, 'general', 'site_description', 0, '\"มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย วิทยาลัยสงฆ์ราชบุรี\"', '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(4, 'general', 'email', 0, '\"rbr@mcu.ac.th\"', '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(5, 'general', 'phone', 0, '\"0810143946, 0962303902\"', '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(6, 'general', 'address', 0, '\"109 หมู่ 7 ตำบล แพงพวย อำเภอดำเนินสะดวก ราชบุรี 70130\"', '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(7, 'general', 'facebook', 0, '\"https://facebook.com\"', '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(8, 'general', 'twitter', 0, '\"https://twitter.com\"', '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(9, 'general', 'instagram', 0, '\"https://instagram.com\"', '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(10, 'general', 'google_map', 0, '\"<iframe src=\\\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3877.7770594036224!2d99.94385541487131!3d13.61042389043903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2d8d7f8e827f1%3A0x60b82b5a8cce99ce!2z4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4Liq4LiH4LiG4LmM4Lij4Liy4LiK4Lia4Li44Lij4Li1IOC4oeC4q-C4suC4p-C4tOC4l-C4ouC4suC4peC4seC4ouC4oeC4q-C4suC4iOC4uOC4rOC4suC4peC4h-C4geC4o-C4k-C4o-C4suC4iuC4p-C4tOC4l-C4ouC4suC4peC4seC4og!5e0!3m2!1sth!2sth!4v1669815712050!5m2!1sth!2sth\\\" width=\\\"1440\\\" height=\\\"600\\\" style=\\\"border:0;\\\" allowfullscreen=\\\"\\\" loading=\\\"lazy\\\" referrerpolicy=\\\"no-referrer-when-downgrade\\\"></iframe>\"', '2025-03-12 00:33:16', '2025-03-12 00:33:16'),
(11, 'general', 'opening_hours', 0, '\"08:00 - 16:00\"', '2025-03-12 00:33:16', '2025-03-12 00:33:16');

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_staff`, `is_visible`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@admin.com', '2025-03-12 00:33:16', '$2y$10$uyB79DScBGQek4KMLM/49OfKkIR4JfJXqmY/U4qh7jRpa/rg/vkxq', 0, 1, 'fMEfeVWo652p085OTygicPgXciFgSlk2uEYlLp0j1Vcr1K7vhT8rJQfazyo7', '2025-03-12 00:33:16', '2025-03-12 00:33:16');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;