<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Foores - Single Restaurant Version">
    <meta name="author" content="Ansonika">
    <title>VIN Restaurant</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('assets/css/vendors.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="{{ asset('assets/css/wizard.css') }}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

</head>

<body>

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div><!-- /Page Preload -->

	<header class="header clearfix element_to_stick">
		<div class="container-fluid">
		<div id="logo">
			<a href="index.html">
				<img src="{{ asset('assets/img/logo.svg') }}" width="140" height="35" alt="" class="logo_normal">
				<img src="{{ asset('assets/img/logo_sticky.svg') }}" width="140" height="35" alt="" class="logo_sticky">
			</a>
		</div>
		<ul id="top_menu">
			<li><a href="#0" class="search-overlay-menu-btn"></a></li>
			<li>
				<div class="dropdown dropdown-cart">
				    <a href="shop-cart.html" class="cart_bt"><strong>2</strong></a>
				    <div class="dropdown-menu">
				        <ul>
				            <li>
				                <figure><img src="img/item_placeholder_square_small.jpg" data-src="img/item_square_small_1.jpg" alt="" width="50" height="50" class="lazy"></figure>
				                <strong><span>1x Pizza Napoli</span>$12.00</strong>
				                <a href="#0" class="action"><i class="icon_trash_alt"></i></a>
				            </li>
				             <li>
				                <figure><img src="img/item_placeholder_square_small.jpg" data-src="img/item_square_small_2.jpg" alt="" width="50" height="50" class="lazy"></figure>
				                <strong><span>1x Hamburgher Maxi</span>$10.00</strong>
				                <a href="#0" class="action"><i class="icon_trash_alt"></i></a>
				            </li>
				             <li>
				                <figure><img src="img/item_placeholder_square_small.jpg" data-src="img/item_square_small_3.jpg" alt="" width="50" height="50" class="lazy"></figure>
				                <strong><span>1x Red Wine Bottle</span>$20.00</strong>
				                <a href="#0" class="action"><i class="icon_trash_alt"></i></a>
				            </li>
				        </ul>
				        <div class="total_drop">
				            <div class="clearfix add_bottom_15"><strong>Total</strong><span>$32.00</span></div>
				            <a href="shop-cart.html" class="btn_1 outline">View Cart</a><a href="shop-checkout.html" class="btn_1">Checkout</a>
				        </div>
				    </div>
				</div>
				<!-- /dropdown-cart-->
			</li>
		</ul>
		<!-- /top_menu -->
		<a href="#0" class="open_close">
			<i class="icon_menu"></i><span>Menu</span>
		</a>
		<nav class="main-menu">
		    <div id="header_menu">
		        <a href="#0" class="open_close">
		            <i class="icon_close"></i><span>Menu</span>
		        </a>
		        <a href="index.html"><img src="img/logo.svg" width="140" height="35" alt=""></a>
		    </div>
		    <ul>
		        <li class="submenu">
		            <a href="#0" class="show-submenu">Home</a>
		             <ul>
		            	<li><a href="index-7.html">KenBurns Slider <span class="badge text-bg-danger">New</span></a></li>
		                <li><a href="index.html">Slider 1</a></li>
		                <li><a href="index-2.html">Slider 2</a></li>
		                <li><a href="index-6.html">Slider 3</a></li>
		                <li><a href="index-3.html">Video Background</a></li>
		                <li><a href="index-5.html">Text Rotator</a></li>
		                <li><a href="index-4.html">GDPR Cookie Bar EU Law</a></li>
		            </ul>
		        </li>
		        <li class="submenu">
		            <a href="#0" class="show-submenu">Menu</a>
		            <ul>
		                <li><a href="menu-1.html">Menu 2 Column</a></li>
		                <li><a href="menu-2.html">Menu Add To Cart</a></li>
		                <li><a href="menu-3.html">Menu With Tabs</a></li>
		                <li><a href="menu-4.html">Menu Grid</a></li>
		                <li><a href="menu-of-the-day.html">Menu of the Day <span class="badge badge-danger">HOT</span></a></li>
		                <li><a href="order-food.html">Order Food</a></li>
		                <li><a href="confirm.html">Confirm</a></li>
		            </ul>
		        </li>
		        <li class="submenu">
		            <a href="#0" class="show-submenu">Other Pages</a>
		            <ul>
		            	<li><a href="about.html">About</a></li>
		                <li><a href="blog.html">Blog</a></li>
		                <li><a href="gallery.html">Gallery</a></li>
		                <li><a href="gallery-2.html">Gallery Masonry</a></li>
		                <li><a href="modal-advertise.html">Modal Advertise</a></li>
		                <li><a href="modal-newsletter.html">Modal Newsletter</a></li>
		                <li><a href="404.html">404 Error page</a></li>
		                <li><a href="coming-soon.html" target="_blank">Coming Soon</a></li>
		                <li><a href="leave-review.html">Leave a review</a></li>
		                <li><a href="contacts.html">Contacts</a></li>
		                <li><a href="icon-pack-1.html">Icon Pack 1</a></li>
		                <li><a href="icon-pack-2.html">Icon Pack 2</a></li>
		            </ul>
		        </li>
		         <li class="submenu">
		            <a href="#0" class="show-submenu">Shop</a>
		            <ul>
		                <li><a href="shop-1.html">Shop Grid</a></li>
		                <li><a href="shop-2.html">Shop Rows</a></li>
		                <li><a href="shop-single.html">Product Single</a></li>
		                <li><a href="shop-cart.html">Cart Page</a></li>
		                <li><a href="shop-checkout.html">Checkout</a></li>
		            </ul>
		        </li>
		        <li><a href="#0">Buy this template</a></li>
		        <li><a href="reservations.html" class="btn_top">Reservations</a></li>
		    </ul>
		</nav>
	</div>
	<!-- Search -->
	<div class="search-overlay-menu">
	    <span class="search-overlay-close"><span class="closebt"><i class="icon_close"></i></span></span>
	    <form role="search" id="searchform" method="get">
	        <input value="" name="q" type="search" placeholder="Search..." />
	        <button type="submit"><i class="icon_search"></i></button>
	    </form>
	</div><!-- End Search -->
	</header>
	@yield('content')


	<!-- /main -->

	<footer>
	    <div class="frame black"></div>
	    <div class="container">
	        <div class="row">
	            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
	                <div class="footer_wp">
	                    <i class="icon_pin_alt"></i>
	                    <h3>Address</h3>
	                    <p>97845 Baker st. 567<br>Los Angeles - US</p>
	                </div>
	            </div>
	            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
	                <div class="footer_wp">
	                    <i class="icon_tag_alt"></i>
	                    <h3>Reservations</h3>
	                    <p><a href="tel:009442323221">+94 423-23-221</a><br><a href="#0">reservations@Foores.com</a></p>
	                </div>
	            </div>
	            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
	                <div class="footer_wp">
	                    <i class="icon_clock_alt"></i>
	                    <h3>Opening Hours</h3>
	                    <ul>
	                        <li>Mon - Sat: 10am - 11pm</li>
	                        <li>Sunday: Closed</li>
	                    </ul>
	                </div>
	            </div>
	            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
	                <h3>Keep in touch</h3>
	                <div id="newsletter">
	                    <div id="message-newsletter"></div>
	                    <form method="post" action="phpmailer/newsletter_template_email.php" name="newsletter_form" id="newsletter_form">
	                        <div class="form-group">
	                            <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
	                            <button type="submit" id="submit-newsletter"><i class="arrow_carrot-right"></i></button>
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>
	        <!-- /row-->
	        <hr>
	        <div class="row">
	            <div class="col-sm-5">
	                <p class="copy">© Foores Restaurant - All rights reserved</p>
	            </div>
	            <div class="col-sm-7">
	                <div class="follow_us">
					    <ul>
					        <li><a href="#0"><i class="bi bi-facebook"></i></a></li>
					        <li><a href="#0"><i class="bi bi-twitter-x"></i></a></li>
					        <li><a href="#0"><i class="bi bi-instagram"></i></a></li>
					        <li><a href="#0"><i class="bi bi-tiktok"></i></a></li>
					        <li><a href="#0"><i class="bi bi-whatsapp"></i></a></li>
					    </ul>
					</div>
	            </div>
	        </div>
	        <p class="text-center"></p>
	    </div>
	</footer>
	<!--/footer-->

	<div id="toTop"></div><!-- Back to top button -->

	<!-- Modal terms -->
	<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="termsLabel">Terms and conditions</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<!-- COMMON SCRIPTS -->
    <script src="{{ asset('assets/js/common_scripts.min.js') }}"></script>
    <script src="{{ asset('assets/js/common_func.js') }}"></script>
    <script src="{{ asset('assets/phpmailer/validate.js') }}"></script>

    <!-- SPECIFIC SCRIPTS -->
    <script src="{{ asset('assets/js/typed.min.js') }}"></script>
    <script>
    	var typed = new Typed('.element', {
		  strings: ["Delicious Food", "Nice Ambient", "Affordable Prices"],
		  startDelay: 10,
		  loop: true,
		  backDelay: 2000,
		  typeSpeed: 50
		});
    </script>

    <!-- SPECIFIC SCRIPTS (wizard form) -->
    <script src="{{ asset('assets/js/wizard/wizard_scripts.min.js') }}"></script>
    <script src="{{ asset('assets/js/wizard/wizard_func.js') }}"></script>

</body>
</html>
