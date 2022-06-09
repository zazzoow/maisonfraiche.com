<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ in_array(app()->getLocale(), ['ar', 'az', 'dv', 'fa', 'he', 'ku', 'ur']) ? 'rtl' : 'ltr' }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- <meta http-equiv="Content-Security-Policy" content="base-uri 'self'; default-src 'self' 'nonce-{{ app( 'aimeos.context' )->get()->nonce() }}'; style-src 'unsafe-inline' 'self'; img-src 'self' data: https://aimeos.org; frame-src https://www.youtube.com https://player.vimeo.com"> -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<link href="<?= asset('dbento') ?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- animsition -->
    <link href="<?= asset('dbento') ?>/css/animsition.min.css" rel="stylesheet">
    <!-- lightgallery -->
    <link href="<?= asset('dbento') ?>/css/css/lightgallery.css" rel="stylesheet">
    <!-- font themify CSS -->
    <link href="<?= asset('dbento') ?>/css/themify-icons.css" rel="stylesheet" >
    <!-- font awesome CSS -->
    <link href="<?= asset('dbento') ?>/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- revolution slider css -->
    <link rel="stylesheet" type="text/css" href="<?= asset('dbento') ?>/rs-plugin/css/fullscreen.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?= asset('dbento') ?>/rs-plugin/css/settings.css" media="screen" />
    <link rel="stylesheet" href="<?= asset('dbento') ?>/css/rev-settings.css" type="text/css">
    <!-- owl -->
    <link href="<?= asset('dbento') ?>/css/owl.carousel.css" rel="stylesheet">
    <link href="<?= asset('dbento') ?>/css/owl.theme.css" rel="stylesheet">
    <!-- main css -->
    <link href="<?= asset('dbento') ?>/css/animated-on3step.css" rel="stylesheet">
    <link href="<?= asset('dbento') ?>/css/style.css" rel="stylesheet">
    <link href="<?= asset('dbento') ?>/css/queriesstyle.css" media="all" rel="stylesheet">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />

		<!-- <link rel="stylesheet" href="<= asset('mdb') ?>/css/mdb.min.css" />

		<link rel="stylesheet" href="<= asset('mdb') ?>/plugins/css/all.min.css" /> -->


		<!-- <link rel="icon" href="{{ asset( 'aimeos/' . ( app( 'aimeos.context' )->get()->locale()->getSiteItem()->getIcon() ?: '../vendor/shop/themes/default/assets/icon.png' ) ) }}"/>
		<link rel="preload" href="{{ asset('vendor/shop/themes/default/assets/roboto-condensed-v19-latin-regular.woff2') }}" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="{{ asset('vendor/shop/themes/default/assets/roboto-condensed-v19-latin-700.woff2') }}" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="{{ asset('vendor/shop/themes/default/assets/bootstrap-icons.woff2') }}" as="font" type="font/woff2" crossorigin> -->
	</head>

	<body class="bg-init">

	<!-- preloader -->
	<div id="preloader">
	<div class="loader">
			<div class="spinner"></div>
	</div>
	</div>
	<!-- preloader -->

	<!-- container-wrapper -->
	<div class="content-wrapper animsition-overlay">
	<!-- bgblock -->
	<div id="bgblock"></div>

	<header class="init"><!-- header -->
		<!-- nav -->
		<div class="navbar-default-white navbar-fixed-top">
			<div class="container-fluid"><!-- container -->
					<!-- row -->
					<div class="row p-3-vh">

							<!-- logo -->

							<a class="logo centered"  href="index.html">
							<img class="h-100 init" src="{{ asset( 'aimeos/' . ( app( 'aimeos.context' )->get()->locale()->getSiteItem()->getLogo() ?: '../vendor/shop/themes/default/assets/logo.png' ) ) }}" title="Logo">
							<img class="h-100 show" src="{{ asset( 'aimeos/' . ( app( 'aimeos.context' )->get()->locale()->getSiteItem()->getLogo() ?: '../vendor/shop/themes/default/assets/logo.png' ) ) }}" title="Logo">
							</a>

							<!-- logo end -->

							<!-- mainmenu start -->
							<div class="white menu-init" id="main-menu">
									@yield('aimeos_head_nav')
							</div><!-- mainmenu end -->


							<ul class="navbar-nav align-self-center">
								@if (Auth::guest() && config('app.shop_registration'))
									<li class="nav-item register"><a class="nav-link" href="{{ airoute( 'register' ) }}" title="{{ __( 'Register' ) }}"><span class="name">{{ __('Register') }}</span></a></li>
								@endif
								@if (Auth::guest())
									<li class="nav-item login"><a class="nav-link" href="{{ airoute( 'login' ) }}" title="{{ __( 'Login' ) }}"><span class="name">{{ __( 'Login' ) }}</span></a></li>
								@else
									<li class="nav-item login profile dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false" title="{{ __( 'Account' ) }}"><span class="name"><i class="fas fa-user"></i></span> <span class="caret"></span></a>
										<ul class="dropdown-menu dropdown-menu-end login" role="menu">
											<li class="dropdown-item"><a class="nav-link" href="{{ airoute( 'aimeos_shop_account' ) }}"><span class="name">{{ __( 'Profile' ) }}</span></a></li>
											<li class="dropdown-item"><form id="logout" action="{{ airoute( 'logout' ) }}" method="POST">{{ csrf_field() }}<button class="btn btn-light" data-mdb-ripple-color="dark"><span class="name">{{ __( 'Logout' ) }}</span></button></form></li>
										</ul>
									</li>
								@endif
							</ul>

							<div class="menu-right centered">
								<ul class="iconright">
									<li>
										<div id="showside" class="d-none-mobile"><span class="ti-menu"></span></div>
										<div id="showmobile"><span class="ti-menu"></span></div>
									</li>
								</ul>
							</div>


					</div>
					<!-- row end-->
			</div><!-- container end -->
		</div>
		<!-- nav -->
	</header><!-- header end -->

	<!-- sidegalery-->
	<div id="bgsidegalery"></div>
	<div id="sidegalery" class="init">
		<div class="sidebar">
			<div id="closesidegalery" class="cl-sidebar init">
				<div>
					<span class="ti-close"></span>
				</div>
			</div>

			<h3>Our Menu</h3>
			<div class="s-galery">
				<div id="w-gallery-container" class="w-gallery-container side">
					<a class="w-gallery" href="<?= asset('dbento/') ?>img/gallery/1.jpg">
							<img src="img/gallery/1.jpg" alt="" class="w-gallery-image">
							</a>

					<a class="w-gallery" href="<?= asset('dbento/') ?>img/gallery/2.jpg">
							<img src="img/gallery/2.jpg" alt="" class="w-gallery-image">
							</a>

					<a class="w-gallery" href="<?= asset('dbento/') ?>img/gallery/3.jpg">
							<img src="img/gallery/3.jpg" alt="" class="w-gallery-image">
							</a>

					<a class="w-gallery" href="<?= asset('dbento/') ?>img/gallery/4.jpg">
							<img src="img/gallery/4.jpg" alt="" class="w-gallery-image">
							</a>

					<a class="w-gallery" href="<?= asset('dbento/') ?>img/gallery/5.jpg">
							<img src="img/gallery/5.jpg" alt="" class="w-gallery-image">
							</a>

					<a class="w-gallery" href="<?= asset('dbento/') ?>img/gallery/6.jpg">
							<img src="img/gallery/6.jpg" alt="" class="w-gallery-image">
							</a>

					<a class="w-gallery" href="<?= asset('dbento/') ?>img/gallery/7.jpg">
							<img src="img/gallery/7.jpg" alt="" class="w-gallery-image">
							</a>

					<a class="w-gallery" href="<?= asset('dbento/') ?>img/gallery/8.jpg">
							<img src="img/gallery/8.jpg" alt="" class="w-gallery-image">
							</a>

					<a class="w-gallery" href="<?= asset('dbento/') ?>img/gallery/9.jpg">
							<img src="img/gallery/9.jpg" alt="" class="w-gallery-image">
							</a>
				</div>
			</div>
			<h3>Share us: </h3>
			<div class="s-social">
				<a href="<?= asset('dbento/') ?>#"><span class="ti-twitter"></span></a>
				<a href="<?= asset('dbento/') ?>#"><span class="ti-facebook"></span></a>
				<a href="<?= asset('dbento/') ?>#"><span class="ti-youtube"></span></a>
				<a href="<?= asset('dbento/') ?>#"><span class="ti-instagram"></span></a>
			</div>

		</div>
	</div>
	<!-- sidegalery end -->


	<!-- revolution slider -->
	<section class="no-top no-bottom" aria-label="section-slider">
	<div class="fullwidthbanner-container">
	<div id="revolution-slider-full">
								<ul>

										<li data-transition="fade" data-slotamount="10" data-masterspeed="1200" data-delay="5000">

												<img src="images-slider/1.jpg" alt="" data-start="0" data-bgposition="center center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="100" data-bgpositionend="center center"/>
												<div class="tp-caption slide-big-heading sft"
														data-x="center"
														data-y="270"
														data-speed="800"
														data-start="400"
														data-easing="easeInOutExpo"
														data-endspeed="450">
														We Serve Quality Food
												</div>

												<div class="tp-caption slide-sub-heading sft"
														data-x="center"
														data-y="350"
														data-speed="1000"
									data-start="800"
									data-easing="easeOutExpo"
														data-endspeed="400">
														D’BENTO is a restaurant, bar and coffee roasterylocated on Italy. We have
	awesome recipes and the most talented chefs in town!
												</div>

												<div class="tp-caption btn-slider sfb"
														data-x="center"
														data-y="450"
														data-speed="400"
														data-start="800"
														data-easing="easeInOutExpo">
														<span class="shine"></span><a href="#" >More Detail</a>
												</div>

										</li>

										<li data-transition="fade" data-slotamount="10" data-masterspeed="1200" data-delay="5000">

												<img src="images-slider/2.jpg" alt="" data-start="0" data-bgposition="center center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="100" data-bgpositionend="center center"/>
												<div class="tp-caption slide-big-heading sft"
														data-x="center"
														data-y="270"
														data-speed="800"
														data-start="400"
														data-easing="easeInOutExpo"
														data-endspeed="450">
														Hot And Ready To Serve
												</div>

												<div class="tp-caption slide-sub-heading sft"
														data-x="center"
														data-y="350"
														data-speed="1000"
									data-start="800"
									data-easing="easeOutExpo"
														data-endspeed="400">
														D’BENTO is a restaurant, bar and coffee roasterylocated on Italy. We have
	awesome recipes and the most talented chefs in town!
												</div>

												<div class="tp-caption btn-slider sfb"
														data-x="center"
														data-y="450"
														data-speed="400"
														data-start="800"
														data-easing="easeInOutExpo">
														<span class="shine"></span><a href="#" >More Detail</a>
												</div>

										</li>

										<li data-transition="fade" data-slotamount="10" data-masterspeed="1200" data-delay="5000">

												<img src="images-slider/3.jpg" alt="" data-start="0" data-bgposition="center center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="100" data-bgpositionend="center center"/>
												<div class="tp-caption slide-big-heading sft"
														data-x="center"
														data-y="270"
														data-speed="800"
														data-start="400"
														data-easing="easeInOutExpo"
														data-endspeed="450">
														 The Best Tasting Experience!
												</div>

												<div class="tp-caption slide-sub-heading sft"
														data-x="center"
														data-y="350"
														data-speed="1000"
									data-start="800"
									data-easing="easeOutExpo"
														data-endspeed="400">
														D’BENTO is a restaurant, bar and coffee roasterylocated on Italy. We have
	awesome recipes and the most talented chefs in town!
												</div>

												<div class="tp-caption btn-slider sfb"
														data-x="center"
														data-y="450"
														data-speed="400"
														data-start="800"
														data-easing="easeInOutExpo">
														<span class="shine"></span><a href="#" >More Detail</a>
												</div>

										</li>

								</ul>
								<div class="tp-bannertimer hide"></div>
	</div>
	</div>
	</section>
	<!-- revolution slider end -->

	<!-- footer -->
	<footer style="background-image: url('img/bgfoodicon.png');">
		<div class="container-fluid">
			<div class="row p-3-vh">

				<div class="col-md-4 centered">
					<div class="foo-cont">
						<div class="title">
							Our Address
						</div>
						<div class="detail">
							249 Bueno Porto Building, 2rd floor<br>
							La Vista Street, Italy
						</div>
						<a class="btn" href="#">View on Map</a>
					</div>
				</div>

				<div class="col-md-4">
					<div class="foo-reserv">
						<div class="title">
							Make Reservation
						</div>
						<div class="detail">
							<div class="list">
								<span class="day">Week Days</span>
								<span class="time">09:00 AM - 21:00 PM</span>
							</div>
						</div>
						<div class="detail">
							<div class="list">
								<span class="day">Saturday</span>
								<span class="time">12:00 AM - 00:00 AM</span>
							</div>
						</div>
						<div class="detail pb-1">
							<div class="list">
								<span class="day">Sunday</span>
								<span class="time">11:00 AM - 22:00 PM</span>
							</div>
						</div>
						<a class="btn-content mt-4" data-toggle="modal" data-target="#resevmodal" href="#">
							<span class="shine"></span>
							BOOK NOW
						</a>
					</div>
				</div>

				<div class="col-md-4 centered">
					<div class="foo-cont">
						<div class="title">
							Contact Us
						</div>
						<div class="detail">
							Email: enquries@dbento.com<br>
							Phone: 04 987654321
						</div>
						<a class="btn mb-0" href="#">SEND MESSAGE</a>
					</div>
				</div>

			</div>
	 </div>
	</footer>
	<div class="subfooter">
		<span>Copyright©2021 D'bento All Rights Reserved.</span>
	</div>
	<!-- footer end -->

	<!-- ScrolltoTop -->
	<div id="totop" class="init">
		<i class="fa fa-chevron-up"></i>
	</div>


		<a id="toTop" class="back-to-top" href="#" title="{{ __( 'Back to top' ) }}">
			<div class="top-icon"></div>
		</a>

		<!-- Scripts -->
		<script src="{{ asset('vendor/shop/themes/default/app.js?v=' . config( 'shop.version', 1 ) ) }}"></script>
		<script src="{{ asset('vendor/shop/themes/default/aimeos.js?v=' . config( 'shop.version', 1 ) ) }}"></script>


		<script src="<?= asset('dbento') ?>/js/pluginson3step.js"></script>
		<script src="<?= asset('dbento') ?>/js/bootstrap.min.js"></script>
		<!-- slider revolution  -->
		<script src="<?= asset('dbento') ?>/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script src="<?= asset('dbento') ?>/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		<!-- velocity  -->
		<script  src="<?= asset('dbento') ?>/js/velocity.min.js"></script>
		<!-- velocity  -->
		<script  src="<?= asset('dbento') ?>/js/lightgallery.js"></script>
		<!-- main js -->
		<script  src="<?= asset('dbento') ?>/js/sticky.js"></script>
		<script src="<?= asset('dbento') ?>/js/on3step.js"></script>
		<script src="<?= asset('dbento') ?>/js/plugin-form.js"></script>

		<!-- JS FILES // These should be loaded in every page -->
		<script type="text/javascript" src="<?= asset('Kallyas') ?>/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?= asset('Kallyas') ?>/js/kl-plugins.js"></script>

		<!-- JS FILES // Loaded on this page -->
		<!-- Requried js script for Slideshow Scroll effect (uncomment bellow script to activate) -->
		<!-- <script type="text/javascript" src="<= asset('Kallyas') ?>/js/plugins/scrollme/jquery.scrollme.js"></script> -->

		<!-- Required js script for iOS Slider -->
		<script type="text/javascript" src="<?= asset('Kallyas') ?>/js/plugins/_sliders/ios/jquery.iosslider.min.js"></script>

		<!-- Required js trigger for iOS Slider -->
		<script type="text/javascript" src="<?= asset('Kallyas') ?>/js/trigger/slider/ios/kl-ios-slider.js"></script>

		<!-- Slick required js script for Partners Carousel& Screenshot Box Carousel elements -->
		<script type="text/javascript" src="<?= asset('Kallyas') ?>/js/plugins/_sliders/slick/slick.js"></script>

		<!-- Required js trigger for Partners Carousel & Screenshot Box Carousel elements -->
		<script type="text/javascript" src="<?= asset('Kallyas') ?>/js/trigger/kl-slick-slider.js"></script>

		<!-- Custom Kallyas JS codes -->
		<script type="text/javascript" src="<?= asset('Kallyas') ?>/js/kl-scripts.js"></script>

		<!-- Custom user JS codes -->
		<script type="text/javascript" src="<?= asset('Kallyas') ?>/js/kl-custom.js"></script>


				<script
						type="text/javascript"
						src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js">
				</script>

		<script type="text/javascript" src="<?= asset('mdb') ?>/js/mdb.min.js"></script>

		<script type="text/javascript" src="<?= asset('mdb') ?>/plugins/js/all.min.js"></script>

		<script type="text/javascript" src="<?= asset('mdb') ?>/js/mdb.min.js.map"></script>


		@yield('aimeos_scripts')
	</body>
</html>
