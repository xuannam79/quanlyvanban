

@extends('templates.quanlyvanban.master')
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
   <form method="post" action="{{route('quanlyvanban.bieumau.taomoibieumau')}}" enctype="multipart/form-data">
    {{csrf_field()}}
   <div class="form-group">
      <label class="lbl_ThemCongVan">Tên/nhóm biểu mẫu (<font color="red">*</font>) :</label>
      <input type="text" name="TenBieuMau" class="form-control">
      @if($errors->has('TenBieuMau'))
         <b><font color="red">{{$errors->first('TenBieuMau')}}!</font></b>
      @endif
   </div>
      <div class="form-group">
      <label class="lbl_ThemCongVan">Đơn vị ban hành :</label>
      <select name="DonViBanHanh" class="form-control">
        @foreach($dsDonVi as $donVi)
          <option value="{{$donVi->MA_DON_VI}}">{{$donVi->TEN_DON_VI}}</option>
        @endforeach
      </select>
   </div>
   <div class="form-group">
      <label class="lbl_ThemCongVan">Ngày ban hành(<font color="red">*</font>) :</label>
      <input type="date" name="NgayBanHanh" class="form-control">
      @if($errors->has('NgayBanHanh'))
         <b><font color="red">{{$errors->first('NgayBanHanh')}}!</font></b>
      @endif
   </div>
   <div class="form-group">
      <label class="lbl_ThemCongVan">Ngày gửi(<font color="red">*</font>) :</label>
      <input type="date" name="NgayGui" value="{{\Carbon\Carbon::now()->subDay()->format('Y-m-d')}}" class="form-control">
      @if($errors->has('NgayGui'))
         <b><font color="red">{{$errors->first('NgayGui')}}!</font></b>
      @endif
   </div>
   <div class="form-group">
      <label class="lbl_ThemCongVan">Trích yếu nội dung(<font color="red">*</font>) :</label>
      <textarea name="TrichYeuNoiDung" class="form-control" size="50x2"></textarea>
      @if($errors->has('TrichYeuNoiDung'))
         <b><font color="red">{{$errors->first('TrichYeuNoiDung')}}!</font></b>
      @endif
   </div>
   <div class="form-group">
      <label class="lbl_ThemCongVan">Người ký duyệt(<font color="red">*</font>) :</label><br>
      <select name="NguoiKyDuyet" class="form-control">
        @foreach($dsNhanSu as $nhanSu)
          <option value="{{$nhanSu->MA_NHAN_SU}}">{{$nhanSu->HO_VA_TEN}}</option>
        @endforeach
      </select>
   </div>
   <div class="form-group">
      <label class="lbl_ThemCongVan">File đính kèm(<font color="red">*</font>) :</label>
      <input type="file" name="FileDinhKem[]" multiple="true" class="form-control-file">
      @if($errors->has('FileDinhKem'))
         <b style="float: left;"><font color="red">{{$errors->first('FileDinhKem')}}!</font></b>
      @endif
   </div>
   <input type="submit" name="TaoMoiBieuMau" value="Lưu" class="btn btn-primary">
   </form>
</div>
@endsection

