-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.3.0 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para laravel
CREATE DATABASE IF NOT EXISTS `laravel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `laravel`;

-- Volcando estructura para tabla laravel.articles
CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int NOT NULL AUTO_INCREMENT,
  `user_article_id` int NOT NULL,
  `categorie_article_id` int NOT NULL,
  `article_title` varchar(250) NOT NULL,
  `article_content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id_article`),
  KEY `fk_user_article_id` (`user_article_id`),
  KEY `fk_categorie_article_id` (`categorie_article_id`),
  CONSTRAINT `fk_categorie_article_id` FOREIGN KEY (`categorie_article_id`) REFERENCES `categories` (`id_categorie`),
  CONSTRAINT `fk_user_article_id` FOREIGN KEY (`user_article_id`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla laravel.articles: ~17 rows (aproximadamente)
INSERT IGNORE INTO `articles` (`id_article`, `user_article_id`, `categorie_article_id`, `article_title`, `article_content`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, 'prueba', 'contenido', '2024-03-14 05:00:00', '2024-03-15 04:26:08', NULL),
	(3, 1, 2, 'Segundo', '354gb5fthsfhtb', '2024-03-14 05:00:00', '2024-03-15 04:41:24', NULL),
	(4, 1, 4, 'prueba', 'jlkkmnbgnjk  erigherjhrhergsdfg', '2024-03-15 05:00:00', '2024-03-15 07:05:07', NULL),
	(6, 1, 4, 'Name', 'hfgkjfbdvs nht t', '2024-03-15 05:00:00', '2024-03-15 07:36:23', NULL),
	(7, 1, 1, 'rghkrsg', 'vfek hivbw', '2024-03-15 05:00:00', '2024-03-15 07:38:00', NULL),
	(8, 1, 2, 'titulo 2', 'wqfrgrgaesgdfhgf', '2024-03-16 05:00:00', '2024-03-17 03:41:57', NULL),
	(9, 1, 2, 'Titulo', 'tryeuiaopfoihgshdjakldiufyvghjdfkopghusrjdfikfl\r\nhttps://youtu.be/UkQng_XSlp4?list=RDOtbRXAl6eO0', '2024-03-18 05:00:00', '2024-03-20 05:27:18', NULL),
	(10, 1, 2, '1111111111111111111', '4tryujhgrbfvdscxaz<', '2024-03-20 05:00:00', '2024-03-20 07:12:57', NULL),
	(11, 1, 2, 'Lorem imsup', 'dftyuioppoiuytrdfvb uyfgewibinuyvog ourcoinrthvginc9dtwf1gt 845498644198 iefhnrvt038rytwer98jvgujhoi hrtvq08umoip ecpkQLWPOIno hau uihegn uirhtfvuqn iyeiojkjnla luana su aunica amiga le daba fuersx', '2024-03-21 05:00:00', '2024-03-21 05:39:47', NULL),
	(12, 1, 2, 'ertyuioppoiuygfdxcfvgbhnjkl', 'dertyu8i9opfoivugcbfnsmrop8 vc ygufbchqn ggcnhjkxdioszlk,mnxdhjyuszixkcmndhjyuioxlkmhdfjyuisozkl,mhjkilozkxjhcgvghxjkflgjhfdsgzhjdkfglhñjlkhgcfzgtyfugiohpj´{ñ. ,mnbgcftyu8ihojlnbmvgcftyuihojln,mbvgftyguiholb,mn vghyuikb,m vcgfyhujbkin mbvgfhytuhijolnkmbvgftiop', '2024-03-21 05:00:00', '2024-03-21 05:45:55', NULL),
	(13, 1, 4, 'Site dev project', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '2024-03-23 05:00:00', '2024-03-23 05:40:30', NULL),
	(14, 1, 1, 'Site dev proyect 2', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '2024-03-23 05:46:21', '2024-03-23 05:46:21', NULL),
	(15, 1, 1, 'Site dev proyect 3', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '2024-03-23 05:50:53', '2024-03-23 05:50:53', NULL),
	(16, 1, 1, 'Site dev proyect 4', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '2024-03-23 01:48:50', '2024-03-23 01:48:50', NULL),
	(17, 1, 2, 'yerwmunbgkfedlwp+éñlh', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '2024-03-23 02:00:57', '2024-03-23 02:00:57', NULL),
	(18, 1, 2, 'rtañojhbvm,ckvbhgirfidpkfm', 'khjgggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', '2024-04-02 07:44:05', '2024-04-02 07:44:05', NULL),
	(19, 1, 1, 'eff', 'rfefvqev', '2024-04-03 05:16:01', '2024-04-03 05:16:01', NULL);

-- Volcando estructura para tabla laravel.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categorie` int NOT NULL AUTO_INCREMENT,
  `user_categorie_id` int NOT NULL,
  `categorie_name` varchar(250) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id_categorie`),
  KEY `fk_categorie_user_id` (`user_categorie_id`),
  CONSTRAINT `fk_categorie_user_id` FOREIGN KEY (`user_categorie_id`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla laravel.categories: ~4 rows (aproximadamente)
INSERT IGNORE INTO `categories` (`id_categorie`, `user_categorie_id`, `categorie_name`, `updated_at`, `created_at`, `deleted_at`) VALUES
	(1, 1, 'Algoritmos', '2024-02-28', '2024-02-28', NULL),
	(2, 1, 'Arquitectura', '2024-02-28', '2024-02-28', NULL),
	(4, 1, 'Estructura de datos', '2024-02-28', '2024-02-28', NULL),
	(6, 1, 'Programación', '2024-04-03', '2024-04-03', NULL);

-- Volcando estructura para tabla laravel.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id_comment` int NOT NULL AUTO_INCREMENT,
  `user_comment_id` int NOT NULL,
  `public_comment_id` int NOT NULL,
  `comment_content` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `comment_image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `fk_user_comment_id` (`user_comment_id`),
  KEY `fk_public_comment_id` (`public_comment_id`),
  CONSTRAINT `fk_public_comment_id` FOREIGN KEY (`public_comment_id`) REFERENCES `publications` (`id_publication`),
  CONSTRAINT `fk_user_comment_id` FOREIGN KEY (`user_comment_id`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla laravel.comments: ~0 rows (aproximadamente)

-- Volcando estructura para tabla laravel.likes
CREATE TABLE IF NOT EXISTS `likes` (
  `id_like` int NOT NULL AUTO_INCREMENT,
  `user_like_id` int NOT NULL,
  `public_like_id` int NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id_like`),
  KEY `fk_user_like_id` (`user_like_id`),
  KEY `fk_public_like_id` (`public_like_id`),
  CONSTRAINT `fk_public_like_id` FOREIGN KEY (`public_like_id`) REFERENCES `publications` (`id_publication`),
  CONSTRAINT `fk_user_like_id` FOREIGN KEY (`user_like_id`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla laravel.likes: ~0 rows (aproximadamente)

-- Volcando estructura para tabla laravel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laravel.migrations: ~2 rows (aproximadamente)
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2024_02_27_190638_create_permission_tables', 1),
	(2, '2024_02_27_191308_create_roles', 2);

-- Volcando estructura para tabla laravel.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laravel.model_has_permissions: ~0 rows (aproximadamente)

-- Volcando estructura para tabla laravel.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laravel.model_has_roles: ~9 rows (aproximadamente)
INSERT IGNORE INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(2, 'App\\Models\\User', 2),
	(2, 'App\\Models\\User', 3),
	(2, 'App\\Models\\User', 4),
	(2, 'App\\Models\\User', 5),
	(2, 'App\\Models\\User', 6),
	(2, 'App\\Models\\User', 7),
	(2, 'App\\Models\\User', 8),
	(2, 'App\\Models\\User', 9);

-- Volcando estructura para tabla laravel.otro_cliente
CREATE TABLE IF NOT EXISTS `otro_cliente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL DEFAULT '0',
  `apellido` varchar(255) NOT NULL DEFAULT '0',
  `cuenta` int DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_otro_cliente_cuentas` (`cuenta`),
  CONSTRAINT `FK_otro_cliente_cuentas` FOREIGN KEY (`cuenta`) REFERENCES `cuentas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla laravel.otro_cliente: ~0 rows (aproximadamente)

-- Volcando estructura para tabla laravel.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laravel.permissions: ~0 rows (aproximadamente)

-- Volcando estructura para tabla laravel.publications
CREATE TABLE IF NOT EXISTS `publications` (
  `id_publication` int NOT NULL AUTO_INCREMENT,
  `user_public_id` int NOT NULL,
  `cate_public_id` int NOT NULL,
  `public_title` varchar(250) NOT NULL,
  `public_content` text,
  `public_image` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_publication`),
  KEY `fk_user_public_id` (`user_public_id`),
  KEY `fk_cate_public_id` (`cate_public_id`),
  CONSTRAINT `fk_cate_public_id` FOREIGN KEY (`cate_public_id`) REFERENCES `categories` (`id_categorie`),
  CONSTRAINT `fk_user_public_id` FOREIGN KEY (`user_public_id`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla laravel.publications: ~4 rows (aproximadamente)
INSERT IGNORE INTO `publications` (`id_publication`, `user_public_id`, `cate_public_id`, `public_title`, `public_content`, `public_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(9, 2, 2, 'primero', '<li class="dropdown">\r\n        <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-duotone fa-newspaper"></i>\r\n            <span>Gestionar artículos</span></a>\r\n        <ul class="dropdown-menu">\r\n            <li><a class="nav-link" href="{{ route(\'article.create\') }}">Crear Artículo</a></li>\r\n            <li><a class="nav-link" href="{{ route(\'article.index\') }}">Consultar Artículos</a></li>\r\n        </ul>\r\n    </li>', '["1713840164_heart black.png","1713840164_heart.png"]', '2024-04-02 04:13:49', '2024-04-23 02:42:44', NULL),
	(10, 5, 4, 'primero 2', '<li class="dropdown">\r\n        <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-duotone fa-newspaper"></i>\r\n            <span>Gestionar artículos</span></a>\r\n        <ul class="dropdown-menu">\r\n            <li><a class="nav-link" href="{{ route(\'article.create\') }}">Crear Artículo</a></li>\r\n            <li><a class="nav-link" href="{{ route(\'article.index\') }}">Consultar Artículos</a></li>\r\n        </ul>\r\n    </li>', '["1713840357_descarga.jpeg","1713840357_images - copia.jpeg"]', '2024-04-02 04:37:49', '2024-04-23 02:45:57', NULL),
	(11, 5, 2, 'segundo 2', '<a class="nav-link p-0" href="{{ route(\'comment.index\') }}">Comentarios({{ count($publication->comments) }})</a></li></strong>', '["1713840334_img.png","1713840334_user-removebg-preview.png"]', '2024-04-02 07:37:06', '2024-04-23 02:45:34', NULL),
	(12, 2, 4, 'prueba', '$comments[$publication->id_publication]', '["1713840177_heart black.png","1713840177_heart.png"]', '2024-04-04 07:26:17', '2024-04-23 02:42:57', NULL);

-- Volcando estructura para tabla laravel.resources
CREATE TABLE IF NOT EXISTS `resources` (
  `id_resources` int NOT NULL AUTO_INCREMENT,
  `user_resource_id` int NOT NULL,
  `cate_resource_id` int NOT NULL,
  `resource_title` varchar(250) NOT NULL,
  `resource_author` varchar(250) NOT NULL,
  `resource_edition` date DEFAULT NULL,
  `resources_description` text,
  `created_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id_resources`),
  KEY `fk_user_resource_id` (`user_resource_id`),
  KEY `fk_cate_resource_id` (`cate_resource_id`),
  CONSTRAINT `fk_cate_resource_id` FOREIGN KEY (`cate_resource_id`) REFERENCES `categories` (`id_categorie`),
  CONSTRAINT `fk_user_resource_id` FOREIGN KEY (`user_resource_id`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla laravel.resources: ~0 rows (aproximadamente)

-- Volcando estructura para tabla laravel.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laravel.roles: ~2 rows (aproximadamente)
INSERT IGNORE INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'web', '2024-02-28 05:19:50', '2024-02-28 05:19:50'),
	(2, 'userClient', 'web', '2024-02-28 05:19:50', '2024-02-28 05:19:50');

-- Volcando estructura para tabla laravel.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laravel.role_has_permissions: ~0 rows (aproximadamente)

-- Volcando estructura para tabla laravel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(125) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nick_name` varchar(125) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(125) NOT NULL,
  `user_image` varchar(250) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `nick_name` (`nick_name`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla laravel.users: ~5 rows (aproximadamente)
INSERT IGNORE INTO `users` (`id_user`, `user_name`, `last_name`, `nick_name`, `email`, `password`, `user_image`, `updated_at`, `created_at`, `deleted_at`, `remember_token`) VALUES
	(1, 'Steven', 'Alarcon', '@Administrador', 'Alarcon@admin.com', '$2y$12$5MzjLf9lI.lV4YNnZvmDree32ZKFLIJRjY8fFzRIC7cnre/.fJJe.', '1713840109_descarga.jpeg', '2024-04-22', '2024-02-27', NULL, NULL),
	(2, 'Pedro', 'Pazcal', '@Pazcalito', 'Pascal@Pascal.com', '$2y$12$SGAdUOGm17s53XXY//T0cOOLr.iZvEyhsVwtBZ.xnBbYuNFBNk7Km', '1713840149_Imagen de WhatsApp 2023-09-12 a las 09.16.55.jpg', '2024-04-22', '2024-02-27', NULL, NULL),
	(5, 'Camila', 'Cabello', '@Cabello', 'Cabello@Cabello.com', '$2y$12$OwJRWeY2SP8jEU3yeYaCa.ge/aFAUVLCFfyVfG6Y0BMuLZUCC57SC', '1713840366_images - copia.jpeg', '2024-04-22', '2024-03-06', NULL, NULL),
	(8, 'Angie', 'Salazar', 'angie', 'angie@gmail.com', '$2y$12$hV91AcSvT6OA1DYOI3G82OM.IO9zeWxsojz0Y8sKDnIkG0.GNZkVi', '1712960342_Imagen de WhatsApp 2023-09-12 a las 09.16.55.jpg', '2024-04-12', '2024-04-12', NULL, NULL),
	(9, 'ann', 'ann', 'ann', 'ann@gmail.com', '$2y$12$oAEWVRHUOtzdBrfB/vhm4u456je69sZ6sWnE4kt91WYkpvBFfLW6a', NULL, '2024-04-23', '2024-04-23', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
