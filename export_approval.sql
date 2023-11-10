-- MySQL dump 10.13  Distrib 8.0.35, for Linux (x86_64)
--
-- Host: localhost    Database: export_approval
-- ------------------------------------------------------
-- Server version	8.0.35-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `role_id` bigint unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Nakul Puranik','dev.nakzee@gmail.com',NULL,'$2y$10$NHNJikeJ0vHTwIOVOMacLOvWGZh04ieQKpOEni1Tm4UQrr/dCeDOu',0,NULL,NULL,'2023-11-06 23:36:08',NULL,NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `iso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nicename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numcode` int DEFAULT NULL,
  `phonecode` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documents` (
  `doc_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_size` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`doc_id`),
  UNIQUE KEY `documents_document_unique` (`document`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
INSERT INTO `documents` VALUES (1,'sample-1.pdf','documents/sample-1-1699354580.pdf','text/plain',15,'2023-11-07 05:26:20','2023-11-07 05:26:20',NULL);
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media` (
  `media_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `media_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`media_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (2,'india_map (1).png','media/india_map-(1)-1699351358.png','image/png','106470','2023-11-07 04:32:38','2023-11-07 04:32:38',NULL),(3,'Make-in-India-Logo-PNG-HD.png','media/Make-in-India-Logo-PNG-HD-1699351434.png','image/png','417988','2023-11-07 04:33:54','2023-11-07 04:33:54',NULL),(4,'71f3mSwyQ7L.jpg','media/71f3mSwyQ7L-1699351546.jpg','image/jpeg','143885','2023-11-07 04:35:46','2023-11-07 04:35:46',NULL),(8,'whychooseus.png','media/whychooseus-1699435964.png','image/png','153032','2023-11-08 04:02:44','2023-11-08 04:02:44',NULL),(9,'codes.gif','media/codes-1699436122.gif','image/gif','56462','2023-11-08 04:05:22','2023-11-08 04:05:22',NULL),(10,'Make-in-India-Logo-PNG-HD-768x351.png','media/Make-in-India-Logo-PNG-HD-768x351-1699436138.png','image/png','240879','2023-11-08 04:05:38','2023-11-08 04:05:38',NULL),(11,'desktop-computer.jpg','media/desktop-computer-1699442254.jpg','image/jpeg','98979','2023-11-08 05:47:34','2023-11-08 05:47:34',NULL),(12,'logo.png','media/logo-1699448078.png','image/png','32528','2023-11-08 07:24:38','2023-11-08 07:24:38',NULL),(13,'7551698837197_bis-registration-for-electronics-games-video-by-export-approval.jpg','media/7551698837197_bis-registration-for-electronics-games-video-by-export-approval-1699596933.jpg','image/jpeg','21433','2023-11-10 00:45:34','2023-11-10 00:45:34',NULL);
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_03_14_094321_create_admins_table',1),(6,'2023_03_15_091028_create_sellers_table',1),(7,'2023_11_02_090331_create_modules_table',2),(8,'2023_11_02_090342_create_sub_modules_table',2),(9,'2023_11_02_015408_create_media_table',3),(11,'2023_10_17_073824_create_documents_table',4),(14,'2023_10_07_021333_create_countries_table',5),(16,'2023_11_07_124245_create_service_sections_table',5),(17,'2023_11_07_124833_create_product_categories_table',5),(19,'2023_11_07_125258_create_product_sections_table',5),(20,'2023_11_02_095525_create_services_table',6),(22,'2023_11_07_125145_create_products_table',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modules` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `modules_module_unique` (`module`),
  UNIQUE KEY `modules_icon_unique` (`icon`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` VALUES (1,'Files','fa-folders',1,8,NULL,NULL,NULL),(2,'Services','fa-file-certificate',1,1,NULL,NULL,NULL),(3,'Products','fa-boxes-stacked',1,2,NULL,NULL,NULL);
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_categories` (
  `product_category_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category_content` longtext COLLATE utf8mb4_unicode_ci,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `seo_keywords` text COLLATE utf8mb4_unicode_ci,
  `product_category_status` tinyint(1) NOT NULL DEFAULT '1',
  `product_category_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_category_id`),
  UNIQUE KEY `product_categories_product_category_slug_unique` (`product_category_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_categories`
--

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` VALUES (1,'Indian Standard Electronic & IT Goods','indian-standard-electronic-it-goods','<p>Indian Standard Electronic &amp; IT Goods</p>',NULL,NULL,NULL,1,0,'2023-11-09 23:39:40','2023-11-10 00:01:01',NULL);
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_sections`
--

DROP TABLE IF EXISTS `product_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_sections` (
  `product_section_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_section_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_section_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_section_content` longtext COLLATE utf8mb4_unicode_ci,
  `product_section_status` tinyint(1) NOT NULL DEFAULT '1',
  `product_section_order` int NOT NULL DEFAULT '0',
  `product_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_section_id`),
  UNIQUE KEY `product_sections_product_section_slug_unique` (`product_section_slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_sections`
--

LOCK TABLES `product_sections` WRITE;
/*!40000 ALTER TABLE `product_sections` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `product_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_id` bigint unsigned DEFAULT NULL,
  `img_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_content` longtext COLLATE utf8mb4_unicode_ci,
  `product_service_id` bigint unsigned DEFAULT NULL,
  `product_category_id` bigint unsigned DEFAULT NULL,
  `information` bigint unsigned DEFAULT NULL,
  `guidelines` bigint unsigned DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `seo_keywords` text COLLATE utf8mb4_unicode_ci,
  `product_status` tinyint(1) NOT NULL DEFAULT '1',
  `product_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `products_product_slug_unique` (`product_slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sellers`
--

DROP TABLE IF EXISTS `sellers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sellers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `role_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sellers_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sellers`
--

LOCK TABLES `sellers` WRITE;
/*!40000 ALTER TABLE `sellers` DISABLE KEYS */;
/*!40000 ALTER TABLE `sellers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_sections`
--

DROP TABLE IF EXISTS `service_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_sections` (
  `service_section_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `service_section_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_section_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_section_content` longtext COLLATE utf8mb4_unicode_ci,
  `service_section_status` tinyint(1) NOT NULL DEFAULT '1',
  `service_section_order` int NOT NULL DEFAULT '0',
  `service_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`service_section_id`),
  UNIQUE KEY `service_sections_service_section_slug_unique` (`service_section_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_sections`
--

LOCK TABLES `service_sections` WRITE;
/*!40000 ALTER TABLE `service_sections` DISABLE KEYS */;
INSERT INTO `service_sections` VALUES (1,'Introduction','introduction','<p class=\"Normal1\"><strong><span lang=\"EN-US\">Bureau of Indian Standards (BIS)</span></strong><span lang=\"EN-US\">&nbsp;serves as India\'s national standards body. It operates under the authority of the Indian government and is responsible for developing and promoting technical standards across various industries. In 2012, the&nbsp;<strong>Compulsory Registration Scheme (CRS)</strong>&nbsp;was introduced as a significant component under BIS. CRS mandates the certification of specific product categories, ensuring their adherence to predefined safety and quality standards. This scheme is a pivotal initiative aimed at safeguarding consumers\' interests by regulating products that have the potential to impact safety and well-being.</span></p>\r\n<p class=\"Normal1\">&nbsp;</p>\r\n<p class=\"Normal1\"><strong><span lang=\"EN-US\">BIS/CRS registration is essential for foreign manufacturers</span></strong><span lang=\"EN-US\">&nbsp;aiming to export their goods to India. Under CRS, some IT and Electronic products fall under the mandatory certification, and foreign manufacturers must adhere to these requirements to legally market their products in India. The CRS guidelines outline essential parameters, testing standards and safety measures that products must meet. Foreign manufacturers wishing to export their products to the Indian market must comply with BIS/CRS registration requirements. This involves a comprehensive evaluation process to ascertain the products\' conformity to specified quality and safety standards.</span></p>\r\n<p class=\"Normal1\">&nbsp;</p>\r\n<p class=\"Normal1\"><span lang=\"EN-US\">Foreign manufacturers are required to initiate the registration process by submitting applications to BIS, including detailed technical specifications and test reports from accredited laboratories. BIS/CRS registration is a regulatory necessity and signifies a manufacturer\'s dedication to product quality and safety. It fosters consumer trust, streamlines market access and positions foreign manufacturers for success in India\'s quality-conscious business environment. Complying with BIS/CRS requirements is a vital step for foreign manufacturers, ensuring their products meet the essential standards for a thriving presence in the Indian market.</span></p>\r\n<p class=\"Normal1\">&nbsp;</p>\r\n<p class=\"Normal1\"><strong><span lang=\"EN-US\">Importance of BIS/CRS Registration</span></strong></p>\r\n<p class=\"Normal1\"><span lang=\"EN-US\">BIS/CRS Registration is important for foreign manufacturers seeking to export their products to the Indian market in the following ways:</span></p>\r\n<ul>\r\n<li class=\"Normal1\"><span lang=\"EN-US\">BIS/CRS Registration is mandatory for foreign manufacturers, ensuring legal compliance and preventing entry barriers into the Indian market.</span></li>\r\n<li class=\"Normal1\"><span lang=\"EN-US\">This registration provides entry to India\'s extensive consumer base, opening up opportunities for foreign manufacturers to tap into one of the world\'s largest markets.</span></li>\r\n<li class=\"Normal1\"><span lang=\"EN-US\">BIS/CRS Registration instils trust and confidence in Indian consumers, as it signifies adherence to stringent quality and safety standards.</span></li>\r\n<li class=\"Normal1\"><span lang=\"EN-US\">Compliance reduces the risk of product recalls, safety issues and legal consequences, safeguarding a manufacturer\'s reputation and financial interests.</span></li>\r\n<li class=\"Normal1\"><span lang=\"EN-US\">BIS-registered products are more competitive due to their quality assurance, enabling foreign manufacturers to stand out in a crowded marketplace.</span></li>\r\n</ul>\r\n<p class=\"Normal1\"><span lang=\"EN-US\">Through the Export Approval platform, Brand Liaison (Compliance Service Partner) provides comprehensive support and guidance to foreign manufacturers throughout the BIS/CRS Registration process in India. Brand Liaison can act as the Authorized Indian Representative (AIR) for a Foreign OEM if there are no alternative arrangements. With our specialized expertise, you can seamlessly navigate the BIS Registration journey, guaranteeing that your products meet compliance standards and are fully prepared to export in the Indian market.</span></p>\r\n<p class=\"Normal1\">&nbsp;</p>\r\n<p class=\"Normal1\"><a href=\"https://one.exportapproval.com/contact-us\"><strong><span lang=\"EN-US\">Feel free to contact Brand Liaison for quick and seamless BIS/CRS registration services!</span></strong></a></p>',1,1,3,'2023-11-09 03:26:48','2023-11-09 04:45:00',NULL);
/*!40000 ALTER TABLE `service_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `service_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_id` bigint unsigned DEFAULT NULL,
  `img_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_description` longtext COLLATE utf8mb4_unicode_ci,
  `service_compliance` text COLLATE utf8mb4_unicode_ci,
  `faqs` longtext COLLATE utf8mb4_unicode_ci,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `seo_keywords` text COLLATE utf8mb4_unicode_ci,
  `service_featured` tinyint(1) NOT NULL DEFAULT '0',
  `service_product_show` tinyint(1) NOT NULL DEFAULT '1',
  `service_order` int NOT NULL DEFAULT '0',
  `service_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`service_id`),
  UNIQUE KEY `services_service_slug_unique` (`service_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (3,'BIS / CRS Registration','bis-crs-registration',12,'BIS / CRS Registration','<p><strong><span lang=\"EN-US\">Bureau of Indian Standards (BIS)</span></strong><span lang=\"EN-US\">&nbsp;serves as India\'s national standards body. It operates under the authority of the Indian government and is responsible for developing and promoting technical standards across various industries. In 2012, the&nbsp;<strong>Compulsory Registration Scheme (CRS)</strong>&nbsp;was introduced as a significant component under BIS. CRS mandates the certification of specific product categories, ensuring their adherence to predefined safety and quality standards. This scheme is a pivotal initiative aimed at safeguarding consumers\' interests by regulating products that have the potential to impact safety and well-being.</span></p>',NULL,'{\"What is BIS\\/CRS Registration and why is it necessary for foreign manufacturers?\":\"BIS\\/CRS Registration is a process that ensures the compliance of electronic and IT goods with Indian safety and quality standards. It is mandatory for foreign manufacturers who intend to export their products to the Indian market.\",\"Who is eligible to apply for BIS\\/CRS Registration?\":\"Foreign manufacturers and exporters of electronic and IT products that are listed in the Mandatory BIS Registration List are eligible to apply in India.\",\"What are the key benefits of obtaining BIS\\/CRS Registration for foreign manufacturers?\":\"Some of the key benefits include access to the Indian market, enhanced product quality and safety, compliance with Indian regulations and increased customer trust.\",\"Is product testing mandatory for BIS\\/CRS Registration and where should it be conducted?\":\"Yes, product testing is mandatory. Testing should be conducted in an NABL-accredited or BIS-recognized laboratory in India.\",\"What are the consequences of selling products in India without BIS\\/CRS Registration?\":\"Selling products without BIS Registration is illegal and may result in penalties, confiscation of products, and damage to a manufacturer\'s reputation.\"}','Get BIS / CRS Registration For Your Product In India',NULL,NULL,0,1,1,1,'2023-11-09 01:50:08','2023-11-09 01:53:02',NULL);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_modules`
--

DROP TABLE IF EXISTS `sub_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sub_modules` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `mod_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submodule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sub_modules_submodule_unique` (`submodule`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_modules`
--

LOCK TABLES `sub_modules` WRITE;
/*!40000 ALTER TABLE `sub_modules` DISABLE KEYS */;
INSERT INTO `sub_modules` VALUES (1,'1','Gallery','media.index',1,1,NULL,NULL,NULL),(2,'1','Documents','document.index',1,2,NULL,NULL,NULL),(3,'2','Services','services.index',1,1,NULL,NULL,NULL),(4,'3','Categories','products.categories.index',1,2,NULL,NULL,NULL),(5,'3','Products','products.index',1,1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `sub_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_sent_at` timestamp NULL DEFAULT NULL,
  `otp_expired_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_mobile_unique` (`mobile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-10 16:41:11
