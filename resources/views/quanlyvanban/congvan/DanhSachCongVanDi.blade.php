@extends('templates.quanlyvanban.master')
@section('NoiDung')
<h2>Danh sách công văn đi</h2>
 @inject('service', 'App\Http\Controllers\quanlyvanban\CongVanController')
   {{$service->phanTrang($page,$sqlQuery,$tuKhoa,$loaiTimKiem,2)}}
@endsection