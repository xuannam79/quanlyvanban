@extends('templates.quanlyvanban.master')
@section('NoiDung')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
<script type="text/javascript" src="{{url('js/choosen.jquery.min.js')}}"></script>
<style type="text/css">
.chosen-container .chosen-container-multi .chosen-with-drop .chosen-container-active{
  width: 300px;
}
</style>
<script type="text/javascript">
   $(document).ready(function(){
       $(".livesearch").chosen(); 
   });
</script>
<div style="margin: 5%;">
<h2>Gửi tin nhắn</h2>
<div>
   <form action="{{Route('quanlyvanban.guitinnhan.index')}}" method="post" enctype="multipart/form-data">
   {{csrf_field()}}
   <div class="form-group">
      <label class="lbl_ThemCongVan">Người nhận(<font color="red">*</font>) :</label>
      <select class="livesearch" name="DanhSachNguoiNhan[]" multiple="" style="width: 100%;">
         @foreach($dsNguoiNhan as $nguoiNhan)
          <option value="{{$nguoiNhan->MA_NHAN_SU}}">{{$nguoiNhan->HO_VA_TEN}}</option>
         @endforeach
      </select>
   </div>
   <div class="form-group">
      <label class="lbl_ThemCongVan">Nội dung tin nhắn(<font color="red">*</font>) :</label>
      <textarea name="NoiDungTinNhan" size="50x2" class="form-control"></textarea>
   </div><br>
   <div class="form-group">
      <label class="lbl_ThemCongVan">File đính kèm(<font color="red">*</font>) :</label>
      <input type="file" name="FileDinhKem[]" multiple="true" class="form-control-file">
   </div>
   <div style="float: left;">
</div>

<div style="margin-top: 5%;">
      <button onclick="history.back();" class="btn btn-default">Quay lại</button>
      <input type="submit" class="btn btn-primary" value="Gửi">
</div>
</form>
<script type="text/javascript" src="{{url('js/jquery.validate.min.js')}}" ></script>
<script type="text/javascript">
     $(".livesearch").chosen();
</script>
</div>
@endsection

