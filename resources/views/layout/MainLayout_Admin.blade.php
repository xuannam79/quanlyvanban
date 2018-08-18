

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href ="{{url('css/layout.css')}}">
<link rel="stylesheet" type="text/css" href ="{{url('css/left-bar.css')}}">
<link rel="stylesheet" type="text/css" href ="{{url('css/reset.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/bootstrap/css/bootstrap.min.css')}}">
<script type="text/javascript" src="{{url('js/jquery-1.11.1.min.js')}}"></script>
<script type="text/javascript" src="{{url('css/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title> Home </title>
<div class="TieuDe">
   <div class="banner">
      <img src="{{url('img/BANNER.jpg')}}" alt="Banner" />
      <div style="
         padding: 15px 50px 5px 50px;
         float: right;
         font-size: 16px;">
         Xin chào, <b>{{Session::get('username')}}</b>
         &nbsp; <a href="{{url('/dang-xuat')}}"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a> 
      </div>
   </div>
   <div id="content" class="NoiDung">
      <div id="congvan"> 
         <div class="sidenav">
            <button class="dropdown-btn">VĂN BẢN</button>
            <div class="dropdown-container">
               <a href="{{url('/DanhSachCongVanDen/1')}}">Văn bản đến</a>
               <a href="{{url('/DanhSachCongVanDi/1')}}">Văn bản đi</a>
               <a href="{{url('/FrmTaoMoiCongVan')}}">Tạo mới và lưu văn bản</a>
            </div>
            
            <button class="dropdown-btn">BIỂU MẪU </button>
            <div class="dropdown-container">
               <a href="{{url('/DanhSachBieuMau/1')}}">Biểu mẫu</a>
            </div>
            <button class="dropdown-btn">NHÂN SỰ </button>
            <div class="dropdown-container">
               <a href="{{url('/DanhSachNhanSu')}}">Danh sách nhân sự</a>
               <a href="{{url('/FormThemNhanSu')}}">Thêm mới nhân sự</a>
            </div>
            <button class="dropdown-btn">KẾ HOẠCH  </button>
            <div class="dropdown-container">
               <a href="#">Thời khóa biểu</a>
               <a href="#">Lịch công tác tuần trường</a>
               <a href="#">Lịch công tác cơ sở</a>
            </div>
            <button class="dropdown-btn">HỘP THƯ CÁ NHÂN </button>
            <div class="dropdown-container">
               <a href="#">Hộp thư đến</a>
               <a href="#">Thư đã gửi</a>
            </div>
            <button class="dropdown-btn">THÔNG TIN KHÁC </button>
            <div class="dropdown-container">
               <a href="#">Sổ địa chỉ các đơn vị</a>
               <a href="#">Các ngày lễ, ngày nghỉ trong năm</a>
            </div>
         </div>
      </div>
      <div id="TuyChon">
         @yield('NoiDung')
      </div>
   </div>
</div>
<script>
   //* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
   var dropdown = document.getElementsByClassName("dropdown-btn");
   var i;
   
   for (i = 0; i < dropdown.length; i++) {
     dropdown[i].addEventListener("click", function() {
       this.classList.toggle("active");
       var dropdownContent = this.nextElementSibling;
       if (dropdownContent.style.display === "block") {
         dropdownContent.style.display = "none";
       } else {
         dropdownContent.style.display = "block";
       }
     });
   }
</script>

