<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "skripsi";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	// menyimpan data kedalam variabel
	$id   = $_GET['id'];
	$kode = $_POST['kode'];
	$nama = $_POST['nama'];
	$sks  = $_POST['sks'];
	$absent = $_POST['absent'];
	// query SQL untuk insert data
	$query="UPDATE matakuliah SET kode='$kode',nama='$nama',sks=$sks,absent=$absent where id=$id";
	mysqli_query($conn, $query);
	// mengalihkan ke halaman index.php
	header("location:/ilham/index.php?page=matakuliah");
?>