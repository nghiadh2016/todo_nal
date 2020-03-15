-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 15, 2020 lúc 07:27 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `todo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id_status` int(11) DEFAULT NULL,
  `name_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `status`
--

INSERT INTO `status` (`id_status`, `name_status`) VALUES
(1, 'Planning'),
(2, 'Doing'),
(3, 'Complate');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `todotable`
--
DROP TABLE IF EXISTS `todotable`;
CREATE TABLE `todotable` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `todotable`
--

INSERT INTO `todotable` (`id`, `name`, `date_start`, `date_end`, `id_status`) VALUES
(1, 'Accpent to NAL', '2020-03-08', '2020-03-17', 3),
(2, 'ok', '2020-03-04', '2020-03-06', 1),
(4, 'test', '2020-03-02', '2020-03-03', 1),
(5, 'some thing', '2020-03-03', '2020-03-05', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

-- Chỉ mục cho bảng `todotable`
--
ALTER TABLE `todotable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `todotable`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

-- AUTO_INCREMENT cho bảng `status`
--
ALTER TABLE `todotable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
