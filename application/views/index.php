<?php include("head.php"); ?>
<body>
<!---->

<div class="container-fluid">
    <div class="row">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
            <?php for($i = 0; $i < count($sliders); $i++){ ?>
                <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" <?php if($i == 0){echo 'class="active"';} ?></li>
            <?php } ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php for($i = 0; $i < count($sliders); $i++){ ?>
                <div class="item <?php if($i == 0){echo 'active';} ?>">
                    <img src="<?php echo base_url(); ?>uploads/<?php echo $sliders[$i]['image_link']; ?>" alt="<?php echo $sliders[$i]['image_title']; ?>">
                    <div class="carousel-caption">
                        <div id="home" class="banner-text wow fadeInUp" data-wow-delay="0.5s">
                            <h1 class="carousel-h1"><?php echo $sliders[$i]['slider_name']; ?></h1>
                            <h2><?php echo $sliders[$i]['slider_description']; ?></h2>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="row travel-header">
        <div class="col-lg-2 col-md-2 hidden-xs hidden-sm">
            <div class="row">
                <div class="logo wow fadeInLeft" data-wow-delay="0.5s">
                    <a href="index.html"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt=""/></a>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="row">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand hidden-lg hidden-md" href="#"><img style="height: 40px; max-width: 100%;" src="<?php echo base_url(); ?>assets/images/logo.png"></a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li <?php if($type == 1) echo 'class="active"'; ?>><a href="#"> Trang chủ <span class="sr-only">(current)</span></a></li>
                                <li <?php if($type == 2) echo 'class="active"'; ?>><a href="#"> Tours </a></li>
                                <li <?php if($type == 3) echo 'class="active"'; ?>><a href="#"> Giới thiệu </a></li>
                                <li <?php if($type == 4) echo 'class="active"'; ?>><a href="#"> Liên hệ </a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12 col-xs-12">
            <div class="row">
                <div class="alert alert-info">
                    <strong>ĐT: 08 66 85 23 66 - Hotline: 090 3 378 266</strong>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="brief" class="brief">
	 <div class="container">
	 	<h4>BRIEF</h4>
		 <div class="col-md-6 brief-grids wow fadeInLeft" data-wow-delay="0.5s">
			 <img src="<?php echo base_url(); ?>assets/images/browse.jpg" alt=""/>
			 <div class="brief-grid">
				 <div class="brief-grid-text">
					 <h3>Trip the awesomeness</h3>
					 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
					 quis nostrud exercitation ullamco laboris nisi ut.</p>
				 </div>
				 <div class="brief-grid-content1">
					 <h3>yugoslavia City</h3>
					 <p>Lorem lean startup ipsum product market fit customer development 
						acquihire technical cofounder.</p>
				 </div>
				 <div class="brief-grid-content2">
					 <h3>Donec et justo tincidunt</h3>
					 <p>Lorem lean startup ipsum product market fit customer development 
						acquihire technical cofounder.</p>
				 </div>
			 </div>
		 </div>
		 <div class="col-md-6 brief-grids wow fadeInRight" data-wow-delay="0.5s">
			 <img src="<?php echo base_url(); ?>assets/images/browse2.jpg" alt=""/>
			 <div class="brief-grid">
				 <div class="brief-grid-text">
					 <h3>Describe more about Trip</h3>
					 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
					 quis nostrud exercitation ullamco laboris nisi ut.</p>
				 </div>
				 <div class="brief-grid-content1 good">
					 <h3>We Think Globally</h3>
					 <p>Lorem lean startup ipsum product market fit customer development 
						acquihire technical cofounder.</p>
				 </div>
				 <div class="brief-grid-content2 video-bac">
					 <h3>Etiam interdum nisi ligula</h3>
					 <p>Lorem lean startup ipsum product market fit customer development 
						acquihire technical cofounder.</p>
				 </div>
			 </div>
		 </div>
		 <div class="clearfix"> </div>		 
	 </div>
</div>
<!---->
<div id="features" class="features">
	 <div class="container">
		 <div class="feature-text text-center">
			 <h3>TOURS</h3>
			 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
		 </div>
		 <div class="features-section">
			 <div class="col-md-6 feature-grid text-center">
			 <i class="f1"> </i>
			 <h3>Trip Navigator</h3>
			 <p>Lorem lean startup ipsum product market fit customer development acquihire technical cofounder. User engagement.
			 sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			 </div>
			 <div class="col-md-6 feature-grid text-center">
			 <i class="f2"> </i>
			 <h3>Trip Tool Box</h3>
			 <p>Lorem lean startup ipsum product market fit customer development acquihire technical cofounder. User engagement.
			 sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			 </div>
			 <div class="clearfix"> </div>
			 <div class="col-md-6 feature-grid text-center">
			 <i class="f3"> </i>
			 <h3>Trip Status</h3>
			 <p>Lorem lean startup ipsum product market fit customer development acquihire technical cofounder. User engagement.
			 sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			 </div>
			 <div class="col-md-6 feature-grid text-center">
			 <i class="f4"> </i>
			 <h3>Trip Valid</h3>
			 <p>Lorem lean startup ipsum product market fit customer development acquihire technical cofounder. User engagement.
			 sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			 </div>
		 </div>
	 </div>
</div>
<!---->
<div id="pricing" class="pricing">
	 <div class="container">
		 <div class="pricing-text text-center">
			 <h3>Trip Pricing & Plans</h3>
			 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
		 </div>
		 <div class="pricing-section">
			 <div class="col-md-4 pricing-grid wow fadeInUp" data-wow-delay="0.5s">
				 <div class="pricing-top text-center">
					 <h3>Basic</h3>
					 <p>From <span>$10</span> per month</p>
				 </div>
				 <div class="pricing-offer">
					 <ul>
						<li class="whyt"><a href="#">50GB Disk Space </a></li>
						<li><a href="#">10 Domain Names</a></li>
						<li class="whyt"><a href="#">10 E-Mail Address </a></li>
						<li><a href="#">300GB Monthly Bandwidth </a></li>
						<li class="whyt"><a href="#">Fully Support</a></li>
				     </ul>
					 <div class="sign text-center">
						<a class="popup-with-zoom-anim" href="#small-dialog">BUY</a>
					 </div>
				 </div>
			 </div>
			 <div class="col-md-4 pricing-grid wow fadeInDown" data-wow-delay="0.5s">
				 <div class="pricing-top text-center">
					 <h3>Standard</h3>
					 <p>From <span>$99</span> per month</p>
				 </div>
				 <div class="pricing-offer">
					 <ul>
						<li class="whyt"><a href="#">150GB Disk Space </a></li>
						<li><a href="#">100 Domain Names</a></li>
						<li class="whyt"><a href="#">20 E-Mail Address </a></li>
						<li><a href="#">500GB Monthly Bandwidth </a></li>
						<li class="whyt"><a href="#">Fully Support</a></li>
				     </ul>
					 <div class="sign text-center">
						 <a class="popup-with-zoom-anim" href="#small-dialog">BUY</a>
					 </div>
				 </div>
			 </div>
			 <div class="col-md-4 pricing-grid wow fadeInUp" data-wow-delay="0.5s">
				 <div class="pricing-top text-center">
					 <h3>Golden</h3>
					 <p>From <span>$150</span> per month</p>
				 </div>
				 <div class="pricing-offer">
					 <ul>
						<li class="whyt"><a href="#">1TB(Unlimited)</a></li>
						<li><a href="#">500 Domain Names</a></li>
						<li class="whyt"><a href="#">20 E-Mail Address </a></li>
						<li><a href="#">1TB Monthly Bandwidth </a></li>
						<li class="whyt"><a href="#">Fully Support</a></li>
				     </ul>
					 <div class="sign text-center">
						 <a class="popup-with-zoom-anim" href="#small-dialog">BUY</a>
					 </div>
				 </div>
			 </div>
			 <div class="clearfix"> </div>
		 </div>
		 <!--pop-up-grid-->
		 <script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/modernizr.custom.53451.js"></script>

 <script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
																						
						});
				</script>
								 <div id="small-dialog" class="mfp-hide">
									<div class="pop_up">
									 	<div class="payment-online-form-left">
											<form>
												<h4><span class="shipping"> </span>Shipping</h4>
												<ul>
													<li><input class="text-box-dark" type="text" value="Frist Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Frist Name';}"></li>
													<li><input class="text-box-dark" type="text" value="Last Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Last Name';}"></li>
												</ul>
												<ul>
													<li><input class="text-box-dark" type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}"></li>
													<li><input class="text-box-dark" type="text" value="Company Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Company Name';}"></li>
												</ul>
												<ul>
													<li><input class="text-box-dark" type="text" value="Phone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}"></li>
													<li><input class="text-box-dark" type="text" value="Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Address';}"></li>
													<div class="clear"> </div>
												</ul>
												<div class="clear"> </div>
											<ul class="payment-type">
												<h4><span class="payment"> </span> Payments</h4>
												<li><span class="col_checkbox">
													<input id="3" class="css-checkbox1" type="checkbox">
													<label for="3" name="demo_lbl_1" class="css-label1"> </label>
													<a class="visa" href="#"> </a>
													</span>												
												</li>
												<li>
													<span class="col_checkbox">
														<input id="4" class="css-checkbox2" type="checkbox">
														<label for="4" name="demo_lbl_2" class="css-label2"> </label>
														<a class="paypal" href="#"> </a>
													</span>
												</li>
												<div class="clear"> </div>
											</ul>
												<ul>
													<li><input class="text-box-dark" type="text" value="Card Number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Card Number';}"></li>
													<li><input class="text-box-dark" type="text" value="Name on card" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name on card';}"></li>
													<div class="clear"> </div>
												</ul>
												<ul>
													<li><input class="text-box-light hasDatepicker" type="text" id="datepicker" value="Expiration Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Expiration Date';}"><em class="pay-date"> </em></li>
													<li><input class="text-box-dark" type="text" value="Security Code" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Security Code';}"></li>
													<div class="clear"> </div>
												</ul>
												<ul class="payment-sendbtns">
													<li><input type="reset" value="Reset"></li>
													<li><a href="#" class="order">Process order</a></li>
												</ul>
												<div class="clear"> </div>
											</form>
										</div>
						  			</div>
								</div>
								<!--pop-up-grid-->
	 </div>
