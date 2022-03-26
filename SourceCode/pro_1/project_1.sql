CREATE DATABASE if NOT EXISTS `Hospital_project`;
DROP DATABASE `Hospital_project`;
USE `Hospital_project`;

CREATE TABLE `Bac_Si`(
	`Ma_bac_si` INT not null primary KEY auto_increment,
	`Ten` VARCHAR(255) NOT NULL,
	`Gioi_tinh` VARCHAR(255),
	`Ngay_sinh` VARCHAR(255) NOT NULL,
	`So_dien_thoai` VARCHAR(50) NOT NULL,
	`Bang_cap`VARCHAR(255) NOT NULL,
	`Nam_kinh_nghiem` VARCHAR(50) NOT NULL,
	`Dia_chi` VARCHAR(255) NOT NULL,
	`Email` VARCHAR(255) NOT NULL,
	`Ma_khoa` INT not NULL,
	`Anh` VARCHAR(255) NOT null
);

ALTER TABLE `Bac_Si` ADD FOREIGN KEY (`Ma_khoa`) REFERENCES `Khoa`(`Ma_khoa`);

INSERT INTO `Bac_si`(`Ma_bac_si`, `Ten`, `Gioi_tinh`,`Ngay_sinh`,`So_dien_thoai`,`Bang_cap`,`Nam_kinh_nghiem`,`Dia_chi`,`Email`,`Ma_khoa`, `Anh`)
VALUES (1,'Đặng Vạn Phước', 'Nam',	'17/03/1963','0982163743'	,'GS., TS., BS.',	38	,'Số 219 Lê Duẩn, Hai Bà Trưng, HN (gần Ga Hà Nội)','dangvanphuoc@gmail.com', 1,'bs1.jpg');

INSERT INTO `Bac_si`(`Ma_bac_si`, `Ten`, `Gioi_tinh`,`Ngay_sinh`,`So_dien_thoai`,`Bang_cap`,`Nam_kinh_nghiem`,`Dia_chi`,`Email`,`Ma_khoa`, `Anh`)
VALUES (2 ,'Trương Quang Bình','	Nam',	'15/06/1966','0985663323','	GS., TS., BS.',	35,'Số 5 Xã Đàn, Đống Đa, Hà Nội (gần hầm Kim Liên)','truongquangbinh@gmail.com', 2,'bs2.jpg');

INSERT INTO `Bac_si`(`Ma_bac_si`, `Ten`, `Gioi_tinh`,`Ngay_sinh`,`So_dien_thoai`,`Bang_cap`,`Nam_kinh_nghiem`,`Dia_chi`,`Email`,`Ma_khoa`, `Anh`)
VALUES (3,'Phạm Nguyễn Vinh'	,'Nam','	1/2/1965	','0986431933','GS.,TS.,BS.',	30,'Số 16 - 18 Phủ Doãn, Hoàn Kiếm, HN','phamnguyenvinh@gmail.com', 3,'bs4.jpg');

INSERT INTO `Bac_si`(`Ma_bac_si`, `Ten`, `Gioi_tinh`,`Ngay_sinh`,`So_dien_thoai`,`Bang_cap`,`Nam_kinh_nghiem`, `Dia_chi`,`Email`,`Ma_khoa`, `Anh`)
VALUES (4,'Nguyễn Phương Trang','	Nữ','	5/5/1990','0325314853',	'Điều Dưỡng',	10,'Số 78 Giải Phóng, Đống Đa, HN','phuongtrangnguyen@gmail.com', 1,'bs3.jpg');

INSERT INTO `Bac_si`(`Ma_bac_si`, `Ten`, `Gioi_tinh`,`Ngay_sinh`,`So_dien_thoai`,`Bang_cap`,`Nam_kinh_nghiem`, `Dia_chi`,`Email`,`Ma_khoa`, `Anh`)
VALUES (5,'Nguyễn Thu Huyền','	Nữ','	7/8/1990','0325265453',	'Bác Sĩ',	10,'Số 32 Tiên Phương-Chương Mĩ','thuhuyennguyen@gmail.com', 3,'bs6.jpg');


