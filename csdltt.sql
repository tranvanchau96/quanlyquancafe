	create table khuvuc(
		makhuvuc varchar(20) primary key,
		tenkhuvuc varchar(20) not null
	);

		insert into khuvuc (makhuvuc, tenkhuvuc) values
		('KV01', 'Khu A'),
		('KV02', 'Khu B'),
		('KV03', 'Khu C');


	create table ban (
		maban varchar(20) primary key,
		makhuvuc varchar(20) not null,
		tenban varchar(20) not null,
		trangthai varchar(20) not null
	);
	ALTER TABLE ban ADD	foreign key (makhuvuc) references khuvuc(makhuvuc);

		insert into ban (maban,makhuvuc, tenban, trangthai) values
		('BAN01', 'KV01', 'Bàn 1', "trống"),
		('BAN02', 'KV01', 'Bàn 2', "đã đặt"),
		('BAN03', 'KV01', 'Bàn 3', "trống"),
		('BAN04', 'KV02', 'Bàn 4', "trống"),
		('BAN05', 'KV02', 'Bàn 5', "đã đặt"),
		('BAN06', 'KV02', 'Bàn 6', "trống"),
		('BAN07', 'KV03', 'Bàn 7', "trống"),
		('BAN08', 'KV03', 'Bàn 8', "trống"),
		('BAN09', 'KV03', 'Bàn 9', "trống"),
		('BAN10', 'KV03', 'Bàn 10', "trống");

	
	create table datmon(
		id int primary key AUTO_INCREMENT,
		maban varchar(20),
		thoigian date,
		tongtien int,
		trangthai varchar(50)
	);
	ALTER TABLE datmon ADD	foreign key (maban) references ban(maban);

		insert into datmon(id,maban,thoigian,tongtien,trangthai) values
			('1','BAN02','2018-6-6',32000,'chưa thanh toán'),
			('2','BAN05','2018-6-7',47000,'chưa thanh toán');



	create table nhomhanghoa (
		manhomhh varchar(20) primary key,
		tennhomhh varchar(20) not null
	);

		insert into nhomhanghoa (manhomhh, tennhomhh) values
		('NHH01', 'Cà phê'),
		('NHH02', 'Nước đóng chai'),
		('NHH03', 'Nước lon'),
		('NHH04', 'Trà'),
		('NHH05', 'Nguyên vật liệu');

	create table loaihanghoa (
		maloaihh varchar(20) primary key,
		tenloaihh varchar(20) not null
	);

		insert into loaihanghoa (maloaihh, tenloaihh) values
		('LHH01', 'Thành phẩm'),
		('LHH02', 'Hàng đóng chai'),
		('LHH03', 'Nguyên vật liệu');

	create table hanghoa(
		mahh varchar(20) primary key,
		manhomhh varchar(20),
		maloaihh varchar(20),
		tenhh varchar(40) not null,
		donvitinh varchar(20),
		dongia int,
		dinhluong varchar(30)
	);
	ALTER TABLE hanghoa ADD	foreign key (manhomhh) references nhomhanghoa(manhomhh);
	ALTER TABLE hanghoa ADD	foreign key (maloaihh) references loaihanghoa(maloaihh);
		insert into hanghoa values
			('HH01','NHH01','LHH01','Cà phê sữa','ly','14000','đã định lượng'),
			('HH02','NHH01','LHH01','Cà phê đen','ly','14000','đã định lượng'),
			('HH03','NHH02','LHH02','Sting','chai','16000','không'),
			('HH04','NHH02','LHH02','Cam ép chai','chai','16000','không'),
			('HH05','NHH03','LHH02','Bò húc','lon','15000','không'),
			('HH06','NHH05','LHH03','Cà phê bột','gam','230','không'),
			('HH07','NHH05','LHH03','Đường cát trắng','gam','10','không'),
			('HH08','NHH05','LHH03','Sữa đặc','ml','20','không'),
			('HH09','NHH03','LHH02','Sting lon','lon','15000','không');
			
	create table chitietdatmon(
		id int primary key AUTO_INCREMENT,
		id_datmon int,
		mahh varchar(20),
		soluong int
	);
	ALTER TABLE chitietdatmon ADD	foreign key (id_datmon) references datmon(id);
	ALTER TABLE chitietdatmon ADD	foreign key (mahh) references hanghoa(mahh);
		insert into chitietdatmon(id,id_datmon,mahh,soluong) values
			(1,1,'HH03',2),
			(2,1,'HH04',1),
			(3,2,'HH03',3),
			(4,2,'HH04',1),
			(5,2,'HH05',4);


	create table kho(
		makho varchar(20) primary key,
		tenkho varchar(20)
	);
		insert into	kho values('KHOHH','Kho hàng hóa');

	create table chitietkho(
		id int primary key AUTO_INCREMENT,
		mahh varchar(20),
		makho varchar(20),
		soluong int
	);
	ALTER TABLE chitietkho ADD	foreign key (mahh) references hanghoa(mahh);
	ALTER TABLE chitietkho ADD	foreign key (makho) references kho(makho);

		insert into chitietkho values
			(1,'HH03','KHOHH',100),
			(2,'HH04','KHOHH',200),
			(3,'HH05','KHOHH',100),
			(4,'HH06','KHOHH',1000),
			(5,'HH07','KHOHH',1000),
			(6,'HH08','KHOHH',1000),
			(7,'HH09','KHOHH',120);

	create table dinhluong(
		id int primary key AUTO_INCREMENT,
		mahh_tp varchar(20),
		mahh varchar(20),
		khoiluong int
	);
	insert into dinhluong values
		(1,'HH01','HH06',200),
		(2,'HH01','HH07',100),
		(3,'HH02','HH06',200),
		(4,'HH02','HH07',100),
		(5,'HH01','HH08',70);

	ALTER TABLE dinhluong ADD	foreign key (mahh_tp) references hanghoa(mahh);
	ALTER TABLE dinhluong ADD	foreign key (mahh) references hanghoa(mahh);

	create table nhacungcap (
		mancc varchar(20) primary key,
		tenncc varchar(155) not null,
		diachincc varchar(155) not null,
		sdtncc varchar(20) not null
	);

		insert into nhacungcap (mancc, tenncc, diachincc, sdtncc) values
		('NCC01', 'Công ty A', 'Cần Thơ', '0901234567'),
		('NCC02', 'Công ty B', 'TPHCM', '012345657'),
		('NCC03', 'Công ty C', 'An Giang', '0909547472'),
		('NCC04', 'Công ty D', 'Cà Mau', '0983648694'),
		('NCC05', 'Công ty E', 'Bến Tre', '0164538541');

	create table phieunhap(
		id int primary key AUTO_INCREMENT,
		mancc varchar(20),
		ngaynhap date
	);	ALTER TABLE phieunhap ADD foreign key (mancc) references nhacungcap(mancc);

	create table chitietphieunhap(
		id int primary key AUTO_INCREMENT,
		mahh varchar(20),
		id_phieunhap int,
		soluong int,
		dongianhap int
	);
