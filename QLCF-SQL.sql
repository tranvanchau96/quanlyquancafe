CREATE TABLE loaihanghoa{
	maloai_hh varchar(10) PRIMARY KEY,
	tenloai_hh varchar(155)
};

CREATE TABLE nhomhanghoa{
	manhom_hh varchar(10) PRIMARY KEY,
	tennhom_hh varchar(155)	
};
CREATE TABLE hanghoa{
	ma_hh varchar(10) PRIMARY KEY,
	ten_hh	varchar(155),
	donvitinh varchar(155),
	
};