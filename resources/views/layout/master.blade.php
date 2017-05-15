

<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{URL::asset('css/bootstrap.min.css')	}}" rel="stylesheet">
    <link href="{{URL::asset('css/font-awesome.min.css')	}}" rel="stylesheet">
    <link href="{{URL::asset('css/prettyPhoto.css')	}}" rel="stylesheet">
    <link href="{{URL::asset('css/price-range.css')	}}" rel="stylesheet">
    <link href="{{URL::asset('css/animate.css')	}}" rel="stylesheet">
	<link href="{{URL::asset('css/main.css ')	}}" rel="stylesheet">
	<link href="{{URL::asset('css/responsive.css')	}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::asset('images/ico/apple-touch-icon-144-precomposed.png')	}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::asset('images/ico/apple-touch-icon-144-precomposed.png')	}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::asset('images/ico/apple-touch-icon-72-precomposed.png')	}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::asset('images/ico/apple-touch-icon-57-precomposed.png')	}}">
    @yield('script')
</head><!--/head-->

<body>
	@include('partials.header')
	<div class="content">
			@yield('content')		
	</div>
	@yield('script')




<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h4><span>VNBeauty</span>-Công ty mỹ phẩm</h4>
							<p>Công ty kinh doanh mỹ phẩm VNBeauty </p>
						</div>
					</div>
					<div class="col-sm-10">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
							<a href="#" class="thumbnail">
							      <img src="{{URL::asset('images/home/iframe1.png')	}}" alt="...">
							 </a>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
							<a href="#" class="thumbnail">
							      <img src="{{URL::asset('images/home/iframe2.png')	}}" alt="...">
							 </a>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
							<a href="#" class="thumbnail">
							      <img src="{{URL::asset('images/home/iframe3.png')	}}" alt="...">
							 </a>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
							<a href="#" class="thumbnail">
							      <img src="{{URL::asset('images/home/iframe4.png')	}}" alt="...">
							 </a>
							</div>
						</div>
					</div>
					
			</div>
		</div>




		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left"></p>
					<p class="pull-right"></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="{{URL::asset('js/jquery.js')	}}"></script>
	<script src="{{URL::asset('js/bootstrap.min.js')	}}"></script>
	<script src="{{URL::asset('js/jquery.scrollUp.min.js')	}}"></script>
	<script src="{{URL::asset('js/price-range.js')	}}"></script>
    <script src="{{URL::asset('js/jquery.prettyPhoto.js')	}}"></script>
    <script src="{{URL::asset('js/main.js')	}}"></script>
</body>

</html>