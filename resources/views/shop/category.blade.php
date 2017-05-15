@extends('layout.master')

@section('content')

	 <div id="contact-page" class="container"> 	
    		<div class="row">  	
	    		<div class="col-sm-10 col-sm-push-1">
	    			<h2 class="title text-center">Loại sản phẩm</h2>
		    		<div class="col-sm-10 col-sm-push-1">
		    			<form method="post" action= "{{route('product.deleteCategory')}}">
			    		  	<table class="table table-hover">
							  	<tr>
							  		<th>Loại</th>
							  		<th>Mô tả</th>
							  		<th>Nhãn hiệu</th>
							  		<th>Tác vụ</th>
							  	</tr>
							  	
							  	@foreach($category1 as $category)

						               <tr>
							               	<td>{{ $category->type }}</td>
									  		<td>{{ $category->decription }}</td>
									  		<td>{{ $category->brand }}</td>
									  		<input type="hidden" name="value" value="{{ $category->id}}" >
									  		<td> <input type="submit" name="delete" value="Xóa" class ="btn btn-danger"></td>
									  	</tr>

					             @endforeach
							  	{{csrf_field()}}	
						  	
							</table>	
						 </form>   			
		    		</div> 
		    	</div>
				<div class="col-sm-6 col-sm-push-5">
		            {{ $category1->links() }}
				</div>
    		</div>	
    </div><!--/#contact-page-->

	 <div id="contact-page" class="container"> 	
		<div class="row">
			<div class="col-sm-10 col-sm-push-1">
	    		<h2 class="title text-center">Thêm loại sản phẩm</h2>
	    		<div class="login-form">
					@if(count($errors)>0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $error)
								<p1>
									{{$error}}
								</p1>
							@endforeach
						</div>
					@endif
					<form action="{{route('product.addCategory')}}" method="post" enctype="multipart/form-data">
		    				
					    <input type="text" placeholder="Loại" id="category" name="category" />
						<input type="text" placeholder="Mô tả" id="description" name="description" />
						<input type="text" placeholder="Nhãn hiệu" id="brand"  name="brand" />
						<div class="row">
							<div class ="col-sm-6 col-sm-push-5">
					    		<button type="submit" class="btn btn-default">Thêm</button>
					    	</div>
					    </div>
					    {{csrf_field()}}
					</form>
				</div>
				
			</div>
		</div>
	</div>
	<hr>

@endsection