</div>
<!---->
<div class="video">
	 <div class="container">
		 <div class="video-text text-center">
			 <h3>MY TRIP Video</h3>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
		 </div>
		 <div class="video-play ">
			 <div class="playing">				
				 <iframe width="500"height="281"src="https://www.youtube.com/embed/4u4lSmQTWgc"frameborder="0"allowfullscreen> </iframe> 
			 </div>
			 <h4><a href="#" class="p1">Trusted by 100+ users</a></h4>
			 <h4><a href="#" class="p2">Video Documentation</a></h4>
			 <h4><a href="#" class="p3">24/7 Chat Support</a></h4>			 
		 </div>
	 </div>
</div>
<!---->
<div id="screenshots" class="screenshots">
	 <div class="container">
		 <div class="screen-text text-center">
			 <h3>GALLERY</h3>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
		 </div>
		 <!-- requried-jsfiles-for owl -->
				<link href="<?php echo base_url(); ?>assets/css/owl.carousel.css" rel="stylesheet">
							    <script src="<?php echo base_url(); ?>assets/js/owl.carousel.js"></script>
							        <script>
							    $(document).ready(function() {
							      $("#owl-demo").owlCarousel({
							        items : 1,
							        lazyLoad : true,
							        autoPlay : true,
							        navigation : false,
							        navigationText :  false,
							        pagination : true,
							      });
							    });
							    </script>
			<!-- //requried-jsfiles-for owl -->
		  <div id="owl-demo" class="owl-carousel">
			  <div class="item text-center guide-sliders">
				 <div class="col-md-4 image-grid">
				 	<div class="portfolio-wrapper">		
						<a href="<?php echo base_url(); ?>assets/images/sc1.JPG" class="b-link-stripe b-animate-go   swipebox"  title="Image Title">
							<img src="<?php echo base_url(); ?>assets/images/sc1.JPG"></a>
			         </div>			 
				 </div>
				 <div class="col-md-4 image-grid">
				 	<div class="portfolio-wrapper">	
				 		<a href="<?php echo base_url(); ?>assets/images/sc2.JPG" class="b-link-stripe b-animate-go   swipebox"  title="Image Title">
						 <img src="<?php echo base_url(); ?>assets/images/sc2.JPG"></a>
					 </div>			 
				 </div>
				 <div class="col-md-4 image-grid">
					 <div class="portfolio-wrapper">	
				 		<a href="<?php echo base_url(); ?>assets/images/sc3.JPG" class="b-link-stripe b-animate-go   swipebox"  title="Image Title">
						 <img src="<?php echo base_url(); ?>assets/images/sc3.JPG"></a>
					 </div>					 
				 </div>				   
			  </div>			  
			  <div class="item text-center guide-sliders">
				 <div class="col-md-4 image-grid">
						<div class="portfolio-wrapper">	
				 		<a href="<?php echo base_url(); ?>assets/images/sc4.JPG" class="b-link-stripe b-animate-go   swipebox"  title="Image Title">
						 <img src="<?php echo base_url(); ?>assets/images/sc4.JPG"></a>
					 </div>					 
				 </div>
				 <div class="col-md-4 image-grid">
					 <div class="portfolio-wrapper">	
				 		<a href="<?php echo base_url(); ?>assets/images/sc5.JPG" class="b-link-stripe b-animate-go   swipebox"  title="Image Title">
						 <img src="<?php echo base_url(); ?>assets/images/sc5.JPG"></a>
					 </div>					 
				 </div>
				 <div class="col-md-4 image-grid">
					 <div class="portfolio-wrapper">	
				 		<a href="<?php echo base_url(); ?>assets/images/sc1.JPG" class="b-link-stripe b-animate-go   swipebox"  title="Image Title">
						 <img src="<?php echo base_url(); ?>assets/images/sc1.JPG"></a>
					 </div>					 
				 </div>						
			  </div>
			  <div class="item text-center guide-sliders">
				 <div class="col-md-4 image-grid">
					 <div class="portfolio-wrapper">	
				 		<a href="<?php echo base_url(); ?>assets/images/sc5.JPG" class="b-link-stripe b-animate-go   swipebox"  title="Image Title">
						 <img src="<?php echo base_url(); ?>assets/images/sc5.JPG"></a>
					 </div>					 
				 </div>
				 <div class="col-md-4 image-grid">
					 <div class="portfolio-wrapper">	
				 		<a href="<?php echo base_url(); ?>assets/images/sc4.JPG" class="b-link-stripe b-animate-go   swipebox"  title="Image Title">
						 <img src="<?php echo base_url(); ?>assets/images/sc4.JPG"></a>
					 </div>					 
				 </div>
				 <div class="col-md-4 image-grid">
					<div class="portfolio-wrapper">	
				 		<a href="<?php echo base_url(); ?>assets/images/sc2.JPG" class="b-link-stripe b-animate-go   swipebox"  title="Image Title">
						 <img src="<?php echo base_url(); ?>assets/images/sc2.JPG"></a>
					 </div>					 
				 </div>						
			  </div>
			  
		  </div>
	 </div>
