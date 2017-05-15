@extends('layout.master')
@section('title')
	My Project
@endsection
@section('class1')
 class="active"
@endsection
@section('content')

<section id="slider"><!--slider-->

    <div class="container-fruid">
      <div class="row">
        <div class="col-sm-11">
          
      </div>
    </div>
  </section><!--/slider-->
  
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="left-sidebar">
            <h2>Thể loại</h2>
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
              @foreach($category as $cate)                        
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><a href="{{route('product.selectCate',['id'=>$cate->type])}}">{{$cate->type}}</a></h4>
                    </div>
                  </div>
              @endforeach
              
            </div><!--/category-products-->
          
            <div class="brands_products"><!--brands_products-->
              <h2>Thương hiệu</h2>
              <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                  @foreach($category as $cate)
                    <li><a href="{{route('product.selectBrand',['id'=>$cate->brand])}}"> {{$cate->brand}}</li>
                  @endforeach
                </ul>
              </div>
            </div><!--/brands_products-->
            
            <div class="shipping text-center"><!--shipping-->
              <img src="images/home/shipping.jpg" alt="" />
            </div><!--/shipping-->
          
          </div>
        </div>
        
        <div class="col-sm-9 padding-right">
          <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Sản phẩm</h2>
              @foreach($products->chunk(3) as $productChunk)
               @foreach($productChunk as $product)
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
             @endforeach
           
            
          </div><!--features_items-->
          
          <div class="category-tab"><!--category-tab-->
            <div class="col-sm-12">
              <ul class="nav nav-tabs">
                <p hidden="">{{$i=0}}</p>
                @foreach($category as $cate)   
                  @if($i==0)                     
                      <li class="active"><a href="#{{$cate->id}}" data-toggle="tab">{{$cate->type}}</a></li>
                      <p hidden="">{{$i++}}</p>
                  @else
                      <li><a href="#{{$cate->id}}" data-toggle="tab">{{$cate->type}}</a></li>
                  @endif
                @endforeach
              </ul>
            </div>
            <p hidden="">{{$j=0}}</p>
            <div class="tab-content">
             @foreach($category as $cate)
                @if($j==0)                     
                      <div class="tab-pane fade in active" id="{{$cate->id}}" >
                      <p hidden="">{{$j++}}</p>
                  @else
                      <div class="tab-pane fade in" id="{{$cate->id}}" >
                  @endif
                @foreach($productsAll as $all)
                  @if($all->categoryid==$cate->id)
                    
                      <div class="col-sm-3">
                        <div class="product-image-wrapper">
                          <div class="single-products">
                            <div class="productinfo text-center">
                              <img src="{{$all->imagePath}}" alt="" />
                              <h2>${{$all->price}}</h2>
                              <p>{{$all->title}} </p>
                              <a href="{{route('product.addToCart',['id'=>$all->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                
                     
                  @endif
                @endforeach
                </div> 
              @endforeach

            </div>
          </div>
          
          <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Tham Khảo</h2>
            
            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="item active"> 
                <p hidden>{{$i=0}}</p>
                
                  @foreach($productsRecommen->chunk(3) as $productChunk)
                     @foreach($productChunk as $product)
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
                                
                              </div>
                            </div>
                          </div>
                      <p hidden>{{$i++}}</p>
                      @if($i >3)
                         @break
                      @endif
                     
                      @endforeach
                   @endforeach
                  
                </div>
                <div class="item">  
                   @foreach($productsRecommen->chunk(3) as $productChunk)
                     @foreach($productChunk as $product)
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
                              
                              </div>
                            </div>
                          </div>
                      @endforeach
                   @endforeach
                </div>
              </div>
               <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                </a>      
            </div>
          </div><!--/recommended_items-->
          
        </div>
      </div>
    </div>
  </section>
  
  
	
@endsection
