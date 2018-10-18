@extends('templates.quanlyvanban.master')
@section('NoiDung')
<style type="text/css">
.chosen-container .chosen-container-multi .chosen-with-drop .chosen-container-active{
  width: 300px;
}
.nhantinnhan {
  margin: 3%;
  text-align: left;
  border: 1px solid blue;
  border-radius:5px;
  padding-left: 10px;
  width: 90%;
  background-color: white;
  transition-duration: 0.4s;
}
.nhantinhan: hover {
   background-color: silver;
}
</style>
<div style="margin: 5%;">
<h2>Danh sách tin nhắn</h2>
   <button type="button" class="nhantinnhan">
      <p>Tên người nhận</p>
      <p>Ngày gửi: </p>
      <p>Chủ đề: </p>
   </button>
@endsection

