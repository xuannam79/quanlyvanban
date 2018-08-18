

<!DOCTYPE html>
<html>
<head>
   <title>Quản lý văn bản</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
   <meta charset="utf-8">
   </head>
   <body>
   <style type="text/css">
     .info{
      width: 100%;
      height: 50px;
      background: #AFAFAF; 
      margin-top: 5%;
     }
     .w3-button{
       width: 80%;
     }
     h2 {
      margin-top: 10px;
     }
    .main-content{
      margin-right: 15%;
      margin-left: 15%;
    }
 
   </style>
      <nav class="navbar navbar-default">
         <div class="container-fluid">
            <div class="navbar-header">
               <a class="navbar-brand" href="#">Tên</a>
            </div>
            <ul class="nav navbar-nav">
               <li class="active"><a href="#">Trang chủ</a></li>
               <li><a href="#">Email</a></li>
               <li><a href="#">Trang 1</a></li>
               <li><a href="#">Trang 2</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
               <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Thoát</a></li>
            </ul>
         </div>
      </nav>
      <div class="jumbotron">
         <div class="container text-center">
            <h1>Trường đại học nội vụ</h1>
            <p>Hệ thống quản lý văn bản</p>
         </div>
      </div>

      
      <div class="main-content" style="border: 1px solid black;">
      <div class="info">
        
      </div>


      <div class="col-sm-2 sidenav" style="background: #CCCCCC;">
         <div class="w3-dropdown-hover" style="width: 100%;">
           <center><button class="w3-button" id="NhanSu-dropdown" style="">Nhân sự
            <i class="fa fa-caret-down" ></i>
            </button></center> 
            <div class="w3-dropdown-content w3-bar-block">
              <center><a href="{{ url('DanhSachNhanSu') }}" class="w3-bar-item w3-button">Danh sách nhân sự</a></center> 
               <a href="{{ url('FormThemNhanSu') }}" class="w3-bar-item w3-button">Thêm nhân sự</a>
               <a href="{{ url('dangnhap') }}" class="w3-bar-item w3-button">Đăng nhập</a>
            </div>
         </div>
        </div>

        <br><br>

        <div class="col-sm-2 sidenav" style="background: #CCCCCC;">
         <div class="w3-dropdown-hover" style="width: 100%;">
           <center><button class="w3-button" id="NhanSu-dropdown" style="">Công văn
            <i class="fa fa-caret-down"  ></i>
            </button></center> 
            <div class="w3-dropdown-content w3-bar-block">
              <center><a href="{{ url('DanhSachCongVanDi') }}" class="w3-bar-item w3-button">Danh sách công văn đã gửi</a></center> 
               <a href="{{ url('FrmTaoMoiCongVan') }}" class="w3-bar-item w3-button">Gửi công văn đi</a>
            </div>
         </div>
        </div>

        <br><br>

        <div class="col-sm-2 sidenav" style="background: #CCCCCC;">
         <div class="w3-dropdown-hover" style="width: 100%;">
           <center><button class="w3-button" id="NhanSu-dropdown" style="">Cá nhân
            <i class="fa fa-caret-down"></i>
            </button></center> 
            <div class="w3-dropdown-content w3-bar-block">
              <center><a href="{{ url('DanhSachNhanSu') }}" class="w3-bar-item w3-button">Thông tin cá nhân</a></center> 
               <a href="{{ url('FrmTaoMoiCongVan') }}" class="w3-bar-item w3-button">Đổi mật khẩu</a>
            </div>
         </div>
        </div>

         <div style="margin-left:16.8%;">
          <div style="margin-left: 5%;margin-right: 5%;">
               @yield('noiDung')
          </div>
         </div>
         <div class="info">
        
      </div>
      </div>
   </body>
</html>

