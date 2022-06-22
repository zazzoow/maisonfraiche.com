<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ in_array(app()->getLocale(), ['ar', 'az', 'dv', 'fa', 'he', 'ku', 'ur']) ? 'rtl' : 'ltr' }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- <meta http-equiv="Content-Security-Policy" content="base-uri 'self'; default-src 'self' 'nonce-{{ app( 'aimeos.context' )->get()->nonce() }}'; style-src 'unsafe-inline' 'self'; img-src 'self' data: https://aimeos.org; frame-src https://www.youtube.com https://player.vimeo.com"> -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />

		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
		<!-- Google Fonts Roboto -->
		<link
			rel="stylesheet"
			href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
		/>
		<!-- MDB ESSENTIAL -->
		<link rel="stylesheet" href="<?= asset('mdb') ?>/css/mdb.min.css" />
		<!-- MDB PLUGINS -->
		<link rel="stylesheet" href="<?= asset('mdb') ?>/plugins/css/all.min.css" />

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBjkje2b_6MeLNY6TYgEzuWUmzDKvmIeE&callback=initMap" async defer></script>

		<link rel="icon" href="{{ asset( 'aimeos/' . ( app( 'aimeos.context' )->get()->locale()->getSiteItem()->getIcon() ?: '../vendor/shop/themes/default/assets/icon.png' ) ) }}"/>

		<link rel="preload" href="/vendor/shop/themes/default/assets/roboto-condensed-v19-latin-regular.woff2" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="/vendor/shop/themes/default/assets/roboto-condensed-v19-latin-700.woff2" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="/vendor/shop/themes/default/assets/bootstrap-icons.woff2" as="font" type="font/woff2" crossorigin>


		<meta name="format-detection" content="telephone=no" />
        <link rel="shortcut icon" href="favicon.ico"/>
      <title>Delice</title>
      <style id="dynamic-css"></style>
      <style type="text/css">
      .preloader {position: fixed;left: 0;top: 0;width: 100%;height: 100%;background: #fff;text-align: center;z-index: 6001; }
      .preloader:after { content: ""; height: 100%; display: inline-block; vertical-align: middle; }
      .sk-cube-grid {width: 3.857rem;height: 3.857rem;margin: 0 auto;vertical-align: middle;display: inline-block; }
      .sk-cube-grid .sk-cube {width: 33%;height: 33%;background-color: #333;float: left;-webkit-animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out;animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out; }
      .sk-cube-grid .sk-cube1 {
        -webkit-animation-delay: 0.2s;
        animation-delay: 0.2s; }
      .sk-cube-grid .sk-cube2 {
        -webkit-animation-delay: 0.3s;
        animation-delay: 0.3s; }
      .sk-cube-grid .sk-cube3 {
        -webkit-animation-delay: 0.4s;
        animation-delay: 0.4s; }
      .sk-cube-grid .sk-cube4 {
        -webkit-animation-delay: 0.1s;
        animation-delay: 0.1s; }
      .sk-cube-grid .sk-cube5 {
        -webkit-animation-delay: 0.2s;
        animation-delay: 0.2s; }
      .sk-cube-grid .sk-cube6 {
        -webkit-animation-delay: 0.3s;
        animation-delay: 0.3s; }
      .sk-cube-grid .sk-cube7 {
        -webkit-animation-delay: 0s;
        animation-delay: 0s; }
      .sk-cube-grid .sk-cube8 {
        -webkit-animation-delay: 0.1s;
        animation-delay: 0.1s; }
      .sk-cube-grid .sk-cube9 {
        -webkit-animation-delay: 0.2s;
        animation-delay: 0.2s; }
      @-webkit-keyframes sk-cubeGridScaleDelay {
        0%, 70%, 100% {
          -webkit-transform: scale3D(1, 1, 1);
          transform: scale3D(1, 1, 1); }
        35% {
          -webkit-transform: scale3D(0, 0, 1);
          transform: scale3D(0, 0, 1); } }
      @keyframes sk-cubeGridScaleDelay {
        0%, 70%, 100% {
          -webkit-transform: scale3D(1, 1, 1);
          transform: scale3D(1, 1, 1); }
        35% {
          -webkit-transform: scale3D(0, 0, 1);
          transform: scale3D(0, 0, 1); } }
    </style>
	</head>
	<body class="page-color-style-1 page-style-1">
		<div class="preloader">
     <div class="sk-cube-grid selected">
      <div class="sk-cube sk-cube1"></div>
      <div class="sk-cube sk-cube2"></div>
      <div class="sk-cube sk-cube3"></div>
      <div class="sk-cube sk-cube4"></div>
      <div class="sk-cube sk-cube5"></div>
      <div class="sk-cube sk-cube6"></div>
      <div class="sk-cube sk-cube7"></div>
      <div class="sk-cube sk-cube8"></div>
      <div class="sk-cube sk-cube9"></div>
    </div>
   </div>


	    <header class="header header-style-1">
	      <div class="navigation flex-align">
	         <a href="{{ airoute('aimeos_home') }}" class="logo">
						 <img src="{{ asset( 'aimeos/' . ( app( 'aimeos.context' )->get()->locale()->getSiteItem()->getLogo() ?: '../vendor/shop/themes/default/assets/logo.png' ) ) }}" height="40" title="Logo">
					 </a>
	          <div class="burger-menu"><i></i></div>
	           <div class="nav">
	            <div class="nav-align-wrap">
								  <div class="right-block">
				                @yield('aimeos_head_nav')
												@yield('aimeos_head_search')
									 </div>
	            </div>
	           </div>
						 <div class="collapse navbar-collapse" id="navbarNav">
	           </div>
					<div>
					@if (Auth::guest() && config('app.shop_registration'))
								<div class="login-item">
												<a href="{{ airoute( 'login' ) }}" title="{{ __( 'Login' ) }}" class="open-popup" data-open="popup-login" data-rel="3">{{ __( 'Login' ) }}</a>
												 / <a href="{{ airoute( 'register' ) }}" title="{{ __( 'Register' ) }}" class="open-popup" data-open="popup-register" data-rel="">{{ __('Register') }}/a>
								</div>
								@endif
								@if (Auth::guest())
								<div class="login-item">
			                <a href="#" class="open-popup" data-open="popup-login" data-rel="3">
												<div class="page-button button-style-1 type-2">
			                  <span class="txt">{{ __( 'Se Connecter' ) }}</span><i></i>
			                </div>
											</a>
			          </div>
								@else
								<div class="login-item">
									<div class="page-button button-style-1 type-2">
			               	<a class="txt" href="{{ airoute( 'aimeos_shop_account' ) }}" data-rel="3">{{ __( 'Profile' ) }}</a>
								  </div>
								</div>
								<form class="login-item" id="logout" action="{{ airoute( 'logout' ) }}" method="POST">
									{{ csrf_field() }}
									<div class="page-button button-style-1 type-2">
										<input type="submit">
											  <span class="txt">{{ __( 'Se Deconnecter' ) }}</span><i></i>
									</div>
					      </form>
					 @endif

				 </div>

	    </header>

		<div class="content">
			@yield('aimeos_stage')
			@yield('aimeos_body')
			@yield('content')
		</div>


		<footer class="footer footer-style-1">
	 <div class="empty-sm-60 empty-xs-40"></div>
		 <div class="container">
				 <div class="row">
						 <div class="col-md-6 col-sm-6 col-sm-12">
								 <div class="footer-item">
									   <img src="{{ asset( 'aimeos/' . ( app( 'aimeos.context' )->get()->locale()->getSiteItem()->getLogo() ?: '../vendor/shop/themes/default/assets/logo.png' ) ) }}" height="40" title="Logo">
										 <div class="empty-sm-15 empty-xs-15"></div>
										 <div class="simple-text">
												 <p>
                            Installée à Gémenos dans les Bouches-du-Rhône, notre entreprise familiale prépare et distribue des produits frais autour de la pomme de terre, de la pâtisserie et de la boulangerie, pour les professionnels des métiers de bouche.
												 </p>
 										 </div>
										 <div class="empty-sm-20 empty-xs-20"></div>
										 <div class="follow follow-style-2 sm">
													<a href="#">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  x="0px" y="0px" viewBox="0 0 155.139 155.139" style="enable-background:new 0 0 155.139 155.139;" xml:space="preserve" width="16px" height="16px"><g>
																	<path d="M89.584,155.139V84.378h23.742l3.562-27.585H89.584V39.184   c0-7.984,2.208-13.425,13.67-13.425l14.595-0.006V1.08C115.325,0.752,106.661,0,96.577,0C75.52,0,61.104,12.853,61.104,36.452   v20.341H37.29v27.585h23.814v70.761H89.584z" fill="#FFFFFF"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
															</svg>
													</a>
													<a href="#">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 310 310" style="enable-background:new 0 0 310 310;" xml:space="preserve" width="16px" height="16px">
															<g>
																	<path d="M302.973,57.388c-4.87,2.16-9.877,3.983-14.993,5.463c6.057-6.85,10.675-14.91,13.494-23.73   c0.632-1.977-0.023-4.141-1.648-5.434c-1.623-1.294-3.878-1.449-5.665-0.39c-10.865,6.444-22.587,11.075-34.878,13.783   c-12.381-12.098-29.197-18.983-46.581-18.983c-36.695,0-66.549,29.853-66.549,66.547c0,2.89,0.183,5.764,0.545,8.598   C101.163,99.244,58.83,76.863,29.76,41.204c-1.036-1.271-2.632-1.956-4.266-1.825c-1.635,0.128-3.104,1.05-3.93,2.467   c-5.896,10.117-9.013,21.688-9.013,33.461c0,16.035,5.725,31.249,15.838,43.137c-3.075-1.065-6.059-2.396-8.907-3.977   c-1.529-0.851-3.395-0.838-4.914,0.033c-1.52,0.871-2.473,2.473-2.513,4.224c-0.007,0.295-0.007,0.59-0.007,0.889   c0,23.935,12.882,45.484,32.577,57.229c-1.692-0.169-3.383-0.414-5.063-0.735c-1.732-0.331-3.513,0.276-4.681,1.597   c-1.17,1.32-1.557,3.16-1.018,4.84c7.29,22.76,26.059,39.501,48.749,44.605c-18.819,11.787-40.34,17.961-62.932,17.961   c-4.714,0-9.455-0.277-14.095-0.826c-2.305-0.274-4.509,1.087-5.294,3.279c-0.785,2.193,0.047,4.638,2.008,5.895   c29.023,18.609,62.582,28.445,97.047,28.445c67.754,0,110.139-31.95,133.764-58.753c29.46-33.421,46.356-77.658,46.356-121.367   c0-1.826-0.028-3.67-0.084-5.508c11.623-8.757,21.63-19.355,29.773-31.536c1.237-1.85,1.103-4.295-0.33-5.998   C307.394,57.037,305.009,56.486,302.973,57.388z" fill="#FFFFFF"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
													</a>
													<a href="#">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  x="0px" y="0px" width="16px" height="16px" viewBox="0 0 604.35 604.35" style="enable-background:new 0 0 604.35 604.35;" xml:space="preserve">
																	<g><g><path d="M516.375,255v-76.5h-51V255h-76.5v51h76.5v76.5h51V306h76.5v-51H516.375z M320.025,341.7l-28.051-20.4    c-10.2-7.649-20.399-17.85-20.399-35.7s12.75-33.15,25.5-40.8c33.15-25.5,66.3-53.55,66.3-109.65c0-53.55-33.15-84.15-51-99.45    h43.35l30.6-35.7h-158.1c-112.2,0-168.3,71.4-168.3,147.9c0,58.65,45.9,122.4,127.5,122.4h20.4c-2.55,7.65-10.2,20.4-10.2,33.15    c0,25.5,10.2,35.7,22.95,51c-35.7,2.55-102,10.2-150.45,40.8c-45.9,28.05-58.65,66.3-58.65,94.35    c0,58.65,53.55,114.75,168.3,114.75c137.7,0,204.001-76.5,204.001-150.449C383.775,400.35,355.725,372.3,320.025,341.7z     M126.225,109.65c0-56.1,33.15-81.6,68.85-81.6c66.3,0,102,89.25,102,140.25c0,66.3-53.55,79.05-73.95,79.05    C159.375,247.35,126.225,168.3,126.225,109.65z M218.024,568.65c-84.15,0-137.7-38.25-137.7-94.351c0-56.1,51-73.95,66.3-81.6    c33.15-10.2,76.5-12.75,84.15-12.75s12.75,0,17.85,0c61.2,43.35,86.7,61.2,86.7,102C335.324,530.4,286.875,568.65,218.024,568.65z    " fill="#FFFFFF"/>
																	</g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
															</svg>
													</a>
										</div>
								 </div>
									<div class="empty-sm-30 empty-xs-30"></div>
						 </div>

						 <div class="clearfix hidden-xs visible-sm hidden-md hidden-lg"></div>
						 <div class="col-md-3 col-sm-6 col-sm-12">
							 <div class="footer-item">
								 <h5 class="h5">Contacter Nous</h5>
								 <div class="empty-sm-15 empty-xs-15"></div>
								 <ul class="list-style-2 ul-list">
										 <li>4 Av. du Chemin de Jouques, 13420 Gémenos</li>
										 <li><a href="tel:" class="link-hover">04.42.84.37.25</a></li>
										 <li><a href="mailto:" class="link-hover">contact@maison-fraiche.fr</a></li>
								 </ul>
							</div>
							 <div class="empty-sm-30 empty-xs-30"></div>
						 </div>


				 </div>
		 </div>

 </footer>

 <!-- POPUP LOGIN -->
    <div class="popup index-popup-login" data-rel="3">
      <div class="popup-wrap popup-layer">
        <div class="empty-sm-0 empty-xs-15"></div>
        <div class="container size-1">
          <div class="popup-inner">
            <div class="close-popup type-2">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 21.9 21.9" enable-background="new 0 0 21.9 21.9" width="14px" height="14px">
            <path d="M14.1,11.3c-0.2-0.2-0.2-0.5,0-0.7l7.5-7.5c0.2-0.2,0.3-0.5,0.3-0.7s-0.1-0.5-0.3-0.7l-1.4-1.4C20,0.1,19.7,0,19.5,0  c-0.3,0-0.5,0.1-0.7,0.3l-7.5,7.5c-0.2,0.2-0.5,0.2-0.7,0L3.1,0.3C2.9,0.1,2.6,0,2.4,0S1.9,0.1,1.7,0.3L0.3,1.7C0.1,1.9,0,2.2,0,2.4  s0.1,0.5,0.3,0.7l7.5,7.5c0.2,0.2,0.2,0.5,0,0.7l-7.5,7.5C0.1,19,0,19.3,0,19.5s0.1,0.5,0.3,0.7l1.4,1.4c0.2,0.2,0.5,0.3,0.7,0.3  s0.5-0.1,0.7-0.3l7.5-7.5c0.2-0.2,0.5-0.2,0.7,0l7.5,7.5c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3l1.4-1.4c0.2-0.2,0.3-0.5,0.3-0.7  s-0.1-0.5-0.3-0.7L14.1,11.3z" fill="#484848"/>
            </svg>
            </div>
            <div class="main-caption text-center color-type-2">
              <h2 class="h2 tt">{{ __('Log in') }}</h2>
            </div>
            <div class="empty-sm-30 empty-xs-30"></div>
            <form method="post" action="{{ route('login') }}">
							@csrf
              <div class="input-field-wrap">
                <input type="email" id="email" class="input-field" :value="old('email')" placeholder="Your email" name="email" required="">
                <div class="focus"></div>
              </div>
              <div class="empty-sm-15 empty-xs-15"></div>
              <div class="input-field-wrap">
                <input type="password" id="password" class="input-field" placeholder="Enter password" name="password" required="">
                <div class="focus"></div>
              </div>
              <div class="empty-sm-20 empty-xs-20"></div>
							<!-- @if (Route::has('password.request'))
              <div class="simple-text xs forgot fl color-3">
                <a href="#"><p>{{ __('Forgot your password?') }}</p></a>
              </div>
							@endif
              <div class="simple-text xs reg-now fr">
                <a href="#"><p>Register now</p></a>
              </div> -->
              <div class="empty-sm-30 empty-xs-20"></div>
              <div class="text-center">
                <div class="page-button button-style-1 type-2">
                  <input type="submit">
                  <span class="txt">{{ __('Log in') }}</span><i></i>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

   <!-- POPUP REGISTER -->
    <div class="popup index-popup-register" data-rel="4">
      <div class="popup-wrap popup-layer">
        <div class="empty-sm-0 empty-xs-15"></div>
        <div class="container size-1">
          <div class="popup-inner">
            <div class="close-popup type-2">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 21.9 21.9" enable-background="new 0 0 21.9 21.9" width="14px" height="14px">
            <path d="M14.1,11.3c-0.2-0.2-0.2-0.5,0-0.7l7.5-7.5c0.2-0.2,0.3-0.5,0.3-0.7s-0.1-0.5-0.3-0.7l-1.4-1.4C20,0.1,19.7,0,19.5,0  c-0.3,0-0.5,0.1-0.7,0.3l-7.5,7.5c-0.2,0.2-0.5,0.2-0.7,0L3.1,0.3C2.9,0.1,2.6,0,2.4,0S1.9,0.1,1.7,0.3L0.3,1.7C0.1,1.9,0,2.2,0,2.4  s0.1,0.5,0.3,0.7l7.5,7.5c0.2,0.2,0.2,0.5,0,0.7l-7.5,7.5C0.1,19,0,19.3,0,19.5s0.1,0.5,0.3,0.7l1.4,1.4c0.2,0.2,0.5,0.3,0.7,0.3  s0.5-0.1,0.7-0.3l7.5-7.5c0.2-0.2,0.5-0.2,0.7,0l7.5,7.5c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3l1.4-1.4c0.2-0.2,0.3-0.5,0.3-0.7  s-0.1-0.5-0.3-0.7L14.1,11.3z" fill="#484848"/>
            </svg>
            </div>
            <div class="main-caption text-center color-type-2">
              <h2 class="h2 tt">register</h2>
            </div>
            <div class="empty-sm-30 empty-xs-30"></div>
            <form action="#">
              <div class="input-field-wrap">
                <input type="text" class="input-field" placeholder="Your name" name="name" required="">
                <div class="focus"></div>
              </div>
              <div class="empty-sm-15 empty-xs-15"></div>
              <div class="input-field-wrap">
                <input type="email" class="input-field" placeholder="Your email" name="email" required="">
                <div class="focus"></div>
              </div>
              <div class="empty-sm-15 empty-xs-15"></div>
              <div class="input-field-wrap">
                <input type="password" class="input-field" placeholder="Enter password" name="password" required="">
                <div class="focus"></div>
              </div>
              <div class="empty-sm-15 empty-xs-15"></div>
              <div class="input-field-wrap">
                <input type="password" class="input-field" placeholder="Repeat password" name="rep_password" required="">
                <div class="focus"></div>
              </div>
              <div class="empty-sm-20 empty-xs-20"></div>
              <div class="checkbox-entry-wrap">
                  <label class="checkbox-entry color-2">
                    <input type="checkbox">
                    <span>
                      <i></i>
                      <p>Privacy police agreement</p>
                    </span>
                </label>
              </div>
              <div class="empty-sm-30 empty-xs-20"></div>
              <div class="text-center">
                <div class="page-button button-style-1 type-2">
                  <input type="submit">
                  <span class="txt">register</span><i></i>
                </div>
              </div>
            </form>
            <div class="empty-sm-30 empty-xs-30"></div>
            <div class="text-center sign-as">
              <div class="simple-text color-3">
                <p>Sign in us</p>
              </div>
            </div>
            <div class="empty-sm-30 empty-xs-30"></div>
            <div class="popup-follow">
              <a href="#" class="page-button button-style-1 type-4 face"><span class="txt">facebook</span><span class="f-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  x="0px" y="0px" viewBox="0 0 155.139 155.139" style="enable-background:new 0 0 155.139 155.139;" xml:space="preserve" width="14px" height="14px"><g>
                <path id="f_1_" d="M89.584,155.139V84.378h23.742l3.562-27.585H89.584V39.184   c0-7.984,2.208-13.425,13.67-13.425l14.595-0.006V1.08C115.325,0.752,106.661,0,96.577,0C75.52,0,61.104,12.853,61.104,36.452   v20.341H37.29v27.585h23.814v70.761H89.584z" fill="#FFFFFF"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg></span>
              </a>
              <a href="#" class="page-button button-style-1 type-4 twit"><span class="txt">twitter</span><span class="f-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 310 310" style="enable-background:new 0 0 310 310;" xml:space="preserve" width="14px" height="14px"><g id="XMLID_826_">
                <path id="XMLID_827_" d="M302.973,57.388c-4.87,2.16-9.877,3.983-14.993,5.463c6.057-6.85,10.675-14.91,13.494-23.73   c0.632-1.977-0.023-4.141-1.648-5.434c-1.623-1.294-3.878-1.449-5.665-0.39c-10.865,6.444-22.587,11.075-34.878,13.783   c-12.381-12.098-29.197-18.983-46.581-18.983c-36.695,0-66.549,29.853-66.549,66.547c0,2.89,0.183,5.764,0.545,8.598   C101.163,99.244,58.83,76.863,29.76,41.204c-1.036-1.271-2.632-1.956-4.266-1.825c-1.635,0.128-3.104,1.05-3.93,2.467   c-5.896,10.117-9.013,21.688-9.013,33.461c0,16.035,5.725,31.249,15.838,43.137c-3.075-1.065-6.059-2.396-8.907-3.977   c-1.529-0.851-3.395-0.838-4.914,0.033c-1.52,0.871-2.473,2.473-2.513,4.224c-0.007,0.295-0.007,0.59-0.007,0.889   c0,23.935,12.882,45.484,32.577,57.229c-1.692-0.169-3.383-0.414-5.063-0.735c-1.732-0.331-3.513,0.276-4.681,1.597   c-1.17,1.32-1.557,3.16-1.018,4.84c7.29,22.76,26.059,39.501,48.749,44.605c-18.819,11.787-40.34,17.961-62.932,17.961   c-4.714,0-9.455-0.277-14.095-0.826c-2.305-0.274-4.509,1.087-5.294,3.279c-0.785,2.193,0.047,4.638,2.008,5.895   c29.023,18.609,62.582,28.445,97.047,28.445c67.754,0,110.139-31.95,133.764-58.753c29.46-33.421,46.356-77.658,46.356-121.367   c0-1.826-0.028-3.67-0.084-5.508c11.623-8.757,21.63-19.355,29.773-31.536c1.237-1.85,1.103-4.295-0.33-5.998   C307.394,57.037,305.009,56.486,302.973,57.388z" fill="#FFFFFF"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg></span>
              </a>
              <a href="#" class="page-button button-style-1 type-4 google"><span class="txt">google</span><span class="f-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  x="0px" y="0px" width="14px" height="14px" viewBox="0 0 604.35 604.35" style="enable-background:new 0 0 604.35 604.35;" xml:space="preserve">
                <g><g id="google-plus"><path d="M516.375,255v-76.5h-51V255h-76.5v51h76.5v76.5h51V306h76.5v-51H516.375z M320.025,341.7l-28.051-20.4    c-10.2-7.649-20.399-17.85-20.399-35.7s12.75-33.15,25.5-40.8c33.15-25.5,66.3-53.55,66.3-109.65c0-53.55-33.15-84.15-51-99.45    h43.35l30.6-35.7h-158.1c-112.2,0-168.3,71.4-168.3,147.9c0,58.65,45.9,122.4,127.5,122.4h20.4c-2.55,7.65-10.2,20.4-10.2,33.15    c0,25.5,10.2,35.7,22.95,51c-35.7,2.55-102,10.2-150.45,40.8c-45.9,28.05-58.65,66.3-58.65,94.35    c0,58.65,53.55,114.75,168.3,114.75c137.7,0,204.001-76.5,204.001-150.449C383.775,400.35,355.725,372.3,320.025,341.7z     M126.225,109.65c0-56.1,33.15-81.6,68.85-81.6c66.3,0,102,89.25,102,140.25c0,66.3-53.55,79.05-73.95,79.05    C159.375,247.35,126.225,168.3,126.225,109.65z M218.024,568.65c-84.15,0-137.7-38.25-137.7-94.351c0-56.1,51-73.95,66.3-81.6    c33.15-10.2,76.5-12.75,84.15-12.75s12.75,0,17.85,0c61.2,43.35,86.7,61.2,86.7,102C335.324,530.4,286.875,568.65,218.024,568.65z    " fill="#FFFFFF"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg></span>
              </a>
            </div>
            </div>
          </div>
        </div>
      </div>



		<a id="toTop" class="back-to-top" href="#" title="{{ __( 'Back to top' ) }}">
			<div class="top-icon"></div>
		</a>

		<!-- Scripts -->
		<script src="{{ asset('vendor/shop/themes/default/app.js?v=' . config( 'shop.version', 1 ) ) }}"></script>
		<script src="{{ asset('vendor/shop/themes/default/aimeos.js?v=' . config( 'shop.version', 1 ) ) }}"></script>
		@yield('aimeos_scripts')

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
		<link href="<?= asset('delice') ?>/css/style.css" rel="stylesheet" type="text/css"/>

		<script>
		  function subscribeForm() {
		    $.ajax({
		      type: 'POST', url: 'subscribeForm.php', data: $('#subscribe-form').serialize(), success: function (response) {
		        $('.submit').html('send');
		        $('#subscribe-form')[0].reset();
		      }
		    });
		    return false;
		  }

			$(function() {
					$('#basicExampleModal').modal('show');
			});

		</script>


    <script async type="text/javascript">

					// GOOGLE MAP PART START

					const myLatlng = {lat: 43.28693771362305, "lng": 5.622753143310547 };

					const map = new google.maps.Map(document.getElementById("map"), {
			      zoom: 17,
			      center: myLatlng,
			    });

			    const marker = new google.maps.Marker({
			      position: myLatlng,
			      map: map,
			    });

			    infoWindow.open(map);
			    // Configure the click listener.
			    map.addListener("click", (mapsMouseEvent) => {
			      // Close the current InfoWindow.
			      infoWindow.close();
			      // Create a new InfoWindow.
			      infoWindow = new google.maps.InfoWindow({
			        position: mapsMouseEvent.latLng,
			      });
			      infoWindow.setContent(
			        JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
			      );
			      infoWindow.open(map);
			    });


						window.onload = function(){
								// Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
								initMap();
					  };

  	</script>


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.1/isotope.pkgd.min.js"></script>
		<script src="<?= asset('delice') ?>/js/jquery-ui.min.js"></script>
		<script src="<?= asset('delice') ?>/js/all.js"></script>
		<script src="<?= asset('delice') ?>/js/jscolor.min.js"></script>
		<script src="<?= asset('delice') ?>/js/jquery.knob.js"></script>
		<script src="<?= asset('delice') ?>/js/jquery.throttle.js"></script>
		<script src="<?= asset('delice') ?>/js/jquery.classycountdown.js"></script>
		<script src="<?= asset('delice') ?>/js/jarallax.js"></script>
		<script src="<?= asset('delice') ?>/js/color.picker.js"></script>

		<!-- MDB ESSENTIAL -->
	  <script type="text/javascript" src="<?= asset('mdb') ?>/js/mdb.min.js"></script>
	  <!-- MDB PLUGINS -->
	  <script type="text/javascript" src="<?= asset('mdb') ?>/plugins/js/all.min.js"></script>
	  <!-- Custom scripts -->

	</body>
</html>