INSERT INTO `Bac_si`(`Ma_bac_si`, `Ten`, `Gioi_tinh`,`Ngay_sinh`,`So_dien_thoai`,`Bang_cap`,`Nam_kinh_nghiem`, `Dia_chi`,`Email`,`Ma_khoa`, `Anh`)
VALUES (6,'Nguyễn Huy Hoàng','	Nam','	5/12/1985','0985386745',	'Tiến sĩ',	10,'Số 78 Hàng Mã, HN','huyhoangnguyen@gmail.com', 1,'bs5.jpg');



DROP TABLE `Bac_si`;

CREATE TABLE `Khoa`(
	`Ma_khoa` INT NOT NULL PRIMARY KEY auto_increment,
	`Ten_khoa`VARCHAR(255) not NULL,
	`Mo_ta`text not NULL, 
	`So_dien_thoai` VARCHAR(255) NOT NULL,
	`Thanh_tuu` text NOT NULL,
	`Anh` VARCHAR(255) NOT null
);


INSERT INTO `Khoa` (`Ma_Khoa`, `Ten_Khoa`, `Mo_ta`,`So_dien_thoai`,`Thanh_tuu`, `Anh`)
VALUES (1, 'Tim mạch',
 'Là một trong những trung tâm mũi nhọn hàng đầu của Bệnh viện Cambridge, đội ngũ chuyên
 gia của Trung tâm Tim mạch gồm những Giáo sư, Tiến sĩ, bác sĩ Chuyên khoa 2, Thạc sĩ giàu kinh nghiệm, 
có uy tín lớn trong lĩnh vực điều trị nội khoa, ngoại khoa, thông tim can thiệp và ứng dụng các kỹ thuật
 cao cấp trong việc chẩn đoán và điều trị bệnh lý tim mạch. Đặc biệt, Trung tâm có các trang thiết bị hiện
 đại, ngang tầm với các bệnh viện uy tín nhất trên thế giới.
',
'0247555599',
'Bệnh viện tư nhân đầu tiên, đồng thời là bệnh viện thứ 2 tại Việt Nam thực hiện thành
 công kỹ thuật cấy phép tim nhân tạo hỗ trợ tâm thất HVAD. Thực hiện 18 ca thay van động mạch chủ qua đường
 ống thông - Một trong những kỹ thuật can thiệp tim mạch phức tạp nhất trên thế giới hiện nay trong vòng hơn
 1 năm; thực hiện ca MitraClip đầu tiên và hàng trăm ca can thiệp động mạch chủ, động mạch vành, trong đó có
 những trường hợp bệnh phức tạp, khó tiếp cận. Với những thành công vượt bậc này, Cambridge đã dần khẳng định
 là Trung tâm can thiệp tim mạch hàng đầu miền Bắc.',
'khoa2.jpg');
INSERT INTO `Khoa` (`Ma_Khoa`, `Ten_Khoa`, `Mo_ta`,`So_dien_thoai`,`Thanh_tuu`, `Anh`)
VALUES (2, 'Xương khớp',
 'Với mục đích điều trị và tư vấn, cung cấp thông tin đến tất cả mọi
 người để phòng ngừa và điều trị các bệnh về cơ xương khớp có hiệu quả, nâng cao 
chất lượng cuộc sống. Khoa cơ xương khớp Là một phân ngành y khoa thuộc khối lâm sàng, 
giữ chức năng khám chữa và khắc phục những tổn thương và rối loạn bệnh lý hệ vận động cơ, xương, khớp',
 '0247444477',
  'Chuyên khoa Cơ xương khớp đã thực hiện hàng trăm ca phẫu thuật
 chuyên sâu và khó như phẫu thuật điều trị trượt đốt sống, thoát vị đĩa đệm, hẹp ống
 sống cổ-thắt lưng, thay khớp háng - khớp gối, nội soi khớp, chỉnh hình xương khớp trẻ
 em.... với sự phối hợp ăn ý giữa các bác sĩ phẫu thuật viên và các bác sĩ gây mê trong
 cùng ê kíp phẫu thuật. Đội ngũ bác sĩ gây mê giàu kinh nghiệm, thực hiện vô cảm an toàn
 cho phẫu thuật tất cả các bệnh lý, góp phần mang lại thành công cho cuộc phẫu thuật từ
 đơn giản đến phức tạp. Thực hiện thành công các thủ thuật gây tê giảm đau sau phẫu thuật
 thay khớp háng, khớp gối.',
  'khoa3.jpg');
