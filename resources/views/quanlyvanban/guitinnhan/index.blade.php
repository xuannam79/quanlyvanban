@extends('templates.quanlyvanban.master')
@section('NoiDung')
<style type="text/css">
.chosen-container .chosen-container-multi .chosen-with-drop .chosen-container-active{
  width: 300px;
}
</style>
<div style="margin: 5%;">
<h2>Gửi tin nhắn</h2>
<div>
   {{csrf_field()}}
   <div class="form-group">
      <label class="lbl_ThemCongVan">Người nhận(<font color="red">*</font>) :</label>
      <input type="text" name="nguoinhan" class="form-control">
   </div>
   <div class="form-group">
      <label class="lbl_ThemCongVan">Nội dung tin nhắn(<font color="red">*</font>) :</label>
      <textarea name="noidungtinnhan" size="50x2" class="form-control"></textarea>
   </div><br>
   <div class="form-group">
      <label class="lbl_ThemCongVan">File đính kèm(<font color="red">*</font>) :</label>
      <input type="file" name="FileDinhKem[]" multiple="true" class="form-control-file">
   </div>
   <div style="float: left;">
</div>

<div style="margin-top: 5%;">
      <button onclick="history.back();" class="btn btn-default">Quay lại</button>
      <input type="submit" class="btn btn-primary" value="Tạo">
</div>
{!!Form::close()!!}
<script type="text/javascript" src="{{url('js/jquery.validate.min.js')}}" ></script>
</div>
@endsection

