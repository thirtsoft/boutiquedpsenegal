<?php
    
    $error = '';
    $name = '';
    $email = '';
    $subject = '';
    $message = '';

    function clean_text($string){
        $string = trim($string);
        $string = stripslashes($string);
        $string = htmlspecialchars($string);

    }

    if(isset($_POST["submit"])){
			$output = 'Le nom de contact '.$name. '<br>'.'Son email est '.$email;
        if(empty($_POST["name"])){
            $error .= '<p><lable class="text-danger">SVP donner votre Nom</label></p>';
        }
        else{
            $name = clean_text($_POST["name"]);
            if(!preg_match("/^[a-zA-Z]*$/",$name)){
                $error .= '<p><lable class="text-danger">Seulement des lettres
                           qui sont autorisé pour votre Nom</label></p>';
            }
        }
        if(empty($_POST["email"])){
            $error .= '<p><lable class="text-danger">SVP donner votre émail</label></p>';

        }
        else{
            $email = clean_text($_POST["email"]);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error .= '<p><lable class="text-danger">Votre émail est invalide
                           rééssayer avec un émail valide</label></p>';

            }

        }
        if(empty($_POST["subject"])){
            $error .= '<p><lable class="text-danger">Donner un object 
                         à votre émail</label></p>';

        }
        else{
            $subject = clean_text($_POST["subject"]);
        }
        
        if(empty($_POST["message"])){
            $error .= '<p><lable class="text-danger">Message est obligatoire </label></p>';

        }
        else{
            $message = clean_text($_POST["message"]);

        }

      if($error != ''){
		   	require '../PHPMailer/PHPMailerAutoload.php';
          //  require 'PHPMailer/PHPMailer/PHPMailerAutoload.php';
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 3;
            $mail->Host = 'smtp.gmail.com:';
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->Username = "thirdiallo@gmail.com";
            $mail->Password = "tairoudiallo91";
						$mail->SMTPSecure = 'ssl';
						$mail ->body = $output;
            $mail->setFrom('thirdiallo@gmail.com', 'Dsmart tutoriel');// $_POST["email"]; //('thirdiallo@gmail.com', 'Dsmart tutoriel');
            /* $mail->FromName($_POST["name"]); */
            $mail->addAddress("thirdiallo@gmail.com"); //=($_POST["email"]); // =$_POST["email"]; //("thirdiallo@gmail.com");
						$mail->addCC($_POST["email"], $_POST["name"]);
					/* 	$mail ->addReplyTo('thirdiallo@gmail.com'); */
            $mail->IsHTML(true);
            $mail->Subject = $_POST["subject"];
            $mail->Body = $_POST["message"];
            if ($mail->send()) {
								echo "message is sent";
				
                 $error = '<label class="text-success"> Votre message est bien
						   envoyé et merci de mavoir contacter </label>';
						    
    
            } else {
                $error = '<label class="text-success"> Votre message né pas
						   envoyé rééssayer encore </label>'; 
						  
            }

            $name = '';
            $email = '';
            $subject = '';
            $message = '';

		}
	
}
		//header('location:contact.php');
      

?>


<!DOCTYPE html>
<html lang="en">
<head>

<!--/tags -->
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/font-awesome.css" rel="stylesheet"> 
    <link href="../css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
    <!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
