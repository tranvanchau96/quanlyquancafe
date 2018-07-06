@extends('index')

@section('content')
	<div class="content">
		<div class="row">

		 	<div class="col-lg-4 hh-left">
		 		@if(count($errors) >0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $err)
								{{$err}}<br>
							@endforeach
						</div>
					@endif
		 		@if(session('alert'))
					<div class="alert alert-info">
						{{session('alert')}}
					</div>
				@endif
		 		<center><h3>Thêm mới hàng hóa</h3></center>
				<form class="form-horizontal" action="inserthanghoa" method="POST">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="form-group">
					    <label class="control-label col-lg-4" >Mã hàng hóa:</label>
					    <div class="col-lg-8">
					      	<input type="text" class="form-control" required name="mahh" placeholder="HH01">
					    </div>
					</div>
					<div class="form-group">
					    <label class="control-label col-lg-4" >Tên hàng hóa:</label>
					    <div class="col-lg-8">
					      	<input type="text" class="form-control" required name="tenhh" placeholder="Cà phê sữa">
					    </div>
					</div>
					<div class="form-group">
					    <label class="control-label col-lg-4" >Loại hàng hóa:</label>
					    <div class="col-lg-8">
					      	<select class="form-control" name="maloaihh">
							    @foreach($loaihanghoa as $lhh)
							    	<option value="{{$lhh->maloaihh}}">{{$lhh->tenloaihh}}</option>
							    @endforeach
							</select>
					    </div>
					</div>
					<div class="form-group">
					    <label class="control-label col-lg-4" >Nhóm hàng hóa:</label>
					    <div class="col-lg-8">
					      	<select class="form-control" name="manhomhh" ">
							     @foreach($nhomhanghoa as $nhh)
							    	<option value="{{$nhh->manhomhh}}">{{$nhh->tennhomhh}}</option>
							    @endforeach
							</select>
					    </div>
					</div>
					<div class="form-group">
					    <label class="control-label col-lg-4"  >Đơn vị tính:</label>
					    <div class="col-lg-8">
					      	<input type="text" class="form-control" required name="donvitinh" placeholder="ly,chai,lon,gam">
					    </div>
					</div>
					<div class="form-group">
					    <label class="control-label col-lg-4"  >Đơn giá:</label>
					    <div class="col-lg-8">
					      	<input type="text" class="form-control" required name="dongia" placeholder="10000">
					    </div>
					</div>
					<div class="form-group">
					    <label class="control-label col-lg-4"  >Chọn kho:</label>
					    <div class="col-lg-8">
					      	<select class="form-control" name="makho">
							    @foreach($kho as $k)
							    	<option value="{{$k->makho}}">{{$k->tenkho}}</option>
							    @endforeach
							</select>
					    </div>
					</div>
					<center><button type="submit" class="btn btn-primary">Thêm</button></center>
				</form>
		 	</div>

		 	<div class="col-lg-8 hh-right">
		 		<center><h3>Danh sách hàng hóa</h3></center>
		 		<table class="table table-hover">
				    <thead>
				     	<tr>
				     		<th>Mã</th>
					        <th>Tên thức uống</th>
					        <th>Đơn vị tính</th>
					        <th>Đơn giá</th>
					        <th>Sửa</th>
					        <th>Xóa</th>
				      	</tr>
				    </thead>
				    <tbody>
				      	@foreach($hanghoa as $hh)
					      	<tr>
					      		<td>{{$hh->mahh}}</td>
						        <td>{{$hh->tenhh}}</td>
						        <td>{{$hh->donvitinh}}</td>
						        <td>{{$hh->dongia}}đ</td>
						        <td><a href="hanghoa/sua/{{$hh->mahh}}" class="btn btn-info">Sửa</a></td>
						        <td><a href="hanghoa/xoa/{{$hh->mahh}}" class="btn btn-danger">Xóa</a></td>
					      	</tr>
						@endforeach

				      </tbody>
				</table>
		 	</div>
		</div>
	</div>

@endsection