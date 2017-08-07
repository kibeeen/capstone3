-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2017 at 06:54 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayosd2bet`
--

-- --------------------------------------------------------

--
-- Table structure for table `game_series`
--

CREATE TABLE `game_series` (
  `id` int(10) UNSIGNED NOT NULL,
  `gameSeriesName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game_series`
--

INSERT INTO `game_series` (`id`, `gameSeriesName`, `created_at`, `updated_at`) VALUES
(1, 'BO1', '2017-07-28 06:52:49', '2017-07-28 06:52:49'),
(2, 'BO2', '2017-07-28 06:53:02', '2017-07-28 06:53:02'),
(3, 'BO3', '2017-07-28 06:53:05', '2017-07-28 06:53:05'),
(4, 'BO4', '2017-07-28 06:53:09', '2017-07-28 06:53:09'),
(5, 'BO5', '2017-07-28 06:53:19', '2017-07-28 06:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `leagues`
--

CREATE TABLE `leagues` (
  `id` int(10) UNSIGNED NOT NULL,
  `leagueName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leagueBanner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leagueStartDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leagueEndDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leagues`
--

INSERT INTO `leagues` (`id`, `leagueName`, `leagueBanner`, `leagueStartDate`, `leagueEndDate`, `created_at`, `updated_at`) VALUES
(1, 'The International 2017 - Dota2 Championships', 'uploads/admin/league-banners/The International 2017 - Dota2 Championships.png', '2017-08-07', '2017-08-12', '2017-07-28 07:47:09', '2017-07-28 07:47:09'),
(2, 'StarLadder i-League Invitational #2', 'uploads/admin/league-banners/StarLadder i-League Invitational 2.png', '2017-09-05', '2017-09-12', '2017-07-28 07:48:28', '2017-07-28 07:48:28'),
(3, 'StarLadder', 'uploads/admin/league-banners/StarLadder.jpg', '2017-07-31', '2017-08-23', '2017-07-31 14:13:11', '2017-07-31 14:13:11'),
(4, 'Mayweather vs McGregor', 'uploads/admin/league-banners/Mayweather vs McGregor.jpg', '2017-08-27', '2017-08-27', '2017-08-02 08:14:46', '2017-08-02 08:14:46'),
(5, 'Conor McGregor vs Floyd Mayweather - The Money Fight', 'uploads/admin/league-banners/Conor McGregor vs Floyd Mayweather - The Money Fight.jpg', '2017-08-27', '2017-08-28', '2017-08-04 04:55:22', '2017-08-04 04:55:22'),
(6, 'NBA 2017-2018 Season', 'uploads/admin/league-banners/NBA 2017-2018 Season.jpg', '2017-10-18', '2018-04-18', '2017-08-06 03:11:08', '2017-08-06 03:11:08'),
(7, 'Champions League 2017', 'uploads/admin/league-banners/Champions League 2017.jpg', '2017-08-07', '2017-10-20', '2017-08-07 02:12:48', '2017-08-07 02:12:48'),
(8, 'Bullang Bullang 7-Bullstag Derby', 'uploads/admin/league-banners/Bullang Bullang 7-Bullstag Derby.png', '2017-08-07', '2017-08-18', '2017-08-07 02:29:30', '2017-08-07 02:29:30'),
(9, 'Will Drogon die and turn into ice dragon', 'uploads/admin/league-banners/Will Drogon die and turn into ice dragon.jpg', '2017-08-07', '2017-08-14', '2017-08-07 03:25:39', '2017-08-07 03:25:39'),
(10, 'Si Shane na ba ang icing sa ibabaw ng donut ni Joel?', 'uploads/admin/league-banners/Ikaw na ba ang icing sa ibabaw ng cupcake ko.gif', '2017-08-07', '2017-08-08', '2017-08-07 03:38:51', '2017-08-07 03:38:51');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(10) UNSIGNED NOT NULL,
  `matchName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matchCategoryID` int(11) NOT NULL,
  `gameSeriesID` int(11) NOT NULL,
  `sportsCatID` int(10) DEFAULT NULL,
  `betsTotal` int(11) DEFAULT NULL,
  `betsHomeTotal` int(11) DEFAULT NULL,
  `betsAwayTotal` int(11) DEFAULT NULL,
  `homeTeamID` int(11) NOT NULL,
  `homeTeamScore` int(11) DEFAULT NULL,
  `homeTeamWin` int(11) DEFAULT NULL,
  `homeTeamOdds` decimal(18,2) DEFAULT NULL,
  `homeTeamOddsPcnt` decimal(18,0) DEFAULT NULL,
  `draw` int(11) DEFAULT NULL,
  `awayTeamID` int(11) NOT NULL,
  `awayTeamScore` int(11) DEFAULT NULL,
  `awayTeamWin` int(11) DEFAULT NULL,
  `awayTeamOdds` decimal(18,2) DEFAULT NULL,
  `awayTeamOddsPcnt` decimal(18,0) DEFAULT NULL,
  `inPlay` tinyint(1) NOT NULL,
  `finished` tinyint(1) NOT NULL,
  `leagueID` int(11) NOT NULL,
  `startTime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `matchName`, `matchCategoryID`, `gameSeriesID`, `sportsCatID`, `betsTotal`, `betsHomeTotal`, `betsAwayTotal`, `homeTeamID`, `homeTeamScore`, `homeTeamWin`, `homeTeamOdds`, `homeTeamOddsPcnt`, `draw`, `awayTeamID`, `awayTeamScore`, `awayTeamWin`, `awayTeamOdds`, `awayTeamOddsPcnt`, `inPlay`, `finished`, `leagueID`, `startTime`, `created_at`, `updated_at`) VALUES