ALTER TABLE chitietphieunhap  ADD	foreign key (mahh) references hanghoa(mahh);
	ALTER TABLE chitietphieunhap  ADD	foreign key(id_phieunhap) references phieunhap(id);
	


	ALTER TABLE ban ADD updated_at datetime;
	ALTER TABLE ban ADD created_at datetime;
ALTER TABLE ban ENGINE = InnoDB;
	ALTER TABLE chitietphieunhap ADD updated_at datetime;
	ALTER TABLE chitietphieunhap ADD created_at datetime;
ALTER TABLE chitietphieunhap ENGINE = InnoDB;
	ALTER TABLE datmon ADD updated_at datetime;
	ALTER TABLE datmon ADD created_at datetime;
ALTER TABLE datmon ENGINE = InnoDB;
	ALTER TABLE chitietdatmon ADD updated_at datetime;
	ALTER TABLE chitietdatmon ADD created_at datetime;
ALTER TABLE chitietdatmon ENGINE = InnoDB;
	ALTER TABLE chitietkho ADD updated_at datetime;
	ALTER TABLE chitietkho ADD created_at datetime;
ALTER TABLE chitietkho ENGINE = InnoDB;
	ALTER TABLE dinhluong ADD updated_at datetime;
	ALTER TABLE dinhluong ADD created_at datetime;
ALTER TABLE dinhluong ENGINE = InnoDB;
	ALTER TABLE hanghoa ADD updated_at datetime;
	ALTER TABLE hanghoa ADD created_at datetime;
ALTER TABLE hanghoa ENGINE = InnoDB;
	ALTER TABLE kho ADD updated_at datetime;
	ALTER TABLE kho ADD created_at datetime;
ALTER TABLE kho ENGINE = InnoDB;
	ALTER TABLE khuvuc ADD updated_at datetime;
	ALTER TABLE khuvuc ADD created_at datetime;
ALTER TABLE khuvuc ENGINE = InnoDB;
	ALTER TABLE loaihanghoa ADD updated_at datetime;
	ALTER TABLE loaihanghoa ADD created_at datetime;
ALTER TABLE loaihanghoa ENGINE = InnoDB;
	ALTER TABLE nhacungcap ADD updated_at datetime;
	ALTER TABLE nhacungcap ADD created_at datetime;
ALTER TABLE nhacungcap ENGINE = InnoDB;
	ALTER TABLE nhomhanghoa ADD updated_at datetime;
	ALTER TABLE nhomhanghoa ADD created_at datetime;
ALTER TABLE nhomhanghoa ENGINE = InnoDB;
	ALTER TABLE phieunhap ADD created_at datetime;
	ALTER TABLE phieunhap ADD updated_at datetime;
ALTER TABLE phieunhap ENGINE = InnoDB;
