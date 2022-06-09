<!DOCTYPE html>
<html class="no-js" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e(in_array(app()->getLocale(), ['ar', 'az', 'dv', 'fa', 'he', 'ku', 'ur']) ? 'rtl' : 'ltr'); ?>">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Security-Policy" content="base-uri 'self'; default-src 'self' 'nonce-<?php echo e(app( 'aimeos.context' )->get()->nonce()); ?>'; style-src 'unsafe-inline' 'self'; img-src 'self' data: https://aimeos.org; frame-src https://www.youtube.com https://player.vimeo.com">
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

		<?php if( in_array(app()->getLocale(), ['ar', 'az', 'dv', 'fa', 'he', 'ku', 'ur']) ): ?>
			<!-- <link type="text/css" rel="stylesheet" href="<?php echo e(asset('vendor/shop/themes/default/app.rtl.css?v=' . config( 'shop.version', 1 ) )); ?>"> -->
		<?php else: ?>
			<!-- <link type="text/css" rel="stylesheet" href="<?php echo e(asset('vendor/shop/themes/default/app.css?v=' . config( 'shop.version', 1 ) )); ?>"> -->
		<?php endif; ?>
		<!-- <link type="text/css" rel="stylesheet" href="<?php echo e(asset('vendor/shop/themes/default/aimeos.css?v=' . config( 'shop.version', 1 ) )); ?>" /> -->

		<?php echo $__env->yieldContent('aimeos_header'); ?>

		<link rel="icon" href="<?php echo e(asset( 'aimeos/' . ( app( 'aimeos.context' )->get()->locale()->getSiteItem()->getIcon() ?: '../vendor/shop/themes/default/assets/icon.png' ) )); ?>"/>

		<link rel="preload" href="/vendor/shop/themes/default/assets/roboto-condensed-v19-latin-regular.woff2" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="/vendor/shop/themes/default/assets/roboto-condensed-v19-latin-700.woff2" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="/vendor/shop/themes/default/assets/bootstrap-icons.woff2" as="font" type="font/woff2" crossorigin>

		<link rel="preload" href="<?php echo e(asset('vendor/shop/themes/default/assets/roboto-condensed-v19-latin-regular.woff2')); ?>" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="<?php echo e(asset('vendor/shop/themes/default/assets/roboto-condensed-v19-latin-700.woff2')); ?>" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="<?php echo e(asset('vendor/shop/themes/default/assets/bootstrap-icons.woff2')); ?>" as="font" type="font/woff2" crossorigin>

		<link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- animsition -->
    <link href="css/animsition.min.css" rel="stylesheet">
    <!-- lightgallery -->
    <link href="css/css/lightgallery.css" rel="stylesheet">
    <!-- font themify CSS -->
    <link href="css/themify-icons.css" rel="stylesheet" >
    <!-- font awesome CSS -->
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- revolution slider css -->
    <link rel="stylesheet" type="text/css" href="rs-plugin/css/fullscreen.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />
    <link rel="stylesheet" href="css/rev-settings.css" type="text/css">
    <!-- owl -->
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
    <!-- main css -->
    <link href="css/animated-on3step.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/queriesstyle.css" media="all" rel="stylesheet">

	</head>
	<body class="<?php echo e($page ?? ''); ?> bg-init">


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

			<div class="collapse navbar-collapse" id="navbar-top">
				<?php echo $__env->yieldContent('aimeos_head_nav'); ?>
			</div>


			<?php echo $__env->yieldContent('aimeos_head_locale'); ?>
			<?php echo $__env->yieldContent('aimeos_head_search'); ?>


			<!-- nav -->
		</header><!-- header end -->


		<div>
			<?php echo $__env->yieldContent('aimeos_stage'); ?>
			<?php echo $__env->yieldContent('aimeos_body'); ?>
			<?php echo $__env->yieldContent('content'); ?>
		</div>

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

		</div>
		<!-- container-wrapper end -->

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
		            <a class="w-gallery" href="img/gallery/1.jpg">
		                <img src="img/gallery/1.jpg" alt="" class="w-gallery-image">
		                </a>

		            <a class="w-gallery" href="img/gallery/2.jpg">
		                <img src="img/gallery/2.jpg" alt="" class="w-gallery-image">
		                </a>

		            <a class="w-gallery" href="img/gallery/3.jpg">
		                <img src="img/gallery/3.jpg" alt="" class="w-gallery-image">
		                </a>

		            <a class="w-gallery" href="img/gallery/4.jpg">
		                <img src="img/gallery/4.jpg" alt="" class="w-gallery-image">
		                </a>

		            <a class="w-gallery" href="img/gallery/5.jpg">
		                <img src="img/gallery/5.jpg" alt="" class="w-gallery-image">
		                </a>

		            <a class="w-gallery" href="img/gallery/6.jpg">
		                <img src="img/gallery/6.jpg" alt="" class="w-gallery-image">
		                </a>

		            <a class="w-gallery" href="img/gallery/7.jpg">
		                <img src="img/gallery/7.jpg" alt="" class="w-gallery-image">
		                </a>

		            <a class="w-gallery" href="img/gallery/8.jpg">
		                <img src="img/gallery/8.jpg" alt="" class="w-gallery-image">
		                </a>

		            <a class="w-gallery" href="img/gallery/9.jpg">
		                <img src="img/gallery/9.jpg" alt="" class="w-gallery-image">
		                </a>
		          </div>
		        </div>
		        <h3>Share us: </h3>
		        <div class="s-social">
		          <a href="#"><span class="ti-twitter"></span></a>
		          <a href="#"><span class="ti-facebook"></span></a>
		          <a href="#"><span class="ti-youtube"></span></a>
		          <a href="#"><span class="ti-instagram"></span></a>
		        </div>

		      </div>
		    </div>
		    <!-- sidegalery end -->

		    <!-- modal reservation -->
		    <div class="modal fade" id="resevmodal" tabindex="-1" role="dialog" aria-hidden="true">
		      <div class="modal-dialog custommodal" role="document">
		        <div class="modal-content">
		          <div class="modal-header">
		            <div class="heading">
		              Online Reservation
		            </div>
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		          </div>
		          <div class="modal-body">
		            <form class="modalform">
		               <div class="form-row">
		                <div class="col">
		                  <input id="wa_name" type="text" required="" class="form-control" placeholder="Name">
		                </div>
		                <div class="col">
		                  <input id="wa_phone" type="text" required="" class="form-control" placeholder="Phone">
		                </div>
		                <div class="col">
		                  <input id="wa_email" type="text" required="" class="form-control" placeholder="Email">
		                </div>
		              </div>
		              <div class="form-row">
		                <div class="col">
		                  <input id="wa_guest" type="text" required="" class="form-control" placeholder="Number of Guest">
		                </div>
		                <div class="col">
		                  <input id="wa_date" type="text" required="" class="form-control" placeholder="09/02/2021">
		                </div>
		                <div class="col">
		                  <input id="wa_time" type="text" class="form-control" placeholder="Time">
		                </div>
		              </div>
		              <div class="form-group">
		                <textarea rows="10" cols="50" required="" class="form-control" id="message-text" placeholder="Your Message"></textarea>
		                <a id="sendreservation" class="btn-content" href="#">
		                  <span class="shine"></span>
		                  SEND NOW
		                </a>
		              </div>
		              <div id="text-info"></div>
		            </form>
		          </div>
		        </div>
		      </div>
		    </div>
		    <!-- modal reservation -->

		    <!-- ScrolltoTop -->
		    <div id="totop" class="init">
		      <i class="fa fa-chevron-up"></i>
		    </div>


		<a id="toTop" class="back-to-top" href="#" title="<?php echo e(__( 'Back to top' )); ?>">
			<div class="top-icon"></div>
		</a>

		<!-- Scripts -->
		<script src="<?php echo e(asset('vendor/shop/themes/default/app.js?v=' . config( 'shop.version', 1 ) )); ?>"></script>
		<script src="<?php echo e(asset('vendor/shop/themes/default/aimeos.js?v=' . config( 'shop.version', 1 ) )); ?>"></script>

		<script src="<?php echo e(asset('vendor/shop/themes/default/app.js?v=' . config( 'shop.version', 1 ) )); ?>"></script>
		<script src="<?php echo e(asset('vendor/shop/themes/default/aimeos.js?v=' . config( 'shop.version', 1 ) )); ?>"></script>

		<script src="js/pluginson3step.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<!-- slider revolution  -->
		<script src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		<!-- velocity  -->
		<script  src="js/velocity.min.js"></script>
		<!-- velocity  -->
		<script  src="js/lightgallery.js"></script>
		<!-- main js -->
		<script  src="js/sticky.js"></script>
		<script src="js/on3step.js"></script>
		<script src="js/plugin-form.js"></script>

		<?php echo $__env->yieldContent('aimeos_scripts'); ?>
	</div>
	</body>
</html>
<?php /**PATH C:\Users\boukl\github\maisonfraiche.com\htdocs\resources\views/vendor/shop/base.blade.php ENDPATH**/ ?>