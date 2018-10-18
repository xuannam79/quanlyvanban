@extends('templates.quanlyvanban.master')
@section('NoiDung')
<style type="text/css">
.chosen-container .chosen-container-multi .chosen-with-drop .chosen-container-active{
  width: 300px;
}
.nhantinnhan{
  border: 1px solid blue;
  border-radius: 5px;
  width: 100%;
  float: left;
  text-align: left;
  padding: 10px 0px 5px 5px;
  margin-bottom: 2px;
}
.nhantinnhan:hover{
  color: yellow;
  text-decoration: none;
  background-color: silver;
}
</style>
<div style="margin: 5%; text-align: left;">
<h2>Danh sách tin nhắn</h2>
  @foreach($getItems as $item)
  @php
    $idtinnhan = $item->MA_TIN_NHAN;
    $tennguoigui = $item->NGUOI_GUI;
    $ngaygui = $item->NGAY_GUI;
    $giogui = $item->GIO_GUI;
  @endphp
   <a class="nhantinnhan" href="{{ route('quanlyvanban.guitinnhan.detail',$idtinnhan) }}">
     <p>
       Tên người gửi: {{ $tennguoigui }}
     </p>
     <p>
       Ngày gửi: {{ $ngaygui }} - {{ $giogui }}
     </p>
   </a>
  @endforeach
@endsection

