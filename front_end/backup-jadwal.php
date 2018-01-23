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
					<a href="index.php"><img src="images/logo2.png" title="SIMPRU" style="margin-top: -10px;"/></a>
				</div>
				<!--- //End-logo---->
				<!--- start-top-nav---->
				<div class="top-nav">
						<ul class="flexy-menu thick orange">
							<li><a href="index.php">Beranda</a></li>
							<li class="active"><a href="layanan.php">Layanan</a></li>
							<li><a href="detail.php">FAQ</a></li>
							<li><a href="tentang.php">Tentang</a></li>
							<li><a href="kontak.php">Kontak</a></li>
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
							<span>FIND YOUR</span>
							<label>ROOMS</label>
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
						<h3>JADWAL PEMINJAMAN RUANG</h3>
					</div>
					
					<!----//Start-Weekly-Schedule---->
					<div id="mySchedule">
						<script>
							$('#mySchedule').weekly_schedule({
							
								//Days displayed
								days:["Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu"],
								
								//Hours displayed
								hours:["07:00-08:00","08:00A-09:00","09:00-10:00","10:00-11:00",
										"11:00-12:00","12:00-13:00","13:00-14:00","14:00-15:00",
										"15:00-16:00","16:00-17:00","17:00-18:00","18:00-19:00",
										"19:00-20:00","20:00-21:00","21:00-22:00"]
								
								//Font used in the component
								fontFamily:"Montserrat",
								
								//Font color used in the component
								fontColor:"black",
								
								//Font weight used in the component
								fontWeight:"100",
								
								//Font size used in the component
								fontSize:"0.8em",
								
								//Background color when hovered
								hoverColor:"#727bad",
								
								//Background color when selected
								selectionColor:"#9aa7ee",
								
								//Background color of headers
								headerBackgroundColor:"transparent"
								
								// handler called after selection
								onSelected: function(){},
								
								// handler called after removal
								onRemoved: function(){}
							});
							
						
							//event
							$('.schedule').on('selectionmade', function() {
								console.log("Selection Made");
							}).on('selectionremoved', function() {
								console.log("Selection Removed");
							});
							
							//Get the selected hours
							$('#mySchedule').weekly_schedule("getSelectedHour");

						</script>
					</div>
			</div>
			</div>
			<!---start-destinations-pagenation---->
				<div class="destination-pagenate">
					<div class="wrap">
						<ul>
							<li><a class="d-next" href="#">LOAding More</a></li>
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
		<script src="//code.jquery.com/jquery.min.js"></script>
	<script src="jquery.weekly-schedule-plugin.min.js"></script>
	</body>
	
</html>

