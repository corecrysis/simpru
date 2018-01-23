<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	<head>
		<title>SIMPRU ITS</title>
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="css/font-awesome.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<script src="js/jquery.min.js"></script>
		<!---smoth-scrlling---->
			<script type="text/javascript">
				$(document).ready(function(){
									$('a[href^="#"]').on('click',function (e) {
									    e.preventDefault();
									    var target = this.hash,
									    $target = $(target);
									    $('html, body').stop().animate({
									        'scrollTop': $target.offset().top
									    }, 1000, 'swing', function () {
									        window.location.hash = target;
									    });
									});
								});
				</script>
		<!---//smoth-scrlling---->
		<!----start-top-nav-script---->
		<script type="text/javascript" src="js/flexy-menu.js"></script>
		<script type="text/javascript">$(document).ready(function(){$(".flexy-menu").flexymenu({speed: 400,type: "horizontal",align: "right"});});</script>
		<!----//End-top-nav-script---->
		<!---webfonts---->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<!---webfonts---->
		<!---calender-style---->
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<!---//calender-style---->
		<!---images-hover-effects--->
		<link rel="stylesheet" href="css/zalki_hover_img.css" type="text/css" media="screen">
		<script src="js/jquery.zalki_hover_img.min-0.2.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(window).load(function(){
				$('.main_box').ZalkiHoverImg(
				);
				});
		</script>

		<!---//images-hover-effects--->
	</head>
	<body>
		<!----start-wrap---->
			<!----start-top-header----->
			<div class="top-header" id="header">
				<div class="wrap">
				<div class="top-header-left">
					<ul>
						<li><a href="login.php" data-toggle="modal" data-target="#myModal2"><span> </span> Masuk</a></li>
						<li><p><span> </span>Bukan Anggota ? </p>&nbsp;<a class="reg" href="#" data-toggle="modal" data-target="#myModal3"> Daftar</a></li>
						<li><p class="contact-info">Layanan Informasi : 815-123-4567</p></li>
					</ul>
				</div>
				<div class="top-header-right">
					<ul>
						<li><a class="face" href="#"><span> </span></a></li>
						<li><a class="twit" href="#"><span> </span></a></li>
						<li><a class="thum" href="#"><span> </span></a></li>
						<li><a class="pin" href="#"><span> </span></a></li>
						<div class="clear"> </div>
					</ul>
				</div>
				<div class="clear"> </div>
			</div>
			</div>
			<!----//End-top-header----->
			<!---start-header---->
			<div class="header">
				<div class="wrap">
				<!--- start-logo---->
				<div class="logo">
					<a href="index.php"><img src="images/logo2.png" title="SIMPRU" style="margin-top: -20px; margin-bottom: 10px;margin-left:25em;"/></a>
				</div>
				<!--- //End-logo---->
				<div class="clear"> </div>
			</div>
			<!---//End-header---->
		</div>
		<!---start-destinatiuons---->
		<div class="destinations">
			<div class="destination-head">
				<div class="wrap">
					<h3 style="margin-left:8em;">Sistem Informasi Manajemen Peminjaman Ruang</h3>
				</div>
				<!---End-destinatiuons---->
				<div class="find-place dfind-place" >
					<div class="wrap">
						<div class="p-h">
							<span>USER</span>
							<label>LOG IN</label>
						</div>
						<div class="p-ww">
							<form>
								<span> Email</span>
								<input type="text" value="Masukkan Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Masukkan Email';}">
									<i class="fa fa-envelope" aria-hidden="true" style="margin-left: -27px;"></i>
								<span> Password</span>
								<input type="text" value="Masukkan Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Masukkan Password';}"> 
									<i class="fa fa-unlock-alt" aria-hidden="true" style="margin-left: -27px;"></i>
								<input type="submit" value="Masuk" />
							</form>
						</div>
						<div class="clear"> </div>
					</div>
				</div>
				<!----//End-find-place---->
			</div>
		            <!-- /Duplicate to create more slides -->
		            <div class="slide">
		                <img src="images/its2.jpg" alt="" style="margin-top: -7.5em; margin-bottom: 10px;"/>
		            </div>
		            <!--/slide -->			
		<div class="subfooter">
			<div class="wrap">
				
			</div>
		</div>
		<!---//End-subfooter---->
		<!----//End-wrap---->
	</body>
</html>

