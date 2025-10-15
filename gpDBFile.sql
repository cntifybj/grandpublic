/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.6.21-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: blowmusi_gptv
-- ------------------------------------------------------
-- Server version	10.6.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `advisories`
--

DROP TABLE IF EXISTS `advisories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `advisories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) NOT NULL,
  `file` varchar(191) NOT NULL,
  `position` varchar(191) NOT NULL,
  `isVideo` tinyint(1) NOT NULL DEFAULT 0,
  `visible` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advisories`
--

LOCK TABLES `advisories` WRITE;
/*!40000 ALTER TABLE `advisories` DISABLE KEYS */;
INSERT INTO `advisories` VALUES (19,'PROMO MAKOOMBA','Advisories/27pgxwGOn5wKK3WpBRo6jH0PLCaf0kUSLMHlxKdU.png','slide-category-page',0,0,'2024-12-13 19:03:51','2024-12-30 14:03:27'),(20,'PROMO MAKOOMBA','Advisories/NGpkIuSs8obXswsuWFNeFI3oQoY4LQwGtAfC1HLq.png','banner-page-video',0,0,'2024-12-13 19:04:24','2024-12-30 14:04:03'),(21,'PROMO MAKOOMBA','Advisories/in1GzuOOVmjiho1tB4ksxplK3ZmNkLvuJlPSpbXE.png','slide-page-video',0,0,'2024-12-13 19:06:03','2024-12-30 14:03:04'),(22,'PROMO CORNETTO','Advisories/ySSXzkmYqdUBTz2UGiVWzaKUQgTBBWsHsivFDgzf.png','slide-category-page',0,1,'2024-12-13 19:08:47','2024-12-13 19:08:47'),(23,'PROMO CORNETTO','Advisories/0SoNv3OeUd0wsd8gaHYwTBw2Sp37Dlpsdn8y5YNy.png','banner-page-video',0,1,'2024-12-13 19:10:10','2024-12-13 19:10:10'),(24,'PROMO CORNETTO','Advisories/4bN3EZgDnrS0DS0DK6k8eoFrNQONEhTrC6BzQwMI.png','slide-page-video',0,1,'2024-12-13 19:12:36','2024-12-13 19:12:36'),(28,'PROMO CAVE DU BENIN','Advisories/l9SVlEaNyk6Pp3dhVZWQjshENyuhwXwl9GX5V63x.jpg','slide-category-page',0,1,'2024-12-13 19:23:27','2024-12-13 19:23:27'),(29,'PROMO CAVE DU BENIN','Advisories/pXCJLzJVabqzUNdrxtT0iuTXysKBNM7Knh4cghoL.jpg','banner-page-video',0,1,'2024-12-13 19:24:54','2024-12-13 19:24:54'),(30,'PROMO CAVE DU BENIN','Advisories/zJoCTdC7PaUa9xPZr0MTbNWJNDTnCTsxcUfWIQfe.jpg','slide-page-video',0,1,'2024-12-13 19:25:42','2024-12-13 19:25:42'),(31,'PROMO MAKOOMBA RESTAU','Advisories/K7J7BPjlp5NBaF2nBoFOnwqgavSGO7sp3WMSl3ad.jpg','slide-category-page',0,1,'2024-12-13 19:48:18','2024-12-13 19:48:18'),(32,'PROMO MAKOOMBA RESTAU','Advisories/4uInCbfmmJeSpYDlHPTsBcYtZogNcTRYdIc2RTa8.jpg','banner-page-video',0,1,'2024-12-13 19:48:42','2024-12-13 19:48:42'),(33,'PROMO MAKOOMBA RESTAU','Advisories/MzoVMTZlwGtJnZRQzFLbMGzzZXDJhzBVM00YSAnd.jpg','slide-page-video',0,1,'2024-12-13 19:49:21','2024-12-13 19:49:21');
/*!40000 ALTER TABLE `advisories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_notifications`
--

DROP TABLE IF EXISTS `app_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) NOT NULL DEFAULT 'Une nouvelle notification',
  `short_description` varchar(191) NOT NULL,
  `posted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_notifications`
--

