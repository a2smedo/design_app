-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 01:30 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `design_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

CREATE TABLE `cats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id`, `name`, `img`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"veniam\",\"ar\":\"vel\"}', 'Voluptatem et et.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(2, '{\"en\":\"exercitationem\",\"ar\":\"deleniti\"}', 'Est ut.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(3, '{\"en\":\"aut\",\"ar\":\"dolores\"}', 'Placeat ab et.', '2021-03-21 11:20:39', '2021-03-21 11:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `competitiondesign_user`
--

CREATE TABLE `competitiondesign_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `competitiondesign_id` bigint(20) UNSIGNED NOT NULL,
  `rate` double(3,1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `competitiondesign_user`
--

INSERT INTO `competitiondesign_user` (`id`, `user_id`, `competitiondesign_id`, `rate`, `created_at`, `updated_at`) VALUES
(2, 4, 1, 3.0, '2021-03-22 17:25:11', '2021-03-22 17:25:23'),
(3, 1, 1, 4.5, '2021-03-22 17:29:22', '2021-03-22 17:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `competitions`
--

CREATE TABLE `competitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `competitions`
--

INSERT INTO `competitions` (`id`, `name`, `desc`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"competition1\",\"ar\":\"مسابقة1\"}', '{\"en\":\"test1\",\"ar\":\"تحربة1\"}', '2021-03-31 00:00:00', '2021-03-22 17:44:20', '2021-03-22 17:44:20'),
(2, '{\"en\":\"competition2\",\"ar\":\"مسابقة2\"}', '{\"en\":\"test12\",\"ar\":\"تحربة2\"}', '2021-04-03 00:00:00', '2021-03-22 17:45:21', '2021-03-22 17:45:21');

-- --------------------------------------------------------

--
-- Table structure for table `competition_designs`
--

CREATE TABLE `competition_designs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `competition_id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` double(3,1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `competition_designs`
--

INSERT INTO `competition_designs` (`id`, `competition_id`, `name`, `img`, `desc`, `rate`, `created_at`, `updated_at`) VALUES
(1, 1, 'test-name1', 'test-img1', 'test-desc1', 3.8, '2021-03-22 17:48:19', '2021-03-22 17:38:10'),
(2, 1, 'test-name2', 'test-img2', 'test-desc2', 0.0, '2021-03-22 17:48:19', '2021-03-22 17:48:19'),
(3, 2, 'test-name3', 'test-img3', 'test-desc3', 0.0, '2021-03-22 17:48:19', '2021-03-22 17:48:19'),
(4, 2, 'test-name4', 'test-img4', 'test-desc4', 0.0, '2021-03-22 17:48:19', '2021-03-22 17:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designimgs`
--

CREATE TABLE `designimgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `design_id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designimgs`
--

INSERT INTO `designimgs` (`id`, `design_id`, `img`, `created_at`, `updated_at`) VALUES
(1, 1, 'Voluptatibus alias ducimus aspernatur.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(2, 1, 'Architecto ullam itaque.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(3, 1, 'Et excepturi rerum.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(4, 2, 'Expedita illo et.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(5, 2, 'Sed hic nihil.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(6, 2, 'Quam aliquam sed voluptatibus.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(7, 3, 'Atque illum illum.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(8, 3, 'Perspiciatis mollitia iusto similique.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(9, 3, 'Qui officiis voluptates.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(10, 4, 'Sit maiores est occaecati.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(11, 4, 'Architecto omnis consequuntur porro.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(12, 4, 'Et dignissimos sit.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(13, 5, 'Aut ut rem.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(14, 5, 'Ab delectus sint.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(15, 5, 'Nisi laboriosam dicta eos.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(16, 6, 'Adipisci ipsa reprehenderit.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(17, 6, 'Consequatur aperiam autem dolorum.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(18, 6, 'Quia inventore pariatur sed.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(19, 7, 'Eius nam repellat.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(20, 7, 'Unde id aut nam.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(21, 7, 'Fugit in.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(22, 8, 'Dolorem corporis deserunt beatae ipsam.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(23, 8, 'Dolorem maxime maiores.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(24, 8, 'Dolorum sequi nesciunt perspiciatis ea.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(25, 9, 'Reprehenderit dolor id fugit.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(26, 9, 'Omnis cum deserunt voluptas dolor.', '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(27, 9, 'Aspernatur praesentium ut.', '2021-03-21 11:20:39', '2021-03-21 11:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `designs`
--

CREATE TABLE `designs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(5,2) NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `font` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` float(3,1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designs`
--

INSERT INTO `designs` (`id`, `cat_id`, `name`, `main_img`, `desc`, `price`, `discount`, `lang`, `background`, `font`, `color`, `details`, `rate`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"en\":\"possimus\",\"ar\":\"consequatur\"}', 'Aut odio qui veritatis.', '{\"en\":\"Possimus sed est quos voluptatum.\",\"ar\":\"Exercitationem nam repellat repellat nihil.\"}', '55.00', '0.00', '{\"en\":\"laboriosam\",\"ar\":\"omnis\"}', 'Sapiente odio ut nam.', '{\"en\":\"ab\",\"ar\":\"quos\"}', '{\"en\":\"adipisci\",\"ar\":\"natus\"}', '{\"en\":\"Facere quam maxime nemo ut enim voluptas.\",\"ar\":\"Eaque exercitationem velit dolore ullam et.\"}', 4.8, '2021-03-21 11:20:39', '2021-03-21 18:06:47'),
(2, 1, '{\"en\":\"quibusdam\",\"ar\":\"sit\"}', 'Cupiditate deleniti sed est.', '{\"en\":\"Tempora commodi nesciunt asperiores molestiae.\",\"ar\":\"Nihil optio nisi et et consequatur corporis.\"}', '27.00', '0.00', '{\"en\":\"et\",\"ar\":\"nostrum\"}', 'Sint deleniti earum.', '{\"en\":\"architecto\",\"ar\":\"architecto\"}', '{\"en\":\"explicabo\",\"ar\":\"quo\"}', '{\"en\":\"Enim quo impedit vel ipsum itaque.\",\"ar\":\"Neque aut et aliquam quasi vel sit voluptas.\"}', 2.5, '2021-03-21 11:20:39', '2021-03-21 18:04:29'),
(3, 1, '{\"en\":\"qui\",\"ar\":\"libero\"}', 'Porro quas quas.', '{\"en\":\"Quae quia qui eius possimus qui exercitationem.\",\"ar\":\"Quia debitis odio impedit aliquid.\"}', '94.00', '0.00', '{\"en\":\"nulla\",\"ar\":\"alias\"}', 'Reiciendis corrupti hic.', '{\"en\":\"amet\",\"ar\":\"id\"}', '{\"en\":\"ipsum\",\"ar\":\"vitae\"}', '{\"en\":\"Perferendis provident autem qui sint nostrum.\",\"ar\":\"Illo animi non soluta eum adipisci ullam est.\"}', 0.0, '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(4, 2, '{\"en\":\"magni\",\"ar\":\"ut\"}', 'Magnam corporis aut.', '{\"en\":\"Et provident accusamus aspernatur ex.\",\"ar\":\"Ut laudantium minus iste facilis qui et.\"}', '98.00', '0.00', '{\"en\":\"ut\",\"ar\":\"eius\"}', 'Culpa eligendi et enim.', '{\"en\":\"aut\",\"ar\":\"ipsa\"}', '{\"en\":\"et\",\"ar\":\"sapiente\"}', '{\"en\":\"A natus dolor in voluptatibus iste est.\",\"ar\":\"Blanditiis quos soluta perspiciatis qui.\"}', 0.0, '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(5, 2, '{\"en\":\"dicta\",\"ar\":\"corrupti\"}', 'Voluptatum repellat consequuntur qui sed.', '{\"en\":\"Aut recusandae quia minima atque.\",\"ar\":\"Eum reiciendis sed consectetur hic cum.\"}', '89.00', '0.00', '{\"en\":\"id\",\"ar\":\"est\"}', 'Et aliquid porro ex.', '{\"en\":\"dolorem\",\"ar\":\"voluptatem\"}', '{\"en\":\"consequuntur\",\"ar\":\"est\"}', '{\"en\":\"Et architecto dolor et voluptas iure alias.\",\"ar\":\"Eos id ipsam voluptas earum.\"}', 0.0, '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(6, 2, '{\"en\":\"dolores\",\"ar\":\"est\"}', 'Magni quis est.', '{\"en\":\"Dolor autem nulla excepturi rem.\",\"ar\":\"Occaecati et illo id quis.\"}', '97.00', '0.00', '{\"en\":\"nihil\",\"ar\":\"pariatur\"}', 'Dolor est dicta.', '{\"en\":\"ad\",\"ar\":\"fugit\"}', '{\"en\":\"est\",\"ar\":\"beatae\"}', '{\"en\":\"Repudiandae quis ab inventore molestiae.\",\"ar\":\"Id quaerat omnis at corporis culpa est autem.\"}', 0.0, '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(7, 3, '{\"en\":\"doloribus\",\"ar\":\"est\"}', 'Ut saepe sit.', '{\"en\":\"Molestias qui distinctio rerum ipsa.\",\"ar\":\"Excepturi magnam distinctio sunt et rerum.\"}', '50.00', '0.00', '{\"en\":\"voluptatem\",\"ar\":\"nisi\"}', 'Beatae explicabo adipisci quidem sapiente.', '{\"en\":\"consequatur\",\"ar\":\"vel\"}', '{\"en\":\"et\",\"ar\":\"molestiae\"}', '{\"en\":\"Reprehenderit quo libero aut dolore.\",\"ar\":\"Ratione aut autem laboriosam illo nostrum non.\"}', 0.0, '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(8, 3, '{\"en\":\"nostrum\",\"ar\":\"consequuntur\"}', 'Voluptatem nulla sapiente ipsam iusto.', '{\"en\":\"Esse vel ea ut amet enim accusamus.\",\"ar\":\"Ex excepturi alias fugiat ut accusantium quaerat.\"}', '42.00', '0.00', '{\"en\":\"culpa\",\"ar\":\"ipsa\"}', 'Voluptatem ut aut a.', '{\"en\":\"magni\",\"ar\":\"fuga\"}', '{\"en\":\"molestiae\",\"ar\":\"neque\"}', '{\"en\":\"Quaerat est et quos nisi.\",\"ar\":\"Provident dicta et suscipit dolore voluptas.\"}', 0.0, '2021-03-21 11:20:39', '2021-03-21 11:20:39'),
(9, 3, '{\"en\":\"illo\",\"ar\":\"aut\"}', 'Iusto temporibus nulla exercitationem.', '{\"en\":\"Vel iusto id libero nihil.\",\"ar\":\"Odit odio eum beatae labore perspiciatis harum.\"}', '49.00', '0.00', '{\"en\":\"commodi\",\"ar\":\"quod\"}', 'Voluptas dolor.', '{\"en\":\"autem\",\"ar\":\"ex\"}', '{\"en\":\"fugiat\",\"ar\":\"aut\"}', '{\"en\":\"Voluptatum saepe enim modi qui velit.\",\"ar\":\"Dolor aliquam deleniti doloribus.\"}', 0.0, '2021-03-21 11:20:39', '2021-03-21 11:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_03_17_091346_create_rules_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(7, '2016_06_01_000004_create_oauth_clients_table', 1),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2021_03_17_132338_create_packages_table', 1),
(11, '2021_03_17_132752_create_package_user_table', 1),
(12, '2021_03_17_165020_create_cats_table', 1),
(13, '2021_03_17_165326_create_designs_table', 1),
(14, '2021_03_17_165409_create_designimgs_table', 1),
(15, '2021_03_17_165507_create_rates_table', 1),
(16, '2021_03_17_165537_create_orders_table', 1),
(17, '2021_03_17_165617_create_competitions_table', 1),
(18, '2021_03_17_165639_create_contacts_table', 1),
(19, '2021_03_20_122107_create_verifications_table', 1),
(20, '2021_03_22_172432_create_competition_designs_table', 2),
(21, '2021_03_22_172916_create_competitiondesign_user_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('10c58b4f40dc6d64607d7e80e1501470bf0176c5dc866520940d97b16df6e4895395431fcbf61c5e', 1, 1, 'token', '[]', 0, '2021-03-21 15:31:19', '2021-03-21 15:31:19', '2022-03-21 17:31:19'),
('d8da9b0817dfea4ecd4dc7f3bcd292c06e9dfeafd04b541f9f0756a0e91eac0e7c0e4f8a8fa22a5e', 1, 1, 'token', '[]', 0, '2021-03-21 19:01:55', '2021-03-21 19:01:55', '2022-03-21 21:01:55'),
('df13d106e4a031e2ef439ffe710016ef91d13ef3c611d6d66beb6a7b9b4158cff0af1c5cdb1f5ccd', 1, 1, 'token', '[]', 0, '2021-03-22 17:26:53', '2021-03-22 17:26:53', '2022-03-22 19:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'Gx4RLMySYLtvFTaWpcUqwacVSFY0NXpq6iRbI0ZO', NULL, 'http://localhost', 1, 0, 0, '2021-03-21 12:43:03', '2021-03-21 12:43:03'),
(2, NULL, 'Laravel Password Grant Client', 'tkDv8D8LMtZMmx2lDjiWIj1wIeU7Oqe4LDbTeLNR', 'users', 'http://localhost', 0, 1, 0, '2021-03-21 12:43:03', '2021-03-21 12:43:03');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-03-21 12:43:03', '2021-03-21 12:43:03');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `design_id` bigint(20) UNSIGNED NOT NULL,
  `design_type` enum('ready','upon_request') COLLATE utf8mb4_unicode_ci NOT NULL,
  `design_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `background` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `font` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imgs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','accepted','completed','canceled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `design_id`, `design_type`, `design_name`, `lang`, `background`, `color`, `font`, `imgs`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'ready', 'تجربة-الاسم', 'العربية', 'Sapiente odio ut nam.', '{\"en\":\"adipisci\",\"ar\":\"natus\"}', '{\"en\":\"ab\",\"ar\":\"quos\"}', NULL, 'بعض التفاصيل', 'pending', '2021-03-22 07:18:44', '2021-03-22 07:18:44'),
(2, 1, 2, 'upon_request', 'test-name', 'test-lang', 'test-background', 'test-color', 'test-font', 'test-imgs', 'test-details', 'pending', '2021-03-22 07:20:52', '2021-03-22 07:20:52'),
(3, 3, 4, 'ready', 'تجربة-الاسم', 'العربية', 'Culpa eligendi et enim.', '{\"en\":\"et\",\"ar\":\"sapiente\"}', '{\"en\":\"aut\",\"ar\":\"ipsa\"}', NULL, 'بعض التفاصيل', 'pending', '2021-03-22 07:25:08', '2021-03-22 07:25:08'),
(4, 3, 2, 'upon_request', 'test-name', 'test-lang', 'test-background', 'test-color', 'test-font', 'test-imgs', 'test-details', 'pending', '2021-03-22 07:25:42', '2021-03-22 07:25:42'),
(5, 3, 6, 'ready', 'test-name', 'test-lang', 'Dolor est dicta.', '{\"en\":\"est\",\"ar\":\"beatae\"}', '{\"en\":\"ad\",\"ar\":\"fugit\"}', NULL, 'test-details', 'pending', '2021-03-22 07:31:10', '2021-03-22 07:31:10'),
(6, 3, 8, 'ready', 'test-name', 'test-lang', 'Voluptatem ut aut a.', '{\"en\":\"molestiae\",\"ar\":\"neque\"}', '{\"en\":\"magni\",\"ar\":\"fuga\"}', NULL, 'test-details', 'pending', '2021-03-22 07:31:32', '2021-03-22 07:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `price`, `desc`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"bronze\",\"ar\":\"\\u0627\\u0644\\u0628\\u0631\\u0648\\u0646\\u0632\\u064a\"}', '250.00', '{\"en\":\"test\",\"ar\":\"\\u062a\\u062c\\u0631\\u0628\\u0629\"}', '2021-03-21 11:20:38', '2021-03-21 11:20:38'),
(2, '{\"en\":\"silver\",\"ar\":\"\\u0627\\u0644\\u0641\\u0636\\u064a\"}', '500.00', '{\"en\":\"test\",\"ar\":\"\\u062a\\u062c\\u0631\\u0628\\u0629\"}', '2021-03-21 11:20:38', '2021-03-21 11:20:38'),
(3, '{\"en\":\"gold\",\"ar\":\"\\u0627\\u0644\\u0630\\u0647\\u0628\\u064a\"}', '750.00', '{\"en\":\"test\",\"ar\":\"\\u062a\\u062c\\u0631\\u0628\\u0629\"}', '2021-03-21 11:20:38', '2021-03-21 11:20:38'),
(4, '{\"en\":\"platinum\",\"ar\":\"\\u0627\\u0644\\u0628\\u0644\\u0627\\u062a\\u0646\\u064a\\u0648\\u0645\"}', '1000.00', '{\"en\":\"test\",\"ar\":\"\\u062a\\u062c\\u0631\\u0628\\u0629\"}', '2021-03-21 11:20:38', '2021-03-21 11:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `package_user`
--

CREATE TABLE `package_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_user`
--

INSERT INTO `package_user` (`id`, `user_id`, `package_id`, `name`, `created_at`, `updated_at`) VALUES
(2, 3, 1, '{\"en\":\"bronze\",\"ar\":\"\\u0627\\u0644\\u0628\\u0631\\u0648\\u0646\\u0632\\u064a\"}', '2021-03-21 18:59:55', '2021-03-21 18:59:55'),
(3, 1, 2, '{\"en\":\"silver\",\"ar\":\"\\u0627\\u0644\\u0641\\u0636\\u064a\"}', '2021-03-21 19:02:24', '2021-03-21 19:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `design_id` bigint(20) UNSIGNED NOT NULL,
  `rate` float(3,1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `user_id`, `design_id`, `rate`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5.0, '2021-03-21 15:55:17', '2021-03-21 18:03:53'),
(2, 1, 2, 2.5, '2021-03-21 18:02:29', '2021-03-21 18:04:29'),
(3, 3, 1, 4.5, '2021-03-21 18:06:47', '2021-03-21 18:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', '2021-03-21 11:20:38', '2021-03-21 11:20:38'),
(2, 'admin', '2021-03-21 11:20:38', '2021-03-21 11:20:38'),
(3, 'user', '2021-03-21 11:20:38', '2021-03-21 11:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rule_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `type` enum('free','paid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `rule_id`, `name`, `email`, `password`, `phone`, `email_verified_at`, `type`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 3, 'ahmed', 'a@a.com', '$2y$10$91sZbI3WY6Bqlgq95H7Duu4as15A5XDrTClArvAbUuHIFBWJ8hfQG', '0122223', NULL, 'free', 1, NULL, '2021-03-21 12:38:23', '2021-03-21 12:40:16'),
(3, 3, 'ahmed salah', 'a1@a.com', '$2y$10$rPDllSZ7NdlniTdAfM8B7egM9P1uQ5V3NFhZucAVEAMtwoYf79vkW', '01123376466', NULL, 'free', 1, NULL, '2021-03-21 14:47:49', '2021-03-22 14:00:25'),
(4, 3, 'amr', 'a2@a.com', '$2y$10$lXnTav1iAAxC0MH0YPsDKeVDFblRtAWN21QA6GqdJAU4IWjoQQ0vO', '01223456', NULL, 'free', 1, NULL, '2021-03-22 12:35:00', '2021-03-22 14:00:45'),
(12, 3, 'ameer', 'a3@a.com', '$2y$10$CNddAcYKEBsuq62ui5ruIePaWe8QlPCClZ9cuzVx6oqIvL/7aYzxW', '012234568', NULL, 'free', 1, NULL, '2021-03-22 12:59:34', '2021-03-22 13:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `verifications`
--

CREATE TABLE `verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_at` datetime NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competitiondesign_user`
--
ALTER TABLE `competitiondesign_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competitiondesign_user_user_id_foreign` (`user_id`),
  ADD KEY `competitiondesign_user_competitiondesign_id_foreign` (`competitiondesign_id`);

--
-- Indexes for table `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competition_designs`
--
ALTER TABLE `competition_designs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competition_designs_competition_id_foreign` (`competition_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `designimgs`
--
ALTER TABLE `designimgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designimgs_design_id_foreign` (`design_id`);

--
-- Indexes for table `designs`
--
ALTER TABLE `designs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designs_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_design_id_foreign` (`design_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_user`
--
ALTER TABLE `package_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_user_user_id_foreign` (`user_id`),
  ADD KEY `package_user_package_id_foreign` (`package_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rates_user_id_foreign` (`user_id`),
  ADD KEY `rates_design_id_foreign` (`design_id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_rule_id_foreign` (`rule_id`);

--
-- Indexes for table `verifications`
--
ALTER TABLE `verifications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cats`
--
ALTER TABLE `cats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `competitiondesign_user`
--
ALTER TABLE `competitiondesign_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `competitions`
--
ALTER TABLE `competitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `competition_designs`
--
ALTER TABLE `competition_designs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designimgs`
--
ALTER TABLE `designimgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `designs`
--
ALTER TABLE `designs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `package_user`
--
ALTER TABLE `package_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `verifications`
--
ALTER TABLE `verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `competitiondesign_user`
--
ALTER TABLE `competitiondesign_user`
  ADD CONSTRAINT `competitiondesign_user_competitiondesign_id_foreign` FOREIGN KEY (`competitiondesign_id`) REFERENCES `competition_designs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `competitiondesign_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `competition_designs`
--
ALTER TABLE `competition_designs`
  ADD CONSTRAINT `competition_designs_competition_id_foreign` FOREIGN KEY (`competition_id`) REFERENCES `competitions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `designimgs`
--
ALTER TABLE `designimgs`
  ADD CONSTRAINT `designimgs_design_id_foreign` FOREIGN KEY (`design_id`) REFERENCES `designs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `designs`
--
ALTER TABLE `designs`
  ADD CONSTRAINT `designs_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `cats` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_design_id_foreign` FOREIGN KEY (`design_id`) REFERENCES `designs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_user`
--
ALTER TABLE `package_user`
  ADD CONSTRAINT `package_user_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `package_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_design_id_foreign` FOREIGN KEY (`design_id`) REFERENCES `designs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_rule_id_foreign` FOREIGN KEY (`rule_id`) REFERENCES `rules` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
