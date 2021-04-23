-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2020 at 07:00 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trip-compound`
--

-- --------------------------------------------------------

--
-- Table structure for table `act_categories`
--

CREATE TABLE `act_categories` (
  `act_category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8mb4_unicode_ci,
  `category_image_tumb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `act_categories`
--

INSERT INTO `act_categories` (`act_category_id`, `category_name`, `category_desc`, `category_image_tumb`, `created_at`, `updated_at`) VALUES
(1, 'Water Sport', 'Water Sport Description', NULL, NULL, NULL),
(2, 'Tour Package', 'Tour Package Description', NULL, NULL, NULL),
(3, 'Rent Car', 'Rent Car Description', NULL, NULL, NULL),
(4, 'Transport', 'Transport Description', NULL, NULL, NULL),
(5, 'Attraction', 'Attraction Description', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `num_code` int(3) NOT NULL DEFAULT '0',
  `alpha_2_code` varchar(2) DEFAULT NULL,
  `alpha_3_code` varchar(3) DEFAULT NULL,
  `en_short_name` varchar(52) DEFAULT NULL,
  `nationality` varchar(39) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`num_code`, `alpha_2_code`, `alpha_3_code`, `en_short_name`, `nationality`) VALUES
(4, 'AF', 'AFG', 'Afghanistan', 'Afghan'),
(8, 'AL', 'ALB', 'Albania', 'Albanian'),
(10, 'AQ', 'ATA', 'Antarctica', 'Antarctic'),
(12, 'DZ', 'DZA', 'Algeria', 'Algerian'),
(16, 'AS', 'ASM', 'American Samoa', 'American Samoan'),
(20, 'AD', 'AND', 'Andorra', 'Andorran'),
(24, 'AO', 'AGO', 'Angola', 'Angolan'),
(28, 'AG', 'ATG', 'Antigua and Barbuda', 'Antiguan or Barbudan'),
(31, 'AZ', 'AZE', 'Azerbaijan', 'Azerbaijani, Azeri'),
(32, 'AR', 'ARG', 'Argentina', 'Argentine'),
(36, 'AU', 'AUS', 'Australia', 'Australian'),
(40, 'AT', 'AUT', 'Austria', 'Austrian'),
(44, 'BS', 'BHS', 'Bahamas', 'Bahamian'),
(48, 'BH', 'BHR', 'Bahrain', 'Bahraini'),
(50, 'BD', 'BGD', 'Bangladesh', 'Bangladeshi'),
(51, 'AM', 'ARM', 'Armenia', 'Armenian'),
(52, 'BB', 'BRB', 'Barbados', 'Barbadian'),
(56, 'BE', 'BEL', 'Belgium', 'Belgian'),
(60, 'BM', 'BMU', 'Bermuda', 'Bermudian, Bermudan'),
(64, 'BT', 'BTN', 'Bhutan', 'Bhutanese'),
(68, 'BO', 'BOL', 'Bolivia (Plurinational State of)', 'Bolivian'),
(70, 'BA', 'BIH', 'Bosnia and Herzegovina', 'Bosnian or Herzegovinian'),
(72, 'BW', 'BWA', 'Botswana', 'Motswana, Botswanan'),
(74, 'BV', 'BVT', 'Bouvet Island', 'Bouvet Island'),
(76, 'BR', 'BRA', 'Brazil', 'Brazilian'),
(84, 'BZ', 'BLZ', 'Belize', 'Belizean'),
(86, 'IO', 'IOT', 'British Indian Ocean Territory', 'BIOT'),
(90, 'SB', 'SLB', 'Solomon Islands', 'Solomon Island'),
(92, 'VG', 'VGB', 'Virgin Islands (British)', 'British Virgin Island'),
(96, 'BN', 'BRN', 'Brunei Darussalam', 'Bruneian'),
(100, 'BG', 'BGR', 'Bulgaria', 'Bulgarian'),
(104, 'MM', 'MMR', 'Myanmar', 'Burmese'),
(108, 'BI', 'BDI', 'Burundi', 'Burundian'),
(112, 'BY', 'BLR', 'Belarus', 'Belarusian'),
(116, 'KH', 'KHM', 'Cambodia', 'Cambodian'),
(120, 'CM', 'CMR', 'Cameroon', 'Cameroonian'),
(124, 'CA', 'CAN', 'Canada', 'Canadian'),
(132, 'CV', 'CPV', 'Cabo Verde', 'Cabo Verdean'),
(136, 'KY', 'CYM', 'Cayman Islands', 'Caymanian'),
(140, 'CF', 'CAF', 'Central African Republic', 'Central African'),
(144, 'LK', 'LKA', 'Sri Lanka', 'Sri Lankan'),
(148, 'TD', 'TCD', 'Chad', 'Chadian'),
(152, 'CL', 'CHL', 'Chile', 'Chilean'),
(156, 'CN', 'CHN', 'China', 'Chinese'),
(158, 'TW', 'TWN', 'Taiwan, Province of China', 'Chinese, Taiwanese'),
(162, 'CX', 'CXR', 'Christmas Island', 'Christmas Island'),
(166, 'CC', 'CCK', 'Cocos (Keeling) Islands', 'Cocos Island'),
(170, 'CO', 'COL', 'Colombia', 'Colombian'),
(174, 'KM', 'COM', 'Comoros', 'Comoran, Comorian'),
(175, 'YT', 'MYT', 'Mayotte', 'Mahoran'),
(178, 'CG', 'COG', 'Congo (Republic of the)', 'Congolese'),
(180, 'CD', 'COD', 'Congo (Democratic Republic of the)', 'Congolese'),
(184, 'CK', 'COK', 'Cook Islands', 'Cook Island'),
(188, 'CR', 'CRI', 'Costa Rica', 'Costa Rican'),
(191, 'HR', 'HRV', 'Croatia', 'Croatian'),
(192, 'CU', 'CUB', 'Cuba', 'Cuban'),
(196, 'CY', 'CYP', 'Cyprus', 'Cypriot'),
(203, 'CZ', 'CZE', 'Czech Republic', 'Czech'),
(204, 'BJ', 'BEN', 'Benin', 'Beninese, Beninois'),
(208, 'DK', 'DNK', 'Denmark', 'Danish'),
(212, 'DM', 'DMA', 'Dominica', 'Dominican'),
(214, 'DO', 'DOM', 'Dominican Republic', 'Dominican'),
(218, 'EC', 'ECU', 'Ecuador', 'Ecuadorian'),
(222, 'SV', 'SLV', 'El Salvador', 'Salvadoran'),
(226, 'GQ', 'GNQ', 'Equatorial Guinea', 'Equatorial Guinean, Equatoguinean'),
(231, 'ET', 'ETH', 'Ethiopia', 'Ethiopian'),
(232, 'ER', 'ERI', 'Eritrea', 'Eritrean'),
(233, 'EE', 'EST', 'Estonia', 'Estonian'),
(234, 'FO', 'FRO', 'Faroe Islands', 'Faroese'),
(238, 'FK', 'FLK', 'Falkland Islands (Malvinas)', 'Falkland Island'),
(239, 'GS', 'SGS', 'South Georgia and the South Sandwich Islands', 'South Georgia or South Sandwich Islands'),
(242, 'FJ', 'FJI', 'Fiji', 'Fijian'),
(246, 'FI', 'FIN', 'Finland', 'Finnish'),
(248, 'AX', 'ALA', 'Åland Islands', 'Åland Island'),
(250, 'FR', 'FRA', 'France', 'French'),
(254, 'GF', 'GUF', 'French Guiana', 'French Guianese'),
(258, 'PF', 'PYF', 'French Polynesia', 'French Polynesian'),
(260, 'TF', 'ATF', 'French Southern Territories', 'French Southern Territories'),
(262, 'DJ', 'DJI', 'Djibouti', 'Djiboutian'),
(266, 'GA', 'GAB', 'Gabon', 'Gabonese'),
(268, 'GE', 'GEO', 'Georgia', 'Georgian'),
(270, 'GM', 'GMB', 'Gambia', 'Gambian'),
(275, 'PS', 'PSE', 'Palestine, State of', 'Palestinian'),
(276, 'DE', 'DEU', 'Germany', 'German'),
(288, 'GH', 'GHA', 'Ghana', 'Ghanaian'),
(292, 'GI', 'GIB', 'Gibraltar', 'Gibraltar'),
(296, 'KI', 'KIR', 'Kiribati', 'I-Kiribati'),
(300, 'GR', 'GRC', 'Greece', 'Greek, Hellenic'),
(304, 'GL', 'GRL', 'Greenland', 'Greenlandic'),
(308, 'GD', 'GRD', 'Grenada', 'Grenadian'),
(312, 'GP', 'GLP', 'Guadeloupe', 'Guadeloupe'),
(316, 'GU', 'GUM', 'Guam', 'Guamanian, Guambat'),
(320, 'GT', 'GTM', 'Guatemala', 'Guatemalan'),
(324, 'GN', 'GIN', 'Guinea', 'Guinean'),
(328, 'GY', 'GUY', 'Guyana', 'Guyanese'),
(332, 'HT', 'HTI', 'Haiti', 'Haitian'),
(334, 'HM', 'HMD', 'Heard Island and McDonald Islands', 'Heard Island or McDonald Islands'),
(336, 'VA', 'VAT', 'Vatican City State', 'Vatican'),
(340, 'HN', 'HND', 'Honduras', 'Honduran'),
(344, 'HK', 'HKG', 'Hong Kong', 'Hong Kong, Hong Kongese'),
(348, 'HU', 'HUN', 'Hungary', 'Hungarian, Magyar'),
(352, 'IS', 'ISL', 'Iceland', 'Icelandic'),
(356, 'IN', 'IND', 'India', 'Indian'),
(360, 'ID', 'IDN', 'Indonesia', 'Indonesian'),
(364, 'IR', 'IRN', 'Iran', 'Iranian, Persian'),
(368, 'IQ', 'IRQ', 'Iraq', 'Iraqi'),
(372, 'IE', 'IRL', 'Ireland', 'Irish'),
(376, 'IL', 'ISR', 'Israel', 'Israeli'),
(380, 'IT', 'ITA', 'Italy', 'Italian'),
(384, 'CI', 'CIV', 'Côte d\'Ivoire', 'Ivorian'),
(388, 'JM', 'JAM', 'Jamaica', 'Jamaican'),
(392, 'JP', 'JPN', 'Japan', 'Japanese'),
(398, 'KZ', 'KAZ', 'Kazakhstan', 'Kazakhstani, Kazakh'),
(400, 'JO', 'JOR', 'Jordan', 'Jordanian'),
(404, 'KE', 'KEN', 'Kenya', 'Kenyan'),
(408, 'KP', 'PRK', 'Korea (Democratic People\'s Republic of)', 'North Korean'),
(410, 'KR', 'KOR', 'Korea (Republic of)', 'South Korean'),
(414, 'KW', 'KWT', 'Kuwait', 'Kuwaiti'),
(417, 'KG', 'KGZ', 'Kyrgyzstan', 'Kyrgyzstani, Kyrgyz, Kirgiz, Kirghiz'),
(418, 'LA', 'LAO', 'Lao People\'s Democratic Republic', 'Lao, Laotian'),
(422, 'LB', 'LBN', 'Lebanon', 'Lebanese'),
(426, 'LS', 'LSO', 'Lesotho', 'Basotho'),
(428, 'LV', 'LVA', 'Latvia', 'Latvian'),
(430, 'LR', 'LBR', 'Liberia', 'Liberian'),
(434, 'LY', 'LBY', 'Libya', 'Libyan'),
(438, 'LI', 'LIE', 'Liechtenstein', 'Liechtenstein'),
(440, 'LT', 'LTU', 'Lithuania', 'Lithuanian'),
(442, 'LU', 'LUX', 'Luxembourg', 'Luxembourg, Luxembourgish'),
(446, 'MO', 'MAC', 'Macao', 'Macanese, Chinese'),
(450, 'MG', 'MDG', 'Madagascar', 'Malagasy'),
(454, 'MW', 'MWI', 'Malawi', 'Malawian'),
(458, 'MY', 'MYS', 'Malaysia', 'Malaysian'),
(462, 'MV', 'MDV', 'Maldives', 'Maldivian'),
(466, 'ML', 'MLI', 'Mali', 'Malian, Malinese'),
(470, 'MT', 'MLT', 'Malta', 'Maltese'),
(474, 'MQ', 'MTQ', 'Martinique', 'Martiniquais, Martinican'),
(478, 'MR', 'MRT', 'Mauritania', 'Mauritanian'),
(480, 'MU', 'MUS', 'Mauritius', 'Mauritian'),
(484, 'MX', 'MEX', 'Mexico', 'Mexican'),
(492, 'MC', 'MCO', 'Monaco', 'Monégasque, Monacan'),
(496, 'MN', 'MNG', 'Mongolia', 'Mongolian'),
(498, 'MD', 'MDA', 'Moldova (Republic of)', 'Moldovan'),
(499, 'ME', 'MNE', 'Montenegro', 'Montenegrin'),
(500, 'MS', 'MSR', 'Montserrat', 'Montserratian'),
(504, 'MA', 'MAR', 'Morocco', 'Moroccan'),
(508, 'MZ', 'MOZ', 'Mozambique', 'Mozambican'),
(512, 'OM', 'OMN', 'Oman', 'Omani'),
(516, 'NA', 'NAM', 'Namibia', 'Namibian'),
(520, 'NR', 'NRU', 'Nauru', 'Nauruan'),
(524, 'NP', 'NPL', 'Nepal', 'Nepali, Nepalese'),
(528, 'NL', 'NLD', 'Netherlands', 'Dutch, Netherlandic'),
(531, 'CW', 'CUW', 'Curaçao', 'Curaçaoan'),
(533, 'AW', 'ABW', 'Aruba', 'Aruban'),
(534, 'SX', 'SXM', 'Sint Maarten (Dutch part)', 'Sint Maarten'),
(535, 'BQ', 'BES', 'Bonaire, Sint Eustatius and Saba', 'Bonaire'),
(540, 'NC', 'NCL', 'New Caledonia', 'New Caledonian'),
(548, 'VU', 'VUT', 'Vanuatu', 'Ni-Vanuatu, Vanuatuan'),
(554, 'NZ', 'NZL', 'New Zealand', 'New Zealand, NZ'),
(558, 'NI', 'NIC', 'Nicaragua', 'Nicaraguan'),
(562, 'NE', 'NER', 'Niger', 'Nigerien'),
(566, 'NG', 'NGA', 'Nigeria', 'Nigerian'),
(570, 'NU', 'NIU', 'Niue', 'Niuean'),
(574, 'NF', 'NFK', 'Norfolk Island', 'Norfolk Island'),
(578, 'NO', 'NOR', 'Norway', 'Norwegian'),
(580, 'MP', 'MNP', 'Northern Mariana Islands', 'Northern Marianan'),
(581, 'UM', 'UMI', 'United States Minor Outlying Islands', 'American'),
(583, 'FM', 'FSM', 'Micronesia (Federated States of)', 'Micronesian'),
(584, 'MH', 'MHL', 'Marshall Islands', 'Marshallese'),
(585, 'PW', 'PLW', 'Palau', 'Palauan'),
(586, 'PK', 'PAK', 'Pakistan', 'Pakistani'),
(591, 'PA', 'PAN', 'Panama', 'Panamanian'),
(598, 'PG', 'PNG', 'Papua New Guinea', 'Papua New Guinean, Papuan'),
(600, 'PY', 'PRY', 'Paraguay', 'Paraguayan'),
(604, 'PE', 'PER', 'Peru', 'Peruvian'),
(608, 'PH', 'PHL', 'Philippines', 'Philippine, Filipino'),
(612, 'PN', 'PCN', 'Pitcairn', 'Pitcairn Island'),
(616, 'PL', 'POL', 'Poland', 'Polish'),
(620, 'PT', 'PRT', 'Portugal', 'Portuguese'),
(624, 'GW', 'GNB', 'Guinea-Bissau', 'Bissau-Guinean'),
(626, 'TL', 'TLS', 'Timor-Leste', 'Timorese'),
(630, 'PR', 'PRI', 'Puerto Rico', 'Puerto Rican'),
(634, 'QA', 'QAT', 'Qatar', 'Qatari'),
(638, 'RE', 'REU', 'Réunion', 'Réunionese, Réunionnais'),
(642, 'RO', 'ROU', 'Romania', 'Romanian'),
(643, 'RU', 'RUS', 'Russian Federation', 'Russian'),
(646, 'RW', 'RWA', 'Rwanda', 'Rwandan'),
(652, 'BL', 'BLM', 'Saint Barthélemy', 'Barthélemois'),
(654, 'SH', 'SHN', 'Saint Helena, Ascension and Tristan da Cunha', 'Saint Helenian'),
(659, 'KN', 'KNA', 'Saint Kitts and Nevis', 'Kittitian or Nevisian'),
(660, 'AI', 'AIA', 'Anguilla', 'Anguillan'),
(662, 'LC', 'LCA', 'Saint Lucia', 'Saint Lucian'),
(663, 'MF', 'MAF', 'Saint Martin (French part)', 'Saint-Martinoise'),
(666, 'PM', 'SPM', 'Saint Pierre and Miquelon', 'Saint-Pierrais or Miquelonnais'),
(670, 'VC', 'VCT', 'Saint Vincent and the Grenadines', 'Saint Vincentian, Vincentian'),
(674, 'SM', 'SMR', 'San Marino', 'Sammarinese'),
(678, 'ST', 'STP', 'Sao Tome and Principe', 'São Toméan'),
(682, 'SA', 'SAU', 'Saudi Arabia', 'Saudi, Saudi Arabian'),
(686, 'SN', 'SEN', 'Senegal', 'Senegalese'),
(688, 'RS', 'SRB', 'Serbia', 'Serbian'),
(690, 'SC', 'SYC', 'Seychelles', 'Seychellois'),
(694, 'SL', 'SLE', 'Sierra Leone', 'Sierra Leonean'),
(702, 'SG', 'SGP', 'Singapore', 'Singaporean'),
(703, 'SK', 'SVK', 'Slovakia', 'Slovak'),
(704, 'VN', 'VNM', 'Vietnam', 'Vietnamese'),
(705, 'SI', 'SVN', 'Slovenia', 'Slovenian, Slovene'),
(706, 'SO', 'SOM', 'Somalia', 'Somali, Somalian'),
(710, 'ZA', 'ZAF', 'South Africa', 'South African'),
(716, 'ZW', 'ZWE', 'Zimbabwe', 'Zimbabwean'),
(724, 'ES', 'ESP', 'Spain', 'Spanish'),
(728, 'SS', 'SSD', 'South Sudan', 'South Sudanese'),
(729, 'SD', 'SDN', 'Sudan', 'Sudanese'),
(732, 'EH', 'ESH', 'Western Sahara', 'Sahrawi, Sahrawian, Sahraouian'),
(740, 'SR', 'SUR', 'Suriname', 'Surinamese'),
(744, 'SJ', 'SJM', 'Svalbard and Jan Mayen', 'Svalbard'),
(748, 'SZ', 'SWZ', 'Swaziland', 'Swazi'),
(752, 'SE', 'SWE', 'Sweden', 'Swedish'),
(756, 'CH', 'CHE', 'Switzerland', 'Swiss'),
(760, 'SY', 'SYR', 'Syrian Arab Republic', 'Syrian'),
(762, 'TJ', 'TJK', 'Tajikistan', 'Tajikistani'),
(764, 'TH', 'THA', 'Thailand', 'Thai'),
(768, 'TG', 'TGO', 'Togo', 'Togolese'),
(772, 'TK', 'TKL', 'Tokelau', 'Tokelauan'),
(776, 'TO', 'TON', 'Tonga', 'Tongan'),
(780, 'TT', 'TTO', 'Trinidad and Tobago', 'Trinidadian or Tobagonian'),
(784, 'AE', 'ARE', 'United Arab Emirates', 'Emirati, Emirian, Emiri'),
(788, 'TN', 'TUN', 'Tunisia', 'Tunisian'),
(792, 'TR', 'TUR', 'Turkey', 'Turkish'),
(795, 'TM', 'TKM', 'Turkmenistan', 'Turkmen'),
(796, 'TC', 'TCA', 'Turks and Caicos Islands', 'Turks and Caicos Island'),
(798, 'TV', 'TUV', 'Tuvalu', 'Tuvaluan'),
(800, 'UG', 'UGA', 'Uganda', 'Ugandan'),
(804, 'UA', 'UKR', 'Ukraine', 'Ukrainian'),
(807, 'MK', 'MKD', 'Macedonia (the former Yugoslav Republic of)', 'Macedonian'),
(818, 'EG', 'EGY', 'Egypt', 'Egyptian'),
(826, 'GB', 'GBR', 'United Kingdom of Great Britain and Northern Ireland', 'British, UK'),
(831, 'GG', 'GGY', 'Guernsey', 'Channel Island'),
(832, 'JE', 'JEY', 'Jersey', 'Channel Island'),
(833, 'IM', 'IMN', 'Isle of Man', 'Manx'),
(834, 'TZ', 'TZA', 'Tanzania, United Republic of', 'Tanzanian'),
(840, 'US', 'USA', 'United States of America', 'American'),
(850, 'VI', 'VIR', 'Virgin Islands (U.S.)', 'U.S. Virgin Island'),
(854, 'BF', 'BFA', 'Burkina Faso', 'Burkinabé'),
(858, 'UY', 'URY', 'Uruguay', 'Uruguayan'),
(860, 'UZ', 'UZB', 'Uzbekistan', 'Uzbekistani, Uzbek'),
(862, 'VE', 'VEN', 'Venezuela (Bolivarian Republic of)', 'Venezuelan'),
(876, 'WF', 'WLF', 'Wallis and Futuna', 'Wallis and Futuna, Wallisian or Futunan'),
(882, 'WS', 'WSM', 'Samoa', 'Samoan'),
(887, 'YE', 'YEM', 'Yemen', 'Yemeni'),
(894, 'ZM', 'ZMB', 'Zambia', 'Zambian');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `currency_id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_dolar` decimal(12,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`currency_id`, `country`, `currency`, `to_dolar`, `description`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Indonesia', 'IDR', '14000.00', NULL, 1, NULL, NULL),
(2, 'America', 'USD', '1.00', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `discount_id` bigint(20) UNSIGNED NOT NULL,
  `discount_percent` int(10) NOT NULL DEFAULT '0',
  `discount_rate` decimal(12,2) NOT NULL DEFAULT '0.00',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`discount_id`, `discount_percent`, `discount_rate`, `description`, `created_at`, `updated_at`) VALUES
(0, 0, '0.00', 'No discount\r\n', NULL, NULL),
(1, 10, '0.00', 'Christmas Discount', NULL, NULL),
(3, 20, '0.00', 'New years discount', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location`, `province_id`, `keterangan`, `icon`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Bali (All Port)', 1, NULL, NULL, NULL, NULL, NULL),
(2, 'Amed  ', 1, NULL, NULL, NULL, NULL, NULL),
(3, 'Mertasari  ', 1, NULL, NULL, NULL, NULL, NULL),
(4, 'Padangbai  ', 1, NULL, NULL, NULL, NULL, NULL),
(5, 'Pemelisan  ', 1, NULL, NULL, NULL, NULL, NULL),
(6, 'Sanur  ', 1, NULL, NULL, NULL, NULL, NULL),
(7, 'Serangan  ', 1, NULL, NULL, NULL, NULL, NULL),
(8, 'Tanjung Benoa (Nusa Dua)  ', 1, NULL, NULL, NULL, NULL, NULL),
(9, 'Tribuana Port (Kusamba)  ', 1, NULL, NULL, NULL, NULL, NULL),
(10, 'Nusa Lembongan', 1, NULL, NULL, NULL, NULL, NULL),
(11, 'Nusa Penida', 1, NULL, NULL, NULL, NULL, NULL),
(12, 'Gili Trawangan    ', 2, NULL, NULL, NULL, NULL, NULL),
(13, 'Gili Meno    ', 2, NULL, NULL, NULL, NULL, NULL),
(14, 'Gili Air    ', 2, NULL, NULL, NULL, NULL, NULL),
(15, 'Gili Gede    ', 2, NULL, NULL, NULL, NULL, NULL),
(16, 'Bangsal    ', 2, NULL, NULL, NULL, NULL, NULL),
(17, 'Senggigi    ', 2, NULL, NULL, NULL, NULL, NULL),
(18, 'Teluk Nara    ', 2, NULL, NULL, NULL, NULL, NULL),
(19, 'Teluk Kode', 2, NULL, NULL, NULL, NULL, NULL);

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
(1, '2019_11_29_041828_create_locations_table', 1),
(2, '2019_11_29_045328_create_provinces_table', 2),
(3, '2019_11_29_135408_create_owners_table', 3),
(4, '2019_11_29_135841_create_speed_boats_table', 4),
(5, '2019_11_29_143203_update_speed_boats_table', 5),
(6, '2019_11_29_143715_update_speed_boats_column', 6),
(7, '2019_12_03_085624_create_discounts_table', 7),
(8, '2019_12_03_225542_create_price_mapings_table', 8),
(9, '2019_12_07_085137_create_currencies_table', 9),
(10, '2020_01_18_032215_create_activities_table', 10),
(11, '2020_01_18_034102_create_act_categories_table', 11),
(12, '2014_10_12_100000_create_password_resets_table', 12),
(13, '2020_01_20_032935_create_roles_table', 13),
(14, '2020_01_27_120349_create_posts_table', 14),
(15, '2020_02_02_134317_create_pages_table', 15),
(16, '2020_02_03_061131_create_products_table', 16),
(17, '2020_02_03_230354_create_product_cats_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telpon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addres` text COLLATE utf8mb4_unicode_ci,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`owner_id`, `name`, `company`, `email`, `telpon`, `addres`, `logo`, `description`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Nacha Fastboat', 'Nacha Fastboat', 'booking@nachafastboat.com', '081353991818', 'Jl. Pantai Sanur, Sanur Kaja', '/partner/nacha.png', '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post` longtext COLLATE utf8mb4_unicode_ci,
  `image_thumb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `author`, `category_id`, `title`, `slug`, `post`, `image_thumb`, `tag`, `meta_title`, `meta_desc`, `status`, `created_at`, `updated_at`) VALUES
(81, 3, 2, 'Page Term Of Services', 'page-term-of-services', '<p>Page Term Of Services<br></p>', '/uploads/page/page-thumbnail/page-81.jpeg', 'tos', 'Page Term Of Services', 'Page Term Of Services', 1, '2020-02-02 06:18:26', '2020-02-02 06:29:41'),
(82, 3, NULL, 'untitled', '', NULL, NULL, NULL, NULL, NULL, 0, '2020-02-02 06:30:08', '2020-02-02 06:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_cat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post` longtext COLLATE utf8mb4_unicode_ci,
  `image_thumb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `author`, `category_id`, `title`, `slug`, `slug_cat`, `post`, `image_thumb`, `tag`, `meta_title`, `meta_desc`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'Therm of Service Baru', 'therm-of-services', 'page', 'Ini adalah page ToS', '/uploads/post/post-thumbnail/post-1.jpeg', 'tos', NULL, NULL, 1, '2020-01-26 16:00:00', '2020-02-02 06:17:56'),
(2, 3, 3, 'Your Post', 'your-post', 'rent-car', '<p>Hai this is your post</p>', '/uploads/post/post-thumbnail/post-2.jpeg', 'tag,pande', 'Your Post', 'Your Post', 1, '2020-01-31 22:49:13', '2020-02-03 16:16:55'),
(3, 3, 1, 'Air Terjun Paling Tinggi Di Bali', 'air-terjun-paling-tinggi-di-bali', 'water-sport', '<p>Air terjuan paling tinggi di bali berada di Singaraja, Air terjun ini adalah air terjun gitgit yang memiliki ketinggian kalau tidak salah sekitar 250meter. Air terjun ini juga memiliki pemandangan alam yang sangat indah dengan hamparan pepohonan yang sangat banyak dan rindang.</p><p>Berikut adalah foto-foto dari berbagai macam air terjun di dunia.</p>', '/uploads/post/post-thumbnail/post-3.png', 'air terjun,singaraja,bali,wisata', 'Air Terjun Paling Tinggi Di Bali', 'Air terjun paling tinggi di bali ini memiliki nama air terjun gitgit', 0, '2020-01-31 22:50:13', '2020-02-02 02:19:36'),
(4, 3, NULL, 'untitled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-02-02 06:01:55', '2020-02-02 06:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `price_mapings`
--

CREATE TABLE `price_mapings` (
  `price_maping_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(12,0) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_cat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagline` text COLLATE utf8mb4_unicode_ci,
  `post` text COLLATE utf8mb4_unicode_ci,
  `feature` text COLLATE utf8mb4_unicode_ci,
  `image_thumb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adult_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_percent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validity_from` date DEFAULT NULL,
  `validity_to` date DEFAULT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guide_language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int(10) UNSIGNED DEFAULT NULL,
  `stock_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `always_available` tinyint(1) DEFAULT '0',
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `verified` tinyint(1) DEFAULT '0',
  `verify_comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `author`, `category_id`, `title`, `slug`, `slug_cat`, `tagline`, `post`, `feature`, `image_thumb`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`, `adult_price`, `child_price`, `discount_percent`, `discount_price`, `validity_from`, `validity_to`, `tag`, `product_language`, `guide_language`, `stock`, `stock_name`, `always_available`, `meta_title`, `meta_desc`, `status`, `verified`, `verify_comment`, `created_at`, `updated_at`) VALUES