LOCK TABLES `app_notifications` WRITE;
/*!40000 ALTER TABLE `app_notifications` DISABLE KEYS */;
INSERT INTO `app_notifications` VALUES (2,'Test Notification','Test Notification Description',1,'2025-02-08 00:07:49','2025-02-08 00:10:44'),(3,'Je suis un test','Nouvellle notification',0,'2025-02-18 15:07:48','2025-02-18 15:07:48'),(4,'nexus','nexus lnx',0,'2025-02-18 15:08:37','2025-02-18 15:08:37');
/*!40000 ALTER TABLE `app_notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `center_of_interest_user`
--

DROP TABLE IF EXISTS `center_of_interest_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `center_of_interest_user` (
  `user_id` bigint(20) unsigned NOT NULL,
  `center_of_interest_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`center_of_interest_id`),
  KEY `center_of_interest_user_center_of_interest_id_foreign` (`center_of_interest_id`),
  CONSTRAINT `center_of_interest_user_center_of_interest_id_foreign` FOREIGN KEY (`center_of_interest_id`) REFERENCES `centers_of_interest` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `center_of_interest_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `center_of_interest_user`
--

LOCK TABLES `center_of_interest_user` WRITE;
/*!40000 ALTER TABLE `center_of_interest_user` DISABLE KEYS */;
INSERT INTO `center_of_interest_user` VALUES (1,1),(1,2),(8,1),(8,2);
/*!40000 ALTER TABLE `center_of_interest_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `centers_of_interest`
--

DROP TABLE IF EXISTS `centers_of_interest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `centers_of_interest` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `short_identifier` varchar(191) DEFAULT NULL,
  `short_description` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centers_of_interest`
--

LOCK TABLES `centers_of_interest` WRITE;
/*!40000 ALTER TABLE `centers_of_interest` DISABLE KEYS */;
INSERT INTO `centers_of_interest` VALUES (1,'Sport','Spo',NULL,'2025-01-28 15:56:01','2025-01-28 15:56:01'),(2,'Musique','Mus',NULL,'2025-01-28 15:56:06','2025-01-28 15:56:06');
/*!40000 ALTER TABLE `centers_of_interest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `video_id` bigint(20) unsigned NOT NULL,
  `content` text NOT NULL,
  `parent_comment_id` bigint(20) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_video_id_foreign` (`video_id`),
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `comments_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (7,1,25,'J\'apprécie grandement cet évènement',NULL,0,'2025-02-07 17:16:41','2025-02-07 17:32:07'),(8,1,25,'Salut les gens',NULL,1,'2025-02-08 00:38:37','2025-02-08 00:58:40'),(9,1,25,'Salut les gens',7,0,'2025-02-08 00:39:42','2025-02-08 00:58:37'),(10,8,25,'Salut les gens',NULL,1,'2025-02-09 09:02:14','2025-02-09 09:02:14'),(11,1,25,'Salut les gens',NULL,1,'2025-02-13 16:04:59','2025-02-13 16:04:59'),(12,1,25,'Salut les gens',NULL,1,'2025-02-13 16:05:47','2025-02-13 16:05:47'),(13,1,25,'Salut les gens',NULL,1,'2025-02-13 16:05:59','2025-02-13 16:05:59'),(14,8,23,'ggghhh',NULL,1,'2025-03-14 13:51:40','2025-03-14 13:51:40'),(15,8,23,'ggghhh',NULL,1,'2025-03-14 13:51:44','2025-03-14 13:51:44'),(16,8,23,'ggghhh',NULL,1,'2025-03-14 13:51:46','2025-03-14 13:51:46'),(17,8,23,'ggghhh',NULL,1,'2025-03-14 13:51:47','2025-03-14 13:51:47'),(18,8,23,'ggghhh',NULL,1,'2025-03-14 13:53:00','2025-03-14 13:53:00'),(19,8,23,'ggghhh',NULL,1,'2025-03-14 14:04:15','2025-03-14 14:04:15'),(20,8,23,'ggghhh',NULL,1,'2025-03-14 14:04:22','2025-03-14 14:04:22'),(21,8,23,'ggghhh',NULL,1,'2025-03-14 14:05:15','2025-03-14 14:05:15'),(22,8,23,'ggghhh',NULL,1,'2025-03-14 14:05:19','2025-03-14 14:05:19'),(23,8,23,'ggghhh',NULL,1,'2025-03-14 14:05:51','2025-03-14 14:05:51'),(24,8,35,'ggghhh',NULL,1,'2025-03-14 14:06:21','2025-03-14 14:06:21'),(25,8,35,'ggghhh',NULL,1,'2025-03-14 14:07:48','2025-03-14 14:07:48'),(26,8,35,'ggghhh',NULL,1,'2025-03-14 14:09:17','2025-03-14 14:09:17'),(27,8,35,'ggghhh',NULL,1,'2025-03-14 14:11:30','2025-03-14 14:11:30'),(28,8,35,'ggghhh',NULL,1,'2025-03-14 14:12:59','2025-03-14 14:12:59'),(29,8,35,'ggghhh',NULL,1,'2025-03-14 14:13:53','2025-03-14 14:13:53'),(30,8,35,'ggghhh',NULL,1,'2025-03-14 14:16:57','2025-03-14 14:16:57'),(31,8,35,'ggghhh',NULL,1,'2025-03-14 14:21:15','2025-03-14 14:21:15'),(32,8,35,'ggghhh',NULL,1,'2025-03-14 14:21:26','2025-03-14 14:21:26'),(33,8,35,'ggghhh',NULL,1,'2025-03-14 14:24:59','2025-03-14 14:24:59'),(34,8,36,'hrhrhdhf',NULL,1,'2025-03-14 14:29:29','2025-03-14 14:29:29'),(35,8,36,'hrhrhdhf',NULL,1,'2025-03-14 14:29:40','2025-03-14 14:29:40'),(36,1,36,'Salut les gens',NULL,1,'2025-03-14 14:30:28','2025-03-14 14:30:28'),(37,8,33,'urjrjrh',NULL,1,'2025-03-14 14:40:09','2025-03-14 14:40:09'),(38,8,33,'urjrjrh',NULL,1,'2025-03-14 14:42:28','2025-03-14 14:42:28');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `custom_logs`
--

DROP TABLE IF EXISTS `custom_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `custom_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `icon` varchar(191) DEFAULT 'fas fa-bell',
  `color` varchar(191) DEFAULT 'info',
  `content` varchar(191) NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `custom_logs`
--

LOCK TABLES `custom_logs` WRITE;
/*!40000 ALTER TABLE `custom_logs` DISABLE KEYS */;
INSERT INTO `custom_logs` VALUES (1,'fas fa-comment','primary','L\'utilisateur HenryMax a soumis un message via le formulaire de contact.',0,'2024-12-18 01:46:15','2024-12-18 01:46:15'),(2,'fas fa-comment','primary','L\'utilisateur Amou a soumis un message via le formulaire de contact.',0,'2024-12-18 10:04:42','2024-12-18 10:04:42'),(3,'fas fa-envelope-open','warning','L\'admin Dev Department a marqué le message de l\'utilisateur #Amou comme lu.',0,'2024-12-18 10:05:54','2024-12-18 10:05:54'),(4,'fas fa-envelope-open','warning','L\'admin Dev Department a marqué le message de l\'utilisateur #Amou comme non lu.',0,'2024-12-18 10:05:57','2024-12-18 10:05:57'),(5,'fas fa-envelope-open','warning','L\'admin Dev Department a marqué le message de l\'utilisateur #Amou comme lu.',0,'2024-12-18 10:06:47','2024-12-18 10:06:47'),(6,'fas fa-envelope-open','warning','L\'admin Dev Department a marqué le message de l\'utilisateur #Amou comme non lu.',0,'2024-12-18 10:06:48','2024-12-18 10:06:48'),(7,'fas fa-comment','primary','L\'utilisateur FreyaMax a soumis un message via le formulaire de contact.',0,'2024-12-18 17:42:04','2024-12-18 17:42:04'),(8,'fas fa-comment','primary','L\'utilisateur OliverMax a soumis un message via le formulaire de contact.',0,'2024-12-20 00:38:00','2024-12-20 00:38:00'),(9,'fas fa-envelope-open','warning','L\'admin Dev Department a marqué le message de l\'utilisateur #OliverMax comme lu.',0,'2024-12-20 10:48:56','2024-12-20 10:48:56'),(10,'fas fa-envelope-open','warning','L\'admin Dev Department a marqué le message de l\'utilisateur #OliverMax comme non lu.',0,'2024-12-20 10:48:59','2024-12-20 10:48:59'),(11,'fas fa-envelope-open','warning','L\'admin Dev Department a marqué le message de l\'utilisateur #OliverMax comme lu.',0,'2024-12-20 10:49:00','2024-12-20 10:49:00'),(12,'fas fa-envelope-open','warning','L\'admin Dev Department a marqué le message de l\'utilisateur #OliverMax comme non lu.',0,'2024-12-20 10:49:01','2024-12-20 10:49:01'),(13,'fas fa-envelope-open','warning','L\'admin Dev Department a marqué le message de l\'utilisateur #OliverMax comme lu.',0,'2024-12-20 10:49:02','2024-12-20 10:49:02'),(14,'fas fa-envelope-open','warning','L\'admin Dev Department a marqué le message de l\'utilisateur #OliverMax comme lu.',0,'2024-12-20 10:49:03','2024-12-20 10:49:03'),(15,'fas fa-comment','primary','L\'utilisateur JohnMax a soumis un message via le formulaire de contact.',0,'2024-12-30 17:24:14','2024-12-30 17:24:14'),(16,'fas fa-comment','primary','L\'utilisateur TedMax a soumis un message via le formulaire de contact.',0,'2024-12-31 23:46:53','2024-12-31 23:46:53'),(17,'fas fa-comment','primary','L\'utilisateur LeoMax a soumis un message via le formulaire de contact.',0,'2025-01-02 17:05:44','2025-01-02 17:05:44'),(18,'fas fa-comment','primary','L\'utilisateur Amandaadvologs2 a soumis un message via le formulaire de contact.',0,'2025-01-13 04:39:22','2025-01-13 04:39:22'),(19,'fas fa-comment','primary','L\'utilisateur Mozelle a soumis un message via le formulaire de contact.',0,'2025-01-17 05:03:55','2025-01-17 05:03:55'),(20,'fas fa-comment','primary','L\'utilisateur Charli a soumis un message via le formulaire de contact.',0,'2025-01-23 00:08:51','2025-01-23 00:08:51'),(21,'fas fa-comment','primary','L\'utilisateur Mike Jozef Taylor a soumis un message via le formulaire de contact.',0,'2025-01-26 07:39:22','2025-01-26 07:39:22'),(22,'fas fa-comment','primary','L\'utilisateur Luis Alves a soumis un message via le formulaire de contact.',0,'2025-02-04 21:32:28','2025-02-04 21:32:28'),(23,'fas fa-comment','primary','L\'utilisateur TedMax a soumis un message via le formulaire de contact.',0,'2025-02-05 19:27:42','2025-02-05 19:27:42'),(24,'fas fa-comment','primary','L\'utilisateur Kristen a soumis un message via le formulaire de contact.',0,'2025-02-09 20:27:05','2025-02-09 20:27:05'),(25,'fas fa-comment','primary','L\'utilisateur Tina Toth a soumis un message via le formulaire de contact.',0,'2025-02-14 13:13:24','2025-02-14 13:13:24'),(26,'fas fa-comment','primary','L\'utilisateur Edmundo a soumis un message via le formulaire de contact.',0,'2025-02-15 10:28:23','2025-02-15 10:28:23'),(27,'fas fa-comment','primary','L\'utilisateur ByPalt a soumis un message via le formulaire de contact.',0,'2025-02-15 23:13:31','2025-02-15 23:13:31'),(28,'fas fa-comment','primary','L\'utilisateur JohnMax a soumis un message via le formulaire de contact.',0,'2025-02-20 00:09:22','2025-02-20 00:09:22'),(29,'fas fa-comment','primary','L\'utilisateur Valeron83Vop a soumis un message via le formulaire de contact.',0,'2025-03-01 17:44:08','2025-03-01 17:44:08'),(30,'fas fa-comment','primary','L\'utilisateur RaymondSwork a soumis un message via le formulaire de contact.',0,'2025-03-02 20:24:56','2025-03-02 20:24:56'),(31,'fas fa-comment','primary','L\'utilisateur GeorgeMax a soumis un message via le formulaire de contact.',0,'2025-03-05 22:01:04','2025-03-05 22:01:04'),(32,'fas fa-comment','primary','L\'utilisateur TedMax a soumis un message via le formulaire de contact.',0,'2025-03-06 02:11:36','2025-03-06 02:11:36'),(33,'fas fa-comment','primary','L\'utilisateur TedMax a soumis un message via le formulaire de contact.',0,'2025-03-11 15:25:32','2025-03-11 15:25:32'),(34,'fas fa-comment','primary','L\'utilisateur MichaelKat a soumis un message via le formulaire de contact.',0,'2025-03-20 09:20:18','2025-03-20 09:20:18'),(35,'fas fa-comment','primary','L\'utilisateur Mike Sven-Erik De Vries a soumis un message via le formulaire de contact.',0,'2025-03-29 06:42:23','2025-03-29 06:42:23'),(36,'fas fa-comment','primary','L\'utilisateur Acasannodia a soumis un message via le formulaire de contact.',0,'2025-04-10 01:38:12','2025-04-10 01:38:12'),(37,'fas fa-comment','primary','L\'utilisateur HenryMax a soumis un message via le formulaire de contact.',0,'2025-04-24 07:18:40','2025-04-24 07:18:40');
/*!40000 ALTER TABLE `custom_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `likes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `video_id` bigint(20) unsigned DEFAULT NULL,
  `comment_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `likes_user_id_video_id_unique` (`user_id`,`video_id`),
  UNIQUE KEY `likes_user_id_comment_id_unique` (`user_id`,`comment_id`),
  KEY `likes_video_id_foreign` (`video_id`),
  KEY `likes_comment_id_foreign` (`comment_id`),
  CONSTRAINT `likes_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`),
  CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `likes_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (21,1,25,NULL,'2025-02-07 17:13:19','2025-02-07 17:13:19'),(25,1,15,NULL,'2025-02-09 09:29:14','2025-02-09 09:29:14');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2024_10_03_110603_create_staff_members_table',1),(7,'2024_10_03_115745_create_user_subscriptions_table',1),(8,'2024_10_03_120528_create_video_categories_table',1),(9,'2024_10_03_121641_create_videos_table',1),(10,'2024_10_03_123154_create_comments_table',1),(11,'2024_10_03_134709_create_likes_table',1),(12,'2024_10_03_135649_create_user_messages_table',1),(13,'2024_10_09_091916_add_remember_token_to_users_table',1),(14,'2024_10_14_174220_create_slides_table',1),(15,'2024_10_17_121606_create_subscriptions_table',1),(16,'2024_10_23_091155_create_payments_table',1),(17,'2024_11_06_100425_rename_name_column_to_first_name_and_add_last_name_to_users_table',1),(18,'2024_11_08_101901_add_email_verified_at_to_users_table',1),(19,'2024_11_13_183023_update_video_foreign_key_on_payments_table',2),(20,'2024_11_25_174122_create_advisories_table',3),(21,'2024_12_16_091614_create_custom_logs_table',4),(22,'2024_12_16_215626_modify_user_messages_table_to_fit_cadeaurapide_project',4),(24,'2025_01_20_183003_create_center_of_interests_table',5),(25,'2025_02_07_211830_create_app_notifications_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `amount` int(10) unsigned NOT NULL,
  `transaction_id` varchar(40) DEFAULT NULL,
  `video_id` bigint(20) unsigned DEFAULT NULL,
  `subscription_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `isPaymentSucces` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_subscription_id_foreign` (`subscription_id`),
  KEY `payments_user_id_foreign` (`user_id`),
  KEY `payments_video_id_foreign` (`video_id`),
  CONSTRAINT `payments_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`),
  CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `payments_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,0,'g-W5qjOyX',NULL,NULL,1,0,'2024-11-12 19:20:07','2024-11-12 19:20:07'),(2,0,'jw10ysCvQ',NULL,NULL,1,0,'2024-11-12 22:15:11','2024-11-12 22:15:11'),(3,1000,'eG7Hds4F',NULL,1,1,0,'2025-01-28 15:53:39','2025-01-28 15:53:39'),(4,1000,'eG7Hds4F',NULL,1,1,0,'2025-02-07 16:45:18','2025-02-07 16:45:18'),(5,1000,'eG7Hds4F',NULL,1,8,0,'2025-02-09 09:00:41','2025-02-09 09:00:41'),(6,1000,'eG7Hds4F',NULL,1,1,0,'2025-02-09 09:42:10','2025-02-09 09:42:10'),(7,1000,'eG7Hds4F',NULL,1,1,0,'2025-02-14 04:37:37','2025-02-14 04:37:37');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (1,'App\\Models\\User',8,'[DeviceOrientation.portraitUp, DeviceOrientation.landscapeLeft, DeviceOrientation.portraitDown, DeviceOrientation.landscapeRight]','392672216fe01a88f963340c87a4864a39219369ff0025796fd617580f57f9e7','[\"*\"]',NULL,NULL,'2025-01-22 11:57:43','2025-01-22 11:57:43'),(2,'App\\Models\\User',1,'Amandas\'s Dell PC','691e505bf466320755a2fc46f47dc9b52763000d95e0cf53c7836326d75adefe','[\"*\"]',NULL,NULL,'2025-01-22 14:19:23','2025-01-22 14:19:23'),(3,'App\\Models\\User',12,'Georges\'s Dell PC','df79ea233fc078106b11905414527df19d7c53ca5431aa288e0125629ada9978','[\"*\"]','2025-01-22 14:58:09',NULL,'2025-01-22 14:57:43','2025-01-22 14:58:09'),(4,'App\\Models\\User',12,'Georges\'s Dell PC','7d0c0d8e72de8cdab69b237ee7b278c20275a2dd77d6b594d85699da563ab2d5','[\"*\"]','2025-01-22 15:03:57',NULL,'2025-01-22 15:03:39','2025-01-22 15:03:57'),(5,'App\\Models\\User',8,'[DeviceOrientation.portraitUp, DeviceOrientation.landscapeLeft, DeviceOrientation.portraitDown, DeviceOrientation.landscapeRight]','2c7624ecc62a8f27d19d0ff00b9b292330078a0b32a16dd6761e03f6e4748473','[\"*\"]',NULL,NULL,'2025-01-22 20:05:57','2025-01-22 20:05:57'),(6,'App\\Models\\User',8,'mobile','c7e35b010f1085bec29b473c2baeaab058cf95e337e07a5395962821693e5c51','[\"*\"]',NULL,NULL,'2025-01-23 05:07:59','2025-01-23 05:07:59'),(7,'App\\Models\\User',8,'mobile','0a9ef79e785a9b50b487efd83b5fb76a3bd31b8cb80e4b645181c2988fa5f1e0','[\"*\"]',NULL,NULL,'2025-01-23 05:08:31','2025-01-23 05:08:31'),(8,'App\\Models\\User',8,'mobile','b35581ddee57e8bf0584ba3128462e631d6eac98a1ec42d2da67300ba63e5725','[\"*\"]',NULL,NULL,'2025-01-23 05:09:20','2025-01-23 05:09:20'),(9,'App\\Models\\User',8,'mobile','253977e794ca7884a07502213a5e5a0bbb46e37834095daab9d535e2bcf13e4d','[\"*\"]','2025-01-26 09:36:15',NULL,'2025-01-24 04:32:52','2025-01-26 09:36:15'),(10,'App\\Models\\User',1,'Georges\'s Dell PC','2dd3fcc88b6d1cf888f9d8c0e24083af39be1218e4c8df2510a6ba8a3bbfbd86','[\"*\"]',NULL,NULL,'2025-01-24 17:36:02','2025-01-24 17:36:02'),(11,'App\\Models\\User',8,'mobile','ec2d53efa0c2eca02b1b4eefd0a62cb80f2591791ac47697bc893e16aab99f2c','[\"*\"]','2025-01-24 17:39:09',NULL,'2025-01-24 17:39:03','2025-01-24 17:39:09'),(12,'App\\Models\\User',1,'mobile','50ecf6375f9240ea3631870ee0d17ecd053688fb0e9c54463d336d0b0a9aba52','[\"*\"]','2025-01-24 17:53:29',NULL,'2025-01-24 17:40:34','2025-01-24 17:53:29'),(13,'App\\Models\\User',8,'mobile','c9f66af61b37beb4c9fae6e3c751e40dc11097c27409a823968c3190919670cf','[\"*\"]','2025-01-26 08:45:43',NULL,'2025-01-24 17:59:03','2025-01-26 08:45:43'),(14,'App\\Models\\User',1,'Georges\'s Dell PC','61af1593954bf805f645a7418b3cbafc1346870bcee59abdd131a332e4e64b87','[\"*\"]','2025-01-27 18:05:58',NULL,'2025-01-27 17:42:06','2025-01-27 18:05:58'),(15,'App\\Models\\User',1,'mobile','c104eb4353ed7b930f06f3f293f3e34278545ffd1d372a1081025b348a048c42','[\"*\"]','2025-01-28 11:20:27',NULL,'2025-01-28 11:20:13','2025-01-28 11:20:27'),(16,'App\\Models\\User',1,'Amanda\'s Dell PC','f1f04610258b119976a10fa520883ff6a609ba43b25b04003812377d03509c60','[\"*\"]','2025-02-09 09:33:00',NULL,'2025-01-28 15:21:28','2025-02-09 09:33:00'),(17,'App\\Models\\User',1,'Amanda\'s Dell PC','87369bb9e68d34e37ff28472a6bafc2cd15e644aed95b494501a73504d43c29c','[\"*\"]','2025-02-07 17:06:56',NULL,'2025-01-28 15:27:21','2025-02-07 17:06:56'),(18,'App\\Models\\User',8,'mobile','ef4581eba74c0b4b6a30e60f4acb228070a61dc7b904630a4828589667cef94a','[\"*\"]','2025-02-05 16:20:23',NULL,'2025-02-03 16:48:49','2025-02-05 16:20:23'),(19,'App\\Models\\User',8,'mobile','866b877dd23b48cd1a956205d3cdc874fa819bf84d7e00b80c6345c1d6e50e58','[\"*\"]','2025-02-06 13:39:08',NULL,'2025-02-06 13:19:32','2025-02-06 13:39:08'),(20,'App\\Models\\User',8,'mobile','fac7c90126cefbf0f45e30901f26ff995c22b7aba6db5c61d4fa6db81acaf0fc','[\"*\"]','2025-02-06 14:10:07',NULL,'2025-02-06 13:40:14','2025-02-06 14:10:07'),(21,'App\\Models\\User',8,'mobile','9f05d7b07974fcc8cbc21d6c887c93c58606506e968cbb1366e8a5d7832a6ee7','[\"*\"]','2025-02-06 14:31:38',NULL,'2025-02-06 14:12:27','2025-02-06 14:31:38'),(22,'App\\Models\\User',8,'mobile','3dd8df25de8ec5370c8f93c99e4f0c46fe6d3e099bee40dbb2a809f09781a9eb','[\"*\"]','2025-02-07 09:57:13',NULL,'2025-02-06 15:45:15','2025-02-07 09:57:13'),(23,'App\\Models\\User',8,'mobile','4f028381e82152d8102a51f1db534da65637a7a27dfbc52644b22cb15c45e9a5','[\"*\"]','2025-02-07 11:16:50',NULL,'2025-02-07 10:07:16','2025-02-07 11:16:50'),(24,'App\\Models\\User',8,'mobile','c9cdf7f762b5aaccba786f1240299fc834ba7ade49aebc403de005de7f0d7ea1','[\"*\"]','2025-02-07 11:37:30',NULL,'2025-02-07 11:20:11','2025-02-07 11:37:30'),(25,'App\\Models\\User',8,'mobile','7c0e05f3b560f554f754c7b12d4038e4a78b685c4e0c358ca01c659f34857c55','[\"*\"]','2025-02-09 09:16:50',NULL,'2025-02-07 11:51:29','2025-02-09 09:16:50'),(26,'App\\Models\\User',1,'Amanda\'s Dell PC','a67985f289ca9d75ce787ef02b9caaf2c4af54dd9b0ca29aafaf750d1bfb2f41','[\"*\"]','2025-03-14 14:30:28',NULL,'2025-02-07 15:58:06','2025-03-14 14:30:28'),(27,'App\\Models\\User',8,'Amanda\'s Dell PC','809083900110ccadfeb659ed89155a03e1023812b965d35f82975fab52c79afe','[\"*\"]','2025-02-09 09:02:42',NULL,'2025-02-09 08:59:39','2025-02-09 09:02:42'),(28,'App\\Models\\User',8,'mobile','12960c2b4eb6c2a56bf77310fc9663e6a43c47d0b37917a71a3b8b66a611572f','[\"*\"]','2025-02-09 10:04:22',NULL,'2025-02-09 09:17:19','2025-02-09 10:04:22'),(29,'App\\Models\\User',8,'mobile','20c038d32923d24304b5525f478f0c82f8a00bce02a32152a57051294102d526','[\"*\"]','2025-02-13 14:21:36',NULL,'2025-02-11 15:02:18','2025-02-13 14:21:36'),(30,'App\\Models\\User',8,'mobile','87e5d0d871362f6dbead81cc44bf622be5533ce6d8f380721a6a8f1c1b563fe5','[\"*\"]','2025-02-13 15:33:52',NULL,'2025-02-13 15:27:42','2025-02-13 15:33:52'),(31,'App\\Models\\User',8,'mobile','c95444a74b1fe74ea980e7e600f3865b69636897895623d1283f261472f60cd5','[\"*\"]','2025-02-27 08:42:58',NULL,'2025-02-13 15:34:41','2025-02-27 08:42:58'),(32,'App\\Models\\User',1,'Amanda\'s Dell PC','d08bfa997e78b7d908429e24aeed4a545ea28b0acd120ff7efee9c3e7bf8e133','[\"*\"]',NULL,NULL,'2025-02-27 13:30:09','2025-02-27 13:30:09'),(33,'App\\Models\\User',8,'mobile','934d21253833804b6e026ea456d16ccc8b6ccc569e1cba475d2eda87281e0131','[\"*\"]','2025-02-28 07:20:48',NULL,'2025-02-28 07:15:53','2025-02-28 07:20:48'),(34,'App\\Models\\User',8,'mobile','7775bfe21b3870c9e5d77ba9206fc2bbde0a78550b3293e26de50ac0ba5e8f9e','[\"*\"]','2025-02-28 07:41:05',NULL,'2025-02-28 07:40:53','2025-02-28 07:41:05'),(35,'App\\Models\\User',1,'mobile','1c87716d78ab1663ed2723c2d9d979b1afb1a9c7e4893ad0468477f0788a5e56','[\"*\"]','2025-03-03 08:29:55',NULL,'2025-03-03 08:04:16','2025-03-03 08:29:55'),(36,'App\\Models\\User',8,'mobile','28c4e20d45cb7e75112692ecfabe628c93a75ec964e30981c358c4ede0522b3d','[\"*\"]','2025-03-07 15:02:54',NULL,'2025-03-06 10:56:54','2025-03-07 15:02:54'),(37,'App\\Models\\User',8,'mobile','f98796b979121c36f506c8611aee5eb7eeeb9f519580fedf6a0b4efde487bf50','[\"*\"]','2025-03-10 21:23:29',NULL,'2025-03-07 15:03:33','2025-03-10 21:23:29'),(38,'App\\Models\\User',1,'mobile','2ce09f3a39be2b3721a3a70fbeb159e483c9454227fc143b6aa8907802636c29','[\"*\"]','2025-03-08 22:26:30',NULL,'2025-03-08 22:21:55','2025-03-08 22:26:30'),(39,'App\\Models\\User',1,'mobile','3ae9f5be423935e6b1d371e6f325674a3a9c885bf990cbf779f2f733e978d7ac','[\"*\"]','2025-03-10 21:38:45',NULL,'2025-03-08 22:26:54','2025-03-10 21:38:45'),(40,'App\\Models\\User',1,'mobile','203d767ee36859227b399d571ccf1d75382ca775b381ea35348de767a919cbbb','[\"*\"]','2025-03-08 22:26:57',NULL,'2025-03-08 22:26:56','2025-03-08 22:26:57'),(41,'App\\Models\\User',1,'mobile','7cf722108219cf9dea7cc2730f366fa3661d6371c93fd250e3edd231f9aa25cf','[\"*\"]','2025-03-08 22:26:58',NULL,'2025-03-08 22:26:57','2025-03-08 22:26:58'),(42,'App\\Models\\User',8,'mobile','ecd9530559921507ea744d6dbce6120a800ece6af7a34134041c0eee80af0d3c','[\"*\"]','2025-03-14 11:57:25',NULL,'2025-03-14 11:36:10','2025-03-14 11:57:25'),(43,'App\\Models\\User',8,'mobile','18254eeb66ec707c38848ec3e31579f19f5c785ce90009247c4bc9d4085ad686','[\"*\"]','2025-03-31 10:51:46',NULL,'2025-03-14 13:22:29','2025-03-31 10:51:46');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `slides` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `position` smallint(6) DEFAULT NULL,
  `image` varchar(191) NOT NULL,
  `header` varchar(191) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slides`
--

LOCK TABLES `slides` WRITE;
/*!40000 ALTER TABLE `slides` DISABLE KEYS */;
INSERT INTO `slides` VALUES (1,1,'Slides/Mgmthgv8Qiy73NXVr3sW2JTdv4Te1kZeuoFYDQoT.jpg',NULL,NULL,1,'2024-11-13 17:29:52','2025-02-03 10:08:50'),(2,3,'Slides/DShKLfepuXGRpLF3FDdeHLHB2BrfL1bv9YNp58uz.jpg',NULL,NULL,0,'2024-11-13 17:30:02','2025-01-31 10:57:14'),(3,2,'Slides/xWaimxOTCXroCfv2zi43cNdvTKefpWZNq7Jz4aNr.jpg',NULL,NULL,0,'2024-12-13 09:38:29','2025-01-31 10:57:10');
/*!40000 ALTER TABLE `slides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_members`
--

DROP TABLE IF EXISTS `staff_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff_members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` text NOT NULL,
  `profile_picture` varchar(191) NOT NULL DEFAULT 'public/profile_pictures/blank-profile.png',
  `role` enum('editor','moderator','super_admin') NOT NULL DEFAULT 'editor',
  `first_login` datetime DEFAULT NULL,
  `suspended` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `staff_members_name_unique` (`name`),
  UNIQUE KEY `staff_members_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_members`
--

LOCK TABLES `staff_members` WRITE;
/*!40000 ALTER TABLE `staff_members` DISABLE KEYS */;
INSERT INTO `staff_members` VALUES (1,'Dev Department','amandasafoura56@gmail.com','eyJpdiI6ImRVMFUzdnZnSkpRaEdLS3M0UzkvalE9PSIsInZhbHVlIjoibGZuMmRwU01IKzl5ZkZad3o3WE9NZz09IiwibWFjIjoiNWU5MjFjYzk5MGI2NDI0NmFhOGQ2YzIxNmU5ZjBlMDYyOTExY2EyMzQyNDlhYmMyZjg1MDdlNjVmYjFiNWZkNiIsInRhZyI6IiJ9','public/profile_pictures/blank-profile.png','super_admin','2024-11-12 18:55:53',0,NULL,'2024-11-12 18:50:36','2024-12-11 10:45:15'),(2,'Kalvin','commu_manag@grandpublic.online','eyJpdiI6ImtYNHVkTU9rd1ZTZVZFSi8ybGdOTVE9PSIsInZhbHVlIjoiV3pCdE1PSnhOdlFydlBvcnpxakw2d1lBWlFWOElNYjhuQTMra3owVzJ5c3ZxelMwdmNLWWo1dUJKKzFKOGMxSSIsIm1hYyI6IjlkNDkxMjUyYTg3ZjAwMjdkYTcwNGExMGM2ZmMxN2E1NGM5ZmY2NjVmZTA2ZDEyZWYzYmRhZGU4NDc5ZGNkNjgiLCJ0YWciOiIifQ==','public/profile_pictures/blank-profile.png','editor','2024-12-11 10:45:54',0,NULL,'2024-12-11 10:44:52','2024-12-11 10:45:54'),(3,'Augustin','augustin@grandpublic.online','eyJpdiI6Im9KNWpsN2xWN0lERkhEZ3dVOEFSZGc9PSIsInZhbHVlIjoic0FMUlBUZEpFZzVsQXJIdDUwVU5EV25QTXBreENDTjdNWEN4UFI1cnJOdz0iLCJtYWMiOiJlZTk3OTBhNmY5ZTYyODRkMjM2ZDc0ZWIxODJiYTU4ZDEyM2U1NjdhYTMzZDViYWViN2I0YjkyOTg5NmQyYmEwIiwidGFnIjoiIn0=','public/profile_pictures/blank-profile.png','editor','2024-12-18 14:55:31',0,NULL,'2024-12-18 14:31:24','2024-12-18 14:55:31');
/*!40000 ALTER TABLE `staff_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `short_description` mediumtext NOT NULL,
  `duration` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
INSERT INTO `subscriptions` VALUES (1,'Mensuel','Accès illimité à tous nos services pendant 30 jours.',1,1000.00,'2024-11-20 15:10:33','2024-11-20 15:11:36'),(2,'Trimestriel','Économisez 10% par rapport au plan mensuel et profitez de 90 jours d’accès complet.',3,3000.00,'2024-11-20 15:12:12','2024-11-20 15:12:12'),(3,'Annuel','Économisez 25% par rapport au plan mensuel et bénéficiez d’une année complète d’exclusivité.',12,10000.00,'2024-11-20 15:12:52','2024-11-20 15:12:52');
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_messages`
--

DROP TABLE IF EXISTS `user_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `user_messages_user_id_foreign` (`user_id`),
  CONSTRAINT `user_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_messages`
--

LOCK TABLES `user_messages` WRITE;
/*!40000 ALTER TABLE `user_messages` DISABLE KEYS */;
INSERT INTO `user_messages` VALUES (1,NULL,'HenryMax','ebojajuje04@gmail.com','Hæ, ég vildi vita verð þitt.','2024-12-18 01:46:15','2024-12-18 01:46:15',NULL,0),(2,NULL,'Amou','henocamou06@gmail.com','Bonjour !','2024-12-18 10:04:42','2024-12-18 10:06:48',NULL,0),(3,NULL,'FreyaMax','yawiviseya67@gmail.com','Zdravo, htio sam znati vašu cijenu.','2024-12-18 17:42:04','2024-12-18 17:42:04',NULL,0),(4,NULL,'OliverMax','ibucezevuda439@gmail.com','Hi, მინდოდა ვიცოდე თქვენი ფასი.','2024-12-20 00:38:00','2024-12-20 10:49:02',NULL,1),(5,NULL,'JohnMax','arikerer278@gmail.com','Ողջույն, ես ուզում էի իմանալ ձեր գինը.','2024-12-30 17:24:14','2024-12-30 17:24:14',NULL,0),(6,NULL,'TedMax','moqagides18@gmail.com','Hola, quería saber tu precio..','2024-12-31 23:46:53','2024-12-31 23:46:53',NULL,0),(7,NULL,'LeoMax','ibucezevuda439@gmail.com','Hi, ego volo scire vestri pretium.','2025-01-02 17:05:44','2025-01-02 17:05:44',NULL,0),(8,NULL,'Amandaadvologs2','amandaSeksoutsa@gmail.com','J\'attendais de sentir ton contact ready prêt? -  https://rb.gy/es66fc?Buby','2025-01-13 04:39:22','2025-01-13 04:39:22',NULL,0),(9,NULL,'Mozelle','info@stainforth.caredogbest.com','Hi there \r\n\r\nI wanted to reach out and let you know about our new dog harness. It\'s really easy to put on and take off - in just 2 seconds - and it\'s personalized for each dog. \r\nPlus, we offer a lifetime warranty so you can be sure your pet is always safe and stylish.\r\n\r\nWe\'ve had a lot of success with it so far and I think your dog would love it. \r\n\r\nGet yours today with 50% OFF: https://caredogbest.com\r\n\r\nFREE Shipping - TODAY ONLY! \r\n\r\nThe Best, \r\n\r\nMozelle','2025-01-17 05:03:55','2025-01-17 05:03:55',NULL,0),(10,NULL,'Charli','info@bacote.medicopostura.com','Morning \r\n\r\nLooking to improve your posture and live a healthier life? Our Medico Postura™ Body Posture Corrector is here to help!\r\n\r\nExperience instant posture improvement with Medico Postura™. This easy-to-use device can be worn anywhere, anytime – at home, work, or even while you sleep.\r\n\r\nMade from lightweight, breathable fabric, it ensures comfort all day long.\r\n\r\nGrab it today at a fantastic 60% OFF: https://medicopostura.com\r\n\r\nPlus, enjoy FREE shipping for today only!\r\n\r\nDon\'t miss out on this amazing deal. Get yours now and start transforming your posture!\r\n\r\nEnjoy, \r\n\r\nCharli','2025-01-23 00:08:51','2025-01-23 00:08:51',NULL,0),(11,NULL,'Mike Jozef Taylor','info@speed-seo.net','Hi, \r\n \r\nCurious about how your website is performing? Discover its strengths and weaknesses with our Free SEO Check Tool! In just 2 minutes, you’ll get a detailed analysis of your website’s SEO health and actionable insights to help improve your rankings. \r\n \r\nTake the first step towards better performance and growth. \r\n \r\nRun Your Free SEO Check Now \r\nhttps://www.speed-seo.net/check-site-seo-score/ \r\n \r\nDon’t let overlooked SEO issues hold you back. Optimize your site today and stay ahead of the competition! \r\n \r\nBest regards, \r\n \r\n \r\nMike Jozef Taylor\r\n \r\nSpeed SEO \r\nWhatsapp us: https://www.speed-seo.net/whatsapp-with-us/','2025-01-26 07:39:22','2025-01-26 07:39:22',NULL,0),(12,NULL,'Luis Alves','intl.law7@aol.com','Dear Sir/Madam, \r\nIt is my utmost desire in engaging this moment to introduce to you myself as well our Firm. \r\nMy name is Luis Alves, a private investment Consultant. I\'m contacting you to inquire if your company welcomes investors, as we currently offer business finance loans to companies and corporate businesses that need funding to execute their projects. \r\nWe carry out disposals, acquisitions, and financing of companies from USD 10 million up to USD 1 Billion with an APR of 2% per annum. \r\nIf you have a viable business seeking for quick Loan or Funding Partners, kindly get in touch as I look forward to your thoughtful response. \r\nPlease reach out to me, through this following email: luisalves@izafinconsultant.com if you need further details about the funding scheme. \r\nBest regards, \r\nMr. Luis Alves. \r\nE-mail: luisalves@izafinconsultant.com','2025-02-04 21:32:28','2025-02-04 21:32:28',NULL,0),(13,NULL,'TedMax','moqagides18@gmail.com','Hola, volia saber el seu preu.','2025-02-05 19:27:42','2025-02-05 19:27:42',NULL,0),(14,NULL,'Kristen','info@blakemore.bangeshop.com','Morning, \r\n\r\nI hope this email finds you well. I wanted to let you know about our new BANGE backpacks and sling bags that just released.\r\n\r\nBange is perfect for students, professionals and travelers. The backpacks and sling bags feature a built-in USB charging port, making it easy to charge your devices on the go.  Also they are waterproof and anti-theft design, making it ideal for carrying your valuables.\r\n\r\nBoth bags are made of durable and high-quality materials, and are perfect for everyday use or travel.\r\n\r\nOrder yours now at 50% OFF with FREE Shipping: http://bangeshop.com\r\n\r\nBest Wishes,\r\n\r\nKristen','2025-02-09 20:27:05','2025-02-09 20:27:05',NULL,0),(15,NULL,'Tina Toth','alegriasocialmanagement@outlook.com','Hello, \r\nI hope you\'re well! I’m Tina, the founder of Alegria Social, a marketing agency specializing in organic social media growth based in Miami and Dubai. With over nine years of experience and a personal following of 1 million, I’m confident we can help your brand achieve its goals. \r\nI recently reviewed your Instagram profile and noticed great potential, but also some challenges in audience growth and engagement. That’s where we can assist! \r\nWe’ve helped over 250 brands boost sales, followers, and brand awareness, including clients who have collaborated with high-profile figures like Halle Berry. I’m confident we can bring similar success to your brand too. \r\nWe offer a range of Social Media Account Management packages, including: \r\n \r\n1. Instagram Account Management: 25 posts and 25-50 stories for $750/month. \r\n2. Multi-Account Management: Up to 3 accounts (Pinterest, Instagram, Facebook, TikTok, or Twitter) with 25 posts each for $1200/month. \r\nAll packages include the following services: \r\nContent Strategy: \r\n•  Content Calendar: Plan and schedule engaging posts in advance. \r\n•  Diverse Content: Use a mix of text, images, videos, and infographics. \r\n•  Hashtags: Incorporate relevant keywords for better discoverability. \r\nAnalytics: \r\n•  Monitoring: Analyze performance data to refine strategies. \r\n•  A/B Testing: Test different content types and posting times for optimal results. \r\nEngagement: \r\n•  Responses: Provide timely, personalized replies to comments and messages. \r\n•  Community Building: Encourage user-generated content and participate in conversations. \r\nBrand Voice and Identity: \r\n•  Consistency: Maintain a unified brand voice and visual identity. \r\n•  Authenticity: Foster trust through genuine communication. \r\nTrends and Innovations: \r\n•  Stay Updated: Monitor trends and adapt strategies accordingly. \r\n•  Adopt New Features: Embrace tools like Instagram Reels and TikTok trends. \r\nEnclosed is a media kit detailing our services, along with \'before\' and \'after\' results from our Social Media Management within one month. \r\n \r\nWould you be open to a quick Zoom call in the next few days? I’d love to discuss how we can help grow your brand. If you are interested, please email me at marketing@alegriasocial.com, so we can arrange the call. \r\nBest regards, \r\nTina Toth \r\nFounder, Alegria Social \r\nInstagram: @laelegantia','2025-02-14 13:13:24','2025-02-14 13:13:24',NULL,0),(16,NULL,'Edmundo','info@tillyard.pawtrim.shop','Good Morning \r\n \r\nIs your dog\'s nails getting too long? If you\'re tired of going to the vet or groomer to get them trimmed, why not try PawSafer™? \r\nWith PawSafer™, you can trim your dog\'s nails from the comfort of your own home, and it only takes a few minutes!\r\n\r\nPawSafer™ is the safest and most convenient way to trim your dog\'s nails, and it\'s very affordable. \r\n\r\nGet it while it\'s still 50% OFF + FREE Shipping\r\n\r\nBuy here: https://pawtrim.shop\r\n \r\nBest regards, \r\n \r\nEdmundo','2025-02-15 10:28:23','2025-02-15 10:28:23',NULL,0),(17,NULL,'ByPalt','brosjonson@mail.ru','I didnвЂ™t believe it until I saw it myself вЂ“ a site that shows girls near you who are ready to chat. Curious?  - https://d.webtune.space/ \r\n \r\nHePalt','2025-02-15 23:13:31','2025-02-15 23:13:31',NULL,0),(18,NULL,'JohnMax','yawiviseya67@gmail.com','Ciao, volevo sapere il tuo prezzo.','2025-02-20 00:09:22','2025-02-20 00:09:22',NULL,0),(19,NULL,'Valeron83Vop','romabookim@gmail.com','Hello. \r\nEmbrace the excitement of daily opportunities to win big. With fresh games and promotions, each day brings a new adventure in luck!  https://rakoolink.com/h24acf65c','2025-03-01 17:44:08','2025-03-01 17:44:08',NULL,0),(20,NULL,'RaymondSwork','raymondarroste@gmail.com','What’s up? grandpublic.online \r\n \r\n \r\n  \r\n \r\n \r\n \r\nThe cost of sending one million messages is $59. \r\n \r\nThis letter is automatically generated. \r\n \r\nContact us. \r\nTelegram - https://t.me/FeedbackFormEU \r\nSkype  live:contactform_18 \r\nWhatsApp - +375259112693 \r\nWhatsApp  https://wa.me/+375259112693 \r\nWe only use chat for communication.','2025-03-02 20:24:56','2025-03-02 20:24:56',NULL,0),(21,NULL,'GeorgeMax','ocopesuq299@gmail.com','Здравейте, исках да знам цената ви.','2025-03-05 22:01:04','2025-03-05 22:01:04',NULL,0),(22,NULL,'TedMax','ocopesuq299@gmail.com','Ciao, volevo sapere il tuo prezzo.','2025-03-06 02:11:36','2025-03-06 02:11:36',NULL,0),(23,NULL,'TedMax','ocopesuq299@gmail.com','Aloha, makemake wau eʻike i kāu kumukūʻai.','2025-03-11 15:25:32','2025-03-11 15:25:32',NULL,0),(24,NULL,'MichaelKat','nomin.momin+492m8@mail.ru','Nfwhdkjdwj rdqskwjfej wkdwodkwkifjejr okeowjrfiejfiej rowjedowkrfiejfi jrowkorwkjrfejfi jorkdworefoijfeijfowek okdwofjiejgierjfoe grandpublic.online','2025-03-20 09:20:18','2025-03-20 09:20:18',NULL,0),(25,NULL,'Mike Sven-Erik De Vries','info@professionalseocleanup.com','Maybe you`re not aware of this, but grandpublic.online  has a dangerous number of links pointing to it. \r\n \r\nWe can help: \r\nhttps://www.professionalseocleanup.com/ \r\nMike Sven-Erik De Vries\r\n \r\ninfo@professionalseocleanup.com \r\nPhone/WhatsApp: +1 (833) 454-8622 \r\nhttps://www.professionalseocleanup.com/whatsapp/','2025-03-29 06:42:23','2025-03-29 06:42:23',NULL,0),(26,NULL,'Acasannodia','y.a.n.v.o.ro.b.e.y9.4@gmail.com','Want to locate a trusted virtual gaming platform? <a href=https://prof-casino.com/>https://prof-casino.com</a> shines with its convenient structure. Visitors globally have faith in this venue for its fairness and thrilling game selection.','2025-04-10 01:38:12','2025-04-10 01:38:12',NULL,0),(27,NULL,'HenryMax','zekisuquc419@gmail.com','Hi, ego volo scire vestri pretium.','2025-04-24 07:18:40','2025-04-24 07:18:40',NULL,0);
/*!40000 ALTER TABLE `user_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_subscriptions`
--

DROP TABLE IF EXISTS `user_subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_subscriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `amount_paid` decimal(8,2) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_subscriptions_user_id_foreign` (`user_id`),
  CONSTRAINT `user_subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_subscriptions`
--

LOCK TABLES `user_subscriptions` WRITE;
/*!40000 ALTER TABLE `user_subscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(191) DEFAULT NULL,
  `google_id` varchar(191) DEFAULT NULL,
  `facebook_id` varchar(191) DEFAULT NULL,
  `terms_accepted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_name` varchar(191) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Safoura','amandasafoura56@gmail.com','$2y$10$UvQilOCLYNJdVrsAw5dFKO9WDxl.EWlTM1Ud9vYx3YyYQMEy1Z8w6','PsMvy38i4coIrxAhCF8wcOEIbsPK4yTYwtjN8kstRu09gq2mlSa9WSKfL0Vx',NULL,NULL,0,'2024-11-12 19:18:12','2024-11-12 19:18:52','Amanda','2024-11-12 19:18:52'),(2,'Hénoc','henocamou06@gmail.com','$2y$10$0TEJpN1unhphlTtPue/B9eAVK0RwROmyW92Tr9Cs7HDiFAoSDJAq.','U0wMYWnPEJaZyQu33Yot3EQNrWAaaqBNRyDGq5UHQg09a4xlUkqjE9anq1DC',NULL,NULL,0,'2024-11-13 10:49:04','2024-12-20 10:25:54','Amou','2024-11-13 10:54:35'),(3,'Hénoc','henocamou229@gmail.com','$2y$10$qDHGjyJUjEhHPYZ4WZIhjeqLKuCA2rCnCTXHbyxHXG/iKxWRdnfRO',NULL,NULL,NULL,0,'2024-11-24 12:29:41','2024-11-24 12:29:41','Amou',NULL),(4,'Safoura','test@maxmagic.com','$2y$10$yyK9ASlUikG7uuyiaWrdEOREtVT5sTDmQ8PzYgxOpQ0Gj1IwR6sgK',NULL,NULL,NULL,0,'2024-12-13 16:58:50','2024-12-13 16:58:50','Amanda',NULL),(5,'Safoura','amanda@dev.com','$2y$10$fgrO/68//IAA5KaLJSxAzuwFLZrvqmfnPTFVPlp2HEijU4fNLYLRK',NULL,NULL,NULL,0,'2024-12-27 12:25:24','2024-12-27 12:25:24','Amanda',NULL),(6,'Georges','georges.ayeni@epitech.eu','$2y$10$CY5fUVsxMmaUX8VRLea7EOkVGLg1/DQuhJbhHxOZOehXVrkC/xhHa',NULL,NULL,NULL,0,'2024-12-27 12:29:20','2024-12-27 12:29:20','AYENI',NULL),(7,'Georges','ayenigeorgepierre@gmail.com','$2y$10$.hVO3gAWNLDyaWUHQvW0MOKIWshvPikc566enZriCeA5n1EFFDdSy',NULL,NULL,NULL,0,'2024-12-29 00:09:44','2025-01-22 11:53:27','AYENI',NULL),(8,'Liz','lsbthayeni@gmail.com','$2y$10$Iifd/DbVdaX6MPvL2DdC2OkqKv1WBPNdLXA9Y6HwLorZWnAj19XuK',NULL,NULL,NULL,0,'2025-01-22 11:56:33','2025-01-22 11:57:12','AY','2025-01-22 11:57:12'),(9,'Safoura','amanda@testeur.com','$2y$10$7ifReK3ExHPNbkwWWa47L.JrsiltCm0fRh6cz1ZOGvkiDGfzFy4CO',NULL,NULL,NULL,0,'2025-01-22 14:17:40','2025-01-22 14:17:40','Amanda',NULL),(12,'Georges','georges.a@dev.com','$2y$10$tiWGiSnCcGgZgFguYQ7YMO3eJ6wkHAgZiOamGaChCx3S5ApKZULR2',NULL,NULL,NULL,0,'2025-01-22 14:56:39','2025-01-22 14:56:39','Ayéni','2025-01-22 15:49:00'),(13,'Georges','lshbthayeni@gmail.com','$2y$10$DC907REeJToEWaCf8fEXgeqQ1dSeUVG96ZQ.AK5RJKByu.H7CzPbO',NULL,NULL,NULL,0,'2025-01-23 04:21:01','2025-01-23 04:21:01','AYENI',NULL),(14,'ayeni','mail@mail.com','$2y$10$xeSv9W3D6zqD289TjSGr6OPnun9/.6eIT31NVBj7n6NWZfJa3vyD2',NULL,NULL,NULL,0,'2025-01-23 05:27:51','2025-01-23 05:27:51','Georges',NULL),(15,'Hans','kaetonhanschris@gmail.com','$2y$10$AgPrSu1yuccq9wwiCfZFuOtKcUn6PIlN8u0kJ5q4.LerGJ4x/bvRu',NULL,NULL,NULL,0,'2025-02-27 07:48:52','2025-02-27 07:48:52','DOSSOU',NULL),(16,'AYENI','admin@mail.com','$2y$10$beJwR86z3bAMw50Ho6V8xeazn4HIG3JGd0e.MD2p9xEHYS5.bT9hu',NULL,NULL,NULL,0,'2025-02-27 08:43:36','2025-02-27 08:43:36','Georges',NULL),(17,'Georges','georges@dev.com','$2y$10$GhTnTXNmLmbGaPokfLPj6etkeNIIcI5pTqjGsd/Qjni7.3wr4s.ni',NULL,NULL,NULL,0,'2025-02-27 08:45:39','2025-02-27 08:45:39','Ayéni',NULL),(18,'Georges','georgesa@dev.com','$2y$10$Bu.Di0ejEZBFwqgFt4zVWuFIOfMoUGY3iaPjeLRjshi.9Kvrvjp0W',NULL,NULL,NULL,0,'2025-02-27 13:30:25','2025-02-27 13:30:25','Ayéni',NULL),(19,'AYENI','yakede8226@apklamp.com','$2y$10$NhcEDMR5cBt1APJt0NQhEureJ8A8veyCXqwtkgycgXLVKQP.oUz9u',NULL,NULL,NULL,0,'2025-03-06 10:49:43','2025-03-06 10:49:43','Georges',NULL),(20,'Georges','georgesay@dev.com','$2y$10$L6viPqA3tvyGSg3PvROhxexjRIhB3yFRkz3VQLuISKp6pezIPuVV.',NULL,NULL,NULL,0,'2025-03-06 10:54:44','2025-03-06 10:54:44','Ayéni',NULL),(21,'Hénoc','henocamou@gmail.com','$2y$10$JBr8Iu3UKP3Fd1FZJtB6T.KlQLK8d5h2FxXy50K43H23T0xNHDcLm',NULL,NULL,NULL,0,'2025-03-16 11:25:05','2025-03-16 11:25:05','Amou',NULL),(22,'Receive Bitcoin Cash. $13133 Available Now\r\n >>> https://t.me/+k5dh54j  #Lolllukazzzur333\r\n <<< 85292268','hru10@kirzzioh.store','$2y$10$ENB.jAMeKekSgYYNFOpxEOgARsrcMvl5vpqjP32W1zYkz8Z.JC1xu',NULL,NULL,NULL,0,'2025-03-18 16:24:56','2025-03-18 16:24:56','Receive Bitcoin Cash. $13133 Available Now\r\n >>> https://t.me/+k5dh54j  #Lolllukazzzur333\r\n <<< 85292268',NULL),(23,'Unlock Bitcoin Payments. $11572 Ready To Claim\r\n >>> https://t.me/+b872s4m  #Lolllukazzzur333\r\n <<< 22014159','hru8@kirzzioh.store','$2y$10$CoiX7iBkmpu/1eOrn6tUI..VUYKQgwgLcWPwV2Cr8xj8N7qCndoIq',NULL,NULL,NULL,0,'2025-03-19 20:53:45','2025-03-19 20:53:45','Unlock Bitcoin Payments. $11572 Ready To Claim\r\n >>> https://t.me/+b872s4m  #Lolllukazzzur333\r\n <<< 22014159',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video_categories`
--

DROP TABLE IF EXISTS `video_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `video_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `video_categories_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video_categories`
--

LOCK TABLES `video_categories` WRITE;
/*!40000 ALTER TABLE `video_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `video_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `videos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `youtube_id` varchar(191) NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(400) NOT NULL,
  `description` text DEFAULT NULL,
  `premium_video` tinyint(1) NOT NULL DEFAULT 0,
  `single_price` double(8,2) DEFAULT NULL,
  `date_time_to_offer_free_access` datetime DEFAULT NULL,
  `publication_date` datetime NOT NULL,
  `video_thumbnail` varchar(191) DEFAULT NULL,
  `video_preview` varchar(191) DEFAULT NULL,
  `highlighted` tinyint(1) NOT NULL DEFAULT 0,
  `category` varchar(191) NOT NULL,
  `video_creator_id` bigint(20) unsigned NOT NULL,
  `views` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `videos_youtube_id_unique` (`youtube_id`),
  UNIQUE KEY `videos_title_unique` (`title`),
  UNIQUE KEY `videos_slug_unique` (`slug`),
  KEY `videos_video_creator_id_foreign` (`video_creator_id`),
  KEY `videos_highlighted_index` (`highlighted`),
  KEY `videos_premium_video_index` (`premium_video`),
  CONSTRAINT `videos_video_creator_id_foreign` FOREIGN KEY (`video_creator_id`) REFERENCES `staff_members` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (15,'wP2YTxYDuMM','Epouser la femme de son défunt frère, est-ce une bonne pratique ?','epouser-la-femme-de-son-defunt-frere-est-ce-une-bonne-pratique',NULL,0,NULL,NULL,'2024-12-18 15:01:00','https://img.youtube.com/vi/wP2YTxYDuMM/maxresdefault.jpg','',1,'opinion',3,12,'2024-12-18 15:01:48','2025-02-11 10:38:53'),(16,'Qzcr2SjfStw','CHADO JAPON CONFIRME SA PRESENCE SUR COTONOU DRIP','chado-japon-confirme-sa-presence-sur-cotonou-drip',NULL,0,NULL,NULL,'2024-12-19 18:26:00','https://img.youtube.com/vi/Qzcr2SjfStw/maxresdefault.jpg','',1,'events',3,14,'2024-12-19 18:26:17','2025-01-29 18:01:58'),(18,'R6-ZRscEpBg','BENIN : CHILL&GROOVE, L\'EVENEMENT DE L\'ANNÉE QUI A RASSEMBLÉ LES MEILLEURS DJ','benin-chillgroove-levenement-de-lannee-qui-a-rassemble-les-meilleurs-dj',NULL,0,NULL,NULL,'2024-12-24 17:50:16','https://img.youtube.com/vi/R6-ZRscEpBg/maxresdefault.jpg','',0,'events',3,7,'2024-12-24 17:50:16','2025-02-05 14:47:14'),(19,'oQQ3Pq2vmlo','NOUVELLES REACTIONS APRÈS LE DÉCÈS DES ARTISTES PRAOUDA ET SEMEVO','nouvelles-reactions-apres-le-deces-des-artistes-praouda-et-semevo',NULL,0,NULL,NULL,'2025-01-07 17:49:53','https://img.youtube.com/vi/oQQ3Pq2vmlo/maxresdefault.jpg','',0,'opinion',3,7,'2025-01-07 17:49:53','2025-02-18 10:46:16'),(20,'n4i_MvsL5VY','🥰Qui est CHADO JAPON, le Japonais qui maîtrise la culture béninoise ?','qui-est-chado-japon-le-japonais-qui-maitrise-la-culture-beninoise',NULL,0,NULL,NULL,'2025-01-16 14:31:37','https://img.youtube.com/vi/n4i_MvsL5VY/maxresdefault.jpg','',0,'portrait',3,6,'2025-01-16 14:31:37','2025-03-06 13:24:26'),(21,'Bc3gqaLWKL8','Ce que vous ne savez pas de DJECOMON, le poulain de legend Beatz','ce-que-vous-ne-savez-pas-de-djecomon-le-poulain-de-legend-beatz',NULL,0,NULL,NULL,'2025-01-23 11:05:08','https://img.youtube.com/vi/Bc3gqaLWKL8/maxresdefault.jpg','',0,'portrait',3,3,'2025-01-23 11:05:08','2025-03-08 12:17:07'),(22,'kLlCWrOpMhQ','DEM\'S BALTHAZAR LAISSE UN MESSAGE À NIKANOR ET VANO BABY 🥰','dems-balthazar-laisse-un-message-a-nikanor-et-vano-baby',NULL,0,NULL,NULL,'2025-01-29 17:19:25','https://img.youtube.com/vi/kLlCWrOpMhQ/maxresdefault.jpg','',0,'portrait',3,6,'2025-01-29 17:19:25','2025-02-24 17:54:07'),(23,'3shs6DYjXtY','DAME BEATRICE, VICTIME DE PRATIQUES OBSCURES DÈS SON JEUNE ÂGE.','dame-beatrice-victime-de-pratiques-obscures-des-son-jeune-age','Cette Dame, victime de pratiques obscures, s\'est vue amputer de ses membres dès son jeune âge. Aujourd\'hui, elle s\'en remet à la générosité des donateurs pour pouvoir survivre avec ses enfants. \r\nDécouvrez à travers cette vidéo la triste histoire de Dame Béatrice.😲',0,NULL,NULL,'2025-02-03 15:56:20','https://img.youtube.com/vi/3shs6DYjXtY/maxresdefault.jpg','',0,'insolite',3,5,'2025-02-03 15:56:20','2025-02-19 16:42:45'),(25,'um8KJBRsj6Y','LE FInaB DE CETTE ANNÉE S\'ANNONCE FORT AVEC UN PREMIER SWOWCASE EXPLOSIF.','le-finab-de-cette-annee-sannonce-fort-avec-un-premier-swowcase-explosif','🥰Le FInaB de cette année s\'annonce fort avec un premier showcase explosif. \r\nPréparez-vous à vivre du 21février au 02Mars 2025 au palais des congrès de cotonou, la grande fête des arts africains.',0,NULL,NULL,'2025-02-04 20:08:43','https://img.youtube.com/vi/um8KJBRsj6Y/maxresdefault.jpg','',0,'events',3,9,'2025-02-04 20:08:43','2025-02-08 00:58:29'),(26,'2E9XeY7VsIY','HÉLÈNE : PLAIDOYER POUR L\'ENSEIGNEMENT DE LA PENSÉE CRITIQUE PAR LES HUMANITÉS : LE NOUVEAU CHEF D\'OEUVRE DE L\'AUTEUR GERALDO GOMEZ.','helene-plaidoyer-pour-lenseignement-de-la-pensee-critique-par-les-humanites-le-nouveau-chef-doeuvre-de-lauteur-geraldo-gomez','Parlons #littérature. \r\n HÉLÈNE : PLAIDOYER POUR L\'ENSEIGNEMENT DE LA PENSÉE CRITIQUE PAR LES HUMANITÉS, c\'est le nouveau chef d\'œuvre de l\'auteur Géraldo Gomez. Ce livre, lancé ce 30 #janvier 2025 à la #librairie notre Dame de GANHI devant un parterre de personnalités, est une incitation à l\'utilisation de la pensée critique; laquelle nous aide constamment à faire appel à notre sens d\'analyse et d\'évaluation.',0,NULL,NULL,'2025-02-10 16:33:00','https://img.youtube.com/vi/2E9XeY7VsIY/maxresdefault.jpg','',0,'events',3,4,'2025-02-10 16:33:17','2025-02-13 20:09:28'),(27,'ouJqdQmiNiM','LES SHOWCASES SE POURSUIVENT POUR LE COMPTE DU FINAB 2025','les-showcases-se-poursuivent-pour-le-compte-du-finab-2025','Les #showcases de ouf se poursuivent pour le compte du FINAB 2025.\r\nVenez vivre avec nous du 21février au 02Mars 2025 au palais des congrès de #Cotonou, la grande fête des #arts africains.',0,NULL,NULL,'2025-02-11 12:37:43','https://img.youtube.com/vi/ouJqdQmiNiM/maxresdefault.jpg','',0,'events',3,12,'2025-02-11 12:37:43','2025-02-14 09:25:01'),(29,'Z-P7RJz88KM','DECES DE WILY MIGNON : REACTIONS D\'ACTEURS CULTURELS','deces-de-wily-mignon-reactions-dacteurs-culturels','Les acteurs du monde culturel au Bénin ont réagi au tragique décès de l\'artiste Wily MIGNON. Pour eux, le showbiz béninois vient de perdre une légende.',0,NULL,NULL,'2025-02-20 18:49:12','https://img.youtube.com/vi/Z-P7RJz88KM/maxresdefault.jpg','',0,'opinion',3,1,'2025-02-20 18:49:12','2025-02-20 18:49:48'),(30,'IjfxVFTPVSA','BSA 2025 : AXEL MERRYL ENTRE EN POSSESSION DE SA PARCELLE','bsa-2025-axel-merryl-entre-en-possession-de-sa-parcelle','🥰Lauréat des catégories \r\n-meilleur nouvel artiste africain 2024 \r\n-meilleur Artiste de l’année 2024, Axel Merryl, grâce à la transparence dont fait preuve Bénin Showbiz Awards , entre en possession de sa parcelle située à Grand Popo. La signature des actes de donation avec le partenaire Société Gescia-Benin a eu lieu ce Jeudi 20 février 2025, seulement une semaine après la cérémonie officielle des distinctions. Un grand bravo au commissaire général des BSA @Amoulé Ousmane officiel pour son dynamisme.',0,NULL,NULL,'2025-02-21 14:37:50','https://img.youtube.com/vi/IjfxVFTPVSA/maxresdefault.jpg','',0,'events',3,3,'2025-02-21 14:37:50','2025-02-27 10:19:30'),(31,'lPNdvcTl6Io','LA 3ème ÉDITION DU FInAB OFFICIELLEMENT LANCÉE','la-3eme-edition-du-finab-officiellement-lancee','Le Festival International des Arts du Bénin FInAB est à sa troisième édition. La cérémonie d\'ouverture a eu lieu ce  vendredi 21 Février 2025 dans la salle rouge du palais des congrès de Cotonou en présence de plusieurs personnalités étatiques, culturelles et cinématographiques.',0,NULL,NULL,'2025-02-27 11:31:07','https://img.youtube.com/vi/lPNdvcTl6Io/maxresdefault.jpg','',0,'events',3,0,'2025-02-27 11:31:07','2025-02-27 11:31:07'),(32,'4WY7l12PHh0','KS BLOOM SUR LE FESTIVAL INTERNATIONAL DES ARTS DU BÉNIN','ks-bloom-sur-le-festival-international-des-arts-du-benin','Le Festival International des Arts du Bénin FInAB reste un condensé de spectacles et de découvertes d\'arts. C\'est une porte de révélation de talents artistiques et de richesses culturelles béninoise et africaine. Nous revenons à travers cette vidéo sur les prestations artistiques du ballet national de la guinée, de Ks Bloom , de  Didier Awadi  de Didolanvi Félix et bien d\'autres...',0,NULL,NULL,'2025-02-27 13:42:43','https://img.youtube.com/vi/4WY7l12PHh0/maxresdefault.jpg','',0,'events',3,0,'2025-02-27 13:42:43','2025-02-27 13:42:43'),(33,'NDJMK6wi3Pg','LES VÉRITÉS CRUES DE CRISBA SUR SON TITRE NUMERO UNO','les-verites-crues-de-crisba-sur-son-titre-numero-uno','Crisba : J\'ai été validé par les plus grands du pays, Blaaz Officiel, Amir El Presidente, NASTY NESTA Dibi Dobo Officiel etc... J\'ai été validé par les artistes ivoiriens, Tenor au #Cameroun 🥰\r\nLes Vérités crues du #numerouno 🥰',0,NULL,NULL,'2025-02-27 14:47:42','https://img.youtube.com/vi/NDJMK6wi3Pg/maxresdefault.jpg','',0,'opinion',3,0,'2025-02-27 14:47:42','2025-02-27 14:47:42'),(34,'lR87ImKeB-k','PRESTATION DE SERGE BEYNAUD, GHIX ET X-TIME SUR LE FInAB','prestation-de-serge-beynaud-ghix-et-x-time-sur-le-finab','#ADJAPIANO traverse les frontières. 🥰\r\nRevivez cette prestation époustouflante de GHIX Officiel, X-Time et Serge Beynaud sur le podium du FInAB. 😍',0,NULL,NULL,'2025-03-04 12:20:02','https://img.youtube.com/vi/lR87ImKeB-k/maxresdefault.jpg','',0,'events',3,2,'2025-03-04 12:20:02','2025-03-04 20:38:40'),(35,'1mOveXDJC4o','LES VÉRITÉS DE NIKA DJ SUR LE ADJAPIANO DU BENIN','les-verites-de-nika-dj-sur-le-adjapiano-du-benin','Présent au FInAB qui s\'est déroulé du 21 Février au 02 Mars 2025, NIKA DJ a livré ses impressions par rapport au rythme ADJAPIANO actuellement en vogue au Bénin',0,NULL,NULL,'2025-03-05 15:34:26','https://img.youtube.com/vi/1mOveXDJC4o/maxresdefault.jpg','',0,'opinion',3,2,'2025-03-05 15:34:26','2025-03-20 12:47:56'),(36,'k3O0-eYPHkk','PRESTATION DE KS BLOOM SUR LE FInAB','prestation-de-ks-bloom-sur-le-finab','Présent sur le FInAB qui s\'est déroulé du 21 février au 02 Mars 2025 au palais des congrès de Cotonou, KS BLOOM a livré un spectacle impressionnant.',0,NULL,NULL,'2025-03-06 15:05:38','https://img.youtube.com/vi/k3O0-eYPHkk/maxresdefault.jpg','',0,'events',3,2,'2025-03-06 15:05:38','2025-03-07 19:42:50'),(37,'PX-FuXdU0vg','ADJAPIANO, FAUT-IL CHANGER LE NOM? L\'AVIS DU MANAGER DE SESSIME','adjapiano-faut-il-changer-le-nom-lavis-du-manager-de-sessime','ADJAPIANO, à l\'instar de TCHINK SYSTEM, SOYOYO ou encore NOUDJIHOU, s\'impose depuis peu dans l\'arène musicale béninoise. Porté par les artiste GHIX et X-TIME, tous deux originaires de ADJA, ce rythme est parti pour devenir une identité du Bénin. Mais le préfixe ADJA constitue un frein pour certains artistes qui se sentent exclus du fait qu\'ils ne viennent pas de ADJA. Le Manager de l\'artiste Sessimè a donné son avis par rapport à la situation.',0,NULL,NULL,'2025-03-20 16:33:29','https://img.youtube.com/vi/PX-FuXdU0vg/maxresdefault.jpg','',0,'opinion',3,4,'2025-03-20 16:33:29','2025-03-22 17:02:25'),(38,'Ksqx6YMzAP0','SON OF GRACE : LE SPECTACLE PLUS QUE REUSSI DE PACHECO','son-of-grace-le-spectacle-plus-que-reussi-de-pacheco','Pacheco, c\'est l\'homme qui a révolutionné l\'humour béninois à travers des contenus à la fois hilarantes et éducatifs. Surnommé Monsieur Gros français pour son registre de langue souvent soutenu qu\'il utilise dans ses vidéos, il a tenu son 2ème one man show avec succès ce samedi 22 Mars 2025 dans la salle cinéma de Canal Olympia de Cotonou. Nous revenons à travers cette vidéo sur les images et impressions des invités.',0,NULL,NULL,'2025-03-24 13:45:57','https://img.youtube.com/vi/Ksqx6YMzAP0/maxresdefault.jpg','',0,'events',3,1,'2025-03-24 13:45:57','2025-03-24 13:47:48'),(39,'XG10ovNcRUw','ROXY OZOUA PARLE DE SA RELATION AVEC GHIX','roxy-ozoua-parle-de-sa-relation-avec-ghix','Amoureuse du rythme ADJAPIANO, la camerounaise Roxy OZOUA a du effectuer le déplacement pour venir voir de près l\'origine du rythme. Nous l\'avons donc prise en interview dans ce cadre. Nous avons également abordé avec elle plusieurs d\'autres points.',0,NULL,NULL,'2025-03-26 15:48:19','https://img.youtube.com/vi/XG10ovNcRUw/maxresdefault.jpg','',0,'opinion',3,1,'2025-03-26 15:48:19','2025-03-28 16:37:03'),(40,'Sy8m7T8ewG0','LA GROSSE INTERVIEW DE LIONEL KINHA, MANAGER DE SESSIME','la-grosse-interview-de-lionel-kinha-manager-de-sessime','Lionel KINHA, Manager de l\'artiste Sessimè nous dit tout sur sa relation avec l\'artiste',0,NULL,NULL,'2025-03-28 12:31:24','https://img.youtube.com/vi/Sy8m7T8ewG0/maxresdefault.jpg','',0,'opinion',3,0,'2025-03-28 12:31:24','2025-03-28 12:31:24'),(41,'LzplRgxaBnE','TOUT SUR AMIR EL PRESIDENTE, LE RAPPEUR A MULTIPLES FACETTES','tout-sur-amir-el-presidente-le-rappeur-a-multiples-facettes','Le membre influent du groupe CCC Amir el président était dans nos studios pour aborder plusieurs points relatifs au showbiz béninois notamment ses difficultés actuelles,\r\npourquoi les artistes béninois ont du mal à s\'exporter; la comédie musicale le trône de Béhanzin qui sera présentée le 18 Avril 2025 au palais des congrès de Cotonou. Les billets sur le site www.letronedebezanzin.bj',0,NULL,NULL,'2025-04-03 15:00:46','https://img.youtube.com/vi/LzplRgxaBnE/maxresdefault.jpg','',0,'portrait',3,0,'2025-04-03 15:00:46','2025-04-03 15:00:46'),(42,'kTS_1gs0fSc','TOUT SUR YEWHE YETON, PRIX DECOUVERTE RFI 2025','tout-sur-yewhe-yeton-prix-decouverte-rfi-2025','Yewhe Yeton est un artiste qui sait mettre en harmonie le traditionnel et le moderne pour créer quelque chose d\'agréable. L\'intégralité de l\'#interview à suivre dans cette vidéo\r\n🥰Prix découverte #RFI 2025, il a même un très bon spectacle le 19 Avril prochain à l\'espace Mayton à Calavi.',0,NULL,NULL,'2025-04-04 15:31:45','https://img.youtube.com/vi/kTS_1gs0fSc/maxresdefault.jpg','',0,'portrait',3,1,'2025-04-04 15:31:45','2025-04-06 15:19:11'),(43,'ysel_AWAuXM','CHANGEMENT DU NOM ADJAPIANO : L\'AVIS DE AMIR EL PRESIDENTE','changement-du-nom-adjapiano-lavis-de-amir-el-presidente','🥰L\'avis de  Amir El Presidente sur un éventuel changement du nom ADJAPIANO de GHIX Officiel et X-Time. 🥰\r\nLe concert ADJAPIANO, c\'est ce 20 Avril 2025 au Canal Olympia de Cotonou.',0,NULL,NULL,'2025-04-07 13:01:54','https://img.youtube.com/vi/ysel_AWAuXM/maxresdefault.jpg','',0,'opinion',3,1,'2025-04-07 13:01:54','2025-04-07 13:09:40'),(44,'tfcQwCnBEwU','MADANO RACONTE LES DESSOUS DU FEAT \"SWEET VANILLA\" AVEC FANICKO DE JESUS','madano-raconte-les-dessous-du-feat-sweet-vanilla-avec-fanicko-de-jesus','🥰 Madano : Fanicko, c\'est celui qui nous ouvre la voie au Bénin. Le seul à avoir percé dans l\'afrobeat. En séjour en cote d\'ivoire depuis un moment, le #docteur #Love nous a accordé une belle interview 🥰. Entre autres sujets abordés :\r\n🥰 Ce que le #ShowBiz béninois doit emprunter à celui ivoirien;\r\n🥰 Les dessous du feat avec Fanicko etc...🥰',0,NULL,NULL,'2025-04-09 15:58:41','https://img.youtube.com/vi/tfcQwCnBEwU/maxresdefault.jpg','',0,'portrait',3,2,'2025-04-09 15:58:41','2025-04-09 16:11:27'),(45,'Kjk05VYwXwo','AMBIANCE XXL AU EAT & DRINK 6.0','ambiance-xxl-au-eat-drink-60','Tout a été concocté pour un 𝗘𝗮𝘁 & 𝗗𝗿𝗶𝗻𝗸 𝟮𝟬𝟮𝟱 inoubliable. Le plus grand rendez-vous de la gastronomie de cette année a été très festif.\r\nSuivez certains moments forts de ce festival qui s\'est déroulé au palais des congrès de Cotonou du 01 au 06 Avril 2025.🤗😛',0,NULL,NULL,'2025-04-10 11:15:49','https://img.youtube.com/vi/Kjk05VYwXwo/maxresdefault.jpg','',0,'events',3,0,'2025-04-10 11:15:49','2025-04-10 11:15:49'),(46,'xwUVdIfOsjE','QUAND AMIR EL PRESIDENTE PARLE D\'AXEL MERRYL','quand-amir-el-presidente-parle-daxel-merryl','Beaucoup critiqué à cause de son passage de la comédie Web à la musique, Axel Merryl reçoit le soutien de certains artistes y compris Amir. Ecoutez ce qu\'il dit à propos.',0,NULL,NULL,'2025-04-10 12:33:36','https://img.youtube.com/vi/xwUVdIfOsjE/maxresdefault.jpg','',0,'opinion',3,2,'2025-04-10 12:33:36','2025-04-14 14:00:55'),(47,'Sld2Gtq-ZdE','LE BEAT BOXER ADUDA BOY VOUS DONNE RENDEZ-VOUS AU CONCERT 100% LIVE DE YEWHE YETON','le-beat-boxer-aduda-boy-vous-donne-rendez-vous-au-concert-100-live-de-yewhe-yeton','😍Regardez vous-même un avant goût de ce qu\'il va se passer ce jour là🥰\r\n😍les gars, aguda Boy, le Patron du beat boxing au Bénin vous donne rendez-vous pour un #concert 100% #liveshow au côté du phénomène Yewhe Yeton 🥰 ce 19 Avril à l\'espace Mayton à calavi',0,NULL,NULL,'2025-04-14 15:02:18','https://img.youtube.com/vi/Sld2Gtq-ZdE/maxresdefault.jpg','',0,'events',3,0,'2025-04-14 15:02:18','2025-04-14 15:02:18');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-25  9:58:30
