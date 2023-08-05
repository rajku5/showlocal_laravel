-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 03, 2022 at 11:35 AM
-- Server version: 10.5.17-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u268588216_showlocal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_role_id` bigint(20) NOT NULL DEFAULT 2,
  `image` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def.png',
  `email` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `admin_role_id`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(2, NULL, NULL, 2, 'def.png', 'admin@gmail.com', NULL, '$2y$10$4ynNNmdUdkfChJootOXKMulGu1yKrKqcNXRG654kp0iW6fdvJQ7UG', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `business_settings`
--

CREATE TABLE `business_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `business_settings`
--

INSERT INTO `business_settings` (`id`, `type`, `value`, `created_at`, `updated_at`) VALUES
(2, 'terms-condition', '<p style=\"background-color:white;margin:0in 0in 15.0pt;\"><span style=\"color:#002F34;font-family:&quot;Arial&quot;,sans-serif;font-size:11.5pt;\">Welcome to ShowLocal.in!</span><o:p></o:p></p><p style=\"background-color:white;margin:0in 0in 15.0pt;\"><span style=\"color:#002F34;font-family:&quot;Arial&quot;,sans-serif;font-size:11.5pt;\">These terms and conditions outline the rules and regulations for the use of ThreeFour Digital Advertising LLP\'s Website, located at www.showlocal.in.</span><o:p></o:p></p><p style=\"background-color:white;margin:0in 0in 15.0pt;\"><span style=\"color:#002F34;font-family:&quot;Arial&quot;,sans-serif;font-size:11.5pt;\">By accessing this website, we assume you accept these terms and conditions. Do not continue to use ShowLocal.in if you do not agree to take all of the terms and conditions stated on this page.</span><o:p></o:p></p>', NULL, NULL),
(3, 'about-us', '<p><strong style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(0, 0, 0);font-family:&quot;Open Sans&quot;, Arial, sans-serif;font-size:14px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;letter-spacing:normal;margin:0px;orphans:2;padding:0px;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Lorem Ipsum</strong><span style=\"background-color:rgb(255,255,255);color:rgb(0,0,0);font-family:&quot;Open Sans&quot;, Arial, sans-serif;font-size:14px;\"><span style=\"-webkit-text-stroke-width:0px;display:inline !important;float:none;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></p><p>&nbsp;</p><p><span style=\"background-color:rgb(255,255,255);color:rgb(0,0,0);font-family:&quot;Open Sans&quot;, Arial, sans-serif;font-size:14px;\"><span style=\"-webkit-text-stroke-width:0px;display:inline !important;float:none;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span></span></p><p>&nbsp;</p><h2 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(0, 0, 0);font-family:DauphinPlain;font-size:24px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;line-height:24px;margin:0px 0px 10px;orphans:2;padding:0px;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Why do we use it?</h2><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(0, 0, 0);font-family:&quot;Open Sans&quot;, Arial, sans-serif;font-size:14px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;margin:0px 0px 15px;orphans:2;padding:0px;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', NULL, NULL),
(4, 'privacy-policy', '<h2 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(0, 0, 0);font-family:DauphinPlain;font-size:24px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;line-height:24px;margin:0px 0px 10px;orphans:2;padding:0px;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Why do we use it?</h2><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(0, 0, 0);font-family:&quot;Open Sans&quot;, Arial, sans-serif;font-size:14px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;margin:0px 0px 15px;orphans:2;padding:0px;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

CREATE TABLE `category_master` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unique_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT 0,
  `position` int(11) DEFAULT 0,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`id`, `name`, `unique_id`, `slug`, `image`, `parent_id`, `position`, `status`, `created_at`, `updated_at`) VALUES