(14, '2017-08-06 02:00 - Evil Genius vs Team Fnatic', 4, 1, 1, 1000, 500, 500, 4, 0, 0, '0.95', '50', 0, 6, 1, 1, '0.95', '50', 0, 1, 1, '2017-08-06 02:00', '2017-08-05 15:45:40', '2017-08-05 17:49:20'),
(15, '2017-08-06 04:30 - TNC Pro Team vs Team Liquid', 4, 3, 1, 700, 200, 500, 2, 2, 1, '2.36', '29', 0, 1, 0, 0, '0.38', '71', 0, 1, 1, '2017-08-06 04:30', '2017-08-05 15:46:16', '2017-08-06 10:18:49'),
(16, '2017-08-27 10:00 - Conor McGregor vs Floyd Mayweather', 4, 1, 6, 542, 300, 242, 13, 0, 0, '0.76', '55', 0, 12, 1, 1, '1.17', '45', 0, 1, 5, '2017-08-27 10:00', '2017-08-05 15:47:10', '2017-08-07 03:05:56'),
(17, '2017-08-08 08:00 - Virtus Pro vs Evil Genius', 4, 3, 1, 185, 80, 105, 6, 0, 0, '1.24', '43', 0, 5, 0, 0, '0.72', '57', 0, 0, 1, '2017-08-08 08:00', '2017-08-05 15:47:49', '2017-08-07 03:14:15'),
(18, 'Los Angeles Lakers vs Oklahoma Thunders', 4, 1, 8, 0, 0, 0, 14, 0, 0, '0.00', '0', 0, 15, 0, 0, '0.00', '0', 0, 0, 6, '2017-11-01 10:00', '2017-08-06 03:13:59', '2017-08-06 03:13:59'),
(19, 'FC Barcelona vs Paris Saint Germain', 4, 1, 9, 0, 0, 0, 17, 0, 0, '0.00', '0', 0, 16, 0, 0, '0.00', '0', 0, 0, 7, '2017-08-16 10:05', '2017-08-07 02:15:09', '2017-08-07 02:15:09'),
(20, 'Cito Alberto vs TR Oragon Farm', 4, 1, 10, 1000, 210, 790, 19, 0, 0, '3.55', '21', 0, 18, 1, 1, '0.25', '79', 0, 1, 8, '2017-08-24 01:00', '2017-08-07 02:34:29', '2017-08-07 02:56:26'),
(21, 'No :( vs Yes', 4, 1, 12, 0, 0, 0, 20, 0, 0, '0.00', '0', 0, 21, 0, 0, '0.00', '0', 0, 0, 10, '2017-08-07 03:30', '2017-08-07 03:43:53', '2017-08-07 03:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `match_categories`
--

CREATE TABLE `match_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `matchCatName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `match_categories`
--

INSERT INTO `match_categories` (`id`, `matchCatName`, `created_at`, `updated_at`) VALUES
(4, 'Main match', '2017-08-03 15:28:42', '2017-08-03 15:28:42'),
(5, 'Handicap', '2017-08-03 15:28:48', '2017-08-03 15:28:48'),
(6, 'Firstblood win', '2017-08-03 15:28:55', '2017-08-03 15:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_07_27_075427_createUserBets', 1),
(4, '2017_07_27_075453_createMatches', 1),
(5, '2017_07_27_075527_createTeams', 1),
(6, '2017_07_27_075548_createLeagues', 1),
(7, '2017_07_27_075606_createUserStats', 1),
(8, '2017_07_27_075653_createUserRanks', 1),
(9, '2017_07_27_075726_createSportsCategories', 1),
(10, '2017_07_27_075803_createMatchCategories', 1),
(11, '2017_07_27_075824_createGameCategories', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('twirlwhirl@yahoo.com', '$2y$10$7FvBvb/DhBLlay14muUdnO/C1kJoCzgMmQdt.3Opc4d/0N.QGVxNq', '2017-07-30 06:10:47');

-- --------------------------------------------------------

--
-- Table structure for table `sports_categories`
--

CREATE TABLE `sports_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `sportsCatName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sportsCatIMG` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sports_categories`
--

INSERT INTO `sports_categories` (`id`, `sportsCatName`, `sportsCatIMG`, `created_at`, `updated_at`) VALUES
(1, 'Dota 2', 'uploads/admin/sports-category-thumbnails/Dota 2.png', '2017-07-28 13:37:52', '2017-07-28 13:37:52'),
(6, 'MMA - UFC', 'uploads/admin/sports-category-thumbnails/MMA - UFC.png', '2017-08-02 08:05:24', '2017-08-02 08:05:24'),
(8, 'Basketball - NBA', 'uploads/admin/sports-category-thumbnails/Basketball - NBA.png', '2017-08-06 03:06:48', '2017-08-06 03:06:48'),
(9, 'Soccer', 'uploads/admin/sports-category-thumbnails/Soccer.png', '2017-08-06 03:59:03', '2017-08-06 03:59:03'),
(10, 'Sabong', 'uploads/admin/sports-category-thumbnails/Sabong.png', '2017-08-07 02:31:17', '2017-08-07 02:31:17'),
(11, 'Game Of Thrones', 'uploads/admin/sports-category-thumbnails/Game Of Thrones.png', '2017-08-07 03:21:52', '2017-08-07 03:21:52'),
(12, 'Love Match', 'uploads/admin/sports-category-thumbnails/Love Match.png', '2017-08-07 03:38:17', '2017-08-07 03:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `teamABV` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teamName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teamLogo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sportsCategoryID` int(11) NOT NULL,
  `teamRank` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `teamABV`, `teamName`, `teamLogo`, `sportsCategoryID`, `teamRank`, `created_at`, `updated_at`) VALUES
(1, 'TNC', 'TNC Pro Team', 'uploads/admin/team-logos/TNC Pro Team.png', 1, NULL, '2017-07-28 14:41:42', '2017-07-28 14:41:42'),
(2, 'Liquid', 'Team Liquid', 'uploads/admin/team-logos/Team Liquid.png', 1, NULL, '2017-07-28 14:44:16', '2017-07-28 14:44:16'),
(3, 'Empire', 'Team Empire', 'uploads/admin/team-logos/Team Empire.png', 1, NULL, '2017-07-31 17:09:28', '2017-07-31 17:09:28'),
(4, 'Fnatic', 'Team Fnatic', 'uploads/admin/team-logos/Team Fnatic.png', 1, NULL, '2017-07-31 17:09:52', '2017-07-31 17:09:52'),
(5, 'VP', 'Virtus Pro', 'uploads/admin/team-logos/Virtus Pro.png', 1, NULL, '2017-07-31 17:10:33', '2017-07-31 17:10:33'),
(6, 'EG', 'Evil Genius', 'uploads/admin/team-logos/Evil Genius.png', 1, NULL, '2017-07-31 17:10:44', '2017-07-31 17:10:44'),
(7, 'DC', 'Digital Chaos', 'uploads/admin/team-logos/Digital Chaos.png', 1, NULL, '2017-07-31 17:10:58', '2017-07-31 17:10:58'),
(8, 'OG', 'OG Dota 2', 'uploads/admin/team-logos/OG Dota 2.png', 1, NULL, '2017-07-31 17:11:27', '2017-07-31 17:11:27'),
(12, 'Conor', 'Conor McGregor', 'uploads/admin/team-logos/Conor McGregor.png', 6, NULL, '2017-08-04 04:55:57', '2017-08-04 04:55:57'),
(13, 'Floyd', 'Floyd Mayweather', 'uploads/admin/team-logos/Floyd Mayweather.png', 6, NULL, '2017-08-04 04:56:12', '2017-08-04 04:56:12'),
(14, 'OKC', 'Oklahoma Thunders', 'uploads/admin/team-logos/Oklahoma Thunders.png', 8, NULL, '2017-08-06 03:11:49', '2017-08-06 03:11:49'),
(15, 'Lakers', 'Los Angeles Lakers', 'uploads/admin/team-logos/Los Angeles Lakers.png', 8, NULL, '2017-08-06 03:12:25', '2017-08-06 03:12:25'),
(16, 'Barca', 'FC Barcelona', 'uploads/admin/team-logos/FC Barcelona.png', 9, NULL, '2017-08-07 02:13:11', '2017-08-07 02:13:11'),
(17, 'PSG', 'Paris Saint Germain', 'uploads/admin/team-logos/Paris Saint Germain.png', 9, NULL, '2017-08-07 02:14:01', '2017-08-07 02:14:01'),
(18, 'Cito', 'Cito Alberto', 'uploads/admin/team-logos/Cito Alberto.png', 10, NULL, '2017-08-07 02:33:22', '2017-08-07 02:33:22'),
(19, 'TR Oragon', 'TR Oragon Farm', 'uploads/admin/team-logos/TR Oragon Farm.png', 10, NULL, '2017-08-07 02:33:40', '2017-08-07 02:33:40'),
(20, 'Yes', 'Yes', 'uploads/admin/team-logos/Yes.jpg', 12, NULL, '2017-08-07 03:39:27', '2017-08-07 03:39:27'),
(21, 'No', 'No :(', 'uploads/admin/team-logos/No.jpg', 12, NULL, '2017-08-07 03:41:15', '2017-08-07 03:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `displayIMG` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rankID` int(11) DEFAULT NULL,
  `coins` int(11) NOT NULL,
  `coinsInPlay` int(11) DEFAULT NULL,
  `pendingCashIn` int(11) DEFAULT NULL,
  `pendingCashOut` int(11) DEFAULT NULL,
  `banned` tinyint(1) DEFAULT NULL,
  `muted` tinyint(1) DEFAULT NULL,
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middleName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobileNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `displayIMG`, `rankID`, `coins`, `coinsInPlay`, `pendingCashIn`, `pendingCashOut`, `banned`, `muted`, `firstName`, `middleName`, `lastName`, `mobileNumber`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$Sa2fiIg/aeSFIMoMcrkMS.EGLZENraOsLJYR.6Pe2/EUOIRuAhkeS', 'kevincchavez@gmail.com', 'admin', NULL, NULL, 174, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, '2017-08-07 03:05:56'),
(2, 'twirlwhirl', '$2y$10$Sa2fiIg/aeSFIMoMcrkMS.EGLZENraOsLJYR.6Pe2/EUOIRuAhkeS', 'twirlwhirl@yahoo.com', 'bettor', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, 'j2tQC5S2xNmREEz44sziZqJeCfpq5yhRlnZS23YqZCdveSZYXji9iinxykb0', NULL, '2017-08-05 17:27:55'),
(4, 'kibeeen', '$2y$10$Sa2fiIg/aeSFIMoMcrkMS.EGLZENraOsLJYR.6Pe2/EUOIRuAhkeS', 'kevinchavez8@gmail.com', 'bettor', NULL, NULL, 390, 85, NULL, NULL, NULL, NULL, 'Kevin', 'C.', 'Chavez', NULL, NULL, 'O3CHJksRzAGFBcbMfWgxebXHp6jNuWfxjIqMuQOdse8em7jYXcFgviWxx1L6', NULL, '2017-08-06 15:23:07'),
(5, 'betlord', '$2y$10$Sa2fiIg/aeSFIMoMcrkMS.EGLZENraOsLJYR.6Pe2/EUOIRuAhkeS', 'betlord@yahoo.com', 'Bettor', NULL, NULL, 972, 0, NULL, NULL, NULL, NULL, 'Bet', 'Bettor', 'Master', NULL, NULL, 'WxQ38aIp82RISPvlxaIQg0V9f2fX3Qtbhwao4PMP1j9uGCkMmzrJEzp8Zhao', NULL, '2017-08-06 10:18:49'),
(6, 'benz26', '$2y$10$gO7G0o5N49v4NjLnOvgBQeg.w.QU1UtBQBj7MhCYxg1mWmfrtMos.', 'bhenzkhill26@gmail.com', 'bettor', NULL, NULL, 795, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-07 02:48:22', '2017-08-07 03:14:15'),
(7, 'jaekz', '$2y$10$YA0ZcQKZHeMkNW/M89lISuS7.oTi9UNVT5yeNboBUh58ahbDZcRDK', 'jaekz@test.com', 'bettor', NULL, NULL, 275, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-07 02:51:50', '2017-08-07 03:05:56'),
(8, 'arante', '$2y$10$9Qfpb26Ha0TW/OfAx0fc7uZtRS4zy8ZHo7/LEzuazTFd8KrtT55b2', 'arantebillywilson@gmail.com', 'bettor', NULL, NULL, 300, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-07 03:03:23', '2017-08-07 03:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_bets`
--

CREATE TABLE `user_bets` (
  `id` int(10) UNSIGNED NOT NULL,
  `teamChosenID` int(11) DEFAULT NULL,
  `teamNotChosenID` int(10) DEFAULT NULL,
  `coinsWagered` int(11) NOT NULL,
  `inPlay` tinyint(1) NOT NULL,
  `betWon` tinyint(1) DEFAULT NULL,
  `betLose` tinyint(1) DEFAULT NULL,
  `betCancelled` tinyint(1) DEFAULT NULL,
  `betLocked` tinyint(4) NOT NULL,
  `matchID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_bets`
--

INSERT INTO `user_bets` (`id`, `teamChosenID`, `teamNotChosenID`, `coinsWagered`, `inPlay`, `betWon`, `betLose`, `betCancelled`, `betLocked`, `matchID`, `userID`, `created_at`, `updated_at`) VALUES
(82, 4, 0, 500, 0, 0, 1, 0, 1, 14, 2, '2017-08-05 17:06:08', '2017-08-05 17:27:55'),
(83, 6, 0, 500, 0, 1, 0, 0, 1, 14, 4, '2017-08-05 17:06:16', '2017-08-05 17:27:55'),
(84, 6, 0, 75, 1, NULL, NULL, 0, 0, 17, 4, '2017-08-05 18:18:00', '2017-08-05 18:18:00'),
(85, 2, 0, 200, 0, 1, 0, 0, 1, 15, 5, '2017-08-06 03:55:38', '2017-08-06 10:18:49'),
(86, 1, 0, 500, 0, 0, 1, 0, 1, 15, 4, '2017-08-06 04:09:02', '2017-08-06 10:18:49'),
(87, 6, 0, 5, 1, NULL, NULL, 0, 0, 17, 4, '2017-08-06 13:45:55', '2017-08-06 13:45:55'),
(88, 5, 0, 5, 1, NULL, NULL, 0, 0, 17, 4, '2017-08-06 15:23:07', '2017-08-06 15:23:07'),
(89, 19, NULL, 0, 0, 0, 1, 0, 1, 20, 6, '2017-08-07 02:51:02', '2017-08-07 02:56:26'),
(90, 19, NULL, 10, 0, 0, 1, 0, 1, 20, 6, '2017-08-07 02:51:30', '2017-08-07 02:56:26'),
(91, 18, NULL, 1, 0, 1, 0, 0, 1, 20, 6, '2017-08-07 02:51:50', '2017-08-07 02:56:26'),
(92, 18, NULL, 300, 0, 1, 0, 0, 1, 20, 7, '2017-08-07 02:53:54', '2017-08-07 02:56:26'),
(93, 18, NULL, 489, 0, 1, 0, 0, 1, 20, 6, '2017-08-07 02:54:02', '2017-08-07 02:56:26'),
(94, 19, NULL, 200, 0, 0, 1, 0, 1, 20, 7, '2017-08-07 02:54:19', '2017-08-07 02:56:26'),
(95, 12, NULL, 13, 0, 1, 0, 0, 1, 16, 6, '2017-08-07 02:58:50', '2017-08-07 03:05:56'),
(96, 12, NULL, 3, 0, 1, 0, 0, 1, 16, 6, '2017-08-07 02:59:18', '2017-08-07 03:05:56'),
(97, 12, NULL, 13, 0, 1, 0, 0, 1, 16, 6, '2017-08-07 02:59:38', '2017-08-07 03:05:56'),
(98, 12, NULL, 12, 0, 1, 0, 0, 1, 16, 6, '2017-08-07 02:59:53', '2017-08-07 03:05:56'),
(99, 12, NULL, 201, 0, 1, 0, 0, 1, 16, 6, '2017-08-07 03:01:43', '2017-08-07 03:05:56'),
(100, 13, NULL, 100, 0, 0, 1, 0, 1, 16, 7, '2017-08-07 03:03:04', '2017-08-07 03:05:56'),
(101, 13, NULL, 200, 0, 0, 1, 0, 1, 16, 8, '2017-08-07 03:04:29', '2017-08-07 03:05:56'),
(102, 5, NULL, 100, 1, NULL, NULL, 0, 0, 17, 6, '2017-08-07 03:14:15', '2017-08-07 03:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_ranks`
--

CREATE TABLE `user_ranks` (
  `id` int(10) UNSIGNED NOT NULL,
  `rankName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rankIMG` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_stats`
--

CREATE TABLE `user_stats` (
  `id` int(10) UNSIGNED NOT NULL,
  `totalBets` int(11) DEFAULT NULL,
  `WonBets` int(11) DEFAULT NULL,
  `LoseBets` int(11) DEFAULT NULL,
  `ReturnBets` int(11) DEFAULT NULL,
  `totalProfit` int(11) NOT NULL,
  `totalTrades` int(11) DEFAULT NULL,
  `profitToday` int(11) DEFAULT NULL,
  `profitYesterday` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game_series`
--
ALTER TABLE `game_series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leagues`
--
ALTER TABLE `leagues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `match_categories`
--
ALTER TABLE `match_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sports_categories`
--
ALTER TABLE `sports_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_bets`
--
ALTER TABLE `user_bets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_ranks`
--
ALTER TABLE `user_ranks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_stats`
--
ALTER TABLE `user_stats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game_series`
--
ALTER TABLE `game_series`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `leagues`
--
ALTER TABLE `leagues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `match_categories`
--
ALTER TABLE `match_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sports_categories`
--
ALTER TABLE `sports_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_bets`
--
ALTER TABLE `user_bets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `user_ranks`
--
ALTER TABLE `user_ranks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_stats`
--
ALTER TABLE `user_stats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
