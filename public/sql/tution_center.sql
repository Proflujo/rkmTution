DROP DATABASE IF EXISTS `tution_center`;
CREATE DATABASE `tution_center`;
USE `tution_center`;

DROP TABLE IF EXISTS `codelist_details`;
CREATE TABLE `codelist_details` (
  `codelist_detail_id` int NOT NULL AUTO_INCREMENT,
  `fkcodelist_id` int DEFAULT NULL COMMENT 'Refers to codelist_master.codelist_id',
  `codelist_value` varchar(20) NOT NULL,
  `codelist_description` varchar(100) NOT NULL,
  `additional_info` varchar(100) DEFAULT NULL COMMENT 'To store any additional info related to the codelist value',
  `user_editable` tinyint NOT NULL DEFAULT '2' COMMENT '1 - Yes, 2 - No',
  `active_status` tinyint NOT NULL COMMENT '1 - Active, 2 - Inactive',
  `date_created` date DEFAULT NULL,
  `user_created` int DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  `user_modified` int DEFAULT NULL,
  PRIMARY KEY (`codelist_detail_id`)
);



DROP TABLE IF EXISTS `codelist_master`;
CREATE TABLE `codelist_master` (
  `codelist_id` int NOT NULL AUTO_INCREMENT,
  `codelist_name` varchar(50) NOT NULL,
  `user_editable` tinyint NOT NULL COMMENT '1 - Yes, 2 - No',
  `active_status` tinyint DEFAULT NULL COMMENT '1 - Active. 2 - Inactive',
  `date_created` date DEFAULT NULL,
  `user_created` int DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  `user_modified` int DEFAULT NULL,
  PRIMARY KEY (`codelist_id`)
);

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `event_id` int NOT NULL AUTO_INCREMENT,
  `event_title` varchar(50) NOT NULL,
  `event_content` varchar(500) NOT NULL,
  `active_status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`event_id`)
);


DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255)  NOT NULL,
  `connection` text  NOT NULL,
  `queue` text  NOT NULL,
  `payload` longtext  NOT NULL,
  `exception` longtext  NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
);


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255)  NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
);


DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255)  NOT NULL,
  `token` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
);


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255)  NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255)  NOT NULL,
  `token` varchar(64)  NOT NULL,
  `abilities` text ,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
);


DROP TABLE IF EXISTS `user_accounts`;
CREATE TABLE `user_accounts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fkuser_id` int NOT NULL COMMENT 'refer users table',
  `account_holder_id` int NOT NULL COMMENT 'refer users table',
  `payment` decimal(10,2) NOT NULL,
  `payment_status` int NOT NULL DEFAULT '1',
  `active_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255)  NOT NULL,
  `branch` int NOT NULL COMMENT 'refer codelist id 1',
  `email` varchar(255)  NOT NULL,
  `mobile` varchar(255)  NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255)  NOT NULL,
  `remember_token` varchar(100)  DEFAULT NULL,
  `active_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
);
