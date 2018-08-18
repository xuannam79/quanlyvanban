@extends('layout.MainLayout_Admin')
@section('NoiDung')
	<h2>Danh sách công văn đến</h2> <a href="{{url('/TaoMoiBieuMau')}}"><span class="glyphicon glyphicon glyphicon-plus"></span> Tạo mới biểu mẫu</a><br>
	@inject('service', 'App\Http\Controllers\BieuMauController')
   {{$service->phanTrang($page,$sqlQuery,$tuKhoa,$loaiTimKiem)}}
@endsection