(4, 3, 2, 'Snorkeling To Sanur Beach', 'snorkeling-to-sanur-beach', 'p', NULL, '<p>This is snorkeling in sanur beach</p>', '<p>This is snorkeling in sanur beach</p>', '/uploads/product/product-thumbnail/product-4.jpeg', '/uploads/product/product-photo/4-image_1.jpeg', '/uploads/product/product-photo/4-image_2.jpeg', '/uploads/product/product-photo/4-image_3.jpeg', NULL, NULL, '250000', '200000', '20', '', '2020-02-26', '2030-01-08', 'sanur,snorkeling,snorkelingbali,pande', 'Spanish', 'Indonesian', 30, 'Person', 1, 'Snorkeling To Sanur Beach', 'Snorkeling To Sanur Beach', 1, 0, NULL, '2020-02-08 04:16:20', '2020-02-27 05:56:35'),
(5, 3, 1, 'Best Package For Batur Mountain In Bali', 'best-package-for-batur-mountain-in', 'p', NULL, '<p><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><a href=\"https://en.wikipedia.org/wiki/Mount_Batur\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(38, 38, 38);\"><b>Mount Batur</b></a>&nbsp;Trekking has long been one of the highlights of the active travelers’s trip to Bali, and Gede starting taking people up Mount Batur when he was just a child. &nbsp;The Mount Batur Sunrise Trek is one of our most popular tours for good reason. Not only do you get to explore an active volcano and get up close and personal with one of Bali’s most sacred mountains, but you also get to experience spectacular views of the sun bursting onto the horizon in a riot of oranges and yellows and slowly spreading over the caldera and lake below.</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 1em; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; line-height: 1.7em; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 1em; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; line-height: 1.7em; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background: transparent;\">Your adventure starts with a briefing at&nbsp;<a href=\"https://www.balisunrisevillas.com/\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(38, 38, 38);\">Bali Sunrise Villas</a>, which is located at the foot of the mountain at 1,000 metres above sea level. After a quick pick-me-up of coffee and tea at the starting point, we’ll make our way up <b>Mount Batur </b>in the cool pre-dawn air under a blanket of stars.</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 1em; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; line-height: 1.7em; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background: transparent;\">The trek takes about one to two hours to reach the peak at 1,717 metres above sea level. Once you arrive at the highest point, it really feels as though you are on top of the world, as you can see the majestic peak of neighbouring&nbsp;<a href=\"https://www.tripadvisor.com/Attraction_Review-g303952-d8408524-Reviews-Mount_Abang-Kintamani_Bangli_Bali.html\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(38, 38, 38);\">Mount Abang</a>&nbsp;hovering above the clouds, the distant cone of Mount Agung on the horizon, and the caldera lake spread out below.</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 1em; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; line-height: 1.7em; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background: transparent;\">At the top of the mountain we’ll soak up the beauty of the sunrise and refuel with a light breakfast of fruit&nbsp;and eggs boiled in volcanic steam. There will be plenty of time to relax and take photos of the sunrise and incredible scenery.</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 1em; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; line-height: 1.7em; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background: transparent;\">Then it’s off to explore the three younger craters and the most recent lava flows. As we make our way down we’ll take in the amazing volcanic landscape and might even come across a troop of mountain monkeys playing on the rocks. Finally we will arrive back at the Bali Sunrise Villas &amp; Restaurant, where a driver will be waiting.</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; line-height: 1.7em; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background: transparent;\">Your can end your Batur Sunrise Tour here, but we highly suggest adding a visit to the natural hot springs to your itinerary. The hot springs are located just down the road from Bali Sunrise Villas, and they offer the perfect opportunity to soak those sore muscles in the volcanically heated pools or cool off in the cold freshwater pools.</span></p>', '<p><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><a href=\"https://en.wikipedia.org/wiki/Mount_Batur\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(38, 38, 38);\"><b>Mount Batur</b></a>&nbsp;Trekking has long been one of the highlights of the active travelers’s trip to Bali, and Gede starting taking people up Mount Batur when he was just a child. &nbsp;The Mount Batur Sunrise Trek is one of our most popular tours for good reason. Not only do you get to explore an active volcano and get up close and personal with one of Bali’s most sacred mountains, but you also get to experience spectacular views of the sun bursting onto the horizon in a riot of oranges and yellows and slowly spreading over the caldera and lake below.</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 1em; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; line-height: 1.7em; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 1em; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; line-height: 1.7em; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background: transparent;\">Your adventure starts with a briefing at&nbsp;<a href=\"https://www.balisunrisevillas.com/\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(38, 38, 38);\">Bali Sunrise Villas</a>, which is located at the foot of the mountain at 1,000 metres above sea level. After a quick pick-me-up of coffee and tea at the starting point, we’ll make our way up <b>Mount Batur </b>in the cool pre-dawn air under a blanket of stars.</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 1em; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; line-height: 1.7em; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background: transparent;\">The trek takes about one to two hours to reach the peak at 1,717 metres above sea level. Once you arrive at the highest point, it really feels as though you are on top of the world, as you can see the majestic peak of neighbouring&nbsp;<a href=\"https://www.tripadvisor.com/Attraction_Review-g303952-d8408524-Reviews-Mount_Abang-Kintamani_Bangli_Bali.html\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(38, 38, 38);\">Mount Abang</a>&nbsp;hovering above the clouds, the distant cone of Mount Agung on the horizon, and the caldera lake spread out below.</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 1em; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; line-height: 1.7em; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background: transparent;\">At the top of the mountain we’ll soak up the beauty of the sunrise and refuel with a light breakfast of fruit&nbsp;and eggs boiled in volcanic steam. There will be plenty of time to relax and take photos of the sunrise and incredible scenery.</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 1em; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; line-height: 1.7em; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background: transparent;\">Then it’s off to explore the three younger craters and the most recent lava flows. As we make our way down we’ll take in the amazing volcanic landscape and might even come across a troop of mountain monkeys playing on the rocks. Finally we will arrive back at the Bali Sunrise Villas &amp; Restaurant, where a driver will be waiting.</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; line-height: 1.7em; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background: transparent;\">Your can end your Batur Sunrise Tour here, but we highly suggest adding a visit to the natural hot springs to your itinerary. The hot springs are located just down the road from Bali Sunrise Villas, and they offer the perfect opportunity to soak those sore muscles in the volcanically heated pools or cool off in the cold freshwater pools.</span></p>', '/uploads/product/product-thumbnail/product-5.png', '/uploads/product/product-photo/5-image_1.jpeg', '/uploads/product/product-photo/5-image_2.jpeg', '/uploads/product/product-photo/5-image_3.jpeg', '/uploads/product/product-photo/5-image_4.jpeg', '/uploads/product/product-photo/5-image_5.jpeg', '650000', '', '10', '', '2020-01-01', '2030-01-10', 'tour,mountain,batur,batur mountain,kintamani,kintamani mountain tour', 'English', 'English,Indonesian,Mandarin', 30, 'Person', 0, 'Best Package For Batur Mountain In Bali', 'Best Package For Batur Mountain In Bali', 1, 0, NULL, '2020-02-29 03:44:31', '2020-03-07 06:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_cats`
--

CREATE TABLE `product_cats` (
  `product_cat_id` bigint(20) UNSIGNED NOT NULL,
  `product_cat_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_cat_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_cats`
--

INSERT INTO `product_cats` (`product_cat_id`, `product_cat_name`, `product_cat_desc`, `created_at`, `updated_at`) VALUES
(1, 'tour', '', NULL, NULL),
(2, 'transportation', '', NULL, NULL),
(3, 'activity', '', NULL, NULL),
(4, 'ticket', '', NULL, NULL),
(5, 'rental', '', NULL, NULL),
(6, 'property', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`province_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bali', NULL, NULL),
(2, 'Lombok / Gili', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_desc`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'Member', NULL, NULL, NULL),
(3, 'User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `speed_boats`
--

CREATE TABLE `speed_boats` (
  `speed_boat_id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `discount_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trademark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `features` text COLLATE utf8mb4_unicode_ci,
  `max_seat` int(11) NOT NULL DEFAULT '0',
  `available_seat` int(11) NOT NULL DEFAULT '0',
  `aktive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `departed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departed_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pick_up` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `speed_boats`
--

INSERT INTO `speed_boats` (`speed_boat_id`, `owner_id`, `discount_id`, `name`, `trademark`, `images`, `features`, `max_seat`, `available_seat`, `aktive`, `created_at`, `updated_at`, `departed`, `destination`, `departed_id`, `destination_id`, `pick_up`) VALUES
(1, 1, 1, 'Nacha Fastboat', 'Nacha Fastboat', 'images/fastboat/nacha.jpg', 'Fast and comfortable', 16, 2, 1, NULL, NULL, 'Sanur', 'Nusa Penida', '6', '11', 0),
(2, 1, 3, 'Nacha 2 Fastboat', 'Nacha 2 Fastboat', 'images/fastboat/nacha.jpg', 'Fast and comfortable', 16, 16, 1, NULL, NULL, 'Sanur', 'Nusa Penida', '6', '11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `men` tinyint(1) DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscribe` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT '3',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `nationality`, `men`, `phone`, `photo`, `subscribe`, `email_verified_at`, `provider`, `provider_id`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sudana Yasa Pande', 'fundaypande', 'fundaypande@hotmail.com', 'Canada', 1, '01930193', 'https://graph.facebook.com/v3.3/3223120187704350/picture?type=normal', 1, NULL, 'facebook', '3223120187704350', NULL, 3, 'wWfldiGP25G1Ns64LbsNAXP4J7AJutksvt33DuGTO5cXJaqSApZhZkv7svRx', '2020-01-17 22:21:05', '2020-01-23 20:28:54'),
(2, 'WEB mail', NULL, 'funday820@gmail.com', NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AAuE7mCQNV81jVLvqtd2PYeU5cRZ1qm9rkHTxD_b-2DnuA', 0, NULL, 'google', '112210552102317370695', NULL, 2, 'QBBU3veU5gO4XUYg9PmBnyKKdT1PB1GwMoFYyulR0VR13UyVRBIdBRUfNJzs', '2020-01-17 23:24:52', '2020-01-27 00:41:34'),
(3, 'Komang Sudana Yasa Pande', 'fundaypande2', 'funday@gmail.com', 'Indonesia', 1, '087888030598', '/uploads/users/profiles/profile-3.jpeg', 1, NULL, NULL, NULL, '$2y$10$.7naFqnO6sl7/cpxL/8Kz.woJMxL.si04SHD0LZHhdIJkoi3hDDza', 1, 'sNgrmRrPNVjYJjwnnMg3RzB05t6KerstzNRNiQp6CDAhy0pmZi4SXP4CNdmD', '2020-01-18 00:08:51', '2020-02-05 07:14:40'),
(4, 'Funday Pande', NULL, 'pande@qmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '$2y$10$k1nMoGZqI7.hJWe2EQNLcuL5vlsdCH4VdfSGtYdjrdfQu8d1sTkF2', 1, NULL, '2020-01-18 14:02:48', '2020-01-18 14:02:48'),
(5, 'Olivia - Cutenpets', NULL, 'fundaylogin@gmail.com', NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AAuE7mCOCdLb1J5oKhB9s40C-k0Cj1esZy4ZpRvwGfgA3A', 0, NULL, 'google', '101347409692000649641', NULL, 3, 'prZMP2oaUG2SsopKKypAvRW1UGy4LsCjc7wMo7SJu7euhXXnHvsizK5cImFp', '2020-01-22 05:56:29', '2020-01-22 05:56:29'),
(9, 'Funday Pande', NULL, 'pande2@gmail.com', 'Indonesia', 1, '087888030598', '/uploads/users/profiles/profile-9.jpeg', 1, NULL, NULL, NULL, '$2y$10$Ilk4Mxj80IMDVfxKjsPvQuWW2PimvrE8bzuOlsue4G3QiT22ZJf.y', 2, NULL, '2020-01-27 00:10:49', '2020-01-27 00:14:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `act_categories`
--
ALTER TABLE `act_categories`
  ADD PRIMARY KEY (`act_category_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`num_code`),
  ADD UNIQUE KEY `alpha_2_code` (`alpha_2_code`),
  ADD UNIQUE KEY `alpha_3_code` (`alpha_3_code`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`discount_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `author` (`author`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `status` (`status`),
  ADD KEY `slug` (`slug`),
  ADD KEY `slug_cat` (`slug_cat`);

--
-- Indexes for table `price_mapings`
--
ALTER TABLE `price_mapings`
  ADD PRIMARY KEY (`price_maping_id`),
  ADD KEY `activity_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `author` (`author`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `slug` (`slug`),
  ADD KEY `verified` (`verified`);

--
-- Indexes for table `product_cats`
--
ALTER TABLE `product_cats`
  ADD PRIMARY KEY (`product_cat_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `speed_boats`
--
ALTER TABLE `speed_boats`
  ADD PRIMARY KEY (`speed_boat_id`),
  ADD KEY `owner_id` (`owner_id`),
  ADD KEY `departed_id` (`departed_id`),
  ADD KEY `destination_id` (`destination_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `act_categories`
--
ALTER TABLE `act_categories`
  MODIFY `act_category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `currency_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `discount_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `owner_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `price_mapings`
--
ALTER TABLE `price_mapings`
  MODIFY `price_maping_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_cats`
--
ALTER TABLE `product_cats`
  MODIFY `product_cat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `province_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `speed_boats`
--
ALTER TABLE `speed_boats`
  MODIFY `speed_boat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `act_categories` (`act_category_id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`author`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `product_cats` (`product_cat_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`author`) REFERENCES `users` (`id`);

--
-- Constraints for table `speed_boats`
--
ALTER TABLE `speed_boats`
  ADD CONSTRAINT `speed_boats_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`owner_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