INSERT INTO `Khoa` (`Ma_Khoa`, `Ten_Khoa`, `Mo_ta`,`So_dien_thoai`,`Thanh_tuu`, `Anh`)
VALUES (3, 'Tai - Mũi - Họng', 'Chuyên khoa Tai Mũi Họng chuyên khám và điều trị các bệnh lý 
tai mũi họng thông thường, các khối u vùng đầu mặt cổ, các dị tật bẩm sinh 
vùng tai mũi họng bằng các phương pháp ngoại khoa phổ biến như phẫu thuật, 
vá nhĩ qua kính hiển vi hoặc nội soi, mổ lấy rò, phẫu thuật Bondy, khí dung 
họng mũi, chích cuốn mũi, đốt ...',
 '0247333888',
  'khoa: Các kết quả hoạt động nghiên cứu khoa học đã đóng góp to 
lớn trong sự nghiệp đào tạo các cán bộ của Bệnh viện và của ngành, nâng cao trình
 độ chuyên môn của đội ngũ cán bộ trong cả nước. Các nghiên cứu ứng dụng những tiến 
bộ khoa học tiên tiến đã góp phần nâng cao chất lượng điều trị, đặc biệt là các điều 
trị bảo tồn và phục hồi chức năng trong Tai Mũi Họng, Bệnh viện cũng phát triển các chuyên 
khoa sâu trong ngành đem lại hiệu quả ngày càng cao trong công tác điều trị. Những công trình 
khoa học được báo cáo tại các hội nghị quốc tế hoặc đăng trên tạp chí nước ngoài giúp cho bạn bè
thế giới hiểu về sự phát triển của ngành Tai Mũi Họng Việt Nam nâng cao uy tín của Bệnh viện, của 
ngành Tai Mũi Họng Việt Nam.',
 'khoa1.jpg');
DROP TABLE `Khoa`;

CREATE TABLE `Dich_vu`(
	`Ma_dich_vu` INT NOT NULL PRIMARY KEY auto_increment,
	`Ten_dich_vu` VARCHAR(255),
	`Gia` FLOAT NOT NULL,
	`Thoi_gian_thuc_hien` INT NOT NULL,
	`Ma_khoa` INT NOT NULL,
	`Anh` VARCHAR(255) NOT NULL
);

ALTER TABLE `Dich_vu` ADD FOREIGN KEY (`Ma_khoa`) REFERENCES `Khoa`(`Ma_khoa`);

