

@extends('templates.quanlyvanban.master')
@section('NoiDung')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script type="text/javascript" src="{{url('js/choosen.jquery.min.js')}}"></script>
<script type="text/javascript">
  var data = new Object();
   $(document).ready(function(){
       $("#DonVi").hide();
       $("#Chon").prop('checked',false);
       $(".livesearch").chosen(); 
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
<style type="text/css">
.chosen-container .chosen-container-multi .chosen-with-drop .chosen-container-active{
  width: 300px;
}
</style>
<div style="margin: 5%;">
<h2>Gửi công văn</h2>
<div>
   {!!Form::open(['route'=>'quanlyvanban.congvan.taomoicongvan','enctype'=>'multipart/form-data','onsubmit'=>'setSelected();','id'=>'FormTaoMoiCongVan'])!!}
   <div class="form-group">
      <label class="lbl_ThemCongVan">Số công văn(<font color="red">*</font>) :</label>
      {{Form::text('SoCongVan','',['class'=>'form-control'])}}
   </div>
   <div class="form-group">
      <label class="lbl_ThemCongVan">Loại văn bản :</label>
      {{Form::select('LoaiVanBan',$dsLoaiVanBan,null,['class'=>'form-control'])}}
   </div>
   <div class="form-group">
      <label class="lbl_ThemCongVan">Ngày ban hành(<font color="red">*</font>) :</label>
      {{Form::date('NgayBanHanh',\Carbon\Carbon::now(),['class'=>'form-control'])}}
   </div>
   <div class="form-group">
      <label class="lbl_ThemCongVan">Ngày hết hiệu lực :</label>
      {{Form::date('NgayHetHieuLuc','',['class'=>'form-control'])}}
   </div>
   <div class="form-group">
      <label class="lbl_ThemCongVan">Cấp độ quan trọng :</label>&nbspKhẩn{{Form::checkbox('CapDoQuanTrong','1',['class'=>'form-control'])}}
   </div>
   <div class="form-group">
      <label class="lbl_ThemCongVan">Trích yếu nội dung(<font color="red">*</font>) :</label>
      {{Form::textarea('TrichYeuNoiDung','',['size'=>'50x2','class'=>'form-control'])}}
   </div><br>
   <div class="form-group">
      <label class="lbl_ThemCongVan">Người gửi:&nbsp</label> <div style="float: left;">{{Session::get('tenNhanSu')}}</div>
   </div><br>
   <div class="form-group">
      <label class="lbl_ThemCongVan">Đơn vị ban hành:&nbsp</label> <div style="float: left;">{{Session::get('tenDonVi')}}</div>
   </div><br>
   <div class="form-group">
      <label class="lbl_ThemCongVan">File đính kèm(<font color="red">*</font>) :</label>
      {{Form::file('FileDinhKem[]',['multiple'=>'true','class'=>'form-control-file'])}}
      @if($errors->has('FileDinhKem'))
         <b><font color="red">{{$errors->first('FileDinhKem')}}!</font></b>
      @endif
   </div>
   <div class="form-group">
      <label class="lbl_ThemCongVan">Người ký duyệt(<font color="red">*</font>) :</label>
      <select class="form-control"></select>
   </div><br>
   <div style="float: left;">
   <label class="lbl_ThemCongVan">Nơi lưu nhận(chọn 1 trong 3) :</label>
   {{Form::radio('LoaiGui','1',true,['onchange'=>'NS_Click();','id'=>'chon'])}}<label>Cá nhân</label>
   {{Form::radio('LoaiGui','2',false,['onchange'=>'DV_Click();'])}}<label>Đơn vị</label>
   {{Form::radio('LoaiGui','3',false,['onchange'=>'TC_Click();'])}}<label>Tất cả cả các đơn vị</label>
   </div>
</div>
<div id='NhanSu' style="margin-top: 1%;">
<br>
   

    
          <div class="form-group">
            <label>Nhập từ khóa và chọn tên người nhận:</label>
            <select class="form-control select2" name="GuiChoCaNhan[]" multiple="">
              @foreach($dsNhanSu as  $value)
                  <option value="{{$value->MA_NHAN_SU}}">{{$value->HO_VA_TEN}}</option>
              @endforeach
            </select>
         </div>

</div>
<div id='DonVi' style="margin-top: 1%;">
   <br><label>Gửi cho:</label><br>
   <select>
     <option>aaaaaaaaa</option>
   </select><br>
            <label>Nhập từ khóa và chọn các đơn vị nhận:</label>
            <div>
      <select class="livesearch"  name="GuiChoDonVi[]" multiple="" style="width: 100%;"> 
              @foreach($dsDonVi as  $value)
                  <option value="{{$value->MA_DON_VI}}">{{$value->TEN_DON_VI}}</option>
              @endforeach
      </select> 
    </div>
</div>
<div style="margin-top: 5%;">
      <button onclick="history.back();" class="btn btn-default">Quay lại</button>
      <input type="submit" class="btn btn-primary" value="Tạo">
</div>
{!!Form::close()!!}
<script type="text/javascript" src="{{url('js/jquery.validate.min.js')}}" ></script>
<script type="text/javascript">
   $(document).ready(function() {

    
    $("#FormTaoMoiCogVan").validate({
   rules: {
     TrichYeuNoiDung: "required",
     SoCongVan: "required",
     NgayBanHanh: "required"
     
  },
   messages: {
     TrichYeuNoiDung: "<font color='red'>Trích yếu nội dung không được để trống!</font>",
     SoCongVan: "<font color='red'>Số văn bản không được để trống!</font>",
     NgayBanHanh: "<font color='red'>Ngày ban hành không được để trống!</font>"
   }
   });
   });
   function setSelected(){
        var caNhan = document.getElementById('undo_redo_to');
        for (var i=0; i<caNhan.options.length; i++) {
            caNhan.options[i].selected = true;
          }
        var donVi = document.getElementById('undo_redo1_to');
        for (var i=0; i<donVi.options.length; i++) {
            donVi.options[i].selected = true;
          }
   }
</script>
<script type="text/javascript">
  $(".livesearch").chosen();
   var _gaq = _gaq || [];
   _gaq.push(['_setAccount', 'UA-36251023-1']);
   _gaq.push(['_setDomainName', 'jqueryscript.net']);
   _gaq.push(['_trackPageview']);
  
   (function() {
     var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
     ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
   })();
</script>
</div>
@endsection

