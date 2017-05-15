@extends('layout.master')

@section('content')

	 <div id="contact-page" class="container"> 	
    		<div class="row">  	
	    		<div class="col-sm-10 col-sm-push-1">
	    			<h2 class="title text-center">Thông tin khách hàng </h2>
					@if(Session::has('user')!=null)
						@if( Session::get('user')['email']==null and  Session::get('user')['phone']==null)
	    					<div class="alert alert-danger " role="alert">
	    						 <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								  <span class="sr-only">Error:</span>
								  Vui lòng điền số điện thoại hoặc email để thanh toán
	    					</div>
	    				@endif
	    			@endif
		    		<div class="col-sm-10 col-sm-push-1">
		    			<form method="post" action= "{{route('user.update')}}">
						@foreach($user  as $user)
						<div class="form-group">
						    <label for="exampleInputName2">Tên người dùng</label>
						    <input type="text" name="name" value=" {{ $user->name }}" class="form-control"  >
						 </div>
						 <div class="form-group">
						    <label for="exampleInputName2">Điện thoại</label>
						    <input type="text" name="phone" value=" {{ $user->phone }}"  class="form-control" >
						 </div>
						 <div class="form-group">
						    <label for="exampleInputName2">Email</label>
						    <input type="text" name="mail" value=" {{ $user->email }}"  class="form-control" >
						 </div>
						 <div class="form-group">
						    <label for="exampleInputName2">Địa chỉ</label>
						    <input type="text" name="address" value=" {{ $user->address }}" class="form-control"  >
						 </div>
						<div class="col-sm-3  col-sm-push-5">
						 	<input type="submit" name="save" value="Thay đổi" class ="btn btn-success">
						 </div>

					    @endforeach
						{{csrf_field()}} 
						  	
				
						 </form>   			
		    		</div> 
		    	</div>
    		</div>	
    </div><!--/#contact-page-->

	 
@endsection

