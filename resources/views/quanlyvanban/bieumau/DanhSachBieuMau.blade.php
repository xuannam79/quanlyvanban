@extends('templates.quanlyvanban.master')
@section('NoiDung')
	<h2>Danh sách công văn đến</h2> <a href="{{route('quanlyvanban.bieumau.taomoibieumau')}}"><span class="glyphicon glyphicon glyphicon-plus"></span> Tạo mới biểu mẫu</a><br>
	@inject('service', 'App\Http\Controllers\quanlyvanban\BieuMauController')
   {{$service->phanTrang($page,$sqlQuery,$tuKhoa,$loaiTimKiem)}}
@endsection