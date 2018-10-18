@extends('templates.quanlyvanban.master')
@section('NoiDung')
<style type="text/css">
.chosen-container .chosen-container-multi .chosen-with-drop .chosen-container-active{
  width: 300px;
}
</style>
<div style="margin: 5%;">
   <p>Người gửi: {{ $getTinNhan->NGUOI_GUI }}</p>
   <p>Ngày: {{ $getTinNhan->NGAY_GUI }}</p>
   <p>
      {{ $getTinNhan->NOI_DUNG }}
   </p>
   <button type="submit">Trả lời</button>
   <button type="submit">Chuyển tiếp</button>
</div>
@endsection

