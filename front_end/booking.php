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
		<!---calendar---->
		<link href='css/fullcalendar.min.css' rel='stylesheet' />
		<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
		<script src='js/moment.min.js'></script>
		<script src='js/jquery-calendar.min.js'></script>
		<script src='js/jquery-ui-calendar.min.js'></script>
		<script src='js/fullcalendar.min.js'></script>
		<!---end calendar---->
		
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!---crash<script src="js/jquery.min.js"></script>
		<!----start-top-nav-script---->
		<script type="text/javascript" src="js/flexy-menu.js"></script>
		<script type="text/javascript">$(document).ready(function(){$(".flexy-menu").flexymenu({speed: 400,type: "horizontal",align: "right"});});</script>
		<!----//End-top-nav-script---->
		

	</head>
	<body>
		<!----start-wrap---->
			<div class="top-header" id="header" style="">
			<!----start-top-header----->
				<div class="wrap">
					<div class="top-header-left">
						<ul class="agile_forms">
							<li><p class="contact-info">Layanan Informasi : 815-123-4567</p></li>
							<div class="clear"> </div>
						</ul>	
					</div>
					<div class="top-header-right" style="width:30%;">
						<nav class="main-nav" style="margin-top:0.9em;">
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
								<label class="image-replace cd-username" for="signup-nomor">NRP/NIP</label>
								<input class="full-width has-padding has-border" id="signup-nomor" type="text" placeholder="NRP/NIP">
								<span class="cd-error-message">Error message here!</span>
							</p>

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

				<div class="find-place dfind-place">
					<div class="wrap">
						<div class="p-h" style="width:33%;">
							<span>BOOKING</span>
							<label>FORMULIR PEMINJAMAN RUANG</label>
						</div>
						<div class="clear"> </div>
					</div>
				</div>
		
		<!---start-form-booking---->
		<div class="contact-info">
					 <div class="wrap">
					 	<form method="post" action="contact-post.html">
					          <div class="contact-form">
								<div class="contact-to">
			                     	<input type="text" class="text" value="Nama" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nama';}">
								 	<input class="date" id="myBtn" type="text" value="Jadwal" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Jadwal';}">
								 	<select type="text "name="jenispeminjam" class="dropdown" style="margin-left:10px;">
										<option value="Organisasi ITS">Organisasi ITS</option>
										<option value="Birokrasi ITS">Birokrasi ITS</option>
										<option value="Umum">Umum</option>
									</select>
								</div>
								
								<div class="contact-to">
			                     	<select type="text "name="jeniskeperluan" class="dropdown">
										<option>Jenis Keperluan</option>
										<option value="volvo">Rapat</option>
										<option value="saab">Event</option>
										<option value="fiat">Lain-lain</option>
									</select>
									<select type="text" name="cars" class="dropdown" placeholder="Waktu" value="Waktu" style="margin-left:10px;">
										<option>Waktu Pinjam Mulai</option>
										<option value="07.00">07.00</option>
										<option value="08.00">08.00</option>
										<option value="09.00">09.00</option>
										<option value="10.00">10.00</option>
										<option value="11.00">11.00</option>
										<option value="12.00">12.00</option>
										<option value="13.00">13.00</option>
										<option value="14.00">14.00</option>
										<option value="15.00">15.00</option>
										<option value="16.00">16.00</option>
										<option value="17.00">17.00</option>
										<option value="18.00">18.00</option>
										<option value="19.00">19.00</option>
										<option value="20.00">20.00</option>
										<option value="21.00">21.00</option>
										<option value="22.00">22.00</option>
										<option value="23.00">23.00</option>
										<option value="24.00">24.00</option>
									</select>
									<select type="text" name="cars" class="dropdown"  placeholder="Waktu" value="Waktu" style="margin-left:10px;">
										<option>Waktu Pinjam Selesai</option>
										<option value="07.00">07.00</option>
										<option value="08.00">08.00</option>
										<option value="09.00">09.00</option>
										<option value="10.00">10.00</option>
										<option value="11.00">11.00</option>
										<option value="12.00">12.00</option>
										<option value="13.00">13.00</option>
										<option value="14.00">14.00</option>
										<option value="15.00">15.00</option>
										<option value="16.00">16.00</option>
										<option value="17.00">17.00</option>
										<option value="18.00">18.00</option>
										<option value="19.00">19.00</option>
										<option value="20.00">20.00</option>
										<option value="21.00">21.00</option>
										<option value="22.00">22.00</option>
										<option value="23.00">23.00</option>
										<option value="24.00">24.00</option>
									</select>
								</div>
								<div class="text2">
				                   <textarea value="tujuankeperluan" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'tujuankeperluan;}">Deskripsi Tujuan Peminjaman</textarea>
				                </div>
								<div class="contact-to" style="margin-bottom:-.5em;">
									<label style="margin-right:10em;">Upload Surat Peminjaman</label>
									<label><b>Upload Bukti Pembayaran</b></label>
								</div>
								<div class="contact-to">
									<input type="file" name="pic" accept="pdf/*" class="dropdown">
									<input type="file" name="pic" accept="pdf/*" class="dropdown" style="margin-left:10px;">
								</div><br><br><br><br><br>
				                <span><input type="submit" class="" value="Booking"></span>
				                <div class="clear"></div>
				               </div>
				        </form>
					</div>
			</div>
			
				<div id="myModal" class="modal">
					<div class="modal-content" style="width:95%;margin-top:-2em;height:100%;">
								<div class="destination-places-head" >
									<h3 style="margin-bottom:-.6em; margin-top: -.2em;">Gedung Graha</h3>
								</div>
								<div class="find-place dfind-place"><br>
									<div class="wrap">
										<div class="p-h" style="width:15%;margin-left:-5em;margin-top:-.9em;">
											<span class="close" style="margin-right:1em;">&times;</span>
											<span>PILIH</span>
											<label>JADWAL</label>
											
										</div>
										<div class="p-ww" style="float:left; padding:1.3em 0 0 3em;width:50%;margin:-1.2em 0 0 -2.7em;">
											<form action="">
												<input type="submit" value="Booking" />
											</form>
										</div>
										<div class="clear"> </div>	
									</div>
								</div>
								<!---Full Calendar--->
								<script>

									$(document).ready(function() {


										/* initialize the external events
										-----------------------------------------------------------------*/

										$('#external-events .fc-event').each(function() {

											// store data so the calendar knows to render an event upon drop
											$(this).data('event', {
												title: $.trim($(this).text()), // use the element's text as the event title
												stick: true // maintain when user navigates (see docs on the renderEvent method)
											});

											// make the event draggable using jQuery UI
											$(this).draggable({
												zIndex: 999,
												revert: true,      // will cause the event to go back to its
												revertDuration: 0  //  original position after the drag
											});

										});


										/* initialize the calendar
										-----------------------------------------------------------------*/

										$('#calendar').fullCalendar({
											header: {
												left: 'prev,next today',
												center: 'title',
												right: 'month,agendaWeek,agendaDay'
											},
											editable: true,
											droppable: true, // this allows things to be dropped onto the calendar
											drop: function() {
												// is the "remove after drop" checkbox checked?
												if ($('#drop-remove').is(':checked')) {
													// if so, remove the element from the "Draggable Events" list
													$(this).remove();
												}
											}
										});


									});

								</script>
								
								<div id='wrap-calendar'>
									<div id='external-events'>
										<h4>Draggable Events</h4>
										<div class='fc-event'>My Event 1</div>
										<div class='fc-event'>My Event 2</div>
										<div class='fc-event'>My Event 3</div>
										<div class='fc-event'>My Event 4</div>
										<div class='fc-event'>My Event 5</div>
										<p>
											<input type='checkbox' id='drop-remove' />
											<label for='drop-remove'>remove after drop</label>
										</p>
									</div>

									<div id='calendar'></div>

									<div style='clear:both'></div>

								</div>
								<!---End Full Calendar--->
					</div>
				</div>
		
		<!---start-subfooter---->
		<div class="subfooter">
			<div class="wrap">
				<ul>
					<li><a href="index.php">Beranda</a><span>::</span></li>
					<li><a href="layanan.php">Layanan</a><span>::</span></li>
					<li><a href="detail.php">FAQ</a><span>::</span></li>
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