</head>
<body>
<!-- header -->
<div class="header" id="home">
	<div class="container">
		<ul>
			<li><i class="fa fa-phone" aria-hidden="true"></i> Call : 00221771477528</li>
			<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">bigsoul7@gmail.com</a></li>
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="header-bot_inner_wthreeinfo_header_mid">
		<!-- header-bot -->
		<div class="col-md-4 logo_agile">
			<h1><a href="index.html"><span>D</span>&P Shop <i class="fa fa-shopping-bag top_logo_agile_bag" aria-hidden="true"></i></a></h1>
		</div>
        <!-- header-bot -->
        <div class="col-md-4 header-middle">
			<form action="#" method="post">
				<input type="search" name="search" placeholder="Search here..." required="">
					<input type="submit" value=" ">
				<div class="clearfix"></div>
			</form>
		</div>
		<div class="col-md-4 agileits-social top_content">
			<ul class="social-nav model-3d-0 footer-social w3_agile_social">
				 <li><a href="https://www.facebook.com/pg/Parfum-Dp-S%C3%A9n%C3%A9gal-163746567857567/photos/?ref=page_internal" class="facebook">
				     <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
				     <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
				  <li><a href="#" class="twitter"> 
				      <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
				      <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
					<li><a href="https://wa.me/221779440310" class="whatsapp">
              <div class="front"><i class="fa fa-whatsapp" aria-hidden="true"></i></div>
              <div class="back"><i class="fa fa-whatsapp" aria-hidden="true"></i></div></a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
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
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="active menu__item"><a class="menu__link" href="../index.php">Accueil <span class="sr-only">(current)</span></a></li>
					<li class=" menu__item"><a class="menu__link" href="about.php">About</a></li>
					<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hommes <span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="agile_inner_drop_nav_info">
									<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
										<a href="man.php"><img src="../images/top2.jpg" alt=" "/></a>
									</div>
									<div class="col-sm-3 multi-gd-img">
                    <ul class="multi-column-dropdown">
											<li><a href="man.php">Parfums 100ml</a></li>
                      <li><a href="man.php">Parfums 50ml</a></li>
                      <li><a href="man.php">Parfums 30ml</a></li>
                      <li><a href="man.php">Deodorant</a></li>
                      <li><a href="man.php">Ouds&Eau Cologne</a></li>
                    </ul>
									</div>
									<div class="col-sm-3 multi-gd-img">
                    <ul class="multi-column-dropdown">
											<li><a href="man.php">Parfums 100ml</a></li>
                      <li><a href="man.php">Parfums 50ml</a></li>
                      <li><a href="man.php">Parfums 30ml</a></li>
                      <li><a href="man.php">Deodorant</a></li>
                      <li><a href="man.php">Ouds&Eau Cologne</a></li>
                    </ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
					<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Femmes <span class="caret"></span></a>
						<ul class="dropdown-menu multi-column columns-3">
							<div class="agile_inner_drop_nav_info">
                <div class="col-sm-3 multi-gd-img">
                  <ul class="multi-column-dropdown">
										<li><a href="womens.php">Parfums 100ml</a></li>
                    <li><a href="womens.php">Parfums 50ml</a></li>
                    <li><a href="womens.php">Parfums 30ml</a></li>
                    <li><a href="womens.php">Deodorant</a></li>
                    <li><a href="womens.php">Ouds&Eau Cologne</a></li>
                  </ul>
                </div>
                <div class="col-sm-3 multi-gd-img">
							  	<ul class="multi-column-dropdown">
										<li><a href="womens.php">Parfums 100ml</a></li>
                    <li><a href="womens.php">Parfums 50ml</a></li>
                    <li><a href="womens.php">Parfums 30ml</a></li>
                    <li><a href="womens.php">Deodorant</a></li>
                    <li><a href="womens.php">Ouds&Eau Cologne</a></li>
                  </ul>
                </div>
								<div class="col-sm-6 multi-gd-img multi-gd-text ">
									<a href="pages/womens.php"><img src="../images/top1.jpg" alt=" "/></a>
								</div>
									<div class="clearfix"></div>
								</div>
						</ul>
					</li>
					<li class=" menu__item"><a class="menu__link" href="shopping.php">Boutique</a></li>
					<li class=" menu__item menu__item--current"><a class="menu__link" href="contact.php">Contact</a></li>
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			<div class="wthreecartaits wthreecartaits2 cart cart box_1"> 
				<form action="#" method="post" class="last"> 
				    <input type="hidden" name="cmd" value="_cart">
					<input type="hidden" name="display" value="1">
					<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
				</form>  
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>Contactez <span>Nous</span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="../index.php">Accueil</a><i>|</i></li>
								<li>CONTACT</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>

  <!--/contact-->
	<div class="banner_bottom_agile_info">
	    <div class="container">
		  <div class="contact-grid-agile-w3s">
				<div class="col-md-4 contact-grid-agile-w3">
						<div class="contact-grid-agile-w31">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
							<h4>Address</h4>
							<p>Centre Commercial Touba Sandaga 
								Au 2è Etage Boutique 2369 <span></span></p>
						</div>
					</div>
					<div class="col-md-4 contact-grid-agile-w3">
						<div class="contact-grid-agile-w32">
							<i class="fa fa-phone" aria-hidden="true"></i>
							<h4>Call Us</h4>
							<p>00221771477528<span>00221771477528</span></p>
						</div>
					</div>
					<div class="col-md-4 contact-grid-agile-w3">
						<div class="contact-grid-agile-w33">
							<i class="fa fa-envelope-o" aria-hidden="true"></i>
							<h4>Email</h4>
							<p><a href="mailto:thirdiallo@gmail.com">bigsoul7o@gmail.com</a><span><a href="mailto:thirdiallo@gmail.com">bigsoul7o@gmail.com</a></span></p>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
	   </div>
	 </div>
	   <div class="contact-w3-agile1 map" data-aos="flip-right">
		 		<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1I7KJAuVRUgAZXTY1dacKUwxcH5WmT-4C" width="640" height="480"></iframe>
			
		   <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100949.24429313939!2d-122.44206553967531!3d37.75102885910819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan+Francisco%2C+CA%2C+USA!5e0!3m2!1sen!2sin!4v1472190196783" class="map" style="border:0" allowfullscreen=""></iframe> -->
	   </div>
   <div class="banner_bottom_agile_info">
	<div class="container">
	   <div class="agile-contact-grids">
				<div class="agile-contact-left">
					<div class="col-md-6 address-grid">
						<h4>Pour tout <span>Information</span></h4>
							<div class="mail-agileits-w3layouts">
								<i class="fa fa-volume-control-phone" aria-hidden="true"></i>
								<div class="contact-right">
									<p>Telephone </p><span>00221771477528</span>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="mail-agileits-w3layouts">
								<i class="fa fa-envelope-o" aria-hidden="true"></i>
								<div class="contact-right">
									<p>Mail </p><a href="mailto:thirdiallo@gmail.com">bigsoul7o@gmail.com</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="mail-agileits-w3layouts">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
								<div class="contact-right">
									<p>Siège</p><span>centre commercial Touba Sandaga 
											Au 2è Etage Boutique 2369</span>
								</div>
								<div class="clearfix"> </div>
							</div>
							<ul class="social-nav model-3d-0 footer-social w3_agile_social two contact">
								<li><a href="https://www.facebook.com/pg/Parfum-Dp-S%C3%A9n%C3%A9gal-163746567857567/photos/?ref=page_internal" class="facebook">
								  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
									<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a>
								</li>
								<li><a href="#" class="twitter"> 
								  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
								  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a>
								</li>
								<li><a href="#" class="whatsapp">
            			<div class="front"><i class="fa fa-whatsapp" aria-hidden="true"></i></div>
            			<div class="back"><i class="fa fa-whatsapp" aria-hidden="true"></i></div></a>
								</li>
							</ul>
					</div>
					<div class="col-md-6 contact-form">
						<h4 class="white-w3ls">Contact <span>Form</span></h4>
						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="name" required="">
								<label>Name</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="email" name="email" required=""> 
								<label>Email</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="text" name="subject" required="">
								<label>Subject</label>
								<span></span>
							</div>
							<div class="styled-input">
								<textarea name="message" required=""></textarea>
								<label>Message</label>
								<span></span>
							</div>	 
							<input type="submit" name="submit" value="SEND">
						</form>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
       </div>
	</div>
 <!--//contact-->

 <div class="coupons">
		<div class="coupons-grids text-center">
			<div class="w3layouts_mail_grid">
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-truck" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>Livraison</h3>
						<p>Nous proposons un service de livraison de qualité</p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-headphones" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>24/7 Assistance</h3>
						<p>Assistance assuré à tous clients</p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-shopping-bag" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>MONEY PRIS</h3>
						<p>Toutes money est accepté</p>
					</div>
				</div>
					<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-gift" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>CADEAUX</h3>
						<p>Une remise est offerte à nos fidèle client</p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

		</div>
</div>
<!--grids-->
<!-- footer -->
<div class="footer">
	<div class="footer_agile_inner_info_w3l">
		<div class="col-md-3 footer-left">
			<h2><a href="index.html"><span>D</span>&P Shop </a></h2>
			<p>est une nouvelle 
			boutique à la mode pour votre satisfaction  
			totale.</p>
			<ul class="social-nav model-3d-0 footer-social w3_agile_social two">
				<li><a href="https://www.facebook.com/pg/Parfum-Dp-S%C3%A9n%C3%A9gal-163746567857567/photos/?ref=page_internal" class="facebook">
			    	<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
					<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
				<li><a href="#" class="twitter"> 
				    <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
				    <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
						<li><a href="#" class="whatsapp">
              <div class="front"><i class="fa fa-whatsapp" aria-hidden="true"></i></div>
              <div class="back"><i class="fa fa-whatsapp" aria-hidden="true"></i></div></a></li>
															
			</ul>
		</div>
		<div class="col-md-9 footer-right">
			<div class="sign-grds">
				<div class="col-md-4 sign-gd">
					<h4>Nos <span>Informations</span> </h4>
					<ul>
						<li><a href="../index.php">Accueil</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="man.php">Hommes</a></li>
						<li><a href="womens.php">Femmes</a></li>
						<li><a href="shopping.php">Boutique</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</div>
				
				<div class="col-md-5 sign-gd-two">
					<h4>Informations <span>Achats</span></h4>
					<div class="w3-address">
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-phone" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Telephone</h6>
								<p>+221 771477528</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Address Email</h6>
								<p>Email :<a href="mailto:thirdiallo@gmail.com"> bigsoul7@gmail.com</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Localisation</h6>
								<p>Centre Commercial Touba Sanadaga
										2è Etage Boutique 2369
								</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
	
		<div class="clearfix"></div>
	</div>
		<p class="copy-right">&copy 2019 StarLab. All rights reserved <a href="http://w3layouts.com/">StarLab</a></p>
	</div>
</div>
<!-- //footer -->

<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    
<!-- js -->
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script src="../js/modernizr.custom.js"></script>
	<!-- Custom-JavaScript-File-Links --> 
	<!-- cart-js -->
<script src="../js/minicart.min.js"></script>

<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>

<!-- script for responsive tabs -->						
<script src="../js/easy-responsive-tabs.js"></script>
<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion           
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
</script>
<!-- //script for responsive tabs -->	

<!-- start-smoth-scrolling -->
<script type="text/javascript" src="../js/move-top.js"></script>
<script type="text/javascript" src="../js/jquery.easing.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- here stars scrolling icon -->
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
<!-- //here ends scrolling icon -->

<!-- for bootstrap working -->
<script type="text/javascript" src="../js/bootstrap.js"></script>
	
</body>
</html>