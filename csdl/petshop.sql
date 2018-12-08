-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 08, 2018 lúc 03:30 PM
-- Phiên bản máy phục vụ: 5.7.23
-- Phiên bản PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `petshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdh`
--

DROP TABLE IF EXISTS `chitietdh`;
CREATE TABLE IF NOT EXISTS `chitietdh` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DatHangID` int(11) DEFAULT NULL,
  `SPID` int(11) DEFAULT NULL,
  `SL` int(11) DEFAULT NULL,
  `TinhTrang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgayDuKienGiao` date DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  KEY `DatHangID` (`DatHangID`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `chitietdh`
--

INSERT INTO `chitietdh` (`ID`, `DatHangID`, `SPID`, `SL`, `TinhTrang`, `NgayDuKienGiao`) VALUES
(1, 1, 1, 2, NULL, '2018-12-04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE IF NOT EXISTS `danhmuc` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TenDM` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  KEY `ID` (`ID`) USING BTREE,
  KEY `ID_2` (`ID`) USING BTREE,
  KEY `ID_3` (`ID`) USING BTREE,
  KEY `ID_4` (`ID`) USING BTREE,
  KEY `ID_5` (`ID`) USING BTREE,
  KEY `ID_6` (`ID`) USING BTREE,
  KEY `ID_7` (`ID`) USING BTREE,
  KEY `ID_8` (`ID`) USING BTREE,
  KEY `ID_9` (`ID`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`ID`, `TenDM`) VALUES
(1, 'Lồng-Nệm-Nhà'),
(2, 'Quần áo'),
(3, 'Phụ Kiện'),
(4, 'Balo vận chuyển'),
(5, 'Dụng cụ Ăn uống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

DROP TABLE IF EXISTS `dathang`;
CREATE TABLE IF NOT EXISTS `dathang` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) DEFAULT NULL,
  `TongTien` float DEFAULT NULL,
  `TinhTrang` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgayTao` date DEFAULT NULL,
  `NgayDuKienGiao` date DEFAULT NULL,
  `DiaChiGiao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TenNguoiNhan` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  KEY `UserID` (`UserID`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachinhan`
--

DROP TABLE IF EXISTS `diachinhan`;
CREATE TABLE IF NOT EXISTS `diachinhan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) DEFAULT NULL,
  `TenNguoiNhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChiGiao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  KEY `UserID` (`UserID`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

DROP TABLE IF EXISTS `nguoidung`;
CREATE TABLE IF NOT EXISTS `nguoidung` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Pass` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhAnh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Quyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nsx`
--

DROP TABLE IF EXISTS `nsx`;
CREATE TABLE IF NOT EXISTS `nsx` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TenNSX` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  KEY `ID` (`ID`) USING BTREE,
  KEY `ID_2` (`ID`) USING BTREE,
  KEY `ID_3` (`ID`) USING BTREE,
  KEY `ID_4` (`ID`) USING BTREE,
  KEY `ID_5` (`ID`) USING BTREE,
  KEY `ID_6` (`ID`) USING BTREE,
  KEY `ID_7` (`ID`) USING BTREE,
  KEY `ID_8` (`ID`) USING BTREE,
  KEY `ID_9` (`ID`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `nsx`
--

INSERT INTO `nsx` (`ID`, `TenNSX`) VALUES
(1, 'Cty TNHH DuyCho'),
(2, 'Shop of Pet'),
(3, 'HienNynn Shop'),
(4, 'Hna Shop'),
(5, 'May Mặc Shop');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TenSP` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LoaiSP` int(255) DEFAULT NULL,
  `MoTa` text COLLATE utf8_unicode_ci,
  `NgayTao` date DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `HinhAnh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `XuatXu` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaNSX` int(11) DEFAULT NULL,
  `Gia` float DEFAULT NULL,
  `LuotXem` int(10) UNSIGNED ZEROFILL DEFAULT '0000000000',
  `TinhTrang` varchar(0) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  KEY `MaNSX` (`MaNSX`) USING BTREE,
  KEY `LoaiSP` (`LoaiSP`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ID`, `TenSP`, `LoaiSP`, `MoTa`, `NgayTao`, `SoLuong`, `HinhAnh`, `XuatXu`, `MaNSX`, `Gia`, `LuotXem`, `TinhTrang`) VALUES
