-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2026 at 01:54 PM
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
-- Database: `flomart_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id_blog` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id_blog`, `judul`, `gambar`, `kategori`, `penulis`, `tanggal`, `isi`, `created_at`, `updated_at`) VALUES
(1, 'Peningkatan Aktivitas UMKM oleh FLOMART', 'NEWS.jpg', 'UMKM', 'Titania Ang', '2025-12-12', 'FLOMART hadir sebagai platform e-commerce berbasis tanaman yang bertujuan membantu pelaku UMKM di sektor pertanian dan hortikultura untuk berkembang lebih luas di era digital.\n\nMelalui sistem marketplace yang terintegrasi, pelaku usaha lokal kini dapat memasarkan produk tanaman, bibit, pupuk, hingga perlengkapan berkebun kepada konsumen dari berbagai daerah tanpa harus memiliki toko fisik besar.\n\nDigitalisasi yang dilakukan FLOMART membantu UMKM meningkatkan efisiensi penjualan, memperluas jangkauan pasar, dan mempercepat proses transaksi secara online. Fitur seperti pengelolaan katalog produk, pencarian tanaman berdasarkan kategori, hingga sistem pemesanan otomatis menjadi solusi praktis bagi para penjual tanaman lokal.\n\nSelain itu, FLOMART juga mendukung promosi produk UMKM melalui tampilan marketplace yang menarik dan mudah diakses oleh pembeli. Dengan adanya sistem ulasan dan rating, konsumen dapat lebih percaya terhadap kualitas produk yang dijual.\n\nBanyak pelaku usaha tanaman mengaku mengalami peningkatan penjualan sejak bergabung dengan FLOMART. Produk yang sebelumnya hanya dikenal di lingkungan sekitar kini dapat menjangkau pasar yang lebih luas secara efektif dan berkelanjutan.\n\nKe depan, FLOMART berkomitmen untuk terus mendukung pertumbuhan UMKM Indonesia melalui inovasi teknologi digital yang ramah lingkungan dan berfokus pada sektor pertanian modern.', '2026-05-29 22:22:58', '2026-05-29 22:22:58'),
(2, 'Cara Merawat Tanaman Sayur agar Tumbuh Optimal', 'tanah.jpg', 'Perawatan', 'Septian Ang', '2025-12-09', 'Merawat tanaman sayur agar tumbuh optimal membutuhkan perhatian pada beberapa faktor penting seperti penyiraman, pencahayaan, media tanam, dan pemupukan.\n\nPenyiraman sebaiknya dilakukan secara rutin pada pagi atau sore hari agar kelembapan tanah tetap terjaga. Hindari penyiraman berlebihan karena dapat menyebabkan akar tanaman membusuk.\n\nSelain air, tanaman sayur juga membutuhkan sinar matahari yang cukup untuk proses fotosintesis. Sebagian besar tanaman sayur memerlukan paparan sinar matahari minimal 4 hingga 6 jam setiap hari.\n\nPemilihan media tanam yang subur dan kaya nutrisi juga sangat berpengaruh terhadap pertumbuhan tanaman. Campuran tanah, kompos, dan sekam bakar dapat membantu menjaga struktur tanah tetap gembur dan memiliki drainase yang baik.\n\nPemupukan dapat dilakukan menggunakan pupuk organik maupun pupuk cair sesuai kebutuhan tanaman. Pemberian nutrisi secara berkala membantu tanaman tumbuh lebih sehat, menghasilkan daun yang segar, dan meningkatkan kualitas panen.\n\nSelain itu, penting untuk rutin memeriksa tanaman dari serangan hama atau penyakit. Penggunaan pestisida alami dapat menjadi solusi ramah lingkungan untuk menjaga tanaman tetap sehat.\n\nDengan perawatan yang tepat dan konsisten, tanaman sayur dapat tumbuh subur serta menghasilkan panen berkualitas baik untuk kebutuhan rumah tangga maupun usaha pertanian.', '2026-05-29 22:22:58', '2026-05-29 22:22:58'),
(3, 'Urban Farming: Gaya Berkebun di Lahan Terbatas', 'berkebun.jpg', 'Urban Farming', 'Daniel Ang', '2025-12-08', 'Urban farming menjadi salah satu solusi modern bagi masyarakat perkotaan yang memiliki keterbatasan lahan namun tetap ingin bercocok tanam.\n\nKonsep urban farming memungkinkan masyarakat memanfaatkan area kecil seperti halaman rumah, balkon, rooftop, hingga dinding bangunan untuk menanam berbagai jenis tanaman sayur, buah, maupun tanaman hias.\n\nSelain membantu memenuhi kebutuhan pangan rumah tangga, urban farming juga memberikan manfaat lingkungan seperti mengurangi polusi udara, meningkatkan kualitas udara, dan menciptakan suasana rumah yang lebih hijau serta nyaman.\n\nMetode urban farming yang populer saat ini meliputi hidroponik, vertikultur, dan penggunaan pot tanam sederhana. Teknik tersebut memungkinkan tanaman tetap tumbuh optimal meskipun berada di area terbatas.\n\nKegiatan berkebun di perkotaan juga dapat menjadi aktivitas positif yang membantu mengurangi stres dan meningkatkan produktivitas sehari-hari. Banyak masyarakat mulai menjadikan urban farming sebagai hobi sekaligus peluang usaha kecil.\n\nDengan perkembangan teknologi dan akses informasi yang semakin mudah, urban farming diprediksi akan terus berkembang sebagai gaya hidup ramah lingkungan di masa depan.', '2026-05-29 22:22:58', '2026-05-29 22:22:58');

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
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `sender` enum('user','bot') NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `id_user`, `sender`, `message`, `created_at`, `updated_at`) VALUES
(1, 4, 'user', '1', '2026-05-29 22:34:33', '2026-05-29 22:34:33'),
(2, 4, 'bot', '🌱 Untuk informasi produk silakan lihat katalog FLOMART atau tanyakan nama produknya.', '2026-05-29 22:34:33', '2026-05-29 22:34:33'),
(3, 4, 'user', '4', '2026-05-29 22:34:36', '2026-05-29 22:34:36'),
(4, 4, 'bot', '💳 Metode pembayaran tersedia: COD dan Transfer Bank', '2026-05-29 22:34:36', '2026-05-29 22:34:36'),
(5, 4, 'user', '1', '2026-06-03 13:35:50', '2026-06-03 13:35:50'),
(6, 4, 'bot', '🌱 Untuk informasi produk silakan lihat katalog FLOMART atau tanyakan nama produknya.', '2026-06-03 13:35:50', '2026-06-03 13:35:50'),
(7, 4, 'user', '1', '2026-06-06 12:37:14', '2026-06-06 12:37:14'),
(8, 4, 'bot', '🌱 Untuk informasi produk silakan lihat katalog FLOMART atau tanyakan nama produknya.', '2026-06-06 12:37:14', '2026-06-06 12:37:14'),
(9, 3, 'user', '1', '2026-06-08 11:22:49', '2026-06-08 11:22:49'),
(10, 3, 'bot', '🌱 Untuk informasi produk silakan lihat katalog FLOMART atau tanyakan nama produknya.', '2026-06-08 11:22:49', '2026-06-08 11:22:49'),
(11, 3, 'user', '3', '2026-06-08 11:22:51', '2026-06-08 11:22:51'),
(12, 3, 'bot', '🚚 Pesanan akan dikirim setelah pembayaran diverifikasi admin.', '2026-06-08 11:22:51', '2026-06-08 11:22:51'),
(13, 3, 'user', '1', '2026-06-08 11:37:05', '2026-06-08 11:37:05'),
(14, 3, 'bot', '🌱 Untuk informasi produk silakan lihat katalog FLOMART atau tanyakan nama produknya.', '2026-06-08 11:37:05', '2026-06-08 11:37:05'),
(15, 3, 'user', '2', '2026-06-08 11:37:07', '2026-06-08 11:37:07'),
(16, 3, 'bot', '📦 Pesananmu dapat dilihat pada menu Pesanan Saya.', '2026-06-08 11:37:07', '2026-06-08 11:37:07'),
(17, 3, 'user', '4', '2026-06-08 11:37:08', '2026-06-08 11:37:08'),
(18, 3, 'bot', '💳 Metode pembayaran tersedia: COD dan Transfer Bank', '2026-06-08 11:37:08', '2026-06-08 11:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail` bigint(20) UNSIGNED NOT NULL,
  `id_pesanan` bigint(20) UNSIGNED NOT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` decimal(12,2) NOT NULL,
  `subtotal` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detail`, `id_pesanan`, `id_produk`, `qty`, `harga`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 10000.00, 50000.00, '2026-05-29 22:22:58', '2026-05-29 22:22:58'),
