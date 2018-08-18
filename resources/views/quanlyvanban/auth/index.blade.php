<!DOCTYPE html>
<html>
<head>
	<title>Quan ly van ban</title>
	<link rel="stylesheet" type="" href="css\bootstrap\css\bootstrap.min.css">
	<script type="text/javascript" src="js\jquery-1.11.1.min.js" ></script>
	<script type="text/javascript" src="css\bootstrap\js\bootstrap.min.js" ></script>
</head>
<body>
	<div class="container">
  <div style="margin: 0 35%;">
  <h2>Đăng nhập hệ thống</h2>
  {!!Form::open(['route'=>'quanlyvanban.auth.kiemtra'])!!}
    <div class="form-group">
      <label for="username">Tên đăng nhập:</label>
      {{Form::text('username','vugalopg',['class'=>'form-control','placeholder'=>'Điền tên đăng nhập'])}}
    </div>
    <div class="form-group">
      <label for="password">Mật khẩu:</label>
      {{Form::password('password',['class'=>'form-control','placeholder'=>'Điền mật khẩu'])}}
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Lưu mật khẩu</label>
    </div>
    {{Form::submit('Đăng nhập',['class'=>'btn btn-primary'])}}
  {!!Form::close()!!}
  </div>
</div>
</body>
</html>