-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 13, 2024 lúc 04:49 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nongsanducphuc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `name`) VALUES
(1, 'admin@gmail.com', '$2y$10$Lboifq7NRjr5zE8extnDbOnWORrY2i6Y/YgJwZABb.Qu5N1hX0Xb.', 'Huy Hoàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(1, 'Đặc sản', '2024_04_26_20_37_07_dac-san.png'),
(2, 'Nấm các loại', '2024_04_26_20_37_31_nam-cac-loai.png'),
(3, 'Rau củ quả sạch', '2024_04_26_20_42_02_rau-cu-sach.png'),
(4, 'Trái cây', '2024_04_26_20_54_01_trai-cay.png'),
(5, 'Nông sản khô', '2024_04_26_21_21_11_nong-san-kho.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` char(20) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) DEFAULT 0,
  `shipping_code` text NOT NULL,
  `address` text DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `total`, `created_at`, `updated_at`, `status`, `shipping_code`, `address`, `type`, `name`, `tel`, `user_id`) VALUES
('076641', 829000, '2024-05-13 14:23:05', '2024-05-13 21:24:34', 2, '', 'Đông Anh - Hà Nội', 2, 'Hoài Thương', '0336511728', 3),
('125061', 95000, '2024-05-13 09:05:45', '2024-05-13 16:15:24', 1, '', 'Phan Xá - Uy Nỗ - Đông Anh- Hà Nội', 2, 'Lưu Văn Vũ', '0344296287', 2),
('140453', 35000, '2024-05-13 08:54:42', '2024-05-13 15:54:42', 1, '', 'Đông Anh - Hà Nội', 2, 'Phương Anh', '0392342795', 1),
('229436', 323800, '2024-04-29 10:37:45', '2024-05-12 19:26:33', 5, '', 'Kim Chung - Đông Anh - Hà Nội', 1, 'Phương Anh', '0392342795', 1),
('344923', 50000, '2024-05-13 09:01:46', '2024-05-13 16:15:24', 1, '', 'Phan Xá - Uy Nỗ - Đông Anh- Hà Nội', 2, 'Lưu Văn Vũ', '0344296287', 2),
('434377', 366500, '2024-04-29 10:38:13', '2024-05-12 19:26:42', 6, '', 'Kim Chung - Đông Anh - Hà Nội', 0, 'Phương Anh', '0392342795', 1),
('493140', 30000, '2024-05-13 09:04:33', '2024-05-13 16:15:24', 0, '', 'Phan Xá - Uy Nỗ - Đông Anh- Hà Nội', 1, 'Lưu Văn Vũ', '0344296287', 2),
('536529', 660000, '2024-04-29 10:37:12', '2024-05-12 23:01:34', 5, '', 'Kim Chung - Đông Anh - Hà Nội', 0, 'Phương Anh', '0392342795', 1),
('548565', 705400, '2024-05-13 01:32:45', '2024-05-13 08:36:36', 2, '', 'Hà Nội', 2, 'Phương Anh', '0392342795', 1),
('790919', 95000, '2024-05-13 09:07:16', '2024-05-13 16:15:24', 2, '', 'Phan Xá - Uy Nỗ - Đông Anh- Hà Nội', 2, 'Lưu Văn Vũ', '0344296287', 2),
('909535', 483500, '2024-04-29 10:50:37', '2024-05-12 23:01:53', 2, '', 'Kim Chung - Đông Anh - Hà Nội', 2, 'Phương Anh', '0392342795', 1),
('910367', 1020000, '2024-04-29 10:35:33', '2024-05-13 00:42:49', 4, 'TEST', 'Kim Chung - Đông Anh - Hà Nội', 1, 'Phương Anh', '0392342795', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` char(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(1, '910367', 2, 5, 30000),
(2, '910367', 3, 5, 44000),
(3, '910367', 4, 5, 95000),
(4, '910367', 5, 5, 35000),
(5, '536529', 9, 1, 24500),
(6, '536529', 10, 1, 14500),
(7, '536529', 11, 2, 24500),
(8, '536529', 12, 1, 29500),
(9, '536529', 14, 4, 52500),
(10, '536529', 15, 1, 112500),
(11, '536529', 16, 4, 55000),
(12, '229436', 17, 1, 150000),
(13, '229436', 18, 1, 60000),
(14, '229436', 19, 1, 59900),
(15, '229436', 20, 1, 53900),
(16, '434377', 5, 5, 35000),
(17, '434377', 6, 3, 16000),
(18, '434377', 7, 1, 25500),
(19, '434377', 8, 2, 59000),
(20, '909535', 2, 4, 30000),
(21, '909535', 3, 3, 44000),
(22, '909535', 4, 2, 95000),
(23, '909535', 6, 1, 16000),
(24, '909535', 7, 1, 25500),
(25, '548565', 1, 6, 50000),
(26, '548565', 6, 1, 16000),
(27, '548565', 7, 1, 25500),
(28, '548565', 9, 1, 24500),
(29, '548565', 10, 1, 14500),
(30, '548565', 13, 1, 60000),
(31, '548565', 16, 1, 55000),
(32, '548565', 17, 1, 150000),
(33, '548565', 19, 1, 59900),
(34, '140453', 5, 1, 35000),
(35, '344923', 1, 1, 50000),
(36, '493140', 2, 1, 30000),
(37, '125061', 4, 1, 95000),
(38, '790919', 4, 1, 95000),
(39, '076641', 1, 1, 50000),
(40, '076641', 3, 10, 44000),
(41, '076641', 4, 2, 95000),
(42, '076641', 5, 1, 35000),
(43, '076641', 6, 1, 16000),
(44, '076641', 8, 1, 59000),
(45, '076641', 9, 1, 24500),
(46, '076641', 10, 1, 14500);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `unit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `qty`, `description`, `category_id`, `image`, `unit`) VALUES
(1, 'Vải Thiều Lục Ngạn', 50000, 92, '&lt;p style=&quot;text-align: justify;&quot;&gt;Vải thiều Lục Ngạn, một trong những đặc sản nổi tiếng của tỉnh Bắc Giang, l&agrave; biểu tượng của sự tinh khiết v&agrave; hương vị đặc trưng trong v&ugrave;ng đất n&agrave;y. Vải thiều Lục Ngạn kh&ocirc;ng chỉ l&agrave; một loại tr&aacute;i c&acirc;y ngon m&agrave; c&ograve;n l&agrave; niềm tự h&agrave;o của người d&acirc;n nơi đ&acirc;y.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Tr&aacute;i vải thiều Lục Ngạn thường c&oacute; h&igrave;nh d&aacute;ng nhỏ gọn v&agrave; tr&ograve;n, với vỏ m&agrave;u đỏ sậm hoặc đỏ tươi phủ một lớp mỏng tr&ecirc;n bề mặt. Khi chạm v&agrave;o, vỏ vải thiều cảm nhận được sự mịn m&agrave;ng v&agrave; mềm mại, nhưng vẫn đủ chắc chắn để bảo vệ thịt vải b&ecirc;n trong. Thịt vải thiều Lục Ngạn thường mọng nước, gi&ograve;n v&agrave; ngọt ng&agrave;o, tạo ra một trải nghiệm thưởng thức tuyệt vời cho bất kỳ ai.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Mỗi quả vải thiều Lục Ngạn l&agrave; kết quả của sự chăm s&oacute;c v&agrave; t&acirc;m huyết của người d&acirc;n nơi đ&acirc;y trong qu&aacute; tr&igrave;nh trồng v&agrave; chăm s&oacute;c c&acirc;y trồng. Với đất đai phong ph&uacute; v&agrave; kh&iacute; hậu &ocirc;n h&ograve;a, Lục Ngạn đ&atilde; tạo điều kiện thuận lợi cho việc trồng v&agrave; ph&aacute;t triển vải thiều, từ đ&oacute; tạo n&ecirc;n một thương hiệu vải thiều Lục Ngạn nổi tiếng kh&ocirc;ng chỉ trong nước m&agrave; c&ograve;n tr&ecirc;n thị trường quốc tế.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Vải thiều Lục Ngạn kh&ocirc;ng chỉ l&agrave; một loại tr&aacute;i c&acirc;y ngon m&agrave; c&ograve;n l&agrave; biểu tượng của sự tinh khiết v&agrave; hương vị đặc trưng của v&ugrave;ng đất Bắc Giang. Đặc sản n&agrave;y thường được sử dụng l&agrave;m nguy&ecirc;n liệu cho nhiều m&oacute;n ăn truyền thống v&agrave; cũng được đ&aacute;nh gi&aacute; cao trong việc chế biến c&aacute;c loại đồ uống v&agrave; mứt, l&agrave; một phần kh&ocirc;ng thể thiếu trong văn h&oacute;a ẩm thực của Việt Nam.&lt;/p&gt;\r\n', 1, '2024_04_27_09_48_11_vai-thieu-luc-ngan.png', 'kg'),
(2, 'Nhãn Lồng Hưng Yên', 30000, 90, '&lt;p style=&quot;text-align: justify;&quot;&gt;Nh&atilde;n lồng Hưng Y&ecirc;n, một trong những đặc sản nổi tiếng của v&ugrave;ng đất n&agrave;y, đ&atilde; từ l&acirc;u g&oacute;p phần l&agrave;m n&ecirc;n danh tiếng cho Hưng Y&ecirc;n - một tỉnh ven s&ocirc;ng Hồng nổi tiếng ở Việt Nam. Nh&atilde;n lồng kh&ocirc;ng chỉ l&agrave; loại tr&aacute;i c&acirc;y ngọt ng&agrave;o, m&agrave; c&ograve;n l&agrave; biểu tượng của sự gi&agrave;u c&oacute;, may mắn v&agrave; sự gắn kết gia đ&igrave;nh trong văn h&oacute;a d&acirc;n gian.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Tr&aacute;i nh&atilde;n lồng Hưng Y&ecirc;n c&oacute; h&igrave;nh d&aacute;ng độc đ&aacute;o, mỏng manh v&agrave; m&agrave;u sắc s&aacute;ng b&oacute;ng. Vỏ của nh&atilde;n mỏng v&agrave; trong, phủ một lớp l&ograve;e loẹt như lồng đ&egrave;n truyền thống. Khi chạm v&agrave;o, vỏ nh&atilde;n nhẹ nh&agrave;ng nhưng đầy uyển chuyển. B&ecirc;n trong, những hạt nh&atilde;n trắng trong suốt tỏa ra một hương thơm đặc trưng, mềm mại v&agrave; ngọt ng&agrave;o, l&agrave;m say l&ograve;ng bất kỳ ai đ&atilde; từng thưởng thức.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Đặc biệt, kh&ocirc;ng chỉ về h&igrave;nh thức v&agrave; hương vị, nh&atilde;n lồng Hưng Y&ecirc;n c&ograve;n chứa đựng những gi&aacute; trị văn h&oacute;a s&acirc;u sắc. Việc h&aacute;i v&agrave; chăm s&oacute;c nh&atilde;n đ&ograve;i hỏi sự kỹ thuật, ki&ecirc;n nhẫn v&agrave; t&acirc;m huyết của người n&ocirc;ng d&acirc;n, từ đ&oacute; tạo n&ecirc;n sự gắn kết trong cộng đồng. Nh&atilde;n lồng thường được sử dụng trong c&aacute;c dịp lễ tết, đặc biệt l&agrave; Tết Trung Thu, khiến mỗi hạt nh&atilde;n trở th&agrave;nh một m&oacute;n qu&agrave; &yacute; nghĩa, gửi gắm th&ocirc;ng điệp về sự sum họp v&agrave; hạnh ph&uacute;c.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Với vẻ đẹp tự nhi&ecirc;n v&agrave; &yacute; nghĩa s&acirc;u sắc, nh&atilde;n lồng Hưng Y&ecirc;n kh&ocirc;ng chỉ l&agrave; một m&oacute;n ăn ngon m&agrave; c&ograve;n l&agrave; biểu tượng của sự đo&agrave;n kết, may mắn v&agrave; niềm vui trong cuộc sống của người d&acirc;n xứ Hưng Y&ecirc;n.&lt;/p&gt;\r\n', 1, '2024_04_27_11_32_11_nhan-long-hung-yen.png', 'kg'),
(3, 'Xoài Cát Hòa Lộc', 44000, 82, '&lt;p style=&quot;text-align: justify;&quot;&gt;Xo&agrave;i H&ograve;a Lộc ở Tiền Giang l&agrave; một trong những đặc sản nổi tiếng của v&ugrave;ng đất n&agrave;y, nơi m&agrave; người d&acirc;n gắn b&oacute; với việc trồng v&agrave; sản xuất xo&agrave;i từ h&agrave;ng thế kỷ trước. Xo&agrave;i H&ograve;a Lộc kh&ocirc;ng chỉ được biết đến với hương vị đặc trưng m&agrave; c&ograve;n l&agrave; biểu tượng của sự gi&agrave;u c&oacute; v&agrave; sự ph&aacute;t triển n&ocirc;ng nghiệp của Tiền Giang.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Tr&aacute;i xo&agrave;i H&ograve;a Lộc ở Tiền Giang thường c&oacute; h&igrave;nh d&aacute;ng lớn, tr&ograve;n v&agrave; đều, với vỏ m&agrave;u xanh v&agrave;ng hoặc v&agrave;ng cam phủ một lớp mỏng tr&ecirc;n bề mặt. Khi chạm v&agrave;o, vỏ xo&agrave;i cảm nhận được sự mịn m&agrave;ng v&agrave; mềm mại, nhưng vẫn đủ chắc chắn để bảo vệ thịt xo&agrave;i b&ecirc;n trong. Thịt xo&agrave;i H&ograve;a Lộc thường mềm, đậm đ&agrave; v&agrave; ngọt ng&agrave;o, khiến cho bất kỳ ai thưởng thức cũng kh&ocirc;ng thể qu&ecirc;n được hương vị đặc trưng n&agrave;y.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Mỗi quả xo&agrave;i H&ograve;a Lộc l&agrave; kết quả của sự chăm s&oacute;c v&agrave; t&acirc;m huyết của người n&ocirc;ng d&acirc;n trong qu&aacute; tr&igrave;nh trồng v&agrave; chăm s&oacute;c c&acirc;y trồng. Với đất đai phong ph&uacute; v&agrave; kh&iacute; hậu thuận lợi, Tiền Giang đ&atilde; tạo điều kiện thuận lợi cho việc trồng v&agrave; ph&aacute;t triển xo&agrave;i, từ đ&oacute; tạo n&ecirc;n một thương hiệu xo&agrave;i H&ograve;a Lộc nổi tiếng kh&ocirc;ng chỉ trong nước m&agrave; c&ograve;n tr&ecirc;n thị trường quốc tế.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Xo&agrave;i H&ograve;a Lộc kh&ocirc;ng chỉ l&agrave; một m&oacute;n ăn ngon m&agrave; c&ograve;n l&agrave; biểu tượng của sự gi&agrave;u c&oacute; v&agrave; sự ph&aacute;t triển bền vững của nền n&ocirc;ng nghiệp Việt Nam. Đặc sản n&agrave;y thường được sử dụng trong nhiều m&oacute;n ăn truyền thống v&agrave; cũng l&agrave; nguy&ecirc;n liệu ch&iacute;nh trong nhiều loại đồ uống m&aacute;t lạnh v&agrave;o m&ugrave;a h&egrave;.&lt;/p&gt;\r\n', 1, '2024_04_27_11_36_14_xoai-cat-hoa-loc.png', 'kg'),
(4, 'Mận Mộc Châu', 95000, 89, '&lt;p style=&quot;text-align: justify;&quot;&gt;Mận Mộc Ch&acirc;u, một loại mận đặc sản nổi tiếng từ v&ugrave;ng cao nguy&ecirc;n Mộc Ch&acirc;u, l&agrave; biểu tượng của sự tươi mới v&agrave; ngọt ng&agrave;o trong kh&ocirc;ng gian thi&ecirc;n nhi&ecirc;n h&ugrave;ng vĩ của miền T&acirc;y Bắc Việt Nam. Với vẻ đẹp tự nhi&ecirc;n v&agrave; hương vị đặc trưng, mận Mộc Ch&acirc;u kh&ocirc;ng chỉ l&agrave; một m&oacute;n qu&agrave; của thi&ecirc;n nhi&ecirc;n m&agrave; c&ograve;n l&agrave; niềm tự h&agrave;o của người d&acirc;n nơi đ&acirc;y.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Tr&aacute;i mận Mộc Ch&acirc;u thường c&oacute; h&igrave;nh d&aacute;ng nhỏ gọn, tr&ograve;n v&agrave; đều, với vỏ m&agrave;u đỏ hoặc t&iacute;m phủ một lớp mỏng tr&ecirc;n bề mặt. Khi chạm v&agrave;o, bạn c&oacute; thể cảm nhận được sự mịn m&agrave;ng v&agrave; mềm mại của vỏ mận, nhưng vẫn đủ chắc chắn để bảo vệ thịt mận b&ecirc;n trong. Thịt mận Mộc Ch&acirc;u thường mọng nước, gi&ograve;n v&agrave; ngọt ng&agrave;o, tạo ra một trải nghiệm thưởng thức tuyệt vời cho bất kỳ ai.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Mỗi quả mận Mộc Ch&acirc;u l&agrave; kết quả của sự chăm s&oacute;c v&agrave; t&acirc;m huyết của người d&acirc;n nơi đ&acirc;y trong qu&aacute; tr&igrave;nh trồng v&agrave; chăm s&oacute;c c&acirc;y trồng. Với đất đai phong ph&uacute; v&agrave; kh&iacute; hậu &ocirc;n h&ograve;a, Mộc Ch&acirc;u đ&atilde; tạo điều kiện thuận lợi cho việc trồng v&agrave; ph&aacute;t triển mận, từ đ&oacute; tạo n&ecirc;n một thương hiệu mận Mộc Ch&acirc;u nổi tiếng kh&ocirc;ng chỉ trong nước m&agrave; c&ograve;n tr&ecirc;n thị trường quốc tế.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Mận Mộc Ch&acirc;u kh&ocirc;ng chỉ l&agrave; một loại tr&aacute;i c&acirc;y ngon m&agrave; c&ograve;n l&agrave; biểu tượng của sự tươi mới v&agrave; ngọt ng&agrave;o của miền n&uacute;i T&acirc;y Bắc Việt Nam. Đặc sản n&agrave;y thường được sử dụng l&agrave;m nguy&ecirc;n liệu cho nhiều m&oacute;n ăn truyền thống v&agrave; cũng được đ&aacute;nh gi&aacute; cao trong việc chế biến c&aacute;c loại đồ uống v&agrave; mứt, l&agrave; một phần kh&ocirc;ng thể thiếu trong văn h&oacute;a ẩm thực của Việt Nam.&lt;/p&gt;\r\n', 1, '2024_04_27_11_39_57_man-moc-chau.png', 'kg'),
(5, 'Nấm Đùi Gà', 35000, 88, '&lt;p style=&quot;text-align: justify;&quot;&gt;Nấm đ&ugrave;i g&agrave;, với h&igrave;nh d&aacute;ng v&agrave; m&agrave;u sắc đặc trưng, l&agrave; một trong những loại nấm qu&yacute; hiếm m&agrave; thi&ecirc;n nhi&ecirc;n ưu &aacute;i ban tặng. Khi nh&igrave;n v&agrave;o, người ta thường nhớ đến h&igrave;nh ảnh của đ&ugrave;i g&agrave; với vẻ mềm mại v&agrave; phong c&aacute;ch tự nhi&ecirc;n.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Với h&igrave;nh d&aacute;ng giống như đ&ugrave;i g&agrave;, nấm n&agrave;y thường c&oacute; th&acirc;n d&agrave;i, mảnh mai, nhưng lại v&ocirc; c&ugrave;ng cứng c&aacute;p v&agrave; đều đặn. Phần đỉnh của nấm thường tr&ograve;n trịa, tạo n&ecirc;n vẻ đẹp đặc biệt, mềm mại nhưng vẫn đầy sức sống. M&agrave;u sắc của nấm đ&ugrave;i g&agrave; thường l&agrave; một sắc trắng tinh khiết, nhưng đ&ocirc;i khi lại c&oacute; những điểm nhỏ m&agrave;u n&acirc;u nhạt, tạo n&ecirc;n sự tinh tế v&agrave; sự hấp dẫn đặc biệt.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Khi cầm nấm đ&ugrave;i g&agrave; trong tay, cảm gi&aacute;c mềm mại v&agrave; m&aacute;t lạnh từ bề mặt của nấm lan tỏa ra, tạo n&ecirc;n một trải nghiệm tuyệt vời cho người sử dụng. M&ugrave;i hương tự nhi&ecirc;n của nấm c&ograve;n l&agrave; điểm nhấn kh&aacute;c biệt, mang lại sự hấp dẫn v&agrave; đặc biệt cho bữa ăn.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Nấm đ&ugrave;i g&agrave; kh&ocirc;ng chỉ l&agrave; một nguy&ecirc;n liệu qu&yacute; hiếm trong ẩm thực m&agrave; c&ograve;n l&agrave; biểu tượng của sự tinh tế v&agrave; độc đ&aacute;o trong tự nhi&ecirc;n. Được coi l&agrave; một loại nấm cao cấp, nấm đ&ugrave;i g&agrave; thường xuất hiện trong c&aacute;c m&oacute;n ăn sang trọng v&agrave; được sử dụng bởi c&aacute;c đầu bếp chuy&ecirc;n nghiệp v&agrave; những người s&agrave;nh ăn đam m&ecirc; nấm.&lt;/p&gt;\r\n', 2, '2024_04_27_12_50_21_nam-dui-ga.png', '200g'),
(6, 'Nấm Kim Châm', 16000, 94, '&lt;p style=&quot;text-align: justify;&quot;&gt;Nấm kim ch&acirc;m, một trong những loại nấm tự nhi&ecirc;n tuyệt vời, mang lại sự phong ph&uacute; v&agrave; độc đ&aacute;o cho thế giới ẩm thực. Với h&igrave;nh d&aacute;ng v&agrave; m&agrave;u sắc đặc trưng, nấm kim ch&acirc;m thu h&uacute;t &aacute;nh nh&igrave;n v&agrave; l&agrave;m say m&ecirc; những người y&ecirc;u th&iacute;ch nấm.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Nấm kim ch&acirc;m thường c&oacute; h&igrave;nh dạng giống như chiếc đồng xu, với phần th&acirc;n d&agrave;i v&agrave; phần đỉnh tr&ograve;n như một nắp chai. M&agrave;u sắc của nấm n&agrave;y thường l&agrave; một sắc đỏ tươi s&aacute;ng, nhưng cũng c&oacute; thể l&agrave; m&agrave;u cam hoặc m&agrave;u n&acirc;u đậm, t&ugrave;y thuộc v&agrave;o lo&agrave;i nấm cụ thể.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Khi cầm nấm kim ch&acirc;m, bạn c&oacute; thể cảm nhận được sự mềm mại v&agrave; linh hoạt của th&acirc;n nấm, c&ugrave;ng với độ cứng c&aacute;p của phần đỉnh. M&ugrave;i hương tự nhi&ecirc;n của nấm cũng l&agrave; điểm đặc biệt, thoang thoảng một hương thơm dịu nhẹ nhưng đầy quyến rũ.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Nấm kim ch&acirc;m kh&ocirc;ng chỉ l&agrave; một nguy&ecirc;n liệu tuyệt vời trong nấu ăn m&agrave; c&ograve;n được coi l&agrave; biểu tượng của sự tinh tế v&agrave; độc đ&aacute;o trong thế giới tự nhi&ecirc;n. Với vị ngọt tự nhi&ecirc;n v&agrave; chất dinh dưỡng cao, nấm kim ch&acirc;m thường được sử dụng trong nhiều m&oacute;n ăn độc đ&aacute;o v&agrave; hấp dẫn.&lt;/p&gt;\r\n', 2, '2024_04_27_12_54_13_nam-kim-cham.png', '150g'),
(7, 'Nấm Linh Chi Trắng', 25500, 97, '&lt;p style=&quot;text-align: justify;&quot;&gt;Nấm Linh Chi Trắng l&agrave; một trong những loại nấm qu&yacute; hiếm v&agrave; được coi l&agrave; &quot;thần dược&quot; trong y học truyền thống v&agrave; hiện đại. Với vẻ ngo&agrave;i đặc biệt v&agrave; gi&aacute; trị dinh dưỡng cao, nấm Linh Chi Trắng thu h&uacute;t sự ch&uacute; &yacute; của nhiều người với niềm tin v&agrave;o c&aacute;c lợi &iacute;ch sức khỏe m&agrave; n&oacute; mang lại.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Nấm Linh Chi Trắng thường c&oacute; h&igrave;nh d&aacute;ng như một c&aacute;i đĩa phẳng, phần tr&ecirc;n c&oacute; thể lồi l&ecirc;n nhẹ hoặc phẳng ho&agrave;n to&agrave;n, với m&agrave;u trắng tinh khiết bao phủ to&agrave;n bộ bề mặt. Với vẻ đẹp thanh lịch v&agrave; mềm mại, nấm Linh Chi Trắng thường gợi nhớ đến h&igrave;nh ảnh của sự tinh tế v&agrave; tinh khiết.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Khi cầm nấm Linh Chi Trắng trong tay, bạn c&oacute; thể cảm nhận được sự m&aacute;t lạnh v&agrave; mềm mại của bề mặt nấm. M&ugrave;i hương nhẹ nh&agrave;ng tự nhi&ecirc;n tỏa ra từ nấm cũng l&agrave; một điểm nhấn đặc biệt, tạo n&ecirc;n cảm gi&aacute;c thư th&aacute;i v&agrave; y&ecirc;n b&igrave;nh.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Nấm Linh Chi Trắng kh&ocirc;ng chỉ được coi l&agrave; một nguy&ecirc;n liệu qu&yacute; trong ẩm thực m&agrave; c&ograve;n l&agrave; một &quot;thần dược&quot; c&oacute; gi&aacute; trị trong y học truyền thống v&agrave; hiện đại. Với c&aacute;c hợp chất sinh học đặc biệt như polysaccharides, triterpenoids v&agrave; c&aacute;c dẫn chất vi lượng, nấm Linh Chi Trắng được cho l&agrave; c&oacute; nhiều lợi &iacute;ch cho sức khỏe, bao gồm hỗ trợ hệ miễn dịch, l&agrave;m giảm căng thẳng, v&agrave; tăng cường sức khỏe tim mạch.&lt;/p&gt;\r\n', 2, '2024_04_27_12_57_13_nam-linh-chi-trang.png', '125g'),
(8, 'Nấm Mỡ Trắng', 59000, 97, '&lt;p style=&quot;text-align: justify;&quot;&gt;Nấm Mỡ Trắng l&agrave; một trong những loại nấm phổ biến v&agrave; được ưa chuộng trong ẩm thực, nhờ v&agrave;o hương vị độc đ&aacute;o v&agrave; gi&aacute; trị dinh dưỡng của n&oacute;. Được biết đến với t&ecirc;n gọi khoa học l&agrave; Pleurotus Ostreatus, nấm mỡ trắng c&oacute; h&igrave;nh d&aacute;ng đặc trưng v&agrave; một loạt c&aacute;c ứng dụng trong nấu ăn.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Về h&igrave;nh d&aacute;ng, nấm mỡ trắng thường c&oacute; th&acirc;n d&agrave;i, mảnh mai v&agrave; m&agrave;u trắng, với một phần đỉnh rộng v&agrave; phẳng, giống như một b&aacute;nh đậu phộng. Mặt dưới của nấm thường c&oacute; một lớp m&agrave;ng mỏng, v&agrave; c&oacute; thể thay đổi từ trắng s&aacute;ng đến m&agrave;u hồng nhạt.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Khi chạm v&agrave;o, bạn c&oacute; thể cảm nhận được sự mịn m&agrave;ng v&agrave; mềm mại của bề mặt nấm mỡ trắng. M&ugrave;i hương tự nhi&ecirc;n của nấm cũng thường rất dễ chịu, với một gợi &yacute; nhẹ nh&agrave;ng của đất v&agrave; rau cỏ.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Nấm mỡ trắng l&agrave; một nguy&ecirc;n liệu phổ biến trong nấu ăn, c&oacute; thể được chế biến th&agrave;nh nhiều m&oacute;n ăn kh&aacute;c nhau như nấm x&agrave;o, nấm chi&ecirc;n, nấm nướng, hoặc thậm ch&iacute; l&agrave; nấm sấy kh&ocirc; để bảo quản. Đặc biệt, nấm mỡ trắng c&oacute; gi&aacute; trị dinh dưỡng cao, chứa nhiều protein v&agrave; chất xơ, c&ugrave;ng với một loạt c&aacute;c kho&aacute;ng chất v&agrave; vitamin, l&agrave;m cho n&oacute; trở th&agrave;nh một phần quan trọng của chế độ ăn uống l&agrave;nh mạnh.&lt;/p&gt;\r\n', 2, '2024_04_27_12_59_00_nam-mo-trang.png', '200g'),
(9, 'Rau Cải Ngồng', 24500, 97, '&lt;p style=&quot;text-align: justify;&quot;&gt;Rau cải ngồng, một loại rau xanh tươi m&aacute;t v&agrave; gi&agrave;u dinh dưỡng, đ&atilde; trở th&agrave;nh một phần quan trọng trong ẩm thực v&agrave; chế biến thực phẩm. Với vẻ đẹp tự nhi&ecirc;n v&agrave; hương vị tươi ngon, rau cải ngồng kh&ocirc;ng chỉ l&agrave; nguồn cung cấp dồi d&agrave;o chất dinh dưỡng m&agrave; c&ograve;n l&agrave;m cho bữa ăn trở n&ecirc;n hấp dẫn hơn.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Rau cải ngồng thường c&oacute; l&aacute; mảnh v&agrave; mềm mại, m&agrave;u xanh đậm với c&aacute;c g&acirc;n l&aacute; r&otilde; r&agrave;ng. Nh&igrave;n từ xa, c&acirc;y cải ngồng thường cao v&agrave; c&oacute; h&igrave;nh d&aacute;ng đặc trưng với c&aacute;c l&aacute; mảnh nhưng d&agrave;i v&agrave; nhọn về ph&iacute;a cuối l&aacute;. Cảm gi&aacute;c khi chạm v&agrave;o l&aacute; rau cải ngồng l&agrave; một sự mịn m&agrave;ng v&agrave; m&aacute;t lạnh, tạo cảm gi&aacute;c dễ chịu khi tiếp x&uacute;c.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;M&ugrave;i hương của rau cải ngồng thường rất tươi mới v&agrave; dễ chịu, mang lại cảm gi&aacute;c sảng kho&aacute;i v&agrave; tự nhi&ecirc;n. Đ&acirc;y thực sự l&agrave; một trong những loại rau tươi ngon v&agrave; hấp dẫn nhất để thưởng thức.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Rau cải ngồng kh&ocirc;ng chỉ l&agrave; một nguồn cung cấp vitamin v&agrave; kho&aacute;ng chất quan trọng, m&agrave; c&ograve;n c&oacute; nhiều lợi &iacute;ch cho sức khỏe như hỗ trợ ti&ecirc;u h&oacute;a, l&agrave;m giảm nguy cơ c&aacute;c bệnh về tim mạch, v&agrave; cung cấp năng lượng cho cơ thể. Đồng thời, rau cải ngồng cũng l&agrave; nguy&ecirc;n liệu tuyệt vời để chế biến th&agrave;nh nhiều m&oacute;n ăn ngon v&agrave; hấp dẫn trong bữa ăn h&agrave;ng ng&agrave;y.&lt;/p&gt;\r\n', 3, '2024_04_27_13_05_00_rau-cai-ngong.png', '500g'),
(10, 'Cà Tím', 14500, 97, '&lt;p style=&quot;text-align: justify;&quot;&gt;C&agrave; t&iacute;m, với m&agrave;u sắc đậm đ&agrave; v&agrave; hương vị đặc trưng, l&agrave; một trong những loại rau củ phổ biến v&agrave; gi&agrave;u dinh dưỡng trong ẩm thực to&agrave;n cầu. Với vẻ đẹp tự nhi&ecirc;n v&agrave; sự linh hoạt trong việc chế biến, c&agrave; t&iacute;m đ&atilde; trở th&agrave;nh một phần quan trọng của nhiều m&oacute;n ăn ngon v&agrave; dinh dưỡng.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;C&agrave; t&iacute;m thường c&oacute; h&igrave;nh d&aacute;ng d&agrave;i h&igrave;nh trụ, với m&agrave;u t&iacute;m đậm đặc trưng b&ecirc;n ngo&agrave;i. B&ecirc;n trong, c&agrave; t&iacute;m thường c&oacute; thịt m&agrave;u kem hoặc trắng, t&ugrave;y thuộc v&agrave;o loại c&agrave; t&iacute;m cụ thể. Cảm gi&aacute;c khi chạm v&agrave;o c&agrave; t&iacute;m thường l&agrave; mềm mại v&agrave; mịn m&agrave;ng, với lớp vỏ mỏng bảo vệ phần thịt b&ecirc;n trong.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;M&ugrave;i hương của c&agrave; t&iacute;m thường rất dễ chịu v&agrave; hấp dẫn, với một gợi &yacute; nhẹ nh&agrave;ng của đất v&agrave; rau cỏ. Đặc biệt, khi chế biến, c&agrave; t&iacute;m c&oacute; thể ph&aacute;t ra một hương thơm đặc trưng v&agrave; hấp dẫn, tạo n&ecirc;n một m&ugrave;i vị đặc biệt cho m&oacute;n ăn.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;C&agrave; t&iacute;m l&agrave; một nguồn cung cấp chất chống oxy h&oacute;a mạnh mẽ, vitamin v&agrave; kho&aacute;ng chất, bao gồm kali, mangan v&agrave; vitamin C. C&agrave; t&iacute;m cũng chứa một số hợp chất c&oacute; thể gi&uacute;p cải thiện sức khỏe tim mạch v&agrave; hỗ trợ hệ ti&ecirc;u h&oacute;a. Đồng thời, với sự đa dạng trong việc chế biến từ nấu, x&agrave;o, hấp đến nướng, c&agrave; t&iacute;m l&agrave; một lựa chọn tuyệt vời để th&ecirc;m v&agrave;o chế độ ăn h&agrave;ng ng&agrave;y.&lt;/p&gt;\r\n', 3, '2024_04_27_13_08_12_ca-tim.png', '500g'),
(11, 'Cà Chua', 24500, 98, '&lt;p style=&quot;text-align: justify;&quot;&gt;C&agrave; chua, với m&ugrave;i vị tươi ngon v&agrave; độ dinh dưỡng cao, l&agrave; một trong những loại quả rau phổ biến v&agrave; được ưa chuộng tr&ecirc;n to&agrave;n thế giới.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;M&ugrave;i hương của c&agrave; chua thường rất tươi mới v&agrave; đặc trưng, c&oacute; một gợi &yacute; dịu nhẹ của đất v&agrave; c&acirc;y cỏ. M&ugrave;i vị của c&agrave; chua c&oacute; thể biến đổi t&ugrave;y thuộc v&agrave;o loại v&agrave; độ ch&iacute;n của quả, từ một hương vị ngọt ng&agrave;o v&agrave; chua nhẹ đến một hương vị nồng n&agrave;n v&agrave; đậm đ&agrave; hơn, đặc biệt l&agrave; khi c&agrave; chua ch&iacute;n đỏ ho&agrave;n to&agrave;n. Một số loại c&agrave; chua c&ograve;n c&oacute; thể mang lại một gợi &yacute; nhẹ của axit, tạo ra một cảm gi&aacute;c sảng kho&aacute;i tr&ecirc;n đầu lưỡi.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Chất dinh dưỡng trong c&agrave; chua rất phong ph&uacute; v&agrave; đa dạng. C&agrave; chua l&agrave; một nguồn cung cấp lớn của vitamin C, một chất chống oxy h&oacute;a mạnh mẽ c&oacute; thể gi&uacute;p củng cố hệ miễn dịch v&agrave; bảo vệ cơ thể khỏi c&aacute;c t&aacute;c động của c&aacute;c gốc tự do. Ngo&agrave;i ra, c&agrave; chua cũng chứa lượng lớn vitamin A, K v&agrave; c&aacute;c kho&aacute;ng chất như kali v&agrave; mangan. Ch&uacute;ng cũng l&agrave; một nguồn cung cấp chất xơ quan trọng, gi&uacute;p hỗ trợ qu&aacute; tr&igrave;nh ti&ecirc;u h&oacute;a v&agrave; duy tr&igrave; sức khỏe của hệ ti&ecirc;u h&oacute;a. Đặc biệt, c&agrave; chua c&ograve;n chứa lycopene, một chất chống oxy h&oacute;a c&oacute; thể gi&uacute;p giảm nguy cơ mắc bệnh tim mạch v&agrave; một số loại ung thư.&lt;/p&gt;\r\n', 3, '2024_04_27_13_11_11_ca-chua.png', '500g'),
(12, 'Bắp Cải Tím', 29500, 99, '&lt;p style=&quot;text-align: justify;&quot;&gt;Bắp cải t&iacute;m, với m&agrave;u sắc đặc trưng v&agrave; hương vị độc đ&aacute;o, l&agrave; một loại rau củ gi&agrave;u dinh dưỡng v&agrave; phổ biến trong ẩm thực.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;M&ugrave;i hương của bắp cải t&iacute;m thường rất tươi m&aacute;t v&agrave; dễ chịu, với một gợi &yacute; nhẹ nh&agrave;ng của đất v&agrave; rau cỏ. M&ugrave;i vị của bắp cải t&iacute;m c&oacute; thể phản &aacute;nh sự ngọt ng&agrave;o v&agrave; dịu d&agrave;ng của loại rau củ n&agrave;y, đồng thời c&oacute; thể cảm nhận được một ch&uacute;t đắng nhẹ, t&ugrave;y thuộc v&agrave;o c&aacute;ch chế biến v&agrave; mức độ ch&iacute;n của bắp cải.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Bắp cải t&iacute;m l&agrave; một nguồn cung cấp chất dinh dưỡng quan trọng, bao gồm vitamin C, K v&agrave; c&aacute;c vitamin nh&oacute;m B. N&oacute; cũng chứa nhiều kho&aacute;ng chất như kali, mangan v&agrave; chất xơ, gi&uacute;p cải thiện sức khỏe tim mạch v&agrave; hệ ti&ecirc;u h&oacute;a. Đặc biệt, bắp cải t&iacute;m c&ograve;n l&agrave; một nguồn cung cấp chất chống oxy h&oacute;a, gi&uacute;p bảo vệ cơ thể khỏi tổn thương từ c&aacute;c gốc tự do.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Bắp cải t&iacute;m cũng được biết đến với chứa c&aacute;c hợp chất c&oacute; thể gi&uacute;p giảm nguy cơ mắc bệnh ung thư v&agrave; tăng cường hệ miễn dịch. Với khả năng giảm c&acirc;n v&agrave; duy tr&igrave; c&acirc;n nặng ổn định, bắp cải t&iacute;m cũng l&agrave; một lựa chọn phổ biến cho những người đang ăn ki&ecirc;ng hoặc muốn duy tr&igrave; lối sống l&agrave;nh mạnh.&lt;/p&gt;\r\n', 3, '2024_04_27_13_15_18_bap-cai-tim.png', '500g'),
(13, 'Quả Mít', 60000, 99, '&lt;p style=&quot;text-align:justify&quot;&gt;M&iacute;t dai, một loại tr&aacute;i c&acirc;y nhiệt đới phổ biến, mang lại hương vị ngọt ng&agrave;o v&agrave; chất dinh dưỡng cho thực đơn h&agrave;ng ng&agrave;y.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;Với m&ugrave;i hương tinh tế v&agrave; dễ chịu, m&iacute;t dai thường khiến người ta li&ecirc;n tưởng đến hương thơm tự nhi&ecirc;n của tr&aacute;i c&acirc;y ch&iacute;n mọng. M&ugrave;i vị của m&iacute;t dai thường đậm đ&agrave;, ngọt ngọt v&agrave; hơi b&eacute;o, với hậu vị đặc trưng mềm mại tr&ecirc;n đầu lưỡi.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;Chất dinh dưỡng trong m&iacute;t dai l&agrave; kh&ocirc;ng thể phủ nhận. N&oacute; l&agrave; một nguồn gi&agrave;u kali, magi&ecirc; v&agrave; vitamin nh&oacute;m B, đặc biệt l&agrave; vitamin B6. M&iacute;t dai cũng cung cấp một lượng nhất định chất xơ, gi&uacute;p hỗ trợ ti&ecirc;u h&oacute;a v&agrave; duy tr&igrave; sức khỏe của hệ ti&ecirc;u h&oacute;a. Ngo&agrave;i ra, m&iacute;t dai c&ograve;n chứa c&aacute;c chất chống oxy h&oacute;a tự nhi&ecirc;n như vitamin C v&agrave; carotenoids, gi&uacute;p bảo vệ cơ thể khỏi t&aacute;c động của c&aacute;c gốc tự do v&agrave; tăng cường hệ miễn dịch.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:justify&quot;&gt;M&iacute;t dai kh&ocirc;ng chỉ ngon khi thưởng thức trực tiếp, m&agrave; c&ograve;n rất phong ph&uacute; v&agrave; đa dạng trong việc sử dụng trong c&aacute;c m&oacute;n ăn. Bạn c&oacute; thể tận dụng m&iacute;t dai để l&agrave;m m&oacute;n salad tr&aacute;i c&acirc;y tươi ngon, hay chế biến th&agrave;nh m&iacute;t xi&ecirc;n nướng tr&ecirc;n than hoặc nướng trong l&ograve; để tạo ra một hương vị đặc biệt. M&iacute;t dai cũng c&oacute; thể được sử dụng trong c&aacute;c m&oacute;n ch&egrave;, sinh tố hoặc kem m&iacute;t, đem lại sự ngọt ng&agrave;o v&agrave; m&aacute;t lạnh cho thực đơn của bạn. Đối với những người s&aacute;ng tạo, m&iacute;t dai c&ograve;n c&oacute; thể được chế biến th&agrave;nh m&iacute;t ch&iacute;n với sữa cốt dừa, một m&oacute;n tr&aacute;ng miệng độc đ&aacute;o v&agrave; ngon miệng.&lt;/p&gt;\r\n', 4, '2024_04_27_14_00_18_mit-dai.png', 'kg'),
(14, 'Quả Na', 52500, 96, '&lt;p style=&quot;text-align: justify;&quot;&gt;Quả na hay c&ograve;n gọi l&agrave; quả m&atilde;ng cầu, với vỏ ngo&agrave;i m&agrave;u v&agrave;ng v&agrave; hương vị ngọt ng&agrave;o, l&agrave; một trong những loại tr&aacute;i c&acirc;y nhiệt đới phổ biến v&agrave; thơm ngon nhất tr&ecirc;n thế giới.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;M&ugrave;i hương của quả na thường rất dễ chịu v&agrave; ngọt ng&agrave;o, mang lại cảm gi&aacute;c tươi mới v&agrave; hấp dẫn. M&ugrave;i vị của quả na thường được mi&ecirc;u tả l&agrave; ngọt, b&eacute;o v&agrave; c&oacute; ch&uacute;t hơi chua nhẹ, t&ugrave;y thuộc v&agrave;o độ ch&iacute;n của quả. Hương vị đặc trưng n&agrave;y khiến cho việc thưởng thức quả na trở th&agrave;nh một trải nghiệm thực sự th&uacute; vị v&agrave; hấp dẫn.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Quả na l&agrave; một nguồn cung cấp chất dinh dưỡng đa dạng v&agrave; gi&agrave;u gi&aacute; trị. N&oacute; chứa nhiều vitamin C, vitamin A v&agrave; kali, c&ugrave;ng với một lượng nhất định chất xơ v&agrave; kali. Những chất n&agrave;y c&oacute; thể gi&uacute;p cải thiện sức khỏe tim mạch, hỗ trợ hệ ti&ecirc;u h&oacute;a v&agrave; tăng cường hệ miễn dịch.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Ngo&agrave;i việc thưởng thức trực tiếp, quả na c&ograve;n được sử dụng trong nhiều loại m&oacute;n ăn v&agrave; đồ uống kh&aacute;c nhau. Bạn c&oacute; thể tận dụng quả na để l&agrave;m sinh tố, kem, ch&egrave;, hoặc thậm ch&iacute; l&agrave; chế biến th&agrave;nh mứt để thưởng thức v&agrave;o m&ugrave;a lạnh. Đối với những người s&aacute;ng tạo, quả na cũng c&oacute; thể được kết hợp v&agrave;o c&aacute;c m&oacute;n salad hoặc m&oacute;n tr&aacute;ng miệng để tạo ra những hương vị mới mẻ v&agrave; độc đ&aacute;o.&lt;/p&gt;\r\n', 4, '2024_04_27_14_08_49_qua-na.png', '500g'),
(15, 'Quả Dưa Lưới', 112500, 99, '&lt;p style=&quot;text-align: justify;&quot;&gt;Dưa lưới, với vẻ ngo&agrave;i b&oacute;ng lo&aacute;ng v&agrave; hương vị m&aacute;t lạnh, l&agrave; một loại tr&aacute;i c&acirc;y phổ biến v&agrave; thơm ngon trong m&ugrave;a h&egrave;.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;M&ugrave;i hương của dưa lưới thường rất dễ chịu v&agrave; tươi mới, mang lại cảm gi&aacute;c sảng kho&aacute;i v&agrave; hấp dẫn. M&ugrave;i vị của dưa lưới thường được mi&ecirc;u tả l&agrave; ngọt ng&agrave;o v&agrave; m&aacute;t lạnh, với một gợi &yacute; nhẹ nh&agrave;ng của hương vị đặc trưng của tr&aacute;i c&acirc;y.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Dưa lưới l&agrave; một nguồn cung cấp nước lớn v&agrave; cung cấp một lượng nhất định chất xơ cho cơ thể. N&oacute; cũng chứa nhiều vitamin v&agrave; kho&aacute;ng chất, bao gồm vitamin C, kali v&agrave; magi&ecirc;. Những chất n&agrave;y kh&ocirc;ng chỉ gi&uacute;p cung cấp năng lượng m&agrave; c&ograve;n hỗ trợ hệ ti&ecirc;u h&oacute;a v&agrave; duy tr&igrave; sức khỏe của hệ thống miễn dịch.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Dưa lưới thường được thưởng thức trực tiếp, được th&aacute;i th&agrave;nh từng l&aacute;t mỏng v&agrave; ăn tươi ngon trong c&aacute;c bữa ăn nhẹ. N&oacute; cũng c&oacute; thể được sử dụng trong c&aacute;c m&oacute;n salad tr&aacute;i c&acirc;y, sinh tố hoặc chế biến th&agrave;nh c&aacute;c loại đồ uống m&aacute;t lạnh trong m&ugrave;a h&egrave;. Đối với những người s&aacute;ng tạo, dưa lưới cũng c&oacute; thể được sử dụng trong c&aacute;c m&oacute;n ăn chế biến hoặc kết hợp với c&aacute;c nguy&ecirc;n liệu kh&aacute;c để tạo ra c&aacute;c m&oacute;n tr&aacute;ng miệng độc đ&aacute;o v&agrave; ngon miệng.&lt;/p&gt;\r\n', 4, '2024_04_27_14_11_22_qua-dua-luoi.png', '1.5kg'),
(16, 'Quả Thanh Long', 55000, 95, '&lt;p style=&quot;text-align: justify;&quot;&gt;Thanh long ruột đỏ, một loại tr&aacute;i c&acirc;y đặc biệt với m&agrave;u sắc đẹp mắt v&agrave; hương vị l&ocirc;i cuốn, l&agrave; một nguồn dinh dưỡng tuyệt vời v&agrave; thường được người ta ưa chuộng trong m&ugrave;a h&egrave;.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;M&ugrave;i hương của thanh long ruột đỏ thường rất dễ chịu v&agrave; phảng phất hương thơm tự nhi&ecirc;n, mang lại cảm gi&aacute;c tươi mới v&agrave; sảng kho&aacute;i. M&ugrave;i vị của thanh long ruột đỏ thường được mi&ecirc;u tả l&agrave; ngọt ng&agrave;o, mềm mại v&agrave; c&oacute; độ gi&ograve;n của hạt nhỏ b&ecirc;n trong, tạo n&ecirc;n một trải nghiệm ẩm thực đặc biệt.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Thanh long ruột đỏ l&agrave; một nguồn cung cấp nước lớn, gi&uacute;p cung cấp v&agrave; duy tr&igrave; độ ẩm cho cơ thể. N&oacute; cũng chứa nhiều loại vitamin v&agrave; kho&aacute;ng chất, như vitamin C, vitamin B, kali v&agrave; magi&ecirc;, gi&uacute;p bổ sung năng lượng v&agrave; duy tr&igrave; sức khỏe tổng thể.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Thường được thưởng thức trực tiếp, thanh long ruột đỏ c&oacute; thể được cắt th&agrave;nh từng l&aacute;t hoặc m&uacute;i để ăn tươi ngon. N&oacute; cũng c&oacute; thể được sử dụng trong c&aacute;c m&oacute;n salad tr&aacute;i c&acirc;y, sinh tố hoặc chế biến th&agrave;nh c&aacute;c loại đồ uống m&aacute;t lạnh trong m&ugrave;a h&egrave;. Đối với những người s&aacute;ng tạo, thanh long ruột đỏ cũng c&oacute; thể được sử dụng trong c&aacute;c m&oacute;n tr&aacute;ng miệng, như sorbet hoặc kem, để tạo ra c&aacute;c m&oacute;n ngon v&agrave; hấp dẫn.&lt;/p&gt;\r\n', 4, '2024_04_27_14_14_21_qua-thanh-long.png', 'kg'),
(17, 'Cà Phê Đắk Lắk', 150000, 98, '&lt;p style=&quot;text-align: justify;&quot;&gt;Hạt c&agrave; ph&ecirc; Đắk Lắk, được trồng ở v&ugrave;ng cao nguy&ecirc;n nổi tiếng của Việt Nam, l&agrave; một trong những loại c&agrave; ph&ecirc; chất lượng cao v&agrave; được biết đến tr&ecirc;n to&agrave;n thế giới.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;M&ugrave;i hương của hạt c&agrave; ph&ecirc; Đắk Lắk thường ph&aacute;t ra một hương thơm đặc trưng, phức hợp v&agrave; mạnh mẽ, với c&aacute;c gợi &yacute; của hạt c&agrave; ph&ecirc; rang v&agrave; c&aacute;c hương vị tự nhi&ecirc;n từ m&ocirc;i trường trồng trọt. M&ugrave;i vị của c&agrave; ph&ecirc; Đắk Lắk thường được mi&ecirc;u tả l&agrave; đậm, nồng v&agrave; c&oacute; độ đắng vừa phải, với một lớp vị đắng dịu v&agrave; hậu vị d&agrave;i l&acirc;u.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Hạt c&agrave; ph&ecirc; Đắk Lắk được biết đến với chất lượng cao v&agrave; sự đa dạng về hương vị. C&agrave; ph&ecirc; Arabica thường chiếm ưu thế tại Đắk Lắk, tạo ra những hạt c&agrave; ph&ecirc; c&oacute; hương vị mềm mại, axit tương đối cao v&agrave; hậu vị đặc trưng. Trong khi đ&oacute;, c&agrave; ph&ecirc; Robusta cũng được trồng ở Đắk Lắk, mang lại hương vị mạnh mẽ, đầy đặn v&agrave; hậu vị đắng đặc trưng.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Hạt c&agrave; ph&ecirc; Đắk Lắk kh&ocirc;ng chỉ được ưa chuộng với hương vị tuyệt vời m&agrave; c&ograve;n với chất lượng cao v&agrave; sự t&ocirc;n trọng với m&ocirc;i trường. Nhiều người y&ecirc;u c&agrave; ph&ecirc; tr&ecirc;n khắp thế giới đều đ&aacute;nh gi&aacute; cao c&agrave; ph&ecirc; Đắk Lắk với hương vị đặc trưng v&agrave; chất lượng vượt trội.&lt;/p&gt;\r\n', 5, '2024_04_27_14_36_40_ca-phe-hat.png', 'kg'),
(18, 'Hạt Tiêu Đen', 60000, 99, '&lt;p style=&quot;text-align: justify;&quot;&gt;Hạt ti&ecirc;u đen l&agrave; sản phẩm cuối c&ugrave;ng của qu&aacute; tr&igrave;nh chế biến ti&ecirc;u từ tr&aacute;i ti&ecirc;u. Sau khi qua c&aacute;c bước chế biến như thu hoạch, sơ chế v&agrave; phơi kh&ocirc;, tr&aacute;i ti&ecirc;u sẽ chuyển từ m&agrave;u xanh hoặc đỏ sang m&agrave;u đen.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;M&ugrave;i hương của hạt ti&ecirc;u đen thường ph&aacute;t ra một hương thơm đặc trưng, đậm đ&agrave; v&agrave; cay nồng, với một gợi &yacute; nhẹ nh&agrave;ng của c&aacute;c loại gia vị kh&aacute;c như hạt ti&ecirc;u xanh hoặc ti&ecirc;u đỏ. M&ugrave;i vị của hạt ti&ecirc;u đen thường được m&ocirc; tả l&agrave; cay nồng v&agrave; đắng, với một vị cay sắc n&eacute;t v&agrave; một ch&uacute;t ngọt nhẹ, t&ugrave;y thuộc v&agrave;o loại v&agrave; chất lượng của hạt ti&ecirc;u.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Hạt ti&ecirc;u đen thường được sử dụng rộng r&atilde;i trong ẩm thực tr&ecirc;n to&agrave;n thế giới, từ việc gia vị cho c&aacute;c m&oacute;n ăn đến việc chế biến c&aacute;c loại gia vị kh&aacute;c nhau như ti&ecirc;u xanh hoặc ti&ecirc;u đỏ. N&oacute; cũng thường được sử dụng trong việc l&agrave;m gia vị cho c&aacute;c m&oacute;n nướng, x&agrave;o, hấp v&agrave; chi&ecirc;n, đem lại hương vị đặc trưng v&agrave; một ch&uacute;t cay nồng cho m&oacute;n ăn. Đồng thời, hạt ti&ecirc;u đen cũng c&oacute; thể được sử dụng trong việc l&agrave;m gia vị cho c&aacute;c loại sốt, nước chấm v&agrave; c&aacute;c m&oacute;n ăn kh&aacute;c để tạo ra hương vị phong ph&uacute; v&agrave; đa dạng.&lt;/p&gt;\r\n', 5, '2024_04_27_14_39_18_hat-tieu-den.png', '100g'),
(19, 'Măng Nứa Khô', 59900, 98, '&lt;p style=&quot;text-align: justify;&quot;&gt;Măng nứa kh&ocirc; l&agrave; một loại măng nứa được chế biến th&ocirc;ng qua qu&aacute; tr&igrave;nh sấy kh&ocirc;, tạo ra một sản phẩm dễ bảo quản v&agrave; sử dụng trong nhiều m&oacute;n ăn kh&aacute;c nhau.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;M&ugrave;i hương của măng nứa kh&ocirc; thường rất đặc trưng v&agrave; đậm đ&agrave;, với một gợi &yacute; nhẹ của hương vị tự nhi&ecirc;n từ măng nứa v&agrave; qu&aacute; tr&igrave;nh chế biến. M&ugrave;i vị của măng nứa kh&ocirc; thường được m&ocirc; tả l&agrave; độc đ&aacute;o, hương vị đậm đ&agrave; v&agrave; cay nồng, với một ch&uacute;t ngọt nhẹ nh&agrave;ng từ măng nứa tự nhi&ecirc;n v&agrave; qu&aacute; tr&igrave;nh sấy kh&ocirc;.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Măng nứa kh&ocirc; thường được sử dụng trong nhiều m&oacute;n ăn truyền thống v&agrave; hiện đại. Ch&uacute;ng c&oacute; thể được sử dụng trong c&aacute;c m&oacute;n nướng, x&agrave;o, hầm, hoặc c&oacute; thể được th&ecirc;m v&agrave;o c&aacute;c m&oacute;n canh v&agrave; m&igrave;. Măng nứa kh&ocirc; cũng thường được sử dụng như một th&agrave;nh phần ch&iacute;nh trong c&aacute;c m&oacute;n salad hoặc được chế biến th&agrave;nh c&aacute;c m&oacute;n ăn như spring roll hoặc salad măng.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Ngo&agrave;i ra, măng nứa kh&ocirc; cũng được coi l&agrave; một loại thức ăn bổ dưỡng v&agrave; gi&agrave;u chất xơ, cung cấp nhiều dưỡng chất cho cơ thể. Điều n&agrave;y khiến cho măng nứa kh&ocirc; trở th&agrave;nh một lựa chọn phổ biến trong việc l&agrave;m phong ph&uacute; th&ecirc;m hương vị v&agrave; dinh dưỡng cho bữa ăn h&agrave;ng ng&agrave;y.&lt;/p&gt;\r\n', 5, '2024_04_27_14_42_13_mang-nua-kho.png', 'gói'),
(20, 'Măng Trúc Khô', 53900, 99, '&lt;p style=&quot;text-align: justify;&quot;&gt;Măng tr&uacute;c kh&ocirc; l&agrave; một loại măng tr&uacute;c được chế biến th&ocirc;ng qua qu&aacute; tr&igrave;nh sấy kh&ocirc;, tạo ra một sản phẩm dễ bảo quản v&agrave; sử dụng trong nhiều m&oacute;n ăn.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;M&ugrave;i hương của măng tr&uacute;c kh&ocirc; thường rất đặc trưng v&agrave; đậm đ&agrave;, với một gợi &yacute; nhẹ của hương vị tự nhi&ecirc;n từ măng tr&uacute;c v&agrave; qu&aacute; tr&igrave;nh chế biến. M&ugrave;i vị của măng tr&uacute;c kh&ocirc; thường được m&ocirc; tả l&agrave; độc đ&aacute;o, hương vị đậm đ&agrave; v&agrave; cay nồng, với một ch&uacute;t ngọt nhẹ nh&agrave;ng từ măng tr&uacute;c tự nhi&ecirc;n v&agrave; qu&aacute; tr&igrave;nh sấy kh&ocirc;.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Măng tr&uacute;c kh&ocirc; thường được sử dụng trong nhiều m&oacute;n ăn truyền thống v&agrave; hiện đại. Ch&uacute;ng c&oacute; thể được sử dụng trong c&aacute;c m&oacute;n nướng, x&agrave;o, hầm, hoặc c&oacute; thể được th&ecirc;m v&agrave;o c&aacute;c m&oacute;n canh v&agrave; m&igrave;. Măng tr&uacute;c kh&ocirc; cũng thường được sử dụng như một th&agrave;nh phần ch&iacute;nh trong c&aacute;c m&oacute;n salad hoặc được chế biến th&agrave;nh c&aacute;c m&oacute;n ăn như spring roll hoặc salad măng.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Ngo&agrave;i ra, măng tr&uacute;c kh&ocirc; cũng được coi l&agrave; một loại thực phẩm gi&agrave;u chất xơ v&agrave; dưỡng chất, gi&uacute;p cung cấp nhiều dưỡng chất cho cơ thể. Điều n&agrave;y khiến cho măng tr&uacute;c kh&ocirc; trở th&agrave;nh một lựa chọn phổ biến trong việc l&agrave;m phong ph&uacute; th&ecirc;m hương vị v&agrave; dinh dưỡng cho bữa ăn h&agrave;ng ng&agrave;y.&lt;/p&gt;\r\n', 5, '2024_04_27_14_44_09_mang-truc-kho.png', 'gói');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `star` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `product_id`, `star`, `created_at`, `updated_at`, `comment`) VALUES
(1, 1, 2, 5, '2024-04-29 09:43:55', '2024-04-29 16:46:43', 'Nhãn tươi ngon đúng chuẩn Hưng Yên'),
(2, 1, 4, 5, '2024-04-29 09:48:11', '2024-04-29 16:48:11', 'Tìm mãi mới thấy có cửa hàng bán mận Mộc Châu, ăn rất ngon.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `gender` int(11) NOT NULL,
  `birthday` date DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `phone`, `address`, `gender`, `birthday`, `status`) VALUES
(1, 'Phương Anh', '$2y$10$Lnfs58/bfDRYtRr/7cf6.OJWOiWWGullrlnALA8oS6qbxOf42eK16', 'phuonganh.sdv@gmail.com', '0392342795', 'Đông Anh - Hà Nội', 1, '2020-01-26', 1),
(2, 'Lưu Văn Vũ', '$2y$10$jw4afM28h90z0NayP7ypt.yG4qZtbyJF35Ya1mQnGgWkd7N6eZG6S', 'vukakaqwe3@gmail.com', '0344296287', 'Phan Xá - Uy Nỗ - Đông Anh- Hà Nội', 0, '1995-12-13', 1),
(3, 'Hoài Thương', '$2y$10$GGcQzlTtYcJCd/qPvgBEVumrwqtp1XJiSeJnQ/ZKwSevJF4ggneku', 'hoaithuong.sdv@gmail.com', '0336511728', 'Đông Anh - Hà Nội', 1, '1995-10-04', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_ibfk_1` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_ibfk_1` (`category_id`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_ibfk_1` (`product_id`),
  ADD KEY `ratings_ibfk_2` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
