@extends('templates.admin.master')
@section('content')
<div class="content-wrapper">
         <div class="container">
	        <div class="row pad-botm">
	            <div class="col-md-12">
	                <h4 class="header-line">Sửa Nhân Sự</h4>
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
					@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
		                        <div class="panel-body">
		                        @php
		                        	$id = $danhsach->MA_NHAN_SU;
		                        @endphp
		                           	<form role="form" action="{{Route('admin.nhansu.edit',['id' => $id])}}" enctype="multipart/form-data" method="post" class="form">
		                           	{{ csrf_field() }}
		                                        <div class="form-group">
		                                            <label>Mã Nhân Sự</label>
		                                            <input class="form-control" type="text" name="id" readonly value="{{$danhsach->MA_NHAN_SU}}" />
		                                            <p class="help-block"><i style="color:red"></i></p>
		                                        </div>
		                                        <div class="form-group">
		                                            <label>Tên Nhân Sự</label>
		                                            <input class="form-control" type="text" name="name" value="{{$danhsach->HO_VA_TEN}}" />
		                                            <p class="help-block"><i style="color:red"></i></p>
		                                        </div>
		                                        <div class="form-group">
		                                            <label>Năm Sinh</label>
		                                            <input class="form-control" type="text" name="birthday" value="{{$danhsach->NAM_SINH}}" />
		                                            <p class="help-block"><i style="color:red"></i></p>
		                                        </div>
		                                        <div class="form-group">
		                                            <label>Giới Tính</label>
		                                            <input class="form-control" type="text" name="sex" value="{{$danhsach->GIOI_TINH}}" />
		                                            <p class="help-block"><i style="color:red"></i></p>
		                                        </div>
		                                        <div class="form-group">
		                                            <label>Địa Chỉ</label>
		                                            <input class="form-control" type="text" name="address" value="{{$danhsach->DIA_CHI}}" />
		                                            <p class="help-block"><i style="color:red"></i></p>
		                                        </div>
		                                         <div class="form-group">
		                                            <label>Số Điện Thoại</label>
		                                            <input class="form-control" type="text" name="phone" value="aliibaba" />
		                                            <p class="help-block"><i style="color:red"></i></p>
		                                        </div>
		                                         <div class="form-group">
		                                            <label>Email</label>
		                                            <input class="form-control" type="text" name="email" value="{{$danhsach->EMAIL}}" />
		                                            <p class="help-block"><i style="color:red"></i></p>
		                                        </div>
		                                        <input type="submit" name="submit" value="Lưu" class="btn btn-info" />
		                                </form>
		                        </div>
	                	</div>
                   	</div>
            	</div> 
    	</div>
</div>
@stop