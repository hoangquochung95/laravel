<header id="header"><!--header-->
   <div id="custom-bootstrap-menu" class="navbar navbar-default navbar-fixed-top" role="navigation">
     <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="{{route('product.index')}}">VNBeauty</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
            
        <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-right">
               @if(Auth::check())                  
                    <li><a href="{{route('user.profile')}}"><i class="fa fa-user"></i> Thông tin tài khoản</a></li>
                        @if(Session::has('user')!=null )
                          @foreach(Session::get('user') as $user)
                            @if($user=='admin')
                            <li><a href="{{route('product.category')}}"><i class="fa fa-plus-circle"></i> Thêm/xóa thể loại</a></li>
                            <li><a href="{{route('user.admin')}}"><i class="fa fa-plus"></i> Thêm/xóa sản phẩm</a></li>
                             <li><a href="{{route('product.order')}}"><i class="fa fa-plus-circle"></i> Danh sách hóa đơn</a></li>
                            @endif
                          @endforeach
                        @endif 
                      <li><a href="{{route('product.shoppingCart')}}"><i class="fa fa-shopping-cart"></i> 
                          Giỏ hàng
                         @if (Auth::check()&&Session::has('cart')!=null)

                                <span class ="badge">
                                  
                                    {{Session::has('cart')?Session::get('cart')->totalQty:''}}
                                  
                                </span>

                          @endif
                      </a></li>
                      <li><a href="{{route('user.logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>Đăng xuất</a></li>
                @else
                      <li><a href="{{route('user.signin')}}"><i class="fa fa-lock"></i>Đăng nhập</a></li> 
                      <li><a href="{{route('user.signin')}}"><i class="fa fa-sign-in"></i>Đăng ký</a></li>
                @endif 
            </ul>
        </div>
    </div>
  </div>

  
    <div class="header-bottom"><!--header-bottom-->
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="mainmenu pull-left">
              <ul class="nav navbar-nav collapse navbar-collapse">
                <li><a href="{{route('product.index')}}" @yield('class1')>Trang chủ</a></li>
                <li><a href="{{route('product.sanpham')}}"@yield('class2')>Cửa hàng</a> </li> 
                <li><a href="{{route('home.contact')}}"@yield('class3')>Liên hệ</a></li>
                <li><a href="{{route('home.instroduction')}}"@yield('class4')>Giới thiệu</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="search_box pull-right">
              <input type="text" placeholder="Search"/>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-bottom-->
  </header><!--/header-->