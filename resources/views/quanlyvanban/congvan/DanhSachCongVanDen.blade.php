

@extends('templates.quanlyvanban.master')
@section('NoiDung')
<h2>Danh sách công văn đến</h2>
<div style="margin: 3%;">
   
   @inject('service', 'App\Http\Controllers\quanlyvanban\CongVanController')
   {{$service->phanTrang($page,$sqlQuery,$tuKhoa,$loaiTimKiem)}}
   <div id="timkiemtheo" class="TimKiem" style="margin-top: 3%;">
   	{!!Form::open(['route'=>['quanlyvanban.congvan.danhsachcongvanden',$page=1]])!!}
      <strong>Tìm kiếm theo</strong>
      {{Form::select('LoaiTimKiem',array('1'=>'Số ký hiệu văn bản','2'=>'Trích yếu nội dung','3'=>'Đơn vị ban hành'),null,['id'=>'LoaiTimKiem','onchange'=>'timKiem();'])}}
      {{Form::text('keyword','',['placeholder'=>'Gõ từ khóa tìm kiếm','id'=>'KeyWord'])}}
      {{Form::select('DSDonVi',$DSDonVi,null,['id'=>'DSDonVi','style'=>'display: none;'])}}
      <input type="submit" name="TimKiemVanBanDen" value="Tìm">
      {!!Form::close()!!}
       <a href="{{ route('quanlyvanban.congvan.danhsachcongvanden',['page'=>1]) }}">Hủy tìm</a> | <a href="{{route('quanlyvanban.congvan.danhsachcongvanden.timkiemnangcao')}}"> Tìm kiếm năng cao</a>
   </div>
</div>
<script type="text/javascript">
	function timKiem(){
	    var keyword = $("#LoaiTimKiem").val();
	    if(keyword==3){
	    	$('#KeyWord').css('display','none');
	    	$('#DSDonVi').css('display','inline');
	    }
	    else{
	    	$('#KeyWord').css('display','inline');
	    	$('#DSDonVi').css('display','none');	
	    }
	}
</script>
@endsection