(1, 'FOOD', NULL, 'FOOD', '/storage/images/avtar/1.jpg', 0, 0, 1, NULL, NULL),
(3, 'FASHION & GIFTS', NULL, 'FASHION & GIFTS', '/storage/images/avtar/1.jpg', 0, 0, 1, NULL, NULL),
(35, 'test', NULL, 'test', NULL, 0, 0, 1, NULL, NULL),
(37, 'VEGETABLE SHOPS', '1693e7e7-cea7-4845-857e-c90499b3ea7e', 'VEGETABLE SHOPS', '/images/subcategory/1664372086.jpg', 1, 1, 1, NULL, NULL),
(38, 'GROCERY SHOPS', '27a9e9a0-0bfe-45e6-a7dc-c04af0c8cd1a', 'GROCERY SHOPS', '/images/subcategory/1664372098.jpg', 1, 1, 1, NULL, NULL),
(39, 'SUPER MARKETS', 'b66cd26d-7e71-4209-84ce-be5a6d757284', 'SUPER MARKETS', '/images/subcategory/1664372115.jpg', 1, 1, 1, NULL, NULL),
(40, 'RESTAURANTS', 'fc6f7a32-7b8d-4b1f-9121-01bc359e1015', 'RESTAURANTS', '/images/subcategory/1664372131.jpg', 1, 1, 1, NULL, NULL),
(41, 'CHATS', '4fc77a08-db14-4df4-937b-99c4c246ec59', 'CHATS', '/images/subcategory/1664372955.jpg', 1, 1, 1, NULL, NULL),
(42, 'HOTELS', 'd1d11ac5-a8c7-4570-b27f-b4760e8e0af2', 'HOTELS', '/images/subcategory/1664372200.jpg', 95, 1, 1, NULL, NULL),
(43, 'CAKES & DESSERTS', '2694402c-06c4-4c5a-b1a1-80ca3a276fb0', 'CAKES & DESSERTS', '/images/subcategory/1664372213.jpg', 1, 1, 1, NULL, NULL),
(44, 'JUICE & BEVERAGES', 'cf9ce73c-9e99-4edd-a892-e4dc652c935e', 'JUICE & BEVERAGES', '/images/subcategory/1664372223.jpg', 1, 1, 1, NULL, NULL),
(45, 'MEN FASHION', '9e280d1d-525e-4408-89ad-ca4141c833f7', 'MEN FASHION', '/images/subcategory/1664372250.jpg', 3, 1, 1, NULL, NULL),
(46, 'WOMEN FASHION', '8129d4a8-63bf-4d59-bb5e-d395fe81071a', 'WOMEN FASHION', '/images/subcategory/1664372266.jpg', 3, 1, 1, NULL, NULL),
(47, 'KIDS FASHION', 'e6fe5d23-4631-406b-986a-4d168239a9a8', 'KIDS FASHION', '/images/subcategory/1664372284.jpg', 3, 1, 1, NULL, NULL),
(48, 'GIFT CENTRE', '913c48f6-43dd-4118-9d86-542668560c8b', 'GIFT CENTRE', '/images/subcategory/1664034358.jpg', 3, 1, 1, NULL, NULL),
(49, 'TAILOR', '9bff07b3-6c1d-4e3b-b6c7-c00ed6b69a50', 'TAILOR', '/images/subcategory/1664034373.jpg', 3, 1, 1, NULL, NULL),
(50, 'JEWELLERS', '140e5258-b920-43c8-8ef3-7653f4d24780', 'JEWELLERS', '/images/subcategory/1664034728.webp', 3, 1, 1, NULL, NULL),
(51, 'FOOTWEAR SHOPS', '2456df74-8c30-447f-9cd7-b38e0a87128e', 'FOOTWEAR SHOPS', '/images/subcategory/1664035007.jpg', 3, 1, 1, NULL, NULL),
(52, 'SHOES', '67673bc5-4417-4921-9175-b6624d90063f', 'SHOES', '/images/subsubcategory/1664372856.jpg', 45, 2, 1, NULL, NULL),
(53, 'FRUITS', '926870c2-05c5-45d1-9a28-1c9e13f2a52a', 'FRUITS', '/images/subsubcategory/1664372841.jpg', 37, 2, 1, NULL, NULL),
(54, 'RESORTS', '47b64355-30a0-475c-94d3-901810426cc2', 'RESORTS', '/images/subcategory/1664035018.jpg', 95, 1, 1, NULL, NULL),
(55, 'czxzcz', 'b2210f0d-87ef-42de-884c-17c5d14e944f', 'czxzcz', NULL, 0, 0, 1, NULL, NULL),
(56, 'HOME & SHOP RENTALS', 'ec3a94b6-f7d0-4562-a4d9-723f09411b19', 'HOME & SHOP RENTALS', NULL, 0, 0, 1, NULL, NULL),
(57, 'HOME SERVICES', '9279ad38-d429-460f-83b2-1a332bf31dae', 'HOME SERVICES', NULL, 0, 0, 1, NULL, NULL),
(58, 'TRANSPORT', '9c6cfbea-e8c7-40fd-89a9-6b0691f7c3eb', 'TRANSPORT', NULL, 0, 0, 1, NULL, NULL),
(59, 'ENTERTAINMENT', '1dd2fc03-3887-4ee9-bff6-7027cb09222b', 'ENTERTAINMENT', NULL, 0, 0, 1, NULL, NULL),
(60, 'CAR & BIKE', '8d03da77-13cd-4d36-bc4d-fa329db94aea', 'CAR & BIKE', NULL, 0, 0, 1, NULL, NULL),
(61, 'FARMING & EQUIPMENTS', '302feeaf-ec4e-41a2-b9ba-8d4377617fa0', 'FARMING & EQUIPMENTS', NULL, 0, 0, 1, NULL, NULL),
(62, 'CONSTRUCTION', '0dc67413-b6ca-46e8-924c-c9be6ecbf9c7', 'CONSTRUCTION', NULL, 0, 0, 1, NULL, NULL),
(63, 'HOME & OFFICE SUPPLIES', 'fce91b46-b0f4-407d-9ff6-a867bcb2e2e9', 'HOME & OFFICE SUPPLIES', NULL, 0, 0, 1, NULL, NULL),
(64, 'FUNCTION ARRANGEMENT', '7d928ccd-ce15-4daa-813e-ad24d428b049', 'FUNCTION ARRANGEMENT', NULL, 0, 0, 1, NULL, NULL),
(65, 'HEALTH & HYGIENE', '86a3ff41-9003-4232-af3b-0ced8f6e2b47', 'HEALTH & HYGIENE', NULL, 0, 0, 1, NULL, NULL),
(66, 'INTERNET PROVIDERS', 'b20bdc0d-59b0-461e-8303-a67b2ac43fd3', 'INTERNET PROVIDERS', '/images/subcategory/1664035123.jpg', 57, 1, 1, NULL, NULL),
(67, 'PLOTS FOR SALE', '642a97c1-63b3-40d9-894f-5756a4b6fa86', 'PLOTS FOR SALE', '/images/subcategory/1663608649.jpg', 56, 1, 1, NULL, NULL),
(68, 'PAINTERS', 'd0ab5175-3fe6-40fa-b7a4-bafdf9971176', 'PAINTERS', '/images/subcategory/1663608672.jpg', 57, 1, 1, NULL, NULL),
(69, 'CABLE TV', '68b9187e-81d3-42ba-87a1-5c5ac3d9c71b', 'CABLE TV', '/images/subcategory/1663608691.jpg', 57, 1, 1, NULL, NULL),
(70, 'MASONRY', 'ac54a535-3808-44f1-a357-1b44607ca366', 'MASONRY', '/images/subcategory/1664035156.jpg', 57, 1, 1, NULL, NULL),
(71, 'PLUMBERS', '8d6a4ea4-d31f-4b6e-9a32-16fb380c64e6', 'PLUMBERS', '/images/subcategory/1664035171.jpg', 57, 1, 1, NULL, NULL),
(72, 'ELECTRICIAN', 'f4d5ec97-7257-4d4b-9038-e92e9ab8d832', 'ELECTRICIAN', '/images/subcategory/1664035186.jpg', 57, 1, 1, NULL, NULL),
(73, 'LAND FOR RENT', '7dcbddcb-879c-4ecb-9711-330c0c3431c3', 'LAND FOR RENT', '/images/subcategory/1664372475.jpg', 56, 1, 1, NULL, NULL),
(74, 'SHOPS FOR RENT', '2406a6a8-1474-4fec-b9bb-249af7a3c3f5', 'SHOPS FOR RENT', '/images/subcategory/1664372438.jpg', 56, 1, 1, NULL, NULL),
(75, 'HOUSE FOR RENT', 'e23c2a53-eeb0-47d3-9f52-202e46394bef', 'HOUSE FOR RENT', '/images/subcategory/1664372454.jpg', 56, 1, 1, NULL, NULL),
(76, 'BUS', '077843ce-2725-49f9-b8b3-4b0c97cde143', 'BUS', '/images/subcategory/1663645084.jpg', 58, 1, 1, NULL, NULL),
(77, 'LORRY', '4632d5ed-021e-4a8b-8094-723673486701', 'LORRY', '/images/subcategory/1663645101.jpg', 58, 1, 1, NULL, NULL),
(78, 'MINI LORRY', '93083c47-1367-4d62-8a0b-71fcbfc6e7ff', 'MINI LORRY', '/images/subcategory/1663645166.jpg', 58, 1, 1, NULL, NULL),
(79, 'LIGHT GOODS VEHICLE', '3468ea61-d23d-46d3-9926-982cca63a176', 'LIGHT GOODS VEHICLE', '/images/subcategory/1663645185.jpg', 58, 1, 1, NULL, NULL),
(80, 'TAXI', 'f66361aa-0032-47b8-b92c-bae331c5aa42', 'TAXI', '/images/subcategory/1663645205.jpg', 58, 1, 1, NULL, NULL),
(81, 'EARTH MOVING MACHINES', 'a7b3198d-e5f9-45e8-b739-195c397db5be', 'EARTH MOVING MACHINES', '/images/subcategory/1663645234.jpg', 58, 1, 1, NULL, NULL),
(82, 'THEATRE', '2fb4c4fe-bc73-4c2c-b427-86f5d2d860ae', 'THEATRE', '/images/subcategory/1664035468.jpg', 59, 1, 1, NULL, NULL),
(83, 'CONCERTS', 'cb7ae6b9-4c55-4260-b033-aabfbf257891', 'CONCERTS', '/images/subcategory/1664035484.jpg', 59, 1, 1, NULL, NULL),
(84, 'EVENTS', '00cdbe04-49a8-427a-b002-dfa50feb192a', 'EVENTS', '/images/subcategory/1664035594.jpg', 59, 1, 1, NULL, NULL),
(85, 'GARDENS', '3df2286b-3702-4b45-a659-a1ea84cb0ef6', 'GARDENS', '/images/subcategory/1663645304.jpg', 59, 1, 1, NULL, NULL),
(86, 'TOURIST PLACES', '99710db6-a19f-4859-bf13-82821ed29fae', 'TOURIST PLACES', '/images/subcategory/1664035772.jpg', 59, 1, 1, NULL, NULL),
(87, 'CAR SHOWROOMS', 'b8bec8b4-3983-4dd4-875d-7c12efb6c20b', 'CAR SHOWROOMS', '/images/subcategory/1664379562.jpg', 60, 1, 1, NULL, NULL),
(88, 'BIKE SHOWROOMS', 'c02e8a43-172a-43a0-b21a-35361f35bcf7', 'BIKE SHOWROOMS', '/images/subcategory/1664379586.jpg', 60, 1, 1, NULL, NULL),
(89, 'PUNCTURE SHOP', 'b3b18399-32f1-4743-bbb2-445f9d36cd6c', 'PUNCTURE SHOP', '/images/subcategory/1664379631.jpg', 60, 1, 1, NULL, NULL),
(90, 'CAR MECHANIC', '3473b289-9351-4089-af2a-1c4654c5d8f4', 'CAR MECHANIC', '/images/subcategory/1664379665.jpg', 60, 1, 1, NULL, NULL),
(91, 'BIKE MECHANIC', 'cdac294e-5224-4b57-843e-637afe8074fe', 'BIKE MECHANIC', '/images/subcategory/1664379685.jpg', 60, 1, 1, NULL, NULL),
(92, 'TUNING CENTRE', 'd15547d7-24a6-483d-a0ad-7a74a037ccdc', 'TUNING CENTRE', '/images/subcategory/1664379949.jpg', 60, 1, 1, NULL, NULL),
(93, 'CAR WASH', '063347e4-9dfd-4a1d-aa74-c4bf8dbb6a44', 'CAR WASH', '/images/subcategory/1664380166.jpg', 60, 1, 1, NULL, NULL),
(94, 'SPARE PARTS', '101d1d0e-f0ce-42c4-9dbc-3fd5f47efb81', 'SPARE PARTS', '/images/subcategory/1664380386.jpg', 60, 1, 1, NULL, NULL),
(95, 'HOTELS & RESORTS', '3e8555d6-8c9a-4928-8cc4-1388b1e2913a', 'HOTELS & RESORTS', NULL, 0, 0, 1, NULL, NULL),
(96, 'HOME STAY', 'b1055c7f-ba33-4607-bfcf-ab207a899277', 'HOME STAY', '/images/subcategory/1664381093.jpg', 95, 1, 1, NULL, NULL),
(97, 'SEEDS', 'fccbaf25-728e-4c84-8607-85b4f403b22c', 'SEEDS', '/images/subcategory/1664381641.jpg', 61, 1, 1, NULL, NULL),
(98, 'FERTILIZER', '66b9ef41-d9ae-4aa1-b35e-f4a2e18f17a3', 'FERTILIZER', '/images/subcategory/1664381663.jpg', 61, 1, 1, NULL, NULL),
(99, 'FARM TOOLS', 'b4ccf2db-f397-4451-aede-4cf4f83b20de', 'FARM TOOLS', '/images/subcategory/1664381916.jpg', 61, 1, 1, NULL, NULL),
(100, 'TRACTORS', '0c0be2ae-fcbe-4ea2-9cdb-9e5bfa4e5f9d', 'TRACTORS', '/images/subcategory/1664382141.jpg', 61, 1, 1, NULL, NULL),
(101, 'TRACTOR MECHANIC', '209fe9b3-7e28-4f2a-9916-7b9c2f3999dd', 'TRACTOR MECHANIC', '/images/subcategory/1664382422.jpg', 61, 1, 1, NULL, NULL),
(102, 'PESTICIDE', 'd5aa7b2d-8497-40e2-a5cd-517fdba3992f', 'PESTICIDE', '/images/subcategory/1664382690.jpg', 61, 1, 1, NULL, NULL),
(105, 'test image', '721ab02d-9fb9-462a-9a1d-e7a049c2a086', 'test image', '/images/subcategory/1665074784.png', 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mobile_verification_status`
--

CREATE TABLE `mobile_verification_status` (
  `id` int(11) NOT NULL,
  `mobile` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mobile_verification_status`
--

INSERT INTO `mobile_verification_status` (`id`, `mobile`, `otp`, `is_verified`) VALUES
(1, '8451047500', '662264', 1),
(2, '8147440035', '690485', 0),
(3, '8147440035', '372831', 1),
(4, NULL, '162882', 0),
(5, NULL, '341599', 0),
(6, NULL, '389390', 0),
(7, NULL, '295771', 0),
(8, NULL, '302562', 0),
(9, '7738325297', '206406', 1),
(10, '7874183585', '922276', 0),
(11, '7874183585', '687358', 0),
(12, '7738325297', '200148', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review_master`
--

CREATE TABLE `review_master` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `review_text` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate` int(11) DEFAULT 0,
  `status` int(11) DEFAULT 0,
  `is_active` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seller_master`
--

CREATE TABLE `seller_master` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `store_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `sub_sub_category_id` int(11) DEFAULT NULL,
  `state` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnil_image` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `offer1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `offer2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `offer3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `offer4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `offer5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `whatapp_number` int(10) DEFAULT NULL,
  `contact_number` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` int(10) DEFAULT NULL,
  `_token` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` int(11) DEFAULT 1,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seller_master`
--

INSERT INTO `seller_master` (`id`, `first_name`, `last_name`, `store_name`, `category_id`, `sub_category_id`, `sub_sub_category_id`, `state`, `city`, `latitude`, `longitude`, `website`, `thumbnil_image`, `image1`, `image2`, `image3`, `image4`, `image5`, `offer1`, `offer2`, `offer3`, `offer4`, `offer5`, `youtube`, `email`, `address`, `whatapp_number`, `contact_number`, `weight`, `_token`, `is_active`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jayesh', 'Mali', 'Jayesh', 1, 37, 53, 'India', 'mumbai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', 'jayesh@gmail.com', 'address', NULL, '8451047500', 1, 'Z5jPRa6040FYUiLyc78JhItYj3USD0b4JqCOLdRp', 1, 2, NULL, NULL),
(2, 'KUMAR', 'VIVEK', 'HOTEL', 1, 37, 53, 'KARNATAKA', 'HOSPET', '15.274017357039144', '76.39602839896969', 'https://malligihotels.com/', '202209290325-VIVEK HOTEL.jpg', '202210010710-maxresdefault (1).jpg', '202210010710-maxresdefault (2).jpg', '202210010710-maxresdefault (3).jpg', '202210010710-maxresdefault (4).jpg', '202210010710-maxresdefault.jpg', '202210010710-maxresdefault.jpg', '202210010710-maxresdefault (4).jpg', '202210010710-maxresdefault (3).jpg', '202210010710-maxresdefault (2).jpg', '202210010710-maxresdefault (1).jpg', 'i3KrNEVQDDg', 'ranjithkumar.r.h@gmail.com', '10/90 J.N.Road Hospet  (Hampi Road)', NULL, '3423543543', 3, 'rWzDw9qh34JBaoUYIxhJula98kJFykvc2PRTx2KX', 1, 1, NULL, NULL),
(3, 'KUMAR', 'MANI', 'Heritage', 1, 37, 53, 'KARNATAKA', 'HOSPET', '15.296663027250167', '76.43610943462812', 'www.indoasia-hotels.com/', '202209290324-HERITAGE.jpg', '202209281627-banner-1.jpg', '202209071539-maxresdefault (3).jpg', '202209071539-maxresdefault (4).jpg', '202209071539-maxresdefault.jpg', '202209071539-maxresdefault (1).jpg', '202209071539-maxresdefault (4).jpg', '202209071539-maxresdefault (3).jpg', '202209071539-maxresdefault (2).jpg', '202209071539-maxresdefault (1).jpg', '202209071539-maxresdefault.jpg', 'i3KrNEVQDDg', 'ranjithkumar.r.h@gmail.com', '48/C & 4B, Hosamalapanagudi', NULL, '4353254354', 1, 'IfH2ZZlIliesag54MaeafC7WpqMGSc6jMm2rvINp', 1, 1, NULL, NULL),
(4, 'VISHAL', 'KUMAR', 'VISHAL', 1, 39, 53, 'KARNATAKA', 'HOSPET', '15.263393874517732', '76.38170909859937', 'www.vishalmegamart.com', '202209290324-VISHAL.jpg', '202209071537-maxresdefault (1).jpg', '202209071537-maxresdefault (2).jpg', '202209071537-maxresdefault (3).jpg', '202209071537-maxresdefault (4).jpg', '202209071537-maxresdefault.jpg', '202209071537-maxresdefault.jpg', '202209071537-maxresdefault (4).jpg', '202209071537-maxresdefault (3).jpg', '202209071537-maxresdefault (2).jpg', '202209071537-maxresdefault (1).jpg', 'i3KrNEVQDDg', 'ranjithkumar.r.h@gmail.com', 'Dam Road, near City Hospital, Gandhi Colony', NULL, NULL, NULL, 'IfH2ZZlIliesag54MaeafC7WpqMGSc6jMm2rvINp', 1, 1, NULL, NULL),
(5, 'MUKESH', 'AMBANI', 'RELIANCE', 1, 37, 53, 'KARNATAKA', 'HOSPET', '15.275455380470504', '76.38211323186817', 'https://trends.ajio.com/', '202209290325-RELIANCE.jpg', '202209071544-maxresdefault (4).jpg', '202209071544-maxresdefault.jpg', '202209071544-maxresdefault (1).jpg', '202209071544-maxresdefault (2).jpg', '202209071544-maxresdefault (3).jpg', '202209071544-maxresdefault (1).jpg', '202209071544-maxresdefault.jpg', '202209071544-maxresdefault (4).jpg', '202209071544-maxresdefault (3).jpg', '202209071544-maxresdefault (2).jpg', 'i3KrNEVQDDg', 'ranjithkumar.r.h@gmail.com', 'Basavashree Elite, College Road', NULL, '7653434556', 10, 'IfH2ZZlIliesag54MaeafC7WpqMGSc6jMm2rvINp', 1, 1, NULL, NULL),
(8, 'test', 'test', 'test', 35, NULL, NULL, 'test', 'test', NULL, NULL, NULL, 'images.jpg', 'banner-1.jpg', 'banner-1.jpg', 'banner-1.jpg', 'banner-1.jpg', 'banner-1.jpg', 'banner-1.jpg', 'banner-1.jpg', 'banner-1.jpg', 'banner-1.jpg', 'banner-1.jpg', 'test', 'test@gmail.com', 'test', NULL, NULL, NULL, 'f7NNi1k6sitB8HjAaAQ8GuAkdHu6gWlGomEMKaPl', 1, 0, NULL, NULL),
(9, 'Surabhi', 'Kalyana', 'Surabhi', 1, 37, 53, 'KARNATAKA', 'HOSPET', '15.270376528800321', '76.37498233915517', 'https://trends.ajio.com/', '202209290326-KALYANA MANTAPA.jpg', 'maxresdefault (1).jpg', 'maxresdefault (2).jpg', 'maxresdefault (3).jpg', 'maxresdefault (4).jpg', 'maxresdefault.jpg', 'maxresdefault.jpg', 'maxresdefault (4).jpg', 'maxresdefault (3).jpg', 'maxresdefault (2).jpg', 'maxresdefault (1).jpg', 'i3KrNEVQDDg', 'ranjithkumar.r.h@gmail.com', 'Dam Road, near City Hospital, Gandhi Colony', NULL, NULL, NULL, 'IfH2ZZlIliesag54MaeafC7WpqMGSc6jMm2rvINp', 1, 1, NULL, NULL),
(10, 'SIDDHI PRIYA', 'KALYANA MANTAPA', 'SIDDHI', 1, 37, 53, 'KARNATAKA', 'HOSPET', '15.274234285140166', '76.37494681843272', 'https://malligihotels.com/', '202209290325-KALYANA MANTAPA.jpg', 'maxresdefault (2).jpg', 'maxresdefault (3).jpg', 'maxresdefault (4).jpg', 'maxresdefault.jpg', 'maxresdefault (1).jpg', 'maxresdefault.jpg', 'maxresdefault (4).jpg', 'maxresdefault (3).jpg', 'maxresdefault (2).jpg', 'maxresdefault (1).jpg', 'i3KrNEVQDDg', 'ranjithkumar.r.h@gmail.com', 'Dam Road, Gandhi Colony', NULL, '5635462324', 2, 'IfH2ZZlIliesag54MaeafC7WpqMGSc6jMm2rvINp', 1, 1, NULL, NULL),
(11, 'YAMAHA', 'SHOWROOM', 'YAMAHA', 1, 37, 53, 'KARNATAKA', 'HOSPET', '15.270891256868914', '76.37942074258453', 'www.yamaha-motor-india.com', '202209290324-YAMAHA.jpg', 'maxresdefault (3).jpg', 'maxresdefault (4).jpg', 'maxresdefault.jpg', 'maxresdefault (1).jpg', 'maxresdefault (2).jpg', 'maxresdefault (3).jpg', 'maxresdefault (2).jpg', 'maxresdefault (1).jpg', 'maxresdefault.jpg', 'maxresdefault (4).jpg', 'i3KrNEVQDDg', 'ranjithkumar.r.h@gmail.com', 'J.N.Road Hospet  (Hampi Road)', NULL, NULL, NULL, 'IfH2ZZlIliesag54MaeafC7WpqMGSc6jMm2rvINp', 1, 1, NULL, NULL),
(12, 'True', 'Pill Medical', 'True', 1, 37, 53, 'KARNATAKA', 'HOSPET', '15.26952340945647', '76.38345786830376', 'https://truepill.com', '202209290326-PILL.jpg', 'maxresdefault (4).jpg', 'maxresdefault.jpg', 'maxresdefault (1).jpg', 'maxresdefault (2).jpg', 'maxresdefault (3).jpg', 'maxresdefault (4).jpg', 'maxresdefault (3).jpg', 'maxresdefault (2).jpg', 'maxresdefault (1).jpg', 'maxresdefault.jpg', 'i3KrNEVQDDg', 'admin@gmail.com', 'near Tah School Hospet, Chapparadahalli', NULL, NULL, NULL, 'IfH2ZZlIliesag54MaeafC7WpqMGSc6jMm2rvINp', 1, 1, NULL, NULL),
(13, 'Sree', 'Krishna', 'Sree', 1, 37, 53, 'KARNATAKA', 'HOSPET', '15.268122165850425', '76.3819963304175', 'www.indoasia-hotels.com/', '202209290325-KRISHNA.jpg', 'maxresdefault.jpg', 'maxresdefault (1).jpg', 'maxresdefault (2).jpg', 'maxresdefault (3).jpg', 'maxresdefault (4).jpg', 'maxresdefault.jpg', 'maxresdefault (4).jpg', 'maxresdefault (3).jpg', 'maxresdefault (2).jpg', 'maxresdefault (1).jpg', 'i3KrNEVQDDg', 'ranjithkumar.r.h@gmail.com', '799J+5PH, Chapparadahalli', NULL, '7546454465', 10, 'IfH2ZZlIliesag54MaeafC7WpqMGSc6jMm2rvINp', 1, 1, NULL, NULL),
(14, 'MADILU', 'SCANNING', 'MADILU', 1, 37, 53, 'KARNATAKA', 'HOSPET', '15.27324940618377', '76.3863476675891', 'www.vishalmegamart.com', '202209290325-SCAN.jpg', 'maxresdefault (2).jpg', 'maxresdefault (4).jpg', NULL, NULL, NULL, 'maxresdefault (1).jpg', 'maxresdefault (3).jpg', NULL, NULL, NULL, 'i3KrNEVQDDg', 'ranjithkumar.r.h@gmail.com', 'J.N.Road Hospet  (Hampi Road)', NULL, '9543251236', 1, 'IfH2ZZlIliesag54MaeafC7WpqMGSc6jMm2rvINp', 1, 1, NULL, NULL),
(15, 'Ranjith', '07738325297', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ranjith@gmail.com', 'KA', NULL, NULL, NULL, 'Z5jPRa6040FYUiLyc78JhItYj3USD0b4JqCOLdRp', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NUL',
  `password` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '0',
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Jayesh', 'Mali', 'test123123@gmail.com', '$2y$10$WAW2Ic/P0HRZAsngD46U7.breXJ5i5lvl3Cra5r.oHWoOA6uUKJLi', '8451047500', NULL, '2022-09-28 10:58:56', '2022-09-28 10:58:56'),
(2, 'RANJITH', 'KUMAR', 'ranjithkumar.r.h@gmail.com', '$2y$10$807Id.gEQZoLgje6bSAjDegaiiP21JWBEFCRJ2HdW.QK7J2UVRvHW', '8147440035', NULL, '2022-09-28 13:43:51', '2022-09-28 13:43:51'),
(3, 'Sushmita', 'Patil', 'sushmita@techqueto.com', '$2y$10$fu95TO9rFrz2/9.KtOZD/.AEkFXPuUOs8ucH7OrG0xlQXVmFPkCKy', '7738325297', NULL, '2022-10-11 04:39:29', '2022-10-11 04:39:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `business_settings`
--
ALTER TABLE `business_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_master`
--
ALTER TABLE `category_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_verification_status`
--
ALTER TABLE `mobile_verification_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `review_master`
--
ALTER TABLE `review_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `seller_master`
--
ALTER TABLE `seller_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `business_settings`
--
ALTER TABLE `business_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category_master`
--
ALTER TABLE `category_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `mobile_verification_status`
--
ALTER TABLE `mobile_verification_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `review_master`
--
ALTER TABLE `review_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_master`
--
ALTER TABLE `seller_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
