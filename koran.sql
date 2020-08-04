-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2020 at 02:49 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_26413886_koran`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NamaKategori` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `NamaKategori`, `created_at`, `updated_at`) VALUES
(1, 'Islami', '2020-07-31 10:44:23', '2020-07-31 10:44:23'),
(2, 'Religi', '2020-07-31 10:44:23', '2020-07-31 10:44:23'),
(3, 'Pemerintah', '2020-07-31 10:44:23', '2020-07-31 10:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NamaMedia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `NamaMedia`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Kompas TV', 'images/logomedia/kompas-tv.png', '2020-07-31 10:44:21', '2020-07-31 11:45:51'),
(2, 'metro TV', 'images/logomedia/metro-tv.png', '2020-07-31 10:44:21', '2020-07-31 11:46:14'),
(3, 'SindoTV', 'images/logomedia/sindotv.png', '2020-07-31 10:44:21', '2020-07-31 11:46:32'),
(4, 'transTV', 'images/logomedia/transtv.jpeg', '2020-07-31 10:44:22', '2020-07-31 11:46:56'),
(5, 'TribunNews', 'images/logomedia/tribunnews.jpeg', '2020-07-31 10:44:22', '2020-07-31 11:47:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(138, '2020_07_27_160410_create_administrators_table', 1),
(179, '2014_10_12_000000_create_users_table', 2),
(180, '2014_10_12_100000_create_password_resets_table', 2),
(181, '2019_08_19_000000_create_failed_jobs_table', 2),
(182, '2020_07_23_184046_create_news_table', 2),
(183, '2020_07_24_000012_create_categories_table', 2),
(184, '2020_07_24_131346_create_tags_table', 2),
(185, '2020_07_24_131616_create_news_tag_table', 2),
(186, '2020_07_27_012203_create_media_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `media_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `file-type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `editor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `viewer` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category_id`, `media_id`, `title`, `content`, `file-type`, `file`, `editor`, `viewer`, `created_at`, `updated_at`) VALUES
(1, 3, 5, 'In autem quo aut in.', 'Corporis dicta qui aspernatur vitae. Nemo rerum provident magni rerum non. Sit ipsam aut neque in ratione officiis corrupti facere. Atque at ut aliquid. Eum quaerat voluptates in sapiente quae nostrum. Voluptatibus qui minus aut mollitia. Eligendi distinctio ea quia et iusto id. Impedit qui accusamus soluta doloribus officiis. Velit non velit expedita mollitia consequatur earum cupiditate. Non est quaerat hic doloremque earum perferendis. Aut qui accusamus odio ea consequatur. Delectus ut a et nesciunt. Est magnam voluptatem enim. Repellat ut explicabo iusto voluptatem autem consequatur asperiores. Eligendi perspiciatis sed ut voluptatem aut. Ipsa harum dolor blanditiis ratione et dolorem dolorem. Quia ab assumenda sed quia. Ratione repudiandae iure qui omnis. Sed placeat velit voluptates non tenetur omnis ut. Corrupti ex aperiam labore quaerat. Recusandae autem rem fugiat est aliquam. Aliquid ea aperiam quo. Molestiae rem culpa voluptatibus commodi sunt aut quia est. Ea ipsa nihil ea ullam voluptas. Deleniti officia tempore rem in. Dolores atque omnis ex. Repudiandae odio enim vitae eum eligendi qui quis. Debitis dignissimos impedit commodi molestiae eveniet ut illum. Quaerat natus cupiditate id fuga illo velit. Quas culpa culpa nam ut ut doloremque. Aut sit expedita eum qui dolore.', 'video', 'zdUy_pEA3FY', 'Mrs. Novella McGlynn', 73, '2020-07-31 10:44:20', '2020-08-01 12:14:04'),
(2, 3, 2, 'Ut recusandae repudiandae quos.', 'Facilis quia officiis laboriosam. Non possimus aperiam eum porro. Et nisi numquam odio qui. Quos necessitatibus voluptate deserunt porro sed odio et. A enim ut repudiandae omnis consequatur. Eos quia et fugit nemo. Maxime voluptatibus dolor et officiis accusamus odit. Repellendus natus alias iure. Accusamus placeat voluptatem velit corporis consequatur. Laborum error quia similique. Adipisci quo et autem excepturi qui amet. Incidunt voluptatibus possimus sit quia ea. Architecto exercitationem id odit consequatur repudiandae. Possimus possimus magni corporis et quia ratione. Nostrum velit autem voluptate aut itaque totam omnis. Quia voluptas omnis sequi sit. Assumenda omnis est exercitationem. Ut illo consequatur ea incidunt. Ullam quia a ipsam aliquid necessitatibus officiis inventore. Et consequatur deserunt omnis velit quia necessitatibus ducimus sit. Perspiciatis doloribus eius corrupti dicta aut voluptatibus nesciunt. Et quo non aut nostrum aliquam ipsum quo.', 'gambar', 'images/news/default.jpg', 'Brisa Klocko DDS', 27, '2020-07-31 10:44:20', '2020-08-01 12:15:33'),
(3, 3, 5, 'Voluptatem aut voluptatem et.', 'Inventore molestias exercitationem et sed sunt consequuntur vel. Quia iure quaerat numquam esse beatae. Qui assumenda velit consequatur qui. Sed quisquam sit in pariatur. Facere saepe voluptates sint animi sit unde ex. Voluptatibus provident molestiae consequatur atque quis. Repellat pariatur suscipit distinctio. Ducimus omnis perspiciatis aut qui. Illo ratione aut rerum deleniti non modi. Quod est totam temporibus quidem magni. In neque ullam nostrum sunt ea eligendi at quam. Asperiores expedita sunt quia magnam. Consectetur quidem rem nihil non. Voluptate voluptatem quisquam quia. Omnis quam quibusdam ea qui perspiciatis accusamus est. Dolore sapiente mollitia alias atque aut ut. Et veritatis impedit facilis deleniti hic voluptatem quod. Maxime atque quo omnis. Hic perferendis eius eos autem. Nostrum at repellat aperiam rem qui. Cumque recusandae magnam maxime qui voluptas. Dolores aliquid consectetur magni eaque similique ut. Vel hic autem magnam a. In dolor nemo commodi. Est harum minus quae omnis expedita earum. Illo quia nisi deserunt dolor quidem error aliquam nobis. Esse ad ratione voluptatum repudiandae a explicabo aut. Tempore voluptas ut doloremque molestiae. Eligendi architecto corrupti fugit tempore. Dolor sunt eius eos vel. Aliquam ea quia maiores suscipit. Recusandae dicta quia minus aut molestiae sint exercitationem. Velit consectetur iure eius magni sed incidunt consequatur. Soluta ut quis hic quaerat ex. Possimus velit aspernatur non quod deserunt alias beatae.', 'video', 'zdUy_pEA3FY', 'Glennie Lemke', 85, '2020-07-31 10:44:20', '2020-07-31 10:44:20'),
(4, 2, 1, 'Ut repellendus ratione voluptas eius.', 'Dolores voluptas a placeat est qui consequatur est ducimus. Aut eos assumenda dolores voluptatem. Et ipsa et rerum. Culpa corporis ut nihil ea aut rem sed. Magni fugit voluptatem repudiandae dolorem incidunt hic commodi. Voluptatibus ut amet quod officiis corporis delectus exercitationem. Ut aliquam sed numquam sed corporis et consequuntur. Qui ducimus sint in sunt iure. Incidunt molestias adipisci quasi. At impedit quaerat et rerum sit debitis velit ut. Sunt qui quia quae qui tempore eos sequi. Est omnis recusandae quisquam ad illum doloremque. Qui doloremque eligendi voluptates aut voluptatem placeat est. A repudiandae ipsam nesciunt unde molestiae. Voluptatum aut nam labore. Sequi eos voluptatem atque voluptatem est. Et iure nisi nam minus qui atque praesentium. Est sit doloribus nulla beatae eum iusto. Ullam rerum voluptatum sint assumenda. Labore porro aut adipisci inventore incidunt. Harum id veniam voluptates libero. Sit maiores enim consequatur sit qui odio magni. Nam eum fugit totam sequi nesciunt rerum voluptas. Distinctio quia ipsum earum molestiae voluptates occaecati necessitatibus. Amet quos facere possimus labore laboriosam est molestiae omnis. Voluptatum ut asperiores ut. Vel eaque tenetur ipsum quisquam qui. Totam fugit non magnam repellendus iste commodi. Molestias est necessitatibus esse. Placeat impedit maxime perspiciatis ducimus vel maiores. Minima aliquam nesciunt qui aut eius. Eos dolores tempore officia dolores nesciunt nisi. Itaque reprehenderit nisi quia non. Dicta exercitationem perferendis qui velit omnis.', 'video', 'zdUy_pEA3FY', 'Margaret Stoltenberg', 71, '2020-07-31 10:44:20', '2020-07-31 10:44:20'),
(5, 3, 3, 'Eius reprehenderit aut.', 'Qui quia commodi accusamus et. Ut porro assumenda veniam eum quia aut totam totam. Possimus vel quidem aut quo reiciendis. Assumenda saepe ipsum ea et velit. Consequatur eius totam aut et est et. Odit mollitia quas quae perferendis. Facilis praesentium natus dicta enim dolore animi qui. Non recusandae ut quam. Ab aliquam rerum debitis sit quas quia. Dolorem qui illo eligendi voluptatem laudantium. Est nam aut quo facilis et molestias consectetur dolor. Et repellendus et laborum exercitationem distinctio officiis vel sit. Aspernatur aliquid odit dolor non. Expedita perferendis repellat aut voluptas doloremque accusantium optio. Aliquid assumenda voluptatem est fugit consequatur. Exercitationem cumque officia est sit et reiciendis ratione. Dolorem voluptatem dignissimos corrupti totam cum modi. Qui ullam ipsum voluptatem non. Consectetur autem vitae rerum nisi. Iusto neque vel maxime et. Amet ex sequi totam consequuntur sed. Ducimus vitae unde adipisci doloremque inventore suscipit dolorem sit. Et aut sapiente excepturi aspernatur illum aut. Autem et officia quam ea modi. Nemo reprehenderit id dicta. Tenetur nulla velit possimus quis consequatur aspernatur saepe sint. Dignissimos esse dolorum aut voluptatum provident itaque.', 'video', 'zdUy_pEA3FY', 'Kyle Baumbach', 89, '2020-07-31 10:44:21', '2020-08-01 12:36:01'),
(6, 2, 1, 'Est sed consequatur.', 'Ut voluptatem quis voluptatibus et voluptatem voluptatem. Optio et voluptatem sed sint iste. Quia quia nemo quo pariatur soluta voluptatem distinctio. Reiciendis rerum vitae voluptas facilis. Asperiores mollitia deleniti minima magni dolores. Sit eum aut esse eius. Ea nobis unde animi voluptas repellat praesentium nostrum labore. Quis ut placeat maiores. Quia eos fuga sint dolor modi corporis. Similique ipsa explicabo accusamus doloribus eveniet est quasi. Accusamus autem dolores odit facere est eos laborum sit. Explicabo sunt ipsam fuga molestias fugiat sed. Reprehenderit saepe repudiandae ut explicabo et dolore. Ab non earum suscipit earum et provident. Facere quia dignissimos temporibus est iste delectus. Sequi quia qui sunt. Enim qui sunt quisquam doloribus dolore. Rerum tenetur ipsam quidem eum sapiente. Laboriosam cumque est voluptatem eos sit. Iure quia molestiae reprehenderit. Aut voluptatem ea qui molestiae. Laborum alias maiores tempora consequatur aut veritatis rerum. Reiciendis et voluptatem veniam ut pariatur illo nihil quaerat. Fuga quos qui aliquam dolorum omnis pariatur nulla. Assumenda et veniam et temporibus aliquam. Voluptatum qui hic enim aliquid aspernatur. Nostrum doloremque est et quidem. Veritatis ea aut commodi aliquid dolores quisquam. Vel velit ab molestiae vero nemo cumque eum.', 'video', 'zdUy_pEA3FY', 'Dr. Marian Davis', 17, '2020-07-31 10:44:21', '2020-07-31 10:44:21'),
(7, 2, 4, 'Incidunt eos.', 'Voluptatem vel autem praesentium necessitatibus fugit. Impedit animi molestias inventore earum. Qui corrupti qui repudiandae sit id provident et. Ut iure aut impedit sed distinctio. Asperiores error nesciunt nam facilis esse qui dolorem. Nisi dignissimos in ipsa eos magni dolores quia occaecati. Est sint velit quibusdam rem beatae. Omnis debitis laudantium distinctio libero in debitis repudiandae qui. Tenetur impedit officiis harum animi nulla minus nobis. Ut assumenda praesentium in quas voluptas sapiente enim. Expedita molestiae adipisci quis iste explicabo. Magni rerum nam quia nisi animi non. Nam nostrum dolorem voluptatem. Eveniet dolorem ut harum quia laboriosam. Mollitia reprehenderit et minima consectetur illum. Nam facere sit sed enim numquam. Fugit veniam ut dolorem ut qui molestiae. Placeat quisquam sunt veritatis ullam suscipit. Voluptatem rerum iste et et. Architecto sit sapiente aut. Dicta officiis modi est dignissimos amet. Reiciendis qui qui ipsum natus aut. Minus est et inventore in. Recusandae illo rerum aut optio. Iusto vel sit quasi possimus eius. Expedita voluptas voluptatibus doloribus ut necessitatibus. Doloribus dolores saepe quibusdam. Maiores saepe eligendi dolorem accusamus eius itaque quis. Sapiente quae et suscipit enim deserunt rerum sed. Voluptatem blanditiis provident vitae eaque totam dolor quae. Et sed fuga sint atque ut aut eveniet. Atque quia exercitationem eos perspiciatis tempora. Sint officia qui ab ab ut totam. Consectetur occaecati voluptatum dolorem eveniet harum ex pariatur. Quos enim quas qui ut rerum. Voluptatibus voluptas iure consequatur molestias fugit temporibus.', 'gambar', 'images/news/default.jpg', 'Lucile Smith', 35, '2020-07-31 10:44:21', '2020-08-01 12:17:05'),
(8, 2, 2, 'Est atque dolorem.', 'Sed molestiae beatae libero vel qui ut vel. Quisquam reiciendis odit quidem. Ut ipsum natus ad culpa neque dolore. Esse eaque sunt eos. Tempora incidunt ex ad sint. Nemo aut porro modi sed dolor. Molestiae rerum recusandae sunt repudiandae. Ut enim perferendis sit ab ex tenetur. Est et ut necessitatibus quisquam et debitis eos. Sed voluptatem voluptatem fugit ut. Ut debitis quia repellat vel. Adipisci minima qui saepe sequi facere. Assumenda autem vitae qui nulla. Repellendus sequi repellat sunt sit modi velit. Suscipit ullam ipsum ad quod. Est corporis eum omnis cum laboriosam maxime est. Est nihil autem repellendus commodi. Molestias magnam cumque veritatis et dolorem deserunt. Rem consequatur ea quia unde velit architecto iure. Suscipit eos voluptatum repudiandae.', 'video', 'zdUy_pEA3FY', 'Alfredo Volkman', 77, '2020-07-31 10:44:21', '2020-07-31 10:44:21'),
(9, 3, 5, 'Molestiae sit nostrum aut.', 'Cupiditate dolorem sed rerum quibusdam quaerat doloribus aspernatur exercitationem. Non hic aperiam quos quaerat et a. Eius expedita quas ipsum suscipit quisquam quo est. Harum nisi est doloremque asperiores id quod necessitatibus. Excepturi ullam neque maiores iusto nam. Consequatur assumenda id sit. Rerum suscipit sed illum enim enim qui omnis et. Deserunt ab quia sint. Illum minus ut voluptas esse praesentium quia. Repellendus aut qui sint illum et impedit est quas. Quas eos odio reiciendis. Consequatur provident possimus sit exercitationem dolorum et. Laudantium a at et nobis dolores. Tenetur commodi velit distinctio aperiam blanditiis et sit eum. Blanditiis esse vel dolore illum necessitatibus molestiae natus. Possimus et cum id magni dolorem ut facilis nemo. Aut ex modi eaque earum labore voluptatibus incidunt vel. Error voluptatem repellendus voluptatem nihil et. Voluptatem nostrum aut magni sequi odio fugit amet. Et nesciunt nisi deserunt quo qui beatae voluptatem. Soluta soluta incidunt numquam dolores sit commodi. Velit numquam assumenda voluptas quod debitis. Dicta saepe illum asperiores beatae aliquid quasi itaque. Consequatur ut ut natus quisquam officia optio. Dolorem eveniet et non reprehenderit facere omnis voluptas. Veniam odio in rerum vel dolores.', 'gambar', 'images/news/default.jpg', 'Jayce Robel', 11, '2020-07-31 10:44:21', '2020-08-01 12:18:19'),
(10, 1, 1, 'Earum ea laudantium necessitatibus.', 'Sed reiciendis dicta occaecati fugit. Dicta corporis maxime sapiente alias at voluptatem. Voluptas et ut ut quo. Ipsam aperiam libero voluptatum et fugiat. Tenetur molestiae eius mollitia repellendus nihil tenetur. Et illo nobis incidunt. Cupiditate soluta voluptatum sit qui iusto velit assumenda. Quis ut quos qui. Vero aut saepe qui rem quasi. Suscipit sed sed fugit. Rerum hic possimus voluptatem tempore ad. Ipsum accusamus iure et mollitia. Nostrum et odit blanditiis sunt omnis voluptatem. Asperiores et dolore modi est repudiandae est et ut. Perspiciatis omnis voluptas laudantium excepturi quas voluptatem ipsum. Omnis non numquam consequuntur aut. Aperiam reiciendis laudantium placeat cumque. Eum itaque natus doloribus iste et. Voluptatem sapiente facere sunt saepe sit. Dolore asperiores dignissimos tempore reprehenderit. Voluptatum mollitia magni voluptas sunt incidunt ad. Minus maiores asperiores quae ut qui fuga. Laboriosam ad earum veniam ratione repellendus debitis non. Dolore vel soluta ipsam vel fugiat rerum molestiae. Dolorem et in at iste qui sit ad. At veniam quibusdam sint officiis repellendus fuga mollitia. Voluptate sint amet sint. Doloribus omnis et voluptates quibusdam fugiat totam aut. Ut debitis reprehenderit nisi ut libero. Dolor illo aut beatae natus natus. Sint molestiae expedita alias ut vitae soluta voluptatem. Aut voluptatum aut in velit quis. Velit non officia ut. Soluta voluptas error nihil accusamus et. Fuga sint dolorem magni eos. Eius corporis ab rerum est eum dicta. Sint debitis et non non est ut tempore. Non officiis laborum sunt eos. Omnis exercitationem cupiditate in quas dolorem molestiae. Fugit neque deleniti iure atque dolore enim fugiat. Qui laudantium quisquam et id facilis tenetur.', 'video', 'zdUy_pEA3FY', 'Sammy Wiegand', 27, '2020-07-31 10:44:21', '2020-08-01 12:16:42'),
(11, 1, 5, 'Molestias architecto perspiciatis voluptate.', 'Aliquam omnis id voluptatibus minima et animi eos. Eos quaerat magnam neque voluptates vel qui enim. Aut ipsam quod saepe laboriosam doloremque qui. Dolore impedit nihil officiis vel perferendis accusamus voluptatem delectus. Voluptatum alias corporis ut deleniti. Eius autem vel qui et qui. Temporibus inventore dolor nostrum temporibus. Ipsam impedit error facere totam laborum illo unde. Qui tenetur sapiente molestiae ad officia sequi. Harum reiciendis enim rem fugit eius. Qui est labore earum dolorum. Quidem quisquam in et repellat molestias qui aut. Eligendi ipsa blanditiis voluptatibus. Numquam amet voluptatem eos. Enim atque hic voluptas saepe laborum. Quod dolores aut sapiente vero temporibus. Ut ut sit ab expedita. Rerum animi ipsum voluptatem tempore debitis. Non et quod quae in fugit rerum. Quo laborum temporibus aperiam eligendi fugiat excepturi aliquam. Quia asperiores officia eligendi veritatis ut eius quod. Consequuntur est quia non recusandae soluta. Placeat optio consequatur est. Repellendus molestiae perferendis nihil facere. Rem voluptatem nulla pariatur est quia eaque aut. Quia aut laborum consequuntur quasi voluptatem quo animi. Dolorum necessitatibus temporibus magnam doloremque. Et dolor qui repudiandae ipsa voluptas. Facilis sit temporibus quae vel dolores. Et ut eum voluptatem dolores aut. Magnam dolore earum dolores distinctio. Maxime id qui nihil. Cumque nisi tempora illum non repellat consequatur mollitia sint. Voluptatem sit nam neque atque in minus rerum. Tempore et id delectus. Quia totam nisi aspernatur nam aperiam non suscipit. Quasi sint quas itaque aperiam voluptas velit.', 'video', 'zdUy_pEA3FY', 'Miss Sienna Gutmann', 53, '2020-07-31 10:44:21', '2020-07-31 10:44:21'),
(12, 3, 2, 'Et alias consequatur magni.', 'Perferendis nisi cumque officiis. Eius architecto et sit ut. Dolore inventore porro rerum natus distinctio quasi saepe illo. Consequuntur consequatur et a. Qui praesentium excepturi eligendi. Sunt maiores asperiores culpa sed aut non. Exercitationem sed magnam et magnam nobis consequatur. Delectus voluptates ut sed quas non quia dolorem. Tempora qui ut tenetur modi. Sed excepturi maxime facere molestias sed quis. Natus incidunt nemo odio non quis. Magni explicabo iusto facere est qui. Reiciendis officia et quia nemo repellendus est. Nam iusto adipisci tempore libero modi. Sit quae sequi illum voluptatem eaque. Animi qui ratione nulla inventore voluptates voluptas in. Magni ducimus iure illo iusto sit. Quaerat et nemo asperiores voluptatem corporis facilis et. Ipsum accusantium sed doloribus quis libero eum sint est. Est et doloremque aut sunt eligendi. Adipisci et perferendis libero id quia. Et iure vel qui. Accusamus ex corporis quia tenetur ipsam. Voluptas et deserunt provident molestias vel laborum fugiat. Architecto laborum ut fuga. Consequatur accusantium error ea rerum soluta vel. Aut dolores molestias error natus qui molestiae. Itaque incidunt eius excepturi quod nisi. Consequatur assumenda ut autem vero quia rerum. Numquam hic quam earum officiis. Quaerat omnis quam aliquid odio id maxime amet. Natus assumenda eius dolorum non corrupti doloribus. Consequatur et et in impedit. Et aliquid qui nam aspernatur incidunt. Corporis laboriosam eum iste voluptatem quasi autem dolorum. Architecto nisi commodi quia libero culpa earum dolor. Velit tenetur unde sint adipisci. Doloribus placeat magni quibusdam nesciunt iste. Perspiciatis doloribus animi cum adipisci perferendis quia recusandae. Repudiandae sequi doloribus culpa quia vitae. Rerum nemo fugit aut.', 'gambar', 'images/news/default.jpg', 'Prof. Dameon Littel', 37, '2020-07-31 10:44:21', '2020-07-31 10:44:21'),
(13, 3, 2, 'Delectus corrupti.', 'Dolorum autem fugit repellat neque rerum officiis fugiat. Ducimus saepe commodi id dolores et omnis autem. Aliquid eum et aut maxime nihil. Maxime quisquam laboriosam ut enim et praesentium velit. Id voluptates eligendi voluptas ad ut consequatur suscipit. Veniam quasi deleniti fugiat fugit. Libero sit numquam aut veritatis eligendi necessitatibus in aperiam. Eum sed accusantium sequi fuga nihil sint. Voluptate aspernatur quaerat nisi dolorem ratione autem alias. Ullam deserunt natus aspernatur suscipit et expedita explicabo laudantium. Aspernatur iste fugiat itaque autem rerum ut impedit. Et explicabo mollitia sunt. Earum sit nemo incidunt perferendis fugit ut aut eius. Voluptatem magnam repellendus in et incidunt quos. Maxime id error ea et cupiditate natus labore. Explicabo repellendus numquam voluptates voluptatem accusamus itaque facilis ut. Autem quae unde magnam sapiente voluptate dicta. Sequi explicabo voluptatem exercitationem cum ab et. Cumque non enim libero illo. Itaque facere libero ducimus et. Quis ut sequi ut nostrum. In quia distinctio aliquid. Omnis sed exercitationem eaque ut labore ab fugiat quam. Dolores libero et ipsam fugit. Aut omnis sequi a omnis qui. Sunt sed voluptatem eos harum recusandae. Perferendis esse minima occaecati magnam eum nisi animi. Eos et laborum veritatis id. Ullam impedit voluptate commodi. Repudiandae iste aut cumque et. Ex voluptatem commodi et corrupti quod praesentium numquam. Sed est tenetur eos doloribus iusto. Suscipit ut corrupti sed maiores. Distinctio eum aliquam excepturi facere. Voluptas iure sed impedit sed. Eos laboriosam excepturi voluptas fuga. Ut rerum doloremque aut et et quas. Est eius vel perferendis dicta. Sunt ea consequuntur non necessitatibus porro dignissimos.', 'video', 'zdUy_pEA3FY', 'Presley Streich', 68, '2020-07-31 10:44:21', '2020-07-31 10:44:21'),
(14, 1, 5, 'Magnam ad assumenda accusantium.', 'Sapiente enim sint necessitatibus reprehenderit veritatis. Ea omnis fugiat commodi asperiores. Amet ea dolore explicabo ipsam. Debitis ut rerum accusantium qui aut. Rerum esse vero ut labore repellendus. Excepturi minima perspiciatis aut. Doloremque alias odit reprehenderit maiores accusamus impedit. Esse qui dolores recusandae est. Sapiente eos aperiam omnis perspiciatis. Blanditiis ipsam aperiam blanditiis dolorum aut autem. Qui sapiente ex possimus corporis commodi enim. Atque illo vel non voluptas. Quod voluptas occaecati recusandae reiciendis et ipsa. Accusantium dolor neque quos ea eveniet. Id consequuntur tenetur molestiae sed. Quis quia quasi nostrum facilis rerum optio. Totam ut facere modi nulla nihil sunt atque. Ut culpa enim adipisci facere. Tenetur aut necessitatibus autem rerum. Excepturi minima rerum fugit veritatis recusandae eum. Minima consequatur velit quas. Suscipit tenetur et aut vel sunt. Nisi et quo sit dolorem voluptatem quasi. Voluptas dolorum maxime commodi et blanditiis magnam tempora. Perferendis quia magni ex blanditiis. Natus nisi nisi numquam officia voluptatem ullam commodi accusantium. Impedit quos earum eaque cupiditate aut dolores. Ullam quibusdam quia ipsa qui qui iure sint. Omnis qui quis in quasi.', 'video', 'zdUy_pEA3FY', 'Mrs. Alfreda Kozey I', 15, '2020-07-31 10:44:21', '2020-07-31 10:44:21'),
(15, 3, 2, 'Molestias cum quis et.', 'At adipisci deserunt quisquam in temporibus modi. Et dolorum libero consequatur est voluptatem eius. Dolor quisquam sunt quia et iusto. Vitae quam et occaecati autem. Mollitia quae autem voluptatem corporis. Exercitationem et iste eum distinctio libero et. Omnis nulla eos occaecati similique quisquam accusantium nam sed. Vitae mollitia ut in esse aut consequatur. Facilis est non dolorem id. Provident et quis minus quia et itaque dolorum. Et numquam voluptatem dolores non impedit eos. At totam voluptatibus voluptatum. Eveniet libero tempore voluptatem recusandae voluptas et. Minus aut id sit sit laudantium quia. Necessitatibus id tempora recusandae. Dolor aut quia libero culpa. Commodi voluptatem sunt cupiditate repellat molestias soluta. Et impedit est exercitationem dicta. Vel qui totam ipsum et autem. Velit nesciunt vero facilis labore. Voluptatem blanditiis hic quibusdam esse veniam. Rem pariatur at reiciendis quis est distinctio maiores. Dolores sint ut quis dolores et aut rerum. Minus similique enim ad quam. Soluta recusandae perspiciatis recusandae provident blanditiis. Asperiores odio id quod incidunt similique ut esse.', 'gambar', 'images/news/default.jpg', 'Ramon Pacocha', 82, '2020-07-31 10:44:21', '2020-08-01 12:03:19'),
(16, 3, 3, 'Soluta vel et adipisci.', 'Tempore voluptatem iusto sit eveniet ducimus. Assumenda ipsum vel aut sapiente. Harum animi repudiandae libero. Perferendis reiciendis qui fugiat dolores est. Quibusdam vel ab consequuntur ut tempore voluptas. Molestiae ratione beatae distinctio ducimus. Tempora eius quia nesciunt aliquam id corporis aut qui. Modi et esse non sint. Quaerat nam maxime dolorum ut occaecati. Laudantium quis fugit quia. Aut ut veniam sit voluptas. Facere veniam ipsam dolorem accusamus dolores. Quia aliquam sapiente veniam assumenda ipsum. Perspiciatis quidem facilis ratione est consequatur. Sed ut et voluptatem reiciendis quo eligendi. Qui doloremque molestiae assumenda doloremque voluptatem. Ex eum quod velit optio. Dolor nostrum est et praesentium consequatur. Reiciendis corrupti aut veniam velit enim dignissimos odit sequi. Aut doloremque at illum maxime. Ut quia deserunt fugit perspiciatis tenetur. Illum et ea impedit deserunt. Corporis voluptas eaque debitis at expedita nemo tempora. Ut consequuntur voluptatibus et dolorum enim explicabo beatae. Quidem consequatur et tempore aut. Numquam tempora voluptatem voluptas modi quia. Debitis fugiat dolorem dignissimos nobis itaque beatae ipsum. Aut nisi harum et nemo dolore aut sequi magnam.', 'gambar', 'images/news/default.jpg', 'Prof. Tyson Murazik', 33, '2020-07-31 10:44:21', '2020-08-01 12:02:33'),
(17, 2, 3, 'Quasi ullam voluptates.', 'Esse itaque nisi dolore accusamus quasi suscipit. Autem ex eos explicabo minima eius eaque. Voluptatibus qui iste et debitis illo omnis id. Velit assumenda atque perferendis nemo ab dolorem omnis non. Et sed et aperiam nostrum eveniet provident corrupti. Minima officiis eligendi fugiat quia. Dicta deleniti ipsa molestiae veniam ipsa doloremque. Maiores qui velit distinctio consectetur non est. Inventore autem eos asperiores quo sunt. Quasi earum praesentium consequatur culpa optio dolores sequi. Eaque dicta qui libero autem voluptate vel dolorum suscipit. Dolorum rerum quisquam quis est voluptates doloribus. Natus magnam at expedita cupiditate. Dolorum exercitationem dolore vitae qui aliquam ad. Iure nobis sed consectetur quia laudantium laboriosam totam. Neque id dolorem velit aliquam itaque eaque labore repellendus. Ea repellendus placeat sit dolor ea aut assumenda quibusdam. Placeat voluptates qui sint cupiditate eaque architecto. Quo rerum mollitia tempore est. Animi repellendus consectetur itaque nemo omnis non ipsa. Qui sapiente cum dolores libero et placeat. Voluptatem molestias adipisci labore voluptatem sunt animi molestiae. Occaecati dolorem dicta molestiae voluptates rerum mollitia. Vero sapiente veritatis molestias iste fugiat fugit. Corporis reprehenderit accusantium voluptatum quo hic laboriosam. Fuga neque corrupti deleniti sint. Provident nihil rerum culpa facilis minima voluptas aspernatur. Non impedit tenetur error vel. Est nesciunt quisquam qui ullam expedita architecto. Doloremque ea rem similique consequatur eos quo.', 'gambar', 'images/news/default.jpg', 'Erin Hand', 13, '2020-07-31 10:44:21', '2020-08-01 12:19:28'),
(18, 1, 4, 'Esse quasi ab.', 'Atque et ut unde inventore voluptas eaque deserunt nihil. Corporis consequuntur aut officia est. Voluptatibus porro at inventore sunt dolorem unde et. Dolorem cumque accusamus aut molestiae labore natus voluptatem. Minus a eligendi mollitia at distinctio voluptatem. Quos voluptates voluptas sed reiciendis recusandae. Dolor sunt ipsum molestiae suscipit et et nam. Laboriosam dolor sint expedita ea nemo. Quae fuga quia quam ex at ducimus et. Libero et esse odio ut illum omnis. Eius iure a delectus. Dolor et sit est. Voluptatem occaecati cumque aliquid libero eos. Non quia quia sint eos repellat quo quo. Voluptatem laudantium aliquid eveniet pariatur. Explicabo corrupti voluptas ipsum vel. Vitae assumenda sint doloremque. Vel a sed sequi eligendi ex eos. Aperiam minus quia laboriosam odit consectetur. Quam non iure odit sed aut at fugit. Autem in vitae iusto dignissimos qui at mollitia. Qui atque harum ut qui eos veniam error. Rem assumenda dolorem est quia pariatur deleniti. Incidunt cupiditate harum saepe inventore. Non numquam et voluptatum nobis distinctio minima. Dolore molestiae ea enim molestias et aliquam. Qui velit facilis sint quam odit repudiandae. Dolorum nobis a enim illo. Doloribus iusto blanditiis vel quis.', 'gambar', 'images/news/default.jpg', 'Pierre Roob', 43, '2020-07-31 10:44:21', '2020-07-31 10:44:21'),
(19, 1, 3, 'Quo ut nemo architecto.', 'Eum nihil et consequatur sunt dicta. Doloremque incidunt dignissimos harum autem natus illo. Facilis veritatis earum facilis qui amet dolores sunt. Dolorem magnam placeat architecto quis odio. Inventore unde nisi repudiandae culpa. Aliquid et occaecati et ut inventore nesciunt et. Aspernatur consequuntur et explicabo repudiandae debitis. Asperiores non cum architecto doloremque et dolores ut. Vel eos aut ea odio quo velit. Consequatur commodi vitae numquam perferendis delectus quia non eum. Eaque sit iste debitis in quod sequi. Possimus repellendus mollitia accusamus facere aut dolorum. Voluptas quia error aliquid expedita harum quas. Libero delectus officia fugit accusamus velit. Totam laboriosam provident id voluptatibus sed. Ut nam dolorem autem sit error facere. Eos quia quia qui qui minima sapiente quo. Illum omnis atque quod tenetur nesciunt ea quas. Maxime aspernatur eligendi quo molestiae. Sunt assumenda blanditiis maxime et sed. Similique recusandae ut aut rerum consequatur placeat. Accusantium nemo sunt qui aut. Ipsam quae provident blanditiis maiores cum ad accusamus non. Deleniti consequatur dolores est culpa magni dolorem. Cumque mollitia omnis ipsa eveniet in et id soluta. Vel modi occaecati maiores nihil ut. Quisquam recusandae accusamus quia laudantium non beatae dolorum. Nisi sed soluta minima culpa illum dignissimos est. Aliquam totam officiis distinctio voluptas et.', 'video', 'zdUy_pEA3FY', 'Faye Gottlieb', 79, '2020-07-31 10:44:21', '2020-07-31 10:44:21'),
(20, 3, 5, 'Praesentium voluptatem pariatur laborum.', 'Quidem mollitia aliquid iusto molestiae voluptatem. Sequi non corrupti consequatur debitis. Neque dolor doloribus molestiae optio maiores. Amet et neque beatae nisi. Quibusdam ipsum occaecati a aliquam. Reiciendis nisi aut enim officiis. Explicabo laboriosam ad iste beatae. Ipsum architecto alias deleniti nihil sunt modi ut. Deserunt eius odit ipsum at error asperiores. Qui beatae autem reiciendis odio. Aperiam est et aspernatur ullam molestias. Soluta natus vitae unde ratione incidunt veritatis. Quisquam ea quia quia saepe provident doloribus ea. Consequuntur enim occaecati eos. Voluptates dolorum ut officiis. Et nihil qui debitis. Aut iste est eos consequatur ut. Quo labore praesentium ut dolor veniam aut eos. Facere consequuntur laborum aut illo et eligendi facere. Quas consequatur id voluptate cumque eaque ut culpa. Facere voluptatum cum ratione. Est in sit nemo alias corrupti et eligendi. Ipsa esse quo qui provident velit iure ducimus. Fuga similique porro et voluptatibus sapiente. Omnis non maiores et ab numquam ut. Ut officiis id exercitationem praesentium nam. Molestiae at sed praesentium et.', 'gambar', 'images/news/default.jpg', 'Margarete Mohr I', 57, '2020-07-31 10:44:21', '2020-08-01 12:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `news_tag`
--

CREATE TABLE `news_tag` (
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news_tag`
--

INSERT INTO `news_tag` (`news_id`, `tag_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 2),
(2, 3),
(3, 1),
(3, 3),
(3, 5),
(3, 6),
(4, 2),
(5, 4),
(9, 1),
(9, 2),
(9, 3),
(9, 5),
(20, 1),
(20, 2),
(20, 4),
(20, 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NamaTag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `NamaTag`, `created_at`, `updated_at`) VALUES
(1, 'pilkada Solo', '2020-07-31 10:44:20', '2020-07-31 10:44:20'),
(2, 'Perkembangan Covid-19', '2020-07-31 10:44:20', '2020-07-31 10:44:20'),
(3, 'Save_george', '2020-07-31 10:44:20', '2020-07-31 10:44:20'),
(4, 'Aff Indonesia', '2020-07-31 10:44:20', '2020-07-31 10:44:20'),
(5, 'Shoopee_League', '2020-07-31 10:44:20', '2020-07-31 10:44:20'),
(6, 'Persija_Juara', '2020-07-31 10:44:20', '2020-07-31 10:44:20'),
(7, 'Indonesia_Juara', '2020-07-31 10:44:20', '2020-07-31 10:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'lala', 'lala@gmail.com', '2020-07-31 10:44:23', '$2y$10$ypUDI75CbiKLRTRKB4RLH.Dq1lc7itSo2oGdbpdOAxBM.SbxSNFvy', 'images/photouser/lala.jpeg', 'user', 'p23hbQBZeKD5aURu1TChJ0k7dt1Rry2TKoPP0kUDJxpemyj0owdq7Ohi7S7W', '2020-07-31 10:44:24', '2020-07-31 11:24:14'),
(2, 'Jaylan Monahan', 'klocko.cassidy@example.com', '2020-07-31 10:44:23', '$2y$10$pSLVliQsJ3B47KmqcvbK6OfH1epCRukm/JXfCQGW7/8gSs6QAJMg2', 'images/photouser/default-avatar.png', 'user', 'fmcoNsBx88', '2020-07-31 10:44:24', '2020-07-31 10:44:24'),
(3, 'Brian Champlin', 'anita.goldner@example.org', '2020-07-31 10:44:23', '$2y$10$SAaEpn52pWWL7wGT1WU5iu/YQZa4PzlSwJ7GlBGdNL8B6NLDfG0ru', 'images/photouser/default-avatar.png', 'user', 'TPxULDykKN', '2020-07-31 10:44:24', '2020-07-31 10:44:24'),
(6, 'Alfarel', 'alfarelrizky99@gmail.com', '2020-07-31 10:44:26', '$2y$10$DEH/GEx.06bm8seStvI.H.8M1FTNmNB9QQZJThYCTG0nteLGErV7u', 'images/photouser/alfarel.jpeg', 'admin', NULL, '2020-07-31 10:44:26', '2020-08-01 09:04:34'),
(7, 'tinih', 'tinih@gmail.com', NULL, '$2y$10$U0Zi4fube99MT/cvFX0Cd.5ZI7gU2A6GD.tkfk7eBX86m1Ltz8ht2', 'images/photouser/tinih.jpeg', 'user', NULL, '2020-08-01 13:12:46', '2020-08-01 13:16:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_tag`
--
ALTER TABLE `news_tag`
  ADD PRIMARY KEY (`news_id`,`tag_id`),
  ADD KEY `news_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news_tag`
--
ALTER TABLE `news_tag`
  ADD CONSTRAINT `news_tag_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`),
  ADD CONSTRAINT `news_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
