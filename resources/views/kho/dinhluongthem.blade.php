@extends('index')

@section('content')
	<div class="content">
		<div class="row">

		 	<div class="col-lg-4 hh-left">
		 		<center><h2>Thêm định lượng cho </h2></center><br>
		 		<center><h3>Nguyên liệu đã chọn</h3></center>
				<table class="table table-hover">
				    <thead>
				     	<tr>
				     		<th>Mã</th>
					        <th>Tên nguyên liệu</th>
					        <th>Đơn vị tính</th>
					        <th>Số lượng</th>
					        <th>Xóa</th>
				      	</tr>
				    </thead>
				    <tbody>
				      	<tr>
				      		<td>HH01</td>
					        <td>Cà phê sữa</td>
					        <td>Ly</td>
					        <td>120</td>
					        <td><a href="" class="btn btn-danger">Xóa</a></td>
				      	</tr>
				      	<tr>
				      		<td>HH01</td>
					        <td>Cà phê sữa</td>
					        <td>Ly</td>
					        <td>120</td>
					        <td><a href="" class="btn btn-danger">Xóa</a></td>
				      	</tr>


				      </tbody>
				</table>
		 	</div>

		 	<div class="col-lg-8 hh-right">
		 		<center><h3>Danh sách nguyên liệu</h3></center>
		 		<table class="table table-hover">
				    <thead>
				     	<tr>
				     		<th>Mã</th>
					        <th>Tên nguyên liệu</th>
					        <th>Đơn vị tính</th>
					        <th>Số lượng thêm</th>
					        <th></th>
					        <th>Sửa</th>
					        <th>Xóa</th>
				      	</tr>
				    </thead>
				    <tbody>
				      	<tr>
				      		<td>HH01</td>
					        <td>Cà phê sữa</td>
					        <td>Ly</td>
					        <td>12000đ</td>
					        <td><a href="" class="btn btn-info">Sửa định lượng</a></td>
					        <td><a href="" class="btn btn-info">Sửa</a></td>
					        <td><a href="" class="btn btn-danger">Xóa</a></td>
				      	</tr>
				      	<tr>
				      		<td>HH01</td>
					        <td>Cà phê sữa</td>
					        <td>Ly</td>
					        <td>12000đ</td>
					        <td><a href="" class="btn btn-primary">Thêm định lượng</a></td>
					        <td><a href="" class="btn btn-info">Sửa</a></td>
					        <td><a href="" class="btn btn-danger">Xóa</a></td>
				      	</tr>


				      </tbody>
				</table>
		 	</div>
		</div>
	</div>

@endsection