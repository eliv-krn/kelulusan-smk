<?php
include 'database.php';
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="eliv.kurniawan@gmail.com">
	<title>Kelulusan 2022</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/jasny-bootstrap.min.css" rel="stylesheet">
	<link href="css/kelulusan.css" rel="stylesheet">
</head>

<body>

	<?php
	function tanggal_indo($tanggal)
	{
		$bulan = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
		$split = explode('-', $tanggal);
		return $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];
	}
	?>

	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<a class="navbar-brand" href="#">
					SMK Negeri 1 Wadaslintang
				</a>

			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="./">Home</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>

	<div class="container">
		<center><img src="logo.png" width="70" height="70" alt="" align="">
			<h3>Pengumuman Kelulusan Siswa Kelas XII</h3>
			<h4>SMK Negeri 1 Wadaslintang</h4>
			<h4>Tahun Pelajaran 2022/2023</h4>
			<br>
		</center>
		<?php
		if (isset($_REQUEST['submit'])) {
			//tampilkan hasil queri jika ada
			$nisn = $_REQUEST['nisn'];

			$hasil = mysqli_query($db_conn, "SELECT * FROM un_siswa WHERE nisn='$nisn'");
			if (mysqli_num_rows($hasil) > 0) {
				$data = mysqli_fetch_array($hasil);

		?>
				<table class="table table-bordered">
					<tr style="width: 35%">
						<td>NISN</td>
						<td style="width: 65%"><?php echo $data['nisn']; ?></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td><?php echo $data['nama']; ?></td>
					</tr>
					<tr>
						<td>Kelas</td>
						<td><?php echo $data['kelas']; ?></td>
					</tr>
					<tr>
						<td>Tempat/Tanggal Lahir</td>
						<td><?php echo $data['tempat_lahir'] . ', ' . $data['tgl_lahir']; ?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td><?php echo $data['jk']; ?></td>
					</tr>
					<tr>
						<td>Nama Orang Tua</td>
						<td><?php echo $data['ortu']; ?></td>
					</tr>
				</table>
				<table class="table table-bordered">
					<thead>
						<tr class="success">
							<th class="text-center" style="width: 33,33%">S T A T U S</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<td><?php echo 'Anda dinyatakan <strong>' . $data['status'] . '</strong>'; ?></td>
					</tbody>
				</table>

				<?php
				echo '<div class="alert alert-success" role="alert"> <center>Apapun hasilnya semoga ini adalah yang terbaik, tetap semangat dan optimis!</center></div>';
				?>

			<?php
			} else {
				echo '<div class="alert alert-danger" role="alert"> <center>NISN tidak ditemukan atau belum waktunya pengumuman!</center></div> <a href="./" class="btn btn-success btn-sm">Kembali</a>';

				//tampilkan pop-up dan kembali tampilkan form
			}
		} else {
			//tampilkan form input nomor ujian
			?>
			<!-- <p>Peserta didik yang dapat melihat pengumuman ini </br> adalah Peserta Didik SMK Negeri 1 Wadaslintang </br> Kelas XII Tahun Ajaran 2021/2022.</p>
        <p>Masukkan NISN.</p> -->
			<form method="post">
				<div class="input-group">
					<input type="text" name="nisn" class="form-control" placeholder="Masukkan NISN" required>
					<span class="input-group-btn">
						<button class="btn btn-primary" type="submit" name="submit">Cek</button>
					</span>
				</div>
			</form>
		<?php
		}
		?>
		<p></p><br>
		<p><b>Catatan</b>:
		<p align="justify">Jika ada kesalahan data identitas, segera menghubungi sekolah untuk dasar penulisan ijazah.
			Surat Keterangan Lulus (SKL) akan dibagikan saat acara pelepasan kelas XII tanggal 6 Juni 2022. </p>
		<p></p>

	</div><!-- /.container -->

	<footer class="footer">
		<div class="container">
			<p class="text-muted">&copy; 2022 &middot; SMK Negeri 1 Wadaslintang &middot; Rekayasa Perangkat Lunak</p>
		</div>
	</footer>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jasny-bootstrap.min.js"></script>
</body>

</html>