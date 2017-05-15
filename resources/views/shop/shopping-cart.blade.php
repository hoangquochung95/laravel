@extends('layout.master')
@section('title')
	My Project
@endsection
@section('content')
	@if(Session::has('cart'))
	<section>
	    <div class="container">
	      <div class="row">        
	        <div class="col-sm-10 col-sm-push-1">
	          <div class="features_items"><!--features_items-->
	            <h2 class="title text-center">Sản phẩm</h2>
{{-- 	              @foreach($products as $product) --}}
					<table class="table table-hover">
					  	<tr>
					  		<th>Tên sản phẩm</th>
					  		<th>Tổng tiền</th>
					  		<th>Số lượng</th>
					  		<th>Tác vụ</th>
					  	</tr>
					  	
					  	@foreach($products as $product)

				               <tr>
					               	<td>{{$product['item']['title']}}</td>
							  		<td>{{$product['qty']}}</td>
							  		<td>{{$product['price']}}</td>
{{-- 								  		<input type="hidden" name="id" value="{{ $product->id}}" > --}}
							  		<td> <a href="{{route('product.deleteCart',['id'=>$product['item']])}}" class="btn btn-danger"> Xóa </a></td>
							  	</tr>

			             @endforeach
					  	{{csrf_field()}}	
				  	
					</table>
				<hr>	            
	          </div><!--features_items-->          
	        </div>

	        <div class="col-sm-6 col-sm-push-5">
	            <h3> Tổng tiền: {{$totalPrice}} 
	            	@if($totalPrice ==0)
	            		<button class="btn btn-success" disabled="true"> Thanh toán</button>
	            	@else
						<a class="btn btn-success" href="{{route('user.test')}}"> Thanh toán</a>
	            	@endif
	            </h3>

	        </div>
	      </div>
	    </div>
	  </section>
	@else
		
		<div class="row">
			<div class="col-sm-5 col-md-6 col-offset-3 col-sm-offset-3">
				<h2>No Items In Carts</h2>
			</div>
		</div>	
	@endif

	
@endsection