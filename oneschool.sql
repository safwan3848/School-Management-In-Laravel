-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2025 at 08:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oneschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'This is for testing purpose', '1764255839.jpg', 0, '2025-11-27 09:32:48', '2025-11-27 09:53:07'),
(3, 'women', '1764256525.jpg', 1, '2025-11-27 09:45:25', '2025-11-27 09:45:25'),
(4, 'women2', '1764256579.jpg', 1, '2025-11-27 09:46:19', '2025-11-27 09:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `highest_qualification` varchar(255) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `subjects` varchar(255) DEFAULT NULL,
  `preferred_grade` varchar(255) DEFAULT NULL,
  `expected_salary` varchar(255) DEFAULT NULL,
  `availability` varchar(255) DEFAULT NULL,
  `resume_path` varchar(255) DEFAULT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `other_docs_path` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` enum('new','reviewed','rejected','hired') NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `name`, `email`, `phone`, `dob`, `gender`, `address`, `position`, `highest_qualification`, `experience`, `subjects`, `preferred_grade`, `expected_salary`, `availability`, `resume_path`, `photo_path`, `other_docs_path`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jerry Matthews', 'zydi@mailinator.com', '+1 (271) 606-6948', '2001-08-26', 'Female', 'Ea necessitatibus ea', 'Junior Class Teacher', 'Non suscipit laboris', 74, 'Tempore excepturi a', 'Ducimus totam aliqu', 'Assumenda ut reprehe', 'Illo nemo voluptates', '1764570451_resume.pdf', '1764570451_photo.png', '1764570451_docs.pdf', 'Et alias modi omnis', 'new', '2025-12-01 00:57:31', '2025-12-01 00:57:31'),
(2, 'Melanie Ramirez', 'wesa@mailinator.com', '+1 (192) 463-8554', '2001-01-15', 'Female', 'Quaerat et voluptate', 'Cillum laborum Vita', 'Enim eligendi corpor', 20, 'Id amet cumque dolo', 'Nam aspernatur omnis', 'Recusandae Est aute', 'Soluta nisi possimus', '1764571633_resume.pdf', '1764571633_photo.jpeg', '1764571633_docs.pdf', 'Non esse dicta tempo', 'new', '2025-12-01 01:17:13', '2025-12-01 01:36:48'),
(3, 'Colt Rodriguez', 'shaikhsafwan0404@gmail.com', '+1 (666) 223-2275', '1995-05-10', 'Female', 'that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Cillum laborum Vita', 'Nobis aperiam atque', 3, 'Dolores quis autem d', 'Aut voluptas nostrum', 'Aliqua Dolor mollit', 'Et ut provident ad', '1764573574_resume.pdf', '1764573574_photo.jpg', '1764573574_docs.docx', 'Numquam ea beatae es', 'new', '2025-12-01 01:49:34', '2025-12-01 01:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `enquiry_type` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `enquiry_type`, `subject`, `email`, `phone_number`, `message`, `created_at`, `updated_at`) VALUES
(7, 'safwan', 'shaikh', 'Admission Enquiry', 'Class 10th fees Enquiry', 'shaikhsafwan040@gmail.com', '7990455223', 'This is just for admission enquiry email testing :)', '2025-11-29 00:46:25', '2025-11-29 00:46:25'),
(8, 'Saziya', 'Shaikh', 'General Enquiry', 'General Enquiry Subject', 'shaikhsafwan040@gmail.com', '8238708378', 'This is general enquiry message just for testing purpose :)', '2025-11-29 00:48:13', '2025-11-29 01:00:07'),
(9, 'jhbsdjhcb', 'djdhbsdc', 'Admission Enquiry', 'dbcjsdbcjh', 'hahu@mailinator.com', '8521479630', 'hjcbsjdchbsdcsdjh', '2025-11-29 01:03:35', '2025-11-29 01:03:35'),
(10, 'lsdcsd', 'kcskldc', 'General Enquiry', 'cddscsdc', 'shaikhsafwan0404@gmail.com', '8238708378', 'cdsdcskdkcjdcnkjc', '2025-11-29 01:04:28', '2025-11-29 01:04:28'),
(11, 'kmmon', 'onoio', 'Admission Enquiry', 'ascsdc', 'shaikhsafwan0404@gmail.com', '8521479630', 'dcsdcskjdcskjcskjck', '2025-11-29 01:05:32', '2025-11-29 01:05:32'),
(12, 'Warren', 'Miller', 'General Enquiry', 'Consectetur aut nih', 'shaikhsafwan0404@gmail.com', '+1 (865) 317-2275', 'Incididunt quas tene just for test Incididunt quas tene just for test Incididunt quas tene just for test Incididunt quas tene just for test Incididunt quas tene just for test Incididunt quas tene just for test Incididunt quas tene just for test Incididunt quas tene just for test Incididunt quas tene just for test Incididunt quas tene just for test Incididunt quas tene just for test', '2025-11-29 01:07:46', '2025-11-29 01:07:46'),
(13, 'Kennedy', 'Whitaker', 'General Enquiry', 'Aliquid sapiente vol', 'shaikhsafwan0404@gmail.com', '+1 (456) 894-5481', 'Amet sunt qui solu', '2025-11-29 01:09:49', '2025-11-29 01:09:49'),
(14, 'Murphy', 'Bowers', 'Admission Enquiry', 'Aut ipsa aut rerum', 'mywejawaw@mailinator.com', '+1 (476) 744-1037', 'Minima inventore non', '2025-11-29 01:11:36', '2025-11-29 01:11:36'),
(15, 'Maisie', 'Patton', 'Admission Enquiry', 'At voluptatem Cupid', 'shaikhsafwan0404@gmail.com', '+1 (302) 194-6822', 'Architecto et asperi', '2025-11-29 01:12:00', '2025-11-29 01:12:00'),
(16, 'Joshua', 'Rocha', 'Admission Enquiry', 'Sint sunt duis eos f', 'shaikhsafwan0404@gmail.com', '+1 (734) 324-1033', 'Sunt ab quisquam vol \r\nSunt ab quisquam vol\r\nSunt ab quisquam vol\r\nSunt ab quisquam vol\r\nSunt ab quisquam vol\r\nSunt ab quisquam vol', '2025-11-29 01:13:50', '2025-11-29 01:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'uploads/gallery/1764400390.jpg', 'Image 1', 1, '2025-11-29 01:43:10', '2025-11-29 01:43:10'),
(2, 'uploads/gallery/1764400567.jpg', NULL, 1, '2025-11-29 01:46:07', '2025-11-29 01:46:07'),
(3, 'uploads/gallery/1764400597.jpg', NULL, 1, '2025-11-29 01:46:37', '2025-11-29 01:46:37'),
(4, 'uploads/gallery/1764400623.png', NULL, 1, '2025-11-29 01:47:03', '2025-11-29 01:47:03'),
(5, 'uploads/gallery/1764400870.jpg', NULL, 1, '2025-11-29 01:51:10', '2025-11-29 01:51:10'),
(6, 'uploads/gallery/1764400886.png', NULL, 1, '2025-11-29 01:51:26', '2025-11-29 01:51:26'),
(7, 'uploads/gallery/1764400896.png', NULL, 1, '2025-11-29 01:51:36', '2025-11-29 01:51:36'),
(8, 'uploads/gallery/1764401659-692aa1fbd394e.jpg', NULL, 1, '2025-11-29 02:04:19', '2025-11-29 02:04:19'),
(9, 'uploads/gallery/1764401659-692aa1fbd6df1.jpg', NULL, 1, '2025-11-29 02:04:19', '2025-11-29 02:04:19'),
(10, 'uploads/gallery/1764401659-692aa1fbd8174.jpg', NULL, 1, '2025-11-29 02:04:19', '2025-11-29 02:04:19'),
(11, 'uploads/gallery/1764401659-692aa1fbd9038.jpg', NULL, 1, '2025-11-29 02:04:19', '2025-11-29 02:04:19'),
(12, 'uploads/gallery/1764401659-692aa1fbda4b9.jpg', NULL, 1, '2025-11-29 02:04:19', '2025-11-29 02:04:19'),
(13, 'uploads/gallery/1764401659-692aa1fbdb537.jpg', NULL, 1, '2025-11-29 02:04:19', '2025-11-29 02:04:19'),
(14, 'uploads/gallery/1764401659-692aa1fbdcad4.jpg', NULL, 1, '2025-11-29 02:04:19', '2025-11-29 02:04:19'),
(15, 'uploads/gallery/1764401659-692aa1fbde6e9.jpg', NULL, 1, '2025-11-29 02:04:19', '2025-11-29 02:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_27_142553_create_banners_table', 2),
(7, '2025_11_27_153445_create_testimonials_table', 3),
(8, '2025_11_29_050848_create_contacts_table', 4),
(9, '2025_11_29_060632_add_enquiry_type_to_contacts_table', 5),
(10, '2025_11_29_065606_create_galleries_table', 6),
(12, '2025_11_29_092013_create_teacher_jobs_table', 7),
(13, '2025_11_29_093210_create_careers_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('mx72ltAIsWS2R81xzRhqoM2KuzSh7D2CZfUVQUCg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRzRxNlVpU0ZHS1BOSGl4TjY2cFVVb2k2aWlPT1pVZnFwVEp1cmtIViI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJlZXI/cGFnZT0xIjtzOjU6InJvdXRlIjtzOjExOiJjYXJlZXIucGFnZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1764573619);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_jobs`
--

CREATE TABLE `teacher_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'Full-Time',
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_jobs`
--

INSERT INTO `teacher_jobs` (`id`, `title`, `department`, `location`, `type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Junior Class Teacher', 'J.K.G', 'Ahmedabad', 'Full-Time', 'This role for junior kinder garden class role', 1, '2025-11-29 03:51:29', '2025-11-29 03:52:17'),
(3, 'Cillum laborum Vita', 'Cupidatat magnam par', 'Magnam neque error f', 'Full-Time', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by', 1, '2025-12-01 01:10:19', '2025-12-01 01:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `background_image`, `title`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '1764262933.jpg', 'This is one person testimonial', '1764262933.jpg', 'This command will execute only the specified migration file, applying its up() method to your database. This is useful when you need to run a single migration without affecting other pending migrations.', 1, '2025-11-27 11:32:13', '2025-11-27 11:32:13'),
(2, '1764262974.jpg', 'this is second person testimonial', '1764262974.jpg', 'Nine out of ten doctors recommend Laracasts over competing brands. Come inside, see for yourself, and massively level up your development skills in the process.', 1, '2025-11-27 11:32:54', '2025-11-27 11:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$70wDbpAyh7Sx3c3Da4P7Z.Z3tQEXOqhlfoTBd1.e5vJ2LnzB8H3Gq', 'admin', NULL, '2025-11-27 01:32:34', '2025-11-27 01:32:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `teacher_jobs`
--
ALTER TABLE `teacher_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teacher_jobs`
--
ALTER TABLE `teacher_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
