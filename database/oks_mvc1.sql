-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.25-log - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп данных таблицы oks_mvc.files: ~0 rows (приблизительно)
DELETE FROM `files`;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` (`id`, `file_name`, `about`, `user_id`, `dt_add`) VALUES
	(1, '/img/5d56afd98fd01.jpeg', 'Супер фото', 15, '2019-08-16 20:30:01'),
	(3, '/img/5d56b30860539.jpeg', 'Аватар', 18, '2019-08-16 20:43:36');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;

-- Дамп данных таблицы oks_mvc.users: ~0 rows (приблизительно)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `login`, `user_name`, `user_pass`, `age`, `descript`, `avatar`, `dt_add`) VALUES
	(1, 'LogUs923361', 'Мистер 92309078', 'be5bb9aafb6f49ff69d9eebac96efb9a195f86ba1a4e8335ee130248cacc62eb', 84, 'Описание 109129991', NULL, '2019-08-16 20:23:15'),
	(2, 'LogUs232809', 'Мистер 82264546', '019933dfb29157048e335097f407651d3a02e1351f2434fbc9e286ee74c3dfe4', 62, 'Описание 109780030', NULL, '2019-08-16 20:23:15'),
	(3, 'LogUs531877', 'Мистер 56935022', '7853bebeffb18e6b9f27d6abd3b962d628eb7ad9837086c07dd30109d5cae186', 61, 'Описание 83570336', NULL, '2019-08-16 20:23:49'),
	(4, 'LogUs731550', 'Мистер 48647219', '2f5b704ceeb853d531a78ce83369656a4e0a93d876d76cb411f4c90e27614100', 32, 'Описание 61820239', NULL, '2019-08-16 20:23:49'),
	(5, 'LogUs267919', 'Мистер 6476234', 'b46ff2eca6fb68830f9a835eb2b2ff42f317bc02458c2394860b7e24919eb55c', 42, 'Описание 111186365', NULL, '2019-08-16 20:23:49'),
	(6, 'LogUs223528', 'Мистер 74736492', '3a3a31bc78e8923c0db7e36f8f2110ad43da026542ef299867281a73dde77fa7', 63, 'Описание 29896141', NULL, '2019-08-16 20:23:49'),
	(7, 'LogUs425975', 'Мистер 67330557', 'c6231754cea5afe092ed0fb46bb40acf55316ae30e69dba22f701fe23cea806f', 62, 'Описание 4846407', NULL, '2019-08-16 20:23:50'),
	(8, 'LogUs341871', 'Мистер 68002265', 'c7287a44c088508c929ef1ee08400b2c08f729d106617c651d5c769ca1847fad', 68, 'Описание 63024495', NULL, '2019-08-16 20:23:51'),
	(9, 'LogUs480008', 'Мистер 106492406', 'dc70be49d0679a559578cad696c19720ba369e8b4fc3471c0f177960827f02ea', 85, 'Описание 20746013', NULL, '2019-08-16 20:23:51'),
	(10, 'LogUs908184', 'Мистер 89664250', 'ab844b2509f7d9c923ddb2afce7f4eae221b9a0123f802a39799ef576f419b2c', 45, 'Описание 46139509', NULL, '2019-08-16 20:23:52'),
	(11, 'LogUs615239', 'Мистер 96914591', 'd543ac46af1c360fc422c821be07422e8165378b79ae5f363b09848a30b27af9', 21, 'Описание 43665081', NULL, '2019-08-16 20:23:52'),
	(12, 'LogUs665036', 'Мистер 54176970', 'c08ab181e76ea80795592df28e358e7bbc6cecfcce34d3697cdb6a7d3d32defb', 35, 'Описание 41396902', NULL, '2019-08-16 20:23:52'),
	(13, 'LogUs710660', 'Мистер 111075283', '3ae26c35e0daaf79f1383b94f787c69e56ff6b81dbe3004068ed6448967b2edd', 64, 'Описание 15814972', NULL, '2019-08-16 20:23:53'),
	(14, 'LogUs643675', 'Мистер 16252362', '083d8a54d757d656dcc1a38a512ea66ac9473ee161e99627643accdceb899a66', 85, 'Описание 18991283', NULL, '2019-08-16 20:23:53'),
	(15, 'Super', 'SuperWoman', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 33, 'jfkdjkfjiejeir', NULL, '2019-08-16 20:27:20'),
	(16, 'wwwwwwwww', 'Сова', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 66, 'УУУУУУУУУУУУУУУУУ', NULL, '2019-08-16 20:31:30'),
	(18, 'LoginQQQQ', 'Сова 555', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 55, 'УУУУУУУУУУУУУУУУУ', NULL, '2019-08-16 20:43:36');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
