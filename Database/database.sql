-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for hospital_project
DROP DATABASE IF EXISTS `hospital_project`;
CREATE DATABASE IF NOT EXISTS `hospital_project` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `hospital_project`;

-- Dumping structure for table hospital_project.admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Ma_admin` int(11) NOT NULL AUTO_INCREMENT,
  `Ten_dang_nhap` varchar(255) NOT NULL,
  `Mat_khau` varchar(50) NOT NULL,
  `Ho_va_ten` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`Ma_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table hospital_project.admin: ~2 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT IGNORE INTO `admin` (`Ma_admin`, `Ten_dang_nhap`, `Mat_khau`, `Ho_va_ten`, `Email`) VALUES
	(1, 'admin', '123456789', 'Pham Tuan Hung', 'hungpham98@gmail.com'),
	(2, 'admin1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Pham Tuan Hung1', 'hungpham98@gmail.com2');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table hospital_project.bac_si
DROP TABLE IF EXISTS `bac_si`;
CREATE TABLE IF NOT EXISTS `bac_si` (
  `Ma_bac_si` int(11) NOT NULL AUTO_INCREMENT,
  `Ten` varchar(255) NOT NULL,
  `Gioi_tinh` varchar(255) DEFAULT NULL,
  `Ngay_sinh` varchar(255) NOT NULL,
  `So_dien_thoai` varchar(50) NOT NULL,
  `Bang_cap` varchar(255) NOT NULL,
  `Nam_kinh_nghiem` varchar(50) NOT NULL,
  `Dia_chi` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Ma_khoa` int(11) NOT NULL,
  `Anh` varchar(255) NOT NULL,
  PRIMARY KEY (`Ma_bac_si`),
  KEY `Ma_khoa` (`Ma_khoa`),
  CONSTRAINT `bac_si_ibfk_1` FOREIGN KEY (`Ma_khoa`) REFERENCES `khoa` (`Ma_khoa`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table hospital_project.bac_si: ~6 rows (approximately)
/*!40000 ALTER TABLE `bac_si` DISABLE KEYS */;
INSERT IGNORE INTO `bac_si` (`Ma_bac_si`, `Ten`, `Gioi_tinh`, `Ngay_sinh`, `So_dien_thoai`, `Bang_cap`, `Nam_kinh_nghiem`, `Dia_chi`, `Email`, `Ma_khoa`, `Anh`) VALUES
	(1, 'Đặng Vạn Phước', 'Nam', '17/03/1963', '0982163743', 'GS., TS., BS.', '38', 'Số 219 Lê Duẩn, Hai Bà Trưng, HN (gần Ga Hà Nội)', 'dangvanphuoc@gmail.com', 1, 'bs1.jpg'),
	(2, 'Trương Quang Bình', '	Nam', '15/06/1966', '0985663323', '	GS., TS., BS.', '35', 'Số 5 Xã Đàn, Đống Đa, Hà Nội (gần hầm Kim Liên)', 'truongquangbinh@gmail.com', 2, 'bs2.jpg'),
	(3, 'Phạm Nguyễn Vinh', 'Nam', '	1/2/1965	', '0986431933', 'GS.,TS.,BS.', '30', 'Số 16 - 18 Phủ Doãn, Hoàn Kiếm, HN', 'phamnguyenvinh@gmail.com', 3, 'bs4.jpg'),
	(4, 'Nguyễn Phương Trang', '	Nữ', '	5/5/1990', '0325314853', 'Điều Dưỡng', '10', 'Số 78 Giải Phóng, Đống Đa, HN', 'phuongtrangnguyen@gmail.com', 1, 'bs3.jpg'),
	(5, 'Nguyễn Thu Huyền', '	Nữ', '	7/8/1990', '0325265453', 'Bác Sĩ', '10', 'Số 32 Tiên Phương-Chương Mĩ', 'thuhuyennguyen@gmail.com', 3, 'bs6.jpg'),
	(6, 'Nguyễn Huy Hoàng', '	Nam', '	5/12/1985', '0985386745', 'Tiến sĩ', '10', 'Số 78 Hàng Mã, HN', 'huyhoangnguyen@gmail.com', 1, 'bs5.jpg');
/*!40000 ALTER TABLE `bac_si` ENABLE KEYS */;

-- Dumping structure for table hospital_project.co_so_vat_chat
DROP TABLE IF EXISTS `co_so_vat_chat`;
CREATE TABLE IF NOT EXISTS `co_so_vat_chat` (
  `Ma_thiet_bi` int(11) NOT NULL AUTO_INCREMENT,
  `Ten_thiet_bi` varchar(255) NOT NULL,
  `Gia` float NOT NULL,
  `So_luong` int(11) NOT NULL,
  `Ngay_nhap` varchar(255) NOT NULL,
  `Ngay_bao_duong` varchar(255) NOT NULL,
  `Tinh_trang` varchar(255) NOT NULL,
  `Ma_khoa` int(11) NOT NULL,
  PRIMARY KEY (`Ma_thiet_bi`),
  KEY `Ma_khoa` (`Ma_khoa`),
  CONSTRAINT `co_so_vat_chat_ibfk_1` FOREIGN KEY (`Ma_khoa`) REFERENCES `khoa` (`Ma_khoa`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table hospital_project.co_so_vat_chat: ~10 rows (approximately)
/*!40000 ALTER TABLE `co_so_vat_chat` DISABLE KEYS */;
INSERT IGNORE INTO `co_so_vat_chat` (`Ma_thiet_bi`, `Ten_thiet_bi`, `Gia`, `So_luong`, `Ngay_nhap`, `Ngay_bao_duong`, `Tinh_trang`, `Ma_khoa`) VALUES
	(1, 'máy chụp x-quang', 500000000, 1, '4-8-2021', '4-8-2021', 'Mới', 2),
	(2, 'máy siêu âm 4d', 17000000, 1, '4-8-2021', '4-8-2021', 'Cũ', 3),
	(3, 'máy soi tai mũi họng', 32000000, 1, '4-8-2021', '4-8-2021', 'Mới', 1),
	(4, 'máy rửa dạ dày', 4600000, 1, '4-8-2021', '	4-8-2021', 'Mới', 2),
	(5, 'tủ an toàn sinh học', 165000000, 1, '4-8-2021', '	4-8-2021', 'Mới', 3),
	(6, 'bàn mổ', 65000000, 1, '4-8-2021', '	4-8-2021', '	Mới', 1),
	(7, 'giường bệnh', 68000000, 10, '4-8-2021', '4-8-2021', '	Mới', 2),
	(8, 'máy sốc tim', 195000000, 2, '4-8-2021', '4-8-2021', '	Mới', 3),
	(9, 'kính hiển vi phẫu thuật', 300000000, 1, '	4-8-2021', '	4-8-2021', 'Mới', 1),
	(10, 'bồn rửa tay phẫu thuật', 145000000, 1, '4-8-2021', '	4-8-2021', '	Mới', 2);
/*!40000 ALTER TABLE `co_so_vat_chat` ENABLE KEYS */;

-- Dumping structure for table hospital_project.dich_vu
DROP TABLE IF EXISTS `dich_vu`;
CREATE TABLE IF NOT EXISTS `dich_vu` (
  `Ma_dich_vu` int(11) NOT NULL AUTO_INCREMENT,
  `Ten_dich_vu` varchar(255) DEFAULT NULL,
  `Gia` float NOT NULL,
  `Thoi_gian_thuc_hien` int(11) NOT NULL,
  `Ma_khoa` int(11) NOT NULL,
  `Anh` varchar(255) NOT NULL,
  PRIMARY KEY (`Ma_dich_vu`),
  KEY `Ma_khoa` (`Ma_khoa`),
  CONSTRAINT `dich_vu_ibfk_1` FOREIGN KEY (`Ma_khoa`) REFERENCES `khoa` (`Ma_khoa`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table hospital_project.dich_vu: ~9 rows (approximately)
/*!40000 ALTER TABLE `dich_vu` DISABLE KEYS */;
INSERT IGNORE INTO `dich_vu` (`Ma_dich_vu`, `Ten_dich_vu`, `Gia`, `Thoi_gian_thuc_hien`, `Ma_khoa`, `Anh`) VALUES
	(1, 'Phẫu thuật U tim', 47610000, 18, 1, 'ser1.jpg'),
	(2, 'Đặt máy tạo nhịp', 3000000, 1, 2, 'ser2.jpg'),
	(3, 'Chụp các động mạch tủy', 6000000, 1, 3, 'ser3.jpg'),
	(4, 'Vá màng nhĩ', 16600000, 2, 2, 'ser4.jpg'),
	(5, 'Phẫu thuật xoang bướm', 23500000, 4, 1, 'ser5.jpg'),
	(6, 'Vi phẫu thanh quản', 15000000, 3, 3, 'ser6.jpg'),
	(7, 'Nẹp cổ/bàn tay', 300000, 1, 2, 'ser7.jpg'),
	(8, 'Nắn, bó bột trật khớp háng', 510000, 3, 3, 'ser8.jpg'),
	(9, 'Phẫu thuật tạo hình khớp háng', 3000000, 8, 1, 'ser9.jpg');
/*!40000 ALTER TABLE `dich_vu` ENABLE KEYS */;

-- Dumping structure for table hospital_project.feedback
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `Ma_don` int(11) NOT NULL AUTO_INCREMENT,
  `Ten_khach_hang` varchar(255) NOT NULL,
  `So_dien_thoai` varchar(255) NOT NULL,
  `Ma_khoa` int(11) NOT NULL,
  `Noi_dung` varchar(300) NOT NULL,
  PRIMARY KEY (`Ma_don`),
  KEY `Ma_khoa` (`Ma_khoa`),
  CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`Ma_khoa`) REFERENCES `khoa` (`Ma_khoa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table hospital_project.feedback: ~0 rows (approximately)
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT IGNORE INTO `feedback` (`Ma_don`, `Ten_khach_hang`, `So_dien_thoai`, `Ma_khoa`, `Noi_dung`) VALUES
	(1, 'asdsadsada', '12312312312', 1, '123123213213123213123');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;

-- Dumping structure for table hospital_project.khoa
DROP TABLE IF EXISTS `khoa`;
CREATE TABLE IF NOT EXISTS `khoa` (
  `Ma_khoa` int(11) NOT NULL AUTO_INCREMENT,
  `Ten_khoa` varchar(255) NOT NULL,
  `Mo_ta` text NOT NULL,
  `So_dien_thoai` varchar(255) NOT NULL,
  `Thanh_tuu` text NOT NULL,
  `Anh` varchar(255) NOT NULL,
  PRIMARY KEY (`Ma_khoa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table hospital_project.khoa: ~2 rows (approximately)
/*!40000 ALTER TABLE `khoa` DISABLE KEYS */;
INSERT IGNORE INTO `khoa` (`Ma_khoa`, `Ten_khoa`, `Mo_ta`, `So_dien_thoai`, `Thanh_tuu`, `Anh`) VALUES
	(1, 'Tim mạch', 'Là một trong những trung tâm mũi nhọn hàng đầu của Bệnh viện Cambridge, đội ngũ chuyên\r\n gia của Trung tâm Tim mạch gồm những Giáo sư, Tiến sĩ, bác sĩ Chuyên khoa 2, Thạc sĩ giàu kinh nghiệm, \r\ncó uy tín lớn trong lĩnh vực điều trị nội khoa, ngoại khoa, thông tim can thiệp và ứng dụng các kỹ thuật\r\n cao cấp trong việc chẩn đoán và điều trị bệnh lý tim mạch. Đặc biệt, Trung tâm có các trang thiết bị hiện\r\n đại, ngang tầm với các bệnh viện uy tín nhất trên thế giới.\r\n', '0247555599', 'Bệnh viện tư nhân đầu tiên, đồng thời là bệnh viện thứ 2 tại Việt Nam thực hiện thành\r\n công kỹ thuật cấy phép tim nhân tạo hỗ trợ tâm thất HVAD. Thực hiện 18 ca thay van động mạch chủ qua đường\r\n ống thông - Một trong những kỹ thuật can thiệp tim mạch phức tạp nhất trên thế giới hiện nay trong vòng hơn\r\n 1 năm; thực hiện ca MitraClip đầu tiên và hàng trăm ca can thiệp động mạch chủ, động mạch vành, trong đó có\r\n những trường hợp bệnh phức tạp, khó tiếp cận. Với những thành công vượt bậc này, Cambridge đã dần khẳng định\r\n là Trung tâm can thiệp tim mạch hàng đầu miền Bắc.', 'khoa2.jpg'),
	(2, 'Xương khớp', 'Với mục đích điều trị và tư vấn, cung cấp thông tin đến tất cả mọi\r\n người để phòng ngừa và điều trị các bệnh về cơ xương khớp có hiệu quả, nâng cao \r\nchất lượng cuộc sống. Khoa cơ xương khớp Là một phân ngành y khoa thuộc khối lâm sàng, \r\ngiữ chức năng khám chữa và khắc phục những tổn thương và rối loạn bệnh lý hệ vận động cơ, xương, khớp', '0247444477', 'Chuyên khoa Cơ xương khớp đã thực hiện hàng trăm ca phẫu thuật\r\n chuyên sâu và khó như phẫu thuật điều trị trượt đốt sống, thoát vị đĩa đệm, hẹp ống\r\n sống cổ-thắt lưng, thay khớp háng - khớp gối, nội soi khớp, chỉnh hình xương khớp trẻ\r\n em.... với sự phối hợp ăn ý giữa các bác sĩ phẫu thuật viên và các bác sĩ gây mê trong\r\n cùng ê kíp phẫu thuật. Đội ngũ bác sĩ gây mê giàu kinh nghiệm, thực hiện vô cảm an toàn\r\n cho phẫu thuật tất cả các bệnh lý, góp phần mang lại thành công cho cuộc phẫu thuật từ\r\n đơn giản đến phức tạp. Thực hiện thành công các thủ thuật gây tê giảm đau sau phẫu thuật\r\n thay khớp háng, khớp gối.', 'khoa3.jpg'),
	(3, 'Tai - Mũi - Họng', 'Chuyên khoa Tai Mũi Họng chuyên khám và điều trị các bệnh lý \r\ntai mũi họng thông thường, các khối u vùng đầu mặt cổ, các dị tật bẩm sinh \r\nvùng tai mũi họng bằng các phương pháp ngoại khoa phổ biến như phẫu thuật, \r\nvá nhĩ qua kính hiển vi hoặc nội soi, mổ lấy rò, phẫu thuật Bondy, khí dung \r\nhọng mũi, chích cuốn mũi, đốt ...', '0247333888', 'khoa: Các kết quả hoạt động nghiên cứu khoa học đã đóng góp to \r\nlớn trong sự nghiệp đào tạo các cán bộ của Bệnh viện và của ngành, nâng cao trình\r\n độ chuyên môn của đội ngũ cán bộ trong cả nước. Các nghiên cứu ứng dụng những tiến \r\nbộ khoa học tiên tiến đã góp phần nâng cao chất lượng điều trị, đặc biệt là các điều \r\ntrị bảo tồn và phục hồi chức năng trong Tai Mũi Họng, Bệnh viện cũng phát triển các chuyên \r\nkhoa sâu trong ngành đem lại hiệu quả ngày càng cao trong công tác điều trị. Những công trình \r\nkhoa học được báo cáo tại các hội nghị quốc tế hoặc đăng trên tạp chí nước ngoài giúp cho bạn bè\r\nthế giới hiểu về sự phát triển của ngành Tai Mũi Họng Việt Nam nâng cao uy tín của Bệnh viện, của \r\nngành Tai Mũi Họng Việt Nam.', 'khoa1.jpg');
/*!40000 ALTER TABLE `khoa` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
