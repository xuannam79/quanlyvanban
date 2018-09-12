@extends('templates.quanlyvanban.master')
@section('NoiDung')
<div style="margin: 3%;">
<style type="text/css">
	.AnhDaiDien{
		width: 180px;
		height: 240px;
		
	}
	.ThongTinNhanSu{
		width: 520px;
		float: left;
		text-align: left;
	}
</style>
<a style="float: left;" href="{{route('quanlyvanban.nhansu.nhansudonvi')}}"><span class="glyphicon glyphicon-arrow-left"></span> Quay về</a>
	<h2>Thông tin nhân sự</h2><br>
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
	</div><br>
	<div>
	@if($dsChucVu!=null)
		<table class="table table-hover">
			<thead>
				<th>Thời gian</th>
				<th>Nơi công tác</th>
				<th>Chức vụ đảm nhiệm</th>
			</thead>
			<tbody>
			@foreach($dsChucVu as $chucVu)
				<tr>
					<td>{{$chucVu->TU_NGAY}} {{$chucVu->DEN_NGAY==''?' đến nay':'- '.$chucVu->DEN_NGAY}}</td>
					<td>{{$chucVu->TEN_DON_VI}}</td>
					<td>{{$chucVu->TEN_CHUC_VU}}</td>
				</tr>
				
			</tbody>
			@endforeach
		</table>
		@else
		<center>Chưa làm việc ở đơn vị nào</center>
	@endif
	</div>
	</div>
@endsection
