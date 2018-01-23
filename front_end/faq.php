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
					<a href="index.html"><img src="images/logo2.png" title="SIMPRU" style="margin-top: -10px;"/></a>
				</div>
				<!--- //End-logo---->
				<!--- start-top-nav---->
				<div class="top-nav">
						<ul class="flexy-menu thick orange">
							<li><a href="index.php">Beranda</a></li>
							<li><a href="layanan.php">Layanan</a></li>
							<li class="active"><a href="detail.php">FAQ</a></li>
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
		<!---start-Criuses---->
		<div class="criuses">
			<div class="criuses-head">
				<div class="wrap">
					<h3>FAQ</h3>
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
			</div>
				<!----//End-find-place---->
				<!---start-criuse-grids----->
				<div class="criuse-main">
					<div class="wrap">
						<div class="criuse-head1">
							<h3>FREQUENTLY ASKED QUESTIONS</h3>
						</div>
						<div class="dest-place-opt">
							<ul class="dest-place-opt-fea">
								<li><a class="kapasitas" href="#"><span> </span> 1. Bagaimana cara melakukan pendaftaran akun pengguna?</a></li>
								<div class="clear"> </div>
							</ul><br>
							<ul>	
								<li><p>Pada setiap halaman terdapat button 'DAFTAR', pengguna menekan button DAFTAR terlebih dahulu -> Masukkan informasi akun pendaftaran pengguna seperti Nama, NRP/NIP/NIK, Pengguna Internal/Eksternal, Email, Alamat, Nomor Telepon, dan Password. Jika anda pengguna eksternal, maka anda harus memasukkan Nomor KTP anda atau Nomor Induk Kependudukan.</p></li><br>
							</ul>
						</div>
						<div class="dest-place-opt">
							<ul class="dest-place-opt-fea">
								<li><a class="kapasitas" href="#"><span> </span> 2. Apakah bisa melakukan peminjaman ruang tanpa memiliki akun?</a></li>
								<div class="clear"> </div>
							</ul><br>
							<ul>
								<li><p>Tidak bisa, pastikan anda memiliki akun pengguna terlebih dahulu dan masuk ke dalam sistem dengan menggunakan akun pengguna.</p></li><br>
							</ul>
						</div>
						<div class="dest-place-opt">
							<ul class="dest-place-opt-fea">
								<li><a class="kapasitas" href="#"><span> </span> 3. Bagaimana cara melakukan pemesanan ruang?</a></li>
								<div class="clear"> </div>
							</ul><br>
							<ul>
								<li><p>Pastikan anda telah memiliki akun, kemudian masuk ke halaman layanan -> pilih ruang yang akan disewa -> Klik booking -> Masukkan informasi mengenai peminjaman ruang di halaman Booking (Nama, jadwal, tipe peminjam, Jenis keperluan, deskripsi tujuan peminjaman, upload surat peminjaman, dan upload bukti pembayaran hanya bagi pengguna eksternal ITS)</p></li><br>
							</ul>
						</div>
						<div class="dest-place-opt">
							<ul class="dest-place-opt-fea">
								<li><a class="kapasitas" href="#"><span> </span> 4.	Bagaimana cara memilih jadwal peminjaman ruang</a></li>
								<div class="clear"> </div>
							</ul><br>
							<ul>
								<li><p>Pastikan anda melihat jadwal ruang pada tanggal, hari dan jam pada ruang/lokasi yang akan dipinjam tidak sedang ter-booked dengan melihat jadwal pada halaman layanan dan menekan 'LIHAT JADWAL' pada ruang/lokasi yang akan dilihat jadwalnya. Jika pada tanggal, hari, dan waktu yang diinginkan kosong, maka pengguna dapat melakukan peminjaman dengan menekan button “BOOKING” dan mengisikan informasi peminjaman pada halaman booking.</p></li><br>
							</ul>
						</div>
						<div class="dest-place-opt">
							<ul class="dest-place-opt-fea">
								<li><a class="kapasitas" href="#"><span> </span> 5.	Apakah bisa meminjam ruang pada Waktu yang sama dipinjam oleh pihak lain?</a></li>
								<div class="clear"> </div>
							</ul><br>
							<ul>
								<li><p>Tidak bisa, sistem akan otomatis memberitahukan bahwa pada tanggal, hari, dan jam yang sama ruang/lokasi telah ter-booked oleh pihak lain. Jadwal pada sistem juga akan secara otomatis memberitahukan bahwa pada waktu waktu tertentu yang telah dipinjam oleh pengguna dan disetujui oleh admin.</p></li><br>
							</ul>
						</div>
				<!---//End-criuse-grids----->
			</div>
		</div>
		<!---start-Criuses---->
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