</div>
<!---->
<div id="testimonial" class="trusted">
	 <div class="container">
		 <div class="trusted-text text-center">
			 <h3>BLOG</h3>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
		 </div>
		 <div class="sponcer">
			 <ul id="flexiselDemo1">
				<li>
					<div class="biseller-column">
					<a href="single.html"><img src="<?php echo base_url(); ?>assets/images/sld1.png" alt=""></a>
					</div>
				</li>
				<li>
					<div class="biseller-column">
					<a href="single.html"><img src="<?php echo base_url(); ?>assets/images/sld2.png" alt=""></a>
					</div>
				</li>
				<li>
					<div class="biseller-column">
					<a href="single.html"><img src="<?php echo base_url(); ?>assets/images/sld3.png" alt=""></a>
					</div>
				</li>
				<li>
					<div class="biseller-column">
					<a href="single.html"><img src="<?php echo base_url(); ?>assets/images/sld4.png" alt=""></a>
					</div>
				</li>
				<li>
					<div class="biseller-column">
					<a href="single.html"><img src="<?php echo base_url(); ?>assets/images/sld1.png" alt=""></a>
					</div>
				</li>
				<li>
					<div class="biseller-column">
					<a href="single.html"><img src="<?php echo base_url(); ?>assets/images/sld3.png" alt=""></a>
					</div>
				</li>
				<li>
					<div class="biseller-column">
					<a href="single.html"><img src="<?php echo base_url(); ?>assets/images/sld4.png" alt=""></a>
					</div>
				</li>
				<li>
					<div class="biseller-column">
					<a href="single.html"><img src="<?php echo base_url(); ?>assets/images/sld2.png" alt=""></a>
					</div>
				</li>
			 </ul>
			 <script type="text/javascript">
			 $(window).load(function() {
				$("#flexiselDemo1").flexisel({
					visibleItems: 4,
					animationSpeed: 1000,
					autoPlay: true,
					autoPlaySpeed: 3000,    		
					pauseOnHover: true,
					enableResponsiveBreakpoints: true,
					responsiveBreakpoints: { 
						portrait: { 
							changePoint:480,
							visibleItems: 1
						}, 
						landscape: { 
							changePoint:640,
							visibleItems: 2
						},
						tablet: { 
							changePoint:768,
							visibleItems: 3
						}
					}
				});
				
			 });
			   </script>
			   <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.flexisel.js"></script>
	     </div>
		  <div class="box-grids">
				 <div class="col-md-4 client wow fadeInLeft" data-wow-delay="0.5s">
					 <div class="box-grid">
					 <span> </span>
					 <p>Lorem lean startup ipsum product market fit customer development acquihire technical cofounder. User engagement A/B testing shrink a market venture capital pitch deck. 
					 Social bookmarking group buying crowded market pivot onboarding.</p>
					 <label> </label>
					 </div>
					 <h4><a href="single.html">Market Diaz</a></h4>
					 <p class="ceo">Abz Network</p>
				 </div>
				 <div class="col-md-4 client  wow fadeInUp" data-wow-delay="0.5s">
					 <div class="box-grid">
					 <span> </span>
					 <p>Lorem lean startup ipsum product market fit customer development acquihire technical cofounder. User engagement A/B testing shrink a market venture capital pitch deck. 
					 Social bookmarking group buying crowded market pivot onboarding.</p>
					 <label> </label>
					 </div>
					 <h4><a href="single.html">Market Diaz</a></h4>
					 <p class="ceo">Abz Network</p>
				 </div>
				 <div class="col-md-4 client wow fadeInRight" data-wow-delay="0.5s">
					 <div class="box-grid">
					 <span> </span>
					 <p>Lorem lean startup ipsum product market fit customer development acquihire technical cofounder. User engagement A/B testing shrink a market venture capital pitch deck. 
					 Social bookmarking group buying crowded market pivot onboarding.</p>
					 <label> </label>
					 </div>	
						<h4><a href="single.html">Market Diaz</a></h4>
					 <p class="ceo">Abz Network</p>
				 </div>
				 <div class="clearfix"> </div>
		  </div>
	</div>
