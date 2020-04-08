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
	$npm = $_POST['npm'];
	$nama = $_POST['nama'];
	// query SQL untuk insert data
	$query="UPDATE mahasiswa SET nama='$nama', npm=$npm where id=$id";
	mysqli_query($conn, $query);
	// mengalihkan ke halaman index.php
	header("location:/ilham/index.php?page=mahasiswa");
?>