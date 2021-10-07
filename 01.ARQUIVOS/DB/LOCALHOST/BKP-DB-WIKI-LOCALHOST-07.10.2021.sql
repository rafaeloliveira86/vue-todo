-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.38-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_wiki
CREATE DATABASE IF NOT EXISTS `db_wiki` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_wiki`;

-- Copiando estrutura para tabela db_wiki.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_wiki.migrations: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
	(1, '2021-09-30-172418', 'App\\Database\\Migrations\\CategoriesMigrate', 'default', 'App', 1633640086, 1),
	(2, '2021-09-30-174257', 'App\\Database\\Migrations\\StatusMigrate', 'default', 'App', 1633640086, 1),
	(3, '2021-09-30-184903', 'App\\Database\\Migrations\\UnitsMigrate', 'default', 'App', 1633640086, 1),
	(4, '2021-09-30-191907', 'App\\Database\\Migrations\\UsersMigrate', 'default', 'App', 1633640086, 1),
	(5, '2021-10-02-134411', 'App\\Database\\Migrations\\SubcategoriesMigrate', 'default', 'App', 1633640086, 1),
	(6, '2021-10-02-142903', 'App\\Database\\Migrations\\CategoriesUnitsMigrate', 'default', 'App', 1633640086, 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Copiando estrutura para tabela db_wiki.tbl_categories
DROP TABLE IF EXISTS `tbl_categories`;
CREATE TABLE IF NOT EXISTS `tbl_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `categorie_name` varchar(150) DEFAULT NULL,
  `id_status` int(11) unsigned NOT NULL DEFAULT '0',
  `id_user_created` int(11) NOT NULL DEFAULT '0',
  `id_user_updated` int(11) NOT NULL DEFAULT '0',
  `id_user_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tbl_categories_id_status_foreign` (`id_status`),
  CONSTRAINT `tbl_categories_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `tbl_status` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_wiki.tbl_categories: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_categories` DISABLE KEYS */;
