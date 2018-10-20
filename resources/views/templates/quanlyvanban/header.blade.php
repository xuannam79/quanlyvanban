

<!DOCTYPE html>
<html>
   <head>
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
      <meta charset="utf-8">
   </head>
   <body>
      <div class="TieuDe">
      <div class="banner">
         <a href="{{ route('quanlyvanban.congvan.index') }}" title=""><img src="/img/BANNER.jpg" alt="Banner" /></a>
      <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="8" class="marquee"><i>** Chào mừng các bạn đến với Hệ Thống Tác Nghiệp - Trường Đại học Nội Vụ Hà Nội **</i> </marquee>
      <div class="logout">
         Xin chào, <b> {{Session::get('username')}}</b>
         &nbsp;
         <a href="{{url('/dang-xuat')}}">
         <i class="fa fa-sign-out" aria-hidden="true"></i>Đăng xuất</a>
      </div>
      </div>
   </body>
</html>