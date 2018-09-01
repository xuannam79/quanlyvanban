<body>
<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">
        <div class="sidebar-wrapper">
            <div class="logo">
                 <img src="{{url('admin/assets/img/noimage.png')}}" style="width:200px;" class="img-circle img-responsive" style="position: relative; overflow: hidden;">
                <a href="" class="simple-text">Admin</a>
            </div>

           <ul class="nav">
                
                <li>
                    <a id="home" href="{{Route('admin.index')}}">
                        <i class="ti-panel"></i>
                        <p>Trang Chủ</p>
                    </a>
                </li>
                <li>
                    <a id="nhansu"  href="{{Route('admin.nhansu.index')}}">
                        <i class="ti-view-list-alt"></i>
                        <p>Quản Trị Nhân Sự</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="/admin">Trang quản lý</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                             <div style="color: red;
                                padding: 15px 50px 5px 50px;
                                float: right;
                                font-size: 16px;">
                                Xin chào, 
                                <b>{{Session::get('username')}}</b> 
                                &nbsp; <a href="{{url('/dang-xuat')}}" class="btn btn-danger square-btn-adjust">Đăng xuất</a>
                                </div>
                        </li>
                    </ul>
                    

                </div>
                
            </div>
        </nav>  