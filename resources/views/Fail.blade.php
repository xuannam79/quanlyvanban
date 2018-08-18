

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href ="{{url('css/layout.css')}}">
<link rel="stylesheet" type="text/css" href ="{{url('css/left-bar.css')}}">
<link rel="stylesheet" type="text/css" href ="{{url('css/reset.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title> Home </title>
<div class="TieuDe">
   <div class="banner">
      <img src="img/BANNER.jpg" alt="Banner" />
      <div style="
         padding: 15px 50px 5px 50px;
         float: right;
         font-size: 16px;">
         Xin chào, <b> Tên admin</b>
         &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Đăng xuất</a> 
      </div>
   </div>
   <div id="content" class="NoiDung">
      <div id="congvan">
         <div class="sidenav">
            <button class="dropdown-btn">VĂN BẢN</button>
            <div class="dropdown-container">
               <a href="">Văn bản đến</a>
               <a href="">Văn bản đi</a>
            </div>
            <button class="dropdown-btn">KẾ HOẠCH  </button>
            <div class="dropdown-container">
               <a href="#">Thời khóa biểu</a>
               <a href="#">Lịch công tác tuần trường</a>
               <a href="#">Lịch công tác cơ sở</a>
            </div>
            <button class="dropdown-btn">BIỂU MẪU </button>
            <div class="dropdown-container">
               <a href="#">Biểu mẫu</a>
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

