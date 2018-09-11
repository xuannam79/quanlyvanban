

@extends('templates.admin.master')
@section('content')
<div class="content-wrapper">
   <div class="container">
      <div class="row pad-botm">
         <div class="col-md-12">
            <h4 class="header-line">Thêm Nhân Sự</h4>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-info">
               <div class="panel-heading">
                  Thêm tài sản đơn vị
               </div>
               @if (Session::has('msg'))
               <p>{{ Session::get('msg') }}</p>
               @endif
               <div class="panel-body">
                  <form role="form" action="{{Route('admin.taisan.add')}}" enctype="multipart/form-data" method="post" class="form">
                     {{ csrf_field() }}
                     <div class="form-group">
                        <label>Tên Tài Sản</label>
                        <input class="form-control" style="border: 1px solid #848484;" type="text" name="TenTaiSan" value="" />
                        @if($errors->has('TenTaiSan'))
                        <b><font color="red">{{$errors->first('TenTaiSan')}}!</font></b>
                        @endif
                        <p class="help-block"><i style="color:red"></i></p>
                     </div>
                     <div class="form-group">
                        <label>Dơn Vị Tiếp Nhận</label>
                        <select class="form-control" style="border: 1px solid #848484;" name="DonViTiepNhan">
                           @foreach($dsDonVi as $donVi)
                              <option value="{{$donVi->MA_DON_VI}}">{{$donVi->TEN_DON_VI}}</option>
                           @endforeach
                        </select>
                        @if($errors->has('DonViTiepNhan'))
                        <b><font color="red">{{$errors->first('DonViTiepNhan')}}!</font></b>
                        @endif
                        <p class="help-block"><i style="color:red"></i></p>
                     </div>
                     <div class="form-group">
                        <label>Số lượng Tài Sản (chỉ nhập số)</label>
                        <input class="form-control" style="border: 1px solid #848484;" type="number" name="SoLuong" value="" />
                        @if($errors->has('SoLuong'))
                        <b><font color="red">{{$errors->first('SoLuong')}}!</font></b>
                        @endif
                        <p class="help-block"><i style="color:red"></i></p>
                     </div>
                     <div class="form-group">
                        <label>Ghi Chú</label>
                        <input class="form-control" style="border: 1px solid #848484;" type="text" name="GhiChu" value="" />
                        @if($errors->has('GhiChu'))
                        <b><font color="red">{{$errors->first('GhiChu')}}!</font></b>
                        @endif
                        <p class="help-block"><i style="color:red"></i></p>
                     </div>
                     <input type="submit" name="submit" value="Thêm" class="btn btn-info" />
                     <a href="{{Route('admin.taisan.index')}}" class="btn btn-danger">Hủy</a>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@stop

