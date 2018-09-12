@extends('templates.quanlyvanban.master')
@section('NoiDung')
  <h2>Danh sách nhân sự trong đơn vị</h2> <br>
  <div style="margin-left: 5%;margin-top: 3%;">
  @foreach($dsNhanSu as $nhanSu)
    <p style='text-align: left;'>
                        Họ và tên: <a href="{{Route('quanlyvanban.nhansu.chitietnhansudonvi',['maNhanSu'=>$nhanSu->MA_NHAN_SU])}}">{{$nhanSu->HO_VA_TEN}}</a> <br>
                        Số điện thoại: {{$nhanSu->SO_DIEN_THOAI}} <br>
                        Địa chỉ email: {{$nhanSu->EMAIL}}
                </p><hr>

  @endforeach
  {{$dsNhanSu->links()}}
  </div>
@endsection