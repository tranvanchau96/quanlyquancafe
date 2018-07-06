@extends('index')

@section('content')
	<div class="content">
		<div class="row">
			<center>
				<div class="col-center">
		 		<center><h3>Quản lý kho</h3></center>
		 		<table class="table table-hover">
				    <thead>
				     	<tr>
				     		<th>Mã kho</th>
					        <th>Tên hàng hóa</th>
					        <th>Loại hàng hóa</th>
					        <th>Đơn vị tính</th>
					        <th>Số lượng </th>
				      	</tr>
				    </thead>
				    <tbody>
				      	@foreach($chitietkho as $ctk)
					      	<tr>
					      		<td>{{$ctk->makho}}</td>
						        <td>{{$ctk->hanghoa->tenhh}}</td>
						        <td>{{$ctk->hanghoa->loaihanghoa->tenloaihh}}</td>
						        <td>{{$ctk->hanghoa->donvitinh}}</td>
								@if($ctk->soluong == 0)
									<td style="color: red">ĐÃ HẾT</td>
						        @else
						        	<td>{{$ctk->soluong}}</td>
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