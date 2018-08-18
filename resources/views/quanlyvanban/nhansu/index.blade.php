@extends('layout.MainLayout_Admin')
@section('NoiDung')
<div style="margin: 5%;">
<h2>Danh sách nhân sự</h2>         
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Mã nhân sự</th>
        <th>Họ và tên</th>
        <th>Năm sinh</th>
        <th>Giới tính</th>
        <th>Địa chỉ</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach($dsNhanSu as $key=>$value)
      <tr>
        <td>{{$value->MA_NHAN_SU}}</td>
        <td>{{$value->HO_VA_TEN}}</td>
        <td>{{$value->NAM_SINH}}</td>
        <td>{{$value->GIOI_TINH}}</td>
        <td>{{$value->DIA_CHI}}</td>
        <td><a class="btn btn-info" href="{{ url("/ChiTietNhanSu/$value->MA_NHAN_SU") }}"><span class="glyphicon glyphicon-search"></span> Xem chi tiết</a></td>
      </tr>
    @endforeach
    </tbody>
  </table>
  </div>
@endsection