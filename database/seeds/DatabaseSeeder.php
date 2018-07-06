<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    	$this->call(userAdmin::class);
        $this->call(khuvucSeeder::class);
        $this->call(banSeeder::class);
        $this->call(datmonSeeder::class);
        $this->call(nhomhanghoaSeeder::class);
        $this->call(loaihanghoaSeeder::class);
        $this->call(hanghoaSeeder::class);
        $this->call(chitietdatmonSeeder::class);
        $this->call(khoSeeder::class);
        $this->call(chitietkhoSeeder::class);
        $this->call(dinhluongSeeder::class);
    }

	
}

class userAdmin extends Seeder{
	public function run(){
		DB::table('users')->insert([
			['name'=>'admin','email'=>'tranvanchau@gmail.com','password'=>bcrypt('Admin')]
		]);
	}
}
class khuvucSeeder extends Seeder{
    public function run(){
        DB::table('khuvuc')->insert([
            ['makhuvuc'=>'KV01','tenkhuvuc'=>'Khu A'],
            ['makhuvuc'=>'KV02','tenkhuvuc'=>'Khu B'],
            ['makhuvuc'=>'KV03','tenkhuvuc'=>'Khu C']
        ]);
    }
}

class banSeeder extends Seeder{
    public function run(){
        DB::table('ban')->insert([
            ['maban'=>'BAN01','makhuvuc'=>'KV01','tenban'=>'Bàn 1','trangthai'=>'trống'],
            ['maban'=>'BAN02','makhuvuc'=>'KV01','tenban'=>'Bàn 2','trangthai'=>'đã đặt'],
            ['maban'=>'BAN03','makhuvuc'=>'KV01','tenban'=>'Bàn 3','trangthai'=>'trống'],
            ['maban'=>'BAN04','makhuvuc'=>'KV02','tenban'=>'Bàn 4','trangthai'=>'trống'],
            ['maban'=>'BAN05','makhuvuc'=>'KV02','tenban'=>'Bàn 5','trangthai'=>'đã đặt'],
            ['maban'=>'BAN06','makhuvuc'=>'KV02','tenban'=>'Bàn 6','trangthai'=>'trống'],
            ['maban'=>'BAN07','makhuvuc'=>'KV03','tenban'=>'Bàn 7','trangthai'=>'trống'],
            ['maban'=>'BAN08','makhuvuc'=>'KV03','tenban'=>'Bàn 8','trangthai'=>'trống'],
            ['maban'=>'BAN09','makhuvuc'=>'KV03','tenban'=>'Bàn 9','trangthai'=>'trống'],
            ['maban'=>'BAN10','makhuvuc'=>'KV03','tenban'=>'Bàn 1','trangthai'=>'trống']

        ]);
    }
}

class datmonSeeder extends Seeder{
    public function run(){
        DB::table('datmon')->insert([
            ['maban'=>'BAN02','thoigian'=>'2018-06-06','tongtien'=>'32000','trangthai'=>'chưa thanh toán'],
            ['maban'=>'BAN05','thoigian'=>'2018-06-07','tongtien'=>'47000','trangthai'=>'chưa thanh toán']
        ]);
    }
}

class nhomhanghoaSeeder extends Seeder{
    public function run(){
        DB::table('nhomhanghoa')->insert([
            ['manhomhh'=>'NHH01','tennhomhh'=>'Cà phê'],
            ['manhomhh'=>'NHH02','tennhomhh'=>'Nước đóng chai'],
            ['manhomhh'=>'NHH03','tennhomhh'=>'Nước lon'],
            ['manhomhh'=>'NHH04','tennhomhh'=>'Trà'],
            ['manhomhh'=>'NHH05','tennhomhh'=>'Nguyên vật liệu']
        ]);
    }
}

class loaihanghoaSeeder extends Seeder{
    public function run(){
        DB::table('loaihanghoa')->insert([
            ['maloaihh'=>'LHH01','tenloaihh'=>'Thành phẩm'],
            ['maloaihh'=>'LHH02','tenloaihh'=>'Hàng đóng chai'],
            ['maloaihh'=>'LHH03','tenloaihh'=>'Nguyên vật liệu']
        ]);
    }
}