(2, 2, 1, 2, 10000.00, 20000.00, '2026-05-29 22:35:34', '2026-05-29 22:35:34'),
(3, 3, 2, 2, 18000.00, 36000.00, '2026-05-29 22:39:04', '2026-05-29 22:39:04'),
(4, 3, 3, 3, 15000.00, 45000.00, '2026-05-29 22:39:04', '2026-05-29 22:39:04'),
(5, 4, 2, 4, 18000.00, 72000.00, '2026-05-29 22:45:37', '2026-05-29 22:45:37'),
(6, 4, 1, 1, 10000.00, 10000.00, '2026-05-29 22:45:37', '2026-05-29 22:45:37'),
(7, 5, 2, 3, 18000.00, 54000.00, '2026-05-29 23:11:26', '2026-05-29 23:11:26'),
(8, 6, 1, 4, 10000.00, 40000.00, '2026-05-29 23:11:47', '2026-05-29 23:11:47'),
(9, 7, 3, 3, 15000.00, 45000.00, '2026-05-31 21:17:11', '2026-05-31 21:17:11'),
(10, 8, 3, 2, 15000.00, 30000.00, '2026-05-31 21:26:10', '2026-05-31 21:26:10'),
(11, 9, 4, 4, 40000.00, 160000.00, '2026-05-31 23:47:41', '2026-05-31 23:47:41'),
(12, 10, 4, 2, 40000.00, 80000.00, '2026-06-01 00:14:27', '2026-06-01 00:14:27'),
(13, 10, 1, 2, 10000.00, 20000.00, '2026-06-01 00:14:27', '2026-06-01 00:14:27'),
(14, 11, 15, 3, 27000.00, 81000.00, '2026-06-03 13:31:42', '2026-06-03 13:31:42'),
(15, 11, 14, 4, 21000.00, 84000.00, '2026-06-03 13:31:42', '2026-06-03 13:31:42'),
(16, 11, 13, 2, 56000.00, 112000.00, '2026-06-03 13:31:42', '2026-06-03 13:31:42'),
(17, 12, 15, 1, 27000.00, 27000.00, '2026-06-08 11:21:31', '2026-06-08 11:21:31'),
(18, 13, 13, 1, 56000.00, 56000.00, '2026-06-08 11:21:53', '2026-06-08 11:21:53'),
(19, 14, 15, 1, 27000.00, 27000.00, '2026-06-08 11:36:14', '2026-06-08 11:36:14'),
(20, 14, 14, 1, 21000.00, 21000.00, '2026-06-08 11:36:14', '2026-06-08 11:36:14');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Benih Sayur', '2026-05-29 22:22:58', '2026-05-31 21:27:56'),
(2, 'Benih Buah', '2026-05-29 22:22:58', '2026-05-29 22:22:58'),
(3, 'Benih Bunga', '2026-05-29 22:22:58', '2026-05-29 22:22:58'),
(4, 'Benih Herbal', '2026-05-29 22:22:58', '2026-05-29 22:22:58'),
(5, 'Benih Pangan', '2026-05-29 22:22:58', '2026-05-29 22:22:58'),
(6, 'Kompos', '2026-06-08 11:23:53', '2026-06-08 11:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_user`, `id_produk`, `qty`, `created_at`, `updated_at`) VALUES
(11, 4, 15, 1, '2026-06-06 12:35:27', '2026-06-06 12:35:27'),
(12, 4, 14, 1, '2026-06-06 12:35:32', '2026-06-06 12:35:32'),
(13, 4, 12, 1, '2026-06-06 12:35:37', '2026-06-06 12:35:37');

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
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2026_05_22_074411_create_users_table', 1),
(4, '2026_05_22_074455_create_kategori_table', 1),
(5, '2026_05_22_074501_create_produk_table', 1),
(6, '2026_05_22_074525_create_pesanan_table', 1),
(7, '2026_05_22_074531_create_detail_pesanan_table', 1),
(8, '2026_05_22_083409_create_sessions_table', 1),
(9, '2026_05_28_045136_create_keranjang_table', 1),
(10, '2026_05_28_073055_update_status_pesanan_enum', 1),
(11, '2026_05_28_085523_add_ongkir_to_pesanan_table', 1),
(12, '2026_05_29_124035_create_chat_messages_table', 1),
(13, '2026_05_30_045329_create_blogs_table', 1),
(14, '2026_05_22_074511_create_keranjang_table', 2),
(15, '2026_05_30_060400_add_remember_token_to_users_table', 2),
(16, '2026_05_30_060958_rename_jumlah_to_qty_in_keranjang_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pesanan` datetime NOT NULL,
  `total_harga` decimal(12,2) NOT NULL,
  `status_pesanan` enum('pending','menunggu','diproses','selesai','dibatalkan') NOT NULL,
  `alamat_kirim` text NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `catatan` text DEFAULT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ongkir` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `tanggal_pesanan`, `total_harga`, `status_pesanan`, `alamat_kirim`, `metode_pembayaran`, `catatan`, `bukti_pembayaran`, `nama_penerima`, `no_hp`, `created_at`, `updated_at`, `ongkir`) VALUES
(1, 3, '2026-05-30 05:22:58', 55000.00, 'selesai', 'Jl. Mawar No. 20', 'COD', 'Tolong dibungkus rapi', NULL, 'Pembeli Satu', '081200000003', '2026-05-29 22:22:58', '2026-05-31 23:31:38', 0),
(2, 4, '2026-05-30 05:35:34', 35000.00, 'selesai', 'Jl. Kenangan, No 8', 'COD', 'Secepatnya dikirim ya', NULL, 'Titania Kaylife Putri', '0882878689686', '2026-05-29 22:35:34', '2026-05-31 23:31:47', 15000),
(3, 4, '2026-05-30 05:39:04', 91000.00, 'dibatalkan', 'Jl. Kenangan, No 8', 'Transfer', 'Tolong segera dikirim', NULL, 'Titania Kaylife Putri', '0882878689686', '2026-05-29 22:39:04', '2026-05-29 22:39:21', 10000),
(4, 4, '2026-05-30 05:45:37', 94000.00, 'menunggu', 'Jl. Kenangan, No 8', 'Transfer', 'Cepat dikirim', '1780119947.png', 'Titania Kaylife Putri', '0882878689686', '2026-05-29 22:45:37', '2026-05-29 22:45:47', 12000),
(5, 4, '2026-05-30 06:11:26', 66000.00, 'dibatalkan', 'Jl. Kenangan, No 8', 'Transfer', 'Kirim hari ini', NULL, 'Titania Kaylife Putri', '0882878689686', '2026-05-29 23:11:26', '2026-05-29 23:12:08', 12000),
(6, 4, '2026-05-30 06:11:47', 55000.00, 'menunggu', 'Jl. Kenangan, No 8', 'Transfer', 'Langsung kirim', '1780121517.png', 'Titania Kaylife Putri', '0882878689686', '2026-05-29 23:11:47', '2026-05-29 23:11:57', 15000),
(7, 4, '2026-06-01 04:17:11', 60000.00, 'diproses', 'Jl. Kenangan, No 8', 'Transfer', 'Hari ini dikirim', '1780287877.png', 'Titania Kaylife Putri', '0882878689686', '2026-05-31 21:17:11', '2026-06-01 00:16:21', 15000),
(8, 4, '2026-06-01 04:26:10', 40000.00, 'dibatalkan', 'Jl. Kenangan, No 8', 'Transfer', 'Hari ini dikirim', NULL, 'Titania Kaylife Putri', '0882878689686', '2026-05-31 21:26:10', '2026-05-31 21:26:27', 10000),
(9, 4, '2026-06-01 06:47:41', 175000.00, 'pending', 'Jl. Kenangan, No 8', 'Transfer', 'Hari ini dikirim', NULL, 'Titania Kaylife Putri', '0882878689686', '2026-05-31 23:47:41', '2026-05-31 23:47:41', 15000),
(10, 4, '2026-06-01 07:14:27', 115000.00, 'selesai', 'Jl. Kenangan, No 8', 'COD', 'Secepatnya dikirim', NULL, 'Titania Kaylife Putri', '0882878689686', '2026-06-01 00:14:27', '2026-06-01 00:14:59', 15000),
(11, 4, '2026-06-03 20:31:42', 292000.00, 'diproses', 'Jl. Kenangan, No 8', 'Transfer', 'Dikirim hari ini ya', '1780493525.jpg', 'Titania Kaylife Putri', '0882878689686', '2026-06-03 13:31:42', '2026-06-03 13:42:19', 15000),
(12, 3, '2026-06-08 18:21:31', 37000.00, 'diproses', 'Jl. Mawar No. 10', 'COD', 'Hari ini', NULL, 'Pembeli Satu', '081200000003', '2026-06-08 11:21:31', '2026-06-08 11:21:31', 10000),
(13, 3, '2026-06-08 18:21:53', 71000.00, 'selesai', 'Jl. Mawar No. 10', 'Transfer', 'Dikirim hari ini', '1780917728.jpeg', 'Pembeli Satu', '081200000003', '2026-06-08 11:21:53', '2026-06-08 11:26:22', 15000),
(14, 3, '2026-06-08 18:36:14', 58000.00, 'diproses', 'Jl. Mawar No. 10', 'COD', 'Hari ini', NULL, 'Pembeli Satu', '081200000003', '2026-06-08 11:36:14', '2026-06-08 11:36:14', 10000),
(15, 3, '2026-06-08 18:36:31', 18000.00, 'selesai', 'Jl. Mawar No. 10', 'Transfer', 'Hari ini', '1780918605.jpeg', 'Pembeli Satu', '081200000003', '2026-06-08 11:36:31', '2026-06-08 11:39:34', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` decimal(12,2) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga`, `stok`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 1, 'Benih Kubis', 10000.00, 41, 'Benih kubis berkualitas', 'produk/1EnoZ0GGjCbrwWDadhfzj55b4VKR9ELCc4qqA41y.jpg', '2026-05-29 22:22:58', '2026-06-03 12:13:21'),
(2, 2, 'Benih Kelengkeng', 18000.00, 13, 'Benih kelengkeng unggul', 'produk/QxiZNgNW4qwmW0JsLEjMWHMqWE7s14EpRJn8vyVA.png', '2026-05-29 22:22:58', '2026-06-03 12:18:23'),
(3, 3, 'Benih Mawar', 15000.00, 22, 'Benih mawar cantik', 'produk/3PepJhL8OGTymgGP831TvkFQkSHCLyWxfVdT93aK.png', '2026-05-29 22:22:58', '2026-06-03 12:15:38'),
(4, 2, 'Benih Stroberi', 40000.00, 13, 'Benih dengan kualitas tinggi', 'produk/ueqxlhM6cQOH15vHbjwPmqXhLlqzFUb70bkQHCfM.png', '2026-05-31 21:32:19', '2026-06-03 12:17:00'),
(5, 1, 'Benih Sawi Hijau', 15000.00, 44, 'Benih sawi dengan kualitas yang tinggi', 'produk/5xxmxThoXrRHf2f5qUjJaictb8AOn9kmdZkJQUWo.png', '2026-06-03 12:19:19', '2026-06-03 12:19:19'),
(6, 4, 'Benih Binahong', 50000.00, 100, 'Benih tanaman binahong berkualitas unggul yang mudah ditanam dan memiliki daya tumbuh yang baik. Binahong dikenal sebagai tanaman herbal yang kaya manfaat dan sering dimanfaatkan sebagai bahan pengobatan tradisional. Cocok ditanam di pekarangan rumah, kebun, maupun dalam pot. Dengan perawatan yang mudah, tanaman ini dapat tumbuh merambat dengan cepat dan menghasilkan daun yang segar serta bermanfaat untuk kebutuhan sehari-hari.', 'produk/ew172HlTgF7SpYb9Z50mpXE6OrO5mo5tEUakejcr.png', '2026-06-03 12:42:09', '2026-06-03 12:42:09'),
(7, 4, 'Benih Kemangi', 17000.00, 55, 'Benih tanaman kemangi berkualitas unggul yang mudah dibudidayakan dan memiliki tingkat pertumbuhan yang baik. Kemangi dikenal sebagai tanaman herbal dan sayuran yang memiliki aroma khas serta sering digunakan sebagai pelengkap berbagai hidangan. Cocok ditanam di pekarangan rumah, kebun, maupun dalam pot. Dengan perawatan yang sederhana, tanaman kemangi dapat tumbuh subur dan menghasilkan daun segar yang siap dipanen untuk kebutuhan sehari-hari.', 'produk/8ghiRe9UkNLOlH7uvDM4xsRaElOMc7tKTs77my1A.png', '2026-06-03 12:44:26', '2026-06-03 12:44:26'),
(8, 4, 'Benih Ketumbar', 14500.00, 38, 'Benih tanaman ketumbar berkualitas unggul dengan daya tumbuh yang baik dan mudah dibudidayakan. Ketumbar merupakan tanaman herbal dan rempah yang banyak digunakan sebagai bumbu masakan karena aroma dan cita rasanya yang khas. Cocok ditanam di pekarangan rumah, kebun, maupun dalam pot. Dengan perawatan yang mudah, tanaman ini dapat menghasilkan daun segar dan biji ketumbar yang bermanfaat untuk berbagai kebutuhan kuliner.', 'produk/AZptEsV4GHn8GcKZvwh87JuKWK4ooxxJy5CRNF30.png', '2026-06-03 12:46:03', '2026-06-03 12:46:03'),
(9, 3, 'Benih Anggrek', 23000.00, 45, 'Benih bunga anggrek berkualitas unggul yang cocok untuk Anda yang ingin membudidayakan tanaman hias bernilai tinggi. Anggrek dikenal sebagai salah satu bunga eksotis dengan bentuk yang indah, warna yang beragam, dan daya tarik yang elegan. Cocok ditanam di pekarangan, taman, maupun area indoor dengan perawatan yang tepat. Dengan benih berkualitas, tanaman anggrek dapat tumbuh sehat dan menghasilkan bunga yang cantik serta memikat.', 'produk/QsRL43afCDTzhjMXHqrHPGz5X9tdvjZAlblDEbRX.png', '2026-06-03 12:47:42', '2026-06-03 12:47:42'),
(10, 3, 'Benih Sepatu', 24000.00, 74, 'Benih bunga sepatu berkualitas unggul yang menghasilkan tanaman hias dengan bunga berukuran besar dan warna yang menarik. Bunga sepatu dikenal sebagai tanaman hias yang mudah dirawat, tahan terhadap berbagai kondisi cuaca, serta cocok ditanam di pekarangan rumah, taman, maupun sebagai tanaman pagar. Dengan perawatan yang tepat, tanaman ini dapat tumbuh subur dan menghasilkan bunga yang indah sepanjang musim.', 'produk/lgNJcdrx4LVYCQXdA9Nt9eqOfizfJC2jK6FF8nsW.png', '2026-06-03 12:49:00', '2026-06-03 12:54:50'),
(11, 1, 'Benih Wortel', 17000.00, 68, 'Benih sayur wortel berkualitas unggul dengan tingkat pertumbuhan yang baik dan mudah dibudidayakan. Wortel merupakan sayuran akar yang kaya akan vitamin, terutama vitamin A, serta memiliki rasa manis dan tekstur yang renyah. Cocok ditanam di lahan pekarangan, kebun, maupun media tanam yang sesuai. Dengan perawatan yang tepat, tanaman wortel dapat menghasilkan umbi berkualitas yang segar dan siap dikonsumsi.', 'produk/ddBg7hmaV4veBeJbQoL7BxFVbN16wUhMWuUDV0Z9.jpg', '2026-06-03 12:52:34', '2026-06-03 12:52:34'),
(12, 5, 'Benih Jagung', 31000.00, 65, 'Benih jagung berkualitas unggul yang memiliki tingkat pertumbuhan baik dan mudah dibudidayakan. Jagung merupakan salah satu komoditas pertanian penting yang banyak dimanfaatkan sebagai bahan pangan maupun pakan ternak. Dengan perawatan yang tepat, tanaman jagung dapat tumbuh subur dan menghasilkan tongkol yang berkualitas serta siap dipanen.', 'produk/S3aStAfCiNgnaznJZsrcwncbIs26ukWVG5Mo0UbI.jpg', '2026-06-03 13:01:03', '2026-06-03 13:01:03'),
(13, 5, 'Benih Padi', 56000.00, 73, 'Benih padi berkualitas unggul dengan potensi pertumbuhan yang optimal dan hasil panen yang baik. Padi merupakan tanaman pangan utama yang menjadi sumber karbohidrat bagi masyarakat Indonesia. Benih ini cocok dibudidayakan di lahan persawahan dengan perawatan yang tepat untuk menghasilkan tanaman yang sehat, produktif, dan siap panen dalam waktu yang sesuai.', 'produk/ACnB9ZZRD10DKxQbv5t8uHOHU9t6HsXgeJzf0GVN.jpg', '2026-06-03 13:02:21', '2026-06-08 11:21:53'),
(14, 5, 'Benih Kacang Hijau', 21000.00, 49, 'Benih kacang hijau berkualitas unggul dengan tingkat pertumbuhan yang baik dan mudah dibudidayakan. Kacang hijau merupakan tanaman pangan yang kaya nutrisi dan banyak dimanfaatkan sebagai bahan makanan maupun minuman. Cocok ditanam di berbagai jenis lahan dengan perawatan yang relatif mudah. Dengan budidaya yang tepat, tanaman ini dapat menghasilkan polong yang berkualitas dan siap dipanen.', 'produk/Xv2H5RNUiYUWTUUlNrDkCnyxK3foAIhotvYjNHsY.jpg', '2026-06-03 13:03:34', '2026-06-08 11:36:14'),
(15, 2, 'Benih Alpukat', 27000.00, 60, 'Benih buah alpukat berkualitas unggul dengan potensi pertumbuhan yang baik dan mudah dibudidayakan. Alpukat merupakan salah satu buah yang kaya akan nutrisi, memiliki tekstur lembut, dan banyak digemari untuk dikonsumsi langsung maupun diolah menjadi berbagai hidangan. Cocok ditanam di pekarangan rumah, kebun, maupun lahan budidaya. Dengan perawatan yang tepat, tanaman alpukat dapat tumbuh kuat dan berpotensi menghasilkan buah yang segar serta berkualitas.', 'produk/LvEVsXd3Qj4oVPKgj1rdsp4ZiZWneBwashotlDgM.jpg', '2026-06-03 13:05:47', '2026-06-08 11:36:14');

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
('ekpcCqk12NG4kjQZEsukf4erCZQPYOzBMoXOjSmt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiclg4azVHRkEzeU5GYTRhZDFNOUhrcG9nSzFvYk9KTzFqZ0dmemJZNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9fQ==', 1780919643);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','owner','pembeli') NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `password`, `role`, `alamat`, `no_hp`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Admin FLOMART', 'admin@flomart.com', '$2y$12$chPMfeszSCYlXsigxGAgv.kK/eRPFtGI6pxYHLUyUVppZG3JE5KiG', 'admin', 'Kantor FLOMART', '081200000001', '2026-05-29 22:22:57', '2026-05-29 22:22:57', 'uQCaPr0IQuaZVJ8cLJ0nnm0Sol9MA97XRsrVs3otFYQCcR1juWFPTzdGTm1k'),
(2, 'Owner FLOMART', 'owner@flomart.com', '$2y$12$QeZJ6hJmnqZCNmC1fwonqeaJJbxZ5UOCC9QkHLn4Vwi6PG62ZNzJG', 'owner', 'Kantor FLOMART', '081200000002', '2026-05-29 22:22:58', '2026-05-29 22:22:58', '5qupUvKVzvHi1mHuKLouykLv2DzGzqN08U2GfrluQPUEBYZ1NQIy5btcJFMz'),
(3, 'Pembeli Satu', 'pembeli@flomart.com', '$2y$12$5BQUqCQ93xP2k42uS3vsk.xWb8CPaCLxhNIaKXYlVy5uPqXRQrLyS', 'pembeli', 'Jl. Mawar No. 10', '081200000003', '2026-05-29 22:22:58', '2026-05-29 22:22:58', '8nyqLgry0WuSQ6SwSgwbUxU4ntn5NgLYuOzvefj0gz31g6gaeMoZBgS3z2VS'),
(4, 'Titania Kaylife Putri', 'titania@flomart.com', '$2y$12$EJJN3JvQeB1cD/Qo0XJWEeqxOh6at1Y4W6m5zK0i9Mr/TIhSd7tJi', 'pembeli', 'Jl. Kenangan, No 8', '0882878689686', '2026-05-29 22:33:48', '2026-05-29 22:33:48', 'FR5RFbrIleql84E4EwVkOFSDdDiuAsxU7Beg4uB4Gko2u06Y7g1cGIPKJIze'),
(5, 'Daniel', 'daniel@flomart.com', '$2y$12$YUL5kjZMajqI5ByW3BKOUeM3z3dYkXbC0HMz3nJ24AJD4c7T1gsFK', 'pembeli', 'Rungkut Indah No. 7', '08146758786', '2026-06-03 13:11:04', '2026-06-03 13:11:04', 'f5zuse6n8vLOgJAnmlqbTCPBxg1eGA4X1GyurCGNK3bmlbZGabMj0nYIljZu'),
(6, 'Septian Listia Tri Cahyo', 'septian@flomart.com', '$2y$12$rzKkXWAWgN2VIjIDRFIffeaIJl2Yozc/2HBIZy/grYhxOrG4AWqku', 'pembeli', 'Jl. Samudra Asri Blok C', '083567456787', '2026-06-03 13:11:55', '2026-06-03 13:11:55', 'e76okDfq6gKnJwU9W48VzBQSJ0ZkVxlnoKk4QcnANtAnRgzcEcWWDiUj0xnb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_messages_id_user_foreign` (`id_user`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `detail_pesanan_id_pesanan_foreign` (`id_pesanan`),
  ADD KEY `detail_pesanan_id_produk_foreign` (`id_produk`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `keranjang_id_user_foreign` (`id_user`),
  ADD KEY `keranjang_id_produk_foreign` (`id_produk`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `pesanan_id_user_foreign` (`id_user`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `produk_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id_blog` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD CONSTRAINT `chat_messages_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_id_pesanan_foreign` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_pesanan_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE;

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE,
  ADD CONSTRAINT `keranjang_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
