<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use
	use App\Ban;
	use App\Chitietdatmon;
	use App\Chitietkho;
	use App\Chitietphieunhap;
	use App\Datmon;
	use App\Dinhluong;
	use App\Hanghoa;
	use App\Kho;
	use App\Khuvuc;
	use App\Loaihanghoa;
	use App\Nhacungcap;
	use App\Nhomhanghoa;
	use App\Phieunhap;
	use App\Thanhtoan;

class PagesController extends Controller
{
    //

	public function index(){
		$ban = Ban::all();
		return view('pages.ban',['ban'=>$ban]);
	}
	
	
	public function datban($maban){
		$ban = Ban::where('maban',$maban)->first();
		$ban->trangthai = 'đã đặt';
		$ban->save();
		$datmon = new Datmon;
		$datmon->maban = $maban;
		$datmon->thoigian = date('Y-m-d');
		$datmon->trangthai = 'chưa thanh toán';
		$datmon->tongtien = 0;
		$datmon->save();
		$datmon = Datmon::where('maban',$maban)->orderBy('id','desc')->first();

		

		$hanghoa = Hanghoa::all();

		return redirect()->route('suaban',[$maban]);
	}
	public function suaban($maban){
		$ban = Ban::where('maban',$maban)->first();
		
		$datmon = Datmon::where('maban',$maban)->orderBy('id','desc')->first();

		$hanghoa = Hanghoa::all();
		$chitietdatmon = Chitietdatmon::where('id_datmon',$datmon->id)->get();
		return view('pages.suaban',['ban'=>$ban,'hanghoa'=>$hanghoa,'datmon'=>$datmon,'chitietdatmon'=>$chitietdatmon]);
	}
	public function suabanxoahh($id){
		$chitietdatmon = Chitietdatmon::where('id',$id)->first();
		
		$soluong = $chitietdatmon->soluong;
		$mahh = $chitietdatmon->mahh;
		$id_datmon = $chitietdatmon->id_datmon;
		
		$hanghoa = Hanghoa::where('mahh',$mahh)->first();
		$dongia = $hanghoa->dongia;

		if($hanghoa->maloaihh == 'LHH02'){
			$chitietkho = Chitietkho::where('mahh',$mahh)->first();
			$chitietkho->soluong = $chitietkho->soluong + $soluong;
			$chitietkho->save();
		}

		$datmon = Datmon::where('id',$id_datmon)->first();
		$datmon->tongtien = $datmon->tongtien - $dongia*$soluong;
		$datmon->save();
		
		$chitietdatmon->delete();
		return redirect()->back()->with('alert', 'Xóa thành công');
	}

	public function insertdatmon(Request $rq,$mahh){
		
		$hanghoa = Hanghoa::where('mahh',$mahh)->first();
		if($hanghoa->maloaihh == 'LHH02'){
			$chitietkho = Chitietkho::where('mahh',$mahh)->first();
			$chitietkho->soluong = $chitietkho->soluong - $rq->soluong;
			if($chitietkho->soluong < 0)
					return redirect()->back()->with('alert', 'Số lượng tồn kho không đủ');
			$chitietkho->save();
		}
		if($hanghoa->maloaihh == 'LHH01'){
			$dinhluong = Dinhluong::where('mahh_tp',$mahh)->get();
			foreach($dinhluong as $dl){

				$chitietkho = Chitietkho::where('mahh',$dl->mahh)->first();
				$chitietkho->soluong = $chitietkho->soluong - $rq->soluong*$dl->khoiluong;
				if($chitietkho->soluong < 0)
					return redirect()->back()->with('alert', 'Số lượng tồn kho không đủ'); 
				$chitietkho->save();
			}
		}

		$id_datmon =  $rq->input('id_datmon');
		$chitietdatmon = new Chitietdatmon;
		$chitietdatmon->id_datmon = $id_datmon;
		$chitietdatmon->mahh = $mahh;
		$chitietdatmon->soluong = $rq->soluong;
		$chitietdatmon->save();

		$datmon = Datmon::where('id',$id_datmon)->first();
		$datmon->tongtien =$datmon->tongtien + $rq->soluong*$hanghoa->dongia;
		$datmon->save();


		return redirect()->back()->with('alert', 'thêm thành công');
	}

	public function thanhtoan($id_datmon){
		$datmon = Datmon::where('id',$id_datmon)->first();
		$datmon->trangthai = 'đã thanh toán';
		$datmon->save();
		$maban = $datmon->maban;
		$ban = Ban::where('maban',$maban)->first();
		$ban->trangthai = 'trống';
		$ban->save();
		return redirect()->route('index');
	}
	
	public function hanghoa(){
		$hanghoa  = Hanghoa::all();
		$loaihanghoa = Loaihanghoa::all();
		$nhomhanghoa = Nhomhanghoa::all();
		$kho = Kho::all();

		return view('kho.hanghoa',['hanghoa'=>$hanghoa,'loaihanghoa'=>$loaihanghoa,'nhomhanghoa'=>$nhomhanghoa,'kho'=>$kho]);
	}

