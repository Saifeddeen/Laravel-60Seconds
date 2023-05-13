<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	
	<title>60 Seconds</title>
	
	<!-- Stylesheets -->
	<link href="{{ asset('view_temp/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('view_temp/css/material-design-iconic-font.css') }}" rel="stylesheet">
	<link href="{{ asset('view_temp/css/font-awesome.css') }}" rel="stylesheet">
	<link href="{{ asset('view_temp/css/owl.carousel.min.css') }}" rel="stylesheet">
	<link href="{{ asset('view_temp/css/owl.theme.default.min.css') }}" rel="stylesheet">
	<link href="{{ asset('view_temp/css/animate.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('view_temp/css/style.css') }}" rel="stylesheet">
	<!-- Responsive -->
	<link href="{{ asset('view_temp/css/responsive.css') }}" rel="stylesheet">
	
	
	<script src="{{ asset('view_temp/js/jquery-3.2.1.min.js') }}"></script>
</head>
<body>
	<div class="mobile-menu">
	    <div class="menu-mobile">
	        <div class="brand-area">
	            <a href="{{ $images['navbar']->sub_content }}">
	            	<img src="{{ asset($images['navbar']->content) }}">
	            </a>
	        </div>
	        <div class="mmenu">
		        <ul>
			        <!--<li class="active"><a href="#home" rel="m_PageScroll2id">Home</a></li>
					<li><a href="#about" rel="m_PageScroll2id">About</a></li>
					<li><a href="#features" rel="m_PageScroll2id">Features</a></li>
					<li><a href="#how-work" rel="m_PageScroll2id">How Work</a></li>
					<li><a href="#reviews" rel="m_PageScroll2id">Reviews</a></li>
					<li><a href="#contact" rel="m_PageScroll2id">Connect</a></li>-->
					@foreach ($addresses['navbar'] as $nav_address)
						@if($nav_address['sub_content'] != null)
							@if(strcmp(strtoupper($nav_address['content']),strtoupper('home'))==0)
							<li class="active"><a href="{{ $nav_address['sub_content'] }}" rel="m_PageScroll2id">{{ $nav_address['content'] }}</a></li>
							@else
							<li><a href="{{ $nav_address['sub_content'] }}" rel="m_PageScroll2id">{{ $nav_address['content'] }}</a></li>
							@endif
						@endif
					@endforeach
					@if(App::getLocale() == 'en')
					<li><a href="?lang=ar" >AR</a></li>
					@endif
					@if(App::getLocale() == 'ar')
					<li><a href="?lang=en" >EN</a></li>
					@endif
				</ul>
			</div>
		</div>
		<div class="m-overlay"></div>
	</div>
	<!--mobile-menu-->
	
	<div class="main-wrapper">
	
		<header id="header">
			<div class="container">
				<div class="logo-site">
					<a href="#"><img src="{{ asset('view_temp/images/logo.svg') }}" alt="" class="img-responsive"></a>
				</div>
				<ul class="main_menu clearfix">
					@foreach ($addresses['navbar'] as $nav_address)
						@if($nav_address['sub_content'] != null)
							@if(strcmp(strtoupper($nav_address['content']),strtoupper('home'))==0)
							<li class="active"><a href="{{ $nav_address['sub_content'] }}" rel="m_PageScroll2id">{{ $nav_address['content'] }}</a></li>
							@else
							<li><a href="{{ $nav_address['sub_content'] }}" rel="m_PageScroll2id">{{ $nav_address['content'] }}</a></li>
							@endif
						@endif
					@endforeach
					@if(App::getLocale() == 'en')
					<li><a href="?lang=ar" >AR</a></li>
					@endif
					@if(App::getLocale() == 'ar')
					<li><a href="?lang=en" >EN</a></li>
					@endif
				</ul>
				<button type="button" class="hamburger is-closed">
			        <span class="hamb-top"></span>
			        <span class="hamb-middle"></span>
			        <span class="hamb-bottom"></span>
			    </button>
			</div>
		</header>
		<!--header-->
		
		<section class="section_home" id="home">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="home_txt">
                            <h1 class="wow fadeInUp">{{ $addresses['home']['content'] }}</h1>
                            <p class="wow fadeInUp">{{ $addresses['home']['sub_content'] }}</p>
                            <div class="download-app">
                                <ul class="btn-download-app wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.500s">
                                    @foreach ($buttons['home'] as $btn)
									<li class="">
										<a href="#">
											<p>{{ $btn['content'] }}</p>
											<i class="zmdi zmdi-android"></i> 
										</a>
									 </li>
									@endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="home_thumbs wow zoomInDown">
                            <img src="{{ asset($images['home']['content']) }}" alt="" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
		</section>
		<!--section_home-->
		
		<section class="sec-site">
		    <div class="container">
		        <div class="row">
					@foreach ($cards['home'] as $card)
					<div class="col-md-3">
		                <div class="box-sec">
		                    <figure><img src="{{ asset($card['icon']) }}" alt="" /></figure>
		                    <div class="sec-title">
		                        <h2>{{ $card['sub_content'] }}</h2>
		                        <p>{{ $card['content'] }}</p>
		                    </div>
		                </div>
		            </div>
					@endforeach
		        </div>
		    </div>
		</section>
		<!--section_home-->
	
		<section class="section_about" id="about">
            <div class="container">
                <div class="flex-about">
                    <div class="ab-right">
                        <div class="img-about">
                            <img src="{{ asset($images['about']['content']) }}" alt="" />
                        </div>
                    </div>
                    <div class="ab-left">
                        <div class="box-about">
                            <div class="head-about">
                                <h2>{{ $addresses['about']['content'] }}</h2>
                                <p>{{ $addresses['about']['sub_content'] }}</p>
                            </div>
                            <ul>
								@foreach ($lists1['about'] as $listItem)
								<li><p>{{ $listItem }}</p></li>
								@endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
		</section>
		<!--section_services-->
		
		<section class="section_features" id="features">
            <div class="container">
                <div class="sec_head wow fadeInUp">
                    <h2>{{ $addresses['features']['content'] }}</h2>
                    <p>{{ $addresses['features']['sub_content'] }}</p>
                </div>
                <div class="owl-carousel" id="feat-slider">
                    @foreach ($features as $feature)
					<div class="item">
                        <div class="box-features">
                            <div class="sec-title">
                                <h5>{{ $feature->name }}</h5>
                                <p>{{ $feature->content }}</p>
                            </div>
                            <figure>
                                <img src="{{ asset($feature->icon) }}" alt="" />
                            </figure>
                        </div>
                    </div>
					@endforeach
                </div>
            </div>
		</section>
		<!--section_portfolio-->
		
		<section class="section_how_work" id="how-work">
			 <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="work-item">
                            <img src="{{ asset($images['how_work']['content']) }}" alt="" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="head-title wow fadeInUp">
                            <h2>{{ $addresses['how_work']['content'] }}</h2>
                            <p>{{ $addresses['how_work']['sub_content'] }}</p>
                        </div>
                        <ul class="list-work">
							@foreach ($lists1['how_work'][0] as $itema)
							<li>
                                <h3>{{ $itema }}</h3>
                                <p>{{ $lists1['how_work'][1][key($lists1['how_work'][0])] }}{{ next($lists1['how_work'][0]) }}</p>
                            </li>
							@endforeach
                        </ul>
                    </div>
                </div>
			</div>
		</section>
		<!--section_how_work-->
		
		<section class="section_customer_opinions" id="reviews">
		    <div class="container">
                <div class="sec_head wow fadeInUp">
                    <h2>{{ $addresses['reviews']['content'] }}</h2>
                </div>
                <div class="owl-carousel" id="slider-testi">
                    @foreach ($clients as $client)
					<div class="item">
                        <div class="content-testi">
                            <figure>
                                <img src="{{ asset($client->image) }}" alt="" />
                            </figure>
                            <p>{{ $client->comment }}</p>
                            <div class="sec-title">
                                <h6>{{ $client->name }}</h6>
                                <div class="star-rating">
                                    <span style="width:{{ $client->rating*20 }}%"><strong class="rating">{{ $client->rating }}</strong> out of 5</span>
                                </div>
                            </div>
                        </div>
                    </div>
					@endforeach
                </div>
		    </div>
		</section>
		<!--section_customer_opinions-->
		
		<section class="section_contact" id="contact">
		    <div class="container">
                <div class="sec_head wow fadeInUp">
                    <h2>{{ $addresses['connect'][0]['content'] }}</h2>
                </div>
		        <div class="row">
                    <div class="col-md-6">
                        <p class="ph-head">{{ $addresses['connect'][1]['content'] }}</p>
		                <ul class="list-contact">
		                    @for ($i=2;$i<6;$i++)
							<li>
		                        <figure>
									<img src="{{ asset($addresses['connect'][$i]['icon']) }}" alt="Location" />
		                            <span>{{ $addresses['connect'][$i]['content'] }}</span>
		                        </figure>
		                        <div class="sec-title">
		                            <p>{{ $addresses['connect'][$i]['sub_content'] }}</p>
		                        </div>
		                    </li>
							@endfor
		                </ul>
		            </div>
		            <div class="col-md-6">
                        <p class="ph-head">{{ $addresses['connect'][6]['content'] }}</p>
		                <form class="form-contact" method="POST" action="{{ route('message.store') }}">
							@csrf
							@foreach ($inputs_text['connect'] as $input)
							<div class="form-group">
                                <input type="text" name="{{ $input->name }}" class="form-control" placeholder="{{ $input->content }}" />
                                @if($input->icon != null)
								<img src="{{ asset($input->icon) }}" alt="User Name" />
								@endif
                            </div>
							@endforeach
                            <div class="form-group">
                                <input type="submit" value="{{ $buttons['connect']->content }}" class="btn-send">
                            </div>
		                </form>
		            </div>
		        </div>
		    </div>
		</section>
		<!--section_contact-->
		
		<footer id="footer">
			<div class="container">
                <div class="social-media wow fadeInUp">
                    <li class="twitter"><a href=""><i class="zmdi zmdi-twitter"></i></a></li>
                    <li class="facebook"><a href=""><i class="zmdi zmdi-facebook"></i></a></li>
                    <li class="instagram"><a href=""><i class="fa fa-instagram"></i></a></li>
                </div>
                <div class="flex-ft">
                    <p class="copyRight number-site">{{ $addresses['copyr']['content'] }}</p>
                </div>
			</div>
		</footer>
		<!--footer-->
		
	</div>
	<!--main-wrapper--> 
	<script src="{{ asset('view_temp/js/popper.min.js') }}"></script>
	<script src="{{ asset('view_temp/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('view_temp/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('view_temp/js/jquery.malihu.PageScroll2id.min.js') }}"></script>
	<script src="{{ asset('view_temp/js/wow.js') }}"></script>
	<script src="{{ asset('view_temp/js/script.js') }}"></script>
	
	<script>
        
        new WOW().init();
        
		(function($){
			$(window).on("load",function(){
				
				/* Page Scroll to id fn call */
				$("a[rel='m_PageScroll2id']").mPageScroll2id({
					scrollSpeed: 1200
					,scrollEasing:"easeOutQuint"
					,liveSelector:"a[rel='m_PageScroll2id']"
				});
				
			});
		})(jQuery);
      
	istener(window, 'load', initialize);
	</script>
	
</body>
</html>	