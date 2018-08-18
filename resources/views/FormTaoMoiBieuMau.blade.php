

@extends('layout.MainLayout_Admin')
@section('NoiDung')
<script type="text/javascript">
   $(document).ready(function(){
       $("#DonVi").hide();
       $("#Chon").prop('checked',false);
   });
   function NS_Click(){
     $("#DonVi").hide();
     $("#NhanSu").show();
   }
   function DV_Click(){
     $("#NhanSu").hide();
     $("#DonVi").show();
   }
   function TC_Click(){
     $("#NhanSu").hide();
     $("#DonVi").hide();
   }
   
</script>
<div style="margin: 5%;">
<h2>Tạo mới biểu mẫu</h2>
   {!!Form::open(['url'=>'/TaoMoiBieuMau','enctype'=>'multipart/form-data','onsubmit'=>'setSelected();','id'=>'FormTaoMoiCongVan','method'=>'post'])!!}
   <div class="form-group">
      <label class="lbl_ThemCongVan">Tên/nhóm biểu mẫu (<font color="red">*</font>) :</label>
      {{Form::text('TenBieuMau','',['class'=>'form-control'])}}
   </div>
      <div class="form-group">
      <label class="lbl_ThemCongVan">Đơn vị ban hành :</label>
      {{Form::select('DonViBanHanh',$dsDonVi,null,['class'=>'form-control'])}}
   </div>
   <div class="form-group">
      <label class="lbl_ThemCongVan">Ngày ban hành(<font color="red">*</font>) :</label>
      {{Form::date('NgayBanHanh','',['class'=>'form-control'])}}
   </div>
   <div class="form-group">
      <label class="lbl_ThemCongVan">Ngày gửi(<font color="red">*</font>) :</label>
      {{Form::date('NgayGui',\Carbon\Carbon::now(),['class'=>'form-control'])}}
   </div>
   <div class="form-group">
      <label class="lbl_ThemCongVan">Trích yếu nội dung(<font color="red">*</font>) :</label>
      {{Form::textarea('TrichYeuNoiDung','',['size'=>'50x2','class'=>'form-control'])}}
   </div>
   <div class="form-group">
      <label class="lbl_ThemCongVan">Người ký duyệt(<font color="red">*</font>) :</label><br>
      {{Form::select('NguoiKyDuyet',$dsNhanSu,null,['class'=>'form-control'])}}
   </div>
   <div class="form-group">
      <label class="lbl_ThemCongVan">File đính kèm(<font color="red">*</font>) :</label>
      {{Form::file('FileDinhKem[]',['multiple'=>'true','class'=>'form-control-file'])}}
      @if($errors->has('FileDinhKem'))
         <b><font color="red">{{$errors->first('FileDinhKem')}}!</font></b>
      @endif
   </div>
   <input type="submit" name="TaoMoiBieuMau" value="Lưu" class="btn btn-primary">
   {!!Form::close()!!}
</div>
@endsection