	public function inserthanghoa(Request $rq){
		$this->validate($rq,
    		[
    			'mahh'=>'unique:hanghoa',
    			'donvitinh'=>'in:ly,lon,chai,gam',
    			'dongia'=>'numeric',
    		],
    		[
    			'mahh.unique'=>'Mã hàng hóa đã tồn tại',
    			'donvitinh.in'=>'Đơn vị tính không phù hợp',
    			'dongia.numeric'=>'Đơn giá phải là số',
    		]);

		$hanghoa = new Hanghoa;
		$hanghoa->mahh = $rq->mahh;
		$hanghoa->manhomhh = $rq->manhomhh;
		$hanghoa->maloaihh = $rq->maloaihh;
		$hanghoa->tenhh = $rq->tenhh;
		$hanghoa->donvitinh = $rq->donvitinh;
		$hanghoa->dongia = $rq->dongia;
		if($hanghoa->maloaihh == 'LHH01'){
			$hanghoa->dinhluong = 'chưa định lượng';
		}
		else{
			$hanghoa->dinhluong = 'không';
		}
		$hanghoa->save();

		if($hanghoa->maloaihh != 'LHH01'){
			$chitietkho = new Chitietkho;
			$chitietkho->makho = $rq->makho;
			$chitietkho->mahh = $rq->mahh;
			$chitietkho->soluong = 0;
			$chitietkho->save();
		}

		return redirect()->back()->with('alert','Đã thêm thành công');
		

	}
	public function getsuahanghoa($mahh){
		$hanghoa = Hanghoa::where('mahh',$mahh)->first();
		$loaihanghoa = Loaihanghoa::all();
		$nhomhanghoa = Nhomhanghoa::all();
		$kho = Kho::all();
		$chitietkho = Chitietkho::where('mahh',$mahh)->first();
		return view('kho.hanghoasua',['hanghoa'=>$hanghoa,'loaihanghoa'=>$loaihanghoa,'nhomhanghoa'=>$nhomhanghoa,'kho'=>$kho,'chitietkho'=>$chitietkho]);	
	}

	public function postsuahanghoa(Request $rq, $mahh){
		$hanghoa = Hanghoa::where('mahh',$mahh)->first();
		$hanghoa->manhomhh = $rq->manhomhh;
		$hanghoa->maloaihh = $rq->maloaihh;
		$hanghoa->tenhh = $rq->tenhh;
		$hanghoa->donvitinh = $rq->donvitinh;
		$hanghoa->dongia = $rq->dongia;
		$hanghoa->save();

		return redirect()->route('hanghoaindex')->with('alert','Đã sửa thành công');
	}


	public function nhomhanghoa(){
		$nhomhanghoa = Nhomhanghoa::all();

		return view('kho.nhomhanghoa',['nhomhanghoa'=>$nhomhanghoa]);
	}

	public function insertnhomhanghoa(Request $rq){
		$this->validate($rq,
    		[
    			'manhomhh'=>'unique:nhomhanghoa',
    			'tennhomhh'=>'unique:nhomhanghoa',
    		],
    		[
    			'manhomhh.unique'=>'Mã nhóm hàng hóa đã tồn tại',
    			'tennhomhh.unique'=>'Tên nhóm hàng hóa đã tồn tại',
    		]);

		$nhomhanghoa = new Nhomhanghoa;
		$nhomhanghoa->manhomhh = $rq->manhomhh;
		$nhomhanghoa->tennhomhh = $rq->tennhomhh;
		$nhomhanghoa->save();
		return redirect()->back()->with('alert','Đã thêm thành công');
	}
	public function getsuanhomhanghoa($manhomhh){
		$nhomhanghoa = Nhomhanghoa::where('manhomhh',$manhomhh)->first();
		return view('kho.nhomhanghoasua',['nhomhanghoa'=>$nhomhanghoa]);
	}
	public function postsuanhomhanghoa(Request $rq, $manhomhh){
		$nhomhanghoa = Nhomhanghoa::where('manhomhh',$manhomhh)->first();
		$nhomhanghoa->tennhomhh = $rq->tennhomhh;
		$nhomhanghoa->save();

		return redirect()->route('nhomhanghoaindex')->with('alert','Đã sửa thành công');
	}

	
	public function dinhluong(){
		$hanghoa = Hanghoa::where('maloaihh','LHH01')->get();
		return view('kho.dinhluong',['hanghoa'=>$hanghoa]);
	}

	public function suadinhluong($mahh_tp){
		$mahh_thanhpham = $mahh_tp;
		$hanghoa_tp = Hanghoa::where('mahh',$mahh_tp)->first();
		$hanghoa = Hanghoa::where('maloaihh','LHH03')->get();
		$dinhluong = Dinhluong::where('mahh_tp',$mahh_tp)->get();
		return view('kho.dinhluongsua',['hanghoa'=>$hanghoa,'hanghoa_tp'=>$hanghoa_tp,'mahh_thanhpham'=>$mahh_thanhpham,'dinhluong'=>$dinhluong]);
	}

	public function insertdinhluong(Request $rq,$mahh){
		$dinhluong = new Dinhluong;
		$dinhluong->mahh_tp = $rq->mahh_tp;
		$dinhluong->mahh = $rq->mahh;
		$dinhluong->khoiluong = $rq->khoiluong;
		$dinhluong->save();

		return redirect()->back()->with('alert','Thêm định lượng thành công');
	}

	public function xoadinhluong($id){
		$dinhluong  = Dinhluong::where('id',$id)->first();
		$dinhluong->delete();
		return redirect()->back()->with('alert','Đã xóa thành công');
	}

	public function themdinhluong($mahh_tp){
		$hanghoa = Hanghoa::where('mahh',$mahh_tp)->first();
		$hanghoa->dinhluong = 'đã định lượng';
		$hanghoa->save();
		return redirect()->route('dinhluongsua',[$mahh_tp]);
	}

	public function kho(){
		$chitietkho  = Chitietkho::all();

		return view('kho.kho',['chitietkho'=>$chitietkho]);

	}

	public function nhapkho(){
		return view ('kho.nhapkho');
	}

}
