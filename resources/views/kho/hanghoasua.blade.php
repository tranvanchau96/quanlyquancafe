@extends('index')

@section('content')
	<div class="content">
		<a href="hanghoa" class="btn btn-danger">Trở lại</a>
		<center>
			<h3>Sửa hàng hóa</h3>
			<form class="form-horizontal" action="hanghoa/sua/{{$hanghoa->mahh}}" method="POST">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="form-group">
					    <label class="control-label col-lg-4" >Mã hàng hóa:</label>
					    <div class="col-lg-6">
					      	<input  class="form-control" disabled name="mahh" value="{{$hanghoa->mahh}}">
					    </div>
					</div>
					<div class="form-group">
					    <label class="control-label col-lg-4" >Tên hàng hóa:</label>
					    <div class="col-lg-6">
					      	<input  class="form-control" required name="tenhh" value="{{$hanghoa->tenhh}}">
					    </div>
					</div>
					<div class="form-group">
					    <label class="control-label col-lg-4" >Loại hàng hóa:</label>
					    <div class="col-lg-6">
					      	<select class="form-control" name="maloaihh">
							    @foreach($loaihanghoa as $lhh)
							    	@if($lhh->maloaihh == $hanghoa->maloaihh)
							    		<option selected value="{{$lhh->maloaihh}}">{{$lhh->tenloaihh}}</option>
							    	@else
							    		<option value="{{$lhh->maloaihh}}">{{$lhh->tenloaihh}}</option>
							    	@endif
							    @endforeach
							</select>
					    </div>
					</div>
					<div class="form-group">
					    <label class="control-label col-lg-4" >Nhóm hàng hóa:</label>
					    <div class="col-lg-6">
					      	<select class="form-control" name="manhomhh">
							    @foreach($nhomhanghoa as $nhh)
							    	@if($nhh->manhomhh == $hanghoa->manhomhh)
							    		<option selected value="{{$nhh->manhomhh}}">{{$nhh->tennhomhh}}</option>
							    	@else
							    		<option value="{{$nhh->manhomhh}}">{{$nhh->tennhomhh}}</option>
							    	@endif
							    @endforeach
							</select>
					    </div>
					</div>
					<div class="form-group">
					    <label class="control-label col-lg-4" >Đơn vị tính:</label>
					    <div class="col-lg-6">
					      	<input  class="form-control" required name="donvitinh" value="{{$hanghoa->donvitinh}}">
					    </div>
					</div>
					<div class="form-group">
					    <label class="control-label col-lg-4" >Đơn giá:</label>
					    <div class="col-lg-6">
					      	<input  class="form-control" required name="dongia" value="{{$hanghoa->dongia}}">
					    </div>
					</div>
					
					<center><button type="submit" class="btn btn-primary">Sửa</button></center>
				</form>
		</center>
	</div>
@endsection