class hanghoaSeeder extends Seeder{
    public function run(){
        DB::table('hanghoa')->insert([
            ['mahh'=>'HH01','manhomhh'=>'NHH01','maloaihh'=>'LHH01','tenhh'=>'Cà phê sữa','donvitinh'=>'ly','dongia'=>'14000','dinhluong'=>'đã định lượng'],
            ['mahh'=>'HH02','manhomhh'=>'NHH01','maloaihh'=>'LHH01','tenhh'=>'Cà phê đen','donvitinh'=>'ly','dongia'=>'14000','dinhluong'=>'đã định lượng'],
            ['mahh'=>'HH03','manhomhh'=>'NHH02','maloaihh'=>'LHH02','tenhh'=>'Sting','donvitinh'=>'chai','dongia'=>'16000','dinhluong'=>'không'],
            ['mahh'=>'HH04','manhomhh'=>'NHH02','maloaihh'=>'LHH02','tenhh'=>'Cam ép chai','donvitinh'=>'chai','dongia'=>'16000','dinhluong'=>'không'],
            ['mahh'=>'HH05','manhomhh'=>'NHH03','maloaihh'=>'LHH02','tenhh'=>'Bò húc','donvitinh'=>'lon','dongia'=>'15000','dinhluong'=>'không'],
            ['mahh'=>'HH06','manhomhh'=>'NHH05','maloaihh'=>'LHH03','tenhh'=>'Cà phê bột','donvitinh'=>'gam','dongia'=>'230','dinhluong'=>'không'],
            ['mahh'=>'HH07','manhomhh'=>'NHH05','maloaihh'=>'LHH03','tenhh'=>'Đường cát trắng','donvitinh'=>'gam','dongia'=>'10','dinhluong'=>'không'],
            ['mahh'=>'HH08','manhomhh'=>'NHH05','maloaihh'=>'LHH03','tenhh'=>'Sữa đặc','donvitinh'=>'ml','dongia'=>'20','dinhluong'=>'không'],
            ['mahh'=>'HH09','manhomhh'=>'NHH03','maloaihh'=>'LHH02','tenhh'=>'Sting lon','donvitinh'=>'lon','dongia'=>'15000','dinhluong'=>'không']
        ]);
    }
}

class chitietdatmonSeeder extends Seeder{
    public function run(){
        DB::table('chitietdatmon')->insert([
            ['id_datmon'=>'1','mahh'=>'HH03','soluong'=>'2'],
            ['id_datmon'=>'1','mahh'=>'HH04','soluong'=>'1'],
            ['id_datmon'=>'2','mahh'=>'HH03','soluong'=>'3'],
            ['id_datmon'=>'2','mahh'=>'HH04','soluong'=>'1'],
            ['id_datmon'=>'2','mahh'=>'HH05','soluong'=>'4'],
        ]);
    }
}

class khoSeeder extends Seeder{
    public function run(){
        DB::table('kho')->insert([
            ['makho'=>'KHOHH','tenkho'=>'Kho hàng hóa']
        ]);
    }
}

class chitietkhoSeeder extends Seeder{
    public function run(){
        DB::table('chitietkho')->insert([
            ['mahh'=>'HH03','makho'=>'KHOHH','soluong'=>'100'],
            ['mahh'=>'HH04','makho'=>'KHOHH','soluong'=>'200'],
            ['mahh'=>'HH05','makho'=>'KHOHH','soluong'=>'100'],
            ['mahh'=>'HH06','makho'=>'KHOHH','soluong'=>'1000'],
            ['mahh'=>'HH07','makho'=>'KHOHH','soluong'=>'1000'],
            ['mahh'=>'HH08','makho'=>'KHOHH','soluong'=>'1000'],
            ['mahh'=>'HH09','makho'=>'KHOHH','soluong'=>'120']
        ]);
    }
}

class dinhluongSeeder extends Seeder{
    public function run(){
        DB::table('dinhluong')->insert([
            ['mahh_tp'=>'HH01','mahh'=>'HH06','khoiluong'=>'200'],
            ['mahh_tp'=>'HH01','mahh'=>'HH07','khoiluong'=>'100'],
            ['mahh_tp'=>'HH02','mahh'=>'HH06','khoiluong'=>'200'],
            ['mahh_tp'=>'HH02','mahh'=>'HH07','khoiluong'=>'100'],
            ['mahh_tp'=>'HH01','mahh'=>'HH08','khoiluong'=>'70']
        ]);
    }
}