</div>
<!---->
<div class="get-started">
	 <div class="container">
		 <h4 class="wow bounceInLeft" data-wow-delay="0.5s">We Ready  to Help You</h4>
		 <h3 class="wow bounceInRight" data-wow-delay="0.5s">Get the Best Solution for Your Business</h3>
		 <a href="#">GET STARTED</a>
	 </div>
</div>
<!---->
<div id="contact" class="contact">
	 <div class="container">
		 <div class="contact-text text-center">
			 <h3>contact</h3>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
		 </div>
		  <div class="contact-form">
				<form>
					<div class="col-md-6 text-box">
						<input class="wow fadeInLeft" data-wow-delay="0.5s" type="text" placeholder="Name" />
						<input class="wow fadeInLeft" data-wow-delay="0.5s" type="text" placeholder="Email" />
						<input class="wow fadeInLeft" data-wow-delay="0.5s" type="text" placeholder="Subject" />
				    </div>
					 <div class="col-md-6 textarea">
							<textarea class="wow fadeInRight" data-wow-delay="0.5s">Message</textarea>
							<input class="wow fadeInRight" data-wow-delay="0.5s" type="submit" value="SUBMIT" />
					  </div>
					  <div class="clearfix"> </div>					  
			  </form>
		  </div>
	 </div>	  
</div>
<!--map-->
<div class="map">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d37494223.23909492!2d103!3d55!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x453c569a896724fb%3A0x1409fdf86611f613!2sRussia!5e0!3m2!1sen!2sin!4v1415776049771"></iframe>
</div>
<!--/map-->
<!---->
<?php include("footer.php"); ?>
<!---->
<?php include("foot.php"); ?>