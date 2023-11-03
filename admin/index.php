<?php
session_start();
if(isset($_SESSION['logged']) && !empty($_SESSION['logged'])){
include "../database.php";
include '_header.php';
?>
    <div class="container">
        <?php
        //tempatkan di sini halaman administrator
		if(isset($_REQUEST['hlm'])){
			$hlm = $_REQUEST['hlm'];
			
			switch($hlm){
				case 'user': include 'user.php'; break;
				case 'data': include 'data.php';
			}
		} else {
		?>
		<div class="jumbotron">
			<div class="container">
				<h1>Halo, <?php echo $_SESSION['username'] ?></h1>
				<p>Ini merupakan halaman administrasi untuk Informasi <strong>SMK Negeri 1 Wadaslintang</strong>.</p>
				<p>Fasilitas yang tersedia saat ini adalah manajemen <strong>User</strong> yang diberi hak untuk mengelola aplikasi ini dan import <strong>Data</strong> kelulusan dengan format data csv.</p>
			</div>
		</div>
		<?php
		}
        ?>
    </div><!-- /.container -->
<?php 
include '_footer.php';
} else {
	header('Location: ./login.php');
}
?>