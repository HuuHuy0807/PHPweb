-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2024 at 04:21 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int NOT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `description`, `price`, `image`, `category_id`, `video_url`) VALUES
(1, 'Đắc Nhân Tâm', 'Dale Carnegie', 'Đắc Nhân Tâm là một trong những cuốn sách kinh điển về phát triển cá nhân và kỹ năng giao tiếp.', 150000.00, 'dacnhantam.jpg', 2, 'https://www.youtube.com/watch?v=ETM04SQOpCo&t=4s'),
(2, 'Tuổi trẻ đáng giá bao nhiêu', 'Napoleon Hill', 'Tuổi trẻ đáng giá bao nhiêu là một cuốn sách cổ điển về phát triển cá nhân và thành công.', 120000.00, 'tuoitredanggiabaonhieu.png', 3, 'https://www.youtube.com/watch?v=CFFc3zjNF58'),
(3, 'Hẹn Nhau Phía Sau Tan Vỡ', 'An', 'Hẹn Nhau Phía Sau Tan Vỡ là một câu chuyện đầy cảm xúc về tình yêu và sự mất mát.', 120000.00, 'HenNhauPhiaSauTanVo.jpg', 2, 'https://www.youtube.com/watch?v=DoQ4Q8emEfc'),
(4, 'Thám tử lừng danh Conan', 'Conan', 'Thám tử lừng danh Conan là một bộ truyện tranh nổi tiếng của Nhật Bản, tập trung vào cuộc phiêu lưu của nhân vật chính là Thám tử Shinichi Kudo (hay còn được biết đến với tên gọi Conan Edogawa) trong việc giải quyết các vụ án bí ẩn.', 200000.00, 'conan.jpg', 6, 'https://www.youtube.com/watch?v=SuMPg9C2tFI'),
(5, 'One Piece', 'Eiichiro Oda', 'One Piece là một bộ truyện tranh Nhật Bản được viết và minh họa bởi Eiichiro Oda. Nó kể về cuộc phiêu lưu của Monkey D. Luffy, một cậu bé muốn trở thành Vua Hải Tặc.', 250000.00, 'onepiece.jpg', 6, 'https://www.youtube.com/watch?v=poQrpHkExo0'),
(6, 'Doraemon', 'Fujiko F. Fujio', 'Doraemon là một bộ truyện tranh nổi tiếng của Nhật Bản về một chú mèo máy từ tương lai được gửi đến thế giới hiện tại để giúp đỡ một cậu bé tên là Nobita.', 180000.00, 'doraemon.jpg', 6, 'https://www.youtube.com/watch?v=RZzbDFgXMUU'),
(7, 'Bản Thiết Kế Vĩ Đại', 'Stephen Hawking', 'Cuốn sách khám phá những câu hỏi lớn nhất về vũ trụ...', 180000.00, 'banthietkevidai.jpg', 3, 'https://www.youtube.com/watch?v=pa5Y-OYSPUw'),
(8, 'Truyện Kiều', 'Nguyễn Du', 'Truyện Kiều là tác phẩm văn học cổ điển của Việt Nam, kể về cuộc đời của Thúy Kiều...', 100000.00, 'truyenkieu.jpg', 2, 'https://www.youtube.com/watch?v=VDQU8yn64zs'),
(9, 'Doanh Nghiệp Thế Kỷ 21', 'Robert T. Kiyosaki', 'Cuốn sách này của Robert T. Kiyosaki sẽ giúp bạn hiểu về cách thức xây dựng và quản lý doanh nghiệp trong thời đại mới...', 70000.00, 'doanhnghieptheky21.jpg', 3, 'https://www.youtube.com/watch?v=7FfiCGpOczE&t=44s'),
(10, 'Nhà Giả Kim', 'Paulo Coelho', 'Nhà Giả Kim là một cuốn tiểu thuyết nổi tiếng của Paulo Coelho, kể về hành trình của cậu bé chăn cừu Santiago...', 150000.00, 'nhagiakim.jpg', 5, 'https://www.youtube.com/watch?v=yZrvuX2rrNk&t=16s'),
(11, 'Mắt Biếc', 'Nguyễn Nhật Ánh', 'Mắt Biếc là một tác phẩm nổi tiếng của Nguyễn Nhật Ánh, kể về câu chuyện tình yêu đầy xúc động giữa Ngạn và Hà Lan...', 120000.00, 'matbiec.jpg', 5, 'https://www.youtube.com/watch?v=UYmTI3Q3xxQ'),
(12, 'Tôi Thấy Hoa Vàng Trên Cỏ Xanh', 'Nguyễn Nhật Ánh', 'Tôi Thấy Hoa Vàng Trên Cỏ Xanh là một tác phẩm của Nguyễn Nhật Ánh, kể về tuổi thơ và những kỷ niệm đẹp ở vùng quê...', 70000.00, 'toithayhoavangtrencoxanh.jpg', 5, 'https://www.youtube.com/watch?v=xIg-C3Ciy5E');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image_url`, `created_at`) VALUES
(1, 'Khoa học', 'Sách về các chủ đề khoa học tự nhiên.', 'imgDMS/khoahoc.jpg', '2024-06-03 03:15:55'),
(2, 'Văn học', 'Sách về văn học và nghệ thuật.', 'IMGDMS/vanhoc.jpg', '2024-06-03 03:15:55'),
(3, 'Kinh doanh', 'Sách về kinh doanh và quản lý.', 'IMGDMS/kinhdoanh.jpg', '2024-06-03 03:15:55'),
(4, 'Lịch sử', 'Sách về lịch sử và văn hóa.', 'IMGDMS/lichsu.jpg', '2024-05-27 20:49:20'),
(5, 'Tiểu thuyết', 'Sách về các tiểu thuyết truyện.', 'IMGDMS/tieuthuyet.jpg', '2024-05-27 20:49:20'),
(6, 'Hoạt hình', 'Sách về tình yêu và cuộc sống.', 'IMGDMS/tinhyeu.jpg', '2024-05-27 20:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `featured_collections`
--

DROP TABLE IF EXISTS `featured_collections`;
CREATE TABLE IF NOT EXISTS `featured_collections` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `featured_collections`
--

INSERT INTO `featured_collections` (`id`, `name`, `image`) VALUES
(1, 'Nguyễn Nhật Ánh', 'nguyennhatanh.jpg'),
(2, 'Disney', 'disney.jpg'),
(3, 'Conan', 'conan.jpg'),
(4, 'One Piece', 'onepiece.jpg'),
(5, 'Capybara', 'capybara.jpg'),
(6, 'Gấu trúc - Panda', 'panda.jpg'),
(7, 'Doraemon', 'doraemon.jpg'),
(8, 'Pokemon', 'pokemon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_amount`, `order_date`) VALUES
(1, 1, 250000.00, '2024-06-06 12:00:00'),
(2, 2, 460000.00, '2024-06-07 09:30:00'),
(3, 3, 320000.00, '2024-06-08 15:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `book_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `book_id` (`book_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `book_id`, `quantity`, `price`) VALUES
(1, 1, 5, 2, 50000.00),
(2, 1, 6, 1, 200000.00),
(3, 2, 3, 3, 40000.00),
(4, 2, 7, 2, 90000.00),
(5, 2, 8, 1, 70000.00),
(6, 3, 2, 1, 120000.00),
(7, 3, 4, 1, 200000.00),
(8, 1, 5, 2, 50000.00),
(9, 1, 6, 1, 200000.00),
(10, 2, 3, 3, 40000.00),
(11, 2, 7, 2, 90000.00),
(12, 2, 8, 1, 70000.00),
(13, 3, 2, 1, 120000.00),
(14, 3, 4, 1, 200000.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com'),
(2, 'Huy', 'abc123', 'Huy@gmail.com'),
(3, 'Tan', 'abc123', 'Tan@gmail.com'),
(4, 'Thanh', '123', 'thanh@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
