-- ----------------------------
-- Table structure for chitietdh
-- ----------------------------
DROP TABLE IF EXISTS `chitietdh`;
CREATE TABLE `chitietdh`  (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DatHangID` int(11) NULL DEFAULT NULL,
  `SPID` int(11) NULL DEFAULT NULL,
  `SL` int(11) NULL DEFAULT NULL,
  `TinhTrang` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `NgayDuKienGiao` date NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `DatHangID`(`DatHangID`) USING BTREE,
  CONSTRAINT `chitietdh_ibfk_1` FOREIGN KEY (`DatHangID`) REFERENCES `dathang` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for danhmuc
-- ----------------------------
DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE `danhmuc`  (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TenDM` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `ID`(`ID`) USING BTREE,
  INDEX `ID_2`(`ID`) USING BTREE,
  INDEX `ID_3`(`ID`) USING BTREE,
  INDEX `ID_4`(`ID`) USING BTREE,
  INDEX `ID_5`(`ID`) USING BTREE,
  INDEX `ID_6`(`ID`) USING BTREE,
  INDEX `ID_7`(`ID`) USING BTREE,
  INDEX `ID_8`(`ID`) USING BTREE,
  INDEX `ID_9`(`ID`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of danhmuc
-- ----------------------------
INSERT INTO `danhmuc` VALUES (1, 'Lồng-Nệm-Nhà');
INSERT INTO `danhmuc` VALUES (2, 'Quần áo');
INSERT INTO `danhmuc` VALUES (3, 'Phụ Kiện');
INSERT INTO `danhmuc` VALUES (4, 'Balo vận chuyển');
INSERT INTO `danhmuc` VALUES (5, 'Dụng cụ Ăn uống');

-- ----------------------------
-- Table structure for dathang
-- ----------------------------
DROP TABLE IF EXISTS `dathang`;
CREATE TABLE `dathang`  (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NULL DEFAULT NULL,
  `TongTien` float NULL DEFAULT NULL,
  `TinhTrang` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `NgayTao` date NULL DEFAULT NULL,
  `NgayDuKienGiao` date NULL DEFAULT NULL,
  `DiaChiGiao` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `TenNguoiNhan` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `SDT` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `UserID`(`UserID`) USING BTREE,
  CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `nguoidung` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for diachinhan
-- ----------------------------
DROP TABLE IF EXISTS `diachinhan`;
CREATE TABLE `diachinhan`  (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NULL DEFAULT NULL,
  `TenNguoiNhan` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `SDT` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `DiaChiGiao` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `UserID`(`UserID`) USING BTREE,
  CONSTRAINT `diachinhan_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `nguoidung` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for nguoidung
-- ----------------------------
DROP TABLE IF EXISTS `nguoidung`;
CREATE TABLE `nguoidung`  (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `Pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `Email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `HinhAnh` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `Quyen` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `DiaChi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `SDT` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for nsx
-- ----------------------------
DROP TABLE IF EXISTS `nsx`;
CREATE TABLE `nsx`  (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TenNSX` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `ID`(`ID`) USING BTREE,
  INDEX `ID_2`(`ID`) USING BTREE,
  INDEX `ID_3`(`ID`) USING BTREE,
  INDEX `ID_4`(`ID`) USING BTREE,
  INDEX `ID_5`(`ID`) USING BTREE,
  INDEX `ID_6`(`ID`) USING BTREE,
  INDEX `ID_7`(`ID`) USING BTREE,
  INDEX `ID_8`(`ID`) USING BTREE,
  INDEX `ID_9`(`ID`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nsx
-- ----------------------------
INSERT INTO `nsx` VALUES (1, 'Cty TNHH DuyCho');
INSERT INTO `nsx` VALUES (2, 'Shop of Pet');
INSERT INTO `nsx` VALUES (3, 'HienNynn Shop');
INSERT INTO `nsx` VALUES (4, 'Hna Shop');
INSERT INTO `nsx` VALUES (5, 'May Mặc Shop');

-- ----------------------------
-- Table structure for sanpham
-- ----------------------------
DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE `sanpham`  (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TenSP` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `LoaiSP` int(255) NULL DEFAULT NULL,
  `MoTa` varchar(4000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `NgayTao` date NULL DEFAULT NULL,
  `SoLuong` int(11) NULL DEFAULT NULL,
  `HinhAnh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `XuatXu` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `MaNSX` int(11) NULL DEFAULT NULL,
  `Gia` float NULL DEFAULT NULL,
  `LuotXem` int(10) UNSIGNED ZEROFILL NULL DEFAULT 0000000000,
  `TinhTrang` varchar(0) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `MaNSX`(`MaNSX`) USING BTREE,
  INDEX `LoaiSP`(`LoaiSP`) USING BTREE,
  CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaNSX`) REFERENCES `nsx` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`LoaiSP`) REFERENCES `danhmuc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sanpham
-- ----------------------------
INSERT INTO `sanpham` VALUES (1, 'Áo Khủng Long', 2, 'là là là', '2018-10-07', 99, 'hình áo khủng long =)) ', 'Việt Nam', 5, 99000, 0000000000, NULL);
INSERT INTO `sanpham` VALUES (2, 'Áo Siêu Nhân', 2, 'ă', '2018-10-07', 99, 'áo siêu nhân', 'Việt Nam', 5, 200000, 0000000000, NULL);
INSERT INTO `sanpham` VALUES (3, 'Pijama', 2, 'ă', '2018-08-12', 99, 'áo pijama', 'Việt Nam', 5, 250000, 0000000000, NULL);
INSERT INTO `sanpham` VALUES (4, 'Combo Diên Hy Công Lược', 2, 'ă', '2018-06-25', 99, 'áo loè lẹt', 'Việt Nam', 5, 200000, 0000000000, NULL);
INSERT INTO `sanpham` VALUES (5, 'Áo len nhiều màu', 2, 'ă', '2017-06-04', 99, 'nhiều áo', 'Việt Nam', 5, 300000, 0000000000, NULL);
INSERT INTO `sanpham` VALUES (6, 'Nhà gỗ cao cấp', 1, 'ă', '2018-11-25', 99, 'nhà gỗ', 'Việt Nam', 1, 500000, 0000000000, '');
INSERT INTO `sanpham` VALUES (7, 'nhà ngủ sư tử', 1, '222', '2018-10-29', 99, 'nhà sư tử', 'việt nam', 1, 600000, 0000000000, NULL);

SET FOREIGN_KEY_CHECKS = 1;
