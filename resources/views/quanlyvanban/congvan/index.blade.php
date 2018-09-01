<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href ="{{url('css/layout.css')}}">

<title> Home </title>
<form action="MainForm.php" method="POST" class="form">
	<div class="TieuDe">
		<div class="banner">
		<img src="img/BANNER.jpg" alt="Banner" />
		<div style="
			padding: 15px 50px 5px 50px;
			float: right;
			font-size: 16px;">
			Xin chào, <b> {{Session::get('username')}}</b>
			&nbsp; <a href="{{url('/dang-xuat')}}" class="btn btn-danger square-btn-adjust">Đăng xuất</a> 
		</div>
		</div>
		<div id="content" class="NoiDung">
    		<div id="congvan">
                <table class="TinNhanDen">
                  <tr>
                    <th>Tin nhắn đến</th>
                  </tr>
        		  <tr>
					<td>
						<i class="fa fa-send"></i><a href='#'> Thông báo họp phòng ( thời gian, địa điểm, thành phần) </a> <span> Tên người gửi </span> 
					</td>
				  </tr>
				  <tr>
					<td>
						<i class="fa fa-send"></i> <a href='#'> Nộp báo cáo tháng xx </a> <span> Tên người gửi </span> 
					</td>
				  </tr>
				  <tr>
					<td>
						<i class="fa fa-send"></i> <a href='#'> Kế hoạch tháng xx cá nhân </a> <span> Tên người gửi </span> 
					</td>
				  </tr>
				  <tr>
					<td>
						<i class="fa fa-send"></i> <a href='#'> Viết bài tham luận </a> <span> Tên người gửi </span> 
					</td>	
				  </tr>
    	
    			</table>
    			<table class="TinNhanDi">
					<tr>
						<th> Tin nhắn đi</th>
					</tr>
					<tr>
						<td>
							<i class="fa fa-reply"></i> <a href='#'> Dọn vệ sinh cuối tuần </a> <span>  Tên người gửi </span> 
						</td>
					</tr>
					<tr>
						<td>
							<i class="fa fa-reply"></i><a href='#'> Đăng ký trực đêm </a> <span>  Tên người gửi </span> 
						</td>
					</tr>
					<tr>
						<td>
							<i class="fa fa-reply"></i><a href='#'> Giao lưu bóng đá </a> <span>  Tên người gửi </span> 
						</td>
					</tr>
					<tr>
						<td>
							<i class="fa fa-reply"></i><a href='#'> Dọn vệ sinh cuối tuần  </a> <span> Tên người gửi </span> 
						</td>
					</tr>
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
