<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href ="{{url('css/layout.css')}}">
<title> Trang chủ </title>
<form action="MainForm.php" method="POST" class="form">
   <div class="TieuDe">
      <div class="banner">
        <a href="{{ route('quanlyvanban.congvan.index') }}" title=""><img src="img/BANNER.jpg" alt="Banner" /></a>
        <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="8" class="marquee"><i>** Chào mừng các bạn đến với Hệ Thống Tác Nghiệp - Trường Đại học Nội Vụ Hà Nội **</i> </marquee>
        <div class="logout">
          Xin chào, <b> {{Session::get('username')}}</b>
          &nbsp;
          <a href="{{url('/dang-xuat')}}">
          <i class="fa fa-sign-out" aria-hidden="true"></i>Đăng xuất</a>
        </div>
      </div>
      <div id="content" class="NoiDung">
         <div id="congvan">
            <table class="TinNhanDen">
               <tr>
                  <th>Tin nhắn đến</th>
               </tr>
               @if(count($dsTinNhanDen) > 0)
               @foreach($dsTinNhanDen as $tinNhan)
               <tr>
                  <td>
                     <i class="fa fa-send"></i><a href='#'> {{$tinNhan->NOI_DUNG}}</a> <span>Người gửi: {{$tinNhan->HO_VA_TEN}}</span>
                  </td>
               </tr>
               @endforeach
               @else
               <tr>
               	  <td style="border: none;">
                     <center>Không có tin nhắn nào!</center>   
                  </td>
               </tr>
               @endif
            </table>
            <table class="TinNhanDi">
               <tr>
                  <th> Tin nhắn đi</th>
               </tr>
               @if(count($dsTinNhanDi) > 0)
               @foreach($dsTinNhanDi as $tinNhan)
               <tr>
                  <td>
                     <i class="fa fa-send"></i><a href='#'> {{$tinNhan->NOI_DUNG}}</a> <span>Người gửi: {{$tinNhan->HO_VA_TEN}}</span>
                  </td>
               </tr>
               @endforeach
               @else
               <tr>
               	  <td style="border: none;">
                     <center>Không có tin nhắn nào!</center>   
                  </td>
               </tr>
               @endif
            </table>
         </div>
         <div id="TuyChon">
            <div class="btn-group">
               <button type='button' onclick="window.location.href='{{route('quanlyvanban.congvan.danhsachcongvanden')}}'" class='btn btn-primary1'> <img src='img/vanbanden.jpg' alt='Avatar' class='avatar'><br><a>Văn bản đến</a></button>
               @if(Session::get('quyenTruyCap')==1)
               <button type='button' onclick="window.location.href='{{route('quanlyvanban.congvan.danhsachcongvandi')}}'" class='btn btn-primary1'> <img src='img/vanbandi.png' alt='Avatar' class='avatar'><br><a>Văn bản đi</a></button>
               <button type='button' onclick="window.location.href='{{route('quanlyvanban.congvan.taomoicongvan')}}'" class='btn btn-primary1'> <img src='img/taomoivaluu.png' alt='Avatar' class='avatar'><br><a>Tạo mới và lưu văn bản</a></button>
               @endif
               <button type='button' onclick="window.location.href='http://localhost/PHP/a/detail.php?tab=thoikhoabieu'" class='btn btn-primary1'> <img src='img/thoikhoabieu.png' alt='Avatar' class='avatar'><br><a>Thời khóa biểu</a></button>
               <button type='button' onclick="window.location.href='http://localhost/PHP/a/detail.php?tab=4'" class='btn btn-primary1'> <img src='img/lichtuantruong.jpg' alt='Avatar' class='avatar'><br><a>Lịch tuần trường</a></button>
               <button type='button' onclick="window.location.href='http://localhost/PHP/a/detail.php?tab=5'" class='btn btn-primary1'> <img src='img/lichcongtactuan.jpg' alt='Avatar' class='avatar'><br><a>Lịch công tác tuần cơ sở</a></button>
               <button type='button' onclick="window.location.href='http://localhost/PHP/a/detail.php?tab=0'" class='btn btn-primary1'> <img src='img/hosovanban.jpg' alt='Avatar' class='avatar'><br><a>Hồ sơ văn bản</a></button>
               <button type='button' onclick="window.location.href='http://localhost/PHP/a/detail.php?tab=9'" class='btn btn-primary1'> <img src='img/sodiachi.png' alt='Avatar' class='avatar'><br><a>Số địa chỉ</a></button>
               <button type='button' onclick="window.location.href='{{route('quanlyvanban.bieumau.danhsachbieumau',['page'=>1])}}'" class='btn btn-primary1'> <img src='img/bieumau.jpg' alt='Avatar' class='avatar'><br><a>Biểu mẫu</a></button>
            </div>
         </div>
      </div>
      <hr  	style="margin: 0% 0%;" width="100%" align="center" />
      <b>Cá nhân</b>
      <div class ='CaNhan'>
         <div class="btn-group1">
            <button type='button' onclick="window.location.href='http://localhost/PHP/a/detail.php?tab=0" class='btn btn-primary2' > <img src='img/login.png' alt='Avatar' class='avatar'><br><a>Thông tin cá nhân</a></button>
            <button type='button' onclick="window.location.href='http://localhost/PHP/a/detail.php?tab=vanbanden'" class='btn btn-primary2'> <img src='img/vanbanden.jpg' alt='Avatar' class='avatar'><br><a>Văn bản đến</a></button>
            @if(Session::get('quyenTruyCap')==1)
            <button type='button' onclick="window.location.href='http://localhost/PHP/a/detail.php?tab=2'" class='btn btn-primary2'> <img src='img/vanbandi.png' alt='Avatar' class='avatar'><br><a>Văn bản đi</a></button>
            @endif
            <button type='button' onclick="window.location.href='http://localhost/PHP/a/detail.php?tab=4'" class='btn btn-primary2'> <img src='img/thoikhoabieu.png' alt='Avatar' class='avatar'><br><a>Thời khóa biểu</a></button>
            <button type='button' onclick="window.location.href='http://localhost/PHP/a/detail.php?tab=5'" class='btn btn-primary2'> <img src='img/lichtuantruong.jpg' alt='Avatar' class='avatar'><br><a>Lịch tuần trường</a></button>
         </div>
      </div>
   </div>
</form>

