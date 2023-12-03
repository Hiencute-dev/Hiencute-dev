-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2023 at 04:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cnpm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonthuoc`
--

CREATE TABLE `chitietdonthuoc` (
  `idDonThuoc` int(11) NOT NULL,
  `idThuoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `chitietdonthuoc`
--

INSERT INTO `chitietdonthuoc` (`idDonThuoc`, `idThuoc`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 5),
(3, 6),
(4, 8),
(4, 18),
(4, 19),
(5, 9),
(5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `donthuoc`
--

CREATE TABLE `donthuoc` (
  `idDonThuoc` int(11) NOT NULL,
  `idHoSoBenhNhan` int(11) NOT NULL,
  `TenDonThuoc` varchar(50) NOT NULL,
  `chuandoan` varchar(255) NOT NULL,
  `keluan` varchar(255) NOT NULL,
  `ngayKeDon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `donthuoc`
--

INSERT INTO `donthuoc` (`idDonThuoc`, `idHoSoBenhNhan`, `TenDonThuoc`, `chuandoan`, `keluan`, `ngayKeDon`) VALUES
(1, 1, 'Đơn thuốc 1', 'Sốt cao', 'Đau đầu, mệt mỏi', '2023-11-01'),
(2, 2, 'Đơn thuốc 2', 'Viêm họng', 'Đau họng, ho', '2023-11-02'),
(3, 3, 'Đơn thuốc 3', 'Tiểu đường', 'Mệt mỏi, đau chân', '2023-11-03'),
(4, 4, 'Đơn thuốc 4', 'Cảm lạnh', 'Sổ mũi, ho', '2023-11-04'),
(5, 5, 'Đơn thuốc 5', 'Đau lưng', 'Đau lưng, khó di chuyển', '2023-11-05'),
(6, 6, 'Đơn thuốc 6', 'Tiêu chảy', 'Buồn nôn, mất nước', '2023-11-06'),
(7, 7, 'Đơn thuốc 7', 'Huyết áp cao', 'Chóng mặt, đau đầu', '2023-11-07'),
(8, 8, 'Đơn thuốc 8', 'Đau răng', 'Đau răng, sưng nướu', '2023-11-08'),
(9, 9, 'Đơn thuốc 9', 'Mất ngủ', 'Khó ngủ, mệt mỏi', '2023-11-09'),
(10, 10, 'Đơn thuốc 10', 'Viêm khớp', 'Đau khớp, khó di chuyển', '2023-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `hosobenhnhan`
--

CREATE TABLE `hosobenhnhan` (
  `idHoSoBenhNhan` int(11) NOT NULL,
  `tenBenhNhan` varchar(255) NOT NULL,
  `tuoi` int(11) NOT NULL,
  `gioiTinh` varchar(20) NOT NULL,
  `diaChi` varchar(255) NOT NULL,
  `soDienThoai` varchar(11) NOT NULL,
  `nhomMau` varchar(10) DEFAULT NULL,
  `canNang` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hosobenhnhan`
--

INSERT INTO `hosobenhnhan` (`idHoSoBenhNhan`, `tenBenhNhan`, `tuoi`, `gioiTinh`, `diaChi`, `soDienThoai`, `nhomMau`, `canNang`) VALUES
(1, 'Nguyễn Văn A', 25, 'Nam', '123 Đường ABC, Quận XYZ, Thành phố HCM', '0123456789', 'A', 60.5),
(2, 'Lê Thị B', 30, 'Nữ', '456 Đường DEF, Quận UVW, Thành phố Hà Nội', '0987654321', 'B', 55.2),
(3, 'Trần Văn C', 40, 'Nam', '789 Đường GHI, Quận MNO, Thành phố Đà Nẵng', '0369852147', 'AB', 70),
(4, 'Phạm Thị D', 35, 'Nữ', '321 Đường JKL, Quận PQR, Thành phố Hải Phòng', '0765432198', 'O', 65.8),
(5, 'Hoàng Văn E', 28, 'Nam', '654 Đường STU, Quận IJK, Thành phố Cần Thơ', '0912345678', 'B', 62.1),
(6, 'Vũ Thị F', 42, 'Nữ', '987 Đường VWX, Quận YZA, Thành phố Nha Trang', '0543219876', 'A', 68.7),
(7, 'Đặng Văn G', 50, 'Nam', '159 Đường OPQ, Quận RST, Thành phố Huế', '0321654987', 'AB', 75.3),
(8, 'Ngô Thị H', 33, 'Nữ', '753 Đường UVW, Quận XYZ, Thành phố Vũng Tàu', '0876543210', 'B', 58.9),
(9, 'Lý Văn I', 45, 'Nam', '258 Đường KLM, Quận NOP, Thành phố Đà Lạt', '0654321098', 'O', 63.4),
(10, 'Hồ Thị K', 29, 'Nữ', '951 Đường EFG, Quận HIJ, Thành phố Đồng Nai', '0987654321', 'A', 61.7);

-- --------------------------------------------------------

--
-- Table structure for table `thuoc`
--

CREATE TABLE `thuoc` (
  `idThuoc` int(11) NOT NULL,
  `tenThuoc` varchar(525) NOT NULL,
  `soLuongUongTrenMotLan` float NOT NULL,
  `soLanUongTrenMotNgay` float NOT NULL,
  `soLuong` float NOT NULL,
  `donVi` varchar(50) NOT NULL,
  `doiTuongSuDung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `thuoc`
--

INSERT INTO `thuoc` (`idThuoc`, `tenThuoc`, `soLuongUongTrenMotLan`, `soLanUongTrenMotNgay`, `soLuong`, `donVi`, `doiTuongSuDung`) VALUES
(1, 'Paracetamol', 1, 3, 30, 'Viên', 'Người lớn'),
(2, 'Amoxicillin', 1, 2, 20, 'Viên', 'Người lớn'),
(3, 'Omeprazole', 1, 1, 15, 'Viên', 'Người lớn'),
(4, 'Loperamide', 2, 3, 25, 'Viên', 'Người lớn'),
(5, 'Dexchlorpheniramine', 1, 2, 18, 'Viên', 'Người lớn'),
(6, 'Ibuprofen', 1, 3, 30, 'Viên', 'Người lớn'),
(7, 'Cetirizine', 1, 1, 12, 'Viên', 'Người lớn'),
(8, 'Metformin', 1, 2, 20, 'Viên', 'Người lớn'),
(9, 'Diazepam', 1, 1, 10, 'Viên', 'Người lớn'),
(10, 'Aspirin', 1, 2, 15, 'Viên', 'Người lớn'),
(11, 'Metol', 1, 2, 23, 'viên', 'trẻ em'),
(12, 'Metol', 1, 2, 23, 'viên', 'trẻ em'),
(13, 'Metol', 1, 2, 23, 'viên', 'trẻ em'),
(14, 'Metol', 1, 2, 23, 'viên', 'trẻ em'),
(15, 'Metol', 1, 2, 23, 'viên', 'trẻ em'),
(16, 'Metol', 1, 2, 23, 'viên', 'trẻ em'),
(17, 'Metol', 1, 2, 23, 'viên', 'trẻ em'),
(18, 'Metol', 2, 2, 4, 'viên', 'trẻ em'),
(19, 'podey', 1, 2, 23, 'viên', 'người lớn'),
(20, 'podey', 1, 2, 23, 'viên', 'người lớn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chitietdonthuoc`
--
ALTER TABLE `chitietdonthuoc`
  ADD PRIMARY KEY (`idDonThuoc`,`idThuoc`),
  ADD KEY `idThuoc` (`idThuoc`);

--
-- Indexes for table `donthuoc`
--
ALTER TABLE `donthuoc`
  ADD PRIMARY KEY (`idDonThuoc`),
  ADD KEY `idHoSoBenhNhan` (`idHoSoBenhNhan`);

--
-- Indexes for table `hosobenhnhan`
--
ALTER TABLE `hosobenhnhan`
  ADD PRIMARY KEY (`idHoSoBenhNhan`);

--
-- Indexes for table `thuoc`
--
ALTER TABLE `thuoc`
  ADD PRIMARY KEY (`idThuoc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donthuoc`
--
ALTER TABLE `donthuoc`
  MODIFY `idDonThuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hosobenhnhan`
--
ALTER TABLE `hosobenhnhan`
  MODIFY `idHoSoBenhNhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `thuoc`
--
ALTER TABLE `thuoc`
  MODIFY `idThuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonthuoc`
--
ALTER TABLE `chitietdonthuoc`
  ADD CONSTRAINT `chitietdonthuoc_ibfk_1` FOREIGN KEY (`idDonThuoc`) REFERENCES `donthuoc` (`idDonThuoc`),
  ADD CONSTRAINT `chitietdonthuoc_ibfk_2` FOREIGN KEY (`idThuoc`) REFERENCES `thuoc` (`idThuoc`);

--
-- Constraints for table `donthuoc`
--
ALTER TABLE `donthuoc`
  ADD CONSTRAINT `donthuoc_ibfk_1` FOREIGN KEY (`idHoSoBenhNhan`) REFERENCES `hosobenhnhan` (`idHoSoBenhNhan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
