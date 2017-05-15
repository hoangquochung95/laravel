@extends('layout.master')
@section('title')
	My Project
@endsection
@section('class2')
 class="active"
@endsection
@section('content')

  <section>
    <div class="container">
      <div class="row">        
        <div class="col-sm-10 col-sm-push-1">
          <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Sản phẩm</h2>
              @foreach($products as $product)

                   <div class="col-sm-4">
                      <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                              <img src="{{ $product->imagePath }}" alt="" />
                              <h2>${{ $product->price }}</h2>
                              <p>{{ $product->title }}</p>
                              <p>{{ $product->description }}</p>
                              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="product-overlay">
                              <div class="overlay-content">
                                <h2>${{ $product->price }}</h2>
                                <p>{{ $product->title }}</p>
                                <p>{{ $product->description }}</p>
                                <a href="{{route('product.addToCart',['id'=>$product->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>

             @endforeach
             
           
            
          </div><!--features_items-->          
        </div>
        <div class="col-sm-6 col-sm-push-5">
            {{ $products->links() }}
        </div>
      </div>
    </div>
  </section>
  
  
	
@endsection
