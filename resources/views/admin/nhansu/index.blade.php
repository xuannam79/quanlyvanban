@extends('templates.admin.master')
@section('content')
<div class="content- wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
               <div class="col-md-12"> 
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Danh sách nhân sự </h4>
                            @if (Session::has('msg'))
                                <script> alert('{{ Session::get('msg') }}')</script>
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
                            <form action="{{Route('admin.nhansu.index')}}" method="post" role="search">
                            {{ csrf_field() }}
                            	<div class="row">
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <input type="text" name="manhansu" class="form-control border-input" value="{{-- {{$manhansu}} --}}"  placeholder="ID">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" name="fullname" class="form-control border-input" placeholder="Họ tên" value="{{-- {{$hoten}} --}}">
                                        </div>
                                    </div>                                    
                                    <div class="col-md-4">
                                    	<div class="form-group">
	                                        <input type="submit" name="search" value="Tìm kiếm" class="is" />
	                                        <input type="submit" name="reset" value="Hủy tìm kiếm" class="is" />
                                        </div>
                                    </div>
                                </div>
                                </form>
                                    <a href="{{Route('admin.nhansu.add')}}" class="addtop"><img src="{{url('admin/assets/img/add.png')}}" style="width:40px;height: 40px" alt="" /> Thêm</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive ">
							<form action="" method="post" id="frm">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="25%">Tên Nhân Sự</th>
                                            <th width="10%">Năm Sinh</th>
                                            <th width="10%">Giới tính</th> 
                                            <th width="15%">Số Điện Thoại</th> 
                                            <th width="15%">Gmail</th>                                            
                                            <th width="20%">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($danhsach as $ds)
                    					<tr class="odd gradeX">
                                        @php
                                            $id = $ds->MA_NHAN_SU;
                                        @endphp
                                                <td>{{$ds->HO_VA_TEN}}</td>
                                                <td>{{$ds->NAM_SINH}}</td>
                                                <td>{{$ds->GIOI_TINH}}</td>
                                                <td>{{$ds->SO_DIEN_THOAI}}</td>
                                                <td>{{$ds->EMAIL}}</td>
                                                <td align="center">
                                                    <a href="{{Route('admin.nhansu.edit',['id' => $id])}}" class="btn btn-primary">Sửa</a>
                                                    <a href="{{Route('admin.nhansu.delete',['id' => $id])}}" class="btn btn-danger">Xóa</a>
                                                </td> 		
                                        </tr>
                                        @endforeach
				                    </tbody>
                                </table>
							</form>
                                <div align="center">
                                <ul>
									   {{$danhsach->links()}}
								</ul>
								</div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop