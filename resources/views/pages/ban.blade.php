@extends('index')

@section('content')
	<!-- Modal-->	
	<div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      	<div class="modal-content">
		        <div class="modal-header">
		          	<button type="button" class="close" data-dismiss="modal">&times;</button>
		          	<center><h3 class="modal-title">Thanh toán bàn 1</h3></center>
		        </div>
		        <div class="modal-body">
		         	<table class="table table-hover">
				    <thead>
				     	<tr>
					        <th>Tên thức uống</th>
					        <th>Số lượng</th>
					        <th>Đơn giá</th>
				      	</tr>
				    </thead>
				    <tbody>
				      	<tr>
					        <td>Cà phê sữa</td>
					        <td>1</td>
					        <td>12000đ</td>
				      	</tr>
				      	<tr>
					        <td>Cà phê sữa</td>
					        <td>1</td>
					        <td>12000đ</td>
				      	</tr>
				      	<tr>
					        <td>Cà phê sữa</td>
					        <td>1</td>
					        <td>12000đ</td>
				      	</tr>
				      	<tr>
					        <td>Cà phê sữa</td>
					        <td>1</td>
					        <td>12000đ</td>
				      	</tr>
				      	<tr>
					        <td><h4>Tổng</h4></td>
					        <td><h4>4</h4></td>
					        <td><h4>48000đ</h4></td>
				      	</tr>

				      
				    </tbody>
				</table>
					<center><a href="" class="btn btn-primary center">Thanh toán</a></center>
				
		        </div>
		        <div class="modal-footer">
		          	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
	      	</div>
      	</div>
	</div>

	<div class="content">
		<h2 align="center">Danh mục bàn</h2>
		@foreach($ban as $b)
			@if($b->trangthai == 'trống')

				<div class="table-number">
					<p class="tbn-tittle">{{$b->tenban}}</p>
					<div class="datban-bt-datban">
						<a href="datban/{{$b->maban}}">Đặt bàn</a>
					</div>
					<br>
				</div>
			
			@else
				<div class="table-number2">
					<p class="tbn-tittle">{{$b->tenban}}</p>
					<div class="datban-bt-datban datban-bt-sua">
						<a href="suaban/{{$b->maban}}">Sửa orders</a>
					</div>
					<div class="datban-bt-datban datban-bt-thanhtoan">
						<a href="" data-toggle="modal" data-target="#myModal">Thanh toán</a>
					</div>
					<br>
				</div>
			
			@endif
		@endforeach

	</div>
@endsection