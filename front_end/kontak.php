<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	<head>
		<title>SIMPRU</title>
		<link href="css/style.css" rel='stylesheet' type='text/css' />
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
	</head>
	<body>
		<!----start-wrap---->
			<!----start-top-header----->
			<div class="top-header" id="header">
				<div class="wrap">
				<div class="top-header-left">
					<ul class="agile_forms">
						<li><a href="login.php" data-toggle="modal" data-target="#myModal2"><span> </span> Masuk</a></li>
						<li><p><span> </span>Bukan Anggota ? </p>&nbsp;<a class="reg" href="#" data-toggle="modal" data-target="#myModal3"> Daftar</a></li>
						<li><p class="contact-info">Layanan Informasi : 815-123-4567</p></li>
						<div class="clear"> </div>
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
					<a href="index.php"><img src="images/logo2.png" title="SIMPRU ITS" style="margin-top: -10px;"/></a>
				</div>
				<!--- //End-logo---->
				<!--- start-top-nav---->
				<div class="top-nav">
						<ul class="flexy-menu thick orange">
							<li><a href="index.php">Beranda</a></li>
							<li><a href="layanan.php">Layanan</a></li>
							<li><a href="faq.php">FAQ</a></li>
							<li><a href="tentang.php">Tentang</a></li>
							<li class="active"><a href="kontak.php">Kontak</a></li>
						</ul>
						<div class="search-box">
							<div id="sb-search" class="sb-search">
								<form>
									<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
									<input class="sb-search-submit" type="submit" value="">
									<span class="sb-icon-search"> </span>
								</form>
							</div>
						</div>
						<!----search-scripts---->
						<script src="js/modernizr.custom.js"></script>
						<script src="js/classie.js"></script>
						<script src="js/uisearch.js"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script>
						<!----//search-scripts---->
				</div>
				<!--- //End-top-nav---->
				<div class="clear"> </div>
			</div>
			<!---//End-header---->
		</div>
		<!---start-contact---->
		<div class="contact">
			
				<div class="contact-info">
					<div class="map">
					 	<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px"></a></small>
					 </div>
					 <div class="wrap">
					 <div class="contact-grids">
							 <div class="col_1_of_bottom span_1_of_first1">
								    <h5>Alamat</h5>
								    <ul class="list3">
										<li>
											<img src="images/home.png" alt="">
											<div class="extra-wrap">
											 <p>Jalan Raya ITS<br></p>
											</div>
										</li>
									</ul>
							    </div>
								<div class="col_1_of_bottom span_1_of_first1">
								    <h5>Telepon</h5>
									<ul class="list3">
										<li>
											   <img src="images/phone.png" alt="">
											<div class="extra-wrap">
												<p><span>Telephone:</span>+1 800 258 2598</p>
											</div>
												<img src="images/fax.png" alt="">
											<div class="extra-wrap">
												<p><span>FAX:</span>+1 800 589 2587</p>
											</div>
										</li>
									</ul>
								</div>
								<div class="col_1_of_bottom span_1_of_first1">
									 <h5>Email</h5>
								    <ul class="list3">
										<li>
											<img src="images/email.png" alt="">
											<div class="extra-wrap">
											  <p><span class="mail"><a href="mailto:yoursite.com">info(at)its.ac.id</a></span></p>
											</div>
										</li>
									</ul>
							    </div>
								<div class="clear"></div>
					 </div>
					 	<form method="post" action="contact-post.html">
					          <div class="contact-form">
								<div class="contact-to">
			                     	<input type="text" class="text" value="Nama" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nama';}">
								 	<input type="text" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
								 	<input type="text" class="text" value="Subjek" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}">
								</div>
								<div class="text2">
				                   <textarea value="Pesan:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Pesan</textarea>
				                </div>
				               <span><input type="submit" class="" value="Submit"></span>
				                <div class="clear"></div>
				               </div>
				        </form>
					</div>
			</div>
		</div>
		<!----//End-contact---->
		<!----//End-footer---->
		<!---start-subfooter---->
		<div class="subfooter">
			<div class="wrap">
				<ul>
					<li><a href="index.php">Beranda</a><span>::</span></li>
					<li><a href="layanan.php">Layanan</a><span>::</span></li>
					<li><a href="detail.php">FAQ</a><span>::</span></li>
					<li><a href="tentang.php">Tentang</a><span>::</span></li>
					<li><a href="kontak.php">Kontak</a></li>
					<div class="clear"> </div>
				</ul>
				<a class="to-top" href="#header"><span> </span> </a>
			</div>
		</div>
		<!---//End-subfooter---->
		<!----//End-wrap---->
	</body>
</html>

