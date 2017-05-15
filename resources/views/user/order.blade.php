@extends('layout.master')

@section('content')
 <div id="contact-page" class="container"> 	
    		<div class="row">  	
    		<h2 class="title text-center">Thông tin sản phẩm</h2>
	    		<div class="col-sm-10 col-sm-push-1">
	    			<form method="post" action ="{{route('product.deleteOrder')}}">
		    		  	<table class="table table-hover">
						  	<tr>
						  		<th>Tài khoản người mua</th>
						  		<th>Sản phẩm </th>
						  		<th>Số lượng</th>
						  		<th>Tổng tiền</th>
						  		<th>Tác vụ</th>
						  	</tr>
						  	
						  	@foreach($order as $order )

					               <tr>
						               	<td>{{ $order->name }}</td>
								  		<td>{{ $order->title }}</td>
								  		<td>{{ $order->qty }}</td>
								  		<td>{{ $order->total }}</td>
								  		<input type="hidden" name="id" value="{{$order->order_id}}" >
								  		<td> <button type="submit" name="delete" value="{{$order->order_id}}" class ="btn btn-danger">Xóa</button></td>
								  	</tr>

				             @endforeach
						  	{{csrf_field()}}	
					  	
						</table>	
					 </form>   			
	    		</div>  
    		</div>	
    </div><!--/#delete-page-->




@endsection

