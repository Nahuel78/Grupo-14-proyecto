-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: modape
-- ------------------------------------------------------
-- Server version	12.2.2-MariaDB

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consultas`
--

DROP TABLE IF EXISTS `consultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consultas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `asunto` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `leido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultas`
--

LOCK TABLES `consultas` WRITE;
/*!40000 ALTER TABLE `consultas` DISABLE KEYS */;
INSERT INTO `consultas` VALUES (1,'pepito caceres','pepito@gmail.com','productos','quiero respuestas de mis productos comprados... gracias','2026-06-17 22:17:09','2026-06-17 22:39:00',1),(2,'pepito caceres','pepito@gmail.com','error al comprar producto','tengo un problema con la compra de un producto.','2026-06-23 13:39:42','2026-06-23 13:41:00',1);
/*!40000 ALTER TABLE `consultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_pedidos`
--

DROP TABLE IF EXISTS `detalle_pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_pedidos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pedido_id` bigint(20) unsigned NOT NULL,
  `producto_id` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_pedidos_pedido_id_foreign` (`pedido_id`),
  KEY `detalle_pedidos_producto_id_foreign` (`producto_id`),
  CONSTRAINT `detalle_pedidos_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detalle_pedidos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_pedidos`
--

LOCK TABLES `detalle_pedidos` WRITE;
/*!40000 ALTER TABLE `detalle_pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
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
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_05_15_144202_create_productos_table',1),(5,'2026_05_15_193117_create_rols_table',1),(6,'2026_05_15_193143_create_usuarios_table',1),(7,'2026_05_29_191043_create_ventas_cabecera_table',2),(8,'2026_05_29_191113_create_ventas_detalle_table',2),(9,'2026_05_26_230002_add_rol_to_users_table',3),(10,'2026_05_29_222549_add_campos_to_productos_table',3),(11,'2026_06_04_002419_create_pedidos_table',4),(12,'2026_06_04_002635_create_detalle_pedidos_table',4),(13,'2026_06_06_001140_add_subcategoria_to_productos_table',4),(14,'2026_06_16_142341_add_fecha_estimada_entrega_to_venta_cabeceras_table',5),(15,'2026_06_12_133031_add_destacado_to_productos_table',6),(16,'2026_06_15_223741_create_consultas_table',6),(17,'2026_06_16_001757_add_leido_to_consultas_table',6),(18,'2026_06_17_121623_add_datos_envio_to_ventas_cabecera',6),(19,'2026_06_17_170335_add_url_imagen_to_productoss_table',6),(20,'2026_06_17_171215_add_activo_to_productos_table',6),(21,'2026_06_29_203713_add_direccion_to_users_table',7),(22,'2026_06_29_215028_add_apellido_telefono_to_users_table',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
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
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'Pendiente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pedidos_user_id_foreign` (`user_id`),
  CONSTRAINT `pedidos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `url_imagen` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `talle` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `subcategoria` varchar(255) DEFAULT NULL,
  `destacado` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (12,'Zapatillas Nike Air Max',NULL,120000.00,3,'img/productos/1780961731_zapasnikeairmaxnegra.png',1,'2026-06-09 02:35:31','2026-06-29 22:32:42','Nike','39','Hombre','zapatillas',0),(13,'Zapatilla adidas',NULL,100000.00,5,'img/productos/1780961790_zapaadidas.png',1,'2026-06-09 02:36:30','2026-06-19 14:13:52','Adidas','38','Hombre',NULL,0),(14,'Buzo adidas Liverpool',NULL,100000.00,0,'img/productos/1781116465_buzoadidasliverpol.png',1,'2026-06-10 21:34:25','2026-06-29 22:32:19','adidas','M','Hombre','ropa',0),(15,'Buzo Nike blanco',NULL,75000.00,0,'img/productos/1781118735_buzocangurowhite.png',1,'2026-06-10 22:12:15','2026-06-16 20:05:44','Nike','M,L,S','Hombre','ropa',0),(16,'Campera Nike celeste',NULL,85000.00,6,'img/productos/1781288262_campera nike.jpg',1,'2026-06-12 21:17:42','2026-06-17 22:12:58','Nike','L','Hombre','ropa',0),(17,'Botin New Balance',NULL,95000.00,8,'img/productos/1781288407_botinnewbalance.png',1,'2026-06-12 21:20:07','2026-06-16 01:06:45','New Balance','35 a 40','Hombre','botines',0),(18,'Botines Nike Phantom',NULL,155000.00,6,'img/productos/1781288481_nike panhtom.png',1,'2026-06-12 21:21:21','2026-06-16 01:06:45','Nike','35 a 40','Hombre','botines',0),(19,'Botines Puma blanco',NULL,125000.00,4,'img/productos/1781289307_-PUMA-BLACK-POISON-PINK_1.png',1,'2026-06-12 21:34:04','2026-06-16 00:52:03','Puma','35 a 40','Hombre','botines',0),(20,'Camiseta Argentina Femenina',NULL,150000.00,2,'img/productos/1781291540_Camiseta titular seleccion.png',1,'2026-06-12 22:12:20','2026-06-16 16:45:23','adidas','M,L,S','Mujer','ropa',0),(21,'Conjunto Puma Femenino',NULL,120000.00,4,'img/productos/1781291632_conjuntopumamujer.png',1,'2026-06-12 22:13:52','2026-06-16 00:33:10','Puma','M,L,S','Mujer','ropa',0),(22,'Zapatillas adidas',NULL,10000.00,3,'img/productos/1781293186_Zapatilla adidasr.png',1,'2026-06-12 22:39:46','2026-06-17 21:50:36','Adidas','35 a 40','Mujer','zapatillas',0),(23,'Zapatilla Nike Blazer',NULL,160000.00,4,'img/productos/1781293266_Zapatilla nike blazer.png',1,'2026-06-12 22:41:06','2026-06-17 21:50:36','Nike','35 a 40','Mujer','zapatillas',0),(24,'Zapatilla Puma Pro',NULL,90000.00,3,'img/productos/1781293338_Zapatilla Puma Pro.png',1,'2026-06-12 22:42:18','2026-06-12 22:42:18','Puma','35 a 40','Mujer','zapatillas',0),(25,'zapatilla adidas',NULL,400000.00,3,'img/productos/1781731574_ZapatillasadidasGC.png',1,'2026-06-17 21:26:14','2026-06-17 22:12:58','adidas','35 a 40','Hombre','zapatillas',1),(26,'Zapatilla Puma Carina',NULL,140000.00,0,'img/productos/1782780807_Zapatillapuma carina.png',1,'2026-06-30 00:53:27','2026-06-30 00:53:27','Puma','35 a 40','Mujer','zapatillas',1),(27,'botin adidas red',NULL,65000.00,5,'img/productos/1782781763_botinadidasniño2.png',1,'2026-06-30 01:09:23','2026-06-30 01:09:23','Adidas','30 34','Niños','botines',1),(28,'Conjunto Seleccion Argentina',NULL,80000.00,4,'img/productos/1782781883_conjuntoseleccionniño.png',1,'2026-06-30 01:11:23','2026-06-30 01:11:23','Adidas','3 a 5','Niños','ropa',1),(29,'Adidas Tango Balon',NULL,80000.00,20,'img/productos/1782782010_adidas pelota tango.png',1,'2026-06-30 01:13:30','2026-06-30 01:13:30','Adidas',NULL,'Accesorios','pelotas',1),(30,'Trionda 2026 Balon',NULL,100000.00,10,'img/productos/1782782093_Pelota trionda.png',1,'2026-06-30 01:14:53','2026-06-30 01:14:53','Adidas',NULL,'Accesorios','pelotas',1);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_nombre_unique` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rol` varchar(255) NOT NULL DEFAULT 'usuario',
  `direccion` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `provincia` varchar(255) DEFAULT NULL,
  `codigo_postal` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'pepito','pepito@gmail.com',NULL,'$2y$12$9xAafHkfghhT7wnfr5WBG.YD.ffg0NZIiQRtgXwgOjq/Su8SmIpEm',NULL,'2026-06-01 22:49:18','2026-06-30 02:36:58','cliente','laguna seca','corrientes','corrientes','3400','caceres','3794587863'),(3,'Luciano Gomez','gomezlucho@gmail.com',NULL,'$2y$12$8eEI0.n.lDS9o9IpZLCT9OqFaQ4/2FHR.qoOawKZOHdUnDOi5ztam',NULL,'2026-06-09 02:04:29','2026-06-09 02:04:29','admin',NULL,NULL,NULL,NULL,NULL,NULL),(5,'manzana','manzana@gmail.com',NULL,'$2y$12$ppmVZqXbPRddrX5OJWU9DOAY9hW8CNOAVKyELPCromjcdrVW4fT62',NULL,'2026-06-11 05:00:54','2026-06-11 05:00:54','cliente',NULL,NULL,NULL,NULL,NULL,NULL),(6,'banana','banana@gmail.com',NULL,'$2y$12$7vAAVksOuBgdYtLfIkkcZeJjR9kc.Q8h7JgI5locdtxJf0qSFgPTS',NULL,'2026-06-16 04:24:40','2026-06-16 04:24:40','cliente',NULL,NULL,NULL,NULL,NULL,NULL),(7,'Nahuel','nahuelg947@gmail.com',NULL,'$2y$12$TChQae11UXCgZx2k8SwVpelKCa9ox1BxwbR80z/AuQndJwSkGgBK2',NULL,'2026-06-17 23:19:11','2026-06-17 23:19:11','admin',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol_id` bigint(20) unsigned NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_email_unique` (`email`),
  KEY `usuarios_rol_id_foreign` (`rol_id`),
  CONSTRAINT `usuarios_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas_cabecera`
--

DROP TABLE IF EXISTS `ventas_cabecera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas_cabecera` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `estado` varchar(50) DEFAULT 'carrito',
  `total` decimal(10,2) DEFAULT 0.00,
  `fecha_venta` datetime DEFAULT NULL,
  `metodo_pago` varchar(50) DEFAULT NULL,
  `fecha_estimada_entrega` date DEFAULT NULL,
  `nombre_envio` varchar(100) DEFAULT NULL,
  `telefono_envio` varchar(50) DEFAULT NULL,
  `provincia` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `codigo_postal` varchar(20) DEFAULT NULL,
  `referencias` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas_cabecera`
--

LOCK TABLES `ventas_cabecera` WRITE;
/*!40000 ALTER TABLE `ventas_cabecera` DISABLE KEYS */;
INSERT INTO `ventas_cabecera` VALUES (16,'2026-06-16 00:57:53','2026-06-16 17:04:49',1,'pagado',100000.00,'2026-06-15 22:00:55','Transferencia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,'2026-06-16 01:01:18','2026-06-16 18:24:58',1,'pagado',250000.00,'2026-06-15 22:06:45','Efectivo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,'2026-06-16 01:11:30','2026-06-17 22:00:54',1,'enviado',295000.00,'2026-06-15 22:11:44','Tarjeta','2026-06-24',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,'2026-06-16 19:39:11','2026-06-16 18:11:53',6,'enviado',275000.00,'2026-06-16 16:39:24','Tarjeta','2026-06-20',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,'2026-06-16 19:42:06','2026-06-16 21:52:33',6,'pagado',220000.00,'2026-06-16 16:42:24','Transferencia','2026-06-21',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,'2026-06-16 16:45:11','2026-06-16 18:32:03',6,'pagado',150000.00,'2026-06-16 13:45:23','Efectivo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,'2026-06-16 16:57:09','2026-06-16 20:07:10',1,'enviado',300000.00,'2026-06-16 17:05:44','Tarjeta','2026-06-20',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(28,'2026-06-16 18:15:46','2026-06-16 18:15:46',6,'carrito',0.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,'2026-06-16 20:06:24','2026-06-16 21:58:52',1,'pagado',220000.00,'2026-06-16 18:58:52','Tarjeta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(30,'2026-06-16 22:07:43','2026-06-16 22:20:38',1,'pagado',220000.00,'2026-06-16 19:20:38','tarjeta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(32,'2026-06-17 13:36:27','2026-06-17 21:50:36',1,'pagado',655000.00,'2026-06-17 18:50:36','transferencia',NULL,'pepito caceres','3474561','corrientes','corrientes','laguna seca','225','0','3400','en medio de una cortada'),(33,'2026-06-17 21:50:59','2026-06-17 21:52:00',1,'pagado',520000.00,'2026-06-17 18:52:00','efectivo',NULL,'pepito caceres','3474561','corrientes','corrientes','laguna seca','225','0','3400','485'),(34,'2026-06-17 22:11:31','2026-06-23 13:45:29',1,'pendiente_pago',485000.00,'2026-06-17 19:12:58','tarjeta',NULL,'pepito caceres','3474561','corrientes','corrientes','laguna seca','225','0','3400','en el barrio'),(35,'2026-06-17 22:15:53','2026-06-30 02:37:39',1,'carrito',100000.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `ventas_cabecera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas_detalle`
--

DROP TABLE IF EXISTS `ventas_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas_detalle` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `venta_id` bigint(20) unsigned DEFAULT NULL,
  `producto_id` bigint(20) unsigned DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_unitario` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ventas_detalle_cabecera` (`venta_id`),
  KEY `fk_ventas_detalle_productos` (`producto_id`),
  CONSTRAINT `fk_ventas_detalle_cabecera` FOREIGN KEY (`venta_id`) REFERENCES `ventas_cabecera` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_ventas_detalle_productos` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas_detalle`
--

LOCK TABLES `ventas_detalle` WRITE;
/*!40000 ALTER TABLE `ventas_detalle` DISABLE KEYS */;
INSERT INTO `ventas_detalle` VALUES (95,'2026-06-16 01:00:43','2026-06-16 01:00:43',16,14,1,100000.00,100000.00,NULL),(96,'2026-06-16 01:06:24','2026-06-16 01:06:24',17,17,1,95000.00,95000.00,NULL),(97,'2026-06-16 01:06:25','2026-06-16 01:06:25',17,18,1,155000.00,155000.00,NULL),(98,'2026-06-16 01:11:30','2026-06-16 01:11:30',18,15,1,75000.00,75000.00,NULL),(99,'2026-06-16 01:11:31','2026-06-16 01:11:31',18,14,1,100000.00,100000.00,NULL),(100,'2026-06-16 01:11:32','2026-06-16 01:11:32',18,12,1,120000.00,120000.00,NULL),(104,'2026-06-16 19:39:11','2026-06-16 19:39:11',22,14,2,100000.00,200000.00,NULL),(105,'2026-06-16 19:39:13','2026-06-16 19:39:13',22,15,1,75000.00,75000.00,NULL),(106,'2026-06-16 19:42:06','2026-06-16 19:42:06',24,14,1,100000.00,100000.00,NULL),(107,'2026-06-16 19:42:07','2026-06-16 19:42:07',24,12,1,120000.00,120000.00,NULL),(108,'2026-06-16 16:45:11','2026-06-16 16:45:11',25,20,1,150000.00,150000.00,NULL),(109,'2026-06-16 17:14:53','2026-06-16 20:05:35',27,15,4,75000.00,300000.00,NULL),(110,'2026-06-16 21:58:34','2026-06-16 21:58:34',29,14,1,100000.00,100000.00,NULL),(111,'2026-06-16 21:58:35','2026-06-16 21:58:35',29,12,1,120000.00,120000.00,NULL),(112,'2026-06-16 22:07:43','2026-06-16 22:07:43',30,14,1,100000.00,100000.00,NULL),(113,'2026-06-16 22:07:45','2026-06-16 22:07:45',30,12,1,120000.00,120000.00,NULL),(116,'2026-06-17 15:00:44','2026-06-17 15:00:44',32,23,1,160000.00,160000.00,NULL),(117,'2026-06-17 15:00:45','2026-06-17 15:00:45',32,22,1,10000.00,10000.00,NULL),(118,'2026-06-17 21:27:22','2026-06-17 21:27:22',32,16,1,85000.00,85000.00,NULL),(119,'2026-06-17 21:27:29','2026-06-17 21:27:29',32,25,1,400000.00,400000.00,NULL),(120,'2026-06-17 21:50:59','2026-06-17 21:50:59',33,25,1,400000.00,400000.00,NULL),(121,'2026-06-17 21:51:10','2026-06-17 21:51:10',33,12,1,120000.00,120000.00,NULL),(122,'2026-06-17 22:11:44','2026-06-17 22:11:44',34,16,1,85000.00,85000.00,NULL),(123,'2026-06-17 22:11:53','2026-06-17 22:11:53',34,25,1,400000.00,400000.00,NULL),(144,'2026-06-30 01:46:29','2026-06-30 01:46:29',35,30,1,100000.00,100000.00,NULL);
/*!40000 ALTER TABLE `ventas_detalle` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-29 23:55:24