INSERT INTO `tbl_categories` (`id`, `categorie_name`, `id_status`, `id_user_created`, `id_user_updated`, `id_user_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Sistema UniMestre', 1, 1, 0, 0, '2021-10-07 17:55:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'Sistema RM Totvs', 1, 1, 0, 0, '2021-10-07 17:55:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'RD Station', 1, 1, 0, 0, '2021-10-07 17:55:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, 'Portal do Aluno', 1, 1, 0, 0, '2021-10-07 17:55:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, 'Biblioteca', 1, 1, 0, 0, '2021-10-07 17:55:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, 'PIT', 1, 1, 0, 0, '2021-10-07 17:55:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(7, 'Sistema CFM', 1, 1, 0, 0, '2021-10-07 17:55:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(8, 'Sistema Escola Web', 1, 1, 0, 0, '2021-10-07 17:55:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(9, 'ClassApp', 1, 1, 0, 0, '2021-10-07 17:55:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(10, 'Microsoft Teams', 1, 1, 0, 0, '2021-10-07 17:55:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbl_categories` ENABLE KEYS */;

-- Copiando estrutura para tabela db_wiki.tbl_categories_units
DROP TABLE IF EXISTS `tbl_categories_units`;
CREATE TABLE IF NOT EXISTS `tbl_categories_units` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) unsigned NOT NULL DEFAULT '0',
  `id_unit` int(11) unsigned NOT NULL DEFAULT '0',
  `id_user_created` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tbl_categories_units_id_categorie_foreign` (`id_categorie`),
  KEY `tbl_categories_units_id_unit_foreign` (`id_unit`),
  CONSTRAINT `tbl_categories_units_id_categorie_foreign` FOREIGN KEY (`id_categorie`) REFERENCES `tbl_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_categories_units_id_unit_foreign` FOREIGN KEY (`id_unit`) REFERENCES `tbl_units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_wiki.tbl_categories_units: ~23 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_categories_units` DISABLE KEYS */;
INSERT INTO `tbl_categories_units` (`id`, `id_categorie`, `id_unit`, `id_user_created`, `created_at`) VALUES
	(1, 1, 1, 1, '2021-10-07 17:55:02'),
	(2, 2, 1, 1, '2021-10-07 17:55:02'),
	(3, 3, 1, 1, '2021-10-07 17:55:02'),
	(4, 4, 1, 1, '2021-10-07 17:55:02'),
	(5, 5, 1, 1, '2021-10-07 17:55:02'),
	(6, 6, 1, 1, '2021-10-07 17:55:02'),
	(7, 1, 2, 1, '2021-10-07 17:55:02'),
	(8, 2, 2, 1, '2021-10-07 17:55:02'),
	(9, 4, 2, 1, '2021-10-07 17:55:02'),
	(10, 5, 2, 1, '2021-10-07 17:55:02'),
	(11, 6, 2, 1, '2021-10-07 17:55:02'),
	(12, 7, 2, 1, '2021-10-07 17:55:02'),
	(13, 9, 2, 1, '2021-10-07 17:55:02'),
	(14, 4, 3, 1, '2021-10-07 17:55:02'),
	(15, 5, 3, 1, '2021-10-07 17:55:02'),
	(16, 6, 3, 1, '2021-10-07 17:55:02'),
	(17, 8, 3, 1, '2021-10-07 17:55:02'),
	(18, 1, 4, 1, '2021-10-07 17:55:02'),
	(19, 2, 4, 1, '2021-10-07 17:55:02'),
	(20, 4, 4, 1, '2021-10-07 17:55:02'),
	(21, 5, 4, 1, '2021-10-07 17:55:02'),
	(22, 6, 4, 1, '2021-10-07 17:55:02'),
	(23, 9, 4, 1, '2021-10-07 17:55:02');
/*!40000 ALTER TABLE `tbl_categories_units` ENABLE KEYS */;

-- Copiando estrutura para tabela db_wiki.tbl_status
DROP TABLE IF EXISTS `tbl_status`;
CREATE TABLE IF NOT EXISTS `tbl_status` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status_name` varchar(150) DEFAULT NULL,
  `class` varchar(20) DEFAULT NULL,
  `role_scope` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `id_user_created` int(11) NOT NULL DEFAULT '0',
  `id_user_updated` int(11) NOT NULL DEFAULT '0',
  `id_user_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_wiki.tbl_status: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_status` DISABLE KEYS */;
