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
		 		<center><h3>Thêm mới nhóm hàng hóa</h3></center>
				<form class="form-horizontal" action="insertnhomhanghoa" method="POST">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="form-group">
					    <label class="control-label col-lg-4" >Mã nhóm</label>
					    <div class="col-lg-8">
					      	<input type="text" class="form-control" required name="manhomhh" placeholder="NHH01">
					    </div>
					</div>
					<div class="form-group">
					    <label class="control-label col-lg-4" >Tên nhóm</label>
					    <div class="col-lg-8">
					      	<input type="text" class="form-control" required name="tennhomhh" placeholder="Cà phê">
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
				     		<th>Mã nhóm</th>
					        <th>Tên nhóm hàng hóa</th>
				      	</tr>
				    </thead>
				    <tbody>
				      	@foreach($nhomhanghoa as $nhh)
					      	<tr>
					      		<td>{{$nhh->manhomhh}}</td>
						        <td>{{$nhh->tennhomhh}}</td>
						        <td><a href="nhomhanghoa/sua/{{$nhh->manhomhh}}" class="btn btn-info">Sửa</a></td>
						        <td><a href="nhomhanghoa/xoa/{{$nhh->manhomhh}}" class="btn btn-danger">Xóa</a></td>
					      	</tr>
						@endforeach

				      </tbody>
				</table>
		 	</div>
		</div>
	</div>

@endsection