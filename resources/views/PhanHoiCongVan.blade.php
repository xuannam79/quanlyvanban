@extends('layout.MainLayout_Admin')
@section('NoiDung')
<style type="text/css">
	p {
		text-align: left;
		margin-left: 3%;
	}
</style>
	<h2>Tình trạng văn bản</h2>
	<h3>Các phản hồi:</h3>
	@if(count($dsPhanHoi)==0)
		<font color="#2E9AFE">Chưa có phản hồi nào cho văn bản này!</font>
	@else
	@foreach( $dsPhanHoi as $key => $value )
	<p>
		+ <strong>{{$value->TEN_DON_VI}}:</strong><br>{{$value->NOI_DUNG_PHAN_HOI}} <br>File đính kèm:
		@foreach($dsFile as $key1 => $value1)
			@if( $value1->MA_PHAN_HOI == $value->MA_PHAN_HOI)<a href="{{url("file_ykienphanhoi/$value1->FILE_DINH_KEM")}}" style="color: #2E9AFE"  download>{{$value1->FILE_DINH_KEM}}</a>
				
			@endif
		@endforeach
	</p>
	@endforeach
	@endif
	<hr>
	<h3>Phản hồi văn bản:</h3><br>
	{!!Form::open(['url'=>'/PhanHoiCongVan','enctype'=>'multipart/form-data'])!!}
	<p>
		{{Form::hidden('SoCongVan',$soCongVan)}}
		Nội dung phản hồi:
		{{Form::textarea('NoiDungPhanHoi','',['size'=>'45x2','class'=>'form-control'])}}
		<br>
		File đính kèm: {{Form::file('FileDinhKem[]',['multiple'=>'true','class'=>'form-control-file'])}}
	</p>
	<button>Gửi phản hồi</button>
	{!!Form::close()!!}
	<button onclick="history.back();" >Quay lại</button>
@endsection