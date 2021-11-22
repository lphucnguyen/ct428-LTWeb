-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 22, 2021 lúc 11:29 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlydathang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonDH` char(10) COLLATE utf8_bin NOT NULL,
  `MSHH` char(20) COLLATE utf8_bin NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaDatHang` int(11) NOT NULL,
  `GiamGia` int(11) NOT NULL
) ;

--
-- Đang đổ dữ liệu cho bảng `chitietdathang`
--

INSERT INTO `chitietdathang` (`SoDonDH`, `MSHH`, `SoLuong`, `GiaDatHang`, `GiamGia`) VALUES
('DH1KH1', 'HH6', 1, 499000, 0),
('DH1KH1', 'TD1', 1, 249000, 0),
('DH2KH1', 'HH6', 1, 499000, 0),
('DH2KH1', 'KD1', 1, 45000, 0),
('DH3KH1', 'HH6', 2, 998000, 0),
('DH3KH1', 'KD1', 1, 45000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` char(10) COLLATE utf8_bin NOT NULL,
  `MSKH` char(10) COLLATE utf8_bin NOT NULL,
  `MSNV` char(10) COLLATE utf8_bin DEFAULT NULL,
  `NgayDH` date NOT NULL,
  `NgayGH` date NOT NULL,
  `TrangThaiDH` varchar(45) COLLATE utf8_bin NOT NULL,
  `DiaChi` varchar(45) COLLATE utf8_bin NOT NULL
) ;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `NgayGH`, `TrangThaiDH`, `DiaChi`) VALUES
('DH1KH1', 'KH1', NULL, '2021-11-22', '2021-11-25', 'Chưa xác nhận', 'Cần Thơ'),
('DH2KH1', 'KH1', NULL, '2021-11-22', '2021-11-25', 'Chưa xác nhận', 'Vĩnh Long 123'),
('DH3KH1', 'KH1', NULL, '2021-11-22', '2021-11-25', 'Chưa xác nhận', 'Vĩnh Long 123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachikh`
--

CREATE TABLE `diachikh` (
  `MaDC` char(10) COLLATE utf8_bin NOT NULL,
  `DiaChi` varchar(200) COLLATE utf8_bin NOT NULL,
  `MSKH` char(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `diachikh`
--

INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES
('KH008DC1', 'Vĩnh Long 123', 'KH008'),
('KH008DC2', '', 'KH008'),
('KH010DC1', 'Vĩnh Long 123', 'KH010'),
('KH010DC2', 'Cần Thơ 645456', 'KH010'),
('KH1DC1', 'Vĩnh Long 123', 'KH1'),
('KH1DC2', 'Cần Thơ', 'KH1'),
('KH2DC1', 'Ninh Kiều - Cần Thơ', 'KH2'),
('KH3DC1', 'Bạc Liêu', 'KH3'),
('KH3DC2', 'Bạc Liêu Sóc Trăng', 'KH3'),
('KH3DC3', 'Sóc Trăng', 'KH3'),
('KH3DC4', 'Cà Mau', 'KH3'),
('KH4DC1', 'Rạch Sỏi - Kiên Giang', 'KH4'),
('KH5DC1', 'Thạnh Đông', 'KH5'),
('KH6DC1', '213142', 'KH6');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` char(10) COLLATE utf8_bin NOT NULL,
  `TenHH` varchar(45) COLLATE utf8_bin NOT NULL,
  `QuyCach` text COLLATE utf8_bin NOT NULL,
  `Gia` int(11) NOT NULL,
  `SoLuongHang` int(11) NOT NULL,
  `MaLoaiHang` char(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `QuyCach`, `Gia`, `SoLuongHang`, `MaLoaiHang`) VALUES
('HH5', 'Quần Jean Ống Suông Vải Selvedge', 'Sự hợp tác của UNIQLO’s Popular với nhà thiết kế huyền thoại Jil Sander tiếp tục hành trình xác định trang phục hiện đại toàn cầu cùng ý nghĩa mà nó mang lại.\r\n- Vải Selvedge có độ co giãn tự nhiên cho cảm giác vừa vặn hoàn hảo.\r\n- Một sản phẩm cần thiết cho tủ quần áo.\r\n- Miếng dán độc quyền có logo + J.\r\n- Các nút, đinh tán và khóa kéo có khắc + J độc đáo.', 149000, 30, 'Quan'),
('HH6', 'Quần Jeans Ống Suông Cạp Cao Dáng Regular', '- Bộ sưu tập Uniqlo U là sự hiện thực hóa của đội ngũ nhà thiết kế quốc tế tận tâm và lành nghề có trụ sở tại Trung Tâm Nghiên Cứu Và Phát Triển Paris của chúng tôi do Giám đốc Nghệ thuật Christophe Lemaire lãnh đạo.\r\n- Một sản phẩm cổ điển mới từ Uniqlo U.\r\n- Quần jean cạp cao ống đứng với cảm giác chân thực thoải mái của vải denim 100% cotton.', 499000, 40, 'Quan'),
('KD1', 'FAPAS REVERSE LOGO T-SHIRT', '- Bộ sưu tập Uniqlo U là sự hiện thực hóa của đội ngũ nhà thiết kế quốc tế tận tâm và lành nghề có trụ sở tại Trung tâm Nghiên cứu và Phát triển Paris của chúng tôi do Giám đốc Nghệ thuật Christophe Lemaire lãnh đạo.\r\n- Vải jersey dệt kim mịn.\r\n- Vừa vặn, thoải mái.\r\n- Thiết kế túi trước ngực cổ điển.\r\n- Thiết kế đường viền cổ áo giúp giữ dáng sau khi giặt.\r\n- Họa tiết sọc với màu sắc đặc trưng của Uniqlo U.', 45000, 24, 'AoThun'),
('TD1', 'Áo Thun Kẻ Sọc Cổ Tròn Ngắn Tay', '- Bộ sưu tập Uniqlo U là sự hiện thực hóa của đội ngũ nhà thiết kế quốc tế tận tâm và lành nghề có trụ sở tại Trung tâm Nghiên cứu và Phát triển Paris của chúng tôi do Giám đốc Nghệ thuật Christophe Lemaire lãnh đạo.\r\n- Vải jersey dệt kim mịn.\r\n- Vừa vặn, thoải mái.\r\n- Thiết kế túi trước ngực cổ điển.\r\n- Thiết kế đường viền cổ áo giúp giữ dáng sau khi giặt.\r\n- Họa tiết sọc với màu sắc đặc trưng của Uniqlo U.', 249000, 30, 'AoThun');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhhanghoa`
--

CREATE TABLE `hinhhanghoa` (
  `mahinh` char(25) COLLATE utf8_bin NOT NULL,
  `tenhinh` varchar(45) COLLATE utf8_bin NOT NULL,
  `MSHH` char(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `hinhhanghoa`
--

INSERT INTO `hinhhanghoa` (`mahinh`, `tenhinh`, `MSHH`) VALUES
('HH5hh-5-01.jpg', 'HH5hh-5-01.jpg', 'HH5'),
('HH5hh-5-02.jpg', 'HH5hh-5-02.jpg', 'HH5'),
('HH6hh-6-01.jpg', 'HH6hh-6-01.jpg', 'HH6'),
('HH6hh-6-02.jpg', 'HH6hh-6-02.jpg', 'HH6'),
('KD1hh-2-01.jpg', 'KD1hh-2-01.jpg', 'KD1'),
('KD1hh-2-02.jpg', 'KD1hh-2-02.jpg', 'KD1'),
('TD1hh-3-01.jpg', 'TD1hh-3-01.jpg', 'TD1'),
('TD1hh-3-02.jpg', 'TD1hh-3-02.jpg', 'TD1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` char(10) COLLATE utf8_bin NOT NULL,
  `HoTenKH` varchar(45) COLLATE utf8_bin NOT NULL,
  `TenCongTy` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `SoDienThoai` varchar(11) COLLATE utf8_bin NOT NULL,
  `SoFax` varchar(11) COLLATE utf8_bin DEFAULT NULL,
  `Pass` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `TenCongTy`, `SoDienThoai`, `SoFax`, `Pass`) VALUES
('KH008', 'Phuc Nguyen', 'Amazon', '0843388318', '0847851275', '6e97123d7be0c38c111ff6d7d6b274cd'),
('KH010', 'Phuc Nguyen', 'Amazon', '0843388318', '0847851275', '81dc9bdb52d04dc20036dbd8313ed055'),
('KH1', 'Lê Phúc Nguyên', 'Amazon', '0914764104', '8282824', '81dc9bdb52d04dc20036dbd8313ed055'),
('KH2', 'Nguyễn Tấn Phát', '', '0947487512', '545457', '81dc9bdb52d04dc20036dbd8313ed055'),
('KH3', 'Vũ Ngọc Long', 'SunLight', '0125462512', '15154512', '81dc9bdb52d04dc20036dbd8313ed055'),
('KH4', 'Nguyễn Trương Mỹ Xuyên', 'SunLight', '0943198820', '4787874', '81dc9bdb52d04dc20036dbd8313ed055'),
('KH5', 'Trần Thị Bé Ba', 'Amazon', '0154451652', '1511514', '81dc9bdb52d04dc20036dbd8313ed055'),
('KH6', 'baba', 'ádasd', '13124214', '123213', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` char(10) COLLATE utf8_bin NOT NULL,
  `TenLoaiHang` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES
('AoThun', 'Áo Thun'),
('Quan', 'Quần');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` char(10) COLLATE utf8_bin NOT NULL,
  `HoTenNV` varchar(45) COLLATE utf8_bin NOT NULL,
  `ChucVu` varchar(45) COLLATE utf8_bin NOT NULL,
  `DiaChi` varchar(45) COLLATE utf8_bin NOT NULL,
  `SoDienThoai` int(11) NOT NULL,
  `Pass` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `Pass`) VALUES
('NV001', 'Trần Đăng Giang Hòa', 'Nhân Viên', 'Tân Hiệp, Kiên Giang', 914764104, 'e10adc3949ba59abbe56e057f20f883e'),
('NV002', 'Võ Khánh Quí', 'Nhân Viên', 'Ô Môn, Cần Thơ', 945745681, 'e10adc3949ba59abbe56e057f20f883e');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`SoDonDH`,`MSHH`),
  ADD KEY `fkmshhdh` (`MSHH`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `fkmskhdh` (`MSKH`),
  ADD KEY `fkmsnv` (`MSNV`);

--
-- Chỉ mục cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD PRIMARY KEY (`MaDC`),
  ADD KEY `fkMskh` (`MSKH`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `fkmlh` (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD PRIMARY KEY (`mahinh`),
  ADD KEY `fk_mahh` (`MSHH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Chỉ mục cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `fkmshhdh` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fksodondh` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `fkmskhdh` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`),
  ADD CONSTRAINT `fkmsnv` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`);

--
-- Các ràng buộc cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD CONSTRAINT `fkMskh` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `fkmlh` FOREIGN KEY (`MaLoaiHang`) REFERENCES `loaihanghoa` (`MaLoaiHang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD CONSTRAINT `fk_mahh` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
