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