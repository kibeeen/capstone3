-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2017 at 11:14 AM
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
(5, 'Conor McGregor vs Floyd Mayweather - The Money Fight', 'uploads/admin/league-banners/Conor McGregor vs Floyd Mayweather - The Money Fight.jpg', '2017-08-27', '2017-08-28', '2017-08-04 04:55:22', '2017-08-04 04:55:22');

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
(10, '2017-08-04 00:00 - TNC Pro Team vs Evil Genius', 1, 2, 1, 550, 330, 220, 6, 0, 0, '0.63', '60', 0, 1, 0, 0, '1.42', '40', 1, 0, 1, '2017-08-04 00:00', '2017-08-03 13:15:28', '2017-08-04 06:27:14'),
(11, '2017-08-04 00:00 - Digital Chaos vs Virtus Pro', 1, 2, 1, 120, 50, 70, 5, 0, 0, '1.32', '42', 0, 7, 0, 0, '0.68', '58', 1, 0, 1, '2017-08-04 00:00', '2017-08-03 13:16:26', '2017-08-04 03:44:10'),
(12, '2017-08-27 10:00 - Connor McGregor vs Floyd Mayweather', 4, 1, 6, 55, 5, 50, 13, 0, 0, '9.45', '9', 0, 10, 0, 0, '0.09', '91', 0, 0, 5, '2017-08-27 10:00', '2017-08-04 04:56:45', '2017-08-04 06:15:18');

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
(2, 'Basketball', 'uploads/admin/sports-category-thumbnails/Basketball.jpg', '2017-07-28 13:39:10', '2017-07-28 13:39:10'),
(3, 'Soccer', 'uploads/admin/sports-category-thumbnails/Soccer.jpg', '2017-07-28 13:40:14', '2017-07-28 13:40:14'),
(6, 'MMA - UFC', 'uploads/admin/sports-category-thumbnails/MMA - UFC.png', '2017-08-02 08:05:24', '2017-08-02 08:05:24'),
(7, 'MMA - UFC', 'uploads/admin/sports-category-thumbnails/MMA - UFC.png', '2017-08-04 04:53:38', '2017-08-04 04:53:38');

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
(9, 'LGD', 'LGD Gaming', 'uploads/admin/team-logos/LGD Gaming.png', 1, NULL, '2017-07-31 17:11:44', '2017-07-31 17:11:44'),
(10, 'Connor', 'Connor McGregor', 'uploads/admin/team-logos/Connor McGregor.png', 1, NULL, '2017-08-02 08:11:37', '2017-08-02 08:11:37'),
(11, 'Gay', 'Floyd Gayweather', 'uploads/admin/team-logos/Floyd Gayweather.png', 6, NULL, '2017-08-02 08:12:44', '2017-08-03 11:03:19'),
(12, 'Conor', 'Conor McGregor', 'uploads/admin/team-logos/Conor McGregor.png', 6, NULL, '2017-08-04 04:55:57', '2017-08-04 04:55:57'),
(13, 'Floyd', 'Floyd Mayweather', 'uploads/admin/team-logos/Floyd Mayweather.png', 6, NULL, '2017-08-04 04:56:12', '2017-08-04 04:56:12');

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
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middleName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'admin', '$2y$10$Sa2fiIg/aeSFIMoMcrkMS.EGLZENraOsLJYR.6Pe2/EUOIRuAhkeS', 'kevincchavez@gmail.com', 'admin', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL),
(2, 'twirlwhirl', '$2y$10$Sa2fiIg/aeSFIMoMcrkMS.EGLZENraOsLJYR.6Pe2/EUOIRuAhkeS', 'twirlwhirl@yahoo.com', 'bettor', NULL, NULL, 4275, 725, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '10JQTBFpsOKP99F1K3S4paLx7NNYD6MoGR5VhShKcSR9UnuKGHJPZ7lKPiB0', NULL, '2017-08-04 06:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_bets`
--

CREATE TABLE `user_bets` (
  `id` int(10) UNSIGNED NOT NULL,
  `teamChosenID` int(11) DEFAULT NULL,
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

INSERT INTO `user_bets` (`id`, `teamChosenID`, `coinsWagered`, `inPlay`, `betWon`, `betLose`, `betCancelled`, `betLocked`, `matchID`, `userID`, `created_at`, `updated_at`) VALUES
(51, 6, 200, 1, NULL, NULL, 0, 1, 10, 2, '2017-08-03 17:35:06', '2017-08-04 03:59:40'),
(52, 1, 35, 1, NULL, NULL, 0, 1, 10, 2, '2017-08-03 17:35:11', '2017-08-04 03:59:40'),
(53, 6, 65, 1, NULL, NULL, 0, 1, 10, 2, '2017-08-03 17:35:18', '2017-08-04 03:59:40'),
(54, 1, 125, 1, NULL, NULL, 0, 1, 10, 2, '2017-08-03 17:35:21', '2017-08-04 03:59:40'),
(55, 1, 40, 1, NULL, NULL, 0, 1, 10, 2, '2017-08-03 17:35:30', '2017-08-04 03:59:40'),
(56, 6, 60, 1, NULL, NULL, 0, 1, 10, 2, '2017-08-03 17:35:42', '2017-08-04 03:59:40'),
(57, 1, 20, 1, NULL, NULL, 0, 1, 10, 2, '2017-08-04 03:22:36', '2017-08-04 03:59:40'),
(58, 5, 50, 1, NULL, NULL, 0, 1, 11, 2, '2017-08-04 03:22:51', '2017-08-04 03:42:28'),
(59, 7, 20, 1, NULL, NULL, 0, 1, 11, 2, '2017-08-04 03:22:56', '2017-08-04 03:42:28'),
(60, 7, 50, 1, NULL, NULL, 0, 1, 11, 2, '2017-08-04 03:44:10', '2017-08-04 03:44:48'),
(61, 10, 50, 1, NULL, NULL, 0, 0, 12, 2, '2017-08-04 06:14:15', '2017-08-04 06:14:15'),
(62, 13, 5, 1, NULL, NULL, 0, 0, 12, 2, '2017-08-04 06:15:18', '2017-08-04 06:15:18'),
(63, 6, 5, 1, NULL, NULL, 0, 0, 10, 2, '2017-08-04 06:27:14', '2017-08-04 06:27:14');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_bets`
--
ALTER TABLE `user_bets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
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