INSERT INTO `Dich_vu` (`Ma_dich_vu`, `Ten_dich_vu`, `Gia`,`Thoi_gian_thuc_hien`,`Ma_khoa`,`Anh`)
VALUES (1, 'Phẫu thuật U tim', 47610000, '18', 1,'ser1.jpg');
INSERT INTO `Dich_vu` (`Ma_dich_vu`, `Ten_dich_vu`, `Gia`,`Thoi_gian_thuc_hien`,`Ma_khoa`,`Anh`)
VALUES (2,'Đặt máy tạo nhịp', 3000000, '1', 2,'ser2.jpg');
INSERT INTO `Dich_vu` (`Ma_dich_vu`, `Ten_dich_vu`, `Gia`,`Thoi_gian_thuc_hien`,`Ma_khoa`,`Anh`)
VALUES (3, 'Chụp các động mạch tủy', 6000000, '1', 3,'ser3.jpg');
INSERT INTO `Dich_vu` (`Ma_dich_vu`, `Ten_dich_vu`, `Gia`,`Thoi_gian_thuc_hien`,`Ma_khoa`,`Anh`)
VALUES (4, 'Vá màng nhĩ', 16600000, '2', 2,'ser4.jpg');
INSERT INTO `Dich_vu` (`Ma_dich_vu`, `Ten_dich_vu`, `Gia`,`Thoi_gian_thuc_hien`,`Ma_khoa`,`Anh`)
VALUES (5, 'Phẫu thuật xoang bướm', 23500000, '4', 1,'ser5.jpg');
INSERT INTO `Dich_vu` (`Ma_dich_vu`, `Ten_dich_vu`, `Gia`,`Thoi_gian_thuc_hien`,`Ma_khoa`,`Anh`)
VALUES (6, 'Vi phẫu thanh quản', 15000000, '3', 3,'ser6.jpg');
INSERT INTO `Dich_vu` (`Ma_dich_vu`, `Ten_dich_vu`, `Gia`,`Thoi_gian_thuc_hien`,`Ma_khoa`,`Anh`)
VALUES (7, 'Nẹp cổ/bàn tay', 300000, '1', 2,'ser7.jpg');
INSERT INTO `Dich_vu` (`Ma_dich_vu`, `Ten_dich_vu`, `Gia`,`Thoi_gian_thuc_hien`,`Ma_khoa`,`Anh`)
VALUES (8, 'Nắn, bó bột trật khớp háng', 510000, '3', 3,'ser8.jpg');
INSERT INTO `Dich_vu` (`Ma_dich_vu`, `Ten_dich_vu`, `Gia`,`Thoi_gian_thuc_hien`,`Ma_khoa`,`Anh`)
VALUES (9, 'Phẫu thuật tạo hình khớp háng', 3000000, '8', 1,'ser9.jpg');
DROP TABLE `Dich_vu`;

CREATE TABLE `Co_so_vat_chat`(
	`Ma_thiet_bi`  INT NOT NULL PRIMARY KEY auto_increment,
	`Ten_thiet_bi` VARCHAR(255) NOT NULL,
	`Gia` FLOAT NOT NULL,
	`So_luong` INT NOT NULL,
	`Ngay_nhap` VARCHAR(255)  NOT NULL,
	`Ngay_bao_duong` VARCHAR(255) NOT NULL,
	`Tinh_trang` VARCHAR(255) NOT NULL,
	`Ma_khoa` INT not NULL
);

ALTER TABLE `Co_so_vat_chat` ADD FOREIGN KEY (`Ma_khoa`) REFERENCES `Khoa`(`Ma_khoa`);

