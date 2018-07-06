@extends('index')

@section('content')
	<div class="content">
		<a href="nhomhanghoa" class="btn btn-danger">Trở lại</a>
		<center>
			<h3>Sửa hàng hóa</h3>
			<form class="form-horizontal" action="nhomhanghoa/sua/{{$nhomhanghoa->manhomhh}}" method="POST">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="form-group">
					    <label class="control-label col-lg-4" >Mã nhóm hàng hóa:</label>
					    <div class="col-lg-6">
					      	<input  class="form-control" disabled name="manhomhh" value="{{$nhomhanghoa->manhomhh}}">
					    </div>
					</div>
					<div class="form-group">
					    <label class="control-label col-lg-4" >Tên nhóm hàng hóa:</label>
					    <div class="col-lg-6">
					      	<input  class="form-control" required name="tennhomhh" value="{{$nhomhanghoa->tennhomhh}}">
					    </div>
					</div>
					<center><button type="submit" class="btn btn-primary">Sửa</button></center>
				</form>
		</center>
	</div>
@endsection