(1, 'Áo Khủng Long', 2, 'Chất liệu lông nhung mềm mại giữ ấm tốt\r\nKiểu dáng dễ thương,  ngộ nghĩnh\r\nMàu sắc xanh rêu bắt mắt\r\nKhi mặc lên trông thú cưng của b như 1 chú khủng long nhỏ nhắn đáng yêu Kích thước: \r\nSize XS: Lưng (19cm); Ngực (32cm); Cổ (22cm)\r\nSize S: Lưng (23cm); Ngực (37cm); Cổ (25cm)\r\nSize M: Lưng (28cm); Ngực (42cm); Cổ (28cm)\r\nSize L: Lưng (33cm); Ngực (42cm); Cổ (31cm)\r\nSize XL: Lưng (38cm); Ngực (52cm); Cổ (34cm)\r\nSize 2XL: Lưng (42cm); Ngực (57cm); Cổ (37cm)\r\nSai số 2-3cm', '2018-10-07', 99, 'images/product/2.1.jpg', 'Việt Nam', 5, 99000, 0000000000, NULL),
(2, 'Áo con ong', 2, 'Áo con ong\r\nChất liệu: fleece mềm mại và thoải mái, giữ ấm  tốt  cho cún yêu\r\nBạn có muốn bé #cún nhà bạn trở nên đặc biệt so với bạn bè xung quanh?\r\nVới những bộ quần áo thú cưng thật đẹp và đầy cá tính, chúng tôi có thể giúp bé yêu nhà bạn tỏa sáng\r\nChất liệu mềm mại, êm ái Không kích ứng da, mẫu mã, kích thước đa dạng', '2018-10-06', 99, 'imgaes/product/2.2.jpg', 'Việt Nam', 5, 200000, 0000000000, NULL),
(3, ' Áo Pijama', 2, 'Áo pijama dùng cho bé mặc ngủ rất đáng yêu, nhưng cũn không kém xinh khi mặc bình thường. Chỉ có màu đen. Có sz to nhỏ. Thích hợp với bé 7kg đổ lại.', '2018-07-19', 99, 'images/product/2.3.jpg', 'Việt Nam', 5, 250000, 0000000000, NULL),
(4, 'Áo pikachu dành cho chó mèo', 2, 'Vải bông ấm \r\n-kiểu dáng dễ thương \r\nThích hợp vưới thú cưng của bản khi đông về \r\nBảng size :\r\nXS : <1,2kg\r\n- S : cho cún từ 1-2,5kg\r\n- M : cho cún từ 2-4kg\r\n- L : cho cún từ 3,5-6kg\r\n- XL : cho cún từ 5,5-8kg\r\n- XXL : cho cún từ 8-11kg', '2018-06-25', 99, 'images/product/2.4.jpg', 'Việt Nam', 5, 200000, 0000000000, NULL),
(5, 'Áo tuần lộc ', 2, 'Vải bông ấm \r\n-kiểu dáng dễ thương \r\nThích hợp vưới thú cưng của bản khi đông về \r\nBảng size :\r\nXS : <1,2kg\r\n XS : <1,2kg\r\n- S : cho cún từ 1-2,5kg\r\n- M : cho cún từ 2-3kg\r\n- L : cho cún từ 3-5kg\r\n- XL : cho cún từ 5,5-8kg\r\n- XXL : cho cún từ 8-11kg', '2017-06-04', 99, 'images/product/2.5.jpg', 'Việt Nam', 5, 300000, 0000000000, NULL),
(6, 'Nhà vải cao cấp', 1, '\r\nNhà cho thú cưng dễ thương.\r\nChất liệu vải cao cấp, mềm bảo vệ thú cưng của bạn.\r\nCó các size :\r\n(S) Đường kính ngoài / chiều dài 26 * 26 * 28cm, lỗ cửa 14 * 13cm, đường kính bên trong / chiều dài 24 * 24 * 26cm, thích hợp cho chó và mèo khoảng 2 kg.\r\n     (M) bên ngoài đường kính / chiều dài 31 * 31 * 33cm, lỗ 17 * 15cm; đường kính bên trong / chiều dài 29 * 29 * 31cm, khoảng 4 kg cho chó và mèo.\r\n     (L) Đường kính ngoài / chiều dài 36 * 36 * 38cm, lỗ cửa 20 * 18cm, đường kính trong / chiều dài 34 * 34 * 36cm, thích hợp cho chó và mèo khoảng 6 kg.\r\n     (XL) Đường kính ngoài / chiều dài 43 * 43 * 45cm, lỗ cửa 22 * ​​22cm, đường kính trong / chiều dài 40 * 40 * 42cm, thích hợp cho chó và mèo khoảng 11 kg.\r\n (XXL) Đường kính ngoài / chiều dài 48 * 48 * 48cm, chiều cao cửa 25 * 25cm, đường kính trong / chiều dài 45 * 45 * 45cm, thích hợp cho chó và mèo khoảng 16 kg.\r\n\r\n', '2018-11-25', 99, 'images/product/1.1.jpg', 'Việt Nam', 5, 500000, 0000000000, ''),
(7, 'Lồng sắt sơn tĩnh điện', 1, 'Lồng sắt sơn tĩnh điện với màu sắc đẹp tươi sáng. Lồng được thiết kế bởi khung sắt rất chắc chắn. Được phủ lớp sơn tĩnh điện có đặc tính chống mài mòn cao. Chịu lực tốt và tuổi thọ lâu dài.', '2018-10-29', 99, 'images/product/1.2.jpg', 'việt nam', 1, 600000, 0000000000, NULL),
(8, 'Đầm công chúa ren', 2, 'Đầm công chúa vải ren\r\nChất liệu: Polyester\r\nChăm sóc may mặc: Giặt tay\r\nKiểu tay áo: Không tay\r\nPhong cách: Thời trang\r\nCác mùa: Mùa hè\r\nCác tính năng: Hoa hồng, Hoa văn trái tim, Ren, Thoải mái\r\nChi tiết kích thước\r\n[Kích thước XS của chúng tôi] Chiều dài: 25cm / 9,84 \", Ngực: 31cm / 12,20\", Cổ áo: 24cm / 9,45 \"(xấp xỉ)\r\n[Kích thước của chúng tôi S] Chiều dài: 31cm / 12.20 \", Ngực: 36cm / 14,17\", Cổ áo: 28cm / 11,02 \"(Khoảng)\r\n[Kích thước của chúng tôi M] Chiều dài: 36cm / 14,17 \", Ngực: 41cm / 16,14\", Cổ áo: 32cm / 12,60 \"(Khoảng)\r\n[Kích thước của chúng tôi L] Chiều dài: 41cm / 16,14 \", Ngực: 46cm / 18,11\", Cổ áo: 36cm / 14,17 \"(Khoảng)', '2018-12-07', 99, 'images/product/2.6.jpg', 'Trung Quốc', 5, 197000, 0000000000, NULL),
(9, 'Ảo nỉ kitty', 2, 'Áo nỉ 4 chân hồng Kitty Dành cho chó mèo - CutePets\r\n- Chất liệu vải thun co dãn thoáng mát mang lại cho thú cưng cảm giác thoải mái nhất\r\nBảng chọn size:\r\n Size XS: Vòng ngực: 30cm, chiều dài thân: 20cm, vòng cổ 21cm (cân nặng 1 - 1.5kg)\r\n Size S: Vòng ngực: 36cm, chiều dài thân: 25cm, vòng cổ 24cm (cân nặng 1.5 - 2.5kg)\r\n Size M: Vòng ngực: 38cm, chiều dài thân: 28cm (cân nặng 2.5 - 3.5kg)\r\n Size L: Vòng ngực: 40cm, chiều dài thân: 30cm, vòng cổ 27cm (cân nặng 3.5 - 4.5kg)\r\n Size XL: Vòng ngực: 50cm, chiều dài thân: 40cm, vòng cổ 33cm (cân nặng 4,5 - 7kg)\r\n Size XXL: Vòng ngực: 55cm, chiều dài thân: 45cm, vòng cổ 36cm (cân nặng7 - 10kg)', '2018-12-03', 99, 'images/product/2.7.jpg', 'Việt Nam', 5, 70000, 0000000000, NULL),
(10, 'Áo nỉ tai gấu', 2, 'Áo nỉ tai gấu dành cho thú cưng vào mùa đông\r\n- Chất liệu vải nỉ :\r\nXS : <1,2kg\r\n- S : cho cún từ 1-2,5kg\r\n- M : cho cún từ 2-4kg\r\n- L : cho cún từ 3,5-6kg\r\n- XL : cho cún từ 5,5-8kg\r\n- XXL : cho cún từ 8-11kg', '2018-12-26', 99, 'images/product/2.8.jpg', 'Thái Lan', 3, 65000, 0000000000, NULL),
(11, 'Áo mưa ', 2, 'Áo nỉ tai gấu dành cho thú cưng vào mùa đông\r\n- Chất liệu nilong không thẩm\r\nbảng size :\r\nXS : <1,2kg\r\n- S : cho cún từ 1-2,5kg\r\n- M : cho cún từ 2-4kg\r\n- L : cho cún từ 3,5-6kg\r\n- XL : cho cún từ 5,5-8kg\r\n- XXL : cho cún từ 8-11kg', '2018-12-16', 99, 'images/product/2.9.jpg', 'Việt Nam', 1, 98000, 0000000000, NULL),
(12, 'Bộ cách cách ', 2, 'Nằm trong bộ sưu tập thời trang mùa hè siêu dễ thương cho Pet thương hiệu Puppy. Áo dáng thẳng mặc phía trước. chất liệu cao cấp. Thiết kế đẹp, kiểu dáng độc đáo, lạ mắt, thời trang mới cho mùa hè 2018. Bất cứ Boss nào cũng có thể dễ dàng mặc, rất chắc chắn, Siêu dễ thương. Bạn có thấy Pet của bạn rất ngộ nghĩnh và giống Búp bê không nào.\r\n\r\nKích thước:\r\n\r\nSize S: vòng ngực 40,5cm\r\n\r\nSize M: vòng ngực 45cm\r\n\r\nSize L: vòng ngực 46-52cm\r\n\r\nSize XL: vòng ngực 53-62cm', '2018-12-10', 99, 'images/product/2.10.jpg', 'Việt  Nam', 2, 110000, 0000000000, NULL),
(13, 'kimono cho chó', 2, 'kimonno cho chó \r\n- Chất liệu vải hoa mềm\r\n-Thích hợp diện đi các lễ hội \r\nbảng size :\r\nXS : <1,2kg\r\n- S : cho cún từ 1-2,5kg\r\n- M : cho cún từ 2-4kg\r\n- L : cho cún từ 3,5-6kg\r\n- XL : cho cún từ 5,5-8kg\r\n- XXL : cho cún từ 8-11kg', '2019-01-02', 99, 'images/product/2.11.jpg', 'Hàn Quốc', 5, 320000, 0000000000, NULL),
(14, 'sơmi cho chó  ', 2, 'áo sơmi cho chó\r\n-kiểu dáng  đơn giản với viền trắng sọc xanh \r\nbảng size :\r\nXS : <1,2kg\r\n- S : cho cún từ 1-2,5kg\r\n- M : cho cún từ 2-4kg\r\n- L : cho cún từ 3,5-6kg\r\n- XL : cho cún từ 5,5-8kg\r\n- XXL : cho cún từ 8-11kg', '2018-11-26', 99, 'images/product/2.12.jpg', 'Việt Nam', 5, 120000, 0000000000, NULL),
(15, 'Mắt kính thời trang retro', 3, '+ Kính mát thời trang cho chó mèo, Boss của bạn sẽ thật là sành điệu nhaaaaaa\r\n+ Boss siêu ngộ nghĩ với kính mắt thời trang nhiều màu sắc .\r\n+ Giúp cho các Boss chống bụi bặm khi ra đường.\r\n+ Kính mát  giúp bảo vệ mắt các bé trước tia cực tím và những tia có hại, khói bụi và mảnh vỡ, ngoài ra, kính mát còn có tác dụng cải thiện tầm nhìn xa. Bên cạnh những lý do trên thì lý do về thời trang cũng góp phần quan trọng không kém. ', '2018-12-23', 99, 'images/product/3.1.jpg', 'Việt Nam', 2, 55000, 0000000000, NULL),
(16, 'Mắt kính dây thun', 3, '-Kính dành cho bé >8kg\r\n+ Mắt kính giúp thú cưng tránh được bụi , gió , nắng…khi đi chơi xa \r\n+Thú cưng của bạn sẽ thật ngộ nghĩnh , dễ thương với những món đồ thời trang thật đẹp\r\n+ Chất liệu cao cấp mang lại phong cách sành điệu mỗi khi đi chơi cùng chủ', '2018-12-18', 99, 'images/product/3.3.jpg', 'Việt Nam', 2, 45000, 0000000000, NULL),
(17, 'Giày cho thú cưng', 3, 'Giày siêu đáng yêu cho boss với nhiều màu xinh lung linh \r\nChất liệu nhựa không thấm nước \r\nGồm nhiều size thoảng thích chọn lựa \r\nSize: SX - M - L - Xl - XXL', '2018-11-19', 99, 'images/product/3.2.jpg', 'Nhật Bản', 2, 310000, 0000000000, NULL),
(18, 'Mũ ông già noel', 3, 'Một mùa noel nữa lại tới sắm ngay cho boss chiếc mũ xinh đẹp ấm áp cũng đi chơi noel nào \r\nTa hồ lựa chọn với các size\r\nSize: SX - M - L - Xl - XXL', '2018-10-21', 99, 'images/product/3.4.jpg', 'Việt Nam', 5, 34000, 0000000000, NULL),
(19, 'rọ mõm mỏ vit cho chó', 3, 'Rọ mõm hình mỏ vịt cấu tạo bằng cao su có khả năng co giãn, đàn hồi cùng với tính thẩm mỹ cao sẽ tạo sự thoải mái nhất cho chú chó của bạn.\r\n\r\nRọ mõm mỏ vịt cho chó\r\n\r\nNếu bạn đang tìm kiếm 1 giải pháp hoàn hảo cho việc kiểm soát những chú cún nghịch ngợm của mình mỗi khi ra ngoài để chúng không cắn phá mọi người, không ăn uống linh tinh phải những thứ mất vệ sinh...thì rọ mõm mỏ vịt là 1 giải pháp rất hữu hiệu.\r\n\r\n- Được cầu tạo từ silicon dẻo nên sản phẩm không làm cún khó chịu khi đeo.\r\n\r\n- Đồng thời, Rọ mõm hình mỏ vịt được thiết kế sao cho cún vẫn dễ dàng hít thở trong khi đeo đồng thời cún vẫn có thể thò được lưỡi ra để điều chỉnh thân nhiệt (chó điều chỉnh thân nhiệt bằng lưỡi).\r\n\r\n- Bạn có thể đeo rọ mõm mỏ vịt cho cún trong và sau khi cắt móng, làm sạch tai hay làm đẹp cho cún để hạn chế cún cắn vào những chỗ vừa làm xong.\r\n\r\n- Có nhiều kích thước, màu sác khác nhau để bạn lựa chọn', '2018-12-31', 99, 'images/product/3.5.jpg', 'Việt Nam', 1, 50000, 0000000000, NULL),
(20, 'Vòng cổ chó cưng kèm khăn ', 3, 'Màu: đỏ, xanh, đen\r\nĐặc Điểm Nổi Bật Vòng cổ khăn tam giác vừa có thể dùng làm khăn quàng cổ vừa có thể dùng làm vòng cổ. Với hoa văn dễ thương in trên khăn giúp cho chó bạn nổi bật hơn khi đeo vào. Thích hợp cho chó loại nhỏ & \r\n\r\nXuda Pet shop cung cấp sỉ và lẻ các loại phụ kiện cho chó mèo, quần áo chó mèo, áo cho chó, áo cho mèo, dây dắt chó, rọ mỗm cho chó, thức ăn cho chó, thức ăn cho mèo, dây đeo chuông, bát ăn thú cưng, giày dép…', '2018-12-13', 99, 'images/product/3.6.jpg', 'Nhật Bản', 4, 45000, 0000000000, NULL),
(21, 'Vòng cổ chống liếm', 3, '\r\nKích thước Trung bình phù hợp nhất với vòng cổ 9,25 \"đến 10,75\" với độ sâu tổng thể là 6,5 \"\r\nLý tưởng cho chấn thương, phát ban và sau phẫu thuật. Làm việc tuyệt vời cho cả mèo và chó\r\nCổ áo phục hồi thiết kế trang phục sư tử này có trọng lượng nhẹ, mềm mại và thoải mái nhưng không thể che phủ phần cơ thể của thú cưng. Chủ sở hữu nên theo dõi ngay từ đầu\r\nĐóng cửa độc đáo cho phép chủ sở hữu thắt chặt hoặc nới lỏng, khi cần thiết\r\nThú cưng có thể ăn, ngủ và uống', '2018-12-29', 99, 'images/product/3.7.jpg', 'Trung Quốc', 3, 56000, 0000000000, NULL),
(22, 'Nhà quả dưa hấu ', 1, 'Nhà quả dưa hấu lớn Đặc điểm: - Bề mặt được làm từ chất liệu cotton thông thoáng, bên trong được lót gòn nhân tạo hoặc mút giúp thú cưng có chỗ nằm thật êm ái.', '2018-12-04', 99, 'images/product/1.3.jpg', 'Việt Nam', 1, 500000, 0000000000, NULL),
(23, 'Nệm thú cưng cao cấp ', 1, 'Nệm nằm dành cho thú cưng giống nhỏ <6kg\r\nNệm với chất liệu mềm mịn, có thể giặt phơi\r\n2 size cho bạn lựa chọn\r\n\r\nS: 37 * 34 cm\r\n\r\nM: 52 * 43 cm', '2018-12-25', 99, 'images/product/1.4.jpg', 'Việt Nam', 1, 275000, 0000000000, NULL),
(24, 'Nệm thú cưng vải ', 1, 'Có 3 size , S : 32x39 cm, M: 40x56 cm, L: 59x76 cm\r\nNệm siêu êm, siêu mềm, thích hợp khi tập cho thú biết đâu là chỗ ngủ\r\nChạm vào là bạn sẽ biết ngày chất lượng xịn thế nào\r\nCó luôn nệm êm, ấm\r\nQuá sướng cho cún và miu khi sở hữu món này luôn.', '2019-01-03', 99, 'images/product/1.5.jpg', 'Việt Nam', 1, 300000, 0000000000, NULL),
(25, 'Nệm da cao cấp', 1, 'Nệm có kích thước 58x48x17cm.\r\nXung quanh nệm được bọc bởi lớp da cao cấp, sang trọng.\r\nQuá sướng cho cún và miu khi sở hữu món này luôn', '2018-09-10', 99, 'images/product/1.6.jpg', 'Việt Nam', 3, 450000, 0000000000, NULL),
(26, 'Nệm hưu cao cổ', 1, 'Nệm hình hươu cao cổ ngộ nghĩnh cho thú cưng\r\n\r\nCó thể giặt bằng máy giặt hoặc giặt hấp\r\n\r\nKích thước: 70 x 65 cm', '2018-09-16', 99, 'images/product/1.7.jpg', 'Nhật Bản ', 3, 700000, 0000000000, NULL),
(27, 'Nhà nệm ', 1, 'Nhà nệm Nệm siêu êm, siêu mềm,thích hợp cho thú cưng dưới 12kg\r\nKích thước 37cm x 43cm x 37cm', '2018-12-21', 99, 'images/product/1.8.jpg', 'Việt Nam', 3, 750000, 0000000000, NULL),
(28, 'Nhà nệm cá mập', 1, 'Nệm có kích thước 40x40x32cm\r\nKiểu dáng cá mập dễ thương \r\nChất liểu nỉ mềm giúp thú cưng thoải mái  nắm ngủ \r\nQuá sướng cho cún và miu khi sở hữu món này luôn', '2018-07-30', 99, 'images/product/1.9.jpg', 'Việt Nam', 4, 960000, 0000000000, NULL),
(29, 'Đệm lồng túi vậnc huyển ', 4, 'THÔNG TIN SẢN PHẨM\r\n- Đệm đa năng dây rút cho thú cưng có chất liệu cotton thông thoáng, dễ vệ sinh, rất phù hợp với khí hậu nóng ẩm ở Việt Nam.\r\n- Đệm đa năng dây rút cho thú cưng có bề mặt nằm có lớp nệm tạo sự êm ái, thú cưng nhà bạn sẽ luôn có cảm giác được nâng niu và yêu chiều.\r\n- Thiết kế Đệm đa năng dây rút cho thú cưng với gam màu nổi bật và hình khúc xương ngộ nghĩnh mang đến sự quen thuộc và gần gũi cho chú cún đáng yêu trong nhà.\r\n', '2018-12-23', 99, 'images/product/1.10.jpg', 'Nhật Bản ', 4, 1120000, 0000000000, NULL),
(30, 'Balo vận chuyện chó mèo', 4, 'Balo Túi vận chuyển chó, mèo\r\nTúi vận chuyển chó mèo giúp bạn mang thú cưng của mình đi xa, về quê, đi khám chữa bệnh, dạo phố dễ dàng, thuận lợi.\r\nTúi chỉ bằng 1 chiếc ba lô đi học, đi du lịch của người nhưng được kết cấu chắc chắn, có lỗ thông khí đảm bảo cho thú cưng có thể thở\r\n\r\n', '2018-12-10', 99, 'images/product/4.1.jpg', 'Nhật Bản', 4, 150000, 0000000000, NULL),
(31, 'Địu lưới chó mèo', 4, ' Kích thước: \r\n+ Size S: Chiều dài mặt trước 21cm, chiều dài mặt sau 24cm, chiều rộng 17cm, dây đeo vai điều chỉnh được 59cm-96cm, phù hợp với eo 26-34cm\r\n+ Size M: Chiều dài mặt trước 25cm, chiều dài mặt sau 28cm, chiều rộng 20cm, dây đeo vai có thể điều chỉnh được 63cm-105cm, phù hợp với eo 34-40cm\r\n+ Size L: Chiều dài mặt trước 28cm, chiều dài mặt sau 31cm, chiều rộng 24cm, dây đeo vai điều chỉnh được 66cm-114cm, phù hợp với vòng tròn vòng eo 40-48cm\r\n\r\n- Chất liệu vải lưới rất thoải mái cho thú cưng \r\n- An toàn , tiện dụng ,dễ sử dụng : có thể thay thế cho các loại lồng hay túi vận chuyển khi đi xa ,du lịch cùng boss', '2018-12-24', 99, 'images/product/4.2.jpg', 'Việt Nam', 4, 170000, 0000000000, NULL),
(32, 'Ba lo phi hành  gia', 4, 'Phù hợp cho các bé dưới 6 kg.\r\n+ Sản phẩm có kèm tấm nệm lót cho bé thoải mái', '2018-11-19', 99, 'images/product/4.3.jpg', 'Việt Nam', 4, 150000, 0000000000, NULL),
(33, 'Ba lo thời trang cho chó', 4, 'Ba lô thiết kế thười trang nho gọn cho thú cưng mang trên lưng', '2018-12-09', 99, 'images/product/4.4.jpg', 'Hàn Quốc', 2, 120000, 0000000000, NULL),
(34, 'Bát inox màu', 5, 'Bát để đựng thức ăn cho chó mèo gồm nhiều màu và kích thước khác nhau cho bạn tha hồ lựa chọn', '2019-02-28', 99, 'images/product/5.1.jpg', 'Việt Nam', 2, 23000, 0000000000, NULL),
(35, 'Xương nơ cho chó', 5, 'Để đáp ứng bản năng nhai gặm của các chó cảnh, các nhà sản xuất đã tạo ra các sản phẩm xương giả cho các con chó, với kích thước, mẫu mã, mùi vị đa dạng và thậm chí còn hấp dẫn các chú chó của chúng ta hơn cả những miếng xương thật.', '2018-10-23', 99, 'images/product/5.2.jpg', 'Việt Nam', 2, 50000, 0000000000, NULL),
(36, 'Dụng cụ cho uống', 5, 'Dụng cụ uống thuốc dùng cho thú cưng được các bác sỹ thú y thiết kế.\r\n\r\nThiết kế đơn giản dễ dàng trong khâu uống thuốc, không sợ thuốc chảy ra ngoài, an tòan cho các bé.\r\n\r\nChất liệu nhựa an toàn cho sức khỏe thú cưng và mang lại giá trị sử dụng dài lâu.\r\n\r\nCó 2 ống cao su thay thế', '2018-11-28', 99, 'images/product/5.3.jpg', 'Hàn Quốc', 2, 30000, 0000000000, NULL),
(37, 'Bàn chải đánh răng', 5, 'Trọng lượng nhẹ và kích thước nhỏ\r\nDễ mang theo\r\nBền và thiết thực\r\nLoại bỏ mùi hôi miệng\r\nLoại bỏ cặn thức ăn\r\nLựa chọn LIỆU nhựa ABS thân thiện với môi trường', '2018-11-29', 99, 'images/product/5.4.jpg', 'Hàn Quốc', 1, 59000, 0000000000, NULL),
(38, 'Lược chải lông', 5, 'Lược chải lông cho chó mèo thú cưng + Thích hợp dùng cho cả chó mèo lông ngắn hay dài. + Loại bỏ lông rụng tối đa nhưng ko làm gãy rụng lông khỏe bên ngoài. + Lược nhựa cán tròn mà', '2018-07-08', 99, 'images/product/5.5.jpg', 'Hàn Quốc', 1, 34000, 0000000000, NULL),
(39, 'Chai uống nước cầm tay', 5, 'Nếu như bạn cho thú cưng đi dạo với thời tiết nắng nóng mà chúng lại vận động quá nhiều thì việc cấp nước cho chúng là điều cần thiết nếu như bạn không muốn chúng bị kiệt sức. Tuy nhiên, nếu để chúng uống nước ở bên ngoài có thể không đảm bảo an toàn vệ sinh, còn mang bình nước đi thì không biết sẽ cho chúng uống như thế nào đây. Chính vì thế, hiện nay trong kho phụ kiện cho chó của phukienpet đã có chai uống nước cầm cho chó mèo có máng, đảm bảo cho thú cưng của bạn không bị thiếu nước cũng như đảm bảo an toàn, tiện lợi khi sử dụng.', '2019-01-31', 99, 'images/product/5.6.jpg', 'Hàn Quốc', 1, 55000, 0000000000, NULL),
(40, 'Bình sữa cho thú cưng', 5, 'Màu sắc: xanh dương\r\nChất liệu: silicone + nhựa\r\nCho bé bú bình: 12x4x4 cm/4.72x1.57 x 1.57in\r\nNúm vú kích thước: 4x3x3 cm/1.57x1.18 x 1.18in\r\nDung tích: 25 m', '2018-12-13', 99, 'images/product/5.7.jpg', 'Nhật Bản', 1, 70000, 0000000000, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
