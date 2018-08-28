@extends('templates.admin.master') {{-- kế thừa từ master.blade.php --}}
@section('content') {{-- gọi lại tên trong yield --}}
      <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
							<div class="col-md-4 col-sm-4 col-xs-4">
								<div class="panel panel-back noti-box" style="border-radius: 50px; position: relative;background: #ded9e2;">
									<span class="icon-box bg-color-green set-icon">
										<i class="fas fa-th-list" style="position: absolute;top: 11px;left: 38px;"></i>
									</span>
									<div class="text-box">
										<p class="main-text" style="margin-left: 57px;font-size: 25px;"><a href="" title="" style="color: darkblue;">Quản lý nhân sự</a></p>
										<p style="margin-left: 100px;">Có 10 nhân sự</p>
									</div>
								</div>
							</div>			
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop