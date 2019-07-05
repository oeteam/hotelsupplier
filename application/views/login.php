<?php
$favicon = favicon();
?>
<!DOCTYPE html>
<html>
<head>
<title>Hotel Supplier  - Otelseasy</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/<?php echo $favicon[0]->Fav_Icon ?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo base_url('login/css/bootstrap.css') ?>" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url('login/css/style.css') ?>" rel='stylesheet' type='text/css' />
<script src="<?php echo base_url('login/js/jquery.min.js') ?>"></script>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="<?php echo base_url('login/js/move-top.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('login/js/easing.js') ?>"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
<!--start-smoth-scrolling-->
</head>
<body>
	<!--start-header-->
	<div class="header" id="home">
		<div class="container">
			<div class="head">
			<div class="logo">
				 <a href="#"><img src="<?php echo base_url(); ?>skin/images/dash/logo.png" width="109px;height: 40px;" alt=""/></a>
			</div>
			<div class="navigation">
				 <span class="menu"></span> 
					<ul class="navig">
						<li><a href="http://otelseasy.com/">B2B</a></li>
					</ul>
			</div>
				<div class="clearfix"></div>
			</div>
			</div>
		</div>	
	<!-- script-for-menu -->
	<!-- script-for-menu -->
		<script>
			$("span.menu").click(function(){
				$(" ul.navig").slideToggle("slow" , function(){
				});
			});
		</script>
	<!-- script-for-menu -->
	<!--start-banner-->
	<div class="banner">
		<div class="container">
			<div class="banner-top">
				<form action="<?php echo base_url('HotelSupplier') ?>" id="front_login" method="post">
				<h1>LogIn</h1>
				<div class="banner-bottom">
					<div class="bnr-one">
						<div class="bnr-left">
							<p>Agentcode</p>
						</div>
						<div class="bnr-right">
							<input  type="text" required="" name="agent_code" placeholder="AgentCode">
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="bnr-one">
						<div class="bnr-left">
							<p>Username</p>
						</div>
						<div class="bnr-right">
							<input  type="text"  required="" name="user_name" placeholder="username">
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="bnr-one">
						<div class="bnr-left">
							<p>Password</p>
						</div>
						<div class="bnr-right">
							<input  type="password" required="" name="password" placeholder="password">
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="alert alert-danger error_msg hide"  style="width: 74%;margin-top: 5px;margin-left: 97px;" role="alert">
  							
					</div>
					<div class="bnr-btn">
							<input type="submit" value="LogIn" id="login_button">
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
	<!--end-banner-->
	<!---start-date-piker---->
		<link rel="stylesheet" href="<?php echo base_url('login/css/jquery-ui.css') ?>" />
		<script src="<?php echo base_url('login/js/jquery-ui.js') ?>"></script>
	<!---/End-date-piker---->
	<!---start-why-->
	<div class="why" id="about" style="
    background-color: #f4f2fd;
">
		<div class="container">
			
			<div class="why-bottom">
				<div class="col-md-4 why-left">
					<span class="w-one"></span>
					<h3>Win -Win</h3>
					<p><strong>Big data sharing</strong> Shared The Globe Hotel room and other industry standard data.</p>
					<p><strong>Fast on line</strong> sale Self replication can be on-line major channels</p>
				</div>
				<div class="col-md-4 why-left">
					<span class="w-two"></span>
					<h3>Common Platform</h3>
					<p><strong>Centralized distribution</strong> Only through the agent, can be a key on-line Ctrip / where to go / art dragon and other distribution channels</p>
					<p><strong>Centralized treatment</strong> The integration of online and offline orders, centralized recieve orders / sent orders, Centralized Settlement.</p>
				</div>
				<div class="col-md-4 why-left">
					<span class="w-three"></span>
					<h3>Maximum benefit</h3>
					<p><strong>Highest efficiency</strong>  A variety of ways to automatically send orders Include online and offline,Automatically receive order</p>
					<p><strong>Lowest cost</strong>  eBooking/ fax / SMS free sharing</p>
				</div>				
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--end-why-->
	
	
	<!--FlexSlider-->
	<link rel="stylesheet" href="<?php echo base_url('login/css/flexslider.css') ?>" type="text/css" media="screen" />
	<script defer src="<?php echo base_url('login/js/jquery.flexslider.js') ?>"></script>
	</div>
			<!--End-slider-script-->
	
	
	<!--start-footer-->
	<div class="footer">
		<div class="container">
			<div class="footer-top">
				<p class="footer-class">© 2019 All Rights Reserved</p>
			</div>
		</div>
		<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</div>
	<!--end-footer-->
</body>
</html>
<script>
	$('#login_button').click(function (e) {
    var url = $("#front_login").attr("action");
      e.preventDefault();
      $.ajax({
        dataType: 'json',
        type: 'post',
        url: '<?php echo base_url("Welcome/login") ?>',
        data: $('#front_login').serialize(),
        cache: false,
        success: function (response) {
          if (response.status == "1") {
            window.location = $("#front_login").attr('action');
          } else {
          	$(".error_msg").removeClass('hide');
            $(".error_msg").text(response.error);
          }
        }
      });

    });
</script>