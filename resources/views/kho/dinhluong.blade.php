@extends('index')

@section('content')
	<div class="content">
		<div class="row">
			<center>
				<div class="col-center">
		 		<center><h3>Danh sách định lượng</h3></center>
		 		<table class="table table-hover">
				    <thead>
				     	<tr>
				     		<th>Mã</th>
					        <th>Tên thức uống</th>
					        <th>Loại hàng hóa</th>
					        <th>Đơn vị tính</th>
					        <th>Định lượng</th>
				      	</tr>
				    </thead>
				    <tbody>
				      	@foreach($hanghoa as $hh)
					      	<tr>
					      		<td>{{$hh->mahh}}</td>
						        <td>{{$hh->tenhh}}</td>
						        <td>{{$hh->loaihanghoa->tenloaihh}}</td>
						        <td>{{$hh->donvitinh}}</td>
					        	@if($hh->dinhluong == 'đã định lượng')
					        		<td><a href="dinhluong/sua/{{$hh->mahh}}" class="btn btn-info">Sửa định lượng</a></td>
					        	@else
					        		<td><a href="dinhluong/them/{{$hh->mahh}}" class="btn btn-primary">Thêm định lượng</a></td>
					        	@endif
					      	</tr>
						@endforeach
				      	
				      </tbody>
				</table>
		 	</div>
			</center>
		</div>
	</div>

@endsection