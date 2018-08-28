@extends('templates.quanlyvanban.master')
@section('NoiDung')
	<h2>Danh sách công văn đến</h2> <a href="{{route('quanlyvanban.bieumau.taomoibieumau')}}"><span class="glyphicon glyphicon glyphicon-plus"></span> Tạo mới biểu mẫu</a><br>
	<div style="margin-left: 5%;margin-top: 3%;">
	@foreach($dsBieuMau as $bieuMau)
		<p style='text-align: left;'>
                        Tên biểu mẫu: {{$bieuMau->TEN_NHOM_BIEU_MAU}} - {{$bieuMau->TEN_DON_VI}} <br>
                        Về việc: {{$bieuMau->TRICH_YEU_NOI_DUNG}}  - <i>{{$bieuMau->NGAY_BAN_HANH}}</i>.<br>
                                    File đính kèm: 
                </p><hr>

	@endforeach
	{{$dsBieuMau->links()}}
	</div>
@endsection