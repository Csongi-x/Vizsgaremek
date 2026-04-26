-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2026. Ápr 26. 21:50
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `blathyfm`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `acceptable_music`
--

CREATE TABLE `acceptable_music` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `length` varchar(4) NOT NULL,
  `genre` enum('hit','rock','metal','pop','hip-hop','jazz','reggae','alternative','vaporwave','country','electronic','folk','other') NOT NULL,
  `link` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `accepted_music`
--

CREATE TABLE `accepted_music` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `length` varchar(4) NOT NULL,
  `link` varchar(100) NOT NULL,
  `accepted` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `accepted_music`
--

INSERT INTO `accepted_music` (`id`, `author`, `title`, `length`, `link`, `accepted`, `created_at`, `updated_at`) VALUES
(1, 'Alma Együttes', 'Almamánia', '3:32', 'https://youtu.be/k9zMsRUfi1g?si=AlyxJz5O5ojQ_hX1', 0, '2026-04-21 14:03:10', '2026-04-21 14:03:10'),
(2, 'Alma Együttes', 'Örök almáskert', '2:37', 'https://youtu.be/6qi-S1J6UaI?si=iPjpBUAAlazPoE3D', 0, '2026-04-21 14:03:10', '2026-04-21 14:03:10'),
(3, 'gy3r3k3k', 'AAAAAAAAAA', '5:56', 'https://youtu.be/6qt-S1J6UaI?si=iPjrBUAAlazPoE2D', 0, '2026-04-21 14:03:10', '2026-04-21 14:03:10'),
(4, 'Falco', 'Jeanny, part 1', '5:59', 'https://youtu.be/Urw-iutHw5E?si=xefL5ePBUDqYLy9C', 0, '2026-04-21 14:03:10', '2026-04-21 14:03:10'),
(5, 'Steklovata', 'Dva Mafona', '3:34', 'https://youtu.be/tmSGGWyauqo?si=2NvO2HAMQg4WWn8p', 1, '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(7, 's', 'd', '1:02', 'https://www.youtu.be/watch?q=fmigjtgktnjgkdtg', 0, '2026-04-22 14:58:24', '2026-04-22 14:58:24'),
(8, 'bl00dwave', 'bodies', '2:02', 'https://youtu.be/nLjQi9HFKjI?si=12fIQlqlkRB4fp4A', 1, '2026-04-22 14:58:57', '2026-04-22 14:58:57'),
(9, 'Alphaville', 'Big in Japan', '4:45', 'https://youtu.be/E2HeDHkL9kg?si=KzEccw1xcHXFwbBL', 1, '2026-04-22 14:58:57', '2026-04-22 14:58:57'),
(10, 'Falco', 'Einzelhaft', '4:03', 'https://youtu.be/e-wy1CvO6zQ?si=IwbGptusgzRFY0Z2', 1, '2026-04-22 14:58:57', '2026-04-22 14:58:57'),
(11, 'Falco', 'Rock Me Amadeus', '3:23', 'https://youtu.be/y-H895vrIU8?si=UR-Hk8gCZbLJMLjM', 1, '2026-04-22 14:58:57', '2026-04-22 14:58:57'),
(12, 'Rammstein', 'Deutschland', '9:23', 'https://youtu.be/NeQM1c-XCDc?si=CDRQWkdNIh0tFlG8', 1, '2026-04-22 15:03:06', '2026-04-22 15:03:06'),
(13, 'Shut Up', 'N*gga Soup', '2:53', 'https://youtu.be/NeQM1c-XCDc?si=CDRQWkdNIh0tFlG7', 0, '2026-04-22 15:04:07', '2026-04-22 15:04:07'),
(14, 'Shut Up', 'Homie', '3:02', 'https://youtu.be/NeQM1c-XCDc?si=CDRQWkdNIh0tFlG6', 0, '2026-04-22 15:05:31', '2026-04-22 15:05:31'),
(15, 'Apostol', 'Irány a galaxis', '5:07', 'https://youtu.be/mJA1kwVChRI?si=SXRYYNWkIyZAVKgt', 1, '2026-04-26 15:22:06', '2026-04-26 15:22:06'),
(16, 'Bad Bunny', 'eOo', '3:25', 'https://www.youtube.com/watch?v=JYekRpqL4O8', 1, '2026-04-26 17:33:28', '2026-04-26 17:33:28'),
(17, 'KFT', 'Balatoni Nyár', '4:11', 'https://youtu.be/jnZaVrAoJqo?si=sWK0tFHLZsJ6N9nw', 1, '2026-04-26 17:33:28', '2026-04-26 17:33:28');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2026_03_16_114039_create_users_table', 1),
(2, '2026_03_16_114045_create_roles_table', 1),
(3, '2026_03_16_114057_create_acceptable_music_table', 1),
(4, '2026_03_16_114104_create_accepted_music_table', 1),
(5, '2026_03_16_114109_create_music_table', 1),
(6, '2026_03_16_114122_create_requested_music_table', 1),
(7, '2026_03_16_114130_create_playlist_table', 1),
(8, '2026_03_25_091827_create_personal_access_tokens_table', 1),
(9, '2026_04_13_081017_create_pending_users_table', 1),
(10, '2026_04_20_122609_create_played_lists_table', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `music`
--

CREATE TABLE `music` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `length` varchar(4) NOT NULL,
  `genre` enum('hit','rock','metal','pop','hip-hop','jazz','reggae','alternative','vaporwave','country','electronic','folk','other') NOT NULL,
  `link` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `music`
--

INSERT INTO `music` (`id`, `author`, `title`, `length`, `genre`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Steklovata', 'Dva Mafona', '3:34', 'hit', 'https://youtu.be/tmSGGWyauqo?si=2NvO2HAMQg4WWn8p', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(2, 'Steklovata', 'Korablik', '4:13', 'hit', 'https://youtu.be/v7Zf5L9FMNU?list=OLAK5uy_n1iQvIM_Z_jRfvz620ZIKX5NuGEulbk_0', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(3, 'ABBA', 'Money, Money, Money', '3:07', 'hit', 'https://youtu.be/ETxmCCsMoD0?si=eucYt_PsqO7ohCoS', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(4, 'Falco', 'Europa', '5:08', 'hit', 'https://youtu.be/HiO71E1twJA?si=Gv3WJi26GPpYXXS5', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(5, 'Mo-Do', 'Hamlet', '4:11', 'electronic', 'https://youtu.be/lPammWdjxD4?si=d-McbRU_GrOMltpC', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(6, 'Rammstein', 'Amerika', '4:17', 'metal', 'https://youtu.be/Rr8ljRgcJNM?si=IrBan0o4q8mpGJi1', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(7, 'Alphaville', 'Big in Japan', '4:45', 'hit', 'https://youtu.be/E2HeDHkL9kg?si=5Hsn-21tfe3g1OO9', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(8, 'Falco', 'Einzelhaft', '4:01', 'hit', 'https://youtu.be/d7VdiF5YuxU?si=A51s4f-dZrTZt0vr', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(9, 'C418', 'Haunt Muskie', '6:02', 'electronic', 'https://youtu.be/YYfBJBj3emg?si=jOzbWc7t16QARSXp', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(10, 'Sonic Music', 'Nah Neh Nah (tribal)', '3:52', 'folk', 'https://youtu.be/kRrLew-bS2o?si=way8guXwJRgGz0_e', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(11, 'Tom Odell', 'Another Love (Tiësto Remix)', '3:04', 'hit', 'https://youtu.be/KBlkwbnX8c8', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(12, 'Eiffel 65', 'Move Your Body', '4:30', 'hit', 'https://youtu.be/mHv4rpBo7ss?si=AIGNEtXO-qDtYqSR', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(13, 'Rácz Gergő', 'VALAMI', '3:08', 'hit', 'https://youtu.be/fqTJcoSi6kQ?si=Y58b6DMPSqGoKIyZ', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(14, 'Sade', 'Smooth Operator - Enzo Edit', '3:40', 'hit', 'https://youtu.be/v4kTe0taRlA?si=lGJzBCbsSmVkIzXc', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(15, 'Murray Head', 'One Night in Bangkok', '3:13', 'hit', 'https://youtu.be/rgc_LRjlbTU?si=tM3F4xNWA4Z-NZcc', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(16, 'Mo-Do', 'Liebes Tango', '4:05', 'hit', 'https://youtu.be/EHWJrTjvXfY', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(17, 'Mo-Do', 'Das Konzert', '4:44', 'hit', 'https://youtu.be/1gT9NjgCJCs?si=ExsXIbtAWun-Qz_S', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(18, 'Dan Bălan', 'Hold On Love', '3:58', 'hit', 'https://youtu.be/Is-AEgolHnI?si=JwMeKNtg98z-Dv2x', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(19, 'Radioflash', 'Play That Record Too (Slowed Version)', '5:52', 'hit', 'https://youtu.be/12T4NjgCJCs?si=rxsXIbttWun-Qz_u', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(20, 'Bárány Attila X Delerium', 'Silence 2008', '3:34', 'hit', 'https://youtu.be/qLncpt--7XY?si=Fz3FX-nZVukbKk7G', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(21, 'Kiwi', 'Neked adom (Club mix)', '4:33', 'hit', 'https://youtu.be/rkMeJHch8zU?si=dNGuOrIbkeeL1SjH', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(22, 'Bogdan DLP', 'Habibi', '2:10', 'hit', 'https://youtu.be/TzsGpTZK9J0?si=xj7rfNb9zxKwdtLw', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(23, '@raresmaris X Bodgan DLP', 'Guli Guli', '2:31', 'hit', 'https://youtu.be/fF-fev61CTU?si=9RgSONaZYAhWybH_', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(24, 'V.S.O.P.', 'Ilyen az élet (club mix)', '4:05', 'hit', 'https://youtu.be/LUD2u9Pi7SU?si=8PUxTj0CO2NDyFRX', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(25, 'Kraftwerk', 'The Robots', '6:12', 'electronic', 'https://youtu.be/68d8GRgiec4?si=mUQ9YaTfJOQfTK-y', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(26, 'Katy Perry feat. Snoop Dogg', 'California Gurls', '3:53', 'hit', 'https://youtu.be/F57P9C4SAW4?si=gXqnUZysVHFDzA23', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(27, 'The Chainsmokers', 'Channel 1', '3:20', 'hit', 'https://youtu.be/m2rXTtVa2Vc?si=MBRNk78I1EMPrCrT', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(28, 'Tobi King', 'Loli Mou', '3:43', 'hit', 'https://youtu.be/6ZqaXHSE7gY?si=_of61hMEnoGJiZ_c', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(29, 'Salman Shah, Shabnur, Anondo Osru', 'Tumi Mor Jiboner', '4:40', 'folk', 'https://youtu.be/fW1dwvF5qKo', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(30, 'Ei Mukhorito Jiboner', 'Super Souls', '4:22', 'hit', 'https://youtu.be/RIcLHVlCzY0', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(31, 'Podel', 'Magnolia Blooms', '1:57', 'electronic', 'https://youtu.be/zqIAp-MHOao', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(32, 'The Rising Stars', 'Merck Toch Hoe Sterck', '2:24', 'electronic', 'https://youtu.be/o762_OdZUgg', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(33, 'The Chainsmokers', 'Riptide', '2:51', 'hit', 'https://youtu.be/sMlER3GMR7c?si=viJKZW_qCEF_bpbf', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(34, 'D. V. Paluskar', 'Raghupati Raghav Raja Ram', '3:37', 'folk', 'https://youtu.be/MoeC0JEEt9U?si=y37yphwgRr4tGTW1', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(35, 'Arany Zoltán', 'Palästinalied', '3:50', 'folk', 'https://youtu.be/rMnXhAFW0vc', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(36, 'O-Zone', 'Dragostea Din Tei', '4:46', 'hit', 'https://youtu.be/YnopHCL1Jk8?si=3xDM0XPrQTi6o023', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(37, 'Marshmello ft. Bastille', 'Happier', '3:53', 'hit', 'https://youtu.be/m7Bc3pLyij0?si=8OAXNTHlqR0jvyXh', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(38, 'Compact Disco', 'Te meg én', '4:03', 'hit', 'https://youtu.be/l5mzxDRUdl0?si=bmcH14713QEVx3yE', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(39, 'bl00dwave', 'bodies', '2:02', 'vaporwave', 'https://youtu.be/nLjQi9HFKjI?si=12fIQlqlkRB4fp4A', '2026-04-22 14:58:57', '2026-04-22 14:58:57'),
(41, 'Falco', 'Einzelhaft', '4:03', 'hit', 'https://youtu.be/e-wy1CvO6zQ?si=IwbGptusgzRFY0Z2', '2026-04-22 14:58:57', '2026-04-22 14:58:57'),
(42, 'Falco', 'Rock Me Amadeus', '3:23', 'hit', 'https://youtu.be/y-H895vrIU8?si=UR-Hk8gCZbLJMLjM', '2026-04-22 14:58:57', '2026-04-22 14:58:57'),
(43, 'Rammstein', 'Deutschland', '9:23', 'metal', 'https://youtu.be/NeQM1c-XCDc?si=CDRQWkdNIh0tFlG8', '2026-04-22 15:03:06', '2026-04-22 15:03:06'),
(44, 'Apostol', 'Irány a galaxis', '5:07', 'hit', 'https://youtu.be/mJA1kwVChRI?si=SXRYYNWkIyZAVKgt', '2026-04-26 15:22:06', '2026-04-26 15:22:06'),
(45, 'Bad Bunny', 'eOo', '3:25', 'hit', 'https://www.youtube.com/watch?v=JYekRpqL4O8', '2026-04-26 17:33:28', '2026-04-26 17:33:28'),
(46, 'KFT', 'Balatoni Nyár', '4:11', 'hit', 'https://youtu.be/jnZaVrAoJqo?si=sWK0tFHLZsJ6N9nw', '2026-04-26 17:33:28', '2026-04-26 17:33:28');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pending_users`
--

CREATE TABLE `pending_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `role` enum('student','admin','scheduler') NOT NULL,
  `status` enum('accepted','rejected','pending') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `pending_users`
--

INSERT INTO `pending_users` (`id`, `full_name`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(14, 'Kolomme Volvó', 'kolomme.volvo@blathy.info', 'nemVagyokBusz();', 'admin', 'accepted', '2026-04-24 16:09:18', '2026-04-24 14:10:10'),
(15, 'Ballagó Andrea', 'ballago.andrea@blathy.info', 'async reload() {', 'scheduler', 'accepted', '2026-04-24 16:09:56', '2026-04-24 14:10:13'),
(16, 'mifbgnlfgfewkml', 'example@gmail.ua', '1234', 'student', 'rejected', '2026-04-24 16:10:50', '2026-04-24 14:11:01'),
(17, 'Jobb Endre', 'jobb.endre@blathy.info', '$2y$12$PSj1NArYPfwa4d9VD0cJdeTsVstjz0iPogJRCBc/KtF2uSB.Hw332', 'student', 'accepted', '2026-04-26 17:25:19', '2026-04-26 17:26:08');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `played_lists`
--

CREATE TABLE `played_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `length` varchar(4) NOT NULL,
  `link` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `played_lists`
--

INSERT INTO `played_lists` (`id`, `author`, `title`, `length`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Bárány Attila X Delerium', 'Silence 2008', '3:34', 'https://youtu.be/qLncpt--7XY?si=Fz3FX-nZVukbKk7G', '2026-04-21 14:03:12', '2026-04-21 14:03:12'),
(2, 'Kiwi', 'Neked adom (Club mix)', '4:33', 'https://youtu.be/rkMeJHch8zU?si=dNGuOrIbkeeL1SjH', '2026-04-21 14:03:12', '2026-04-21 14:03:12'),
(3, 'Bogdan DLP', 'Habibi', '2:10', 'https://youtu.be/TzsGpTZK9J0?si=xj7rfNb9zxKwdtLw', '2026-04-21 14:03:12', '2026-04-21 14:03:12'),
(4, '@raresmaris X Bodgan DLP', 'Guli Guli', '2:31', 'https://youtu.be/fF-fev61CTU?si=9RgSONaZYAhWybH_', '2026-04-21 14:03:12', '2026-04-21 14:03:12');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `playlist`
--

CREATE TABLE `playlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `length` varchar(4) NOT NULL,
  `link` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `playlist`
--

INSERT INTO `playlist` (`id`, `order_number`, `author`, `title`, `length`, `link`, `created_at`, `updated_at`) VALUES
(1, 1, 'Steklovata', 'Dva Mafona', '3:34', 'https://youtu.be/tmSGGWyauqo?si=2NvO2HAMQg4WWn8p', '2026-04-26 17:43:30', '2026-04-26 17:43:30'),
(2, 2, 'Falco', 'Einzelhaft', '4:01', 'lusta vagyok beírni bocsika', '2026-04-26 17:43:30', '2026-04-26 17:43:30'),
(3, 3, 'Rammstein', 'Deutschland', '9:23', 'https://youtu.be/NeQM1c-XCDc?si=CDRQWkdNIh0tFlG8', '2026-04-26 17:43:30', '2026-04-26 17:43:30');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `requested_music`
--

CREATE TABLE `requested_music` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `length` varchar(4) NOT NULL,
  `link` varchar(100) NOT NULL,
  `message` varchar(160) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `requested_music`
--

INSERT INTO `requested_music` (`id`, `email`, `author`, `title`, `length`, `link`, `message`, `created_at`, `updated_at`) VALUES
(1, 'elromlott.andras.andris@blathy.info', 'Steklovata', 'Korablik', '4:13', 'https://youtu.be/v7Zf5L9FMNU?list=OLAK5uy_n1iQvIM_Z_jRfvz620ZIKX5NuGEulbk_0', 'tizen kettő negyvenötkór nyomjád lefelé béjbéééééééééééééé sigma', '2026-04-21 14:03:11', '2026-04-21 14:03:11'),
(3, 'susan.csongor.gyorgy@blathy.info', 'Falco', 'Europa', '5:08', 'https://youtu.be/HiO71E1twJA?si=Gv3WJi26GPpYXXS5', NULL, '2026-04-22 08:17:57', '2026-04-22 08:17:57'),
(4, 'susan.csongor.gyorgy@blathy.info', 'Eiffel 65', 'Move Your Body', '4:30', 'https://youtu.be/mHv4rpBo7ss?si=AIGNEtXO-qDtYqSR', NULL, '2026-04-22 08:43:47', '2026-04-22 08:43:47'),
(10, 'susan.csongor.gyorgy@blathy.info', 'Bárány Attila X Delerium', 'Silence 2008', '3:34', 'https://youtu.be/qLncpt--7XY?si=Fz3FX-nZVukbKk7G', 'Ezt meg ki engedélyezte?', '2026-04-26 13:29:39', '2026-04-26 13:29:39'),
(11, 'susan.csongor.gyorgy@blathy.info', 'Steklovata', 'Dva Mafona', '3:34', 'https://youtu.be/tmSGGWyauqo?si=2NvO2HAMQg4WWn8p', 'de jó cucc', '2026-04-26 17:30:06', '2026-04-26 17:30:06'),
(12, 'susan.csongor.gyorgy@blathy.info', 'D. V. Paluskar', 'Raghupati Raghav Raja Ram', '3:37', 'https://youtu.be/MoeC0JEEt9U?si=y37yphwgRr4tGTW1', '2022', '2026-04-26 17:30:30', '2026-04-26 17:30:30'),
(13, 'susan.csongor.gyorgy@blathy.info', 'Rammstein', 'Deutschland', '9:23', 'https://youtu.be/NeQM1c-XCDc?si=CDRQWkdNIh0tFlG8', 'BLÁTHY.mp3', '2026-04-26 17:30:45', '2026-04-26 17:30:45');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(80) NOT NULL,
  `full_name` varchar(80) NOT NULL,
  `role` enum('student','admin','scheduler') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `email`, `full_name`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'susan.csongor.gyorgy@blathy.info', 'Susán Csongor György', 'student', '$2y$12$A5fXwi/54KQJi4qOFZqXre5tfQhZIAWX1dmNSzYk.wxEjmFNO8fD6', '2026-04-21 14:03:10', '2026-04-21 14:03:10'),
(2, 'lance.strulovitch@blathy.info', 'Lance Strulovitch', 'student', '$2y$12$DZmfkUanobIhoQDW9EHzDOew0b0JE2Y1m3CKoZeMqKlWqR0HQQyUW', '2026-04-21 14:03:10', '2026-04-21 14:03:10'),
(3, 'feng.xie@blathy.info', 'Feng Xie', 'student', '$2y$12$hfeZ3PDuozkMzPWh0ZWtn.DNf0az3lTU7Hid1OAVIFPFemxKX01F6', '2026-04-21 14:03:10', '2026-04-21 14:03:10'),
(4, 'elromlott.andras.andris@blathy.info', 'Elromlott András Andris', 'student', '$2y$12$EWJo2rRPPX8o9jN2L5VYpO5.ndmdvKcyEoaISI/NvtU4vVyrC2V9S', '2026-04-21 14:03:10', '2026-04-21 14:03:10'),
(5, 'rendszergazda@blathy.info', 'Harangozó Zsolt', 'admin', '$2y$12$DF4WR3ZwNKgtt8Xf1XFZd.fTEo23yfg2T8l/z5DEOgoXS9c9AzncG', '2026-04-21 14:03:10', '2026-04-21 14:03:10'),
(6, 'elnabulsy.csongor.alan@blathy.info', 'El-Nabulsy Csongor Alan', 'student', '$2y$12$63GzyI/7L71Bbkhve0tk9uTKd0CaaEzxFW5/iepdrm8xmrqmnVfdq', '2026-04-21 14:03:10', '2026-04-21 14:03:10'),
(7, 'klebesz.kinga@blathy.info', 'Klébesz Kinga', 'scheduler', '$2y$12$.kD9IN7EuLBiYq4k4t4ZmOG/92V3havRHhP2eG84BMFlNsjA4mIB.', '2026-04-21 14:03:10', '2026-04-21 14:03:10'),
(8, 'anya@blathy.info', 'Mittoménmi Gergely Zsófia', 'scheduler', '$2y$12$cX68H6O9UDHzTGhBiWJXve7dyYSuGAmuKQ47BTPhJYoV6stieGWtu', '2026-04-22 10:11:08', '2026-04-22 10:11:08'),
(9, 'tamas.krisztian@blathy.info', 'Tamás Krisztián', 'student', '$2y$12$LlQgAzADFWBWB2VCrBhBCu.Xy5599/tf1JGPB1w4iHF6ABv61zYnG', '2026-04-22 10:11:25', '2026-04-22 10:11:25'),
(10, 'detar.kiss.armin@blathy.info', 'Détár-Kiss Ármin', 'student', '$2y$12$e5ukRRr5IAEvpql9DpfhvOTPZml7CGKkZZ9F6QIxzNe8r/TYxo3.a', '2026-04-24 12:57:54', '2026-04-24 12:57:54'),
(11, 'mgilegmtoigmeiog@blofi.informatika', 'pillangó123', 'student', '$2y$12$VI81qWCD35LSUipPBEkLo.MGLPG0HfG8yvieJQZwikOpmZxNQSDC2', '2026-04-24 13:29:51', '2026-04-24 13:29:51'),
(12, 'iancu.toth.daniel@blathy.info', 'Iancu-Tóth Dániel', 'student', '$2y$12$IFVFLNw6PN559xmuYHuyd.XdsnpprAUQh3E7TQbVYZnZYM2XLaoKq', '2026-04-24 13:31:29', '2026-04-24 13:31:29'),
(13, 'weber.gabor@blathy.info', 'Wéber Gábor', 'scheduler', '$2y$12$Kv3q7f.NPPBNcYgjCooFyuMnT5MAlHUerKFYFKEP5EzwvzNiPfuZW', '2026-04-24 13:31:38', '2026-04-24 13:31:38'),
(14, 'utolso.gabor.robert@blathy.info', 'Utolsó Gábor Róbert', 'admin', '$2y$12$keT9WJMVEDGDNW919DJg8u3vnEs0VM6.C1Rlyg67hqubc1FDQlPmq', '2026-04-24 13:33:40', '2026-04-24 13:33:40'),
(18, 'hoffmann.adam@blathy.info', 'Hoffmann Ádám', 'student', '$2y$12$388azbnGVsEv8avQjprhAOYSVlwe.oSHAEJEWWCiC5axMH5p70Tfe', '2026-04-24 13:45:33', '2026-04-24 13:45:33'),
(19, 'jutasi.eneh@blathy.info', 'Jutasi Enéh', 'student', '$2y$12$CVno/xSitqcj5h5KjmpoFeutV/azNuPoChfG9dCquxdGHrQ.pP2zO', '2026-04-24 13:48:01', '2026-04-24 13:48:01'),
(20, 'imre.balint@blathy.info', 'Imre Bálint', 'student', '$2y$12$iwhMjFnl3EA.z8yjiagSDOFjy12gOLHVJ4rQpsegsuvMpFemnryl6', '2026-04-24 13:53:50', '2026-04-24 13:53:50'),
(22, 'konya.milla@blathy.info', 'Kónya Milla', 'student', '$2y$12$4HPuEdxyWQXEzPuKVBHNv.alOyZXxS5rzqhtAWmeMiBbs7mpxqftC', '2026-04-24 13:54:53', '2026-04-24 13:54:53'),
(24, 'kriston.puskas.ruben@blathy.info', 'Kriston-Puskás Ruben', 'student', '$2y$12$Q2FvAiIdz8C0BpSPXsXiBO9qKH3UWKIZ5BcyOX/X.yK5eDAmv7CPm', '2026-04-24 13:57:57', '2026-04-24 13:57:57'),
(25, 'dobos.barnabas@blathy.info', 'Dobos Barnabás', 'student', '$2y$12$KfwjBM2RyGSLHsgwpviqgO.Gr8sQpQQmtxjjN0AC7g1j9NRowjqXS', '2026-04-24 13:58:06', '2026-04-24 13:58:06'),
(26, 'deak.adam@blathy.info', 'Deák Ádám', 'student', '$2y$12$Oqlx1r8OAXLPWIIxI83KQOfQpTagmXE7p13JbEQ37FdHlDkLT0LEe', '2026-04-24 13:58:08', '2026-04-24 13:58:08'),
(27, 'kolomme.volvo@blathy.info', 'Kolomme Volvó', 'admin', '$2y$12$nlQWA1GGhfpV/n8q6VIDxurQy1QwcWSDQLaPk0zIvgaB9SbdwciCu', '2026-04-24 14:10:10', '2026-04-24 14:10:10'),
(28, 'ballago.andrea@blathy.info', 'Ballagó Andrea', 'scheduler', '$2y$12$wvYNETfrWk26nhuhpSGjUOOPxCBb4mv8WRqyohM319UiHAS.hBOD6', '2026-04-24 14:10:13', '2026-04-24 14:10:13'),
(29, 'jobb.endre@blathy.info', 'Jobb Endre', 'student', '$2y$12$xU6Tf4sTHmq3tQKnbKS/xOFaMzf6fjC48rw8JgUnSBpENb2XRPj8C', '2026-04-26 17:26:09', '2026-04-26 17:26:09');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `acceptable_music`
--
ALTER TABLE `acceptable_music`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `accepted_music`
--
ALTER TABLE `accepted_music`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `pending_users`
--
ALTER TABLE `pending_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pending_users_email_unique` (`email`);

--
-- A tábla indexei `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- A tábla indexei `played_lists`
--
ALTER TABLE `played_lists`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `requested_music`
--
ALTER TABLE `requested_music`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `acceptable_music`
--
ALTER TABLE `acceptable_music`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `accepted_music`
--
ALTER TABLE `accepted_music`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `music`
--
ALTER TABLE `music`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT a táblához `pending_users`
--
ALTER TABLE `pending_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT a táblához `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `played_lists`
--
ALTER TABLE `played_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `requested_music`
--
ALTER TABLE `requested_music`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
