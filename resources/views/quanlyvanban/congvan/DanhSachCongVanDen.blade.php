

@extends('templates.quanlyvanban.master')
@section('NoiDung')
<h2>Danh sách công văn đến</h2>
<div style="margin: 3%;">
   @foreach($dsCongVanDen as $congVan)
   <p style='text-align: left;''>
      Số ký hiệu văn bản: {{$congVan->SO_CONG_VAN}} - {{$congVan->TEN_DON_VI}} @php echo $congVan->CAP_DO_QUAN_TRONG=='0'?"<i><font color='red'>Khẩn</font></i>":''; @endphp<br>
      Về việc: {{$congVan->TRICH_YEU_NOI_DUNG}}  - <i>{{$congVan->NGAY_BAN_HANH}}</i>.<a href='{{route('quanlyvanban.congvan.phanhoicongvan',['soCongVan'=>$congVan->SO_CONG_VAN])}}' style='color: red;'>Phản hồi văn bản.</a><br>
      File đính kèm:
      @foreach($dsFile[$congVan->SO_CONG_VAN] as $file)
      <a href='{{url("file/$file->FILE_DINH_KEM")}}' download>{{$file->FILE_DINH_KEM}}</a>
      @endforeach
   <hr>
   </p>
   @endforeach
   {{$dsCongVanDen->links()}}
   <div id="timkiemtheo" class="TimKiem" style="margin-top: 3%;">
      <form action="{{route('quanlyvanban.congvan.danhsachcongvanden')}}">
         {{csrf_field()}}
         <strong>Tìm kiếm theo</strong>
         <select name="LoaiTimKiem" id="LoaiTimKiem" onchange="timKiem();">
            <option value="1">Số ký hiệu văn bản</option>
            <option value="2">Trích yếu nội dung</option>
            <option value="3">Đơn vị ban hành</option>
         </select>
         <input type="text" name="keyword" placeholder="Nhập từ khóa tìm kiếm">
         <select name="DSDonVi" id="DSDonVi" style="display: none;">
            @foreach($dsDonVi as $donVi)
            <option value="{{$donVi->MA_DON_VI}}">{{$donVi->TEN_DON_VI}}</option>
            @endforeach
         </select>
         <input type="submit" name="TimKiemVanBanDen" value="Tìm">
      </form>
      <a href="{{ route('quanlyvanban.congvan.danhsachcongvanden') }}">Hủy tìm</a> | <a href="{{route('quanlyvanban.congvan.danhsachcongvanden.timkiemnangcao')}}"> Tìm kiếm năng cao</a>
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

