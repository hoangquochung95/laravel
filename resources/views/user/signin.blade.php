@extends('layout.master')
@section('content')

		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập</h2>
						@if(count($errors)>0)
							<div class="alert alert-danger">
								@foreach($errors->all() as $error)
									<p1>
										{{$error}}
									</p1>
								@endforeach
							</div>
						@endif
						<form action="{{route('user.signin')}}" method ="POST">
							<input type="text" placeholder="Tên tài khoản" id="name" name="name"/>
							<input type="text" placeholder="Mật khẩu" id="password" name="password"/>

							<button type="submit" class="btn btn-default">Đăng nhập</button>
							{{csrf_field()}}
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">HAY</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Tạo tài khoản mới</h2>
						@if(count($errors)>0)
							<div class="alert alert-danger">
								@foreach($errors->all() as $error)
									<p1>
										{{$error}}
									</p1>
								@endforeach
							</div>
						@endif
						<form action="{{route('user.signup')}}" method ="POST">
							<input type="text" placeholder="Tên tài khoản" id="name" name="name" />
							<input type="password" placeholder="Mật khẩu" id="password" name="password" />
							<input type="text" placeholder="" id="email" type="email" name="email" />
							<button type="submit" class="btn btn-default">Đăng ký</button>
							{{csrf_field()}}
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
			<div class="row" style="min-height: 100px;"></div>
		</div>
@endsection

