@extends('templates.quanlyvanban.master')
@section('NoiDung')
<h2>Gửi tin nhắn</h2>
<div>
   <div class="form-group">
     <label>Người gửi(<font color="red">*</font>) :</label>
   </div>

   <div class="form-group">
      <label>Ngày gửi(<font color="red">*</font>) :</label>
      <input type="datetime" name="ngaygui" value="" placeholder="">
   </div>

   <div class="form-group">
      <label>Nội dung(<font color="red">*</font>) :</label>
      <textarea name="noidung"></textarea>
   </div>

   <div class="form-group">
      <label>File đính kèm(<font color="red">*</font>) :</label> <br>
      <input type="file" name="file" value="" placeholder="">
   </div>
   <input type="submit" class="btn btn btn-primary" value="Tạo"> 
    {!!Form::close()!!}
    <button onclick="history.back();" class="btn btn-secondary">Quay lại</button>
</div>
@endsection

