@extends('index')

@section('content')
	<div class="content">
		<div class="row">

		 	<div class="col-lg-4 dl-left">
		 		@if(session('alert'))
					<div class="alert alert-info">
						{{session('alert')}}
					</div>
				@endif
		 		<center><h3>Chi tiết định lượng cho <p style="color: red;font-size: 30px;">{{$hanghoa_tp->tenhh}}</p></h3></center>
		 		<table class="table table-hover">
				    <thead>
				     	<tr>
				     		<th>Mã</th>
					        <th>Tên nguyên liệu</th>
					        <th>Đơn vị tính</th>
					        <th>Khối lượng</th>
					        <th>Xóa</th>
				      	</tr>
				    </thead>
				    <tbody>
					    @foreach($dinhluong as $dl)
					      	<tr>
					      		<td>{{$dl->mahh}}</td>
						        <td>{{$dl->hanghoa->tenhh}}</td>
						        <td>{{$dl->hanghoa->donvitinh}}</td>
						        <td>{{$dl->khoiluong}}</td>
						        <td><a href="dinhluong/xoa/{{$dl->id}}" class="btn btn-danger">Xóa</a></td>
					      	</tr>
						@endforeach

				      </tbody>
				</table>
		 	</div>

		 	<div class="col-lg-8 dl-right">
		 		<center><h3>Danh sách hàng hóa</h3></center>
		 		<table class="table table-hover">
				    <thead>
				     	<tr>
				     		<th>Mã</th>
					        <th>Tên thức uống</th>
					        <th>Đơn vị tính</th>
					        <th>Đơn giá</th>
					        <th>Khối lượng</th>
					        <th>Chọn</th>
				      	</tr>
				    </thead>
				    <tbody>
				      	@foreach($hanghoa as $hh)
					      	<tr>
						      	<form action="insertdinhluong/{{$hh->mahh}}" method="POST">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<input type="hidden" name="mahh_tp" value="{{$mahh_thanhpham}}">
										<td>{{$hh->mahh}}</td>
								        <td>{{$hh->tenhh}}</td>
								        <td>{{$hh->donvitinh}}</td>
								        <td>{{$hh->dongia}}đ</td>
								        <td style="width: 20%;"><input type="text" class="form-control" name="khoiluong"></td>
								        <td><button type="submit" class="btn btn-info bt1">Chọn</button></td>
								</form>
							</tr>
					   @endforeach

				      </tbody>
				</table>
		 	</div>
		</div>
	</div>

@endsection