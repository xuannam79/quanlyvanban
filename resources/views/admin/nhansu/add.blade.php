

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
                  Thêm tin
               </div>
               @if (Session::has('msg'))
               <p>{{ Session::get('msg') }}</p>
               @endif
               <div class="panel-body">
                  <form role="form" action="{{Route('admin.nhansu.add')}}" enctype="multipart/form-data" method="post" class="form">
                     {{ csrf_field() }}
                     <div class="form-group">
                        <label>Mã Nhân Sự</label>
                        <input class="form-control" type="text" name="id" value="" />
                        @if($errors->has('id'))
                        <b><font color="red">{{$errors->first('id')}}!</font></b>
                        @endif
                        <p class="help-block"><i style="color:red"></i></p>
                     </div>
                     <div class="form-group">
                        <label>Tên Nhân Sự</label>
                        <input class="form-control" style="border: 1px solid #848484;" type="text" name="name" value="" />
                        @if($errors->has('name'))
                        <b><font color="red">{{$errors->first('name')}}!</font></b>
                        @endif
                        <p class="help-block"><i style="color:red"></i></p>
                     </div>
                     <div class="form-group">
                        <label>Năm Sinh</label>
                        <input class="form-control" type="text" name="birthday" value="" />
                        @if($errors->has('birthday'))
                        <b><font color="red">{{$errors->first('birthday')}}!</font></b>
                        @endif
                        <p class="help-block"><i style="color:red"></i></p>
                     </div>
                     <div class="form-group">
                        <label>Giới Tính</label>
                        <input class="form-control" type="text" name="sex" value="" />
                        @if($errors->has('sex'))
                        <b><font color="red">{{$errors->first('sex')}}!</font></b>
                        @endif
                        <p class="help-block"><i style="color:red"></i></p>
                     </div>
                     <div class="form-group">
                        <label>Địa Chỉ</label>
                        <input class="form-control" type="text" name="address" value="" />
                        @if($errors->has('address'))
                        <b><font color="red">{{$errors->first('address')}}!</font></b>
                        @endif
                        <p class="help-block"><i style="color:red"></i></p>
                     </div>
                     <div class="form-group">
                        <label>Số Điện Thoại</label>
                        <input class="form-control" type="text" name="phone" value="" />
                        @if($errors->has('phone'))
                        <b><font color="red">{{$errors->first('phone')}}!</font></b>
                        @endif
                        <p class="help-block"><i style="color:red"></i></p>
                     </div>
                     <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="text" name="email" value="" />
                        @if($errors->has('email'))
                        <b><font color="red">{{$errors->first('email')}}!</font></b>
                        @endif
                        <p class="help-block"><i style="color:red"></i></p>
                     </div>
                     <input type="submit" name="submit" value="Thêm" class="btn btn-info" />
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@stop

