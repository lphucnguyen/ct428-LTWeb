-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 22, 2021 lúc 10:02 AM
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
('DH1KH008', 'KD1', 1, 45000, 0),
('DH1KH008', 'TD2', 1, 30000, 0),
('DH1KH010', 'TD1', 2, 30000, 0),
('DH1KH010', 'TD3', 2, 500000, 0),
('DH1KH1', 'TD2', 1, 30000, 0),
('DH1KH1', 'TD3', 1, 259999, 0),
('DH2KH1', 'TD1', 1, 15000, 0);

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
('DH10KH1', 'KH1', 'NV001', '2021-10-24', '2021-10-27', 'Da Xac Nhan', 'Vĩnh Long'),
('DH1KH008', 'KH008', NULL, '2021-11-05', '2021-11-08', 'Chưa xác nhận', 'Vĩnh Long 123'),
('DH1KH010', 'KH010', NULL, '2021-11-11', '2021-11-14', 'Chưa xác nhận', 'Vĩnh Long 123'),
('DH1KH1', 'KH1', NULL, '2021-10-24', '2021-10-27', 'Chưa xác nhận', 'Open your list address'),
('DH2KH1', 'KH1', NULL, '2021-10-24', '2021-10-27', 'Chưa xác nhận', 'Vĩnh Long'),
('DH3KH1', 'KH1', NULL, '2021-10-24', '2021-10-27', 'Chưa xác nhận', 'Vĩnh Long'),
('DH4KH1', 'KH1', NULL, '2021-10-24', '2021-10-27', 'Chưa xác nhận', 'Vĩnh Long'),
('DH5KH1', 'KH1', NULL, '2021-10-24', '2021-10-27', 'Chưa xác nhận', 'Vĩnh Long'),
('DH6KH1', 'KH1', NULL, '2021-10-24', '2021-10-27', 'Chưa xác nhận', 'Vĩnh Long'),
('DH7KH1', 'KH1', NULL, '2021-10-24', '2021-10-27', 'Chưa xác nhận', 'Vĩnh Long'),
('DH8KH1', 'KH1', NULL, '2021-10-24', '2021-10-27', 'Chưa xác nhận', 'Vĩnh Long'),
('DH9KH1', 'KH1', NULL, '2021-10-24', '2021-10-27', 'Chưa xác nhận', 'Vĩnh Long');

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
('KD1', 'Hàng Hóa 2', 'qweqwrqwtqwtqwqwr', 45000, 24, 'Truyen'),
('TD1', 'Khí chất của một cô gái', '', 15000, 114, 'Truyen'),
('TD2', 'Lá thư gửi cho chính mình', '', 30000, 12, 'Truyen'),
('TD3', 'Mắt biếc', '', 250000, 239, 'Truyen');

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
('KD1category-1.png', 'KD1category-1.png', 'KD1'),
('KD1category-2.png', 'KD1category-2.png', 'KD1'),
('KD1logo.png', 'KD1logo.png', 'KD1'),
('KD1product-1.png', 'KD1product-1.png', 'KD1'),
('TD1banner-2.png', 'TD1banner-2.png', 'TD1'),
('TD2product-1.png', 'TD2product-1.png', 'TD2'),
('TD3banner-1.png', 'TD3banner-1.png', 'TD3');

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
('KH008', 'Phuc Nguyen', 'Amazon', '0843388318', '0847851275', 'nguyen123'),
('KH010', 'Phuc Nguyen', 'Amazon', '0843388318', '0847851275', '0d1b805b6c8f5c27be2e7eaa61b6f846'),
('KH1', 'Lê Phúc Nguyên', 'Amazon', '0914764104', '8282824', 'nguyen123'),
('KH2', 'Nguyễn Tấn Phát', '', '0947487512', '545457', 'phat123'),
('KH3', 'Vũ Ngọc Long', 'SunLight', '0125462512', '15154512', 'long123'),
('KH4', 'Nguyễn Trương Mỹ Xuyên', 'SunLight', '0943198820', '4787874', 'xuyen123'),
('KH5', 'Trần Thị Bé Ba', 'Amazon', '0154451652', '1511514', 'ba123'),
('KH6', 'baba', 'ádasd', '13124214', '123213', '123123');

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
('Truyen', 'Truyện đọc');

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
('NV001', 'Trần Đăng Giang Hòa', 'Nhân Viên', 'Tân Hiệp, Kiên Giang', 914764104, '0d1b805b6c8f5c27be2e7eaa61b6f846'),
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
