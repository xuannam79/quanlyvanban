

@extends('layout.LayoutNhanSu')
@section('noiDung')
<script> 
   $(document).ready(function(){
      $(".myDiv").animate({
         height: 'toggle'
      },0.1,'linear');
   });
  
   function change(id){
      $("#div"+id).animate({
            height: 'toggle'
        });
   }
   $("#MatKhau").password('toggle');
</script>

   <h2>Thêm mới nhân sự</h2>
   <h3>1. Thông tin cơ bảng.</h3>
   <hr>
   {!!Form::open(['url'=>'/ThemNhanSu'])!!}
   <div class="form-group">
      <label for="MaNhanSu">Mã nhân sự(<font color="red">*</font>) :</label>
      {{Form::text('MaNhanSu','',['class'=>'form-control','placeholder'=>'Nhập mã nhân viên'])}}
      @if($errors->has('MaNhanSu'))
      <div class="alert alert-danger">
         {{$errors->first('MaNhanSu')}}
      </div>
      @endif
   </div>
   <div class="form-group">
      <label>Tên nhân sự(<font color="red">*</font>) :</label>
      {{Form::text('TenNhanSu','',['class'=>'form-control','placeholder'=>'Nhập họ và tên'])}}
      @if($errors->has('TenNhanSu'))
      <div class="alert alert-danger">
         {{$errors->first('TenNhanSu')}}
      </div>
      @endif
   </div>
   <div class="form-group">
      <label>Giới tính(<font color="red">*</font>) :</label><br />
      <label>Nam</label>
      {{Form::radio('GioiTinh','Nam')}}
      <label>Nữ</label>
      {{Form::radio('GioiTinh','Nữ')}}
      @if($errors->has('GioiTinh'))
      <div class="alert alert-danger">
         {{$errors->first('GioiTinh')}}
      </div>
      @endif
   </div>
   <div class="form-group">
      <label>Năm sinh(<font color="red">*</font>) :</label>
      {{Form::text('NamSinh','',['class'=>'form-control','placeholder'=>'Nhập năm sinh'])}}
      @if($errors->has('NamSinh'))
      <div class="alert alert-danger">
         {{$errors->first('NamSinh')}}
      </div>
      @endif
   </div>
   <div class="form-group">
      <label>Địa chỉ(<font color="red">*</font>) :</label>
      {!!Form::text('DiaChi','',['class'=>'form-control','placeholder'=>'Nhập địa chỉ'])!!}
      @if($errors->has('DiaChi'))
      <div class="alert alert-danger">
         {{$errors->first('DiaChi')}}
      </div>
      @endif
   </div>
   <div class="form-group">
      <label>Email(<font color="red">*</font>) :</label>
      {!!Form::text('Email','',['class'=>'form-control','placeholder'=>'Nhập địa chỉ email'])!!}
      @if($errors->has('Email'))
      <div class="alert alert-danger">
         {{$errors->first('Email')}}
      </div>
      @endif
   </div>
   <div class="form-group">
      <label>Số điện thoại(<font color="red">*</font>) :</label>
      {!!Form::text('SoDienThoai','',['class'=>'form-control','placeholder'=>'Nhập số điện thoại'])!!}
      @if($errors->has('SoDienThoai'))
      <div class="alert alert-danger">
         {{$errors->first('SoDienThoai')}}
      </div>
      @endif
   </div>
   <h3>2. Thông tin đăng nhập và tài khoản.</h3>
   <hr>
   <div class="form-group">
      <label>Tên đăng nhập(<font color="red">*</font>) :</label>
      {!!Form::text('TenDangNhap','',['class'=>'form-control','placeholder'=>'Nhập tên đăng nhập'])!!}
      @if($errors->has('TenDangNhap'))
      <div class="alert alert-danger">
         {{$errors->first('TenDangNhap')}}
      </div>
      @endif
   </div>
   <div class="form-group">
      <label>Mật khẩu(Nếu bỏ trống trường này mật khẩu mặc định sẽ là ...) :</label>
      {!!Form::password('Email',['class'=>'form-control',"data-toggle"=>"password",'id'=>'MatKhau'])!!}
      
   </div>
   <h3>3. Đơn vị và chức vụ.</h3>
   <hr>
   <div class="form-group">
      <label>Đơn vị(<font color="red">*</font>) :</label>
      <ul>
         @foreach ($dsDonVi as $key=>$value)
         <div id="div1$id">
            <li>{{Form::checkbox('DonVi[]',$key,false,["onchange"=>"change($key);"])}}{{$value}}</li>
            <div id="div{{$key}}" style="background:#98bf21;height:200px;width:500px;overflow: scroll;" class="myDiv">
               <div style="margin: 15px; ">
                  <div class="form-group"><label>Chức vụ(<font color="red">*</font>) :</label>{!!Form::select('ChucVu[]',$dsChucVu,null,['class'=>'form-control'])!!}</div>
                  <div class="form-group"><label>Loại nhân viên(<font color="red">*</font>) :</label>{!!Form::select('LoaiNhanVien[]',$dsLoaiNhanVien,null,['class'=>'form-control'])!!}</div>
                  <div class="form-group"><label>Ngày bắt đầu(<font color="red">*</font>) :</label>{!!Form::date('NgayBatDau[]','',['class'=>'form-control'])!!}</div>
               </div>'
            </div>
         </div>
         @endforeach
      </ul>
   </div>
   
   
   {!!Form::submit('Thêm',['class'=>'btn btn-primary'])!!}
   {!!Form::close()!!}

@endsection

