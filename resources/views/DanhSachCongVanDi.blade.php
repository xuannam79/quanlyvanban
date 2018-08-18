@extends('layout.MainLayout_Admin')
@section('NoiDung')
<h2>Danh sách công văn đi</h2>
 @inject('service', 'App\Http\Controllers\CongVanController')
   {{$service->phanTrang($page,$sqlQuery,$tuKhoa,$loaiTimKiem,2)}}
@endsection