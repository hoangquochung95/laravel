@extends('layout.master')
@section('script')
	<script type="text/javascript">
		function readURL(input) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();

	            reader.onload = function (e) {
	                $('#blah')
	                    .attr('src', e.target.result)
	                    .width(150)
	                    .height(200);
	            };

	            reader.readAsDataURL(input.files[0]);
	        }
	    }
	</script>
@endsection
@section('content')
 <div id="contact-page" class="container"> 	
    		<div class="row">  	
    		<h2 class="title text-center">Thông tin sản phẩm</h2>
	    		<div class="col-sm-10 col-sm-push-1">
	    			<form method="post" action ="{{route('user.delete')}}">
		    		  	<table class="table table-hover">
						  	<tr>
						  		<th>Tên sản phẩm</th>
						  		<th>Mô tả</th>
						  		<th>Giá</th>
						  		<th>Tác vụ</th>
						  	</tr>
						  	
						  	@foreach($products as $product)

					               <tr>
						               	<td>{{ $product->title }}</td>
								  		<td>{{ $product->description }}</td>
								  		<td>{{ $product->price }}</td>
{{-- 								  		<input type="hidden" name="id" value="{{ $product->id}}" > --}}
								  		<td> <button type="submit" name="delete" value="{{ $product->id}}" class ="btn btn-danger">Xóa</button></td>
								  	</tr>

				             @endforeach
						  	{{csrf_field()}}	
					  	
						</table>	
					 </form>   			
	    		</div>  
    		</div>	
    </div><!--/#delete-page-->


		 <div id="contact-page" class="container"> 	
			<div class="row">
			<h2 class="title text-center">Tạo sản phẩm mới</h2>
				<div class ="col-sm-10 col-sm-push-1">
					<div class="signup-form"><!--sign up form-->
						@if(count($errors)>0)
							<div class="alert alert-danger">
								@foreach($errors->all() as $error)
									<p1>
										{{$error}}
									</p1>
								@endforeach
							</div>
						@endif
						<form action="{{route('user.admin')}}" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class ="col-sm-7 col-sm-push-4">
						    		<img id="blah" src="{{URL::to("images/product-details/nophoto.png") }}" alt="your image" width="242" height="242" />
						    	</div>
						    </div>
						    <input type="file" name="file" id="file" onchange="readURL(this);">						    				
						    <input type="text" placeholder="Tên sản phẩm" id="name" name="name" />
							<input type="text" placeholder="Mô tả" id="description" name="description" />
							<input type="text" placeholder="Giá" id="price"  name="price" />

							<select name ="value">
								@foreach($category as $cate)
									<option value ="{{$cate->id}}">{{$cate->type}}---{{$cate->brand}}</option>
								@endforeach
							</select>
							
							<div class="row">
								<div class ="col-sm-7 col-sm-push-5">
						    		<button type="submit" class="btn btn-default">Upload Image</button>
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

