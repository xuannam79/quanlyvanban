

@extends('layout.LayoutNhanSu')
@section('noiDung')
<script type="text/javascript">
   $(document).ready(function(){
       $("#DonVi").hide();
       $('#Chon').prop('checked', false);
   });
   function NS_Click(){
     $("#DonVi").hide();
     $("#NhanSu").show();
   }
   function DV_Click(){
     $("#NhanSu").hide();
     $("#DonVi").show();
   }
   function CHonTatCa(){
     if(document.getElementById("Chon").checked==true)
       $('.CaNhan').prop('checked', true);
     else
       $('.CaNhan').prop('checked', false);
   }
</script>
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
Người dùng:{{$congvan->first()->NGUOI_KY_DUYET or 'NULL'}}
<h2>Chỉnh sửa công văn</h2>
<div>
   {!!Form::open(['url'=>'/ChinhSuaCongVan','enctype'=>'multipart/form-data','id'=>'FormSuaCongVan'])!!}
   <div class="form-group">
     <label>Số công văn(<font color="red">*</font>) :</label>
   {{Form::text('SoCongVan',$congvan->first()->SO_CONG_VAN,['readonly'=>'true','class'=>'form-control'])}}
   </div>
   
   <div class="form-group">
      <label>Loại văn bản(<font color="red">*</font>) :</label>
   {{Form::select('LoaiVanBan',$dsLoaiVanBan,$congvan->first()->LOAI_VAN_BAN,['class'=>'form-control'])}}
   </div>
  
   <div class="form-group">
      <label>Ngày ban hành(<font color="red">*</font>) :</label>
   {{Form::date('NgayBanHanh',$congvan->first()->NGAY_BAN_HANH,['class'=>'form-control'])}}
   </div>
  
   <div class="form-group">
      <label>Cấp độ quan trọng(<font color="red">*</font>) :</label>&nbspKhẩn{{Form::checkbox('CapDoQuanTrong','1',['class'=>'form-control'])}}
   </div>
  
   <div class="form-group">
      <label>Trích yếu nội dung(<font color="red">*</font>) :</label>
   {{Form::textarea('TrichYeuNoiDung',$congvan->first()->TRICH_YEU_NOI_DUNG,['size'=>'50x2','class'=>'form-control'])}}
   </div>
  
   <div class="form-group">
      <label>File đính kèm(<font color="red">*</font>) :</label> <br>
   @foreach($danhSachFileDinhKem as $key=>$value)
   {{Form::checkbox('FileDK[]',"$value->FILE_DINH_KEM")}} <label style="color: blue;">Xóa</label> {{$value->FILE_DINH_KEM}}<br>
   @endforeach
   {{Form::file('FileDinhKem[]',['multiple'=>'true'])}}
   </div>
  
   <div class="form-group">
      <label>Người ký duyệt(<font color="red">*</font>) :</label>
   {{Form::select('NguoiKyDuyet',$dsNhanSu,$congvan->first()->NGUOI_KY_DUYET,['class'=>'form-control'])}}
   </div>
  
   <div class="form-group">
     <label>văn bản gửi cho( chọn 1 trong 2) :</label>
   {{Form::radio('LoaiGui','1',true,['onchange'=>'NS_Click();'])}}Cá nhân
   {{Form::radio('LoaiGui','2',false,['onchange'=>'DV_Click();'])}}Đơn vị
   </div>
   
</div>
<div id='NhanSu' style="margin-top: 1%;">
   <label>Chọn các cá nhân để gửi đến</label>
   <div class="form-inline">
      {{Form::select('from',$dsNhanSu,null,['style'=>'width: 200px;','multiple'=>'multiple','class'=>'form-control mb-2 mr-sm-2 mb-sm-0','size'=>'9','id'=>'undo_redo'])}}
      <div class="input-group mb-2 mr-sm-2 mb-sm-0">
         <button type="button" id="undo_redo_rightAll" class="btn btn-default btn-block"><i class="glyphicon glyphicon-forward"></i></button>
         <button type="button" id="undo_redo_rightSelected" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
         <button type="button" id="undo_redo_leftSelected" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
         <button type="button" id="undo_redo_leftAll" class="btn btn-default btn-block"><i class="glyphicon glyphicon-backward"></i></button>
      </div>
      @if($loaiGui == 1 )
      {{Form::select('GuiChoCaNhan[]',$danhSachGui,null,['style'=>'width: 200px;','multiple'=>'multiple','class'=>'form-control mb-2 mr-sm-2 mb-sm-0','size'=>'9','id'=>'undo_redo_to'])}}
      @else
      {{Form::select('GuiChoCaNhan[]',array(),null,['style'=>'width: 200px;','multiple'=>'multiple','class'=>'form-control mb-2 mr-sm-2 mb-sm-0','size'=>'9','id'=>'undo_redo_to'])}}
      @endif
   </div>
   <div>
      <input type="checkbox" id="Chon" checked='false' onchange="CHonTatCa();">Tất cả
      <ul>
         @foreach($dsNhanSu as $key=>$value)
         @if($loaiGui == 1 And in_array($key,$danhSachGui))
         <li>{{Form::checkbox('GuiChoCaNhan[]',$key,false,['class'=>'CaNhan','checked'=>'true'])}}{{$value}}</li>
         @else
         <li>{{Form::checkbox('GuiChoCaNhan[]',$key,false,['class'=>'CaNhan'])}}{{$value}}</li>
         @endif
         @endforeach
      </ul>
   </div>
</div>
<div id='DonVi' style="margin-top: 5%;">
   <label>Chọn các đơn vị để gửi đến</label>
   <ul>
      @foreach($dsDonVi as $key=>$value)
      @if($loaiGui == 0 And in_array($key,$danhSachGui))
      <li>{{Form::checkbox('GuiChoDonVi[]',$key,['checked'=>'true'])}}{{$value}}</li>
      @else
      <li>{{Form::checkbox('GuiChoDonVi[]',$key,[])}}{{$value}}</li>
      @endif
      @endforeach
   </ul>
</div>
<input type="submit" class="btn btn btn-primary" value="submit"> 
{!!Form::close()!!}
<button onclick="history.back();" class="btn btn-secondary">Quay lại</button>
<script type="text/javascript" src="{{ url('js/multiselect.js') }}"></script>
<script type="text/javascript">
   $(document).ready(function() {
    $('#undo_redo').multiselect();
    $('#undo_redo1').multiselect();
   $("#FormSuaCongVan").validate({
   rules: {
     TrichYeuNoiDung: "required"
   },
   messages: {
     TrichYeuNoiDung: "<font color='red'>Hãy nhập trích yếu nội dung!</font>"
   }
   });
   });
</script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript">
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
@endsection

