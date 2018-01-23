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
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/reset.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
		<link rel="stylesheet" href="css/style-signup.css">
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
		<!---script signin signup---->
			<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
			<script  src="js/index.js"></script>
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
						<ul class="agile_forms">
							<li><p class="contact-info">Layanan Informasi : 815-123-4567</p></li>
							<div class="clear"> </div>
						</ul>	
					</div>
					<div class="top-header-right" style="width:30%;">
						<nav class="main-nav">
							<ul>
								<!-- inser more links here -->
								<li><a class="cd-signin" href="#0">Masuk</a></li>
								<li><a class="cd-signup" href="#0">Daftar</a></li>
							</ul>
						</nav>
					</div>
					<div class="clear"> </div>
				</div>
			</div>
				<div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
				<div class="cd-user-modal-container"> <!-- this is the container wrapper -->
					<ul class="cd-switcher">
						<li><a href="#0">Masuk</a></li>
						<li><a href="#0">Daftar</a></li>
					</ul>
		

					<div id="cd-login"> <!-- log in form -->
						<form class="cd-form">
							<p class="fieldset">
								<label class="image-replace cd-email" for="signin-email">E-mail</label>
								<input class="full-width has-padding has-border" id="signin-email" type="email" placeholder="E-mail">
								<span class="cd-error-message">Error message here!</span>
							</p>

							<p class="fieldset">
								<label class="image-replace cd-password" for="signin-password">Password</label>
								<input class="full-width has-padding has-border" id="signin-password" type="text"  placeholder="Password">
								<a href="#0" class="hide-password">Hide</a>
								<span class="cd-error-message">Error message here!</span>
							</p>

							<p class="fieldset">
								<input type="checkbox" id="remember-me" checked>
								<label for="remember-me">Remember me</label>
							</p>

							<p class="fieldset">
								<input class="full-width" type="submit" value="Login">
							</p>
						</form>
						
						<p class="cd-form-bottom-message"><a href="#0">Forgot your password?</a></p>
						<!-- <a href="#0" class="cd-close-form">Close</a> -->
					</div> <!-- cd-login -->

					<div id="cd-signup"> <!-- sign up form -->
						<form class="cd-form">
							<p class="fieldset">
								<label class="image-replace cd-username" for="signup-nama">Nama</label>
								<input class="full-width has-padding has-border" id="signup-nama" type="text" placeholder="Nama">
								<span class="cd-error-message">Error message here!</span>
							</p>
							
							<p class="fieldset">
								<label class="image-replace cd-username" for="signup-nomor">NRP/NIP/NIK</label>
								<input class="full-width has-padding has-border" id="signup-nomor" type="text" placeholder="NRP/NIP/NIK">
								<span class="cd-error-message">Error message here!</span>
							</p><hr>
							<input type="radio" name="editList" value="internal">User Internal ITS
							<input type="radio" name="editList" value="eksternal">User Eksternal ITS
							<hr>
							<p class="fieldset">
								<label class="image-replace cd-email" for="signup-email">E-mail</label>
								<input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail">
								<span class="cd-error-message">Error message here!</span>
							</p>

							<p class="fieldset">
								<label class="image-replace cd-password" for="signup-password">Password</label>
								<input class="full-width has-padding has-border" id="signup-password" type="text"  placeholder="Password">
								<a href="#0" class="hide-password">Hide</a>
								<span class="cd-error-message">Error message here!</span>
							</p>
							
							<p class="fieldset">
								<label class="image-replace cd-username" for="signup-organisasi">Organisasi/Instansi</label>
								<input class="full-width has-padding has-border" id="signup-nama" type="text" placeholder="Organisasi/Instansi">
								<span class="cd-error-message">Error message here!</span>
							</p>

							<p class="fieldset">
								<input type="checkbox" id="accept-terms">
								<label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
							</p>

							<p class="fieldset">
								<input class="full-width has-padding" type="submit" value="Create account">
							</p>
						</form>

						<!-- <a href="#0" class="cd-close-form">Close</a> -->
					</div> <!-- cd-signup -->

					<div id="cd-reset-password"> <!-- reset password form -->
						<p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

						<form class="cd-form">
							<p class="fieldset">
								<label class="image-replace cd-email" for="reset-email">E-mail</label>
								<input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
								<span class="cd-error-message">Error message here!</span>
							</p>

							<p class="fieldset">
								<input class="full-width has-padding" type="submit" value="Reset password">
							</p>
						</form>

						<p class="cd-form-bottom-message"><a href="#0">Back to log-in</a></p>
					</div> <!-- cd-reset-password -->
					<a href="#0" class="cd-close-form">Close</a>
				</div> <!-- cd-user-modal-container -->
			</div> <!-- cd-user-modal -->

				
			<!----//End-top-header----->
			<!---start-header---->
			<div class="header">
				<div class="wrap">
				<!--- start-logo---->
				<div class="logo">
					<a href="index.php"><img src="images/logo2.png" title="SIMPRU" style="margin-top: -10px;"/></a>
				</div>
				<!--- //End-logo---->
				<!--- start-top-nav---->
				<div class="top-nav">
					<div class="top-menu">
						<ul class="flexy-menu thick orange">
							<li><a href="index.php">Beranda</a></li>
							<li class="active"><a href="layanan.php">Layanan</a></li>
							<li><a href="detail.php">FAQ</a></li>
							<li><a href="tentang.php">Tentang</a></li>
							<li><a href="kontak.php">Kontak</a></li>
						</ul>
					</div>
						<div class="search-box">
							<div id="sb-search" class="sb-search">
								<form>
									<input class="sb-search-input" placeholder="Masukkan kata pencarian.." type="search" name="search" id="search">
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
		</div>
		<!---start-destinatiuons---->
		<div class="destinations">
			<div class="destination-head">
				<div class="wrap">
					<h3>Layanan Fasilitas Ruang</h3>
				</div>
				<!---End-destinatiuons---->
				<div class="find-place dfind-place">
					<div class="wrap">
						<div class="p-h">
							<span>TEMUKAN</span>
							<label>LOKASI</label>
						</div>
						<!---strat-date-piker---->
						  <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
						  <script>
						  $(function() {
						    $( "#datepicker" ).datepicker();
						  });
						  </script>
						<!---/End-date-piker---->
						<div class="p-ww">
							<form>
								<span> Lokasi</span>
								<input class="dest" type="text" value="Lokasi/Ruang" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Lokasi/Ruang';}">
								<span> Tanggal</span>
								<input class="date" id="datepicker" type="text" value="Pilih Tanggal" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Pilih Tanggal';}">
								<input type="submit" value="Cari" />
							</form>
						</div>
						<div class="clear"> </div>
					</div>
				</div>
				<!----//End-find-place---->
			</div>
			<div class="destination-places">
				<div class="wrap">
					<div class="destination-places-head">
						<h3>FASILITAS RUANG</h3>
					</div>
					<div class="destination-places-grids">
						<div class="destination-places-grid" onclick="location.href='#';">
							<div class="dest-place-pic main_box user_style4" data-hipop="two-horizontal">
								<img src="images/d7.jpg" title="place-name" />
								<a href="#" class="popup" id="myBtn"> </a>
								<a href="booking.php" class="popup2"> </a>
							</div>
							<div class="dest-place-opt">
								<ul class="dest-place-opt-fea">
									<li><a class="hot" href="#"><span> </span> Lokasi</a></li>
									<li><a class="kapasitas" href="#"><span> </span> Kapasitas</a></li>
									<div class="clear"> </div>
								</ul>
								<ul class="dest-place-opt-cast">
									<li><a class="d-pesan" href="booking.php">Booking</a></li>
									<li><a class="d-lihat" href="jadwal.php">Lihat</a></li>
									<div class="clear"> </div>
								</ul>
							</div>
						</div>
						<div class="destination-places-grid" onclick="location.href='#';">
							<div class="dest-place-pic main_box user_style4" data-hipop="two-horizontal">
								<img src="images/d6.jpg" title="place-name" />
								<a href="#" class="popup" id="myBtn"> </a>
								<a href="bpoking.php" class="popup2"> </a>
							</div>
							<div class="dest-place-opt">
								<ul class="dest-place-opt-fea">
									<li><a class="hot" href="#"><span> </span> Lokasi</a></li>
									<li><a class="kapasitas" href="#"><span> </span> Kapasitas</a></li>
									<div class="clear"> </div>
								</ul>
								<ul class="dest-place-opt-cast">
									<li><a class="d-pesan" href="#">Booking</a></li>
									<li><a class="d-lihat" href="jadwal.php">Lihat</a></li>
									<div class="clear"> </div>
								</ul>
							</div>
						</div>
						<div class="destination-places-grid last-d-grid" onclick="location.href='#';">
							<div class="dest-place-pic main_box user_style4" data-hipop="two-horizontal">
								<img src="images/d2.jpg" title="place-name" />
								<a href="#" class="popup"> </a>
								<a href="booking.php" class="popup2"> </a>
							</div>
							<div class="dest-place-opt">
								<ul class="dest-place-opt-fea">
									<li><a class="hot" href="#"><span> </span> Lokasi</a></li>
									<li><a class="kapasitas" href="#"><span> </span> Kapasitas</a></li>
									<div class="clear"> </div>
								</ul>
								<ul class="dest-place-opt-cast">
									<li><a class="d-pesan" href="#">Booking</a></li>
									<li><a class="d-lihat" href="jadwal.php">Lihat</a></li>
									<div class="clear"> </div>
								</ul>
							</div>
						</div>
						<div class="destination-places-grid" onclick="location.href='#';">
							<div class="dest-place-pic main_box user_style4" data-hipop="two-horizontal">
								<img src="images/d3.jpg" title="place-name" />
								<a href="#" class="popup"> </a>
								<a href="booking.php" class="popup2"> </a>
							</div>
							<div class="dest-place-opt">
								<ul class="dest-place-opt-fea">
									<li><a class="hot" href="#"><span> </span> Lokasi</a></li>
									<li><a class="kapasitas" href="#"><span> </span> Kapasitas</a></li>
									<div class="clear"> </div>
								</ul>
								<ul class="dest-place-opt-cast">
									<li><a class="d-pesan" href="#">Booking</a></li>
									<li><a class="d-lihat" href="jadwal.php">Lihat</a></li>
									<div class="clear"> </div>
								</ul>
							</div>
						</div>
						<div class="destination-places-grid" onclick="location.href='#';">
							<div class="dest-place-pic main_box user_style4" data-hipop="two-horizontal">
								<img src="images/d1.jpg" title="place-name" />
								<a href="#" class="popup"> </a>
								<a href="booking.php" class="popup2"> </a>
							</div>
							<div class="dest-place-opt">
								<ul class="dest-place-opt-fea">
									<li><a class="hot" href="#"><span> </span> Lokasi</a></li>
									<li><a class="kapasitas" href="#"><span> </span> Kapasitas</a></li>
									<div class="clear"> </div>
								</ul>
								<ul class="dest-place-opt-cast">
									<li><a class="d-pesan" href="#">Booking</a></li>
									<li><a class="d-lihat" href="jadwal.php">Lihat</a></li>
									<div class="clear"> </div>
								</ul>
							</div>
						</div>
						<div class="destination-places-grid last-d-grid" onclick="location.href='#';">
							<div class="dest-place-pic main_box user_style4" data-hipop="two-horizontal">
								<img src="images/d5.jpg" title="place-name" />
								<a href="#" class="popup"> </a>
								<a href="booking.php" class="popup2"> </a>
							</div>
							<div class="dest-place-opt">
								<ul class="dest-place-opt-fea">
									<li><a class="hot" href="#"><span> </span> Lokasi</a></li>
									<li><a class="kapasitas" href="#"><span> </span> Kapasitas</a></li>
									<div class="clear"> </div>
								</ul>
								<ul class="dest-place-opt-cast">
									<li><a class="d-pesan" href="#">Booking</a></li>
									<li><a class="d-lihat" href="jadwal.php">Lihat</a></li>
									<div class="clear"> </div>
								</ul>
							</div>
						</div>
						<div class="destination-places-grid" onclick="location.href='#';">
							<div class="dest-place-pic main_box user_style4" data-hipop="two-horizontal">
								<img src="images/d6.jpg" title="place-name" />
								<a href="#" class="popup"> </a>
								<a href="booking.php" class="popup2"> </a>
							</div>
							<div class="dest-place-opt">
								<ul class="dest-place-opt-fea">
									<li><a class="hot" href="#"><span> </span> Lokasi</a></li>
									<li><a class="kapasitas" href="#"><span> </span> Kapasitas</a></li>
									<div class="clear"> </div>
								</ul>
								<ul class="dest-place-opt-cast">
									<li><a class="d-pesan" href="#">Booking</a></li>
									<li><a class="d-lihat" href="jadwal.php">Lihat</a></li>
									<div class="clear"> </div>
								</ul>
							</div>
						</div>
						<div class="destination-places-grid" onclick="location.href='#';">
							<div class="dest-place-pic main_box user_style4" data-hipop="two-horizontal">
								<img src="images/d5.jpg" title="place-name" />
								<a href="#" class="popup"> </a>
								<a href="booking.php" class="popup2"> </a>
							</div>
							<div class="dest-place-opt">
								<ul class="dest-place-opt-fea">
									<li><a class="hot" href="#"><span> </span> Lokasi</a></li>
									<li><a class="kapasitas" href="#"><span> </span> Kapasitas</a></li>
									<div class="clear"> </div>
								</ul>
								<ul class="dest-place-opt-cast">
									<li><a class="d-pesan" href="#">Booking</a></li>
									<li><a class="d-lihat" href="jadwal.php">Lihat</a></li>
									<div class="clear"> </div>
								</ul>
							</div>
						</div>
						<div class="destination-places-grid last-d-grid" onclick="location.href='#';">
							<div class="dest-place-pic main_box user_style4" data-hipop="two-horizontal">
								<img src="images/d1.jpg" title="place-name" />
								<a href="#" class="popup"> </a>
								<a href="booking.php" class="popup2"> </a>
							</div>
							<div class="dest-place-opt">
								<ul class="dest-place-opt-fea">
									<li><a class="hot" href="#"><span> </span> Lokasi</a></li>
									<li><a class="kapasitas" href="#"><span> </span> Kapasitas</a></li>
									<div class="clear"> </div>
								</ul>
								<ul class="dest-place-opt-cast">
									<li><a class="d-pesan" href="#">Booking</a></li>
									<li><a class="d-lihat" href="jadwal.php">Lihat</a></li>
									<div class="clear"> </div>
								</ul>
							</div>
						</div>
						<div class="clear"> </div>
					</div>
				</div>
				
				<div id="myModal" class="modal">
					<div class="modal-content" style="width:50%;margin-top:-2em;">
						<div class="row">
								<div class="destination-places-head">
									<span class="close">&times;</span>
									<h3>Gedung Graha</h3>
									<center><img src="images/d7.jpg" title="place-name" align="middle" /></center>
								</div>
								<div class="dest-place-opt">
									<ul class="dest-place-opt-fea">
										<li><a class="hot" href="#"><span> </span> Lokasi</a></li>
										<li><a class="kapasitas" href="#"><span> </span> Kapasitas</a></li>
										<div class="clear"> </div>
									</ul>
									<ul class="dest-place-opt-cast">
										<li><a class="d-pesan" href="#">Ketentuan Ruang</a></li><br>
										<li><p>Tidak boleh menggunakan alas kaki. Maksimal ruangan adalah 100 orang</p></li><br>
										<li><a class="d-pesan" href="#">Event Terdekat</a></li><br>
										<li><p>ITS Expo</p></li>
										<div class="clear"> </div>
									</ul>
								</div>
								<div class="find-place dfind-place">
									<div class="wrap">
										<div class="p-h" style="width:23%;">
											<span>PINJAM</span>
											<label>RUANG</label>
										</div>
										<div class="p-ww" style="float:left; padding:1.3em 0 0 3em;width:50%;">
											<form action="booking.php">
												<input type="submit" value="Booking" />
											</form>
										</div>
										<div class="clear"> </div>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
			<!---start-destinations-pagenation---->
				<div class="destination-pagenate">
					<div class="wrap">
						<ul>
							<li><a class="d-next" href="#">Loading More</a></li>
							<div class="clear"> </div>
						</ul>
					</div>
				</div>
			<!---//End-destinations-pagenation---->
			<!---loading-more-script--->
			<!---//loading-more-script--->
		</div>
		<!----//End-offers---->
		<!----//End-images-slider---->
		<!----//End-footer---->
		<!---start-subfooter---->
		<div class="subfooter">
			<div class="wrap">
				<ul>
					<li><a href="index.php">Beranda</a><span>::</span></li>
					<li><a href="layanan.php">Layanan</a><span>::</span></li>
					<li><a href="faq.php">FAQ</a><span>::</span></li>
					<li><a href="tentang.php">Tentang</a><span>::</span></li>
					<li><a href="kontak.php">Kontak</a></li>>
					<div class="clear"> </div>
				</ul>
				<a class="to-top" href="#header"><span> </span> </a>
			</div>
		</div>
		<!---//End-subfooter---->
		<!----//End-wrap---->
		<script>
			// Get the modal
			var modal = document.getElementById('myModal');

			// Get the button that opens the modal
			var btn = document.getElementById("myBtn");

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];

			// When the user clicks on the button, open the modal 
			btn.onclick = function() {
				modal.style.display = "block";
			}

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
				modal.style.display = "none";
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";
				}
			}
		</script>
	</body>
</html>

