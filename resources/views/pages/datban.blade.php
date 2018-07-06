@extends('index')

@section('content')

<div class="content">
	
	<div class="block-menu">
		
		<form action="/">
	      	<input type="text" class="form-control searchbox" placeholder="Search">
	     	<button type="submit" class="btn btn-info bt-search" >find</button>
	    </form>
		<div class="clearfix">
			@foreach($hanghoa as $hh)	
				@if($hh->maloaihh != 'LHH03')
					<form action="">
						<div class="db-item">
							<img src="images/sting.jpg" id="item" alt="">
							<p class="item-tittle">{{$hh->tenhh}}</p>
							<input type="text" class="form-control f1" >
							<button type="button" class="btn btn-info bt1">Chọn</button>
						</div>
					</form>
				@endif
			@endforeach
		</div>	
	</div>
	<div class="block-info">
		<h2 align="center">Bàn 01</h2>
		<div class="clearfix">
			<h3 align="center">Đã đặt</h3>
			<div class="div-center">
				<table class="table table-hover">
			    <thead>
			     	<tr>
				        <th>Tên thức uống</th>
				        <th>Số lượng</th>
				        <th>Đơn giá</th>
				        <th>Xóa</th>
			      	</tr>
			    </thead>
			    <tbody>
				   
				      	<tr>
					        <td></td>
					        <td></td>
					        <td> đồng</td>
					        <td><a href="" class="btn btn-danger">Xóa</a></td>
				      	</tr>
				    
			      	<tr>
				        <td><h4>Tổng</h4></td>
				        <td><h4></h4></td>
				        <td><h4>{{$datmon->tongtien}} đồng</h4></td>
				        <td></td>
			      	</tr>

			      
			    </tbody>
				</table>
				<center><a href="" class="btn btn-danger center">Hủy bàn</a>&nbsp&nbsp<a href="" class="btn btn-primary center">Thanh toán</a></center>
			
			</div>
		</div>
	</div>

	

	
		<br><br><br><br>
</div>

@endsection