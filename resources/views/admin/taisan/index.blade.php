@extends('templates.admin.master')
@section('content')
<div class="content- wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
               <div class="col-md-12"> 
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Danh sách tài sản </h4>
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
                            <form action="{{Route('admin.taisan.search')}}" method="post" role="search">
                            {{ csrf_field() }}
                            	<div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" name="TenTaiSan" class="form-control border-input"  placeholder="Tên Tài Sản" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select class="form-control border-input" name="MaDonVi">
                                                @foreach($dsDonVi as $donVi)
                                                <option value="{{$donVi->MA_DON_VI}}">{{$donVi->TEN_DON_VI}}</option>
                                                @endforeach
                                            </select>
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
                                    <a href="{{Route('admin.taisan.add')}}" class="addtop"><img src="{{url('admin/assets/img/add.png')}}" style="width:40px;height: 40px" alt="" /> Thêm</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive ">
							<form action="" method="post" id="frm">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="20%">Tên Tài Sản</th>
                                            <th width="20%">Đơn vị</th>
                                            <th width="10%">Số lượng</th> 
                                            <th width="30%">Ghi chú</th>          
                                            <th width="20%">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dsTaiSanDonVi as $taiSanDonVi)
                    					<tr class="odd gradeX">
                                        @php
                                            $id = $taiSanDonVi->MA_TAI_SAN;
                                        @endphp
                                                <td>{{$taiSanDonVi->TEN_TAI_SAN}}</td>
                                                <td>{{$taiSanDonVi->TEN_DON_VI}}</td>
                                                <td>{{$taiSanDonVi->SO_LUONG}}</td>
                                                <td>{{$taiSanDonVi->GHI_CHU}}</td>
                                                <td align="center">
                                                    <a href="{{Route('admin.taisan.update',['maTaiSan' => $id])}}" class="btn btn-primary">Sửa</a>
                                                    <a href="{{Route('admin.taisan.delete',['maTaiSan' => $id])}}" onclick="return confirm('Bạn có chắc chắn muốn xóa tài sản này không?');" class="btn btn-danger">Xóa</a>
                                                </td> 		
                                        </tr>
                                        @endforeach
				                    </tbody>
                                </table>
							</form>
                                <div align="center">
                                <ul>
									   {{$dsTaiSanDonVi->links()}}
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
<script type="text/javascript">
    function Delete(id){
        @php
            $maTaiSan
        @endphp
        setTimeout(function(){
        if()
            alert('xóa rồi');
    }, 100);
        
    }
</script>
@stop