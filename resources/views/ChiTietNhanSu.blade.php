@extends('layout.MainLayout_Admin')
@section('NoiDung')
<div style="margin: 3%;">
<style type="text/css">
	.AnhDaiDien{
		width: 180px;
		height: 240px;
		
	}
	.ThongTinNhanSu{
		width: 520px;
		float: right;
	}
</style>
	<h2>Thông tin nhân sự</h2>
	<h3>1. Sơ yếu lí lịch.</h3>
	<img src="{{url('img/login.png')}}"  class="AnhDaiDien" >
	<div class="ThongTinNhanSu">
		<p style="margin-left: 10%;">
			<label>Mã nhân sự:</label> {{$nhanSu[0]->MA_NHAN_SU}} <br>
			<label>Họ và tên:</label> {{$nhanSu[0]->HO_VA_TEN}} <br>
			<label>năm sinh:</label> {{$nhanSu[0]->NAM_SINH}} <br>
			<label>Giới tính:</label> {{$nhanSu[0]->GIOI_TINH}} <br>
			<label>Địa chỉ:</label> {{$nhanSu[0]->DIA_CHI}} <br>
			<label>Số điện thoại:</label> {{$nhanSu[0]->SO_DIEN_THOAI}} <br>
			<label>Email:</label> {{$nhanSu[0]->EMAIL}}
		</p>	
	</div>
	<h3>2. Đơn vị công tác.</h3>
	<div>
	@if($dsChucVu!=null)
		<table class="table table-hover">
			<thead>
				<th>Thời gian</th>
				<th>Nơi công tác</th>
				<th>Chức vụ đảm nhiệm</th>
			</thead>
			<tbody>
			@foreach($dsChucVu as $key=>$value)
				<tr>
					<td>{{$value->TU_NGAY}} {{$value->DEN_NGAY==''?' đến nay':'- '.$value->DEN_NGAY}}</td>
					<td>{{$value->TEN_DON_VI}}</td>
					<td>{{$value->TEN_CHUC_VU}}</td>
				</tr>
				
			</tbody>
			@endforeach
		</table>
		@else
		<center>Chưa làm việc ở đơn vị nào</center>
	@endif
	<center><button class="btn btn-primary" onclick="history.back();">Quay lại</button></center>
	</div>
	</div>
@endsection