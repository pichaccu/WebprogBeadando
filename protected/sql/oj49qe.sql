-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3308
-- Létrehozás ideje: 2020. Ápr 10. 10:14
-- Kiszolgáló verziója: 8.0.18
-- PHP verzió: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `oj49qe`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `norm_dupe` int(10) NOT NULL,
  `Planting` varchar(10) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `harvest_choice` varchar(5) CHARACTER SET utf8 COLLATE utf8_hungarian_ci DEFAULT 'nem',
  `Fertilizer` varchar(5) CHARACTER SET utf8 COLLATE utf8_hungarian_ci DEFAULT 'nem',
  `comment` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `project`
--

INSERT INTO `project` (`norm_dupe`, `Planting`, `harvest_choice`, `Fertilizer`, `comment`, `id`) VALUES
(12, 'Cserépben', 'igen', 'igen', 'trágyázva van a szar', 1),
(8, 'Vadon', 'igen', 'igen', 'kecsené', 2),
(12, 'Cserépben', 'igen', 'igen', 'asdasda', 4),
(12, 'Cserépben', 'igen', NULL, 'sadasfasfas', 5),
(2, 'Vadon', NULL, NULL, 'teszt200', 6),
(2, 'Vadon', NULL, NULL, 'teszt200', 7),
(12, 'Cserépben', NULL, NULL, '12314', 8),
(12, 'Cserépben', NULL, 'igen', '4124', 9),
(12, 'Cserépben', NULL, NULL, 'miért', 10);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `permission` int(1) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `permission`) VALUES
(1, 'Admin', 'Admin', 'admin@admin.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1),
(2, 'Fekete', 'Szabolcs', 'fekszabolcs@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