INSERT INTO `Co_so_vat_chat` (`Ma_thiet_bi`, `Ten_thiet_bi`, `Gia`,`So_luong`,`Ngay_nhap`,`Ngay_bao_duong`,`Tinh_trang`, `Ma_khoa`)
VALUES (1, 'máy chụp x-quang', 500000000,  1	,'4-8-2021'	,'4-8-2021' ,'Mới', 2);
INSERT INTO `Co_so_vat_chat` (`Ma_thiet_bi`, `Ten_thiet_bi`, `Gia`,`So_luong`,`Ngay_nhap`,`Ngay_bao_duong`,`Tinh_trang`, `Ma_khoa`)
VALUES (2 ,'máy siêu âm 4d' ,17000000	,1	,'4-8-2021',	'4-8-2021',	'Cũ', 3);
INSERT INTO `Co_so_vat_chat` (`Ma_thiet_bi`, `Ten_thiet_bi`, `Gia`,`So_luong`,`Ngay_nhap`,`Ngay_bao_duong`,`Tinh_trang`, `Ma_khoa`)
VALUES (3 ,'máy soi tai mũi họng', 32000000	,1,	'4-8-2021',	'4-8-2021'	,'Mới', 1);
INSERT INTO `Co_so_vat_chat` (`Ma_thiet_bi`, `Ten_thiet_bi`, `Gia`,`So_luong`,`Ngay_nhap`,`Ngay_bao_duong`,`Tinh_trang`, `Ma_khoa`)
VALUES (4 ,'máy rửa dạ dày' ,4600000	,1,	'4-8-2021','	4-8-2021',	'Mới', 2);
INSERT INTO `Co_so_vat_chat` (`Ma_thiet_bi`, `Ten_thiet_bi`, `Gia`,`So_luong`,`Ngay_nhap`,`Ngay_bao_duong`,`Tinh_trang`, `Ma_khoa`)
VALUES (5 ,'tủ an toàn sinh học' ,165000000	,	1,	'4-8-2021','	4-8-2021',	'Mới', 3);
INSERT INTO `Co_so_vat_chat` (`Ma_thiet_bi`, `Ten_thiet_bi`, `Gia`,`So_luong`,`Ngay_nhap`,`Ngay_bao_duong`,`Tinh_trang`, `Ma_khoa`)
VALUES (6 ,'bàn mổ',65000000, 	1	,'4-8-2021','	4-8-2021','	Mới', 1);
INSERT INTO `Co_so_vat_chat` (`Ma_thiet_bi`, `Ten_thiet_bi`, `Gia`,`So_luong`,`Ngay_nhap`,`Ngay_bao_duong`,`Tinh_trang`, `Ma_khoa`)
VALUES (7, 'giường bệnh', 68000000 	,	10,	'4-8-2021',	'4-8-2021','	Mới', 2);
INSERT INTO `Co_so_vat_chat` (`Ma_thiet_bi`, `Ten_thiet_bi`, `Gia`,`So_luong`,`Ngay_nhap`,`Ngay_bao_duong`,`Tinh_trang`, `Ma_khoa`)
VALUES (8 ,'máy sốc tim', 195000000 ,	2,	'4-8-2021',	'4-8-2021','	Mới', 3);
INSERT INTO `Co_so_vat_chat` (`Ma_thiet_bi`, `Ten_thiet_bi`, `Gia`,`So_luong`,`Ngay_nhap`,`Ngay_bao_duong`,`Tinh_trang`, `Ma_khoa`)
VALUES (9 ,'kính hiển vi phẫu thuật', 300000000,	1,'	4-8-2021','	4-8-2021',	'Mới', 1);
INSERT INTO `Co_so_vat_chat` (`Ma_thiet_bi`, `Ten_thiet_bi`, `Gia`,`So_luong`,`Ngay_nhap`,`Ngay_bao_duong`,`Tinh_trang`, `Ma_khoa`)
VALUES (10 ,'bồn rửa tay phẫu thuật', 145000000	,1,	'4-8-2021','	4-8-2021','	Mới', 2);

DROP TABLE `Co_so_vat_chat`;

CREATE TABLE `admin`(
	`Ma_admin` INT PRIMARY KEY NOT NULL auto_increment,
	`Ten_dang_nhap` VARCHAR(255) NOT NULL,
	`Mat_khau` VARCHAR(50)  NOT NULL,
	`Ho_va_ten` VARCHAR(50) NOT NULL,
	`Email` VARCHAR(50) NOT NULL
);

INSERT INTO `admin` (`Ma_admin`, `Ten_dang_nhap`, `Mat_khau`, `Ho_va_ten`, `Email`)
VALUES (1 ,'admin', '123456789', 'Pham Tuan Hung', 'hungpham98@gmail.com' );
INSERT INTO `admin` (`Ma_admin`, `Ten_dang_nhap`, `Mat_khau`, `Ho_va_ten`, `Email`)
VALUES (2 ,'admin1', SHA1('123'), 'Pham Tuan Hung1', 'hungpham98@gmail.com2' );

DROP TABLE `admin`; 

CREATE TABLE `feedback`(
	`Ma_don` INT PRIMARY KEY NOT NULL auto_increment,
	`Ten_khach_hang` VARCHAR(255) NOT NULL,
	`So_dien_thoai` VARCHAR(255) NOT NULL,
	`Ma_khoa` INT NOT NULL,
	`Noi_dung` VARCHAR(300) NOT NULL
);
ALTER TABLE `feedback` ADD FOREIGN KEY (`Ma_khoa`) REFERENCES `Khoa`(`Ma_khoa`);
DROP TABLE `feedback`;