INSERT INTO `tbl_status` (`id`, `status_name`, `class`, `role_scope`, `order`, `id_user_created`, `id_user_updated`, `id_user_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Ativo', 'green darken-2', 'role.admin role.ti', 1, 1, 0, 0, '2021-10-07 17:55:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'Inativo', 'amber darken-2', 'role.admin role.ti', 1, 1, 0, 0, '2021-10-07 17:55:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'Excluído', 'red darken-2', 'role.admin role.ti', 1, 1, 0, 0, '2021-10-07 17:55:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbl_status` ENABLE KEYS */;

-- Copiando estrutura para tabela db_wiki.tbl_subcategories
DROP TABLE IF EXISTS `tbl_subcategories`;
CREATE TABLE IF NOT EXISTS `tbl_subcategories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `subcategorie_name` varchar(150) DEFAULT NULL,
  `id_unit` int(11) unsigned NOT NULL DEFAULT '0',
  `id_categorie` int(11) unsigned NOT NULL DEFAULT '0',
  `id_status` int(11) unsigned NOT NULL DEFAULT '0',
  `id_user_created` int(11) NOT NULL DEFAULT '0',
  `id_user_updated` int(11) NOT NULL DEFAULT '0',
  `id_user_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tbl_subcategories_id_unit_foreign` (`id_unit`),
  KEY `tbl_subcategories_id_categorie_foreign` (`id_categorie`),
  KEY `tbl_subcategories_id_status_foreign` (`id_status`),
  CONSTRAINT `tbl_subcategories_id_categorie_foreign` FOREIGN KEY (`id_categorie`) REFERENCES `tbl_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_subcategories_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `tbl_status` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_subcategories_id_unit_foreign` FOREIGN KEY (`id_unit`) REFERENCES `tbl_units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_wiki.tbl_subcategories: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_subcategories` DISABLE KEYS */;
INSERT INTO `tbl_subcategories` (`id`, `subcategorie_name`, `id_unit`, `id_categorie`, `id_status`, `id_user_created`, `id_user_updated`, `id_user_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Relatórios', 1, 1, 1, 1, 0, 0, '2021-10-07 17:55:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'Boletos', 1, 2, 1, 1, 0, 0, '2021-10-07 17:55:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'Alterar Senha', 2, 7, 1, 1, 0, 0, '2021-10-07 17:55:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, 'Matrícula Aluno', 2, 8, 1, 1, 0, 0, '2021-10-07 17:55:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, 'Matrícula Aluno', 3, 15, 1, 1, 0, 0, '2021-10-07 17:55:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, 'Visualizar Notas', 3, 16, 1, 1, 0, 0, '2021-10-07 17:55:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(7, 'Matrícula Aluno', 4, 19, 1, 1, 0, 0, '2021-10-07 17:55:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(8, 'Visualizar Notas', 4, 20, 1, 1, 0, 0, '2021-10-07 17:55:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbl_subcategories` ENABLE KEYS */;

-- Copiando estrutura para tabela db_wiki.tbl_units
DROP TABLE IF EXISTS `tbl_units`;
CREATE TABLE IF NOT EXISTS `tbl_units` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(150) DEFAULT NULL,
  `class` varchar(50) DEFAULT NULL,
  `logo_navbar` varchar(50) DEFAULT NULL,
  `logo_footer` varchar(50) DEFAULT NULL,
  `icon_footer` varchar(50) DEFAULT NULL,
  `site` varchar(150) DEFAULT NULL,
  `id_status` int(11) unsigned NOT NULL DEFAULT '0',
  `id_user_created` int(11) NOT NULL DEFAULT '0',
  `id_user_updated` int(11) NOT NULL DEFAULT '0',
  `id_user_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tbl_units_id_status_foreign` (`id_status`),
  CONSTRAINT `tbl_units_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `tbl_status` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_wiki.tbl_units: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_units` DISABLE KEYS */;
INSERT INTO `tbl_units` (`id`, `unit_name`, `class`, `logo_navbar`, `logo_footer`, `icon_footer`, `site`, `id_status`, `id_user_created`, `id_user_updated`, `id_user_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'UniSãoJosé', 'blue darken-4', 'logo_usj_white.png', 'logo_usj_blue.png', 'icon_usj.png', 'https://saojose.br', 1, 1, 0, 0, '2021-10-07 17:55:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'Colégio Realengo', 'red darken-4', 'logo_cr_white.png', 'logo_cr_red.png', 'icon_cr.png', 'https://colegiorealengo.br', 1, 1, 0, 0, '2021-10-07 17:55:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'Colégio Aplicação Taquara', 'yellow darken-3', 'logo_cca_tq.png', 'logo_cca_tq.png', 'icon_cca.png', 'https://aplicacao.rio.br/taquara', 1, 1, 0, 0, '2021-10-07 17:55:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, 'Colégio Aplicação Vila Militar', 'yellow darken-3', 'logo_cca_vm.png', 'logo_cca_vm.png', 'icon_cca.png', 'https://aplicacao.rio.br/vilamilitar', 1, 1, 0, 0, '2021-10-07 17:55:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbl_units` ENABLE KEYS */;

-- Copiando estrutura para tabela db_wiki.tbl_users
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `avatar` varchar(150) DEFAULT NULL,
  `first_name` varchar(150) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `id_role` int(11) unsigned NOT NULL DEFAULT '0',
  `id_status` int(11) unsigned NOT NULL DEFAULT '0',
  `id_user_created` int(11) NOT NULL DEFAULT '0',
  `id_user_updated` int(11) NOT NULL DEFAULT '0',
  `id_user_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `tbl_users_id_role_foreign` (`id_role`),
  KEY `tbl_users_id_status_foreign` (`id_status`),
  CONSTRAINT `tbl_users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `tbl_roles` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_users_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `tbl_status` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela db_wiki.tbl_users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
